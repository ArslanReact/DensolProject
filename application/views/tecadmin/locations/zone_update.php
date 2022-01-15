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
                  <h5 class="m-b-10">Manage Location Types</h5>
                  <p>You can update Locations types</p>
                <p class="text-left" style="margin-bottom:10px;">
                    <a class="btn btn-all" href="<?php echo base_url().ADMIN_FOLDER; ?>/insert_zone">Insert New Zone</a>
                </p>
                <div class="table-responsive dt-responsive">

                <?php echo form_open(current_url());?>
                <table class="table table-striped table-bordered nowrap">
                    <thead>
                        <tr>
                            <th class="info_req tooltip_trigger"
                                title="<strong>Field Required</strong><br/>The name of the zone.">
                                Name
                            </th>
                            <th class="tooltip_trigger"
                                title="A brief description of the purpose of the zone and the regions covered.">
                                Description
                            </th>
                            <th class="spacer_75 align_ctr tooltip_trigger" 
                                title="If checked, the zone will be set as 'active'.">
                                Status
                            </th>
                            <th class="spacer_75 align_ctr tooltip_trigger" 
                                title="If checked, the row will be deleted upon the form being updated.">
                                Delete
                            </th>
                        </tr>
                    </thead>
                    <?php if (! empty($location_zone_data)) { ?>	
                    <tbody>
                    <?php 						
                        foreach ($location_zone_data as $row) {
                            $location_zone_id = $row[$this->flexi_cart_admin->db_column('location_zones', 'id')];
                    ?>
                        <tr>
                            <td>
                                <input type="hidden" name="update[<?php echo $location_zone_id; ?>][id]" value="<?php echo $location_zone_id; ?>"/>
                                <input type="text" name="update[<?php echo $location_zone_id; ?>][name]" value="<?php echo set_value('update['.$location_zone_id.'][name]',$row[$this->flexi_cart_admin->db_column('location_zones', 'name')]); ?>" class="form-control"/>
                            </td>
                            <td>
                                <textarea name="update[<?php echo $location_zone_id; ?>][description]" class="form-control"><?php echo set_value('update['.$location_zone_id.'][description]',$row[$this->flexi_cart_admin->db_column('location_zones', 'description')]); ?></textarea>
                            </td>
                            <td class="align_ctr">
                                <?php $status = (bool)$row[$this->flexi_cart_admin->db_column('location_zones', 'status')]; ?>
                                <input type="hidden" name="update[<?php echo $location_zone_id; ?>][status]" value="0"/>
                                <input type="checkbox" name="update[<?php echo $location_zone_id; ?>][status]" value="1" <?php echo set_checkbox('update['.$location_zone_id.'][status]','1', $status); ?>/>
                            </td>
                            <td class="align_ctr">
                                <input type="hidden" name="update[<?php echo $location_zone_id; ?>][delete]" value="0"/>
                                <input type="checkbox" name="update[<?php echo $location_zone_id; ?>][delete]" value="1"/>
                            </td>
                        </tr>
                    <?php } ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="4">
                                <input type="submit" name="update_zones" value="Update Zones" class="btn btn-all"/>
                            </td>
                        </tr>
                    </tfoot>
                    <?php }else{ ?>
                    <tbody>
                        <tr>
                            <td colspan="4">
                                There are no zones setup to view.<br/>
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