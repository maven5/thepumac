<?php
	header("Content-Type:application/json");
	
	$dong = $_POST['DONG'];
	$ho = $_POST['HO'];
	$year = $_POST['YEAR'];
	$month = $_POST['MONTH'];
	$year_mo = $year."-".$month;
	
 	include '../../dbconfig.php';
	
	$query = 
		"SELECT
			  IDX
			, DONG
			, HO
			, SIL
			, USE_TYPE
			, RESIDENT
			, DATE_CHARGE
			, GENERAL
			, CLEANING
			, GUARD
			, MAINTENANCE
			, DISPOSAL
			, INSURANCE
			, ELECTION
			, POWER_USE
			, POWER_UNIT
			, POWER_COMM
			, ELEVATOR
			, TV
			, WATER
			, WATER_UNIT
			, WATER_COMM
			, CHARGE_THIS
			, PAYBACK
			, EXTRA
			, CHARGE_MONTH
			, PENALTY_EXC
			, YEAR_MO
		FROM B_EXPENSE
		WHERE DONG = '$dong' AND HO = '$ho' AND YEAR_MO = '$year_mo'";
	
	if($result = mysqli_query($conn, $query, MYSQLI_USE_RESULT)) {
		$expense = array();
		
		while($row = mysqli_fetch_object($result)) {
			$t = new stdClass();

			$t->IDX 		 = 	$row->IDX;
			$t->DONG 		 = 	$row->DONG;
			$t->HO 			 = 	$row->HO;
			$t->SIL 		 = 	$row->SIL;
			$t->USE_TYPE 	 = 	$row->USE_TYPE;
			$t->RESIDENT 	 = 	$row->RESIDENT;
			$t->DATE_CHARGE  = 	$row->DATE_CHARGE;
			$t->GENERAL 	 = 	$row->GENERAL;
			$t->CLEANING 	 = 	$row->CLEANING;
			$t->GUARD 		 = 	$row->GUARD;
			$t->MAINTENANCE  = 	$row->MAINTENANCE;
			$t->DISPOSAL 	 = 	$row->DISPOSAL;
			$t->INSURANCE 	 =	$row->INSURANCE;
			$t->ELECTION 	 = 	$row->ELECTION;
			$t->POWER_USE 	 = 	$row->POWER_USE;
			$t->POWER_UNIT 	 = 	$row->POWER_UNIT;
			$t->POWER_COMM 	 = 	$row->POWER_COMM;
			$t->ELEVATOR 	 = 	$row->ELEVATOR;
			$t->TV 			 = 	$row->TV;
			$t->WATER 		 = 	$row->WATER;
			$t->WATER_UNIT	 = 	$row->WATER_UNIT;
			$t->WATER_COMM   = 	$row->WATER_COMM;
			$t->CHARGE_THIS  = 	$row->CHARGE_THIS;
			$t->PAYBACK      = 	$row->PAYBACK;
			$t->EXTRA        = 	$row->EXTRA;
			$t->CHARGE_MONTH = 	$row->CHARGE_MONTH;
			$t->PENALTY_EXC  = 	$row->PENALTY_EXC;
			$t->YEAR_MO      = 	$row->YEAR_MO;
			
			$expense[] = $t;
			unset($t);
		}
	} else {
		$expense = array(0 => 'empty');
	}
			
	mysqli_close($conn);
	
	echo json_encode($expense);
?>