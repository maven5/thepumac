<html>

<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8"></head>

<script src="//code.jquery.com/jquery.min.js"></script>
<body>

<?php
	$member_id= $_POST['member_id'];
	$member_pwd= $_POST['member_pwd'];
	$member_email=$_POST['member_email'];
	$member_apt= $_POST['member_apt'];
	$member_dong= $_POST['member_dong'];
	$member_hosu= $_POST['member_hosu'];
	$member_name= $_POST['member_name'];
	$member_nickname= $_POST['member_nickname'];
	
	$m_phone1= $_POST['m_phone1'];
	$m_phone2= $_POST['m_phone2'];
	$m_phone3= $_POST['m_phone3'];
	
	
	include '../../dbconfig.php';
	
	$query = "insert into member(
			m_id,
			m_pwd,
			m_email,
			m_apt,
			m_dong,
			m_hosu,
			m_name,
			m_nickName,
			m_date,
			m_phone1,
			m_phone2,
			m_phone3
			
		)
		 values(
			 '$member_id',
			'$member_pwd',
			'$member_email',
			'$member_apt',
			'$member_dong',
			'$member_hosu',
			'$member_name',
			'$member_nickname',
			NOW(),
			'$m_phone1',
			'$m_phone2',
			'$m_phone3')
	";
	
		
	mysqli_query($conn,$query);
	mysqli_close($conn);
	
	echo '<script>
				alert("회원가입 완료");
				location.href="/thepumac/";
			</script>';  
	
?>


</body>

</html>