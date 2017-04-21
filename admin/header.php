<div class="header_wrap">
	<div class="header_row1">
		<div class="header_row1_left"><a href="/thepumac/admin/">ADMINISTRATOR</a></div>
		<div class="header_row1_right">
			<a href="../" style="margin-right:5px;">메인</a>
			l
			<a class="logout" href="#" style="color:#ff3061;margin-right:50px;margin-left:5px;">로그아웃</a>
		</div>
	</div>
	
	<div class="header_row2">
		<div class="header_row2_menuL">Menu</div>
		<div class="header_row2_menuR">
			<!-- 관리자명  -->
			<div class="header_row2_menuR_col1">	<font style="font-weight: bold;"><?=$_SESSION['m_name']?></font>(<?=$_SERVER['REMOTE_ADDR']?>)님 </div>
			<!-- 아이피  -->
			<div class="header_row2_menuR_col2">
				 권한명 : 
				 <font style="font-weight: bold;"><?=$_SESSION['ma_name']?></font> 
			</div>
		</div>
	</div>
	
	<div style="clear:left;"></div>
</div>

		
<script>
 $(document).ready(function(){
	$('.logout').click(function(){
		if(confirm("로그아웃 하시겠습니까?")){
			location.href="/thepumac/action/member/member_logout.php";
		}
	});
}); 
</script>


