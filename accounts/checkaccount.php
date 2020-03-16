<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once '../Database/db.php';
include_once '../class/Methods.php';

$database = new Database();
$db = $database->getConnection();
 
$record = new Methods($db);

$record->account = (isset($_GET['account']) && $_GET['account']) ? $_GET['account'] : '0';

$result = $record->read();


?>