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
            <div class="align-items-center d-flex justify-content-between">
                <div class="">
                    <h5 class="m-b-10">Manage Order Statuses</h5>
                    <p>You can update order status</p>
                </div>
                <div class="btn-group">
                    <a href="<?php echo base_url().ADMIN_FOLDER; ?>/insert_order_status" class="btn btn-all text-white">Insert New Order Status</a>
                </div>
            </div>
            <div class="row m-b-20">
                <div class="col-xl-12">
                    <div class="card">
              <div class="sales-report mt-10px">
                <div class="table-responsive dt-responsive">
                <?php echo form_open(current_url());?>
                <table class="table table-bordered m-t-10">

                    <thead class="thead-dark">

                    <tr>

                        <th scope="col" title="The name/description of the order status."> Description</th>

                        <th scope="col" title="If checked, it indicates that the order status 'Cancels' the order."> Cancel Order </th>

                        <th scope="col" title="If checked, it indicates that the order status is the default status that is applied to a 'saved' order."> Save Default </th>

                        <th scope="col" title="If checked, it indicates that the order status is the default status that is applied to a 'resaved' order."> Resave Default </th>

                        <th scope="col" title="If checked, the row will be deleted upon the form being updated."> Delete </th>

                    </tr>

                    </thead>

                    <?php if (! empty($order_status_data)) { ?>	

                    <tbody>

                    <?php 

                        foreach ($order_status_data as $row) {
                            $status_id = $row[$this->flexi_cart_admin->db_column('order_status', 'id')];
                    ?>
                        <tr>
                            <td>
                                <input type="hidden" name="update[<?php echo $status_id; ?>][id]" value="<?php echo $status_id; ?>"/>
                                <input type="text" name="update[<?php echo $status_id; ?>][status]" value="<?php echo set_value('update['.$status_id.'][status]', $row[$this->flexi_cart_admin->db_column('order_status', 'status')]);?>" class="form-control"/>
                            </td>
                            <td class="align_ctr">
                                <div class="checkbox">
                                <?php $cancelled = (bool)$row[$this->flexi_cart_admin->db_column('order_status', 'cancelled')]; ?>
                                <input type="hidden" name="update[<?php echo $status_id; ?>][cancelled]" value="0"/>
                                <input type="checkbox" name="update[<?php echo $status_id; ?>][cancelled]" value="1" <?php echo set_checkbox('update['.$status_id.'][cancelled]', '1', $cancelled); ?>/>
                                <div class="checkbox-visible"></div>
                               </div>
                            </td>
                            <td class="align_ctr">
                                <div class="checkbox">
                                <?php $save_default = (bool)$row[$this->flexi_cart_admin->db_column('order_status', 'save_default')]; ?>

                                <input type="hidden" name="update[<?php echo $status_id; ?>][save_default]" value="0"/>

                                <input type="checkbox" name="update[<?php echo $status_id; ?>][save_default]" value="1" <?php echo set_checkbox('update['.$status_id.'][save_default]', '1', $save_default); ?>/>
                                <div class="checkbox-visible"></div>
                </div>
                            </td>

                            <td class="align_ctr">
                                <div class="checkbox">
                                <?php $resave_default = (bool)$row[$this->flexi_cart_admin->db_column('order_status', 'resave_default')]; ?>

                                <input type="hidden" name="update[<?php echo $status_id; ?>][resave_default]" value="0"/>

                                <input type="checkbox" name="update[<?php echo $status_id; ?>][resave_default]" value="1" <?php echo set_checkbox('update['.$status_id.'][resave_default]', '1', $resave_default); ?>/>
                                <div class="checkbox-visible"></div>
                                </div>
                            </td>

                            <td class="align_ctr">
                                <div class="checkbox">
                                <input type="hidden" name="update[<?php echo $status_id; ?>][delete]" value="0"/>

                                <input type="checkbox" name="update[<?php echo $status_id; ?>][delete]" value="1"/>
                                    <div class="checkbox-visible"></div>
                                </div>
                            </td>

                        </tr>

                    <?php } ?>

                    </tbody>

                    <tfoot>

                        <tr>

                            <td colspan="5">

                                <input type="submit" name="update_order_status" value="Update Order Status" class="btn btn-all"/>

                            </td>

                        </tr>

                    </tfoot>

                    <?php } else { ?>

                    <tbody>

                        <tr>

                            <td colspan="5">

                                There are no order statuses setup to view.<br/>

                                <a class="btn btn-success" href="<?php echo base_url().ADMIN_FOLDER; ?>/insert_order_status">Insert New Order Status</a>

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

      <!-- Updates Section -->
      <?php $this->load->view(ADMIN_VIEW_FOLDER."/includes/footer");?>
      </div>
    </div>
    <!-- JavaScript files -->
    <?php $this->load->view(ADMIN_VIEW_FOLDER."/includes/scripts");?>
  </body>
</html>