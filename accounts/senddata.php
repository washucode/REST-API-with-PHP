<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
 
include_once '../Database/db.php';
include_once '../class/Methods.php';
 
$database = new Database();
$db = $database->getConnection();
$Trans = new Methods($db);
 
$data = json_decode(file_get_contents("php://input"));

if(!empty($data->billNumber) && !empty($data->billAmount) && !empty($data->bankreference)){    

    $Trans->Account = $data->billNumber;
    $Trans->Amount = $data->billAmount;
    $Trans->TReference= $data->bankreference;
   	
    $Trans->TDate = date('Y-m-d H:i:s'); 
    $Trans->datestamp = date('Y-m-d H:i:s');
    $Trans->Synced = 0;
    
    $Trans->create();    
}   
        
?>