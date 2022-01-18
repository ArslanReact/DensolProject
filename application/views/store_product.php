<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

?>

<!DOCTYPE html>

<html lang="en">

<head>
    <?php echo $head;?>
    <link rel="stylesheet" href="<?php echo base_url('files/frontend/');?>tinycomp/css/glasscase.min.css" type="text/css"/>
<style>
.marlab{margin-top:0;}
.marlab label{margin-right:10px;}
div.cloudzoom-zoom,div.cloudzoom-zoom-inside{display: block !important;}
div.cloudzoom-blank,div.cloudzoom-blank div.cloudzoom-lens{display: none !important;}
</style>
</head>

<body>

    <?php
    echo $header;
    echo $banner;
    if($product->image != ""){
        $largeimg = base_url()."uploads/products/".$product->image;
        $medimg = base_url()."uploads/products/medium/".$product->image;
        $smlimg = base_url()."uploads/products/small/".$product->image;
    }else{
        $largeimg = base_url()."files/frontend/images/blank.jpg";
        $medimg = base_url()."files/frontend/images/blank.jpg";
        $smlimg = base_url()."files/frontend/images/blank.jpg";
    }
    if (strpos($product->title, ' ') !== false) {
        $prdname_part = explode(" ",$product->title,2);
        $producttitlehere = '<strong>'.$prdname_part[0].'</strong> '.$prdname_part[1];
    }else{
        $producttitlehere = '<strong>'.$product->title.'</strong>';
    }
    ?>
    <div class="p-b-40">
        <div class="main-container2">

            <div class="row">
                <div class="col-lg-12">
                    <?php if($this->session->flashdata('success') != ''){ ?>
                            <div class="alert alert-success" role="alert">
                              <?php echo $this->session->flashdata('success'); ?>
                            </div>
                    <?php } ?>
                </div>
                <div class="col-lg-5 px-4">
                        <div class="card overflow-hidden text-center">
                            <div style="border:1px #ccc solid;">
                                <img id="zoom1" class="cloudzoom w-100 center-block" src="<?php echo $largeimg;?>" data-cloudzoom="zoomImage: '<?php echo $largeimg;?>', zoomPosition: 'inside', autoInside: true" alt="<?php echo $product->title;?>" style="user-select: none;">
                            </div>
                            <div class="row m-t-30">
                                <div class="col-md-3 mt-10">
                                    <a style="display:block; border: 1px #ccc solid; margin-bottom: 10px;" href="#" class="cloudzoom-gallery h-100" data-cloudzoom="useZoom: '#zoom1', image: '<?php echo $largeimg;?>', zoomImage: '<?php echo $largeimg;?>'">
                                        <div class="catbox h-100">
                                            <img src="<?php echo $largeimg;?>" class="w-100 h-100 img-fluid">
                                        </div>
                                    </a>
                                </div>
                                <?php
                            $mviews = getmoreviews($product->id);
                            if(!empty($mviews)){
                            foreach($mviews as $mview){
                            ?>
                            
                                <div class="col-md-3 mt-10">
                                    <a style="display:block; border: 1px #ccc solid;" href="#" class="cloudzoom-gallery h-100" data-cloudzoom="useZoom: '#zoom1', image: '<?php echo base_url().'uploads/products/moreviews/'.$mview->image;?>', zoomImage: '<?php echo base_url().'uploads/products/moreviews/'.$mview->image;?>'">
                                        <div class="catbox h-100">
                                            <img src="<?php echo base_url().'uploads/products/moreviews/'.$mview->image;?>" class="w-100 h-100 img-fluid">
                                        </div>
                                    </a>
                                </div>
                                <?php }}?>
                            </div>
                        </div>
                    </div>
                <div class="col-xl-7 col-lg-9 px-4">
                    <h5 class="text-left"><a class="fontwieghtbold blusecolortext d-block fontsize30"><?php echo $producttitlehere;?></a></h5>
                    
                    <?php
                        // $tdtdprices = getuserprdprice($product->id);
                        // echo geteasyprodprice($product->id,"h3 class='fontwieghtbold fontsize30 greencolortext d-flex align-items-center w-100'","small class='line-through paragraphcolortext fontsize18 m-l-10'");
                        ?>
                       
                   <p> <?=cleanout($product->short_detail);?></p>
                    <p class="fontsize16 blusecolortext fontwieghtbold">SKU: <?=$product->article;?></p>
                    <p class="paragraphcolortext fontsize14">Categories:  <?php echo getfrontproductsCategories($product->id);?></p>
                    <p class="paragraphcolortext fontsize14">Tags:  <?php   echo getTags("products",$product->id);?> </p>
