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
        <div class="col-12 m-b-20 m-t-20"><h4 class="tite-admin"><?php echo $page_heading;?></h4></div>
        
      <!-- Header Section-->
            <div class="row m-b-20">
                <div class="col-xl-12">
                    <div class="card">
                        
                            <nav>
                                <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                                    <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Not yet Dispatched</a>
                                    <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Not Yet Paid</a>
                                </div>
                            </nav>
                            <div class="tab-content" id="nav-tabContent">
                                <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                            <div class="table-responsive m-t-20">
                                        <table id="datatable2" class="table">
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
                                             </tr>
                                           </thead>
                                         <tbody>
                                            <?php if (! empty($order_data)) { ?>
                
                                                <?php
                
                                                foreach ($order_data as $row) {
                
                                                    $order_number = $row[$this->flexi_cart_admin->db_column('order_summary', 'order_number')];
                                                    if($row[$this->flexi_cart_admin->db_column('order_status', 'status')] !="Awaiting Payment"){
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
                
                                                    </tr>
                
                                                <?php } } } else { ?>
                
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
                                <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
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
                                                      <th>Reminder</th>
                                                     </tr>
                                                   </thead>
                                                 <tbody>
                                            <?php if (! empty($order_data)) { ?>
                
                                                <?php
                
                                                foreach ($order_data as $row) {
                
                                                    $order_number = $row[$this->flexi_cart_admin->db_column('order_summary', 'order_number')];
                                                        if($row[$this->flexi_cart_admin->db_column('order_status', 'status')] =="Awaiting Payment"){
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
                                                            <a href="#">Send Reminder</a>
                                                        </td>
                
                                                    </tr>
                
                                                <?php } } } else { ?>
                
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