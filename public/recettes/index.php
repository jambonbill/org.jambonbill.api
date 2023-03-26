<?php
/*
API Jambonbill/Recettes
a quick json api. not REST 
 */
header('Content-Type: application/json');
session_start();

require __DIR__."/../../vendor/autoload.php";

$B=new Djang\Base;
$API=new JAM\APIRecettes($B);

$dat=[];//payload
$dat['date']=date('c');//payload

if(!empty($_GET['id'])){
	$dat=$API->item($_GET['id']);
}else{
	$dat['data']=$API->items();
}

exit(json_encode($dat, JSON_PRETTY_PRINT));//pretty json ?
