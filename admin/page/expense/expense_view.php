<?php 
	include 'dbconfig.php';
	
	$query = "SELECT DISTINCT SUBSTRING(YEAR_MO, 1, 4) AS YEAR
			  FROM B_EXPENSE";
	
	$result = mysqli_query($conn,$query);
	mysqli_close($conn);
?>

<script type="text/javascript">
	function expense_search() {
		var dong = $("#dong option:selected").val();
		var ho = $("#ho option:selected").val();
		var year = $("#year option:selected").val();
		var month = $("#month option:selected").val();

		if(dong == "" || ho == "" || year == "" || month == "") {
			alert("검색 조건을 다시 확인해 주세요.");
			return;
		}

		var url = "/action/expense/expense_read.php";
		var param = {
			DONG : dong,
			HO : ho,
			YEAR : year,
			MONTH : month
		};
		
		$.post(url, param, function(data) {
			if(data == "") {
				alert("검색 결과가 없습니다.");
				return;
			} else {
				$("#use_type").val(data[0]["USE_TYPE"]);
				$("#resident").val(data[0]["RESIDENT"]);
				$("#date_charge").val(data[0]["DATE_CHARGE"]);
				$("#general").val(data[0]["GENERAL"]);
				$("#cleaning").val(data[0]["CLEANING"]);
				$("#guard").val(data[0]["GUARD"]);
				$("#maintenance").val(data[0]["MAINTENANCE"]);
				$("#disposal").val(data[0]["DISPOSAL"]);
				$("#insurance").val(data[0]["INSURANCE"]);
				$("#election").val(data[0]["ELECTION"]);
				$("#power_use").val(data[0]["POWER_USE"]);
				$("#power_unit").val(data[0]["POWER_UNIT"]);
				$("#power_comm").val(data[0]["POWER_COMM"]);
				$("#elevator").val(data[0]["ELEVATOR"]);
				$("#tv").val(data[0]["TV"]);
				$("#water").val(data[0]["WATER"]);
				$("#water_unit").val(data[0]["WATER_UNIT"]);
				$("#water_comm").val(data[0]["WATER_COMM"]);
				$("#charge_this").val(data[0]["CHARGE_THIS"]);
				$("#payback").val(data[0]["PAYBACK"]);
				$("#extra").val(data[0]["EXTRA"]);
				$("#charge_month").val(data[0]["CHARGE_MONTH"]);
				$("#penalty_exc").val(data[0]["PENALTY_EXC"]);
			}
		});
	}
</script>

