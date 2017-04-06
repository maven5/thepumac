$(document).ready(function(){
	$('.boardN_page_cols2_contents_searchIcon').click(function(){ // 게시판 글(내용,글쓴이)검색
		goSearch();
	});
	
	$(".search_content").keypress(function(e) { // 엔터검색
	    if (e.keyCode == 13){
	    	goSearch();
	    }    
	});
	
	
});

function goSearch(){ //검색 함수
	var category = $('.search_category').val();
	var content = $('.search_content').val();
	var hidden = $('.search_hidden').val();
	
	
	hidden+="category="+category+"&content="+content;
	location.href=hidden;
}
