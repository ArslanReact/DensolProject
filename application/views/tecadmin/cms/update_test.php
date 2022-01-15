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
                <?php
                $attributes = array('class' => 'form-material card-block');
                echo form_open_multipart(ADMIN_FOLDER.'/testi/test_update_db',$attributes);
                ?>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Image</label>
                                <input type="hidden" name="id" value="<?php echo $result[0]['id'];?>" >
                                <input type="file" style="width: 100%;height: calc(1.5em + .75rem + 2px); " name="image" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" name="title" value="<?php echo $result[0]['title'];?>" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Position</label>
                                <input type="text" name="position" value="<?php echo $result[0]['position'];?>" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Clinic Name</label>
                                <input type="text" name="clinicname" value="<?php echo $result[0]['clinicname'];?>" class="form-control">
                            </div>
                        </div>                        
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Content</label>
                                <textarea class="form-control" name="content" rows="3"><?php echo $result[0]['content'];?></textarea>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Is Publish</label>
                                <input type="radio" name="isactive" value="1" <?php if($result[0]['is_active'] == '1'){ echo "checked"; } ?>>Yes
                                <input type="radio" name="isactive" value="0" <?php if($result[0]['is_active'] == '0'){ echo "checked"; } ?>>No
                            </div>
                        </div>                        
                    </div>
                    <div class="row">
                        <div class="col-md-2">
                        <div class="btn-group mt-30px col">
                            <input type="hidden" name="page_parent" value="<?php echo $page_parent;?>">
                            <input type="hidden" name="page_id" value="<?php echo $cms->id;?>">
                            <!-- <button type="button" class="btn btn-custopm">Cancel</button> -->
                            <a href="<?php echo base_url(ADMIN_FOLDER."/cms/".$page_parent);?>" class="btn btn-all m-r-10">Cancel</a>
                            <button type="submit" class="btn btn-all bg-green float-right">Update</button>
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