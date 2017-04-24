<?php 
	session_start();
?>

<html>

<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8"></head>

<script src="//code.jquery.com/jquery.min.js"></script>
<body>

<?php
	/*
	 ** 글쓰기
	 **
	 */

	include '../../dbconfig.php';
	
	$v_subject = $_POST['v_subject'];
	$v_content = $_POST['v_content'];
	$b_type = $_POST['b_type'];
	$v_dateS = $_POST['v_dateS'];
	$v_dateE = $_POST['v_dateE'];
	$v_writer = $_SESSION['m_id']; // 회원 구현시 세션값으로 수정하기
	$v_idx = $_POST['v_idx'];
		
	
	
	 // 1. 기본내용 수정 (vote_big update)
	$query = "update vote_big 
	set v_subject = '$v_subject'
	, v_content = '$v_content' 
	,v_dateE =  str_to_date('$v_dateE', '%Y-%m-%d') 
	, v_writer =  '$v_writer' 
	where  v_idx=$v_idx";
		
	 mysqli_query($conn,$query);
	
	mysqli_close($conn);
	
	  echo '<script>
				alert("수정 완료");
				location.href="/admin/?page_content=vote_modifyForm&v_idx='.$v_idx.'"</script>'; 
?>


</body>

</html>

