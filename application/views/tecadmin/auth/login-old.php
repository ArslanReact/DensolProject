<!DOCTYPE html>
<html lang="en">

<head>
    <title><?php echo site_settings()->company_name." Admin Panel";?></title>
    <!-- HTML5 Shim and Respond.js IE10 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 10]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!-- Meta -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <!-- Favicon icon -->

    <link rel="icon" href="<?php echo base_url();?>files/assets/images/favicon.ico" type="image/x-icon">
    <link rel="shortcut icon" id="favicon" href="<?php echo base_url(); ?>files/assets/images/favicon.png">
    <!-- Google font-->     
    <!-- <link href="https://fonts.googleapis.com/css?family=Roboto:400,500" rel="stylesheet"> -->
    <!-- Required Fremwork -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>files/bower_components/bootstrap/css/bootstrap.min.css">
    <!-- waves.css -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>files/assets/pages/waves/css/waves.min.css" type="text/css" media="all">
    <!-- themify-icons line icon -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>files/assets/icon/themify-icons/themify-icons.css">
    <!-- ico font -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>files/assets/icon/icofont/css/icofont.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>files/assets/icon/font-awesome/css/font-awesome.min.css">
    <!-- Notification.css -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>files/assets/pages/notification/notification.css">
    <!-- Animate.css -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>files/bower_components/animate.css/css/animate.css">
    <!-- Style.css -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>files/assets/css/style.css">
  </head>

  <body themebg-pattern="theme1">
  <!-- Pre-loader start -->
  <div class="theme-loader">
      <div class="loader-track">
          <div class="preloader-wrapper">
              <div class="spinner-layer spinner-blue">
                  <div class="circle-clipper left">
                      <div class="circle"></div>
                  </div>
                  <div class="gap-patch">
                      <div class="circle"></div>
                  </div>
                  <div class="circle-clipper right">
                      <div class="circle"></div>
                  </div>
              </div>
              <div class="spinner-layer spinner-red">
                  <div class="circle-clipper left">
                      <div class="circle"></div>
                  </div>
                  <div class="gap-patch">
                      <div class="circle"></div>
                  </div>
                  <div class="circle-clipper right">
                      <div class="circle"></div>
                  </div>
              </div>
            
              <div class="spinner-layer spinner-yellow">
                  <div class="circle-clipper left">
                      <div class="circle"></div>
                  </div>
                  <div class="gap-patch">
                      <div class="circle"></div>
                  </div>
                  <div class="circle-clipper right">
                      <div class="circle"></div>
                  </div>
              </div>
            
              <div class="spinner-layer spinner-green">
                  <div class="circle-clipper left">
                      <div class="circle"></div>
                  </div>
                  <div class="gap-patch">
                      <div class="circle"></div>
                  </div>
                  <div class="circle-clipper right">
                      <div class="circle"></div>
                  </div>
              </div>
          </div>
      </div>
  </div>
  <!-- Pre-loader end -->

    <section class="login-block">
        <!-- Container-fluid starts -->
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <!-- Authentication card start -->
                        <?php
                        $attributes = array('class' => 'md-float-material form-material');
                        // <form class="md-float-material form-material">
                        if($attampt != false){
                        echo form_open('',$attributes);
                        }else{
                        echo form_open(ADMIN_FOLDER.'/submit_login',$attributes);
                        }
                        ?>
                            <div class="text-center">
                                <img src="<?php echo base_url(); ?>files/assets/images/login_logo.png" class="login-logoo" alt="logo">
                            </div>
                            <div class="auth-box card">
                                <div class="card-block">
                                    <div class="row m-b-20">
                                        <div class="col-md-12">
                                        <?php if($attampt != false){?>
                                            <h3 class="text-center" style="color:red;">Alert!</h3>
                                            <p class="text-muted text-center p-b-5">Too many login attamts.<br><span style="color:#d60909;">Your information stored for further investigation.</span><br>Please wait for <?php if($attampt > 1){ echo $attampt." minutes"; }else{echo $attampt." minute"; }?> for next login.</p>
                                        <?php }else{?>
                                            <h3 class="text-center">Sign In</h3>
                                        <?php }?>
                                        </div>
                                    </div>
                                    <?php if(!$attampt != false){?>
                                    <div class="form-group form-primary">
                                        <input type="text" name="username" class="form-control" required="" autocomplete="" autocorrect="off" browserautofilled="false">
                                        <span class="form-bar"></span>
                                        <label class="float-label">Username</label>
                                    </div>
                                    <div class="form-group form-primary">
                                        <input type="password" name="password" class="form-control" required="" autocomplete="" autocorrect="off" browserautofilled="false">
                                        <span class="form-bar"></span>
                                        <label class="float-label">Password</label>
                                    </div>
                                    <div class="row m-t-25 text-left">
                                        <div class="col-12">
                                            <div class="checkbox-fade fade-in-primary d-">
                                                <label>
                                                    <input type="checkbox" name="remember_me">
                                                    <span class="cr"><i class="cr-icon icofont icofont-ui-check txt-primary"></i></span>
                                                    <span class="text-inverse">Remember me</span>
                                                </label>
                                            </div>
                                            <div class="forgot-phone text-right f-right">
                                                <a href="<?php echo base_url(ADMIN_FOLDER."/forgot")?>" class="text-right f-w-600"> Forgot Password?</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row m-t-30">
                                        <div class="col-md-12">
                                            <button type="submit" class="btn btn-primary btn-md btn-block waves-effect waves-light text-center m-b-10">Sign in</button>
                                        </div>
                                    </div>
                                    <?php }?>
                                </div>
                            </div>
                        </form>
                        <!-- end of form -->
                </div>
                <!-- end of col-sm-12 -->
            </div>
            <!-- end of row -->
        </div>
        <!-- end of container-fluid -->
    </section>
    <!-- Warning Section Starts -->
    <!-- Older IE warning message -->
    <!--[if lt IE 10]>
