<?php
require 'popup.php';
include 'php/DbConnector.php';
include 'php/ViewGenerator.php'; //for getStars() function

//------------------ ACTION HERE -----------------

parseUrl();
inputCheck();
getHtml($requestPage);

//------------------ ACTION HERE ------------------


$responseProduct;
$hotDealsMessage;

$requestPage="";
$requestCategorie="";
$requestPret="";
$requestMagazin="";
$requestSearch="";


//get url and output filter variables like: page nunmber, keyword search, price, shop, category
//default values will be applied
function parseUrl()
{
    global $requestPage;
    global $requestCategorie;
    global $requestPret;
    global $requestMagazin;
    global $requestSearch;
    
    global $hotDealsMessage;
    $query = NULL;
    
    $hotDealsMessage = "Ofertele zilei (".date("d.m.Y")."):";
    
    $parts = parse_url($_SERVER['REQUEST_URI']);
    parse_str($parts['query'], $query);
    
    $requestPage = $query['page'];
    if(empty($requestPage)){$requestPage = 1;}
    
    $requestCategorie = $query['categorie'];
    $requestPret = $query['pret'];
    $requestMagazin = $query['magazin'];
    $requestSearch = $query['search'];
    
    if(!empty($requestCategorie) || !empty($requestPret) || !empty($requestMagazin) || !empty($requestSearch))
    {
        $hotDealsMessage = '<a class="btn btn-primary btn-xs" type="button" href="/">X</a> Filtre: ';
    }
    
    if(!empty($requestSearch)) { $hotDealsMessage .= "cautare => \"" . $requestSearch . "\" "; }
    
    if(!empty($requestCategorie))
    {
         $hotDealsMessage .= "categorie => " . $requestCategorie . " ";
    }
    
    if(!empty($requestPret))
    {
         $hotDealsMessage .= "pret => " . $requestPret . " ";
    }
    
    if(!empty($requestMagazin))
    {
         $hotDealsMessage .= "magazin => " . $requestMagazin . " ";
    }
}

//check filter variables from link for security
function inputCheck()
{
    //verifica valorile de intrare
    //pagina trebuie sa fie numar
    //celelalte trebuie sa fie cuvinte predefinite
}

//output HTML with the products
function getProducts()
{
    global $requestPage;
    global $requestCategorie;
    global $requestPret;
    global $requestMagazin;
    global $requestSearch;

    
    if($requestCategorie == "" && $requestPret == "" && $requestMagazin == "" && $requestSearch == "") //get first page
    {
        if($requestPage == "") $requestPage = (int)1;

        $result = getProductsFromDatabase((int)$requestPage, 
                                            $requestCategorie, 
                                            $requestMagazin, 
                                            $requestPret, 
                                            $requestSearch,
                                            'all_discounted_products');
    }
    else //get filtered pages
    {
        $result = getProductsFromDatabase((int)$requestPage, 
                                            $requestCategorie, 
                                            $requestMagazin, 
                                            $requestPret, 
                                            $requestSearch,
                                            'all_discounted_products');
    }
    
    
    if($result->num_rows == 0)
    {
        echo '<p class="text-center">Ne pare rau, nu am gasit niciun produs care sa corespunda criteriilor cautate. <a href="/"> Reseteaza filtrele.</a></p>';
    }
    
    while($row = $result->fetch_assoc()) 
    {
        $stars = getStars($row["Rating"]);

        if($row["NumberOfReviews"] == 1)
        {
            $reviewFormat = "review";
            $noOfReviews = "(".$row["NumberOfReviews"].")";
        }
        elseif($row["NumberOfReviews"] == "")
        {
            $reviewFormat = "";
            $noOfReviews = "";
        }
        elseif($row["NumberOfReviews"] < 20)
        {
            $reviewFormat = "review-uri";
            $noOfReviews = '('.$row["NumberOfReviews"].')';
        }else
        {
            $reviewFormat = "de review-uri";
            $noOfReviews = '('.$row["NumberOfReviews"].')';
        }

       
    	 echo
        '
        <div class="col-md-3 col-sm-4 col-xs-6 product-item">
                <div class="product-container">
                    <div class="row">
                        <div class="col-md-12">
                            <img src="assets/img/'.strtolower($row["Vendor"]).'.jpg" style="height:18px;" href="#" title="'.$row["Vendor"].'" data-toggle="popover" data-trigger="hover" data-placement="right" data-content="">
                        </div>
                        <div class="col-md-12">
                            <img class="hot-label" src="assets/img/hotdeal'.$row["HotLevel"].'.jpg" />
                            <span class="discount-label"><strong>'.$row["Discount"].' </strong></span>
                            <div><a href="'.$row["LinkToProduct"].'" target="_blank" class="product-image"><img src="'.$row["LinkToPictureThumbnail"].'" onError="this.onerror=null;this.src=\'/assets/img/noimage.jpg\';" data-bs-hover-animate="pulse" style="margin-top:3px;"></a></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="product-rating">
                            '.$stars.'
                            <a class="hidden-sm hidden-md hidden-lg small-text">'.$noOfReviews.'</a>
                            <a class="hidden-xs small-text">'.$row["NumberOfReviews"].' '.$reviewFormat.'</a>
                            </div>
                            <a href="'.$row["LinkToProduct"].'" target="_blank"><p class="product-description">'.$row["ProductTitle"].'</p></a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="row">
                                <div class="col-md-12" style="color:rgb(17,207,0);">
                                    <p class="discount">'.$row["StockStatus"].'</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="row">
                                <div class="col-xs-6">
                                    <s class="product-old-price">('.$row["OldPrice"].')</s>
                                    <p class="discount">('.$row["Discount"].')</p>
                                </div>
                                <div class="col-xs-6">
                                    <p class="product-price">'.$row["NewPrice"].' Lei</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    	';	
    }
}

