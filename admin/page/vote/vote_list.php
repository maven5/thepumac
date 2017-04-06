<!-- member_list (ml) -->

<?php 
	include 'dbconfig.php';
	
	$query = "select * from vote_big order by v_idx desc"; 
	
	$result = mysqli_query($conn,$query);
	$rowcount =  mysqli_num_rows($result);
?>
		
<div class="ml_wrap">
	<!-- 타이틀  -->
	<div class="ml_title">[투표 관리]</div>
	
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
	<div class="ml_count">Total : <font style="font-weight: bold"><?=$rowcount?></font>건</div>
	
	<!-- 데이터 출력 열 -->
	<div class="ml_list">
		<!-- header  -->
		<div class="ml_list_header">
			<div class="ml_list_col1">번호</div>
			<div class="ml_list_col2">투표제목</div>
			<div class="ml_list_col3">시작 / 종료날짜</div>
			<div class="ml_list_col4">글쓴이</div>
			<div class="ml_list_col4">총 투표수</div>
			<div class="ml_list_col5">비 고</div>
		</div>
		
		<div style="text-overflow:ellipsis;overflow: hidden;font-size:12px;">
			<!-- DB  -->
			<?php 
				while($row=mysqli_fetch_array($result)){
			?>
					<div class="ml_list_col1"><?=$rowcount?></div>
					<div class="ml_list_col2 vote_view"><?=$row['v_subject']?></div>
					<div class="ml_list_col3"><?=$row['v_dateS']?> ~ <?=$row['v_dateE']?></div>
					<div class="ml_list_col4"><?=$row['v_writer']?></div>
					<div class="ml_list_col4"><?=$row['v_numberT']?></div>
					
					<div class="ml_list_col5">
						<input type="button" value="상세" class="vote_view">
						<input type="button" value="수정" class="vote_modify">
						<input type="button" value="삭제" class="vote_delete">
						<input type="hidden" value="<?=$row['v_idx']?>" class="vote_idx">
					</div>
					
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