<?php
	include 'DatabaseConfig.php';
	
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	} 
	
	
    $key = $_POST['key'];
    $gname = $_POST['gname'];
    $gmake = $_POST['gmake'];
    $gimage = $_POST['gimage'];
    $gkva = $_POST['gkva'];
    $goutput = $_POST['goutput'];
    $gphase = $_POST['gphase'];
    $gfuel = $_POST['gfuel'];
    $gnoise = $_POST['gnoise'];
	

	
	if(strcmp($AppKey,$key)==0){
		
		
		
		$sql = "INSERT INTO generator(g_name,g_make,g_image,g_kva,g_output,g_phase,g_fuel,g_noise) VALUES ('$gname','$gmake','$gimage','$gkva','$goutput','$gphase','$gfuel','$gnoise')";
		if(mysqli_query($conn, $sql)){
			

		
		echo json_encode(['success' => true ,'message' => 'sucess']);
			
		}
		else{
			
				echo json_encode(['success' => true ,'message' => 'faild']);
			
		}
		
		
		
		}else{
		echo json_encode(['success' => false ,'pid' => $last_id]);
		
	}
	
	
	
	$conn->close();
?>