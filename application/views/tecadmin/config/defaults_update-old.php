<!DOCTYPE html>
<html lang="en">

<head>
    <title><?php echo site_settings()->company_name." Admin Panel";?></title>
    <!-- HTML5 Shim and Respond.js IE10 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 10]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Favicon icon -->
    <link rel="icon" href="<?php echo base_url(); ?>files/assets/images/favicon.ico" type="image/x-icon">
    <link rel="shortcut icon" id="favicon" href="<?php echo base_url(); ?>files/assets/images/favicon.png">
    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,500" rel="stylesheet">
    <!-- waves.css -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>files/assets/pages/waves/css/waves.min.css" type="text/css" media="all">
    <!-- Required Fremwork -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>files/bower_components/bootstrap/css/bootstrap.min.css">
    <!-- waves.css -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>files/assets/pages/waves/css/waves.min.css" type="text/css" media="all">
    <!-- themify-icons line icon -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>files/assets/icon/themify-icons/themify-icons.css">
      <!-- ico font -->
      <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>files/assets/icon/icofont/css/icofont.css">
      <!-- font awesome -->
      <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>files/assets/icon/font-awesome/css/font-awesome.min.css">
<!-- Notification.css -->
<link rel="stylesheet" type="text/css" href="http://localhost/intercel/files/assets/pages/notification/notification.css">

    <!-- Data Table Css -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>files/bower_components/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>files/assets/pages/data-table/css/buttons.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>files/bower_components/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css">
    <!-- scrollbar.css -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>files/assets/css/jquery.mCustomScrollbar.css">
    <!-- radial chart.css -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>files/assets/pages/chart/radial/css/radial.css" type="text/css" media="all">
    
    <!-- Switch component css -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>files/bower_components/switchery/css/switchery.min.css">

    
    <!-- Style.css -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>files/assets/css/style.css">
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

