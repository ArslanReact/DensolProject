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
            <div class="col-12 m-b-20 m-t-20"><h4 class="tite-admin"><?php echo $page_heading;?><a href="<?php echo base_url().ADMIN_FOLDER."/banner/categories/add/".$page_parent;?>" class="btn btn-all float-right" style="color:#fff;font-size: 13px;padding: 5px 10px;">Add New Categories</a></h4></div>
            <div class="row m-b-20">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Title</th>
                                    <th scope="col">Parent</th>
                                    <th scope="col">Last Updated</th>
                                    <th scope="col">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                if(isset($bannercategories)){
                                    $id = 0;
                                    foreach($bannercategories as $bannercategory){
                                        $id++;
                                        ?>
                                        <tr>
                                            <td>
                                                <?php echo $bannercategory->id;?>
                                            </td>
                                            <td>
                                                <?php if(checkParentif("banner_categories",$bannercategory->id)==1){?>
                                                    <a class="nlink" href="<?php echo base_url().ADMIN_FOLDER.'/banner/categories/'.$bannercategory->id;?>"><?php echo $bannercategory->title;?></a>
                                                <? }else{?>
                                                    <?php echo $bannercategory->title;?>
                                                <? }?>
                                            </td>
                                            <td>
                                                <?php echo getParentwithlink("banner_categories","/banner/categories/",$bannercategory->id);?>
                                            </td>
                                            <td><?php echo timesincenew($bannercategory->created)." ago";?></td>
                                            <td>
                                                <a title="Copy" class="btn btn-success" href="<?php echo base_url().ADMIN_FOLDER.'/banner/categories/copy-data/'.$bannercategory->id;?>"><i class="fa fa-copy f-16"></i></a>
                                                <a title="Edit" class="btn btn-info" href="<?php echo base_url().ADMIN_FOLDER.'/banner/categories/edit/'.$bannercategory->id;?>"><i class="fa fa-pencil-square-o f-16"></i></a>
                                                <a title="Delete" class="btn btn-danger" href="<?php echo base_url().ADMIN_FOLDER.'/banner/categories/delete/'.$bannercategory->id;?>" onclick="return confirm('Are you sure you want to delete this record?');"><i class="fa fa-trash f-16"></i></a>
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