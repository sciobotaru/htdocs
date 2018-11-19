<?php
include "dbconnector";
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
    global $allProducts;
    global $numberOfProducts;

    $numberOfProducts = mysqli_num_rows($allProducts);

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

function parseNumbers()
{
    global $allProducts;
    global $brands;
    global $vendors;
    global $RAMSizes;
    global $MemorySizes;
    global $DisplayTypes;
    global $DisplaySizes;
    global $CameraResolutions;
    global $ProcessorSpeeds;

    while ($row = mysqli_fetch_array($allProducts))
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

?>