<?php
include 'assets/php/db/dbconnector.php';
include 'php/ViewGenerator.php'; //for getProduct()
include 'assets/php/cookies.php'; //for checkCookies()
include 'ParseURL.php';
include 'InputChecker';
include 'assets/php/view/navbar.php'; //for navigation bar
include 'assets/php/view/features.php'; //for feature list
include 'assets/php/view/footer.php';
include 'assets/php/view/head.php';
include 'assets/php/view/pagination.php'; 
include 'assets/php/view/bannerInfo.php'; 
include 'assets/php/view/filterInfo.php'; 

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