fieldset {width:50%; margin:10px auto; padding:10px 15px; background-color:#f0f0f0; border:2px solid #aaa;}
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
</head>
<!-- Menu sidebar static layout -->

<body>
<!-- Pre-loader start -->
<div class="theme-loader">
    <div class="loader-track">
        <div class="preloader-wrapper">
            <div class="spinner-layer spinner-blue">
                <div class="circle-clipper left">
                    <div class="circle"></div>
                </div>
                <div class="gap-patch">
                    <div class="circle"></div>
                </div>
                <div class="circle-clipper right">
                    <div class="circle"></div>
                </div>
            </div>
            <div class="spinner-layer spinner-red">
                <div class="circle-clipper left">
                    <div class="circle"></div>
                </div>
                <div class="gap-patch">
                    <div class="circle"></div>
                </div>
                <div class="circle-clipper right">
                    <div class="circle"></div>
                </div>
            </div>

            <div class="spinner-layer spinner-yellow">
                <div class="circle-clipper left">
                    <div class="circle"></div>
                </div>
                <div class="gap-patch">
                    <div class="circle"></div>
                </div>
                <div class="circle-clipper right">
                    <div class="circle"></div>
                </div>
            </div>

            <div class="spinner-layer spinner-green">
                <div class="circle-clipper left">
                    <div class="circle"></div>
                </div>
                <div class="gap-patch">
                    <div class="circle"></div>
                </div>
                <div class="circle-clipper right">
                    <div class="circle"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Pre-loader end -->
<div id="pcoded" class="pcoded">
    <div class="pcoded-overlay-box"></div>
    <div class="pcoded-container navbar-wrapper">
        <?php $this->load->view(ADMIN_VIEW_FOLDER."/includes/topbar");?>
        <div class="pcoded-main-container">
            <div class="pcoded-wrapper">
                <?php $this->load->view(ADMIN_VIEW_FOLDER."/includes/leftbar");?>
                <div class="pcoded-content">
                    <!-- Page-header start -->
                    <?php $this->load->view(ADMIN_VIEW_FOLDER."/includes/header");?>
                    <!-- Page-header end -->
                        <div class="pcoded-inner-content">
                            <!-- Main-body start -->
                            <div class="main-body">
                                <div class="page-wrapper">

                                    <div class="page-body">
                                        <div class="row">

                                            

                                            <!-- order start -->
                                            <div class="col-md-12">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <h5>Manage Defaults</h5>
                                                        <a href="<?php echo base_url().ADMIN_FOLDER."/products/add";?>" class="btn btn-success pull-right" style="color:#fff;font-size: 13px;padding: 5px 10px;">Add New Product</a>
                                                    </div>
                                                    <div class="card-block">
                                                        <div class="table-responsive dt-responsive">
                                                        <p><a href="<?php echo base_url().ADMIN_FOLDER; ?>/shopping_config">Manage Configuration</a></p>
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
                                                            <input type="submit" name="update_defaults" value="Update Cart Defaults" class="link_button large"/>
                                                        </fieldset>
                                                        <?php echo form_close();?>    
                                                    </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- order end -->

                                           

                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php $this->load->view(ADMIN_VIEW_FOLDER."/includes/footer");?>
    <!-- Warning Section Starts -->
    <!-- Older IE warning message -->
<!--[if lt IE 10]>
<div class="ie-warning">
    <h1>Warning!!</h1>
    <p>You are using an outdated version of Internet Explorer, please upgrade <br/>to any of the following web browsers to access this website.</p>
    <div class="iew-container">
        <ul class="iew-download">
            <li>
                <a href="http://www.google.com/chrome/">
                    <img src="../files/assets/images/browser/chrome.png" alt="Chrome">
                    <div>Chrome</div>
                </a>
            </li>
            <li>
                <a href="https://www.mozilla.org/en-US/firefox/new/">
                    <img src="../files/assets/images/browser/firefox.png" alt="Firefox">
                    <div>Firefox</div>
                </a>
            </li>
            <li>
                <a href="http://www.opera.com">
                    <img src="../files/assets/images/browser/opera.png" alt="Opera">
                    <div>Opera</div>
                </a>
            </li>
            <li>
                <a href="https://www.apple.com/safari/">
                    <img src="../files/assets/images/browser/safari.png" alt="Safari">
                    <div>Safari</div>
                </a>
            </li>
            <li>
                <a href="http://windows.microsoft.com/en-us/internet-explorer/download-ie">
                    <img src="../files/assets/images/browser/ie.png" alt="">
                    <div>IE (9 & above)</div>
                </a>
            </li>
        </ul>
    </div>
    <p>Sorry for the inconvenience!</p>
</div>
<![endif]-->
<!-- Warning Section Ends -->
<!-- Required Jquery -->
<script type="text/javascript" src="<?php echo base_url(); ?>files/bower_components/jquery/js/jquery.min.js "></script>
<script type="text/javascript" src="<?php echo base_url(); ?>files/bower_components/jquery-ui/js/jquery-ui.min.js "></script>
<script type="text/javascript" src="<?php echo base_url(); ?>files/bower_components/popper.js/js/popper.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>files/bower_components/bootstrap/js/bootstrap.min.js "></script>
<script type="text/javascript" src="<?php echo base_url(); ?>files/assets/pages/widget/excanvas.js "></script>
<!-- jquery slimscroll js -->
<script type="text/javascript" src="<?php echo base_url(); ?>files/bower_components/jquery-slimscroll/js/jquery.slimscroll.js "></script>
<!-- waves js -->
<script src="<?php echo base_url(); ?>files/assets/pages/waves/js/waves.min.js"></script>
<!-- modernizr js -->
<script type="text/javascript" src="<?php echo base_url(); ?>files/bower_components/modernizr/js/modernizr.js "></script>
<!-- slimscroll js -->
<script type="text/javascript" src="<?php echo base_url(); ?>files/assets/js/SmoothScroll.js"></script>
<script src="<?php echo base_url(); ?>files/assets/js/jquery.mCustomScrollbar.concat.min.js "></script>

<!-- data-table js -->
<script src="<?php echo base_url(); ?>files/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>files/bower_components/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?php echo base_url(); ?>files/assets/pages/data-table/js/jszip.min.js"></script>
<script src="<?php echo base_url(); ?>files/assets/pages/data-table/js/pdfmake.min.js"></script>
<script src="<?php echo base_url(); ?>files/assets/pages/data-table/js/vfs_fonts.js"></script>
<script src="<?php echo base_url(); ?>files/bower_components/datatables.net-buttons/js/buttons.print.min.js"></script>
<script src="<?php echo base_url(); ?>files/bower_components/datatables.net-buttons/js/buttons.html5.min.js"></script>
<script src="<?php echo base_url(); ?>files/bower_components/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo base_url(); ?>files/bower_components/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?php echo base_url(); ?>files/bower_components/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>
<script src="<?php echo base_url(); ?>files/assets/pages/data-table/js/data-table-custom.js"></script>

<!-- Switch component js -->
<script type="text/javascript" src="<?php echo base_url(); ?>files/bower_components/switchery/js/switchery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>files/assets/pages/advance-elements/swithces.js"></script>

<!-- menu js -->
<script src="<?php echo base_url(); ?>files/assets/js/pcoded.min.js"></script>
<script src="<?php echo base_url(); ?>files/assets/js/vertical/vertical-layout.min.js "></script>

<!-- notification js -->
<script type="text/javascript" src="<?php echo base_url(); ?>files/assets/js/bootstrap-growl.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>files/assets/pages/notification/notification.js"></script>
<script>
$(document).ready(function() {

$('#select-all').click(function(event) {   
    if(this.checked) {
        // Iterate each checkbox
        $(':checkbox').each(function() {
            this.checked = true;                        
        });
    } else {
        $(':checkbox').each(function() {
            this.checked = false;                       
        });
    }
});

<?php
if ($this->session->flashdata('emsg') != null) {?>
    //echo "<pe>".$error."</pe>";
    notify("top", "right", "fa fa-check", "<?php echo $this->session->flashdata('etype');?>", "animated flipInX", "animated flipOutX"," ",'<?php echo $this->session->flashdata('emsg');?>');
    <?
} elseif ($this->session->flashdata('infoerror') != null) {
    foreach($this->session->flashdata('infoerror') as $error){?>
        //echo "<pe>".$error."</pe>";
        notify("top", "right", "fa fa-check", "danger", "animated flipInX", "animated flipOutX"," ",'<?php echo $error;?>');
<? 
}
}elseif($this->session->flashdata('iii') != null){
    foreach($this->session->flashdata('iii') as $key => $value){
        if($key=="infosucc"){
            foreach($value as $vv){
                ?> notify("top", "right", "fa fa-check", "success", "animated flipInX", "animated flipOutX"," ",'<?php echo $vv;?>'); <?
            }
        }else{
            foreach($value as $vv){
                ?> notify("top", "right", "fa fa-check", "danger", "animated flipInX", "animated flipOutX"," ",'<?php echo $vv;?>'); <?
            }
        }
    }
}
?>
});
</script>


<!-- custom js -->
<script type="text/javascript" src="<?php echo base_url(); ?>files/assets/js/script.js "></script>
<!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script> -->
<script src="<?php echo base_url("includes/");?>js/jquery.tools.tooltips.min.js?v=1.0"></script>

<script src="<?php echo base_url("includes/");?>js/global.js?v=1.0"></script>

<script src="<?php echo base_url("includes/");?>js/admin_global.js?v=1.0"></script>
<script>
$(function() {
	// As this page is listing multiple tax options all on the same page, and therefore multiple location menus, use the jQuery 'each()' function to call the top level menu of each location type ('Country' in this example). 
	$('select[id^="shipping_country"]').each(function() 
	{
		var elem_id = $(this).attr('id');
		var shipping_id = elem_id.substring(elem_id.lastIndexOf('_')+1);
	
		// !IMPORTANT NOTE: The dependent_menu functions must be called in their reverse order - i.e. the most specific locations first.
		dependent_menu('shipping_state_'+shipping_id, 'shipping_post_zip_code_'+shipping_id, false, true);
		dependent_menu('shipping_country_'+shipping_id, 'shipping_state_'+shipping_id, ['shipping_post_zip_code_'+shipping_id], true);
	});
});
</script>
</body>

</html>
