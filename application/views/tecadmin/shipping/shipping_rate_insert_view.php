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
          <div class="row d-flex align-items-md-stretch">
            <!-- Line Chart -->
            <div class="col-lg-12 col-md-12 flex-lg-last flex-md-first align-self-baseline">
              <div class="card sales-report mt-10px">
                <h2 class="display h4">Add Shipping Rate for <?php echo $shipping_data[$this->flexi_cart_admin->db_column('shipping_options', 'name')];?></h2>
                <p style="margin-bottom:10px;">Insert shipping rates by entring required detail</p>
                <p class="text-center" style="margin-bottom:10px;">
                    <a class="btn btn-success" href="<?php echo base_url().ADMIN_FOLDER; ?>/shipping">Manage Shipping options</a> | 
                    <a class="btn btn-primary" href="<?php echo base_url().ADMIN_FOLDER; ?>/shipping-rates/<?php echo $shipping_data[$this->flexi_cart_admin->db_column('shipping_options', 'id')];?>">Manage <?php echo $shipping_data[$this->flexi_cart_admin->db_column('shipping_options', 'name')];?> Rates</a>
                </p>
                <div class="table-responsive dt-responsive">

                <?php echo form_open(current_url());?>
                    <table  class="table table-striped table-bordered nowrap">
                        <thead>
                            <tr>
                                <th class="spacer_100 info_req tooltip_trigger"
                                    title="<strong>Field Required</strong><br/>The shipping rate of the shipping option tier.">
                                    Rate (price)
                                </th>
                                <th class="tooltip_trigger"
                                    title="The tare weight represents the weight of the packaging material required for shipping. The weight is included when matching shipping options with the weight of the cart items.">
                                    Tare Weight (g)
                                </th>
                                <th class="tooltip_trigger"
                                    title="Sets the minimum weight required to activate the shipping option tier. <br/>Note: The 'tare weight' will be included when weighing the cart items.">
                                    Min Weight (g)
                                </th>
                                <th class="tooltip_trigger"
                                    title="Sets the maximum weight permitted to activate the shipping option tier. <br/>Note: The 'tare weight' will be included when weighing the cart items.">
                                    Max Weight (g)
                                </th>
                                <th class="tooltip_trigger"
                                    title="Sets the minimum value of the cart that is required to activate the shipping option tier.">
                                    Min Value (price)
                                </th>
                                <th class="tooltip_trigger"
                                    title="Sets the maximum value of the cart that is permitted to activate the shipping option tier.">
                                    Max Value (price)
                                </th>
                                <th class="spacer_75 align_ctr tooltip_trigger" 
                                    title="If checked, the shipping rate tier will be set as 'active'.">
                                    Status
                                </th>
                                <th class="spacer_125 align_ctr tooltip_trigger" 
                                    title="Copy or remove a specific row and its data.">
                                    Copy / Remove
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php 
                            for($i = 0; ($i == 0 || (isset($validation_row_ids[$i]))); $i++) { 
                            $row_id = (isset($validation_row_ids[$i])) ? $validation_row_ids[$i] : $i;
                        ?>
                            <tr>
                                <td>
                                    <input type="text" name="insert[<?php echo $row_id; ?>][value]" value="<?php echo set_value('insert['.$row_id.'][value]', '0.00');?>" class="form-control validate_decimal"/>
                                </td>
                                <td>
                                    <input type="text" name="insert[<?php echo $row_id; ?>][tare_weight]" value="<?php echo set_value('insert['.$row_id.'][tare_weight]', '0');?>" class="form-control validate_decimal"/>
                                </td>
                                <td>
                                    <input type="text" name="insert[<?php echo $row_id; ?>][min_weight]" value="<?php echo set_value('insert['.$row_id.'][min_weight]', '0');?>" class="form-control validate_decimal"/>
                                </td>
                                <td>
                                    <input type="text" name="insert[<?php echo $row_id; ?>][max_weight]" value="<?php echo set_value('insert['.$row_id.'][max_weight]',' 9999');?>" class="form-control validate_decimal"/>
                                </td>
                                <td>
                                    <input type="text" name="insert[<?php echo $row_id; ?>][min_value]" value="<?php echo set_value('insert['.$row_id.'][min_value]', '0.00');?>" class="form-control validate_decimal"/>
                                </td>
                                <td>
                                    <input type="text" name="insert[<?php echo $row_id; ?>][max_value]" value="<?php echo set_value('insert['.$row_id.'][max_value]', '9999.00');?>" class="form-control validate_decimal"/>
                                </td>
                                <td class="align_ctr">
                                    <input type="hidden" name="insert[<?php echo $row_id; ?>][status]" value="0"/>
                                    <input type="checkbox" name="insert[<?php echo $row_id; ?>][status]" value="1" <?php echo set_checkbox('insert['.$row_id.'][status]', '1', TRUE); ?>/>
                                </td>
                                <td class="align_ctr">
                                    <input style="width:auto" type="button" value="+" class="copy_row btn btn-success"/>
                                    <input style="width:auto" type="button" value="x" <?php echo ($i == 0) ? 'disabled="disabled"' : NULL;?> class="remove_row btn btn-danger"/>
                                </td>
                            </tr>
                        <?php } ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="8">
                                    <input type="submit" name="insert_shipping_rate" value="Insert Shipping Option Rates" class="btn btn-success"/>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                <?php echo form_close();?>

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Updates Section -->
      <?php $this->load->view(ADMIN_VIEW_FOLDER."/includes/footer");?>
    </div>
    <!-- JavaScript files-->
	<?php $this->load->view(ADMIN_VIEW_FOLDER."/includes/scripts");?>
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