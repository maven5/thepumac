<?php 
	session_start();
?>

<html>

<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8"></head>

<script src="//code.jquery.com/jquery.min.js"></script>
<body>

<?php
$m_id = $_POST['m_id'];
$m_pwd= $_POST['m_pwd'];

include '../../dbconfig.php';

$query = "select * from member
	where m_id='$m_id' and m_pwd='$m_pwd'";
	
	$result = mysqli_query($conn,$query);
	$rowCount =  mysqli_num_rows($result); // 맞으면 $rowCount>0
	while($row=mysqli_fetch_array($result)){
		$m_name = $row['m_name'];
		$m_id = $row['m_id'];
		$ma_index = $row['ma_index'];
		$m_phone1 = $row['m_phone1'];
		$m_phone2 = $row['m_phone2'];
		$m_phone3 = $row['m_phone3'];
		
		$m_dong = $row['m_dong'];
		$m_hosu = $row['m_hosu'];
	}
	
	
	
	if($rowCount!=0){ // 정보가 맞으면	
		$_SESSION['m_id'] = $m_id; 
		$_SESSION['m_name'] = $m_name;
		$_SESSION['ma_index'] = $ma_index;
		$_SESSION['m_phone1'] = $m_phone1;
		$_SESSION['m_phone2'] = $m_phone2;
		$_SESSION['m_phone3'] = $m_phone3;
		
		$_SESSION['m_dong'] = $m_dong;
		$_SESSION['m_hosu'] = $m_hosu;
		
		// 권한명 세션
		$query2 = "select * from member_authority where ma_index=".$ma_index;
		$result2 = mysqli_query($conn,$query2);
		while($row2=mysqli_fetch_array($result2)){
			$_SESSION['ma_name'] = $row2['ma_name'];
		}
		
		mysqli_close($conn);
		echo '<script>
				location.href="/pumac2/";
			</script>';
	}else{
		mysqli_close($conn);
		echo '<script>
				alert("아이디 혹은 비밀번호가 맞지 않습니다.");
				location.href="/pumac2/?page_content=member_loginForm";
			</script>';
		
	}


?>


</body>

</html>

