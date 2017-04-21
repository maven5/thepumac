$(document).ready(function(){
	$('.bVote_list_col3').click(function (){  // 투표하기 버튼
		 var confirms = confirm('이 문항에 투표하시겠습니까?');
		 
		 if(confirms){ // 컨펌
			var v1_idxH = $('input[name=v_idx]').val(); // v1_idx 히든값
			var v2_idxH = $(this).next().val(); // v2_idx 히든값
			
			location.href="/thepumac/action/vote/vote_increase.php?v1_idx="+v1_idxH+"&v2_idx="+v2_idxH;
		 }
	});
	
	$('.bVote_result').click(function (){   // 결과보기 버튼
		$('.bVote_before').hide('100');
		setTimeout($('.bVote_after').show('400'),1000*5);
	});
	
	$('.bVote_result2').click(function (){   // 결과보기 버튼
		$('.bVote_after').hide('100');
		setTimeout($('.bVote_before').show('400'),1000*5);
	});
	
 
	
});
