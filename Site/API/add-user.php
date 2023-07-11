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
			
			
			$name = addslashes($_POST['name']);
			$phone = addslashes($_POST['phone']);
			$password = addslashes($_POST['password']);
			
			$user = addslashes($_POST['user']);
			$email = $user."@admin.com";
			
			$options = ['cost' => 12];
			$newhashedpass=password_hash($password, PASSWORD_BCRYPT, $options);
			
			
			$file_name = $_FILES['image']['name'];
			
			if($file_name=="")
			{
				$file_name="";
				
				}else{
				
				$file_name = $_FILES['image']['name'];
				$file_tmp = $_FILES['image']['tmp_name'];
				$temp = explode(".", $_FILES["image"]["name"]);
				$file_name = 'admin' . round(microtime(true)) . '.' . end($temp);

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
				
				
			}
			
			
			
			$sql = mysqli_query($con, "SELECT * FROM admin WHERE (username='$user' || admin_email='$email')");
			$row = mysqli_fetch_array($sql);
			if ($row > 0) {
				$error = "Email or username already exists";
				}else{
				
				$query = mysqli_query($con, "insert into admin(username,password,admin_name,admin_email,admin_image,admin_phone) values('$user','$newhashedpass','$name','$email','$file_name','$phone')");
				
				if ($query) {
					$ulog=$_SESSION['login'];
					$query = mysqli_query($con, "insert into adminlog(name,action) values('$ulog',$name.'User Updated')");
					
					$msg = " User Added";
					} else {
					$error = "Something Wrong";
				}
				
			}
			
			
		}
		
		if ($_GET['action'] == 'del' && $_GET['scid']) {
			$id = intval($_GET['scid']);
			$userlog = $_SESSION['login'];
			
			$query = mysqli_query($con, "delete from admin  where id='$id'");
            $msg = "Deleted ";
            $uname = $_SESSION['login'];
            $queryy = mysqli_query($con, "insert into adminlog(name,action) values('$uname','User deleted')");
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
												<li class="breadcrumb-item"><a href="javascript: void(0);"><?php mylan("Dashboard "," لوحة القيادة"); ?></a></li>
												<li class="breadcrumb-item active"><?php mylan(" User","المستعمل "); ?></li>
											</ol>
										</div>
										<h4 class="page-title"><?php mylan("USER MANAGEMENT "," إدارةالمستخدم"); ?></h4>
									</div>
								</div>
							</div>   
							<div class="row"><!-- container Start-->
								<?php include 'includes/warnings.php';?>
								
								<!-- --------------->							
								<!-- container START-->							
								<!------------------>		
								
								
								<button type="button" class="btn btn-primary m-2" data-toggle="modal" data-target="#signup-modal"><?php mylan("Add User ","إضافة مستخدم "); ?></button>
								<div class="col-lg-12">
									<div class="card">
										<div class="card-body">
											
											<table id="basic-datatable" class="table dt-responsive nowrap w-100">
												<thead>
													<tr>
														<th><?php mylan(" User ID"," معرف المستخدم"); ?></th>
														<th><?php mylan(" Profile","الملف الشخصي "); ?></th>
														<th><?php mylan(" Name"," اسم"); ?></th>
														
														<th><?php mylan(" Phone","هاتف "); ?></th>
														<th><?php mylan(" Email","بريد إلكتروني "); ?></th>
														<th><?php mylan(" Action"," عمل"); ?></th>
													</tr>
												</thead>
												
												
												<tbody>
													<?php
														
														$query = mysqli_query($con, "Select * FROM admin WHERE power=0");
														$cnt = 1;
														$rowcount = mysqli_num_rows($query);
														if ($rowcount == 0) {
														?>
														<tr>
															<td colspan="7" align="center">
																<h3 style="color:black"><?php mylan("No record found "," لا يوجد سجلات"); ?></h3>
															</td>
															<tr>
																<?php
																	} else {
																	while ($row = mysqli_fetch_array($query)) {
																	?>
																	<tr>
																		<td><?php echo htmlentities($row['id']); ?></td>
																		<td><img src="<?php echo htmlentities($imgloc.$row['admin_image']); ?>" height="50" width="50"  class="rounded-circle" onerror="this.src='assets/images/users/avatar-1.jpg'"></td>
																		<td><?php echo htmlentities($row['admin_name']); ?><br>
																		<span class="badge badge-primary"><?php echo htmlentities($row['designation']); ?></span></td>
																		
																		<td><?php echo htmlentities($row['admin_phone']); ?></td>
																		<td><?php echo htmlentities($row['admin_email']); ?></td>
																		<td>
																			<a href="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>?scid=<?php echo htmlentities($row['id']); ?>&&action=del" onclick="return confirm('Are you sure you want to delete?');"  ><i class="dripicons-trash"></i></a> &nbsp;&nbsp;&nbsp;&nbsp;
																			
																			<a href="edit-user.php?scid=<?php echo htmlentities($row['id']); ?>" ><i class="dripicons-document-edit"></i></a>
																			
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
											<div class="modal-dialog modal-dialog-centered">
												<div class="modal-content">
													
													<div class="modal-body">
														<div class="text-center mt-2 mb-4">
															<a href="index.html" class="text-success">
																<span><img src="assets/images/logo_sm_dark.png" alt="" height="18"></span>
															</a>
														</div>
														
														<form class="pl-3 pr-3"  method="post" enctype="multipart/form-data">
															
															<input type="hidden" name="bookId" id="bookId" value=""/>
															
															
															<div class="form-group">
																<label for="username"><?php mylan("Name ","اسم "); ?></label>
																<input class="form-control" type="text" id="username" required="" name="name">
															</div>
															
															
															
															<div class="form-group">
																<label for="emailaddress"><?php mylan(" Username"," اسم المستخدم"); ?></label>
																<input class="form-control" type="text"  required="" name="user">
															</div>
															
															<div class="form-group">
																<label for="password"><?php mylan("Password ","كلمه السر "); ?></label>
																<input class="form-control" type="password" required="" name="password">
															</div>
															
															<div class="form-group">
																<label for="password"><?php mylan(" Phone","هاتف "); ?></label>
																<input class="form-control" type="phone" required="" name="phone">
															</div>
															
															
															
															<div class="form-group">
																<label for="password"><?php mylan("Profile "," الملف الشخصي"); ?></label>
																<input type="file" class="form-control-file" id="exampleInputFile" name="image" >
															</div>
															
															
															
															<div class="form-group text-center">
																<button class="btn btn-primary" type="submit" name="submit"><?php mylan(" Add User"," إضافة مستخدم"); ?></button>
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