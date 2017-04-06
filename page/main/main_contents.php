<div class="top_wrap">
<!-- 이미지슬라이드  -->
		<div class="mc_slider" style="margin:0; width:700px;">
	   	  <li ><img src="page/main/img/mainslide5.jpg"/></li>
		  <li ><img src="page/main/img/mainslide1.jpg"onclick="location.href='?page_content=board_normal&board_category=시민공간&board_page=재능나눔&board_cateNo=01' "></li>
		  <li ><img src="page/main/img/mainslide2.jpg"/></li>
	   	  <li ><img src="page/main/img/mainslide3.jpg"/></li>
		</div>
		
		<script>
		$(document).ready(function(){
		  $('.mc_slider').bxSlider({
			  mode: 'fade',
			  auto: true,
			  speed: 500, 
			  slideWidth: 780,
			  moveSlides: 1
			  });
		});
		</script>


<!-- 마이페이지 로그인시 -->
<?php 
	// 로그인 중일때
	if(isset($_SESSION['m_id'])){

			include 'dbconfig.php';
		
			$m_apt   = $_SESSION['m_apt'];
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
	
		<div class="mc_mypage"> 
			<div class="mc_mypage_title">마이페이지</div>
				<div class="mc_mypage_contents">
					
					
				<div class="rv_row1">
					<div class="rv_row1_col1">나의 관리비</div>
					<div class="rv_row1_col2"><!-- 파주수자인 리버팰리스 --> 부영아파트 <?=$m_dong?>동/<?=$m_hosu?>호
				</div>
				
				<!-- DB -->
				<div class="rv_row2">
					<?php while($row=mysqli_fetch_array($result)) { ?>	
				
				 	<div class="rv_row2_row1">
				 		<div class="rv_row2_row1_col1">부과년월</div>
				 		<input type="text" id="date_charge" value="<?=$row['YEAR_MO']?>" class="rv_row2_row1_col2" readonly="readonly"/>
				 		<div class="rv_row2_row1_col3">
				 		<a href="?page_content=board_manageE_view&board_category=내아파트&board_page=관리비조회&board_cateNo=06&year_mo=<?=$row['YEAR_MO']?>">상세보기</a></div>
				 	<div class="rv_row2_row1_col4"></div></div>
				 	
				 	<div class="rv_row2_row1">
				 		<div class="rv_row2_row1_col1">납기내금액</div>
				 		<input type="text" id="cleaning" value="<?=$row['CHARGE_THIS']?>" class="rv_row2_row1_col2" readonly="readonly"/>
				 		<div class="rv_row2_row1_col3">납기후금액</div>
				 		<input type="text" id="guard"value="<?=$row['CHARGE_MONTH']?>" class="rv_row2_row1_col4" readonly="readonly"/>
				 	</div>
					
					<?php $number++; ?>	
					<?php } 
					
					mysqli_close($conn);?>
				</div>
				
				
				</div>
				</div>
			</div>
		
		<p style="clear:both;"></p>

	<?php 
		}else{
	?>

		<!-- 마이페이지  -->
		<div class="mc_mypage"> 
			<div class="mc_mypage_title">마이페이지</div>
			<div class="mc_mypage_contents">
				<div class="mc_mypage_login" onclick="location.href='?page_content=member_loginForm' " style="margin-top: 70px;">로그인</div>
				
				<div class="mc_mypage_sub">
					<a href="?page_content=member_findForm">아이디 찾기</a> l
					<a href="?page_content=member_findForm">비밀번호 찾기</a> l
					<a href="?page_content=member_clause">회원가입</a> 
				</div>
				
				<div class="mc_mypage_msg">
					부영푸마시 가입하고,<br>
					내 아파트 정보를 이 곳에서 <br>
					편리하게 확인하세요.
				</div>
			</div>
		</div>
		
		<p style="clear:both;"></p>
	<?php 
		}
	?>
