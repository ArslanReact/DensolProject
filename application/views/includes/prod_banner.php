<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
?>
<!-- <section class="bg-home product-section2">
<img class="img-responsive lrg-pro-mg" src="<?php //echo $banner;?>" alt="">
</section> -->
<!--<section class="bg-home product-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 col-md-7 col-sm-12">
                
                <?php
                $xx = explode(" ",$title,2);
                ?>
                <span><?php echo $xx[0]?></span>
                <h4><?php echo $xx[1]?></h4>
                <p><?php echo $brudcrumb;?></p>
                
            </div>
            <div class="col-lg-5 col-md-5 hidden-sm hidden-xs text-center"><img class="img-responsive lrg-pro-mg" src="<?php echo $banner;?>" alt=""></div>
        </div>
    </div>
    <div class="bg-pattern-effect"><img class="img-responsive center-block" style="display:block;" src="<?php echo NOSTORE_URLLINK."files/frontend/images/bg-pattern.png";?>" alt=""></div>
</section>-->


<div class="blusecolorbg banner-wrap-brecrumbs align-items-center d-flex">
    <div class="main-container2">
        <div class="row align-items-center d-flex">
            <div class="col-xl-12 col-lg-12 col-md-12 m-b-40">
                <h5 class="text-white text-center fontsize30 fontwieghtbold"><?=$title?></h5>
            </div>
            <div class="col-xl-12 col-lg-12 col-md-12">
                <nav aria-label="breadcrumb">
                    <?php echo $brudcrumb;?>
                </nav>
            </div>
        </div>
    </div>
</div>