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
            <div class="row m-b-20">
                <div class="col-xl-12">
                    <div class="card">
                <h2 class="display h4">All Gallery Categories <a href="<?php echo base_url().ADMIN_FOLDER."/gallery/categories/add/".$page_parent;?>" class="btn btn-all float-right">Add New Category</a></h2>
                <p>A list of all Gallery Categories</p>
                <div class="table-responsive">
                    <table class="display responsive nowrap align-middle text-truncate mb-0 table table-bordered">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col"># ID</th>
                                <th scope="col">Title</th>
                                <th scope="col">Parent</th>
                                <th scope="col">Publish</th>
                                <th scope="col">Sort</th>
                                <th scope="col">Last Updated</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                if(isset($gallerycategories)){
                                foreach($gallerycategories as $gallerycategory){
                            ?>
                            <tr>
                                <td>
<!--                                    <div class="checkbox-container">-->
<!--                                        <label class="checkbox-label">-->
<!--                                            <input type="checkbox" form="myform" name="check[]" id="--><?php //echo $gallerycategory->id;?><!--" value="--><?php //echo $gallerycategory->id;?><!--">-->
<!--                                            <span class="checkbox-custom rectangular"></span>-->
<!--                                        </label>-->
<!--                                    </div>-->
                                    <?php echo $gallerycategory->id;?>
                                </td>
                                <td>
                                    <?php if(checkParentif("gallery_categories",$gallerycategory->id)==1){?>
                                        <a class="nlink" href="<?php echo base_url().ADMIN_FOLDER.'/gallery/categories/'.$gallerycategory->id;?>"><?php echo $gallerycategory->title;?></a>
                                    <? }else{?>
                                        <?php echo $gallerycategory->title;?>
                                    <? }?>
                                </td>
                                <td>
                                    <?php echo getParentwithlink("gallery_categories","/gallery/categories/",$gallerycategory->id);?>
                                    
                                </td>
                                <td><?php if($gallerycategory->is_active==1){?><label class="btn btn-all">Yes</label><? }else{?><label class="btn btn-all">No</label><? }?></td>
                                <td><input type="number" name="<?php echo $gallerycategory->id;?>"  form="myform" value="<?php echo $gallerycategory->sort;?>" class="form-control" style="max-width:50px;"></td>
                                <td><?php echo timesincenew($gallerycategory->created)." ago";?></td>
                                <td>
                                <a title="Copy" class="btn btn-all" href="<?php echo base_url().ADMIN_FOLDER.'/gallery/categories/copy-data/'.$gallerycategory->id;?>"><i class="fa fa-copy f-16"></i></a>
                                <a title="Edit" class="btn btn-all" href="<?php echo base_url().ADMIN_FOLDER.'/gallery/categories/edit/'.$gallerycategory->id;?>"><i class="fa fa-pencil-square-o f-16"></i></a>
                                <a title="Delete" class="btn btn-all" href="<?php echo base_url().ADMIN_FOLDER.'/gallery/categories/delete/'.$gallerycategory->id;?>" onclick="return confirm('Are you sure you want to delete this record?');"><i class="fa fa-trash f-16"></i></a>
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