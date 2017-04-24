
<!-- 예약 게시판 -->

 <!-- <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css"> -->

 <!-- <script type="text/javascript" src="/lmxsrv/jquery-ui-1.10.4/development-bundle/ui/minified/i18n/jquery.ui.datepicker-ko.min.js"></script> -->
<script>
	$(document).ready(function() {
		//jqueryUI에서 제공하는 캘린더
		$(".boardN_cal").datepicker({
			altField: "#booking",
			dateFormat: "yy-mm-dd",
			nextText:"다음달",
			prevText:"이전달",
			changeMonth:true,
			changeYear:true,
		    monthNames: ['1월','2월','3월','4월','5월','6월','7월','8월','9월','10월','11월','12월'],
			monthNamesShort: ['1월','2월','3월','4월','5월','6월','7월','8월','9월','10월','11월','12월'],
			dayNames: ['일','월','화','수','목','금','토'],
			dayNamesShort: ['일','월','화','수','목','금','토'],
			dayNamesMin: ['일','월','화','수','목','금','토'],
			//minDate: 0,
			onSelect: function(date) {
				chkReserve();
		    }
	 	});
	
		$('.boardN_cal2').multiDatesPicker({
			altField: "#booking",
	 		dateFormat: "yy-mm-dd",
	 		nextText:"다음달",
	 		prevText:"이전달",
	 		changeMonth:true,
	 		changeYear:true,
	 	    monthNames: ['1월','2월','3월','4월','5월','6월','7월','8월','9월','10월','11월','12월'],
	 		monthNamesShort: ['1월','2월','3월','4월','5월','6월','7월','8월','9월','10월','11월','12월'],
	 		dayNames: ['일','월','화','수','목','금','토'],
	 		dayNamesShort: ['일','월','화','수','목','금','토'],
	 		dayNamesMin: ['일','월','화','수','목','금','토'],
	 		//minDate: 0,
	 		onSelect: function(date) {
	 			chkReserve();
	 		  }
		});
		
		chkReserve();
		today();
	});
	
	//오늘 날짜를 구해 신청일자에 넣는다.
	function today() {
		var now = new Date();
	    var year= now.getFullYear();
	    var mon = (now.getMonth()+1)>9 ? ''+(now.getMonth()+1) : '0' +(now.getMonth()+1);
	    var day = now.getDate()>9 ? ''+now.getDate() : '0' + now.getDate(); 	              
	    var chan_val = year + '-' + mon + '-' + day;
	
		$("#today").val(chan_val);
	}
	
	function selectTime(value, page) {
		var times = ['09', '10', '11', '12', '13', '14', '15', '16', '17', '18', '19', '20'];		//시작시간을 비교할 때 사용하는 배열
		var hrs = value.substring(0,2);		//시작시간에서 시간부분만 빼낸다. 예) 09:00 -> 09
		var min = value.substring(3,5);		//시작시간에서 분부분만 빼낸다. 예) 09:30 -> 30
		var setTime;	//종료시간을 저장하는 변수
	
		//사용자가 사용시간을 선택하면 종료시간만 나타내게 한다.
		if(hrs == "") {
			$("#endTime").html('<option value="">종료시간</option>');
			return;
		}
			
		for(var i=0; i<times.length; i++) {
			if(page == "doctor") {
				if(hrs == times[i]) {
					setTime = times[i+1] + ':00'; //종료시간은 시작시간 +1시간
				}
			} else if(page == "babycare") {
				if(hrs == times[i]) {
					setTime = times[i+1] + ':00'; //종료시간은 시작시간 +1시간
				}
			} else if(page == "guesthouse"){
				$("#endTime").html('<option value="24:00">다음날12:00</option>');
				return;
			}
		}
	
		$("#endTime").html('<option value=' + setTime + '>' + setTime + '</option>');
	}
	
	function apply() {	
		var phoneNum1 = $("#phoneNum1").val();
		var phoneNum2 = $("#phoneNum2").val();
		var phoneNum3 = $("#phoneNum3").val();
		var bookingdate = $("#booking").val();  //날짜를 받기
		var bookingArray = bookingdate.split("-");  //년월일로 나누기
		var todaydate= $("#today").val();
		var todayArray = todaydate.split("-");
		var flag = true;
	
	/*  		if($(':radio[name="option"]:checked').val() == undefined) {
			alert("옵션을 선택해 주세요.");
			return;
		} */
		
		//이전일자 예약 불가능하도록 처리
		for(var i=bookingArray.length-1; i>=0; i--) {
			if(bookingArray[i] < todayArray[i]) {
				flag = false;
				break;
			}
		}
	
		if(!flag) {
			alert("예약일자를 다시 선택해주세요.");
			return;
		}
		
		if($("#startTime option:selected").val() == "") {
			alert("예약시간을 입력해 주세요.");
			return;
		}
	
		if(phoneNum1 == "" || phoneNum1.length < 3 || phoneNum2 == "" || phoneNum2.length < 3 || phoneNum3 == "" || phoneNum3.length < 4) {
			alert("전화번호를 확인해 주세요.");
			return;
		}
	
		if($("#name").val() == "") {
			alert("이름을 입력해 주세요.");
			return;
		}
		
		$("#reserve_frm").submit();
	}
	
	function apply2() {	
		var phoneNum1 = $("#phoneNum1").val();
		var phoneNum2 = $("#phoneNum2").val();
		var phoneNum3 = $("#phoneNum3").val();
		var bookingguest = $("#booking").val(); //날짜연결된 텍스트 전체 ex)2016-07-07, 2016-07-08
		var bookingdate = bookingguest.split(", "); // ,로 한 날짜씩 나눠 배열로 담기 ex) {2016-07-07, 2016-07-08}
		var bookingArray;
		var dateObj;
		var today = new Date(); 
		var betweenDay;
		//var bookingArray= bookingdate[i].split("-"); //년월일로 나누기

		
		var todaydate= $("#today").val();
		var todayArray = todaydate.split("-");
		var flag = true;

		
		
		//이전일자 예약 불가능하도록 처리
		for(var j=0;j<bookingdate.length;j++){
			bookingArray =  bookingdate[j].split("-");
			dateObj = new Date(bookingArray[0], Number(bookingArray[1])-1, bookingArray[2]);
			betweenDay =  Math.floor ( ( (dateObj.getTime() - today.getTime())  / (1000*60*60*24) ) );
			

			if(betweenDay<=-2){
				flag = false;
				break;
				}
		}
	
		if(!flag) {
			alert("예약일자를 다시 선택해주세요.");
			return;
		}
		
		if($("#startTime option:selected").val() == "") {
			alert("예약시간을 입력해 주세요.");
			return;
		}
	
		if(phoneNum1 == "" || phoneNum1.length < 3 || phoneNum2 == "" || phoneNum2.length < 3 || phoneNum3 == "" || phoneNum3.length < 4) {
			alert("전화번호를 확인해 주세요.");
			return;
		}
	
		if($("#name").val() == "") {
			alert("이름을 입력해 주세요.");
			return;
		}
		
		$("#reserve_frm").submit();
	}
	
	function chkReserve() {
		var date_rev;
		var docStartTime = ["09:00", "10:00", "11:00", "12:00", "14:00", "15:00", "16:00", "17:00", "18:00", "19:00"];
		var babyCareStartTime = ["10:00", "11:00", "12:00", "14:00", "15:00", "16:00", "17:00"];
		var $div;
		var $rev_time = $("#rev_time .boardN_reserveList_col1");
		var $startTime = $("#startTime");
		var $startTimeOption = $("#startTime option");
		var $endTime = $("#endTime");
		var flag = true;
		var flag2 = false;
		var guestdate=$("#booking").val().split(",");
		var param = {
			DATE_REV : $("#booking").val() ,
			OPTION : $(":radio[name='option']:checked").val() ,
			//OPTION : $("#guest_option option:selected").val() ,
			TYPE : $("#type").val()
		}

		//console.log($("#booking").val());
	
		$rev_time.each(function(index) {
			$div = $(this).children();
	
			//타임스케쥴에서, 예약가능/예약 불가 표시
			if($div.hasClass("boardN_reserveList_col3")) {
				$div.removeClass("boardN_reserveList_col3").addClass("boardN_reserveList_col2");
			}
		});

		
	 	$.post("/action/reserve/reserve_check.php", param, function(data) { 		
	 		date_rev = data.split(",");
	 		
			for(var i=0; i<date_rev.length-1; i++) {
				$rev_time.each(function(index) {
					if(date_rev[i] == $(this).data("time")) {	
						$div = $(this).children();
					}
					if($div.hasClass("boardN_reserveList_col2")) {
						$div.removeClass("boardN_reserveList_col2").addClass("boardN_reserveList_col3");
						return;
					}
				});
			}
				
			//예약시간 선택에서 예약불가시간은 선택창에서 삭제되도록 처리.
			$startTimeOption.each(function(index) {
				if(date_rev[i] == $startTimeOption.eq(index).val()) {
					flag = false;
					$startTimeOption.eq(index).remove();
				}
			});
			
	 		$startTime.find("option").remove();
			$startTime.append('<option value="">시작시간</option>');
			$endTime.find("option").remove();
			$("#endTime").append('<option value="">종료시간</option>');

		<?php if($_GET['board_page']=="주치의 예약"){ ?>
			for(var i=0; i<date_rev.length; i++) {
				for(var j=0; j<docStartTime.length; j++) {
					if(date_rev[i] == docStartTime[j]) {
						docStartTime.splice(j, 1);
					}
				}
			}
	
			for(var i=0; i<docStartTime.length; i++) {
				$startTime.append('<option value="' + docStartTime[i] + '">' + docStartTime[i] + '</option>');
			}
		<?php } else if($_GET['board_page']=="게스트하우스"){ ?>
		
			
			for(var i=0; i<date_rev.length-1; i++) {
				for(var j=0; j<guestdate.length; j++) {
					//console.log("date_rev : "+date_rev[i] + " , guestdate: "+ guestdate[j]);
					if(date_rev[i] == guestdate[j].trim()) {
						flag2=true;
						//console.log("date_rev : "+date_rev[i] + " , guestdate: "+ guestdate[j]);
					}
					
				}
				
			}
			//console.log(flag2);
			if(flag2==false){
				$startTime.append('<option value="24:00">13:00</option>');
			}
		<?php } else if($_GET['board_page']=="아기돌봄예약"){ ?>
			for(var i=0; i<date_rev.length; i++) {
				for(var j=0; j<babyCareStartTime.length; j++) {
					if(date_rev[i] == babyCareStartTime[j]) {
						babyCareStartTime.splice(j, 1);
					}
				}
			}
	
			for(var i=0; i<babyCareStartTime.length; i++) {
				$startTime.append('<option value=' + babyCareStartTime[i] + '>' + babyCareStartTime[i] + '</option>');
			}
		<?php } ?>		
 		});
	}
