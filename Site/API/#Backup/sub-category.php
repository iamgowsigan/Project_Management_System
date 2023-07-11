<?php
	session_start();
	include('includes/config.php');
	error_reporting(0);
	include 'includes/language.php';
	include 'includes/dbhelp.php';
	include 'includes/formdata.php';
	if(strlen($_SESSION['login'])==0)
	{ 
		header('location:index.php');
	}
	else{
		
		$sid= $_SESSION['sid'];
		
		//ADD
		if(isset($_POST['submit']))
		{
			
			$file_name=Uploadimage('subcategory','image');
			$file_name2=Uploadimage('subcategoryguide','image2');
			
			$field['c_id'] = $sid;
			$field['sc_name'] = addslashes($_POST['sc_name']);
			$field['sc_name_arab'] = addslashes($_POST['sc_name_arab']);
			$field['sc_image'] = $file_name;
			$field['sc_guide'] = $file_name2;
			
			$res=Insertdata("subcategory",$field);
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
			$oldimage2 = $_POST['oldimage2'];
			if($_FILES['image']['name']==''){
				$file_name=$oldimage;
				}else{
				$file_name=Uploadimage('subcategory','image');
			}
			
			if($_FILES['image2']['name']==''){
				$file_name2=$oldimage2;
				}else{
				$file_name2=Uploadimage('subcategoryguide','image2');
			}
			
			$field['sc_name'] = addslashes($_POST['sc_name']);
			$field['sc_name_arab'] = addslashes($_POST['sc_name_arab']);
			$field['sc_image'] = $file_name;
			$field['sc_guide'] = $file_name2;
			
			$res=Updatedata("subcategory",$field,"sc_id =$eid");
			if($res!=0){
				
				$msg = "Success ";
				}else{
				$error = "something error ";
			} 	
		}
		
		
		//delete
		if ($_GET['action'] == 'del' && $_GET['scid']) {
			$id = intval($_GET['scid']);
			$res=Deletedata("delete from subcategory where sc_id='$id'");
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
												<li class="breadcrumb-item active">Sub Category</li>
											</ol>
										</div>
										<h4 class="page-title">Sub Category Management</h4>
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
										<a href="category.php?eid=<?=$sid?>&&edit=1" class="btn btn-primary m-2" ><?php mylan("Back ","خلف "); ?></a>
										<button type="button" class="btn btn-primary m-2 float-right"  data-toggle="modal" data-target="#signup-modal"><?php mylan("Add New ","اضف جديد "); ?></button>
										<div class="card">
											<div class="card-body">
												<table data-order='[[ 0, "desc" ]]' id="basic-datatable" class="table dt-responsive nowrap w-100">
													<thead>
														<tr>
															<th><?php mylan("ID ","ID "); ?></th>
															<th><?php mylan("Image ","صورة "); ?></th>
															<th><?php mylan("Title ","عنوان "); ?></th> 
															<th><?php mylan("Products "," منتجات"); ?></th>
															<th><?php mylan("Action ","عمل "); ?></th>
														</tr>
													</thead>
													<tbody>
														<?php
															
															$listdata=Selectdata("Select * FROM subcategory WHERE c_id=$sid");
															
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
																			
																			<td><?php text( $row['sc_id'], $strong=false, $small=false, $badge=false, $lighten=false, $outline=false, '' ); ?></td>
																			
																			<td><?php image( $row['sc_image'],'80','60','cover'  ); ?></td>
																			
																			<td><?php text( $row['sc_name'], $strong=true, $small=false, $badge=false, $lighten=false, $outline=false, '' ); ?></td> 
																			
																			<td><?php 
																				$postid=$row['sc_id'];
																				$countdata=Countdata("SELECT * from products WHERE c_id=$sid AND sc_id=$postid ");
																			text( $countdata.' Products', $strong=true, $small=false, $badge=true, $lighten=true, $outline=false, 'primary' ); ?>
																			</td>
																			
																			<td><?php action(  $row['sc_id'] ,'E,D' ); ?></td>
																			
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
												<a href="sub-category.php" class="btn btn-primary m-2" ><?php mylan("Back ","خلف  "); ?></a>
												
												<?php
													$listdata=Selectdata("Select * FROM subcategory WHERE sc_id=$eid");
													foreach ($listdata as $row) {
													?>
													
													<form class="form" method="post" enctype="multipart/form-data">
														<div class="col-lg-12">
															<div class="card">
																<div class="card-body">
																	<h4>Category</h4>
																	<div class="row">
																		
																		<?php  forminput(  'Title',  'sc_name',  $row['sc_name'] ,  'required',  '6',  'text'  ); ?>
																		<?php  forminput(  'Title Arabic',  'sc_name_arab',  $row['sc_name_arab'],  'required',  '4',  'text'  ); ?>
																		<?php  formimage(  'Image',  'image',  $row['sc_image'],  '',  '6',  'oldimage',  '80',  '50',  'cover'  ); ?>
																		<?php  formimage(  'Guide Image',  'image2',  $row['sc_guide'],  '',  '6',  'oldimage2',  '80',  '50',  'cover'  ); ?>
																		
																	</div>
																	<button name="update" class="btn btn-primary" type="submit">Update</button>
																	
																</div> <!-- end card-body-->
															</div> <!-- end card-->
														</div> <!-- end col-->		
														
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
																<span><img src="assets/images/logo-dark.png" alt="" height="18"></span>
															</a>
														</div>
														
														<form class="pl-3 pr-3"  method="post" enctype="multipart/form-data">
															<div class="row">
																
																<?php  forminput(  'Title',  'sc_name',  '' ,  'required',  '6',  'text'  ); ?>
																<?php  forminput(  'Title Arabic',  'sc_name_arab',  '',  'required',  '4',  'text'  ); ?>
																<?php  formimage(  'Image',  'image',  '',  '',  '6',  'oldimage',  '80',  '50',  'cover'  ); ?>
																<?php  formimage(  'Guide Image',  'image2',  '',  '',  '6',  'oldimage2',  '80',  '50',  'cover'  ); ?>
																
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