<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
?>

<div class="blusecolorbg banner-wrap-brecrumbs m-b-40 align-items-center d-flex">
    <div class="main-container2">
        <div class="row align-items-center d-flex">
            <div class="col-xl-12 col-lg-12 col-md-12 m-b-40">
                <h5 class="text-white text-center fontwieghtbold"><?php echo $title;?></h5>
            </div>
            <div class="col-xl-12 col-lg-12 col-md-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb m-0 px-0">
                        <li class="breadcrumb-item"><a class="" href="<?=base_url();?>">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><?php echo $title;?></li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<!--    <section class="about-area">-->
<!--        <div class="main-container">-->
<!--            <div class="row">-->
<!--                <div class="col-xl-6 col-md-6 col-sm-5 col-xs-5">-->
<!--                    --><?php //if(isset($ctpag) && $ctpag==1){?>
<!--                    <h5>--><?php //echo $title;?><!--</h5>-->
<!--                    --><?php //}else{?>
<!--                    <h4>--><?php //echo $title;?><!--</h4>-->
<!--                    --><?php //}?>
<!--                </div>-->
<!--                <div class="col-xl-6 col-md-6 col-sm-7 col-xs-7 text-right">-->
<!--                    --><?php //echo $brudcrumb;?>
<!--                    <!-- <ul class="breadcrumbb">-->
<!--                        <li><a href="#">Home</a></li>-->
<!--                        <li><a href="#">Login</a></li>-->
<!--                        <li>Register</li>-->
<!--                    </ul> -->
<!--                    <!-- --><?php ////if(isset($ctpag) && $ctpag==1){?>
<!--                        <h5>--><?php ////echo $title;?><!-- <br><span>--><?php ////echo $brudcrumb;?><!--</span></h5>-->
<!--                    --><?php ////}else{?>
<!--                        <h4>--><?php ////echo $title;?><!-- <span>--><?php ////echo $brudcrumb;?><!--</span></h4>-->
<!--                    --><?php ////}?><!-- -->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--    </section>-->