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
            <!-- Line Chart -->
            <div class="col-lg-12 col-md-12 flex-lg-last flex-md-first align-self-baseline">
              <div class="card sales-report mt-10px">
                <h2 class="display h4">Add More View</h2>
                <p>Add More View by Entring required detail.</p>
                <?php
                $attributes = array('class' => 'form-material card-block');
                echo form_open_multipart(ADMIN_FOLDER.'/moreviews/add_submit',$attributes);
                ?>
                    <div class="form-row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>More view Title</label>
                                <input type="text" name="title" class="form-control" required="">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>More View Image</label>
                                <div class="custom-file">
                                    <input type="file" name="image" id="file">
                                    <label for="file">Choose files To Upload</label>
                                </div>
                               
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="btn-group mt-30px col">
                            <div class="col-md-2">
                            <input type="hidden" name="product_id" value="<?php echo $product_id;?>">
                            <a href="<?php echo base_url(ADMIN_FOLDER."/moreviews/".$product_id);?>" class="btn btn-all">Cancel</a>
                            <button type="submit" class="btn btn-all bg-green float-right">Submit</button>
                        </div>
                        </div>
                    </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- Updates Section -->
      <?php $this->load->view(ADMIN_VIEW_FOLDER."/includes/footer");?>
    </div>
    <!-- JavaScript files-->
    <?php $this->load->view(ADMIN_VIEW_FOLDER."/includes/scripts");?>
  </body>
</html>