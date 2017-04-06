<html>

<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8"></head>

<body>
<?php
	/*
	 ** 예약현황 등록
	 **
	 */

	include '../../dbconfig.php';
	
	$reserve_type = $_POST['type'];
	$reserve_option = $_POST['option'];
	$reserve_booking = $_POST['booking'];
	$reserve_today = $_POST['today'];
	$reserve_startTime = $_POST['startTime'];
	$reserve_endTime = $_POST['endTime'];
	$reserve_phoneNum1 = $_POST['phoneNum1'];
	$reserve_phoneNum2 = $_POST['phoneNum2'];
	$reserve_phoneNum3 = $_POST['phoneNum3'];
	$reserve_name = $_POST['name'];
	$reserve_phoneNum = $reserve_phoneNum1."-".$reserve_phoneNum2."-".$reserve_phoneNum3;
	
	$query = "INSERT INTO B_RESERVE(
				  NAME
				, DATE_APP
				, DATE_REV
				, TIME_START
				, TIME_END
				, `OPTION`
				, PHONE_NUM
				, TYPE
			) VALUES(
				  '$reserve_name'
				, '$reserve_today'
				, '$reserve_booking'
				, '$reserve_startTime'
				, '$reserve_endTime'
				, '$reserve_option'
				, '$reserve_phoneNum'
				, '$reserve_type'
			)";
	
	mysqli_query($conn, $query);
	mysqli_close($conn);
	
 	echo '<script>
				alert("예약이 완료됐습니다.");
				location.href="/pumac2/";
		  </script>';
?>

</body>
</html>
