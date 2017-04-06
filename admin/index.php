<?php 
	session_start();
	
	if(isset($_GET['page_content']))
		$page_content = $_GET['page_content'];
	else
		$page_content = "index";
	
	include 'access_admit.php'; // 접근불가 공통함수
	
	if($_SESSION['ma_index']==0) { // 일반회원 접근 불가
		echo '<script>
				alert("접근 권한이 없습니다.");
				location.href="/pumac2/";
			</script>'; 
	}
?>

<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>푸마시 관리자</title>

<!-- 제이쿼리 CDN -->
<script src="//code.jquery.com/jquery.min.js"></script> 

<!-- jQuery UI 라이브러리 js파일 -->
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>


<!-- 스마스 에디터 -->
<script type="text/javascript" src="/pumac2/smartEditor/js/HuskyEZCreator.js" charset="utf-8"></script> 

<script src="js/index.js"></script>

<link rel="stylesheet" type="text/css" href="css/main/header.css"> 
<link rel="stylesheet" type="text/css" href="css/main/footer.css"> 
<link rel="stylesheet" type="text/css" href="css/main/index.css"> 


<!-- //////// 게시판관리 ///////-->
	<?php 
		if($page_content=="board_list"){
	?> 
			<link rel="stylesheet" type="text/css" href="css/board/board_list.css"> 
			<script src="js/board/board_list.js"></script>
	<?php }?>
	

<!-- //////// 회원관리 ///////-->
<?php if($page_content=="member_list") { // 회원리스트?> 
	<link rel="stylesheet" type="text/css" href="css/member/member_list.css"> 
<?php }else if($page_content=="member_authority"){ // 회원권한관리>  ?> 
	<link rel="stylesheet" type="text/css" href="css/member/member_authority.css"> 
	<script src="js/member/member_authority.js"></script>
<?php }?>


<!-- ////////예약관리//////////-->

<?php if($page_content=="rev_doctor") { // 주치의예약?> 
	<link rel="stylesheet" type="text/css" href="css/member/member_list.css"> 
<?php }else if($page_content=="rev_guesthouse"){ // 게스트하우스>  ?> 
	<link rel="stylesheet" type="text/css" href="css/member/member_list.css"> 
<?php }else if($page_content=="rev_babycare"){ // 아기돌봄예약>  ?> 
	<link rel="stylesheet" type="text/css" href="css/member/member_list.css"> 
<?php }?>



<!-- ////////관리비관리//////////-->
<?php  if($page_content=="expense_write"){ // 관리비등록>  ?> 
	<link rel="stylesheet" type="text/css" href="css/expense/expense_writeForm.css"> 
<?php }else if($page_content=="expense_view"){ // 관리비조회>  ?> 
	<link rel="stylesheet" type="text/css" href="css/expense/expense_view.css"> 
<?php }?>


<!-- //////// 전자투표 관리 ///////-->
<?php if($page_content=="vote_writeForm") { // 투표 생성?> 
	<script src="js/vote/vote_writeForm.js"></script>
	<link rel="stylesheet" type="text/css" href="css/vote/vote_writeForm.css"> 
<?php }?>

<?php if($page_content=="vote_list") { // 투표 관리?> 
	<link rel="stylesheet" type="text/css" href="css/vote/vote_list.css"> 
	<script src="js/vote/vote_list.js"></script>
<?php }?>

<?php if($page_content=="vote_view") { // 투표 상세보기?> 
	<link rel="stylesheet" type="text/css" href="css/vote/vote_view.css"> 
	<script src="js/vote/vote_view.js"></script>
<?php }?>

<?php if($page_content=="vote_modifyForm") { // 투표 수정하기?> 
	<script src="js/vote/vote_modifyForm.js"></script>
	<link rel="stylesheet" type="text/css" href="css/vote/vote_writeForm.css"> 
<?php }?>
<!-- ///////////////////////-->



</head>
<body style="margin:0;height:100%;">
	<!-- Header  -->
	<?php include 'header.php';?>
	
	<div style="width:1100px;margin-left:auto;margin-right:auto;margin-bottom:30px;overflow: hidden;">
	<!-- Content-left  -->
	<?php include 'content_left.php' ?>
	
	<!-- Content-Right  -->
	
	<!-- 메인화면  -->
	
	<?php 
		if($page_content=="index") // 회원리스트
			include 'page/index.php';
	?>
	
	<!-- 회원 관리 -->
	<?php 
		if($page_content=="member_list") // 회원리스트
			include 'page/member/page_member.php';
			
		else if($page_content=="member_authority") // 회원권한관리
			include 'page/member/member_authority.php';
		
		else if($page_content=="authority_managemenet") // 권한관리
			include 'page/member/authority_management.php';
	?> 
	
	<!-- 게시판 관리 -->
	<?php 
		if($page_content=="board_list")
		include 'page/board/board_list.php' 
	?> 
	
	<!--전자투표 관리 -->
	<?php 
		if($page_content=="vote_writeForm") // 투표 생성
		include 'page/vote/vote_writeForm.php';
		
		else if($page_content=="vote_list") // 투표리스트
			include 'page/vote/vote_list.php';
			
		else if($page_content=="vote_view") // 상세페이지
			include 'page/vote/vote_view.php';
		
		else if($page_content=="vote_modifyForm") // 수정페이지
			include 'page/vote/vote_modifyForm.php';
	?> 
	
	<!-- 예약 관리 -->
	<?php 
		if($page_content=="rev_doctor") // 주치의예약
			include 'page/reserve/doctor.php';

		else if($page_content=="rev_guesthouse") // 게스트하우스
			include 'page/reserve/guesthouse.php';
		
		else if($page_content=="rev_babycare") // 아기돌봄예약
			include 'page/reserve/babycare.php';
	?> 
	
	
	
	
	<!-- 부동산 관리 -->
	<?php 
		//if($page_content=="member_list")
		//include 'page_member.php' 
	?> 
	
	<!-- 관리비 관리 -->
	<?php 
		if($page_content=="expense_write")//관리비등록
			include 'page/expense/expense_writeForm.php' ;
		else if($page_content=="expense_view") // 관리비조회
			include 'page/expense/expense_view.php';
	?> 
	</div>
	
	<!-- Footer  -->
	<?php include 'footer.php';?>
</body>
</html>