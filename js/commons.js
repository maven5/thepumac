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
	
	
	$('.h_navi').hover(function(){
		//alert($(".h_navi_contents").css("display"));
		//$(".h_navi_contents").show('50');
		var disp = $(".h_navi_contents").css("display");
		if(disp=="none"){
			$(".h_navi_contents").slideDown('50');
		}
	},function(){
		$(".h_navi_contents").slideUp('50');
	});
	
	
	// 네비게이션 효과
	$('.h_navi_cols').hover(function() {
		$(this).css("border-bottom","3px solid #0b7eb4");	
	}, function(){
		$(this).css("border-bottom","0px solid #0b7eb4");	
	});
	
	$('.menuHover01').hover(function() {
		$(this).css("background","#0b7eb4");	
		$(this).children().css("color","white");	
	}, function(){
		$(this).css("background","");	
		$(this).children().css("color","#3c3c3c");	
	});
	
	$('.menuHover02').hover(function() {
		$(this).css("background","#0b7eb4");	
		$(this).children().css("color","white");	
	}, function(){
		$(this).css("background","");	
		$(this).children().css("color","#3c3c3c");	
	});
	
	$('.menuHover03').hover(function() {
		$(this).css("background","#0b7eb4");	
		$(this).children().css("color","white");	
	}, function(){
		$(this).css("background","");	
		$(this).children().css("color","#3c3c3c");	
	});
	
	$('.menuHover04').hover(function() {
		$(this).css("background","#0b7eb4");	
		$(this).children().css("color","white");	
	}, function(){
		$(this).css("background","");	
		$(this).children().css("color","#3c3c3c");	
	});
	
	$('.menuHover05').hover(function() {
		$(this).css("background","#0b7eb4");	
		$(this).children().css("color","white");	
	}, function(){
		$(this).css("background","");	
		$(this).children().css("color","#3c3c3c");	
	});
	
	$('.menuHover06').hover(function() {
		$(this).css("background","#0b7eb4");	
		$(this).children().css("color","white");	
	}, function(){
		$(this).css("background","");	
		$(this).children().css("color","#3c3c3c");	
	});
	
	$('.menuHover07').hover(function() {
		$(this).css("background","#0b7eb4");	
		$(this).children().css("color","white");	
	}, function(){
		$(this).css("background","");	
		$(this).children().css("color","#3c3c3c");	
	});
	
	$('.menuHover11').hover(function() {
		$('.menuHover1').css("border-bottom","4px solid #0b7eb4");	
	},function(){
		$('.menuHover1').css("border-bottom","0px solid #0b7eb4");	
	});
	
	$('.menuHover22').hover(function() {
		$('.menuHover2').css("border-bottom","4px solid #0b7eb4");	
	},function(){
		$('.menuHover2').css("border-bottom","0px solid #0b7eb4");	
	});
	
	$('.menuHover33').hover(function() {
		$('.menuHover3').css("border-bottom","4px solid #0b7eb4");	
	},function(){
		$('.menuHover3').css("border-bottom","0px solid #0b7eb4");	
	});
	
	$('.menuHover44').hover(function() {
		$('.menuHover4').css("border-bottom","4px solid #0b7eb4");	
	},function(){
		$('.menuHover4').css("border-bottom","0px solid #0b7eb4");	
	});
	
	$('.menuHover55').hover(function() {
		$('.menuHover5').css("border-bottom","4px solid #0b7eb4");	
	},function(){
		$('.menuHover5').css("border-bottom","0px solid #0b7eb4");	
	});
	
	$('.menuHover66').hover(function() {
		$('.menuHover6').css("border-bottom","4px solid #0b7eb4");	
	},function(){
		$('.menuHover6').css("border-bottom","0px solid #0b7eb4");	
	});
	
	$('.menuHover77').hover(function() {
		$('.menuHover7').css("border-bottom","4px solid #0b7eb4");	
	},function(){
		$('.menuHover7').css("border-bottom","0px solid #0b7eb4");	
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