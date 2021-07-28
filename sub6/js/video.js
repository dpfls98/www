
      $(document).ready(function () {
          $('.tabs ul .conlist:eq(0)').show();  //첫번째 탭 내용만 열어라

          $('.video ul li a').click(function(){
              $("html,body").stop().animate({"scrollTop":830},1000);
              
              var ind = $('.video ul li a').index(this);

              $(".tabs ul .conlist").hide(); //모든 탭내용을 숨긴다.
              $(".tabs ul .conlist:eq("+ind+")").fadeIn(); //클릭한 해당 탭 내용만 보여라 

          });
      });