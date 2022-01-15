<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php echo $head;?>
</head>
<body onload="myFunction()">
    <?php 
    echo $header;
    echo $banner;
    ?>
    <section class="cat-content">
        <div class="main-container2">
                <div class="col-lg-12">
                    <?php if($this->session->flashdata('success') != ''){ ?>
                            <div class="alert alert-success" role="alert">
                              <?php echo $this->session->flashdata('success'); ?>
                            </div>
                    <?php } ?>
                </div>              
            <?php
            if(!isset($products) || $products == "" || empty($products)){
            ?>
            <div class="alert alert-warning">
                <strong><i class="fa fa-exclamation-triangle"></i></strong> No products were found matching your selection.
            </div>
            <?php }?>

            <div class="row">
            <?php
            if(isset($products) && $products != "" && !empty($products)){
                foreach($products as $product){
            ?>
                    <div class="col-xl-3 col-lg-3 px-4 m-t-10 m-b-20">
                        <div class="card product-hvr overflow-hidden text-center h-100">
                            <a href="<?php echo base_url("product/".$product->slug);?>" class="my-3"> <img class="img-fluid" src="<?php echo base_url()."uploads/products/small/".$product->image;?>" alt=""></a>
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
                            <h5 class="text-left"><a class="fontwieghtbold blusecolortext d-block fontsize18" href="<?php echo base_url("product/".$product->slug);?>"><?=$product->title;?></a></h5>
                            <div class="align-items-center m-t-15 w-100 d-flex justify-content-between">
                                <!--<?php $prdprices = getuserprdprice($product->id); ?>-->
                                <!--<div class="fontwieghtbold fontsize24 greencolortext"><?php  echo $prodnewprice = $prdprices["new_price"]; ?></div>-->
                                <!--<div class="fontsize18 paragraphcolortext line-through"><?php echo $prodoldprice = $prdprices["old_price"];;?></div>-->
                                <?php
                        $tdtdprices = getuserprdprice($product->id);
                        echo geteasyprodprice($product->id,"h3 class='fontwieghtbold fontsize30 greencolortext d-flex justify-content-between align-items-center w-100'","small class='line-through paragraphcolortext fontsize16'");
                        ?>
                            </div>
                        </div>
                    </div>
            <?php }}?>
            <?php if($links != ""){?>
                <div class="col-lg-12 my-4 d-lg-flex d-block text-center text-lg-left justify-content-between align-items-center">
                    <h5 class="mb-4 mb-lg-0"><?php echo $paging;?></h5>
                    <?php echo $links;?>
             
                </div>
            <?php }?>
            </div>
        </div>
    </section>

	<?php if(isset($content) && $content != ""){echo $content;}?>
	<?php
    echo $footer;
    echo $scripts;
    ?>
  </body>
</html>