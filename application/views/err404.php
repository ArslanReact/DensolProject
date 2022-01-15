<!doctype html>
<html lang="en">
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
<title>404</title>
<?php include ('includes/head.php');?>
<body>
<!-- header-->
<?php include ('includes/header.php');?>
<main class="main">
    <!--  -->
    <div class="blusecolorbg banner-wrap-brecrumbs m-b-40 align-items-center d-flex">
        <div class="main-container2">
            <div class="row align-items-center d-flex">
                <div class="col-xl-12 col-lg-12 col-md-12 m-b-40">
                    <h5 class="text-white text-center fontwieghtbold">404</h5>
                </div>
                <div class="col-xl-12 col-lg-12 col-md-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb m-0 px-0">
                            <li class="breadcrumb-item"><a class="" href="<?=base_url();?>">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">404</li>
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
                <div class="col-xl-12 text-center">
                    <h4 class="fontsize50 fontwieghtbold">404</h4>
                    <p class="fontsize18 blackcolortext">Oops, page not found!</p>
                    <a href="<?=base_url();?>" class="btn btn-blue borderradius50">Go Back To Home</a>
                </div>
            </div>
        </div>
    </div>
</main>
<?php include ('includes/footer.php');?>
<?php include ('includes/index_scripts.php');?>