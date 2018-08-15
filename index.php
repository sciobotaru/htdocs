<?php
include 'assets/php/db/dbconnector.php';
include 'php/ViewGenerator.php'; //for getProduct()
include 'assets/php/cookies.php'; //for checkCookies()
include 'ParseURL.php';
include 'InputChecker';

checkCookies(); //cookies.php
connectToDatabase();
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>ElectroDeals</title>
<!-- JS -->
<!---EVENT HANDLERS START -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="assets/js/script.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script async src="assets/js/global.js"></script>
<script async src="assets/js/cookies.js"></script>
<!---SOCIAL  START-->
<!-- Go to www.addthis.com/dashboard to customize your tools --> 
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5a89e7382fbdb8f0"></script>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-113149572-1"></script>
<script src="assets/js/statistics.js"></script>
<!-- EVENT HANDLERS END  -->
<!-- Start 2performant -->
<script src="https://cdn.2performant.com/l2/link2.js" id="linkTwoPerformant" data-id="l2/0/1/5/7/4/0/8/2/8/1" data-api-host="https://cdn.2performant.com"></script>
<!-- End 2performant -->
<!-- Start ProfitShare Zone -->
<script type="text/javascript" src="assets/js/profitshare.js"></script>
<!-- End ProfitShare Zone -->   

<!-- CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.7/journal/bootstrap.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=News+Cycle:400,700">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
<link rel="stylesheet" href="assets/css/styles.min.css">
<link rel="stylesheet" href="assets/css/product.css">
<link rel="stylesheet" href="assets/css/global.css">
<link rel="stylesheet" href="assets/css/cookies.css">
<link rel="stylesheet" href="assets/css/banner_prezentare.css">   

</head>

<body>

<!-- NAV BAR start -->
    <nav class="navbar navbar-default navigation-clean-search">
        <div class="container">
            <div class="navbar-header"><a class="navbar-brand" href="http://www.electrodeals.ro">ELECTRODEALS </a><button class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
            </div>
            <div class="collapse navbar-collapse" id="navcol-1">
                <ul class="nav navbar-nav">
                    <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false" id="pret" href="#">Pret <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li role="presentation"><a class="pointer" id="sub200">sub 200 Lei</a></li>
                            <li role="presentation"><a class="pointer" id="200500">200 - 500 Lei</a></li>
                            <li role="presentation"><a class="pointer" id="5001000">500 - 1.000 Lei</a></li>
                            <li role="presentation"><a class="pointer" id="10002000">1.000 - 2.000 Lei</a></li>
                            <li role="presentation"><a class="pointer" id="peste2000">peste 2.000 Lei</a></li>
                        </ul>
                    </li>
                    <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false" id="magazin" href="#">Magazin <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li role="presentation"><a class="pointer" id="cel">Cel</a></li>
                            <li role="presentation"><a class="pointer" id="stradait">StradaIT</a></li>
                            <li role="presentation"><a class="pointer" id="flanco">Flanco</a></li>
                            <li role="presentation"><a class="pointer" id="germanos">Germanos</a></li>
                            <li role="presentation"><a class="pointer" id="badabum">Badabum</a></li>
                            <li role="presentation"><a class="pointer" id="evomag">EvoMag</a></li>
                            <li role="presentation"><a class="pointer" id="pcgarage">PCgarage</a></li>
                            <li role="presentation"><a class="pointer" id="itgalaxy">ITGalaxy</a></li>
                            <li role="presentation"><a class="pointer" id="f64">F64</a></li>
                        </ul>
                    </li>
                </ul>
                <form class="navbar-form navbar-left" target="_self">
                    <div class="form-group"><label class="control-label" for="search-field"><i class="glyphicon glyphicon-search"></i></label><input class="form-control search-field" type="search" name="search" placeholder="Cauta in <?php echo getTotalNumberOfProducts('all_discounted_products')?> produse" autocomplete="on" inputmode="verbatim" id="search-field">
                    </div>
                </form>
            </div>
        </div>
    </nav>
<!-- NAV BAR end --> 	

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
    
    <?php $totalPages = getTotalNumberOfPages(); //functia trebuie chemata DUPA getFilteredNumberOfProducts() !!!! - are dependinta ?>
    
    <ul class="pagination">
        <li class="pointer"><a aria-label="Previous"><span aria-hidden="true" id="anterioaraup"><<</span></a></li>
        <li><a><span id="currentpageno"><?php echo (int)$requestPage?></span>/<span id="maxpages"><?php echo $totalPages?></span></a></li>
        <li class="pointer"><a aria-label="Next"><span aria-hidden="true" id="urmatoareaup">>></span></a></li>
    </ul>
    <div class="row product-list" id="productList">



<?php
/////////////////////////////////////////////////////////////
//product list here /////////////////////////////////////////
/////////////////////////////////////////////////////////////
getProducts();
/////////////////////////////////////////////////////////////
//product list end //////////////////////////////////////////
/////////////////////////////////////////////////////////////
?>
        </div>
        <ul class="pagination">
        <li class="pointer"><a aria-label="Previous"><span aria-hidden="true" id="anterioaradown"><<</span></a></li>
        <li><a><span id="currentpageno"><?php echo (int)$requestPage?></span>/<span id="maxpages"><?php echo $totalPages?></span></a></li>
        <li class="pointer"><a aria-label="Next"><span aria-hidden="true" id="urmatoareadown">>></span></a></li>
    </ul>

</div>
<div class="features-clean">
    <div class="container">
        <div class="row features">
            <div class="col-md-4 col-sm-6 item">
                <i class="fa fa-percent icon"></i>
                <h3 class="name">Cele mai mari reduceri</h3>
                <p class="description">
                    Fii la curent cu <strong>cele mai mari reduceri</strong> din magazine la electronice si electrocasnice.
                </p>
            </div>
            <div class="col-md-4 col-sm-6 item">
                <i class="glyphicon glyphicon-time icon"></i>
                <h3 class="name">Actualizare zilnica</h3>
                <p class="description">
                    Beneficiaza de ultimele reduceri <strong>actualizate in fiecare zi</strong>.
                </p>
            </div>
            <div class="col-md-4 col-sm-6 item">
                <i class="glyphicon glyphicon-list-alt icon"></i>
                <h3 class="name">Cea mai selecta gama de produse</h3>
                <p class="description">
                    Descopera doar <strong>produsele care conteaza</strong>, atent selectate in functie de review-uri si discount.
                </p>
            </div>
        </div>
    </div>
</div>
<div class="footer-basic">
    <footer>
    <div class="social">
        <a href="https://www.facebook.com/electrodeals.ro" target="_blank"><i class="icon ion-social-facebook"></i></a>
    </div>
    <ul class="list-inline">
        <li><a href="/">Acasa</a></li>
        <li><a href="#">Despre noi</a></li>
        <li><a href="#">Termeni si conditii</a></li>
        <li><a href="#">Politica de confidentialitate</a></li>
    </ul>
    <p class="copyright">
        ELECTRODEALS© 2018
    </p>
    </footer>
</div>
<div class="scroll-top-wrapper"><span class="scroll-top-inner"><i class="fa fa-arrow-circle-up"></i></span>
</div>

<?php
displayCookiesAlert(); //cookies.php
?>

</body>
</html>

<?php
closeDBConnection();
?>

