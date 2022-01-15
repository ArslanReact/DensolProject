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

          <div class="row d-flex align-items-md-stretch">
            <!-- Line Chart -->
            <div class="col-lg-12 col-md-12 flex-lg-last flex-md-first align-self-baseline">
              <div class="card sales-report mt-10px">
                  <div class="align-items-center">
                      <h5 class="m-b-10">Manage Location Types</h5>
                      <p>You can update Locations types</p>
                      <div class="btn-group m-b-10">
                          <a class="btn btn-all text-white" href="<?php echo base_url().ADMIN_FOLDER; ?>/insert_location_type">Insert New Location Type</a>
                      </div>
                  </div>

                <div class="table-responsive dt-responsive">
                <?php echo form_open(current_url());?>
                <table class="table table-striped table-bordered nowrap">
                    <thead>
                        <tr>
                            <th class="spacer_250 info_req tooltip_trigger"
                                title="<strong>Field Required</strong><br/>The name for the type of locations that will be related. <br/>For example, 'Country', 'State' etc.">
                                Location Type
                            </th>
                            <th class="tooltip_trigger"
                                title="Sets the location types 'Parent'. <br/>For Example, 'State' would have 'Country' as its parent.">
                                Parent Location Type 
                            </th>
                            <th class="spacer_175 align_ctr tooltip_trigger"
                                title="Manage and Insert locations related to the location type.">
                                Related Locations
                            </th>
                            <th class="spacer_75 align_ctr tooltip_trigger" 
                                title="If checked, the row will be deleted upon the form being updated.">
                                Delete
                            </th>
                        </tr>
                    </thead>
                    <?php if (! empty($location_type_data)) { ?>	
                    <tbody>
                    <?php 						
                        foreach ($location_type_data as $row) {
                            $location_type_id = $row[$this->flexi_cart_admin->db_column('location_type', 'id')];
                    ?>
                        <tr>
                            <td>
                                <input type="hidden" name="update[<?php echo $location_type_id; ?>][id]" value="<?php echo $location_type_id; ?>"/>
                                <input type="text" name="update[<?php echo $location_type_id; ?>][name]" value="<?php echo set_value('update['.$location_type_id.'][name]', $row[$this->flexi_cart_admin->db_column('location_type', 'name')]); ?>" class="form-control validate_alpha"/>
                            </td>
                            <td>
                                <?php $parent_location_type = $row[$this->flexi_cart_admin->db_column('location_type', 'parent')];?>
                                <select name="update[<?php echo $location_type_id; ?>][parent_location_type]" class="form-control">
                                    <option value="0">No Parent Location Type</option>
                                <?php 
                                    foreach($location_type_data as $location_type) { 
                                        $id = $location_type[$this->flexi_cart_admin->db_column('location_type', 'id')];
                                ?>
                                    <option value="<?php echo $id; ?>" <?php echo set_select('update['.$location_type_id.'][parent_location_type]', $id, ($parent_location_type == $id)); ?>>
                                        <?php echo $location_type[$this->flexi_cart_admin->db_column('location_type', 'name')]; ?>
                                    </option>
                                <?php } ?>
                                </select>
                            </td>
                            <td class="align_ctr">
                                <a href="<?php echo base_url().ADMIN_FOLDER; ?>/locations/<?php echo $location_type_id;?>">Manage</a> | 
                                <a href="<?php echo base_url().ADMIN_FOLDER; ?>/insert_location/<?php echo $location_type_id;?>">Insert New</a> 
                            </td>
                            <td class="align_ctr">
                                <input type="hidden" name="update[<?php echo $location_type_id; ?>][delete]" value="0"/>
                                <input type="checkbox" name="update[<?php echo $location_type_id; ?>][delete]" value="1"/>
                            </td>
                        </tr>
                    <?php } ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="4">
                                <input type="submit" name="update_location_types" value="Update Location Types" class="btn btn-all"/>
                            </td>
                        </tr>
                    </tfoot>
                    <?php } else { ?>
                    <tbody>
                        <tr>
                            <td colspan="4">
                                There are no location types setup to view.<br/>
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
  </body>
</html>