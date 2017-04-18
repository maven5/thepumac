<!-- 임시로그인 -->
<script>
 $(document).ready(function(){
	$('.logout').click(function(){
		if(confirm("로그아웃 하시겠습니까?")){
			location.href="action/member/member_logout.php";
		}
	});
}); 
</script>

<div class="h_logo">
	<p class="align_center"><img class="h_logoImg" src="image/header/logo3.png" onclick="location.href='.'" style="cursor:pointer;"></p>
	<div class="h_submenu"> 
		<?php
			// 로그인 중일때 
			if(isset($_SESSION['m_id'])){
		?>
			<a href="admin/">관리자</a>
			l
			<a class="logout" href="#">로그아웃</a>
		<?php 
			}else{
		?>
			<a href="?page_content=member_loginForm">로그인</a>
			l
			<a href="?page_content=member_clause">회원가입</a>
		<?php 
		}
		?>
	</div>
	
	
	<!-- 모바일용 사이드바  -->
	<a class="asideB" href="#" onclick="$('.aside').asidebar('open')"> <i class="fa fa-bars" aria-hidden="true" style="font-size:35px"></i> </a>
	
	<div class="aside">
		 <div class="aside_close"><span class="close" data-dismiss="aside" aria-hidden="true">&times;</span></div>
		  
		  <div class="aside_top">로그인이 필요한 서비스입니다!</div>
	      
	      <div class="aside-header"> 
	      		<div class="aside-header_left">마이페이지</div>
	      		<div class="aside-header_right">
	      			<a href="#">아이디 찾기</a>
	      			l
	      			<a href="#">비밀번호 찾기</a>
	      			l
	      			<a href="#">회원가입</a>
	      		</div>
	      </div>
	      
	      <!-- 모바일 로그인폼 -->
	      <div class="aside_loginForm">
		      	<form class="boardWriteForm" action="action/member/member_login.php"
			method="post">
		      		<div class="aside_loginForm_row1"> <input type="text" placeholder="아이디" name="m_id"> </div>
		      		<div class="aside_loginForm_row1"> <input type="password" placeholder="패스워드" name="m_pwd"> </div>
		      		<div class="aside_loginB"><i class="fa fa-lock" aria-hidden="true"></i> 로그인</div>
	      		</form>
	      </div>
	      
	      
	      <!-- 카테고리 메뉴바  -->
	      <div class="aside_category">
	      		<div class="aside_category_title">시민공간 <i class="fa fa-chevron-down" aria-hidden="true" style="margin-left:20px;"></i></div>
	      		
	      		<div class="aside_category_sub">
	      			<div class="aside_category_sub_rows">재능나눔</div>
	      			<div class="aside_category_sub_rows">주민게시판</div>
	      			<div class="aside_category_sub_rows">설문조사</div>
	      			<div class="aside_category_sub_rows">아나바다</div>
	      		</div>
	      </div>
	      
	      <div class="aside_category">
	      		<div class="aside_category_title">재능동아리 <i class="fa fa-chevron-down" aria-hidden="true" style="margin-left:20px;"></i></div>
	      		
	      		<div class="aside_category_sub">
	      			<div class="aside_category_sub_rows">영어과외방</div>
	      			<div class="aside_category_sub_rows">청소년축구교실</div>
	      			<div class="aside_category_sub_rows">통일하이킹</div>
	      			<div class="aside_category_sub_rows">수자인홀인원클럽</div>
	      		</div>
	      </div>
	      
	      <div class="aside_category">
	      		<div class="aside_category_title">중고장터 <i class="fa fa-chevron-down" aria-hidden="true" style="margin-left:20px;"></i></div>
	      		
	      		<div class="aside_category_sub">
	      			<div class="aside_category_sub_rows">나눔</div>
	      			<div class="aside_category_sub_rows">물물교환</div>
	      			<div class="aside_category_sub_rows">팝니다</div>
	      			<div class="aside_category_sub_rows">삽니다</div>
	      			<div class="aside_category_sub_rows">입찰</div>
	      		</div>
	      </div>
	      
	      <div class="aside_category">
	      		<div class="aside_category_title">전문가상담 <i class="fa fa-chevron-down" aria-hidden="true" style="margin-left:20px;"></i></div>
	      		
	      		<div class="aside_category_sub">
	      			<div class="aside_category_sub_rows">건강</div>
	      			<div class="aside_category_sub_rows">건축리모델링</div>
	      			<div class="aside_category_sub_rows">교육</div>
	      			<div class="aside_category_sub_rows">여행 힐링</div>
	      			<div class="aside_category_sub_rows">보험</div>
	      		</div>
	      </div>
	      
	      <div class="aside_category">
	      		<div class="aside_category_title">생활편의전화 <i class="fa fa-chevron-down" aria-hidden="true" style="margin-left:20px;"></i></div>
	      		
	      		<div class="aside_category_sub">
	      			<div class="aside_category_sub_rows">주변정보</div>
	      			<div class="aside_category_sub_rows">갤러리</div>
	      			<div class="aside_category_sub_rows">공지사항</div>
	      			<div class="aside_category_sub_rows">동영상보기</div>
	      			<div class="aside_category_sub_rows">고객센터</div>
	      		</div>
	      </div>
	      
	           <div class="aside_category">
	      		<div class="aside_category_title">부동산 <i class="fa fa-chevron-down" aria-hidden="true" style="margin-left:20px;"></i></div>
	      		
	      		<div class="aside_category_sub">
	      			<div class="aside_category_sub_rows">매물</div>
	      		</div>
	      </div>
	 </div><!-- aside End -->
	 
	 <div class="aside-backdrop"></div>
