<?php
	session_start();
	include('includes/config.php');
	error_reporting(0);
	include 'includes/language.php';
	include 'includes/dbhelp.php';
	include 'includes/formdata.php';
	if(strlen($_SESSION['login'])==0)
	{ 
		header('location:index.php');
	}
	else{
		
 
		
		
		if(isset($_POST['save']))
		{
			$pid = addslashes($_POST['pid']);
			
		    $_SESSION['pid']=$pid;
			
			header("location: edit-product.php");
			
			
			
		}	
		
		if(isset($_POST['review']))
		{
			$pid = addslashes($_POST['pid']);
			
		    $_SESSION['pid']=$pid;
			
			header("location: view-review.php");
			
			
			
		}	
		
		
 
	?>
	<!DOCTYPE html>
	<html lang="en">
		
		<head>
			<?php include 'includes/head.php';?>
			<link href="assets/css/vendor/dataTables.bootstrap4.css" rel="stylesheet" type="text/css" />
			<link href="assets/css/vendor/responsive.bootstrap4.css" rel="stylesheet" type="text/css" />
			<link href="assets/css/vendor/buttons.bootstrap4.css" rel="stylesheet" type="text/css" />
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
												<li class="breadcrumb-item active"><?php mylan("Report ","تقرير "); ?></li>
											</ol>
										</div>
										
										<h4 class="page-title">Stock Report</h4>
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
											
											<table  id="datatable-buttonsss"   class="table dt-responsive w-100" data-order='[[ 8, "desc" ]]'>
												<thead>
													<tr>
														<th>ID</th>
														<th>Image</th>
														<th>Title</th>
														
														<th>Sub Category</th>
														<th>Category</th>
														<th>MRP</th>
														<th>Sell</th>
														<th>Unit</th>
														<th>Stock Left</th>
														<th>Stock</th>
														<th>Status</th>
													</tr>
												</thead>
												<tbody>
														<?php
															
															$listdata=Selectdata("Select products.*,category.*,subcategory.* FROM products JOIN category ON category.c_id=products.c_id JOIN subcategory ON subcategory.sc_id=products.sc_id");
															
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
	
																			<td><?php text( $row['p_id'], $strong=false, $small=false, $badge=false, $lighten=false, $outline=false, '' ); ?></td>
																			
																			<td><?php image( $row['p_image'],'50','50','cover'  ); ?></td>
																			
																			<td><?php text( $row['p_title'], $strong=true, $small=true, $badge=false, $lighten=false, $outline=false, '' ); ?></td>
																			<td><?php text( $row['sc_name'], $strong=false, $small=true, $badge=false, $lighten=false, $outline=false, '' ); ?></td>
																			<td><?php text( $row['c_name'], $strong=false, $small=true, $badge=false, $lighten=false, $outline=false, '' ); ?></td>
																			<td><?php text( $row['p_mrp'].' AED', $strong=false, $small=true, $badge=false, $lighten=false, $outline=false, '' ); ?></td>
																			<td><?php text( $row['p_sell'].' AED', $strong=true, $small=true, $badge=false, $lighten=false, $outline=false, '' ); ?></td>
																			<td><?php text( $row['p_quantity'].' '.ArrayToName($row['p_unit'],$unitlist,'id','lable'), $strong=false, $small=true, $badge=false, $lighten=false, $outline=false, '' ); ?></td>
																			
																			<td><?php text( $row['p_stock_left'], $strong=true, $small=true, $badge=false, $lighten=false, $outline=false, '' ); ?></td>
																		
																			<td><?php text( $row['p_stock'], $strong=false, $small=true, $badge=false, $lighten=false, $outline=false, '' ); ?></td>
																			<td><?php statuslabel(    $row['p_status']  ); ?></td>
																				
																		</tr>
																	<?php } } ?>
															</tbody>
												
									
											</table> 
											
										</div> <!-- end card-body-->
									</div> <!-- end card-->
								</div> <!-- end col-->		
								
								
			
								
								<!--  Form modal end -->
								
								<script>
									
									$(document).ready(function() {
										$('#datatable-buttonsss').DataTable( {
											scrollX: true,
											dom: 'Bfrtip',
											buttons: [
											'copy', 'csv', 'excel', 'pdf', 'print'
											]
										} );
									} );
									
									$(document).ready(function(){
										
										
										$('.cate').change(function(){  
											var cate = $('.cate').val();
											
											
											$.ajax({url: "show-subcategory.php?cate=" + cate, cache: true, success: function (result) {
												$("#show").html(result);
												$('#p_subcategory').select2();
											}});
											
										});
										
										
									});
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
				<script src="assets/js/vendor/jquery.rateit.min.js"></script>
				<script src="assets/js/ui/component.rating.js"></script>
				<script src="assets/js/vendor/dataTables.buttons.min.js"></script>
				<script src="assets/js/vendor/buttons.bootstrap4.min.js"></script>
				<script src="assets/js/vendor/buttons.html5.min.js"></script>
				<script src="assets/js/vendor/buttons.flash.min.js"></script>
				<script src="assets/js/vendor/buttons.print.min.js"></script>
				<script src="assets/js/vendor/pdfmake.min.js"></script>
				<!-- Datatable Init js -->
				<script src="assets/js/pages/demo.datatable-init.js"></script>
				<!-- end demo js-->
			</body>
		</html>
	<?php } ?>																																													