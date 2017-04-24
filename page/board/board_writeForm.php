
<!-- 글쓰기폼  -->
<div class="bVote_title"> 글쓰기 </div>

<div class="boardWF_wrap">
	<form class="boardWriteForm" action="/action/board/board_write.php" method="post" enctype="multipart/form-data">
		<div class="boardWF_row1" style="line-height:20px;">작성자</div>
		
		<input type="hidden" value="<?=$_SESSION['m_id']?>" name="b_writer"> <!-- 작성자 hidden  -->
		<input type="hidden" value="<?=$_GET['board_category']?>" name="board_category"> <!-- 큰메뉴 hidden -->
		<input type="hidden" value="<?=$_GET['board_page']?>" name="board_page"> <!--작은메뉴 hidden -->
		<input type="hidden" value="<?=$_GET['board_cateNo']?>" name="board_cateNo"> <!--큰메뉴번호 hidden -->
		
		<div class="boardWF_row1" style="border-bottom: 0px solid;"> 
			<div class="boardWF_col1"> 게시판 </div>
			<div class="boardWF_col2"> <select style="color:#bdbdbd" disabled> <option><?=$_GET['board_page'] ?> </option></select> </div>
		</div>
		
		<div class="boardWF_row1" style="border-bottom: 0px solid;"> 
			<div class="boardWF_col1"> 카테고리 </div>
			<div class="boardWF_col2"> 
				<select name="b_type"> 
					<option> 선택 </option>  
					<?php if( $_SESSION['ma_index']==4  || $_SESSION['ma_index']==5) { ?>
					<option> 공지사항 </option>  
					<?php } ?>
					<option> 일반게시판 </option>
				</select> 
			</div>
		</div>
		
		<div class="boardWF_row1" style="border-bottom: 0px solid;"> 
			<div class="boardWF_col1"> 제목 </div>  
			<div class="boardWF_col2"><input type="text" placeholder="제목을 입력해주세요" name="b_subject"></div>
		</div>
		
		<div class="boardWF_row2"> 
			 <textarea name="b_content" id="b_content" rows="10" cols="100" style="width:726px; height:512px;"></textarea>
		</div>
		
		<?php if($_GET['board_page']=="입찰"){ ?>
		<div class="boardWF_row1" style="border-bottom: 0px solid;">
			<div class="boardWF_col1"> 첨부파일 </div>  
			<div class="boardWF_col2"><input type="file" name="b_files"></div>
		</div>
		<?php } ?>
		
		<div class="boardWF_row1" style="text-align: center;margin-bottom:20px;border-bottom: 0px solid;">
			<input type="button" class="boardWF_writeB" value="등록">
			<input type="button" class="boardWF_cancleB" onclick="history.back(-1) " value="취소">
		</div>
	</form>
</div>
			