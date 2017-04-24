<?php 
	session_start();
?>

<html>

<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8"></head>

<script src="//code.jquery.com/jquery.min.js"></script>
<body>


<?php
	 $login_key = $_GET['login_key'];
	
	if($login_key=="1"){
		$_SESSION['m_id'] = 'admin'; // 임시 세션 아이디
		$_SESSION['m_name'] = '관리자'; // 임시 세션 이름
		$_SESSION['m_phone1'] = '010'; // 임시 연락처
		$_SESSION['m_phone2'] = '1234';
		$_SESSION['m_phone3'] = '4094';
		
		echo '<script>
				alert("임시 로그인 성공");
				location.href="/";
			</script>';
	} 
	
	if($login_key=="0"){
		session_destroy();
	
		echo '<script>
				alert("임시 로그아웃 성공");
				location.href="/";
			</script>';
	}


?>


</body>

</html>