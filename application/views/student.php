<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
        <title>Student Form - AR Instrumed</title>
        <meta name="keywords" content=""/>
        <meta name="description" content=""/>
        <meta name="custom1" content="product-category"/>
        <meta name="robots" content="index" />
        <meta name="robots" content="follow" />
        <meta name="revisit-after" content="1 day" />
        <link rel="canonical" href="">
        <meta property="og:locale" content="en_US" />
        <meta property="og:type" content="object" />
        <meta property="og:title" content="Pay online - AR Instrumed" />
        <meta property="og:description" content="" />
        <meta property="og:url" content="<?=base_url();?>pay-online/" />
        <meta property="og:site_name" content="AR Instrumed" />
        <meta property="og:image" content="<?=base_url();?>files/frontend/images/logo.png" />
        <meta property="og:image:secure_url" content="<?=base_url();?>files/frontend/images/logo.png" />
        <meta property="og:image:width" content="249" />
        <meta property="og:image:height" content="116" />
        <meta name="generator" content="Powered by Tecmyer IT Services" />
        <link rel="shortcut icon" type="image/x-icon" href="<?=base_url();?>files/frontend/favicon.ico" />
        <link rel="icon" href="<?=base_url();?>files/frontend/favicon.gif" type="image/gif" >
        <link rel="stylesheet" href="<?=base_url();?>files/frontend/css/all.css">
        <link rel="stylesheet" type="text/css" href="<?=base_url();?>files/frontend/css/theme_bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="<?=base_url();?>files/frontend/css/owl.carousel.min.css">
        <link rel="stylesheet" type="text/css" href="<?=base_url();?>files/frontend/css/theme-style.css">
        <link rel="stylesheet" type="text/css" href="<?=base_url();?>files/frontend/css/owl.carousel.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
        <link href='https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css' rel='stylesheet' type='text/css'>

    </head>
</head>
<body>
    <?php include ('includes/header.php');?>


    <div class="blusecolorbg banner-wrap-brecrumbs m-b-40 align-items-center d-flex">
        <div class="main-container2">
            <div class="row align-items-center d-flex">
                <div class="col-xl-12 col-lg-12 col-md-12 m-b-40">
                    <h5 class="text-white text-center fontwieghtbold">Student Account</h5>
                </div>
                <div class="col-xl-12 col-lg-12 col-md-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb m-0 px-0">
                            <li class="breadcrumb-item"><a class="" href="<?=base_url();?>">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Student Account</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!--  -->
    <div class="p-b-60">
        <div class="main-container2">
            <div class="row">
                <div class="col-xl-9 col-lg-9 col-md-7">
                    <h4 class="fontsize24 blusecolortext fontwieghtbold">Fill the form</h4>
                    <div class="card p-3 mt-3">
                        <?php echo form_open(base_url()."student_submit"); $font_size = "12px";?>
<?php
if($this->session->flashdata('error') !== ""){
    $error = $this->session->flashdata('error');
}else{
    $error = array();
}
?>
                        <div class="row">
                            
<div class="col-md-12">
            <?php if($this->session->flashdata('error') != ""){echo '<h3 style="font-size:15px; color: '.$error_color.';margin-bottom:15px;">Error: please fix below errors</h3>';} ?>
            <?php if($this->session->flashdata('success') != ""){echo '<h3 style="font-size:15px; color: #00bd09;margin-bottom:15px;">Success: Form Submit Successfully.</h3>';} ?>
        </div>
                            <div class="col-xl-6">
                                <div class="form-group">
                                    <label>First name</label>
                                    <input type="text" class="form-control h-45 borderradius10" placeholder="" name="fname" id="fname" required="">
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="form-group">
                                    <label>Last name</label>
                                    <input type="text" class="form-control h-45 borderradius10" placeholder="" name="lname" id="lname" required="">
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="form-group">
                                    <label>Institute name</label>
                                    <input type="text" class="form-control h-45 borderradius10" placeholder="" name="institute" id="institute" required="">
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="form-group">
                                    <label>Student ID number</label>
                                    <input type="number" class="form-control h-45 borderradius10" placeholder="" name="id_number" id="id_number" required="">
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="form-group">
                                    <label>Area fo study</label>
                                    <input type="text" class="form-control h-45 borderradius10" placeholder="" name="area_of_study" id="area_of_study" required="">
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="form-group">
                                    <label>Year of study</label>
                                    <input type="text" class="form-control h-45 borderradius10" placeholder="" name="study_year" id="study_year" required="">
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="form-group">
                                    <label>Contact number</label>
                                    <input type="number" class="form-control h-45 borderradius10" placeholder="" name="contact" id="contact" required="">
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" class="form-control h-45 borderradius10" placeholder="" name="email" id="email" required="">
                                </div>
                            </div>
                            <div class="col-xl-12">
                                <div class="form-group">
                                    <label>Address</label>
                                    <input type="text" class="form-control h-45 borderradius10" placeholder="" name="address" id="address" required="">
                                </div>
                            </div>
                            <div class="col-xl-12 text-right">
                                <button class="btn btn-blue-fill borderradius10" type="submit">Save</button>
                            </div>
                           </form>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-5">
                    <?php include ('includes/blog_leftmenu.php'); ?>
                </div>
            </div>
        </div>
    </div>
    <?php include ('includes/footer.php');
    include ('includes/index_scripts.php');
    ?>
  </body>
</html>