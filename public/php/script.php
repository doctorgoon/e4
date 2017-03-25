<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
$data = file_get_contents("php://input");
$json = json_decode($data, true);

if (is_array($json) && $json !== false) {

}


?>