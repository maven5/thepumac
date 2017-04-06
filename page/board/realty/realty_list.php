<?php 
	include 'dbconfig.php';
	
	$board_category = $_GET['board_category']; // 큰 카테고리
	$board_page = $_GET['board_page']; // 작은 카테고리
	$board_cateNo = $_GET['board_cateNo']; // 작은 카테고리
	
	
	// ------ 1. 검색 기능을 사용했는지 ---------
	$category= $_GET['category'];
	$content= $_GET['content'];
	$category2= $_GET['category2'];
	$category3= $_GET['category3'];
	
	$queryPlus1=""; // 검색카테고리
	$queryPlus2=""; // 거래 카테고리
	$queryPlus3=""; // 종류 카테고리
		
	
	// $queryPlus1 
	if($content=="" || $category=="선택"){
		$queryPlus1="";
	}else{
		if($category=="주소"){
			$queryPlus1=" and fld39 like '%".$content."%'";
		}else if($category=="매물명"){
			$queryPlus1=" and title like '%".$content."%'";
		}
	}
	
	// $queryPlus2
	if($category2!="거래" && $category2!=""){
		$queryPlus2=" and fld18='$category2' ";
	}
	
	
	// $queryPlus3
	if($category3!="종류" && $category3!=""){
		$query ="select *  from wc_kind where k_value='$category3'";
	
		$result=mysqli_query($conn,$query);
	
		while($row=mysqli_fetch_array($result)){
			$kind = $row['kind'];
		}
	
		$queryPlus3=" and kind='$kind' ";
	}
	
	
	
	// ------------------------------------------
	
	$queryTotal = $queryPlus1.$queryPlus2.$queryPlus3;
	
	// -------------- 1. 페이징 처리 ------------
	// 1) 페이지 변수 설정 요청값이 없으면 기본값 1
	if($_GET['page'] && $_GET['page'] > 0){
		$page = $_GET['page'];
	}else{
		$page = 1;
	}
	$query ="select count(*) as cnt from wc_content2 where 1=1 ".$queryTotal;
	
	$result=mysqli_query($conn,$query);
	
	while($row=mysqli_fetch_array($result)){
		$num = $row['cnt'];
	}
	
	$list = 10;
	$block = 10;
	
	$pageNum = ceil($num/$list); // 총 페이지
	$blockNum = ceil($pageNum/$block); // 총 블록
	$nowBlock = ceil($page/$block);

	
	if($num!=0 &&$pageNum<$page){ // 없는 페이지를 들어갔을때 예외처리
		echo '<script>alert("잘못 된 접근방법입니다.");
			history.go(-1);
			</script>';
	}
	
	
	$s_page = (($nowBlock-1) * $block) +1;
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
	

	
	// -------------- 2. 데이터 가져오기 ------------
	$q ="select b.k_value,a.* from (select * from wc_content2 where 1=1 $queryTotal order by no desc limit $s_point,$list) a, wc_kind b  where a.kind=b.kind";
	
	$result=mysqli_query($conn,$q);
	// ------------------------------------------

