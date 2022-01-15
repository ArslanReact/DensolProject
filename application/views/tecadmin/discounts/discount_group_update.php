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
                <h2 class="display h4">Discount Item Group and Items</h2>
                <p style="margin-bottom:10px;">All Discount item group and items</p>
                <p class="text-center" style="margin-bottom:10px;">
                <a class="btn btn-primary" href="<?php echo base_url().ADMIN_FOLDER; ?>/discount_groups">Manage Discount Item Groups</a> | 
                <a class="btn btn-success" href="<?php echo base_url().ADMIN_FOLDER; ?>/insert_discount_group_items/<?php echo $group_data[$this->flexi_cart_admin->db_column('discount_groups', 'id')]; ?>">Insert Items to Discount Item Group</a>
                </p>
                <div class="table-responsive dt-responsive">

                <?php echo form_open(current_url());?>
                <h6>Discount Item Group</h6>
                <table class="table table-striped table-bordered nowrap">
                    
                    <thead>
                        <tr>
                            <th class="info_req tooltip_trigger"
                                title="<strong>Field Required</strong><br/>Set the name of the discount item group.">
                                Group Name
                            </th>
                            <th class="spacer_100 align_ctr tooltip_trigger" 
                                title="If checked, the discount item group will be set as 'active'.">
                                Status
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <input type="text" name="update_group[name]" value="<?php echo set_value('update_group[name]', $group_data[$this->flexi_cart_admin->db_column('discount_groups', 'name')]); ?>" class="form-control"/>
                            </td>
                            <td class="align_ctr">
                                <?php $status = (bool) $group_data[$this->flexi_cart_admin->db_column('discount_groups', 'status')]; ?>
                                <input type="hidden" name="update_group[status]" value="0"/>
                                <input type="checkbox" name="update_group[status]" value="1" <?php echo set_checkbox('update_group[status]','1', $status); ?>/>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <h6>Current Items in Group</h6>
                <table class="table table-striped table-bordered nowrap">
                    <thead>
                        <tr>
                            <th>Item Name</th>
                            <th class="spacer_100 align_ctr tooltip_trigger" 
                                title="If checked, the row will be deleted upon the form being updated.">
                                Delete
                            </th>
                        </tr>
                    </thead>
                    <?php if (! empty($group_item_data)) { ?>	
                    <tbody>
                    <?php 
                        foreach($group_item_data as $item) { 
                            $item_id = $item['id'];
                    ?>
                        <tr>
                            <td>
                                <input type="hidden" name="delete_item[<?php echo $item_id;?>][id]" value="<?php echo $item[$this->flexi_cart_admin->db_column('discount_group_items', 'id')]; ?>"/>
                                <?php echo $item['title']; ?>
                            </td>
                            <td class="align_ctr">
                                <input type="hidden" name="delete_item[<?php echo $item_id;?>][delete]" value="0"/>
                                <input type="checkbox" name="delete_item[<?php echo $item_id;?>][delete]" value="1"/>
                            </td>
                        </tr>
                    <?php } ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="2">
                                <input type="submit" name="update_discount_group_items" value="Update Discount Item Group and Items" class="btn btn-success"/>
                            </td>
                        </tr>
                    </tfoot>
                    <?php } else { ?>
                    <tbody>
                        <tr>
                            <td colspan="2">
                                There are no items in this discount item group that are setup to view.<br/>
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
        </div>
      </section>
      <!-- Updates Section -->
      <?php $this->load->view(ADMIN_VIEW_FOLDER."/includes/footer");?>
    </div>
    <!-- JavaScript files-->
	<?php $this->load->view(ADMIN_VIEW_FOLDER."/includes/scripts");?>
	
  </body>
</html>