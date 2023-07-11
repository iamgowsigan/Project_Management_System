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
			
			$field['dept_id'] = addslashes($_POST['dept_id']);
			$field['f_id'] = addslashes($_POST['f_id']);
			$field['p_id'] = addslashes($_POST['p_id']);
			$field['s_name'] = addslashes($_POST['s_name']);
			$field['s_phone'] = addslashes($_POST['s_phone']);
			$field['reg_no'] = addslashes($_POST['reg_no']);
			$field['s_year'] = addslashes($_POST['s_year']);
			$field['projects_involved'] = addslashes($_POST['projects_involved']);
			
			$res=Insertdata("student",$field);
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
			
			$field['dept_id'] = addslashes($_POST['dept_id']);
			$field['f_id'] = addslashes($_POST['f_id']);
			$field['p_id'] = addslashes($_POST['p_id']);
			$field['s_name'] = addslashes($_POST['s_name']);
			$field['s_phone'] = addslashes($_POST['s_phone']);
			$field['reg_no'] = addslashes($_POST['reg_no']);
			$field['s_year'] = addslashes($_POST['s_year']);
			$field['projects_involved'] = addslashes($_POST['projects_involved']);
			
			$res=Updatedata("student",$field,"s_id =$eid");
			if($res!=0){
				
				$msg = "Success ";
				}else{
				$error = "something error ";
			} 	
		}
		
		
		//delete
		if ($_GET['action'] == 'del' && $_GET['scid']) {
			$id = intval($_GET['scid']);
			$res=Deletedata("delete from student where s_id='$id'");
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
												<li class="breadcrumb-item active">Students</li>
											</ol>
										</div>
										<h4 class="page-title">Manage Students</h4>
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
															<th>Name & Reg no</th>
															<th>Department & Phone no</th>
															<th>Faculty</th>
															<th>Projects</th>	
															<th>Action</th>	
														</tr>
													</thead>
													<tbody>
														<?php
															
															$listdata=Selectdata("Select student.*, department.*, faculty.*, projects.* FROM student 
															JOIN department ON department.dept_id = student.dept_id 
															JOIN faculty ON faculty.f_id = student.f_id
															JOIN projects ON projects.p_id = student.p_id");
															
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
																			
																			<td><?php text( $row['s_id'], $strong=false, $small=false, $badge=false, $lighten=false, $outline=false, '' ); ?></td>
																			
																			<td><?php text( $row['s_name'], $strong=true, $small=false, $badge=false, $lighten=false, $outline=false, '' ); ?>
																				<br><?php text( $row['reg_no'], $strong=false, $small=true, $badge=false, $lighten=false, $outline=false, '',$icon='mdi mdi-bookmark-multiple' ); ?>
																			</td>
																			
																			<td><?php text( $row['dept_name'], $strong=false, $small=true, $badge=false, $lighten=false, $outline=false, '' ,$icon='uil-map-pin-alt'); ?>
																				<br><?php text( $row['s_phone'], $strong=false, $small=true, $badge=true, $lighten=true, $outline=false, '' ,$icon='mdi mdi-cellphone' ); ?>
																			</td>
																			
																			<td><?php text( $row['f_name'], $strong=true, $small=true, $badge=false, $lighten=false, $outline=false, '' ); ?></td>
																			
																			<td><?php substr(text( $row['p_name'],0,20), $strong=false, $small=true, $badge=false, $lighten=false, $outline=false, '' ); ?></td>
																			
																			<td><?php action(  $row['s_id']  ); ?></td>
																			
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
															$listdata=Selectdata("Select * FROM student WHERE s_id=$eid");
															foreach ($listdata as $row) {
															?>
															<form class="form" method="post" enctype="multipart/form-data">
																<div class="row">
																	
																	<?php  forminput(  'Name',  's_name',  $row['s_name'],  'required',  '6',  'text'  ); ?>
																	<?php  forminput(  'Phone number',  's_phone',  $row['s_phone'],  'required',  '6',  'text'  ); ?>
																	
																	<?php  forminput(  'Reg No',  'reg_no',  $row['reg_no'],  'required',  '6',  'text'  ); ?>
																	<?php  
																		$menudata=Selectdata("SELECT * FROM department Order BY dept_name ASC");
																	formselect(  'Department name',  'dept_id', $menudata, 'required','6', $row['dept_id'], 'dept_id', 'dept_name' ); ?>
																	
																	<?php  
																		$menudata=Selectdata("SELECT * FROM faculty Order BY f_name ASC");
																	formselect(  'Faculty name',  'f_id', $menudata, 'required','6', $row['f_id'], 'f_id', 'f_name' ); ?>
																	
																	<?php  
																		$menudata=Selectdata("SELECT * FROM projects Order BY p_name ASC");
																	formselect(  'Project name',  'p_id', $menudata, 'required','6', $row['p_id'], 'p_id', 'p_name' ); ?>
																	
																	<?php  forminput(  'Year of study',  's_year',   $row['s_year'],  'required',  '6',  'text'  ); ?>
																	<?php  forminput(  'Projects Involved',  'projects_involved',  $row['projects_involved'],  'required',  '6',  'text'  ); ?>
																	
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
																
																<?php  forminput(  'Name',  's_name',  '',  'required',  '6',  'text'  ); ?>
																<?php  forminput(  'Phone number',  's_phone',  '',  'required',  '6',  'text'  ); ?>
																
																<?php  forminput(  'Reg No',  'reg_no',  '',  'required',  '6',  'text'  ); ?>
																
																<?php  
																	$menudata=Selectdata("SELECT * FROM department Order BY dept_name ASC");
																formselect(  'Department name',  'dept_id', $menudata, 'required','6', '', 'dept_id', 'dept_name' ); ?>
																
																<?php  
																	$menudata=Selectdata("SELECT * FROM faculty Order BY f_name ASC");
																formselect(  'Faculty name',  'f_id', $menudata, 'required','6', '', 'f_id', 'f_name' ); ?>
																
																<?php  
																	$menudata=Selectdata("SELECT * FROM projects Order BY p_name ASC");
																formselect(  'Project name',  'p_id', $menudata, 'required','6', '', 'p_id', 'p_name' ); ?>
																
																<?php  forminput(  'Year of study',  's_year',   '',  'required',  '6',  'text'  ); ?>
																<?php  forminput(  'Projects Involved',  'projects_involved',  '',  'required',  '6',  'text'  ); ?>
																
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