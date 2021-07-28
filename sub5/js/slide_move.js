    $(document).ready(function () {
              //한페이에서 메뉴 클릭시 원하는 위치로 스무스하게 이동시키는 코드 
              $('.slideMenu a').click(function(e){
                  e.preventDefault();

                  var value=0;

                  if($(this).hasClass('link1')){  //첫번째 메뉴 버튼을 클릭하면
                     value= $('.slide_con:eq(0)').offset().top-200;  // 해당 요소의 상단(top)까지의 거리 
                  }else if($(this).hasClass('link2')){  //두번째 메뉴 버튼을 클릭하면
                     value= $('.slide_con:eq(1)').offset().top-200; 
                  }else if($(this).hasClass('link3')){
                     value= $('.slide_con:eq(2)').offset().top-200; 
                  }else if($(this).hasClass('link4')){
                     value= $('.slide_con:eq(3)').offset().top-200; 
                  }
                  
                  $("html,body").stop().animate({"scrollTop":value},1000);
              });
       });



      //Q&A--5_4
      $(document).ready(function () {
         var article = $('.faq .article');  //모든 질문 답변 리스트
         //article.find('.a').slideUp(100); // 모든 답변 닫아라
          article.find('span').html('<i class="fas fa-chevron-down"></i>');
          $('.faq .article:first').find('.a').slideDown(100);
          $('.faq .article:first').find('span').html('<i class="fas fa-chevron-up"></i>');
         
         $('.faq .article .trigger').click(function(e){  // 각각의 질문을 클릭하면
             e.preventDefault();  //<a href="#"> 태그 링크 처리
              var myArticle = $(this).parents('.article'); //클릭한 해당 list 
         
              if(myArticle.hasClass('hide')){   //클릭한 해당 리스트의 상태가 hide냐?? 답변이 닫혀있냐??
                  article.find('.a').slideUp(100); //모든 답변을 닫아라
                  article.removeClass('show').addClass('hide'); // 모든 리스트를 hide교체
                  article.find('span').html('<i class="fas fa-chevron-down"></i>');
      
                  myArticle.removeClass('hide').addClass('show');  // show로 바꾼다 
                  myArticle.find('.a').slideDown(100);  //해당 리스트의 답변을 열어라  
                  myArticle.find('span').html('<i class="fas fa-chevron-up"></i>');
              } else {  // 'show' 답변이 열려있냐??
                  myArticle.removeClass('show').addClass('hide');  // hide로 바꾼다 
                  myArticle.find('.a').slideUp(100);  //해당 리스트의 답변을 닫아라  
                  myArticle.find('span').html('<i class="fas fa-chevron-down"></i>');
              }  
        });
        
        //모두 여닫기 처리
        $('.all').toggle(function(e){
              e.preventDefault(); 
              article.find('.a').slideDown(100);
              article.removeClass('hide').addClass('show');
              article.find('span').html('<i class="fas fa-chevron-up"></i>');
              $(this).text('닫기▲');
        },function(e){
              e.preventDefault(); 
              article.find('.a').slideUp(100);
              article.removeClass('show').addClass('hide');
              article.find('span').html('<i class="fas fa-chevron-down"></i>');
              $(this).text('전체보기▼');
        });
      
      }); 
      


      //스타키,스크롤스타일
$(document).ready(function () {
        
   // $('.slideMenu li:eq(0)').find('a').addClass('spy');

   //첫번째 서브메뉴 활성화
   
   // $('.content_area section:eq(0)').addClass('boxMove');
   //첫번째 내용글 애니메이션 처리
   var smh2= $('.visual').height()+195;
   var h2_1= $('.content_area section:eq(0)').offset().top-500 ;
   var h2_2= $('.content_area section:eq(1)').offset().top-500 ;
   var h2_3= $('.content_area section:eq(2)').offset().top-500 ;

   $(window).on('scroll',function(){
      var scroll = $(window).scrollTop();
      //스크롤top의 좌표를 담는다
   


      //sticky menu 처리
      if(scroll>smh2){ 
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
      if(scroll>=h2_1 && scroll<h2_2){
         $('.slideMenu li:eq(0)').find('a').addClass('spy');
         //첫번째 서브메뉴 활성
      }else if(scroll>=h2_2 && scroll<h2_3){
         $('.slideMenu li:eq(1)').find('a').addClass('spy');
         //두번째 서브메뉴 활성화
      }else if(scroll>=h2_3){
         $('.slideMenu li:eq(2)').find('a').addClass('spy');
         //세번째 서브메뉴 활성화
      }
   });
});