//output the HTML server response (entire HTML page)
function getHtml($requestPage)
{
    global $xml;
    global $hotDealsMessage;
    global $totalProducts;
    
    global $requestCategorie; 
    global $requestMagazin; 
    global $requestPret;
    global $requestSearch;
    
    global $popup_script;
    global $popup_event;
    
    connectToDatabase();
    
    echo
    '
    <!DOCTYPE html>
    <html>
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ElectroDeals</title>
    
    <!--------------- EVENT HANDLERS START ------------------------------->
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    '.
    $popup_script
    .'
    <script>
        filterObj = new Object();
        
        $(document).ready(function(){
            $("#urmatoareaup").click(function(){
                var currpage = parseInt($("#currentpageno").text());
                if(currpage < parseInt($("#maxpages").text()))
                {
                    getUrlVars();
                    filterObj.page = ++currpage;
                    location.href = "filter.php?" + $.param(filterObj);
                }
            });
    		
    		$("#anterioaraup").click(function(){
    			var page = parseInt($("#currentpageno").text());
    			if(page>1)
    			{
    				getUrlVars();
                    filterObj.page=--page;
                    location.href = "filter.php?" + $.param(filterObj);
    			}
            });
    		
    		  $("#urmatoareadown").click(function(){
                var currpage = parseInt($("#currentpageno").text());
                if(currpage < parseInt($("#maxpages").text()))
                {
                    getUrlVars();
                    filterObj.page = ++currpage;
                    location.href = "filter.php?" + $.param(filterObj);
                }
                
            });
    		
    		$("#anterioaradown").click(function(){
    			var page = parseInt($("#currentpageno").text());
    			if(page>1)
    			{
    				getUrlVars();
                    filterObj.page=--page;
                    location.href = "filter.php?" + $.param(filterObj);
    			}
            });
    		
    	function getUrlVars() 
    	{
            var vars = {};
            var parts = window.location.href.replace(/[?&]+([^=&]+)=([^&]*)/gi, function(m, key, value) {
                if (vars[key]) {
                    if (vars[key] instanceof Array) {
                        vars[key].push(value);
                    } else {
                        vars[key] = [vars[key], value];
                    }
                } else {
                    vars[key] = value;
                }
            });
            
        	for(var key in vars)
			{
			    if(key=="page")
			    {
			        filterObj.page=vars[key];
			    }
			    if(key=="search")
			    {
			        filterObj.search=vars[key].replace(/\+/g,\' \');
			    }
			    if(key=="pret")
			    {
			        filterObj.pret=vars[key].replace(/\+/g,\' \');
			    }
			    if(key=="magazin")
			    {
			        filterObj.magazin=vars[key];
			    }
			    if(key=="categorie")
			    {
			        filterObj.categorie = vars[key].replace(/\+/g,\' \').replace(/%26/g,\'&\'); //workaround pentru link
			        //alert("Categorie gasita: " + filterObj.categorie); // ----------------- DEBUG ------------------
			    }
			}
			filterObj.page = 1;
        }
        
		//------- CATEGORII START ----
		
        $("#AparateFoto").click(function(){
    			var cat = $("#AparateFoto").text();
    			getUrlVars();
                filterObj.categorie=cat;
                location.href = "filter.php?" + $.param(filterObj);
            });
    	
    	$("#CamereVideo").click(function(){
    			var cat = $("#CamereVideo").text();
    			getUrlVars();
    			filterObj.categorie=cat;
                location.href = "filter.php?" + $.param(filterObj);
            });
            
        $("#Desktop").click(function(){
    			var cat = $("#Desktop").text();
    			getUrlVars();
    			filterObj.categorie=cat;
                location.href = "filter.php?" + $.param(filterObj);
            });    
        
        $("#HomeCinema").click(function(){
    			var cat = $("#HomeCinema").text();
    			getUrlVars();
    			filterObj.categorie=cat;
                location.href = "filter.php?" + $.param(filterObj);
            });
        
        $("#Laptopuri").click(function(){
    			var cat = $("#Laptopuri").text();
    			getUrlVars();
    			filterObj.categorie=cat;
                location.href = "filter.php?" + $.param(filterObj);
            });    
            
        $("#Monitoare").click(function(){
    			var cat = $("#Monitoare").text();
    			getUrlVars();
    			filterObj.categorie=cat;
                location.href = "filter.php?" + $.param(filterObj);
            });
        
		$("#Tablete").click(function(){
    			var cat = $("#Tablete").text();
    			getUrlVars();
    			filterObj.categorie=cat;
                location.href = "filter.php?" + $.param(filterObj);
            });
        
		$("#Telefoane").click(function(){
    			var cat = $("#Telefoane").text();
    			getUrlVars();
    			filterObj.categorie=cat;
                location.href = "filter.php?" + $.param(filterObj);
            });
        
		$("#Televizoare").click(function(){
    			var cat = $("#Televizoare").text();
    			getUrlVars();
    			filterObj.categorie=cat;
                location.href = "filter.php?" + $.param(filterObj);
            });
        
		$("#Aragaze").click(function(){
    			var cat = $("#Aragaze").text();
    			getUrlVars();
    			filterObj.categorie=cat;
                location.href = "filter.php?" + $.param(filterObj);
            });
        
		$("#Aspiratoare").click(function(){
    			var cat = $("#Aspiratoare").text();
    			getUrlVars();
    			filterObj.categorie=cat;
                location.href = "filter.php?" + $.param(filterObj);
            });
        
		$("#Fiare").click(function(){
    			var cat = $("#Fiare").text();
    			getUrlVars();
    			filterObj.categorie=cat;
                location.href = "filter.php?" + $.param(filterObj);
            });
        
		$("#Frigidere").click(function(){
    			var cat = $("#Frigidere").text();
    			getUrlVars();
    			filterObj.categorie=cat;
                location.href = "filter.php?" + $.param(filterObj);
            });
        
		$("#Hote").click(function(){
    			var cat = $("#Hote").text();
    			getUrlVars();
    			filterObj.categorie=cat;
                location.href = "filter.php?" + $.param(filterObj);
            });
        
		$("#Masini").click(function(){
    			var cat = $("#Masini").text();
    			getUrlVars();
    			filterObj.categorie=cat;
                location.href = "filter.php?" + $.param(filterObj);
            });
        
        $("#Imprimante").click(function(){
    			var cat = $("#Imprimante").text();
    			getUrlVars();
    			filterObj.categorie=cat;
                location.href = "filter.php?" + $.param(filterObj);
            }); 
        
        $("#retelistica").click(function(){
    			var cat = $("#retelistica").text();
    			getUrlVars();
    			filterObj.categorie=cat;
                location.href = "filter.php?" + $.param(filterObj);
            }); 
        
        /////////////////////////////////////////////////
        
        $("#Espresoare").click(function(){
    			var cat = $("#Espresoare").text();
    			getUrlVars();
    			filterObj.categorie=cat;
                location.href = "filter.php?" + $.param(filterObj);
            });
        
        $("#Mixere").click(function(){
    			var cat = $("#Mixere").text();
    			getUrlVars();
    			filterObj.categorie=cat;
                location.href = "filter.php?" + $.param(filterObj);
            });
            
        $("#Aparatedeaerconditionat").click(function(){
    			var cat = $("#Aparatedeaerconditionat").text();
    			getUrlVars();
    			filterObj.categorie=cat;
                location.href = "filter.php?" + $.param(filterObj);
            });
            
        $("#Aparatedeincalzire").click(function(){
    			var cat = $("#Aparatedeincalzire").text();
    			getUrlVars();
    			filterObj.categorie=cat;
                location.href = "filter.php?" + $.param(filterObj);
            });   
        
        
		//------- CATEGORII SFARSIT ----
		
		
		
		//------- PRETURI START ----
        
		$("#sub200").click(function(){
    			var price = $("#sub200").text();
    			getUrlVars();
    			filterObj.pret=price;
                location.href = "filter.php?" + $.param(filterObj);
            });
        
		$("#200500").click(function(){
    			var price = $("#200500").text();
    			getUrlVars();
    			filterObj.pret=price;
                location.href = "filter.php?" + $.param(filterObj);
            });
        
		$("#5001000").click(function(){
    			var price = $("#5001000").text();
    			getUrlVars();
    			filterObj.pret=price;
                location.href = "filter.php?" + $.param(filterObj);
            });
        
		$("#10002000").click(function(){
    			var price = $("#10002000").text();
    			getUrlVars();
    			filterObj.pret=price;
                location.href = "filter.php?" + $.param(filterObj);
            });
        
		$("#peste2000").click(function(){
    			var price = $("#peste2000").text();
    			getUrlVars();
    			filterObj.pret=price;
                location.href = "filter.php?" + $.param(filterObj);
            });
        
		//------- PRETURI END ----
		
		
		//------- MAGAZIN START ----
		
		$("#badabum").click(function(){
    			var mag = $("#badabum").text();
    			getUrlVars();
    			filterObj.magazin=mag;
                location.href = "filter.php?" + $.param(filterObj);
            });
        
		$("#flanco").click(function(){
    			var mag = $("#flanco").text();
    			getUrlVars();
    			filterObj.magazin=mag;
                location.href = "filter.php?" + $.param(filterObj);
            });
        
		$("#evomag").click(function(){
    			var mag = $("#evomag").text();
    			getUrlVars();
    			filterObj.magazin=mag;
                location.href = "filter.php?" + $.param(filterObj);
            });
        
		$("#pcgarage").click(function(){
    			var mag = $("#pcgarage").text();
    			getUrlVars();
    			filterObj.magazin=mag;
                location.href = "filter.php?" + $.param(filterObj);
            });
        
        $("#cel").click(function(){
    			var mag = $("#cel").text();
    			getUrlVars();
    			filterObj.magazin=mag;
                location.href = "filter.php?" + $.param(filterObj);
            });
        
        $("#itgalaxy").click(function(){
    			var mag = $("#itgalaxy").text();
    			getUrlVars();
    			filterObj.magazin=mag;
                location.href = "filter.php?" + $.param(filterObj);
            });
        
        $("#avstore").click(function(){
    			var mag = $("#avstore").text();
    			getUrlVars();
    			filterObj.magazin=mag;
                location.href = "filter.php?" + $.param(filterObj);
            });
        
        $("#f64").click(function(){
    			var mag = $("#f64").text();
    			getUrlVars();
    			filterObj.magazin=mag;
                location.href = "filter.php?" + $.param(filterObj);
            });
        
        $("#stradait").click(function(){
    			var mag = $("#stradait").text();
    			getUrlVars();
    			filterObj.magazin=mag;
                location.href = "filter.php?" + $.param(filterObj);
            });
        
        $("#germanos").click(function(){
    			var mag = $("#germanos").text();
    			getUrlVars();
    			filterObj.magazin=mag;
                location.href = "filter.php?" + $.param(filterObj);
            });
        
        //------- MAGAZIN END ----
            
        $("#deleteFilters").click(function(){
    			removeFilters();
            });
        
        function removeFilters()
        {
            location.href = "/";
        }
        
        //-------- MOUSE OVER OPEN MENU -----
        $("#electronice").mouseover(function(){
            $(".dropdown-toggle").parent().addClass("dropdown");
            $(".dropdown-toggle").parent().removeClass("dropdown open");
            $("#electronice").parent().addClass("dropdown open");
            $("#electronice").parent().removeClass("dropdown");
        });
        
        $("#electrocasnice").mouseover(function(){
            $(".dropdown-toggle").parent().addClass("dropdown");
            $(".dropdown-toggle").parent().removeClass("dropdown open");
            $("#electrocasnice").parent().addClass("dropdown open");
            $("#electrocasnice").parent().removeClass("dropdown");
        });
        
        $("#pret").mouseover(function(){
            $(".dropdown-toggle").parent().addClass("dropdown");
            $(".dropdown-toggle").parent().removeClass("dropdown open");
            $("#pret").parent().addClass("dropdown open");
            $("#pret").parent().removeClass("dropdown");
        });
        
        $("#magazin").mouseover(function(){
            $(".dropdown-toggle").parent().addClass("dropdown");
            $(".dropdown-toggle").parent().removeClass("dropdown open");
            $("#magazin").parent().addClass("dropdown open");
            $("#magazin").parent().removeClass("dropdown");
        });
    });
    </script>

    
    <!--------------- EVENT HANDLERS END ------------------------------->
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.7/journal/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=News+Cycle:400,700">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="assets/css/styles.min.css">
    <link rel="stylesheet" href="assets/css/product.css">
	
	<!--                    SOCIAL  START             -->
	
	<!-- Go to www.addthis.com/dashboard to customize your tools --> 
	<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5a89e7382fbdb8f0"></script>
	
	<!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-113149572-1"></script>
    <script>
         window.dataLayer = window.dataLayer || [];
         function gtag(){dataLayer.push(arguments);}
         gtag(\'js\', new Date());
         gtag(\'config\', \'UA-113149572-1\');
    </script>
	
<!-- Start 2performant -->

<script src="https://cdn.2performant.com/l2/link2.js" id="linkTwoPerformant" data-id="l2/0/1/5/7/4/0/8/2/8/1" data-api-host="https://cdn.2performant.com"></script>

<!-- End 2performant -->

<!-- Start ProfitShare Zone -->
<script type="text/javascript">
(function(){
var bsa = document.createElement("script");
bsa.type = "text/javascript";
bsa.async = true;
bsa.src = "//l.profitshare.ro/files_shared/lps/js/wfs/60.js?v=1520543844";
(document.getElementsByTagName("head")[0]||document.getElementsByTagName("body")[0]).appendChild(bsa);
})();
</script>
<!-- End ProfitShare Zone -->        
    
    </head>
    
    <body style="background-color:rgb(251,250,250);"'.$popup_event.'>

    <div>
    
    <!-- NAV BAR start -->
    
    	<nav class="navbar navbar-default navigation-clean-search">
            <div class="container">
                <div class="navbar-header"><a class="navbar-brand" href="http://www.electrodeals.ro">ELECTRODEALS </a><button class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button></div>
                <div class="collapse navbar-collapse" id="navcol-1">
                    <ul class="nav navbar-nav">
                    
                    <!--- no category for the moment
                        <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false" id="electronice" href="#">Electronice <span class="caret"></span></a>
                            <ul class="dropdown-menu" role="menu">
                                <li role="presentation"><a id="AparateFoto" style="cursor: pointer;">Aparate Foto</a></li>
                                <li role="presentation"><a id="CamereVideo" style="cursor: pointer;">Camere Video</a></li>
                                <li role="presentation"><a id="Desktop" style="cursor: pointer;">Desktop PC</a></li>
                                <li role="presentation"><a id="HomeCinema" style="cursor: pointer;">Home Cinema &amp; Audio</a></li>
                                <li role="presentation"><a id="Laptopuri" style="cursor: pointer;">Laptopuri</a></li>
                                <li role="presentation"><a id="Monitoare" style="cursor: pointer;">Monitoare</a></li>
                                <li role="presentation"><a id="Tablete" style="cursor: pointer;">Tablete</a></li>
                                <li role="presentation"><a id="Telefoane" style="cursor: pointer;">Telefoane Mobile</a></li>
                                <li role="presentation"><a id="Televizoare" style="cursor: pointer;">Televizoare</a></li>
                                <li role="presentation"><a id="Imprimante" style="cursor: pointer;">Imprimante</a></li>
                                <li role="presentation"><a id="retelistica" style="cursor: pointer;">Rutere si retelistica</a></li>
                            </ul>
                        </li>
                        <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false" id="electrocasnice" href="#">Electrocasnice <span class="caret"></span></a>
                            <ul class="dropdown-menu" role="menu">
                                <li role="presentation"><a id="Aragaze" style="cursor: pointer;">Aragaze si cuptoare</a></li>
                                <li role="presentation"><a id="Aspiratoare" style="cursor: pointer;">Aspiratoare</a></li>
                                <li role="presentation"><a id="Fiare" style="cursor: pointer;">Fiare de Calcat</a></li>
                                <li role="presentation"><a id="Frigidere" style="cursor: pointer;">Frigidere</a></li>
                                <li role="presentation"><a id="Hote" style="cursor: pointer;">Hote</a></li>
                                <li role="presentation"><a id="Masini" style="cursor: pointer;">Masini de spalat</a></li>
                                
                                <li role="presentation"><a id="Espresoare" style="cursor: pointer;">Espresoare si aparate de cafea</a></li>
                                <li role="presentation"><a id="Mixere" style="cursor: pointer;">Mixere si roboti de bucatarie</a></li>
                                <li role="presentation"><a id="Aparatedeaerconditionat" style="cursor: pointer;">Aparate de aer conditionat</a></li>
                                <li role="presentation"><a id="Aparatedeincalzire" style="cursor: pointer;">Aparate de incalzire</a></li>
                            </ul>
                        </li>
                        --->
                        <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false" id="pret" href="#">Pret <span class="caret"></span></a>
                            <ul class="dropdown-menu" role="menu">
                                <li role="presentation"><a id="sub200" style="cursor: pointer;">sub 200 Lei</a></li>
                                <li role="presentation"><a id="200500" style="cursor: pointer;">200 - 500 Lei</a></li>
                                <li role="presentation"><a id="5001000" style="cursor: pointer;">500 - 1.000 Lei</a></li>
                                <li role="presentation"><a id="10002000" style="cursor: pointer;">1.000 - 2.000 Lei</a></li>
                                <li role="presentation"><a id="peste2000" style="cursor: pointer;">peste 2.000 Lei</a></li>
                            </ul>
                        </li>
                        <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false" id="magazin" href="#">Magazin <span class="caret"></span></a>
                            <ul class="dropdown-menu" role="menu">
                                <li role="presentation"><a id="cel" style="cursor: pointer;">Cel</a></li>
                                <li role="presentation"><a id="stradait" style="cursor: pointer;">StradaIT</a></li>
                                <li role="presentation"><a id="flanco" style="cursor: pointer;">Flanco</a></li>
                                <li role="presentation"><a id="germanos" style="cursor: pointer;">Germanos</a></li>
                                <li role="presentation"><a id="badabum" style="cursor: pointer;">Badabum</a></li>
                                <li role="presentation"><a id="evomag" style="cursor: pointer;">EvoMag</a></li>
                                <li role="presentation"><a id="pcgarage" style="cursor: pointer;">PCgarage</a></li>
                                <li role="presentation"><a id="itgalaxy" style="cursor: pointer;">ITGalaxy</a></li>
                                <li role="presentation"><a id="avstore" style="cursor: pointer;">Avstore</a></li>
                                <li role="presentation"><a id="f64" style="cursor: pointer;">F64</a></li>
                            </ul>
                        </li>
                    </ul>
                    <form class="navbar-form navbar-left" target="_self">
                        <div class="form-group"><label class="control-label" for="search-field"><i class="glyphicon glyphicon-search"></i></label><input class="form-control search-field" type="search" name="search" placeholder="Cauta in '.getTotalNumberOfProducts('all_discounted_products').' produse" autocomplete="on" inputmode="verbatim" id="search-field"></div>
                    </form>
            </div>
    </div>
    </nav>
    
    	
   <!-- NAV BAR end --> 	
    	
    	
    </div>
    
    <div class="container">
    
    <!-- site description -->
    
    <div style="background-color:#dae5e6;">
    <div style="text-align:right;"><span style="float:right;"> <i class="fa fa-close"></i> </span></div>
    <div style="text-align:center;">
        <h4 style="text-align:center;">Telefoane la promotie de la principalele magazine din Romania</h4>
    </div>
    <div style="text-align:center;"><i class="fa fa-heart"></i><span> Oferte actualizate zilnic.</span></div>
    </div>
    
    
    <!-- site description end -->
     
    	<div class="page-header" style="margin-top:5px;">
    		<h4>'.$hotDealsMessage.getFilteredNumberOfProducts($requestCategorie, $requestMagazin, $requestPret, $requestSearch, 'all_discounted_products').'
    		</h4>
    	</div>
 
    	<!-- Loading page icon start 
	    <div id="LoadingPage" class="loading-icon">
    	    <i class="fa fa-spinner fa-spin fa-5x fa-fw"></i>
        </div>-->';
        
        $totalPages = getTotalNumberOfPages(); //functia trebuie chemata DUPA getFilteredNumberOfProducts() !!!! - are dependinta 
        
        echo'
        <ul class="pagination" style="margin:-10px;">
            <li><a aria-label="Previous" style="cursor: pointer;"><span aria-hidden="true" id="anterioaraup"><<</span></a></li>
            <li><a><span id="currentpageno">'.(int)$requestPage.'</span>/<span id="maxpages">'.$totalPages.'</span></a></li>
            <li><a aria-label="Next" style="cursor: pointer;"><span aria-hidden="true" id="urmatoareaup">>></span></a></li>
        </ul>
    	<div class="row product-list" id="productList">
    ';
    
    
    
    /////////////////////////////////////////////////////////////
    //product list here /////////////////////////////////////////
    /////////////////////////////////////////////////////////////
    
    getProducts();
	
	/////////////////////////////////////////////////////////////
	//product list end //////////////////////////////////////////
	/////////////////////////////////////////////////////////////
	
    echo 
    '
    		</div>
    	    <ul class="pagination" style="margin:5px;">
            <li><a aria-label="Previous" style="cursor: pointer;"><span aria-hidden="true" id="anterioaradown"><<</span></a></li>
            <li><a><span id="currentpageno">'.(int)$requestPage.'</span>/<span id="maxpages">'.$totalPages.'</span></a></li>
            <li><a aria-label="Next" style="cursor: pointer;"><span aria-hidden="true" id="urmatoareadown">>></span></a></li>
        </ul>

    </div>
    <div class="features-clean" style="background-color:#e5e3fe;">
    	<div class="container" style="margin-bottom:-30px;">
    		<div class="row features" style="padding:15px;">
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
    	</ul>
    	<p class="copyright">
    		ELECTRODEALS© 2018
    	</p>
    	</footer>
    </div>
    <div class="scroll-top-wrapper"><span class="scroll-top-inner"><i class="fa fa-arrow-circle-up"></i></span></div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="assets/js/script.min.js"></script>
    <!-- script to show pop up when hover -->
    <script>
        $(document).ready(function(){
            $(\'[data-toggle="popover"]\').popover();   
        });
    </script>
          
          
    <!-- Start ProfitShare Zone -->
<script type="text/javascript">
(function(){
  var bsa = document.createElement("script");
     bsa.type = "text/javascript";
     bsa.async = true;
     bsa.src = "//l.profitshare.ro/files_shared/lps/js/wfs/60.js?v=1519410503";
  (document.getElementsByTagName("head")[0]||document.getElementsByTagName("body")[0]).appendChild(bsa);
})();
</script>
	<!-- End ProfitShare Zone -->        
          
    </body>
    </html>
	
	';
	closeDBConnection();
}
?>
