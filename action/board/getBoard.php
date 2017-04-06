<?php
	/*
	 ** b_category 값 가져오기
	 **
	 */

	include '../../dbconfig.php';
		
	$chk = $_GET['chk'];
	$category = $_GET['category'];
	
	if($chk==0){ // category 가져오기
		$query = "select * from b_category order by category_key asc";
		
		$result = mysqli_query($conn, $query);
		
		$ArrayData = array();		
		
		while($row=mysqli_fetch_array($result)){
			 $ArrayData[] = $row; 
		}
	}else if($chk==1){ // page 가져오기
		$query = "select * from b_page where category_key='$category' order by page_key asc";
		
		$result = mysqli_query($conn, $query);
		
		$ArrayData = array();
		
		while($row=mysqli_fetch_array($result)){
			$ArrayData[] = $row;
		}
	}
	mysqli_close($conn);
	
	$ArrayData =   json_encode($ArrayData);
	
	echo	$ArrayData;
	exit; 
?>
