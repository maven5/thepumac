<?php 
	session_start();
?>

<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
<title>푸마시</title>

<!-- 제이쿼리 CDN -->
<script src="//code.jquery.com/jquery.min.js"></script> 

<!-- 애드센스 연결 -->
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<script>
  (adsbygoogle = window.adsbygoogle || []).push({
    google_ad_client: "ca-pub-8929661103346881",
    enable_page_level_ads: true
  });
</script>

<!-- jQuery UI 라이브러리 js파일 -->
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>

<!-- 공통 스크립트 -->
<script src="js/commons.js"></script> 

<!-- 모바일(사이드메뉴) -->
<script src="js/main/asidebar.jquery.js"></script>
<link rel="stylesheet" type="text/css" href="css/main/aside.css"> 

<!-- 스마스 에디터 -->
<script type="text/javascript" src="smartEditor/js/HuskyEZCreator.js" charset="utf-8"></script>

<!-- 아이콘  -->
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.6.0/css/font-awesome.min.css" rel="stylesheet" />

<!-- 공통 CSS -->
<link rel="stylesheet" type="text/css" href="css/commons.css"> 

<!-- 메인 CSS -->
<link rel="stylesheet" type="text/css" href="css/main/main_contents.css?vision=170412"> 
<link rel="stylesheet" type="text/css" href="css/main/header.css">
<link rel="stylesheet" type="text/css" href="css/main/footer.css">
<link rel="stylesheet" type="text/css" href="css/main/board.css">

<!-- Main Slider  -->
<script src="js/main/jquery.bxslider.js"></script>
<link href="css/main/jquery.bxslider.css" rel="stylesheet" />
    
<!-- 일반 게시판 CSS -->
<?php $pc = $_GET['page_content'];
if($pc=="board_normal") { ?><!-- 일반 게시판 CSS -->
<link rel="stylesheet" type="text/css" href="css/board/board_normal.css"> 
<script src="js/board_list.js"></script>  

<?php } else if($pc=="board_reserve"){?><!-- 예약 게시판 CSS -->
<link rel="stylesheet" type="text/css" href="css/board/board_reserve.css"> 
<link rel="stylesheet" href="/pumac2/css/jquery-ui.css">
<script src="http://multidatespickr.sourceforge.net/jquery-ui.multidatespicker.js"></script>
<!-- <script src="js/board/board_reserve.js"></script>  -->
 
<?php } else if($pc=="board_manageE"){ ?> <!-- 기타 게시판 CSS-->
<link rel="stylesheet" type="text/css" href="css/board/board_normal2.css"> 
<link rel="stylesheet" type="text/css" href="css/board/board_normal.css"> 

<?php } else if($pc=="board_manageE_view"){ ?> <!-- 기타 게시판 CSS-->
<link rel="stylesheet" type="text/css" href="css/board/board_normal2.css"> 
<link rel="stylesheet" type="text/css" href="css/board/board_normal.css"> 
<link rel="stylesheet" type="text/css" href="css/board/board_manageE_view.css"> 

<?php } else if($pc=="board_writeForm" || $pc =="board_modifyForm"){ ?> <!-- 글쓰기폼 CSS -->
<link rel="stylesheet" type="text/css" href="css/board/board_normal.css"> 
<link rel="stylesheet" type="text/css" href="css/board/board_writeForm.css"> 
<script src="js/smartEditor.js"></script> 

<?php } else if($pc=="board_view"){ ?> <!-- 글상세페이지 CSS -->
<link rel="stylesheet" type="text/css" href="css/board/board_normal.css"> 
<link rel="stylesheet" type="text/css" href="css/board/board_view.css"> 
<script src="js/board_view.js"></script>  

<?php } else if($pc=="board_voteList"){ ?> <!-- 투표리스트 CSS -->
<link rel="stylesheet" type="text/css" href="css/board/board_normal.css"> 
<link rel="stylesheet" type="text/css" href="css/board/board_voteList.css"> 

<?php } else if($pc=="board_voteView"){ ?> <!-- 투표상세 CSS -->
<link rel="stylesheet" type="text/css" href="css/board/board_normal.css"> 
<link rel="stylesheet" type="text/css" href="css/board/board_voteView.css"> 
<script src="js/vote/vote_view.js"></script> 

<?php } else if($pc=="board_voteWriteForm"){ ?> <!-- 투표만들기 CSS -->
<link rel="stylesheet" type="text/css" href="css/board/board_normal.css"> 
<link rel="stylesheet" type="text/css" href="css/board/board_voteWriteForm.css"> 
<script src="js/vote/vote_writeForm.js"></script> 

<?php } else if($pc=="scheduler"){ ?> <!-- 일정안내 CSS -->
<link rel="stylesheet" type="text/css" href="css/schedule/scheduler.css"> 
<link rel="stylesheet" type="text/css" href="css/schedule/fullcalendar.css"> 
<link rel="stylesheet" type="text/css" href="css/schedule/fullcalendar.print.css"> 
<script src="js/schedule/fullcalendar.min.js"></script> 
<script src="js/vote/vote_view.js"></script> 

<?php } else if($pc=="realty_list"){ ?> <!-- 매물리스트 -->
<link rel="stylesheet" type="text/css" href="css/board/board_normal.css"> 
<link rel="stylesheet" type="text/css" href="css/realty/realty_list.css"> 
<script src="js/realty/realty_list.js"></script> 

<?php } else if($pc=="realty_view"){ ?> <!-- 매물상세 -->
<link rel="stylesheet" type="text/css" href="css/board/board_normal.css"> 
<link rel="stylesheet" type="text/css" href="css/realty/realty_view.css"> 
<link rel="stylesheet" type="text/css" href="owl-carousel/owl.carousel.css"> 
<link rel="stylesheet" type="text/css" href="owl-carousel/owl.theme.css"> 
<link rel="stylesheet" type="text/css" href="owl-carousel/owl.transitions.css"> 
<script src="owl-carousel/owl.carousel.min.js"></script> 

<?php } else if($pc=="realty_writeForm"){ ?> <!-- 매물만들기 -->
<link rel="stylesheet" type="text/css" href="css/board/board_normal.css"> 
<link rel="stylesheet" type="text/css" href="css/realty/realty_writeForm.css"> 

<?php } else if($pc=="member_clause") {  ?> <!-- 약관폼 -->
<script src="js/member/member_joinForm.js"></script>
<link rel="stylesheet" type="text/css" href="css/member/member_clause.css"> 
<?php } else if($pc=="member_joinForm"){ ?> <!-- 회원가입 -->
<script src="js/member/member_joinForm.js"></script>
<link rel="stylesheet" type="text/css" href="css/member/join_form_CSS.css"> 
<?php } ?>


