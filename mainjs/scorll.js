
$(document).ready(function () {
    // //첫번째 내용글 애니메이션 처리
    // var h1= $('#content section:eq(0)').offset().top-200 ;
    // var h2= $('#content section:eq(1)').offset().top-200 ;
    // var h3= $('#content section:eq(2)').offset().top-200 ;
    // var h4= $('#content section:eq(3)').offset().top-200 ;

     //스크롤의 좌표가 변하면.. 스크롤 이벤트
    $(window).on('scroll',function(){        
        if(scroll>300){
        $('#content section h3:eq(0)').addClass('boxMove');
        }if(scroll>1000){
        $('#content section h3:eq(1)').addClass('boxMove');
        }if(scroll>1300){
        $('#content section h3:eq(2)').addClass('boxMove');
        }if(scroll>1600){
        $('#content section h3:eq(3)').addClass('boxMove');
        }
    });

});
