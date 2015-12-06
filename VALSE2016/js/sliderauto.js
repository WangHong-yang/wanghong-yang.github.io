$(document).ready(function(){

    var btns = $("#slideshow > nav > span");
    var time = 7000;
    var onslide = 0;


    setInterval(changeSlide, time);

    function changeSlide() {
        onslide = onslide + 1;
        if(onslide==6) {
            onslide = 0;
            btns[onslide].click();
        } else {
            btns[onslide].click();
        }
    }



    $(window).scroll(function(){
        var s=$(window).scrollTop();
        var w=$(window).width();
        // if(s>260){
        //     $('.sec1cover').addClass('sec1coveropacity');
        // } else {
        //     $('.sec1cover').removeClass('sec1coveropacity');
        // }
        if (w>=1000){
            $(".sec1cover").css("opacity",0.5+(s-100)/800>1?1:0.5+(s-100)/800);
        } else {
            $(".sec1cover").css("opacity",1-(s-100)/200<0.7?0.7:1-(s-100)/200);
        }
        //$(".sec1cover").css("opacity",0.5+(s-100)/800>1?1:0.5+(s-100)/800); // fade: 1-(s-100)/200<0.7?0.7:1-(s-100)/200
        if (s<=1000){
            $(".pagefooter").css("display","none");
        } else {
            $(".pagefooter").css("display","block");
        }

        if (s>=160) {
            $("#title").css("display","none");
        } else {
            $("#title").css("display","block");
        }

    });


});













