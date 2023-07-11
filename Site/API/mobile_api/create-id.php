<?php
	include 'DatabaseConfig.php';
	
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	} 
	
	
    $key = $_POST['key'];
    $sid = $_POST['sid'];
    $value = $_POST['value'];
	
	
	
	
	if(strcmp($AppKey,$key)==0){
		
		$last_id='';
 
		
		
		if($value=="inspection"){
			$sql = "INSERT INTO inspection(s_id) VALUES ('$sid')";	
		}
		
		if($value=="replacement"){
	        $sql = "INSERT INTO replacement(s_id) VALUES ('$sid')";	
		}
		
		if($value=="compliant"){
	        $sql = "INSERT INTO compliant(s_id) VALUES ('$sid')";		
		}
		
		if(mysqli_query($conn, $sql)){
			$last_id = $conn->insert_id;
		}
		
		
		
		
		echo json_encode(['success' => true,'last_id' => $last_id, 'sql'=>$sql  ]);
		
		
		
		
		
		} else{
		echo json_encode(['success' => false,'filename' => "0",'sql'=>$sql]);
		
	}
	
	
	
	$conn->close();
?>