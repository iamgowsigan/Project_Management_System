<?php
	include 'DatabaseConfig.php';
	
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	} 
	
	
    $key = $_POST['key'];
    $id = $_POST['id'];
    $value = $_POST['value'];
   

	if(strcmp($AppKey,$key)==0){

	
		if($value=="inspection"){
	        $sql = "DELETE FROM inspection WHERE i_id=$id";
			if(mysqli_query($conn, $sql)){
		     
		    echo json_encode(['success' => true,'message'=> "Deleted Successfully"]);
			
		}else{
			 echo json_encode(['success' => false]);
		}
		
		}else if($value=="replacement"){
		        $sql = "DELETE FROM replacement WHERE r_id=$id";
		if(mysqli_query($conn, $sql)){
		     echo json_encode(['success' => true,'message'=> "Deleted Successfully"]);
		}else{
			 echo json_encode(['success' => false]);
		}
	
		}else if ($value=="compliant"){
		    $sql = "DELETE FROM compliant WHERE c_id=$id";
			if(mysqli_query($conn, $sql)){
		    echo json_encode(['success' => true,'message'=> "Deleted Successfully"]);
		
		}else{
			 echo json_encode(['success' => false]);
		}

		}
		
		
	
		
		}else{
		echo json_encode(['success' => false]);
		
	}
	
	
	
	$conn->close();
?>