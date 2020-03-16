<?php


class Methods{
	private $conn;
	public function __construct($db){
        $this->conn = $db;
	}	
	
	

	function create(){
		

		$query = "INSERT into  Equity_Transactions(Account,Amount,TDate,TReference,datestamp,Synced) values ('$this->Account','$this->Amount','$this->TDate','$this->TReference', '$this->datestamp' ,0)";
		$query2= sqlsrv_query($this->conn, $query);
	 	
		if($query2){
			http_response_code(201);         
			echo json_encode(array("responseCode" => "OK",'responseMessage'=> "SUCCESSFUL"));
		}
		else{
			return false;
		}
		

			 
	 }

	 function read(){	
		 
		$query2 =  "SELECT * FROM client where Account=".$this->account; 
	
		$result = sqlsrv_query($this->conn, $query2,array(), array( "Scrollable" => 'static' ));
		
		// if($this->id) {
		// 	$stmt = $this->conn->prepare("SELECT * FROM ".$this->itemsTable." WHERE id = ?");
		// 	$stmt->bind_param("i", $this->id);					
		// } else {
		// 	$stmt = $this->conn->prepare("SELECT * FROM ".$this->itemsTable);		
		// }		
		// $stmt->execute();			
		// $result = $stmt->get_result();
		
		if(sqlsrv_num_rows($result) >0){
			$row = sqlsrv_fetch_array($result);
			
			$name = $row["Name"];
			$account = $row["Account"];
			
			http_response_code(201);     
			echo json_encode(
				array("amount" => 0,"billName"=>$name,"billNumber"=>0,"billCode"=>$account,"createdon"=>date('Y-m-d H:i:s'),"customerName"=>$name,
				"customerRefNumber"=>$account, "description"=>"Account Found","type"=>"1")
			);
			
		}
		// else{
		// 	http_response_code(404);     
		// 	echo json_encode(
		// 		array("amount" => 0,"billName"=>null,"billNumber"=>null, "description"=>"Account not Found","type"=>"1")
		// 	);
		// } 
		
		
		
		
	}

	}	 



?>