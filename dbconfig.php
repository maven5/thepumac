<?php
	$db_host = "localhost"; // 호스트명
	$db_user = "beststay"; // 세션 ID
	$db_passwd ="21083505"; // PWD
	$db_name ="pumac"; // 스키마명
	
	
	$conn= mysqli_connect($db_host,$db_user,$db_passwd,$db_name);
	
	if(mysqli_connect_errno($conn))
	{
		echo "DB 연결 실패";
		exit;
	}
	
	mysqli_set_charset($conn, 'utf8'); // 한글처리
?>