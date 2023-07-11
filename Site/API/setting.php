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
		$adminid=$_SESSION['userid'];
		$id = intval($_GET['scid']);
		
		
		
		
		if(isset($_POST['updatee']))
		{
			
			
			$version = addslashes($_POST['version']);
			$tax = addslashes($_POST['tax']);
			$otp = addslashes($_POST['otp']);
			$splashscreen_time = addslashes($_POST['splashscreen_time']);
            $api_translate = addslashes($_POST['api_translate']);
            $api_currency = addslashes($_POST['api_currency']);
            $api_whatsapp = addslashes($_POST['api_whatsapp']);
             $api_otp = addslashes($_POST['api_otp']);
              $api_map = addslashes($_POST['api_map']);
               $android_url = addslashes($_POST['android_url']);
                $ios_url = addslashes($_POST['ios_url']);
                 $otp_email = addslashes($_POST['otp_email']);
                 $otp_email_password = addslashes($_POST['otp_email_password']);
                 $whatsapp = addslashes($_POST['whatsapp']);
                 $website = addslashes($_POST['website']);
                 $email = addslashes($_POST['email']);

                    $app_font = addslashes($_POST['app_font']);
                     $delivery_cost = addslashes($_POST['delivery_cost']);
                      $enable_cod = addslashes($_POST['enable_cod']);
                       $enable_pay = addslashes($_POST['enable_pay']);

			    $oldimage = $_POST['oldimage'];
			$file_name = $_FILES['image']['name'];
			
			if($file_name=="")
			{
				$file_name=$oldimage;
				
				}else{
				
				$file_name = $_FILES['image']['name'];
				$file_tmp = $_FILES['image']['tmp_name'];
				$temp = explode(".", $_FILES["image"]["name"]);
				$file_name = 'product' . round(microtime(true)) . '.' . end($temp);
				
				
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

			$query = mysqli_query($con, "UPDATE app_setting SET 
			app_version='$version',
			otp='$otp',
			splashscreen='$file_name',
	    	tax='$tax',
	    	splashscreen_time='$splashscreen_time',
	    	api_translate='$api_translate',
	    	api_currency='$api_currency',api_whatsapp='$api_whatsapp',api_otp='$api_otp',api_map='$api_map',
	    	android_url='$android_url',ios_url='$ios_url',otp_email='$otp_email',otp_email_password='$otp_email_password',
	    	whatsapp='$whatsapp',
	    	website='$website',email='$email',app_font='$app_font',delivery_cost='$delivery_cost',enable_cod='$enable_cod',enable_pay='$enable_pay'
			WHERE s_id=1");
			
			if ($query) {
				$ulog=$_SESSION['login'];
				$query = mysqli_query($con, "insert into adminlog(name,action) values('$ulog','Setting Updated')");
				
				$msg = " Setting Updated";
				} else {
				$error = "Something Wrong";
			}
		}
	?>
	
	<!DOCTYPE html>
	<html lang="en">
		
		<head>
			<?php include 'includes/head.php';?>
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
												<li class="breadcrumb-item"><a href="dashboard.php"><?php mylan("Dashboard "," لوحة القيادة"); ?></a></li>
												<li class="breadcrumb-item active"><?php mylan(" Settings","إعدادات "); ?></li>
											</ol>
										</div>
										<h4 class="page-title"><?php mylan("App Settings "," إعدادات التطبيقات"); ?></h4>
									</div>
								</div>
							</div>   
							<div class="row"><!-- container Start-->
								<?php include 'includes/warnings.php';?>
								
								<!-- --------------->							
								<!-- container START-->							
								<!------------------>		
								
								
								<div class="col-lg-12">
									<div class="card">
										<div class="card-body">
											<h4 class="header-title"></h4>
											
										</p>
										<?php
											
											$query1 = mysqli_query($con, "Select * from app_setting WHERE s_id=1");
											while ($rowp = mysqli_fetch_array($query1)) {
											?>							
											
											<form class="form" method="post" enctype="multipart/form-data">
												<div class="row">
													
													<div class="col-6">
														<div class="form-group mb-3">
															<label for="validationCustom01"><?php mylan("App Version "," نسخة التطبيق"); ?></label>
															<input type="number" class="form-control" name="version" value="<?php echo htmlentities($rowp['app_version']); ?>">
														</div>
													</div>
													
												
													
												
													
													<div class="col-6">
														<div class="form-group mb-3">
															<label for="validationCustom01"><?php mylan("Tax ","ضريبة "); ?></label>
															<input type="text" class="form-control" name="tax" value="<?php echo htmlentities($rowp['tax']); ?>">
														</div>
													</div>
													
													
													
													<div class="col-6">
														<div class="form-group mb-3">
															<label for="validationCustom01"><?php mylan("Otp","نسخة الاستطلاع "); ?></label>
															<input type="number" class="form-control" name="otp" value="<?php echo htmlentities($rowp['otp']); ?>">
														</div>
													</div>
													
													<div class="col-6">
														<div class="form-group mb-3">
															<label for="validationCustom01"><?php mylan("Splash Screen Time","عنوان URL للاستطلاع باللغة الإنجليزية "); ?></label>
															<input type="text" class="form-control" name="splashscreen_time" value="<?php echo htmlentities($rowp['splashscreen_time']); ?>">
														</div>
													</div>
													<div class="col-6">
														<div class="form-group mb-3">
															<label for="validationCustom01"><?php mylan("API Translate","عنوان URL للاستطلاع باللغة الإنجليزية "); ?></label>
															<input type="text" class="form-control" name="api_translate" value="<?php echo htmlentities($rowp['api_translate']); ?>">
														</div>
													</div>

													<div class="col-6">
														<div class="form-group mb-3">
															<label for="validationCustom01"><?php mylan("API Currency","عنوان URL للاستطلاع باللغة الإنجليزية "); ?></label>
															<input type="text" class="form-control" name="api_currency" value="<?php echo htmlentities($rowp['api_currency']); ?>">
														</div>
													</div>

													<div class="col-6">
														<div class="form-group mb-3">
															<label for="validationCustom01"><?php mylan("API Whatsapp","عنوان URL للاستطلاع باللغة الإنجليزية "); ?></label>
															<input type="text" class="form-control" name="api_whatsapp" value="<?php echo htmlentities($rowp['api_whatsapp']); ?>">
														</div>
													</div>
													<div class="col-6">
														<div class="form-group mb-3">
															<label for="validationCustom01"><?php mylan("API OTP","عنوان URL للاستطلاع باللغة الإنجليزية "); ?></label>
															<input type="text" class="form-control" name="api_otp" value="<?php echo htmlentities($rowp['api_otp']); ?>">
														</div>
													</div>
													<div class="col-6">
														<div class="form-group mb-3">
															<label for="validationCustom01"><?php mylan("API Map","عنوان URL للاستطلاع باللغة الإنجليزية "); ?></label>
															<input type="text" class="form-control" name="api_map" value="<?php echo htmlentities($rowp['api_map']); ?>">
														</div>
													</div>
												<div class="col-6">
														<div class="form-group mb-3">
															<label for="validationCustom01"><?php mylan("Android URL","عنوان URL للاستطلاع باللغة الإنجليزية "); ?></label>
															<input type="text" class="form-control" name="android_url" value="<?php echo htmlentities($rowp['android_url']); ?>">
														</div>
													</div>
                                                <div class="col-6">
														<div class="form-group mb-3">
															<label for="validationCustom01"><?php mylan("IOS URL","عنوان URL للاستطلاع باللغة الإنجليزية "); ?></label>
															<input type="text" class="form-control" name="ios_url" value="<?php echo htmlentities($rowp['ios_url']); ?>">
														</div>
													</div>

													<div class="col-6">
														<div class="form-group mb-3">
															<label for="validationCustom01"><?php mylan("OTP Email","عنوان URL للاستطلاع باللغة الإنجليزية "); ?></label>
															<input type="text" class="form-control" name="otp_email" value="<?php echo htmlentities($rowp['otp_email']); ?>">
														</div>
													</div>
													<div class="col-6">
														<div class="form-group mb-3">
															<label for="validationCustom01"><?php mylan("OTP Email Password","عنوان URL للاستطلاع باللغة الإنجليزية "); ?></label>
															<input type="text" class="form-control" name="otp_email_password" value="<?php echo htmlentities($rowp['otp_email_password']); ?>">
														</div>
													</div>

														<div class="col-6">
														<div class="form-group mb-3">
															<label for="validationCustom01"><?php mylan("Whatsapp","عنوان URL للاستطلاع باللغة الإنجليزية "); ?></label>
															<input type="text" class="form-control" name="whatsapp" value="<?php echo htmlentities($rowp['whatsapp']); ?>">
														</div>
													</div>
                                                    
                                                    	<div class="col-6">
														<div class="form-group mb-3">
															<label for="validationCustom01"><?php mylan("Website","عنوان URL للاستطلاع باللغة الإنجليزية "); ?></label>
															<input type="text" class="form-control" name="website" value="<?php echo htmlentities($rowp['website']); ?>">
														</div>
													</div>
                                                       	<div class="col-6">
														<div class="form-group mb-3">
															<label for="validationCustom01"><?php mylan("Email","عنوان URL للاستطلاع باللغة الإنجليزية "); ?></label>
															<input type="text" class="form-control" name="email" value="<?php echo htmlentities($rowp['email']); ?>">
														</div>
													</div>
														<div class="col-6">
														<div class="form-group mb-3">
															<label for="validationCustom01"><?php mylan("App Font","عنوان URL للاستطلاع باللغة الإنجليزية "); ?></label>
															<input type="text" class="form-control" name="app_font" value="<?php echo htmlentities($rowp['app_font']); ?>">
														</div>
													</div>

                                       <div class="col-6">
														<div class="form-group mb-3">
															<label for="validationCustom01">Enable COD</label>
															
															<select class="form-control" name="enable_cod">
																<option <?php if($rowp['enable_cod'] == '1'){echo 'selected';}?> value="1">Yes</option>
                                                <option <?php if($rowp['enable_cod'] == '0'){echo 'selected';}?>  value="0">No</option>


															</select>
														</div>
													</div>

													 <div class="col-6">
														<div class="form-group mb-3">
															<label for="validationCustom01">Enable PAY</label>
															
															<select class="form-control" name="enable_pay">
																<option <?php if($rowp['enable_pay'] == '1'){echo 'selected';}?> value="1">Yes</option>
                                                <option <?php if($rowp['enable_pay'] == '0'){echo 'selected';}?>  value="0">No</option>


															</select>
														</div>
													</div>



													<div class="col-6">
														<div class="form-group mb-3">
															<label for="validationCustom01">Delivery Cost</label>
															<input type="text" class="form-control" name="delivery_cost" value="<?php echo htmlentities($rowp['delivery_cost']); ?>">
														</div>
													</div>

													<div class="col-6">
															<div class="form-group mb-3">
																<label for="validationCustom03"><?php mylan("Image ","صورة "); ?></label>
																<input type="file" class="form-control-file" id="exampleInputFile" name="image"><br><br>
																<img src="<?php echo htmlentities($imgloc.$rowp['splashscreen']); ?>" alt="image" class="img-fluid avatar-md rounded" onerror="this.src='assets/images/bg-auth.jpg'">
																<input type="hidden" name="oldimage" value="<?php echo htmlentities($rowp['splashscreen']); ?>">
																
															</div>
														</div>
														
												</div>
												<button name="updatee" class="btn btn-primary" type="submit"><?php mylan("Update Settings ","تحديث الاعدادات "); ?></button>
											</form>    
										<?php } ?>	
									</div> <!-- end card-body-->
								</div> <!-- end card-->
							</div> <!-- end col-->		
							
							
							
							
							
							
							
							
							
							
							
							
							
							
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
			
			<!-- demo app -->
			<script src="assets/js/pages/demo.dashboard-crm.js"></script>
			<!-- end demo js-->
		</body>
	</html>
<?php } ?>	