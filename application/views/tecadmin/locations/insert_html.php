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
  <div>
    <!-- Side Navbar -->
    <?php $this->load->view(ADMIN_VIEW_FOLDER."/includes/leftbar");?>
      <div class="col-xl-10 col-lg-9">
          <!-- dashboard content -->
          <div class="content-page-admin">
      <!-- navbar-->
      <?php $this->load->view(ADMIN_VIEW_FOLDER."/includes/header");?>
      <!-- Header Section-->
              <div class="col-12 m-b-20 m-t-20"><h4 class="tite-admin">Insert Your Template</h4></div>

          <div class="row d-flex align-items-md-stretch">
            <!-- Line Chart -->
            <div class="col-lg-12 col-md-12 flex-lg-last flex-md-first align-self-baseline">
              <div class="card sales-report mt-10px">
                  <div class="align-items-center">
                      <div class="btn-group m-b-10">
                          <a class="btn btn-all text-white" href="<?php echo base_url().ADMIN_FOLDER; ?>/email_list">Go back</a>
                      </div>
                  </div>
                
                <div class="table-responsive dt-responsive">
                <?php echo form_open(current_url());?>
                <?php
if($this->session->flashdata('error') !== ""){
    $error = $this->session->flashdata('error');
}else{
    $error = array();
}
?>
                        
                        <div class="col-md-12">
            <?php if($this->session->flashdata('error') != ""){echo '<h3 style="font-size:15px; color: '.$error_color.';margin-bottom:15px;">Error: please fix below errors</h3>';} ?>
            <?php if($this->session->flashdata('success') != ""){echo '<h3 style="font-size:15px; color: #00bd09;margin-bottom:15px;">Success: Form Submit Successfully.</h3>';} ?>
        </div>
                <textarea name="email_template" class="form-control" rows="15"><?=$test[0]['email_template'];?></textarea>
                <input type="submit" class="btn btn-all m-t-20">
                <?php echo form_close();?>

                </div>
              </div>
            </div>
          </div>

      <!-- Updates Section -->
      <?php $this->load->view(ADMIN_VIEW_FOLDER."/includes/footer");?>
    </div>
  </div>
    <!-- JavaScript files-->
    <script src="<?=base_url();?>files/backend/js/jquery-3.4.1.min.js"></script>
    <script src="<?=base_url();?>files/backend/js/admin_global.js"></script>
    <?php $this->load->view(ADMIN_VIEW_FOLDER."/includes/scripts");?>
  </body>
</html>