<?php
/*
API Jambonbill/Resume
a quick json api. not REST 
 */
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
session_start();

require __DIR__."/../../vendor/autoload.php";



$dat=[];//payload

$dat['date']=date('c');//payload

$dat['presentation']="this is my presentation";
$dat['skills']=[];//List of skills
$dat['projects']=[];//list of projects
$dat['work_experience']=[];//past work experience
$dat['portfolio']='https://portfolio.jambonbill.org/';
$dat['contact']='pierre.boquet@petscii.org';



exit(json_encode($dat, JSON_PRETTY_PRINT));//pretty json ?
