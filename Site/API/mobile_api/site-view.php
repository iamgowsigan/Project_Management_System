<?php
	include 'DatabaseConfig.php';
	
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	} 
	
	
	
	$key = $_POST['key'];
	$sid = $_POST['sid'];
	
	
	
	
	if(strcmp($AppKey,$key)==0){
		
		$sitedetails=array();
		$complaintList=array();
		$serviceList=array();
		$replacementList=array();
		$mediaList=array();
		
		$sql1 = "SELECT sites.*,bank.*,generator.* FROM sites 
		JOIN bank ON bank.b_id=sites.b_id 
        JOIN generator ON generator.g_id=sites.g_id WHERE sites.s_id=$sid";
		$result1 = $conn->query($sql1);	
		if ($result1->num_rows >0) 
		{
			while($row1 = $result1->fetch_assoc()) 
			{	
				
				$joinall=$row1;
				array_push($sitedetails,$joinall);
			}
		} 
		
		
		$sql2 = "SELECT * FROM compliant WHERE compliant.s_id=$sid ORDER BY compliant.c_id DESC";
		$result2 = $conn->query($sql2);	
		if ($result2->num_rows >0) 
		{
			while($row2 = $result2->fetch_assoc()) 
			{	
				
				$joinal2=$row2;
				array_push($complaintList,$joinal2);
			}
		} 
		
		$sql3 = "SELECT * FROM inspection WHERE inspection.s_id=$sid ORDER BY inspection.i_id DESC ";
		$result3 = $conn->query($sql3);	
		if ($result3->num_rows >0) 
		{
			while($row3 = $result3->fetch_assoc()) 
			{	
				
				$joinal3=$row3;
				array_push($serviceList,$joinal3);
			}
		}
		
		$sql4 = "SELECT * FROM replacement WHERE replacement.s_id=$sid ORDER BY replacement.r_id DESC ";
		$result4 = $conn->query($sql4);	
		if ($result4->num_rows >0) 
		{
			while($row4 = $result4->fetch_assoc()) 
			{	
				
				$joinal4=$row4;
				array_push($replacementList,$joinal4);
			}
		}
		
		$sql4 = "SELECT * FROM media WHERE s_id=$sid";
		$result4 = $conn->query($sql4);	
		if ($result4->num_rows >0) 
		{
			while($row4 = $result4->fetch_assoc()) 
			{	
				
				$joinal4=$row4;
				array_push($mediaList,$joinal4);
			}
		}
		
		echo json_encode(['success' => true ,'sitedetails'=>$sitedetails ,'complaintList'=>$complaintList,'serviceList'=>$serviceList,'replacementList'=>$replacementList ,'mediaList'=>$mediaList ]);
		
		
		
		}else{
		
		echo json_encode(['success' => false, 'sitedetails'=>$sitedetails]);
		
		
		
	}
	
	
	
	$conn->close();
?>