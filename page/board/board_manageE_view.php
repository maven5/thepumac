<?php 
	include 'dbconfig.php';
	
	$dong = $_SESSION['m_dong'];
	$ho = $_SESSION['m_hosu'];
	$year_mo = $_GET['year_mo'];  
	
	$query = "select * from b_expense where dong='$dong' and ho='$ho' and year_mo='$year_mo' "; 
	

	$result = mysqli_query($conn,$query);
	
	while($row=mysqli_fetch_array($result)){
			$use_type = $row['use_type'];
			$resident = $row['resident'];
			$date_charge = $row['date_charge'];
			$general = $row['general'];
			$cleaning = $row['cleaning'];
			$guard = $row['guard'];
			$maintenance = $row['maintenance'];
			$disposal = $row['disposal'];
			$insurance = $row['insurance'];
			$election = $row['election'];
			$power_use = $row['power_use'];
			$power_unit = $row['power_unit'];
			$power_comm = $row['power_comm'];
			$elevator = $row['elevator'];
			$tv = $row['tv'];
			$water = $row['water'];
			$water_unit = $row['water_unit'];
			$water_comm = $row['water_comm'];
			$charge_this = $row['charge_this'];
			$payback = $row['payback'];
			$extra = $row['extra'];
			$charge_month = $row['charge_month'];
			$penalty_exc = $row['penalty_exc'];
		}
		
	mysqli_close($conn);
?>

<div class="main_wrap">
	<div class="ml_title">[관리비 조회]</div>
	
	<div class="rv_row1">
		<div class="rv_row1_col1"><?=$dong?>동/<?=$ho?>호/<?=$year_mo?>월</div>
	</div>
	
	<!-- DB -->
	<div class="rv_row2">
	 	<div class="rv_row2_row1">
	 		<div class="rv_row2_row1_col1">용도</div>
	 		<input type="text" value="<?=$use_type?>" class="rv_row2_row1_col2" readonly="readonly"/>
	 		<div class="rv_row2_row1_col3">입주</div>
	 		<input type="text" id="resident" value="<?=$resident?>"class="rv_row2_row1_col4" readonly="readonly"/>
	 	</div>
	 	
	 	<div class="rv_row2_row1">
	 		<div class="rv_row2_row1_col1">부과기준일</div>
	 		<input type="text" id="date_charge" value="<?=$date_charge?>" class="rv_row2_row1_col2" readonly="readonly"/>
	 		<div class="rv_row2_row1_col3">일반관리비</div>
	 		<input type="text" id="general" value="<?=$general?>" class="rv_row2_row1_col4" readonly="readonly"/>
	 	</div>
	 	
	 	<div class="rv_row2_row1">
	 		<div class="rv_row2_row1_col1">청소비</div>
	 		<input type="text" id="cleaning" value="<?=$cleaning?>" class="rv_row2_row1_col2" readonly="readonly"/>
	 		<div class="rv_row2_row1_col3">경비비</div>
	 		<input type="text" id="guard"value="<?=$guard?>" class="rv_row2_row1_col4" readonly="readonly"/>
	 	</div>
	 	
	 	<div class="rv_row2_row1">
	 		<div class="rv_row2_row1_col1">수선유지비</div>
	 		<input type="text" id="maintenance"value="<?=$maintenance?>" class="rv_row2_row1_col2" readonly="readonly"/>
	 		<div class="rv_row2_row1_col3">생활폐기물수수료</div>
	 		<input type="text" id="disposal" value="<?=$disposal?>" class="rv_row2_row1_col4" readonly="readonly"/>
	 	</div>
	 	
	 	<div class="rv_row2_row1">
	 		<div class="rv_row2_row1_col1">보험료</div>
	 		<input type="text" id="insurance" value="<?=$insurance?>" class="rv_row2_row1_col2" readonly="readonly"/>
	 		<div class="rv_row2_row1_col3">선거관리위원회운영비</div>
	 		<input type="text" id="election" value="<?=$election?>" class="rv_row2_row1_col4" readonly="readonly"/>
	 	</div>
	 	
	 	 <div class="rv_row2_row1">
	 		<div class="rv_row2_row1_col1">전기사용량</div>
	 		<input type="text" id="power_use" value="<?=$power_use?>" class="rv_row2_row1_col2" readonly="readonly"/>
	 		<div class="rv_row2_row1_col3">세대전기료</div>
	 		<input type="text" id="power_unit" value="<?=$power_unit?>" class="rv_row2_row1_col4" readonly="readonly"/>
	 	</div>
	 	 	
	 	<div class="rv_row2_row1">
	 		<div class="rv_row2_row1_col1">공동전기료</div>
	 		<input type="text" id="power_comm" value="<?=$power_comm?>"class="rv_row2_row1_col2" readonly="readonly"/>
	 		<div class="rv_row2_row1_col3">승강기전기료</div>
	 		<input type="text" id="elevator" value="<?=$elevator?>" class="rv_row2_row1_col4" readonly="readonly"/>
	 	</div>
	 	
	 	<div class="rv_row2_row1">
	 		<div class="rv_row2_row1_col1">TV수신료</div>
	 		<input type="text" id="tv" value="<?=$tv?>" class="rv_row2_row1_col2" readonly="readonly"/>
	 		<div class="rv_row2_row1_col3">수도사용량</div>
	 		<input type="text" id="water" value="<?=$water?>" class="rv_row2_row1_col4" readonly="readonly"/>
	 	</div>
	 	
	 	<div class="rv_row2_row1">
	 		<div class="rv_row2_row1_col1">세대수도료</div>
	 		<input type="text" id="water_unit" value="<?=$water_unit?>" class="rv_row2_row1_col2" readonly="readonly"/>
	 		<div class="rv_row2_row1_col3">공동수도료</div>
	 		<input type="text" id="water_comm" value="<?=$water_comm?>" class="rv_row2_row1_col4" readonly="readonly"/>
	 	</div>
	 	
	 	<div class="rv_row2_row1">
	 		<div class="rv_row2_row1_col1">당월부과액</div>
	 		<input type="text" id="charge_this" value="<?=$charge_this?>" class="rv_row2_row1_col2" readonly="readonly"/>
	 		<div class="rv_row2_row1_col3">과오입금</div>
	 		<input type="text" id="payback" value="<?=$payback?>" class="rv_row2_row1_col4" readonly="readonly"/>
	 	</div>
	 	
	 	 <div class="rv_row2_row1">
	 		<div class="rv_row2_row1_col1">별도금액</div>
	 		<input type="text" id="extra" value="<?=$extra?>" class="rv_row2_row1_col2" readonly="readonly"/>
	 		<div class="rv_row2_row1_col3">당월관리비</div>
	 		<input type="text" id="charge_month" value="<?=$charge_month?>" class="rv_row2_row1_col4" readonly="readonly"/>
	 	</div>
	 	
	 	<div class="rv_row2_row1">
	 		<div class="rv_row2_row1_col1">연체료계산제외금액</div>
	 		<input type="text" id="penalty_exc" value="<?=$penalty_exc?>" class="rv_row2_row1_col2" readonly="readonly"/>
		</div>
	</div>

	<!-- 목록버튼  -->
	<div class="rv_btn"> <input type="button" value="목록" onclick="history.back(-1)"></div>
</div>
