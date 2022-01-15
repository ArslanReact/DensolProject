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
      <!-- navbar-->
    <div class="col-xl-10 col-lg-9">
        <!-- dashboard content -->
        <div class="content-page-admin">
            <?php $this->load->view(ADMIN_VIEW_FOLDER."/includes/header");?>
      <!-- Header Section-->
    <div class="col-12 m-b-20 m-t-20"><h4 class="tite-admin">Dashboard</h4></div>
    <div class="row">
        <div class="col-xl-3 col-lg-6">
            <div class="admin-report gradientbg-primary align-items-center d-flex">
                <div class="circle-gutter"><img class="img-fluid" src="<?=base_url();?>files/backend/images/tag-icon.svg" alt=""></div>
                <div class="ml-4">
                            <h6><?php echo $dashboard_summay[0]['totalorder']; ?></h6>
                            <div class="ddd">Total Orders</div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6">
            <div class="admin-report gradientbg-warning align-items-center d-flex">
                <div class="circle-gutter"><img class="img-fluid" src="<?=base_url();?>files/backend/images/tag-icon.svg" alt=""></div>
                <div class="ml-4">
                            <h6><?php echo $dashboard_summay[0]['totalprocessing']; ?></h6>
                            <div class="ddd">Total Inprocessing Order</div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6">
            <div class="admin-report gradientbg-default align-items-center d-flex">
                <div class="circle-gutter"><img class="img-fluid" src="<?=base_url();?>files/backend/images/tag-icon.svg" alt=""></div>
                <div class="ml-4">
                            <h6>$ <?php echo $dashboard_summay[0]['total']; ?></h6>
                            <div class="ddd">Total Order Cost</div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6">
            <div class="admin-report gradientbg-pink align-items-center d-flex">
                <div class="circle-gutter"><img class="img-fluid" src="<?=base_url();?>files/backend/images/tag-icon.svg" alt=""></div>
                <div class="ml-4">
                            <h6><?php echo $dashboard_summay[0]['totalcompleteorder']; ?></h6>
                            <div class="ddd">Total Dispatch Order</div>
                </div>
            </div>
        </div>
    </div>
    <div class="row m-t-20">
        <div class="col-xl-6 col-lg-6 col-sm-12 m-b-20">
            <div class="card">
                <div class="d-flex chart-head justify-content-between align-items-center">
                    <h5>Gross Sales</h5>
                    <div class="form-group m-0">
                        <select class="form-control">
                            <option>By Day</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                        </select>
                    </div>
                </div>
                <div id="chartContainer1" style="height: 370px; width: 100%;"></div>
            </div>
        </div>
        <div class="col-xl-6 col-lg-6 col-sm-12 m-b-20">
            <div class="card">
                <div class="d-flex chart-head justify-content-between align-items-center">
                    <h5>Orders</h5>
                    <div class="form-group m-0">
                        <select class="form-control">
                            <option>By Day</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                        </select>
                    </div>
                </div>
                <div id="chartContainer" style="height: 370px; width: 100%;"></div>
            </div>
        </div>
    </div>
    <div class="row m-b-20">
        <div class="col-xl-12">
                    <?php 
            if($this->session->userdata('info') != ""){
        ?>
            <div class="alert alert-success">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <?php echo $this->session->userdata('info'); ?>
            </div>
        <?php } ?>
                    <div class="card">
                            <div class="table-responsive m-t-20">
                                <table id="datatable" class="table">
                                    <thead class="thead-dark">
                                    <tr>
                                      <th class="all">Order Number</th>
                                      <th class="all">Customer Name</th>
                                      <th>Total Items</th>
                                      <th>Total Value</th>
                                      <th>Date</th>
                                      <th>Payment Status</th>
                                      <th>Invoice</th>
                                      <th>Status</th>
                                      <th>Action</th>
                                     </tr>
                                   </thead>
                                 <tbody>
                            <?php if (! empty($order_data)) { ?>

                                <?php

                                foreach ($order_data as $row) {

                                    $order_number = $row[$this->flexi_cart_admin->db_column('order_summary', 'order_number')];

                                    ?>

                                    <tr>

                                        <td>

                                            <a href="<?php echo base_url().ADMIN_FOLDER; ?>/order_details/<?php echo $order_number; ?>"><?php echo $order_number; ?></a>

                                        </td>

                                        <td>

                                            <?php echo $row['ord_demo_bill_name']; ?>

                                        </td>

                                        <td class="align_ctr">

                                            <?php echo number_format($row[$this->flexi_cart_admin->db_column('order_summary', 'total_items')]); ?>

                                        </td>

                                        <td class="align_ctr">

                                            <?php echo $row[$this->flexi_cart_admin->db_column('order_summary', 'total')]; ?>

                                        </td>

                                        <td class="align_ctr">

                                            <?php echo date('jS M Y', strtotime($row[$this->flexi_cart_admin->db_column('order_summary', 'date')])); ?>

                                        </td>

                                        <td class="align_ctr">

                                            <?php if($row['payment_status']=="Completed"){echo $row['payment_status'];}else{echo "Awaiting Payment";} ?>

                                        </td>
                                        <td><a target="_blank" href="<?php echo base_url("invoice/".ORDER_NUMBER_PREFIX.$order_number);?>">View</a> / <a target="_blank" download="<?php echo ORDER_NUMBER_PREFIX.$order_number;?>.pdf" href="<?php echo base_url("invoice/pdf/".ORDER_NUMBER_PREFIX.$order_number);?>">Download PDF</a> </td>
                                        <td class="align_ctr">

                                            <?php echo $row[$this->flexi_cart_admin->db_column('order_status', 'status')]; ?>

                                        </td>
                                        <td>
                                            <a href="<?php echo base_url().ADMIN_FOLDER; ?>/order_delete/<?php echo $order_number; ?>" onclick="return confirm('Are you sure you want to delete this item?');">Delete</a>
                                        </td>

                                    </tr>

                                <?php } } else { ?>

                                <tr>

                                    <td colspan="6">

                                        There are no orders available to view.

                                    </td>

                                </tr>

                            <?php } ?>

                            </tbody>

                        </table>

                    </div>

                </div>
        </div>
    </div>
      <!-- Updates Section -->
            <?php $this->load->view(ADMIN_VIEW_FOLDER."/includes/footer");?>
        </div>
    </div>


<?php $this->load->view(ADMIN_VIEW_FOLDER.'/includes/scripts');?>
  </body>
</html>