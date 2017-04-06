<html>

<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8"></head>

<script src="//code.jquery.com/jquery.min.js"></script>
<body>

<?php
	/*
	 ** 글수정
	 **
	 */

	include '../../dbconfig.php';
	

	$board_page = $_POST['board_page'];
	$board_category = $_POST['board_category'];
	$board_cateNo= $_POST['board_cateNo'];
		
	$b_type = $_POST['b_type'];
	$b_subject = $_POST['b_subject'];
	$b_content = $_POST['b_content'];
	$b_writer = $_POST['b_writer'];
	$board_cateNo = $_POST['board_cateNo'];
	$b_index = $_POST['b_index'];
	
	$query = "update board
		set b_type='$b_type', b_subject ='$b_subject' , b_content='$b_content'
		where b_index = $b_index";
		
	mysqli_query($conn,$query);
	
	mysqli_close($conn);
	
	 echo '<script>
				alert("글수정 완료");
				location.href="/pumac2/?page_content=board_view&board_page='.$board_page.'&board_category='.$board_category.'&board_cateNo='.$board_cateNo.'&b_index='.$b_index.'";
			</script>';  
?>


</body>

</html>

