$(document).ready(function(){
   //시리즈 - 탭스
    var info=$('.actor_box');
    
    $('.title_actor a').click(function(e){//각각질문클릭
        e.preventDefault();
        var selectBox=$(this).parents('.actor_box'); //변수생성
        var findImg=$(this).parents('.actor_wrap').children('.img_wrap').find('img');//변수생성
        
        if(selectBox.hasClass('hide')){  //actor_box에 hide이 있으면~
            info.find('.actor_info').slideUp(200);// 위로 사라져라?
            info.removeClass('show').addClass('hide').removeClass('active');
            selectBox.removeClass('hide').addClass('show').addClass('active');
            selectBox.find('.actor_info').slideDown(200);
        };
        if(selectBox.hasClass('link1')){
            findImg.attr('src','images/harry_potter.jpg');
        }else if(selectBox.hasClass('link2')){
            findImg.attr('src','images/hermione_granger.jpg');
        }else if(selectBox.hasClass('link3')){
            findImg.attr('src','images/ronald_weasley.jpg');
        };
    });
    
    //높이맞추기
    var boxHeight =  $('.actor_wrap div:eq(0)').height(); 
    
    $(".actor_wrap .img_wrap img").height(boxHeight).width('auto');
    
    $(window).resize(function(){
        var boxHeight =  $('.actor_wrap div:eq(0)').height(); 
        
        $(".actor_wrap .img_wrap img").height(boxHeight).width('auto');
        
    });
    
    
    
    
   
});
