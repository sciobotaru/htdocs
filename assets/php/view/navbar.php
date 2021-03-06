<?php
function getNavBar()
{
    $allProducts = 0;
    try {
        $allProducts = getTotalNumberOfProducts('all_discounted_products');
    } catch (Exception $e) {}
        finally {

?>
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
                <div class="form-group"><label class="control-label" for="search-field"><i class="glyphicon glyphicon-search"></i></label><input class="form-control search-field" type="search" name="search" placeholder="Cauta in <?php echo $allProducts; ?> produse" autocomplete="on" inputmode="verbatim" id="search-field">
                </div>
            </form>
        </div>
    </div>
</nav>
<?php
        }
}
?>