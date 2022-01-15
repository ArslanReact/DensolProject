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
        <title>Open Created Account - AR Instrumed</title>
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
        <script src="<?php echo base_url();?>files/frontend/js/theme-jquery.min.js"></script>

    </head>
</head>
<body>
    <?php include ('includes/header.php');?>


    <div class="blusecolorbg banner-wrap-brecrumbs m-b-40 align-items-center d-flex">
        <div class="main-container2">
            <div class="row align-items-center d-flex">
                <div class="col-xl-12 col-lg-12 col-md-12 m-b-40">
                    <h5 class="text-white text-center fontwieghtbold">Open a Credit Account</h5>
                </div>
                <div class="col-xl-12 col-lg-12 col-md-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb m-0 px-0">
                            <li class="breadcrumb-item"><a class="" href="<?=base_url();?>">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Open a Credit Account</li>
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
                <div class="col-xl-9 col-lg-9 col-md-12">
                    <?php echo form_open(base_url()."credit_account_submit"); $font_size = "12px";?>
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
                        <div class="card p-4">
                            <h5 class="fontsize24 m-b-20 fontwieghtbold blusecolortext">Applicant Details </h5>
                            <div class="row m-b-30">
                                <div class="col-lg-6 m-b-20">
                                    <div class="form-group">
                                        <label>Registered Business Name*</label>
                                        <input type="text" class="form-control h-45 borderradius10" name="business_name" placeholder="" id="business_name" required="">
                                    </div>
                                </div>
                                <div class="col-lg-6 m-b-20">
                                    <div class="form-group">
                                        <label>Trading Name</label>
                                        <input type="text" class="form-control h-45 borderradius10" name="trading_name" placeholder="" id="trading_name">
                                    </div>
                                </div>
                                <div class="col-lg-6 m-b-20">
                                    <div class="form-group">
                                        <label>Business Email*</label>
                                        <input type="email" class="form-control h-45 borderradius10" name="business_email" placeholder="" id="business_email">
                                    </div>
                                </div>
                                <div class="col-lg-6 m-b-20">
                                    <div class="form-group">
                                        <label>Name of Proprietor(s)</label>
                                        <input type="text" class="form-control h-45 borderradius10" name="name_of_proprietor" placeholder="" id="name_of_proprietor">
                                    </div>
                                </div>
                            </div>
                            <h5 class="fontsize24 m-b-20 fontwieghtbold blusecolortext">Delivery Address  </h5>
                            <div class="row m-b-30">
                                <div class="col-lg-12 m-b-20">
                                    <div class="form-group">
                                        <label>Suite/Unit No</label>
                                        <input type="text" class="form-control h-45 borderradius10" name="d_building" placeholder="" id="d_building">
                                    </div>
                                </div>
                                <div class="col-lg-6 m-b-20">
                                    <div class="form-group">
                                        <label>Street</label>
                                        <input type="text" class="form-control h-45 borderradius10" name="d_suite" placeholder="" id="d_suite">
                                    </div>
                                </div>
                                <div class="col-lg-6 m-b-20">
                                    <div class="form-group">
                                        <label>Postcode</label>
                                        <input type="number" class="form-control h-45 borderradius10" name="d_postcode" placeholder="" id="d_postcode">
                                    </div>
                                </div>
                                <div class="col-lg-6 m-b-20">
                                    <div class="form-group">
                                        <label>City</label>
                                        <input type="text" class="form-control h-45 borderradius10" name="d_city" placeholder="" id="d_city">
                                    </div>
                                </div>
                                <div class="col-lg-6 m-b-20">
                                    <div class="form-group">
                                        <label>State</label>
                                        <input type="text" class="form-control h-45 borderradius10" name="d_state" placeholder="" id="d_state">
                                    </div>
                                </div>
                            </div>
                            <h5 class="fontsize24 m-b-20 fontwieghtbold blusecolortext">Postal address <small class="paragraphcolortext fontsize14">(if different from delivery)</small>  </h5>
                            <div class="row m-b-30">
                                <div class="col-lg-12 m-b-20">
                                    <div class="form-group">
                                        <label>Building</label>
                                        <input type="text" class="form-control h-45 borderradius10" name="p_building" placeholder="" id="p_building">
                                    </div>
                                </div>
                                <div class="col-lg-6 m-b-20">
                                    <div class="form-group">
                                        <label>St/Suite</label>
                                        <input type="text" class="form-control h-45 borderradius10" name="p_suite" placeholder="" id="p_suite">
                                    </div>
                                </div>
                                <div class="col-lg-6 m-b-20">
                                    <div class="form-group">
                                        <label>Postcode</label>
                                        <input type="number" class="form-control h-45 borderradius10" name="p_postcode" placeholder="" id="p_postcode">
                                    </div>
                                </div>
                                <div class="col-lg-6 m-b-20">
                                    <div class="form-group">
                                        <label>City</label>
                                        <input type="text" class="form-control h-45 borderradius10" name="p_city" placeholder="" id="p_city">
                                    </div>
                                </div>
                                <div class="col-lg-6 m-b-20">
                                    <div class="form-group">
                                        <label>State</label>
                                        <input type="text" class="form-control h-45 borderradius10" name="p_state" placeholder="" id="p_state">
                                    </div>
                                </div>
                            </div>
                            <h5 class="fontsize24 m-b-20 fontwieghtbold blusecolortext">Contact Details </h5>
                            <div class="row m-b-30">
                                <div class="col-lg-6 m-b-20">
                                    <div class="form-group">
                                        <label>Phone:</label>
                                        <input type="number" class="form-control h-45 borderradius10" name="phone" placeholder="" id="phone">
                                    </div>
                                </div>
                                <div class="col-lg-6 m-b-20">
                                    <div class="form-group">
                                        <label>Fax</label>
                                        <input type="text" class="form-control h-45 borderradius10" name="fax" placeholder="" id="fax">
                                    </div>
                                </div>
                                <div class="col-lg-6 m-b-20">
                                    <div class="form-group">
                                        <label>Mobile Numbe</label>
                                        <input type="number" class="form-control h-45 borderradius10" name="mobile_no" placeholder="" id="mobile_no">
                                    </div>
                                </div>
                                <div class="col-lg-6 m-b-20">
                                    <div class="form-group">
                                        <label>E-mail</label>
                                        <input type="email" class="form-control h-45 borderradius10" name="email" placeholder="" id="email">
                                    </div>
                                </div>
                            </div>
                            <h5 class="fontsize24 m-b-20 fontwieghtbold blusecolortext">Business Details </h5>
                            <div class="row m-b-30">
                                <div class="col-lg-12 m-b-20">
                                    <div class="form-group">
                                        <label>How long has the business been established?</label>
                                        <input type="text" class="form-control h-45 borderradius10" name="business_q1" placeholder="" id="business_q1">
                                    </div>
                                </div>
                                <div class="col-lg-12 m-b-20">
                                    <div class="form-group">
                                        <label>How long have the current proprietors owned the business?</label>
                                        <input type="text" class="form-control h-45 borderradius10" name="business_q2" placeholder="" id="business_q2">
                                    </div>
                                </div>
                                <div class="col-lg-12 m-b-20">
                                    <div class="d-flex">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="business_category" id="business_category" value="Dentist">
                                            <label class="form-check-label" for="business_category">Dentist</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="business_category" id="business_category" value="Dental Specialist (specify)">
                                            <label class="form-check-label" for="business_category">Dental Specialist (specify)</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="business_category" id="business_category" value="Laboratory">
                                            <label class="form-check-label" for="business_category">Laboratory</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="business_category" id="business_category" value="Laboratory Specialist (specify)">
                                            <label class="form-check-label" for="business_category">Laboratory Specialist (specify)</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="business_category" id="business_category" value="Other">
                                            <label class="form-check-label" for="business_category">Other</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <h5 class="fontsize24 m-b-20 fontwieghtbold blusecolortext">Trade Reference Details <small class="d-block fontsize14 paragraphcolortext m-t-15">Please give the names and phone numbers of two suppliers for trade reference purposes.</small> </h5>
                            <div class="row">
                                <div class="col-lg-6 m-b-20">
                                    <div class="form-group">
                                        <label>Person 1</label>
                                        <input type="text" class="form-control h-45 borderradius10" name="trade_ref_person1" placeholder="" id="trade_ref_person1">
                                    </div>
                                </div>
                                <div class="col-lg-6 m-b-20">
                                    <div class="form-group">
                                        <label>Phone</label>
                                        <input type="number" class="form-control h-45 borderradius10" name="trade_ref_person1_phone" placeholder="" id="trade_ref_person1_phone">
                                    </div>
                                </div>
                                <div class="col-lg-6 m-b-20">
                                    <div class="form-group">
                                        <label>Person 2</label>
                                        <input type="text" class="form-control h-45 borderradius10" name="trade_ref_person2" placeholder="" id="trade_ref_person2">
                                    </div>
                                </div>
                                <div class="col-lg-6 m-b-20">
                                    <div class="form-group">
                                        <label>Phone</label>
                                        <input type="number" class="form-control h-45 borderradius10" name="trade_ref_person2_phone" placeholder="" id="trade_ref_person2_phone">
                                    </div>
                                </div>
                                <div class="col-lg-12 m-b-20">
                                    <div class="form-check align-items-center d-flex">
                                        <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="1" name="read_condition">
                                        <label class="form-check-label" for="exampleRadios1">I agree to the <a href="" class="linked blusecolortext fontsize14">Terms & Conditions</a></label>
                                    </div>
                                </div>
                                <div class="col-lg-12 m-t-10 text-right"><button type="submit" class="btn btn-blue-fill borderradius50">Send</button></div>
                            </div>
                        </div>
                    </form>
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