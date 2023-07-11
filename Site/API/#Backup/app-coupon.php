<?php
	session_start();
	include('includes/config.php');
	//error_reporting(0);
	include 'includes/language.php';
	include 'includes/dbhelp.php';
	include 'includes/formdata.php';
	if(strlen($_SESSION['login'])==0)
	{ 
		header('location:index.php');
	}
	else{
		
		//ADD
		if(isset($_POST['submit']))
		{
			
			$field['coupon_detail'] = addslashes($_POST['coupon_detail']);
			$field['coupon_code'] = addslashes($_POST['coupon_code']);
			
			$res=Insertdata("coupons",$field);
			if($res!=0){
				$msg = "Success ";
				header("location: ".$_SERVER['PHP_SELF']."?eid=".$res."&&edit=1");
				}else{
				$error = "Deleted ";
			} 
			
		}
		
		//Update
		if(isset($_POST['update']))
		{
			
			$eid=intval($_GET['eid']);
			//$oldimage = $_POST['oldimage'];
			
			
			$field['coupon_detail'] = addslashes($_POST['coupon_detail']);
			$field['coupon_code'] = addslashes($_POST['coupon_code']);
			$field['coupon_price'] = addslashes($_POST['coupon_price']);
			$field['coupon_percentage'] = addslashes($_POST['coupon_percentage']);
			$field['coupon_products'] = addslashes(implode($_POST['coupon_products'],','));
						
			
			$res=Updatedata("coupons",$field,"coupon_id =$eid");
			if($res!=0){
				
				$msg = "Success ";
				}else{
				$error = "something error ";
			} 	
		}
		
		
		//Active
		if ($_GET['action'] == 'status' && $_GET['scid']) {
			$scid = intval($_GET['scid']);
			$val = $_GET['val'];
			$field['coupon_active'] = $val;
			$res=Updatedata("coupons",$field,"coupon_id=$scid");
			$msg = "Success ";
			//	header("location: ".$_SERVER['PHP_SELF']);
		}
		
		//delete
		if ($_GET['action'] == 'del' && $_GET['scid']) {
			$id = intval($_GET['scid']);
			$res=Deletedata("delete from coupons where coupon_id='$id'");
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
												<li class="breadcrumb-item active">Coupons</li>
											</ol>
										</div>
										<h4 class="page-title">Manage Coupons</h4>
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
									
									
									
									<button type="button" class="btn btn-primary m-2" data-toggle="modal" data-target="#signup-modal">Add Coupon</button>
									
									<div class="col-lg-12">
										<div class="card">
											<div class="card-body">
												<table data-order='[[ 0, "desc" ]]' id="basic-datatable" class="table dt-responsive nowrap w-100">
													<thead>
														<tr>
															<th>ID</th>
															<th><?php mylan("Title","عنوان"); ?></th>
															<th><?php mylan("Code ","شفرة"); ?></th>
															<th><?php mylan("Value ","قيمة "); ?></th>
															<th><?php mylan("Products ","منتجات"); ?></th>
															<th><?php mylan("Status ","حالة   "); ?></th>
															<th><?php mylan("Action ","عمل"); ?></th>
														</tr>
													</thead>
													<tbody>
														<?php
															
															$listdata=Selectdata("Select * FROM coupons");
															
															
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
																			//$getid=$row['coupon_products'];
																		?>
																		<tr>
																			
																			<td><?php text( $row['coupon_id'], $strong=false, $small=false, $badge=false, $lighten=false, $outline=false, '' ); ?></td>
																			
																			<td><?php text( $row['coupon_detail'], $strong=false, $small=false, $badge=false, $lighten=false, $outline=false, '' ); ?></td>
																			
																			<td><?php text( $row['coupon_code'], $strong=true, $small=false, $badge=false, $lighten=false, $outline=false, 'info' ); ?></td>
																			
																			<td>
																				<span class="badge badge-success">
																					<?php if($row['coupon_percentage']!='' && $row['coupon_percentage']!= '0'){
																						echo $row['coupon_percentage'].' % OFF';
																					}else{ echo $row['coupon_price'].$currency;} ?>
																				</span>
																			</td>
																			
																			<td> <?php  $getProduct=explode(",",$row['coupon_products']); ?>
																				<?php text( sizeof($getProduct).' Linked', $strong=true, $small=false, $badge=true, $lighten=true, $outline=false, 'primary' ); ?>
																			</td>
																			
																			<td><?php active( $row['coupon_active'],$row['coupon_id']  ); ?></td>
																			
																			<td><?php action(  $row['coupon_id'],'E,D'  ); ?></td>
																			
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
											
											
											<a class="btn btn-primary m-2" href="<?=$_SERVER['PHP_SELF']; ?>?edit=0" >Back</a>
											
											<div class="col-lg-12">
												<div class="card">
													<div class="card-body">
														
														<?php
															$listdata=Selectdata("Select * FROM coupons WHERE coupon_id=$eid");
															foreach ($listdata as $row) {
															?>
															<form class="form" method="post" enctype="multipart/form-data">
																<div class="row">
																	
																	<?php  forminput(  'Title',  'coupon_detail',  $row['coupon_detail'],  'required',  '6',  'text'  ); ?>
																	<?php  forminput(  'Coupon Code',  'coupon_code',  $row['coupon_code'],  'required',  '6',  'text'  ); ?>
																	<?php  forminput(  'Coupon Price',  'coupon_price',  $row['coupon_price'],  'required',  '6',  'text'  ); ?>
																	<?php  forminput(  'Coupon Percentage',  'coupon_percentage',  $row['coupon_percentage'],  'required',  '6',  'text'  ); ?>
																	
																	<?php  
																		$menudata=Selectdata("SELECT * FROM products Order BY p_id ASC");
																	formmulti(  'Coupon Products',  'coupon_products', $menudata, 'required','6', $row['coupon_products'], 'p_id', 'p_title' ); ?>
																	
																</div>
																<button name="update" class="btn btn-primary" type="submit">Update Coupon</button>
															</form>    
														<?php }  ?>
													</div> <!-- end card-body-->
												</div> <!-- end card-->
											</div> <!-- end col-->		
											
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
																
																
																<?php  forminput(  'Title',  'coupon_detail',  '',  'required',  '6',  'text'  ); ?>
																<?php  forminput(  'Coupon Code',  'coupon_code',  '',  'required',  '6',  'text'  ); ?>
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
									</body>
									</html>
									<?php } ?>																																																																																																																																																																																																																																																									