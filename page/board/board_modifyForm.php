<!-- 글쓰기폼  -->
<?php
	/*
	 ** 게시판 세부페이지
	 **
	 */

	include 'dbconfig.php';

	$board_category = $_GET['board_category']; // 큰 카테고리
	$board_page = $_GET['board_page']; // 작은 카테고리
	$board_cateNo = $_GET['board_cateNo']; // 작은 카테고리
	$b_index = $_GET['b_index'];
	
	$query = "select * from board where b_index='$b_index'"; // 큰 카테고리 값 검색
	
	$result = mysqli_query($conn,$query) or die(mysqli_error($conn));
	
	$num = mysqli_num_rows($result);
	
	if($num==0){ // 없는 페이지를 들어갔을때 예외처리
		echo '<script>alert("잘못 된 접근방법입니다.");
			history.go(-1);
			</script>';
	}
	
	while($row=mysqli_fetch_array($result)){
			$b_subject = $row['b_subject'];
			$b_content = $row['b_content'];
			$b_date = $row['b_date'];
			$b_hit = $row['b_hit'];
			$b_writer = $row['b_writer'];
	}
?>

<div class="boardN_wrap">
	<div class="boardN_title">
		<div class="boardN_title_cols1">
			<font style="font-size:16px;"><?=$_GET['board_cateNo']?></font>
			<br>
			<font style="font-size:24px"><?=$_GET['board_category']?></font>
		</div>
		
		<div class="boardN_title_cols2">
			<div class="boardN_title_cols2_title">글쓰기</div>
		</div>
	</div><!-- boardN_title End  -->
	
	<div class="boardWF_page">
		<div class="boardWF_page1_cols2">
			<?php if($_GET['board_cateNo']=="01"){?>
				<div class="boardN_page_cols1_title <?php if($_GET['board_page']=="재능나눔"){ ?>select_page <?php }else {?> select_pageNo <?php }?>" onclick="location.href='?page_content=board_normal&board_category=시민공간&board_page=재능나눔&board_cateNo=01' ">재능나눔</div>
				<div class="boardN_page_cols1_title <?php if($_GET['board_page']=="주민자유게시판"){ ?>select_page <?php }else {?> select_pageNo <?php }?>" onclick="location.href='?page_content=board_normal&board_category=시민공간&board_page=주민자유게시판&board_cateNo=01' ">주민자유게시판</div>
				<div class="boardN_page_cols1_title <?php if($_GET['board_page']=="설문조사"){ ?>select_page <?php }else {?> select_pageNo <?php }?>" onclick="location.href='?page_content=board_normal&board_category=시민공간&board_page=설문조사&board_cateNo=01' ">설문조사</div>
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
				<div class="boardN_page_cols1_title <?php if($_GET['board_page']=="관리비조회"){ ?>select_page <?php }else {?> select_pageNo <?php }?>" onclick="location.href='?page_content=board_normal&board_category=관리비조회&board_page=관리비조회&board_cateNo=06' ">관리비조회</div>
				<div class="boardN_page_cols1_title <?php if($_GET['board_page']=="스마트제어서비스"){ ?>select_page <?php }else {?> select_pageNo <?php }?>" onclick="location.href='?page_content=board_normal&board_category=스마트제어서비스&board_page=스마트제어서비스&board_cateNo=06' ">스마트제어서비스</div>
				<div class="boardN_page_cols1_title <?php if($_GET['board_page']=="전자도서학습관"){ ?>select_page <?php }else {?> select_pageNo <?php }?>" onclick="location.href='?page_content=board_normal&board_category=전자도서학습관&board_page=전자도서학습관&board_cateNo=06' ">전자도서학습관</div>
				<div class="boardN_page_cols1_title <?php if($_GET['board_page']=="게스트하우스"){ ?>select_page <?php }else {?> select_pageNo <?php }?>" onclick="location.href='?page_content=board_normal&board_category=게스트하우스&board_page=게스트하우스&board_cateNo=06' ">게스트하우스</div>
			<?php } ?>
			
		</div>
		
		<div class="boardWF_page2_cols2">
		
			<!-- 글쓰기폼  -->
			<div class="boardWF_wrap">
				<form class="boardWriteForm" action="/pumac2/action/board/board_update.php" method="post">
					<div class="boardWF_row1" style="line-height:20px;">작성자</div>
					
					<input type="hidden" value="" name="b_writer"> <!-- 작성자 hidden  -->
					<input type="hidden" value="<?=$_GET['board_category']?>" name="board_category"> <!-- 큰메뉴 hidden -->
					<input type="hidden" value="<?=$_GET['board_page']?>" name="board_page"> <!--작은메뉴 hidden -->
					<input type="hidden" value="<?=$_GET['board_cateNo']?>" name="board_cateNo"> <!--큰메뉴번호 hidden -->
					<input type="hidden" value="<?=$_GET['b_index']?>" name="b_index"> <!--인덱스 hidden -->
					
					<div class="boardWF_row1" style="border-bottom: 0px solid;"> 
						<div class="boardWF_col1"> 게시판 </div>
						<div class="boardWF_col2"> <select style="color:#bdbdbd" disabled> <option><?=$_GET['board_page'] ?> </option></select> </div>
					</div>
					
					<div class="boardWF_row1" style="border-bottom: 0px solid;"> 
						<div class="boardWF_col1"> 카테고리 </div>
						<div class="boardWF_col2"> 
							<select name="b_type"> 
								<option> 선택 </option>  
								<?php if( $_SESSION['ma_index']==4  || $_SESSION['ma_index']==5) { ?>
								<option> 공지사항 </option>  
								<?php } ?>
								<option> 일반게시판 </option>
							</select>
						 </div>
					</div>
					
					<div class="boardWF_row1" style="border-bottom: 0px solid;"> 
						<div class="boardWF_col1"> 제목 </div>  
						<div class="boardWF_col2"><input type="text" placeholder="제목을 입력해주세요" name="b_subject" value="<?=$b_subject?>"></div>
					</div>
					
					<div class="boardWF_row2"> 
						 <textarea name="b_content" id="b_content" rows="10" cols="100" style="width:726px; height:512px;"><?=$b_content?></textarea>
					</div>
					
					<div class="boardWF_row1" style="text-align: center;margin-bottom:20px;border-bottom: 0px solid;">
						<input type="button" class="boardWF_writeB" value="수정">
						<input type="button" class="boardWF_cancleB" onclick="history.back(-1) " value="취소">
					</div>
				</form>
			</div>
			
		</div><!--boardN_page_cols2_notice End  -->
	</div><!-- boardN_page End -->
	
	
	<!-- 게시판 본 내용 -->
	
	
</div><!-- boardN_wrap End  -->