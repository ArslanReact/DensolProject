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
    ?>

    <div class="blusecolorbg banner-wrap-brecrumbs m-b-40 align-items-center d-flex">
        <div class="main-container2">
            <div class="row align-items-center d-flex">
                <div class="col-xl-12 col-lg-12 col-md-12 m-b-40">
                    <h5 class="text-white text-center fontwieghtbold">Shop</h5>
                </div>
                <div class="col-xl-12 col-lg-12 col-md-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb m-0 px-0">
                            <li class="breadcrumb-item"><a class="" href="<?=base_url();?>">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Shop</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <section class="products my-5">


            <div class="main-container2">
                <div class="row">
                    <?php
                    $ia = 1;
                    $modems = $this->db->query("select * from products where is_active = '".$ia."' limit 600");

                    if($modems){
                    foreach ($modems->result() as $product){
                    ?>
                        <div class="col-xl-3 col-lg-3 px-4 m-t-10 m-b-20">
                            <div class="card overflow-hidden text-center">
                                <a href="<?php echo base_url("product/".$product->slug);?>"> <img class="img-fluid" src="<?php echo base_url()."uploads/products/small/".$product->image;?>" alt=""></a>
                                <div class="btn-plus d-block"><a href="" class=""><i class="fas fa-plus"></i></a></div>
                                <h5 class="text-left"><a class="fontwieghtbold blusecolortext d-block fontsize18" href="<?php echo base_url("product/".$product->slug);?>"><?=$product->title;?></a></h5>
                                <div class="align-items-center m-t-15 w-100 d-flex justify-content-between">
                                    <?php $prdprices = getuserprdprice($product->id); ?>
                                    <div class="fontwieghtbold fontsize24 greencolortext"><?php  echo $prodnewprice = $prdprices["new_price"]; ?></div>
                                    <div class="fontsize18 paragraphcolortext line-through"><?php echo $prodoldprice = $prdprices["old_price"];;?></div>
                                </div>
                            </div>
                        </div>
                    <?php }?>
                </div>
               
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

    
	<?php
    echo $footer;
    echo $scripts;
    ?>
  </body>
</html>