<?php
/*
API Jambonbill/Portfolio
a quick json api. not REST 
 */
header('Content-Type: application/json');
//session_start();

require __DIR__."/../../vendor/autoload.php";

$B=new Djang\Base;
$API=new JAM\APIPortfolio($B);

$data=$API->itemsPublic();

print_r($data);