<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
        <title>Pay online - AR Instrumed</title>
        <meta name="keywords" content=""/>
        <meta name="description" content=""/>
        <meta name="custom1" content="product-category"/>
        <meta name="robots" content="index" />
        <meta name="robots" content="follow" />
        <meta name="revisit-after" content="1 day" />
        <link rel="canonical" href="">
        <meta property="og:locale" content="en_US" />
        <meta property="og:type" content="object" />
        <meta property="og:title" content="Pay online - AR Instrumed" />
        <meta property="og:description" content="" />
        <meta property="og:url" content="<?=base_url();?>pay-online/" />
        <meta property="og:site_name" content="AR Instrumed" />
        <meta property="og:image" content="<?=base_url();?>files/frontend/images/logo.png" />
        <meta property="og:image:secure_url" content="<?=base_url();?>files/frontend/images/logo.png" />
        <meta property="og:image:width" content="249" />
        <meta property="og:image:height" content="116" />
        <meta name="generator" content="Powered by Tecmyer IT Services" />
        <link rel="shortcut icon" type="image/x-icon" href="<?=base_url();?>files/frontend/favicon.ico" />
        <link rel="icon" href="<?=base_url();?>files/frontend/favicon.gif" type="image/gif" >
        <link rel="stylesheet" href="<?=base_url();?>files/frontend/css/all.css">
        <link rel="stylesheet" type="text/css" href="<?=base_url();?>files/frontend/css/theme_bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="<?=base_url();?>files/frontend/css/owl.carousel.min.css">
        <link rel="stylesheet" type="text/css" href="<?=base_url();?>files/frontend/css/theme-style.css">

        <link rel="stylesheet" type="text/css" href="<?=base_url();?>files/frontend/css/owl.carousel.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
        <link href='https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css' rel='stylesheet' type='text/css'>
        <script src="<?php echo base_url();?>files/frontend/js/theme-jquery.min.js"></script>
        <style>
            .error_msg{
                color:#ff0000;
            }
        </style>
    </head>
</head>
<body>
    <?php include ('includes/header.php');?>


    <div class="blusecolorbg banner-wrap-brecrumbs m-b-40 align-items-center d-flex">
        <div class="main-container2">
            <div class="row align-items-center d-flex">
                <div class="col-xl-12 col-lg-12 col-md-12 m-b-40">
                    <h5 class="text-white text-center fontwieghtbold">Pay Online</h5>
                </div>
                <div class="col-xl-12 col-lg-12 col-md-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb m-0 px-0">
                            <li class="breadcrumb-item"><a class="" href="<?=base_url();?>">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Pay Online</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!--  -->
    <div class="p-b-40">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-6">
                    <div class="card">
                      
                            <form action="<?php echo base_url('placeorderindb') ?>" method="post" id="orderform">
                                <?php $csrf = array(
        'name' => $this->security->get_csrf_token_name(),
        'hash' => $this->security->get_csrf_hash()
);
?>

<input type="hidden" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>" />
<?php
// if($this->session->flashdata('message') != ""){
//     $error = $this->session->flashdata('message');
//     $errorstring = '';
//     for($i=0; $i < count($error); $i++){
//         $errorstring .= $error[$i];
//     }
//     echo $errorstring;
//     die;
// }
?>
<div class="row">
<div class="col-md-12">
    <span class="payment-errors alert"></span>
            <?php if($this->session->flashdata('message') != ""){echo '<h3 style="font-size:15px; color: #ff0000;margin-bottom:15px;">Error: please fix below errors</h3>'.$this->session->flashdata('message').'';} ?>
            <?php if($this->session->flashdata('success') != ""){echo '<h3 style="font-size:15px; color: #00bd09;margin-bottom:15px;">Success: Your Payment Transfer.</h3>';} ?>
        </div>
