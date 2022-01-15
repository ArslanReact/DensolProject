


  // menu navbar
var loc = window.location;
//alert(loc);
$('ul.navbar-nav').find('a').each(function() {
    //alert($(this).attr('href')+" - "+loc)
    if ($(this).attr('href') == loc) {
        $(this).parent('li').addClass('active');
        //alert(loc);
    }
    //  $(this).toggleClass('active', $(this).attr('href') == loc);
});


/* ======================================== Scroll to top ======================================== */
   if ($('#scroll-top').length) {
    function scrollToTop() {
        var $scrollUp = $('#scroll-top'),
            $lastScrollTop = 0,
            $window = $(window);

        $window.on('scroll', function () {
            var st = $(this).scrollTop();
            if (st > $lastScrollTop) {
                $scrollUp.removeClass('show');
            } else {
                if ($window.scrollTop() > 200) {
                    $scrollUp.addClass('show');
                } else {
                    $scrollUp.removeClass('show');
                }
            }
            $lastScrollTop = st;
        });

        $scrollUp.on('click', function (evt) {
            $('html, body').animate({ scrollTop: 0 }, 600);
            evt.preventDefault();
        });
    }
    scrollToTop();
}

/* ======================================== plus minus ======================================== */

$(".collapse.show").each(function(){
    $(this).prev(".card-left").find(".fas").addClass("fa-angle-up").removeClass("fa-angle-down");
  });
  $(".collapse").on('show.bs.collapse', function(){
    $(this).prev(".card-left").find(".fas").removeClass("fa-angle-down").addClass("fa-angle-up");
  }).on('hide.bs.collapse', function(){
    $(this).prev(".card-left").find(".fas").removeClass("fa-angle-up").addClass("fa-angle-down");
  });



/* ======================================== scrollWithEase ======================================== */
(function($) {
    "use strict";

    $('html').scrollWithEase({
        frameRate: 100,
        animationTime: 2000,
        stepSize: 87,
        pulseAlgorithm: true,
        pulseScale: 6,
        pulseNormalize: 1,
        accelerationDelta: 20,
        accelerationMax: 1,
        keyboardSupport: true,
        arrowScroll: 50
    });

})(jQuery);