?>
	<!-- Category - Hidden  -->
	<input type="hidden" value="<?=$category?>" id="category1">
	<input type="hidden" value="<?=$content?>" id="category1_content">
	<input type="hidden" value="<?=$category2?>" id="category2">
	<input type="hidden" value="<?=$category3?>" id="category3">

	<!-- 검색바  -->
	<div class="boardN_page_cols2_contents_search" style="margin-bottom:20px;margin-top:-20px">
		<select class="search_category">
			<option>선택</option>
			<option>주소</option>
			<option>매물명</option>
		</select>
		<input type="text" class="search_content" value="<?=$content?>"> 
		<input type="hidden" value="?page_content=realty_list&board_category=<?=$board_category?>&board_page=<?=$board_page?>&board_cateNo=<?=$board_cateNo?>&" class="search_hidden">
		
		<input type="button" value="검색" class="boardN_page_cols2_contents_searchIcon">
	</div>
	
	
	<!-- total count -->
	<div style="width:100%;text-align: right;font-size:12px;height:35px;line-height: 35px">
		<div style="margin-right:60px;">총  <b style="font-size:16px;"><?=number_format($num) ?></b>건의 데이터가 검색되었습니다.</div>
	</div>
	

	<!-- 타이틀 -->
	<div class="boardN_page_cols2_contents" style="border-top:3px solid #f6ca5b;"> <!-- wrap -->
		<div class="rl_col1 align_floatLeft board_rightBorderT">
			<select class="search_category2">
				<option>거래</option>
				<option>매매</option>
				<option>전세</option>
				<option>월세</option>
			</select>
		</div>
		<div class="rl_col2 align_floatLeft board_rightBorderT" style="text-align:center;">
			<select class="search_category3">
				<option>종류</option>
				<option>아파트</option>
				<option>오피스텔</option>
				<option>분양권</option>
				<option>주택</option>
				<option>토지</option>
				<option>원룸</option>
				<option>상가</option>
				<option>사무실</option>
				<option>공장</option>
				<option>재개발</option>
				<option>건물</option>
			</select>
		</div>
		<div class="rl_col3 align_floatLeft board_rightBorderT">매물명</div>
		<div class="rl_col4 align_floatLeft board_rightBorderT">면적</div>
		<div class="rl_col5 align_floatLeft board_rightBorderT">층</div>
		<div class="rl_col6 align_floatLeft board_rightBorderT">매물가(만원)</div>
		<div class="rl_col7 align_floatLeft board_rightBorderT">연락처</div>
	</div>
	
	
	<!-- DB  -->
	<?php while($row=mysqli_fetch_array($result)){?>
	<div class="boardN_page_cols2_contents board_hover f12"  style="height:81px" onclick="
	 location.href='?page_content=realty_view&board_category=<?=$board_category?>&board_page=<?=$board_page?>&board_cateNo=<?=$board_cateNo?>&no=<?=$row['no']?>&page=<?=$page?>' "> <!-- wrap -->
		<div class="rl_col1 align_floatLeft board_rightBorder overF"><?=($row['fld18']=="") ? "-" : $row['fld18'] ?></div>
		<div class="rl_col2 align_floatLeft board_rightBorder overF" style="text-align:center;"><?=$row['k_value']?></div>
		<div class="rl_col3 align_floatLeft board_rightBorder overF" style="line-height:35px;"><font style="color: #bf77e5;"><?=$row['title']?></font> <br> <?=$row['feature']?> </div>
		<div class="rl_col4 align_floatLeft board_rightBorder overF"><?=$row['fld4']?></div>
		<div class="rl_col5 align_floatLeft board_rightBorder overF"><?=$row['fld6']?></div>
		<div class="rl_col6 align_floatLeft board_rightBorder overF3"> <div style="margin-top:10px"> <font style="color:#ff5353;font-weight: bold;font-size:15px;"><?=number_format($row['fld5'])?></font> <br> <?=$row['fld36']?> </div> </div>
		<div class="rl_col7 align_floatLeft overF3"> <div style="margin-top:10px"> <?=$row['fld37']?> </div></div>
	</div>
	<?php } ?>


	
	<?php if($num != 0 ){ ?>
	<!-- ************ 페이징처리 ************  -->
	<div class="boardN_page_cols2_contents_paging">
		<a class="paging" href="#" onclick="location.href='?page_content=realty_list&board_category=<?=$board_category?>&board_page=<?=$board_page?>&board_cateNo=<?=$board_cateNo?>&page=<?=$s_page-1?>&category=<?=$category?>&content=<?=$content?>&category2=<?=$category2?>&category3=<?=$category3?>' ">이전</a>

		
		<?
		for ($p=$s_page; $p<=$e_page; $p++) {
			if($p==$page){
		?>
			<font class="aActive"><?=$p?></font>
		<?
				}
			else{
		?>
			<a class="paging2" href="#" onclick="location.href='?page_content=realty_list&board_category=<?=$board_category?>&board_page=<?=$board_page?>&board_cateNo=<?=$board_cateNo?>&page=<?=$p?>&category=<?=$category?>&content=<?=$content?>&category2=<?=$category2?>&category3=<?=$category3?>' "><?=$p?></a>
		<?
			}}
		?>
	
	<?php if($blockNum>=2){?>
		<a class="paging" href="#" onclick="location.href='?page_content=realty_list&board_category=<?=$board_category?>&board_page=<?=$board_page?>&board_cateNo=<?=$board_cateNo?>&page=<?=$e_page+1?>&category=<?=$category?>&content=<?=$content?>&category2=<?=$category2?>&category3=<?=$category3?>' ">다음</a>
	<?php }?>
	</div>
	
	<?php } ?>
			
	<!-- 글쓰기 버튼 -->
	<div class="boardN_page_writeB">
		<input type="button" value="글쓰기" onclick="location.href='?page_content=realty_writeForm&board_page=<?=$_GET['board_page']?>&board_category=<?= $_GET['board_category']?>&board_cateNo=<?= $_GET['board_cateNo']?>'">
	</div>
	
	
	
	
	
<?php 
	mysqli_close($conn); // DB Close
?>
	