$(document).ready(function(){
	
	/*$('.h_navi').hover(function(){
		$('.h_navi_contents').css("visibility","visible");
	},function(){
		$('.h_navi_contents').css("visibility","hidden");
	});
	
	
	$('.h_navi_contents').hover(function(){
		$('.h_navi_contents').css("visibility","visible");
	},function(){
		$('.h_navi_contents').css("visibility","hidden");
	});
	*/
	
	//var navi_timer=1;
	
	
	/*$('.h_navi').mouseenter(function(){
		//alert($(".h_navi_contents").css("display"));
		//$(".h_navi_contents").show('50');
		var disp = $(".h_navi_contents").css("display");
		if(disp=="none"){
			if(!$(".h_navi_contents").is(':animated')){
				$(".h_navi_contents").stop(true,false).slideDown('100');
				console.log("aa");
			}
		}
	}).mouseleave(function(){
		setTimeout(function(){
				$(".h_navi_contents").stop(true,false).slideUp('50');
		}, 1000);
	});*/
	
	$('.h_navi').hover(function() {
		//if(!$(".h_navi_contents").is(':animated')){$('.h_navi_contents').slideToggle('slow');}
		$('.h_navi_contents').stop().animate({height:"155px"},500);
		$('.h_navi_contents_cols').stop().animate({height:"155px"},500);
	},function(){
		$('.h_navi_contents').stop().animate({height:"0px"},500);
		$('.h_navi_contents_cols').stop().animate({height:"0px"},500);
	});
	
	
	// 네비게이션 효과
	$('.h_navi_cols').hover(function() {
		$(this).css("background","");
		$(this).css("color","#0B7EC8)");
		$(this).css("font-size","17px");
		$(this).css("font-weight","bold");
	}, function(){
		$(this).css("color","black");
		$(this).css("font-size","14px");
	});
	
	
	// 상단메뉴 마우스오버 글자색 변경
	$('.h_navi_contents_cols').hover(function(){
		var menuStr = $(this).attr("class");
		var menuStrIdx = menuStr.indexOf("menuHover")
		var findStr = menuStr.substring(menuStrIdx+10,menuStrIdx+11);
		
		$('.menuHover'+findStr).css("color","#0B7EC8");
		$('.menuHover'+findStr).css("font-size","17px");
	},function(){
		var menuStr = $(this).attr("class");
		var menuStrIdx = menuStr.indexOf("menuHover")
		var findStr = menuStr.substring(menuStrIdx+10,menuStrIdx+11);
		
		$('.menuHover'+findStr).css("color","black");
		$('.menuHover'+findStr).css("font-size","14px");
	});
	
	
	// 모바일 헤더
	$('.aside_category_title').click(function(){
		$(this).next().toggle("slow");
	});
	
	
	// 로그인 버튼
	$('.aside_loginB').click(function(){
		$('.boardWriteForm').submit();
	});
	
	$(".password1").keypress(function(e) { // 엔터검색
	    if (e.keyCode == 13){
	    	$('.boardWriteForm').submit();
	    }    
	});

	$("input[name=m_id]").keypress(function(e) { // 엔터검색
	    if (e.keyCode == 13){
	    	$('.boardWriteForm').submit();
	    }    
	});
	
	

	
});