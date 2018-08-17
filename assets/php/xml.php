<?php

$pathToAllProductsXml = 'xmldeals/AllDiscountedProducts.xml';
$pathToHotProductsXml = 'xmldeals/AllHotProducts.xml';

function readXml()
{
    global $pathToAllProductsXml;
    
    if (file_exists($pathToAllProductsXml)) 
    {
        $xml = simplexml_load_file($pathToAllProductsXml);
    } 
    else 
    {
        echo '<p style="color:red;">Xml AllDiscountedProducts.xml not found .</p>';
    }

    return $xml;
}

function readHot()
{
    global $pathToHotProductsXml;
    
    if (file_exists($pathToHotProductsXml)) 
    {
        $xml = simplexml_load_file($pathToHotProductsXml);
    } 
    else 
    {
        echo '<p style="color:red;">Xml AllHotProducts.xml not found .</p>';
    }

    return $xml;
}

function readGeneralInfoXml()
{
    if (file_exists('GeneralInfo.xml')) 
    {
        $xml = simplexml_load_file('GeneralInfo.xml');
    } 
    else 
    {
        echo '<p style="color:red;">Xml GeneralInfo.xml not found .</p>';
    }

    return $xml;
}

?>