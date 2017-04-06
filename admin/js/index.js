/*
 * index.js 
 * 
 * 
 * 
 * 
 * 
 */




$(document).ready(function(){
    $(".content_left_menu>div").click(function(){ // 좌측 네비(메뉴) 클릭 이벤트 
        var submenu = $(this).next("ul");
        
         // submenu 가 화면상에 보일때는 위로 보드랍게 접고 아니면 아래로 보드랍게 펼치기
        if( submenu.is(":visible") ){
            submenu.slideUp();
        }else{
            submenu.slideDown();
        }
    });/* .mouseover(function(){
        $(this).next("ul").slideDown();
    }); */
});