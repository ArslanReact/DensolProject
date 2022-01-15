<div class="card p-3 m-b-30">
    <h5 class="fontsize18 fontwieghtbold">Latest posts</h5>
    <ul class="list-unstyled">

        <?php
        $getblogpost = getValues("blogs","is_active","1",4,"sort","DESC",null,null,null,0);
        if($getblogpost){
            foreach($getblogpost as $getblogposts){

                ?>
        <li class="row no-gutters align-items-center m-t-30">
            <div class="col-xl-3">
                <div class="overflow-hidden borderradius5 box-shadow mr-2 mb-md-3 mb-lg-0"><img width="" src="<?php echo base_url("uploads/blog/".$getblogposts->thumbnail);?>" alt="" class="w-100 img-fluid"></div>
            </div>
            <div class="col-xl-9">
                <h4 class="fontsize14 blusecolortext fontwieghtbold"><?php echo $getblogposts->title;?></h4>
                <p class="paragraphcolortext fontsize14 fontwieghtbold"><?php echo date("M d Y",strtotime($getblogposts->created));?></p>
            </div>
        </li>
       <?php }}?>
    </ul>
</div>
<!--<div class="card p-3 m-b-30">-->
<!--    <h5 class="fontsize18 fontwieghtbold">Archives</h5>-->
<!--    <ul class="list-unstyled m-t-30">-->
<!--        <li><a class="blusecolortext py-1 d-block" href="">. Jul  2019</a></li>-->
<!--    </ul>-->
<!--</div>-->
<div class="card p-3 m-b-30">
    <h5 class="fontsize18 fontwieghtbold">Tags</h5>
    <ul class="list-unstyled m-t-30">
        <li class="badge badge-secondary borderradius30 fontwieghtregular mb-3"><?php echo getTags("blogs",0);?></li>
    </ul>
</div>



