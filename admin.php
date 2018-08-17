<?php
include 'assets/php/includes.php';
include 'assets/php/xml.php';

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
    <?php getHead(); ?>
</head>

<body>
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
                                id="search-field">
                        </div>
                    </form>
            </div>
        </div>
    </nav>

    </div>


    
    <div class="container">
        <div class="row">
            <div class="col-md-12">
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
    <?php getFooter(); ?>
</body>

</html>