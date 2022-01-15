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
                <h2 class="display h4">Insert New <?php echo $location_type_data[$this->flexi_cart_admin->db_column('location_type', 'name')]; ?> Locations</h2>
                <p>Insert Location by Entring required detail</p>
                <p class="text-center" style="margin-bottom:10px;">
                    <a class="btn btn-success" href="<?php echo base_url().ADMIN_FOLDER; ?>/location_types">Manage Location Types</a> | 
                    <a class="btn btn-primary" href="<?php echo base_url().ADMIN_FOLDER; ?>/locations/<?php echo $location_type_data[$this->flexi_cart_admin->db_column('location_type', 'id')]; ?>">Manage <?php echo $location_type_data[$this->flexi_cart_admin->db_column('location_type', 'name')]; ?></a>
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
                                <input type="text" name="insert[<?php echo $row_id; ?>][name]" value="<?php echo set_value('insert['.$row_id.'][name]');?>" class="form-control"/>
                            </td>
                            <td>
                                <select name="insert[<?php echo $row_id; ?>][parent_location]" class="form-control">
                                    <option value="0">No Parent Location</option>
                                <?php 
                                    foreach($locations_inline as $location) { 
                                        $id = $location[$this->flexi_cart_admin->db_column('locations', 'id')];
                                ?>
                                    <option value="<?php echo $id; ?>" <?php echo set_select('insert['.$row_id.'][parent_location]', $id); ?>>
                                        <?php echo $location[$this->flexi_cart_admin->db_column('locations', 'name')]; ?>
                                    </option>
                                <?php } ?>
                                </select>
                            </td>
                            <td>
                                <select name="insert[<?php echo $row_id; ?>][shipping_zone]" class="form-control">
                                    <option value="0">No Shipping Zone</option>
                                <?php 
                                    foreach($shipping_zones as $zone) { 
                                        $id = $zone[$this->flexi_cart_admin->db_column('location_zones', 'id')];
                                ?>
                                    <option value="<?php echo $id; ?>" <?php echo set_select('insert['.$row_id.'][shipping_zone]', $id); ?>>
                                        <?php echo $zone[$this->flexi_cart_admin->db_column('location_zones', 'name')]; ?>
                                    </option>
                                <?php } ?>
                                </select>
                            </td>
                            <td>
                                <select name="insert[<?php echo $row_id; ?>][tax_zone]" class="form-control">
                                    <option value="0">No Tax Zone</option>
                                <?php 
                                    foreach($tax_zones as $zone) { 
                                        $id = $zone[$this->flexi_cart_admin->db_column('location_zones', 'id')];
                                ?>
                                    <option value="<?php echo $id; ?>" <?php echo set_select('insert['.$row_id.'][tax_zone]', $id); ?>>
                                        <?php echo $zone[$this->flexi_cart_admin->db_column('location_zones', 'name')]; ?>
                                    </option>
                                <?php } ?>
                                </select>
                            </td>
                            <td class="align_ctr">
                                <input type="hidden" name="insert[<?php echo $row_id; ?>][status]" value="0"/>
                                <input type="checkbox" name="insert[<?php echo $row_id; ?>][status]" value="1" <?php echo set_checkbox('insert['.$row_id.'][status]', 1, TRUE); ?>/>
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
                            <td colspan="6">
                                <input type="submit" name="insert_location" value="Insert New <?php echo $location_type_data[$this->flexi_cart_admin->db_column('location_type', 'name')]; ?> Locations" class="btn btn-success"/>
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
      </section>
      <!-- Updates Section -->
      <?php $this->load->view(ADMIN_VIEW_FOLDER."/includes/footer");?>
    </div>
    <!-- JavaScript files-->
    <?php $this->load->view(ADMIN_VIEW_FOLDER."/includes/scripts");?>
  </body>
</html>