<div class="ie-warning">
    <h1>Warning!!</h1>
    <p>You are using an outdated version of Internet Explorer, please upgrade <br/>to any of the following web browsers to access this website.</p>
    <div class="iew-container">
        <ul class="iew-download">
            <li>
                <a href="http://www.google.com/chrome/">
                    <img src="<?php echo base_url(); ?>files/assets/images/browser/chrome.png" alt="Chrome">
                    <div>Chrome</div>
                </a>
            </li>
            <li>
                <a href="https://www.mozilla.org/en-US/firefox/new/">
                    <img src="<?php echo base_url(); ?>files/assets/images/browser/firefox.png" alt="Firefox">
                    <div>Firefox</div>
                </a>
            </li>
            <li>
                <a href="http://www.opera.com">
                    <img src="<?php echo base_url(); ?>files/assets/images/browser/opera.png" alt="Opera">
                    <div>Opera</div>
                </a>
            </li>
            <li>
                <a href="https://www.apple.com/safari/">
                    <img src="<?php echo base_url(); ?>files/assets/images/browser/safari.png" alt="Safari">
                    <div>Safari</div>
                </a>
            </li>
            <li>
                <a href="http://windows.microsoft.com/en-us/internet-explorer/download-ie">
                    <img src="<?php echo base_url(); ?>files/assets/images/browser/ie.png" alt="">
                    <div>IE (9 & above)</div>
                </a>
            </li>
        </ul>
    </div>
    <p>Sorry for the inconvenience!</p>
</div>
<![endif]-->
<!-- Warning Section Ends -->
<!-- Required Jquery -->
<script type="text/javascript" src="<?php echo base_url(); ?>files/bower_components/jquery/js/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>files/bower_components/jquery-ui/js/jquery-ui.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>files/bower_components/popper.js/js/popper.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>files/bower_components/bootstrap/js/bootstrap.min.js"></script>
<!-- waves js -->
<script src="<?php echo base_url(); ?>files/assets/pages/waves/js/waves.min.js"></script>
<!-- jquery slimscroll js -->
<script type="text/javascript" src="<?php echo base_url(); ?>files/bower_components/jquery-slimscroll/js/jquery.slimscroll.js"></script>
<!-- modernizr js -->
<script type="text/javascript" src="<?php echo base_url(); ?>files/bower_components/modernizr/js/modernizr.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>files/bower_components/modernizr/js/css-scrollbars.js"></script>
<!-- i18next.min.js -->
<script type="text/javascript" src="<?php echo base_url(); ?>files/bower_components/i18next/js/i18next.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>files/bower_components/i18next-xhr-backend/js/i18nextXHRBackend.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>files/bower_components/i18next-browser-languagedetector/js/i18nextBrowserLanguageDetector.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>files/bower_components/jquery-i18next/js/jquery-i18next.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>files/assets/js/common-pages.js"></script>



<!-- notification js -->
<script type="text/javascript" src="<?php echo base_url(); ?>files/assets/js/bootstrap-growl.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>files/assets/pages/notification/notification.js"></script>
<script>
$(document).ready(function() {
<?php
if ($this->session->flashdata('emsg') != null) {?>
        //echo "<pe>".$error."</pe>";
        notify("top", "left", "fa fa-check", "<?php echo $this->session->flashdata('etype');?>", "animated flipInX", "animated flipOutX"," ",'<?php echo $this->session->flashdata('emsg');?>');
    <?
} elseif ($this->session->flashdata('infoerror') != null) {
    foreach($this->session->flashdata('infoerror') as $error){?>
        //echo "<pe>".$error."</pe>";
        notify("top", "left", "fa fa-check", "danger", "animated flipInX", "animated flipOutX"," ",'<?php echo $error;?>');
    <? }
}
?>
});
</script>
<script src="<?php echo base_url(); ?>files/assets/js/pcoded.min.js"></script>
<script src="<?php echo base_url(); ?>files/assets/js/vertical/vertical-layout.min.js"></script>
<script src="<?php echo base_url(); ?>files/assets/js/jquery.mCustomScrollbar.concat.min.js"></script>
<!-- Custom js -->
<script type="text/javascript" src="<?php echo base_url(); ?>files/assets/js/script.js"></script>


</body>

</html>