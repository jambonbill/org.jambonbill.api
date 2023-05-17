<?php
/*
API Jambonbill/Radio
a quick json api. not REST 
 */
header('Content-Type: application/json');
session_start();

require __DIR__."/../../vendor/autoload.php";

$B=new Djang\Base;
$API=new JAM\APIRadio($B);

$dat=[];//payload
$dat['date']=date('c');//payload

if(!empty($_GET['id'])){
	$dat['radio']=$API->get($_GET['id']);
	$dat['urls']=$API->urls($_GET['id']);
}else{
	$dat['radios']=$API->radios();
}

exit(json_encode($dat, JSON_PRETTY_PRINT));//pretty json ?
