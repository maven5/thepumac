<!-- 게시판 리스트 출력 -->

<?php
	/*
	 ** 리스트 출력
	 **
	 */


	include 'dbconfig.php';
	
	$board_category = $_GET['board_category']; // 큰 카테고리
	$board_page = $_GET['board_page']; // 작은 카테고리
	$board_cateNo = $_GET['board_cateNo']; // 작은 카테고리
	
	
	
	// ------ 1. 검색 기능을 사용했는지 ---------
	$category= $_GET['category'];
	$content= $_GET['content'];
	$queryPlus="";
	
	if($content==""){
		$queryPlus="";
		
	}else{
		if($category=="제목"){
			$queryPlus=" and b_subject like '%".$content."%'";
		}else if($category=="글쓴이"){
			$queryPlus=" and b_writer like '%".$content."%'";
		}
	}
	// ------------------------------------------
	
	
	
	// -------------- 2. 카테고리 검색 ------------
	$query = "select * from b_category where category_value='$board_category'"; // 큰 카테고리 키값 검색
	
	$result = mysqli_query($conn,$query);
	
	while($row=mysqli_fetch_array($result)){
			$category_key = $row['category_key'];
	}
	
	$query = "select * from b_page where page_value='$board_page'"; // 작은 카테고리 키값 검색
	
	$result = mysqli_query($conn,$query);
	
	while($row=mysqli_fetch_array($result)){
		$page_key = $row['page_key'];
	}
	// ------------------------------------------
	
	
	
	
	// -------------- 3. 페이징 처리 ------------
	// 1) 페이지 변수 설정 요청값이 없으면 기본값 1
	if($_GET['page'] && $_GET['page'] > 0){
		$page = $_GET['page'];
	}else{
		$page = 1;
	}
	$query ="select * from board where page_key='$page_key' and category_key='$category_key' and b_type='일반게시판' ".$queryPlus;
	
	$result=mysqli_query($conn,$query);
	$num = mysqli_num_rows($result);//전체 글 개수
	
	$list = 10;
	$block = 5;
	
	$pageNum = ceil($num/$list); // 총 페이지
	$blockNum = ceil($pageNum/$block); // 총 블록
	$nowBlock = ceil($page/$block);
	
	if($num!=0 &&$pageNum<$page){ // 없는 페이지를 들어갔을때 예외처리
		echo '<script>alert("잘못 된 접근방법입니다.");
			history.go(-1);
			</script>';
	}
	
	
	$s_page = ($nowBlock * $block) - 2;
	if ($s_page <= 1) {
		$s_page = 1;
	}else if($blockNum ==1){
		$s_page = 1;
	}
	$e_page = $nowBlock*$block;
	if ($pageNum <= $e_page) {
		$e_page = $pageNum;
	}
	$s_point = ($page-1) * $list;
	// ------------------------------------------
	
	
	
	
	// --------- 4. 게시판 리스트 가져오기 ----------
	$q2 = "select * from board where page_key='$page_key' and category_key='$category_key'  and b_type='일반게시판'".$queryPlus." order by b_index desc   LIMIT $s_point,$list";
	
	$result = mysqli_query($conn,$q2);
	$rowcount =  mysqli_num_rows($result);

	$buyNum =$num-($list*($page-1));
	// ------------------------------------------
	
	
	
	
	// --------- 5. 공지사항 리스트 가져오기 ----------
	$q3 ="select * from board where page_key='$page_key' and category_key='$category_key' and b_type='공지사항' order by b_index desc ";
	$r2=mysqli_query($conn,$q3);
	// ------------------------------------------
	
	
	// --------- 5. 이미지 리스트 가져오기 ----------
	$q4 ="select * from board where page_key='$page_key' and category_key='$category_key' and b_type='일반게시판' order by b_index desc";
