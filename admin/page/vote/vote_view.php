<?php 
	/*
	 ** 투표 보기
	**
	*/
	include 'dbconfig.php';
	
	$v_idx=$_GET['v_idx'];
		
	$query = "select * from vote_big where v_idx=$v_idx"; 
	
	$result = mysqli_query($conn,$query);
	
	while($row=mysqli_fetch_array($result)){
		$v_subejct = $row['v_subject'];
		$v_dateE = $row['v_dateE'];
		$v_writer = $row['v_writer'];
		$v_numberT = $row['v_numberT'];
		$v_content = $row['v_content'];
	}
	
	$query2 = "select * from vote_small where v_idx=$v_idx order by v2_idx asc"; 
	$result = mysqli_query($conn,$query2);
	$rowCount =  mysqli_num_rows($result); // 총 안건수

?>

<div class="bVote_wrap">
	<div class="bVote_title">설문조사 제목</div>
	<input type="hidden" value="<?=$v_idx?>" name="v_idx"><!-- v_idx hidden -->
	
	<!-- 통계박스 -->
	<div class="bVote_statsBoxs">
		<div class="bVote_statsBox" style="margin-left:10px">
			<div class="bVote_statsBox_1"><i class="fa fa-envelope-o" aria-hidden="true" style="font-size:27px;margin-bottom:5px;"></i><br>문항수</div>
			<div class="bVote_statsBox_2"><?=$rowCount?> <font style="font-size:15px;">개</font></div>
		</div>
		
		<div class="bVote_statsBox" style="margin-right:50px;margin-left:50px;background:#2BBBD8;">
			<div class="bVote_statsBox_1"><i class="fa fa-calendar-check-o" aria-hidden="true" style="font-size:27px;margin-bottom:5px;"></i><br>종료날짜</div>
			<div class="bVote_statsBox_2"> <font style="font-size:15px;">~ <?=$v_dateE?></font></div>
		</div>
		
		<div class="bVote_statsBox" style="background: #F78D3F;">
			<div class="bVote_statsBox_1"><i class="fa fa-pie-chart" aria-hidden="true" style="font-size:27px;margin-bottom:5px;"></i><br>총투표수</div>
			<div class="bVote_statsBox_2"><?=$v_numberT?><font style="font-size:15px;"> 건</font></div>
		</div>
	</div>
	
	<div style="clear:left;"></div>
	
	<!-- 설문조사 내용  -->
	<div class="bVote_list_title"> 내용</div>
	<div class="bVote_content"><?=$v_content?></div>
	
	<!-- 세부항목  -->
	<div class="bVote_list_title"> 세부 항목</div>
	
	<div class="bVote_before">
		<?php 
			$count = 1;
			while($row=mysqli_fetch_array($result)){
		?>
		
		<div class="bVote_list_row">
			<div class="bVote_list_col1"> 항목 <?=$count?>)  </div>
			<div class="bVote_list_col2"> <?=$row['v2_subject'];?> </div>
			<div class="bVote_list_col3">투표</div>
			<input type="hidden" value="<?=$row['v2_idx'];?>">
		</div>
		
		<?php 
			$count++;
			}
		?>
		
	<div class="bVote_result">결과보기</div>
	</div>
	
	<script>
			var count = 1;
	</script>
	
	<!--결과 -->
	<div class="bVote_after">
		<?php 
			$count = 1;
			$result = mysqli_query($conn,$query2);
			while($row=mysqli_fetch_array($result)){
			if($v_numberT!=0)
				$persent = round(($row['v2_number']*100)/$v_numberT);
			else 
				$persent =0;
		?>
		
		<div class="bVote_list_row">
			<div class="bVote_list_col1"> 항목 <?=$count?>)  </div>
			<div class="bVote_list_col4"> <?=$row['v2_subject'];?> </div>
			<div class="bVote_list_col5"> <?=$row['v2_number'];?>표 (<?=$persent?>%)</div>
			<div></div>
		</div>
		
		<div class="progress-wrap progress pgw<?=$count?>" data-progress-percent="<?=$persent?>">
		
			  <div class="progress-bar progress pgb<?=$count?>"></div>
			  
		</div>
		
		<script>
		$(document).ready(function(){
			moveProgressBar(count);
			count++;
			    // SIGNATURE PROGRESS
			    function moveProgressBar(count) {
				    var pgStr1 = '.pgw'+count;
				    var pgStr2 = '.pgb'+count;
					    
			        var getPercent = ($(pgStr1).data('progress-percent') / 100);
			        var getProgressWrapWidth = $('.progress-wrap').width();
			        var progressTotal = getPercent * getProgressWrapWidth;
			        var animationLength = 2500;
			        
			        // on page load, animate percentage bar to data percentage length
			        // .stop() used to prevent animation queueing
			        $(pgStr2).stop().animate({
			            left: progressTotal
			        }, animationLength);
			    }
		});
		</script>
		
		<?php 
			$count++;
			}
		?>

		<div class="bVote_result2">결과닫기</div>
	</div>
	
	
	
	
	<div class="bVote_back"><input type="button" value="목록" style="margin-right:30px;" onclick="history.go(-1)"></div>
</div>

<?php 
	mysqli_close($conn);
?>
