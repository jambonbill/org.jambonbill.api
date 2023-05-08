<?php
/*
Mock API Telethon
 */
header('Content-Type: application/json');
session_start();

sleep(3);//

$dat=[];//payload
$dat['date']=date('c');//payload

$dat['totalDons']=12200+ rand(0,1000);

$partenaires=[];
$partenaires[]=["nom"=>"Auchan","logo"=>"https://www.mrgoodfish.com/wp-content/uploads/2020/08/LOGOTYPE-AUCHAN.png"];
$partenaires[]=["nom"=>"Decathlon","logo"=>"https://upload.wikimedia.org/wikipedia/commons/thumb/c/c4/Decathlon_Logo.svg/800px-Decathlon_Logo.svg.png"];
$partenaires[]=["nom"=>"Afpa Mornac","logo"=>"https://www.afpa.fr/documents/21653/12675794/logo-afpa.png"];
$partenaires[]=["nom"=>"Cafe des sports","logo"=>""];

$dat['partenaires']=$partenaires;




exit(json_encode($dat, JSON_PRETTY_PRINT));//pretty json ?
