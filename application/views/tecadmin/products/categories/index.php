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

            <div class="row m-b-20">
                <div class="col-xl-12">
                    <div class="row m-b-20">

                        <div class="col-xl-4 col-lg-5">

                                <?php

                                $attributes = array('class' => 'form-material card-block');

                                echo form_open_multipart(ADMIN_FOLDER.'/products/categories/add_submit',$attributes);

                                ?>
                                <h5>Add New Category</h5>
                                <div class="form-group m-t-20">
                                    <label>Name</label>
                                    <input placeholder="The name is how it appears on your site." type="text" name="title" class="form-control">
                                </div>
                                <div class="form-group m-t-10">
                                    <label>Slug</label>
                                    <input placeholder="The “slug” is the URL-friendly version of the name." type="text" name="slug" class="form-control">
                                </div>
                                <div class="form-group m-t-10">
                                    <label>Parent Category</label>

                                    <?=$categories;?>
                                </div>
                                <div class="form-group m-t-10">
                                    <label>Description</label>
                                    <textarea class="form-control" placeholder="The description is not prominent by default; however, some themes may show it." name="content" rows="4"></textarea>
                                </div>


                                <div class="form-group">

                                    <label>Category Icon (Optional)</label>

                                    <div class="custom-file">

                                        <input type="file" name="icon" class="custom-file-input" id="customFile">

                                        <label class="custom-file-label" for="Choose files To Upload">Choose files To Upload</label>

                                    </div>

                                </div>





                                <div class="form-group">

                                    <label>Category Thumbnail (Optional)</label>

                                    <div class="custom-file">

                                        <input type="file" name="thumbnail" class="custom-file-input" id="customFile">

                                        <label class="custom-file-label" for="Choose files To Upload">Choose files To Upload</label>

                                    </div>

                                </div>





                                <div class="form-group">

                                    <label>Category Banner (Optional)</label>

                                    <div class="custom-file">

                                        <input type="file" name="banner" class="custom-file-input" id="customFile">

                                        <label class="custom-file-label" for="Choose files To Upload">Choose files To Upload</label>

                                    </div>

                                </div>



                            <div class="col-md-12 m-t-10">

                                <h6>SEO Information</h6>

                            </div>



                                <div class="form-group">

                                    <label>Seo Title</label>

                                    <input class="form-control" name="meta_title">

                                </div>





                                <div class="form-group">

                                    <label>Seo Description</label>

                                    <textarea class="form-control" name="meta_desc" rows="3"></textarea>

                                </div>





                                <div class="form-group">

                                    <label>Seo Keyword</label>

                                    <textarea class="form-control" name="meta_key" rows="3"></textarea>

                                </div>





                                <div class="row">

                                    <div class="col-md-6">

                                        <div class="form-group">

                                            <ul class="list-unstyled mb-0">

                                                <li class="d-inline-block mr-2">

                                                    <fieldset>

                                                        <label for="customRadio">Publish</label>

                                                        <div class="custom-control custom-radio">

                                                            <input type="radio" class="custom-control-input" name="is_active" value="1" id="customRadio3" checked="">

                                                            <label class="custom-control-label" for="customRadio3">Yes</label>

                                                        </div>

                                                    </fieldset>

                                                </li>

                                                <li class="d-inline-block mr-2">

                                                    <fieldset>

                                                        <div class="custom-control custom-radio">

                                                            <input type="radio" class="custom-control-input" name="is_active" value="0" id="customRadio4">

                                                            <label class="custom-control-label" for="customRadio4">No</label>

                                                        </div>

                                                    </fieldset>

                                                </li>

                                            </ul>

                                        </div>

                                    </div>

                                    <div class="col-md-6">

                                        <div class="form-group">

                                            <ul class="list-unstyled mb-0">

                                                <li class="d-inline-block mr-2">

                                                    <fieldset>

                                                        <label for="customRadio">Featured</label>

                                                        <div class="custom-control custom-radio">

                                                            <input type="radio" class="custom-control-input" name="is_featured" value="1" id="customRadio6">

                                                            <label class="custom-control-label" for="customRadio6">Yes</label>

                                                        </div>

                                                    </fieldset>

                                                </li>

                                                <li class="d-inline-block mr-2">

                                                    <fieldset>

                                                        <div class="custom-control custom-radio">

                                                            <input type="radio" class="custom-control-input" name="is_featured" value="0" id="customRadio7" checked="">

                                                            <label class="custom-control-label" for="customRadio7">No</label>

                                                        </div>

                                                    </fieldset>

                                                </li>

                                            </ul>

                                        </div>

                                    </div>

                                </div>





                                <div class="form-group">

                                    <label>Sort</label>

                                    <input class="form-control" name="sort" value="1" required="">

                                </div>


                                <div class="btn-group m-t-10">
                                    <input type="hidden" name="page_parent" value="<?php echo $page_parent;?>">
                                    <button class="btn btn-admin-defalt" type="submit">Add New Category</button>
                                </div>

                            </form>

                        </div>
                        <div class="col-xl-8 col-lg-7">

                            <div class="card">
                                <div class="table-responsive">
                                    <div class="table-responsive">
                                        <table id="datatable" class="display responsive nowrap align-middle text-truncate mb-0 table table-bordered table-hover table-striped" style="width:100%;">
                                            <thead>
                                            <tr>
                                                <th class="all" width="50"># ID</th>
                                                <th class="all">Title</th>
                                                <th>Parent</th>
                                                <th width="50">Featured</th>
                                                <th width="50">Publish</th>
                                                <th width="50">Sort</th>
                                                <th width="100">Last Updated</th>
                                                <th width="100">Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                            if(isset($productscategories)){
                                                foreach($productscategories as $productscategory){
                                                    ?>
                                                    <tr>
                                                        <td>

<!--                                                            <div class="checkbox-container"><label class="checkbox-label"><input type="checkbox" form="myform" name="check[]" id="--><?php //echo $productscategory->id;?><!--" value="--><?php //echo $productscategory->id;?><!--"><span class="checkbox-custom rectangular"></span></label></div>-->
                                                            <?php echo $productscategory->id;?>
                                                        </td>
                                                        <td>
                                                            <?php if(checkParentif("products_categories",$productscategory->id)==1){?>
                                                                <a class="nlink" href="<?php echo base_url().ADMIN_FOLDER.'/products/categories/'.$productscategory->id;?>"><?php echo $productscategory->title;?></a>
                                                            <? }else{?>
                                                                <?php echo $productscategory->title;?>
                                                            <? }?>
                                                        </td>
                                                        <td>
                                                            <?php echo getParentwithlink("products_categories","/products/categories/",$productscategory->id);?>
                                                        </td>
                                                        <td><?php if($productscategory->is_featured==1){?><label class="badge badge-success">Yes</label><? }else{?><label class="badge badge-danger">No</label><? }?></td>
                                                        <td><?php if($productscategory->is_active==1){?><label class="badge badge-success">Yes</label><? }else{?><label class="badge badge-danger">No</label><? }?></td>
                                                        <td><input type="number" name="<?php echo $productscategory->id;?>"  form="myform" value="<?php echo $productscategory->sort;?>" style="max-width:50px;"></td>
                                                        <td><?php echo timesincenew($productscategory->created)." ago";?></td>
                                                        <td>
                                                            <a title="Copy" class="btn btn-success" href="<?php echo base_url().ADMIN_FOLDER.'/products/categories/copy-data/'.$productscategory->id;?>"><i class="fa fa-copy f-16"></i></a>
                                                            <a title="Edit" class="btn btn-info" href="<?php echo base_url().ADMIN_FOLDER.'/products/categories/edit/'.$productscategory->id;?>"><i class="fa fa-pencil-square-o f-16"></i></a>
                                                            <a title="Delete" class="btn btn-danger" href="<?php echo base_url().ADMIN_FOLDER.'/products/categories/delete/'.$productscategory->id;?>" onclick="return confirm('Are you sure you want to delete this record?');"><i class="fa fa-trash f-16"></i></a>

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
                                        echo form_open(ADMIN_FOLDER.'/products/categories/multi-data',$attributes2);
                                        ?>
                                        <button type="submit" name="multi_sort" value="1" class="btn btn-success" style="color:#fff;font-size: 13px;padding: 5px 10px;">Sort Selected</button>
                                        <button type="submit" name="multi_del" value="1" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete selected records?');" style="color:#fff;font-size: 13px;padding: 5px 10px;">Delete Selected</button>
                                        </form>
                                    </div>
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