</div>
<!-- 카테고리(모바일용) -->
<div class="mc_category2">

	<div class="mc_category2_row"><!-- 1 row -->
		<div class="mc_category_cols">
			<p class="align_center" onclick="location.href='?page_content=board_reserve&board_category=주치의 예약&board_page=주치의 예약&board_cateNo=06' ">
				<img class="mc_img"  class="mc_img" src="image/main_contents/icon1.png">
				<br>주치의 예약
			</p>
		</div>
		
		<div class="mc_category_cols">
			<p class="align_center" onclick="location.href='?page_content=board_reserve&board_category=게스트하우스&board_page=게스트하우스&board_cateNo=06' ">
				<img class="mc_img"  class="mc_img" src="image/main_contents/icon2.png">
				<br>게스트하우스
			</p>
		</div>
		
		<div class="mc_category_cols">
			<p class="align_center" onclick="location.href='?page_content=board_reserve&board_category=아기돌봄예약&board_page=아기돌봄예약&board_cateNo=06' ">
				<img class="mc_img"  class="mc_img"  src="image/main_contents/icon3.png">
				<br>아기돌봄예약
			</p>
		</div>
		
		<div class="mc_category_cols">
			<p class="align_center" onclick="location.href='?page_content=board_normal2&board_category=푸마시가맹점&board_page=푸마시가맹점&board_cateNo=01' ">
				<img class="mc_img"  class="mc_img" src="image/main_contents/icon4.png">
				<br>푸마시가맹점
			</p>
		</div>
		
		<div class="mc_category_cols">
			<p class="align_center" onclick="location.href='?page_content=board_manageE&board_category=내아파트&board_page=관리비조회&board_cateNo=06' ">
				<img class="mc_img"  src="image/main_contents/icon5.png">
				<br>관리비조회
			</p>
		</div>
	</div>
	
	<div class="mc_category2_row"><!-- 2 row -->
		<div class="mc_category_cols">
			<p class="align_center" onclick="location.href='?page_content=board_voteList&board_category=시민공간&board_page=전자투표&board_cateNo=01' ">
				<img class="mc_img"  src="image/main_contents/icon11.png">
				<br>전자투표
			</p>
		</div>
		
		<div class="mc_category_cols">
			<form method="post" target="_blank" action='http://sujain.libworks.co.kr/member_sso.asp' id="form1">
				<input type="hidden" name="user_id" value="<?= $_SESSION['m_id']?>"/>
				<input type="hidden" name="user_pw" value="<?= $_SESSION['m_pwd']?>"/>
				<input type="hidden" name="user_nm" value="<?= $_SESSION['m_name']?>"/>
					<p class="align_center">
						<a onclick="document.getElementById('form1').submit(); return false;"><img class="mc_img"  src="image/main_contents/icon8.png">
							<br>전자도서관
						</a>
					</p>
			</form>	
		</div>
		
		<div class="mc_category_cols">
			<p class="align_center" onclick="alert('로그인이 필요한 서비스입니다.')">
				<img class="mc_img"  src="image/main_contents/icon9.png">
				<br>나의정보
			</p>
		</div>
		
		<div class="mc_category_cols">
			<p class="align_center" onclick="window.open('https://play.google.com/store/apps/details?id=com.hdtel.smarthome')">
				<img class="mc_img"  src="image/main_contents/icon10.png">
				<br>스마트제어<br>서비스
			</p>
		</div>
		
		<div class="mc_category_cols">
			<p class="align_center" onclick="location.href='?page_content=realty_list&board_category=부동산&board_page=매물&board_cateNo=07'">
				<img class="mc_img"  src="image/main_contents/icon12.png">
				<br>부동산
			</p>
		</div>
	</div>
</div>


