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
    <section class="news-page">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 col-md-3 col-sm-12">
                    <?php echo $leftmenu;?>
                </div>
				<div class="col-lg-9 col-md-9 col-sm-12">
                    <div class="row">
                        <div class="col-lg-4">
                            <img src="<?php echo base_url("uploads/pages/".$cms->thumbnail);?>" class="img-responsive center-block" alt="<?php echo $cms->title;?>">
                        </div>
                        <div class="col-lg-8">
                            <h2><?php echo $cms->title;?></h2>
                            <?php echo cleanOut($cms->content);?>
                            <p><em>Choose the option to change the product</em></p>
                            <div class="selectbbx">
                            <?php echo tecShortcodes(cleanOut("[[tec_cms main=75 templete=12]]"),false);?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                    <div class="col-lg-12 drivercoll m-t-20">
                        <div class="bs-example">
                            <div class="accordion" id="accordionExample">
                                <div class="card">
                                    <div class="card-header" id="headingOne">
                                        <h2 class="mb-0">
                                            <button type="button" class="btn btn-link" data-toggle="collapse" data-target="#documentation"><i class="fa fa-minus"></i> Documentation</button>									
                                        </h2>
                                    </div>
                                    <div id="documentation" class="collapse in" aria-labelledby="headingOne" data-parent="#accordionExample">
                                        <div class="card-body">
                                            <?php
                                            if(!empty($sel_docs)){
                                                echo '<ul>';
                                                if (strpos($sel_docs[0]->content, ',') !== false) {
                                                    $docs = explode(",",$sel_docs[0]->content);
                                                    foreach($docs as $doc){
                                                        echo '<li><i class="fa fa-download"></i> <a target="_blank" href="'.base_url("uploads/gallery/".getValuee("file","gallery","id",$doc)).'">'.getValuee("title","gallery","id",$doc).'</a></li>';
                                                    }
                                                }else{
                                                    echo '<li><i class="fa fa-download"></i> <a target="_blank" href="'.base_url("uploads/gallery/".getValuee("file","gallery","id",$sel_docs[0]->content)).'">'.getValuee("title","gallery","id",$sel_docs[0]->content).'</a></li>';
                                                }
                                                echo '</ul>';
                                            }else{
                                                echo '<p>No record found!</p>';
                                            }?>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" id="headingOne2">
                                        <h2 class="mb-0">
                                            <button type="button" class="btn btn-link" data-toggle="collapse" data-target="#firmwareupdates"><i class="fa fa-plus"></i> Firmware Updates</button>									
                                        </h2>
                                    </div>
                                    <div id="firmwareupdates" class="collapse" aria-labelledby="headingOne2" data-parent="#accordionExample">
                                        <div class="card-body">
                                            <?php
                                            if(!empty($sel_updates)){
                                                echo '<ul>';
                                                if (strpos($sel_updates[0]->content, ',') !== false) {
                                                    $docs = explode(",",$sel_updates[0]->content);
                                                    foreach($docs as $doc){
                                                        echo '<li><i class="fa fa-download"></i> <a target="_blank" href="'.base_url("uploads/gallery/".getValuee("file","gallery","id",$doc)).'">'.getValuee("title","gallery","id",$doc).'</a></li>';
                                                    }
                                                }else{
                                                    echo '<li><i class="fa fa-download"></i> <a target="_blank" href="'.base_url("uploads/gallery/".getValuee("file","gallery","id",$sel_updates[0]->content)).'">'.getValuee("title","gallery","id",$sel_updates[0]->content).'</a></li>';
                                                }
                                                echo '</ul>';
                                            }else{
                                                echo '<p>No record found!</p>';
                                            }?>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" id="headingOne3">
                                        <h2 class="mb-0">
                                            <button type="button" class="btn btn-link" data-toggle="collapse" data-target="#drivers"><i class="fa fa-plus"></i> Drivers</button>									
                                        </h2>
                                    </div>
                                    <div id="drivers" class="collapse" aria-labelledby="headingOne3" data-parent="#accordionExample">
                                        <div class="card-body">
                                            <?php
                                            if(!empty($sel_drivers)){
                                                echo '<ul>';
                                                if (strpos($sel_drivers[0]->content, ',') !== false) {
                                                    $docs = explode(",",$sel_drivers[0]->content);
                                                    foreach($docs as $doc){
                                                        echo '<li><i class="fa fa-download"></i> <a target="_blank" href="'.base_url("uploads/gallery/".getValuee("file","gallery","id",$doc)).'">'.getValuee("title","gallery","id",$doc).'</a></li>';
                                                    }
                                                }else{
                                                    echo '<li><i class="fa fa-download"></i> <a target="_blank" href="'.base_url("uploads/gallery/".getValuee("file","gallery","id",$sel_drivers[0]->content)).'">'.getValuee("title","gallery","id",$sel_drivers[0]->content).'</a></li>';
                                                }
                                                echo '</ul>';
                                            }else{
                                                echo '<p>No record found!</p>';
                                            }?>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" id="headingOne4">
                                        <h2 class="mb-0">
                                            <button type="button" class="btn btn-link" data-toggle="collapse" data-target="#application"><i class="fa fa-plus"></i> Sample Applications</button>									
                                        </h2>
                                    </div>
                                    <div id="application" class="collapse" aria-labelledby="headingOne4" data-parent="#accordionExample">
                                        <div class="card-body">
                                            <?php
                                            if(!empty($sel_apps)){
                                                echo '<ul>';
                                                if (strpos($sel_apps[0]->content, ',') !== false) {
                                                    $docs = explode(",",$sel_apps[0]->content);
                                                    foreach($docs as $doc){
                                                        echo '<li><i class="fa fa-download"></i> <a target="_blank" href="'.base_url("uploads/gallery/".getValuee("file","gallery","id",$doc)).'">'.getValuee("title","gallery","id",$doc).'</a></li>';
                                                    }
                                                }else{
                                                    echo '<li><i class="fa fa-download"></i> <a target="_blank" href="'.base_url("uploads/gallery/".getValuee("file","gallery","id",$sel_apps[0]->content)).'">'.getValuee("title","gallery","id",$sel_apps[0]->content).'</a></li>';
                                                }
                                                echo '</ul>';
                                            }else{
                                                echo '<p>No record found!</p>';
                                            }?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
				</div>
            </div>
		</div>
    </section>
    <?php
    echo $footer;
    echo $scripts;
    ?>
    
