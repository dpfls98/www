$(document).ready(function() {
    $(".menuOpen").toggle(function() {
        $("#gnb").slideDown('slow');
        $('#gnb').addClass('top0');
        $('.menuOpen').addClass('open');
    }, function() {
        $("#gnb").slideUp('fast');
        $('#gnb').removeClass('top0');
        $('.menuOpen').removeClass('open');
    });
    
    
     var current=0;

    $(window).resize(function(){ 
       var screenSize = $(window).width(); //가로 해상도
 
         if( screenSize > 1024){ //소형 테블릿 이상이면
           $("#gnb").show();
           current=1;
         }
         if(current==1 && screenSize <= 1024){ //모바일 해상도 에서는
           $("#gnb").hide();
           current=0;
         }
     }); 
     
   });