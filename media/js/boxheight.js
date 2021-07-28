$(document).ready(function() {

    var boxHeight =  $('.book_box .book').height(); //왼쪽에있는 박스의 높이
  // $(".box2 div:eq(1)").css('height',boxHeight);
  $(".book_box .text").height(boxHeight); //위에랑 같은값(height 대신 width를 넣으면 넓이가 같아짐)
  
  
   $(window).resize(function(){ 
       boxHeight =  $('.book_box .book').height(); 
     $(".book_box .text").css('height',boxHeight);
   });

});