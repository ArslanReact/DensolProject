<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

?>

<!DOCTYPE html>

<html lang="en">

<head>

    <?php echo $head;?>
    <?php echo "---".$banner."---";?>

</head>

<body>

    <?php 
    echo $header;
    if($product->image != ""){
        $largeimg = NOSTORE_URLLINK."uploads/products/".$product->image;
    }else{
        $largeimg = NOSTORE_URLLINK."files/frontend/images/blank.jpg";
    }
    if (strpos($product->title, ' ') !== false) {
        $prdname_part = explode(" ",$product->title,2);
        $producttitlehere = '<strong>'.$prdname_part[0].'</strong> '.$prdname_part[1];
    }else{
        $producttitlehere = '<strong>'.$product->title.'</strong>';
    }
    ?>

    <section class="product-page">
  		<div class="main-container">
  			<div class="row">
  				<div class="text-center col-lg-5 col-md-5 col-sm-12 img-space text-left">
                    <img id="lImg" class="img-responsive mainlgimg" src="<?php echo $largeimg;?>" alt="<?php echo $product->title;?>">
                    <?php
                    $mviews = getmoreviews($product->id);
                    if(!empty($mviews)){
                    ?>
                    <div class="row">
                        <div class="slider525more extraelm" style="margin-top:20px;">
                            <div class="morevv">
                                <a style="cursor:pointer" onclick="changeImage('<?php echo $largeimg;?>');">
                                    <div class="catbox">
                                        <img src="<?php echo NOSTORE_URLLINK."uploads/products/small/".$product->image;?>" class="center-block img-responsive">
                                    </div>
                                </a>
                            </div>
                            <?php foreach($mviews as $mview){?>
                            <div class="morevv">
                                <a style="cursor:pointer" onclick="changeImage('<?php echo NOSTORE_URLLINK.'uploads/products/moreviews/'.$mview->image;?>');">
                                    <div class="catbox">
                                        <img src="<?php echo NOSTORE_URLLINK."uploads/products/moreviews/small/".$mview->image;?>" class="center-block img-responsive">
                                    </div>
                                </a>
                            </div>
                            <?php }?>
                        </div>
                    </div>
                    <?php }?>
                </div>
  				<div class="col-lg-7 col-md-7 col-sm-12">
  					<div class="product-detail">
  						<h1><?php echo $producttitlehere;?></h1>
  						<?php echo cleanOut($product->full_detail);?>
  						<a href="#" id="readbtn" class="btn btn-info">Read More</a>
  						<a href="#" id="contactbtn" class="btn btn-info">Contact Us</a>
  					</div>
  				</div>
  			</div>
  		</div>
	</section>
	<section class="product-servises">
  		<div class="main-container">
  			<div class="row">
  				<div class="col-md-4 col-sm-4 col-xs-12">
  					<div class="servises-box-wrap">
  						<div class="servises-circle"><span class="fa fa-truck"></span></div>
  						<h3>Free Shipping<br><span>In Australia</span></h3>
  					</div>
  				</div>
  				<div class="col-md-4 col-sm-4 col-xs-12">
  					<div class="servises-box-wrap active">
  						<div class="servises-circle"><span class="fa fa-phone"></span></div>
  						<h3>Buyer Support<br><span>Mon-Fri 9.00AM-5.00PM</span></h3>
  					</div>
  				</div>
  				<div class="col-md-4 col-sm-4 col-xs-12">
  					<div class="servises-box-wrap">
  						<div class="servises-circle"><span class="fa fa-support"></span></div>
  						<h3>Total Security<br><span>Secure checkout</span></h3>
  					</div>
  				</div>
  			</div>
  		</div>
    </section>
    
	<section class="graph-sec">
  		<div class="main-container">
          <div class="panel with-nav-tabs">

<div class="panel-heading">

    <ul class="nav nav-tabs" id="mytabs">

        <?php if($form_action || empty($sel_specs)){$mainac = "";$maincon = "";$conac = "active";$concon = "in active";}else{$mainac = "active";$maincon = "in active";$conac = "";$concon = "";}?>

        <?php if(!empty($sel_specs)){

        $xc=1;

        foreach($sel_specs as $sel_spec){?>

        <li class="<?php if($xc==1){echo $mainac;}?>"><a href="#tabprimary<?php echo $sel_spec->id;?>" data-toggle="tab"><?php echo $sel_spec->title;?></a></li>

        <?php $xc++;}}?>

        <li class="<?php echo $conac;?>"><a href="#tab3primary" data-toggle="tab">Contact Us</a></li>

    </ul>

</div>

<div class="panel-body">

    <div class="tab-content lgpagecms">

        <?php if(!empty($sel_specs)){

        $xcc=1;

        foreach($sel_specs as $sel_spec){?>

        <div class="tab-pane fade <?php if($xcc==1){echo $maincon;}?>" id="tabprimary<?php echo $sel_spec->id;?>">

            <?php echo cleanOut($sel_spec->content);?>

        </div>

        <?php $xcc++;}}?>

        <div class="tab-pane fade <?php echo $concon;?>" id="tab3primary">

        <?php if(isset($cform)){echo $cform;}?>

        </div>

    </div>

</div>

</div>
  		</div>
  	</section>
      
    <section id="products" class="m-t-50 bg-2">

        <div class="noch">&nbsp;</div>

        <div class="main-container">

            <div class="row">

                <div class="main-head text-center  fadeInUp wow  animated" style="visibility: visible; animation-name: fadeInUp;">

                    <h2>Related <strong> Products</strong></h2>

                </div>

            </div>

            <div class="row mt-90 text-center">

                <div class="slider25252">

                    <?php

                    $rel_prds = getRelatedprd($product->id);

                    if(!empty($rel_prds)){

                    foreach($rel_prds as $rel_prd){

                    if($rel_prd->id != $product->id){

                    ?>

                    <div class="prdd">

                        <a href="<?php echo base_url("product/".$rel_prd->article);?>">

                            <div class="catbox">

                                <img src="<?php echo NOSTORE_URLLINK."uploads/products/small/".$rel_prd->image;?>" class="center-block">

                                <h4><?php echo $rel_prd->title;?></h4>

                            </div>

                        </a>

                    </div>

                    <?php }}}?>

                </div>  

            </div>

        </div>

    </section>

	<?php
    echo $footer;

    echo $scripts;

    ?>

  </body>

</html>