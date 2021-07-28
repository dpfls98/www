// JavaScript Document

$(document).ready(function(){
    var cnt=3;  //탭메뉴 개수 ***
    $('.tabs section').hide()
    $('.tabs section:eq(0)').show(); // 첫번째 탭 내용만 열어라
    $('.tabs .tab1').css('color','#c06').css('border-bottom','2px solid #c06'); //첫번째 탭메뉴 활성화
               //자바스크립트의 상대 경로의 기준은 => 스크립트 파일을 불러들인 html파일이 저장된 경로 기준***
      
      $('.tabs .tab').click(function(e){
          e.preventDefault();   // <a> href="#" 값을 강제로 막는다  
          
          var ind = $(this).index('.tabs .tab');  // 클릭시 해당 index를 뽑아준다
          //console.log(ind);

          $(".tabs section").hide(); //모든 탭내용을 안보이게...
          $(".tabs section:eq("+ind+")").show(); //클릭한 해당 탭내용만 보여라
          $('.tab').css('color','#333').css('border-bottom','none'); //모든 탭메뉴를 비활성화
          $(this).css('color','#c06').css('border-bottom','2px solid #c06'); // 클릭한 해당 탭메뉴만 활성화

     });
   

  });

