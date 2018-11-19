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
        getAllProductsFromDatabase(); //ok
        echo '<p style="color:blue">Total products: '.getNumberOfProducts().'</p>';
        echo '<p style="color:blue">Products per page: '.$numberOProductsPerPage.'. Number o pages: '.getNumberOfPages().'</p>';
        echo '<p style="color:blue">Samsung products: '.getProductsForBrand('Samsung').'</p>';
        closeDBConnection();
        freeAllProductsFromDatabase();
    ?>
    </body>

</html>