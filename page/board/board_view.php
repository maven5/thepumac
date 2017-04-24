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
	$page=$_GET['page'];
	
	$query = "select * from board where b_index='$b_index'"; 
	
	$result = mysqli_query($conn,$query) or die(mysqli_error($conn));
	
	$num = mysqli_num_rows($result);
	
	if($num==0){ // 없는 페이지를 들어갔을때 예외처리
		echo '<script>alert("잘못 된 접근방법입니다.");
			history.go(-1);
			</script>';
	}
	
	
	// ---------- 데이터 받아오기 --------------- //
	while($row=mysqli_fetch_array($result)){
			$b_subject = $row['b_subject'];
			$b_content = $row['b_content'];
			$b_date = $row['b_date'];
			$b_hit = $row['b_hit'];
			$b_writer = $row['b_writer'];
			$b_files= $row['b_files'];
	}
	////////////////////////////////////////////////////
	
	
	preg_match_all("/<img[^>]*src=[\"']?([^>\"']+)[\"']?[^>]*>/i",  $b_content, $matches); // 이미지 태그 추출
	$imgSrc = $matches[1]; // src 값만 추출하기
	
	//이미지 태그 제거
	$b_content_noImg = preg_replace("/<img[^>]+\>/i", "", $b_content);
	
?>

<script>
	$(document).ready(function(){
		$('meta[property=og\\:title]').attr('content', "<?=$board_page." - ".$b_subject?>"); 
		$('meta[property=og\\:description]').attr('content',  "<?=strip_tags($b_content_noImg)?>");
		$('meta[property=og\\:image]').attr('content', "<?=$imgSrc[0]?>");
		$('meta[property=og\\:url]').attr('content', "http://thepumac.com");
	});
</script>



<?php
	
	
	
	// -----------00. 조회수 증가 ---------------- //
		$b_hiter = $_SESSION['m_id']; // *** 로그인 구현되면 아이디값 넣어야됌 ***
	
		$query = "select * from b_hit where h_cookieName='$b_hiter' and h_date =DATE_FORMAT(now() ,'%Y-%m-%d') and b_index='$b_index' "; // 처음본글인지 검색
		$result = mysqli_query($conn,$query) or die(mysqli_error($conn));
		$rowcount =  mysqli_num_rows($result);
				
		if($rowcount ==0) { // 새로고침 방지
			
			$query = "insert into b_hit(h_date,h_cookieName,b_index) value(now(),'$b_hiter','$b_index') ";
			mysqli_query($conn,$query) or die(mysqli_error($conn));
			
			$query = "update board set b_hit=b_hit+1 where  b_index='$b_index'"; // 히트수 증가
			mysqli_query($conn,$query) or die(mysqli_error($conn));
		}
	////////////////////////////////////////////////////
	
		
		
	// 01. 파일 업로드 설정 //
	if($b_files!=""){
		$total_url = "/upload/".$b_files;
		$b_files= explode("^",$b_files); // 파일명 
		$b_files = $b_files[1];
		
	}
	////////////////////////////////////////////////////
	
	
	mysqli_close($conn); // DB Close
?>

<div class="bv_wrap">
	<!--글제목 -->
	<div class="bv_subject"><?=$b_subject?></div>

	<!--글쓴이, 등록일, 조회수 -->
	<div class="bv_WH">
		<div class="bv_writer">
			<b>글쓴이</b> <?php echo ($b_writer==null)?"무명": $b_writer?></div>
		<div class="bv_date">
			<b>등록일</b> <?=$b_date?></div>
		<div class="bv_hit">
			<b>조회수</b> <?=$b_hit?></div>
	</div>

	<!-- 글내용  -->
	<div class="bv_contents"><?=$b_content?></div>

	<!--  글파일  -->
	<?php
		if($b_files!=""){ 
	?>
	<div class="bv_files">
		<i class="fa fa-file" aria-hidden="true"></i> 첨부 파일 <a
			href="<?=$total_url?>"><?=$b_files?></a>
	</div>
	<?php 
		}
	?>
	
	<!-- 목록 버튼 -->

	<div class="bv_btn">
		<?php 
			if($b_writer==$_SESSION['m_id'] || $_SESSION['ma_index'] ==5 || $_SESSION['ma_index'] ==4){ // 본인 또는 관리자만 수정삭제가능
		?>
		<input type="button" value="수정" class="btn_modify"
			onclick="location.href='?page_content=board_modifyForm&b_index=<?=$b_index?>&board_category=<?=$board_category?>&board_page=<?=$board_page?>&board_cateNo=<?=$board_cateNo?>'">
		<input type="button" value="삭제" class="btn_delete"
			onclick="if (confirm('정말 삭제하시겠습니까?') == true){ location.href='action/board/board_delete.php?b_index=<?=$b_index?>&board_category=<?=$board_category?>&board_page=<?=$board_page?>&board_cateNo=<?=$board_cateNo?>'  }">
		<?php 
			}
		?>
		<input type="button" value="목록" class="btn_list"
			onclick="location.href='?page_content=board_normal&board_category=<?=$board_category?>&board_page=<?=$board_page?>&board_cateNo=<?=$board_cateNo?>&page=<?=$page?>'">
	</div>


</div>

