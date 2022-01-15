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
      .w50 {width:100%;}
      .w33 {width:100%;}
      .r_margin {margin-right:0;}

      .pad_10 {padding:5px 10px;}
      .w100.pad_10 {width:100%; margin-bottom:0;}
      .w66.pad_10 {width:100%;}
      .w50.pad_10 {width:100%;}
      .w33.pad_10 {width:100%;}

      .position_left {float:left; max-width:440px; margin-right:10px; padding-right:20px;}
      .position_right {float:left; max-width:440px;}
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
      fieldset.w50 {margin:5px 10px 5px 0;}
      fieldset.w50.r_margin {margin-right:0;}
      .frame {margin-top:10px; background-color:#f0f0f0; border:2px solid #aaa;}

      .frame_note {margin-top:5px; margin-bottom:15px; padding:10px; width:100%; background-color:#e6e6e6; border:1px solid #ccc;}
      .frame_note hr {margin-top:10px; margin-bottom:10px;}
      .frame_note p:last-child {margin:0;}
      .frame_note:last-child {margin-bottom:5px;}
      /* Misc Elements --------------------------------------------------------------------------------------------------------------------------------------------- */
      h3.heading {display:block; margin:-12px -17px 10px -17px; padding:10px 15px; border:2px solid #aaa; border-bottom:1px solid #aaa; background-color:#ccc; color:#333; font-family:Verdana, Arial; font-weight:bold; font-size:16px;}

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
  </style>
  <body>
    <!-- Side Navbar -->
    <?php $this->load->view(ADMIN_VIEW_FOLDER."/includes/leftbar");?>
    <div class="col-xl-10 col-lg-9">
        <!-- dashboard content -->
        <div class="content-page-admin">
      <!-- navbar-->
      <?php $this->load->view(ADMIN_VIEW_FOLDER."/includes/header");?>
      <!-- Header Section-->
            <div class="col-12 m-b-20 m-t-20"><h4 class="tite-admin"><?=$page_heading;?></h4></div>

            <div class="row m-b-20">
                <div class="col-xl-12">
                    <div class="card">
              <div class="card sales-report mt-10px">
                  <h5 class="m-b-10">Manage Shopping Configuration <a class="btn btn-all pull-right" href="<?php echo base_url().ADMIN_FOLDER; ?>/shopping_defaults">Manage Defaults Setting</a></h5>
                  <p style="margin-bottom:10px;">Manage Shopping Configuration</p>

                <div class="table-responsive m-t-10">
                <?php echo form_open(current_url());?>
                    <fieldset>
                        <legend>Orders</legend>
                        <p class="highlight_red">Note: Click the input labels for further information on each config setting.</p>
                        <hr/>
                        <ul class="info_note">
                            <li>
                                <label for="order_number_prefix" class="toggle">Order Number Prefix</label>
                                <input type="text" id="order_number_prefix" name="update[order_number_prefix]" value="<?php echo set_value('update[order_number_prefix]', $config[$this->flexi_cart_admin->db_column('configuration', 'order_number_prefix')]); ?>" placeholder="NULL" class="width_100"/>
                                
                                <small class="hide_toggle frame_note">
                                    <strong>Set a prefix value to the cart order number.</strong><br/>
                                    Example: Order # = "12345", Preffix = "Tec", Formatted Order # = "Tec12345"
                                </small>
                            </li>
                            <li>
                                <label for="order_number_suffix" class="toggle">Order Number Suffix</label>
                                <input type="text" id="order_number_suffix" name="update[order_number_suffix]" value="<?php echo set_value('update[order_number_suffix]', $config[$this->flexi_cart_admin->db_column('configuration', 'order_number_suffix')]); ?>" placeholder="NULL" class="width_100"/>
                                
                                <small class="hide_toggle frame_note">
                                    <strong>Set a suffix value to the cart order number.</strong><br/>
                                    Example: Order # = "12345", Suffix = "Tec", Formatted Order # = "12345Tec"
                                </small>
                            </li>
                            <li>
                                <label for="increment_order_number" class="toggle">Increment Order Number</label>
                                <?php $increment_order_number = (bool)$config[$this->flexi_cart_admin->db_column('configuration', 'increment_order_number')]; ?>
                                <input type="hidden" name="update[increment_order_number]" value="0"/>
                                <input type="checkbox" id="increment_order_number" name="update[increment_order_number]" value="1" <?php echo set_checkbox('update[increment_order_number]','1', $increment_order_number); ?>/>
                                
                                <small class="hide_toggle frame_note">
                                    <strong>Should the cart order number be incremented from the last order number, or should it be a randomly generated number?</strong>
                                </small>
                            </li>
                            <li>
                                <label for="minimum_order" class="toggle">Minimum Order Value (&pound;)</label>
                                <input type="text" id="minimum_order" name="update[minimum_order]" value="<?php echo set_value('update[minimum_order]', $config[$this->flexi_cart_admin->db_column('configuration', 'minimum_order')]); ?>" placeholder="0" class="width_50 validate_decimal"/>
                                
                                <small class="hide_toggle frame_note">
                                    <strong>What is the minimum order value?</strong><br/>
                                    This value can then be checked against a particular summary column.
                                </small>
                            </li>
                        </ul>	
                    </fieldset>
                        
                    <fieldset>
                        <legend>Quantities / Stock</legend>
                        <ul class="info_note">
                            <li>
                                <label for="quantity_decimals" class="toggle">Quantity Decimals</label>
                                <input type="text" id="quantity_decimals" name="update[quantity_decimals]" value="<?php echo set_value('update[quantity_decimals]', $config[$this->flexi_cart_admin->db_column('configuration', 'quantity_decimals')]); ?>" placeholder="0" class="width_50 validate_integer"/>
                                
                                <small class="hide_toggle frame_note">
                                    <strong>How many decimals are acceptable for items quantities?</strong><br/>
                                    Typically, this should be zero, however, some situations may require half quantities that would be entered into the cart as '0.5', this would require 1 decimal.
                                </small>
                            </li>
                            <li>
                                <label for="increment_duplicate_item_quantity" class="toggle">Increment Duplicate Quantities</label>
                                <?php $increment_duplicate_item_quantity = (bool)$config[$this->flexi_cart_admin->db_column('configuration', 'increment_duplicate_item_quantity')]; ?>
                                <input type="hidden" name="update[increment_duplicate_item_quantity]" value="0"/>
                                <input type="checkbox" id="increment_duplicate_item_quantity" name="update[increment_duplicate_item_quantity]" value="1" <?php echo set_checkbox('update[increment_duplicate_item_quantity]','1', $increment_duplicate_item_quantity); ?>/>
                                
                                <small class="hide_toggle frame_note">
                                    <strong>Should an items quantity be incremented when an identical duplicate is added to the cart?</strong><br/>
                                    If not, the new quantity will be used.
                                </small>
                            </li>
                            <li>
                                <label for="quantity_limited_by_stock" class="toggle">Quantity Limited by Stock</label>
                                <?php $quantity_limited_by_stock = (bool)$config[$this->flexi_cart_admin->db_column('configuration', 'quantity_limited_by_stock')]; ?>
                                <input type="hidden" name="update[quantity_limited_by_stock]" value="0"/>
                                <input type="checkbox" id="quantity_limited_by_stock" name="update[quantity_limited_by_stock]" value="1" <?php echo set_checkbox('update[quantity_limited_by_stock]','1', $quantity_limited_by_stock); ?>/>
                                
                                <small class="hide_toggle frame_note">
                                    <strong>Should the maximum quantity of cart items be limited to the databases item stock quantity?</strong>
                                </small>
                            </li>
                            <li>
                                <label for="remove_no_stock_items" class="toggle">Remove Out-of-Stock Items</label>
                                <?php $remove_no_stock_items = (bool)$config[$this->flexi_cart_admin->db_column('configuration', 'remove_no_stock_items')]; ?>
                                <input type="hidden" name="update[remove_no_stock_items]" value="0"/>
                                <input type="checkbox" id="remove_no_stock_items" name="update[remove_no_stock_items]" value="1" <?php echo set_checkbox('update[remove_no_stock_items]','1', $remove_no_stock_items); ?>/>
                                
                                <small class="hide_toggle frame_note">
                                    <strong>Should out-of-stock items be automatically removed from the cart?</strong>
                                </small>
                            </li>
                            <li>
                                <label for="auto_allocate_stock" class="toggle">Auto Allocate Item Stock</label>
                                <?php $auto_allocate_stock = (bool)$config[$this->flexi_cart_admin->db_column('configuration', 'auto_allocate_stock')]; ?>
                                <input type="hidden" name="update[auto_allocate_stock]" value="0"/>
                                <input type="checkbox" id="auto_allocate_stock" name="update[auto_allocate_stock]" value="1" <?php echo set_checkbox('update[auto_allocate_stock]','1', $auto_allocate_stock); ?>/>								

                                <small class="hide_toggle frame_note">
                                    <strong>Should stock quantities be automatically updated and managed</strong><br/>
                                    When an order is confirmed, items within the cart that are also in the 'item_stock' table will have their stock deducted.<br/>
                                    Likewise, if items within an order are cancelled, they will be auto restocked into the 'item_stock' table.
                                </small>
                            </li>
                            <li>
                                <label for="save_banned_shipping_items" class="toggle">Save Banned Shipping Items</label>
                                <?php $save_banned_shipping_items = (bool)$config[$this->flexi_cart_admin->db_column('configuration', 'save_banned_shipping_items')]; ?>
                                <input type="hidden" name="update[save_banned_shipping_items]" value="0"/>
                                <input type="checkbox" id="save_banned_shipping_items" name="update[save_banned_shipping_items]" value="1" <?php echo set_checkbox('update[save_banned_shipping_items]','1', $save_banned_shipping_items); ?>/>
                                
                                <small class="hide_toggle frame_note">
                                    <strong>If an item is not permitted to be shipped to the current shipping location, yet the user still completes the order, should the item details be saved to the database?</strong>
                                </small>
                            </li>
                            <li>
                                <label for="multi_row_duplicate_items" class="toggle">Multi Row Duplicate Items</label>
                                <?php $multi_row_duplicate_items = (bool)$config[$this->flexi_cart_admin->db_column('configuration', 'multi_row_duplicate_items')]; ?>
                                <input type="hidden" name="update[multi_row_duplicate_items]" value="0"/>
                                <input type="checkbox" id="multi_row_duplicate_items" name="update[multi_row_duplicate_items]" value="1" <?php echo set_checkbox('update[multi_row_duplicate_items]','1', $multi_row_duplicate_items); ?>/>
                                
                                <small class="hide_toggle frame_note">
                                    <strong>Should all duplicate cart items be added as a new separate row in the cart?</strong><br/>
                                    If not the existing item will be updated.
                                </small>
                            </li>
                        </ul>
                    </fieldset>
                        
                    <fieldset>
                        <legend>Weights</legend>
                        <ul class="info_note">
                            <li>
                                <label for="weight_type" class="toggle">Weight Type</label>
                                <?php $weight_type = $config[$this->flexi_cart_admin->db_column('configuration', 'weight_type')];?>
                                <select id="weight_type" name="update[weight_type]">
                                    <option value="gram" <?php echo set_select('update[weight_type]', 'gram', ($weight_type == 'gram'));?>>Grams</option>
                                    <option value="kilogram" <?php echo set_select('update[weight_type]', 'kilogram', ($weight_type == 'kilogram'));?>>Kilograms</option>
                                    <option value="avoir ounce" <?php echo set_select('update[weight_type]', 'avoir ounce', ($weight_type == 'avoir ounce'));?>>Ounce (Avoir)</option>
                                    <option value="avoir pound" <?php echo set_select('update[weight_type]', 'avoir pound', ($weight_type == 'avoir pound'));?>>Pounds (Avoir)</option>
                                    <option value="troy ounce" <?php echo set_select('update[weight_type]', 'troy ounce', ($weight_type == 'troy ounce'));?>>Ounce (Troy)</option>
                                    <option value="troy pound" <?php echo set_select('update[weight_type]', 'troy pound', ($weight_type == 'troy pound'));?>>Pounds (Troy)</option>
                                    <option value="carat" <?php echo set_select('update[weight_type]', 'carat', ($weight_type == 'carat'));?>>Carats</option>
                                </select>
                                
                                <small class="hide_toggle frame_note">
                                    <strong>Set the default weight to display item weights as.</strong>
                                </small>
                            </li>
                            <li>
                                <label for="weight_decimals" class="toggle">Weight Decimals</label>
                                <input type="text" id="weight_decimals" name="update[weight_decimals]" value="<?php echo set_value('update[weight_decimals]', $config[$this->flexi_cart_admin->db_column('configuration', 'weight_decimals')]); ?>" placeholder="0" class="width_50 validate_decimal"/>
                                
                                <small class="hide_toggle frame_note">
                                    <strong>Set the default number of decimals points to display item weights by.</strong>
                                </small>
                            </li>
                        </ul>
                    </fieldset>
                        
                    <fieldset>
                        <legend>Tax</legend>
                        <ul class="info_note">
                            <li>
                                <label for="display_tax_prices" class="toggle">Display Tax Prices</label>
                                <?php $display_tax_prices = (bool)$config[$this->flexi_cart_admin->db_column('configuration', 'display_tax_prices')]; ?>
                                <input type="hidden" name="update[display_tax_prices]" value="0"/>
                                <input type="checkbox" id="display_tax_prices" name="update[display_tax_prices]" value="1" <?php echo set_checkbox('update[display_tax_prices]','1', $display_tax_prices); ?>/>
                                
                                <small class="hide_toggle frame_note">
                                    <strong>Should item prices be displayed including tax by default?</strong>
                                </small>
                            </li>
                            <li>
                                <label for="price_inc_tax" class="toggle">Prices Include Tax</label>
                                <?php $price_inc_tax = (bool)$config[$this->flexi_cart_admin->db_column('configuration', 'price_inc_tax')]; ?>
                                <input type="hidden" name="update[price_inc_tax]" value="0"/>
                                <input type="checkbox" id="price_inc_tax" name="update[price_inc_tax]" value="1" <?php echo set_checkbox('update[price_inc_tax]','1', $price_inc_tax); ?>/>
                                
                                <small class="hide_toggle frame_note">
                                    <strong>Do item prices typically include tax when added to the cart?</strong>
                                </small>
                            </li>
                        </ul>
                    </fieldset>
                                                
                    <!-- <fieldset>
                        <legend>Reward Points / Vouchers</legend>
                        <ul class="info_note">
                            <li>
                                <label for="dynamic_reward_points" class="toggle">Dynamic Reward Points</label>
                                <?php $dynamic_reward_points = (bool)$config[$this->flexi_cart_admin->db_column('configuration', 'dynamic_reward_points')]; ?>
                                <input type="hidden" name="update[dynamic_reward_points]" value="0"/>
                                <input type="checkbox" id="dynamic_reward_points" name="update[dynamic_reward_points]" value="1" <?php echo set_checkbox('update[dynamic_reward_points]','1', $dynamic_reward_points); ?>/>
                                
                                <small class="hide_toggle frame_note">
                                    <strong>Should reward points be based on the internal value of an item, or should it be based on the items current tax rate based price?</strong><br/>
                                    Example: An item is added to the cart costing &pound;20 including 20% tax, the user then ships to a 10% tax zone, so the item now costs &pound;18.33.<br/>
                                    i.e. Remove 20% tax: &pound;20 / 20% = &pound;16.67, then add 10% tax: &pound;16.67 * 10% = &pound;18.33,<br/>
                                    Should the reward points be based on the dynamic tax variable price, or the initial internal &pound;20 price? 'Checked' = dynamic, 'Non Checked' = Internal.
                                </small>
                            </li>
                            <li>
                                <label for="reward_point_multiplier" class="toggle">Reward Point Multiplier</label>
                                <input type="text" id="reward_point_multiplier" name="update[reward_point_multiplier]" value="<?php echo set_value('update[reward_point_multiplier]', round($config[$this->flexi_cart_admin->db_column('configuration', 'reward_point_multiplier')],4)); ?>" placeholder="0" class="width_50 validate_decimal"/>
                                
                                <small class="hide_toggle frame_note">
                                    <strong>How many reward points are awarded per 1.00 currency unit of an items price?</strong><br/>
                                    Example: A multiplier of 10 is (10 x &pound;1.00) = 10 reward points. Therefore, an item priced at &pound;100 would be worth 1000 reward points.
                                </small>
                            </li>
                            <li>
                                <label for="reward_voucher_multiplier" class="toggle">Reward Voucher Multiplier</label>
                                <input type="text" id="reward_voucher_multiplier" name="update[reward_voucher_multiplier]" value="<?php echo set_value('update[reward_voucher_multiplier]', round($config[$this->flexi_cart_admin->db_column('configuration', 'reward_voucher_multiplier')],4)); ?>" placeholder="0" class="width_50 validate_decimal"/>
                                
                                <small class="hide_toggle frame_note">
                                    <strong>How much is each reward point worth as a currency value when converted to a reward voucher?</strong><br/>
                                    Example: If 250 reward points were converted using a multiplier of &pound;0.01 per point, the reward voucher would be worth &pound;2.50 (250 x 0.01).
                                </small>
                            </li>
                            <li>
                                <label for="reward_point_to_voucher_ratio" class="toggle">Reward Point to Voucher Ratio</label>
                                <input type="text" id="reward_point_to_voucher_ratio" name="update[reward_point_to_voucher_ratio]" value="<?php echo set_value('update[reward_point_to_voucher_ratio]', $config[$this->flexi_cart_admin->db_column('configuration', 'reward_point_to_voucher_ratio')]); ?>" placeholder="0" class="width_50 validate_integer"/>
                                
                                <small class="hide_toggle frame_note">
                                    <strong>How many reward points are required to create 1 reward voucher?</strong><br/>
                                    Examples:<br/>
                                    A ratio of 250 means for every 250 reward points, 1 voucher worth 250 points can be created, this voucher is then worth a defined currency value.<br/>
                                    A customer with 500 reward points could create either 1 voucher of 500 points, or 2 vouchers with 250 points each.<br/>
                                    A customer creating a voucher with 525 reward points, would only be able to convert and use 500 points, the remaining 25 remain as active reward points.
                                </small>
                            </li>
                            <li>
                                <label for="reward_point_days_pending" class="toggle">Days Reward Point Pending</label>
                                <input type="text" id="reward_point_days_pending" name="update[reward_point_days_pending]" value="<?php echo set_value('update[reward_point_days_pending]', $config[$this->flexi_cart_admin->db_column('configuration', 'reward_point_days_pending')]); ?>" placeholder="0" class="width_50 validate_integer"/>
                                
                                <small class="hide_toggle frame_note">
                                    <strong>Once an item order has been set as 'Completed' (i.e. shipped to customer), after how many days should reward points earnt from the item become active?</strong><br/>
                                    The idea of this option is to prevent a customer from placing an order soley to earn reward points, then purchasing a second order using a reward voucher earnt from the first order. The customer could then return the first order for a refund, but the reward points earnt from it have already been used to purchase the second order at a cheaper price.<br/>
                                    The number of days set should reflect the stores return policy, for example, if items cannot be returned after 14 days, the reward points should only become active after 14 days.<br/>
                                    Note: Reward points only become active x days after the order has been set by an admin as 'Completed', not x days after the order was first received.
                                </small>
                            </li>
                            <li>
                                <label for="reward_point_days_valid" class="toggle">Days Reward Point Valid</label>
                                <input type="text" id="reward_point_days_valid" name="update[reward_point_days_valid]" value="<?php echo set_value('update[reward_point_days_valid]', $config[$this->flexi_cart_admin->db_column('configuration', 'reward_point_days_valid')]); ?>" placeholder="0" class="width_50 validate_integer"/>
                                
                                <small class="hide_toggle frame_note">
                                    <strong>How many days are reward points valid for?</strong><br/>
                                    Example: 365 = 365 days (1 year).
                                </small>
                            </li>
                            <li>
                                <label for="reward_voucher_days_valid" class="toggle">Days Reward Voucher Valid</label>
                                <input type="text" id="reward_voucher_days_valid" name="update[reward_voucher_days_valid]" value="<?php echo set_value('update[reward_voucher_days_valid]', $config[$this->flexi_cart_admin->db_column('configuration', 'reward_voucher_days_valid')]); ?>" placeholder="0" class="width_50 validate_integer"/>
                                
                                <small class="hide_toggle frame_note">
                                    <strong>How many days are reward vouchers valid for?</strong><br/>
                                    Example: 365 = 365 days (1 year).
                                </small>
                            </li>
                        </ul>
                    </fieldset> -->
                        
                    <fieldset>
                        <legend>Custom Statuses</legend>
                        <small>
                            <strong>Three individual custom cart statuses can be set to affect whether discounts become active.</strong><br/>
                            The custom statuses can contain any string or integer values, if the value then matches the the custom status of a discount, then provided all other discount conditions are also matched, the discount is activated.
                        </small>
                        <hr/>
                        
                        <ul>
                            <li>
                                <label for="custom_status_1">Custom Status 1</label>
                                <input type="text" id="custom_status_1" name="update[custom_status_1]" value="<?php echo set_value('update[custom_status_1]', $config[$this->flexi_cart_admin->db_column('configuration', 'custom_status_1')]); ?>" class="width_50"/>
                            </li>
                            <li>
                                <label for="custom_status_2">Custom Status 2</label>
                                <input type="text" id="custom_status_2" name="update[custom_status_2]" value="<?php echo set_value('update[custom_status_2]', $config[$this->flexi_cart_admin->db_column('configuration', 'custom_status_2')]); ?>" class="width_50"/>
                            </li>
                            <li>
                                <label for="custom_status_3">Custom Status 3</label>
                                <input type="text" id="custom_status_3" name="update[custom_status_3]" value="<?php echo set_value('update[custom_status_3]', $config[$this->flexi_cart_admin->db_column('configuration', 'custom_status_3')]); ?>" class="width_50"/>
                            </li>
                        </ul>
                    </fieldset>
                        
                    <fieldset>
                        <legend>Update Configuration</legend>
                        <input type="submit" name="update_config" value="Update Configuration" class="btn btn-all"/>
                    </fieldset>
                <?php echo form_close();?>
                </div>
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