
    $(document).ready(function(){
        $('.gallery li a').click(function(e){
            e.preventDefault();
            var ind = $(this).index('.gallery li a');
            //console.log(ind);

            $('.big').attr('src','./images/content3/big'+(ind+1)+'.jpg');
            $('.big').hide().fadeIn('fast');
        });
    });

