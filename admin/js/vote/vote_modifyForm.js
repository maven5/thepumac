$(document).ready(function(){
	//$('input[name=v_dateS]').val($.datepicker.formatDate('yy-mm-dd', new Date())); //현재날짜입력

	$('.boardWF_col3').click(function(){ // 종료날짜 제이쿼리 달력표시
		$('#v_dateE').datepicker("show");
	});

	$( "#v_dateE" ).datepicker({ // datepicker 옵션
		changeMonth: true, 
        dayNames: ['월요일', '화요일', '수요일', '목요일', '금요일', '토요일', '일요일'],
        dayNamesMin: ['월', '화', '수', '목', '금', '토', '일'], 
        monthNamesShort: ['1월','2월','3월','4월','5월','6월','7월','8월','9월','10월','11월','12월'],
        monthNames: ['1월','2월','3월','4월','5월','6월','7월','8월','9월','10월','11월','12월'],
        minDate: 1,
        dateFormat: "yy-mm-dd"
	 });

	
	
	/////////////////////// 2. 세부내용 - 항목만들기 ///////////////////////
	
	var item = $('.bVote_rows').length; // 투표 항목수 전역변수
	var v_idx = $('#v_idx').val(); // v_idx 
	
	 $('.bVote_makeButton').click(function(){ // 항목 추가하기
		 	if(item <=10){
			 	var content = 
				 	'<div class="bVote_rows">'
				 	+'<div class="bVote_cols1"> 투표항목 </div>'
					+'<div class="bVote_cols2"><input type="text" name="v2_subject[]"></div>'
					+'<div class="bVote_cols3 itemSave">저장</div>'
					+'<div class="bVote_cols3 itemDelete" style="background: #8C8C8C;">삭제</div>'
					+'<input type="hidden" name="v2_subChk" value="0">'
					+'<input type="hidden" name="v2_idx" value="0">'
					+'</div>';
				$('.bVote_list').append(content);
				item++;
		 	}
		 	else{
				alert('최대 10개 항목까지만 만들 수 있습니다');
				return false;
			 }
	 });
	 
	 $(document).on("click",".itemSave",function(){  // 아이템 저장버튼
		 var v2_idx = $(this).next().next().next().val(); // 기존에 있던 항목인지 구별변수
		 var v2_subject = $(this).prev().children().val(); // 항목 데이터
		 if( $(this).prev().children().val()==""){
			 alert('내용을 입력하세요!');
			 return false;
		 }
		 
		if(v2_idx!=0) { // update( 기존 항목 수정 )
			 if(confirm('기존에 있던 항목입니다. \n수정하시겠습니까?'))
				 location.href="/pumac2/action/vote/vote_small_update.php?v_idx="+v_idx+"&v2_idx="+v2_idx+"&v2_subject="+v2_subject;
		}else{ // insert ( 새 항목 추가 )
			 if(confirm('새 항목을 추가하시겠습니까?'))
				 location.href="/pumac2/action/vote/vote_small_insert.php?v_idx="+v_idx+"&v2_idx="+v2_idx+"&v2_subject="+v2_subject;
		}
	 });


	 $(document).on("click",".itemDelete",function(){  // 아이템 삭제버튼
		 var v2_idx = $(this).next().next().val(); // 기존에 있던 항목인지 구별변수
		 if(item==1){
			 alert('투표항목은 최소한 1개 이상 있어야합니다.');
			 return false;
		 }else if(v2_idx!=0) { 
			 if(confirm('기존에 있던 항목입니다. \n삭제하시겠습니까?'))
				 location.href="/pumac2/action/vote/vote_small_delete.php?v_idx="+v_idx+"&v2_idx="+v2_idx;
			 else
			 	return false;
		 }
			 
		 $(this).parent().remove();
		 item--; // 아이템 개수 감소
	 });
	 /////////////////////// 항목만들기 END ///////////////////////
	 
	 
	 
	 
	 
	 
	 /////////////////////// 스마트 에디터 ///////////////////////
	 var editor_object = [];
     
	    nhn.husky.EZCreator.createInIFrame({
	        oAppRef: editor_object,
	        elPlaceHolder: "v_content",
	        sSkinURI: "/pumac2/smartEditor/SmartEditor2Skin.html", 
	        htParams : {
	            // 툴바 사용 여부 (true:사용/ false:사용하지 않음)
	            bUseToolbar : true,             
	            // 입력창 크기 조절바 사용 여부 (true:사용/ false:사용하지 않음)
	            bUseVerticalResizer : false,     
	            // 모드 탭(Editor | HTML | TEXT) 사용 여부 (true:사용/ false:사용하지 않음)
	            bUseModeChanger : true, 
	        }
	    });
	  /////////////////////// 스마트 에디터  end ///////////////////////
	    
	    
	    
	 
	 
	 
	 /////////////////////// 유효성 검사 ///////////////////////
	    $(document).on("click",".boardWF_writeB",function(){
	    	editor_object.getById["v_content"].exec("UPDATE_CONTENTS_FIELD", []);
	    	
	    	var v_subject = $('input[name=v_subject]');
	    	var v_content = $('textarea[name=v_content]');
	    	var v_dateS = $('input[name=v_dateS]');
	    	var v_dateE = $('input[name=v_dateE]');
	    	var v2_subject = $('input[name="v2_subject[]"]');
	    	var v2_hidden = $('input[name=v2_subChk]');
	    	 
	    	if(v_subject.val()==""){
	    		alert("제목을 적어주세요");
	    		v_content.focus();
	    		return false;
			}else if(v_content.val()==""){
				alert("내용을 적어주세요");
				v_content.focus();
	    		return false;
	    	}else if(v_dateE.val()==""){
				alert("종료일자를 선택하세요");
				v_dateE.focus();
	    		return false;
	    	}
	    	    	
	    		    	
	    	v_dateS.removeAttr("disabled"); // 날짜 disabled 제거
	    	v_dateE.removeAttr("disabled");
			$('.boardWriteForm').submit(); 
		});
	 /////////////////////// 유효성 검사 end ///////////////////////

	 
});