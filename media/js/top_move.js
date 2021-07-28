

var op = false;  //네비가 열려있으면(true) , 닫혀있으면(false)
var scroll_onoff=0;
var mouse_onoff=0;

$(document).ready(function(){


    $('.top_btn').click(function(e){
        e.preventDefault();
        //탑버튼 클릭 시 탑으로 이동
        $("html,body").stop().animate({"scrollTop":0},1000); 
    });

    $(window).on('scroll',function(){
        var scroll = $(window).scrollTop();
        //sticky menu 처리
        if(scroll>350){ 
            $('#headerArea').css('background','rgb(0,0,0)');
    
        }else{
            $('#headerArea').css('background','rgba(0,0,0,.3)');
        }
    });
});








