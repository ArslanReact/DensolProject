<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo site_settings()->company_name." Admin Panel";?></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <link rel="stylesheet" href="<?php echo base_url("files/backend/css/bootstrap.min.css");?>">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css">
    <link rel="stylesheet" href="<?php echo base_url("files/backend/css/main.css");?>">
    <link rel="icon" href="<?php echo base_url("files/assets/images/favicon.ico");?>" type="image/x-icon">
    <link rel="shortcut icon" id="favicon" href="<?php echo base_url("files/assets/images/favicon.png");?>">
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
.content_wrap.nav_bg {background:url(../images/nav_wrap_red_bg.png) repeat-x #900;}
.content_wrap.intro_bg {background:url(../images/intro_wrap_bg.png) repeat-x #f0f0f0;}
.content_wrap.main_content_bg {min-height:475px; padding-top:10px; background:url(../images/main_content_wrap_bg.png) repeat-x #E9E2D9;}
.content_wrap.footer_bg {background:url(../images/footer_wrap_bg.png) repeat-x;}
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

@media only screen and (max-width: 800px) {
    .w50 {width:100%;}
    .position_right {float:left; max-width:100%;}
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
</style> 
</head>
  <body>
    <!-- Side Navbar -->
    <?php $this->load->view(ADMIN_VIEW_FOLDER."/includes/leftbar");?>
    <div class="page">
      <!-- navbar-->
      <?php $this->load->view(ADMIN_VIEW_FOLDER."/includes/header");?>
      <!-- Header Section-->
      <section class="dashboard-header section-padding">
        <div class="container-fluid">
          <div class="row d-flex align-items-md-stretch">
            <h4 class="col-md-12 title-heading"><?php echo $page_heading;?></h4>
          </div>
          <div class="row d-flex align-items-md-stretch">
            <!-- Line Chart -->
            <div class="col-lg-12 col-md-12 flex-lg-last flex-md-first align-self-baseline">
              <div class="card sales-report mt-10px">
                <h2 class="display h4">Update Order Details </h2>
                <p>You can update any detail</p>
                <?php $order_number = $current_order_data[$this->flexi_cart_admin->db_column('order_summary', 'order_number')];?>
                <p class="text-center"><a class="btn btn-primary" href="<?php echo base_url().ADMIN_FOLDER; ?>/orders">Manage Orders</a> | <a class="btn btn-success" href="<?php echo base_url().ADMIN_FOLDER; ?>/order_details/<?php echo $order_number; ?>">Back to Order Details</a></p>
                <div class="table-responsive dt-responsive">

                <?php echo form_open(current_url());?>

                <div style="width:100%; margin:0 auto">						

                    <fieldset>

                        <legend>Order</legend>

                        

                        <ul class="left">
                            <li>
                                <span class="spacer_125">Order Number: </span>
                                <?php echo $order_number;?>
                            </li>
                        </ul>

                        <ul class="right">

                            <li>

                                <span class="spacer_125">Order Date: </span>

                                <?php echo date('jS M Y', strtotime($current_order_data[$this->flexi_cart_admin->db_column('order_summary', 'date')]));?>

                            </li>

                        </ul>

                    </fieldset>

                    

                    <?php if ($current_order_data[$this->flexi_cart_admin->db_column('order_status', 'cancelled')] == 1) { ?>

                    <div class="order_status_cancelled align_ctr">

                        <p>This order is currently 'Cancelled', if the order is resaved, the status will be automatically changed to the default order status.</p>

                    </div>

                    <?php } ?>



                    <!-- <fieldset> -->

                        <!-- <legend>Add New Items to Cart</legend>

                        <small>

                            This example allows an admin to add items from the custom item database table to the cart, without needing to browse the site.

                        </small><br/>



                        <input type="button" value="Show / Hide" class="link_button toggle"/> -->

                        <!-- <div class="hide_toggle"> -->

                            <!-- <table> -->

                                <!-- <thead>

                                    <tr>

                                        <th class="tooltip_trigger" 

                                            title="The name of the item.">

                                            Name

                                        </th>

                                        <th class="spacer_100 align_ctr tooltip_trigger" 

                                            title="Indicates the weight of the item. The total weight of items in the cart can be used to calculate shipping.">

                                            Weight

                                        </th>

                                        <th class="spacer_100 align_ctr tooltip_trigger" 

                                            title="Indicates the non-discounted price of the item.">

                                            Price

                                        </th>

                                        <th class="spacer_100 align_ctr tooltip_trigger" 

                                            title="The quantity of items to be added to the cart.">

                                            Quantity

                                        </th>

                                        <th class="spacer_100 align_ctr tooltip_trigger" 

                                            title="Indicates the number of items available in stock.">

                                            Stock

                                        </th>

                                    </tr>

                                </thead> -->

                                <!-- <tbody> -->

                                    <?php

                                        // foreach($item_data as $item) {

                                        //     $item_id = $item['id'];

                                        //     $item_tax_rate = $this->flexi_cart_admin->get_item_tax_rate($item_id);

                                    ?>

                                    <!-- <tr>

                                        <td>

                                            <?php //echo $item['title']; ?>

                                        </td>

                                        <td class="align_ctr">

                                            <?php //echo $this->flexi_cart_admin->format_weight($item['weight']); ?>

                                        </td>

                                        <td class="align_ctr">

                                            <input type="text" name="insert_item[<?php //echo $item_id; ?>][item_price]" value="<?php //echo $item['price'];?>" class="width_50 align_ctr validate_decimal"/>

                                        </td>

                                        <td class="align_ctr">

                                            <input type="text" name="insert_item[<?php //echo $item_id; ?>][item_quantity]" value="0" class="width_50 align_ctr validate_integer"/>

                                        </td>

                                        <td class="align_ctr">

                                            <?php 

                                                // $item_stock_quantity = $this->flexi_cart_admin->get_item_stock_quantity($item_id, TRUE); 

                                                // echo ($item_stock_quantity) ? $item_stock_quantity : '-';

                                            ?>

                                        </td>

                                    </tr> -->

                                    <?php //} ?>

                                <!-- </tbody> -->

                            <!-- </table> -->

                            <!-- <input type="submit" name="update_order[insert_items]" value="Add Items to Order" class="link_button large"/> -->

                        <!-- </div> -->

                    <!-- </fieldset> -->



                    <fieldset>

                        <legend>Updated Order Details</legend>

                        <table id="cart_items">

                            <thead>

                                <tr>

                                    <th>Item</th>

                                    <th class="spacer_100 align_ctr">Price</th>

                                    <th class="spacer_100 align_ctr tooltip_trigger"

                                        title="Indicates the total quantity of items that are being ordered.">

                                        Quantity Ordered

                                    </th>

                                    <th class="spacer_100 align_ctr tooltip_trigger"

                                        title="Indicates the quantity of items that have been marked as 'shipped'. Shipped items activate their associated reward points.">

                                        Quantity Shipped

                                    </th>

                                    <th class="spacer_100 align_ctr tooltip_trigger"

                                        title="Indicates the quantity of items that have been marked as 'cancelled'. Cancelled items are returned to stock.">

                                        Quantity Cancelled

                                    </th>

                                    <th class="spacer_100 align_ctr">Total</th>

                                </tr>

                            </thead>

                            <tbody>

                            <?php 

                                if (! empty($update_cart_items)) {

                                    $i = 0;

                                    foreach($update_cart_items as $row) { $i++;

                            ?>

                                <tr>

                                    <td>

                                        <input type="hidden" name="items[<?php echo $i;?>][row_id]" value="<?php echo $row['row_id'];?>"/>

                                        <strong><?php echo $row['name'];?></strong><br/>



                                    <?php if ($this->flexi_cart_admin->item_option_status($row['row_id'])) { ?>

                                        <!-- Example of displaying an items options if they exist as text, rather than an editable field. -->

                                        <?php echo $this->flexi_cart_admin->item_options($row['row_id'], TRUE).'<br/>';?>										

                                    <?php } ?>

                                        

                                        <!-- 

                                            Example of displaying any item status messages.

                                            Status messages are generated if an item cannot be shipped to the current shipping location, or if there is insufficient stock.

                                            A css style ('highlight_red') can be submitted to the function to format messages.

                                        -->

                                        <?php 

                                            $item_status_message = $this->flexi_cart_admin->item_status_message($row['row_id'], 'highlight_red');

                                            echo ($item_status_message) ? $item_status_message.'<br/>' : NULL;

                                        ?>										



                                        <!-- 

                                            Example of displaying the current stock quantity of an item within the cart.

                                            As this page is displaying data of a comfirmed order, the quantity of items from the original order has already been deducted from stock when the order was placed.

                                            Therefore, the stock level will only change when either a quantity different from that originally ordered is entered, or a different quantity of 'cancelled' items is selected.

                                        -->

                                        <span class="highlight_grey">Item stock level: 

                                        <?php 

                                            $item_stock_quantity = $this->flexi_cart_admin->item_stock_quantity($row['row_id'], TRUE);

                                            echo ($item_stock_quantity !== FALSE) ? $item_stock_quantity : 'Item not in database stock table.	';

                                        ?>

                                        </span>

                                    </td>

                                    <td class="align_ctr">

                                        <input type="text" name="items[<?php echo $i;?>][price]" value="<?php echo $this->flexi_cart_admin->item_price($row['row_id'], FALSE, FALSE, TRUE);?>" class="width_50 align_ctr validate_decimal"/><br/>

                                    <?php 

                                        // If an item discount exists.

                                        if ($this->flexi_cart_admin->item_discount_status($row['row_id'])) 

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

                                                echo $row['discount_quantity'].' @ '.$row['discount_price'];

                                            }

                                        }

                                    ?>

                                    </td>

                                    <td class="align_ctr">

                                        <input type="text" name="items[<?php echo $i;?>][quantity]" value="<?php echo $row['quantity'];?>" maxlength="3" class="width_50 align_ctr validate_integer"/>

                                    </td>

                                    

                                    <td class="align_ctr">

                                        <select name="items[<?php echo $i;?>][quantity_shipped]" class="width_50">

                                            <option value="0">0</option>

                                        <?php $shipped_qty = 0; do { $shipped_qty++; ?>

                                            <option value="<?php echo $shipped_qty; ?>" <?php echo set_select('update_details['.$i.'][quantity_shipped]', $shipped_qty, ($this->flexi_cart_admin->item_shipped_quantity($row['row_id']) == $shipped_qty)); ?>>

                                                <?php echo $shipped_qty; ?>

                                            </option>

                                        <?php } while($shipped_qty < $row['quantity']); ?>

                                        </select>

                                    </td>

                                    <td class="align_ctr">

                                        <select name="items[<?php echo $i;?>][quantity_cancelled]" class="width_50">

                                            <option value="0">0</option>

                                        <?php $cancelled_qty = 0; do { $cancelled_qty++;?>

                                            <option value="<?php echo $cancelled_qty; ?>" <?php echo set_select('update_details['.$i.'][quantity_cancelled]', $cancelled_qty, ($this->flexi_cart_admin->item_cancelled_quantity($row['row_id']) == $cancelled_qty)); ?>>

                                                <?php echo $cancelled_qty; ?>

                                            </option>

                                        <?php } while($cancelled_qty < $row['quantity']); ?>

                                        </select>

                                    </td>

                                    

                                    <td class="align_ctr">

                                    <?php 

                                        // If an item discount exists, strike out the standard item total and display the discounted item total.

                                        if ($row['discount_quantity'] > 0)

                                        {

                                            echo '<span class="strike">'.$row['price_total'].'</span><br/>';

                                            echo $row['discount_price_total'];

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

                                if ($this->flexi_cart_admin->item_discount_status($row['row_id'], FALSE)) { 

                            ?>

                                <tr class="discount">

                                    <td colspan="6">

                                        Discount: <?php echo $row['discount_description'];?>

                                        : <a href="<?php echo base_url().ADMIN_FOLDER; ?>/unset_discount/<?php echo $this->flexi_cart_admin->item_discount_id($row['row_id']).'/'.$order_number;?>">Remove</a>

                                    </td>

                                </tr>

                            <?php } } } else { ?>

                                <tr>

                                    <td colspan="6" class="empty">

                                        <h4>! You currently have no items in your shopping cart !</h4>

                                    </td>

                                </tr>

                            <?php } ?>

                            </tbody>

                            <tfoot>

                            <?php if ($this->flexi_cart_admin->item_summary_savings_total(FALSE) > 0) { ?>

                                <tr class="discount">

                                    <th colspan="5">Item Summary Discount Savings Total</th> 

                                    <td><?php echo $this->flexi_cart_admin->item_summary_savings_total();?></td>

                                </tr>

                            <?php } ?>

                                <tr>

                                    <th colspan="5">Item Summary Total</th>

                                    <td><?php echo $this->flexi_cart_admin->item_summary_total();?></td>

                                </tr>

                            </tfoot>

                        </table>

                    </fieldset>

                    

                    <fieldset>

                        <legend>Cart Summary</legend>

                        <table id="cart_summary">

                            <tbody>

                                <!-- <tr>

                                    <td>

                                        Reward Points Earned

                                    </td>

                                    <td>

                                        <?php echo $this->flexi_cart_admin->total_reward_points();?> points

                                    </td>

                                </tr> -->

                                <tr>

                                    <td>

                                        Total Weight

                                    </td>

                                    <td>

                                        <?php echo $this->flexi_cart_admin->total_weight();?>

                                    </td>

                                </tr>

                                <tr>

                                    <td>

                                        Item Summary Total

                                    </td>

                                    <td>

                                        <?php echo $this->flexi_cart_admin->item_summary_total(TRUE, TRUE, TRUE);?>

                                    </td>

                                </tr>

                                <tr>

                                    <td>

                                        Shipping Option : 

                                        <select name="shipping">

                                            <option value="0"> - Shipping Options - </option>

                                        <?php 

                                            if (! empty($update_shipping_options)) {

                                                foreach($update_shipping_options as $shipping) { 

                                        ?>

                                            <option value="<?php echo $shipping['id'];?>" <?php echo set_select('shipping', $shipping['id'], ($shipping['id'] == $this->flexi_cart_admin->shipping_id())); ?>>

                                                <?php echo $shipping['name']." : ".$shipping['description'];?>

                                            </option>

                                        <?php } } else { ?>

                                            <option value="0" <?php echo set_select('shipping', 0, (0 == $this->flexi_cart_admin->shipping_id())); ?>>

                                                We'll quote you prior to dispatch.

                                            </option>

                                        <?php } ?>

                                        </select>

                                    </td>

                                    <td>

                                        <?php echo $this->flexi_cart_admin->shipping_total(TRUE, TRUE, TRUE);?>

                                    </td>

                                </tr>

                                                                

                            <?php if ($this->flexi_cart_admin->summary_discount_status()) { ?>

                                <tr class="discount">

                                    <th>Discount Summary</th>

                                    <td>&nbsp;</td>

                                </tr>

                                

                            <?php if ($this->flexi_cart_admin->item_summary_discount_status()) { ?>

                                <!-- 

                                    Rather than repeating the descriptions of each item discount listed via the cart, 

                                    this example summarises the discount totals of all items.

                                -->

                                <tr class="discount">

                                    <th>

                                        <span class="pad_l_20">

                                            &raquo; Item discount savings

                                        </span>

                                    </th>

                                    <td>

                                        <?php echo $this->flexi_cart_admin->item_summary_savings_total();?>

                                    </td>

                                </tr>

                            <?php } ?>

                                

                                <!-- 

                                    This example uses the 'summary_discount_data()' function to return an array of summary discount values and descriptions.

                                    An alternative to using a custom loop to return this discount array, is to call the 'summary_discount_description()' function,

                                    which will return a formatted string of all summary discounts. 

                                -->

                            <?php foreach($update_discounts as $discount) { ?>

                                <tr class="discount">

                                    <th>

                                        <span class="pad_l_20">

                                            &raquo; <?php echo $discount['description'];?>

                                        <?php if (! empty($discount['id'])) { ?>

                                            : <a href="<?php echo base_url().ADMIN_FOLDER; ?>/unset_discount/<?php echo $discount['id'].'/'.$order_number; ?>">Remove</a>

                                        <?php } ?>

                                        </span>

                                    </th>

                                    <td><?php echo $discount['value'];?></td>

                                </tr>

                            <?php } ?>

                                <tr class="discount">

                                    <th>Discount Savings Total</th>

                                    <td><?php echo $this->flexi_cart_admin->cart_savings_total();?></td>

                                </tr>

                            <?php } ?>



                                

                            <?php if ($this->flexi_cart_admin->surcharge_status()) { ?>

                                <tr class="surcharge">

                                    <th>Surcharge Summary</th>

                                    <td>&nbsp;</td>

                                </tr>

                                

                                <!-- 

                                    This example uses the 'surcharge_data()' function to return an array of surcharge values and descriptions.

                                    An alternative to using a custom loop to return this surcharge array, is to call the 'surcharge_description()' function,

                                    which will return a formatted string of all surcharges.

                                -->

                            <?php foreach($update_surcharges as $surcharge) { ?>

                                <tr class="surcharge">

                                    <th>

                                        <span class="pad_l_20">

                                            &raquo; <?php echo $surcharge['description'];?>

                                            : <a href="<?php echo base_url().ADMIN_FOLDER; ?>/unset_surcharge/<?php echo $surcharge['id'].'/'.$order_number; ?>">Remove</a>

                                        </span>

                                    </th>

                                    <td><?php echo $surcharge['value'];?></td>

                                </tr>

                            <?php } ?>

                                <tr class="surcharge">

                                    <th>Surcharge Total</th>

                                    <td><?php echo $this->flexi_cart_admin->surcharge_total();?></td>

                                </tr>

                            <?php } ?>



                            

                            

                            </tbody>

                            <tfoot>

                                <tr>

                                    <th>Sub Total (ex. tax)</th>

                                    <td><?php echo $this->flexi_cart_admin->sub_total(TRUE, TRUE, TRUE);?></td>

                                </tr>

                                <tr>

                                    <th>

                                        <?php echo $this->flexi_cart_admin->tax_name()." @ ".$this->flexi_cart_admin->tax_rate();?>

                                    </td>

                                    <td>

                                        <?php echo $this->flexi_cart_admin->tax_total(TRUE, TRUE, TRUE);?>

                                    </td>

                                </tr>

                                <tr class="grand_total">

                                    <th>Grand Total</th>

                                    <td><?php echo $this->flexi_cart_admin->total(TRUE, TRUE, TRUE);?></td>

                                </tr>

                            </tfoot>

                        </table>

                        

                        <input type="submit" name="update_order[order]" value="Update Cart (Without Saving)" class="btn btn-info"/>

                        <input type="submit" name="update_order[save]" value="Re-Save Cart as Order" class="btn btn-danger"/>

                    </fieldset>



                    <fieldset>

                        <legend>Discounts / Surcharges</legend>

                        <small>

                            This example allows an admin to add discounts, surcharges to the order, either via codes or by setting them manually.

                        </small><br/>



                        <input type="button" value="Show / Hide" class="link_button toggle"/>

                        <div class="hide_toggle">

                            <hr/>

                            <caption>Discount Code</caption> 

                            <ul class="frame_note">

                            <?php 

                                // Get an array of all discount codes. The returned array keys are 'id', 'code' and 'description'.

                                if ($discount_data = $this->flexi_cart_admin->discount_codes()) {

                                    foreach($discount_data as $discount_codes) {

                            ?>

                                <li>

                                    <input type="hidden" name="discount_code[<?php echo $discount_codes['code']; ?>]" value="<?php echo $discount_codes['code']; ?>"/> 

                                    <!-- <input type="submit" name="update_discount" value="Update" class="link_button grey"/>

                                    <input type="submit" name="remove_discount_code[<?php echo $discount_codes['code']; ?>]" value="Remove" class="link_button grey"/> -->

                                    <small class="inline">* <?php echo $discount_codes['description'];?></small>

                                </li>

                            <?php

                                    }

                                }

                            ?>

                                <li>

                                    <input type="text" name="discount_code[0]" value=""/> 

                                    <input type="submit" name="update_order[discount_code]" value="Add Discount Code" class="link_button"/> 

                                </li>

                            </ul>

                            <caption>Apply New Discounts</caption>                            

                            <table>

                                <thead>

                                    <tr>

                                        <th class="tooltip_trigger" 

                                            title="A short description of the discount.">

                                            Discount Description

                                        </th>

                                        <th class="spacer_200 align_ctr tooltip_trigger" 

                                            title="Indicates the summary column that the discount is applied to.">

                                            Target Column

                                        </th>

                                        <th class="spacer_200 align_ctr tooltip_trigger" 

                                            title="The percentage or monetary value of the discount.">

                                            Discount Value

                                        </th>

                                        <th class="spacer_125 align_ctr tooltip_trigger" 

                                            title="Copy or remove a specific row and its data.">

                                            Copy / Remove

                                        </th>

                                    </tr>

                                </thead>

                                <tbody>

                                    <tr>

                                        <td>

                                            <input type="text" name="discount[0][description]" placeholder="Add New Discount" class="width_300"/>

                                        </td>

                                        <td class="align_ctr">

                                            <!-- 

                                                Note the select option values are the valid column names required by the 'set_discount()' function.

                                                'item_summary_total' = apply discount to total of all items only, 

                                                'shipping_total' = apply discount to total of shipping only, 'total' = apply discount to total of entire cart.

                                            -->

                                            <select name="discount[0][column]" class="width_175">

                                                <option value="item_summary_total">Item Summary Total</option>

                                                <option value="shipping_total">Shipping Total</option>

                                                <option value="total">Grand Total</option>

                                            </select>

                                        </td>

                                        <td class="align_ctr">

                                            <input type="text" name="discount[0][value]" value="0" class="width_50 align_ctr validate_decimal"/>

                                            

                                            <!-- 

                                                Note the select option values are the valid calculation method ids required by the 'set_discount()' function.

                                                1 = percentage based discounts, 2 = flat rate discounts, 3 = new value (Can only be applied to shipping total).

                                            -->

                                            <select name="discount[0][calculation]" class="width_100">

                                                <option value="1">Percent</option>

                                                <option value="2">Flat Rate</option>

                                                <option value="3">New Value</option>

                                            </select>

                                        </td>

                                        <td class="align_ctr">

                                            <input type="button" value="+" class="copy_row link_button"/>

                                            <input type="button" value="x" disabled="disabled" class="remove_row link_button"/>

                                        </td>

                                    </tr>

                                </tbody>

                                <tfoot>

                                    <tr>

                                        <td colspan="4">

                                            <small>

                                                Note: 'New Value' discounts can only be applied to the 'Shipping Total' column.

                                            </small>

                                        </td>

                                    </tr>

                                </tfoot>

                            </table>

                            <caption>Apply New Surcharges</caption>

                            <table>

                                <thead>

                                    <tr>

                                        <th class="tooltip_trigger" 

                                            title="A short description of the surcharge.">

                                            Description

                                        </th>

                                        <th class="spacer_100 align_ctr tooltip_trigger" 

                                            title="The tax rate percentage applied to the surcharge. If left blank, the default cart tax rate is used.">

                                            Tax Rate

                                        </th>

                                        <th class="spacer_300 align_ctr tooltip_trigger" 

                                            title="The percentage or monetary value of the surcharge.">

                                            Value

                                        </th>

                                        <th class="spacer_125 align_ctr tooltip_trigger" 

                                            title="Copy or remove a specific row and its data.">

                                            Copy / Remove

                                        </th>

                                    </tr>

                                </thead>

                                <tbody>

                                    <tr>

                                        <td>

                                            <input type="text" name="surcharge[0][description]" placeholder="Add New Surcharge" class="width_300"/>

                                        </td>

                                        <td class="align_ctr">

                                            <input type="text" name="surcharge[0][tax_rate]" value="" placeholder="default" class="width_50 align_ctr validate_decimal"/>

                                        </td>

                                        <td class="align_ctr">

                                            <input type="text" name="surcharge[0][value]" value="0" class="width_50 align_ctr validate_decimal"/>

                                            

                                            <!-- 

                                                Note the select option values are the valid column names required by the 'set_surcharge()' function.

                                                Blank = flat rate surcharge to grand total, 'item_summary_total' = a percentage surcharge on item total only,

                                                'shipping_total' = a percentage surcharge on shipping total only, 'total' = a percentage surcharge on total of entire cart.

                                            -->

                                            <select name="surcharge[0][column]" class="width_225">

                                                <option value="">Flat Rate on Grand Total</option>

                                                <option value="item_summary_total">% Surcharge on Item Total</option>

                                                <option value="shipping_total">% Surcharge on Shipping Total</option>

                                                <option value="total">% Surcharge on Grand Total</option>

                                            </select>

                                        </td>

                                        <td class="align_ctr">

                                            <input type="button" value="+" class="copy_row link_button"/>

                                            <input type="button" value="x" disabled="disabled" class="remove_row link_button"/>

                                        </td>

                                    </tr>

                                </tbody>

                                <tfoot>

                                    <tr>

                                        <td colspan="4">

                                            &nbsp;

                                        </td>

                                    </tr>

                                </tfoot>

                            </table>

                        </div>

                    </fieldset>

                </div>

                <?php echo form_close(); ?>

                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- Updates Section -->
      <?php $this->load->view(ADMIN_VIEW_FOLDER."/includes/footer");?>
    </div>
    <!-- JavaScript files-->
    <?php $this->load->view(ADMIN_VIEW_FOLDER."/includes/scripts");?>
  </body>
</html>