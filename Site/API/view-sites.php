<?php
	session_start();
	include('includes/config.php');
	error_reporting(0);
	include 'includes/language.php';
	include 'includes/country.php';
	include 'includes/dbhelp.php';
	include 'includes/formdata.php';
	
	if(strlen($_SESSION['login'])==0)
	{ 
		header('location:index.php');
	}
	else{
		
		$adminid=$_SESSION['userid'];
		$sid= $_GET['sid'];
		$sname=$_GET['sname'];
		
		if($sid!=''){
			$_SESSION['sid']=$sid;
			$_SESSION['sname']=$sname;
			$_SESSION['pastscreen']='';
			}else{
			
			$sid=$_SESSION['sid'];
			$sname=$_SESSION['sname'];
			
		}
		
		$userdetail=array();
		
		$sql = "Select sites.*,bank.*,generator.* from sites 
				JOIN bank ON bank.b_id = sites.b_id 
				JOIN generator ON generator.g_id = sites.g_id WHERE s_id='$sid'";
		$result1 = $con->query($sql);	
		while($row1 = $result1->fetch_assoc()) 
		{	
			array_push($userdetail,$row1);
			$_SESSION['bankid']=$userdetail[0]['b_id'];
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
												<li class="breadcrumb-item"><a href="dashboard.php"><?php mylan("Dashboard ","لوحة القيادة "); ?></a></li>
												<li class="breadcrumb-item active">View Sites</li>
											</ol>
										</div>
										<h4 class="page-title">View Sites</h4>
										<a href="sites.php" class="btn btn-primary m-2" ><?php mylan("Back ","خلف "); ?></a>
										
									</div>
								</div>
							</div>   
							<div class="row"><!-- container Start-->
								<?php include 'includes/warnings.php';?>
								
								<!-- --------------->							
								<!-- container START-->							
								<!------------------>		
								
								<div class="col-xl-12 col-lg-12">
									
									<div class="card widget-flat h-75">
										<div class="card-body">
											<div class="row mb-2">
												
												<div class="col-sm-2">
													<img src="<?php echo htmlentities($imgloc.$userdetail[0]['s_image']); ?>"  style="width:100px;height:100px;object-fit:cover"  class="rounded-circle img-thumbnail" onerror="this.src='assets/images/bg-auth.jpg'">
												</div> <!-- end col-->
												
												<div class="col-sm-4">
													
													<small>
														<h4><?=$userdetail[0]['s_name'];?></h4>
														<b><?=$projectcode;?>S0<?=$userdetail[0]['s_id']; ?></b><br>
														<i class="uil uil-code"></i>&nbsp;&nbsp;<?=$userdetail[0]['s_code']; ?><br>
													</small>
													
												</div> <!-- end col-->
												
												<div class="col-sm-4">
													
													
													<small>
														<i class="uil uil-user"></i>&nbsp;&nbsp;<?=$userdetail[0]['s_contact_person']; ?><br>	
														<a href="tell:<?=$userdetail[0]['s_phone']; ?>"><i class="mdi mdi-cellphone"></i>&nbsp;&nbsp;<?php echo htmlentities($userdetail[0]['s_phone']); ?></a><br>
														<i class="mdi mdi-email"></i>&nbsp;&nbsp;<?=$userdetail[0]['s_email']; ?><br>	
														<i class="mdi mdi-map-marker-alert"></i>&nbsp;&nbsp;<?=$userdetail[0]['s_city']; ?>  <br>
														
													</small>
													
												</div> <!-- end col-->
												
												<div class="col-sm-2">
													
													
													<small>
														<i class="mdi mdi-bank-outline"></i>&nbsp;&nbsp;<?=$userdetail[0]['b_name']; ?><br>	
														<i class="mdi mdi-tools"></i>&nbsp;&nbsp;<?=$userdetail[0]['g_name']; ?><br>	
														<i class="mdi mdi-calendar"></i>&nbsp;&nbsp;<?=$userdetail[0]['s_purchase_date']; ?> (Purchase)<br>
														<i class="mdi mdi-calendar"></i>&nbsp;&nbsp;<?=$userdetail[0]['s_servicedate']; ?> (Next Service)<br>

													</small>
													
												</div> <!-- end col-->
												
												
											</div> <!-- end row -->
											
											
										</div> <!-- end card-body-->
									</div> <!-- end card--> 
								</div> <!-- end col-->
								
								
								<?php 

									cardMenu($lable='Service Visit' ,$number=Countdata("SELECT inspection.*,bank.*,user.*,sites.* FROM inspection 
													JOIN bank ON bank.b_id=inspection.b_id 
													JOIN sites ON sites.s_id=inspection.s_id 
													JOIN user ON user.u_id=inspection.u_id WHERE sites.s_id=$sid").' Visits', $url="inspection.php?view=user",$icon='uil-window' ,$size='3' ,'danger' );
									
									cardMenu($lable='Replacement' ,$number=Countdata("SELECT replacement.*, bank.*,user.*,sites.* FROM replacement 
										JOIN bank ON bank.b_id=replacement.b_id 
										JOIN sites ON sites.s_id=replacement.s_id 
										JOIN user ON user.u_id=replacement.u_id WHERE sites.s_id = $sid").' Items', $url='replacement.php?view=user',$icon='mdi mdi-file-replace-outline' ,$size='3' ,'info' );
									
									cardMenu($lable='Complaint' ,$number=Countdata("SELECT compliant.*,bank.*,user.*,sites.* FROM compliant 
													JOIN bank ON bank.b_id=compliant.b_id 
													JOIN sites ON sites.s_id=compliant.s_id 
													JOIN user ON user.u_id=compliant.u_id WHERE sites.s_id=$sid").' Items', $url='complaint.php?view=user',$icon='mdi mdi-settings-transfer-outline' ,$size='3' ,'success' );
									
									cardMenu($lable='Site user' ,$number=Countdata("Select site_user.*, user.*, sites.*, generator.g_image FROM site_user 
													JOIN user ON user.u_id = site_user.u_id
													JOIN sites ON sites.s_id = site_user.s_id
													JOIN generator ON generator.g_id = sites.g_id WHERE sites.s_id=$sid").' User', $url='site-user.php?view=user',$icon='uil-user' ,$size='3' ,'primary' );
									
									?>
								
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