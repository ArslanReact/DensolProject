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
                <h2 class="display h4">Manage <?php echo $location_type_data[$this->flexi_cart_admin->db_column('location_type', 'name')]; ?> Locations</h2>
                <p>You can update Locations</p>
                <p class="text-center m-b-10">
                    <a class="btn btn-success" href="<?php echo base_url().ADMIN_FOLDER; ?>/location_types">Manage Location Types</a> | 
                    <a class="btn btn-primary" href="<?php echo base_url().ADMIN_FOLDER; ?>/insert_location/<?php echo $location_type_data[$this->flexi_cart_admin->db_column('location_type', 'id')]; ?>">Insert New <?php echo $location_type_data[$this->flexi_cart_admin->db_column('location_type', 'name')]; ?></a>
                </p>
                <div class="table-responsive dt-responsive">

                <?php echo form_open(current_url());?>
                <table class="table table-striped table-bordered nowrap">
                    <thead>
                        <tr>
                            <th class="info_req tooltip_trigger"
                                title="<strong>Field Required</strong><br/>Name of the location.">
                                Name
                            </th>
                            <th class="tooltip_trigger"
                                title="Sets the locations 'Parent'. <br/>For Example, 'New York' would have 'United States' as its parent.">
                                Parent Location
                            </th>
                            <th class="tooltip_trigger"
                                title="Locations can be grouped together with other non-related locations into Shipping Zones. Shipping rates can then be applied to all locations within these zones. <br/>For example, 'Eastern Europe' and 'Western Europe'.">
                                Shipping Zone
                            </th>
                            <th class="tooltip_trigger"
                                title="Locations can be grouped together with other non-related locations into Tax Zones. Tax rates can then be applied to all locations within these zones. <br/>For example, 'European EU Countries' and 'European Non-EU Countries'.">
                                Tax Zone
                            </th>
                            <th class="spacer_75 align_ctr tooltip_trigger" 
                                title="If checked, the location will be set as 'active'.">
                                Status
                            </th>
                            <th class="spacer_75 align_ctr tooltip_trigger" 
                                title="If checked, the row will be deleted upon the form being updated.">
                                Delete
                            </th>
                        </tr>
                    </thead>
                    <?php if (! empty($location_data)) { ?>	
                    <tbody>
                    <?php 
                        foreach ($location_data as $row) {
                            $location_id = $row[$this->flexi_cart_admin->db_column('locations', 'id')];								
                    ?>
                        <tr>
                            <td>
                                <input type="hidden" name="update[<?php echo $location_id; ?>][id]" value="<?php echo $location_id; ?>"/>
                                <input type="text" name="update[<?php echo $location_id; ?>][name]" value="<?php echo set_value('update['.$location_id.'][name]', $row[$this->flexi_cart_admin->db_column('locations', 'name')]); ?>" class="form-control"/>
                            </td>
                            <td>
                                <?php $parent_location = $row[$this->flexi_cart_admin->db_column('locations', 'parent')];?>
                                <select name="update[<?php echo $location_id; ?>][parent_location]" class="form-control">
                                    <option value="0">No Parent Location</option>
                                <?php 
                                    foreach($locations_inline as $location) { 
                                        $id = $location[$this->flexi_cart_admin->db_column('locations', 'id')];
                                ?>
                                    <option value="<?php echo $id; ?>" <?php echo set_select('update['.$location_id.'][parent_location]', $id, ($parent_location == $id)); ?>>
                                        <?php echo $location[$this->flexi_cart_admin->db_column('locations', 'name')]; ?>
                                    </option>
                                <?php } ?>
                                </select>
                            </td>
                            <td>
                                <?php $shipping_zone = $row[$this->flexi_cart_admin->db_column('locations', 'shipping_zone')];?>
                                <select name="update[<?php echo $location_id; ?>][shipping_zone]" class="form-control">
                                    <option value="0">No Shipping Zone</option>
                                <?php 
                                    foreach($shipping_zones as $zone) { 
                                        $id = $zone[$this->flexi_cart_admin->db_column('location_zones', 'id')];
                                ?>
                                    <option value="<?php echo $id; ?>" <?php echo set_select('update['.$location_id.'][shipping_zone]', $id, ($shipping_zone == $id)); ?>>
                                        <?php echo $zone[$this->flexi_cart_admin->db_column('location_zones', 'name')]; ?>
                                    </option>
                                <?php } ?>
                                </select>
                            </td>
                            <td>
                                <?php $tax_zone = $row[$this->flexi_cart_admin->db_column('locations', 'tax_zone')];?>
                                <select name="update[<?php echo $location_id; ?>][tax_zone]" class="form-control">
                                    <option value="0">No Tax Zone</option>
                                <?php 
                                    foreach($tax_zones as $zone) { 
                                        $id = $zone[$this->flexi_cart_admin->db_column('location_zones', 'id')];
                                ?>
                                    <option value="<?php echo $id; ?>" <?php echo set_select('update['.$location_id.'][tax_zone]', $id, ($tax_zone == $id)); ?>>
                                        <?php echo $zone[$this->flexi_cart_admin->db_column('location_zones', 'name')]; ?>
                                    </option>
                                <?php } ?>
                                </select>
                            </td>
                            <td class="align_ctr">
                                <?php $status = (bool)$row[$this->flexi_cart_admin->db_column('locations', 'status')]; ?>
                                <input type="hidden" name="update[<?php echo $location_id; ?>][status]" value="0"/>
                                <input type="checkbox" name="update[<?php echo $location_id; ?>][status]" value="1" <?php echo set_checkbox('update['.$location_id.'][status]', 0, $status); ?>/>
                            </td>
                            <td class="align_ctr">
                                <input type="hidden" name="update[<?php echo $location_id; ?>][delete]" value="0"/>
                                <input type="checkbox" name="update[<?php echo $location_id; ?>][delete]" value="1"/>
                            </td>
                        </tr>
                    <?php } ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="6">
                                <input type="submit" name="update_locations" value="Update <?php echo $location_type_data['loc_type_name']; ?> Locations" class="btn btn-success"/>
                            </td>
                        </tr>
                    </tfoot>
                    <?php } else { ?>
                    <tbody>
                        <tr>
                            <td colspan="6">
                                There are no locations within this location type setup to view.<br/>
                            </td>
                        </tr>
                    </tbody>
                    <?php } ?>
                </table>
                <?php echo form_close();?>

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