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
                <h5 class="display h4">All Variation Groups <a href="<?php echo base_url().ADMIN_FOLDER."/variation/group/add";?>" class="btn btn-all float-right" style="color:#fff;font-size: 13px;padding: 5px 10px;">Add New Group</a></h5>
                <p>A list of all Variation Groups</p>
                <div class="table-responsive">
                    <table class="display responsive nowrap align-middle text-truncate mb-0 table table-bordered">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col"># ID</th>
                                <th scope="col">Title</th>
                                <th scope="col">Helper Name</th>
                                <th scope="col">Options</th>
                                <th scope="col">Variation Type</th>
                                <th scope="col">Publish</th>
                                <th scope="col">Required</th>
                                <th scope="col">Price Affect</th>
                                <th scope="col">Color</th>
                                <th scope="col">Sort</th>
                                <th scope="col">Last Updated</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                if(isset($variationgroups)){
                                foreach($variationgroups as $variationgroup){
                            ?>
                            <tr>
                                <td>
                                <div class="checkbox-container"><label class="checkbox-label">
                                        <?=$variationgroup->id;?>
                                    </label></div>

                                </td>
                                <td><?php echo $variationgroup->title;?></td>
                                <td><?php echo $variationgroup->helper_name;?></td>
                                <td><a title="Edit Options" class="btn btn-all" href="<?php echo base_url().ADMIN_FOLDER.'/variation/'.$variationgroup->id;?>"><i class="fa fa-pencil-square-o f-16"></i></a> <?php echo getvariationbygroupid($variationgroup->id);?></td>
                                <td><?php echo $variationgroup->type;?></td>
                                <td><?php if($variationgroup->is_active==1){?><label class="btn btn-all">Yes</label><? }else{?><label class="btn btn-all">No</label><? }?></td>
                                <td><?php if($variationgroup->is_required==1){?><label class="btn btn-all">Yes</label><? }else{?><label class="btn btn-all">No</label><? }?></td>
                                <td><?php if($variationgroup->affect_price==1){?><label class="btn btn-all">Yes</label><? }else{?><label class="btn btn-all">No</label><? }?></td>
                                <td><?php if($variationgroup->is_color==1){?><label class="btn btn-all">Yes</label><? }else{?><label class="btn btn-all">No</label><? }?></td>
                                <td><input type="number" class="form-control" name="<?php echo $variationgroup->id;?>"  form="myform" value="<?php echo $variationgroup->sort;?>" style="max-width:50px;"></td>
                                <td><?php echo timesincenew($variationgroup->created)." ago";?></td>
                                <td>
                                    <a title="Copy" class="btn btn-all" href="<?php echo base_url().ADMIN_FOLDER.'/variation/group/copy-data/'.$variationgroup->id;?>"><i class="fa fa-copy f-16"></i></a>
                                    <a title="Edit" class="btn btn-all" href="<?php echo base_url().ADMIN_FOLDER.'/variation/group/edit/'.$variationgroup->id;?>"><i class="fa fa-pencil-square-o f-16"></i></a>
                                    <a title="Delete" class="btn btn-all" href="<?php echo base_url().ADMIN_FOLDER.'/variation/group/delete/'.$variationgroup->id;?>" onclick="return confirm('Are you sure you want to delete this record?');"><i class="fa fa-trash f-16"></i></a>
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