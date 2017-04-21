<!--
	 *
 	 ** 
 	 *** 투표 수정하기
 	 **
 	 *
 -->
 
<?php 
	include 'dbconfig.php';
	
	$v_idx= $_GET['v_idx'];
	
	$query = "select * from vote_big where v_idx=".$v_idx; 
	
	$result = mysqli_query($conn,$query);
	
	while($row=mysqli_fetch_array($result)){
		$v_subject = $row['v_subject'];
		$v_content = $row['v_content'];
		$v_dateS = $row['v_dateS'];
		$v_dateE = $row['v_dateE'];
	}
?>

<div class="bVote_wrap">
	<div class="bVote_title">1. 기본내용</div>
	
	<form class="boardWriteForm" action="/thepumac/action/vote/vote_modify.php" method="post">
	
		<div class="boardWF_wrap">
				<div class="boardWF_row1" style="line-height:20px;">작성자</div>
				
				<input type="hidden" value="<?=$_SESSION['m_id']?>" name="b_writer"> <!-- 작성자 hidden  -->
				<input type="hidden" value="<?=$_GET['board_category']?>" name="board_category"> <!-- 큰메뉴 hidden -->
				<input type="hidden" value="<?=$_GET['board_page']?>" name="board_page"> <!--작은메뉴 hidden -->
				<input type="hidden" value="<?=$_GET['board_cateNo']?>" name="board_cateNo"> <!--큰메뉴번호 hidden -->
				
				<div class="boardWF_row1" style="border-bottom: 0px solid;"> 
					<div class="boardWF_col1"> 게시판 </div>
					<div class="boardWF_col2"> <select disabled> <option>전자투표</option></select> </div>
				</div>
				
				<div class="boardWF_row1" style="border-bottom: 0px solid;"> 
					<div class="boardWF_col1"> 카테고리 </div>
					<div class="boardWF_col2"> <select name="b_type" disabled > <option> 투표 </option> </select> </div>
				</div>
				
				<div class="boardWF_row1" style="border-bottom: 0px solid;"> 
					<div class="boardWF_col1"> 제목 </div>  
					<div class="boardWF_col2"><input type="text" placeholder="제목을 입력해주세요" name="v_subject" value="<?=$v_subject?>"></div>
				</div>
				
				<div class="boardWF_row1" style="border-bottom: 0px solid;"> 
					<div class="boardWF_col1"> 시작날짜 </div>  
					<div class="boardWF_col2"><input type="text" name="v_dateS" value="<?=$v_dateS?>" disabled> </div>
					
					<div class="boardWF_col1"> ~ 종료날짜 </div>  
					<div class="boardWF_col2"><input type="text" id="v_dateE" name="v_dateE" value="<?=$v_dateE?>" disabled> </div>
					<div class="boardWF_col3"> </div>
				</div>
				
				<div class="boardWF_row2"> 
					 <textarea name="v_content" id="v_content" rows="10" cols="100" style="width:726px; height:212px;"><?=$v_content?></textarea>
				</div>
		</div><!--  boardWF_wrap end -->
	
	
	<div style="font-size:12px;margin-top:20px;font-weight: bold;">* 세부내용은 별도의 버튼을 이용하여 수정,삭제를 해주세요.</div>
	<div class="bVote_title" style="margin-top:20px">2. 세부내용</div>
	
	<div class="boardWF_wrap">
		<div class="bVote_list">
		
			<?php 
				$query = "select * from vote_small where v_idx=".$v_idx." order by v2_idx asc";
				$result = mysqli_query($conn,$query);
				
				while($row=mysqli_fetch_array($result)){
			?>
			
			<!-- 항목 -->
			<div class="bVote_rows">
				<div class="bVote_cols1"> 투표항목 </div>
				<div class="bVote_cols2"><input type="text" name="v2_subject[]" placeholder="ex) 버스정류장 확대" value="<?=$row['v2_subject']?>"></div>
				<div class="bVote_cols3 itemSave">저장</div>
				<div class="bVote_cols3 itemDelete" style="background: #8C8C8C;">삭제</div>
				<input type="hidden" name="v2_subChk" value="0">
				<input type="hidden" name="v2_idx" value="<?=$row['v2_idx']?>">
			</div>
			
			<?php 
				}
			?>
			
			<input type="hidden" value="<?=$v_idx?>" id="v_idx" name="v_idx"><!--v_idx Hidden  -->
		</div>
		
		<div class="bVote_makeB"><!-- 안건 만들기 -->
			<input type="button" class="bVote_makeButton" value="투표항목 만들기 + ">
		</div>
	</div><!-- boardWF_wrap End  -->
	
	 <div class="boardWF_row1" style="text-align: center;margin-bottom:20px;margin-top:30px;border-bottom: 0px solid;">
		<input type="button" class="boardWF_writeB" value="수정">
		<input type="button" class="boardWF_cancleB" onclick="history.back(-1) " value="취소">
	 </div>			
	</form>
	
	
</div><!-- bVote_wrap end -->
			
<?php 
	mysqli_close($conn); // DB Close
?>