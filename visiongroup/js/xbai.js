
$(document).ready(function() {


    var tag = 0;
    $(".button4Mob").click(function(){
        if (tag==0) {
            tag = 1;
            $(".left-banner").addClass('left-banner-block');
            $(".button4Mob").css('transform','rotate(45deg)');
        } else {
            tag = 0;
            $(".left-banner").removeClass('left-banner-block');
            $(".button4Mob").css('transform','rotate(0deg)');
        }
    });
    $(window).scroll(function () {
        if ($(window).scrollTop() > 1) {
            $(".nav").addClass('navHover');
        } else {
            $(".nav").removeClass('navHover');
        }
    });
});
