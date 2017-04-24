
<!-- 관리비 등록폼  -->
<div class="main_wrap">
<div class="bVote_title"> 글쓰기 </div>

<div class="boardWF_wrap">
	<form class="boardWriteForm" action="/action/expense/expense_write.php" method="post" enctype="multipart/form-data">
		<div class="boardWF_row1" style="line-height:20px;">작성자</div>
		
		<input type="hidden" value="<?=$_SESSION['m_id']?>" name="e_writer"> <!-- 작성자 hidden  -->
		
		
		<div class="boardWF_row1" style="border-bottom: 0px solid;">
			<div class="boardWF_col1"> 첨부파일 </div>  
			<div class="boardWF_col2"><input type="file" name="e_files"></div>
		</div>
		
		<div class="boardWF_row1" style="text-align: center;margin-bottom:20px;border-bottom: 0px solid;">
			<input type="submit" class="boardWF_writeB" value="등록">
		</div>
	</form>
</div>
</div>
			