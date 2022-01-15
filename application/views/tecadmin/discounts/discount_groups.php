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
                  <h5 class="m-b-10">Discount Products Group</h5>
                <p>A List of all discount groups</p>
                <p class="text-left" style="margin-bottom:10px;">
                <a class="btn btn-all" href="<?php echo base_url().ADMIN_FOLDER; ?>/insert_discount_group">Insert New Group</a>
                <a class="btn btn-all" href="<?php echo base_url().ADMIN_FOLDER; ?>/item_discounts">Manage Item Discounts</a>
                <a class="btn btn-all" href="<?php echo base_url().ADMIN_FOLDER; ?>/summary_discounts">Manage Summary Discounts</a>
                </p>
                <div class="table-responsive dt-responsive">

                <?php echo form_open(current_url());?>
                    <table  id="dom-jqry" class="table table-bordered m-t-15">
                        <thead class="thead-dark">
                            <tr>
                                <th class="info_req tooltip_trigger"
                                    title="<strong>Field Required</strong><br/>Set the name of the discount item group.">
                                    Group Name
                                </th>
                                <th class="spacer_175 align_ctr tooltip_trigger"
                                    title="Manage items within the discount item group.">
                                    Manage
                                </th>
                                <th class="spacer_100 align_ctr tooltip_trigger" 
                                    title="If checked, the discount item group will be set as 'active'.">
                                    Status
                                </th>
                                <th class="spacer_100 align_ctr tooltip_trigger" 
                                    title="If checked, the row will be deleted upon the form being updated.">
                                    Delete
                                </th>
                            </tr>
                        </thead>
                        <?php if (! empty($discount_group_data)) { ?>	
                        <tbody>
                        <?php 
                            foreach ($discount_group_data as $row) {
                                $disc_group_id = $row[$this->flexi_cart_admin->db_column('discount_groups', 'id')];
                        ?>
                            <tr>
                                <td>
                                    <input type="hidden" name="update[<?php echo $disc_group_id; ?>][id]" value="<?php echo $disc_group_id; ?>"/>
                                    <input type="text" name="update[<?php echo $disc_group_id; ?>][name]" value="<?php echo set_value('update['.$disc_group_id.'][name]', $row[$this->flexi_cart_admin->db_column('discount_groups', 'name')]); ?>" class="form-control"/>
                                </td>
                                <td class="align_ctr">
                                    <a href="<?php echo base_url().ADMIN_FOLDER; ?>/update_discount_group/<?php echo $disc_group_id; ?>">Manage Items in Group</a><br/>
                                    <a href="<?php echo base_url().ADMIN_FOLDER; ?>/insert_discount_group_items/<?php echo $disc_group_id; ?>">Insert New Items to Group</a>
                                </td>
                                <td class="align_ctr">
                                    <?php $status = (bool)$row[$this->flexi_cart_admin->db_column('discount_groups', 'status')]; ?>
                                    <input type="hidden" name="update[<?php echo $disc_group_id; ?>][status]" value="0"/>
                                    <input type="checkbox" name="update[<?php echo $disc_group_id; ?>][status]" value="1" <?php echo set_checkbox('update['.$disc_group_id.'][status]','1', $status); ?>/>
                                </td>
                                <td class="align_ctr">
                                    <input type="hidden" name="update[<?php echo $disc_group_id; ?>][delete]" value="0"/>
                                    <input type="checkbox" name="update[<?php echo $disc_group_id; ?>][delete]" value="1"/>
                                </td>
                            </tr>
                        <?php } ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="4">
                                    <input type="submit" name="update_discount_groups" value="Update Discount Item Groups" class="btn btn-primary"/>
                                </td>
                            </tr>
                        </tfoot>
                        <?php } else { ?>
                        <tbody>
                            <tr>
                                <td colspan="4">
                                    There are no discount item groups setup to view.<br/>
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