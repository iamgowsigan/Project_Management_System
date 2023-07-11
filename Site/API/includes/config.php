<?php
	require_once 'vendor/autoload.php';
	include('database.php');
	$con = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
	error_reporting(0);
	
	//S3
	$bucketName = "trendsresearch";
	$s3 = new Aws\S3\S3Client([
	'region' => 'me-central-1',
	'version' => 'latest',
	'http' => [
	'verify' => false
	],
	'credentials' => [
	'key' => 'AKIATHCD5XMKATXHR77U',
	'secret' => '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'
	]
	]);
	//S3End
	//S3SETTINGS
	
	$imgloc="../mec/";
	$fileloc=$_SERVER['SERVER_NAME']."/FlutterProjects/GensetcaresProject/Site/mec/";
	//$imgloc="https://d3tw0q0jrfvt8m.cloudfront.net/";
	$production="0";
	//S3SETTINGSEND
	
	// Check connection
	if (mysqli_connect_errno()) {
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	
	
	$adminid = $_SESSION['userid'];
	$username = $_SESSION['username'];
	$adminname = $_SESSION['adminname'];
	$login = $_SESSION['login'];
	$adminpower = $_SESSION['power'];
	$projectname = "Gensetcares";
	$projectcode = "TR";
	$currency = " AED ";
	$shopurl = "https://www.trendsresearch.com/";
	
	$query1 = mysqli_query($con, "Select * from admin_theam WHERE t_id=1");
	while ($rowp = mysqli_fetch_array($query1)) {
		
		$menumode = $rowp['left_menu'];
		$bodymode = $rowp['content_area'];
		$iconmode = $rowp['left_menu_icon'];
		$adlistcount = $rowp['ad_list'];
		$activitylistcount = $rowp['activity_list'];
		
	}
	
  	$expertRaw = '[
	
	{"id": "0", "lable": "Bank Person", "lable_arab": "Bank Person"},
	{"id": "1", "lable": "Service Person", "lable_arab": "Service Person"}
	]';
	$expertLevel = json_decode($expertRaw, true);

	$phaseRaw = '[
	
	{"id": "1", "lable": "Single-Phase", "lable_arab": "Single-Phase"},
	{"id": "2", "lable": "Three-Phase", "lable_arab": "Three-Phase"}
	]';
	$phaseLevel = json_decode($phaseRaw, true);

	$fuelRaw = '[
	
	{"id": "1", "lable": "Petrol", "lable_arab": "Petrol"},
	{"id": "2", "lable": "Diesel", "lable_arab": "Diesel"},
	{"id": "3", "lable": "Kerosene", "lable_arab": "Kerosene"}
	]';
	$fuelLevel = json_decode($fuelRaw, true);
	
	$roleRaw = '[
	
	{"id": "1", "lable": "Manager", "lable_arab": "Manager"},
	{"id": "2", "lable": "Staff", "lable_arab": "Staff"}
	]';
	$rolelist = json_decode($roleRaw, true);
	
	$yesNoRaw = '[
	
	{"id": "1", "lable": "Yes", "lable_arab": "Yes"},
	{"id": "2", "lable": "No", "lable_arab": "No"}
	]';
	$yesNolist = json_decode($yesNoRaw, true);


	$serviceCheckRaw = '[
	{"id": "1", "lable": "Check the oil Level", "lable_arab": "General inspection"},
	{"id": "2", "lable": "Check the fuel Level", "lable_arab": "Test batteries"},
	{"id": "3", "lable": "Check the air filter", "lable_arab": "Check intake and exhaust"},
	{"id": "4", "lable": "Inspect the fuel system", "lable_arab": "Manual start"},
	{"id": "5", "lable": "Check the spark plug", "lable_arab": "Engine exercise"},
	{"id": "6", "lable": "Check the Battery if applicable", "lable_arab": "Adjustments"},
	{"id": "7", "lable": "Inspect the generators overall condition", "lable_arab": "Repairs"},
	{"id": "8", "lable": "Check the circuit breakers", "lable_arab": "Replace filters"},
	{"id": "9", "lable": "Check the output voltage", "lable_arab": "Lubrication"},
	{"id": "10", "lable": "Test the generator", "lable_arab": "Cleaning"}
	]';
	$serviceCheckList = json_decode($serviceCheckRaw, true);


	$ReplaceablepartRaw = '[
	{"id": "1", "lable": "Oil filter", "lable_arab": "Oil filter"},
	{"id": "2", "lable": "Fuel Filter", "lable_arab": "Fuel Filter"},
	{"id": "3", "lable": "Coolant", "lable_arab": "Coolant"},
	{"id": "4", "lable": "Belts", "lable_arab": "Belts"},
	{"id": "5", "lable": "Hoses", "lable_arab": "Hoses"},
	{"id": "6", "lable": "Rotor coils", "lable_arab": "Rotor coils"},
	{"id": "7", "lable": "Brushless exciter", "lable_arab": "Brushless exciter"},
	{"id": "8", "lable": "Replace filters", "lable_arab": "Replace filters"},
	{"id": "9", "lable": "Complete spare stator", "lable_arab": "Complete spare stator"},
	{"id": "10", "lable": "Stator slot wedge material", "lable_arab": "Stator slot wedge material"},
	{"id": "11", "lable": "Replacement pumps", "lable_arab": "Replacement pumps"},
	{"id": "12", "lable": "Fuel gauge", "lable_arab": "Fuel gauge"}
	]';
	$ReplaceablepartList = json_decode($ReplaceablepartRaw, true);

	
	///Project Based Parameters
	
	$researchField = "research.r_id, research.c_id, research.e_id, research.plan, research.r_title, research.r_title_arab, research.r_sub, research.r_sub_arab, research.r_image, research.r_image_arab, research.r_date, research.r_like, research.r_view, research.r_star, research.r_count, research.r_updated, research.r_dated, research.r_active, research.complete";
	
	$publicationField = "publication.p_id, publication.c_id, publication.e_id, publication.plan, publication.p_title, publication.p_sub, publication.p_image, publication.p_image2, publication.pdf, publication.p_price, publication.p_code, publication.p_date, publication.p_like, publication.p_view, publication.p_star, publication.p_count, publication.p_active, publication.complete, publication.p_dated,publication.language";
	
	$eventField = "occasion.o_id, occasion.c_id, occasion.e_id, occasion.o_title, occasion.o_title_arab, occasion.o_sub, occasion.o_sub_arab,occasion. o_image, occasion.o_image_arab, occasion.o_pdf, occasion.o_video, occasion.o_video_url, occasion.o_date, occasion.o_time, occasion.o_like, occasion.o_view, occasion.o_star, occasion.o_count, occasion.o_active, occasion.complete, occasion.o_dated";
	
	$planraw = '[
	
	{"id": "FREE", "lable": "Free", "lable_arab": "Free"},
	{"id": "SUBSCRIPTION", "lable": "Subscription", "lable_arab": "Subscription"}
	]';
	$plan = json_decode($planraw, true);

	$planPubraw = '[
	
		{"id": "FREE", "lable": "Free", "lable_arab": "Free"},
		{"id": "SUBSCRIPTION", "lable": "Subscription", "lable_arab": "Subscription"},
		{"id": "PAID", "lable": "Paid", "lable_arab": "Paid"}
		]';
		$planpub = json_decode($planPubraw, true);
	
	$languageraw = '[
	
	{"id": "1", "lable": "English", "lable_arab": "English"},
	{"id": "2", "lable": "Arabic", "lable_arab": "عربي"},
	{"id": "3", "lable": "French", "lable_arab": "فرنسي"}
	]';
	$languagelist = json_decode($languageraw, true);
	
	
	$mediascreenraw = '[
	
	{"id": "1", "lable": "English", "lable_arab": "English"},
	{"id": "2", "lable": "Arabic", "lable_arab": "عربي"},
	{"id": "3", "lable": "French", "lable_arab": "فرنسي"}
	]';
	$mediascreen = json_decode($langumediascreenrawageraw, true);
	
	
	
?>