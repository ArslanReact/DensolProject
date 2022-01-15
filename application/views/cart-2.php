<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<?php echo $head;?>
<style>
/* Table Styling ----------------------------------------------------------------------------- */
table {width:100%; margin:10px 0; border:2px solid #aaa; border-collapse:collapse; border-spacing:0; background-color:#f0f0f0;}
table caption {padding:7px; font-size:16px; font-weight:bold; text-align:left;}
table th, table td {border-bottom:1px dotted #aaa; border-right:1px dotted #aaa; text-align:left; vertical-align:middle;}
thead th, thead td, tfoot th, tfoot td {border-bottom:1px solid #aaa; border-top:1px solid #aaa; background-color:#d9d9d9;}
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

input[type=text], input[type=password], input[type=button], input[type=submit], textarea, select, button {padding:3px; margin-bottom:5px; border:1px solid #AAA;}
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

fieldset {width:100%; margin:10px auto; padding:10px 15px; background-color:#f0f0f0; border:2px solid #aaa;}
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
#cart_items th {border-bottom:1px solid #aaa; font-weight:bold;}
#cart_items td.hidden_vars {padding:3px 6px; border-top:1px solid #aaa; border-bottom:2px double #aaa; background-color:#e3e3e3; color:#666;} 
#cart_items td.hidden_vars a {font-size:12px; font-style:italic;} 
#cart_items td.empty {height:75px; background-color:#fafafa; font-style:italic; color:#666; text-align:center;}
#cart_items tfoot th, #cart_items tfoot td {border-right:none; background-color:#d0d0d0; font-weight:bold;}
#cart_items tfoot td {text-align:center;}
#cart_items .discount th, #cart_items .discount td {background-color:#ecfccb; border-top:1px solid #aaa; border-bottom:1px solid #aaa;}

#cart_shipping th {background-color:#d0d0d0; border-bottom:1px solid #aaa; font-weight:bold;}
#cart_shipping tfoot {background-color:#d0d0d0;}
#cart_shipping label {margin-right:20px;}

#cart_summary td {width:100px; text-align:center;}
#cart_summary td:first-child {width:auto; text-align:left;}
#cart_summary thead th {background-color:#d0d0d0; border-bottom:1px solid #aaa; font-weight:bold;}
#cart_summary tfoot th, #cart_summary tfoot td {background-color:#e0e0e0; border-top:1px solid #aaa; font-weight:bold;}
#cart_summary tfoot tr.grand_total th, #cart_summary tfoot tr.grand_total td {background-color:#d0d0d0;}

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
#message {margin-bottom:10px; border:2px solid #333; font-size:18px; font-weight:bold; text-align:center;}
#message .status_msg {margin:0; padding:5px; background-color:#DF7;}
#message .error_msg {margin:0; padding:5px; background-color:#FAA;}
</style>
</head>
<body id="cart">
<?php 
    echo $header;
	echo $banner;
?>

	<!-- Main Content -->
	<div class="content_wrap main_content_bg" style="margin-bottom:50px;">
		<div class="content clearfix">
			<div id="cart_content">
				<div id="ajax_content">
					
				<?php if (! empty($message)) { ?>
					<div id="message">
						<?php echo $message; ?>
					</div>
				<?php } ?>
				
					<!-- <div class="clearfix">
						<h4 class="float_l">Cart Content</h4>
						<span class="float_r">
							<a href="<?php //echo base_url(); ?>/save_cart_data" class="link_button">Save Cart</a>
							<a href="<?php //echo base_url(); ?>/load_save_cart_data" class="link_button">Load Cart</a>
						</span>
					</div> -->
				
					<?php echo form_open(current_url());?>
						<table id="cart_items">
							<thead>
								<tr>
									<th class="spacer_75">Remove</th>
									<th>Item</th>
									<th class="spacer_100 align_ctr">Price</th>
									<th class="spacer_100 align_ctr">Quantity</th>
									<th class="spacer_100 align_ctr">Total</th>
								</tr>
							</thead>
							<tbody>
							<?php 
								if (! empty($cart_items)) {
									$i = 0;
									foreach($cart_items as $row) { $i++;
							?>
								<tr>
									<td>									
										<!-- 
											The name of each input field is structured as a multi-dimensional array, using the looped '$i' value to group each rows data together.
											When submitting input data to the 'update_cart()' function, the id of the cart row being updated must also be submitted.
											An example of this is done below by including a hidden field with the carts row id.
										-->
										<input type="hidden" name="items[<?php echo $i;?>][row_id]" value="<?php echo $row['row_id'];?>"/>
										
										<a href="<?php echo base_url(); ?>/delete_item/<?php echo $row['row_id'];?>" title="Click to remove item from cart">Remove</a>
									</td>
									<td>
										<strong><?php echo $row['name'];?></strong><br/>

									<?php 
										if ($this->flexi_cart->item_option_status($row['row_id']) && isset($row['option_data'])) { 
											foreach($row['option_data'] as $option_column => $option_data) {
									?>
										<!-- 
											Example of displaying an items options if they exist, as an editable field, 
											this example uses a custom field ('option_data') containing an array of option data. 
											To activate this example, add item #202 on the 'Add an item with options via a form' page.
										-->
										<label class="spacer_50"><?php echo $option_column; ?>:</label> 
										<select name="items[<?php echo $i;?>][options][<?php echo $option_column; ?>]" class="width_100">
										<?php foreach($option_data as $data) { ?>
											<option value="<?php echo $data; ?>" <?php echo set_select('items['.$i.'][options]['.$option_column.']', $data, ($data == $row['options'][$option_column]));?>>
												<?php echo $data; ?>
											</option>
										<?php } ?>
										</select><br/>
										
									<?php } } else if ($this->flexi_cart->item_option_status($row['row_id'])) { ?>
									
										<!-- Example of displaying an items options if they exist, but as text, rather than an editable field. -->
										<?php echo $this->flexi_cart->item_options($row['row_id'], TRUE).'<br/>';?>
										
									<?php }?>
										
										<!-- 
											Example of displaying any item status messages.
											Status messages are generated if an item cannot be shipped to the current shipping location, or if there is insufficient stock.
											A css style ('highlight_red') can be submitted to the function to format messages.
										-->
									<?php 
										$item_status_message = $this->flexi_cart->item_status_message($row['row_id'], 'highlight_red');
										echo (! empty($item_status_message)) ? $item_status_message.'<br/>' : NULL;
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
									?>
										
										<!-- 
											Example of how to update a custom column defined via the config file var $config['cart']['items']['custom_columns'].
											Ensure the input name is the same as the custom column you wish to update.
											Note: Only custom columns that are defined as 'updatable' can be updated once set.											
										-->
										Note: <input type="text" name="items[<?php echo $i;?>][user_note]" value="<?php echo $row['user_note'];?>" maxlength="50" class="width_175"/>
									</td>
									<td class="align_ctr">
									<?php 
										// If an item discount exists.
										if ($this->flexi_cart->item_discount_status($row['row_id'])) 
										{
											// If the quantity of non discounted items is zero, strike out the standard price.
											if ($row['non_discount_quantity'] == 0)
											{
												echo '<span class="strike">'.$row['price'].'</span><br/>';
											}
											// Else, display the quantity of items that are at the standard price.
											else
											{
												echo $row['non_discount_quantity'].' @ '.$row['price'].'<br/>';
											}
											
											// If there are discounted items, display the quantity of items that are at the discount price.
											if ($row['discount_quantity'] > 0)
											{
												echo $row['discount_quantity'].' @ '. $row['discount_price'];
											}
										}
										// Else, display price as normal.
										else
										{
											echo $row['price'];
										}
									?>
									</td>
									<td class="align_ctr">
										<!-- 
											The input name 'quantity' must be the same as the item array column that it is updating.
											In this example, it is defined via the config file var $config['cart']['items']['columns']['item_quantity'] = 'quantity'
										-->
										<input type="text" name="items[<?php echo $i;?>][quantity]" value="<?php echo $row['quantity'];?>" maxlength="3" class="width_50 align_ctr validate_decimal"/>
										<input type="submit" name="update" value="&plusmn;" title="Update Quantity" class="link_button grey"/>
									</td>
									<td class="align_ctr">
									<?php 
										// If an item discount exists, strike out the standard item total and display the discounted item total.
										if ($row['discount_quantity'] > 0)
										{
											echo '<span class="strike">'.$row['price_total'].'</span><br/>';
											echo $row['discount_price_total'].'<br/>';
										}
										// Else, display item total as normal.
										else
										{
											echo $row['price_total'];
										}
									?>
									</td>
								</tr>
							<?php 
								// To display a description of the discount, this example submits a 2nd parameter to the item_discount_status() function.
								// This sets the function to show item shipping discounts as well as the standard item price discounts. 
								if ($this->flexi_cart->item_discount_status($row['row_id'], FALSE)) { 
							?>
								<tr class="discount">
									<td colspan="5">
										Discount: <?php echo $this->flexi_cart->item_discount_description($row['row_id']);?>
										: <a href="<?php echo base_url(); ?>/unset_discount/<?php echo $this->flexi_cart->item_discount_id($row['row_id']);?>">Remove</a>
									</td>
								</tr>
							<?php } ?>
								
							<?php } } else { ?>
								<tr>
									<td colspan="5" class="empty">
										<h4>! You currently have no items in your shopping cart !</h4>
										<p>Before proceed to checkout you must add some products to your shopping cart.<br>You will find a lot of interesting products on our "Shop" page.</p>
										<a href="<?php echo base_url(); ?>product-category/">Return to Shop</a>
									</td>
								</tr>
							<?php } ?>
							</tbody>
							<tfoot>
							<?php 
								// Ensure the 'item_summary_savings_total()' functions format argument is set to 'FALSE' to prevent comparing a formatted STRING against an INT of '0'.
								if ($this->flexi_cart->item_summary_savings_total(FALSE) > 0) { 
							?>
								<tr class="discount">
									<th colspan="4">Item Summary Discount Savings Total</th> 
									<td><?php echo $this->flexi_cart->item_summary_savings_total();?></td>
								</tr>
							<?php } ?>
								<tr>
									<th colspan="4">Item Summary Total</th>
									<td><?php echo $this->flexi_cart->item_summary_total();?></td>
								</tr>
							</tfoot>
						</table>

					<?php if (! empty($cart_items)) {?>
					<?php 
						// Example on how to display how much more needs to be spent, or how many more items need to be added to activate a discount.
						// The function can work on both item and summary discounts.
						// Note: Ensure '$free_shipping_discount' contains no formatted currency strings by submitting FALSE as the 2nd argument to 'get_discount_requirements'.
						$free_shipping_discount = $this->flexi_cart->get_discount_requirements(5, FALSE);
						if ($free_shipping_discount['value'] > 0) { 
					?>
						<div class="frame align_ctr" style="padding:5px;text-align:center;">
							<h3 style="font-size: 17px;"><span style="font-size:15px;">Spend another <?php echo $this->flexi_cart->get_currency_value($free_shipping_discount['value']);?> and get <em style="color:green;">surprise!</em></span></h3>
						</div>
					<?php } ?>
												
						<!--
							This demo includes 2 examples of updating the carts shipping data, via database lookup tables, or by setting manually.
							To toggle shipping between database and manually set options, follow the instructions in the 'cart/view_cart' controller file.
						-->
					<?php if (isset($countries)) { ?>
						<table id="cart_shipping">
							<thead>
								<tr>
									<th>Shipping</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>
										<small>
											Shipping can be based on as many location tiers as required.<br/>
											This example shows how rates can be calculated as per country right down to specific postal codes.<br/>
											To demonstrate, select country 'United States' > select state 'New York' and enter '10101' as the postal code.<br/>
										</small>								
									</td>
								</tr>
								<tr>
									<td>
										<label class="spacer_250">Country:
											<select name="shipping[country]">
												<option value="0"> - Country - </option>
											<?php foreach($countries as $country) { ?>
												<option value="<?php echo $country['loc_id'];?>" <?php echo ($this->flexi_cart->match_shipping_location_id($country['loc_id'])) ? 'selected="selected"' : NULL;?>>
													<?php echo $country['loc_name'];?>
												</option>
											<?php } ?>
											</select>
										</label>
										
										<label class="spacer_200">State:
											<select name="shipping[state]" <?php if (empty($states)) { echo 'disabled="disabled"'; }?>>
												<option value="0"> - State - </option>
											<?php foreach($states as $state) { ?>
												<option value="<?php echo $state['loc_id'];?>" <?php echo ($this->flexi_cart->match_shipping_location_id($state['loc_id'])) ? 'selected="selected"' : NULL;?>>
													<?php echo $state['loc_name'];?>
												</option>
											<?php } ?>
											</select>
										</label>

										<label>Postal Code:
											<!-- The value '3' in the 'shipping_location_name()' function requests the location name for the 3rd location tier - in this example, postal/zip code -->
											<input type="text" name="shipping[postal_code]" value="<?php echo $this->flexi_cart->shipping_location_name(3);?>" <?php if (empty($postal_codes)) { echo 'disabled="disabled"'; }?> placeholder="101010" class="width_75"/>
										</label>
									</td>
								</tr>
								<tr>
									<td>
										<label class="spacer_125">Shipping Options:</label>
										<select name="shipping[db_option]">
											<option value="0"> - Shipping Options - </option>
										<?php 
											if (! empty($shipping_options)) {
												foreach($shipping_options as $shipping) { 
										?>
											<option value="<?php echo $shipping['id'];?>" <?php echo ($shipping['id'] == $this->flexi_cart->shipping_id()) ? 'selected="selected"' : NULL; ?>>
												<?php echo $shipping['name']." : ".$shipping['description'];?>
											</option>
										<?php } } else { ?>
											<option value="0">
												We'll quote you prior to dispatch.
											</option>
										<?php } ?>
										</select>
									</td>
								</tr>
							</tbody>
							<tfoot>
								<tr>
									<td>
										<small>Note: This demo also updates tax rates based on the shipping location, this also can be set independently.</small>
									</td>
								</tr>
							</tfoot>
						</table>
					<?php } else { ?>					
						<!-- Manually set shipping option example -->
						<table id="cart_shipping">
							<thead>
								<tr>
									<th>Shipping</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>
										<small>
											This is an example of setting shipping options manually, rather than via a database.<br/>
										</small>
									</td>
								</tr>
								<tr>
									<td>
										<label>Shipping Options:
											<select name="shipping[manual_option]">
												<option value="0"> - Shipping Options - </option>
											<?php 
												if (! empty($shipping_options)) {
													foreach($shipping_options as $shipping) { 
											?>
												<option value="<?php echo $shipping['id'];?>" <?php echo ($shipping['id'] == $this->flexi_cart->shipping_id()) ? 'selected="selected"' : NULL; ?>>
													<?php echo $shipping['name']." : ".$shipping['description'];?>
												</option>
											<?php } } else { ?>
												<option value="0">
													We'll quote you prior to dispatch.
												</option>
											<?php } ?>
											</select>
										</label>
									</td>
								</tr>
							</tbody>
							<tfoot>
								<tr>
									<td>&nbsp;</td>
								</tr>
							</tfoot>
						</table>
					<?php } ?>
					
						<table id="cart_summary">
							<thead>
								<tr>
									<th colspan="2">Cart Summary</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>
										Reward Points Earned
									</td>
									<td>
										<?php echo $this->flexi_cart->total_reward_points();?> points
									</td>
								</tr>
								<tr>
									<td>
										Total Weight
									</td>
									<td>
										<?php echo $this->flexi_cart->total_weight();?>
									</td>
								</tr>
								<tr>
									<td>
										Item Summary Total
									</td>
									<td>
										<?php echo $this->flexi_cart->item_summary_total();?>
									</td>
								</tr>
								<tr>
									<td>
										Shipping Rate
									</td>
									<td>
										<?php echo $this->flexi_cart->shipping_total();?>
									</td>
								</tr>
																
							<?php if ($this->flexi_cart->summary_discount_status()) { ?>
								<tr class="discount">
									<th>Discount Summary</th>
									<td>&nbsp;</td>
								</tr>
								
							<?php if ($this->flexi_cart->item_summary_discount_status()) { ?>
								<!-- 
									Rather than repeating the descriptions of each item discount listed via the cart, 
									this example summarises the discount totals of all items.
								-->
								<tr class="discount">
									<th>
										<span class="pad_l_20">
											&raquo; Item discount discount savings
										</span>
									</th>
									<td>
										<?php echo $this->flexi_cart->item_summary_savings_total();?>
									</td>
								</tr>
							<?php } ?>
								
								<!-- 
									This example uses the 'summary_discount_data()' function to return an array of summary discount values and descriptions.
									An alternative to using a custom loop to return this discount array, is to call the 'summary_discount_description()' function,
									which will return a formatted string of all summary discounts. 
								-->
							<?php foreach($discounts as $discount) { ?>
								<tr class="discount">
									<th>
										<span class="pad_l_20">
											&raquo; <?php echo $discount['description'];?>
										<?php if (! empty($discount['id'])) { ?>
											: <a href="<?php echo base_url(); ?>/unset_discount/<?php echo $discount['id']; ?>">Remove</a>
										<?php } ?>
										</span>
									</th>
									<td><?php echo $discount['value'];?></td>
								</tr>
							<?php } ?>
								<tr class="discount">
									<th>Discount Savings Total</th>
									<td><?php echo $this->flexi_cart->cart_savings_total();?></td>
								</tr>
							<?php } ?>

								
							<?php if ($this->flexi_cart->surcharge_status()) { ?>
								<tr class="surcharge">
									<th>Surcharge Summary</th>
									<td>&nbsp;</td>
								</tr>
								
								<!-- 
									This example uses the 'surcharge_data()' function to return an array of surcharge values and descriptions.
									An alternative to using a custom loop to return this surcharge array, is to call the 'surcharge_description()' function,
									which will return a formatted string of all surcharges.
								-->
							<?php foreach($surcharges as $surcharge) { ?>
								<tr class="surcharge">
									<th>
										<span class="pad_l_20">
											&raquo; <?php echo $surcharge['description'];?>
											: <a href="<?php echo base_url(); ?>/unset_surcharge/<?php echo $surcharge['id']; ?>">Remove</a>
										</span>
									</th>
									<td><?php echo $surcharge['value'];?></td>
								</tr>
							<?php } ?>
								<tr class="surcharge">
									<th>Surcharge Total</th>
									<td><?php echo $this->flexi_cart->surcharge_total();?></td>
								</tr>
							<?php } ?>

							<?php if ($this->flexi_cart->reward_voucher_status()) { ?>
								<tr class="voucher">
									<th>Reward Voucher Summary</th>
									<td>&nbsp;</td>
								</tr>
								
								<!-- This example uses the 'reward_voucher_data()' function to return an array of reward voucher values and descriptions. -->
							<?php foreach($reward_vouchers as $voucher) { ?>
								<tr class="voucher">
									<th>
										<span class="pad_l_20">
											&raquo; <?php echo $voucher['description'];?>
											: <a href="<?php echo base_url(); ?>/unset_discount/<?php echo $voucher['id']; ?>">Remove</a>
										</span>
									</th>
									<td><?php echo $voucher['value'];?></td>
								</tr>
							<?php } ?>
								<tr class="voucher">
									<th>Reward Voucher Total</th>
									<td><?php echo $this->flexi_cart->reward_voucher_total();?></td>
								</tr>
							<?php } ?>

							</tbody>
							<tfoot>
								<tr>
									<td>
										Sub Total (ex. tax)
									</td>
									<td>
										<?php echo $this->flexi_cart->sub_total();?>
									</td>
								</tr>
								<tr>
									<td>
										<?php echo $this->flexi_cart->tax_name()." @ ".$this->flexi_cart->tax_rate(); ?>
									</td>
									<td>
										<?php echo $this->flexi_cart->tax_total();?>
									</td>
								</tr>							
								<tr class="grand_total">
									<th>Grand Total</th>
									<td><?php echo $this->flexi_cart->total();?></td>
								</tr>
							</tfoot>
						</table>
						
						<fieldset>
							<h4>Discount Codes</h4>
							<small>Enter discount code to activate</small>
							
							<ul>
							<?php 
								// Get an array of all discount codes. The returned array keys are 'id', 'code' and 'description'.
								if ($discount_data = $this->flexi_cart->discount_codes()) {
									foreach($discount_data as $discount_codes) {
							?>
								<li>
									<input type="text" name="discount[<?php echo $discount_codes['code']; ?>]" value="<?php echo $discount_codes['code']; ?>"/> 
									<input type="submit" name="update_discount" value="Update" class="link_button grey"/>
									<input type="submit" name="remove_discount_code[<?php echo $discount_codes['code']; ?>]" value="Remove" class="link_button grey"/>
									<small class="inline">* <?php echo $discount_codes['description'];?></small>
								</li>
							<?php
									}
								}
							?>
								<li>
									<input type="text" name="discount[0]" value=""/> 
									<input type="submit" name="update_discount" value="Add Discount Code" class="link_button"/> 
									<input type="submit" name="remove_all_discounts" value="Remove all Discounts" class="link_button tooltip_trigger" title="Remove all discount codes and all manually set discounts."/>
								</li>
							</ul>
						</fieldset>
					
					<?php if (! $this->flexi_cart->location_shipping_status()) { ?>
						<div class="warning">
							<h3>Item Shipping Warning!</h3>
							<p>There are items in your cart that cannot be shipped to your current shipping location.</p>
						</div>
					<?php } ?>
						<fieldset>
							<h4>Cart Controls</h4>
							<button type="submit" name="update" value="Update Cart" class="btn btn-info btn-lg">Update Cart</button>
							<button type="submit" name="clear" value="Clear Cart" class="btn btn-danger btn-lg">Clear Cart</button>
							<button type="submit" name="checkout" value="Checkout" class="btn btn-success btn-lg">Checkout</button>
						</fieldset>
					<?php }?>					
					<?php echo form_close();?>
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
		data['csrf_test_name'] = $('input[name="csrf_test_name"]').val();

		$('#cart_content').load('<?php echo current_url();?> #ajax_content', data);
	});
});
</script>

</body>
</html>