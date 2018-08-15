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


checkCookies(); //cookies.php
connectToDatabase();
?>

<!DOCTYPE html>
<html>
    <head>
        <?php getHead(); ?>
    </head>

    <body>
    <?php getNavBar();?>

    <div class="container">

    <!-- site description -->

    <div class="banner">
            <span id="banner-close"> <i class="fa fa-close"></i> </span>
            <h4 class="message">Telefoane la promotie de la principalele magazine din Romania</h4>
        <div class="message"><i class="fa fa-heart"></i><span> Oferte actualizate zilnic.</span></div>
    </div>

    <!-- site description end -->
        
    <div class="filter">
    <h4><?php echo $hotDealsMessage.getFilteredNumberOfProducts($requestCategorie, $requestMagazin, $requestPret, $requestSearch, 'all_discounted_products')?></h4>
    </div>

        <!-- Loading page icon start -->
        <!-- <div id="LoadingPage" class="loading-icon">
            <i class="fa fa-spinner fa-spin fa-5x fa-fw"></i>
        </div>  -->
        
        <?php $totalPages = getTotalNumberOfPages(); //functia trebuie chemata DUPA getFilteredNumberOfProducts() !!!! - are dependinta 
        getPagination();
        ?>
        <div class="row product-list" id="productList">
            <?php getProducts(); ?>
        </div>
            
        <?php getPagination(); ?>
    </div>

    <?php 
    getFeatureList(); 
    getFooter();
    displayCookiesAlert(); 
    ?>
    </body>
</html>

<?php
closeDBConnection();
?>

