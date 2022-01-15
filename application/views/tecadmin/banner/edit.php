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
            <div class="col-12 m-b-20 m-t-20"><h4 class="tite-admin"><?php echo $page_heading;?></h4></div>

          <div class="row d-flex align-items-md-stretch">
            <!-- Line Chart -->
            <div class="col-lg-12 col-md-12 flex-lg-last flex-md-first align-self-baseline">
              <div class="card sales-report mt-10px">
                <?php
                $attributes = array('class' => 'form-material card-block');
                echo form_open_multipart(ADMIN_FOLDER.'/banner/update',$attributes);
                ?>
                    <div class="form-row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Banner Title</label>
                                <input type="text" name="title" value="<?php echo $banner->title;?>" class="form-control" required="">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Select Category</label>
                                <?php echo $categories;?>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Short Detail</label>
                                <textarea class="form-control" name="short_detail" rows="3"><?php echo $banner->short_detail;?></textarea>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Banner Content</label>
                                <textarea class="form-control editor" name="content" rows="3"><?php echo $banner->content;?></textarea>
                            </div>
                        </div>
                        <div class="col-md-12 m-t-10">
                            <div class="form-group">
                                <label>Banner Image</label>
                                <div class="custom-file">
                                    <input type="file" name="banner" id="customFile">
                                    <label for="customFile">Choose files To Upload</label>

                                    <?php if($banner->banner != ""){?>
                                    <img src="<?php echo base_url()."uploads/banner/".$banner->banner;?>" style="max-height: 80px; margin-bottom: 15px;">
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
                        <div class="col-md-4 m-t-10">
                            <div class="form-group">
                                <label>Banner Option Image 1 (Optional)</label>
                                <div class="custom-file">
                                    <input type="file" name="option1"  id="customoption1">
                                    <label for="customoption1">Choose files To Upload</label>
                                    <?php if($banner->option1 != ""){?>
                                    <img src="<?php echo base_url()."uploads/banner/".$banner->option1;?>" style="max-height: 80px; margin-bottom: 15px;">
                                    <div class="checkbox-container">
                                        <label class="checkbox-label">
                                            <input type="checkbox" name="del_option1" value="1">
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
                                <label>Banner Option Image 2 (Optional)</label>
                                <div class="custom-file">
                                    <input type="file" name="option2" id="customoption2">
                                    <label for="customoption2">Choose files To Upload</label>
                                    <?php if($banner->option2 != ""){?>
                                    <img src="<?php echo base_url()."uploads/banner/".$banner->option2;?>" style="max-height: 80px; margin-bottom: 15px;">
                                    <div class="checkbox-container">
                                        <label class="checkbox-label">
                                            <input type="checkbox" name="del_option2" value="1">
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
                                <label>Banner Option Image 3 (Optional)</label>
                                <div class="custom-file">
                                    <input type="file" name="option3" id="customoption3">
                                    <label for="customoption3">Choose files To Upload</label>
                                    <?php if($banner->option3 != ""){?>
                                    <img src="<?php echo base_url()."uploads/banner/".$banner->option3;?>" style="max-height: 80px; margin-bottom: 15px;">
                                    <div class="checkbox-container">
                                        <label class="checkbox-label">
                                            <input type="checkbox" name="del_option3" value="1">
                                            <span class="checkbox-custom rectangular"></span>
                                        </label>
                                        Delete
                                    </div>
                                    <?php }?>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-4 m-t-20">
                            <div class="form-group">
                                <ul class="list-unstyled mb-0">
                                    <li class="d-inline-block mr-2">
                                    <fieldset>
                                        <label for="customRadio">Publish</label>
                                        <div class="custom-control custom-radio">
                                        <input type="radio" class="custom-control-input" name="is_active" value="1" id="customRadio3" <?php if($banner->is_active==1){?>checked="checked"<? }?>>
                                        <label class="custom-control-label" for="customRadio3">Yes</label>
                                        </div>
                                    </fieldset>
                                    </li>
                                    <li class="d-inline-block mr-2">
                                    <fieldset>
                                        <div class="custom-control custom-radio">
                                        <input type="radio" class="custom-control-input" name="is_active" value="0" id="customRadio4" <?php if($banner->is_active==0){?>checked="checked"<? }?>>
                                        <label class="custom-control-label" for="customRadio4">No</label>
                                        </div>
                                    </fieldset>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-4 m-t-20">
                            <div class="form-group">
                                <label for="customRadio">Banner Without Text?</label>
                                <ul class="list-unstyled mb-0">
                                    <li class="d-inline-block mr-2">
                                    <fieldset>
                                        <div class="custom-control custom-radio">
                                        <input type="radio" class="custom-control-input" name="is_single" value="1" id="customRadio5" <?php if($banner->is_single==1){?>checked="checked"<? }?>>
                                        <label class="custom-control-label" for="customRadio5">Yes</label>
                                        </div>
                                    </fieldset>
                                    </li>
                                    <li class="d-inline-block mr-2">
                                    <fieldset>
                                        <div class="custom-control custom-radio">
                                        <input type="radio" class="custom-control-input" name="is_single" value="0" id="customRadio6" <?php if($banner->is_single==0){?>checked="checked"<? }?>>
                                        <label class="custom-control-label" for="customRadio6">No</label>
                                        </div>
                                    </fieldset>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-4 m-t-20">
                            <div class="form-group">
                                <label>Sort</label>
                                <input class="form-control" name="sort" value="<?php echo $banner->sort;?>" required="">
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                  <input type="hidden" name="page_id" value="<?php echo $banner->id;?>">
                  <div class="row">
                      <div class="btn-group mt-30px col">
                          <div class="btn-group col-2 p-0">
                              <button type="submit" class="btn btn-admin-defalt bg-green float-right">Submit</button>
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