</script>

 <div class="boardN_page_cols2">  
 
<form id="reserve_frm" name="reserve_frm" method="post" action="/action/reserve/reserve_insert.php">
	<?php if($_GET['board_page']=="주치의 예약"){ ?>
		<input type="hidden" id="type" name="type" value="D">
	<?php } else if($_GET['board_page']=="게스트하우스"){ ?>
		<input type="hidden" id="type" name="type" value="G">
	<?php } else if($_GET['board_page']=="아기돌봄예약"){ ?>
		<input type="hidden" id="type" name="type" value="B">
	<?php } ?>
					

	<!-- 날짜선택  -->
	<?php if($_GET['board_page']!="게스트하우스") {?>
		<div class="boardN_cal"></div>
 	<?php }else{ ?>
 		<div class="boardN_cal2"></div>
 	<?php } ?>
	
	<!-- 온라인 예약 -->
	<div class="boardN_online">
		<div>
			<?php if($_GET['board_page']=="주치의 예약"){ ?>
				<div class="boardN_online_row1">*온라인 예약</div>
				<div class="boardN_online_row2">선생님 예약</div>
				<div class="boardN_online_row3">
				<input type="radio" name="option" value="홍정아" checked="checked" onclick="chkReserve();"/>홍정아 선생님
				</div>
			<?php } else if($_GET['board_page']=="게스트하우스"){ ?>
				<div class="boardN_online_row1">*온라인 예약</div>
				<div class="boardN_online_row2">방 선택</div>
			
				<div class="boardN_online_row3">
					<input type="radio" name="option" value="큰방" onclick="chkReserve();"/>큰방
					<input type="radio" name="option" value="작은방A" onclick="chkReserve();"/>작은방A
					<input type="radio" name="option" value="작은방B" onclick="chkReserve();"/>작은방B
					<input type="radio" name="option" value="작은방C" onclick="chkReserve();"/>작은방C
					<!-- <select id="guest_option" name="guest_option" class="guest_room" onchange="chkReserve();">
						<option value="">선택</option>
						<option value="큰방">큰방</option>
						<option value="작은방A">작은방A</option>
						<option value="작은방B">작은방B</option>
						<option value="작은방C">작은방C</option>
					</select> -->
				</div>
			<?php } else if($_GET['board_page']=="아기돌봄예약"){ ?>
				<div class="boardN_online_row1">*온라인 예약</div>
				<div class="boardN_online_row2">반 선택</div>
				<div class="boardN_online_row3">
				<input type="radio" name="option" value="블럭놀이방A" checked="checked" onclick="chkReserve();"/>블럭놀이방A
				<input type="radio" name="option" value="블럭놀이방B" onclick="chkReserve();"/>블럭놀이방B
				</div>
			<?php } ?>	
		</div>
		
		
		<div id="rev_time" class="boardN_reserveList">
			<?php if($_GET['board_page']=="주치의 예약"){ ?>
				<div class="boardN_reserveList_col1" data-time="09:00">
					09:00~10:00
					<div class="boardN_reserveList_col2"></div>
				</div>
				<div class="boardN_reserveList_col1" data-time="10:00">
					10:00~11:00
					<div class="boardN_reserveList_col2"></div>
				</div>
				<div class="boardN_reserveList_col1" data-time="11:00">
					11:00~12:00
					<div class="boardN_reserveList_col2"></div>
				</div>
				<div class="boardN_reserveList_col1" data-time="13:00">
					13:00~14:00
					<div class="boardN_reserveList_col2"></div>
				</div>
				<div class="boardN_reserveList_col1" data-time="14:00">
					14:00~15:00
					<div class="boardN_reserveList_col2"></div>
				</div>
				<div class="boardN_reserveList_col1" data-time="15:00">
					15:00~16:00
					<div class="boardN_reserveList_col2"></div>
				</div>
				<div class="boardN_reserveList_col1" data-time="16:00">
					16:00~17:00
					<div class="boardN_reserveList_col2"></div>
				</div>						
				<div class="boardN_reserveList_col1" data-time="17:00">
					17:00~18:00
					<div class="boardN_reserveList_col2"></div>
				</div>
				<div class="boardN_reserveList_col1" data-time="18:00">
					18:00~19:00
					<div class="boardN_reserveList_col2"></div>
				</div>
				<div class="boardN_reserveList_col1" data-time="19:00">
					19:00~20:00
					<div class="boardN_reserveList_col2"></div>
				</div>		
			<?php } else if($_GET['board_page']=="게스트하우스"){ ?>
				<div class="boardN_reserveList_col1" data-time="24:00">13:00~체크아웃12:00
					<div class="boardN_reserveList_col2"></div>
				</div>
	
		    <?php } else if($_GET['board_page']=="아기돌봄예약"){ ?>
				<div class="boardN_reserveList_col1" data-time="10:00">
					10:00~11:00
					<div class="boardN_reserveList_col2"></div>
				</div>
				
				<div class="boardN_reserveList_col1" data-time="11:00">
					11:00~12:00
					<div class="boardN_reserveList_col2"></div>
				</div>
				
				<div class="boardN_reserveList_col1" data-time="13:00">
					13:00~14:00
					<div class="boardN_reserveList_col2"></div>
				</div>
				
				<div class="boardN_reserveList_col1" data-time="14:00">
					14:00~15:00
					<div class="boardN_reserveList_col2"></div>
				</div>
				
				<div class="boardN_reserveList_col1" data-time="15:00">
					15:00~16:00
					<div class="boardN_reserveList_col2"></div>
				</div>
				
				<div class="boardN_reserveList_col1" data-time="16:00">
					16:00~17:00
					<div class="boardN_reserveList_col2"></div>
				</div>		
								
				<div class="boardN_reserveList_col1" data-time="17:00">
					17:00~18:00
					<div class="boardN_reserveList_col2"></div>
				</div>
				<?php } ?>	
		</div> 
			<?php  if($_GET['board_page']=="게스트하우스"){ ?>
			<div class="boardN_online_row4_2">게스트하우스 전체룸을 렌트하시는 경우,<br> 해당일자 모든 방 예약신청 부탁드립니다.</div>
			<?php } ?>	
	</div>
	
	
	<p style="clear:left;"></p>
			
	<!-- 예약확인  -->
	<div class="boardN_reserveCheck">
		<div class="boardN_reserveCheck_rows1"> * 예약확인</div>
		<div class="boardN_reserveCheck_rows2">
			<div class="boardN_reserveCheck_cCols1">일자</div>
			<div class="boardN_reserveCheck_cCols2 <?php if($_GET['board_page']!="게스트하우스"){ ?>colsPlus1<?php } else{ ?> colsPlus2 <?php } ?>" >예약일자
				<input type="text" id="booking" name="booking" readonly="readonly" style="border:0px; width:70px;"/>
			</div>
			<div class="boardN_reserveCheck_cCols2 <?php if($_GET['board_page']!="게스트하우스"){ ?>colsPlus1<?php } else{ ?> colsPlus3 <?php } ?>" style="padding-left: 10px; ">신청일자
				<input type="text" id="today" name="today"  readonly="readonly" style="border:0px;"/>
			</div>
			<div class="boardN_reserveCheck_cCols3"></div>
		</div>
	
		<div class="boardN_reserveCheck_rows2">
			<div class="boardN_reserveCheck_cCols1">예약시간</div>
			<div class="boardN_reserveCheck_cCols2" style="width:300px;">			
				<?php if($_GET['board_page']=="주치의 예약"){ ?>
					<select id="startTime" name="startTime" onchange="selectTime(this.value, 'doctor');">
						<option value="">시작시간</option>
						<option value="09:00">09:00</option>
						<option value="10:00">10:00</option>
						<option value="11:00">11:00</option>
						<option value="12:00">12:00</option>
						<option value="14:00">14:00</option>
						<option value="15:00">15:00</option>
						<option value="16:00">16:00</option>
						<option value="17:00">17:00</option>
						<option value="18:00">18:00</option>
						<option value="19:00">19:00</option>
					</select>
				<?php } else if($_GET['board_page']=="게스트하우스"){ ?>
				   <select id="startTime" name="startTime" onchange="selectTime(this.value, 'guesthouse');">
				   		<option value="">시작시간</option>
				   		<option value="24:00">13:00</option>
				   </select>
			   <?php } else if($_GET['board_page']=="아기돌봄예약"){ ?>
			  	    <select id="startTime" name="startTime" onchange="selectTime(this.value, 'babycare');">
				  	    <option value="">시작시간</option>
						<option value="09:00">09:00</option>
						<option value="09:30">09:30</option>
						<option value="10:00">10:00</option>
						<option value="10:30">10:30</option>
						<option value="11:00">11:00</option>
						<option value="11:30">11:30</option>
						<option value="12:00">12:00</option>
						<option value="12:30">12:30</option>
						<option value="14:00">14:00</option>
						<option value="14:30">14:30</option>
						<option value="15:00">15:00</option>
						<option value="15:30">15:30</option>
						<option value="16:00">16:00</option>
						<option value="16:30">16:30</option>
						<option value="17:00">17:00</option>
						<option value="17:30">17:30</option>
			   		</select>
				<?php } ?>						
				- 
				<select id="endTime" name="endTime">
					<option value="">종료시간</option>	
				</select>			
			</div>
		</div>
				
		<div class="boardN_reserveCheck_rows2">
			<div class="boardN_reserveCheck_cCols1">예약자연락처</div>
			<div class="boardN_reserveCheck_cCols2" style="width:260px;">
				<select name="phoneNum1" id="phoneNum1"  style="width:70px;">
				<option value="010">010</option>
				<option value="011">011</option>
				<option value="017">017</option>
				<option value="018">018</option>
				<option value="019">019</option>
				</select>
				 - <input type="text" id="phoneNum2" name="phoneNum2" value="<?= $_SESSION['m_phone2']?>">
				 - <input type="text" id="phoneNum3" name="phoneNum3" value="<?= $_SESSION['m_phone3']?>">
			</div>
			<div class="boardN_reserveCheck_cCols1">예약자 성명</div>
			<div class="boardN_reserveCheck_cCols2"><input type="text" id="name" name="name" value="<?= $_SESSION['m_name']?>"></div>
		</div>

		<div class="boardN_reserveCheck_rows3">
			<input type="button" class="boardN_reserveButton" value="예약신청" 
				onclick="<?php if($_GET['board_page']!="게스트하우스"){ ?> 
					apply();
				<?php } else {?>
					 apply2();
				<?php } ?>
				">
		</div>
	</div> <!-- boardN_reserveCheck End  -->

	</form>
	

	<!-- 프로그램정보  -->
	<div class="boardN_reserveObey">
		<div class="boardN_reserveObey_rows1"> *프로그램 정보</div>
		<div class="boardN_reserveObey_rows2">
				<?php if($_GET['board_page']=="주치의 예약"){ ?>
		 			<div class="boardN_reserveObey_rows3">
		 			<img src="/image/board/rev_info_doc.jpg"></div>
				<?php } else if($_GET['board_page']=="게스트하우스"){ ?>
					<div class="boardN_reserveObey_rows3">
					<img src="/image/board/rev_info_guest.jpg"></div>
				<?php } else if($_GET['board_page']=="아기돌봄예약"){ ?>
					<div class="boardN_reserveObey_rows3">
					<img src="/image/board/rev_info_baby.jpg"></div>
				<?php } ?>	
		</div>
	</div>
		
	<!-- 준수사항  -->
	<div class="boardN_reserveObey">
		<div class="boardN_reserveObey_rows1"> *준수사항</div>
		<div class="boardN_reserveObey_rows2">
			<?php
				 if($_GET['board_page']=="주치의 예약"){ 
		 			include 'page/board/obeyText/doctor.txt';
				} else if($_GET['board_page']=="게스트하우스"){
					include 'page/board/obeyText/guest.txt';
				} else if($_GET['board_page']=="아기돌봄예약"){
					include 'page/board/obeyText/baby.txt';
				}
		 	?>
		</div>
	</div><!-- 준수사항 끝 -->	
</div>
