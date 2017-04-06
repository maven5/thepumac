<!-- member_list (ml) -->

<?php 
	include 'dbconfig.php';
	
	
	$board_category = $_GET['category'];
	$board_page = $_GET['page'];
	$board_type = $_GET['type'];
	
	$search_name = $_GET['search_name'];
	$search_value = $_GET['search_value'];
	
	if(isset($_GET['search_value'])) // 검색 옵션 + 키워드 쿼리
		$search_query = $search_name." = '".$search_value."'";
	else 
		$search_query="";
	
	if($board_category=="" || !isset($board_category))
		$board_category="1";
	
?>

<!-- 카테고리 Hidden -->
<input type="text" class="board_categoryH" value="<?=$board_category?>">
<input type="text" class="board_pageH" value="<?=$board_page?>">
<input type="text" class="board_typeH" value="<?=$board_type?>">
<input type="text" class="board_categoryH1" value="<?=$search_name?>">
<input type="text" class="board_categoryH2" value="<?=$search_value?>">
		
<div class="ml_wrap">
	<!-- 타이틀  -->
	<div class="ml_title">[게시판 관리]</div>
	
	<div class="bl_category">
		<select class="board_category" style="width:110px;">
		<?php 
			$query = "select category_value as cv,category_key as ck from b_category order by category_key asc";
			
			$result = mysqli_query($conn, $query);
			
			$ArrayData = array();
			
			while($row=mysqli_fetch_array($result)){
		?>
			<option value="<?=$row['ck']?>" <?php if($row['ck']==$board_category) { ?> selected <?php } ?>><?=$row['cv']?></option>
		<?php 
			}
		?>
		</select>
		
		<select class="board_page" style="margin-left:10px;width:125px;">
		<?php 
				$query = "select * from b_page where category_key='$board_category' order by page_key asc";
				
			
			$result = mysqli_query($conn, $query);
			
			$ArrayData = array();
			
			while($row=mysqli_fetch_array($result)){
		?>
			<option value="<?=$row['page_key']?>" <?php if($row['page_key']==$board_page) { ?> selected <?php } ?>><?=$row['page_value']?></option>
		<?php 
			}
		?>
		</select>
		
		<select class="board_type" style="margin-left:10px;">
			<option <?php if($board_type=="공지사항"){ ?> selected <?php } ?>>공지사항</option>
			<option <?php if($board_type=="일반게시판"){ ?> selected <?php } ?>>일반게시판</option>
		</select>
	</div>
	
	<!-- 검색열 -->
	<div class="ml_search">
		<select class="search_name"> 
			<option value="b_subject">제목</option>
			<option value="b_subject">글쓴이</option>
		</select>
		
		<input type="text" class="search_value"> 
		<input type="button" value="검색" class="searchB">
	</div>
	
	<!-- 회원 수 열 -->
	<div class="ml_count">Total : <font style="font-weight: bold"><?=$rowcount?></font>건</div>
	
	<!-- 데이터 출력 열 -->
	<div class="ml_list">
		<!-- header  -->
		<div class="ml_list_header">
			<div class="ml_list_col1">번호</div>
			<div class="ml_list_col2">구분</div>
			<div class="ml_list_col3">제목</div>
			<div class="ml_list_col4">글쓴이</div>
			<div class="ml_list_col5">조회수</div>
			<div class="ml_list_col6">작성날짜</div>
			<div class="ml_list_col7">비고</div>
		</div>
		
		<?php 
			$query = "select * from board where category_key='$board_category' and page_key='$board_page' and b_type='$board_type' ".$search_query." order by b_index desc ";
			
			$result = mysqli_query($conn,$query);
			$rowcount =  mysqli_num_rows($result);
		?>
		
		<div style="text-overflow:ellipsis;overflow: hidden;font-size:12px;">
			<!-- DB  -->
			<?php 
				while($row=mysqli_fetch_array($result)){
			?>
					<div class="ml_list_col1"><?=$rowcount?></div>
					<div class="ml_list_col2 vote_view"><?=$row['b_type']?></div>
					<div class="ml_list_col3"><?=$row['b_subject']?></div>
					<div class="ml_list_col4"><?=$row['b_writer']!=""?$row['b_writer']:"-" ?></div>
					<div class="ml_list_col5"><?=$row['b_hit']?></div>
					<div class="ml_list_col6"><?=substr($row['b_date'],0,10)?></div>
					
					<div class="ml_list_col7">
						<input type="button" value="상세" class="vote_view">
						<input type="button" value="수정" class="vote_modify">
						<input type="button" value="삭제" class="vote_delete">
						<input type="hidden" value="<?=$row['b_index']?>" class="vote_idx">
					</div>
					
			<?php
			$rowcount--;
				} // while문
			$count = mysqli_num_rows($result);
			if($count == 0 ){ // 데이터가 없으면
			?>
			
				<div class="ml_list_col1"></div>
				<div class="ml_list_col2 vote_view"></div>
				<div class="ml_list_col3">게시물이 없습니다.</div>
				<div class="ml_list_col4"></div>
				<div class="ml_list_col5"></div>
				<div class="ml_list_col6"></div>
				
				<div class="ml_list_col7">
				</div>
			<?php } ?>
		</div>
	</div><!-- ml_list end  -->
</div><!-- ml_wrap end  -->

<?php 
	mysqli_close($conn); // DB Close
?>