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
                <h2 class="display h4">Edit Gallery Category</h2>
                <p>Edit Gallery Category by Entring required detail.</p>
                <?php
                $attributes = array('class' => 'form-material card-block');
                echo form_open_multipart(ADMIN_FOLDER.'/gallery/categories/update',$attributes);
                ?>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Category Title</label>
                                <input type="text" name="title" value="<?php echo $gallerycategory->title;?>" class="form-control" required="">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Category Slug (Optional)</label>
                                <input type="text" name="slug" value="<?php echo $gallerycategory->slug;?>" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Select Parent</label>
                                <div class="menubuilder">
                                    <?php echo $gallerycategoriescategories;?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Category Content</label>
                                <textarea class="form-control editor" name="content" rows="3"><?php echo $gallerycategory->content;?></textarea>
                            </div>
                        </div>
                        <div class="col-md-4 m-t-10">
                            <div class="form-group">
                                <label>Category Icon (Optional)</label>
                                <div class="col-auto">
                                    <input type="file" name="icon" id="customFile">
                                    <label for="customFile">Upload/Add image</label>
                                    <?php if($gallerycategory->icon != ""){?>
                                    <img src="<?php echo base_url()."uploads/gallery/categories/".$gallerycategory->icon;?>" style="max-height: 80px; margin-bottom: 15px;">
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
                                        <input type="file" name="thumbnail" id="customFile2">
                                        <label for="customFile2">Upload/Add image</label>
                                    <?php if($gallerycategory->thumbnail != ""){?>
                                    <img src="<?php echo base_url()."uploads/gallery/categories/".$gallerycategory->thumbnail;?>" style="max-height: 80px; margin-bottom: 15px;">
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
                                    <input type="file" name="banner" id="customFile3">
                                    <label for="customFile3">Upload/Add image</label>
                                    <?php if($gallerycategory->banner != ""){?>
                                    <img src="<?php echo base_url()."uploads/gallery/categories/".$gallerycategory->banner;?>" style="max-height: 80px; margin-bottom: 15px;">
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
                                <input class="form-control" name="meta_title" value="<?php echo $gallerycategory->meta_title;?>">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Seo Description</label>
                                <textarea class="form-control" name="meta_desc" rows="3"><?php echo $gallerycategory->meta_desc;?></textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Seo Keyword</label>
                                <textarea class="form-control" name="meta_key" rows="3"><?php echo $gallerycategory->meta_key;?></textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <ul class="list-unstyled mb-0">
                                    <li class="d-inline-block mr-2">
                                    <fieldset>
                                        <label for="customRadio">Publish</label>
                                        <div class="custom-control custom-radio">
                                        <input type="radio" class="custom-control-input" name="is_active" value="1" id="customRadio3" <?php if($gallerycategory->is_active==1){?>checked="checked"<? }?>>
                                        <label class="custom-control-label" for="customRadio3">Yes</label>
                                        </div>
                                    </fieldset>
                                    </li>
                                    <li class="d-inline-block mr-2">
                                    <fieldset>
                                        <div class="custom-control custom-radio">
                                        <input type="radio" class="custom-control-input" name="is_active" value="0" id="customRadio4" <?php if($gallerycategory->is_active==0){?>checked="checked"<? }?>>
                                        <label class="custom-control-label" for="customRadio4">No</label>
                                        </div>
                                    </fieldset>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Sort</label>
                                <input class="form-control" name="sort" value="<?php echo $gallerycategory->sort;?>" required="">
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="row">
                        <div class="btn-group mt-30px col">
                            <div class="col-md-2">
                            <input type="hidden" name="page_parent" value="<?php echo $page_parent;?>">
                            <input type="hidden" name="page_id" value="<?php echo $gallerycategory->id;?>">
                            <a href="<?php echo base_url(ADMIN_FOLDER."/gallery/categories/".$page_parent);?>" class="btn btn-all">Cancel</a>
                            <button type="submit" class="btn btn-all">Submit</button>
                            </div>
                        </div>
                    </div>
                </form>
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