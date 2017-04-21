$(function(){
    //전역변수선언
    var editor_object = [];
     
    nhn.husky.EZCreator.createInIFrame({
        oAppRef: editor_object,
        elPlaceHolder: "b_content",
        sSkinURI: "/thepumac/smartEditor/SmartEditor2Skin.html", 
        htParams : {
            // 툴바 사용 여부 (true:사용/ false:사용하지 않음)
            bUseToolbar : true,             
            // 입력창 크기 조절바 사용 여부 (true:사용/ false:사용하지 않음)
            bUseVerticalResizer : false,     
            // 모드 탭(Editor | HTML | TEXT) 사용 여부 (true:사용/ false:사용하지 않음)
            bUseModeChanger : true, 
        }
    });
    
   
    $('.boardWF_writeB').click(function(){ // 유효성검사
    	editor_object.getById["b_content"].exec("UPDATE_CONTENTS_FIELD", []);
    	
    	var board_category = $('select[name=b_type]');
    	var b_subject = $('input[name=b_subject]');
    	var b_content = $('textarea[name=b_content]');
    	
    	if(board_category.val()=="선택"){
    		alert("카테고리를 선택하세요");
    		board_category.focus();
    		return false;
		}else if(b_subject.val()==""){
			alert("제목을 적어주세요");
			b_subject.focus();
    		return false;
    	}else if(b_content.val()==""){
			alert("내용을 적어주세요");
			b_content.focus();
    		return false;
    	}
    	
		$('.boardWriteForm').submit();
	});
});


