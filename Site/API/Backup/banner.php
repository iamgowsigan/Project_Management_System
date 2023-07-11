<?php
	session_start();
	include('includes/config.php');
	error_reporting(0);
	include 'includes/language.php';

	
	if(strlen($_SESSION['login'])==0)
	{ 
		header('location:index.php');
	}
	else{
		
		if(isset($_POST['submit']))
		{
			
			
			$category = addslashes($_POST['category']);
			$product = addslashes($_POST['product']);
			$url = addslashes($_POST['url']);
			
			$file_name = $_FILES['image']['name'];
			$file_tmp = $_FILES['image']['tmp_name'];
			$temp = explode(".", $_FILES["image"]["name"]);
			$file_name = 'banner' . round(microtime(true)) . '.' . end($temp);
			
			
			if($production=="1"){
				$file_type=$_FILES['image']['type'];
				$result = $s3->putObject([
				'Bucket' => $bucketName,
				'Key'    => $file_name,
				'ContentType'    => $file_type,
				'SourceFile' => $file_tmp			
				]);
				
			}
			else{
				
				move_uploaded_file($file_tmp, $imgloc . $file_name);
			}
			
			
			
			
			
			$query = mysqli_query($con, "insert into banner(b_image,b_category,b_product,b_url) values('$file_name','$category','$product','$url')");
			
			if ($query) {
				$ulog=$_SESSION['login'];
				$query = mysqli_query($con, "insert into adminlog(name,action) values('$ulog','Banner Added')");
				
				$msg = " Banner Added";
				} else {
				$error = "Something Wrong";
			}
			
			
		}
		
		if ($_GET['action'] == 'del' && $_GET['scid']) {
			$id = intval($_GET['scid']);
			$userlog = $_SESSION['login'];
			
			$query = mysqli_query($con, "delete from banner where b_id='$id'");
            $msg = "Deleted ";
            $uname = $_SESSION['login'];
            $queryy = mysqli_query($con, "insert into adminlog(name,action) values('$uname','Banner deleted')");
			header("location: ".$_SERVER['PHP_SELF']);
			
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
												<li class="breadcrumb-item"><a href="javascript: void(0);"><?php mylan("Dashboard ","لوحة القيادة "); ?></a></li>
												<li class="breadcrumb-item active"><?php mylan("Banner ","لافتة "); ?></li>
											</ol>
										</div>
										<h4 class="page-title"><?php mylan("Banner Management ","إدارة البانر "); ?></h4>
									</div>
								</div>
							</div>   
							<div class="row"><!-- container Start-->
								<?php include 'includes/warnings.php';?>
								
								<!-- --------------->							
								<!-- container START-->							
								<!------------------>		
								
								
								<button type="button" class="btn btn-primary m-2" data-toggle="modal" data-target="#signup-modal"><?php mylan("Add Banner ","أضف بانر "); ?></button>
								<div class="col-lg-12">
									<div class="card">
										<div class="card-body">
											
											<table  data-order='[[ 0, "desc" ]]' id="basic-datatable" class="table dt-responsive nowrap w-100">
												<thead>
													<tr>
														<th>ID</th>
														<th><?php mylan("Image ","صورة "); ?></th>
														<th><?php mylan("Category ","فئة "); ?></th>
														
														<th><?php mylan("Action ","عمل "); ?></th>
													</tr>
												</thead>
												
												
												<tbody>
													<?php
														
														$query = mysqli_query($con, "SELECT banner.*,category.* FROM banner left join category ON category.c_id=banner.b_category");
														$cnt = 1;
														$rowcount = mysqli_num_rows($query);
														if ($rowcount == 0) {
														?>
														<tr>
															<td colspan="7" align="center">
																<h3 style="color:black"><?php mylan("No record found ","لا يوجد سجلات "); ?></h3>
															</td>
															<tr>
																<?php
																	} else {
																	while ($row = mysqli_fetch_array($query)) {
																	?>
																	<tr>
																		<td><?php echo htmlentities($row['b_id']); ?></td>
																		
																		
																		<td>
																			<img src="<?php echo htmlentities($imgloc.$row['b_image']); ?>"  width="70" height="70" class="rounded img-thumbnail" onerror="this.src='assets/images/bg-auth.jpg'">
																		</td>
																		
																		<td><strong><?php echo htmlentities($row['c_name']); ?></strong><br><?php echo $row['b_url'];?></td>
																		
																		
																		
																		<td>
																			<a href="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>?scid=<?php echo htmlentities($row['b_id']); ?>&&action=del" onclick="return confirm('Are you sure you want to delete?');" class="action-icon" ><i class="mdi mdi-delete"></i></a> &nbsp;&nbsp;&nbsp;&nbsp;
																			
																			
																		</td>
																		
																	</tr>
																<?php } } ?>
														</tbody>
													</table> 
													
												</div> <!-- end card-body-->
											</div> <!-- end card-->
										</div> <!-- end col-->		
										
										
										
										
										<!-- Form Model-->		
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
																																
																
																<div class="col-6">
																	<div class="form-group mb-3">
																		<label for="validationCustom01"><?php mylan("Category ","فئة "); ?></label>
																		<select class="select2 form-control" data-toggle="select2" name="category"  >
																			<option value="" ><?php mylan("Choose... ","يختار "); ?></option>
																			<?php
																				$ret=mysqli_query($con,"SELECT * FROM category");
																				while($result=mysqli_fetch_array($ret))
																				{    ?>
																				<option value="<?=$result['c_id'];?>" ><?=$result['c_name'];?></option>
																			<?php } ?>
																		</select>
																	</div>
																</div>
																
																<div class="col-6">
																	<div class="form-group mb-3">
																		<label for="validationCustom01"><?php mylan("Product ","فئة "); ?></label>
																		<select class="select2 form-control" data-toggle="select2" name="product" >
																			<option value="" ><?php mylan("Choose... ","يختار "); ?></option>
																			<?php
																				$ret=mysqli_query($con,"SELECT * FROM products");
																				while($result=mysqli_fetch_array($ret))
																				{    ?>
																				<option value="<?=$result['p_id'];?>" ><?=$result['p_title'];?></option>
																			<?php } ?>
																		</select>
																	</div>
																</div>
																<div class="col-6">
																	<div class="form-group mb-3">
																		<label for="validationCustom01">Banner URL</label>
																		<input type="text" class="form-control" name="url" >
																	</div>
																</div>
																
																<div class="col-6">
																	<div class="form-group mb-3">
																		<label for="validationCustom01"><?php mylan("Image ","صورة "); ?></label>
																		<input type="file" class="form-control-file" id="exampleInputFile" name="image" required>
																		
																	</div>
																</div>
															
															</div>
														
															<div class="form-group text-center">
																<button class="btn btn-primary" type="submit" name="submit"><?php mylan("Add Banner ","أضف بانر "); ?></button>
															</div>
															
														</form>
														
													</div>
												</div>
											</div>
										</div>
										
										<!--  Form modal end -->
										
										
										
										
										
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