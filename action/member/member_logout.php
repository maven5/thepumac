<?php 
	session_start();
?>

<html>

<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8"></head>

<script src="//code.jquery.com/jquery.min.js"></script>
<body>

<?php
	session_destroy();
	
		echo '<script>
				alert("로그아웃 성공");
				location.href="/thepumac/";
			</script>';


?>
</body>

</html>

