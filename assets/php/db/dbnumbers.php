<?php
include "dbconnector";

$filteredProducts = array();

$numberOProductsPerPage = 12;
$numberOfProducts = 0;
$numberOfPages = 0;
$brands = array();
$vendors = array();
$RAMSizes = array();
$MemorySizes = array();
$DisplayTypes = array();
$DisplaySizes = array();
$CameraResolutions = array();
$ProcessorSpeeds = array();

//total number of products
function getNumberOfProducts()
{
    global $filteredProducts;
    global $numberOfProducts;
    
    $numberOfProducts = count($filteredProducts);

    return $numberOfProducts;
}
//total number of pages
function getNumberOfPages()
{
    global $numberOfProducts;
    global $numberOfPages;
    global $numberOProductsPerPage;

    $numberOfPages = ceil($numberOfProducts / $numberOProductsPerPage);

    return $numberOfPages;
}

function filterProducts($vendor, $ramsize, $memorysize, $displaytype, $displaysize, $cameraresolution, $processorspeed)
{
    //input
    global $allProducts;
    //output
    global $filteredProducts;

    echo 'Filter products: 
    <br>Vendor: '.$vendor.'
    <br>RAM size: '.$ramsize.'
    <br>Memory size: '.$memorysize.'
    <br>Display type: '.$displaytype.'
    <br>Display size: '.$displaysize.'
    <br>Camera resolution: '.$cameraresolution.'
    <br>Processor speed: '.$processorspeed.'<br>';

    while ($row = mysqli_fetch_array($allProducts))
    {
        if(($vendor === ""? true : $row['Vendor'] === $vendor) &&
        ($ramsize === ""? true : $row['RAMSize'] === $ramsize) &&
        ($memorysize === ""? true : $row['MemorySize'] === $memorysize) &&
        ($displaytype === ""? true : $row['DisplayType'] === $displaytype) &&
        ($displaysize=== ""? true : $row['DisplaySize'] === $displaysize) &&
        ($cameraresolution === ""? true : $row['CameraResolution'] === $cameraresolution) &&
        ($processorspeed === ""? true : $row['ProcessorSpeed'] === $processorspeed))
        {
            array_push($filteredProducts, $row);
        }
    }
}

//get numbers of products per brands, vendors, RAM size, etc
function parseNumbers()
{
    ////// input ///////////////
    global $filteredProducts;
    ////////////////////////////

    ///// outputs //////////////
    global $brands;
    global $vendors;
    global $RAMSizes;
    global $MemorySizes;
    global $DisplayTypes;
    global $DisplaySizes;
    global $CameraResolutions;
    global $ProcessorSpeeds;
    ////////////////////////////

    echo 'Parsing the numbers.<br>';

    foreach ($filteredProducts as $row)
    {
        array_push($brands, $row['Brand']);
        array_push($vendors, $row['Vendor']);
        array_push($RAMSizes, $row['RAMSize']);
        array_push($MemorySizes, $row['MemorySize']);
        array_push($DisplayTypes, $row['DisplayType']);
        array_push($DisplaySizes, $row['DisplaySize']);
        array_push($CameraResolutions, $row['CameraResolution']);
        array_push($ProcessorSpeeds, $row['ProcessorSpeed']);
    } 
}

function showProducts()
{
    global $filteredProducts;

    echo "Showing products...<br>";

    foreach ($filteredProducts as $row)
    {
        $separator = "||";

        echo $row['Brand'].$separator.
             $row['NewPrice'].$separator.
             $row['Vendor'].$separator.
             $row['RAMSize'].$separator.
             $row['MemorySize'].$separator.
             $row['ProcessorSpeed'].$separator.
             $row['ProductTitle'].
             '<br>';
    } 
}

function getNumberOfProductsPerProcessorSpeed()
{
    global $ProcessorSpeeds;
    global $debug;

    if($debug)
    {
        echo '<p style="color:orange;font-weight:bold">DEBUG: Getting the list of Processor speeds:</p>';
    }

    return array_count_values($ProcessorSpeeds);  
}

function getNumberOfProductsPerCameraResolution()
{
    global $CameraResolutions;
    global $debug;

    if($debug)
    {
        echo '<p style="color:orange;font-weight:bold">DEBUG: Getting the list of Camera resolutions:</p>';
    }

    return array_count_values($CameraResolutions);  
}

function getNumberOfProductsPerDisplaySize()
{
    global $DisplaySizes;
    global $debug;

    if($debug)
    {
        echo '<p style="color:orange;font-weight:bold">DEBUG: Getting the list of Display sizes:</p>';
    }

    return array_count_values($DisplaySizes);  
}

function getNumberOfProductsPerDisplayType()
{
    global $DisplayTypes;
    global $debug;

    if($debug)
    {
        echo '<p style="color:orange;font-weight:bold">DEBUG: Getting the list of Display Type:</p>';
    }

    return array_count_values($DisplayTypes);  
}

function getNumberOfProductsPerRAMSize()
{
    global $RAMSizes;
    global $debug;

    if($debug)
    {
        echo '<p style="color:orange;font-weight:bold">DEBUG: Getting the list of RAM sizes:</p>';
    }

    return array_count_values($RAMSizes);  
}

//return an array of brands and number of products per RAM size
function getNumberOfProductsPerMemorySize()
{
    global $MemorySizes;
    global $debug;

    if($debug)
    {
        echo '<p style="color:orange;font-weight:bold">DEBUG: Getting the list of Memory Size:</p>';
    }

    return array_count_values($MemorySizes);  
}

//return an array of brands and number of products per brand
function getNumberOfProductsPerBrand()
{
    global $brands;
    global $debug;

    if($debug)
    {
        echo '<p style="color:orange;font-weight:bold"">DEBUG: Getting the list of Brands:</p>';
    }

    return array_count_values($brands);  
}

//returns an array with vendors
function getVendorList()
{
    global $vendors;
    global $debug;

    if($debug)
    {
        echo '<p style="color:orange;font-weight:bold"">DEBUG: Getting the list of Vendors:</p>';
    }

    return array_unique($vendors);
}

//////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////  COMPARE FUNCTIONS /////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////

function cmpPriceAscending($a, $b)
{
    $points = array(",", ".");
    return str_replace($points, "", $a['NewPrice']) - str_replace($points, "", $b['NewPrice']);
}
 
function cmpPriceDescending($a, $b)
{
    $points = array(",", ".");
    return str_replace($points, "", $b['NewPrice']) - str_replace($points, "", $a['NewPrice']);
}

function sortProductsPriceAscending()
{
    global $filteredProducts;

    usort($filteredProducts, "cmpPriceAscending");

    return $filteredProducts;
}

function sortProductsPriceDescending()
{
    global $filteredProducts;

    usort($filteredProducts, "cmpPriceDescending");

    return $filteredProducts;
}

?>