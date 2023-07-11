<?php
	include 'DatabaseConfig.php';
	
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	} 
	
	
	$key = $_POST['key'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $code = $_POST['code'];
	
	
	$response = array();  
	
	
	if(strcmp($AppKey,$key)==0){
		
		
			
		
		
		$sql = "SELECT * FROM user WHERE phone='$phone' OR email='$email' ORDER BY u_id DESC LIMIT 1";
		$result = $conn->query($sql);
		
		if ($result->num_rows >0) 
		{
			while($row[] = $result->fetch_assoc()) 
			{
				$response = $row;
			}
			echo json_encode(['success' => true,'new' => false,'user' => $response ]);
		} 
		else 
		{
			
			echo json_encode(['success' => true,'new' => true,'user' => $response ]);
			
			
			
		}
		
		
		
		
	
		
	}
	else{
		echo json_encode(['success' => false,'new' => false,'user' => $response ]);
		
	}
	
	
	
	$conn->close();
?>