</div>
                            <h4 class="fontsize24 m-b-20 fontwieghtbold blackcolortext text-center">Pay Through Credit Card</h4>
                            <div class="form-group">
                                <label>Amount</label>
                                <input type="text" class="form-control h-45 borderradius10" name="amount" placeholder="" id="amount">
                            </div>
                            <div class="form-group">
                                <label>Card holder’s name</label>
                                <input type="text" class=" form-control h-45 borderradius10" name="cardholdername" placeholder="" id="cardholdername">
                            </div>
                            <div class="form-group">
                                <label>Email Address</label>
                                <input type="text" class="form-control h-45 borderradius10" name="email" placeholder="" id="">
                            </div>
                            <div class="form-group">
                                <label>Card info</label>
                                <input type="text" class="card-number form-control h-45 borderradius10" name="card_num" placeholder="" id="">
                            </div>
                            <div class="row">
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <input type="text" name="card_exp_month" size="2" class="card-expiry-month form-control radius-border" placeholder="Please enter month">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <input type="text" name="card_exp_year" size="4" class="card-expiry-year form-control radius-border" placeholder="Please enter year">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <input type="text" name="card_cvc" size="4" autocomplete="off" class="card-cvc form-control radius-border" placeholder="CVC">
                                        </div>
                                    </div>
                                   
                                </div>
                            <div class="form-group">
                                <label>Invoice Number</label>
                                <input type="text" class="form-control h-45 borderradius10" name="invoice" placeholder="" id="">
                            </div>
                            <div class="btn-form text-lg-right">
                                <button type="submit" class="btn btn-blue-fill borderradius50" id="payBtn">Pay your Invoice</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6">
                    <div class="card">
                        <form action="https://www.paypal.com/cgi-bin/webscr" method="post" class="wp_accept_pp_button_form_classic" >
                            <input type="hidden" name="cmd" value="_xclick">
                            <input type="hidden" name="business" value="sales@densol.com.au">
                            <input type="hidden" name="item_name" value="Amount (AUD)*">
                            <input type="hidden" name="currency_code" value="AUD">
                            <h4 class="fontsize24 fontwieghtbold blackcolortext text-center">Pay through Paypal.</h4>
                            <p class="paragraphcolortext m-b-20 fontsize14 text-center">Amount (AUD)*</p>
                            <div class="form-group">
                                <label>Other amount</label>
                                <input class="form-control h-45 borderradius10" type="number" min="1" step="any" name="amount">
                            </div>
                            
                            <input type="hidden" name="on0" value="Reference">
                            <div class="form-group">
                                <label>Invoice Number</label>
                                <input type="text" class="form-control h-45 borderradius10" name="os0" maxlength="60" value="">
                            </div>
                            <input type="hidden" name="no_shipping" value="0">
                            <input type="hidden" name="no_note" value="1">
                            <input type="hidden" name="bn" value="TipsandTricks_SP">
                            <input type="hidden" name="return" value="https://ar-instrumed.com.au">
                            <input type="hidden" name="cancel_return" value="https://ar-instrumed.com.au">
                            <div class="btn-form d-flex text-lg-right">
                                <div class="col text-left p-0"><img src="<?=base_url();?>files/frontend/images/cards.png" alt=""></div>
                                <div class="col-auto p-0"><button type="submit" class="btn btn-blue-fill borderradius50">Pay Now</button></div>
                            </div>
                        </form>
                        <script type="text/javascript">jQuery(document).ready(function($){$('.wp_accept_pp_button_form_classic').submit(function(e){var form_obj=$(this);var other_amt=form_obj.find('input[name=other_amount]').val();if(!isNaN(other_amt)&&other_amt.length>0){options_val=other_amt;$('<input>').attr({type:'hidden',id:'amount',name:'amount',value:options_val}).appendTo(form_obj);}return;});});</script>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="https://js.stripe.com/v2/"></script>
    <?php include ('includes/footer.php');
    include ('includes/index_scripts.php');
    ?>
<script type="text/javascript">
    
    Stripe.setPublishableKey('pk_live_pEXh9VCCN6pDtWHXR7KLwm6B');

//callback to handle the response from stripe
    function stripeResponseHandler(status, response) {
        if (response.error) {
            //enable the submit button
            $('.placeorder').removeAttr("disabled");
             $('.loader').css('display','none');
            //display the errors on the form
            $(".payment-errors").html('<div class="alert alert-danger">' + response.error.message + '</div>');
        } else {
            var form$ = $("#orderform");
            //get token id
            var token = response['id'];
            //insert the token into the form
            form$.append("<input type='hidden' name='stripeToken' value='" + token + "' />");
            //submit form to the server
            form$.get(0).submit();
        }
    }
    $(document).ready(function() {
        //on form submit
        $("#orderform").submit(function(event) {
            
            
                
                //disable the submit button to prevent repeated clicks
                $('.plqaceorder').attr("disabled", "disabled");

                //create single-use token to charge the user
                Stripe.createToken({
                    number: $('.card-number').val(),
                    cvc: $('.card-cvc').val(),
                    exp_month: $('.card-expiry-month').val(),
                    exp_year: $('.card-expiry-year').val()
                }, stripeResponseHandler);
            
            
            //submit from callback
            return false;
        });
    });   
</script>    


  </body>
</html>