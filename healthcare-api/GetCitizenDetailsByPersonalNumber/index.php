<?php
	ob_start();
	session_start();
	require_once '../dbconnect.php';

	if (!isset($_GET['personalNr'])) {
		$data = [
			"Error" => "param 'personalNr' not found!"
		];
		
	} else { 
		$res = $conn->query("SELECT * FROM users WHERE personal_nr = '" . $_GET['personalNr'] ."' LIMIT 1");
		
		 
		if($res->num_rows > 0) { 
			$data = mysqli_fetch_array($res, MYSQLI_ASSOC); 
			
		} else {
			$data = [
				"No user where found!"
			];
		} 
	}
	
	echo json_encode($data, JSON_PRETTY_PRINT);
	exit; 

?>
 