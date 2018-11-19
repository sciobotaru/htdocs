<?php
include 'dbcredentials.php';

$debug = true;

$connToken; // => connection token
$allProducts; // => all products from DB
$where;
$numberOfRowsFiltered;

$paginationMaxNumber;

//public
//sursa: http://webdevzoom.com/connect-mysql-database-using-php/
function connectToDatabase()
{
    global $debug;
    global $connToken;
    
    global $server;
    global $username;
    global $password;
    global $result;
    global $dbname;
    
    if($debug)
    {
        echo '<p style="color:green;">DEBUG: Connecting to DB...</p>';
    }

    $connToken = @new mysqli($server, $username, $password, $dbname);

    if ($connToken->connect_error) {
        echo '<p style="color:red;">DEBUG: Connection to DB status: Not connected!'. $con->connect_error.'</p>';
        exit();
    }
    echo '<p style="color:green;">DEBUG: Connection to DB status: Connected!</p>';
}

function closeDBConnection()
{
    global $connToken;
    global $debug;

    echo '<p style="color:green;">Closing connection...<br></p>';
    
    mysqli_close($connToken);
    
    if($debug)
    {
        echo '<p style="color:green;">DEBUG: Connection to database CLOSED '. $connToken->connect_error.'</p>';
    }
}

function clearDatabase()
{
    global $connToken;
    $sql = "TRUNCATE TABLE all_discounted_products;";
    
    if ($connToken->query($sql) === TRUE) 
    {
        echo "<p>DB with all products cleared successfully</p>";
    } 
    else 
    {
        echo "Error: " . $sql . "<br>" . $connToken->error;
    }
}

function writeXmlToDatabase($xml, $table)
{
    global $connToken;
    
    foreach($xml->Product as $Product)
    {   
        $sql = "INSERT INTO ".$table." (
        ProductID,
        Vendor,
        ProductTitle,
        LinkToProduct,
        LinkToPicture,
        OldPrice,
        NewPrice,
        NewPriceValue,
        PriceHistory,
        DiscountPercent,
        DiscountBrut,
        PriceEvolution,
        StockStatus,
        LinkYoutube,
        Rating,
        RatingComment,
        NoVotes,
        RAMSize,
        MemorySize,
        DisplayType,
        DisplaySize,
        CameraResolution,
        ProcessorSpeed) VALUES 
        ('$Product->ProductID',
         '$Product->Vendor', 
         '$Product->ProductTitle',
         '$Product->LinkToProduct',
         '$Product->LinkToPicture',
         '$Product->OldPrice',
         '$Product->NewPrice',
         '$Product->NewPriceValue',
         '$Product->PriceHistory',
         '$Product->DiscountPercent',
         '$Product->DiscountBrut',
         '$Product->PriceEvolution',
         '$Product->StockStatus',
         '$Product->LinkYoutube',
         '$Product->Rating',
         '$Product->RatingComment',
         '$Product->NoVotes',
         '$Product->RAMSize',
         '$Product->MemorySize',
         '$Product->DisplayType',
         '$Product->DisplaySize',
         '$Product->CameraResolution',
         '$Product->ProcessorSpeed')";
        
        if ($connToken->query($sql) === TRUE) 
        {
            echo '<p>New record created successfully</p>';
        } 
        else 
        {
            echo '<p>Error: '. $connToken->error.'</p>';
        }
    }
}

function getAllProductsFromDatabase()
{
    global $connToken; //connection token
    global $allProducts; //products rom db
    global $tableDiscounted;
    global $debug;

    $sql = "SELECT * FROM ".$tableDiscounted;
    $allProducts = mysqli_query($connToken, $sql);

    if($debug)
    {
        if($allProducts)
        {
            echo '<p style="color:green;">DEBUG: Query was successfully!</p>';
            
        }else
        {
            echo '<p style="color:red;">DEBUG: Query failed ('.$sql.')!</p>';
        }
    }

    // $row_cnt = mysqli_num_rows($allProducts); //ok

    // echo "Result set has: ".$row_cnt." rows"; //ok

    /* close result set */
    //mysqli_free_result($allProducts);

    // while ($row = mysqli_fetch_array($allProducts)) //e ok!!!
    // {
    //     echo '<p style="color:green;">'.$row['ProductTitle'].'!</p>';
    // }
}

function freeAllProductsFromDatabase()
{
    global $allProducts;
    global $debug;

    mysqli_free_result($allProducts);

    if($debug)
    {
        echo '<p style="color:green;">DEBUG: Free memory. Cached products cleared!</p>';
    }
}

//end function writeXmlToDatabase
///////////////////////////////////////////////////
//////  Filter products ///////////////////////////
///////////////////////////////////////////////////
function getProductsFromDatabase($pageNumber, $category, $magazin, $pret, $search, $table)
{
    global $connToken;
    global $where;
    $orderByPrice = "";
    
    if($search != "") $orderByPrice = " ORDER BY NewPriceValue ASC";
    
    //get max 40 products from DB
    $where = getWhereFilter($category, $magazin, $pret, $search, $table);
    $sql = "SELECT * FROM ".$table.$where.$orderByPrice." LIMIT ".(($pageNumber-1) * 40).", 40";
    
    $result = $connToken->query($sql);
    
    return $result;
}

function getFilteredNumberOfProducts($category, $magazin, $pret, $search, $table)
{
    global $connToken;
    global $numberOfRowsFiltered;
    
    $where = getWhereFilter($category, $magazin, $pret, $search, $table);
    
    $sql = "SELECT * FROM ".$table.$where;
    $resultFiltredProducts = $connToken->query($sql);
    $numberOfRowsFiltered = $resultFiltredProducts -> num_rows;
    $numberOfRowsFilteredFormated = number_format($numberOfRowsFiltered);
    return ' ('.$numberOfRowsFilteredFormated.' oferte)';
}

function getTotalNumberOfPages()
{
    global $numberOfRowsFiltered;
    
    if($numberOfRowsFiltered == "" || $numberOfRowsFiltered == 0)
        return (int)1;
    return (int)ceil($numberOfRowsFiltered/40);
}

function getTotalNumberOfProducts($table)
{
    global $connToken;
    
    $sql = "SELECT * FROM ".$table;
    $result = $connToken->query($sql);
    $num_rows = $result -> num_rows;
    return $num_rows;
}

//private
function getWhereFilter($category, $magazin, $pret, $search, $table)
{
    $productTitleFilter = "";
    $pieces = explode(" ", $search);

    foreach($pieces as $keyword){
        $productTitleFilter .=" AND (ProductTitle LIKE '%".$keyword."%')";
    }
    
    $where = " WHERE (Category LIKE '%".$category."%') AND (Vendor LIKE '%".$magazin."%') AND (PriceCategory LIKE '%".$pret."%')".$productTitleFilter;
    
    return $where;
}


?>