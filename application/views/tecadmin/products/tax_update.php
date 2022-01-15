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
                <h2 class="display h4">Manage Tax Rates for "<?php echo $item_data['title']; ?>"</h2>
                <p style="margin-bottom:10px;">
                <a class="btn btn-primary" href="<?php echo base_url().ADMIN_FOLDER; ?>/products">Manage Items</a> | 
                <a class="btn btn-success" href="<?php echo base_url().ADMIN_FOLDER; ?>/insert_item_tax/<?php echo $item_data['id']; ?>">Insert New Item Tax Rates</a>
                </p>
                <?php echo form_open(current_url());?>
                <table id="dom-jqry" class="table table-striped table-bordered nowrap">
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
                            <th class="spacer_100 align_ctr tooltip_trigger" 
                                title="If checked, the row will be deleted upon the form being updated.">
                                Delete
                            </th>
                        </tr>
                    </thead>
                    <?php if (! empty($item_tax_data)) { ?>	
                    <tbody>
                    <?php 
                        foreach ($item_tax_data as $row) {
                        $item_tax_id = $row[$this->flexi_cart_admin->db_column('item_tax', 'id')];								
                    ?>
                        <tr>
                            <td>
                                <input type="hidden" name="update[<?php echo $item_tax_id; ?>][id]" value="<?php echo $row[$this->flexi_cart_admin->db_column('item_tax', 'id')]?>"/>
                                
                                <?php $tax_location = $row[$this->flexi_cart_admin->db_column('item_tax', 'location')];?>
                                <select name="update[<?php echo $item_tax_id; ?>][location]" class="form-control">
                                    <option value="0">No Tax Location</option>
                                <?php 
                                    foreach($locations_inline as $location) { 
                                        $id = $location[$this->flexi_cart_admin->db_column('locations', 'id')];
                                ?>
                                    <option value="<?php echo $id; ?>" <?php echo set_select('update['.$item_tax_id.'][location]', $id, ($tax_location == $id)); ?>>
                                        <?php echo $location[$this->flexi_cart_admin->db_column('locations', 'name')]; ?>
                                    </option>
                                <?php } ?>
                                </select>
                            </td>
                            <td>
                                <?php $tax_zone = $row[$this->flexi_cart_admin->db_column('item_tax', 'zone')];?>
                                <select name="update[<?php echo $item_tax_id; ?>][zone]" class="form-control">
                                    <option value="0">No Tax Zone</option>
                                <?php 
                                    foreach($tax_zones as $zone) { 
                                        $id = $zone[$this->flexi_cart_admin->db_column('location_zones', 'id')];
                                ?>
                                    <option value="<?php echo $id; ?>" <?php echo set_select('update['.$item_tax_id.'][zone]', $id, ($tax_zone == $id)); ?>>
                                        <?php echo $zone[$this->flexi_cart_admin->db_column('location_zones', 'name')]; ?>
                                    </option>
                                <?php } ?>
                                </select>
                            </td>
                            <td>
                                <input type="text" name="update[<?php echo $item_tax_id; ?>][rate]" value="<?php echo set_value('update['.$item_tax_id.'][rate]', $row[$this->flexi_cart_admin->db_column('item_tax', 'rate')]); ?>" class="form-control validate_decimal"/>
                            </td>
                            <td class="align_ctr">
                                <?php $status = (bool)$row[$this->flexi_cart_admin->db_column('item_tax', 'status')]; ?>
                                <input type="hidden" name="update[<?php echo $item_tax_id; ?>][status]" value="0"/>
                                <input type="checkbox" name="update[<?php echo $item_tax_id; ?>][status]" value="1" <?php echo set_checkbox('update['.$item_tax_id.'][status]','1', $status); ?>/>
                            </td>
                            <td class="align_ctr">
                                <input type="hidden" name="update[<?php echo $item_tax_id; ?>][delete]" value="0"/>
                                <input type="checkbox" name="update[<?php echo $item_tax_id; ?>][delete]" value="1"/>
                            </td>
                        </tr>
                    <?php } ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="5">
                                <input type="submit" name="update_item_tax" value="Update Item Tax" class="btn btn-success"/>
                            </td>
                        </tr>
                    </tfoot>
                    <?php } else { ?>
                    <tbody>
                        <tr>
                            <td colspan="5">
                                There are no taxes setup to view for this item.<br/>
                            </td>
                        </tr>
                    </tbody>
                    <?php } ?>
                </table>
                <?php echo form_close();?>
              </div>
            </div>
          </div>
      <!-- Updates Section -->
      <?php $this->load->view(ADMIN_VIEW_FOLDER."/includes/footer");?>
    </div></div>
    <!-- JavaScript files-->
    <?php $this->load->view(ADMIN_VIEW_FOLDER."/includes/scripts-bk");?>
  </body>
</html>