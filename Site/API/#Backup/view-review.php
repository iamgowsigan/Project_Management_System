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

		$pid = $_SESSION['pid'];
		
		if(isset($_POST['submit']))
		{
			
			
			$name = addslashes($_POST['name']);
			$detail = addslashes($_POST['detail']);
			$price = addslashes($_POST['price']);
			
			
			$query = mysqli_query($con, "insert into lab(name,detail,price) values('$name','$detail','$price')");
			
			if ($query) {
				$ulog=$_SESSION['login'];
				$query = mysqli_query($con, "insert into adminlog(name,action) values('$ulog',$name.'Lab Added')");
				
				$msg = " Lab Test Added";
				} else {
				$error = "Something Wrong";
			}
			
			
		}
		
		if ($_GET['action'] == 'del' && $_GET['scid']) {
			$id = intval($_GET['scid']);
			$userlog = $_SESSION['login'];
			
			$query = mysqli_query($con, "delete from product_rating where pr_id='$id'");
            $msg = "Deleted ";
            $uname = $_SESSION['login'];
            $queryy = mysqli_query($con, "insert into adminlog(name,action) values('$uname','lab item deleted')");
			header("location: ".$_SERVER['PHP_SELF']);
			
		}

		if(isset($_POST['update'])){
	$prid = $_POST['prid'];
	$reply = $_POST['reply'];
	

	$query = mysqli_query($con,"UPDATE product_rating SET pr_reply='$reply' WHERE pr_id='$prid'");
if($query){
	$msg = "Updated";
	echo '<script>console.log("'.$prid.'");</script>';
}
		
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
												<li class="breadcrumb-item active"><?php mylan("Product "," المنتج"); ?></li>
											</ol>
										</div>
										<h4 class="page-title"><?php mylan("Product Reviews ","تعليقات المنتج"); ?></h4>
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
											
											<table data-order='[[ 4, "desc" ]]' id="basic-datatable" class="table dt-responsive nowrap w-100">
												<thead>
													<tr>
														<th><?php mylan("ID ","هوية شخصية "); ?></th>
														<th><?php mylan("Comments "," تعليقات"); ?></th>
														<th><?php mylan("Stars ","النجوم "); ?></th>	
														<th><?php mylan("Reply ","رد "); ?></th>
														<th><?php mylan("Action ","عمل "); ?></th>
													</tr>
												</thead>
												
												
												<tbody>
													<?php
														
														$query = mysqli_query($con, "Select * FROM product_rating WHERE p_id='$pid'");
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
																		$prid = $row['pr_id'];
																		$preply = $row['pr_reply'];
																	?>
																	<tr>
																		<td><?php echo htmlentities($row['pr_id']); ?></td>
																		
																		
																		<td><strong><?php echo wordwrap($row['comments'],50,"<br> \n"); ?></strong></td>
															
																		
																		<td><span class="badge badge-info"><?php echo htmlentities($row['star']); ?> Stars </span></td>
																		
																		<td><?php echo htmlentities(wordwrap($row['pr_reply'],50,"<br>\n")); ?></td>
																		
																			<td><a href="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>?scid=<?php echo htmlentities($row['pr_id']); ?>&&action=del" onclick="return confirm('Are you sure you want to delete?');" class="action-icon" ><i class="mdi mdi-delete"></i></a> 

                                                                              <a data-toggle="modal" data-target="#signup-modal"  href="javacript:" data-id="<?=$prid;?>" data-reply="<?=$preply;?>" class="expmodal action-icon" ><i class="mdi mdi-pencil"></i></a>
                                                                              
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
															
															<input type="hidden" name="prid" id="prid" />
															
																												
															<div class="form-group">
																<label for="reply"><?php mylan("Reply ","رد "); ?></label>
																<textarea class="form-control" placeholder="Write your reply" id="reply" name="reply"></textarea>
															</div>
													
															
															<div class="form-group text-center">
																<button class="btn btn-primary" type="submit" name="update"><?php mylan("Update Reply ","تحديث الرد "); ?></button>
															</div>
															
														</form>
														
													</div>
												</div>
											</div>
										</div>
										
										<!--  Form modal end -->
										
<script>
 $('.expmodal').click(function() {
  var prid = $(this).data('id');   
  var reply = $(this).data('reply'); 
 

 $('#reply').val(reply); 
  $('#prid').val(prid); 
 
  
  } );


  
  
 </script>										
										
										
										
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