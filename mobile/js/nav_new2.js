$(document).ready(function() {
   var op = false;  //네비가 열려있으면(true) , 닫혀있으면(false)
 	
   $(".menu_ham").click(function(e) { //메뉴버튼 클릭시
      e.preventDefault();   

       var documentHeight =  $(document).height();
       $(".box").css('height',documentHeight);
       $("#gnb").css('height',documentHeight); 

      if(op==false){
        $("#gnb").animate({right:0,opacity:1}, 'fast');
        $('#headerArea').addClass('mn_open');
        $(".box").show();
        op=true;
      }else{
        $("#gnb").animate({right:'-100%',opacity:0}, 'fast');
        $('#headerArea').removeClass('mn_open');
        $(".box").hide();
        op=false;
      }

   });
   
   
    //2depth 메뉴 교대로 열기 처리 
    var onoff=[false,false,false,false];
    var arrcount=onoff.length;
    
    console.log(arrcount);
    
    $('#gnb .depth1 h3 a').click(function(e){
      e.preventDefault();
        var ind=$(this).parents('.depth1').index();
        
        console.log(ind);
        
       if(onoff[ind]==false){
        //$('#gnb .depth1 ul').hide();
        $(this).parents('.depth1').find('ul').slideDown('slow');
        $(this).parents('.depth1').siblings('li').find('ul').slideUp('fast');
         for(var i=0; i<arrcount; i++) onoff[i]=false; 
         onoff[ind]=true;
           
         $('.depth1 span').text('+');   
         $(this).find('span').text('-'); 

         $(this).parents('.depth1').siblings('li').find('.depth1_tt').css('color','#333');


         $(this).css('color','#c06');
         $('.depth1 ul').css('border-top','2px solid #c06');
            
       }else{
         $(this).parents('.depth1').find('ul').slideUp('fast'); 
         onoff[ind]=false;   
           
         $(this).find('span').text('+');  
         $(this).css('color','#333');   
       }
    });    
  
  });


