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
                <h2 class="display h4">Shipping Rates for <?php echo $shipping_data[$this->flexi_cart_admin->db_column('shipping_options', 'name')];?></h2>
                <p style="margin-bottom:10px;">Update and Manage shipping rates</p>
                <p class="text-center" style="margin-bottom:10px;">
                    <a class="btn btn-success" href="<?php echo base_url().ADMIN_FOLDER; ?>/shipping">Manage Shipping options</a> | 
                    <a class="btn btn-primary" href="<?php echo base_url().ADMIN_FOLDER; ?>/insert-shipping-rate/<?php echo $shipping_data[$this->flexi_cart_admin->db_column('shipping_options', 'id')];?>">Insert New Shipping Rate</a>
                </p>
                <div class="table-responsive dt-responsive">

                <?php echo form_open(current_url());?>
                    <table  id="dom-jqry" class="table table-striped table-bordered nowrap">
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
                                <th class="spacer_75 align_ctr tooltip_trigger" 
                                    title="If checked, the row will be deleted upon the form being updated.">
                                    Delete
                                </th>
                            </tr>
                        </thead>
                        <?php if (! empty($shipping_rate_data)) { ?>	
                        <tbody>
                        <?php 
                            foreach ($shipping_rate_data as $row) {
                                $shipping_rate_id = $row[$this->flexi_cart_admin->db_column('shipping_rates', 'id')];
                        ?>
                            <tr>
                                <td>
                                    <input type="hidden" name="update[<?php echo $shipping_rate_id; ?>][id]" value="<?php echo $shipping_rate_id; ?>"/>
                                    <input type="hidden" name="update[<?php echo $shipping_rate_id; ?>][parent_id]" value="<?php echo $row[$this->flexi_cart_admin->db_column('shipping_rates', 'parent')]; ?>"/>
                                    <input type="text" name="update[<?php echo $shipping_rate_id; ?>][value]" value="<?php echo set_value('update['.$shipping_rate_id.'][value]',$row[$this->flexi_cart_admin->db_column('shipping_rates', 'value')]); ?>" class="form-control validate_decimal"/>
                                </td>
                                <td>
                                    <input type="text" name="update[<?php echo $shipping_rate_id; ?>][tare_weight]" value="<?php echo set_value('update['.$shipping_rate_id.'][tare_weight]',$row[$this->flexi_cart_admin->db_column('shipping_rates', 'tare_weight')]); ?>" class="form-control validate_decimal"/>
                                </td>
                                <td>
                                    <input type="text" name="update[<?php echo $shipping_rate_id; ?>][min_weight]" value="<?php echo set_value('update['.$shipping_rate_id.'][min_weight]',$row[$this->flexi_cart_admin->db_column('shipping_rates', 'min_weight')]); ?>" class="form-control validate_decimal"/>
                                </td>
                                <td>
                                    <input type="text" name="update[<?php echo $shipping_rate_id; ?>][max_weight]" value="<?php echo set_value('update['.$shipping_rate_id.'][max_weight]',$row[$this->flexi_cart_admin->db_column('shipping_rates', 'max_weight')]); ?>" class="form-control validate_decimal"/>
                                </td>
                                <td>
                                    <input type="text" name="update[<?php echo $shipping_rate_id; ?>][min_value]" value="<?php echo set_value('update['.$shipping_rate_id.'][min_value]',$row[$this->flexi_cart_admin->db_column('shipping_rates', 'min_value')]); ?>" class="form-control validate_decimal"/>
                                </td>
                                <td>
                                    <input type="text" name="update[<?php echo $shipping_rate_id; ?>][max_value]" value="<?php echo set_value('update['.$shipping_rate_id.'][max_value]',$row[$this->flexi_cart_admin->db_column('shipping_rates', 'max_value')]); ?>" class="form-control validate_decimal"/>
                                </td>
                                <td class="align_ctr">
                                    <?php $status = (bool)$row[$this->flexi_cart_admin->db_column('shipping_rates', 'status')]; ?>
                                    <input type="hidden" name="update[<?php echo $shipping_rate_id; ?>][status]" value="0"/>
                                    <input type="checkbox" name="update[<?php echo $shipping_rate_id; ?>][status]" value="1" <?php echo set_checkbox('update['.$shipping_rate_id.'][status]','1', $status); ?>/>
                                </td>
                                <td class="align_ctr">
                                    <input type="hidden" name="update[<?php echo $shipping_rate_id; ?>][delete]" value="0"/>
                                    <input type="checkbox" name="update[<?php echo $shipping_rate_id; ?>][delete]" value="1"/>
                                </td>
                            </tr>
                        <?php } ?>	
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="8">
                                    <input type="submit" name="update_shipping_rates" value="Update Shipping Rates" class="btn btn-primary"/>
                                </td>
                            </tr>
                        </tfoot>
                        <?php } else { ?>
                        <tbody>
                            <tr>
                                <td colspan="8">
                                    There are no rates for this shipping option setup to view.<br/>
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
        
      <!-- Updates Section -->
      <?php $this->load->view(ADMIN_VIEW_FOLDER."/includes/footer");?>
    </div>
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