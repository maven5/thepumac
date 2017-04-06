/*
 * board_list.js 
 * 
 * 
 * 
 * 
 * 
 */

$(document).ready(function(){
	//createCategory(); // 페이지 로딩시 카테고리 생성
	
	
	
	// category 변경에 따른 page 생성
	 $('.board_category').change(function(){
		
		 	$(".board_page").find('option').remove();
		 
		 	var category = $('.board_category').val();
		 	
			 $.post("/pumac2/action/board/getBoard.php?chk=1&category="+category, function(data) { 
				 var json = JSON.parse(data); // JSON 파싱
				 
				 $('.board_page').append("<option>선택</option>");
				 
				 for(var i=0;i<json.length;i++){
					 $('.board_page').append("<option value='"+json[i].page_key+"'>"+json[i].page_value+"</option>");
				 }
			 });
	   });
	 
	 
	 
	// page 변경에 따른 카테고리 검색
	 $('.board_page').change(function(){
		 	var category = $('.board_category').val();
		 	var page= $('.board_page').val(); 
		 	var type= $('.board_type').val(); // 공지사항 , 일반게시판
		 	
		 	location.href="?page_content=board_list"
		 		+"&category="+category
		 		+"&page="+page
		 		+"&type="+type;
	   });
	 
	 $('.board_type').change(function(){
		 	var category = $('.board_category').val();
		 	var page= $('.board_page').val(); 
		 	var type= $('.board_type').val(); // 공지사항 , 일반게시판
		 	
		 	location.href="?page_content=board_list"
		 		+"&category="+category
		 		+"&page="+page
		 		+"&type="+type;
	   });
	 
	 // 게시판 검색
	 $('.searchB').click(function(){
			var category = $('.board_category').val();
		 	var page= $('.board_page').val(); 
		 	var type= $('.board_type').val(); // 공지사항 , 일반게시판
		 	var s_name = $('.search_name').val();
		 	var s_value = $('.search_value').val();
		 	
		 	location.href="?page_content=board_list"
		 		+"&category="+category
		 		+"&page="+page
		 		+"&type="+type
		 		+"&search_name="+s_name
		 		+"&search_value="+s_value;
	 });
	 
}); // $(document).ready()



function createCategory(){ // 처음 category 생성
	
	$.post("/pumac2/action/board/getBoard.php?chk=0", function(data) { 
				var json = JSON.parse(data); // JSON 파싱
				
				$('.board_category').append("<option>선택</option>");
				
				for(var i=0;i<json.length;i++){ // 데이터 Select Box에 넣기
					$('.board_category').append("<option value='"+json[i].category_key+"'>"+json[i].category_value+"</option>");
				}
		 });
	
	$(".board_page").find('option').remove();
	 
 	var category = $('.board_category').val();
 	
	 $.post("/pumac2/action/board/getBoard.php?chk=1&category="+category, function(data) { 
		 var json = JSON.parse(data); // JSON 파싱
		 
		 $('.board_page').append("<option>선택</option>");
		 
		 for(var i=0;i<json.length;i++){
			 $('.board_page').append("<option value='"+json[i].page_key+"'>"+json[i].page_value+"</option>");
		 }
	 });
} // createCategory



$(window).load(function(){
/*	var board_categoryH = $('.board_categoryH').val();
	
	var board_category_size = $('.board_category option').size(); // 카테고리 1 (선택,주소,매물명) SB의 Option 개수
	
	
	for(var i=0;i < board_category_size ; i++){
		var selector= ".board_category option:eq("+ i +")";
		if(board_categoryH == $(selector).val()){
			$(selector).attr("selected","selected"); 
		}
	}
	
	var board_pageH = $('.board_pageH').val();
	
	var board_page_size = $('.board_page option').size(); // 카테고리 1 (선택,주소,매물명) SB의 Option 개수
	
	
	for(var i=0;i < board_page_size ; i++){
		var selector= ".board_category option:eq("+ i +")";
		if(board_pageH == $(selector).val()){
			$(selector).attr("selected","selected"); 
		}
	}*/
}); // window.load