

$(document).ready(function(){

  var memo = ['가족愛발견','엄마愛발견',
              '태마여행','여행습관',
            '여행의 국가대표1','여행의 국가대표2',
          '10년 연속 1등수상','하나투어 20주년'];  
 
  $('.pop .pop_menu a').click(function(e){
      e.preventDefault();

      var ind = $(this).index('.pop .pop_menu a');

      $('.pop .modal_box').fadeIn('fast');
      $('.pop .popup').fadeIn('slow');

      $('.pop .popup img').attr('src','./images/content3/big'+(ind+1)+'.jpg');
      $('.pop .popup p').text(memo[ind]);

  });

  $('.close_btn,.pop .modal_box').click(function(e){
      e.preventDefault();
      $('.pop .modal_box').hide();
      $('.pop .popup').hide();
  });
});

