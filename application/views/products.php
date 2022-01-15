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
    echo $banner;
    ?>

    <?php if($productrootpage){
    echo $productrootpage;
    echo '<div class="mt-20">&nbsp;</div>';
    }else{?>
    <section class="products my-5">
        <?php if(isset($categories) && $categories != "" && !empty($categories)){?>
<!--		<div class="main-container">-->
<!--			<div class="row full-pro-row text-center mb-80">-->
<!--                --><?php //foreach($categories as $category){?>
<!--                    <div class="col float-col">-->
<!--                        <div class="item-pro">-->
<!--                            <a href="--><?php //echo getSeoLink("products_categories",$category->id);?><!--">-->
<!--                            <div class="item-media">-->
<!--                            --><?php //if(isset($category->thumbnail) && $category->thumbnail != ""){?>
<!--                            <img src="--><?php //echo base_url()."uploads/products/categories/".$category->thumbnail;?><!--" class="center-block" alt="--><?php //echo $category->title;?><!--">-->
<!--                            --><?php //}else{?>
<!--                            <img src="--><?php //echo base_url()."files/frontend/images/blank.jpg";?><!--" class="center-block" style="max-width:187px;" alt="--><?php //echo $category->title;?><!--">-->
<!--                            --><?php //}?>
<!--                            </div>-->
<!--                            <h5 class="mb-20">--><?php //echo $category->title;?><!--</h5>-->
<!--                            <p>--><?php //echo substr($category->short_detail,0,50)."...";?><!--</p>-->
<!--                            </a>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                --><?php //}?>
<!--			</div>-->
<!--        </div>-->
        <?php $nocat=false;}else{$nocat=true;} ?>
        <?php if(isset($products) && $products != "" && !empty($products)){?>
            <div class="main-container2">
                <!-- <div class="row">
                    <div class="main-head text-center  fadeInUp wow  animated">
                        <h4> Products <strong>Range</strong></h4>
                    </div>
                </div> -->
                <div class="col-lg-12">
                    <?php if($this->session->flashdata('success') != ''){ ?>
                            <div class="alert alert-success" role="alert">
                              <?php echo $this->session->flashdata('success'); ?>
                            </div>
                    <?php } ?>
                </div>                
                <div class="row">
                    <?php
                    foreach($products as $product){
                    ?>
                        <div class="col-xl-3 col-lg-3 px-4 mb-5">
                            <div class="card overflow-hidden product-hvr text-center h-100">
                                <a href="<?php echo base_url("product/".$product->slug);?>"> <img class="img-fluid" src="<?php echo base_url()."uploads/products/small/".$product->image;?>" alt=""></a>
                                <div class="btn-plus d-block">
                                        <?php
                                            echo form_open('insert_item_to_cart');
                                       ?>
                                       <input type="hidden" class="quantity_input" type="text" name="qty" value="1">
                                    <button type="submit"><i class="fas fa-plus"></i></button>
                            <input type="hidden" name="id" value="<?php echo $product->id;?>">
                            <!-- <input type="hidden" name="add_one_item" value="1"> -->
                            <input type="hidden" name="add_one_item_options" value="1">
        
                                    <?php echo form_close();  ?>                                    
                                </div>
                                <?php
                                if($product->promotion == 1){
                                ?>
                                <div class="btn-speak d-block"><a href="<?=base_url('weekly-promotion');?>" class="text-right"><img src="<?=base_url();?>files/frontend/images/ss.svg"></a></div>
                                <?php }?>
                                <h5 class="text-left py-4"><a class="fontwieghtbold blusecolortext d-block fontsize16" href="<?php echo base_url("product/".$product->slug);?>"><?=$product->title;?></a></h5>
                                <div class="align-items-center w-100 d-flex justify-content-between">
                                    <!--<?php $prdprices = getuserprdprice($product->id); ?>-->
                                    <!--<div class="fontwieghtbold fontsize24 greencolortext">$<?php  echo $prodnewprice = $prdprices["new_price"]; ?></div>-->
                                    <!--<?php if($prdprices["old_price"] > 0){?>-->
                                    <!--<div class="fontsize18 paragraphcolortext line-through">$<?php echo $prodoldprice = $prdprices["old_price"];?></div>-->
                                    <!--<?php }?>-->
                                    <?php
                        $tdtdprices = getuserprdprice($product->id);
                        echo geteasyprodprice($product->id,"h3 class='fontwieghtbold fontsize30 greencolortext d-flex justify-content-between align-items-center w-100'","small class='line-through paragraphcolortext fontsize16'");
                        ?>
                                </div>
                            </div>
                        </div>
                    <?php }?>
                </div>
                <?php if($links != ""){?>
                <div class="col-lg-12 my-4 d-lg-flex d-block text-center text-lg-left justify-content-between align-items-center">
                    <h5 class="mb-4 mb-lg-0"><?php echo $paging;?></h5>
                    <?php echo $links;?>
             
                </div>
                <?php }?>
            </div>
        <?php }else{
        if($nocat){?>
            <div class="main-container">
                <div class="alert alert-warning">
                    <strong><i class="fa fa-exclamation-triangle"></i></strong> No products were found matching your selection.
                </div>

            </div>
        <?php }}?>
    </section>
    <?php if(isset($feature1) && $feature1 != ""){echo $feature1;}?>
    <?php if(isset($feature2) && $feature2 != ""){echo $feature2;}?>
    <?php if(isset($content) && $content != ""){echo $content;}?>
    <?php }?>
    
	<?php
    echo $footer;
    echo $scripts;
    ?>
  </body>
</html>