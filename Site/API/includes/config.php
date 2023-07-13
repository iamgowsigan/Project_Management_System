<?php
	require_once 'vendor/autoload.php';
	include('database.php'); 
	
	$con = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);
	error_reporting(0);
	
	
	// Check connection
	if (mysqli_connect_errno())
	{
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	
	
	$adminid=$_SESSION['userid'];
	$username=$_SESSION['username'];
	$adminname=$_SESSION['adminname'];
	$login=$_SESSION['login'];
	$adminpower=$_SESSION['power'];
	$projectname="Drooob";
	$projectcode="DR";
	$currency=" AED ";
	
	$query1 = mysqli_query($con, "Select * from admin_theam WHERE t_id=1");
	while ($rowp = mysqli_fetch_array($query1)) {	
		
		$menumode=$rowp['left_menu'];
		$bodymode=$rowp['content_area'];
		$iconmode=$rowp['left_menu_icon'];
		$adlistcount=$rowp['ad_list'];
		$activitylistcount=$rowp['activity_list'];
		
	}
	
?>	