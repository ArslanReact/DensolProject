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
      <!-- navbar -->
      <?php $this->load->view(ADMIN_VIEW_FOLDER."/includes/header");?>
      <!--Header Section-->
            <div class="col-12 m-b-20 m-t-20"><h4 class="tite-admin"><?php echo $page_heading;?></h4></div>
            <div class="row m-b-20">
                <div class="col-xl-12">
                    <div class="card">
                  <h5 class="display h4">All User Groups</h5>
                  <p>A list of all User Groups</p>
                 <div class="table-responsive">
                    <table class="display responsive nowrap align-middle text-truncate mb-0 table table-bordered">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col" width="20"># ID</th>
                                <th scope="col">Title</th>
                                <!-- <th>Discount Type</th>
                                <th>Discount</th> -->
                                <th scope="col">Active</th>
                                <!-- <th width="100">Last Updated</th> -->
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                if(isset($usersgroups)){
                                foreach($usersgroups as $usersgroup){
                            ?>
                            <tr>
                                <td>
                                    <div class="checkbox-container">
                                        <label class="checkbox-label">
                                            <div class="checkbox">
                                            <input type="checkbox" form="myform" name="check[]" id="<?php echo $usersgroup->id;?>" value="<?php echo $usersgroup->id;?>">
                                            <div class="checkbox-visible"></div>
                                            </div>
                                        </label>
                                    </div>
                                </td>
                                <td>
                                    <?php echo $usersgroup->title;?>
                                </td>
                                <!-- <td>
                                    <?php 
                                      // if($usersgroup->discount_type=="f"){
                                      //   echo "Flat Rate";
                                      // }elseif($usersgroup->discount_type=="p"){
                                      //   echo "Percentage";
                                      // }else{
                                      //   echo "None";
                                      // }

                                    ?>
                                </td>
                                <td>
                                    <?php //echo $usersgroup->discount;?>
                                </td> -->
                                
                                <td><?php if($usersgroup->is_active==1){?><label class="btn btn-all">Yes</label><? }else{?><label class="btn btn-danger">No</label><? }?></td>
                                <!-- <td><?php //echo timesincenew($usersgroup->created)." ago";?></td> -->
                                <td>
                                <a title="Edit" class="btn btn-all" href="<?php echo base_url().ADMIN_FOLDER.'/users-group/edit/'.$usersgroup->id;?>"><i class="fa fa-pencil-square-o f-16"></i></a>
                                <!-- <a title="Delete" class="btn btn-danger" href="<?php //echo base_url().ADMIN_FOLDER.'/users-group/delete/'.$usersgroup->id;?>" onclick="return confirm('Are you sure you want to delete this record?');"><i class="fa fa-trash f-16"></i></a> -->
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