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
	
$pid = intval($_SESSION['pid']);
	
		

		if ($_GET['action'] == 'updt' && $_GET['scid']) {
			$id = intval($_GET['scid']);
			$val = $_GET['val'];
			$userlog = $_SESSION['login'];
			
			$query = mysqli_query($con, "UPDATE coupons SET coupon_active='$val' WHERE coupon_id=$id");
			$msg = "Updated ";
			header("location: ".$_SERVER['PHP_SELF']);
			
		}

		if ($_GET['action'] == 'del' && $_GET['scid']) {
			$id = intval($_GET['scid']);
			$userlog = $_SESSION['login'];
			
			$query = mysqli_query($con, "delete from bidding where b_id='$id'");
            $msg = "Deleted ";
            $uname = $_SESSION['login'];
            $queryy = mysqli_query($con, "insert into adminlog(name,action) values('$uname','Bidding deleted')");
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
												<li class="breadcrumb-item active"><?php mylan(" Management","إدارة "); ?></li>
											</ol>
										</div>
										<h4 class="page-title"><?php mylan("View Bidders ","مشاهدة ملف Bidders "); ?></h4>

									</div>
								</div>
							</div>   
							<div class="row"><!-- container Start-->
								<?php include 'includes/warnings.php';?>
								
								<!-- --------------->							
								<!-- container START-->							
								<!------------------>		
							
							<a  class="btn btn-sm btn-primary m-2" href="app-bidding.php"><?php mylan("Back ","خلف "); ?></a>
								<div class="col-lg-12">
									<div class="card">
								
										<div class="card-body">
																				
											<table data-order='[[ 0, "desc" ]]' id="basic-datatable" class="table dt-responsive nowrap w-100">
												<thead>
													<tr>
														<th><?php mylan("ID ","ID "); ?></th>
														<th><?php mylan("User ","مستخدم "); ?></th>
                                                         <th><?php mylan("Amount ","مقدار "); ?></th>															
														<th><?php mylan("Date","تاريخ "); ?></th>
														<th><?php mylan("Action","عمل "); ?></th>		
														
													</tr>
												</thead>
												
												
												<tbody>
													<?php
														
														$query = mysqli_query($con, "SELECT cu.*,u.* from bidding cu LEFT JOIN user u ON cu.u_id=u.u_id WHERE cu.p_id='$pid' ORDER by cu.b_id ASC");
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
																		<td><?php echo htmlentities($row['b_id']); ?></td>
																		    <td><strong><?php echo $row['name']; ?></strong><br><i class="mdi mdi-phone"></i> <?php echo $row['phone']; ?></td>  
																			<td><span class="badge badge-info-lighten"><?php echo $row['price'].'AED'; ?></span></td>
																			<td><?php echo htmlentities($row['b_created_on']); ?></td>	
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