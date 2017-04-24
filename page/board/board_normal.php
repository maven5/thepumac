<!-- 일반게시판  틀 -->

<div class="boardN_wrap">
	<div class="boardN_title">
		<div class="boardN_title_cols1">
			<font style="font-size:16px;"><?php echo $_GET['board_cateNo'];?></font>
			<br>
			<font style="font-size:24px"><?php echo $_GET['board_category']; ?></font>
		</div>
		
		<?php if($_GET['board_page']=="주치의 예약"){ ?>
			<div class="boardN_title_cols2_1">
			</div>
			<?php } else if($_GET['board_page']=="게스트하우스"){ ?>
			<div class="boardN_title_cols2_2">
			</div>
			<?php } else if($_GET['board_page']=="아기돌봄예약"){ ?>
			<div class="boardN_title_cols2_3">
			</div>
			<?php } else{ ?>
			<div class="boardN_title_cols2" style="background:url('/image/board/cateNo<?=$_GET['board_cateNo']?>.jpg')">
				<div class="boardN_title_cols2_title"><?php echo $_GET['board_page']; ?></div>
			</div>
		<?php } ?>
			
	</div><!-- boardN_title End  -->
	
	<div class="boardN_page">
		<div class="boardN_page_cols1">
			<?php if($_GET['board_cateNo']=="01"){?>
				<div class="boardN_page_cols1_title <?php if($_GET['board_page']=="재능나눔"){ ?>select_page <?php }else {?> select_pageNo <?php }?>" onclick="location.href='?page_content=board_normal&board_category=시민공간&board_page=재능나눔&board_cateNo=01' ">재능나눔</div>
				<div class="boardN_page_cols1_title <?php if($_GET['board_page']=="주민자유게시판"){ ?>select_page <?php }else {?> select_pageNo <?php }?>" onclick="location.href='?page_content=board_normal&board_category=시민공간&board_page=주민자유게시판&board_cateNo=01' ">주민자유게시판</div>
				<div class="boardN_page_cols1_title <?php if($_GET['board_page']=="전자투표"){ ?>select_page <?php }else {?> select_pageNo <?php }?>" onclick="location.href='?page_content=board_voteList&board_category=시민공간&board_page=전자투표&board_cateNo=01' ">전자투표</div>
				<div class="boardN_page_cols1_title <?php if($_GET['board_page']=="아나바다"){ ?>select_page <?php }else {?> select_pageNo <?php }?>" onclick="location.href='?page_content=board_normal&board_category=시민공간&board_page=아나바다&board_cateNo=01' ">아나바다</div>
			<?php } else if($_GET['board_cateNo']=="02"){ ?>
				<div class="boardN_page_cols1_title <?php if($_GET['board_page']=="영어과외방"){ ?>select_page <?php }else {?> select_pageNo <?php }?>" onclick="location.href='?page_content=board_normal&board_category=재능동아리&board_page=영어과외방&board_cateNo=02' ">영어과외방</div>
				<div class="boardN_page_cols1_title <?php if($_GET['board_page']=="청소년축구교실"){ ?>select_page <?php }else {?> select_pageNo <?php }?>" onclick="location.href='?page_content=board_normal&board_category=재능동아리&board_page=청소년축구교실&board_cateNo=02' ">청소년축구교실</div>
				<div class="boardN_page_cols1_title <?php if($_GET['board_page']=="통일하이킹"){ ?>select_page <?php }else {?> select_pageNo <?php }?>" onclick="location.href='?page_content=board_normal&board_category=재능동아리&board_page=통일하이킹&board_cateNo=02' ">통일하이킹</div>
				<div class="boardN_page_cols1_title <?php if($_GET['board_page']=="수자인홀인원클럽"){ ?>select_page <?php }else {?> select_pageNo <?php }?>" onclick="location.href='?page_content=board_normal&board_category=재능동아리&board_page=수자인홀인원클럽&board_cateNo=02' ">수자인홀인원클럽</div>
			<?php } else if($_GET['board_cateNo']=="03"){ ?>
				<div class="boardN_page_cols1_title <?php if($_GET['board_page']=="나눔"){ ?>select_page <?php }else {?> select_pageNo <?php }?>" onclick="location.href='?page_content=board_normal&board_category=중고장터&board_page=나눔&board_cateNo=03' ">나눔</div>
				<div class="boardN_page_cols1_title <?php if($_GET['board_page']=="물물교환"){ ?>select_page <?php }else {?> select_pageNo <?php }?>" onclick="location.href='?page_content=board_normal&board_category=중고장터&board_page=물물교환&board_cateNo=03' ">물물교환</div>
				<div class="boardN_page_cols1_title <?php if($_GET['board_page']=="팝니다"){ ?>select_page <?php }else {?> select_pageNo <?php }?>" onclick="location.href='?page_content=board_normal&board_category=중고장터&board_page=팝니다&board_cateNo=03' ">팝니다</div>
				<div class="boardN_page_cols1_title <?php if($_GET['board_page']=="삽니다"){ ?>select_page <?php }else {?> select_pageNo <?php }?>" onclick="location.href='?page_content=board_normal&board_category=중고장터&board_page=삽니다&board_cateNo=03' ">삽니다</div>
				<div class="boardN_page_cols1_title <?php if($_GET['board_page']=="입찰"){ ?>select_page <?php }else {?> select_pageNo <?php }?>" onclick="location.href='?page_content=board_normal&board_category=중고장터&board_page=입찰&board_cateNo=03' ">입찰</div>
			<?php } else if($_GET['board_cateNo']=="04"){ ?>
				<div class="boardN_page_cols1_title <?php if($_GET['board_page']=="건강"){ ?>select_page <?php }else {?> select_pageNo <?php }?>" onclick="location.href='?page_content=board_normal&board_category=전문가상담&board_page=건강&board_cateNo=04' ">건강</div>
				<div class="boardN_page_cols1_title <?php if($_GET['board_page']=="건축리모델링"){ ?>select_page <?php }else {?> select_pageNo <?php }?>" onclick="location.href='?page_content=board_normal&board_category=전문가상담&board_page=건축리모델링&board_cateNo=04' ">건축리모델링</div>
				<div class="boardN_page_cols1_title <?php if($_GET['board_page']=="교육"){ ?>select_page <?php }else {?> select_pageNo <?php }?>" onclick="location.href='?page_content=board_normal&board_category=전문가상담&board_page=교육&board_cateNo=04' ">교육</div>
				<div class="boardN_page_cols1_title <?php if($_GET['board_page']=="여행 힐링"){ ?>select_page <?php }else {?> select_pageNo <?php }?>" onclick="location.href='?page_content=board_normal&board_category=전문가상담&board_page=여행힐링&board_cateNo=04' ">여행 힐링</div>
				<div class="boardN_page_cols1_title <?php if($_GET['board_page']=="보험"){ ?>select_page <?php }else {?> select_pageNo <?php }?>" onclick="location.href='?page_content=board_normal&board_category=전문가상담&board_page=보험&board_cateNo=04' ">보험</div>
			<?php } else if($_GET['board_cateNo']=="05"){ ?>
				<div class="boardN_page_cols1_title <?php if($_GET['board_page']=="주변정보"){ ?>select_page <?php }else {?> select_pageNo <?php }?>" onclick="location.href='?page_content=board_normal&board_category=생활편의전화&board_page=주변정보&board_cateNo=05' ">주변정보</div>
				<div class="boardN_page_cols1_title <?php if($_GET['board_page']=="갤러리"){ ?>select_page <?php }else {?> select_pageNo <?php }?>" onclick="location.href='?page_content=board_normal&board_category=생활편의전화&board_page=갤러리&board_cateNo=05' ">갤러리</div>
				<div class="boardN_page_cols1_title <?php if($_GET['board_page']=="공지사항"){ ?>select_page <?php }else {?> select_pageNo <?php }?>" onclick="location.href='?page_content=board_normal&board_category=생활편의전화&board_page=공지사항&board_cateNo=05' ">공지사항</div>
				<div class="boardN_page_cols1_title <?php if($_GET['board_page']=="동영상보기"){ ?>select_page <?php }else {?> select_pageNo <?php }?>" onclick="location.href='?page_content=board_normal&board_category=생활편의전화&board_page=동영상보기&board_cateNo=05' ">동영상보기</div>
				<div class="boardN_page_cols1_title <?php if($_GET['board_page']=="고객센터"){ ?>select_page <?php }else {?> select_pageNo <?php }?>" onclick="location.href='?page_content=board_normal&board_category=생활편의전화&board_page=고객센터&board_cateNo=05' ">고객센터</div>
			<?php } else if($_GET['board_cateNo']=="06"){ ?>
				<div class="boardN_page_cols1_title <?php if($_GET['board_page']=="주치의 예약"){ ?>select_page <?php }else {?> select_pageNo <?php }?>" onclick="location.href='?page_content=board_reserve&board_category=내 아파트&board_page=주치의 예약&board_cateNo=06' ">주치의 예약</div>
				<div class="boardN_page_cols1_title <?php if($_GET['board_page']=="게스트하우스"){ ?>select_page <?php }else {?> select_pageNo <?php }?>" onclick="location.href='?page_content=board_reserve&board_category=내 아파트&board_page=게스트하우스&board_cateNo=06' ">게스트하우스</div>
				<div class="boardN_page_cols1_title <?php if($_GET['board_page']=="아기돌봄예약"){ ?>select_page <?php }else {?> select_pageNo <?php }?>" onclick="location.href='?page_content=board_reserve&board_category=내 아파트&board_page=아기돌봄예약&board_cateNo=06' ">아기돌봄예약</div>
				<div class="boardN_page_cols1_title <?php if($_GET['board_page']=="푸마시가맹점"){ ?>select_page <?php }else {?> select_pageNo <?php }?>" onclick="location.href='?page_content=board_manageE&board_category=내 아파트&board_page=푸마시가맹점&board_cateNo=06' ">푸마시가맹점</div>
				<div class="boardN_page_cols1_title <?php if($_GET['board_page']=="관리비조회"){ ?>select_page <?php }else {?> select_pageNo <?php }?>" onclick="location.href='?page_content=board_manageE&board_category=내 아파트&board_page=관리비조회&board_cateNo=06' ">관리비조회</div>

			<?php } else if($_GET['board_cateNo']=="07"){ ?>
				<div class="boardN_page_cols1_title <?php if($_GET['board_page']=="매물"){ ?>select_page <?php }else {?> select_pageNo <?php }?>" onclick="location.href='?page_content=realty_list&board_category=부동산&board_page=매물&board_cateNo=07' ">매물</div>
				
			<?php } ?>
		</div>
		
		<div class="boardN_page_cols2">
			<!-- 게시판 형식 PHP 출력 -->
			<?php if($_GET['page_content']=="board_normal") include_once 'board_list.php';?>
			<?php if($_GET['page_content']=="board_view") include_once 'board_view.php';?>
			<?php if($_GET['page_content']=="board_writeForm") include_once 'board_writeForm.php';?>
			<?php if($_GET['page_content']=="board_reserve") include_once 'board_reserve.php';?>
			<?php if($_GET['page_content']=="board_manageE") include_once 'board_manageE.php';?>
			<?php if($_GET['page_content']=="board_manageE_view") include_once 'board_manageE_view.php';?>
			
			<!-- 투표 -->
			<?php if($_GET['page_content']=="board_voteList") include_once 'board_voteList.php';?>
			<?php if($_GET['page_content']=="board_voteWriteForm") include_once 'board_voteWriteForm.php';?>
			<?php if($_GET['page_content']=="board_voteView") include_once 'board_voteView.php';?>
		
			<!-- 부동산 -->
			<?php if($_GET['page_content']=="realty_list") include_once 'realty/realty_list.php';?>
			<?php if($_GET['page_content']=="realty_view") include_once 'realty/realty_view.php';?>
			<?php if($_GET['page_content']=="realty_writeForm") include_once 'realty/realty_writeForm.php';?>
			
		</div>
		
	</div><!-- boardN_page End -->
	
	
	<!-- 게시판 본 내용 -->
	
	
</div><!-- boardN_wrap End  -->