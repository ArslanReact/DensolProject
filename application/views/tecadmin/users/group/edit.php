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
            <div class="col-12 m-b-20 m-t-20 d-flex align-items-center">
                <h4 class="tite-admin"><?=$page_heading;?></h4>
            </div>
            <div class="row m-b-20">
                <div class="col-xl-12 m-t-10">
                    <div class="card p-2">
                <h4 class="display h4">Edit User</h4>
                <p>Edit user by Entring required detail.</p>
                <?php
                $attributes = array('class' => 'form-material card-block');
                echo form_open_multipart(ADMIN_FOLDER.'/users-group/update',$attributes);
                ?>
                    <div class="form-row">
                        <div class="col-md-8">
                            <div class="form-group">
                                <label>Group Name</label>
                                <input type="text" name="title" value="<?php echo $usergroups->title;?>" class="form-control" required="">
                            </div>
                        </div>
                        <!-- <div class="col-md-3">
                            <div class="form-group">
                                <label>Discount Type</label>
                                <select name="discount_type" id="" class="form-control js-selectbox">
                                    <option value="n" <?php //if($usergroups->discount_type=="n"){echo "selected";}?>>None</option>
                                    <option value="f" <?php //if($usergroups->discount_type=="f"){echo "selected";}?>>Flat Rate</option>
                                    <option value="p" <?php //if($usergroups->discount_type=="p"){echo "selected";}?>>% Percentage</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Discount</label>
                                <input type="text" name="discount" class="form-control" required="" value="<?php //echo $usergroups->discount;?>">
                            </div>
                        </div> -->
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Active</label>
                                <select name="is_active" id="" class="form-control js-selectbox">
                                    <option value="1" <?php if($usergroups->is_active==1){echo "selected";}?>>Yes</option>
                                    <option value="0" <?php if($usergroups->is_active==0){echo "selected";}?>>No</option>
                                </select>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="row">
                        <div class="btn-group mt-30px col">
                            <div class="col-md-2">
                            <input type="hidden" name="page_id" value="<?php echo $usergroups->id;?>">
                            <a href="<?php echo base_url(ADMIN_FOLDER."/users-group/");?>" class="btn btn-all">Cancel</a>
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