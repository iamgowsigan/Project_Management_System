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
		
		$screen = $_GET['screen'];
		
		//ADD
		if(isset($_POST['submit']))
		{
			
			$file_name=Uploadimage('ads','image');
			
			$field['a_type'] = $screen;
			$field['a_category'] = addslashes($_POST['a_category']);
			$field['a_sub'] = addslashes($_POST['a_sub']);
			$field['a_brand'] = addslashes($_POST['a_brand']);
			$field['a_min'] = addslashes($_POST['a_min']);
			$field['a_max'] = addslashes($_POST['a_max']);
			$field['a_product'] = addslashes($_POST['a_product']);
			$field['a_image'] = $file_name;
			
			$res=Insertdata("ads",$field);
			if($res!=0){
				$msg = "Success ";
				}else{
				$error = "Deleted ";
			} 
			
			
		}
		
		
		
		//delete
		if ($_GET['action'] == 'del' && $_GET['scid']) {
			$id = intval($_GET['scid']);
			$res=Deletedata("delete from ads where a_id='$id'");
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
												<li class="breadcrumb-item active">App Ads Management</li>
											</ol>
										</div>
										<h4 class="page-title"><?=$screen?> Ads </h4>
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
									
									<button type="button" class="btn btn-primary m-2" data-toggle="modal" data-target="#signup-modal"><?php mylan("Add Pop Ad ","أضف إعلان البوب "); ?></button>
									<div class="col-lg-12">
										<div class="card">
											<div class="card-body">
												<table data-order='[[ 0, "desc" ]]' id="basic-datatable" class="table dt-responsive nowrap w-100">
													<thead>
														<tr>
															<th><?php mylan("ID ","ID "); ?></th>
															<th><?php mylan("Image ","صورة "); ?></th>
															<th><?php mylan("Action ","عمل "); ?></th>
														</tr>
													</thead>
													<tbody>
														<?php
															
															$listdata=Selectdata("SELECT * from ads WHERE a_type = '$screen'");
															
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
																			
																			<td><?php image( $row['a_image'],'150','80','cover' ); ?></td>
																			
																			<td><?php action(  $row['a_id'] ,'D'   ); ?></td>
																			
																		</tr>
																	<?php } } ?>
															</tbody>
														</table> 
													</div> <!-- end card-body-->
												</div> <!-- end card-->
											</div> <!-- end col-->		
										<?php  } ?>
										<!--LIST VIEW END-->
										
										
										
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
																
																<?php if($screen=='category'){ ?>
																	
																	<?php  
																		$menudata=Selectdata("SELECT * FROM category Order BY c_name ASC");
																	formselect(  'Category',  'a_category', $menudata, 'required','6', '', 'c_id', 'c_name' ); ?>
																	
																<?php } if($screen=='subcategory'){ ?>
																	
																	<?php  
																		$menudata=Selectdata("SELECT * FROM subcategory ORDER BY sc_name ASC");
																	formselect(  'Sub Category',  'a_sub', $menudata, 'required','6', '', 'sc_id', 'sc_name' ); ?>
																	
																<?php } if($screen=='brand'){ ?>
																	
																	<?php  
																		$menudata=Selectdata("SELECT * FROM filter1 ORDER BY f1_name ASC");
																	formselect(  'Brand',  'a_brand', $menudata, 'required','6', '', 'f1_id', 'f1_name' ); ?>
																	
																<?php } if($screen=='percentage' || $screen=='price'){ ?>
																	
																	<?php  forminput(  'Minimum',  'a_min',  '' ,  'required',  '6',  'text'  ); ?>
																	<?php  forminput(  'Maximum',  'a_max',  '',  'required',  '6',  'text'  ); ?>
																	
																	
																<?php } ?>
																
																<?php  formimage(  'Image',  'image',  '',  '',  '6',  'oldimage',  '80',  '50',  'cover'  ); ?>
															</div>
															<div class="form-group text-center">
																<button class="btn btn-primary" type="submit" name="submit">Add Pop Ad</button>
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