<?php 
	include 'dbconfig.php';
	
	$board_category = $_GET['board_category']; // 큰 카테고리
	$board_page = $_GET['board_page']; // 작은 카테고리
	$board_cateNo = $_GET['board_cateNo']; // 작은 카테고리
	$no = $_GET['no'];
	
	$q ="select * from wc_content2 where no=$no";
	$result=mysqli_query($conn,$q);

?>

<!-- 이미지 슬라이드 -->
<div id="owl-demo" class="owl-carousel" style="width:870px;height:500px">
	<?php
		$q2 ="select * from wc_file where wa_bbs_phy_num=$no";
		$result2=mysqli_query($conn,$q2);
		while($row2=mysqli_fetch_array($result2)){
	?>
  <div><img src="<?=$row2['WF_FILE_PATH']?>"></div>
  <?php } ?>
</div>

<?php while($row=mysqli_fetch_array($result)){?>
<div class="rv_row1">
	<div class="rv_row1_col1"><?=$row['title']?></div>
	
	<div class="rv_row1_col2">
		<div class="rv_row1_col2_1">공급/전용면적<span class="txtUnit">단위</span></div>
		<div class="rv_row1_col2_2"><?php $mm =explode('㎡',$row['fld4']); echo $mm[0]?> <span class="txtM">m<sup>2</sup></span></div>
	</div>
	
	<div class="rv_row1_col3">
		<div class="rv_row1_col2_1">전세가</div>
		<div class="rv_row1_col2_2">
			<font style="color: #ff3232;"><?=($row['fld5']=="")?'없음':number_format($row['fld5']); ?></font>
			<span class="txtM">만원</span>
		</div>
	</div>
</div><!-- rv_row1  -->


<div class="rv_row2_row1">
	<div class="rv_row2_row1_col1" style="text-align: center;">주소</div>
	<div class="rv_row2_row1_col2" style="width:650px"><?=$row['fld39']?></div>
</div>

<!-- DB -->
<div class="rv_row2">
 	<div class="rv_row2_row1">
 		<div class="rv_row2_row1_col1">해당층/총층</div>
 		<div class="rv_row2_row1_col2"><?=$row['fld6']?></div>
 		<div class="rv_row2_row1_col3">방향</div>
 		<div class="rv_row2_row1_col4"><?=$row['fld15']?>향</div>
 	</div>
 	
 	<div class="rv_row2_row1">
 		<div class="rv_row2_row1_col1">방수/욕실수</div>
 		<div class="rv_row2_row1_col2"><?=$row['fld7']?></div>
 		<div class="rv_row2_row1_col3">현관구조</div>
 		<div class="rv_row2_row1_col4"></div>
 	</div>
 	
 	<div class="rv_row2_row1">
 		<div class="rv_row2_row1_col1">매매가</div>
 		<div class="rv_row2_row1_col2">만원</div>
 		<div class="rv_row2_row1_col3">융자금</div>
 		<div class="rv_row2_row1_col4">만원</div>
 	</div>
 	
 	<div class="rv_row2_row1">
 		<div class="rv_row2_row1_col1">월관리비</div>
 		<div class="rv_row2_row1_col2">만원</div>
 		<div class="rv_row2_row1_col3">대표자</div>
 		<div class="rv_row2_row1_col4"><?=($row['fld38']=="")?'없음':$row['fld38']; ?></div>
 	</div>
 	
 	<div class="rv_row2_row1">
 		<div class="rv_row2_row1_col1">문의처</div>
 		<div class="rv_row2_row1_col2"><?=($row['fld37']=="")?'없음':$row['fld37']; ?></div>
 	</div>
</div>


<!-- DB2 -->
<div class="rv_row3">
	<div class="rv_row3_title">특징</div>
	
	<div class="rv_row2_row1">
 		<div class="rv_row2_row1_col1">난료연료/방식</div>
 		<div class="rv_row2_row1_col2"><?=$row['fld43']?></div>
 		<div class="rv_row2_row1_col3">전용률</div>
 		<div class="rv_row2_row1_col4"><?=$row['fld26']?></div>
 	</div>
 	
 	<div class="rv_row2_row1">
 		<div class="rv_row2_row1_col1">주차대수</div>
 		<div class="rv_row2_row1_col2"><?=$row['fld42']?></div>
 		<div class="rv_row2_row1_col3">단지규모</div>
 		<div class="rv_row2_row1_col4">총<?=$row['fld40']?> <?=$row['fld41']?></div>
 	</div>
 	
 	<div class="rv_row2_row1">
 		<div class="rv_row2_row1_col1">건설회사</div>
 		<div class="rv_row2_row1_col2"><?=$row['fld46']?></div>
 		<div class="rv_row2_row1_col3">입주일</div>
 		<div class="rv_row2_row1_col4"><?=$row['fld47']?></div>
 	</div>
 	
 	<div class="rv_row2_row1">
 		<div class="rv_row2_row1_col1">엘레베이터</div>
 		<div class="rv_row2_row1_col2"></div>
 		<div class="rv_row2_row1_col3">옵션</div>
 		<div class="rv_row2_row1_col4"></div>
 	</div>
 	
 	<div class="rv_row2_row1">
 		<div class="rv_row2_row1_col1">반려동물</div>
 		<div class="rv_row2_row1_col2"></div>
 		<div class="rv_row2_row1_col3">기타</div>
 		<div class="rv_row2_row1_col4"></div>
 	</div>
 	
 	<div class="rv_row2_row1" style="height:250px;">
 		<div class="rv_row2_row1_col1" >상세설명</div>
 		<div class="rv_row2_row1_col5"><?=$row['cont']?> </div>
 	</div>
</div>


<!-- DB3 -->
<div class="rv_row4">
	<div class="rv_row4_row1">
 		<div class="rv_row4_row1_col1">교통정보</div>
 		<div class="rv_row4_row1_col2">
 			<div class="rv_row4_row1_col2_row1"><span class="txtClrViolet">지하철</span> <?=$row['fld49']?></div>
 			<div class="rv_row4_row1_col2_row1"><span class="txtClrViolet">버스</span> <?=$row['fld54']?></div>
 		</div>
 	</div>
</div>

<?php } ?>


 
 <script>
 $(document).ready(function() {
	  $("#owl-demo").owlCarousel({
	    autoPlay : 3000,
	    stopOnHover : true,
	    navigation:true,
	    paginationSpeed : 1000,
	    goToFirstSpeed : 2000,
	    singleItem : true
	  });
	});
 </script>


<!-- 목록버튼  -->
<div class="rv_btn"> <input type="button" value="목록" onclick="history.back(-1)"> </div>

