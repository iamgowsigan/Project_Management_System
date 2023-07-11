<?php
	session_start();
	include('includes/config.php');
	//error_reporting(0);
	include 'includes/language.php';
	include 'includes/dbhelp.php';
	include 'includes/formdata.php';
	include 'includes/country.php';
	if(strlen($_SESSION['login'])==0)
	{ 
		header('location:index.php');
	}
	else{
		
		//ADD
		if(isset($_POST['submit']))
		{
			
			$file_name=Uploadimage('ask','image');
			//$file_name2=Uploadimage('categorybanner','image2');
			
			$field['name'] = addslashes($_POST['name']);
			$field['a_name'] = addslashes($_POST['a_name']);
			$field['phone'] = addslashes($_POST['phone']);
			$field['course_time'] = addslashes($_POST['course_time']);
			$field['a_phone'] = addslashes($_POST['a_phone']);
			$field['city'] = addslashes($_POST['city']);
			$field['profile_pic'] = $file_name;
			
			$res=Insertdata("ask",$field);
			if($res!=0){
				$msg = "Success ";
				}else{
				$error = "Deleted ";
			} 
			
			
		}
		
		//Update
		if(isset($_POST['update']))
		{
			
			$eid=intval($_GET['eid']);
			$oldimage = $_POST['oldimage'];
			//$oldimage2 = $_POST['oldimage2'];
			if($_FILES['image']['name']==''){
				$file_name=$oldimage;
				}else{
				$file_name=Uploadimage('ask','image');
			}
			
			$field['name'] = addslashes($_POST['name']);
			$field['a_name'] = addslashes($_POST['a_name']);
			$field['phone'] = addslashes($_POST['phone']);
			$field['course_time'] = addslashes($_POST['course_time']);
			$field['a_phone'] = addslashes($_POST['a_phone']);
			$field['city'] = addslashes($_POST['city']);
			$field['profile_pic'] = $file_name;
			
			$res=Updatedata("ask",$field,"a_id =$eid");
			if($res!=0){
				
				$msg = "Success ";
				}else{
				$error = "something error ";
			} 	
		}
		
		
		//delete
		if ($_GET['action'] == 'del' && $_GET['scid']) {
			$id = intval($_GET['scid']);
			$res=Deletedata("delete from ask where a_id='$id'");
			header("location: ".$_SERVER['PHP_SELF']);
			$msg = "Deleted";
		}
		
		
		
		//Screen Operations
		$edit=0;
		$eid='';
		if ($_GET['edit'] == 1) {
			$edit=1;
			$eid=intval($_GET['eid']);
		}
		
		if ($_GET['edit'] == 0) {
			$edit=0;
		}
		
	?>
	<!DOCTYPE html>
	<html lang="en">
		
		<head>
			<?php include 'includes/head.php';?>
			<link href="assets/css/vendor/dataTables.bootstrap4.css" rel="stylesheet" type="text/css" />
			<link href="assets/css/vendor/responsive.bootstrap4.css" rel="stylesheet" type="text/css" />
			<link href="assets/css/vendor/summernote-bs4.css" rel="stylesheet" type="text/css" />
		</head>	
		<body class="loading" data-layout-config='{"leftSideBarTheme":"<?=$menumode;?>","layoutBoxed":false, "leftSidebarCondensed":<?=$iconmode;?>, "leftSidebarScrollable":false,"darkMode":<?=$bodymode;?>, "showRightSidebarOnStart": false}'>
			<div class="wrapper">		
				<?php include 'includes/left-navigation.php';?>
				<div class="content-page">
					<div class="content">
						<?php include 'includes/top-menu.php';?>
						<div class="container-fluid">
							<div class="row">
								<div class="col-12">
									<div class="page-title-box">
										<div class="page-title-right">
											<ol class="breadcrumb m-0">
												<li class="breadcrumb-item"><a href="javascript: void(0);"><?=$projectname;?></a></li>
												<li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
												<li class="breadcrumb-item active">Enquiry</li>
											</ol>
										</div>
										<h4 class="page-title">Manage Enquiry</h4>
									</div>
								</div>
							</div>   
							<div class="row"><!-- container Start-->
								<?php include 'includes/warnings.php';?>
								
								<!-- --------------->							
								<!-- container START-->							
								<!------------------>		
								
								
								
								<!--LIST VIEW-->
								<?php if($edit==0){ ?> 
									
									
									<div class="col-lg-12">
										<div class="card">
											<div class="card-body">
												<table data-order='[[ 0, "desc" ]]' id="basic-datatable" class="table dt-responsive nowrap w-100">
													<thead>
														<tr>
															<th>ID</th>
															<th>Image</th>
															<th>User</th>
															<th>Course Time</th>
															<th>Contact</th> 
															<th>Detail</th>
														</tr>
														</tr>
													</thead>
													<tbody>
														<?php
															$listdata=Selectdata("SELECT ask.*,user.*,category.* FROM ask 
															JOIN user ON user.u_id=ask.u_id 
															JOIN category ON category.c_id=ask.course");
															
															if (sizeof($listdata) == 0) {
															?>
															<tr>
																<td colspan="7" align="center">
																	<h3 style="color:black"><?php mylan("No record found ","لا يوجد سجلات "); ?></h3>
																</td>
																<tr>
																	<?php
																		} else {
																		foreach ($listdata as $row) {
																			
																		?>
																		<tr>
																			
																			<td><?php text( $row['a_id'], $strong=false, $small=false, $badge=false, $lighten=false, $outline=false, '' ); ?></td>
																			
																			<td><?php image( $row['profile_pic'],'60','60','cover'  ); ?></td>
																			
																			<td><?php text( $row['name'], $strong=true, $small=false, $badge=false, $lighten=false, $outline=false, '' ); ?>
																				<br>
																				<?php text( $row['phone'], $strong=false, $small=true, $badge=false, $lighten=false, $outline=false, '',$icon='mdi mdi-cellphone' ); ?>
																				<br>
																			<?php text( ArrayToName($row['city'],$statelist,'id','name'), $strong=false, $small=true, $badge=false, $lighten=false, $outline=false, '' ,$icon='mdi mdi-map-marker-down'); ?></td>
																			
																			<td><?php text( ArrayToName('1',$timeList,'id','label'), $strong=false, $small=true, $badge=false, $lighten=false, $outline=false, '' ,$icon='mdi mdi-calendar'); ?></td>
																			<td>
																				<?php text( $row['a_name'], $strong=true, $small=false, $badge=false, $lighten=false, $outline=false, '' ); ?>
																				<br>
																				<?php text( $row['a_phone'], $strong=false, $small=true, $badge=false, $lighten=false, $outline=false, '',$icon='mdi mdi-cellphone' ); ?>
																			</td>
																			
																			<td>
																				<?php text( $row['c_name'], $strong=false, $small=false, $badge=true, $lighten=true, $outline=false, 'info' ); ?>
																				<br>
																				<?php text( $row['detail'], $strong=false, $small=false, $badge=false, $lighten=false, $outline=false, '' ); ?>
																				<br>
																				<?php text( substr($row['a_dated'],0,10), $strong=false, $small=true, $badge=false, $lighten=false, $outline=false, '',$icon='mdi mdi-calendar' ); ?>
																				
																			</td>
																			
																			
																			
																		</tr>
																	<?php } } ?>
															</tbody>
														</table> 
														</div> <!-- end card-body-->
														</div> <!-- end card-->
														</div> <!-- end col-->		
														<?php  } ?>
														<!--LIST VIEW END-->
														
														
														
														
														
														
														
														
														
														
														<!--EDIT VIEW-->
														<?php if($edit==1){ ?>
														
														<div class="col-lg-12">
														<a class="btn btn-primary m-2" href="<?=$_SERVER['PHP_SELF']; ?>?edit=0" >Back</a>
														
														<?php
														$listdata=Selectdata("Select * FROM post WHERE p_id=$eid");
														foreach ($listdata as $row) {
														?>
														
														<form class="form" method="post" enctype="multipart/form-data">
														<div class="col-lg-12">
														<div class="card">
														<div class="card-body">
														<h4>Category</h4>
														<div class="row">
														
														<?php  forminput(  'Title',  'p_title',  $row['p_title'] ,  'required',  '6',  'text'  ); ?>
														<?php  forminput(  'Title Arab',  'p_title_arab',  $row['p_title_arab'],  'required',  '6',  'text'  ); ?>
														<?php  forminput(  'Sub Title',  'p_sub',  $row['p_sub'],  'required',  '6',  'text'  ); ?>
														<?php  forminput(  'Sub Title Arab',  'p_sub_arab',  $row['p_sub_arab'],  'required',  '6',  'text'  ); ?>
														<?php  
														$menudata=Selectdata("SELECT * FROM category Order BY c_name ASC");
														formselect(  'Category',  'c_id', $menudata, 'required','6', $row['c_id'], 'c_id', 'c_name' ); ?>
														<?php  
														$menudata=Selectdata("SELECT * FROM subcategory Order BY sc_name ASC");
														formselect(  'Sub Category',  'sc_id', $menudata, 'required','6', $row['sc_id'], 'sc_id', 'sc_name' ); ?>
														
														
														</div>
														
														</div> <!-- end card-body-->
														</div> <!-- end card-->
														</div> <!-- end col-->		
														
														
														<div class="col-lg-12">
														<div class="card">
														<div class="card-body">
														<h4>Author</h4>
														<div class="row">
														<?php  
														$menudata=Selectdata("SELECT * FROM author Order BY a_name ASC");
														formselect(  'Author',  'a_id', $menudata, 'required','6', $row['a_id'], 'a_id', 'a_name' ); ?>
														<?php  
														$menudata=Selectdata("SELECT * FROM lable Order BY l_name ASC");
														formselect(  'Label',  'l_id', $menudata, '','6', $row['l_id'], 'l_id', 'l_name' ); ?>
														
														<?php  forminput(  'Date',  'p_date',   date('Y-m-d',strtotime($row['p_date'])),  'required',  '6',  'date'  ); ?>
														<?php  forminput(  'Time',  'p_time',  $row['p_time'],  'required',  '6',  'time'  ); ?>
														<?php  forminput(  'Number of class',  'p_class',  $row['p_class'],  'required',  '6',  'number'  ); ?>
														<?php  forminput(  'Phone number',  'p_phone',  $row['p_phone'],  'required',  '6',  'text'  ); ?>
														<?php  forminput(  'Map Latitude & Longtitude',  'p_location',  $row['p_location'],  'required',  '6',  'text'  ); ?>
														<?php  forminput(  'Last date of registration',  'p_regdate',   date('Y-m-d',strtotime($row['p_regdate'])),  'required',  '6',  'date'  ); ?>
														</div>
														
														</div> <!-- end card-body-->
														</div> <!-- end card-->
														</div> <!-- end col-->	
														
														<div class="col-lg-12">
														<div class="card">
														<div class="card-body">
														<h4>Price</h4>
														<div class="row">
														<?php  
														include 'includes/country.php';
														formselect(  'Country',  'p_country', $countrylist, 'required','6', $row['p_country'], 'phonecode', 'name' ); ?>
														
														<?php  
														include 'includes/country.php';
														formselect(  'City',  'p_city', $statelist, 'required','6', $row['p_city'], 'id', 'name' ); ?>
														
														<?php  forminput(  'Course Cost',  'p_price',  $row['p_price'],  'required',  '6',  'number'  ); ?>
														<?php  forminput(  'Advance Payment',  'p_price_advance',  $row['p_price_advance'],  'required',  '6',  'number'  ); ?>
														<?php  forminput(  'EMI Price',  'p_price_emi',  $row['p_price_emi'],  'required',  '6',  'number'  ); ?>
														
														</div>
														
														</div> <!-- end card-body-->
														</div> <!-- end card-->
														</div> <!-- end col-->	
														</div> <!-- end col-->		
														
														<!-- end col-->	
														<div class="col-lg-12">
														<div class="card">
														<div class="card-body">
														<h4>Details & Image</h4>
														<div class="row">
														
														<?php  formhtml( 'Detail',  'p_detail',  $row['p_detail'],  'required',  '6',  'basic'  ); ?>
														<?php  formhtml( 'Detail',  'p_detail_arab',  $row['p_detail_arab'],  'required',  '6',  'basictwo'  ); ?>
														
														
														<?php  formimage(  'Image',  'image',  $row['p_image'],  '',  '6',  'oldimage',  '80',  '50',  'cover'  ); ?>
														
														
														</div>
														
														<button name="update" class="btn btn-primary" type="submit">Update</button>
														</div> <!-- end card-body-->
														</div> <!-- end card-->
														</div> <!-- end col-->	
														</form>    
														
														<?php }  ?>
														
														<?php  } ?>
														
														<!--Edit end-->		
														
														
														
														
														
														
														<!-- ADD new-->		
														<div id="signup-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
														<div class="modal-dialog  modal-lg modal-dialog-centered">
														<div class="modal-content">
														
														<div class="modal-body">
														<div class="text-center mt-2 mb-4">
														<a href="index.html" class="text-success">
														<span><img src="assets/images/logo_sm_dark.png" alt="" height="18"></span>
														</a>
														</div>
														
														<form class="pl-3 pr-3"  method="post" enctype="multipart/form-data">
														<div class="row">
														
														<?php  forminput(  'Title',  'p_title',  '',  'required',  '6',  'text'  ); ?>
														
														<?php  
														$menudata=Selectdata("SELECT * FROM category Order BY c_name ASC");
														formselect(  'Category',  'c_id', $menudata, 'required','6', '', 'c_id', 'c_name' ); ?>
														<?php  
														$menudata=Selectdata("SELECT * FROM subcategory Order BY sc_name ASC");
														formselect(  'Sub Category',  'sc_id', $menudata, 'required','6', '', 'sc_id', 'sc_name' ); ?>
														
														<?php  formimage(  'Image',  'image', '',  'required',  '6',  '',  '',  '',  'cover'  ); ?>
														
														</div>
														
														<div class="form-group text-center">
														<button class="btn btn-primary" type="submit" name="submit">Add</button>
														</div>
														
														</form>
														
														</div>
														</div>
														</div>
														</div>
														
														<!-- ADD new End-->	
														
														
														
														
														
														
														<!-- --------------->							
														<!-- container End-->							
														<!------------------>							
														</div> 
														</div> 
														<!-- Footer Start -->
														<?php include 'includes/footer.php';?>
														</div>
														</div>
														<!-- Right Sidebar -->
														<?php include 'includes/right-bar.php';?>
														<!-- bundle -->
														<script src="assets/js/vendor.min.js"></script>
														<script src="assets/js/app.min.js"></script>
														
														<!-- Apex js -->
														<script src="assets/js/vendor/apexcharts.min.js"></script>
														
														<!-- Todo js -->
														<script src="assets/js/ui/component.todo.js"></script>
														<script src="assets/js/vendor/jquery.dataTables.min.js"></script>
														<script src="assets/js/vendor/dataTables.bootstrap4.js"></script>
														<script src="assets/js/vendor/dataTables.responsive.min.js"></script>
														<script src="assets/js/vendor/responsive.bootstrap4.min.js"></script>
														
														<!-- Datatable Init js -->
														<script src="assets/js/pages/demo.datatable-init.js"></script>
														<!-- end demo js-->
														<script src="assets/js/vendor/summernote-bs4.min.js"></script>
														<!-- Summernote demo -->
														<script src="assets/js/pages/demo.summernote.js"></script>
														</body>
														</html>
														<?php } ?>																																																																																																																																																																																																																																																																																																																																																																													