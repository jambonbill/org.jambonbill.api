<?php
/*
API Jambonbill/Portfolio
a quick json api. not REST 
 */
header('Content-Type: application/json');
session_start();

require __DIR__."/../../vendor/autoload.php";

$B=new Djang\Base;
$API=new JAM\APIPortfolio($B);


$dat=[];//payload
$dat['date']=date('c');//payload
$dat['data']=$API->itemsPublic();
exit(json_encode($dat));