/* 	preg_match_all("/<img[^>]*src=[\"']?([^>\"']+)[\"']?[^>]*>/i", $q4, $matches); */
	

	
	$r3 = mysqli_query($conn,$q4);
	$rowcount =  mysqli_num_rows($r3);
	$buyNum =$num-($list*($page-1));
	// ------------------------------------------
		
?>

	
	<div class="boardN_page_cols2_contents" style="border-top:1px solid #585858;border-bottom:1px solid #bdbdbd"> <!-- wrap -->
	<!-- 이미지리스트  -->
	<?php while($row=mysqli_fetch_array($r3)){?>
		<div class="boardN_page_cols2_contents_gellary " onclick="location.href='?page_content=board_view&board_category=<?=$board_category?>&board_page=<?=$board_page?>&board_cateNo=<?=$board_cateNo?>&b_index=<?=$row[b_index]?>&page=<?=$page?>' ">		
			<?preg_match_all("/<img[^>]*src=[\"']?([^>\"']+)[\"']?[^>]*>/i", $row['b_content'], $matches);?>
			<img src=" <?=$matches[1][0]?>" style="width:270px; height:200px;"></div>
	<?php } ?>
	</div>
		
<?php 
	$rowcount = mysqli_num_rows($result);
	if($rowcount == 0 ){ // 데이터가 없으면
?>
	<div class="boardN_page_cols2_contents"> <!-- wrap -->
		<div class="boardN_page_cols2_contents_subject align_floatLeft" style="text-align:left;">
		게시물이 없습니다.</div>
	</div>
<?php 
	}else{
		while($row=mysqli_fetch_array($result)){ // 글 출력
?>
	
<?php  
		$buyNum--;
	}}
?>
<!-- wrap end -->
	 
<?php 
	mysqli_close($conn); // DB Close
?>


	<div style="border-top:1px solid #ddd;width:845px;"></div>
	
	<?php if($rowcount != 0 ){ ?>
	<!-- ************ 페이징처리 ************  -->
	<div class="boardN_page_cols2_contents_paging">
		<a class="paging" href="#" onclick="location.href='?page_content=board_normal&board_category=<?=$board_category?>&board_page=<?=$board_page?>&board_cateNo=<?=$board_cateNo?>&page=<?=$s_page-1?>' ">이전</a>

		
		<?
		for ($p=$s_page; $p<=$e_page; $p++) {
			if($p==$page){
		?>
			<font class="aActive"><?=$p?></font>
		<?
				}
			else{
		?>
			<a class="paging2" href="#" onclick="location.href='?page_content=board_normal&board_category=<?=$board_category?>&board_page=<?=$board_page?>&board_cateNo=<?=$board_cateNo?>&page=<?=$p?>' "><?=$p?></a>
		<?
			}}
		?>
	
	<?php if($blockNum>=2){?>
		<a class="paging" href="#" onclick="location.href='?page_content=board_normal&board_category=<?=$board_category?>&board_page=<?=$board_page?>&board_cateNo=<?=$board_cateNo?>&page=<?=$e_page+1?>' ">다음</a>
	<?php }?>
	</div>
	
	<?php } ?>
			
	<!-- 글쓰기 버튼 -->
	<div class="boardN_page_writeB"><input type="button" value="글쓰기" onclick="location.href='?page_content=board_writeForm&board_page=<?=$_GET['board_page']?>&board_category=<?= $_GET['board_category']?>&board_cateNo=<?= $_GET['board_cateNo']?>'"></div>
	
	
	<div class="boardN_page_cols2_contents_search">
		<select class="search_category">
			<option>제목</option>
			<option>글쓴이</option>
		</select>
		<input type="text" class="search_content"> 
		<input type="hidden" value="?page_content=board_normal&board_category=<?=$board_category?>&board_page=<?=$board_page?>&board_cateNo=<?=$board_cateNo?>&" class="search_hidden">
		
		<input type="button" value="검색" class="boardN_page_cols2_contents_searchIcon">
		
	</div>
			
			