<html>

<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8"></head>

<script src="//code.jquery.com/jquery.min.js"></script>
<body>

<?php
	/*
	 ** 항목 수정
	 **
	 */

	include '../../dbconfig.php';
	
	$v_idx = $_GET['v_idx'];
	$v2_idx = $_GET['v2_idx'];
	$v2_subject = $_GET['v2_subject'];
		
	
	// 1. 항목 수정하기 //
	
	$query = "update vote_small set v2_subject='$v2_subject' where v_idx=$v_idx and v2_idx=$v2_idx";
	mysqli_query($conn,$query);
	
	//////////////////////////////////
	
	
	
	mysqli_close($conn);
	
	  echo '<script>
				alert("수정 완료");
				location.href="/admin/?page_content=vote_modifyForm&v_idx='.$v_idx.'"</script>';    
?>


</body>

</html>

