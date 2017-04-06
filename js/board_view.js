$(document).ready(function(){
});

function b_delete(b_index){ // 글삭제
	if (confirm("정말 삭제하시겠습니까??") == true){    //확인
	    location.href="";
	}
}

function b_modify(b_index,board_category){ // 글수정
	alert('');
	//location.href='?page_content=board_modifyForm&b_index='+b_index+'&board_category='+board_category+'&board_page='+board_page+'&board_cateNo'+board_cateNo;
}