<div class="main_wrap">
	<!-- 타이틀  -->
	<div class="ml_title">[관리비 조회]</div>
	
	<!-- 검색열 -->
	<div id="ml_search" class="ml_search">
		<select id="dong" name="dong" style="width:80px; height:40px;font-size:18px;"> 
		<?php for($i=101; $i<=114; $i++) { ?>
			<option value="<?=$i?>"><?=$i?></option>
		<?php } ?>
		</select>동
		
		<select id="ho" name="ho" style="width:80px; height:40px;font-size:18px;"> 
		<?php
			$ho = 100;
			
			for($i=1; $i<111; $i++) {
				$ho++;
		?>
			<option value="<?=$ho?>"><?=$ho?></option>
			<?php	
				if($i % 5 == 0) {
					$ho += 95;
				}
		} ?>
		</select>호
		
		<select id="year" name="year" style="width:80px; height:40px;font-size:18px;"> 
		<?php while($row=mysqli_fetch_array($result)) { ?>
			<option value="<?=$row['YEAR']?>"><?=$row['YEAR']?></option>	
		<?php } ?>
		</select>년
		
		<select id="month" name="month" style="width:80px; height:40px; font-size:18px;"> 
			<option value="01">01</option>
			<option value="02">02</option>
			<option value="03">03</option>
			<option value="04">04</option>
			<option value="05">05</option>
			<option value="06">06</option>
			<option value="07">07</option>
			<option value="08">08</option>
			<option value="09">09</option>
			<option value="10">10</option>
			<option value="11">11</option>
			<option value="12">12</option>
		</select>월
		
		<input type="button" value="검색" onclick="expense_search();"/>
	</div>
	
	
	<!-- DB -->
	<div class="rv_row2">
	 	<div class="rv_row2_row1">
	 		<div class="rv_row2_row1_col1">용도</div>
	 		<input type="text" id="use_type" name="use_type" class="rv_row2_row1_col2" readonly="readonly" style="border: 0px;" />
	 		<div class="rv_row2_row1_col3">입주</div>
	 		<input type="text" id="resident" name="resident" class="rv_row2_row1_col4" readonly="readonly" style="border: 0px;"/>
	 	</div>
	 	
	 	<div class="rv_row2_row1">
	 		<div class="rv_row2_row1_col1">부과기준일</div>
	 		<input type="text" id="date_charge" name="date_charge" class="rv_row2_row1_col2" readonly="readonly" style="border: 0px;"/>
	 		<div class="rv_row2_row1_col3">일반관리비</div>
	 		<input type="text" id="general" name="general" class="rv_row2_row1_col4" readonly="readonly" style="border: 0px;"/>
	 	</div>
	 	
	 	<div class="rv_row2_row1">
	 		<div class="rv_row2_row1_col1">청소비</div>
	 		<input type="text" id="cleaning" name="cleaning" class="rv_row2_row1_col2" readonly="readonly"  style="border: 0px;"/>
	 		<div class="rv_row2_row1_col3">경비비</div>
	 		<input type="text" id="guard" name="guard" class="rv_row2_row1_col4" readonly="readonly" style="border: 0px;"/>
	 	</div>
	 	
	 	<div class="rv_row2_row1">
	 		<div class="rv_row2_row1_col1">수선유지비</div>
	 		<input type="text" id="maintenance" name="maintenance" class="rv_row2_row1_col2" readonly="readonly" style="border: 0px;"/>
	 		<div class="rv_row2_row1_col3">생활폐기물수수료</div>
	 		<input type="text" id="disposal" name="disposal" class="rv_row2_row1_col4" readonly="readonly" style="border: 0px;"/>
	 	</div>
	 	
	 	<div class="rv_row2_row1">
	 		<div class="rv_row2_row1_col1">보험료</div>
	 		<input type="text" id="insurance" name="insurance" class="rv_row2_row1_col2" readonly="readonly" style="border: 0px;"/>
	 		<div class="rv_row2_row1_col3">선거관리위원회운영비</div>
	 		<input type="text" id="election" name="election" class="rv_row2_row1_col4" readonly="readonly" style="border: 0px;"/>
	 	</div>
	 	
	 	 <div class="rv_row2_row1">
	 		<div class="rv_row2_row1_col1">전기사용량</div>
	 		<input type="text" id="power_use" name="power_use" class="rv_row2_row1_col2" readonly="readonly" style="border: 0px"/>
	 		<div class="rv_row2_row1_col3">세대전기료</div>
	 		<input type="text" id="power_unit" name="power_unit" class="rv_row2_row1_col4" readonly="readonly" style="border: 0px"/>
	 	</div>
	 	 	
	 	<div class="rv_row2_row1">
	 		<div class="rv_row2_row1_col1">공동전기료</div>
	 		<input type="text" id="power_comm" name="power_comm" class="rv_row2_row1_col2" readonly="readonly" style="border: 0px;"/>
	 		<div class="rv_row2_row1_col3">승강기전기료</div>
	 		<input type="text" id="elevator" name="elevator" class="rv_row2_row1_col4" readonly="readonly" style="border: 0px;"/>
	 	</div>
	 	
	 	<div class="rv_row2_row1">
	 		<div class="rv_row2_row1_col1">TV수신료</div>
	 		<input type="text" id="tv" name="tv" class="rv_row2_row1_col2" readonly="readonly" style="border: 0px;"/>
	 		<div class="rv_row2_row1_col3">수도사용량</div>
	 		<input type="text" id="water" name="water" class="rv_row2_row1_col4" readonly="readonly" style="border: 0px;"/>
	 	</div>
	 	
	 	<div class="rv_row2_row1">
	 		<div class="rv_row2_row1_col1">세대수도료</div>
	 		<input type="text" id="water_unit" name="water_unit" class="rv_row2_row1_col2" readonly="readonly" style="border: 0px;" />
	 		<div class="rv_row2_row1_col3">공동수도료</div>
	 		<input type="text" id="water_comm" name="water_comm" class="rv_row2_row1_col4" readonly="readonly" style="border: 0px;" />
	 	</div>
	 	
	 	<div class="rv_row2_row1">
	 		<div class="rv_row2_row1_col1">당월부과액</div>
	 		<input type="text" id="charge_this" name="charge_this" class="rv_row2_row1_col2" readonly="readonly" style="border: 0px;"/>
	 		<div class="rv_row2_row1_col3">과오입금</div>
	 		<input type="text" id="payback" name="payback" class="rv_row2_row1_col4" readonly="readonly" style="border: 0px;"/>
	 	</div>
	 	
	 	 <div class="rv_row2_row1">
	 		<div class="rv_row2_row1_col1">별도금액</div>
	 		<input type="text" id="extra" name="extra" class="rv_row2_row1_col2" readonly="readonly" style="border: 0px;"/>
	 		<div class="rv_row2_row1_col3">당월관리비</div>
	 		<input type="text" id="charge_month" name="charge_month" class="rv_row2_row1_col4" readonly="readonly" style="border: 0px;"/>
	 	</div>
	 	
	 	<div class="rv_row2_row1">
	 		<div class="rv_row2_row1_col1">연체료계산제외금액</div>
	 		<input type="text" id="penalty_exc" name="penalty_exc" class="rv_row2_row1_col2" readonly="readonly" style="border: 0px;"/>
		</div>
	</div>

	<!-- 목록버튼  -->
	<div class="rv_btn"> <input type="button" value="목록" onclick="history.back(-1)"></div>
</div>
