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

                <div class="col-xl-12">
                    <div class="row m-b-20">



                <?php

                $attributes = array('class' => 'form-material card-block');

                echo form_open_multipart(ADMIN_FOLDER.'/products/categories/update',$attributes);

                ?>

                    <div class="form-row">

                        <div class="col-md-6">

                            <div class="form-group">

                                <label>Category Title</label>

                                <input type="text" name="title" value="<?php echo $productscategory->title;?>" class="form-control" required="">

                            </div>

                        </div>

                        <div class="col-md-6">

                            <div class="form-group">

                                <label>Category Slug (Optional)</label>

                                <input type="text" name="slug" value="<?php echo $productscategory->slug;?>" class="form-control">

                            </div>

                        </div>

                        <div class="col-md-12">

                            <div class="form-group">

                                <label>Select Parent</label>

                                <?php echo $productscategoriescategories;?>

                            </div>

                        </div>

                        <div class="col-md-12">

                            <div class="form-group">

                                <label>Category Short Detail</label>

                                <textarea class="form-control" name="short_detail" rows="4"><?php echo $productscategory->short_detail;?></textarea>

                            </div>

                        </div>
                        <div class="col-md-12">

                            <div class="form-group">

                                <label>Category Content</label>

                                <textarea class="form-control editor" name="content" rows="3"><?php echo $productscategory->content;?></textarea>

                            </div>

                        </div>

                        <div class="col-md-4 m-t-10">

                            <div class="form-group">

                                <label>Category Icon (Optional)</label>

                                <div class="custom-file">

                                    <input type="file" name="icon" id="icon">

                                    <label  for="icon">Choose files To Upload</label>

                                    <?php if($productscategory->icon != ""){?>

                                    <img src="<?php echo base_url()."uploads/products/categories/".$productscategory->icon;?>" style="max-height: 80px; margin-bottom: 15px;">

                                    <div class="checkbox-container">

                                        <label class="checkbox-label">

                                            <input type="checkbox" name="del_icon" value="1">

                                            <span class="checkbox-custom rectangular"></span>

                                        </label>

                                        Delete

                                    </div>

                                    <?php }?>

                                </div>

                            </div>

                        </div>

                        <div class="col-md-4 m-t-10">

                            <div class="form-group">

                                <label>Category Thumbnail (Optional)</label>

                                <div class="custom-file">

                                    <input type="file" name="thumbnail" id="customFile">

                                    <label  for="customFile">Choose files To Upload</label>

                                    <?php if($productscategory->thumbnail != ""){?>

                                    <img src="<?php echo base_url()."uploads/products/categories/".$productscategory->thumbnail;?>" style="max-height: 80px; margin-bottom: 15px;">

                                    <div class="checkbox-container">

                                        <label class="checkbox-label">

                                            <input type="checkbox" name="del_thumbnail" value="1">

                                            <span class="checkbox-custom rectangular"></span>

                                        </label>

                                        Delete

                                    </div>

                                    <?php }?>

                                </div>

                            </div>

                        </div>

                        <div class="col-md-4 m-t-10">

                            <div class="form-group">

                                <label>Category Banner (Optional)</label>

                                <div class="custom-file">

                                    <input type="file" name="banner" id="banner">

                                    <label for="banner">Choose files To Upload</label>

                                    <?php if($productscategory->banner != ""){?>

                                    <img src="<?php echo base_url()."uploads/products/categories/".$productscategory->banner;?>" style="max-height: 80px; margin-bottom: 15px;">

                                    <div class="checkbox-container">

                                        <label class="checkbox-label">

                                            <input type="checkbox" name="del_banner" value="1">

                                            <span class="checkbox-custom rectangular"></span>

                                        </label>

                                        Delete

                                    </div>

                                    <?php }?>

                                </div>

                            </div>

                        </div>

                        <div class="col-md-12 m-t-10">

                            <h6>SEO Information</h6>

                        </div>

                        <div class="col-md-12">

                            <div class="form-group">

                                <label>Seo Title</label>

                                <input class="form-control" name="meta_title" value="<?php echo $productscategory->meta_title;?>">

                            </div>

                        </div>

                        <div class="col-md-6">

                            <div class="form-group">

                                <label>Seo Description</label>

                                <textarea class="form-control" name="meta_desc" rows="3"><?php echo $productscategory->meta_desc;?></textarea>

                            </div>

                        </div>

                        <div class="col-md-6">

                            <div class="form-group">

                                <label>Seo Keyword</label>

                                <textarea class="form-control" name="meta_key" rows="3"><?php echo $productscategory->meta_key;?></textarea>

                            </div>

                        </div>

                        <div class="col-md-6">

                            <div class="row">

                                <div class="col-md-6">

                                    <div class="form-group">

                                        <ul class="list-unstyled mb-0">

                                            <li class="d-inline-block mr-2">

                                            <fieldset>

                                                <label for="customRadio">Publish</label>

                                                <div class="custom-control custom-radio">

                                                <input type="radio" class="custom-control-input" name="is_active" value="1" id="customRadio3" <?php if($productscategory->is_active==1){?>checked="checked"<? }?>>

                                                <label class="custom-control-label" for="customRadio3">Yes</label>

                                                </div>

                                            </fieldset>

                                            </li>

                                            <li class="d-inline-block mr-2">

                                            <fieldset>

                                                <div class="custom-control custom-radio">

                                                <input type="radio" class="custom-control-input" name="is_active" value="0" id="customRadio4" <?php if($productscategory->is_active==0){?>checked="checked"<? }?>>

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

                                                <input type="radio" class="custom-control-input" name="is_featured" value="1" id="customRadio6" <?php if($productscategory->is_featured==1){?>checked="checked"<? }?>>

                                                <label class="custom-control-label" for="customRadio6">Yes</label>

                                                </div>

                                            </fieldset>

                                            </li>

                                            <li class="d-inline-block mr-2">

                                            <fieldset>

                                                <div class="custom-control custom-radio">

                                                <input type="radio" class="custom-control-input" name="is_featured" value="0" id="customRadio7" <?php if($productscategory->is_featured==0){?>checked="checked"<? }?>>

                                                <label class="custom-control-label" for="customRadio7">No</label>

                                                </div>

                                            </fieldset>

                                            </li>

                                        </ul>

                                    </div>

                                </div>

                            </div>

                        </div>

                        <div class="col-md-6">

                            <div class="form-group">

                                <label>Sort</label>

                                <input class="form-control" name="sort" value="<?php echo $productscategory->sort;?>" required="">

                            </div>

                        </div>

                        <div class="clearfix"></div>

                    </div>

                    <div class="row">

                        <div class="btn-group mt-30px col">

                            <input type="hidden" name="page_parent" value="<?php echo $page_parent;?>">

                            <input type="hidden" name="page_id" value="<?php echo $productscategory->id;?>">

                            <a href="<?php echo base_url(ADMIN_FOLDER."/products/categories/".$page_parent);?>" class="btn btn-custopm">Cancel</a>

                            <button type="submit" class="btn btn-custopm bg-green float-right">Submit</button>

                        </div>

                    </div>

                </form>

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