<html>

<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8"></head>

<script src="//code.jquery.com/jquery.min.js"></script>
<body>

<?php
	/*
	 ** 항목 추가
	 **
	 */

	include '../../dbconfig.php';
	
	$v_idx = $_GET['v_idx'];
	$v2_idx = $_GET['v2_idx'];
	$v2_subject = $_GET['v2_subject'];
	
	
	
	
	// 2. 전체 투표수 빼기 //
	
	$query = "insert into vote_small(
	v_idx,
	v2_subject,
	v2_number
	)
	values(
	$v_idx,
	'$v2_subject',
	0
	)";
	
	mysqli_query($conn,$query);
	
	//////////////////////////////////
	
	mysqli_close($conn);
	
	  echo '<script>
				alert("항목 추가 완료");
				location.href="/thepumac/admin/?page_content=vote_modifyForm&v_idx='.$v_idx.'"</script>';    
?>


</body>

</html>

