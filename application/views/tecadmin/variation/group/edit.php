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
                <h5 class="display h4">Edit Variation Group</h5>
                <p>Edit Group by Entring required detail.</p>
                <?php
                $attributes = array('class' => 'form-material card-block');
                echo form_open_multipart(ADMIN_FOLDER.'/variation/group/update',$attributes);
                ?>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Group Title</label>
                                <input type="text" name="title" value="<?php echo $variationgroup->title;?>" class="form-control" required="">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Helper Name (Optional)</label>
                                <input type="text" name="helper_name" value="<?php echo $variationgroup->helper_name;?>" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Variation Type</label>
                                <select name="type" class="form-control">
                                    <option <?php if($variationgroup->type=="select"){?>selected<? }?> value="select">Select Box</option>
                                    <option <?php if($variationgroup->type=="check"){?>selected<? }?> value="check">Check Box</option>
                                    <option <?php if($variationgroup->type=="radio"){?>selected<? }?> value="radio">Radio Box</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Required?</label>
                                <select name="is_required" class="form-control">
                                    <option <?php if($variationgroup->is_required==0){?>selected<? }?> value="0">No</option>
                                    <option <?php if($variationgroup->is_required==1){?>selected<? }?> value="1">Yes</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Price Affect?</label>
                                <select name="affect_price" class="form-control">
                                    <option <?php if($variationgroup->affect_price==0){?>selected<? }?> value="0">No</option>
                                    <option <?php if($variationgroup->affect_price==1){?>selected<? }?> value="1">Yes</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>is Color?</label>
                                <select name="is_color" class="form-control">
                                    <option <?php if($variationgroup->is_color==0){?>selected<? }?> value="0">No</option>
                                    <option <?php if($variationgroup->is_color==1){?>selected<? }?> value="1">Yes</option>
                                </select>
                            </div>
                        </div>
                        
                        <div class="col-md-2">
                            <div class="form-group">
                                <ul class="list-unstyled mb-0">
                                    <li class="d-inline-block mr-2">
                                    <fieldset>
                                        <label for="customRadio">Publish</label>
                                        <div class="custom-control custom-radio">
                                        <input type="radio" class="custom-control-input" name="is_active" value="1" id="customRadio3" <?php if($variationgroup->is_active==1){?>checked="checked"<? }?>>
                                        <label class="custom-control-label" for="customRadio3">Yes</label>
                                        </div>
                                    </fieldset>
                                    </li>
                                    <li class="d-inline-block mr-2">
                                    <fieldset>
                                        <div class="custom-control custom-radio">
                                        <input type="radio" class="custom-control-input" name="is_active" value="0" id="customRadio4" <?php if($variationgroup->is_active==0){?>checked="checked"<? }?>>
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
                                <input class="form-control" name="sort" value="<?php echo $variationgroup->sort;?>" required="">
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="row">
                        <div class="col-md-2 col-sm-2 col-xs-12">
                        <div class="btn-group mt-30px col">
                            <input type="hidden" name="page_id" value="<?php echo $variationgroup->id;?>">
                            <a href="<?php echo base_url(ADMIN_FOLDER."/variation/group/");?>" class="btn btn-all m-r-10">Cancel</a>
                            <button type="submit" class="btn btn-all float-right">Submit</button>
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