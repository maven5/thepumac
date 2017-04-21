$(document).ready(function(){
	var v_idx = $('.vote_idx').val(); // 투표글 인덱스 
	
	$('.vote_view').click(function(){ // 투표 보기 버튼
		location.href="?page_content=vote_view&v_idx="+v_idx;
	});
	
	$('.vote_modify').click(function(){ // 투표 수정 버튼
		location.href="?page_content=vote_modifyForm&v_idx="+v_idx;
	});
	
	$('.vote_delete').click(function(){ // 투표 삭제 버튼
		if(confirm("정말 삭제하시겠습니까?"))
			location.href="/thepumac/action/vote/vote_delete.php?&v_idx="+v_idx;
	});
});
