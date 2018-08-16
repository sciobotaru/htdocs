<?php
include 'assets/php/includes.php'; //includes for normal site functioning

checkCookies(); //cookies.php
connectToDatabase();
?>

<!DOCTYPE html>
<html>
    <head>
        <?php getHead(); ?>
    </head>

    <body>
        <?php getNavBar(); ?>
        <div class="menu-area">

        </div>
        <div class="container">
            <?php getBannerInfo(); ?>
            <?php getFilterInfo(); ?>
            
            <?php $totalPages = getTotalNumberOfPages(); ?>
            <div class="row product-list" id="productList">
                <?php getProducts(); ?>
            </div>
        <?php getPagination(); ?>
        </div>

        <?php getFeatureList(); ?>
        <?php getFooter(); ?>
        <?php displayCookiesAlert(); ?>
    </body>
</html>

<?php
closeDBConnection();
?>

