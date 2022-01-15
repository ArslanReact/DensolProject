<div class="p-b-60 blusecolorbg banner-wrap m-b-40 align-items-center d-flex">
<div id="carouselExampleIndicators" class="carousel slide w-100" data-ride="carousel">


    <?php if($sliders){ ?>
        <ol class="carousel-indicators">
            <?php
            $xb=0;
            foreach($sliders as $slider){
                ?>
                <li data-target="#carouselExampleIndicators" data-slide-to="<?php echo $xb;?>" <?php if($xb==0){?>class="active"<?php }?>></li>
                <?php $xb++;}?>
        </ol>
        <div class="carousel-inner">
            <?php
            $xd=1;
            foreach($sliders as $slider){
                ?>
                <div class="carousel-item <?php if($xd==1){echo "active";}?>">
                    <div class="container pt-md-5 mt-md-5">
                    <div class="row align-items-left d-flex home_slider owl-carousel">
                        <div class="col-xl-6 col-lg-6 col-md-12">
                            <div class="banner-title">
                                <h5 class="text-white fontwieghtbold"><?=$slider->title;?></h5>
                                <span class="m-t-20 fontsize18 text-white"><?=html_entity_decode($slider->content);?></span>
                                <a href="<?=$slider->short_detail;?>" class="btn m-t-30 btn-white borderradius50 fontsize18 blusecolortext">More Products</a>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 d-none d-sm-none d-lg-block"><img class="img-fluid" src="<?=base_url('uploads/banner/'.$slider->banner);?>" alt="" height="525" width="525"></div>
                    </div>

                </div>
                </div>
                <?php $xd++;}?>
        </div>
    <?php }?>
</div>
</div>
<style>
    .banner-title p{ color: #fff; font-size: 18px;}
</style>


