<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<?php echo $head;?>
</head>
<body id="cart">

<?php //echo "<pre>";print_r($this->flexi_cart);echo "</pre>";?>
    <?php 
    echo $header;
    echo $banner;
    ?>	

    <section class="page-content3 text-center"><div class="container m-b-30">
        <h2>Payment Cancelled</h2>
        <h2>Your Order/Invoice number is: <?php echo ORDER_NUMBER_PREFIX.$order_number?></h2>
        <p>You order has been saved if you want to make payment later please copy your invoice/Order number (<?php echo ORDER_NUMBER_PREFIX.$order_number?>).</p>
        <p><a style="color: #1873f5;" target="_blank" href="<?php echo base_url("pay-online");?>"><i class="fa fa-external-link"></i> Pay Order Online</a></p>
<!--        <p><a style="color: #1873f5;" target="_blank" href="--><?php //echo base_url("invoice/".ORDER_NUMBER_PREFIX.$order_number);?><!--"><i class="fa fa-external-link"></i> View Invoice</a> | <a style="color: #1873f5;" target="_blank" download="--><?php //echo ORDER_NUMBER_PREFIX.$order_number.'.pdf';?><!--" href="--><?php //echo base_url("invoice/pdf/".ORDER_NUMBER_PREFIX.$order_number);?><!--"><i class="fa fa-download"></i> Download Invoice as Pdf</a></p>-->
    </div></section>
	
    <?php
    echo $footer;
    echo $scripts;
    ?>
</body>
</html>