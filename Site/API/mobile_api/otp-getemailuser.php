<?php
	include 'DatabaseConfig.php';
	
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	} 
	
	
	$key = $_POST['key'];
    $email = $_POST['email'];

	
	$response = array();  
	
	
	if(strcmp($AppKey,$key)==0){
		

		$sql = "SELECT * FROM user WHERE email='$email' ORDER BY u_id DESC LIMIT 1";
		$result = $conn->query($sql);
		
		if ($result->num_rows >0) 
		{
			while($row[] = $result->fetch_assoc()) 
			{
				$response = $row;
			}
			echo json_encode(['success' => true,'old' => true]);
		} 
		else 
		{
			
			echo json_encode(['success' => true,'old' => false  ]);
			
			
			
		}
		
		

	}
	else{
		echo json_encode(['success' => false,'old' => false  ]);
		
	}
	
	
	
	$conn->close();
?>