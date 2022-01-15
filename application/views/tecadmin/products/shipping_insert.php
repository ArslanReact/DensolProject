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
            <div class="col-12 m-b-20 m-t-20"><h4 class="tite-admin"><?=$page_heading;?></h4></div>
          <div class="row d-flex align-items-md-stretch">
            <!-- Line Chart -->
            <div class="col-lg-12 col-md-12 flex-lg-last flex-md-first align-self-baseline">
              <div class="card sales-report mt-10px">
                  <div class="d-flex align-items-center mb-4">
                <h2 class="display h4">Insert New Shipping Rule for "<?php echo $item_data['title']; ?>"</h2>
                <div class="col text-right p-0">
                <a class="btn btn-all" href="<?php echo base_url().ADMIN_FOLDER; ?>/items">Manage Items</a> | 
                <a class="btn btn-all" href="<?php echo base_url().ADMIN_FOLDER; ?>/item_shipping/<?php echo $item_data['id']; ?>">Manage <?php echo $item_data['title']; ?> Shipping Rules</a>
                </div>
                </div>
                <?php echo form_open(current_url());?>
                <table class="table table-striped table-bordered nowrap">
                    <thead>
                        <tr>
                            <th class="tooltip_trigger" 
                                title="Set the location that the shipping rule is applied to.">
                                Location
                            </th>
                            <th class="tooltip_trigger" 
                                title="Set the zone that the shipping rule is applied to. <br/>Note: If a location is set, it has priority over a zone.">
                                Zone
                            </th>
                            <th class="spacer_75 align_ctr tooltip_trigger" 
                                title="The rate the item costs to ship to the selected location/zone. <br/>Note:Leave blank (Not '0') if not setting a rate.">
                                Shipping Rate
                            </th>
                            <th class="spacer_150 align_ctr tooltip_trigger" 
                                title="Set whether an item is 'Whitelisted' (Only permitted) or 'Blacklisted' (Not permitted) to being shipped to a location. <br/>If set as 'Location Not Banned', the item can be shipped to all locations.">
                                Shipping Ban Status
                            </th>
                            <th class="spacer_75 align_ctr tooltip_trigger" 
                                title="If checked, the cart will calculate the items shipping separate from the rest of the cart, and then add the cost to the final shipping charge.">
                                Ship Seperate
                            </th>
                            <th class="spacer_75 align_ctr tooltip_trigger" 
                                title="If checked, the shipping rule will be set as 'active'.">
                                Status
                            </th>
                            <th class="spacer_100 align_ctr tooltip_trigger" 
                                title="Copy or remove a specific row and its data.">
                                Copy / Remove
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <select name="insert[0][location]" class="form-control">
                                    <option value="0">No Shipping Location</option>
                                <?php foreach($locations_inline as $location) { ?>
                                    <option value="<?php echo $location[$this->flexi_cart_admin->db_column('locations', 'id')]; ?>">
                                        <?php echo $location[$this->flexi_cart_admin->db_column('locations', 'name')]; ?>
                                    </option>
                                <?php } ?>
                                </select>
                            </td>
                            <td>
                                <select name="insert[0][zone]" class="form-control">
                                    <option value="0">No Shipping Zone</option>
                                <?php foreach($shipping_zones as $zone) { ?>
                                    <option value="<?php echo $zone[$this->flexi_cart_admin->db_column('location_zones', 'id')]; ?>">
                                        <?php echo $zone[$this->flexi_cart_admin->db_column('location_zones', 'name')]; ?>
                                    </option>
                                <?php } ?>
                                </select>
                            </td>
                            <td>
                                <input type="text" name="insert[0][value]" value="" placeholder="NULL" class="form-control"/>
                            </td>
                            <td class="align_ctr">
                                <select name="insert[0][banned]" class="form-control">
                                    <option value="0">Location Not Banned</option>
                                    <option value="1">Whitelist Location</option>
                                    <option value="2">Blacklist Location</option>
                                </select>
                            </td>
                            <td class="align_ctr">
                                <input type="hidden" name="insert[0][separate]" value="0"/>
                                <input type="checkbox" name="insert[0][separate]" value="1"/>
                            </td>
                            <td class="align_ctr">
                                <input type="hidden" name="insert[0][status]" value="0"/>
                                <input type="checkbox" name="insert[0][status]" value="1" checked="checked"/>
                            </td>
                            <td class="align_ctr">
                                <input type="button" value="+" class="copy_row btn btn-success"/>
                                <input type="button" value="x" disabled="disabled" class="remove_row btn btn-danger"/>
                            </td>
                        </tr>                    
                        <tr>
                            <td colspan="7">
                                <input type="submit" name="insert_item_shipping" value="Insert New Item Shipping Rules" class="btn btn-success"/>
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