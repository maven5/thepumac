<!-- member_list (ml) -->

<?php 
	include 'dbconfig.php';
	
	$query = "select * from b_reserve where type='G'";
	
	$result = mysqli_query($conn,$query);
	$rowcount =  mysqli_num_rows($result);
	
	access_admit(array(0,1,3)); // 게스트하우스 담당자, 운영자 관리자만 접근가능하게
?>
		
<div class="ml_wrap">
	<!-- 타이틀  -->
	<div class="ml_title">[예약 관리]</div>
	
	<!-- 검색열 -->
	<div class="ml_search">
		<select> 
			<option>이름</option>
			<option>아이디</option>
		</select>
		
		<input type="text" > 
		<input type="button" value="검색">
	</div>
	
	<!-- 회원 수 열 -->
	<div class="ml_count">Total : <font style="font-weight: bold"><?=$rowcount?></font>명</div>
	
	<!-- 데이터 출력 열 -->
	<div class="ml_list">
		<!-- header  -->
		<div class="ml_list_header">
			<div class="ml_list_col1">번호</div>
			<div class="ml_list_col2">ID</div>
			<div class="ml_list_col3">성 함</div>
			<div class="ml_list_col4">신청일자</div>
			<div class="ml_list_col4">예약일자</div>
			<div class="ml_list_col4">예약시간</div>
			<div class="ml_list_col4">옵션</div>
			<div class="ml_list_col6">연락번호</div>
			<div class="ml_list_col4">예약분류</div>
		</div>
		
		<div style="text-overflow:ellipsis;overflow: hidden;font-size:12px;">
			<!-- DB  -->
			<?php 
				while($row=mysqli_fetch_array($result)){
			?>
				<div class="ml_list_col1"><?=$rowcount?></div>
				<div class="ml_list_col2"><?=$row['name']?></div>
				<div class="ml_list_col3"><?=$row['name']?></div>
				<div class="ml_list_col4"><?=$row['date_app']?></div>
				<div class="ml_list_col4"><?=$row['date_rev']?></div>
				<div class="ml_list_col4"><?=$row['time_start']?>-<?=$row['time_end']?></div>
				<div class="ml_list_col4"><?=$row['option']?></div>
				<div class="ml_list_col6"><?=$row['phone_num']?></div>
				<div class="ml_list_col4"><?=$row['type']?></div>
			<?php
			$rowcount--;
				}
			?>
		</div>
	</div><!-- ml_list end  -->
</div><!-- ml_wrap end  -->

<?php 
	mysqli_close($conn); // DB Close
?>