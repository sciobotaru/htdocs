<?php
include 'dbcredentials.php';

$debug = false;
$connresult;
$where;
$numberOfRowsFiltered;

$paginationMaxNumber;


function connectToDatabase()
{
    global $debug;
    global $connresult;
    
    global $server;
    global $username;
    global $password;
    global $result;
    global $dbname;
    
    if($debug)
    {
        echo '<p style="color:green;">DEBUG: Connecting to DB...</p>';
    }

    $connresult=new mysqli($server, $username, $password, $dbname);
    
    if($debug)
    {
        if($connresult->connect_error)
        {
            echo '<p style="color:red;">DEBUG: Connection to DB status: Not connected! '. $connresult->connect_error.'</p>';
            
        }else
        {
            echo '<p style="color:green;">DEBUG: Connection to DB status: Connected!</p>';
        }
    }
}

function closeDBConnection()
{
    global $connresult;
    global $debug;
    
    $connresult->close();
    
    if($debug)
    {
    echo '<p style="color:red;">Connection to database CLOSED '. $connresult->connect_error.'</p>';
    }
}

function clearDatabase()
{
    global $connresult;
    $sql = "TRUNCATE TABLE all_discounted_products;";
    
    if ($connresult->query($sql) === TRUE) 
    {
        echo "<p>DB with all products cleared successfully</p>";
    } 
    else 
    {
        echo "Error: " . $sql . "<br>" . $connresult->error;
    }
}

function writeXmlToDatabase($xml, $table)
{
    global $connresult;
    
    foreach($xml->Product as $Product)
    {   
        $sql = "INSERT INTO ".$table." (
        ProductIndex, 
        Category, 
        ProductTitle, 
        Vendor, 
        OldPrice, 
        NewPrice, 
        Discount, 
        LinkToProduct, 
        LinkToPictureThumbnail, 
        StockStatus, 
        Rating, 
        NumberOfReviews, 
        NewPriceValue, 
        DiscountValue, 
        PriceCategory, 
        HotLevel,
        LinkYoutube) VALUES 
        ('$Product->Index',
         '$Product->Category', 
         '$Product->ProductTitle',
         '$Product->Vendor',
         '$Product->OldPrice',
         '$Product->NewPrice',
         '$Product->Discount',
         '$Product->LinkToProduct',
         '$Product->LinkToPictureThumbnail',
         '$Product->StockStatus',
         '$Product->Rating',
         '$Product->NumberOfReviews',
         '$Product->PriceValue',
         '$Product->DiscountValue',
         '$Product->PriceCategory',
         '$Product->HotLevel',
         '$Product->LinkYoutube')";
        
        if ($connresult->query($sql) === TRUE) 
        {
            echo '<p>New record created successfully</p>';
        } 
        else 
        {
            echo '<p>Error: '. $connresult->error.'</p>';
        }
    }
}

///////////////////////////////////////////////////
//////  Filter products ///////////////////////////
///////////////////////////////////////////////////
function getProductsFromDatabase($pageNumber, $category, $magazin, $pret, $search, $table)
{
    global $connresult;
    global $where;
    $orderByPrice = "";
    
    if($search != "") $orderByPrice = " ORDER BY NewPriceValue ASC";
    
    //get max 40 products from DB
    $where = getWhereFilter($category, $magazin, $pret, $search, $table);
    $sql = "SELECT * FROM ".$table.$where.$orderByPrice." LIMIT ".(($pageNumber-1) * 40).", 40";
    
    $result = $connresult->query($sql);
    
    //get max 40 products from DB ordered by discount
    //$where = " WHERE (Category LIKE '%".$category."%') AND (Vendor LIKE '%".$magazin."%') AND (PriceCategory LIKE '%".$pret."%') AND (ProductTitle LIKE '%".$search."%')";
    //$sql = "SELECT * FROM ".$table.$where." ORDER BY DiscountValue DESC LIMIT ".(($pageNumber-1) * 40).", 40";
    
    return $result;
}

function getFilteredNumberOfProducts($category, $magazin, $pret, $search, $table)
{
    global $connresult;
    global $numberOfRowsFiltered;
    
    $where = getWhereFilter($category, $magazin, $pret, $search, $table);
    
    $sql = "SELECT * FROM ".$table.$where;
    $resultFiltredProducts = $connresult->query($sql);
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
    global $connresult;
    
    $sql = "SELECT * FROM ".$table;
    $result = $connresult->query($sql);
    $num_rows = $result -> num_rows;
    return $num_rows;
}


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