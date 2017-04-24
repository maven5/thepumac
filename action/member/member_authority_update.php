<?php 
	session_start();
?>

<html>

<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8"></head>

<script src="//code.jquery.com/jquery.min.js"></script>
<body>

<?php
	include '../../dbconfig.php';
	
	$m_idx= $_GET['m_idx'];
	$ma_index= $_GET['ma_index'];
	
	$query = "update member
	set ma_index=$ma_index where m_idx = $m_idx";
	
	mysqli_query($conn,$query);
	
	mysqli_close($conn);
	
	
 	echo '<script>
				alert("정상적으로 적용되었습니다.");
				location.href="/admin/?page_content=member_authority";
			</script>'; 
?>
</body>

</html>

