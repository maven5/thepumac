<html>

<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8"></head>

<script src="//code.jquery.com/jquery.min.js"></script>
<body>

<?php
	/*
	 ** 투표 삭제
	 **
	 */

	include '../../dbconfig.php';
	
	$v_idx = $_GET['v_idx'];
		
	
	 // 1. vote_big 삭제
	$query = "delete from vote_big where v_idx=$v_idx";
	mysqli_query($conn,$query);
	
	// 2. vote_small 삭제
	$query = "delete from vote_small where v_idx=$v_idx";
	mysqli_query($conn,$query);
	
	// 3. vote_big 삭제
	$query = "delete from vote_list where v_idx=$v_idx";
	mysqli_query($conn,$query);
	
	mysqli_close($conn);
	
	  echo '<script>
				alert("투표삭제  완료");
				location.href="/thepumac/admin/?page_content=vote_list";
			</script>';    
?>


</body>

</html>

