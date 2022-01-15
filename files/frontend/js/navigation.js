$(function() {
    "use strict";
    $(window).on('load', function(event) {
      $('.preloader').delay(500).fadeOut(500);
    }
    );

    $(window).on('scroll', function(event) {
        var scroll=$(window).scrollTop();
        if(scroll<110) {
            $(".navigation").removeClass("sticky");
            $(".navigation .navbar-brand img").attr("src", "files/frontend/images/logo-2.png");
        }
        else {
            $(".navigation").addClass("sticky");
            $(".navigation .navbar-brand img").attr("src", "files/frontend/images/logo-2.png");
        }
    }
    );
    // Add minus icon for collapse element which is open by default
$(".collapse.show").each(function(){
    $(this).prev(".card-left").find(".fa").addClass("fa-minus").removeClass("fa-plus");
  });
  
  // Toggle plus minus icon on show hide of collapse element
  $(".collapse").on('show.bs.collapse', function(){
    $(this).prev(".card-left").find(".fa").removeClass("fa-plus").addClass("fa-minus");
  }).on('hide.bs.collapse', function(){
    $(this).prev(".card-left").find(".fa").removeClass("fa-minus").addClass("fa-plus");
  });

}
);