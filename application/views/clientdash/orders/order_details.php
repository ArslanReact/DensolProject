<!DOCTYPE html>

<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo site_settings()->company_name." Admin Panel";?></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <link rel="icon" type="image/png" href="<?=base_url();?>files/backend/images/favicon.ico"/>
    <link rel="stylesheet" href="<?=base_url();?>files/backend/css/all.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url();?>files/backend/css/theme_bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url();?>files/backend/css/theme-style.css">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
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





      @media only screen and (max-width: 800px) {

          .w50 {width:100%;}

          .position_right {float:left; max-width:100%;}

      }



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



      ::-webkit-input-placeholder { /* Edge */
          color: gray;
      }

      :-ms-input-placeholder { /* Internet Explorer */
          color: gray;
      }

      ::placeholder {
          color: gray;
      }




  </style>
  <body>

    <!-- Side Navbar -->

    <?php $this->load->view(ADMIN_VIEW_FOLDER."/includes/leftbar");?>

    <div class="col-xl-10 col-lg-9">
        <!-- dashboard content -->
        <div class="content-page-admin">

      <!-- navbar-->

      <?php $this->load->view(ADMIN_VIEW_FOLDER."/includes/header");?>
            <div class="col-12 m-b-20 m-t-20"><h4 class="tite-admin"><?php echo $page_heading;?></h4></div>
      <!-- Header Section-->


          <div class="row d-flex align-items-md-stretch">

            <!-- Line Chart -->

            <div class="col-lg-12 col-md-12 flex-lg-last flex-md-first align-self-baseline">

              <div class="card sales-report mt-10px">


                <p><a class="btn btn-primary" href="<?php echo base_url().ADMIN_FOLDER; ?>/orders">Manage Orders</a></p>

                <div class="table-responsive">

                <?php echo form_open(current_url());?>						

                    <div style="width:100%; margin:0 auto">

                    <fieldset>

                        <legend>Order</legend>

                        

                        <ul class="position_left">

                            <li>
                                <strong class="spacer_125">Order Number: </strong>
                                <?php echo $summary_data[$this->flexi_cart_admin->db_column('order_summary', 'order_number')];?>
                            </li>

                            <li>
                                <span class="spacer_125">Order Date: </span>
                                <?php echo date('jS M Y', strtotime($summary_data[$this->flexi_cart_admin->db_column('order_summary', 'date')]));?>
                            </li>

                        </ul>

                        <ul class="position_right">

                            <li>

                                <strong class="spacer_125">Order Status:</strong>

                                <?php

                                    if ($summary_data[$this->flexi_cart_admin->db_column('order_status', 'cancelled')] == 1)

                                    {

                                        echo '<strong class="highlight_red">'.$summary_data[$this->flexi_cart_admin->db_column('order_status', 'status')].'</strong>';

                                    }

                                    else

                                    {

                                        echo $summary_data[$this->flexi_cart_admin->db_column('order_status', 'status')];									

                                    }

                                ?>

                            </li>

                        </ul>

                    </fieldset>

                        

                    <fieldset class="w50">

                        <legend>Billing Details</legend>

                        <ul>

                            <li><span class="spacer_125">Name: </span><?php echo $summary_data['ord_demo_bill_name'];?></li>

                            <li><span class="spacer_125">Address 01: </span><?php echo $summary_data['ord_demo_bill_address_01'];?></li>

                            <li><span class="spacer_125">Address 02: </span><?php echo $summary_data['ord_demo_bill_address_02'];?></li>

                            <li><span class="spacer_125">City / Town: </span><?php echo $summary_data['ord_demo_bill_city'];?></li>

                            <li><span class="spacer_125">State / County: </span><?php echo $summary_data['ord_demo_bill_state'];?></li>

                            <li><span class="spacer_125">Post / Zip Code: </span><?php echo $summary_data['ord_demo_bill_post_code'];?></li>

                            <li><span class="spacer_125">Country: </span><?php echo $summary_data['ord_demo_bill_country'];?></li>

                        </ul>

                    </fieldset>

                    <fieldset class="w50 r_margin">

                        <legend>Shipping Details</legend>

                        <ul>

                            <li><span class="spacer_125">Name: </span><?php echo $summary_data['ord_demo_ship_name'];?></li>

                            <li><span class="spacer_125">Address 01: </span><?php echo $summary_data['ord_demo_ship_address_01'];?></li>

                            <li><span class="spacer_125">Address 02: </span><?php echo $summary_data['ord_demo_ship_address_02'];?></li>

                            <li><span class="spacer_125">City / Town: </span><?php echo $summary_data['ord_demo_ship_city'];?></li>

                            <li><span class="spacer_125">State / County: </span><?php echo $summary_data['ord_demo_ship_state'];?></li>

                            <li><span class="spacer_125">Post / Zip Code: </span><?php echo $summary_data['ord_demo_ship_post_code'];?></li>

                            <li><span class="spacer_125">Country: </span><?php echo $summary_data['ord_demo_ship_country'];?></li>

                        </ul>

                    </fieldset>

                    

                    <div class="parallel">

                        <fieldset class="w50 parallel_target">

                            <legend>Contact Details</legend>

                            <ul style="font-size:14px;">

                                <li><span class="spacer_125">Email: </span> <?php echo $summary_data['ord_demo_email'];?></li>

                                <li><span class="spacer_125">Phone: </span> <?php echo $summary_data['ord_demo_phone'];?></li>

                            <?php if (! empty($summary_data['ord_demo_comments'])) { ?>

                                <li><span class="spacer_125">Comments: </span> <?php echo $summary_data['ord_demo_comments'];?></li>

                            <?php }else{?>

                                <li><span class="spacer_125">Comments: </span> N/A</li>

                            <?php }?>

                            </ul>				

                        </fieldset>

                        <fieldset class="w50 r_margin parallel_target">

                            <legend>Payment Details</legend>

                            <ul style="font-size:14px;">

                                <?php //if($summary_data['ord_status'] != 1){?>
                                <?php if($summary_data['payment_type']==0){$userdd = getuserData($summary_data['ord_user_fk']);?>
                                    <li><span class="spacer_125"><strong>-</strong></span></li>
                                    <li><span class="spacer_125"><strong>Payment By:</strong> </span> Credit: <?php echo $userdd->credit_type." Days";?></li>
                                    <li>-</li>
                                <?php }elseif($summary_data['payment_type']==1){?>
                                    <?php if($summary_data['payment_status'] == "Completed"){?>
                                    <li><span class="spacer_125"><strong>Paid</strong></span></li>
                                    <li><span class="spacer_125"><strong>Payment By:</strong> </span> Direct Bank Transfer</li>
                                    <?php }else{?>
                                    <li><strong>Not Paid</strong></li>
                                    <li><span class="spacer_125"><strong>Payment Type:</strong> </span> Direct Bank Transfer</li>
                                    <li>-</li>
                                    <?php }?>
                                <?php }elseif($summary_data['payment_type']==2){?> 
                                    <?php if($summary_data['paypal_status'] == "VERIFIED"){?>
                                    <li><span class="spacer_125"><strong>Paid</strong></span></li>
                                    <li><span class="spacer_125"><strong>Payment Type:</strong> </span> Paypal (Txn_id: <?php echo $summary_data['txn_id'];?>)</li>
                                    <li><span class="spacer_125"><strong>Payer:</strong> </span> <?php echo $summary_data['payer_email'];?> (Total Paid: <?php echo $this->flexi_cart_admin->format_currency($summary_data['total_paid'], TRUE, 2, TRUE);?>)</li>
                                    <li><span class="spacer_125"><strong>Payment Status:</strong> </span><?php echo $summary_data['payment_status'];?> (Paypal Status: <?php echo $summary_data['paypal_status'];?>)</li>
                                    <?php if($summary_data['pending_reason']){?>
                                    <li><span class="spacer_125"><strong>Pending Reason:</strong> </span><?php echo $summary_data['pending_reason'];?></li>
                                    <?php }?>
                                    <?php }else{?>
                                    <li><strong>Not Paid</strong></li>
                                    <li><span class="spacer_125"><strong>Payment Type:</strong> </span> Paypal</li>
                                    <li>-</li>
                                    <?php }?>
                                <?php }elseif($summary_data['payment_type']==3){?>
                                    <?php if($summary_data['payment_status'] == "Completed"){?>
                                    <li><span class="spacer_125"><strong>Paid</strong></span></li>
                                    <li><span class="spacer_125"><strong>Payment Type:</strong> </span> Stripe (Txn_id: <?php echo $summary_data['txn_id'];?>)</li>
                                    <li><span class="spacer_125"><strong>Payer:</strong> </span> <?php echo $summary_data['payer_email'];?> (Total Paid: <?php echo $this->flexi_cart_admin->format_currency($summary_data['total_paid'], TRUE, 2, TRUE);?>)</li>
                                    <li><span class="spacer_125"><strong>Payment Status:</strong> </span><?php echo $summary_data['payment_status'];?> (Stripe Status: <?php echo $summary_data['paypal_status'];?>)</li>
                                    <?php }else{?>
                                    <li><strong>Not Paid</strong></li>
                                    <li><span class="spacer_125"><strong>Payment Type:</strong> </span> Stripe</li>
                                    <li>-</li>
                                    <?php }?>
                                <?php }elseif($summary_data['payment_type']==4){?>
                                    <?php if($summary_data['payment_status'] == "Completed"){?>
                                    <li><span class="spacer_125"><strong>Paid</strong></span></li>
                                    <li><span class="spacer_125"><strong>Payment Type:</strong> </span> eWay (Txn_id: <?php echo $summary_data['txn_id'];?>)</li>
                                    <li><span class="spacer_125"><strong>Payer:</strong> </span> <?php echo $summary_data['payer_email'];?> (Total Paid: <?php echo $this->flexi_cart_admin->format_currency($summary_data['total_paid'], TRUE, 2, TRUE);?>)</li>
                                    <li><span class="spacer_125"><strong>Payment Status:</strong> </span><?php echo $summary_data['payment_status'];?> (eWay Status: <?php echo $summary_data['paypal_status'];?>)</li>
                                    <?php }else{?>
                                    <li><strong>Not Paid</strong></li>
                                    <li><span class="spacer_125"><strong>Payment Type:</strong> </span> eWay</li>
                                    <li>-</li>
                                    <?php }?>
                                <?php }?>

                            </ul>

                        </fieldset>

                    </div>



                    <fieldset>

                        <legend>Order Details</legend>

                        <small>

                            The functionality of this example is entirely optional to the setup of the cart.<br/>

                            This example allows an admin to update the quantity of items that have been 'shipped' or 'cancelled' since the order was placed.

                            When the cart is setup to manage 'shipped' quantities, earnt reward points are set to only activate 'x' number of days after an item has been marked as 'shipped'.

                            Additionally, this example demonstrates how cancelling items or the entire order automatically returns item stock.

                        </small>

                        

                        <table id="cart_items">

                            <thead>

                                <tr>

                                    <th>Item</th>

                                    <th class="spacer_100 align_ctr">Price</th>

                                    <th class="spacer_100 align_ctr tooltip_trigger"

                                        title="Indicates the total quantity of items that were ordered.">

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

                                if (! empty($item_data)) {

                                    foreach($item_data as $row) {

                                        $order_detail_id = $row[$this->flexi_cart_admin->db_column('order_details', 'id')];

                            ?>

                                <tr>

                                    <td>

                                        <input type="hidden" name="update_details[<?php echo $order_detail_id;?>][id]" value="<?php echo $order_detail_id;?>"/>

                                        

                                        <!-- Item Name -->

                                        <?php echo $row[$this->flexi_cart_admin->db_column('order_details', 'item_name')];?>



                                        <!-- Display an item status message if it exists -->

                                        <?php 

                                            echo (! empty($row[$this->flexi_cart_admin->db_column('order_details', 'item_status_message')])) ? 

                                                '<br/><span class="highlight_red">'.$row[$this->flexi_cart_admin->db_column('order_details', 'item_status_message')].'</span>' : NULL; 

                                        ?>

                                        

                                        <!-- Display an items options if they exist -->

                                        <?php 

                                            echo (! empty($row[$this->flexi_cart_admin->db_column('order_details', 'item_options')])) ? 

                                                '<br/>'.$row[$this->flexi_cart_admin->db_column('order_details', 'item_options')] : NULL; 

                                        ?>

                                        

                                        <!-- 

                                            Display an items user note if it exists

                                            Note: This is a optional custom field added to this cart demo and is not defined via the cart config file.

                                        -->										

                                        <?php echo (! empty($row['ord_det_demo_user_note'])) ? '<br/>Note: '.$row['ord_det_demo_user_note'] : NULL; ?>

                                    </td>

                                    <td class="align_ctr">

                                    <?php 

                                        // If an item discount exists.

                                        if ($row[$this->flexi_cart_admin->db_column('order_details', 'item_discount_quantity')] > 0) 

                                        {

                                            // If the quantity of non discounted items is zero, strike out the standard price.

                                            if ($row[$this->flexi_cart_admin->db_column('order_details', 'item_non_discount_quantity')] == 0)

                                            {

                                                echo '<span class="strike">'.$this->flexi_cart_admin->format_currency($row[$this->flexi_cart_admin->db_column('order_details', 'item_price')], TRUE, 2, TRUE).'</span><br/>';

                                            }

                                            // Else, display the quantity of items that are at the standard price.

                                            else

                                            {

                                                echo number_format($row[$this->flexi_cart_admin->db_column('order_details', 'item_non_discount_quantity')]).' @ '.

                                                    $this->flexi_cart_admin->format_currency($row[$this->flexi_cart_admin->db_column('order_details', 'item_price')], TRUE, 2, TRUE).'<br/>';

                                            }

                                            

                                            // If there are discounted items, display the quantity of items that are at the discount price.

                                            if ($row[$this->flexi_cart_admin->db_column('order_details', 'item_discount_quantity')] > 0)

                                            {

                                                echo number_format($row[$this->flexi_cart_admin->db_column('order_details', 'item_discount_quantity')]).' @ '.

                                                    $this->flexi_cart_admin->format_currency($row[$this->flexi_cart_admin->db_column('order_details', 'item_discount_price')], TRUE, 2, TRUE);

                                            }

                                        }

                                        // Else, display price as normal.

                                        else

                                        {

                                            echo $this->flexi_cart_admin->format_currency($row[$this->flexi_cart_admin->db_column('order_details', 'item_price')], TRUE, 2, TRUE);

                                        }

                                    ?>

                                    </td>

                                    <td class="align_ctr">

                                        <?php echo round($row[$this->flexi_cart_admin->db_column('order_details', 'item_quantity')], 2); ?>

                                    </td>

                                    <td class="align_ctr">

                                        <!-- 

                                            If the status of the order is 'Cancelled', flexi cart functions will not update any submitted 'shipped' and 'cancelled' quantities, until the order is un-cancelled. 

                                            This demo includes a user interface tweak to disable the select input fields if they cannot be updated.

                                        -->

                                        <select name="update_details[<?php echo $order_detail_id;?>][quantity_shipped]" class="width_50" <?php echo ($summary_data[$this->flexi_cart_admin->db_column('order_status', 'cancelled')] == 1) ? 'disabled="disabled"' : NULL; ?>>

                                            <option value="0">0</option>

                                        <?php $i=0; do { $i++; ?>

                                            <option value="<?php echo $i; ?>" <?php echo set_select('update_details['.$order_detail_id.'][quantity_shipped]', $i, ($row[$this->flexi_cart_admin->db_column('order_details', 'item_quantity_shipped')] == $i)); ?>>

                                                <?php echo $i; ?>

                                            </option>

                                        <?php } while($i < $row[$this->flexi_cart_admin->db_column('order_details', 'item_quantity')]); ?>

                                        </select>

                                    </td>

                                    <td class="align_ctr">

                                        <!-- 

                                            If the status of the order is 'Cancelled', flexi cart functions will not update any submitted 'shipped' and 'cancelled' quantities, until the order is un-cancelled. 

                                            This demo includes a user interface tweak to disable the select input fields if they cannot be updated.

                                        -->

                                        <select name="update_details[<?php echo $order_detail_id;?>][quantity_cancelled]" class="width_50" <?php echo ($summary_data[$this->flexi_cart_admin->db_column('order_status', 'cancelled')] == 1) ? 'disabled="disabled"' : NULL; ?>>

                                            <option value="0">0</option>

                                        <?php $i=0; do { $i++;?>

                                            <option value="<?php echo $i; ?>" <?php echo set_select('update_details['.$order_detail_id.'][quantity_cancelled]', $i, ($row[$this->flexi_cart_admin->db_column('order_details', 'item_quantity_cancelled')] == $i)); ?>>

                                                <?php echo $i; ?>

                                            </option>

                                        <?php } while($i < $row[$this->flexi_cart_admin->db_column('order_details', 'item_quantity')]); ?>

                                        </select>

                                    </td>

                                    <td class="align_ctr">

                                    <?php 

                                        // If an item discount exists, strike out the standard item total and display the discounted item total.

                                        if ($row[$this->flexi_cart_admin->db_column('order_details', 'item_discount_quantity')] > 0)

                                        {

                                            echo '<span class="strike">'.$this->flexi_cart_admin->format_currency($row[$this->flexi_cart_admin->db_column('order_details', 'item_price_total')], TRUE, 2, TRUE).'</span><br/>';

                                            echo $this->flexi_cart_admin->format_currency($row[$this->flexi_cart_admin->db_column('order_details', 'item_discount_price_total')], TRUE, 2, TRUE);

                                        }

                                        // Else, display item total as normal.

                                        else

                                        {

                                            echo $this->flexi_cart_admin->format_currency($row[$this->flexi_cart_admin->db_column('order_details', 'item_price_total')], TRUE, 2, TRUE);

                                        }

                                    ?>

                                    </td>

                                </tr>

                            <?php 

                                // If an item discount exists.

                                if (! empty($row[$this->flexi_cart_admin->db_column('order_details', 'item_discount_description')])) { 

                            ?>

                                <tr class="discount">

                                    <td colspan="6">

                                        Discount: <?php echo $row[$this->flexi_cart_admin->db_column('order_details', 'item_discount_description')];?>

                                    </td>

                                </tr>

                            <?php } } } else { ?>

                                <tr>

                                    <td colspan="6" class="empty">

                                        <h4>! There are no items associated with this order !</h4>

                                    </td>

                                </tr>

                            <?php } ?>

                            </tbody>

                            <tfoot>

                            <?php if ($summary_data[$this->flexi_cart_admin->db_column('order_summary', 'item_summary_savings_total')] > 0) { ?>

                                <tr class="discount">

                                    <th colspan="5">Item Summary Discount Total</th> 

                                    <td class="align_ctr">

                                    <?php echo $this->flexi_cart_admin->format_currency($summary_data[$this->flexi_cart_admin->db_column('order_summary', 'item_summary_savings_total')], TRUE, 2, TRUE);?></td>

                                </tr>

                            <?php } ?>

                                <tr>

                                    <th colspan="5">Item Summary Total</th>

                                    <td class="align_ctr"><?php echo $this->flexi_cart_admin->format_currency($summary_data[$this->flexi_cart_admin->db_column('order_summary', 'item_summary_total')], TRUE, 2, TRUE);?></td>

                                </tr>

                            </tfoot>

                        </table>

                        

                        <ul class="<?php echo ($summary_data[$this->flexi_cart_admin->db_column('order_status', 'cancelled')] == 1) ? 'order_status_cancelled' : 'order_status_active'; ?>">

                            <li>

                                <strong class="spacer_125">Update Status:</strong>

                                <select name="update_status" class="width_175">

                                <?php 

                                    foreach($status_data as $status) { 

                                        $id = $status[$this->flexi_cart_admin->db_column('order_status', 'id')];

                                ?>

                                    <option value="<?php echo $id; ?>" <?php echo set_select('update_status', $id, ($summary_data[$this->flexi_cart_admin->db_column('order_summary', 'status')] == $id)); ?>>

                                        <?php echo $status[$this->flexi_cart_admin->db_column('order_status', 'status')]; ?>

                                    </option>

                                <?php } ?>

                                </select>

                            </li>
                            


                        </ul>


                        <textarea class="typemsghere" name="update_status_message" id="" rows="10" placeholder="Type message here for more information." style="width: 100%;"></textarea>
                        <input type="checkbox" name="send_email_to_user" value="1" checked>Send email to user?<hr>
                        <button type="submit" name="update_order" value="Update Order Details" class="btn btn-success">Update Order Details</button>

                        <a href="<?php echo base_url().ADMIN_FOLDER; ?>/update_order_details/<?php echo $summary_data[$this->flexi_cart_admin->db_column('order_summary', 'order_number')]; ?>" class="btn btn-info" style="transform: translateY(-2px);">Edit Order</a>

                    </fieldset>



                    <fieldset>

                        <legend>Order Summary</legend>

                        <table id="cart_summary">

                            <tbody>

                                <!-- <tr>

                                    <td>Reward Points Earned</td>

                                    <td class="spacer_100"><?php echo number_format($summary_data[$this->flexi_cart_admin->db_column('order_summary', 'total_reward_points')]);?> points</td>

                                </tr> -->

                                <tr>

                                    <td>Total Weight</td>

                                    <td><?php echo number_format($summary_data[$this->flexi_cart_admin->db_column('order_summary', 'total_weight')]);?> grams</td>

                                </tr>

                                <tr>

                                    <td>Shipping: <?php echo $summary_data[$this->flexi_cart_admin->db_column('order_summary', 'shipping_name')];?></td>

                                    <td><?php echo $this->flexi_cart_admin->format_currency($summary_data[$this->flexi_cart_admin->db_column('order_summary', 'shipping_total')], TRUE, 2, TRUE);?></td>

                                </tr>



                            <!-- Display discounts -->

                            <?php if ($summary_data[$this->flexi_cart_admin->db_column('order_summary', 'savings_total')] > 0) { ?>

                                <tr class="discount">

                                    <th>Discount Summary</th>

                                    <td>&nbsp;</td>

                                </tr>

                                

                                <!-- Item discounts -->

                                <?php if ($summary_data[$this->flexi_cart_admin->db_column('order_summary', 'item_summary_savings_total')] > 0) { ?>

                                <tr class="discount">

                                    <td>

                                        <span class="pad_l_20">

                                            Item discount savings : <?php echo $this->flexi_cart_admin->format_currency($summary_data[$this->flexi_cart_admin->db_column('order_summary', 'item_summary_savings_total')], TRUE, 2, TRUE);?>

                                        </span>

                                    </td>

                                    <td>&nbsp;</td>

                                </tr>

                                <?php } ?>	

                            

                                <!-- Summary discounts -->

                                <?php if ($summary_data[$this->flexi_cart_admin->db_column('order_summary', 'summary_savings_total')] > 0) { ?>

                                <tr class="discount">

                                    <td class="pad_l_20">

                                        <?php echo $summary_data[$this->flexi_cart_admin->db_column('order_summary', 'summary_discount_description')];?>

                                    </td>

                                    <td>&nbsp;</td>

                                </tr>

                                <?php } ?>

                            

                                <!-- Total of all discounts -->

                                <tr class="discount">

                                    <td>Discount Savings Total</td>

                                    <td><?php echo $this->flexi_cart_admin->format_currency($summary_data[$this->flexi_cart_admin->db_column('order_summary', 'savings_total')], TRUE, 2, TRUE);?></td>

                                </tr>

                            <?php } ?>



                            <!-- Display summary of all surcharges -->

                            <?php if ($summary_data[$this->flexi_cart_admin->db_column('order_summary', 'surcharge_total')] > 0) { ?>

                                <tr class="surcharge">

                                    <th>Surcharge Summary</th>

                                    <td>&nbsp;</td>

                                </tr>

                                <tr class="surcharge">

                                    <td class="pad_l_20">

                                        <?php echo $summary_data[$this->flexi_cart_admin->db_column('order_summary', 'surcharge_description')];?>

                                    </td>

                                    <td>&nbsp;</td>

                                </tr>

                                <tr class="surcharge">

                                    <td>Surcharge Total</td>

                                    <td><?php echo $this->flexi_cart_admin->format_currency($summary_data[$this->flexi_cart_admin->db_column('order_summary', 'surcharge_total')], TRUE, 2, TRUE);?></td>

                                </tr>

                            <?php } ?>

                                

                            <!-- Display refund summary -->

                            <?php if ($refund_data[$this->flexi_cart_admin->db_column('order_details', 'item_price')] > 0) { ?>

                                <tr class="refund">

                                    <td>

                                        Refund Cancelled Items 

                                        <small>

                                            This value is an  <em class="uline">estimate</em> of the orders total refund value, however, it does not include any percentage based surcharges or discounts that may have been applied to the orders summary values. The grand total below does not include this refund.

                                        </small>

                                    </td>

                                    <td>

                                    <?php

                                        if ($refund_data[$this->flexi_cart_admin->db_column('order_details', 'item_discount_price')] > 0)

                                        {

                                            echo $this->flexi_cart_admin->format_currency($refund_data[$this->flexi_cart_admin->db_column('order_details', 'item_discount_price')], TRUE, 2, TRUE);

                                        }

                                        else

                                        {

                                            echo $this->flexi_cart_admin->format_currency($refund_data[$this->flexi_cart_admin->db_column('order_details', 'item_price')], TRUE, 2, TRUE);

                                        }

                                    ?>

                                    </td>

                                </tr>

                            <?php } ?>

                            </tbody>

                            <tfoot>

                                <tr>

                                    <th>Sub Total (ex. tax)</th>

                                    <!-- <td><?php //echo $this->flexi_cart_admin->format_currency($summary_data[$this->flexi_cart_admin->db_column('order_summary', 'sub_total')], TRUE, 2, TRUE);?></td> -->

                                    <td><?php echo $this->flexi_cart_admin->sub_total(TRUE, TRUE, TRUE);?></td>

                                </tr>

                                <tr>

                                    <th>

                                        <?php echo 'Tax @ '.$summary_data[$this->flexi_cart_admin->db_column('order_summary', 'tax_rate')].'%';?>

                                    </th>

                                    <td><?php echo $this->flexi_cart_admin->format_currency($summary_data[$this->flexi_cart_admin->db_column('order_summary', 'tax_total')], TRUE, 2, TRUE);?></td>

                                </tr>

                                <tr class="grand_total">

                                    <th>Grand Total</th>

                                    <td><?php echo $this->flexi_cart_admin->format_currency($summary_data[$this->flexi_cart_admin->db_column('order_summary', 'total')], TRUE, 2, TRUE);?></td>

                                </tr>

                            </tfoot>

                        </table>

                    </fieldset>

                    </div>

                <?php echo form_close(); ?>

                </div>

              </div>

            </div>

          </div>



      <!-- Updates Section -->

      <?php $this->load->view(ADMIN_VIEW_FOLDER."/includes/footer");?>

    </div>
    </div>

    <!-- JavaScript files-->

    <?php $this->load->view(ADMIN_VIEW_FOLDER."/includes/scripts");?>

  </body>

</html>