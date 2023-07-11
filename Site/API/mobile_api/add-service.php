<?php
	include 'DatabaseConfig.php';
	
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	} 
	
	
	$image = $_POST['image'];
    $key = $_POST['key'];
    $bid = $_POST['bid'];
    $sid = $_POST['sid'];
    $uid = $_POST['uid'];
    $ichecklist = $_POST['ichecklist'];
    $iremark = $_POST['iremark'];
    $icost = $_POST['icost'];
    $ilat= $_POST['ilat'];
    $ilng= $_POST['ilng'];
    $icomplete= $_POST['icomplete'];
    $lastid= $_POST['lastid'];
    $iimage= $_POST['iimage'];
   
   
	
	
	$filename=$_FILES['image']['name'];
	
	if($filename=="" ||  $filename==null){
		$filename="";
		}else{
		
		
		$filename = $_FILES['image']['name'];
		$file_tmp = $_FILES['image']['tmp_name'];
		$temp = explode(".", $_FILES["image"]["name"]);
		$filename = 'service_' . round(microtime(true)) . '.' . end($temp);
		$file_type=$_FILES['image']['type'];
		
		if($production=="1"){
			
			$result = $s3->putObject([
			'Bucket' => $bucketName,
			'Key'    => $filename,
			'ContentType'    => $file_type,
			'SourceFile' => $file_tmp			
			]);
			}else{
			
			move_uploaded_file($file_tmp, $imgloc . $filename);
		}
		
		
		
		
	}
	
	
	
	
	$response = array();  
	
	
	if(strcmp($AppKey,$key)==0){
		
	
		$sql = "UPDATE inspection SET 
		u_id='$uid',
		b_id='$bid',
		s_id='$sid',
		i_checklist='$ichecklist',
		i_remark='$iremark',
		i_cost='$icost',
		i_image='$filename',
		i_lat='$ilat',
		i_image='$iimage',
		i_lng='$ilng',
		i_complete='$icomplete'
		WHERE i_id='$lastid'";
		
		
		if(mysqli_query($conn, $sql)){
			//$last_id = $conn->insert_id;
			
			
			
			echo json_encode(['success' => true,'filename' => "$filename",'sql'=>$sql ]);
			
		}
		else{
			echo json_encode(['success' => false,'filename' => "0",'sql'=>$sql]);
		}
		
		}else{
		echo json_encode(['success' => false,'filename' => "0",'sql'=>$sql]);
		
	}
	
	
	
	$conn->close();
?>