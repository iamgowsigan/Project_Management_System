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
			
			
			$title = addslashes($_POST['title']);
			$titlearab = addslashes($_POST['titlearab']);
			$cid = addslashes($_POST['category']);
			$scid = addslashes($_POST['p_subcategory']);
			
			$product = addslashes($_POST['product']);
			$brand = addslashes($_POST['brand']);
			$min = addslashes($_POST['min']);
			$max = addslashes($_POST['max']);
			
			$file_name = $_FILES['image']['name'];
			$file_tmp = $_FILES['image']['tmp_name'];
			$temp = explode(".", $_FILES["image"]["name"]);
			$file_name = 'ad' . round(microtime(true)) . '.' . end($temp);
			
			
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


			
			
			$sql= "insert into ads(a_title,a_title_arab,a_image,a_category,a_sub,a_brand,a_product,a_min,a_max,a_type) values('$title','$titlearab','$file_name','$cid','$scid','$brand','$product','$min','$max','brand')";
			
			$query = mysqli_query($con, $sql);

            


			
			if ($query) {
				$ulog=$_SESSION['login'];
				$query = mysqli_query($con, "insert into adminlog(name,action) values('$ulog','Ad Added')");
				$msg = "added";
				$insertid = mysqli_insert_id($con);

				$_SESSION['pid'] = $insertid;
				header("location: ".$_SERVER['PHP_SELF']);
				
				} else {
				
				$error = "Something Wrong".$sql;
				
			}
		}
		
		if ($_GET['action'] == 'del' && $_GET['scid']) {
			$id = intval($_GET['scid']);
			$val = $_GET['val'];
			$query = mysqli_query($con, "delete from ads WHERE a_id=$id");
			$msg = "Deleted ";
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
												<li class="breadcrumb-item active"><?php mylan("Management ","إدارة "); ?></li>
											</ol>
										</div>
										<h4 class="page-title"><?php mylan("Brand Ads Management ","إدارة إعلانات العلامات التجارية "); ?></h4>
									</div>
								</div>
							</div>   
							<div class="row"><!-- container Start-->
								<?php include 'includes/warnings.php';?>
								
								<!-- --------------->							
								<!-- container START-->							
								<!------------------>		
								<button type="button" class="btn btn-primary m-2" data-toggle="modal" data-target="#signup-modal"><?php mylan("Add Brand Ad ","إضافة إعلان العلامة التجارية"); ?></button>
								
								<div class="col-lg-12">
									<div class="card">
										
										
										
										
										<div class="card-body">
																				
											<table id="basic-datatable" class="table dt-responsive nowrap w-100">
												<thead>
													<tr>
														<th><?php mylan("ID ","ID "); ?></th>
														<th><?php mylan("Image ","صورة "); ?></th>
														<th><?php mylan("Title ","عنوان "); ?></th> 
														
													    <th><?php mylan("Action ","عمل "); ?></th>
													</tr>
												</thead>
												
												
												<tbody>
													<?php
														
														$query = mysqli_query($con, "SELECT * from ads WHERE a_type = 'brand'");
														$cnt = 1;
														$rowcount = mysqli_num_rows($query);
														if ($rowcount == 0) {
														?>
														<tr>
															<td colspan="7" align="center">
																<h3 style="color:black"><?php mylan(" No record found","لا يوجد سجلات "); ?></h3>
															</td>
															</tr>
																<?php
																	} else {
																	while ($row = mysqli_fetch_array($query)) {
																	?>
																	<tr>
																		<td><?php echo htmlentities($row['a_id']); ?></td>
																		<td>
																			<img src="<?php echo htmlentities($imgloc.$row['a_image']); ?>"  width="70" height="70" class="rounded img-thumbnail" onerror="this.src='assets/images/bg-auth.jpg'">
																		</td>
																		
																		<td><strong><?php echo wordwrap($row['a_title'],20,"<br>\n"); ?></strong></td> 
																		
																		<td>
																			<a href="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>?scid=<?php echo htmlentities($row['a_id']); ?>&&action=del" onclick="return confirm('Are you sure you want to delete?');" class="action-icon" ><i class="mdi mdi-delete"></i></a> &nbsp;&nbsp;&nbsp;&nbsp;
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
																<span><img src="assets/images/logo-dark.png" alt="" height="18"></span>
															</a>
														</div>
														
														<form class="pl-3 pr-3"  method="post" enctype="multipart/form-data">
															<div class="row">
																
																
																<div class="col-12">
																	<div class="form-group mb-3">
																		<label for="validationCustom01"><?php mylan("Title ","عنوان "); ?></label>
																		<input type="text" class="form-control" name="title" >
																	</div>
																</div>
																<div class="col-12">
																	<div class="form-group mb-3">
																		<label for="validationCustom01"><?php mylan("Title Arab ","العنوان العربي "); ?></label>
																		<input type="text" class="form-control" name="titlearab" >
																	</div>
																</div>
																	<div class="col-6">
																	<div class="form-group mb-3">
																		<label for="validationCustom01"><?php mylan("Product ","المنتج"); ?></label>
																		<select class="select2 form-control" data-toggle="select2" name="product" >
																			<option value="" ><?php mylan("Choose... ","Choose... "); ?></option>
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
																		<label for="validationCustom01"><?php mylan("Category ","فئة "); ?></label>
																
																		<select class="cate form-control select2" data-toggle="select2" name="category" >
																			<option value="" selected disabled>Choose...</option>
																			<?php 
                                                                             $pquery = mysqli_query($con,"SELECT * FROM category Order BY c_name ASC");
                                                                             while($catrow = mysqli_fetch_array($pquery)){                                                                            
																			?>
                                                                            <option value="<?=$catrow['c_id']?>"><?=$catrow['c_name']?></option>
                                                                            <?php } ?>
																		</select>
																	</div>
																</div>
																<div class="col-6">
																	<div class="form-group mb-3">
																<label for="validationCustom01"><?php mylan("Sub Category ","تصنيف فرعي "); ?> </label>
																
																<select class="select2 form-control" data-toggle="select2" name="p_subcategory" >
																	<option value="" ><?php mylan("Choose... ","Choose..."); ?></option>
																	<?php
																		
																		$subquery=mysqli_query($con,"SELECT * FROM subcategory ORDER BY sc_name ASC");
																		
																		while($result=mysqli_fetch_array($subquery))
																		{    ?>
																		<option value="<?=$result['sc_id'];?>"  ><?=$result['sc_name'];?></option>
																	<?php } ?>
																</select>
																
																
															</div>
																	</div>		
															<div class="col-6">
																<div class="form-group mb-3">
																<label for="validationCustom01"><?php mylan("Brand ","ماركة "); ?> </label>
																
																<select class="select2 form-control" data-toggle="select2" name="brand" >
																	<option value="" ><?php mylan("Choose... ","Choose..."); ?></option>
																	<?php
																		
																		$subquery=mysqli_query($con,"SELECT * FROM filter1 ORDER BY f1_name ASC");
																		
																		while($result=mysqli_fetch_array($subquery))
																		{    ?>
																		<option value="<?=$result['f1_id'];?>" ><?=$result['f1_name'];?></option>
																	<?php } ?>
																</select>
																
																
															</div>
																	</div>
																<div class="col-6">
																	<div class="form-group mb-3">
																		<label for="validationCustom01"><?php mylan("Minimum ","الحد الأدنى "); ?></label>
																		<input type="text" class="form-control" name="min" >
																	</div>
																</div>
																<div class="col-6">
																	<div class="form-group mb-3">
																		<label for="validationCustom01"><?php mylan("Maximum ","أقصى "); ?></label>
																		<input type="text" class="form-control" name="max" >
																	</div>
																</div>
															
																<div class="col-12">
																	<div class="form-group mb-3">
																		<label for="validationCustom03"><?php mylan("Image ","صورة "); ?></label>
																		<input type="file" class="form-control-file" id="exampleInputFile" name="image" required><br><br>
																	</div>
																</div>
																
																
															</div>
															
															<div class="form-group text-center">
																<button class="btn btn-primary" type="submit" name="submit"><?php mylan("Add Brand Ad ","إضافة إعلان العلامة التجارية "); ?></button>
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