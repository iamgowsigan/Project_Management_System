<?php
	include 'DatabaseConfig.php';
	
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	} 
	
	
	
	$key = $_POST['key'];
	$uid = $_POST['uid'];
	
	
	
	if(strcmp($AppKey,$key)==0){
		
		
		$user=array();
		$siteList=array();
		
		
		
		
		
		$sql = "SELECT *  FROM user WHERE u_id=$uid";
		$result1 = $conn->query($sql);	
		if ($result1->num_rows >0) 
		{
			while($row1 = $result1->fetch_assoc()) 
			{	
				mysqli_query($conn, "UPDATE user SET last_login=now() WHERE u_id='$uid'");
				$joinall=$row1;
				
				array_push($user,$joinall);
			}
		} 
		
		
		$sql = "SELECT site_user.*, sites.*,bank.*,generator.* FROM site_user 
		JOIN sites ON sites.s_id=site_user.s_id 
		JOIN bank ON bank.b_id=sites.b_id 
        JOIN generator ON generator.g_id=sites.g_id WHERE site_user.u_id=$uid ORDER BY sites.s_servicedate ASC ";
		$result1 = $conn->query($sql);	
		if ($result1->num_rows >0) 
		{
			while($row1 = $result1->fetch_assoc()) 
			{	
			
				$joinall=$row1;
				array_push($siteList,$joinall);
			}
		} 
		
		
		
		
		
		
		
		
		
		
		
		echo json_encode(['success' => true ,'user'=>$user ,'siteList'=>$siteList]);
		
		
		
		}else{
		
		echo json_encode(['success' => false, 'user'=>$user,'siteList'=>$siteList ]);
		
		
		
	}



$conn->close();
?>