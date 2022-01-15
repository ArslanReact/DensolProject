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

    <div class="p-b-40 position-relative">
        <div class="main-container2">
            <div class="row">
                <div class="col-xl-9 col-lg-9 col-md-7">
                    <div class="row position-relative">
                        <div class="col-lg-12">
                            <div class="card p-0 overflow-hidden m-b-30">
                                <div class="m-b-20 text-center item-media"><a >
                                        <?php if($content->thumbnail != ""){?><img src="<?php echo base_url("uploads/blog/".$content->thumbnail);?>" class="w-100 img-fluid" alt="<?php echo $content->title;?>">
                                        <?php }?>
                                    </a></div>
                                <div class="p-3">
                                    <h6 class="m-b-20"><small class="d-block fontsize14 paragraphcolortext m-b-10"><?php echo date("M d Y",strtotime($content->created));?></small> <a  class="fontsize22 blusecolortext fontwieghtbold"> <?php echo $content->title;?></a></h6>
                                    <?php echo html_entity_decode($content->content);?>
                                    <div class="mt-4 d-flex justify-content-between align-items-center">
                                        <div class="">
                                            <h6 class="fontsize16 fontwieghtbold blackcolortext">Author</h6>
                                            <a href="" class="d-block mt-md-3"><i class="fontsize22 paragraphcolortext far fa-user"></i> <?php echo getValuee("name","users","username",$content->author);?></a>
                                        </div>
                                        <div class="">
                                            <h6 class="fontsize16 fontwieghtbold blackcolortext">Share</h6>
                                            <div class="social mt-md-3">
                                                <a href="" class="paragraphcolorbg d-inline-block mr-2"><i class="fab fa-facebook-f fontsize14 text-white"></i></a>
                                                <a href="" class="paragraphcolorbg d-inline-block mr-2"><i class="fab fa-twitter fontsize14 text-white"></i></a>
                                                <a href="" class="paragraphcolorbg d-inline-block mr-2"><i class="fab fa-linkedin-in fontsize14 text-white"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-5">
                    <?php echo $leftmenu;?>
                </div>
            </div>
        </div>
    </div>
    <?php
    echo $footer;
    echo $scripts;
    ?>
</body>
</html>