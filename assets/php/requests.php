<?php
$hotDealsMessage;
$requestPage="";
$requestCategorie="";
$requestPret="";
$requestMagazin="";
$requestSearch="";
$query = NULL;

function parseRequest()
{
    global $hotDealsMessage;
    global $requestPage;
    global $requestCategorie;
    global $requestPret;
    global $requestMagazin;
    global $requestSearch;
    global $query;

    $parts = parse_url($_SERVER['REQUEST_URI']);
    parse_str($parts['query'], $query);

    $hotDealsMessage = "Ofertele zilei (".date("d.m.Y")."):";
    $requestPage = $query['page']; if(empty($requestPage)){$requestPage = 1;}
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

?>