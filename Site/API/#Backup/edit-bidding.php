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
		$uid = intval($_SESSION['uid']);
		$pid = intval($_SESSION['pid']);
		
		
		
		if(isset($_POST['updatee']))
		{
			$category = $_POST['p_category'];
			$subcategory = $_POST['p_subcategory'];
			$lable = $_POST['p_label'];
			$title = addslashes($_POST['p_title']);
			$titlearab = addslashes($_POST['p_title_arab']);
			
			$sub = addslashes($_POST['p_sub']);
			$subarab = addslashes($_POST['p_sub_arab']);
        	$price_start = $_POST['p_price_start'];
			$price_latest = addslashes($_POST['p_price_latest']);
			
			$detail = addslashes($_POST['p_detail']);
			$detailarab = addslashes($_POST['p_detail_arab']);
			$quantity = $_POST['p_quantity'];
		    $unit = addslashes($_POST['p_units']);
			
			$color = $_POST['p_color'];
					//$stime = $_POST['stime'];
				//$sdate = $_POST['sdate'];
			  $etime = $_POST['etime'];
				$edate = $_POST['edate'];
				
			//$sdatetime = $sdate.'T'.$stime.'+0400';	
			$edatetime = $edate.'T'.$etime.'+0400';		
		
			/*$tags = "";
			foreach ($_POST['p_tags'] as $t){
				$tags=$tags.$t.', ';
			}
			$tags=substr($tags, 0, -2);*/
			
			$f1 = $_POST['f1'];
			$f2 = $_POST['f2'];
			$f3 = $_POST['f3'];
			$f4 = $_POST['f4'];
			$f5 = $_POST['f5'];
			$f6 = $_POST['f6'];
			
			
			foreach($colorlist as $c){
				if($c['lable'] == $color){
					$colorid = $c['id'];
				}
			}
			
			
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
			
			
		
			$query = mysqli_query($con, "UPDATE bid SET 
			c_id='$category',
			sc_id = '$subcategory',
			l_id = '$lable',
			p_title='$title',
			p_title_arab='$titlearab',
			p_sub='$sub',
			p_sub_arab='$subarab',
			p_price_start='$p_price_start',
			p_price_latest='$p_price_latest',
			p_detail='$detail',
			p_detail_arab='$detailarab',
			p_quantity='$quantity',
			p_unit='$unit',
			p_color = '$colorid',
			
			end_time = '$edatetime',
			
			p_image='$file_name',
			f_1 = '$f1',
			f_2 = '$f2',
			f_3 = '$f3',
			f_4 = '$f4',
			f_5 = '$f5',
			f_6 = '$f6',
			p_status = 'A'
			
			WHERE p_id=$pid");
			
			if ($query) {
				
				mysqli_query($con, "UPDATE cart SET changed='1' WHERE p_id=$pid AND book_id='0'");
		 echo '<script>window.scroll({top: 0, left: 0});</script>';
		  header("refresh: 1;");
				$msg = "Product Updated";
				} else {
				
				$error = "Something Wrong".$sqll;
			}
			
		}
		
		
		if(isset($_POST['addvariant']))
		{
			
			
			$title = addslashes($_POST['title']);
			$titlearab = addslashes($_POST['titlearab']);
			$mrp = addslashes($_POST['mrp']);
			$sell = addslashes($_POST['sell']);
			
			$color = $_POST['pv_color'];
			$colorcode = substr($color,1);
			
			
			$query = mysqli_query($con, "insert into product_variant(p_id,pv_title,pv_title_arab,pv_mrp,pv_sell,pv_color) values('$pid','$title','$titlearab','$mrp','$sell','$colorcode')");
			
			if ($query) {
				$ulog=$_SESSION['login'];
				//$msg = " Variant Added";
				} else {
				$error = "Something Wrong";
			}
			
			
		}
		
		if ($_GET['action'] == 'act' && $_GET['scid']) {
			$id = intval($_GET['scid']);
			$userlog = $_SESSION['login'];
			
			$query = mysqli_query($con, "UPDATE product_variant SET pv_active='1' WHERE pv_id=$id");
			$msg = "Activated ";
			header("location: ".$_SERVER['PHP_SELF']);
			
		}
		
		if ($_GET['action'] == 'dact' && $_GET['scid']) {
			$id = intval($_GET['scid']);
			$userlog = $_SESSION['login'];
			
			$query = mysqli_query($con, "UPDATE product_variant SET pv_active='0' WHERE pv_id=$id");
			$msg = "Deactivated ";
			header("location: ".$_SERVER['PHP_SELF']);
			
		}
		
		
		
		if ($_GET['action'] == 'del' && $_GET['varid']) {
			$vid = intval($_GET['varid']);
			$query = mysqli_query($con, "delete from product_variant  where pv_id='$vid'");
			$msg = "Deleted ";
			header("location: ".$_SERVER['PHP_SELF']);
			
		}
		
		
		
		if ($_GET['action'] == 'delimg' && $_GET['delid']) {
			$did = intval($_GET['delid']);
			$query = mysqli_query($con, "delete from product_images  where pi_id='$did'");
			$msg = "Deleted ";
			header("location: ".$_SERVER['PHP_SELF']);
			
		}
		
		//Gallery
		if(isset($_POST['submitimages']))
		{
			
			$pi_variant = $_POST['pi_variant'];
			
			foreach ($_FILES['files']['tmp_name'] as $key => $value) { 
				
				$file_tmp = $_FILES['files']['tmp_name'][$key]; 
				$file_name = $_FILES['files']['name'][$key]; 
				$file_ext = pathinfo($file_name, PATHINFO_EXTENSION); 
				$file_name = 'product'. round(microtime(true)).$key. '.'  .$file_ext;	
				$imageFileType = strtolower(pathinfo($file_name,PATHINFO_EXTENSION));
				
				$query = mysqli_query($con, "insert into product_images(p_id,pi_var,pi_image,is_bid) values('$pid','$pi_variant','$file_name','1')");
				
				if ($query) {
					
					
					
					if($production=="1"){
						$file_type=$_FILES['image']['type'][$key];
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
					
					
					
					
					} else {
					
					$error = "Something Wrong";
				}
				
				
				
			} 
			
			//$msg = " Succeed";
			
			
			
			
			
			
		}
		
	?>
	
	<!DOCTYPE html>
	<html lang="en">
		
		<head>
			<?php include 'includes/head.php';?>
			<link href="assets/css/vendor/summernote-bs4.css" rel="stylesheet" type="text/css" />
			
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
												<li class="breadcrumb-item"><a href="dashboard.php"><?php mylan("Dashboard ","للوحة القيادة"); ?></a></li>
												<li class="breadcrumb-item active"><?php mylan("Edit Product ","تتحرير المنتج"); ?></li>
											</ol>
										</div>
										<h4 class="page-title">Edit <?=$screenname;?></h4>
									</div>
								</div>
							</div>   
							<div class="row" id="pos"><!-- container Start-->
								<?php include 'includes/warnings.php';?>
								
								<!-- --------------->							
								<!-- container START-->							
								<!------------------>	
								
								
								<a  class="btn btn-sm btn-primary m-2" href="app-bidding.php">Back</a>
								
								<?php
									
									$query1 = mysqli_query($con, "Select * from bid WHERE p_id=$pid");
									
									while ($rowp = mysqli_fetch_array($query1)) {
										$getproductCat=$rowp['c_id'];
										
										$sdt = $rowp['start_time'];
										$edt = $rowp['end_time'];
										
										$sd = substr($sdt,0,10);
										$ed = substr($edt,0,10);
										
										$st = substr($sdt,11,5);
										$et = substr($edt,11,5);
											
										
									?>							
									
									
									<div class="col-lg-12">
										
										<form class="form" method="post" enctype="multipart/form-data">
											<div class="card">
												<div class="ml-2 float-left">
													<h4><?php mylan("Basic ","الأساسي"); ?></h4>
													
												</div>
												<div class="card-body">
													<div class="row">
														
														
														<div class="col-6">
															<div class="form-group mb-3">
																<label for="validationCustom01"><?php mylan("Title "," عنوان"); ?> </label>
																<input type="text" class="form-control" name="p_title" value="<?=$rowp['p_title']; ?>" required>
															</div>
														</div>
														
														<div class="col-6">
															<div class="form-group mb-3">
																<label for="validationCustom01"><?php mylan("Title Arabic ","العنوان عربي   "); ?> </label>
																<input type="text" class="form-control" name="p_title_arab" value="<?=$rowp['p_title_arab']; ?>" required>
															</div>
														</div>
														<div class="col-6">
															<div class="form-group mb-3">
																<label for="validationCustom01"><?php mylan("Sub Title","لترجمات"); ?> </label>
																<input type="text" class="form-control" name="p_sub" value="<?=$rowp['p_sub']; ?>" required>
															</div>
														</div>
														<div class="col-6">
															<div class="form-group mb-3">
																<label for="validationCustom01"><?php mylan("Sub Title Arabic ","لالعنوان الفرعي عربي "); ?> </label>
																<input type="text" class="form-control" name="p_sub_arab" value="<?=$rowp['p_sub_arab']; ?>" required>
															</div>
														</div>
														
														<div class="col-6">
															<div class="form-group mb-3">
																<label for="validationCustom01"><?php mylan("Category ","فئة "); ?> </label>
																
																<select class="cate select" data-toggle="select2" name="p_category" >
																	
																	<?php
																		
																		$catquery=mysqli_query($con,"SELECT * FROM category ORDER BY c_id ASC");
																		
																		while($catresult=mysqli_fetch_array($catquery))
																		{    ?>
																		<option value="<?=$catresult['c_id'];?>"  <?php if(strpos($rowp['c_id'],$catresult['c_id'])!==false) echo "selected";?>><?=$catresult['c_name'];?></option>
																	<?php } ?>
																</select>
																
															</div>
														</div>
														
														
														<div class="col-6">
															
															<div id="show">
																
																<div class="form-group mb-3">
																	<label for="validationCustom01"><?php mylan("Sub Category ","فتصنيف فرعي"); ?> </label>
																	
																	<select class="select2 form-control" data-toggle="select2" name="p_subcategory" >
																		
																		<?php
																			$cat = $rowp['c_id'];
																			$subquery=mysqli_query($con,"SELECT * FROM subcategory WHERE c_id=$cat ORDER BY sc_name ASC");
																			
																			while($result=mysqli_fetch_array($subquery))
																			{    ?>
																			<option value="<?=$result['sc_id'];?>"  <?php if(strpos($rowp['sc_id'],$result['sc_id'])!==false)echo"selected";?>><?=$result['sc_name'];?></option>
																		<?php } ?>
																	</select>
																	
																	
																</div>
																
																
															</div>
															
														</div>
														
													</div>
												</div>
											</div>
											<div class="card">
												<div class="ml-2 float-left">
													<h4><?php mylan("Price & Units ","صالسعر والوحدات"); ?></h4>
													
												</div>
												<div class="card-body">
													<div class="row">
														<div class="col-6">
															<div class="form-group mb-3">
																<label for="validationCustom01"><?php mylan("Start Price "," السعر المبدئي"); ?></label>
																<input type="number" class="form-control" name="p_price_latest" id="p_price_latest" value="<?=$rowp['p_price_start']; ?>" required>
																<span class="text-success font-weight-bold" id="smsg"></span>
																<span class="text-danger font-weight-bold" id="msg"></span>
																
															</div>
															
														</div>
														<div class="col-6">
															<div class="form-group mb-3">
																<label for="validationCustom01"><?php mylan("Latest Price "," أحدث السعر"); ?></label>
																<input type="number" class="form-control" name="p_price_start" id="p_price_latest" value="<?=$rowp['p_price_latest']; ?>" required>
																
															</div>
														</div>
														<div class="col-6">
															<div class="form-group mb-3">
																<label for="validationCustom01"><?php mylan("Quantity ","كمية "); ?></label>
																<input type="number" class="form-control" name="p_quantity" value="<?=$rowp['p_quantity']; ?>" required>
																
															</div>
														</div>
														
														<div class="col-6">
															<div class="form-group mb-3">
																<label for="validationCustom01"><?php mylan("Unit ","وحدة "); ?></label>
																<select class="select2 form-control" data-toggle="select2" name="p_units" >
																	
																	<?php
																		for($x=0;$x<sizeof($unitlist);$x++)
																		{    ?>
																		<option value="<?=$unitlist[$x]['id'];?>"  <?php if(strpos($rowp['p_unit'],$unitlist[$x]['id'])!==false)echo"selected";?>><?=$unitlist[$x]['lable'];?></option>
																	<?php } ?>
																</select>
																
																
															</div>
														</div>
														
														
														
													</div>
												</div>
											</div>
											
											
											
											
											
											<div class="card">
												<div class="ml-2 float-left">
													<h4><?php mylan("Details ","صتفاصيل  "); ?></h4>
													
												</div>
												<div class="card-body">
													<div class="row">  
														<div class="col-6">
															<div class="form-group mb-3">
																<label for="validationCustom01"><?php mylan("Detail ","التفاصيل"); ?></label>
																<textarea class="form-control-file" id="summernote-basic" name="p_detail"><?=$rowp['p_detail'];?></textarea>
																
															</div>
														</div>
														<div class="col-6">
															<div class="form-group mb-3">
																<label for="validationCustom01"><?php mylan("Detail Arabic"," التفاصيل عربي"); ?></label>
																<textarea class="form-control-file" id="summernote-basictwo" name="p_detail_arab"><?=$rowp['p_detail_arab'];?></textarea>
																
															</div>
														</div>
														
														
														
														<!--<div class="col-6">
															<div class="form-group mb-3">
																<label for="validationCustom01"><?php mylan("Tags ","العلامات  "); ?></label>
																
																
																<select class="select2 form-control" multiple data-toggle="select2" name="p_tags[]" >
																	<?php foreach($taglist as $tag){?>
																		<option value="<?=$tag['id'];?>"   <?php if(strpos($rowp['p_tags'],$tag['id'])!==false)echo"selected";?>><?=$tag['lable'];?></option>
																	<?php } ?>
																</select>
															</div>
														</div>-->
														
														<div class="col-6">
															<div class="form-group mb-3">
																<label for="validationCustom01"><?php mylan("Product Label"," ملصق المنتج"); ?> </label>
																
																<select class="select2 form-control" data-toggle="select2" name="p_label" >
																	<option value=""  <?php if($rowp['l_id'] == 0)echo"selected";?>>No Label</option>
																	<?php
																		$ret=mysqli_query($con,"SELECT * FROM lable ORDER BY l_name ASC");
																		while($result=mysqli_fetch_array($ret))
																		{    ?>
																		<option value="<?=$result['l_id'];?>"  <?php if(strpos($rowp['l_id'],$result['l_id'])!==false)echo"selected";?>><?=$result['l_name'];?></option>
																	<?php } ?>
																</select>
															</div>
														</div>
														
														<div class="col-6">
															
															<label for="validationCustom01"><?php mylan("Color ","اللون  " ); ?></label>
															<div  class="colorPickSelector" id="colorPickSelector1" name="p_color"></div>
															<input type="hidden" name="p_color" id="p_color" >
														</div>
														<?php foreach($colorlist as $c){ if($c['id'] == $rowp['p_color']){ $oldcolor = $c['lable'];}} ?>
														<input type="hidden" id="oldcolor" value="<?=$oldcolor;?>">
													<div class="col-6">
															<div class="form-group mb-3">
																<label for="validationCustom03"><?php mylan("Image ","صورة"); ?></label>
																<input type="file" class="form-control-file" id="exampleInputFile" name="image"><br><br>
																<img src="<?php echo htmlentities($imgloc.$rowp['p_image']); ?>" alt="image" class="img-fluid avatar-md rounded" onerror="this.src='assets/images/default-product.png'">
																<input type="hidden" name="oldimage" value="<?php echo htmlentities($rowp['p_image']); ?>">
																
															</div>
														</div>
														
														
														
														
														
													</div>
												</div>
											</div>
											<div class="card">
												<div class="ml-2 float-left">
													<h4><?php mylan("Filters / Options ","مرشحات / خيارات  "); ?></h4>
													
												</div>
												<div class="card-body">
													<div class="row">
														
														
														<div class="col-6">
															<div class="form-group mb-3">
																<label for="validationCustom01"><?php 
																	
																	foreach($filterlist as $filt){
																		if($filt['id'] == 1){
																			echo $filt['lable']; 
																		}
																	}?> 
																</label>
																
																<select class="select2 form-control" data-toggle="select2" name="f1" >
																	<option value="" selected required>No Filter</option>
																	<?php
																		$ret=mysqli_query($con,"SELECT * FROM filter1 ORDER BY f1_name ASC");
																		while($result=mysqli_fetch_array($ret))
																		{    ?>
																		<option value="<?=$result['f1_id'];?>"  <?php if(strpos($rowp['f_1'],$result['f1_id'])!==false)echo"selected";?>><?=$result['f1_name'];?></option>
																	<?php } ?>
																</select>
															</div>
														</div>
														
														<div class="col-6">
															<div class="form-group mb-3">
																<label for="validationCustom01"><?php 
																	
																	foreach($filterlist as $filt){
																		if($filt['id'] == 2){
																			echo $filt['lable']; 
																		}
																	}?>  </label>
																	
																	<select class="select2 form-control" data-toggle="select2" name="f2" >
																		<option value="" selected required>No Filter</option>
																		<?php
																			$ret=mysqli_query($con,"SELECT * FROM filter2 ORDER BY f2_name ASC");
																			while($result=mysqli_fetch_array($ret))
																			{    ?>
																			<option value="<?=$result['f2_id'];?>"  <?php if(strpos($rowp['f_2'],$result['f2_id'])!==false)echo"selected";?>><?=$result['f2_name'];?></option>
																		<?php } ?>
																	</select>
															</div>
														</div>
														
														<div class="col-6">
															<div class="form-group mb-3">
																<label for="validationCustom01"><?php 
																	
																	foreach($filterlist as $filt){
																		if($filt['id'] == 3){
																			echo $filt['lable']; 
																		}
																	}?> </label>
																	
																	<select class="select2 form-control" data-toggle="select2" name="f3" >
																		<option value="" selected required>No Filter</option>
																		<?php
																			$ret=mysqli_query($con,"SELECT * FROM filter3 ORDER BY f3_name ASC");
																			while($result=mysqli_fetch_array($ret))
																			{    ?>
																			<option value="<?=$result['f3_id'];?>"  <?php if(strpos($rowp['f_3'],$result['f3_id'])!==false)echo"selected";?>><?=$result['f3_name'];?></option>
																		<?php } ?>
																	</select>
															</div>
														</div>
														<div class="col-6">
															<div class="form-group mb-3">
																<label for="validationCustom01"><?php 
																	
																	foreach($filterlist as $filt){
																		if($filt['id'] == 4){
																			echo $filt['lable']; 
																		}
																	}?> </label>
																	
																	<select class="select2 form-control" data-toggle="select2" name="f4" >
																		<option value="" selected required>No Filter</option>
																		<?php
																			$ret=mysqli_query($con,"SELECT * FROM filter4 ORDER BY f4_name ASC");
																			while($result=mysqli_fetch_array($ret))
																			{    ?>
																			<option value="<?=$result['f4_id'];?>"  <?php if(strpos($rowp['f_4'],$result['f4_id'])!==false)echo"selected";?>><?=$result['f4_name'];?></option>
																		<?php } ?>
																	</select>
															</div>
														</div>
														
														<div class="col-6">
															<div class="form-group mb-3">
																<label for="validationCustom01"><?php 
																	
																	foreach($filterlist as $filt){
																		if($filt['id'] == 5){
																			echo $filt['lable']; 
																		}
																	}?>  </label>
																	
																	<select class="select2 form-control" data-toggle="select2" name="f5" >
																		<option value="" selected required>No Filter</option>
																		<?php
																			$ret=mysqli_query($con,"SELECT * FROM filter5 ORDER BY f5_name ASC");
																			while($result=mysqli_fetch_array($ret))
																			{    ?>
																			<option value="<?=$result['f5_id'];?>"  <?php if(strpos($rowp['f_5'],$result['f5_id'])!==false)echo"selected";?>><?=$result['f5_name'];?></option>
																		<?php } ?>
																	</select>
															</div>
														</div>
														
														<div class="col-6">
															<div class="form-group mb-3">
																<label for="validationCustom01"><?php 
																	
																	foreach($filterlist as $filt){
																		if($filt['id'] == 6){
																			echo $filt['lable']; 
																		}
																	}?>  </label>
																	
																	<select class="select2 form-control" data-toggle="select2" name="f6" >
																		<option value="" selected required>No Filter</option>
																		<?php
																			$ret=mysqli_query($con,"SELECT * FROM filter6 ORDER BY f6_name ASC");
																			while($result=mysqli_fetch_array($ret))
																			{    ?>
																			<option value="<?=$result['f6_id'];?>"  <?php if(strpos($rowp['f_6'],$result['f6_id'])!==false)echo"selected";?>><?=$result['f6_name'];?></option>
																		<?php } ?>
																	</select>
															</div>
														</div>
														
														
													</div>
													
												</div> <!-- end card-body-->
											</div> <!-- end card-->
										<div class="card">
												<div class="ml-2 float-left">
													<h4><?php mylan("Bidding Date & Time ","تاريخ ووقت تقديم العطاءات  "); ?></h4>
													
												</div>	
										<div class="card-body">
													<div class="row">	
											   <!-- <div class="col-6">
															<div class="form-group mb-3">
																<label for="validationCustom01"><?php mylan("Start Date ","تاريخ البدء"); ?></label>
																<input type="date" class="form-control" name="sdate" id="sdate" value="<?=$sd;?>" required>
																
															</div>
														</div>
												 <div class="col-6">
															<div class="form-group mb-3">
																<label for="validationCustom01"><?php mylan("Start Time ","وقت البدء"); ?></label>
																<input type="time" class="form-control" name="stime" value="<?=$st;?>" required>
																
															</div>
														</div>	-->	
													<div class="col-6">
															<div class="form-group mb-3">
																<label for="validationCustom01"><?php mylan("End Date ","تاريخ الانتهاء"); ?></label>
																<input type="date" class="form-control" name="edate" id="edate" value="<?=$ed;?>" required>
																<span class="text-danger font-weight-bold" id="err"></span>
															</div>
														</div>
												 <div class="col-6">
															<div class="form-group mb-3">
																<label for="validationCustom01"><?php mylan("End Time ","وقت النهاية"); ?></label>
																<input type="time" class="form-control" name="etime" value="<?=$et;?>" required>
																
															</div>
														</div>		
											
										</div>
										</div>
                                        										
										</div>	
										<!--<div class="float-right">			
											<button name="updatee" class="btn btn-primary " type="submit"><?php mylan("Update Bid Product ","تحديث منتج العطاء  "); ?></button>
											</div>
                                        </div>
                                        										
										</div>	
										</form>  
										
									<?php// } ?>	-->  
									
									
								</div> <!-- end col-->		
								
								<div class="col-lg-12">
									<div class="card">
										<div class="ml-2 ml-2">
											<div class="float-left">
												<h4><?php mylan("Product Images ","صور المنتج  "); ?></h4>
												<p><?php mylan("Click image to delete ","اضغط على الصورة لحذفها  "); ?></p>
											</div>
											<div class="float-right">
												
												<button type="button" class="btn btn-sm btn-primary m-2" data-toggle="modal" data-target="#signup-modal3"><?php mylan("Add Images ","إضافة الصور"); ?></button>
											</div>
										</div>
										
										
										<div class="card-body">
											
											
											
											
											<?php
												$query = mysqli_query($con, "Select * from product_images WHERE p_id='$pid'");
												$cnt = 1;
												while ($row = mysqli_fetch_array($query)) {
												?>
												
												
												<a href="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>?scid=<?php echo htmlentities($pid); ?>&delid=<?php echo htmlentities($row['pi_id']); ?>&&action=delimg"
												onclick="return confirm('Are you sure you want to delete?');"><img src="<?=$imgloc.$row['pi_image']; ?>"height="80" style="border-radius: 10%;"> </a> 
												
												
												
												
												
											<?php }?>
											
											
										</div> <!-- end card-body-->
									</div> <!-- end card-->
								</div> <!-- end col-->					
								
								
								<div class="col-lg-12">
									<div class="card">
										<div class="card-body">
											
											<div class="float-left">
												<h4><?php mylan("Variants ","المتغيرات"); ?></h4>
											</div>
											
											<div class="float-right">
												
												<button type="button" class="btn btn-sm btn-primary m-2" data-toggle="modal" data-target="#signup-modal"><?php mylan("Add New ","اضف جديد "); ?></button>
											</div>
											
											<table id="basic-datatable" class="table dt-responsive nowrap w-100">
												<thead>
													<tr>
														<th>ID</th>
														<th><?php mylan("Title ","عنوان  "); ?></th>
														<th><?php mylan("Color"," اللون"); ?></th>
														<th><?php mylan("Price ","السعر  "); ?></th>
														
														<th><?php mylan("Active ","نشيط  "); ?></th>
														<th><?php mylan("Action ","عمل "); ?></th>
													</tr>
												</thead>
												
												
												<tbody>
													<?php
														
														$query = mysqli_query($con, "Select * FROM product_variant WHERE p_id=$pid");
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
																		$pvid = $row['pv_id'];
																	?>
																	<tr>
																		<td><?php echo htmlentities($row['pv_id']); ?></td>
																		
																		
																		<td><strong><?php echo htmlentities($row['pv_title']); ?></strong><br>
																			
																			<small><?php echo mysqli_num_rows(mysqli_query($con,"SELECT * FROM product_images WHERE pi_var='$pvid'"))?> Images</small>
																		</td>
																		<td><span  style="border-radius: 5px;  color: black; padding: 5px;text-align: center;text-decoration: none;display: inline-block;font-size: 12px;cursor: pointer;background-color: #<?php echo $row['pv_color']; ?>"><?=$row['pv_color']; ?></span></td>
																		<td><?=$row['pv_mrp'].$currency; ?><br><small><del><?=$row['pv_sell'].$currency; ?></del></small></td>
																		
																		<td>
																			<?php if($row['pv_active']){ ?>
																				<a href="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>?scid=<?php echo htmlentities($row['pv_id']); ?>&&action=dact" onclick="return confirm('Are you sure you want to deactivate?');"  ><span class="badge badge-outline-success"><?php mylan("Active "," متوفرة"); ?></span></a>
																				<?php }else{ ?>
																				
																				<a href="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>?scid=<?php echo htmlentities($row['pv_id']); ?>&&action=act" onclick="return confirm('Are you sure you want to activate?');"  ><span class="badge badge-outline-danger"><?php mylan("Deactivate ","غير متوفره "); ?></span></a>
																				
																			<?php } ?>
																		</td>
																		<td>
																			<a href="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>?scid=<?=$pid; ?>&varid=<?=$row['pv_id']; ?>&&action=del" onclick="return confirm('Are you sure you want to delete?');"  ><i class="dripicons-trash"></i></a> &nbsp;&nbsp;&nbsp;&nbsp;
																			
																			<a href="edit-variant.php?scid=<?=$pid; ?>&varid=<?=$row['pv_id']; ?>" ><i class="dripicons-document-edit"></i></a>
																			
																		</td>
																		
																	</tr>
																<?php } } ?>
														</tbody>
													</table> 
													
												</div> <!-- end card-body-->
											</div> <!-- end card-->
										</div> <!-- end col-->	
									<div class="col-md-12 pb-4">	
									<div class="float-right">			
											<button name="updatee" class="btn btn-primary " type="submit"><?php mylan("Update Bid Product ","تحديث منتج العطاء"); ?></button>
											</div>
                                       </div>
										</form>    	
										<?php } ?>
										
										<!-- Form Model-->		
										<div id="signup-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
											<div class="modal-dialog modal-dialog-centered">
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
																		<label for="validationCustom01"><?php mylan("Title ","عنوان"); ?> </label>
																		<input type="text" class="form-control" name="title" required>
																	</div>
																</div>
																<div class="col-12">
																	<div class="form-group mb-3">
																		<label for="validationCustom01"><?php mylan("Title Arab","العنوان العربي"); ?> </label>
																		<input type="text" class="form-control" name="titlearab" required>
																	</div>
																</div>
																
																<div class="col-12">
																	<div class="form-group mb-3">
																		<label for="validationCustom01"><?php mylan("MRP ","MRP "); ?> </label>
																		<input type="number" class="form-control" name="mrp"  >
																	</div>
																</div>
																
																
																
																<div class="col-12">
																	<div class="form-group mb-3">
																		<label for="validationCustom01"><?php mylan("Selling Price "," سعر البيع"); ?></label>
																		<input type="number" class="form-control" name="sell" >
																		
																	</div>
																</div>
																
																<div class="col-12">
																	<div class="form-group mb-3">
																		<label for="validationCustom01"><?php mylan("Color ","اللون"); ?></label>
																		<!--	<select class="select2 form-control" data-toggle="select2" name="pv_color" >
																			
																			<?php
																				for($x=0;$x<sizeof($colorlist);$x++)
																				{    ?>
																				<option value="<?=$colorlist[$x]['lable'];?>" ><?=$colorlist[$x]['lable']; ?></option>
																			<?php } ?>
																		</select>-->
																		
																		<div  class="colorPickSelector" id="colorPickSelector2" ></div>
																		<input type="hidden" name="pv_color" id="pv_color" >
																		
																		
																	</div>
																</div>
																
															</div>
															<div class="form-group text-center">
																<button name="addvariant" class="btn btn-primary" type="submit"><?php mylan("Add Variant ","أضف المتغير "); ?></button>				
															</div>	
														</form>
														
													</div>
												</div>
											</div>
										</div>
										
										
										
										<!-- Form Model-->		
										<div id="signup-modal3" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
											<div class="modal-dialog modal-dialog-centered">
												<div class="modal-content">
													
													<div class="modal-body">
														<div class="text-center mt-2 mb-4">
															<a href="index.html" class="text-success">
																<span><img src="assets/images/logo-dark.png" alt="" height="18"></span>
															</a>
														</div>
														
														<form class="pl-3 pr-3"  method="post" enctype="multipart/form-data">
															
															<div class="col-12">
																<div class="form-group mb-3">
																	<label for="validationCustom01"><?php mylan("Variant","متغير"); ?> </label>
																	
																	<select class="select2 form-control" data-toggle="select2" name="pi_variant" >
																		<option value="" selected required>Choose...</option>
																		<?php
																			$ret=mysqli_query($con,"SELECT * FROM product_variant WHERE p_id='$pid' ORDER BY pv_title ASC");
																			while($result=mysqli_fetch_array($ret))
																			{    ?>
																			<option value="<?=$result['pv_id'];?>" ><?=$result['pv_title'];?></option>
																		<?php } ?>
																	</select>
																</div>
															</div>
															
															<div class="col-12">
																<div class="form-group">
																	<label for="username"><?php mylan("Images   ","الصور "); ?></label>
																	<input type="file" class="form-control-file" id="exampleInputFile" name="files[]"  accept="image/png, image/jpeg" multiple>
																</div>
															</div>
															
															
															
															
															
															
															<div class="form-group text-center">
																<button class="btn btn-primary" type="submit" name="submitimages"><?php mylan("Add Images ","إضافة الصور"); ?></button>
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
					<script>
									document.addEventListener("DOMContentLoaded", function(event) { 
										var scrollpos = localStorage.getItem('scrollpos');
										if (scrollpos) window.scrollTo(0, scrollpos);
									});
									
									window.onbeforeunload = function(e) {
										localStorage.setItem('scrollpos', window.scrollY);
									};
								</script>									
								<script>
													
									
								/*	$("#edate").on("change",function(){ 
										var sdate = document.getElementById("sdate").value;
										var edate = document.getElementById("edate").value;
										
                                        sdate = new Date(sdate);
                                        edate = new Date(edate);
                                         
                                        
										if(edate < sdate){
										
											document.getElementById("err").innerHTML = "Check End Date" ;
										
											}else{
											document.getElementById("err").innerText = "" ;
											
										}
										
									});*/
									
						
									
								</script>
								<!-- Footer Start -->
								<?php include 'includes/footer.php';?>
							</div>
						</div>
						<!-- Right Sidebar -->
						<?php include 'includes/right-bar.php';?>
						
						<!-- bundle -->
						<script src="assets/js/vendor.min.js"></script>
						<script src="assets/js/app.min.js"></script>
						<script src="assets/js/colorPick.js"></script>
						<script>
							var arr = <?php echo json_encode($colorlist); ?>;
							var old = document.getElementById('oldcolor').value;
							
							var colo = [];
							
							arr.forEach(myFunction);
							$("#colorPickSelector1").colorPick({
							'initialColor' : old,
							'palette': colo,
							'onColorSelected': function() {
							this.element.css({'backgroundColor': this.color, 'color': this.color});
							document.getElementById('p_color').value=this.color;
							
							}
							
							});
							
							$("#colorPickSelector2").colorPick({
							'initialColor' : '',
							'palette': colo,
							'onColorSelected': function() {
							this.element.css({'backgroundColor': this.color, 'color': this.color});
							document.getElementById('pv_color').value=this.color;
							
							}
							
							});
							
							function myFunction(item, index) {
							colo.push(item['lable']);
							}       
						</script>							
						
						<!-- Apex js -->
						<script src="assets/js/vendor/apexcharts.min.js"></script>
						
						<!-- Todo js -->
						<script src="assets/js/ui/component.todo.js"></script>
						
						
						<!-- demo app -->
						<script src="assets/js/pages/demo.dashboard-crm.js"></script>
						<!-- end demo js-->
						<script src="assets/js/vendor/summernote-bs4.min.js"></script>
						<!-- Summernote demo -->
						<script src="assets/js/pages/demo.summernote.js"></script>
					</body>
				</html>
			<?php } ?>																																																																																								