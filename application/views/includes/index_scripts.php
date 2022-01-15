
<script src="<?php echo base_url();?>files/frontend/js/theme-bootstrap.bundle.js"></script>
<script src="<?php echo base_url();?>files/frontend/js/autohidingnavbar.min.js"></script>
<script src="<?php echo base_url();?>files/frontend/js/owl.carousel.min.js"></script>
<script src="<?php echo base_url();?>files/frontend/js/theme_slider-custom.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"></script>
<script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>
<script src="<?php echo base_url();?>files/frontend/cloudzoom/cloudzoom.js"></script>
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
<script>
$(document).ready(function(){
    $('.pagination li a').addClass('page-link'); 
});
(function($) {
    $('#ajaxd-select2').on('change', function() {
      var ttname = $('#tname').val();
      var ttval = $('#tval').val();
      if(ttname==""){
      var csrfName = '<?php echo $this->security->get_csrf_token_name(); ?>',
      csrfHash = '<?php echo $this->security->get_csrf_hash(); ?>';
      } else {
      var csrfName = ttname,
      csrfHash = ttval;
      }
      console.log(csrfHash);
      var id= $(this).val();
        $.ajax({
          type:"post",
          url: "<?php echo base_url(); ?>cms/ajax-request",
          data:{ [csrfName]: csrfHash, cid: id },
          dataType:'json',
          success:function(data)
          {
            //alert(data.csrfName);
            $('#tname').val(data.csrfName);
            $('#tval').val(data.csrfHash);
              $("#ajaxd-posts").html(data.content);
          }
      })
    });
})(jQuery);

</script>

<script type="text/javascript">(function($) {$("#ajaxd-select").change(function(){window.location=$(this).find("option:selected").data("permalink");});})(jQuery);</script>

<script type="text/javascript">
// var preloader = document.getElementById('loading');
// function myFunction(){
//     preloader.style.display = 'none';
// }


$(function(){

$('#contactbtn').click(function(e){
  e.preventDefault();
    $('#mytabs a[href="#tab3primary"]').tab('show');
    $('html,body').animate({scrollTop: $("#mytabs").offset().top-170},'slow');
});
$('#readbtn').click(function(e){
  e.preventDefault();
    $('html,body').animate({scrollTop: $("#mytabs").offset().top-170},'slow');
})
});

function changeImage(imgPath) {
    var curImage = document.getElementById('lImg');
    curImage.src = imgPath;
}





<?php if(!empty($form_action)){?>$('html,body').animate({scrollTop: $("#mytabs").offset().top-170},'slow');<?php }?>

// $(function(){
//   var hash = window.location.hash;
//   hash && $('ul.nav.nav-tabs a[href="' + hash + '"]').tab('show'); 
//   $('ul.nav.nav-tabs a').click(function (e) {
//      $(this).tab('show');
//      var scrollmem = $('body').scrollTop();
//      window.location.hash = this.hash;
//   });
// });


$(function () {
    $('#increase').on('click',function(){
        var $qty=$("#number");
        var currentVal = parseInt($qty.val());
        if (!isNaN(currentVal)) {
            $qty.val(currentVal + 1);
        }
    });
    $('#decrease').on('click',function(){
        var $qty=$("#number");
        var currentVal = parseInt($qty.val());
        if (!isNaN(currentVal) && currentVal > 0) {
            $qty.val(currentVal - 1);
        }
    });
});
</script>

<script>
    new WOW().init();

    $(function(){
        $('#zoom1').bind('click',function(){            // Bind a click event to a Cloud Zoom instance.
            console.log('111');
            var cloudZoom = $(this).data('CloudZoom');  // On click, get the Cloud Zoom object,
            cloudZoom.closeZoom();
            console.log(cloudZoom);
            $.fancybox.open(cloudZoom.getGalleryList());// and pass Cloud Zoom's image list to Fancy Box.
            console.log('333');
            return false;
        });
    });

    CloudZoom.quickStart();

</script>
<script>
    // navigation
$(window).on('scroll', function(event) {
  var scroll=$(window).scrollTop();
  if(scroll<110) {
      $(".navigation").removeClass("sticky");
      $(".navigation .navbar-brand img").attr("src", "<?php echo base_url() ?>/files/frontend/images/logo-2.png");
  }
  else {
      $(".navigation").addClass("sticky");
      $(".navigation .navbar-brand img").attr("src", "<?php echo base_url() ?>/files/frontend/images/logo-2.png");
  }
}
);
</script>