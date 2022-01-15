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
            <div class="col-12 m-b-20 m-t-20"><h4 class="tite-admin"><?php echo $page_heading;?></h4></div>
            <div class="row m-b-20">
                <div class="col-xl-12">
                    <div class="card">
                <h5 class="display h4">All Options
                <a href="<?php echo base_url().ADMIN_FOLDER."/variation/add/".$group->id;?>" class="btn btn-all float-right m-l-10" style="color:#fff;font-size: 13px;padding: 5px 10px;">Add New Option</a>
                <a href="<?php echo base_url().ADMIN_FOLDER."/variation/group";?>" class="btn btn-all float-right" style="color:#fff;font-size: 13px;padding: 5px 10px;">Back to Group</a>
                </h5>
                <p>A list of All Options</p>
                <div class="table-responsive">
                    <table class="display responsive nowrap align-middle text-truncate mb-0 table table-bordered">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col"># ID</th>
                            <th scope="col">Title</th>
                            <th scope="col">Detail</th>
                            <!-- <th width="50">Sku</th> -->
                            <th scope="col">Price</th>
                            <th scope="col">Qty</th>
                            <th scope="col">Publish</th>
                            <th scope="col">Sort</th>
                            <th scope="col">Last Updated</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            if(isset($variations)){
                            foreach($variations as $variation){
                        ?>
                        <tr>
                            <td> <?php echo $variation->id;?> </td>
                            <td><?php echo $variation->title;?></td>
                            <td><?php echo $variation->detail;?></td>
                            <!-- <td><?php //echo $variation->sku;?></td> -->
                            <td><?php echo $variation->price_option.$variation->price;?></td>
                            <td><?php echo $variation->qty;?></td>
                            <td><?php if($variation->is_active==1){?><label class="btn btn-all">Yes</label><? }else{?><label class="btn btn-all">No</label><? }?></td>
                            <td><input type="number" name="<?php echo $variation->id;?>"  form="myform" value="<?php echo $variation->sort;?>" style="max-width:50px;"></td>
                            <td><?php echo timesincenew($variation->created)."ago";?></td>
                            <td>
                                <a title="Copy" class="btn btn-all" href="<?php echo base_url().ADMIN_FOLDER.'/variation/copy-data/'.$variation->id;?>"><i class="fa fa-copy f-16"></i></a>
                                <a title="Edit" class="btn btn-all" href="<?php echo base_url().ADMIN_FOLDER.'/variation/edit/'.$variation->id;?>"><i class="fa fa-pencil-square-o f-16"></i></a>
                                <a title="Delete" class="btn btn-all" href="<?php echo base_url().ADMIN_FOLDER.'/variation/delete/'.$variation->id;?>" onclick="return confirm('Are you sure you want to delete this record?');"><i class="fa fa-trash f-16"></i></a>
                            </td>
                        </tr>
                        <? }}?>
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