<div class="mc_category">
	<div class="mc_category_cols">
		<p class="align_center" onclick="location.href='?page_content=board_reserve&board_category=주치의 예약&board_page=주치의 예약&board_cateNo=06' ">
			<img class="mc_img"  class="mc_img" src="image/main_contents/icon1.png">
			<br>주치의 예약
		</p>
	</div>
	
	<div class="mc_category_cols">
		<p class="align_center" onclick="location.href='?page_content=board_reserve&board_category=게스트하우스&board_page=게스트하우스&board_cateNo=06' ">
			<img class="mc_img"  class="mc_img" src="image/main_contents/icon2.png">
			<br>게스트하우스
		</p>
	</div>
	
	<div class="mc_category_cols">
		<p class="align_center" onclick="location.href='?page_content=board_reserve&board_category=아기돌봄예약&board_page=아기돌봄예약&board_cateNo=06' ">
			<img class="mc_img"  class="mc_img"  src="image/main_contents/icon3.png">
			<br>아기돌봄예약
		</p>
	</div>
	
	<div class="mc_category_cols">
		<p class="align_center" onclick="location.href='?page_content=board_normal2&board_category=푸마시가맹점&board_page=푸마시가맹점&board_cateNo=01' ">
			<img class="mc_img"  class="mc_img" src="image/main_contents/icon4.png">
			<br>푸마시가맹점
		</p>
	</div>
	
	<div class="mc_category_cols">
		<p class="align_center" onclick="location.href='?page_content=board_manageE&board_category=내아파트&board_page=관리비조회&board_cateNo=06' ">
			<img class="mc_img"  src="image/main_contents/icon5.png">
			<br>관리비조회
		</p>
	</div>
	
	
	<div class="mc_category_cols">
		<p class="align_center" onclick="location.href='?page_content=board_voteList&board_category=시민공간&board_page=전자투표&board_cateNo=01' ">
			<img class="mc_img"  src="image/main_contents/icon11.png">
			<br>전자투표
		</p>
	</div>
	
	<div class="mc_category_cols">
		<p class="align_center" onclick="window.open('http://sujain.libworks.co.kr/')">
			<img class="mc_img"  src="image/main_contents/icon8.png">
			<br>전자도서관
		</p>
	</div>
	
	<div class="mc_category_cols">
		<p class="align_center" onclick="alert('로그인이 필요한 서비스입니다.')">
			<img class="mc_img"  src="image/main_contents/icon9.png">
			<br>나의정보
		</p>
	</div>
	
	<div class="mc_category_cols">
		<p class="align_center" onclick="window.open('https://play.google.com/store/apps/details?id=com.hdtel.smarthome')">
			<img class="mc_img"  src="image/main_contents/icon10.png">
			<br>스마트제어서비스
		</p>
	</div>
	
	<div class="mc_category_cols">
		<p class="align_center" onclick="location.href='?page_content=realty_list&board_category=부동산&board_page=매물&board_cateNo=07'">
			<img class="mc_img"  src="image/main_contents/icon12.png">
			<br>부동산
		</p>
	</div>
</div>




<!-- 팝업창1 -->
<div class="popup1">
	<div class="popup1_img"  onclick="window.open('http://sujain.libworks.co.kr/')"></div>
	<div class="popup1_close"> <span class="popup1_closeB">close x</span></div>
</div>

<!-- 팝업창2 -->
<div class="popup2">
	<div class="popup2_img" onclick="location.href='?page_content=board_reserve&board_category=아기돌봄예약&board_page=아기돌봄예약&board_cateNo=06' "></div>
	<div class="popup1_close"> <span class="popup2_closeB">close x</span></div>
</div>

<script type="text/javascript">
 $( document ).ready( function () {
	 $(window).scroll(function() {  
		 $('.popup1').animate({top:($(window).scrollTop()+300)+"px" },{queue: false, duration: 600});    
		 $('.popup2').animate({top:($(window).scrollTop()+600)+"px" },{queue: false, duration: 600});    
	 });

	 $('.popup1_closeB').click(function(){
		 	$('.popup1').hide();
	 });

	 $('.popup2_closeB').click(function(){
		 	$('.popup2').hide();
	 });
 } );
</script>

<!-- 푸마시 게시판 -->
<?php include 'page/main/board.php';?>
