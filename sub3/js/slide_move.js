    $(document).ready(function () {
              //한페이에서 메뉴 클릭시 원하는 위치로 스무스하게 이동시키는 코드 
              $('.slideMenu a').click(function(e){
                  e.preventDefault();

                  var value=0;

                  if($(this).hasClass('link1')){  //첫번째 메뉴 버튼을 클릭하면
                     value= $('.slide_con:eq(0)').offset().top-200;  // 해당 요소의 상단(top)까지의 거리 
                  }else if($(this).hasClass('link2')){  //두번째 메뉴 버튼을 클릭하면
                     value= $('.slide_con:eq(1)').offset().top-200; 
                  }
                  
                  $("html,body").stop().animate({"scrollTop":value},1000);
              });
       });


//스타키,스크롤스타일
$(document).ready(function () {
        
   // $('.slideMenu li:eq(0)').find('a').addClass('spy');

   //첫번째 서브메뉴 활성화
   
   // $('.content_area section:eq(0)').addClass('boxMove');
   //첫번째 내용글 애니메이션 처리
   var smh3= $('.visual').height()+195;



   $(window).on('scroll',function(){
      var scroll = $(window).scrollTop();
      //스크롤top의 좌표를 담는다
   


      //sticky menu 처리
      if(scroll>smh3){ 
         $('.title_area .navBox').addClass('navOn');
         //스크롤의 거리가 350px 이상이면 서브메뉴 고정
         $('.slideMenu').addClass('menu_sticky');
         $('header').hide();
      }else{
         $('.title_area .navBox').removeClass('navOn');
         //스크롤의 거리가 350px 보다 작으면 서브메뉴 원래 상태로
         $('header').show();
         $('.slideMenu').removeClass('menu_sticky');
      }
      
      
      
      $('.slideMenu li').find('a').removeClass('spy');
      //모든 서브메뉴 비활성화~ 불꺼!!!
      
      
      //스크롤의 거리의 범위를 처리
      if(scroll>=500 && scroll<1000){
         $('.slideMenu li:eq(0)').find('a').addClass('spy');
         //첫번째 서브메뉴 활성
      }else if(scroll>=1000){
         $('.slideMenu li:eq(1)').find('a').addClass('spy');
         //두번째 서브메뉴 활성화
      }
   });
});

