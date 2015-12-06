$(document).ready(function(){

    var ww=$(window).width();
    
    if (ww > 1000) {
        $('.section2').addClass('wideScreenStyle');
        $('.section2wraper').addClass('wideScreenStyleSub');
        $('.section2wraper>h2').css('margin-top', '0');
        $('.section2wraper>h2').css('margin-top', '0');
        $('.longnews').css('height', '280px');
        $('.longnews').css('overflow', 'auto');
    } else {
        $('.section2').removeClass('wideScreenStyle');
        $('.section2wraper').removeClass('wideScreenStyleSub');
        $('.section2wraper>h2').css('display', 'block');
    }

    if (ww < 500) {
        $('.slides').css('height','370px');
    }


});













