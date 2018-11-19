<?php
include 'dbcredentials.php';

$debug = true;

$connToken; // => connection token
$allProducts; // => all products from DB

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

    echo '<p style="color:green;">DEBUG: Closing connection...<br></p>';
    
    mysqli_close($connToken);
    
    if($debug)
    {
        echo '<p style="color:green;">DEBUG: Connection to database CLOSED '. $connToken->connect_error.'</p>';
    }
}

function clearDatabase($tableName) //e.g. all_discounted_products
{
    global $connToken;
    $sql = "TRUNCATE TABLE ".$tableName.";";
    
    if ($connToken->query($sql) === TRUE) 
    {
        echo '<p style="color:green;">DEBUG: DB with all products cleared successfully</p>';
    } 
    else 
    {
        echo '<p style="color:red;">DEBUG: Error: ' . $sql . '<br>' . $connToken->error.'</p>';
    }
}

//$xml - Array of data read from xml
//$tableName - Name of the table to write to
function writeXmlToDatabase($xml, $tableName)
{
    global $connToken;
    $index = 0;
    $recordOK = 0;
    foreach($xml->Product as $Product)
    {   
        $index++;
        $sql = "INSERT INTO ".$tableName." (
        ProductIndex,
        ProductID,
        Vendor,
        Brand,
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
        ('$index', 
         '$Product->ProductID',
         '$Product->Vendor', 
         '$Product->Brand', 
         '$Product->ProductTitle',
         '$Product->LinkToProduct',
         '$Product->LinkToPicture',
         '$Product->OldPrice',
         '$Product->NewPrice',
         '$Product->NewPriceValue',
         '".str_replace("'", "\'", $Product->PriceHistory)."',
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
            //echo '<p style="color:green;">DEBUG: New record created successfully</p>';
            $recordOK++;
        } 
        else 
        {
            echo '<p style="color:red;">DEBUG: Error: '. $connToken->error.'</p>';
        }
    }
    echo '<p style="color:green;">DEBUG: '.$recordOK.'/'.$index.' recorded are OK</p>';
}

function getAllProductsFromDatabase($tableName) //e.g. all_discounted_products
{
    global $connToken; //connection token
    global $allProducts; //products rom db
    global $debug;

    $sql = "SELECT * FROM ".$tableName;
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
}

//free cached database from memory 
function freeAllProductsFromDatabase()
{
    global $allProducts;
    global $debug;

    mysqli_free_result($allProducts);

    if($debug)
    {
        echo '<p style="color:green;">DEBUG: Free memory. Cleared cached products!</p>';
    }
}
?>