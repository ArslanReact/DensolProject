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
table {width:100%; margin:10px 0; border:none; border-collapse:collapse; border-spacing:0; background-color:#eeeeea;}
table caption {padding:7px; font-size:16px; font-weight:bold; text-align:left;}
table th, table td {border-bottom:none; border-right:none; text-align:left; vertical-align:middle;}
thead th, thead td, tfoot th, tfoot td {border-bottom:1px solid #aaa; border-top:1px solid #aaa; background-color:#186fb1 ;}
#cart_shipping thead th, thead td, tfoot th, tfoot td{ color:#fff;}
table th {padding:8px; font-weight:bold;}
table td {padding:8px;}
/* END Table Styling ----------------------------------------------------------------------------- */
/* Form Styling ---------------------------------------------------------------------------------- */
fieldset {margin:10px 0; padding:10px;}
fieldset legend {font-size:16px; font-weight:bold;}
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
.btn.focus, .btn:focus{ background-color:#186fb1 ; color:#fff;}
input[type=text], input[type=password], input[type=button], input[type=submit], textarea, select, button { border:none;}
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
	/* background-color:#fff; */
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

fieldset {width:100%; margin:10px auto; padding:10px 15px; background-color:#eeeeea; border:none;}
fieldset legend{display:inline-block; width:auto;padding:0 5px; font-size:18px;}
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
	color:#eee; -webkit-opacity:0.5; box-shadow:0 2px 10px rgba(0,0,0,0.5); -webkit-box-shadow:0 2px 10px rgba(0,0,0,0.5); -moz-box-shadow:0 2px 10px rgba(0,0,0,0.5);
}
/* Cart Tables ----------------------------------------------------------------------------------------------------------------------------------------------- */
#cart_items th {border-bottom:none; font-weight:500; color:#fff;     border-top: none;}
#cart_items input, button{ font-size:16px !important;}
#cart_items td.hidden_vars {padding:3px 6px; border-top:1px solid #aaa; border-bottom:2px double #aaa; background-color:#e3e3e3; color:#666;} 
#cart_items td.hidden_vars a {font-size:12px; font-style:italic;} 
#cart_items td.empty {height:75px; background-color:#eeeeea; font-style:italic; color:#666; text-align:center;}
#cart_items td.empty a{ padding:7px 25px; border-radius:8px; margin-bottom:20px; display:inline-block; color: #fff; font-style: normal; background-color:#a79032;}
#cart_items tfoot th, #cart_items tfoot td {border-right:none; background-color:#186fb1 ; font-weight:500; color:#fff;}
#cart_items tfoot td {text-align:center;}
#cart_items .discount th, #cart_items .discount td {background-color:#ecfccb; border-top:1px solid #aaa; border-bottom:1px solid #aaa;}

#cart_shipping th {border-bottom:none; font-weight:500;}
#cart_shipping tfoot {}
#cart_shipping label {margin-right:20px;}

#cart_summary td {width:100px; text-align:center;}
#cart_summary td:first-child {width:auto; text-align:left;}
#cart_summary thead th {border-bottom:none; font-weight:500; color:#fff;}
#cart_summary tfoot th, #cart_summary tfoot td {background-color:#a5a5a5; border-top:1px solid #aaa; font-weight:bold;}
#cart_summary tfoot tr.grand_total th, #cart_summary tfoot tr.grand_total td {background-color:#186fb1 ;}

tr.discount th, tr.discount td {background-color:#ecfccb; border-top:1px dotted #aaa; border-bottom:1px dotted #aaa;}
tr.surcharge th, tr.surcharge td {background-color:#ffd7d7; border-top:1px dotted #aaa; border-bottom:1px dotted #aaa;}
tr.refund th, tr.refund td  {background-color:#ffd4aa; border-top:1px dotted #aaa; border-bottom:1px dotted #aaa;}
tr.voucher th, tr.voucher td {background-color:#d6f0ff; border-top:1px dotted #aaa; border-bottom:1px dotted #aaa;}

.warning {margin-bottom:10px; padding:5px; border:4px solid #777; background-color:#FAA; font-size:18px; font-weight:bold; text-align:center;}
/* Order Details */
.order_status_active, .order_status_cancelled {padding:10px 10px 5px; margin:10px 0;}
.order_status_active {background-color:#ccc; border:3px solid #777;}
.order_status_cancelled {color:#eee; font-weight:bold; background-color:#c00; border:3px solid #000;}
/* Messages --------------------------------------------------------------------------------------------------------------------------------------------------- */
#message {font-size:18px; font-weight:bold; text-align:center;}
#message .status_msg {color:#186fb1;}
#message .error_msg {color:#186fb1;}
</style>
</head>
<body id="cart">

<?php //echo "<pre>";print_r($this->session->userdata('flexi_cart'));echo "</pre>";?>
<?php 
    echo $header;
	echo $banner;

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
?>
<div class="p-b-60">
                <div class="main-container2">
                    <div id="cart_content">
				<div id="ajax_content">
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12">
                            <?php echo form_open(current_url());?>
                                <div class="card m-b-30">
                                       <?php if (! empty($message)) { ?>
    					                <div id="message" class="alert alert-primary">
    						             <?php echo $message; ?>                                                                  
    					                </div>
    				                    <?php } ?>
                                    <div class="row align-items-center">
                                         <?php 
								if (! empty($cart_items)) {
									$i = 0;
									foreach($cart_items as $row) { $i++;
							?>
                                        
                                        <div class="col-xl-9 col-lg-9 m-t-10">
                                           
                                            <div class="d-flex row align-items-center">
                                                <?php 
                                               $modems = $this->db->query("select * from products where id = '".$row['id']."'");
                                                 $data =  $modems->result_array();
                                                ?>
                                                <div class="col-xl-3 text-center"><img src="<?php echo base_url()."uploads/products/".$data[0]['image'];?>" alt="" class="img-fluid" width="85">
                                                
                                                <input type="hidden" name="items[<?php echo $i;?>][row_id]" value="<?php echo $row['row_id'];?>"/>
									         	<a href="<?php echo base_url('delete_item/'.$row['row_id']); ?>" title="Click to remove item from cart">Remove</a>
                                                </div>
                                                <div class="col-auto">
                                                    <h4 class="fontsize18 fontwieghtbold"><?php echo $row['name'];?></h4>
                                                    <p><?php 
										if ($this->flexi_cart->item_option_status($row['row_id'])) { ?>
									
										<!-- Example of displaying an items options if they exist, but as text, rather than an editable field. -->
										<?php echo $this->flexi_cart->item_options($row['row_id'], FALSE,"<br>").'<br/>';?>
										
									<?php }?>
										
										<!-- 
											Example of displaying any item status messages.
											Status messages are generated if an item cannot be shipped to the current shipping location, or if there is insufficient stock.
											A css style ('highlight_red') can be submitted to the function to format messages.
										-->
									<?php 
										$item_status_message = $this->flexi_cart->item_status_message($row['row_id'], 'highlight_red');
										echo (! empty($item_status_message)) ? '<span class="highlight_red">Backorder ETA 12-16 Days Delivery Time</span>'.'<br/>' : NULL;
									?>
											
										<!-- 
											Example of indicating an items stock level - (Example only displays on item example #112) 
											If TRUE is submited to the 2nd parameter of 'item_stock_quantity()', it returns remaining quantity available once current quantity it deducted.
										-->
									<?php 
										if ($row['id'] == 112)
										{
											echo '<span class="highlight_green">There are <strong>'.$this->flexi_cart->item_stock_quantity($row['row_id']).'</strong> items in-stock.</span><br/>';
										}
									?></p>
                                                    <div class="quantity_box">
                                                        <span id="decrease<?php echo $data[0]['id'] ?>"  class="quantity_down"><i class="fa fa-minus" aria-hidden="true"></i></span>
                                                        <input id="number<?php echo $data[0]['id'] ?>" class="quantity_input" type="text" name="items[<?php echo $i;?>][quantity]" value="<?=$row['quantity'];?>">
                                                        <span id="increase<?php echo $data[0]['id'] ?>" class="quantity_up"><i class="fa fa-plus" aria-hidden="true"></i></span>
                                                    <script>
                                                        $(function() {
                                                            $('#increase<?php echo $data[0]['id'] ?>').on('click', function() {
                                                                var $qty = $("#number<?php echo $data[0]['id'] ?>");
                                                                var currentVal = parseInt($qty.val());
                                                                if (!isNaN(currentVal)) {
                                                                    $qty.val(currentVal + 1);
                                                                }
                                                            });
                                                            $('#decrease<?php echo $data[0]['id'] ?>').on('click', function() {
                                                                var $qty = $("#number<?php echo $data[0]['id'] ?>");
                                                                var currentVal = parseInt($qty.val());
                                                                if (!isNaN(currentVal) && currentVal > 0) {
                                                                    $qty.val(currentVal - 1);
                                                                }
                                                            });
                                                        });
                                                    </script>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                        </div>
                                        
                                
                                        <?php }?>
                                        
                                        
                                        
                                    </div>
                                    
                                    <div class="row align-items-center mt-2">
   
              
                                         <div class="col-xl-12 col-lg-12 col-md-12 text-md-right"><button  type="submit" name="update" value="Update Cart" class="borderradius50 fontsize14 btn btn-blue">Update Cart</button></div>

                                        
                                     <?php } else { ?>
                                        <div class="col text-center py-4">
                                            <img src="<?php echo base_url('files/frontend/images/shopping-cart.svg'); ?>" width="100" class="mb-4">
                                            <p class="m-0 fontsize24 blusecolortext">Oops! Your Cart is Empty</p>
                                        </div>
                                     
                                     <?php } ?>
                                    </div>
                                   
                                                                   
                                </div>
                                <?php if (! empty($cart_items)) {?>
                                
									<div class="m-t-20 text-center"><button  type="submit" name="checkout" value="Checkout" class="borderradius50 fontsize14 btn btn-blue-fill">Proceed the checked</button></div>
                               
                                 <?php }?>
                            </form>
                        </div>
      
                       
                        </div>
                        
                        
                        </div>
                        </div>
                        </div>
                        </div>
		
	
	<?php
    echo $footer;
    echo $scripts;
    ?>


<script src="<?php echo base_url("includes/");?>js/global.js?v=1.0"></script>

<!-- <script src="<?php //echo base_url("includes/");?>js/admin_global.js?v=1.0"></script> -->
<script>

// $('form select[name^="shipping"], form input[name^="shipping"]').on('change', function(){
//     $(this).closest('form').submit();
// });

$(function() {
	// Ajax Cart Update Example
	// Submit the cart form if a shipping option select or input element is changed.
	$('body').on('change', 'select[name^="shipping"], input[name^="shipping"]', function()
	{
		// Loop through shipping select and input fields creating object of their names and values that will then be submitted via 'post'
		var data = new Object();
		$('select[name^="shipping"], input[name^="shipping"]').each(function()
		{
			data[$(this).attr('name')] = $(this).val();
		});
		
		// Set 'update' so controller knows to run update method.
		data['update'] = true;

		// !IMPORTANT NOTE: As of CI 2.0, if csrf (cross-site request forgery) protection is enabled via CI's config, this must be included to submit the token.
		data['csrf_tecmyer_name'] = $('input[name="csrf_tecmyer_name"]').val();
		//alert(currentcsrf);
		// $('#cart_content').load('<?php //echo current_url();?> #ajax_content', data);

		$("#cart_content").load('<?php echo current_url();?> #ajax_content',  data, function(responseTxt, statusTxt, xhr){
			if(statusTxt == "success")
			location.reload();
			if(statusTxt == "error")
			alert("Error: " + xhr.status + ": " + xhr.statusText);
		});



		
	});
});
</script>

</body>
</html>