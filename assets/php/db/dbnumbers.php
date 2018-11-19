<?php
include "dbconnector";
$numberOProductsPerPage = 12;
$numberOfProducts = 0;
$numberOfPages = 0;

function getNumberOfProducts()
{
    global $allProducts;
    global $numberOfProducts;

    $numberOfProducts = mysqli_num_rows($allProducts);

    return $numberOfProducts;
}

function getNumberOfPages()
{
    global $numberOfProducts;
    global $numberOfPages;
    global $numberOProductsPerPage;

    $numberOfPages = ceil($numberOfProducts / $numberOProductsPerPage);

    return $numberOfPages;
}

function getProductsForBrand($brand)
{
    global $allProducts;
    $count = 0;

    while ($row = mysqli_fetch_array($allProducts))
    {
        if(strpos($row['ProductTitle'], $brand))
        {
            $count++;
        }
    }
    return $count;
}

//put brands in array and get the number of products for each brand
function getProductsForBrands($brands)
{
    // foreach()...
}

?>