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
	if(isset($blogs)){?>
        <div class="p-b-60 position-relative">
            <div class="main-container2">
                <div class="row">
                    <div class="col-xl-9 col-lg-9 col-md-7">
                        <div class="row m-b-50 position-relative">
                        <?php
                        if($blogs){
                        foreach($blogs as $blog){
                        ?>

                            <div class="col-lg-4 m-t-50">
                                <div class="card d-block h-100 p-0 overflow-hidden">
                                    <div class="m-b-20 text-center"><a href="<?php echo getSeoLink("blogs",$blog->id);?>">
                            <?php if($blog->thumbnail != ""){?><img style="width:400px; height:300px;" src="<?php echo base_url("uploads/blog/".$blog->thumbnail);?>" class="img-fluid" alt="">
                                <?php }?></a></div>
                                    <div class="p-3">
                                        <h6 class="m-b-10"><small class="d-block fontsize14 paragraphcolortext m-b-10"><?php echo date("M d Y",strtotime($blog->created));?></small> <a href="<?php echo base_url("author/".$blog->author);?>" class="fontsize22 blusecolortext fontwieghtbold"> <?php echo $blog->title;?></a></h6>
                                        <p class="fontsize16 paragraphcolortext"><?php echo $blog->short_detail;?> </p>
                                        <a href="<?php echo getSeoLink("blogs",$blog->id);?>" class="d-block linkd blusecolortext">Read More</a>
                                    </div>
                                </div>
                            </div>
                       <?php }}?>

                    </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-5">
                        <?=$leftmenu;?>
                    </div>
                </div>
            </div>
        </div>

	<?php
	}else{
    ?>
    <section class="news-page">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 col-md-3 col-sm-12">
					<?php echo $leftmenu;?>
				</div>
				<div class="col-lg-9 col-md-9 col-sm-12">
                    <div class="ht-blog-thumbnail">
                        <?php if($content->thumbnail != ""){?>
                        <img class="inner-blog-img img-responsive" src="<?php echo base_url("uploads/blog/".$content->thumbnail);?>" alt="<?php echo $content->title;?>">
                        <?php }?>
					</div>
					<div class="ht-blog">
						<h2><?php echo $content->title;?></h2>
						<div class="blog-click">
							<div class="col-lg-4 col-md-4 col-sm-4">
								<a href="#"><i class="fa fa-clipboard"></i> <?php echo getValuee("name","users","username",$content->author);?></a>
							</div>
							<div class="col-lg-4 col-md-4 col-sm-4">
								<i class="fa fa-calendar"></i>  <?php echo date("M d Y",strtotime($content->created));?>
							</div>
						</div>
						<?php echo getblog($content->id);?>
					</div>
				</div>
			</div>
		</div>
    </section>
	<?php
	}
    echo $footer;
    echo $scripts;
    ?>
</body>
</html>