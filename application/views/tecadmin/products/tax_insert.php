<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo site_settings()->company_name." Admin Panel";?></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="icon" type="image/png" href="<?=base_url();?>files/backend/images/favicon.ico"/>
    <link rel="stylesheet" href="<?=base_url();?>files/backend/css/all.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url();?>files/backend/css/theme_bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url();?>files/backend/css/theme-style.css">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        .nlink{
            padding: 2px 10px 3px !important;
        }
        .dataTables_wrapper .dataTables_info{ float: none;}
    </style>
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
                <h2 class="display h4">Insert New Tax Rate "<?php echo $item_data['title']; ?>"</h2>
                <p style="margin-bottom:10px;">
                <a class="btn btn-primary" href="<?php echo base_url().ADMIN_FOLDER; ?>/products">Manage Items</a> | 
                <a class="btn btn-success" href="<?php echo base_url().ADMIN_FOLDER; ?>/item_tax/<?php echo $item_data['id']; ?>">Manage <?php echo $item_data['title']; ?> Tax Rates</a>
                </p>
                <?php echo form_open(current_url());?>
                <table class="table table-striped table-bordered nowrap">
                    <thead>
                        <tr>
                            <th class="tooltip_trigger" 
                                title="Set the location that the tax rate is applied to.">
                                Location
                            </th>
                            <th class="tooltip_trigger" 
                                title="Set the zone that the tax rate is applied to. <br/>Note: If a location is set, it has priority over a zone rule.">
                                Zone
                            </th>
                            <th class="spacer_125 info_req tooltip_trigger"
                                title="<strong>Field required</strong><br/>The tax rate percentage the item incurs to the selected location/zone.">
                                Rate (%)
                            </th>
                            <th class="spacer_100 align_ctr tooltip_trigger" 
                                title="If checked, the tax rate will be set as 'active'.">
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
                                <select name="insert[<?php echo $row_id; ?>][location]" class="form-control">
                                    <option value="0">No Tax Location</option>
                                <?php 
                                    foreach($locations_inline as $location) { 
                                        $id = $location[$this->flexi_cart_admin->db_column('locations', 'id')];
                                ?>
                                    <option value="<?php echo $id; ?>" <?php echo set_select('insert['.$row_id.'][location]', $id); ?>>
                                        <?php echo $location[$this->flexi_cart_admin->db_column('locations', 'name')]; ?>
                                    </option>
                                <?php } ?>
                                </select>
                            </td>
                            <td>
                                <select name="insert[<?php echo $row_id; ?>][zone]" class="form-control">
                                    <option value="0">No Tax Zone</option>
                                <?php 
                                    foreach($tax_zones as $zone) {
                                        $id = $zone[$this->flexi_cart_admin->db_column('location_zones', 'id')];
                                ?>
                                    <option value="<?php echo $id;?>" <?php echo set_select('insert['.$row_id.'][zone]', $id); ?>>
                                        <?php echo $zone[$this->flexi_cart_admin->db_column('location_zones', 'name')]; ?>
                                    </option>
                                <?php } ?>
                                </select>
                            </td>
                            <td>
                                <input type="text" name="insert[<?php echo $row_id; ?>][rate]" value="<?php echo set_value('insert['.$row_id.'][rate]');?>" class="form-control validate_decimal"/>
                            </td>
                            <td class="align_ctr">
                                <input type="hidden" name="insert[<?php echo $row_id; ?>][status]" value="0"/>
                                <input type="checkbox" name="insert[<?php echo $row_id; ?>][status]" value="1" <?php echo set_checkbox('insert['.$row_id.'][status]', '1', TRUE); ?>/>
                            </td>
                            <td class="align_ctr">
                                <input type="button" value="+" class="copy_row btn btn-success"/>
                                <input type="button" value="x" <?php echo ($i == 0) ? 'disabled="disabled"' : NULL;?> class="remove_row btn btn-danger"/>
                            </td>
                        </tr>
                    <?php } ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="5">
                                <input type="submit" name="insert_item_tax" value="Insert New Item Tax Rates" class="btn btn-success"/>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <?php echo form_close();?>
              </div>
            </div>
          </div>
      <!-- Updates Section -->
      <?php $this->load->view(ADMIN_VIEW_FOLDER."/includes/footer");?>
    </div></div>
    <!-- JavaScript files-->
    <?php $this->load->view(ADMIN_VIEW_FOLDER."/includes/scripts");?>
  </body>
</html>