$(document).ready(function(){
	$('.bVote_list_col3').click(function (){  // 투표하기 버튼
		alert('관리자모드에선 투표 할 수 없습니다!');
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
