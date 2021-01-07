$(function(){

    if($('target').length > 0){

        var el = '#'+$('target').attr('target');
        var divScroll = $(el).offset().top;
        $('html,body').animate({'scrollTop':divScroll});
    }

})
