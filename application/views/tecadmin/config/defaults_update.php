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
                  <h5 class="m-b-10">Manage Defaults <a class="btn btn-all pull-right" href="<?php echo base_url().ADMIN_FOLDER; ?>/shopping_config">Manage Configuration</a></h5>
                  <p style="margin-bottom:10px;">Manage Defaults Setting</p>
                <div class="table-responsive">
                <?php echo form_open(current_url());?>
                    <fieldset>
                        <legend>Currency</legend>
                        <small>Defines the default currency that prices are displayed in when a user first visits the site.</small>
                        <ul>
                            <li>
                                <label for="currency">Default Currency</label>
                                <select id="currency" name="update[currency]" class="width_250 tooltip_trigger"
                                    title="Set the default currency that cart values are displayed as."
                                >
                                    <option value="0"> - Select Default Currency - </option>
                                <?php 
                                    foreach($currency_data as $currency) { 
                                        $id = $currency[$this->flexi_cart_admin->db_column('currency', 'id')];
                                        $default = $default_currency[$this->flexi_cart_admin->db_column('currency', 'id')];
                                ?>
                                    <option value="<?php echo $id; ?>" <?php echo set_select('update[currency]', $id, ($default == $id)); ?>>
                                        <?php echo $currency[$this->flexi_cart_admin->db_column('currency', 'name')]; ?>
                                    </option>
                                <?php } ?>
                                </select>
                            </li>
                        </ul>
                    </fieldset>
                        
                    <fieldset>
                        <legend>Shipping</legend>
                        <small>Defines the default shipping location and shipping option (Method) that are displayed when a user first visits the site.</small>
                        <ul>
                            <li>
                                <label for="shipping_location">Default Shipping Location</label>
                                <select id="shipping_location" name="update[shipping_location]" class="width_250 tooltip_trigger"
                                    title="Set the default location that shipping options and rates are displayed for."
                                >
                                    <option value="0"> - Select Default Shipping Location - </option>
                                <?php 
                                    foreach($locations_inline as $location) { 
                                        $id = $location[$this->flexi_cart_admin->db_column('locations', 'id')];
                                        $default = $default_ship_location[$this->flexi_cart_admin->db_column('locations', 'id')];
                                ?>
                                    <option value="<?php echo $id; ?>" <?php echo set_select('update[shipping_location]', $id, ($default == $id)); ?>>
                                        <?php echo $location[$this->flexi_cart_admin->db_column('locations', 'name')]; ?>
                                    </option>
                                <?php } ?>
                                </select>
                            </li>
                            <li>
                                <label for="shipping_option">Default Shipping Option</label>
                                <select id="shipping_option" name="update[shipping_option]" class="width_250 tooltip_trigger"
                                    title="Set the default shipping option that is displayed."
                                >
                                    <option value="0"> - Select Default Shipping Option - </option>
                                <?php 
                                    foreach($shipping_data as $option) { 
                                        $id = $option[$this->flexi_cart_admin->db_column('shipping_options', 'id')];
                                        $default = $default_ship_option[$this->flexi_cart_admin->db_column('shipping_options', 'id')];
                                ?>
                                    <option value="<?php echo $id; ?>" <?php echo set_select('update[shipping_option]', $id, ($default == $id)); ?>>
                                        <?php echo $option[$this->flexi_cart_admin->db_column('shipping_options', 'name')]; ?>
                                    </option>
                                <?php } ?>
                                </select>
                            </li>
                        </ul>
                    </fieldset>
                        
                    <fieldset>
                        <legend>Tax</legend>
                        <small>Defines the default tax location and tax rate that is displayed when a user first visits the site.</small>
                        <ul>
                            <li>
                                <label for="tax_location">Default Tax Location</label>
                                <select id="tax_location" name="update[tax_location]" class="width_250 tooltip_trigger"
                                    title="Set the default location that the cart tax rate is based on."
                                >
                                    <option value="0"> - Select Default Tax Location - </option>
                                <?php 
                                    foreach($locations_inline as $location) { 
                                        $id = $location[$this->flexi_cart_admin->db_column('locations', 'id')];
                                        $default = $default_tax_location[$this->flexi_cart_admin->db_column('locations', 'id')];
                                ?>
                                    <option value="<?php echo $id; ?>" <?php echo set_select('update[tax_location]', $id, ($default == $id)); ?>>
                                        <?php echo $location[$this->flexi_cart_admin->db_column('locations', 'name')]; ?>
                                    </option>
                                <?php } ?>
                                </select>
                            </li>
                            <li>
                                <label for="tax_rate">Default Tax Rate</label>
                                <select id="tax_rate" name="update[tax_rate]" class="width_250 tooltip_trigger"
                                    title="Select the default tax rate that is displayed."
                                >
                                    <option value="0"> - Select Default Tax Rate - </option>
                                <?php 
                                    foreach($tax_data as $tax_rate) { 
                                        $id = $tax_rate[$this->flexi_cart_admin->db_column('tax', 'id')];
                                        $default = $default_tax_rate[$this->flexi_cart_admin->db_column('tax', 'id')];								
                                ?>
                                    <option value="<?php echo $id; ?>" <?php echo set_select('update[tax_rate]', $id, ($default == $id)); ?>>
                                        <?php echo $tax_rate[$this->flexi_cart_admin->db_column('tax', 'name')]; ?>
                                    </option>
                                <?php } ?>
                                </select>
                            </li>
                        </ul>
                    </fieldset>
                    
                    <fieldset>
                        <legend>Update Cart Defaults</legend>
                        <input type="submit" name="update_defaults" value="Update Cart Defaults" class="btn btn-all"/>
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