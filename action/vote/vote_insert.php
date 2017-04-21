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
	$v2_subject = $_POST['v2_subject'];
	$b_type = $_POST['b_type'];
	$v_dateS = $_POST['v_dateS'];
	$v_dateE = $_POST['v_dateE'];
	$v_writer = $_SESSION['m_id']; // 회원 구현시 세션값으로 수정하기
		
	
	
	 // 1. 기본내용 (vote_big insert)
	$query = "insert into vote_big(
			v_subject,
			v_dateS,
			v_dateE,
			v_writer,
			v_numberT,
			v_content,
			v_date
		)
		 values(
			 '$v_subject',
			str_to_date('$v_dateS', '%Y-%m-%d'),
			str_to_date('$v_dateE', '%Y-%m-%d'),
			'$v_writer',
			0,
			'$v_content',
			NOW()
		)";
	
	mysqli_query($conn,$query);
	
	$v_index = mysqli_insert_id($conn); // 방금 Insert한 테이블의 Index
		
	
	// 2. 세부내용 (vote_small Insert)
	foreach ($v2_subject as $value)	{ // 투표항목 배열로 받기
		$query = "insert into vote_small(
		v_idx,
		v2_subject,
		v2_number
		)
		values(
		$v_index,
		'$value',
		0
		)";
		
		mysqli_query($conn,$query);
	}
	
	mysqli_close($conn);
	
	  echo '<script>
				alert("투표작성 완료");
				location.href="/thepumac/?page_content=board_voteList&board_category=시민공간&board_page=설문조사&board_cateNo=01";
			</script>';    
?>


</body>

</html>

