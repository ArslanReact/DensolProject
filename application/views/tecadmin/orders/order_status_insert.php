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
                  <div class="align-items-center d-flex justify-content-between">
                      <div class="">
                          <h5 class="m-b-10">Insert New Order Status</h5>
                          <p>Create new order status</p>
                      </div>
                      <div class="btn-group">
                          <a href="<?php echo base_url().ADMIN_FOLDER; ?>/order_status" class="btn btn-all text-white">Manage Order Status</a>
                      </div>
                  </div>
                <?php echo form_open(current_url());?>
                    <table class="table table-bordered m-t-10">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col" title="The name/description of the order status."> Status Description </th>

                                <th scope="col" title="If checked, it indicates that the order status 'Cancels' the order."> Cancel Order </th>

                                <th scope="col" title="If checked, it indicates that the order status is the default status that is applied to a 'saved' order."> Save Default </th>

                                <th scope="col" title="If checked, it indicates that the order status is the default status that is applied to a 'resaved' order."> Resave Default </th>

                                <th scope="col" title="Copy or remove a specific row and its data."> Copy / Remove </th>

                            </tr>

                        </thead>

                        <tbody>

                        <?php 

                            for($i = 0; ($i == 0 || (isset($validation_row_ids[$i]))); $i++) { 

                                $row_id = (isset($validation_row_ids[$i])) ? $validation_row_ids[$i] : $i;

                        ?>

                            <tr>

                                <td>

                                    <input type="text" name="insert[<?php echo $row_id; ?>][status]" value="<?php echo set_value('insert['.$row_id.'][status]');?>" class="form-control"/>

                                </td>

                                <td class="align_ctr">
                                    <div class="checkbox">
                                    <input type="hidden" name="insert[<?php echo $row_id; ?>][cancelled]" value="0"/>

                                    <input type="checkbox" name="insert[<?php echo $row_id; ?>][cancelled]" value="1" <?php echo set_checkbox('insert['.$row_id.'][cancelled]', '1', FALSE); ?>/>
                                        <div class="checkbox-visible"></div>
                                    </div>
                                </td>

                                <td class="align_ctr">
                                    <div class="checkbox">
                                    <input type="hidden" name="insert[<?php echo $row_id; ?>][save_default]" value="0"/>

                                    <input type="checkbox" name="insert[<?php echo $row_id; ?>][save_default]" value="1" <?php echo set_checkbox('insert['.$row_id.'][save_default]', '1', FALSE); ?>/>
                                    <div class="checkbox-visible"></div>
                                    </div>
                                </td>

                                <td class="align_ctr">
                                    <div class="checkbox">
                                    <input type="hidden" name="insert[<?php echo $row_id; ?>][resave_default]" value="0"/>

                                    <input type="checkbox" name="insert[<?php echo $row_id; ?>][resave_default]" value="1" <?php echo set_checkbox('insert['.$row_id.'][resave_default]', '1', FALSE); ?>/>
                                    <div class="checkbox-visible"></div>
                                    </div>
                                </td>

                                <td class="align_ctr">

                                    <input type="button" value="+" class="copy_row btn btn-all"/>

                                    <input type="button" value="x" <?php echo ($i == 0) ? 'disabled="disabled"' : NULL;?> class="remove_row btn btn-all"/>

                                </td>

                            </tr>

                        <?php } ?>

                        </tbody>

                        <tfoot>

                            <tr>

                                <td colspan="5">

                                    <input type="submit" name="insert_order_status" value="Insert Order Status" class="btn btn-all"/>

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
      </div>
    </div>
    <!-- JavaScript files-->
    <?php $this->load->view(ADMIN_VIEW_FOLDER."/includes/scripts");?>
  </body>
</html>