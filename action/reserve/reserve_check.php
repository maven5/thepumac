<?php
	/*
	 ** 예약현황 확인
	 **
	 */

	include '../../dbconfig.php';
	
	$option = $_POST['OPTION'];
	$type = $_POST['TYPE'];
	$date_rev = $_POST['DATE_REV'];
		
	if($type == "G") {
		$date_rev_array = explode(",", $date_rev);
		
		for($i=0; $i<count($date_rev_array); $i++) {
			$date_rev_array[$i] = "'".$date_rev_array[$i]."'";
		}
		
		$date_rev_string = preg_replace("/\s+/","",implode(",",$date_rev_array));
		
		$query = 
			"SELECT *
			 FROM B_RESERVE
			 WHERE `TYPE` = '$type'
				AND `OPTION` = '$option'
				AND DATE_REV IN ($date_rev_string)";
		//echo $query;
		$result = mysqli_query($conn, $query);
		
		 while($row=mysqli_fetch_array($result)) {
			$date = $row['date_rev'];
			echo $date.",";
		} 
		
	} else {		 			
		$query = "SELECT *
			      FROM B_RESERVE
				  WHERE `TYPE` = '$type' AND `OPTION` = '$option' AND DATE_REV = '$date_rev'
				  ORDER BY TIME_START";
		//echo $query;
		
		$result = mysqli_query($conn, $query);
			
		while($row=mysqli_fetch_array($result)) {
			$date = $row['time_start'];
			echo $date.",";
		}
	}
	
	mysqli_close($conn);
?>