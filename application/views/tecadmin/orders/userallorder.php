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
                                      <th>Order Dispatch Details</th>
                                     </tr>
                                   </thead>
                                 <tbody>
                            <?php if (! empty($order_data)) { ?>

                                <?php

                                foreach ($order_data as $row) {

                                    $order_number = $row['ord_order_number'];

                                    ?>

                                    <tr>

                                        <td>

                                            <a href="<?php echo base_url().ADMIN_FOLDER; ?>/order_details/<?php echo $order_number; ?>"><?php echo $order_number; ?></a>

                                        </td>

                                        <td>

                                            <?php echo $row['ord_demo_bill_name']; ?>

                                        </td>

                                        <td class="align_ctr">

                                            <?php echo number_format($row['ord_total_items']); ?>

                                        </td>

                                        <td class="align_ctr">

                                            <?php echo $row['ord_total']; ?>

                                        </td>

                                        <td class="align_ctr">

                                            <?php echo date('jS M Y', strtotime($row['ord_date'])); ?>

                                        </td>

                                        <td class="align_ctr">

                                            <?php if($row['payment_status']=="Completed"){echo $row['payment_status'];}else{echo "Awaiting Payment";} ?>

                                        </td>
                                        <td width="200px"><a target="_blank" href="<?php echo base_url("invoice/".ORDER_NUMBER_PREFIX.$order_number);?>">View</a> / <a target="_blank" download="<?php echo ORDER_NUMBER_PREFIX.$order_number;?>.pdf" href="<?php echo base_url("invoice/pdf/".ORDER_NUMBER_PREFIX.$order_number);?>">Download PDF</a> </td>
                                     <td class="align_ctr">
                                            <?php echo $row[$this->flexi_cart_admin->db_column('order_status', 'status')]; ?>
                                          <?php 
                                            if($row['ord_status']=="4"){ echo "Completed";
                                            } elseif($row['ord_status']=="5") { echo "Cancelled"; 
                                            } elseif($row['ord_status']=="1") { echo "Awaiting Payment"; 
                                            } elseif($row['ord_status']=="2") { echo "New Order"; 
                                            } elseif($row['ord_status']=="3") { echo "In Processing"; }
                                        ?>
            
                                    </td>
                                    <td>
                                        <?php
                                        if($row['tracking_company'] != ''){
                                            echo "By ".$row['tracking_company']." <br>";
                                            echo "Tracking No:".$row['tracking_no']; 
                                        } else {    
                                        ?>
                                        Not Dispatch Yet!
                                        <?php } ?>
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

    <!-- JavaScript files-->
    <?php $this->load->view(ADMIN_VIEW_FOLDER."/includes/scripts");?>



  </body>

</html>