<!--                    <p class="goldcolortext fontsize30 fontwieghtregular">Buy 5 Get <stonng class="fontwieghtbold">1 Free</stonng></p>-->
                        <?php 
							if($product->qty == 0){
							echo '<span class="highlight_red">Backorder 12-16 Days Delivery Time</span>';
							}
						?>
                        <?php
                           echo form_open('insert_item_to_cart');
                           
                           ?>
                           
                            <?php
                            print_r(getprdVariation($product->id));
                            
                            ?>
                            <div class="quantity_box">
                                <span id="decrease" class="quantity_down"><i style="color:#676767;" class="fa fa-minus" aria-hidden="true"></i></span>
                                <input id="number" class="quantity_input" type="text" name="qty" value="1">
                                <span id="increase" class="quantity_up"><i style="color:#676767;" class="fa fa-plus" aria-hidden="true"></i></span>
                            </div>
                    <button style="border:0;" type="submit" name="add" class="btn btn-blue-fill" id="addbbtn">Add to cart</button>
                            <div class="social mt-md-4 d-flex align-items-center">
                                <label class="mr-3 fontsize20 blusecolortext">Share</label>
                                <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo base_url() . "product/" . $product->slug; ?>" class="d-inline-block paragraphcolorbg mr-2"><i class="fab fa-facebook-f text-white fontsize14"></i></a>
                                <a href="http://twitter.com/share?url=<?php echo base_url() . "product/" . $product->slug; ?>" class="d-inline-block paragraphcolorbg mr-2"><i class="fab fa-twitter text-white fontsize14"></i></a>
                                <a href="http://pinterest.com/pin/create/button/?url=<?php echo base_url() . "product/" . $product->slug; ?>&amp;media=<?php echo NOSTORE_URLLINK . "uploads/products/medium/" . $product->image; ?>&amp;description=arinstrumend <?php echo $product->title; ?> Product" class="d-inline-block paragraphcolorbg mr-2"><i class="fab fa-pinterest text-white fontsize14"></i></a>
                            </div>
                          
                     
                    <input type="hidden" name="id" value="<?php echo $product->id;?>">
                    <!-- <input type="hidden" name="add_one_item" value="1"> -->
                    <input type="hidden" name="add_one_item_options" value="1">

                            <?php echo form_close();  ?>
                </div>
            </div>
        </div>
    </div>



        <div class="p-b-40 p-t-40">
            <div class="main-container2">
                <ul class="nav nav-tabs mx-4" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link fontsize14" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Description</a>
                        </li>
                        <!--<?php $xc=1; foreach($sel_specs as $sel_spec){?>-->
                        <!--<li class="nav-item">-->
                        <!--<a class="nav-link fontsize14 " id="pills-home-tab<?php echo $sel_spec->id;?>" data-toggle="pill" href="#pills-home<?php echo $sel_spec->id;?>" role="tab" aria-controls="pills-home<?php echo $sel_spec->id;?>" aria-selected="true"><?php echo $sel_spec->title;?></a>-->
                        <!--</li>-->
                        <!--<?php $xc++;}?>-->
                    </ul>
                    <div class="tab-content graph-sec card pt-15 pb-15" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab"><?=cleanout($product->full_detail);?></div>
                        <!--<?php $xcc=1; foreach($sel_specs as $sel_spec){?>-->
                        <!--<div class="tab-pane fade " id="pills-home<?php echo $sel_spec->id;?>" role="tabpanel" aria-labelledby="pills-home-tab<?php echo $sel_spec->id;?>"><?php echo cleanOut($sel_spec->content);?></div>-->
                        <!--<?php $xcc++;}?>-->
                    </div>
                </div>


            <div class="p-b-40 p-t-40 m-b-80">
                <div class="main-container2">
                    <div class="row text-center m-b-70">
                        <div class="main-head col">
                            <h5 class="fontsize30 fontwieghtbold">Similar Products</h5>
                        </div>
                    </div>
                    <div class="row kit-slidee owl-carousel">
                <?php
                // $rel_prds = getRelatedprd($product->id);
                $pid = $product->id;
                $query = $this->db->query("select * from products_sel_categories where product_id = '$pid' order by productcategory_id desc");
                $result = $query->result_array();
                
                $pcat = $result[0]['productcategory_id'];
                $query = $this->db->query("select product_id from products_sel_categories where productcategory_id = '$pcat'");
                $result = $query->result_array();
                $r_prod_list = '';
                foreach ($result as $key){
                  $r_prod_list .= $key['product_id'] . ','; 
                }
                $prod_details = trim($r_prod_list, ',');                
              //  $rel_prds = getRelatedprods($product->id);
                $query = $this->db->query("select * from products where id in ($prod_details)");
                $result = $query->result();
                
                if(!empty($result)){
                foreach($result as $rel_prd){
                if($rel_prd->id != $product->id){
                ?>

                    <div class="col-xl-12">
                        <div class="card slidde-pro overflow-hidden text-center">
                            <a class="d-block my-4" href="<?php echo base_url("product/".$rel_prd->slug);?>"> <img class="img-fluid" src="<?php echo base_url()."uploads/products/small/".$rel_prd->image;?>" alt=""></a>
                            <div class="btn-plus d-block"><a href="" class=""><i class="fas fa-plus"></i></a></div>
                            <?php
                                if($product->promotion == 1){
                                ?>
                                <div class="btn-speak d-block"><a href="<?=base_url('weekly-promotion');?>" class="text-right"><img class="img-fluid w-auto h-35" src="<?=base_url();?>files/frontend/images/ss.svg" style="width: 24px !important; height:auto !important; object-fit: auto !important;"></a></div>
                                <?php }?>
                            <h5 class="text-left"><a class="fontwieghtbold blusecolortext d-block fontsize18" href="<?php echo base_url("product/".$rel_prd->slug);?>"><?php echo $rel_prd->title;?></a></h5>
                            
                        </div>
                    </div>
                <?php }}}?>
            </div>
        </div>
    </section>


	<?php
    echo $footer;

    echo $scripts;
    ?>

  </body>

</html>