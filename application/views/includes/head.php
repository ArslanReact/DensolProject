<?php
if(isset($beforeheads)){
    foreach($beforeheads as $beforehead){
        echo $beforehead."\r\n";
    }
}
?>
    <link rel="stylesheet" href="<?=base_url();?>files/frontend/css/all.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url();?>files/frontend/css/theme_bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url();?>files/frontend/css/owl.carousel.min.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url();?>files/frontend/css/theme-style.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>files/frontend/cloudzoom/cloudzoom.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>files/frontend/css/owl.carousel.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
<link href='https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css' rel='stylesheet' type='text/css'>
<script src="<?php echo base_url();?>files/frontend/js/theme-jquery.min.js"></script>
<link rel="stylesheet" href="<?php echo base_url();?>files/frontend/css/jquery-ui.css">
<script src="<?php echo base_url();?>files/frontend/js/jquery-ui.js"></script>
<meta name="google-site-verification" content="eMDEjvX9yhWHMNmB5ARGgBBoIUbsdVey0N8zPnt7jMQ" />
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-C125KVBQ5H"></script>
<script src="https://www.google.com/recaptcha/api.js"></script>
<script>
window.dataLayer = window.dataLayer || [];
function gtag(){dataLayer.push(arguments);}
gtag('js', new Date());

gtag('config', 'G-C125KVBQ5H');
</script>
<?php
    $query =  $this->db->query("select * from products");
              $data_product= $query->result_array();
              $productlist = '';
              foreach($data_product as $key){
                  $productlist .= ",'".$key['title']."'";
              }
              $productlist = ltrim($productlist,',');
?>
  <script>
  $( function() {
    var allPositions = [
        <?php echo $productlist; ?>
    ];
    $( "#tags" ).autocomplete({
        source: function(request, response) {
            var results = $.ui.autocomplete.filter(allPositions, request.term);        
            response(results.slice(0, 10));
        }        
    });
  } );
  </script>
<?php
if(isset($afterheads)){
    foreach($afterheads as $afterhead){
        echo $afterhead."\r\n";
    }
}

?>