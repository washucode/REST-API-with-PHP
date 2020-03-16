<?php


class Database{
	
	private $serverName  = 'DESKTOP-33TD627';
    private $connectioninfo = array("Database"=>"New Muthokinju Hardware Ltd Database","UID"=>"esther","PWD"=>"esther");
    public function getConnection(){		
		$conn = sqlsrv_connect($this->serverName,$this->connectioninfo);
		if($conn){
			
			return $conn;
		} else {
           echo "connection error";
		}
    }
}



?>