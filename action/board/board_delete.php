<html>

<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8"></head>

<script src="//code.jquery.com/jquery.min.js"></script>
<body>

<?php
	/*
	 ** 글삭제
	 **
	 */

	include '../../dbconfig.php';
	

	$board_page = $_GET['board_page'];
	$board_category = $_GET['board_category'];
	$board_cateNo= $_GET['board_cateNo'];
	$b_index = $_GET['b_index'];
	
	$query = "delete from board	where b_index = $b_index";
		
	mysqli_query($conn,$query);
	
	mysqli_close($conn);
	
	 echo '<script>
				alert("글삭제 완료");
				location.href="/?page_content=board_normal&board_page='.$board_page.'&board_category='.$board_category.'&board_cateNo='.$board_cateNo.'";
			</script>';  
?>


</body>

</html>

