<?php

    $production = false;

    $server = 'localhost';
    $result = 'No status';
    $dbname = 'asigurat_electrodeals';
    $tableDiscounted = "all_discounted_products";
    $tableValid = "all_valid_products";

    if($production){
        $username = 'asigurat_electro';
        $password = 'Electro2018';
    }else{
        $username = 'root';
        $password = 'ciobotaru101010';
    }
?>