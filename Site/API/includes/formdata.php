<?php
	
	function forminput($lable='',$key='',$val='',$required='',$size='6',$type='text'){
		
		echo '<div class="col-'.$size.'">
		<div class="form-group mb-3">
		<label for="validationCustom01">'.$lable.'</label>
		<input type="'.$type.'" class="form-control" name="'.$key.'" value="'.$val.'" '.$required.'>
		</div>
		</div>';
		
	}
	
	
	function formtextarea($lable='',$key='',$val='',$required='',$size='6',$type='text'){
		
		echo '<div class="col-'.$size.'">
		<div class="form-group mb-3">
		<label for="validationCustom01">'.$lable.'</label>
		<textarea class="form-control" name="'.$key.'" '.$required.'>'.$val.'</textarea>
		</div>
		</div>';
		
	}
	function formhtml($lable='',$key='',$val='',$required='',$size='6',$type='text'){
		
		echo '<div class="col-'.$size.'">
		<div class="form-group mb-3">
		<label for="validationCustom01">'.$lable.'</label>
		<textarea class="form-control-file" id="summernote-'.$type.'" name="'.$key.'">'.$val.'</textarea>
		</div>
		</div>';
		
	}
	
	
	
	
	
	function formimage($lable='',$key='',$val='',$required='',$size='6',$oldkey='',$width='40',$height='50',$fit='cover',$multi=false){
		
		$errimg="'assets/images/bg-auth.jpg'";
		
		$multiclass='';
		if($multi==true){
			$multiclass='multiple';
			$key=$key.'[]';
		}
		
		echo '<div class="col-'.$size.'">
		<div class="form-group mb-3">
		<label for="validationCustom03">'.$lable.'</label>
		<input type="file" class="form-control-file" id="exampleInputFile" name="'.$key.'" '.$multiclass.'>';
		
		if($oldkey!=''){
			
			echo '<br><br><img src="../mec/'.$val.'"  class="img-fluid avatar-md rounded" onerror="this.src='.$errimg.'" style="width:'.$width.'px;height:'.$height.'px;object-fit:'.$fit.'">
			<input type="hidden" name="'.$oldkey.'" value="'.$val.'" >';
		}
		
		echo '</div>
		</div>';
		
	}
	
	
	
	function formselect($lable='',$key='',$arraylist=array(),$required='',$size='6',$selected='',$value='',$option=''){
		
		echo '<div class="col-6">
		<div class="form-group mb-3">
		<label for="validationCustom01">'.$lable.'</label>
		
		<select class="cate form-control select2" data-toggle="select2" name="'.$key.'" '.$required.' >
		<option value="" selected disabled>Choose...</option>';
		
		
		foreach ($arraylist as $menu) {
			$isselected='';
			if($menu[$value]==$selected){
				$isselected='selected';
				}else{
				$isselected='';
			}
			
			echo '<option value="'.$menu[$value].'" '.$isselected.' >'.$menu[$option].'</option>';
			
		}
		
		echo '
		</select>
		</div>
		</div>';
		
	}
	
	
 	function formmulti($lable='',$key='',$arraylist=array(),$required='',$size='6',$selected='',$value='',$option=''){
		
		echo '<div class="col-6">
		<div class="form-group mb-3">
		<label for="validationCustom01">'.$lable.'</label>
		
		<select class="cate form-control select2" data-toggle="select2" multiple name="'.$key.'[]" '.$required.' >';
		
		$oldValueList = explode(",",$selected);
		foreach ($arraylist as $menu) {
			$isselected='';
			if(in_array($menu[$value],$oldValueList)){
				$isselected='selected';
				}else{
				$isselected='';
			}
			
			echo '<option value="'.$menu[$value].'" '.$isselected.' >'.$menu[$option].'</option>';
			
		}
		
		echo '
		</select>
		</div>
		</div>';
		
		
	}
	
	
	function text( $lable='',$strong=false,$small=false,$badge=false,$lighten=false,$outline=false,$color='muted',$icon='' ){
		
		$sstrong='';
		$estrong='';
		if($strong==true){
			$sstrong='<strong>';
			$estrong='</strong>';
		}
		
		$ssmall='';
		$esmall='';
		if($small==true){
			$ssmall='<small>';
			$esmall='</small>';
		}
		
		$colorclass='';
		if($color!=''){
			$colorclass='text-'.$color; 
		}
		
		
		$badgeclass='';
		if($badge==true){
			
			$outlineclass='';
			$lightclass='';
			if($lighten==true){
				$lightclass='-lighten';
			}
			
			if($outline==true){
				$outlineclass='-outline';
				$lightclass='';
			}
			
			$badgeclass='badge badge'.$outlineclass.'-'.$color.$lightclass; 
			$colorclass='';
		}
		$iconclass='';
		if($icon!=''){
			$iconclass='<i class="'.$icon.'"></i>&nbsp;&nbsp;';
			
		}
		
		echo '<span class="'.$badgeclass.$colorclass.'">'
		
		.$ssmall
		.$sstrong
		.$iconclass
		.$lable
		.$estrong
		.$esmall
		
		.'</span>';
		
	}
	
	function image( $lable='',$width='40',$height='50',$fit='cover'  ){
		
		$errimg="'assets/images/bg-auth.jpg'";
		
		echo '<img src="../mec/'.$lable.'"  style="width:'.$width.'px;height:'.$height.'px;object-fit:'.$fit.'" class="img-thumbnail rounded" onerror="this.src='.$errimg.'">';
		
		
	}
	
	function active( $lable='' ,$id='' ){
		$url=$_SERVER['PHP_SELF'].'?scid='.$id.'&&action=status&val=';
		if($lable){	
			echo '<a href="'.$url.'0"><span class="badge badge-outline-success">Active</span></a>';
			
			}else{
			
			echo '<a href="'.$url.'1"><span class="badge badge-outline-danger">Deactive</span></a>';
		}
		
	}
	
	
	function action( $id='' ){
		$edit=$_SERVER['PHP_SELF'].'?eid='.$id.'&&edit=1';
		$delete=$_SERVER['PHP_SELF'].'?scid='.$id.'&&action=del';
		$errormsg= 'Are you sure you want to delete?';
		
		
		echo '<div class="btn-group">
		<button type="button" class="btn btn-light dropdown-toggle btn-sm" data-toggle="dropdown" aria-expanded="false">More <span class="caret"></span> </button>
		<div class="dropdown-menu">
		
		
		
		
		<a class="dropdown-item" href="'.$edit.'"  >View / Edit</a>
		
		
		<a class="dropdown-item" href="'.$delete.'" onclick="return confirm('.$errormsg.');"  >Delete</a>
		
		</div>
		</div>';
		
	}
	
	
	function cardMenu($lable='' ,$number='', $url='',$icon='' ,$size='6' ,$iconcolor ){
		
		
		echo '<div class="col-xl-'.$size.' col-lg-'.$size.'">
		<div class="card widget-flat h-75">
		<div class="card-body ">
		
		<div class="float-right">
		<i class="'.$icon.' widget-icon bg-'.$iconcolor.' rounded-circle text-white"></i>
		</div>
		<h5 class="text-dark font-weight-normal mt-0" title="Number of Feeds">'.$lable.'</h5>
		
		<h3 class="text-dark mt-3 mb-2">'.$number.'</h3>
		<p class=" text-muted mb-0">
		
		<form id="subcat"  method="post" enctype="multipart/form-data" action="'.$url.'">
		
		<button style="border:none;background-color:white" type="submit" name="post"><span class="text-success mr-2"><i class="mdi mdi-dresser-outline"></i>&nbsp;&nbsp; Add / Manage</span>
		</button>
		</form>
		</p>
		</div> 
		</div> 	
		</div> ';
		
	}
	
	
	
	
	
	
	//'.$val.'
?>