<link rel="stylesheet" type="text/css" href="css/member/member_findForm.css"> <!-- 회원(아이디/비밀번호찾기) CSS -->

</head>
<body style="margin:0;height:100%;">


<!--
	page_content : index에서 inlcude 해줄 페이지 이름
	board_category : 큰 메뉴
	board_cateNo : 큰 메뉴에 대한 IDX	
	board_page : 작은(세부) 메뉴
 -->




<div class="main_wrap"> <!-- 가로폭 1100px 고정 -->

	<!-- HEADER  -->
	<?php include 'header.php';?>
	
	<?php 
			// 컨텐츠 선택
			
			/* $bn = array("board_voteList", "board_voteWriteForm", "board_reserve", "board_view", "board_voteView",
                             "board_manageE","board_manageE_view", "board_writeForm" );  */
			
			if(empty($pc)) // 메인
			 	include 'page/main/main_contents.php';
			
			else if($pc=="board_normal") // 일반 게시판
				include 'page/board/board_normal.php';
			else if($pc=="board_voteList") // 투표시스템
				include 'page/board/board_normal.php';
			else if($pc=="board_voteWriteForm") // 투표 생성폼
				include 'page/board/board_normal.php';
			else if($pc=="board_reserve") // 예약 게시판
				include 'page/board/board_normal.php';
			else if($pc=="board_view") // 글 세부페이지
				include 'page/board/board_normal.php';
			else if($pc=="board_voteView") // 예약 세부페이지
				include 'page/board/board_normal.php';
			else if($pc=="board_manageE") // 푸마시가맹점, 관리비조회
				include 'page/board/board_normal.php';
			else if($pc=="board_manageE_view") // 관리비조회상세
				include 'page/board/board_normal.php';
			else if($pc=="board_writeForm") // 글쓰기폼
				include 'page/board/board_normal.php';
			
			
			else if($pc=="member_clause") // 약관폼
				include 'page/member/member_clause.php';
			else if($pc=="member_joinForm") // 회원가입폼
				include 'page/member/member_joinForm.php';
			else if($pc=="member_findForm") // 아이디 / 비밀번호찾기
				include 'page/member/member_findForm.php';
			else if($pc=="member_loginForm") // 로그인폼
				include 'page/member/member_loginForm.php';
			else if($pc=="board_modifyForm") // 글 수정폼
				include 'page/board/board_modifyForm.php';
			
			
			else if($pc=="scheduler") // 일정 안내
				include 'page/schedule/scheduler.php';
			
			
			else if($pc=="realty_list") // 매물리스트
				include 'page/board/board_normal.php';
			else if($pc=="realty_view") // 매물상세
				include 'page/board/board_normal.php';
			else if($pc=="realty_writeForm") // 매물 만들기
				include 'page/board/board_normal.php';
	?>
	
	<!-- FOOTER  -->
	<?php include 'footer.php';?>
</div>
</body>
</html>