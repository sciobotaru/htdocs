<?php

function readXml($fullpathToXml) //e.g. 'xmldeals/AllDiscountedProducts.xml'
{
    global $debug;

    if (file_exists($fullpathToXml)) 
    {
        $xml = simplexml_load_file($fullpathToXml);
        if($debug)
        {
            echo '<p style="color:green;">Xml '.$fullpathToXml.' successfully read.</p>';
        }
    } 
    else 
    {
        echo '<p style="color:red;">Xml '.$fullpathToXml.' not found .</p>';
    }

    return $xml;
}

?>