<script>
    $(document).ready(function(){
        // Add minus icon for collapse element which is open by default
        $(".collapse.show").each(function(){
        	$(this).prev(".card-header").find(".fa").addClass("fa-minus").removeClass("fa-plus");
        });
        
        // Toggle plus minus icon on show hide of collapse element
        $(".collapse").on('show.bs.collapse', function(){
        	$(this).prev(".card-header").find(".fa").removeClass("fa-plus").addClass("fa-minus");
        }).on('hide.bs.collapse', function(){
        	$(this).prev(".card-header").find(".fa").removeClass("fa-minus").addClass("fa-plus");
        });

        $('.drdr').click(function(){
            $('.collapse').removeClass('in');
            $('.collapse').prev(".card-header").find(".fa").removeClass("fa-minus").addClass("fa-plus");
            if(!$("#drivers").hasClass("in")) {
                $("#drivers").addClass('in');
                $('#drivers').prev(".card-header").find(".fa").removeClass("fa-plus").addClass("fa-minus");
            }
            $('html,body').animate({scrollTop: $("#drivers").offset().top-170},'slow');
        });
        $('.upup').click(function(){
            $('.collapse').removeClass('in');
            $('.collapse').prev(".card-header").find(".fa").removeClass("fa-minus").addClass("fa-plus");
            if(!$("#firmwareupdates").hasClass("in")) {
                $("#firmwareupdates").addClass('in');
                $('#firmwareupdates').prev(".card-header").find(".fa").removeClass("fa-plus").addClass("fa-minus");
            }
            $('html,body').animate({scrollTop: $("#firmwareupdates").offset().top-170},'slow');
        });
        $('.dodo').click(function(){
            $('.collapse').removeClass('in');
            $('.collapse').prev(".card-header").find(".fa").removeClass("fa-minus").addClass("fa-plus");
            if(!$("#documentation").hasClass("in")) {
                $("#documentation").addClass('in');
                $('#documentation').prev(".card-header").find(".fa").removeClass("fa-plus").addClass("fa-minus");
            }
            $('html,body').animate({scrollTop: $("#documentation").offset().top-170},'slow');
        });
        $('.appp').click(function(){
            $('.collapse').removeClass('in');
            $('.collapse').prev(".card-header").find(".fa").removeClass("fa-minus").addClass("fa-plus");
            if(!$("#application").hasClass("in")) {
                $("#application").addClass('in');
                $('#application').prev(".card-header").find(".fa").removeClass("fa-plus").addClass("fa-minus");
            }
            $('html,body').animate({scrollTop: $("#application").offset().top-220},'slow');
        });


    });
</script>

</body>
</html>