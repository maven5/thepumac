$(document).ready(function(){
	$('.auth_save').click(function(){
		if(confirm("정말 수정하시겠습니까?")){
			var m_idx = $(this).next().val();
			var ma_index = $(this).parent().prev().children().val();
			location.href="/action/member/member_authority_update.php?m_idx="+m_idx+"&ma_index="+ma_index;
		}
	});
});