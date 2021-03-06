<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php echo $head;?>
</head>
<body>
    <?php
    echo $header;
    echo $slider;

    ?>

    <div class="p-b-60">
        <div class="container">
            <div class="card p-0 overflow-hidden">
                <div class="row no-gutters align-items-center">
                    <div class="quickquite py-4 px-4 col-lg-3 mb-4 mb-sm-0"><a href="" class="d-block fontsize26 fontwieghtbold text-white h-100"> For Quick Quote</a></div>
                    <div class="px-3 col-lg-7 mb-4 mb-sm-0">
                        <div class="d-lg-inline-flex w-100 d-block align-item-center">
                            <p class="fontsize20 blusecolortext fontwieghtbold mb-4 mb-sm-0 w-100 align-item-center d-flex"><img width="30" height="36" class="mr-3" src="<?=base_url();?>files/frontend/images/icon9.svg" alt=""> 1300 920 097</p>
                            <p class="w-100 d-flex fontsize20 blusecolortext fontwieghtbold m-0 align-item-center d-flex"><img width="30" height="36" class="mr-3" src="<?=base_url();?>files/frontend/images/icon14.svg" alt=""> sales@densol.com.au</p>
                        </div>
                    </div>
                    <div class="px-3 col-lg-2 mb-4 mb-sm-0">
                        <a href="" class="btn btn-all fontsize18 w-100 text-white borderradius50 greencolorbg"><i class="mr-2 far fa-comment-dots"></i>Live Chat</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--  -->
    <div class="p-b-60">
        <div class="container">
            <div class="row">
      
                <div class="col-xl-6 col-lg-4 col-md-12">
                    <div class="blusecolorbg bg1 p-4 m-b-20 borderradius15 h-376">
                        <a href="<?=base_url();?>uploads/2019/11/AR1.pdf" class="d-block"><img class="img-fluid" src="<?=base_url();?>files/frontend/images/logo2.png" alt="" width="217" height="55">
                        <h4 class="fontsize36 fontwieghtbold m-t-35 m-b-35 text-white">Latest <br>Catalog</h4>
                        
                        </a>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-4 col-md-12">
                    <a href="<?=base_url();?>uploads/2019/11/AR-PDF-3.pdf" target="_blank">
                    <div class="greencolor bg2 p-4 m-b-20 text-center borderradius15 h-376">
                        <h4 class="fontsize36 fontwieghtbold m-t-35 m-b-35" style="margin-top: 292px;margin-left: -20px;color: #062346;">Price Brochure</h4>
                    </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!--  -->
    <div class="p-b-60">
        <div class="container">
            <div class="row text-center m-b-70">
                <div class="main-head col">
                    <h5 class="fontsize36 fontwieghtbold">Popular Category</h5>
                </div>
            </div>
            <div class="row category">
                <?php
                $ia = 1;
                $modems = $this->db->query("select * from products_categories where is_featured = '".$ia."' limit 6");

                if($modems){
                foreach ($modems->result() as $modem){

                ?>

                <div class="col-xl-4 col-lg-4 col-md-6 m-b-30">
                    <div class="card overflow-hidden text-center">
                        <a href="<?php $ww =  getSeoLink("products_categories",$modem->id);
                        echo str_replace('dental/','',$ww);
                        ?>
                        
                        "> <img class="img-fluid" src="<?php echo base_url()."uploads/products/categories/".$modem->thumbnail;?>" alt="" width="310" height="242"></a>
                        <h5 class="blusecolorbg"><a class="fontwieghtbold text-white text-white d-block fontsize18" href=""><?=$modem->title;?></a></h5>
                    </div>
                </div>
                <?php }}?>
            </div>
        </div>
    </div>
    <!--  -->
    <div class="pb-5">
        <div class="container">
            <div class="row text-center m-b-70">
                <div class="main-head col">
                   <a href="https://ar-instrumed.com.au/product-category/dental/instruments-sets-kits/dental-examination-kit-1" > <h5  class="fontsize36 fontwieghtbold">Popular Dental Kits</h5> </a>
                </div>
            </div>
            <div class="row kit-slidee owl-carousel">
                <?php
                $ia = 1;
               $query =  $this->db->query("SELECT * FROM `products_sel_categories` WHERE `productcategory_id` = 52");
              $data_product= $query->result_array();
              $productlist = '';
              foreach($data_product as $key){
                  $productlist .= ",".$key['product_id'];
              }
              $productlist = ltrim($productlist,',');
            
                $modems = $this->db->query("select * from products where is_featured = '".$ia."' and id in ($productlist)  limit 60");
                if($modems){
                foreach ($modems->result() as $product){

                ?>
                <div class="col-xl-12">
                    <div class="card overflow-hidden text-center h-100">
                        <a href="<?php echo base_url("product/".$product->slug);?>"> <img class="img-fluid" src="<?php echo base_url()."uploads/products/medium/".$product->image;?>" alt="" width="500" height="500"></a>
                        <div class="btn-plus d-block"><a href="" class=""><i class="fas fa-plus"></i></a></div>
                        <?php
                                if($product->promotion == 1){
                                ?>
                                <div class="btn-speak d-block"><a href="<?=base_url('weekly-promotion');?>" class="text-right"><img style="height:auto;" class="img-fluid" width="30" src="<?=base_url();?>files/frontend/images/ss.svg"></a></div>
                                <?php }?>
                        <h5 class="text-left"><a class="fontwieghtbold blusecolortext d-block fontsize14 m-t-10 m-b-10" href="<?php echo base_url("product/".$product->slug);?>"><?=$product->title;?></a></h5>
                     
                    </div>
                </div>
<?php }}?>
            </div>
        </div>
    </div>
    <!--  -->
    <div class="greencolorbg whychoosus p-t-60 p-b-60">
        <div class="container">
            <div class="row">
                <div class="col-xl-4 col-lg-4 col-md-4 m-b-30 d-none d-md-block">
                    <div class="overflow-hidden borderradiusshapes"><img class="" src="<?=base_url();?>files/frontend/images/img-1.png" alt="" width="395" height="295"></div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-4 m-b-30 d-none d-md-block">
                    <div class="overflow-hidden borderradiusshapes"><img class="" src="<?=base_url();?>files/frontend/images/img-2.png" alt="" width="395" height="295"></div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-4 m-b-30 d-none d-md-block">
                    <div class="overflow-hidden borderradiusshapes"><img class="" src="<?=base_url();?>files/frontend/images/img-3.png" alt="" width="395" height="295"></div>
                </div>
            </div>
            <div class="row m-t-60">
                <div class="col-xl-10 mr-auto ml-auto">
                    <div class="row no-gutters">
                        <div class="col-xl-5 col-lg-5 col-md-12"><div class="main-head"><h5 class="fontsize60 fontwieghtbold text-white">Why <br>Chose us</h5></div></div>
                        <div class="col-xl-7 col-lg-7 col-md-12"><p class="fontsize18" style="color: #fff;">A company that entails the experience of more than six decades in manufacturing and selling Surgical instruments, Dental instruments worldwide</p></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .carousel.vertical .carousel-inner .item { -webkit-transition: 0.6s ease-in-out top; -moz-transition: 0.6s ease-in-out top; -ms-transition: 0.6s ease-in-out top; -o-transition: 0.6s ease-in-out top; transition: 0.6s ease-in-out top;}
        .carousel.vertical .carousel-inner { height:270px; display: flex; align-items: flex-end; justify-content: end;}
    </style>
    <?php if($testi){ ?>
    <div class="testimonials py-5">
        <div class="col-10 mx-auto mySwiper">
        <div class="main-head text-center mb-5 pb-5">
               <h5 class="fontsize36 fontwieghtbold position-relative">Testimonials</h5>
            </div>
            <?php 
                foreach($testi as $cms){
            ?>
            <div class="row pb-5">

                <div class="col-xl-12 col-lg-12 pb-4">
                    <div class="testimonials_box item-removed">
                        <div class="card pt-0 m-0">
                            <div class="card-header mr-lg-auto">
                                <a href="#" class=""><img class="img-fluid" src="<?=base_url();?><?php echo $cms['image']; ?>" alt="" width="100" alt=""></a>
                            </div>
                            <div class="name">
                                <p class="fontsize16 m-0"><strong class="blusecolortext d-block fontsize18"> <?php echo $cms['title']; ?></strong></p>
                            </div>
                            <div class="h-100 d-block card-body">
                                <!--<div class="position-absolute left-0 right-0"><img class="img-fluid" src="<?=base_url();?>files/frontend/images/quotation.svg" alt="" width="100" alt=""></div>-->
                                <blockquote class="fontsize16 m-0"><?php echo $cms['content']; ?></blockquote>
                                <div class="justify-content-between d-flex mt-4 widthmin ml-lg-auto">
                                    <p class="fontsize16 m-0"> <?php echo $cms['position']; ?></p>
                                    <p class="fontsize16 m-0"> <?php echo $cms['clinicname']; ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php }  ?>
        </div>
    </div>
    <?php } ?>



    
    <?php
    echo $footer;
    echo $scripts;
     ?>

</body>
</html>