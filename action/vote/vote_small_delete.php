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
	
	$v_idx = $_GET['v_idx'];
	$v2_idx = $_GET['v2_idx'];
	
	 // 1. 항목 투표수 구하기 //
	 
	$query = "select * from vote_small where v2_idx=".$v2_idx;
	
	$result = mysqli_query($conn,$query);
	
	while($row=mysqli_fetch_array($result)){
		$v2_number = $row['v2_number'];
	}
	
	//////////////////////////////////
	
	
	
	// 2. 전체 투표수 빼기 //
	
	$query = "update vote_big set v_numberT=v_numberT-".$v2_number." where v_idx=".$v_idx;
	mysqli_query($conn,$query);
	
	//////////////////////////////////
	
	
	
	// 3. 항목 삭제하기 //
	
	$query = "delete from vote_small where v_idx=".$v_idx.' and v2_idx='.$v2_idx;
	mysqli_query($conn,$query);
	
	//////////////////////////////////	
	
	
	mysqli_close($conn);
	
	  echo '<script>
				alert("삭제 완료");
				location.href="/pumac2/admin/?page_content=vote_modifyForm&v_idx='.$v_idx.'"</script>';    
?>


</body>

</html>

