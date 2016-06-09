
$(document).ready(function() {
    $ (".nav a").hover(function(){
        $(".nav").addClass('navHover');
    },function(){
        $(".nav").removeClass('navHover');
    });
    $(window).scroll(function () {
        if ($(window).scrollTop() > 1) {
            $(".nav").addClass('navHover');
        } else {
            $(".nav").removeClass('navHover');
        }
    });
});
