<?php
include 'assets/php/db/dbcredentials.php';
include 'assets/php/db/dbconnector.php';
include 'assets/php/db/dbnumbers.php';

$eol = '<br>';

?>
<html>
    <head>
    </head>

    <body>
    <?php
        echo '######  DB TEST #####'.$eol;
        echo $server;
        connectToDatabase();
        getAllProductsFromDatabase('all_discounted_products');

        filterProducts("", "", "", "", "", "", "Octa Core");
        parseNumbers();

        echo '<p style="color:blue">Total products: '.getNumberOfProducts().'</p>';
        echo '<p style="color:blue">Products per page: '.$numberOProductsPerPage.'. Number o pages: '.getNumberOfPages().'</p>';

        //$ramsize, $memorysize, $displaytype, $displaysize, $cameraresolution, $processorspeed)
        
        foreach(getVendorList() as $vendor)
        {
            echo '<p style="color:blue">Vendor: '.$vendor.'</p>';
        }
        foreach(getNumberOfProductsPerBrand() as $key => $value)
        {
            echo '<p style="color:blue">Brand: '.$key.'('.$value.')</p>';
        }
        foreach(getNumberOfProductsPerRAMSize() as $key => $value)
        {
            echo '<p style="color:blue">RAM: '.$key.'('.$value.')</p>';
        }
        foreach(getNumberOfProductsPerMemorySize() as $key => $value)
        {
            echo '<p style="color:blue">Memory: '.$key.'('.$value.')</p>';
        }
        foreach(getNumberOfProductsPerDisplayType() as $key => $value)
        {
            echo '<p style="color:blue">Display types: '.$key.'('.$value.')</p>';
        }
        foreach(getNumberOfProductsPerDisplaySize() as $key => $value)
        {
            echo '<p style="color:blue">Display size: '.$key.'('.$value.')</p>';
        }
        foreach(getNumberOfProductsPerCameraResolution() as $key => $value)
        {
            echo '<p style="color:blue">Camera resolution: '.$key.'('.$value.')</p>';
        }
        foreach(getNumberOfProductsPerProcessorSpeed() as $key => $value)
        {
            echo '<p style="color:blue">Processor speed: '.$key.'('.$value.')</p>';
        }

        //sortProductsPriceDescending();
        sortProductsPriceAscending();
        showProducts();

        closeDBConnection();
        freeAllProductsFromDatabase();
    ?>
    </body>

</html>