<!-- member_list (ml) -->

<?php 
	if($_SESSION['ma_index'] < 4){ // 운영자 미만 권한설정 불가
		echo '<script>
				alert("접근 권한이 없습니다.");
				location.href="/admin/";
			</script>';
	}
	
	include 'dbconfig.php';
	
	$query = "select * from member order by m_idx desc";
	
	$result = mysqli_query($conn,$query);
	$rowcount =  mysqli_num_rows($result);
?>
		
<div class="ml_wrap">
	<!-- 타이틀  -->
	<div class="ml_title">[회원 권한 관리]</div>
	
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
			<div class="ml_list_col4">닉 네 임</div>
			<div class="ml_list_col4">동/호수</div>
			<div class="ml_list_col4">가입날짜</div>
			<div class="ml_list_col5">권 한</div>
			<div class="ml_list_col6">비 고</div>
		</div>
		
		<div style="text-overflow:ellipsis;overflow: hidden;font-size:12px;">
			<!-- DB  -->
			<?php 
				while($row=mysqli_fetch_array($result)){
			?>
					<div class="ml_list_col1"><?=$rowcount?></div>
					<div class="ml_list_col2"><?=$row['m_id']?></div>
					<div class="ml_list_col3"><?=$row['m_name']?></div>
					<div class="ml_list_col4"><?=$row['m_nickName']?></div>
					<div class="ml_list_col4"><?=$row['m_dong']?>/<?=$row['m_hosu']?></div>
					<div class="ml_list_col4"><?=$row['m_date']?></div>
					<div class="ml_list_col5">
						<select>
							<?php 
								// 권한 테이블 가져오기
								$query2 = "select * from member_authority";
								$result2 = mysqli_query($conn,$query2);
								while($row2=mysqli_fetch_array($result2)){
							?>
							<option value="<?=$row2['ma_index']?>" <?php if($row2['ma_index']==$row['ma_index']){?> selected <?php } ?>><?=$row2['ma_name']?></option>
							<?php } ?>
						</select>
					</div>
					<div class="ml_list_col6">
						<input type="button" value="저장" class="auth_save">
						<input type="hidden" value="<?=$row['m_idx']?>">
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