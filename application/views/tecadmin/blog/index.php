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
      
        <div class="container-fluid">
          <div class="col-12 m-b-20 m-t-20"><h4 class="tite-admin"><?=$page_heading;?></h4></div>
          <div class="row d-flex align-items-md-stretch">
            <!-- Line Chart -->
            <div class="col-lg-12 col-md-12 flex-lg-last flex-md-first align-self-baseline">
              <div class="card sales-report mt-10px">
                <h2 class="display h4">All Blogs <a href="<?php echo base_url().ADMIN_FOLDER."/blog/add";?>" class="btn btn-success float-right" style="color:#fff;font-size: 13px;padding: 5px 10px;">Add New Blog</a></h2>
                <p>A list of all Blogs</p>
                <div class="table-responsive">
                    <table id="datatable" class="display responsive nowrap align-middle text-truncate mb-0 table table-bordered table-hover table-striped" style="width:100%;">
                        <thead>
                            <tr>
                                <th class="all" width="50"># ID</th>
                                <th class="all">Title</th>
                                <th>Category</th>
                                <th width="50">Publish</th>
                                <th width="50">Sort</th>
                                <th width="100">Last Updated</th>
                                <th width="100">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                if(isset($blogs)){
                                foreach($blogs as $blog){
                            ?>
                            <tr>
                                <td>
                                <div class="checkbox-container"><label class="checkbox-label"><input type="checkbox" form="myform" name="check[]" id="<?php echo $blog->id;?>" value="<?php echo $blog->id;?>"><span class="checkbox-custom rectangular"></span></label></div>
                                <?php echo $blog->id;?>
                                </td>
                                <td>
                                    <?php echo $blog->title;?>
                                </td>
                                <td>
                                    <?php
                                        echo getblogCategories($blog->id);
                                    ?>
                                </td>
                                <td><?php if($blog->is_active==1){?><label class="badge badge-success">Yes</label><? }else{?><label class="badge badge-danger">No</label><? }?></td>
                                <td><input type="number" name="<?php echo $blog->id;?>"  form="myform" value="<?php echo $blog->sort;?>" style="max-width:50px;"></td>
                                <td><?php echo timesincenew($blog->created)." ago";?></td>
                                <td>
                                <a title="Copy" class="btn btn-success" href="<?php echo base_url().ADMIN_FOLDER.'/blog/copy-data/'.$blog->id;?>"><i class="fa fa-copy f-16"></i></a>
                                <a title="Edit" class="btn btn-info" href="<?php echo base_url().ADMIN_FOLDER.'/blog/edit/'.$blog->id;?>"><i class="fa fa-pencil-square-o f-16"></i></a>
                                <a title="Delete" class="btn btn-danger" href="<?php echo base_url().ADMIN_FOLDER.'/blog/delete/'.$blog->id;?>" onclick="return confirm('Are you sure you want to delete this record?');"><i class="fa fa-trash f-16"></i></a>
                                </td>
                            </tr>
                            <? }}?>
                        </tbody>
                    </table>
                    <div style="display:inline-block;">
                        <div class="checkbox-container"><label class="checkbox-label"><input type="checkbox" id="select-all"><span class="checkbox-custom rectangular"></span></label></div>
                        Select All
                    </div>
                    <?php
                    $attributes2 = array('id' => 'myform','name'=>'myform','style'=>'display:inline-block');
                    echo form_open(ADMIN_FOLDER.'/blog/multi-data',$attributes2);
                    ?>
                    <button type="submit" name="multi_sort" value="1" class="btn btn-success" style="color:#fff;font-size: 13px;padding: 5px 10px;">Sort Selected</button>
                    <button type="submit" name="multi_del" value="1" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete selected records?');" style="color:#fff;font-size: 13px;padding: 5px 10px;">Delete Selected</button>
                    </form>
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