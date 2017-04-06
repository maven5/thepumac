<?php 
	session_start();
/*
 ** 투표리스트
**
*/


include 'dbconfig.php';

	$board_category = $_GET['board_category']; // 큰 카테고리
	$board_page = $_GET['board_page']; // 작은 카테고리
	$board_cateNo = $_GET['board_cateNo']; // 작은 카테고리
	
	$query = "select * from vote_big order by v_idx desc"; 
	
	$result = mysqli_query($conn,$query);
	$rowcount =  mysqli_num_rows($result); // 총 설문조사 수
?>

<div class="bVote_wrap">
	<div class="bVote_title"> 투표목록</div>
	<!-- 투표리스트 -->
	<div class="bVote_list">
		
			<?php 
				// 리스트 출력 
				$count = 1;
				while($row=mysqli_fetch_array($result)){
			?>
			<!-- 투표 아이템  -->
			<div class="bVote_cols">
				<div class="bVote_col1">
					<div class="bVote_subject"><?=$rowcount?>. <?=$row['v_subject']?> </div>
					<div class="bVote_date">투표기간 : ~ <?=$row['v_dateE']?> </div>
				</div>
				<div class="bVote_col2" onclick="location.href='?page_content=board_voteView&board_category=<?=$board_category?>&board_page=<?=$board_page?>&board_cateNo=<?=$board_cateNo?>&v_idx=<?=$row['v_idx']?>'"> 투표<br>하기<br> <font style="font-size:10px;"> > </font> </div>
			</div>
			<?php
			$rowcount--; 
				} 
			?>
	</div><!-- bVote_list end -->  
	
	<!-- 투표생성버튼  -->
	<?php if($_SESSION['ma_index']==5){?>
	<div class="bVote_button">
		<input type="button" value="만들기" onclick="location.href='?page_content=board_voteWriteForm&board_category=<?=$board_category?>&board_page=<?=$board_page?>&board_cateNo=<?=$board_cateNo?>'">
	</div>
	<?php } ?>

	<!-- 투표검색 -->
	<div class="boardN_page_cols2_contents_search" style="margin-bottom:20px;">
		<select class="search_category">
			<option>제목</option>
			<option>글쓴이</option>
		</select>
		<input type="text" class="search_content"> 
		<input type="hidden" value="?page_content=board_normal&board_category=<?=$board_category?>&board_page=<?=$board_page?>&board_cateNo=<?=$board_cateNo?>&" class="search_hidden">
		
		<input type="button" value="검색" class="boardN_page_cols2_contents_searchIcon">
	</div>
	
</div> <!-- bVote_wrap end -->

<?php 
	mysqli_close($conn); // DB Close
?>

