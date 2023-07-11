<?php
	session_start();
	include('includes/config.php');
	//error_reporting(0);
	include 'includes/language.php';
	
	if(strlen($_SESSION['login'])==0)
	{ 
		header('location:index.php');
	}
	else{
		
       if(isset($_POST['save']))
		{
			$cid = addslashes($_POST['cid']);

			
			$_SESSION['cid']=$cid;
            $_SESSION['cat_screen'] = 'hotel';
             $_SESSION['cat_id'] = '1';
			header("location: edit-category.php");
			
		}
		
		if(isset($_POST['submit']))
		{
			
			
			$title = addslashes($_POST['title']);
			$titlearab = addslashes($_POST['titlearab']);
			
			$detail = addslashes($_POST['detail']);
			$detailarab = addslashes($_POST['detailarab']);
			
					
			$file_name = $_FILES['image']['name'];
			$file_tmp = $_FILES['image']['tmp_name'];
			$temp = explode(".", $_FILES["image"]["name"]);
			$file_name = 'cat' . round(microtime(true)) . '.' . end($temp);
			
			
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
			
			
            $file_name2 = $_FILES['image2']['name'];
			if($file_name2!=''){
				
				$file_name2 = $_FILES['image2']['name'];
				$file_tmp2 = $_FILES['image2']['tmp_name'];
				$temp2 = explode(".", $_FILES["image2"]["name"]);
				$file_name2 = 'category' . round(microtime(true)) . '.' . end($temp2);
				
				
				if($production=="1"){
					$file_type=$_FILES['image2']['type'];
					$result = $s3->putObject([
					'Bucket' => $bucketName,
					'Key'    => $file_name2,
					'ContentType'    => $file_type,
					'SourceFile' => $file_tmp2			
					]);
					
				}
				else{
					
					move_uploaded_file($file_tmp2, $imgloc . $file_name2);
				}
			}
			
			
			$query = mysqli_query($con, "insert into category(c_name, c_name_arab, c_detail, c_detail_arab, c_image,c_banner,screen ) values('$title','$titlearab','$detail','$detailarab','$file_name','$file_name2','1')");
			
			if ($query) {
				$ulog=$_SESSION['login'];
				$query = mysqli_query($con, "insert into adminlog(name,action) values('$ulog',$name.'Category Added')");
				
				$msg = "Category Added";
				} else {

					echo '<script>console.log("'.mysqli_error($con).'")</script>';
				//$error = "Something Wrong";
			}
			
			
		}
		
		if ($_GET['action'] == 'del' && $_GET['scid']) {
			$id = intval($_GET['scid']);
			$userlog = $_SESSION['login'];
			
			$query = mysqli_query($con, "delete from category  where c_id='$id'");
            $msg = "Deleted ";
            $uname = $_SESSION['login'];
            $queryy = mysqli_query($con, "insert into adminlog(name,action) values('$uname','category deleted')");
			header("location: ".$_SERVER['PHP_SELF']);
			
		}
		
		
		if ($_GET['action'] == 'act' && $_GET['scid']) {
			$id = intval($_GET['scid']);
			$userlog = $_SESSION['login'];
			
			$query = mysqli_query($con, "UPDATE category SET c_active='1' WHERE c_id=$id");
			$msg = "Activated ";
			header("location: ".$_SERVER['PHP_SELF']);
			
		}
		
		if ($_GET['action'] == 'dact' && $_GET['scid']) {
			$id = intval($_GET['scid']);
			$userlog = $_SESSION['login'];
			
			$query = mysqli_query($con, "UPDATE category SET c_active='0' WHERE c_id=$id");
			$msg = "Deactivated ";
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
												<li class="breadcrumb-item active"><?php mylan("Category ","فئة "); ?></li>
											</ol>
										</div>
										<h4 class="page-title"><?php mylan("Hotel Category Management ","إدارة فئة الفنادق"); ?></h4>
									</div>
								</div>
							</div>   
							<div class="row"><!-- container Start-->
								<?php include 'includes/warnings.php';?>
								
								<!-- --------------->							
								<!-- container START-->							
								<!------------------>		
								
								
								<button type="button" class="btn btn-primary m-2" data-toggle="modal" data-target="#signup-modal"><?php mylan("Add Hotel Category "," أضف فئة المغامرة "); ?></button>
								<div class="col-lg-12">
									<div class="card">
										<div class="card-body">
											
											<table data-order='[[ 0, "desc" ]]' id="basic-datatable" class="table dt-responsive nowrap w-100">
												<thead>
													<tr>
													    <th><?php mylan("ID  ","ID "); ?></th>
														<th><?php mylan("Images ","الصور "); ?></th>
														<th><?php mylan(" Title ","عنوان "); ?></th>
														<th><?php mylan("Active ","نشيط "); ?></th>
														<th><?php mylan("Action ","عمل "); ?></th>


													</tr>
												</thead>
												
												
												<tbody>
													<?php
														
														$query = mysqli_query($con, "Select * FROM category where screen='1'");
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
																		$getid=$row['c_id'];
																	?>
																	<tr>
																		<td><?php echo htmlentities($row['c_id']); ?></td>
																		
																		<td>

																			<img src="<?php echo htmlentities($imgloc.$row['c_image']); ?>"  style="object-fit:cover;width:80px;height:80px;" class="rounded img-thumbnail" onerror="this.src='assets/images/bg-auth.jpg'">
																		</td>
																		
																		
																		
																				<td><?php echo htmlentities($row['c_name']); ?></td>
														               
																		
																		
																		<td>
																			<?php if($row['c_active']){ ?>
																				<a href="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>?scid=<?php echo htmlentities($row['c_id']); ?>&&action=dact" onclick="return confirm('Are you sure you want to deactivate?');"  ><span class="badge badge-success"><?php mylan("Active"," متوفرة"); ?></span></a>
																				<?php }else{ ?>
																				
																				<a href="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>?scid=<?php echo htmlentities($row['c_id']); ?>&&action=act" onclick="return confirm('Are you sure you want to activate?');"  ><span class="badge badge-danger"><?php mylan("Deactive ","غير متوفره "); ?></span></a>
																				
																			<?php } ?>
																		</td>
																		<td>
																		<!-- Menu Items-->	
																		<div class="btn-group">
																			<button type="button" class="btn btn-light dropdown-toggle btn-sm" data-toggle="dropdown" aria-expanded="false"><?php mylan("More  ","أكثر "); ?>  <span class="caret"></span> </button>
																			<div class="dropdown-menu">
																				
																				
																				
																				<form  method="post" enctype="multipart/form-data">
																					
																					<input type="hidden" name="cid" value='<?=$row['c_id']; ?>'>
																				
																					<button style="border:none;background-color:white" type="submit" name="save"><a class="dropdown-item"><?php mylan("View / Edit  "," معاينة ما تم تحريره"); ?></a></button>
																					
																					
																				</form>
																				
																				
																				
																				<a class="dropdown-item" href="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>?scid=<?php echo htmlentities($row['c_id']); ?>&&action=del" onclick="return confirm('Are you sure you want to delete?');"  ><?php mylan("Delete  "," حذف"); ?></a>
																				
																			</div>
																		</div>
																			
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
																	<label for="validationCustom01"><?php mylan("Category Name ","اسم التصنيف "); ?> </label>
																	<input type="text" class="form-control" name="title" required>
																</div>
															</div>
															
															
															
															
															<div class="col-6">
																<div class="form-group mb-3">
																	<label for="validationCustom01"><?php mylan("Name in Arabic ","الاسم بالعربي "); ?> </label>
																	<input type="text" class="form-control" name="titlearab" required>
																</div>
															</div>
															<div class="col-6">
																<div class="form-group mb-3">
																	<label for="validationCustom01"><?php mylan("Detail","اسم التصنيف "); ?> </label>
																	
																	<textarea class="form-control" name="detail" ></textarea>
																</div>
															</div>
															
															
															
															
															<div class="col-6">
																<div class="form-group mb-3">
																	<label for="validationCustom01"><?php mylan("Detail in Arabic ","الاسم بالعربي "); ?> </label>
																	<textarea class="form-control" name="detailarab" ></textarea>

																</div>
															</div>
															
															

															<div class="col-6">
																<div class="form-group mb-3">
																	<label for="validationCustom03"><?php mylan("Image ","صورة "); ?></label>
																	<input type="file" class="form-control-file" id="exampleInputFile" name="image" required><br><br>
																</div>
															</div>
															
															<div class="col-6">
																<div class="form-group mb-3">
																	<label for="validationCustom03"><?php mylan("Banner ","لافتة "); ?></label>
																	<input type="file" class="form-control-file" id="exampleInputFile" name="image2"><br><br>
																</div>
															</div>
															
														</div>
														
														<div class="form-group text-center">
															<button class="btn btn-primary" type="submit" name="submit"><?php mylan("Add Category ","إضافة فئة "); ?></button>
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