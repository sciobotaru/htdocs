<?php
include 'php/DbConnector.php';
include 'php/XmlHandler.php';

$tableAllProducts = 'all_discounted_products';

function clearAndUpdateDBs()
{
    global $tableAllProducts;
    
    connectToDatabase();
    $xml = readXml();
    if(count($xml) != 0)
    {
    clearDatabase();
    writeXmlToDatabase($xml, $tableAllProducts);
    closeDBConnection();
    }else
    {
        echo '<p style="color:red;">A aparut o eroare la citirea din xml: AllDiscountedProducts.xml. Amandoua trebuie sa contina macar un produs fiecare! Baza de date a ramas aceeasi (nu a fost stearsa sau modificata)</p>';
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ElectroDeals</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.7/journal/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=News+Cycle:400,700">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="assets/css/styles.min.css">
</head>

<body style="background-color:rgb(251,250,250);">
    <div id="LoadingPage" class="loading-icon"><i class="fa fa-spinner fa-spin fa-5x fa-fw"></i></div>
    <div>
        <nav class="navbar navbar-default navigation-clean-search">
            <div class="container">
                <div class="navbar-header"><a class="navbar-brand" href="http://www.electrodeals.ro">ELECTRODEALS </a><button class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button></div>
                <div
                    class="collapse navbar-collapse" id="navcol-1">
                    <ul class="nav navbar-nav">
                        <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false" href="#">Electronice <span class="caret"></span></a>
                            <ul class="dropdown-menu" role="menu">
                                <li role="presentation"><a href="#">Telefoane mobine</a></li>
                                <li role="presentation"><a href="#">Televizoare </a></li>
                                <li role="presentation"><a href="#">Tablete</a></li>
                            </ul>
                        </li>
                        <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false" href="#">Electrocasnice <span class="caret"></span></a>
                            <ul class="dropdown-menu" role="menu">
                                <li role="presentation"><a href="#">Frigidere</a></li>
                                <li role="presentation"><a href="#">Masini de spalat</a></li>
                                <li role="presentation"><a href="#">Fiare de calcat</a></li>
                            </ul>
                        </li>
                        <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false" href="#">Pret <span class="caret"></span></a>
                            <ul class="dropdown-menu" role="menu">
                                <li role="presentation"><a href="#">sub 200 Lei</a></li>
                                <li role="presentation"><a href="#">200 - 500 Lei</a></li>
                                <li role="presentation"><a href="#">500 - 1.000 Lei</a></li>
                                <li role="presentation"><a href="#">1.000 - 2.000 Lei</a></li>
                                <li role="presentation"><a href="#">peste 2.000 Lei</a></li>
                            </ul>
                        </li>
                        <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false" href="#">Magazin <span class="caret"></span></a>
                            <ul class="dropdown-menu" role="menu">
                                <li role="presentation"><a href="#">eMag </a></li>
                                <li role="presentation"><a href="#">Badabum </a></li>
                                <li role="presentation"><a href="#">EvoMag </a></li>
                            </ul>
                        </li>
                    </ul>
                    <form class="navbar-form navbar-left" target="_self">
                        <div class="form-group"><label class="control-label" for="search-field"><i class="glyphicon glyphicon-search"></i></label><input class="form-control search-field" type="search" name="search" placeholder="Cauta in produse" autocomplete="on" inputmode="verbatim"
                                id="search-field"></div>
                    </form>
            </div>
    </div>
    </nav>
    </div>
    <div class="container" style="text-align:center;">
        <div class="row">
            <div class="col-md-12" style="padding-top:26px;padding-bottom:26px;">
                <span>
                    * Logger: 
                        <?php 
                            ////////////////////////
                            clearAndUpdateDBs();
                            ////////////////////////
                        ?>
                    </span>
                    </div>
        </div>
    </div>
    <div class="features-clean" style="background-color:#e5e3fe;">
        <div class="container" style="margin-bottom:-30px;">
            <div class="row features" style="padding:15px;">
                <div class="col-md-4 col-sm-6 item"><i class="fa fa-percent icon"></i>
                    <h3 class="name">Cele mai mari reduceri</h3>
                    <p class="description">Fii la curent cu <strong>cele mai mari reduceri</strong> din magazine la electronice si electrocasnice.</p>
                </div>
                <div class="col-md-4 col-sm-6 item"><i class="glyphicon glyphicon-time icon"></i>
                    <h3 class="name">Actualizare zilnica</h3>
                    <p class="description">Beneficiaza de ultimele reduceri <strong>actualizate in fiecare zi</strong>.</p>
                </div>
                <div class="col-md-4 col-sm-6 item"><i class="glyphicon glyphicon-list-alt icon"></i>
                    <h3 class="name">Cea mai selecta gama de produse</h3>
                    <p class="description">Descopera doar <strong>produsele care conteaza</strong>, atent selectate in functie de review-uri si discount.</p>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-basic">
        <footer>
            <div class="social"><a href="#"><i class="icon ion-social-instagram"></i></a><a href="#"><i class="icon ion-social-snapchat"></i></a><a href="#"><i class="icon ion-social-twitter"></i></a><a href="#"><i class="icon ion-social-facebook"></i></a></div>
            <ul class="list-inline">
                <li><a href="#">Home</a></li>
                <li><a href="#">Services</a></li>
                <li><a href="#">About</a></li>
                <li><a href="#">Terms</a></li>
                <li><a href="#">Privacy Policy</a></li>
            </ul>
            <p class="copyright">ELECTRODEALS© 2018</p>
        </footer>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="assets/js/script.min.js"></script>
</body>

</html>