<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo site_settings()->company_name." Admin Panel";?></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="icon" type="image/png" href="<?=base_url();?>files/backend/images/favicon.ico"/>
    <link rel="stylesheet" href="<?=base_url();?>files/backend/css/all.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url();?>files/backend/css/theme_bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url();?>files/backend/css/theme-style.css">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        .nlink{
            padding: 2px 10px 3px !important;
        }
        .dataTables_wrapper .dataTables_info{ float: none;}
    </style>
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
          <div class="row d-flex align-items-md-stretch">
            <!-- Line Chart -->
            <div class="col-lg-12 col-md-12 flex-lg-last flex-md-first align-self-baseline">
              <div class="card sales-report mt-10px">
                <h2 class="display h4">More Views 
                                                        <a href="<?php echo base_url().ADMIN_FOLDER."/moreviews/add/".$product_id;?>" class="btn btn-all pull-right " >Add More View</a>
                                                        <a href="<?php echo base_url().ADMIN_FOLDER."/products";?>" class="btn btn-all pull-right mr-2" >Back to Products</a>
                </h2>
                <p>A list of selected product More Views</p>
                <div class="table-responsive">
                    <table id="datatable" class="display responsive nowrap align-middle text-truncate mb-0 table table-bordered table-hover table-striped" style="width:100%;">
                        <thead>
                            <tr>
                                <th class="all" width="50"># ID</th>
                                <th class="all" width="50">Image</th>
                                <th>Title</th>
                                <th width="100">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                if(isset($moreviews)){
                                foreach($moreviews as $moreview){
                            ?>
                            <tr>
                                <td>
                                    <div class="checkbox-container"><label class="checkbox-label"><input type="checkbox" form="myform" name="check[]" id="<?php echo $moreview->id;?>" value="<?php echo $moreview->id;?>"><span class="checkbox-custom rectangular"></span></label></div>
                                    <?php echo $moreview->id;?>
                                </td>
                                <td style="padding:8px;">
                                    <img src="<?php echo check_image("products/moreviews/small/",$moreview->image);?>" class="img-fluid img-thumbnail" style="max-width: 50px;max-height: 50px;">
                                </td>
                                <td>
                                    <?php echo $moreview->title;?>
                                </td>
                                <td>
                                <a title="Copy" class="btn btn-success" href="<?php echo base_url().ADMIN_FOLDER.'/moreviews/copy-data/'.$moreview->id;?>"><i class="fa fa-copy f-16"></i></a>
                                <a title="Edit" class="btn btn-info" href="<?php echo base_url().ADMIN_FOLDER.'/moreviews/edit/'.$moreview->id;?>"><i class="fa fa-pencil-square-o f-16"></i></a>
                                <a title="Delete" class="btn btn-danger" href="<?php echo base_url().ADMIN_FOLDER.'/moreviews/delete/'.$moreview->id;?>" onclick="return confirm('Are you sure you want to delete this record?');"><i class="fa fa-trash f-16"></i></a>
                                
                                </td>
                            </tr>
                            <? }}?>
                        </tfoot>
                    </table>
  
                </div>
                <div class="d-flex align-items-center mt-4">
                    <div class="d-flex align-items-center">
                        <div class="checkbox-container">
                            <label class="checkbox-label">
                                <div class="checkbox mr-2">
                                <input type="checkbox" id="select-all">
                                    <div class="checkbox-visible"></div>
                                </div>
                            </label>
                        </div>
                        Select All
                    </div>
                    <?php
                    $attributes2 = array('id' => 'myform','name'=>'myform','style'=>'display:inline-block','class' => 'text-right col p-0');
                    echo form_open(ADMIN_FOLDER.'/moreviews/multi-data',$attributes2);
                    ?>
                    <button type="submit" name="multi_sort" value="1" class="btn btn-all" style="color:#fff;font-size: 13px;padding: 5px 10px;">Sort Selected</button>
                    <button type="submit" name="multi_del" value="1" class="btn btn-all" onclick="return confirm('Are you sure you want to delete selected records?');" style="color:#fff;font-size: 13px;padding: 5px 10px;">Delete Selected</button>
                    </form>
                </div>                
              </div>
            </div>
          </div>
      <!-- Updates Section -->
      <?php $this->load->view(ADMIN_VIEW_FOLDER."/includes/footer");?>
    </div></div>
    <!-- JavaScript files-->
    <?php $this->load->view(ADMIN_VIEW_FOLDER."/includes/scripts-bk");?>
  </body>
</html>