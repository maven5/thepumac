<style type="text/css">
#button1 {
	height: 50px;
	width: 210px;
	background-color: #FFFFFF;
	left: 640px;
	top: 500px;
	position: absolute;
	border: 1px solid #969696;
	cursor: pointer;
}

#button1-1 {
	text-align: center;
	left: 713px;
	top: 516px;
	position: absolute;
	font-family: "나눔고딕";
	color: #717171;
	font-weight: bold;
	cursor: pointer;
}

#button2 {
	height: 70px;
	width: 105px;
	background-color: #b3b3b3;
	left: 765px;
	top: 290px;
	position: absolute;
	cursor: pointer;
}

#button2-1 {
	text-align: center;
	left: 797px;
	top: 317px;
	position: absolute;
	font-family: "나눔고딕";
	color: #FFF;
	font-weight: bold;
	font-size: 15px;
	cursor: pointer;
}

#box1 {
	position: absolute;
	left: 132px;
	top: 193px;
	width: 765px;
	height: 407px;
	z-index: 0;
	border: 1px solid #dddddd;
	border-top: 1px solid #333;
}

#box2 {
	position: absolute;
	left: 132px;
	top: 193px;
	width: 277px;
	height: 255px;
	border: 1px solid #dddddd;
	border-top: 1px solid #333;
}

#box3 {
	position: absolute;
	left: 134px;
	top: 454px;
	width: 765px;
	height: 151px;
	background-color: #f4f4f4;
}

#img1 {
	height: 80px;
	width: 80px;
	left: 230px;
	top: 254px;
	position: absolute;
}

.id {
	position: absolute;
	left: 530px;
	top: 290px;
	z-index: 30;
	width: 210px;
	height: 30px;
	padding-left: 5px;
}

.password1 {
	position: absolute;
	left: 530px;
	top: 330px;
	z-index: 30;
	width: 210px;
	height: 30px;
	padding-left: 5px;
}

#content1 {
	position: absolute;
	left: 445px;
	top: 296px;
	width: 120px;
	height: 17px;
	z-index: 32;
	font-family: 'jeju Gothic', sans-serif;
}

#content2 {
	position: absolute;
	left: 445px;
	top: 336px;
	width: 120px;
	height: 17px;
	z-index: 32;
	font-family: 'jeju Gothic', sans-serif;
}

#content3 {
	position: absolute;
	left: 180px;
	top: 494px;
	width: 450px;
	height: 17px;
	z-index: 32;
	font-family: 'jeju Gothic', sans-serif;
	font-size: 23px;
}

#content4 {
	position: absolute;
	left: 180px;
	top: 534px;
	width: 450px;
	height: 17px;
	z-index: 32;
	font-family: 'jeju Gothic', sans-serif;
	font-size: 15px;
}

#content5 {
	position: absolute;
	left: 234px;
	top: 345px;
	width: 200px;
	height: 17px;
	z-index: 32;
	font-family: 'jeju Gothic', sans-serif;
	font-size: 25px;
}

#content6 {
	position: absolute;
	left: 168px;
	top: 380px;
	width: 230px;
	height: 17px;
	z-index: 32;
	font-family: 'jeju Gothic', sans-serif;
	font-size: 15px;
}
</style>

<div style="position: relative; height: 550px; top: -100px">
	<!------------------contant---------------->
	<div id="box1"></div>
	<div id="box2"></div>
	<div id="box3"></div>

	<div id="img1">
		<img src="image/member/login/login_img.jpg" width="80" height="80">
	</div>



	<p>

		<!---------------내용---------------------->
	
	
	<form class="boardWriteForm" action="action/member/member_login.php"
		method="post">
		<input type="text" size="10" maxlength="15" class="id" name="m_id" />
		<input type="password" size="20" maxlength="20" class="password1"
			name="m_pwd" />
	</form>

	<div id="content1">
		<span style="font-weight: bold; font-size: 14px;">아이디</span>
	</div>
	<div id="content2">
		<span style="font-weight: bold; font-size: 14px;">비밀번호</span>
	</div>


	<div id="content3">
		<font color="#444444">아직 <b> 파주 품앗이</b> 회원이 아니신가요?
		</font>
	</div>
	<div id="content4">
		<font color="#444444">회원가입을 하시면 다양한 입주정보를 확인하실 수 있습니다.</font>
	</div>


	<div id="content5">
		<font color="#6d6d6d"><b>로그인</b></font>
	</div>
	<div id="content6">
		<font color="#444444">품앗이에 오신 것을 환영합니다.</font>
	</div>


	<!--------------버튼------------->
	<div id="button1"
		onclick="location.href='?page_content=member_clause' "></div>

	<div id="button1-1"
		onclick="location.href='?page_content=member_clause' ">회원가입</div>

	<div id="button2"></div>

	<div id="button2-1">로그인</div>

</div>

<script>
$(document).ready(function(){
	$('#button2').click(function(){
		$('.boardWriteForm').submit();
	});
	$('#button2-1').click(function(){
		$('.boardWriteForm').submit();
	});
		
	$(".password1").keypress(function(e) { // 엔터검색
	    if (e.keyCode == 13){
	    	$('.boardWriteForm').submit();
	    }    
	});

	$("input[name=m_id]").keypress(function(e) { // 엔터검색
	    if (e.keyCode == 13){
	    	$('.boardWriteForm').submit();
	    }    
	});
});
</script>