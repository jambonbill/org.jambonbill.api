<?php
header('Content-Type: application/json');

$dat=[];//payload
$dat['error']='404';//payload

exit(json_encode($dat, JSON_PRETTY_PRINT));