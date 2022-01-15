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
            <div class="col-12 m-b-20 m-t-20"><h4 class="tite-admin"><?php echo $page_heading;?></h4></div>
            <!-- Line Chart -->
            <div class="row m-b-20">
                <div class="col-xl-12">
                    <div class="card">
                        <h5 class="m-b-10">Manage Taxes</h5>
                <p style="margin-bottom:10px;">Update and Manage Taxes</p>
                <p class="text-right" style="margin-bottom:10px;">
                    <a class="btn btn-all" href="<?php echo base_url().ADMIN_FOLDER; ?>/insert_tax">Insert New Tax</a>
                </p>
                <div class="table-responsive dt-responsive">
                <?php echo form_open(current_url());?>
                <table id="dom-jqry" class="table table-bordered m-t-20">
                    <thead class="thead-dark">
                        <tr>
                            <th class="info_req tooltip_trigger"
                                title="<strong>Field Required</strong><br/> The name of the tax rate.">
                                Name
                            </th>
                            <th class="tooltip_trigger"
                                title="Set the location that the tax rate is applied to.">
                                Location
                            </th>
                            <th class="tooltip_trigger"
                                title="Set the zone that the tax rate is applied to. <br/>Note: If a location is set, it has priority over a zone rule.">
                                Zone
                            </th>
                            <th class="info_req tooltip_trigger"
                                title="<strong>Field Required</strong><br/> Sets the tax rate as a percentage.">
                                Tax Rate (%)
                            </th>
                            <th class="spacer_75 align_ctr tooltip_trigger" 
                                title="If checked, the tax rate will be set as 'active'.">
                                Status
                            </th>
                            <th class="spacer_75 align_ctr tooltip_trigger" 
                                title="If checked, the row will be deleted upon the form being updated.">
                                Delete
                            </th>
                        </tr>
                    </thead>
                    <?php if (! empty($tax_data)) { ?>	
                    <tbody>
                    <?php 
                        foreach ($tax_data as $row) {
                            $tax_id = $row[$this->flexi_cart_admin->db_column('tax', 'id')];
                    ?>
                        <tr>
                            <td>
                                <input type="hidden" name="update[<?php echo $tax_id; ?>][id]" value="<?php echo $tax_id; ?>"/>
                                <input type="text" name="update[<?php echo $tax_id; ?>][name]" value="<?php echo set_value('update['.$tax_id.'][name]', $row[$this->flexi_cart_admin->db_column('tax', 'name')]); ?>" class="form-control"/>
                            </td>
                            <td>
                            <?php 
                                $tax_location = $row[$this->flexi_cart_admin->db_column('tax', 'location')];								
                                foreach($locations_tiered as $location_type => $locations) { 
                            ?>
                                <select style="margin-bottom: 5px;" name="update[<?php echo $tax_id; ?>][location][]" id="tax_<?php echo strtolower(url_title($location_type.'_'.$tax_id, 'underscore'));?>" class="form-control">
                                    <option value="0" class="parent_id_0">- Select <?php echo $location_type; ?> -</option>
                                <?php 
                                    // Note: CI's set_select() function does not return the empty '[]' from the name 'insert['.$tax_id.'][location][]'.
                                    // Therefore, ensure it is set as "set_select('insert['.$tax_id.'][location]', $id)".
                                    foreach($locations as $location) { 
                                        $id = $location[$this->flexi_cart_admin->db_column('locations', 'id')];
                                ?>
                                    <option value="<?php echo $id; ?>" class="parent_id_<?php echo $location[$this->flexi_cart_admin->db_column('locations', 'parent')]; ?>" <?php echo set_select('update['.$tax_id.'][location]', $id, ($tax_location == $id)); ?>>
                                        <?php echo $location[$this->flexi_cart_admin->db_column('locations', 'name')]; ?>
                                    </option>
                                <?php } ?>
                                </select>
                            <?php } ?>
                            </td>
                            <td>
                                <?php $tax_zone = $row[$this->flexi_cart_admin->db_column('tax', 'zone')];?>
                                <select name="update[<?php echo $tax_id; ?>][zone]" class="form-control">
                                    <option value="0">No Tax Zone</option>
                                <?php 
                                    foreach($tax_zones as $zone) { 
                                        $id = $zone[$this->flexi_cart_admin->db_column('location_zones', 'id')];
                                ?>
                                    <option value="<?php echo $id; ?>" <?php echo set_select('update['.$tax_id.'][zone]', $id, ($tax_zone == $id)); ?>>
                                        <?php echo $zone[$this->flexi_cart_admin->db_column('location_zones', 'name')]; ?>
                                    </option>
                                <?php } ?>
                                </select>
                            </td>
                            <td>
                                <input type="text" name="update[<?php echo $tax_id; ?>][rate]" value="<?php echo set_value('update['.$tax_id.'][rate]', round($row[$this->flexi_cart_admin->db_column('tax', 'rate')],4)); ?>" class="form-control validate_decimal"/>
                            </td>
                            <td class="align_ctr">
                                <div class="checkbox">
                                <?php $status = (bool)$row[$this->flexi_cart_admin->db_column('tax', 'status')]; ?>
                                <input type="hidden" name="update[<?php echo $tax_id; ?>][status]" value="0"/>
                                <input type="checkbox" name="update[<?php echo $tax_id; ?>][status]" value="1" <?php echo set_checkbox('update['.$tax_id.'][status]','1', $status); ?>/>
                                <div class="checkbox-visible"></div>
                </div>
                            </td>
                            <td class="align_ctr">
                                <div class="checkbox">
                                <input type="hidden" name="update[<?php echo $tax_id; ?>][delete]" value="0"/>
                                <input type="checkbox" name="update[<?php echo $tax_id; ?>][delete]" value="1"/>
                                    <div class="checkbox-visible"></div>
                                </div>
                            </td>
                        </tr>
                    <?php } ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="6">
                                <input type="submit" name="update_tax" value="Update Taxes" class="btn btn-all"/>
                            </td>
                        </tr>
                    </tfoot>
                    <?php } else { ?>
                    <tbody>
                        <tr>
                            <td colspan="6">
                                There are no taxes setup to view.<br/>
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
        $('select[id^="tax_country"]').each(function() 
        {
            var elem_id = $(this).attr('id');
            var tax_id = elem_id.substring(elem_id.lastIndexOf('_')+1);
        
            // !IMPORTANT NOTE: The dependent_menu functions must be called in their reverse order - i.e. the most specific locations first.
            dependent_menu('tax_state_'+tax_id, 'tax_post_zip_code_'+tax_id, false, true);
            dependent_menu('tax_country_'+tax_id, 'tax_state_'+tax_id, ['tax_post_zip_code_'+tax_id], true);
        });
    });
    </script>
  </body>
</html>