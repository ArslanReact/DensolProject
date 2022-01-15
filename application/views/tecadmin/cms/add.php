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
                <h5 class="display h4">Create New Cms Page</h5>
                <p>Add new cms page by Entring required detail.</p>
                <?php
                $attributes = array('class' => 'form-material card-block');
                echo form_open_multipart(ADMIN_FOLDER.'/cms/add_submit',$attributes);
                ?>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Page Title</label>
                                <input type="text" name="title" class="form-control" required="">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Helper Name (Optional)</label>
                                <input type="text" name="helper_name" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Page Slug (Optional)</label>
                                <input type="text" name="slug" class="form-control">
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
                                <textarea class="form-control" name="short_detail" rows="3"></textarea>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Page Content</label>
                                <textarea class="form-control editor" name="content" rows="3"></textarea>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group tagsll">
                                <label>Page Tags</label>
                                <input class="form-control" name="tags" data-role="tagsinput">
                            </div>
                        </div>
                        <?php if($page_parent==75){?>
                        <div class="col-md-12 m-t-10">
                            <h6>Select Multiple Gallery Items</h6>
                            <p style="margin-bottom: 0;margin-top: 1rem;">Select for <code>Documentation</code></p>
                            <select name="documentation[]" class="form-control js-selectbox" multiple="multiple">
                                <?php
                                if(!empty($galleries)){
                                foreach($galleries as $gallery){
                                ?>
                                <option value="<?php echo $gallery->id;?>"><?php echo $gallery->title;?></option>
                                <?php }}?>
                            </select>
                        
                            <p style="margin-bottom: 0;margin-top: 1rem;">Select for <code>Firmware Updates</code></p>
                            <select name="firmware[]" class="js-selectbox form-control" multiple="multiple">
                                <?php
                                if(!empty($galleries)){
                                foreach($galleries as $gallery){
                                ?>
                                <option value="<?php echo $gallery->id;?>"><?php echo $gallery->title;?></option>
                                <?php }}?>
                            </select>
                        
                            <p style="margin-bottom: 0;margin-top: 1rem;">Select for <code>Drivers</code></p>
                            <select name="drivers[]" class="js-selectbox form-control" multiple="multiple">
                                <?php
                                if(!empty($galleries)){
                                foreach($galleries as $gallery){
                                ?>
                                <option value="<?php echo $gallery->id;?>"><?php echo $gallery->title;?></option>
                                <?php }}?>
                            </select>
                            <p style="margin-bottom: 0;margin-top: 1rem;">Select for <code>Sample Application</code></p>
                            <select name="application[]" class="js-selectbox form-control" multiple="multiple">
                                <?php
                                if(!empty($galleries)){
                                foreach($galleries as $gallery){
                                ?>
                                <option value="<?php echo $gallery->id;?>"><?php echo $gallery->title;?></option>
                                <?php }}?>
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
                                ?>
                                <option value="<?php echo $gallery->id;?>"><?php echo $gallery->title;?></option>
                                <?php }}?>
                            </select>
                        </div>
                        <?php }?>
                        <div class="col-md-4 m-t-10">
                            <div class="form-group">
                                <label>Page Icon (Optional)</label>
                                <div class="custom-file">
                                    <input type="file" id="file" name="icon">
                                    <label for="file">Choose files To Upload</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 m-t-10">
                            <div class="form-group">
                                <label>Page Thumbnail (Optional)</label>
                                <div class="custom-file">
                                    <input type="file" id="file2" name="thumbnail">
                                    <label for="file2">Choose files To Upload</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 m-t-10">
                            <div class="form-group">
                                <label>Page Banner (Optional)</label>
                                <div class="custom-file">
                                    <input type="file" id="file3" name="banner">
                                    <label for="file3">Choose files To Upload</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 m-t-10">
                            <h6>SEO Information</h6>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Seo Title</label>
                                <input class="form-control" name="meta_title">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Seo Description</label>
                                <textarea class="form-control" name="meta_desc" rows="3"></textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Seo Keyword</label>
                                <textarea class="form-control" name="meta_key" rows="3"></textarea>
                            </div>
                        </div>
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
                                <label>Sort</label>
                                <input class="form-control" name="sort" value="1" required="">
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="row">
                        <div class="col-md-2">
                        <div class="btn-group mt-30px col">
                            <input type="hidden" name="page_parent" value="<?php echo $page_parent;?>">
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