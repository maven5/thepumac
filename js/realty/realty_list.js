$(document).ready(function(){
	
	if($('#category1').val()!=""){ // 검색했다면 SB selected)
		var category1_size = $('.search_category option').size(); // 카테고리 1 (선택,주소,매물명) SB의 Option 개수
		var category1 = $('#category1').val();
		
		for(var i=0;i < category1_size ; i++){
			var selector= ".search_category option:eq("+ i +")";
			if(category1 == $(selector).val()){
				$(selector).attr("selected","selected"); 
			}
		}
	}
	
	if($('#category2').val()!=""){ // 검색했다면 SB selected
		var category1_size = $('.search_category2 option').size(); // 카테고리 1 (선택,주소,매물명) SB의 Option 개수
		var category1 = $('#category2').val();
		
		for(var i=0;i < category1_size ; i++){
			var selector= ".search_category2 option:eq("+ i +")";
			if(category1 == $(selector).val()){
				$(selector).attr("selected","selected"); 
			}
		}
	}
	
	if($('#category3').val()!=""){ // 검색했다면 SB selected
		var category1_size = $('.search_category3 option').size(); // 카테고리 1 (선택,주소,매물명) SB의 Option 개수
		var category1 = $('#category3').val();
		
		for(var i=0;i < category1_size ; i++){
			var selector= ".search_category3 option:eq("+ i +")";
			if(category1 == $(selector).val()){
				$(selector).attr("selected","selected"); 
			}
		}
	}
	
	
	
	$('.boardN_page_cols2_contents_searchIcon').click(function(){ // 게시판 글(내용,글쓴이)검색
		goSearch(0);
	});
	
	
	
	$(".search_content").keypress(function(e) { // 엔터검색
	    if (e.keyCode == 13){
	    	goSearch(0);
	    }    
	});
	
	
	
   $('.search_category2').change(function(){ // 거래 카테고리 (매매, 전세, 월세)
	   goSearch(1);
    });
   
   $('.search_category3').change(function(){ // 거래 카테고리 (매매, 전세, 월세)
	   goSearch(1);
    });
   
   
});

function goSearch(chk){ //검색 함수
	var category = $('.search_category').val();
	var content = $('.search_content').val();
	var hidden = $('.search_hidden').val();
	var category2 = $('.search_category2 option:selected').text();
	var category3 = $('.search_category3 option:selected').text();
	
	if(chk == 0){
		if(content !="" &&category=="선택"){
			alert("검색 조건을 선택하세요");
			$('.search_category').focus();
			return false;
		}
	}
	
	
	hidden+="category="+category+"&content="+content+"&category2="+category2+"&category3="+category3;
	
	location.href=hidden;
}




