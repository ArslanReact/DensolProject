<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<?php echo $head;?>
<style>
	.highlight_red {color:#C00; font-size:12px;}
/* Table Styling ----------------------------------------------------------------------------- */
table {width:100%; margin:10px 0; border:2px solid #025792 ; border-radius:6px; border-collapse:collapse; border-spacing:0; background-color:#eeeeea;}
#cart_items thead tr th{ color:#fff; background:#025792 ;}
table caption {padding:7px; font-size:16px; font-weight:bold; text-align:left;}
table th, table td {border-bottom:1px dotted #eeeeea; font-size:15px; background-color:#eeeeea; border-right:1px dotted #eeeeea; text-align:left; vertical-align:middle;}
thead th, thead td, tfoot th, tfoot td {border-bottom:1px solid #aaa; border-top:1px solid #aaa; background-color:#d9d9d9;}
table th {padding:8px; font-weight:bold;}
table td {padding:15px;}
/* END Table Styling ----------------------------------------------------------------------------- */
/* Form Styling ---------------------------------------------------------------------------------- */
fieldset {margin:10px 0; padding:10px;}
fieldset legend {
    font-size: 15px !important;
    text-transform: uppercase;
    font-weight: 600 !important;
    text-align: left !important;
    background-color: #025792 ;
    width: auto;
    color: #fff;
    padding: 5px 15px;
    border-bottom: none;
}
label, input[type=button], input[type=submit], button {cursor:pointer;}
button, input, select, textarea {margin:0; padding:3px;}

/* Align Inputs with Labels */
label {vertical-align:middle; margin-right:5px; line-height:1.5;}
label+textarea, label+select[size] {vertical-align:top;}
.ie6 label {vertical-align:3px;}

input, select {vertical-align:middle;}
input[type=radio] {vertical-align:-1px; margin-right:5px;}
input[type=checkbox] {vertical-align:-2px; margin-right:5px;}
.ie6 input {vertical-align:text-bottom;}
.ie6 button, .ie7 button {width:auto; overflow:visible;}

select optgroup {color:#777;}
select optgroup option{color:#333;}

input[type=text], input[type=password], input[type=button], input[type=submit], textarea, select, button {padding:10px; margin-bottom:5px; border:1px solid #AAA;}
textarea {overflow-y:auto; resize:vertical;}

input, textarea, select, button {
 	background-color:#f7f7f7;
	outline:none;
	font:99% sans-serif;
	color:#333;
	border-radius:2px;
    -webkit-border-radius:2px;
    -moz-border-radius:2px;
	transition-property: background-color, box-shadow;
	transition-duration: 0.25s;
	transition-timing-function: ease-in-out;
	-webkit-transition-property: background-color, -webkit-box-shadow;
	-webkit-transition-duration: 0.25s;
	-webkit-transition-timing-function: ease-in-out;
	-moz-transition-property: background-color, -moz-box-shadow;
	-moz-transition-duration: 0.25s;
	-moz-transition-timing-function: ease-in-out;
}
input:focus, textarea:focus, select:focus, button:focus {
	background-color:#fff;
    box-shadow: 0 0 5px rgba(0, 0, 0, 0.10);
    -webkit-box-shadow: 0 0 5px rgba(0, 0, 0, 0.15); 
    -moz-box-shadow: 0 0 5px rgba(0, 0, 0, 0.15);
}
input:disabled, textarea:disabled, select:disabled  {font-style:italic; color:#999; background-color:#ddd;}

label {display:inline-block; width:200px;}
input.width_50, select.width_50, textarea.width_50 {width:50px;}
input.width_75, select.width_75, textarea.width_75 {width:75px;}
input.width_100, select.width_100, textarea.width_100 {width:100px;}
input.width_125, select.width_125, textarea.width_125 {width:125px;}
input.width_150, select.width_150, textarea.width_150 {width:150px;}
input.width_175, select.width_175, textarea.width_175 {width:175px;}
input.width_200, select.width_200, textarea.width_200 {width:200px;}
input.width_225, select.width_225, textarea.width_225 {width:225px;}
input.width_250, select.width_250, textarea.width_250 {width:250px;}
input.width_300, select.width_300, textarea.width_300 {width:300px;}
input.width_350, select.width_350, textarea.width_350 {width:350px;}
input.width_400, select.width_400, textarea.width_400 {width:400px;}
/* END Form Styling -------------------------------------------------------------------------------------- */
/* Content Wraps --------------------------------------------------------------------------------------------------------------------------------------------- */
.w100, .w66, .w50, .w33 {float:left; margin:0 10px 0 0; padding:10px 15px;}

@media only screen and (max-width: 768px) {
    .w100, .w66, .w50, .w33 {float:none; margin:0 10px 0 0; padding:10px 15px;}
}

.w100.float_r, .w66.float_r, .w50.float_r, .w33.float_r {float:right;}
.w100 {width:100%; margin:0 0 10px;}
.w66 {width:100%;}
.w50 {width:49.4%;}
.w33 {width:100%;}
.r_margin {margin-right:0;}

.pad_10 {padding:5px 10px;}
.w100.pad_10 {width:100%; margin-bottom:0;}
.w66.pad_10 {width:100%;}
.w50.pad_10 {width:100%;}
.w33.pad_10 {width:100%;}

.position_left {float:left; max-width:440px; margin-right:10px; padding-right:20px;}
.position_right {float:right; max-width:440px;}
.w100.pad_10 .position_left {max-width:450px;}
.w100.pad_10 .position_right {max-width:450px;}

.pad_l_20 {padding-left:20px;} /* Pad cart discount/surcharge data */

.content_wrap.nav_bg {}
.content_wrap.main_content_bg {}
.content_wrap.footer_bg {}

.content {position:relative; width:960px; margin:0 auto; padding:10px 0;}

fieldset {width:100%; margin:10px auto; padding:10px 15px;}
/* fieldset legend{display:inline-block; width:auto;padding:0 5px; font-size:18px;} */
fieldset.w50 {margin:5px 5px 5px 0;}
fieldset.w50.r_margin {margin-right:0;}
.frame {margin-top:10px; background-color:#f0f0f0; border:2px solid #aaa;}
small{width:100%;display:block;}
.frame_note {margin-top:5px; margin-bottom:15px; padding:10px; width:100%; background-color:#e6e6e6; border:1px solid #ccc;}
.frame_note hr {margin-top:10px; margin-bottom:10px;}
.frame_note p:last-child {margin:0;}
.frame_note:last-child {margin-bottom:5px;}
/* Misc Elements --------------------------------------------------------------------------------------------------------------------------------------------- */
h3.heading {display:block; margin:-12px -17px 10px -17px; padding:10px 15px; border:2px solid #aaa; border-bottom:1px solid #aaa; background-color:#ccc; color:#333; font-family:Verdana, Arial; font-weight:bold; font-size:16px;}
td{
    white-space: normal;
}
/* User Guide Main Index */
.inl_block li {display:inline-block; width:225px; margin-left:-20px;}
.inl_block li:before, .inl_block li:before {content:"\2022\00a0"; font-size:17px;}

/* Item Form Examples */
.inl_list ul {margin:0; padding:5px 0; list-style:none;}
.inl_list li {display:inline-block; margin:0 50px 0 0;}
.inl_list label {width:auto;}

.bullet ul, ul.bullet {list-style-position:outside; padding-left:20px; list-style:disc;}
.pad_10 hr {margin:10px auto;}
.inline {display:inline;}

/* Toggle Content */
.toggle {font-weight:bold; font-size:12px; cursor:pointer;}
label.toggle {font-weight:normal; font-size:14px; cursor:pointer;}
.hide_toggle {display:none;}

/* tooltip styling */
.tooltip_trigger {cursor:help;}
span.tooltip_trigger:after {content:"\2020"; vertical-align:7px; font-size:70%; color:#c00;}

.tooltip {
	display:none; min-width:120px; max-width:200px; padding:10px; background-color:#c00; border:1px solid #222; border-radius:5px; -moz-border-radius:5px; -webkit-border-radius:5px;
	color:#eeeeea; -webkit-opacity:0.5; box-shadow:0 2px 10px rgba(0,0,0,0.5); -webkit-box-shadow:0 2px 10px rgba(0,0,0,0.5); -moz-box-shadow:0 2px 10px rgba(0,0,0,0.5);
}
/* Cart Tables ----------------------------------------------------------------------------------------------------------------------------------------------- */
#cart_items th {font-size:15px; 
    /* border-bottom:1px solid #a79032; color:#fff;background-color:#a79032; */
}
#cart_items td.hidden_vars {padding:3px 6px; border-top:1px solid #aaa; border-bottom:2px double #aaa; background-color:#e3e3e3; color:#666;} 
#cart_items td.hidden_vars a {font-size:12px; font-style:italic;} 
#cart_items td.empty {height:75px; background-color:#fafafa; font-style:italic; color:#666; text-align:center;}
#cart_items tfoot th, #cart_items tfoot td {border-right:none; font-weight:bold; font-size:15px;}
#cart_items tfoot td {text-align:center;}
#cart_items .discount th, #cart_items .discount td {background-color:#ecfccb; border-top:1px solid #aaa; border-bottom:1px solid #aaa;}

#cart_shipping th {
    background-color: #025792 ;
    border-bottom: 1px solid #aaa;
    font-weight: bold;
    color: #fff;
}
#cart_shipping tfoot {background-color:#d0d0d0;}
#cart_shipping label {margin-right:20px;}

#cart_summary td {width:100px; text-align:center;}
#cart_summary td:first-child {width:auto; text-align:left;}
#cart_summary thead th {background-color:#025792 ; color:#fff; border-bottom:1px solid #aaa; font-weight:bold;}
#cart_summary tfoot th, #cart_summary tfoot td {background-color:#fff; border-top:none; font-weight:bold;}
#cart_summary tfoot tr.grand_total th, #cart_summary tfoot tr.grand_total td {border:none;}

tr.discount th, tr.discount td {background-color:#ecfccb; border-top:1px dotted #aaa; border-bottom:1px dotted #aaa;}
tr.surcharge th, tr.surcharge td {background-color:#ffd7d7; border-top:1px dotted #aaa; border-bottom:1px dotted #aaa;}
tr.refund th, tr.refund td  {background-color:#ffd4aa; border-top:1px dotted #aaa; border-bottom:1px dotted #aaa;}
tr.voucher th, tr.voucher td {background-color:#d6f0ff; border-top:1px dotted #aaa; border-bottom:1px dotted #aaa;}

.warning {margin-bottom:10px; padding:5px; border:4px solid #777; background-color:#FAA; font-size:18px; font-weight:bold; text-align:center;}
/* Order Details */
.order_status_active, .order_status_cancelled {padding:10px 10px 5px; margin:10px 0;}
.order_status_active {background-color:#ccc; border:3px solid #777;}
.order_status_cancelled {color:#eeeeea; font-weight:bold; background-color:#c00; border:3px solid #000;}
/* Messages --------------------------------------------------------------------------------------------------------------------------------------------------- */
#message {margin:10px 0; font-size:18px; font-weight:bold; text-align:center;}
#message .status_msg {margin:0; padding:5px; background-color:#DF7;}
#message .error_msg {margin:0; background-color: #f39b9b;
    color: #9e0000;
    padding: 9px;
    border-radius: 4px;
}}



.cart_payment_new label{
color:#666;
}
.cart_payment_new input:checked + label{
color:#000;
}
.cart_payment_new .box{
    display:none;
}

.panel-group .panel-heading h4.panel-title{ font-size:16px; color:#025792 ; background-color:#a79032; padding:5px 10px;}
.panel-group .panel-heading h4.panel-title a{ color:#fff;}



.has-error .checkbox, .has-error .checkbox-inline, .has-error .control-label, .has-error .help-block, .has-error .radio, .has-error .radio-inline, .has-error.checkbox label, .has-error.checkbox-inline label, .has-error.radio label, .has-error.radio-inline label {
    color: #ff0000;
}
.has-error .form-control {
    border-color: #ff0000;
    -webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.075);
    box-shadow: inset 0 1px 1px rgba(0,0,0,.075);
}


</style>
</head>
<body id="cart">

<?php //echo "<pre>";print_r($this->flexi_cart);echo "</pre>";?>
    <?php
    
     $uid = $this->session->userdata('uid');
     $price = 0;
     if($uid != ''){
        $modems = $this->db->query("select * from users where id = '".$uid."' limit 1");
        $data = $modems->result_array();
        
                
             $price =  $data[0]['discount'];
         }

  
  

 $amount =  $this->flexi_cart->total();
$final_amount = str_replace('$','',$amount);


$final2ndAmmount = str_replace(',','',$final_amount);
$final2ndAmmount = $final2ndAmmount+0;




$product = $price / 100 * $final2ndAmmount;
//$dicount_amunt = $final_amount - $product;
$dicount_amunt = $product;
$grandTotal = $final2ndAmmount-$dicount_amunt;

	// echo "<pre>";
	// print_r($this->flexi->cart_contents['items']);
	// echo "</pre>";
    echo $header;
    echo $banner;
    
    ?>	
    <div class="p-b-60">
                <div class="main-container2">
                <div id="cart_content">
				<div id="ajax_content">
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12">
                            <div class="row">
                                <?php if (! empty($message)) { ?>
			                     <div id="message">
				                 <?php echo $message; ?>
			                      </div>
		                          <?php } ?>
		                          <?php $paramsform = array("id" => "proceed", "class" => "require-validation"); echo form_open(current_url(),$paramsform);?>
		                          <div class="row">
                                    <div class="col-xl-6 col-lg-6 col-md-12">
                  
                                         
                                        <div class="card h-100 p-3 mt-3">
                                            <h5 class="fontwieghtbold m-b-15 fontsize18">Billing Details</h5>
                             <div class="row">
                            <div class="col-md-6">
                                <div class="form-group required">
                                    <label class="control-label" for="checkout_billing_name">Full Name <span class="rq">*</span></label>
                                    <?php if(!$loginuser){ ?>
                                        <input type="text" name="checkout[billing][name]" id="checkout_billing_name" value="" placeholder="Name" class="form-control h-45 borderradius10"/>
                                    <?php }else{?>
                                        <input type="text" name="checkout[billing][name]" id="checkout_billing_name" value="" placeholder="Name" class="form-control h-45 borderradius10"/>
                                    <?php }?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group required">
                                    <label class="control-label" for="checkout_billing_company">Comapny <span class="rq">*</span></label>
                                    <?php if(!$loginuser){ ?>
                                        <input type="text" name="checkout[billing][company]" id="checkout_billing_company" value="" placeholder="Company" class="form-control h-45 borderradius10"/>
                                    <?php }else{?>
                                        <input type="text" name="checkout[billing][company]" id="checkout_billing_company" value="" placeholder="Company" class="form-control h-45 borderradius10"/>
                                    <?php }?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group required">
                                    <label class="control-label" for="checkout_email">Email <span class="rq">*</span></label>
                                    <?php if(!$loginuser){ ?>
                                        <input type="email" name="checkout[email]" id="checkout_email" value="" placeholder="Email" class="form-control h-45 borderradius10"/>
                                    <?php }else{?>
                                        <input type="email" name="checkout[email]" id="checkout_email" value="" placeholder="Email" class="form-control h-45 borderradius10"/>
                                    <?php }?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group required">
                                    <label class="control-label" for="checkout_phone">Phone <span class="rq">*</span></label>
                                    <?php if(!$loginuser){ ?>
                                        <input type="text" name="checkout[phone]" id="checkout_phone" value="" placeholder="Phone Number" class="form-control h-45 borderradius10"/>
                                    <?php }else{?>
                                        <input type="text" name="checkout[phone]" id="checkout_phone" value="" placeholder="Phone Number" class="form-control h-45 borderradius10"/>
                                    <?php }?> 
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group required">
                                    <label class="control-label" for="checkout_billing_add_01">Address:<span class="rq">*</span></label>
                                    <?php if(!$loginuser){ ?>
                                        <input type="text" name="checkout[billing][add_01]" id="checkout_billing_add_01" value="" placeholder="Address Line 1" class="form-control h-45 borderradius10"/>
                                    <?php }else{?>
                                        <input type="text" name="checkout[billing][add_01]" id="checkout_billing_add_01" value="" placeholder="Address Line 1" class="form-control h-45 borderradius10"/>
                                    <?php }?> 
                                </div>
                                <div class="form-group">
                                    <?php if(!$loginuser){ ?>
                                        <input type="text" name="checkout[billing][add_02]" id="checkout_billing_add_02" value="" placeholder="Address Line 2" class="form-control h-45 borderradius10"/>
                                    <?php }else{?>
                                        <input type="text" name="checkout[billing][add_02]" id="checkout_billing_add_02" value="" placeholder="Address Line 2" class="form-control h-45 borderradius10"/>
                                    <?php }?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group required">
                                <label class="control-label" for="checkout_billing_city">City / Town: <span class="rq">*</span></label>
                                <?php if(!$loginuser){ ?>
                                    <input type="text" name="checkout[billing][city]" id="checkout_billing_city" value="" placeholder="City / Town" class="form-control h-45 borderradius10"/>
                                <?php }else{?>
                                    <input type="text" name="checkout[billing][city]" id="checkout_billing_city" value="" placeholder="City / Town" class="form-control h-45 borderradius10"/>
                                <?php }?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group required">
                                <label class="control-label" for="checkout_billing_state">State / County: <span class="rq">*</span></label>
                                <?php if(!$loginuser){ ?>
                                    <input type="text" name="checkout[billing][state]" id="checkout_billing_state" value="" placeholder="State" class="form-control h-45 borderradius10"/>
                                <?php }else{?>
                                    <input type="text" name="checkout[billing][state]" id="checkout_billing_state" value="" placeholder="State" class="form-control h-45 borderradius10"/>
                                <?php }?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group required">
                                <label class="control-label" for="checkout_billing_post_code">Post / Zip Code: <span class="rq">*</span></label>
                                <?php if(!$loginuser){ ?>
                                <input type="text" name="checkout[billing][post_code]" id="checkout_billing_post_code" value="" placeholder="Post / Zip Code" class="form-control h-45 borderradius10"/>
                                <?php }else{?>
                                <input type="text" name="checkout[billing][post_code]" id="checkout_billing_post_code" value="" placeholder="Post / Zip Code" class="form-control h-45 borderradius10"/>
                                <?php }?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                <label for="checkout_billing_country">Country: <span class="rq">*</span></label>
                                <select id="checkout_billing_country" name="checkout[billing][country]" class="form-control h-45 borderradius10">
                                <?php 
                                    foreach($countries as $country) { 
                                        $id = $country[$this->flexi_cart->db_column('locations', 'id')];
                                        $name = $country[$this->flexi_cart->db_column('locations', 'name')];
                                ?>
                                    <option value="<?php echo $name;?>" <?php echo set_select('checkout[billing][country]', $name, $this->flexi_cart->match_shipping_location_id($id)); ?>>
                                        <?php echo $name;?>
                                    </option>
                                <?php } ?>
                                </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                <label for="checkout_comments">Comments: <span class="rq">*</span></label>
                                <textarea name="checkout[comments]" id="checkout_comments" placeholder="Comments" rows="2" class="form-control h-45 borderradius10 borderradius10"><?php echo set_value('checkout[comments]');?></textarea>
                                </div>
                                <div class="col-md-12">
                                <!-- <div class="g-recaptcha" data-sitekey="6LeGRYEaAAAAAKgnZJVrv8Du9vJooU0xFLQQDrMa"></div> -->
                          
                            </div>
                            </div>

                        </div>
                        
                        
                   
                                        </div>
                                        
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-12">
                                      
                         
                        
                        
                        <div class="card h-100 p-3 mt-3">
                        <legend>Shipping Details</legend>

                        <div>
                            <label>
                                <strong>Copy Billing Details</strong>
                                <input type="checkbox" id="copy_billing_details" value="1"/>
                            </label>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group required">
                                    <label class="control-label" for="checkout_shipping_name">Full Name: <span class="rq">*</span></label>
                                    <input type="text" name="checkout[shipping][name]" id="checkout_shipping_name" value="<?php echo set_value('checkout[shipping][name]');?>" placeholder="Name" class="form-control h-45 borderradius10"/>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group required">
                                <label class="control-label" for="checkout_shipping_company">Company: <span class="rq">*</span></label>
                                <input type="text" name="checkout[shipping][company]" id="checkout_shipping_company" value="<?php echo set_value('checkout[shipping][company]');?>" placeholder="Company" class="form-control h-45 borderradius10"/>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group required">
                                <label class="control-label" for="checkout_shipping_add_01">Address: <span class="rq">*</span></label>
                                <input type="text" name="checkout[shipping][add_01]" id="checkout_shipping_add_01" value="<?php echo set_value('checkout[shipping][add_01]');?>" placeholder="Address Line 1" class="form-control h-45 borderradius10"/>
                                </div>
                                <div class="form-group">
                                <input type="text" name="checkout[shipping][add_02]" id="checkout_shipping_add_02" value="<?php echo set_value('checkout[shipping][add_02]');?>" placeholder="Address Line 2" class="form-control h-45 borderradius10"/>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group required">
                                <label class="control-label" for="checkout_shipping_city">City / Town: <span class="rq">*</span></label>
                                <input type="text" name="checkout[shipping][city]" id="checkout_shipping_city" value="<?php echo set_value('checkout[shipping][city]');?>" placeholder="City / Town" class="form-control h-45 borderradius10"/>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group required">
                                <label class="control-label" for="checkout_shipping_state">State / County: <span class="rq">*</span></label>
                                <?php if (!($this->flexi_cart->shipping_location_name(2))) { ?>
                                    <input type="text" name="checkout[shipping][state]" id="checkout_shipping_state" value="<?php echo set_value('checkout[shipping][state]');?>" placeholder="State" class="form-control h-45 borderradius10"/>
                                <?php } else { ?>
                                <?php echo $this->flexi_cart->shipping_location_name(2);?>
                                    <input type="hidden" name="checkout[shipping][state]" value="<?php echo set_value('checkout[shipping][state]', $this->flexi_cart->shipping_location_name(2));?>"/>
                                <?php } ?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group required">
                                <label class="control-label" for="checkout_shipping_post_code">Post / Zip Code: <span class="rq">*</span></label>
                                <?php if (!($this->flexi_cart->shipping_location_name(3))) { ?>
                                    <input type="text" name="checkout[shipping][post_code]" id="checkout_shipping_post_code" value="<?php echo set_value('checkout[shipping][post_code]');?>" placeholder="Post / Zip Code" class="form-control h-45 borderradius10"/>
                                <?php } else { ?>
                                    <?php echo $this->flexi_cart->shipping_location_name(3);?>
                                    <input type="hidden" name="checkout[shipping][post_code]" value="<?php echo set_value('checkout[shipping][post_code]', $this->flexi_cart->shipping_location_name(3));?>"/>
                                <?php } ?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                <label for="checkout_shipping_country">Country: <span class="rq">*</span></label>
                                <?php echo $this->flexi_cart->shipping_location_name(1);?>
                                <input type="hidden" name="checkout[shipping][country]" value="<?php echo $this->flexi_cart->shipping_location_name(1);?>"/>
                                </div>
                            </div>
                        </div>
                    </div>
                                    </div>
                                    </div>
                                    <?php echo form_close();?>
                                    <div class="col-xl-12 m-t-40" style="padding:0px;">
                                        
                                           
                                    
                                           
                                            

                                            <div class="form-check m-t-20">
                                                <input class="form-check-input" type="checkbox" name="terms" id="exampleRadiosfv4" >
                                                <label class="form-check-label" for="exampleRadiosfv4"> I have read and agree to the website <a href="" class="fontsize14 blusecolortext">terms and conditions</a> *</label>
                                            </div>
                                            <div class="col-12 text-right">
                                                <input type="hidden" name="checkout[payment][id]" form="proceed" id="1" value="1" checked="">
                                                <div class="btn-group m-t-20"><button  type="submit" name="save_order" value="Proceed to Payment" form="proceed" class="borderradius50 fontsize16 btn btn-blue-fill">Place Order</button></div>
                                            </div>
                                    </div>
                                        
                                
                                    
                                </div>
                            </div>
                            
                            
               
                            </div>
                            </div>
                            </div>
                            </div>
                            </div>
	<!-- Main Content -->
	
	
    <?php
    echo $footer;
    echo $scripts;
    ?>
<script src="<?php echo base_url("includes/");?>js/global.js?v=1.0"></script>
<script>
$(function() 
{
	// Toggle show/hide cart session array
	$('#copy_billing_details').click(function()
	{
		$('input[name^="checkout[billing]"]').each(function()
		{
			// Target textboxes only, no hidden fields
			if ($(this).attr('type') == 'text')
			{
				var name = $(this).attr('name').replace('billing', 'shipping');
				var value = ($('#copy_billing_details').is(':checked')) ? $(this).val() : '';
				
				$('input[name="'+name+'"]').val(value);
			}
		});
	
	});

    $('input[type="radio"]').click(function(){
        var inputValue = $(this).attr("data-ddval");
        var targetBox = $("." + inputValue);
        $(".box").not(targetBox).hide();
        $(targetBox).show();
    });

    $('.creditCardText').keyup(function() {
    var foo = $(this).val().split("-").join(""); // remove hyphens
    if (foo.length > 0) {
    foo = foo.match(new RegExp('.{1,4}', 'g')).join("-");
    }
    $(this).val(foo);
    });

    var $form         = $(".require-validation");
    $('form.require-validation').bind('submit', function(e) {
        var $form         = $(".require-validation, .paymentss div:visible"),
        inputSelector = ['input[type=email]', 'input[type=password]',
                            'input[type=text]', 'input[type=file]',
                            'textarea'].join(', '),
        $inputs       = $form.find('.required').find(inputSelector),
        $errorMessage = $form.find('div.error'),
        valid         = true;
        $errorMessage.addClass('hide');

        $('.has-error').removeClass('has-error');
        $inputs.each(function(i, el) {
            var $input = $(el);
            if ($input.val() === '') {
            $input.parent().addClass('has-error');
            $errorMessage.removeClass('hide');
            e.preventDefault();
            }
        });


        

    });


});
</script>

</body>
</html>