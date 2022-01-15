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
            <?php if(isset($message)){
                echo $message;
            }
            ?>


          <div class="row d-flex align-items-md-stretch">
            <!-- Line Chart -->
            <div class="col-lg-12 col-md-12 flex-lg-last flex-md-first align-self-baseline">
              <div class="card sales-report mt-10px">
                  <h5 class="m-b-10"><?php echo ($discount_type == 'item') ? 'Product' : 'Summary';?> Discounts</h5>
                <p style="margin-bottom:10px;">Manage and Update <?php echo ($discount_type == 'item') ? 'Product' : 'Summary';?> Discounts</p>
                <p class="btn-group w-50">
                <?php if ($discount_type == 'summary') { ?>
                <a class="btn btn-all text-white" href="<?php echo base_url().ADMIN_FOLDER; ?>/item_discounts">Manage Item Discounts</a>
                <?php } else { ?>
                <a class="btn btn-all text-white" href="<?php echo base_url().ADMIN_FOLDER; ?>/summary_discounts">Manage Summary Discounts</a>
                <?php } ?>
                <a class="btn btn-all text-white" href="<?php echo base_url().ADMIN_FOLDER; ?>/discount_groups" style="margin: 0px 10px;">Manage Item Discount Groups</a>
                <a class="btn btn-all text-white" href="<?php echo base_url().ADMIN_FOLDER; ?>/insert_discount">Insert New Discount</a>
                </p>

                <div class="table-responsive dt-responsive">
                <?php echo form_open(current_url());?>
                <table  id="dom-jqry" class="table table-bordered">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col" title="Edit the discount settings.">
                                Manage
                            </th>
                            <th scope="col" title="A short description of the discount.">
                                Description
                            </th>
                            <th scope="col" title="The number of times remaining that the discount can be used.">
                                Usage Limit
                            </th>
                            <th scope="col"  title="The start date of the discount.">
                                Valid Date
                            </th>
                            <th scope="col"  title="The expiry date of the discount.">
                                Expire Date
                            </th>
                            <th scope="col" title="If checked, the discount will be set as 'active'.">
                                Status
                            </th>
                            <th scope="col" title="If checked, the row will be deleted upon the form being updated.">
                                Delete
                            </th>
                        </tr>
                    </thead>
                    <?php if (! empty($discount_data)) { ?>	
                    <tbody>
                    <?php 
                        foreach ($discount_data as $row) {
                            $discount_id = $row[$this->flexi_cart_admin->db_column('discounts', 'id')];
                    ?>
                        <tr>
                            <td class="align_ctr">
                                <input type="hidden" name="update[<?php echo $discount_id; ?>][id]" value="<?php echo $discount_id; ?>"/>
                                <a href="<?php echo base_url().ADMIN_FOLDER; ?>/update_discount/<?php echo $discount_id; ?>">Edit</a>
                            </td>
                            <td>
                                <?php echo $row[$this->flexi_cart_admin->db_column('discounts', 'description')]; ?>
                            </td>
                            <td class="align_ctr">
                                <?php echo $row[$this->flexi_cart_admin->db_column('discounts', 'usage_limit')]; ?>
                            </td>
                            <td class="align_ctr">
                                <?php echo date('d-m-Y', strtotime($row[$this->flexi_cart_admin->db_column('discounts', 'valid_date')])); ?>
                            </td>
                            <td class="align_ctr">
                                <?php echo date('d-m-Y', strtotime($row[$this->flexi_cart_admin->db_column('discounts', 'expire_date')])); ?>
                            </td>
                            <td class="align_ctr">
                                <div class="checkbox">
                                <?php $status = (bool)$row[$this->flexi_cart_admin->db_column('discounts', 'status')]; ?>
                                <input type="hidden" name="update[<?php echo $discount_id; ?>][status]" value="0" />
                                <input type="checkbox" name="update[<?php echo $discount_id; ?>][status]" value="1" <?php echo set_checkbox('update['.$discount_id.'][status]','1', $status); ?>/>
                                    <div class="checkbox-visible"></div>
                                </div>
                            </td>
                            <td class="align_ctr">
                                <div class="checkbox">
                                <input type="hidden" name="update[<?php echo $discount_id; ?>][delete]" value="0"/>
                                <input type="checkbox" name="update[<?php echo $discount_id; ?>][delete]" value="1"/>
                                    <div class="checkbox-visible"></div>
                                </div>
                            </td>
                        </tr>
                    <?php } ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="7">
                                <input type="submit" name="update_discounts" value="Update Discounts" class="btn btn-all"/>
                            </td>
                        </tr>
                    </tfoot>
                    <?php } else { ?>
                    <tbody>
                        <tr>
                            <td colspan="7">
                                There are no discounts setup to view.<br/>
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