</div> <!-- h_logo End  -->


<div class="h_navi">

	<div class="aside_hr"></div>
	      
	<!-- 상단 메뉴 -->
	<?php 
		
	?>
	<div class="h_navi_cols menuHover1" onclick="location.href='?page_content=board_normal&board_category=시민공간&board_page=재능나눔&board_cateNo=01' ">시민공간</div>
	<div class="h_navi_cols menuHover2" onclick="location.href='?page_content=board_normal&board_category=재능동아리&board_page=영어과외방&board_cateNo=02' ">재능동아리</div>
	<div class="h_navi_cols menuHover3" onclick="location.href='?page_content=board_normal&board_category=중고장터&board_page=나눔&board_cateNo=03' ">중고장터</div>
	<div class="h_navi_cols menuHover4" onclick="location.href='?page_content=board_normal&board_category=전문가상담&board_page=건강&board_cateNo=04' ">전문가상담</div>
	<div class="h_navi_cols menuHover5" onclick="location.href='?page_content=board_normal&board_category=생활편의전화&board_page=주변정보&board_cateNo=05' ">생활편의전화</div>
	<div class="h_navi_cols menuHover6" onclick="location.href='?page_content=board_reserve&board_category=내 아파트&board_page=주치의 예약&board_cateNo=06' " style="">내 아파트</div>
	<div class="h_navi_cols menuHover7" onclick="location.href='?page_content=realty_list&board_category=부동산&board_page=매물&board_cateNo=07' " style="margin-right:0px">부동산</div>

	
	<!-- 마우스올렸을때 나오는 네비 하단메뉴 -->
	<div class="h_navi_contents">
		<div class="h_navi_contents_cols menuHover11">
			<p class="align_center menuHover01" ><a href="?page_content=board_normal&board_category=시민공간&board_page=재능나눔&board_cateNo=01">재능나눔</a></p>
			<p class="align_center menuHover01"><a class="menuHover01" href="?page_content=board_normal&board_category=시민공간&board_page=주민자유게시판&board_cateNo=01">주민자유게시판</a></p>
			<p class="align_center menuHover01"><a class="menuHover01" href="?page_content=board_voteList&board_category=시민공간&board_page=전자투표&board_cateNo=01">전자투표</a></p>
			<p class="align_center menuHover01"><a class="menuHover01" href="?page_content=board_normal&board_category=시민공간&board_page=아나바다&board_cateNo=01">아나바다</a></p>
		</div>
		
		<div class="h_navi_contents_cols menuHover22">
			<p class="align_center menuHover02" ><a href="?page_content=board_normal&board_category=재능동아리&board_page=영어과외방&board_cateNo=02">영어과외방</a></p>
			<p class="align_center menuHover02"><a href="?page_content=board_normal&board_category=재능동아리&board_page=청소년축구교실&board_cateNo=02">청소년축구교실</a></p>
			<p class="align_center menuHover02"><a href="?page_content=board_normal&board_category=재능동아리&board_page=통일하이킹&board_cateNo=02">통일하이킹</a></p>
			<p class="align_center menuHover02"><a href="?page_content=board_normal&board_category=재능동아리&board_page=수자인홀인원클럽&board_cateNo=02">수자인홀인원클럽</a></p>
		</div>
		
		<div class="h_navi_contents_cols menuHover33">
			<p class="align_center menuHover03" ><a href="?page_content=board_normal&board_category=중고장터&board_page=나눔&board_cateNo=03">나눔</a></p>
			<p class="align_center menuHover03"><a href="?page_content=board_normal&board_category=중고장터&board_page=물물교환&board_cateNo=03">물물교환</a></p>
			<p class="align_center menuHover03"><a href="?page_content=board_normal&board_category=중고장터&board_page=팝니다&board_cateNo=03">팝니다</a></p>
			<p class="align_center menuHover03"><a href="?page_content=board_normal&board_category=중고장터&board_page=삽니다&board_cateNo=03">삽니다</a></p>
			<p class="align_center menuHover03"><a href="?page_content=board_normal&board_category=중고장터&board_page=입찰&board_cateNo=03">입찰</a></p>
		</div>
		
		<div class="h_navi_contents_cols menuHover44">
			<p class="align_center menuHover04" ><a href="?page_content=board_normal&board_category=전문가상담&board_page=건강&board_cateNo=04">건강</a></p>
			<p class="align_center menuHover04"><a href="?page_content=board_normal&board_category=전문가상담&board_page=건축리모델링&board_cateNo=04">건축리모델링</a></p>
			<p class="align_center menuHover04"><a href="?page_content=board_normal&board_category=전문가상담&board_page=교육&board_cateNo=04">교육</a></p>
			<p class="align_center menuHover04"><a href="?page_content=board_normal&board_category=전문가상담&board_page=교육 힐링&board_cateNo=04">여행 힐링</a></p>
		</div>
		
		<div class="h_navi_contents_cols menuHover55">
			<p class="align_center menuHover05" ><a href="?page_content=board_normal&board_category=생활편의전화&board_page=주변정보&board_cateNo=05">주변정보</a></p>
			<p class="align_center menuHover05"><a href="?page_content=board_normal&board_category=생활편의전화&board_page=갤러리&board_cateNo=05">갤러리</a></p>
			<p class="align_center menuHover05"><a href="?page_content=board_normal&board_category=생활편의전화&board_page=공지사항&board_cateNo=05">공지사항</a></p>
			<p class="align_center menuHover05"><a href="?page_content=board_normal&board_category=생활편의전화&board_page=동영상보기&board_cateNo=05">동영상보기</a></p>
			<p class="align_center menuHover05"><a href="?page_content=board_normal&board_category=생활편의전화&board_page=고객센터&board_cateNo=05">고객센터</a></p>
		</div>
		
		<div class="h_navi_contents_cols menuHover66">
			<p class="align_center menuHover06" ><a href="?page_content=board_reserve&board_category=내아파트&board_page=주치의 예약&board_cateNo=06">주치의 예약</a></p>
			<p class="align_center menuHover06"><a href="?page_content=board_reserve&board_category=내아파트&board_page=게스트하우스&board_cateNo=06">게스트하우스</a></p>
			<p class="align_center menuHover06"><a href="?page_content=board_reserve&board_category=내아파트&board_page=아기돌봄예약&board_cateNo=06">아기돌봄예약</a></p>
			<p class="align_center menuHover06"><a href="?page_content=board_manageE&board_category=내아파트&board_page=푸마시가맹점&board_cateNo=06">푸마시가맹점</a></p>
			<p class="align_center menuHover06"><a href="?page_content=board_manageE&board_category=내아파트&board_page=관리비조회&board_cateNo=06">관리비조회</a></p>
		</div>
		
		<div class="h_navi_contents_cols menuHover77">
			<p class="align_center menuHover07"><a href="?page_content=realty_list&board_category=부동산&board_page=매물&board_cateNo=07">매물</a></p>
		</div>
		
		<!-- <div class="h_navi_contents_border"></div> -->
	</div>
	
</div>


