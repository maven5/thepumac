<!-- 푸마시 가맹점, 관리비조회 -->
<?php 
	include 'dbconfig.php';
	
	$m_dong = $_SESSION['m_dong'];
	$m_hosu = $_SESSION['m_hosu'];
	
	$query = "SELECT
				  CHARGE_THIS
				, CHARGE_MONTH
				, SUBSTRING(YEAR_MO, 1, 4) AS YEAR
				, SUBSTRING(YEAR_MO, 6, 2) AS MONTH
				, YEAR_MO
			  FROM B_EXPENSE
			  WHERE HO= '$m_hosu'
			  	AND dong='$m_dong'";

	$result = mysqli_query($conn,$query);
?>
		
<?php if($_GET['board_page']=="푸마시가맹점"){ ?>
	<img src="image/board/gameang.jpg" style="margin-left:50px;">
	
<?php } else if($_GET['board_page']=="관리비조회"){ ?>
	<?php $number = 1;?>
	
	<div style="width:100%:">
		
		<div class="boardN_adminList_row" style="margin-top:-5px;">
			<div class="boardN_adminList_col1">번호</div>
			<div class="boardN_adminList_col2">부과년월</div>
			<div class="boardN_adminList_col3">납부금액</div>
			<div class="boardN_adminList_col3">납기내금액</div>
			<div class="boardN_adminList_col3">납기후금액</div>
			<div class="boardN_adminList_col3" style="width:105px"> 상세보기</div>
		</div>
		
	<?php while($row=mysqli_fetch_array($result)) { ?>	
		<div class="boardN_adminList_row" style="margin-top:-5px;">
			<div class="boardN_adminList_col1"><?=$number?> </div>
			<div class="boardN_adminList_col2"><?=$row['YEAR']?>년 <?=$row['MONTH']?>월</div>
			<div class="boardN_adminList_col3"><?=$row['CHARGE_THIS']?></div>
			<div class="boardN_adminList_col3"><?=$row['CHARGE_THIS']?></div>
			<div class="boardN_adminList_col3"><?=$row['CHARGE_MONTH']?> </div>
			<div class="boardN_adminList_col3" style="width:105px">
			<a href="?page_content=board_manageE_view&board_category=내아파트&board_page=관리비조회&board_cateNo=06&year_mo=<?=$row['YEAR_MO']?>">상세보기</a> </div>
		</div>
		<?php $number++; ?>	
	<?php } 
	
		mysqli_close($conn);?>
	</div>
	
	
<?php } else if($_GET['board_page']=="아파트동호회"){ ?>
<div class="boardN_page_cols2_notice">
  [공지사항] 공지사항 샘플입니다.
</div>

<div style="height:400px;">
	<div class="boardN_page_cols2_contents">
		<div class="boardN_page_cols2_contents_bno align_floatLeft"></div>
		<div class="boardN_page_cols2_contents_subject align_floatLeft" style="text-align:left;">게시물이 없습니다.</div>
		<div class="boardN_page_cols2_contents_writer align_floatLeft">관리자</div>
		<div class="boardN_page_cols2_contents_date align_floatLeft">no</div>
		<div class="boardN_page_cols2_contents_hit align_floatLeft">no</div>
	</div>
</div>

<div class="boardN_page_cols2_contents_paging">
	<ul>
		<li style="border-right:0px solid;margin-left:0px;"> </li>
		<li style="color:#ff3000;border-right:0px solid;"> 1 </li>
		<li style="border-right:0px solid;"> > </li>
	</ul>
</div>

<div class="boardN_page_cols2_contents_search">
	<input type="text" class="test"> 
	<div class="boardN_page_cols2_contents_searchIcon">
		<img src="thepumac/image/board/search.png">
	</div>
</div>
<?php } else if($_GET['board_page']=="일정안내"){ ?>
	<img src="image/board/cal2.jpg"  style="margin-left:100px;">
<?php } ?>