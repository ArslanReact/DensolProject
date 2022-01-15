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
            <div class="row m-b-20">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="align-items-center d-flex justify-content-between">
                            <div class="">
                                <h5 class="m-b-10">Insert New Tax</h5>
                                <p>Insert New Tax by entring required detail</p>
                            </div>
                            <div class="btn-group">
                                <a href="<?php echo base_url().ADMIN_FOLDER ?>/tax" class="btn btn-all text-white">Manage Taxes</a>
                            </div>
                        </div>

                        <div class="table-responsive m-t-20">
                <?php echo form_open(current_url());?>

                        <table class="table table-bordered">
                            <thead class="thead-dark">
                            <tr>
                                <th scope="col"
                                    title="<strong>Field Required</strong><br/> The name of the tax rate.">
                                    Name
                                </th>
                                <th scope="col"
                                    title="Set the location that the tax rate is applied to.">
                                    Location
                                </th>
                                <th scope="col"
                                    title="Set the zone that the tax rate is applied to. <br/>Note: If a location is set, it has priority over a zone rule.">
                                    Zone
                                </th>
                                <th scope="col"
                                    title="<strong>Field Required</strong><br/> Sets the tax rate as a percentage.">
                                    Tax Rate (%)
                                </th>
                                <th scope="col"
                                    title="If checked, the tax rate will be set as 'active'.">
                                    Status
                                </th>
                                <th scope="col"
                                    title="Copy or remove a specific row and its data.">
                                    Copy / Remove
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php 
                            for($i = 0; ($i == 0 || (isset($validation_row_ids[$i]))); $i++) { 
                                $row_id = (isset($validation_row_ids[$i])) ? $validation_row_ids[$i] : $i;
                                // !IMPORTANT: Remember to use the $i value to update the select menu id value "strtolower(url_title($location_type.'_'.$i, 'underscore'))", when using the copy/remove function.
                        ?>
                            <tr>
                                <td>
                                    <input type="text" name="insert[<?php echo $row_id; ?>][name]" value="<?php echo set_value('insert['.$row_id.'][name]');?>" class="form-control"/>
                                </td>
                                <td>
                                <?php foreach($locations_tiered as $location_type => $locations) { ?>
                                    <select style="margin-bottom:5px;" name="insert[<?php echo $row_id; ?>][location][]" id="tax_<?php echo strtolower(url_title($location_type.'_'.$i, 'underscore'));?>" class="dependent_menu form-control">
                                        <option value="0" class="parent_id_0">- Select <?php echo $location_type; ?> -</option>
                                    <?php 
                                        // Note: CI's set_select() function does not return the empty '[]' from the name 'insert['.$row_id.'][location][]'.
                                        // Therefore, ensure it is set as "set_select('insert['.$row_id.'][location]', $id)".
                                        foreach($locations as $location) { 
                                            $id = $location[$this->flexi_cart_admin->db_column('locations', 'id')];
                                    ?>
                                        <option value="<?php echo $id; ?>" class="parent_id_<?php echo $location[$this->flexi_cart_admin->db_column('locations', 'parent')]; ?>" <?php echo set_select('insert['.$row_id.'][location]', $id); ?>>
                                            <?php echo $location[$this->flexi_cart_admin->db_column('locations', 'name')]; ?>
                                        </option>
                                    <?php } ?>
                                    </select>
                                <?php } ?>
                                </td>
                                <td>
                                    <select name="insert[<?php echo $row_id; ?>][zone]" class="form-control">
                                        <option value="0">No Tax Zone</option>
                                    <?php 
                                        foreach($tax_zones as $zone) { 
                                            $id = $zone[$this->flexi_cart_admin->db_column('location_zones', 'id')];
                                    ?>
                                        <option value="<?php echo $id; ?>" <?php echo set_select('insert['.$row_id.'][zone]', $id); ?>>
                                            <?php echo $zone[$this->flexi_cart_admin->db_column('location_zones', 'name')]; ?>
                                        </option>
                                    <?php } ?>
                                    </select>
                                </td>
                                <td>
                                    <input type="text" name="insert[<?php echo $row_id; ?>][rate]" value="<?php echo set_value('insert['.$row_id.'][rate]');?>" class="form-control validate_decimal"/>
                                </td>
                                <td class="align_ctr">
                                    <div class="checkbox">
                                        <input type="hidden" name="insert[<?php echo $row_id; ?>][status]" value="0"/>
                                        <input type="checkbox" name="insert[<?php echo $row_id; ?>][status]" value="1" <?php echo set_checkbox('insert['.$row_id.'][status]', '1', TRUE); ?>/>
                                        <div class="checkbox-visible"></div>
                                    </div>
                                </td>
                                <td class="align_ctr">
                                    <input type="button" value="+" class="copy_row btn btn-all"/>
                                    <input type="button" value="x" <?php echo ($i == 0) ? 'disabled="disabled"' : NULL;?> class="remove_row btn btn-danger"/>
                                </td>
                            </tr>
                        <?php } ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="6">
                                    <input type="submit" name="insert_tax" value="Insert New Taxes" class="btn btn-all"/>
                                </td>
                            </tr>
                        </tbody>
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