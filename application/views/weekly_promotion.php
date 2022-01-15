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
        <title>Weekly Promotion - AR Instrumed</title>
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
<script src="<?php echo base_url();?>files/frontend/js/theme-jquery.min.js"></script>
        <link rel="stylesheet" type="text/css" href="<?=base_url();?>files/frontend/css/owl.carousel.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
        <link href='https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css' rel='stylesheet' type='text/css'>

    </head>
</head>
<body>
<?php include ('includes/header.php');?>

    <div class="blusecolorbg banner-wrap-brecrumbs align-items-center d-flex">
        <div class="main-container2">
            <div class="row align-items-center d-flex">
                <div class="col-xl-12 col-lg-12 col-md-12 m-b-40">
                    <h5 class="text-white text-center fontwieghtbold">Weekly Promotion</h5>
                </div>
                <div class="col-xl-12 col-lg-12 col-md-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb m-0 px-0">
                            <li class="breadcrumb-item"><a class="" href="<?=base_url();?>">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Weekly Promotion</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="my-5">
        <div class="main-container">
            <?php
            $sql = $this->db->query("select * from products where promotion = '1' ORDER BY rand()");
            $n = 0;
            $data = $sql->result();
            if($data){
                foreach($data as $product){
                 $n++;    
                    
            ?>
            <?php if($n == 1){?>
            <div class="row mb-5">
                <div class="col-xl-8 ml-auto mr-auto">
                    <div class="card p-0 overflow-hidden">
                        <div class="d-md-flex d-block no-gutters h-100">
                            <div class="col-md-4 col-12 p-4 text-center"><img class="img-fluid" src="<?php echo base_url()."uploads/products/small/".$product->image;?>" alt=""></div>
                            
                            <div class="col-md-8 col-12 p-4 gradientred">
                                
                                <div class="d-flex align-items-center justify-content-between">
                                    <a href="<?php echo base_url("product/".$product->slug);?>" class="fontsize18 fontwieghtbold linked text-white">Free Shipping</a>
                                    <?php
                                    $ww = $product->id;
                                    $sql = $this->db->query("select * from groups_prices where pid = '".$ww."'");
                                    $data = $sql->result();
                                    foreach($data as $products){
                                        
                                        
                                    ?>
                                    <p class="d-flex text-white text-overline align-items-center"><span><?php if($products->sale_price == 0){ echo '$0.00';}else{ echo '$',$products->price; }?></span> <div class="btn ml-3 fontsize18 goldcolorbg"><?php if($products->sale_price == 0){  echo '$',$products->price; }else{ echo '$',$products->sale_price;}?></div></p>
                                <?php }?>
                                </div>
                                <h5 class="my-4 text-white fontwieghtbold fontsize24"><?=$product->title;?></h5>
                                <?php
$query = $this->db->query("select * from product_specifications where product_id='$ww'");
$result = $query->result_array();
if($result){
foreach($result as $optionprice){
?>
<a href="<?php echo base_url("product/".$product->slug);?>"  class="btn px-4 btn-white fontsize16 fontwieghtbold borderradius50 my-4"><strong><?php echo $optionprice['title']; ?></strong> Qty in just <strong>$<?php echo $optionprice['content']; ?></strong></a>
<?php } } else { ?>
                                <a href="<?php echo base_url("product/".$product->slug);?>" class="btn px-4 btn-white fontsize16 fontwieghtbold borderradius50"><img src="<?=base_url();?>files/frontend/images/basket-black.svg" width="20" alt="" class="mr-2 img-fluid"> Add to Cart</a>
<?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php } else if($n == 2){ ?>
            <div class="row mb-5">
                <div class="col-xl-8 ml-auto mr-auto">
                    <div class="card p-0 overflow-hidden">
                        <div class="d-md-flex d-block no-gutters h-100">
                            <div class="col-md-8 col-12 p-4 gradientgreen">
                                <div class="d-flex align-items-center justify-content-between">
                                    <a href="" class="fontsize18 fontwieghtbold linked text-white">Free Shipping</a>
                                    <?php
                                    $ww = $product->id;
                                    $sql = $this->db->query("select * from groups_prices where pid = '".$ww."'");
                                    $data = $sql->result();
                                    foreach($data as $products){
                                        
                                        
                                    ?>
                                    <p class="d-flex text-white text-overline align-items-center"><?php if($products->sale_price == 0){ echo '$0.00';}else{ echo '$',$products->price; }?> <div class="btn text-overlinenone ml-3 fontsize18 goldcolorbg"><?php if($products->sale_price == 0){  echo '$',$products->price; }else{ echo '$',$products->sale_price;}?></div></p>
                                    <?php }?>
                                </div>
                                <h5 class="my-4 text-white fontwieghtbold fontsize24"><?=$product->title;?></h5>
                                <?php
$query = $this->db->query("select * from product_specifications where product_id='$ww'");
$result = $query->result_array();
if($result){
foreach($result as $optionprice){
?>
<a href="<?php echo base_url("product/".$product->slug);?>"  class="btn px-4 btn-white fontsize16 fontwieghtbold borderradius50 my-4"><strong><?php echo $optionprice['title']; ?></strong> Qty in just <strong>$<?php echo $optionprice['content']; ?></strong></a>
<?php } } else { ?>
                                <a href="<?php echo base_url("product/".$product->slug);?>" class="btn px-4 btn-white fontsize16 fontwieghtbold borderradius50"><img src="<?=base_url();?>files/frontend/images/basket-black.svg" width="20" alt="" class="mr-2 img-fluid"> Add to Cart</a>
<?php } ?>

                            </div>
                            <div class="col-md-4 col-12 p-4 text-center"><img class="img-fluid" src="<?php echo base_url()."uploads/products/small/".$product->image;?>" alt=""></div>
                        </div>
                    </div>
                </div>
            </div>
            <?php } else if($n == 3){?>
            <div class="row mb-5">
                <div class="col-xl-8 ml-auto mr-auto">
                    <div class="card p-0 overflow-hidden">
                        <div class="d-md-flex d-block no-gutters h-100">
                        <div class="col-md-4 col-12 p-4 text-center"><img class="img-fluid" src="<?php echo base_url()."uploads/products/small/".$product->image;?>" alt=""></div>
                            <div class="col-md-8 col-12 p-4 gradientblue">
                                <div class="d-flex align-items-center justify-content-between">
                                    <a href="" class="fontsize18 fontwieghtbold linked text-white">Free Shipping</a>
                                    <?php
                                    $ww = $product->id;
                                    $sql = $this->db->query("select * from groups_prices where pid = '".$ww."'");
                                    $data = $sql->result();
                                    foreach($data as $products){
                                        
                                        
                                    ?>
                                    <p class="d-flex text-white text-overline align-items-center"><?php if($products->sale_price == 0){ echo '$0.00';}else{ echo '$',$products->price; }?> <div class="btn text-overlinenone ml-3 fontsize18 goldcolorbg"><?php if($products->sale_price == 0){  echo '$',$products->price; }else{ echo '$',$products->sale_price;}?></div></p>
                                <?php }?>
                                </div>
                                <h5 class="my-4 text-white fontwieghtbold fontsize24"><?=$product->title;?></h5>
                                <?php
$query = $this->db->query("select * from product_specifications where product_id='$ww'");
$result = $query->result_array();
if($result){
foreach($result as $optionprice){
?>
<a href="<?php echo base_url("product/".$product->slug);?>"  class="btn px-4 btn-white fontsize16 fontwieghtbold borderradius50 my-4"><strong><?php echo $optionprice['title']; ?></strong> Qty in just <strong>$<?php echo $optionprice['content']; ?></strong></a>
<?php } } else { ?>
                                <a href="<?php echo base_url("product/".$product->slug);?>" class="btn px-4 btn-white fontsize16 fontwieghtbold borderradius50"><img src="<?=base_url();?>files/frontend/images/basket-black.svg" width="20" alt="" class="mr-2 img-fluid"> Add to Cart</a>
<?php } ?></div>
                        </div>
                    </div>
                </div>
            </div>
             <?php } else if($n == 4){?>
            <div class="row mb-5">
                <div class="col-xl-8 ml-auto mr-auto">
                    <div class="card p-0 overflow-hidden">
                        <div class="d-md-flex d-block no-gutters h-100">
                            <div class="col-md-8 col-12 p-4 gradientpurple">
                                <div class="d-flex align-items-center justify-content-between">
                                    <a href="<?php echo base_url("product/".$product->slug);?>" class="fontsize18 fontwieghtbold linked text-white">Free Shipping</a>
                                    <?php
                                    $ww = $product->id;
                                    $sql = $this->db->query("select * from groups_prices where pid = '".$ww."'");
                                    $data = $sql->result();
                                    foreach($data as $products){
                                        
                                        
                                    ?>
                                    <p class="d-flex text-white text-overline align-items-center"><?php if($products->sale_price == 0){ echo '$0.00';}else{ echo '$',$products->price; }?> <div class="btn text-overlinenone ml-3 fontsize18 goldcolorbg"><?php if($products->sale_price == 0){  echo '$',$products->price; }else{ echo '$',$products->sale_price;}?></div></p>
                                    <?php }?>
                                </div>
                                <h5 class="my-4 text-white fontwieghtbold fontsize24"><?=$product->title;?></h5>
                                <?php
$query = $this->db->query("select * from product_specifications where product_id='$ww'");
$result = $query->result_array();
if($result){
foreach($result as $optionprice){
?>
<a href="<?php echo base_url("product/".$product->slug);?>"  class="btn px-4 btn-white fontsize16 fontwieghtbold borderradius50 my-4"><strong><?php echo $optionprice['title']; ?></strong> Qty in just <strong>$<?php echo $optionprice['content']; ?></strong></a>
<?php } } else { ?>
                                <a href="<?php echo base_url("product/".$product->slug);?>" class="btn px-4 btn-white fontsize16 fontwieghtbold borderradius50"><img src="<?=base_url();?>files/frontend/images/basket-black.svg" width="20" alt="" class="mr-2 img-fluid"> Add to Cart</a>
<?php } ?></div>
                            <div class="col-md-4 col-12 p-4 text-center"><img class="img-fluid" src="<?php echo base_url()."uploads/products/small/".$product->image;?>" alt=""></div>
                        </div>
                    </div>
                </div>
            </div>
             <?php } else if($n == 5){?>
            <div class="row mb-5">
                <div class="col-xl-8 ml-auto mr-auto">
                    <div class="card p-0 overflow-hidden">
                        <div class="d-md-flex d-block no-gutters h-100">
                            <div class="col-md-4 col-12 p-4 text-center"><img class="img-fluid" src="<?php echo base_url()."uploads/products/small/".$product->image;?>" alt=""></div>
                            
                            <div class="col-md-8 col-12 p-4 gradientred">
                                
                                <div class="d-flex align-items-center justify-content-between">
                                    <a href="<?php echo base_url("product/".$product->slug);?>" class="fontsize18 fontwieghtbold linked text-white">Free Shipping</a>
                                    <?php
                                    $ww = $product->id;
                                    $sql = $this->db->query("select * from groups_prices where pid = '".$ww."'");
                                    $data = $sql->result();
                                    foreach($data as $products){
                                        
                                        
                                    ?>
                                    <p class="d-flex text-white text-overline align-items-center"><span><?php if($products->sale_price == 0){ echo '$0.00';}else{ echo '$',$products->price; }?></span> <div class="btn ml-3 fontsize18 goldcolorbg"><?php if($products->sale_price == 0){  echo '$',$products->price; }else{ echo '$',$products->sale_price;}?></div></p>
                                <?php }?>
                                </div>
                                <h5 class="my-4 text-white fontwieghtbold fontsize24"><?=$product->title;?></h5>
                                <?php
$query = $this->db->query("select * from product_specifications where product_id='$ww'");
$result = $query->result_array();
if($result){
foreach($result as $optionprice){
?>
<a href="<?php echo base_url("product/".$product->slug);?>"  class="btn px-4 btn-white fontsize16 fontwieghtbold borderradius50 my-4"><strong><?php echo $optionprice['title']; ?></strong> Qty in just <strong>$<?php echo $optionprice['content']; ?></strong></a>
<?php } } else { ?>
                                <a href="<?php echo base_url("product/".$product->slug);?>" class="btn px-4 btn-white fontsize16 fontwieghtbold borderradius50"><img src="<?=base_url();?>files/frontend/images/basket-black.svg" width="20" alt="" class="mr-2 img-fluid"> Add to Cart</a>
<?php } ?></div>
                        </div>
                    </div>
                </div>
            </div>
             <?php } else if($n == 6){?>
            <div class="row mb-5">
                <div class="col-xl-8 ml-auto mr-auto">
                    <div class="card p-0 overflow-hidden">
                        <div class="d-md-flex d-block no-gutters h-100">
                            <div class="col-md-8 col-12 p-4 gradientgreen">
                                <div class="d-flex align-items-center justify-content-between">
                                    <a href="" class="fontsize18 fontwieghtbold linked text-white">Free Shipping</a>
                                    <?php
                                    $ww = $product->id;
                                    $sql = $this->db->query("select * from groups_prices where pid = '".$ww."'");
                                    $data = $sql->result();
                                    foreach($data as $products){
                                        
                                        
                                    ?>
                                    <p class="d-flex text-white text-overline align-items-center"><?php if($products->sale_price == 0){ echo '$0.00';}else{ echo '$',$products->price; }?> <div class="btn text-overlinenone ml-3 fontsize18 goldcolorbg"><?php if($products->sale_price == 0){  echo '$',$products->price; }else{ echo '$',$products->sale_price;}?></div></p>
                                    <?php }?>
                                </div>
                                <h5 class="my-4 text-white fontwieghtbold fontsize24"><?=$product->title;?></h5>
                                <?php
$query = $this->db->query("select * from product_specifications where product_id='$ww'");
$result = $query->result_array();
if($result){
foreach($result as $optionprice){
?>
<a href="<?php echo base_url("product/".$product->slug);?>"  class="btn px-4 btn-white fontsize16 fontwieghtbold borderradius50 my-4"><strong><?php echo $optionprice['title']; ?></strong> Qty in just <strong>$<?php echo $optionprice['content']; ?></strong></a>
<?php } } else { ?>
                                <a href="<?php echo base_url("product/".$product->slug);?>" class="btn px-4 btn-white fontsize16 fontwieghtbold borderradius50"><img src="<?=base_url();?>files/frontend/images/basket-black.svg" width="20" alt="" class="mr-2 img-fluid"> Add to Cart</a>
<?php } ?></div>
                            <div class="col-md-4 col-12 p-4 text-center"><img class="img-fluid" src="<?php echo base_url()."uploads/products/small/".$product->image;?>" alt=""></div>
                        </div>
                    </div>
                </div>
            </div>
             <?php } else if($n == 7){?>
             <div class="row mb-5">
                <div class="col-xl-8 ml-auto mr-auto">
                    <div class="card p-0 overflow-hidden">
                        <div class="d-md-flex d-block no-gutters h-100">
                        <div class="col-md-4 col-12 p-4 text-center"><img class="img-fluid" src="<?php echo base_url()."uploads/products/small/".$product->image;?>" alt=""></div>
                            <div class="col-md-8 col-12 p-4 gradientblue">
                                <div class="d-flex align-items-center justify-content-between">
                                    <a href="" class="fontsize18 fontwieghtbold linked text-white">Free Shipping</a>
                                    <?php
                                    $ww = $product->id;
                                    $sql = $this->db->query("select * from groups_prices where pid = '".$ww."'");
                                    $data = $sql->result();
                                    foreach($data as $products){
                                        
                                        
                                    ?>
                                    <p class="d-flex text-white text-overline align-items-center"><?php if($products->sale_price == 0){ echo '$0.00';}else{ echo '$',$products->price; }?> <div class="btn text-overlinenone ml-3 fontsize18 goldcolorbg"><?php if($products->sale_price == 0){  echo '$',$products->price; }else{ echo '$',$products->sale_price;}?></div></p>
                                <?php }?>
                                </div>
                                <h5 class="my-4 text-white fontwieghtbold fontsize24"><?=$product->title;?></h5>
                                <?php
$query = $this->db->query("select * from product_specifications where product_id='$ww'");
$result = $query->result_array();
if($result){
foreach($result as $optionprice){
?>
<a href="<?php echo base_url("product/".$product->slug);?>"  class="btn px-4 btn-white fontsize16 fontwieghtbold borderradius50 my-4"><strong><?php echo $optionprice['title']; ?></strong> Qty in just <strong>$<?php echo $optionprice['content']; ?></strong></a>
<?php } } else { ?>
                                <a href="<?php echo base_url("product/".$product->slug);?>" class="btn px-4 btn-white fontsize16 fontwieghtbold borderradius50"><img src="<?=base_url();?>files/frontend/images/basket-black.svg" width="20" alt="" class="mr-2 img-fluid"> Add to Cart</a>
<?php } ?></div>
                        </div>
                    </div>
                </div>
            </div>
             <?php } else if($n == 8){?>
            <div class="row mb-5">
                <div class="col-xl-8 ml-auto mr-auto">
                    <div class="card p-0 overflow-hidden">
                        <div class="d-md-flex d-block no-gutters h-100">
                            <div class="col-md-8 col-12 p-4 gradientpurple">
                                <div class="d-flex align-items-center justify-content-between">
                                    <a href="<?php echo base_url("product/".$product->slug);?>" class="fontsize18 fontwieghtbold linked text-white">Free Shipping</a>
                                    <?php
                                    $ww = $product->id;
                                    $sql = $this->db->query("select * from groups_prices where pid = '".$ww."'");
                                    $data = $sql->result();
                                    foreach($data as $products){
                                        
                                        
                                    ?>
                                    <p class="d-flex text-white text-overline align-items-center"><?php if($products->sale_price == 0){ echo '$0.00';}else{ echo '$',$products->price; }?> <div class="btn text-overlinenone ml-3 fontsize18 goldcolorbg"><?php if($products->sale_price == 0){  echo '$',$products->price; }else{ echo '$',$products->sale_price;}?></div></p>
                                    <?php }?>
                                </div>
                                <h5 class="my-4 text-white fontwieghtbold fontsize24"><?=$product->title;?></h5>
                                <?php
$query = $this->db->query("select * from product_specifications where product_id='$ww'");
$result = $query->result_array();
if($result){
foreach($result as $optionprice){
?>
<a href="<?php echo base_url("product/".$product->slug);?>"  class="btn px-4 btn-white fontsize16 fontwieghtbold borderradius50 my-4"><strong><?php echo $optionprice['title']; ?></strong> Qty in just <strong>$<?php echo $optionprice['content']; ?></strong></a>
<?php } } else { ?>
                                <a href="<?php echo base_url("product/".$product->slug);?>" class="btn px-4 btn-white fontsize16 fontwieghtbold borderradius50"><img src="<?=base_url();?>files/frontend/images/basket-black.svg" width="20" alt="" class="mr-2 img-fluid"> Add to Cart</a>
<?php } ?></div>
                            <div class="col-md-4 col-12 p-4 text-center"><img class="img-fluid" src="<?php echo base_url()."uploads/products/small/".$product->image;?>" alt=""></div>
                        </div>
                    </div>
                </div>
            </div>
            <?php } else if($n == 9){?>
            <div class="row mb-5">
                <div class="col-xl-8 ml-auto mr-auto">
                    <div class="card p-0 overflow-hidden">
                        <div class="d-md-flex d-block no-gutters h-100">
                            <div class="col-md-4 col-12 p-4 text-center"><img class="img-fluid" src="<?php echo base_url()."uploads/products/small/".$product->image;?>" alt=""></div>
                            
                            <div class="col-md-8 col-12 p-4 gradientred">
                                
                                <div class="d-flex align-items-center justify-content-between">
                                    <a href="<?php echo base_url("product/".$product->slug);?>" class="fontsize18 fontwieghtbold linked text-white">Free Shipping</a>
                                    <?php
                                    $ww = $product->id;
                                    $sql = $this->db->query("select * from groups_prices where pid = '".$ww."'");
                                    $data = $sql->result();
                                    foreach($data as $products){
                                        
                                        
                                    ?>
                                    <p class="d-flex text-white text-overline align-items-center"><span><?php if($products->sale_price == 0){ echo '$0.00';}else{ echo '$',$products->price; }?></span> <div class="btn ml-3 fontsize18 goldcolorbg"><?php if($products->sale_price == 0){  echo '$',$products->price; }else{ echo '$',$products->sale_price;}?></div></p>
                                <?php }?>
                                </div>
                                <h5 class="my-4 text-white fontwieghtbold fontsize24"><?=$product->title;?></h5>
                                <?php
$query = $this->db->query("select * from product_specifications where product_id='$ww'");
$result = $query->result_array();
if($result){
foreach($result as $optionprice){
?>
<a href="<?php echo base_url("product/".$product->slug);?>"  class="btn px-4 btn-white fontsize16 fontwieghtbold borderradius50 my-4"><strong><?php echo $optionprice['title']; ?></strong> Qty in just <strong>$<?php echo $optionprice['content']; ?></strong></a>
<?php } } else { ?>
                                <a href="<?php echo base_url("product/".$product->slug);?>" class="btn px-4 btn-white fontsize16 fontwieghtbold borderradius50"><img src="<?=base_url();?>files/frontend/images/basket-black.svg" width="20" alt="" class="mr-2 img-fluid"> Add to Cart</a>
<?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php } else if($n == 10){?>
            <div class="row mb-5">
                <div class="col-xl-8 ml-auto mr-auto">
                    <div class="card p-0 overflow-hidden">
                        <div class="d-md-flex d-block no-gutters h-100">
                            <div class="col-md-8 col-12 p-4 gradientgreen">
                                <div class="d-flex align-items-center justify-content-between">
                                    <a href="" class="fontsize18 fontwieghtbold linked text-white">Free Shipping</a>
                                    <?php
                                    $ww = $product->id;
                                    $sql = $this->db->query("select * from groups_prices where pid = '".$ww."'");
                                    $data = $sql->result();
                                    foreach($data as $products){
                                        
                                        
                                    ?>
                                    <p class="d-flex text-white text-overline align-items-center"><?php if($products->sale_price == 0){ echo '$0.00';}else{ echo '$',$products->price; }?> <div class="btn text-overlinenone ml-3 fontsize18 goldcolorbg"><?php if($products->sale_price == 0){  echo '$',$products->price; }else{ echo '$',$products->sale_price;}?></div></p>
                                    <?php }?>
                                </div>
                                <h5 class="my-4 text-white fontwieghtbold fontsize24"><?=$product->title;?></h5>
                                <?php
$query = $this->db->query("select * from product_specifications where product_id='$ww'");
$result = $query->result_array();
if($result){
foreach($result as $optionprice){
?>
<a href="<?php echo base_url("product/".$product->slug);?>"  class="btn px-4 btn-white fontsize16 fontwieghtbold borderradius50 my-4"><strong><?php echo $optionprice['title']; ?></strong> Qty in just <strong>$<?php echo $optionprice['content']; ?></strong></a>
<?php } } else { ?>
                                <a href="<?php echo base_url("product/".$product->slug);?>" class="btn px-4 btn-white fontsize16 fontwieghtbold borderradius50"><img src="<?=base_url();?>files/frontend/images/basket-black.svg" width="20" alt="" class="mr-2 img-fluid"> Add to Cart</a>
<?php } ?>

                            </div>
                            <div class="col-md-4 col-12 p-4 text-center"><img class="img-fluid" src="<?php echo base_url()."uploads/products/small/".$product->image;?>" alt=""></div>
                        </div>
                    </div>
                </div>
            </div>
            <?php } ?>             
            <?php }}?>
            
            
            
        </div>
    </div>
<?php include ('includes/footer.php');?>
<?php include ('includes/index_scripts.php');?>
  </body>
</html>