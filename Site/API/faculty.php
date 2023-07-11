<?php
	session_start();
	include('includes/config.php');
	//error_reporting(0);
	include 'includes/language.php';
	include 'includes/dbhelp.php';
	include 'includes/formdata.php';
	if(strlen($_SESSION['login'])==0)
	{ 
		header('location:index.php');
	}
	else{
		
		//ADD
		if(isset($_POST['submit']))
		{
			
			$file_name=Uploadimage('faculty','image');
			
			$field['f_name'] = addslashes($_POST['f_name']);
			$field['f_role'] = addslashes($_POST['f_role']);
			$field['f_experience'] = addslashes($_POST['f_experience']);
			$field['project_mentored'] = addslashes($_POST['project_mentored']);
			$field['f_image'] = $file_name;
			//$field['c_banner'] = $file_name2;
			
			$res=Insertdata("faculty",$field);
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
			if($_FILES['image']['name']==''){
				$file_name=$oldimage;
				}else{
				$file_name=Uploadimage('faculty','image');
			}
			
			
			$field['f_name'] = addslashes($_POST['f_name']);
			$field['f_role'] = addslashes($_POST['f_role']);
			$field['f_experience'] = addslashes($_POST['f_experience']);
			$field['project_mentored'] = addslashes($_POST['project_mentored']);
			$field['f_image'] = $file_name;
			
			$res=Updatedata("faculty",$field,"f_id =$eid");
			if($res!=0){
				
				$msg = "Success ";
				}else{
				$error = "something error ";
			} 	
		}
		
		
		//delete
		if ($_GET['action'] == 'del' && $_GET['scid']) {
			$id = intval($_GET['scid']);
			$res=Deletedata("delete from faculty where f_id='$id'");
			header("location: ".$_SERVER['PHP_SELF']);
			$msg = "Deleted";
		}
		
		
		//Active
		if ($_GET['action'] == 'status' && $_GET['scid']) {
			$scid = intval($_GET['scid']);
			$val = $_GET['val'];
			$field['a_active'] = $val;
			$res=Updatedata("faculty",$field,"f_id=$scid");
			$msg = "Success ";
			//	header("location: ".$_SERVER['PHP_SELF']);
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
												<li class="breadcrumb-item active">Faculty</li>
											</ol>
										</div>
										<h4 class="page-title">Faculty Management</h4>
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
									
									<button type="button" class="btn btn-primary m-2" data-toggle="modal" data-target="#signup-modal">Add New</button>
									
									<div class="col-lg-12">
										<div class="card">
											<div class="card-body">
												<table data-order='[[ 0, "desc" ]]' id="basic-datatable" class="table dt-responsive nowrap w-100">
													<thead>
														<tr>
															<th>ID</th>
															<th>Image</th>
															<th>Name & Role</th>
															<th>Experience</th>
															<th>Project Mentored</th>
															<th>Action</th>	
														</tr>
													</thead>
													<tbody>
														<?php
															
															$listdata=Selectdata("Select * FROM faculty");
															
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
																			
																			<td><?php text( $row['f_id'], $strong=false, $small=false, $badge=false, $lighten=false, $outline=false, '' ); ?></td>
																			
																			<td><?php image( $row['f_image'],'70','80','cover'  ); ?></td>
																			
																			<td><?php text( $row['f_name'], $strong=true, $small=false, $badge=false, $lighten=false, $outline=false, '' ); ?><br>
																				<?php text( $row['f_role'], $strong=false, $small=true, $badge=false, $lighten=false, $outline=false, '', $icon='mdi mdi-school' ); ?>
																			</td>
																			
																			<td><?php text( $row['f_experience'].' Years', $strong=false, $small=true, $badge=true, $lighten=true, $outline=false, 'info'  ); ?></td>
																			
																			<td><?php text( $row['project_mentored'].' Projects', $strong=false, $small=true, $badge=false, $lighten=false, $outline=false, '' ); ?>
																			</td>
																			
																			<td><?php action(  $row['f_id']  ); ?></td>
																			
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
											
											
											<a class="btn btn-primary m-2" href="<?=$_SERVER['PHP_SELF']; ?>?edit=0" >Back</a>
											
											<div class="col-lg-12">
												<div class="card">
													<div class="card-body">
														
														<?php
															$listdata=Selectdata("Select * FROM faculty WHERE f_id=$eid");
															foreach ($listdata as $row) {
															?>
															<form class="form" method="post" enctype="multipart/form-data">
																<div class="row">
																	
																	<?php  forminput(  'Faculty Name',  'f_name',  $row['f_name'],  'required',  '6',  'text'  ); ?>
																	<?php  forminput(  'Role of faculty',  'f_role',  $row['f_role'],  'required',  '6',  'text'  ); ?>
																	<?php  forminput(  'Experience',  'f_experience',  $row['f_experience'],  'required',  '6',  'text'  ); ?>
																	<?php  forminput(  'Project Mentored',  'project_mentored',  $row['project_mentored'],  'required',  '6',  'text'  ); ?>
																	<?php  formimage(  'Image',  'image',  $row['f_image'],  '',  '6',  'oldimage',  '80',  '50',  'cover'  ); ?>
																	
																</div>
																<button name="update" class="btn btn-primary" type="submit">Update</button>
															</form>    
														<?php }  ?>
													</div> <!-- end card-body-->
												</div> <!-- end card-->
											</div> <!-- end col-->		
											
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
																
																<?php  forminput(  'Faculty Name',  'f_name',  '',  'required',  '6',  'text'  ); ?>
																<?php  forminput(  'Role of faculty',  'f_role',  '',  'required',  '6',  'text'  ); ?>
																<?php  forminput(  'Experience',  'f_experience',  '',  'required',  '6',  'text'  ); ?>
																<?php  forminput(  'Project Mentored',  'project_mentored',  '',  'required',  '6',  'text'  ); ?>
																<?php  formimage(  'Image',  'image',  '',  '',  '6',  'oldimage',  '80',  '50',  'cover'  ); ?>
																
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
					</body>
				</html>
			<?php } ?>																																																																																																																																																																																															