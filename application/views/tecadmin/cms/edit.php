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
                <h5 class="display h4">Edit Cms Page</h5>
                <p>Edit cms page by Entring required detail.</p>
                <?php
                $attributes = array('class' => 'form-material card-block');
                echo form_open_multipart(ADMIN_FOLDER.'/cms/update',$attributes);
                ?>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Page Title</label>
                                <input type="text" value="<?php echo $cms->title;?>" name="title" class="form-control" required="">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Helper Name (Optional)</label>
                                <input type="text" name="helper_name" value="<?php echo $cms->helper_name;?>" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Page Slug (Optional)</label>
                                <input type="text" name="slug" value="<?php echo $cms->slug;?>" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Select Parent</label>
                                <?php echo $categories;?>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Short Detail</label>
                                <textarea class="form-control" name="short_detail" rows="3"><?php echo $cms->short_detail;?></textarea>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Page Content</label>
                                <textarea class="form-control editor" name="content" rows="3"><?php echo $cms->content;?></textarea>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group tagsll">
                                <label>Page Tags</label>
                                <input class="form-control" <?php echo $cms->tags;?> name="tags" data-role="tagsinput">
                            </div>
                        </div>
                        <?php if($page_parent==75){?>
                        <div class="col-md-12 m-t-10">
                            <h6>Select Multiple Gallery Items</h6>
                            <p style="margin-bottom: 0;margin-top: 1rem;">Select for <code>Documentation</code></p>
                            <select name="documentation[]" class="js-selectbox form-control" multiple="multiple">
                                <?php
                                if(!empty($galleries)){
                                foreach($galleries as $gallery){
                                    $vals1 = getValuee("content","selected_gallery","parent_id",$cms->id,"type","docs");
                                    $sels1 = "";
                                    if($vals1 != ""){
                                        $vas1 = explode(",",$vals1);
                                        foreach($vas1 as $va1){
                                            if($va1==$gallery->id){
                                                $sels1 = "selected";
                                            }
                                        }
                                    }
                                ?>
                                <option <?php echo $sels1;?> value="<?php echo $gallery->id;?>"><?php echo $gallery->title;?></option>
                                <?php }}?>
                            </select>
                        
                            <p style="margin-bottom: 0;margin-top: 1rem;">Select for <code>Firmware Updates</code></p>
                            <select name="firmware[]" class="js-selectbox form-control" multiple="multiple">
                                <?php
                                if(!empty($galleries)){
                                foreach($galleries as $gallery){
                                    $vals2 = getValuee("content","selected_gallery","parent_id",$cms->id,"type","firmware");
                                    $sels2 = "";
                                    if($vals2 != ""){
                                        $vas2 = explode(",",$vals2);
                                        foreach($vas2 as $va2){
                                            if($va2==$gallery->id){
                                                $sels2 = "selected";
                                            }
                                        }
                                    }
                                ?>
                                <option <?php echo $sels2;?> value="<?php echo $gallery->id;?>"><?php echo $gallery->title;?></option>
                                <?php }}?>
                            </select>
                        
                            <p style="margin-bottom: 0;margin-top: 1rem;">Select for <code>Drivers</code></p>
                            <select name="drivers[]" class="js-selectbox form-control" multiple="multiple">
                                <?php
                                if(!empty($galleries)){
                                foreach($galleries as $gallery){
                                    $vals3 = getValuee("content","selected_gallery","parent_id",$cms->id,"type","drivers");
                                    $sels3 = "";
                                    if($vals3 != ""){
                                        $vas3 = explode(",",$vals3);
                                        foreach($vas3 as $va3){
                                            if($va3==$gallery->id){
                                                $sels3 = "selected";
                                            }
                                        }
                                    }
                                ?>
                                <option <?php echo $sels3;?> value="<?php echo $gallery->id;?>"><?php echo $gallery->title;?></option>
                                <?php } }?>
                            </select>
                        
                        
                            <p style="margin-bottom: 0;margin-top: 1rem;">Select for <code>Sample Application</code></p>
                            <select name="application[]" class="js-selectbox form-control" multiple="multiple">
                                <?php
                                if(!empty($galleries)){
                                foreach($galleries as $gallery){
                                    $vals4 = getValuee("content","selected_gallery","parent_id",$cms->id,"type","application");
                                    $sels4 = "";
                                    if($vals4 != ""){
                                        $vas4 = explode(",",$vals4);
                                        foreach($vas4 as $va4){
                                            if($va4==$gallery->id){
                                                $sels4 = "selected";
                                            }
                                        }
                                    }
                                ?>
                                <option <?php echo $sels4;?> value="<?php echo $gallery->id;?>"><?php echo $gallery->title;?></option>
                                <?php } }?>
                            </select>
                        </div>
                        <?php }?>
                        <?php if($page_parent==76){?>
                        <div class="col-md-12 m-b-30">
                            <h4 class="sub-title">Select Multiple Gallery Items</h4>
                            <p style="margin-bottom: 0;margin-top: 1rem;">Select for <code>Firmware Updates</code></p>
                            <select name="firmware[]" class="js-selectbox form-control" multiple="multiple">
                                <?php
                                if(!empty($galleries)){
                                foreach($galleries as $gallery){
                                    $vals2 = getValuee("content","selected_gallery","parent_id",$cms->id,"type","firmware");
                                    $sels2 = "";
                                    if($vals2 != ""){
                                        $vas2 = explode(",",$vals2);
                                        foreach($vas2 as $va2){
                                            if($va2==$gallery->id){
                                                $sels2 = "selected";
                                            }
                                        }
                                    }
                                ?>
                                <option <?php echo $sels2;?> value="<?php echo $gallery->id;?>"><?php echo $gallery->title;?></option>
                                <?php } }?>
                            </select>
                        </div>
                        <?php }?>
                        <div class="col-md-4 m-t-10">
                            <div class="form-group">
                                <label>Page Icon (Optional)</label>
                                <div class="custom-file">
                                    <div class="custom-file">
                                        <input type="file" id="file" name="icon">
                                        <label for="Choose files To Upload">Choose files To Upload</label>
                                    </div>

                                    <?php if($cms->icon != ""){?>
                                    <img src="<?php echo base_url()."uploads/pages/".$cms->icon;?>" style="max-height: 80px; margin-bottom: 15px;">
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
                                <label>Page Thumbnail (Optional)</label>
                                <div class="custom-file">
                                    <div class="custom-file">
                                        <input type="file" id="file" name="thumbnail">
                                        <label for="file">Upload/Add image</label>
                                    </div>
                                    <?php if($cms->thumbnail != ""){?>
                                    <img src="<?php echo base_url()."uploads/pages/".$cms->thumbnail;?>" style="max-height: 80px; margin-bottom: 15px;">
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
                                <label>Page Banner (Optional)</label>
                                <div class="custom-file">
                                    <div class="custom-file">
                                        <input type="file" id="file" name="banner">
                                        <label for="Choose files To Upload">Choose files To Upload</label>
                                    </div>
                                    <?php if($cms->banner != ""){?>
                                    <img src="<?php echo base_url()."uploads/pages/".$cms->banner;?>" style="max-height: 80px; margin-bottom: 15px;">
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
                                <input class="form-control" name="meta_title" value="<?php echo $cms->meta_title;?>">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Seo Description</label>
                                <textarea class="form-control" name="meta_desc" rows="3"><?php echo $cms->meta_desc;?></textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Seo Keyword</label>
                                <textarea class="form-control" name="meta_key" rows="3"><?php echo $cms->meta_key;?></textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <ul class="list-unstyled mb-0">
                                    <li class="d-inline-block mr-2">
                                    <fieldset>
                                        <label for="customRadio">Publish</label>
                                        <div class="custom-control custom-radio">
                                        <input type="radio" class="custom-control-input" name="is_active" value="1" id="customRadio3" <?php if($cms->is_active==1){ echo "checked"; } ?>>
                                        <label class="custom-control-label" for="customRadio3">Yes</label>
                                        </div>
                                    </fieldset>
                                    </li>
                                    <li class="d-inline-block mr-2">
                                    <fieldset>
                                        <div class="custom-control custom-radio">
                                        <input type="radio" class="custom-control-input" name="is_active" value="0" id="customRadio4" <?php if($cms->is_active==0){ echo "checked"; } ?>>
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
                                <input class="form-control" name="sort" value="<?php echo $cms->sort;?>" required="">
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="row">
                        <div class="col-md-2">
                        <div class="btn-group mt-30px col">
                            <input type="hidden" name="page_parent" value="<?php echo $page_parent;?>">
                            <input type="hidden" name="page_id" value="<?php echo $cms->id;?>">
                            <!-- <button type="button" class="btn btn-custopm">Cancel</button> -->
                            <a href="<?php echo base_url(ADMIN_FOLDER."/cms/".$page_parent);?>" class="btn btn-all m-r-10">Cancel</a>
                            <button type="submit" class="btn btn-all bg-green float-right">Submit</button>
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