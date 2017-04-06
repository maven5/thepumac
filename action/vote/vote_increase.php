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
	
	$v1_idx =$_GET['v1_idx'];
	$v2_idx =$_GET['v2_idx'];
	$voter = $_SESSION['m_id'] ; // 아이디 세션값
		
	if(!$_SESSION['m_id'] ){
		echo '<script>
				alert("로그인을 먼저 해주세요!");
				location.href="/pumac2/?page_content=board_voteView&board_category=시민공간&board_page=설문조사&board_cateNo=01&v_idx='.$v1_idx.'";
			</script>';
		exit;
	}
	
	
	///////// 1. 투표를 했었는지 검사 /////////
	$query = "select * from vote_list 
	where v_idx=$v1_idx and vl_voter='$voter'";
	
	$result = mysqli_query($conn,$query);
	$rowCount =  mysqli_num_rows($result); // 투표를 했으면 $rowCount>0
	
	if($rowCount!=0){
		echo '<script>
				alert("이미 투표를 하셨습니다.");
				location.href="/pumac2/?page_content=board_voteView&board_category=시민공간&board_page=설문조사&board_cateNo=01&v_idx='.$v1_idx.'";
			</script>';
		exit;
	}
	///////////////////////////////////////////
	
	
	
	
	
	//////////// 2. 투표유무를 검사하는 테이블에 insert ////////////
	$query = "insert into vote_list(
	v_idx,
	v2_idx,
	vl_voter,
	date
	) values(
	$v1_idx,
	$v2_idx,
	'$voter',
	NOW())";
	
	mysqli_query($conn,$query);
	///////////////////////////////////////////
	
	
	
	
	
	 //////////// 3. 총 투표수 증가 //////////// 
	$query = "update vote_big
		set v_numberT=v_numberT+1 where v_idx=$v1_idx";
	
	mysqli_query($conn,$query);
	///////////////////////////////////////////
	
	
	
	
	
	////////  4. 항목에 대한 투표수 증가 ///////  
	$query = "update vote_small
	set v2_number=v2_number+1 where v2_idx=$v2_idx";
	
	mysqli_query($conn,$query);
	
	mysqli_close($conn);
	///////////////////////////////////////////
	
	  echo '<script>
				alert("투표 완료");
				location.href="/pumac2/?page_content=board_voteView&board_category=시민공간&board_page=설문조사&board_cateNo=01&v_idx='.$v1_idx.'";
			</script>';    
?>


</body>

</html>

