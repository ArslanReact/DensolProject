// Quantitiy
// $(function() {
//     $('#increase').on('click', function() {
//         var $qty = $("#number");
//         var currentVal = parseInt($qty.val());
//         if (!isNaN(currentVal)) {
//             $qty.val(currentVal + 1);
//         }
//     });
//     $('#decrease').on('click', function() {
//         var $qty = $("#number");
//         var currentVal = parseInt($qty.val());
//         if (!isNaN(currentVal) && currentVal > 0) {
//             $qty.val(currentVal - 1);
//         }
//     });
// });


// $(function () {
//     CloudZoom.quickStart();
// });

//Go To Top:
$(window).on('scroll', function(event) { if ($(this).scrollTop() > 600) { $('.back-to-top').fadeIn(200) } else { $('.back-to-top').fadeOut(200) } });
$('.back-to-top').on('click', function(event) { event.preventDefault();
    $('html, body').animate({ scrollTop: 0, }, 1500); });


// menu mobile
$(document).ready(function() {
    "use strict";
    $('.menu > ul > li:has( > ul)').addClass('menu-dropdown-icon');
    $('.menu > ul > li > ul:not(:has(ul))').addClass('normal-sub');
    $(".menu > ul").before("<a href=\"#\" class=\"menu-mobile\">&nbsp;</a>");
    $(".menu > ul > li").hover(function(e) {
        if ($(window).width() > 943) {
            $(this).children("ul").stop(true, false).fadeToggle(150);
            e.preventDefault();
        }
    });
    $(".menu > ul > li span.ptpt").click(function(e) {
        if ($(window).width() <= 943) {
            $(this).parent("li").children("ul").fadeToggle(150);
        }
    });
    $(".menu-mobile").click(function(e) {
        $(".menu > ul").toggleClass('show-on-mobile');
        e.preventDefault();
    });
    $('html').click(function(event) {
        if ($(event.target).closest('.menu').length === 0) {
            $(".menu > ul > li").children("ul").hide();
            $(".menu > ul").removeClass('show-on-mobile');
        }
    });
});