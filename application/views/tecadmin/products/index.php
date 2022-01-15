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
                <h2 class="display h4">All Products 
                <a href="<?php echo base_url().ADMIN_FOLDER."/products/import";?>" class="ml-2 btn btn-all float-right">Import Excel Stock Details</a> 
                <a href="<?php echo base_url().ADMIN_FOLDER."/products/import_details";?>" class="ml-2 btn btn-all float-right">Import Excel Product details</a> 
                <a href="<?php echo base_url().ADMIN_FOLDER."/products/export_product";?>" class="ml-2 btn btn-all float-right">Export Excel Products Detail</a> 
                <a href="<?php echo base_url().ADMIN_FOLDER."/products/export_fbproduct";?>" class="ml-2 btn btn-all float-right">Export Facebook Products Detail</a> 
                <a href="<?php echo base_url().ADMIN_FOLDER."/products/export_stock";?>" class="ml-2 btn btn-all float-right">Export Excel Stock Detail</a>
                <a href="<?php echo base_url().ADMIN_FOLDER."/products/add";?>" class="btn btn-all float-right">Add New Product</a>
                </h2>
                <p>A list of All Products includes More views</p>
                <div class="table-responsive">
                    <table id="datatable" class="display responsive nowrap align-middle text-truncate mb-0 table table-bordered table-hover table-striped" style="width:100%;">
                    <thead>
                        <tr>
                            <th class="all" width="20"># ID</th>
                            <th class="all" width="50">Image</th>
                            <th class="all">Title</th>
                            <th>Category</th>
                            <th width="50">More Views</th>
                            <th width="50">Featured</th>
                            <th width="50">Publish</th>
                            <th width="20">Sort</th>
                            <th width="20">Stock</th>
                            <th width="50">Shipping</th>
                            <th width="50">Taxes</th>
                            <th width="100">Last Updated</th>
                            <th width="100">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            if(isset($products)){
                            foreach($products as $product){
                        ?>
                        <tr>
                            <td>
                                    <div class="checkbox-container"><label class="checkbox-label">
                                            <div class="checkbox">
                                            <input type="checkbox" form="myform" name="check[]" id="<?php echo $product->id;?>" value="<?php echo $product->id;?>">
                                            <div class="checkbox-visible"></div>
                                            </div>
                                        </label>
                                    </div>                                
                            <?php echo $product->id;?>
                            </td>
                            <td style="padding:8px;">
                            <img src="<?php echo check_image("products/small/",$product->image);?>" class="img-fluid img-thumbnail" style="max-width: 50px;max-height: 50px;">
                            </td>
                            <td>
                                <?php echo $product->title;?><br><label class="badge badge-success" style="text-transform:lowercase;"><?php echo $product->article?></label>
                            </td>
                            <td>
                                <?php
                                    echo getproductsCategories($product->id);
                                ?>
                            </td>
                            <td>
                                <a title="More Views" class="btn btn-info" href="<?php echo base_url().ADMIN_FOLDER.'/moreviews/'.$product->id;?>"><i class="fa fa-pencil-square-o f-16"></i></a> <?php echo getmoreviewsbyproductid($product->id);?>
                            </td>
                            <td><?php if($product->is_featured==1){?><label class="badge badge-success">Yes</label><? }else{?><label class="badge badge-danger">No</label><? }?></td>
                            <td><?php if($product->is_active==1){?><label class="badge badge-success">Yes</label><? }else{?><label class="badge badge-danger">No</label><? }?></td>
                            <td><input type="number" name="<?php echo $product->id;?>"  form="myform" value="<?php echo $product->sort;?>" style="max-width:50px;"></td>
                            <td><?php echo getValuee("stock_quantity","item_stock","stock_item_fk",$product->id);?></td>
                            <td><a class="btn btn-info" href="<?php echo base_url().ADMIN_FOLDER.'/item_shipping/'.$product->id;?>"><i class="fa fa-pencil-square-o f-16"></i></a></td>
                            <td><a class="btn btn-info" href="<?php echo base_url().ADMIN_FOLDER.'/item_tax/'.$product->id;?>"><i class="fa fa-pencil-square-o f-16"></i></a></td>
                            <td><?php echo timesincenew($product->created)." ago";?></td>
                            <td>
                            <a title="Copy" class="btn btn-success" href="<?php echo base_url().ADMIN_FOLDER.'/products/copy-data/'.$product->id;?>"><i class="fa fa-copy f-16"></i></a>
                            <a class="btn btn-info" href="<?php echo base_url().ADMIN_FOLDER.'/products/edit/'.$product->id;?>"><i class="fa fa-pencil-square-o f-16"></i></a>
                            <a class="btn btn-danger" href="<?php echo base_url().ADMIN_FOLDER.'/products/delete/'.$product->id;?>" onclick="return confirm('Are you sure you want to delete this record?');"><i class="fa fa-trash f-16"></i></a>
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
                    echo form_open(ADMIN_FOLDER.'/products/multi-data',$attributes2);
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
    </div>
    </div>
    <!-- JavaScript files-->
    <?php $this->load->view(ADMIN_VIEW_FOLDER."/includes/scripts-bk");?>
  </body>
</html>