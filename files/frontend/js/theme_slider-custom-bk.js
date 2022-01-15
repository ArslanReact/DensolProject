// Navbar styles switcher for scrolled navbar
function scrolled_navbar() {
    var scroll = window.scrollY;
    if (scroll > 0) {
        //   $(".navbar-dark").addClass("navbar-light");
        //   $(".navbar-dark").addClass("navbar-dark-scrolled");
        //   $(".navbar-dark-scrolled").removeClass("navbar-dark");
        $("header .navbar").addClass("navbar-light-scrolled");
    } else {
        //   $(".navbar-dark-scrolled").removeClass("navbar-light");
        //   $(".navbar-dark-scrolled").addClass("navbar-dark");
        //   $(".navbar-dark").removeClass("navbar-dark-scrolled");
        $("header .navbar").removeClass("navbar-light-scrolled");
    }
}


// Scrolled navbar init
$(window).scroll(function() { scrolled_navbar(); });
$(document).ready(function() { scrolled_navbar(); });


// Auto-hide for navbar
$(".auto-hiding-navbar").autoHidingNavbar({
    "animationDuration": 300,
    "showOnBottom": false
});




// menu navbar
// var loc = window.location;
// $("ul.navbar-nav").find("a").each(function() {
//     $(this).attr("href") == loc && $(this).parent("a").addClass("active")
// });

$('ul.navbar-nav').click(function() {
    $($(this).attr('href')).addClass('active').siblings().removeClass('active')
})


/* ======================================== Scroll to top ======================================== */
if ($('#scroll-top').length) {
    function scrollToTop() {
        var $scrollUp = $('#scroll-top'),
            $lastScrollTop = 0,
            $window = $(window);

        $window.on('scroll', function() {
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

        $scrollUp.on('click', function(evt) {
            $('html, body').animate({ scrollTop: 0 }, 600);
            evt.preventDefault();
        });
    }
    scrollToTop();
}

/* ======================================== collapse pluse minus ======================================== */
$(document).ready(function() {
    // Add minus icon for collapse element which is open by default
    $(".collapse.show").each(function() {
        $(this).prev(".card-header").find(".fas").addClass("fa-minus").removeClass("fa-plus");
    });

    // Toggle plus minus icon on show hide of collapse element
    $(".collapse").on('show.bs.collapse', function() {
        $(this).prev(".card-header").find(".fas").removeClass("fa-plus").addClass("fa-minus");
    }).on('hide.bs.collapse', function() {
        $(this).prev(".card-header").find(".fas").removeClass("fa-minus").addClass("fa-plus");
    });
});


/* ======================================== scrollWithEase ======================================== */
jQuery(document).ready(function() {
    $(".dropdown").hover(
        function() {
            $('.dropdown-menu', this).fadeIn(300);
        },
        function() {
            $('.dropdown-menu', this).fadeOut(300);
        });
});

// // You can write your custom Javascript here
// $(document).ready(function() {
//   var rellax = new Rellax('.rellax');
// });


/* ======================================== Quantitiy======================================== */
$(function() {
    $('#increase').on('click', function() {
        var $qty = $("#number");
        var currentVal = parseInt($qty.val());
        if (!isNaN(currentVal)) {
            $qty.val(currentVal + 1);
        }
    });
    $('#decrease').on('click', function() {
        var $qty = $("#number");
        var currentVal = parseInt($qty.val());
        if (!isNaN(currentVal) && currentVal > 0) {
            $qty.val(currentVal - 1);
        }
    });
});


$(function() {
    $('#increase1').on('click', function() {
        var $qty = $("#number1");
        var currentVal = parseInt($qty.val());
        if (!isNaN(currentVal)) {
            $qty.val(currentVal + 1);
        }
    });
    $('#decrease2').on('click', function() {
        var $qty = $("#number1");
        var currentVal = parseInt($qty.val());
        if (!isNaN(currentVal) && currentVal > 0) {
            $qty.val(currentVal - 1);
        }
    });
});

// 
$('.kit-slidee').owlCarousel({
    loop: true,
    margin: 10,
    responsiveClass: true,
    autoplay: true,
    autowidth: false,
    autoplayTimeout: 3000,
    navText: ['<i class="fas fa-long-arrow-alt-left"></i>', '<i class="fas fa-long-arrow-alt-right"></i>'],
    responsive: {
        0: {
            items: 1,
            nav: true
        },
        600: {
            items: 1,
            nav: false
        },
        1000: {
            items: 4,
            nav: true,
        }
    }
});