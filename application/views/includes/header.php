<header class="header blusecolorbg position-relative">
    <div class="main-container2 py-md-3 position-relative z-index-2">
        <div class="row align-items-center">
            <div class="col-xl-3 col-lg-4 col-md-4 d-none d-sm-none d-md-block">
                <div class="social mb-md-4">
                    <a href="https://www.facebook.com/arinstrumedAU" target="new" class="d-inline-block mr-2"><i class="fab fa-facebook-f fontsize14"></i></a>
                    <a href="" class="d-inline-block mr-2"><i class="fab fa-twitter fontsize14"></i></a>
                    <a href="" class="d-inline-block mr-2"><i class="fab fa-linkedin-in fontsize14"></i></a>
                </div>
                <?php
                $attributes = array('class' => 'formsearch');
                echo form_open(base_url().'submit_search/',$attributes);
                ?>
                <div class="form-group position-relative">
                    <input type="text" class="form-control borderradius50 typeahead"  placeholder="Search Products..." name="search" id="tags">
                    <button type="submit" class="btn btn-search"><i class="fas fa-search"></i></button>
                </div>
                </form>
            </div>
            <div class="col-xl-6 col-lg-4 col-md-4 text-center py-sm-3 py-md-0 d-none d-sm-none d-md-block"><a class="navbar-brand d-inline-flex py-0" href="<?=base_url();?>"><img class="" src="<?=base_url();?>files/frontend/images/logowhite.png" alt="" width="330"></a></div>
            <div class="col-xl-3 col-lg-4 col-md-4 text-right d-none d-sm-none d-md-block">
                <p class="m-0 fontsize14 text-white"><img width="20" src="<?=base_url();?>files/frontend/images/phone.svg" alt="" class="mr-2" width="20" height="20"> 1300 920 097</p>
                <ul class="list-unstyled my-md-4 cart d-inline-flex">
                    <?php if($this->userlogin){
                        $uid = $this->session->userdata('uid');
                        $getuserdata = $this->userModel->get_user_by_id($uid);
                        if($getuserdata->is_admin==1){
                            ?>
                            <!-- <li><a href="<?php echo base_url(ADMIN_FOLDER);?>" target="_blank" class="mx-md-3 text-white linked fontsize14">Dashboard</a></li>
                            <li><a href="<?=base_url('user/logout');?>" class="mx-md-3 text-white linked fontsize14">Logout</a></li> -->
                        <?php } else{ ?>
                            <!-- <li><a href="<?php echo base_url('cdashboard');?>" target="_blank" class="mx-md-3 text-white linked fontsize14">Dashboard</a></li>
                            <li><a href="<?=base_url('user/logout');?>" class="mx-md-3 text-white linked fontsize14">Logout</a></li> -->
                        <?php } }else{?>
                    <!-- <li class="dropdown login-dropdown align-items-center d-flex mx-md-3"> -->
                        <!-- <a href="" class="text-white fontsize14"><img width="20" class="img-fluid mb-2" src="<?=base_url();?>files/frontend/images/login.svg" alt="" width="20" height="20"> Login</a>
                        <ul class="list-unstyled dropdown-menu m-lg-0 p-lg-0">
                            <li><a href="<?php echo getSeoLink("cms",109);?>" class="nav-link fontsize14"> Gold Account</a></li>
                            <li><a href="<?php echo getSeoLink("cms",109);?>" class="nav-link fontsize14"> Standard Account</a></li>
                            <li><a href="<?php echo getSeoLink("cms",109);?>" class="nav-link fontsize14"> Student Account</a></li>
                        </ul> -->
                        <?php }?>
                        <!--<li><a href="<?php //echo base_url("login/");?>" class="mx-md-3 text-white linked fontsize14">My Account</a></li>-->
                    <li class="dropdown cartdropdown"><a href="<?php echo base_url("cart/");?>" class="mx-md-3 text-white linked fontsize14"><img src="<?=base_url();?>files/frontend/images/basket.svg" alt="" class="img-fluid mb-2" width="20" height="21"> Cart</a>
                        <div class="dropdown-menu dropdown-menu-md-right m-lg-0 p-2">
                            <div class="d-flex align-items-center justify-content-between mb-2">
                                <!-- <p class="m-0 fontsize14">Cart Subtotal: <strong class="blusecolortext fontwieght800"><?php //echo $this->flexi_cart->total();?></strong></p> -->
                                <p class="m-0 fontsize14">Total Qty: <strong class="blusecolortext fontwieght800"><?php echo $this->flexi_cart->total_items();?></strong> items</p>
                            </div>
                            <a href="<?php echo base_url('checkout'); ?>"><button type="buttton" class="gradientblue btn bordernone fontsize14 fontwieghtbold text-white mb-2 w-100">Go To Checkout</button></a>
                            <ul class="list-unstyled py-2"  style="height: 250px;overflow-y: auto;">
                                <?php
                                $cart_items = $this->flexi_cart->cart_items();
                                if (!empty($cart_items)) {
                                    $i = 0;
                                    foreach($cart_items as $row) { $i++;
                                        $modems = $this->db->query("select * from products where id = '".$row['id']."'");
                                        $data =  $modems->result_array();
                                        ?>
                                        <li class="lightgraycolorbg align-items-center p-2 d-flex row m-0">
                                            <div class="col-sm-4 px-2"><img class="img-fluid" src="<?php echo base_url()."uploads/products/".$data[0]['image'];?>" alt=""></div>
                                            <div class="col-sm-8 px-2">
                                                <h4 class="m-0 fontsize14 fontwieght800"><?php echo $row['name'];?></h4>
                                                <p class="m-0"><?php
                                                    // If an item discount exists, strike out the standard item total and display the discounted item total.
                                                    if ($row['discount_quantity'] > 0)
                                                    {
                                                        //echo '<span class="strike">'.$row['price_total'].'</span><br/>';
                                                        //echo $row['discount_price_total'].'<br/>';
                                                    }
                                                    // Else, display item total as normal.
                                                    else
                                                    {
                                                        
                                                    } ?><span class="float-right blusecolortext fontwieght800">qty: <?=$row['quantity'];?></span></p>
                                            </div>
                                        </li>
                                    <?php } } else { ?>
                                    <li class="lightgraycolorbg align-items-center p-2 d-flex row m-0">
                                        <div class="col-sm-8 px-2">
                                            <h4 class="m-0 fontsize14 fontwieght800">You have no items in your shopping cart.</h4>
                                        </div>
                                    </li>
                                <?php } ?>
                            </ul>
                            <a href="<?php echo base_url('cart'); ?>"><button type="buttton" class="bordernone fontsize14 btn graycolorbg w-100">View and edit cart</button></a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="main-container2 py-sm-3 py-3 py-md-0 position-relative z-index-1">
        <nav class="navigation navbar navbar-expand-lg nav-justified navbar-light">
            <a class="navbar-brand d-lg-none d-block d-sm-block" href="<?=base_url();?>"><img width="" src="<?=base_url();?>files/frontend/images/logo-text.png" alt="" class="img-fluid"></a>
            <a href="<?php echo base_url("cart/");?>" class="col d-lg-none text-right d-block p-0 mr-4 text-white linked fontsize14"><img width="40" src="<?=base_url();?>files/frontend/images/shopping-cart.svg" alt="" class=""></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-content" aria-controls="navbar-content" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbar-content">
                <ul class="navbar-nav w-100 align-items-center d-lg-flex d-none d-md-none">
                    <li class="nav-item w-sm-100 text-sm-left text-left text-lg-center"><a class="nav-link d-block <?php if ($this->uri->segment(1) == "") {echo "active";} ?>" href="<?=base_url();?>" >Home</a></li>
                    <?php
                    $modems = getValues("products_categories","parent_id",0,null,null,null);
                    if($modems){
                    foreach($modems as $modem){
                    ?>
                    <li class="nav-item w-sm-100 text-sm-left text-left text-lg-center dropdown">
                        <a class="nav-link dropdown-toggle" href="<?php echo getSeoLink("products_categories",$modem->id);?>" data-toggle="dropdown" role="button" aria-expanded="false"><?=$modem->title;?></a>
                        <div class="dropdown-menu m-lg-0 p-lg-0">
                            <?php
                                $subcat = getvalues("products_categories",'parent_id',$modem->id,null,null,null);
                                if($subcat){
                                ?>
                            <ul class="list-unstyled">
                                <?php
                                    foreach($subcat as $cat){
                                        $subcatcount = getvalues("products_categories",'parent_id',$cat->id,null,null,null);
                                ?>
                                <li class="dropdown-submenu menu-item-has-children"><a href="<?php echo getSeoLink("products_categories",$cat->id);?>" class="nav-link d-flex align-items-center justify-content-between"><?=$cat->title;?> <?php if($subcatcount){ ?><img src="<?php echo base_url('files/frontend/images/right-arrow.svg') ?>" width="10" /><?php } ?></a>
                                 <?php
                                $subcat = getvalues("products_categories",'parent_id',$cat->id,null,null,null);
                                if($subcat){
                                    ?>
                                    <ul class="subdropdown-menu">
                                    <?php
                                    foreach($subcat as $subcat){
                                        $subcat2count = getvalues("products_categories",'parent_id',$subcat->id,null,null,null);
                                ?>
                                    <li class="dropdown-submenu"><a href="<?php echo getSeoLink("products_categories",$subcat->id);?>" class="nav-link d-flex align-items-center justify-content-between"><?=$subcat->title;?> <?php if($subcat2count){ ?><img src="<?php echo base_url('files/frontend/images/right-arrow.svg') ?>" width="10" /><?php } ?></a>
                                    <?php
                                    $subcat2 = getvalues("products_categories",'parent_id',$subcat->id,null,null,null);
                                if($subcat2){
                                    ?>
                                    <ul class="subdropdown-menu2"> <?php
                                
                                    foreach($subcat2 as $subcatt){
                                ?>
                                    <li><a href="<?php echo getSeoLink("products_categories",$subcatt->id);?>" class="nav-link d-flex align-items-center"><?=$subcatt->title;?></a></li>
                                    <?php }?>
                                </ul>
                                <?php }?>
                                    </li>
                                    <?php }?>
                                </ul>
                                <?php }?>
                                </li>
                                    <?php }?>
                            </ul>
                            <?php }?>
                        </div>
                    </li>
<?php }}?>                    
                    <li class="nav-item w-sm-100 text-sm-left text-left text-lg-center"><a class="nav-link <?php if ($this->uri->segment(1) == "blog") {echo "active";} ?>" href="<?=base_url('blog');?>">Blog</a></li>
                    <li class="nav-item w-sm-100 text-sm-left text-left text-lg-center"><a class="nav-link <?php if ($this->uri->segment(1) == "about-us") {echo "active";} ?>" href="<?php echo getSeoLink("cms",38);?>" >About Us</a></li>
                    <li class="nav-item w-sm-100 text-sm-left text-left text-lg-center"><a class="nav-link <?php if ($this->uri->segment(1) == "contact-us") {echo "active";} ?>" href="<?php echo getSeoLink("cms",65);?>" >Contact Us</a></li>
                </ul>
                <!-- Mobile Menu -->
                <ul class="d-block d-lg-none navbar list-unstyled mobile-secreen-navbar">
                    <li class="nav-item w-sm-100 text-sm-left text-left text-lg-center"><a class="nav-link d-block <?php if ($this->uri->segment(1) == "") {echo "active";} ?>" href="<?=base_url();?>" >Home</a></li>
                    <?php
                    $modems = getValues("products_categories","parent_id",0,null,null,null);
                    if($modems){
                    foreach($modems as $modem){
                    ?>
                    <li class="nav-item w-sm-100 text-sm-left text-left text-lg-center dropdown">
                        <a class="nav-link dropdown-toggle" href="<?php echo getSeoLink("products_categories",$modem->id);?>" data-toggle="dropdown" role="button" aria-expanded="false"><?=$modem->title;?></a>
                        <div class="dropdown-menu m-lg-0 p-lg-0">
                            <ul class="list-unstyled">
                                <?php
                                $subcat = getvalues("products_categories",'parent_id',$modem->id,null,null,null);
                                if($subcat){
                                    foreach($subcat as $cat){
                                ?>
                                <li class="dropdown-submenu"><a href="<?php echo getSeoLink("products_categories",$cat->id);?>" class="nav-link d-flex align-items-center"><?=$cat->title;?></a>
                                <ul class="subdropdown-menu"> <?php
                                $subcat = getvalues("products_categories",'parent_id',$cat->id,null,null,null);
                                if($subcat){
                                    foreach($subcat as $subcat){
                                ?>
                                    <li><a href="<?php echo getSeoLink("products_categories",$subcat->id);?>" class="subdropdown-item"><?=$subcat->title;?></a></li>
                                    <?php } }?>
                                </ul>
                                </li>
                                    <?php }}?>
                            </ul>
                        </div>
                    </li>
                            <?php }}?>                    
                    <li class="nav-item w-sm-100 text-sm-left text-left text-lg-center"><a class="nav-link <?php if ($this->uri->segment(1) == "open-a-credit-account") {echo "active";} ?>" href="<?=base_url('open-a-credit-account/');?>">Open A Credit Account</a></li>
                    <li class="nav-item w-sm-100 text-sm-left text-left text-lg-center"><a class="nav-link <?php if ($this->uri->segment(1) == "blog") {echo "active";} ?>" href="<?=base_url('blog');?>">Blog</a></li>
                    <li class="nav-item w-sm-100 text-sm-left text-left text-lg-center"><a class="nav-link <?php if ($this->uri->segment(1) == "coming") {echo "active";} ?>" href="<?=base_url('coming');?>">Weekly Promotions</a></li>
                    <li class="nav-item w-sm-100 text-sm-left text-left text-lg-center"><a class="nav-link <?php if ($this->uri->segment(1) == "about-us") {echo "active";} ?>" href="<?php echo getSeoLink("cms",38);?>" >About Us</a></li>
                    <li class="nav-item w-sm-100 text-sm-left text-left text-lg-center"><a class="nav-link <?php if ($this->uri->segment(1) == "contact-us") {echo "active";} ?>" href="<?php echo getSeoLink("cms",65);?>" >Contact Us</a></li>
                    <!--<hr class="my-2 d-lg-none d-block">-->
                    <?php //if($this->userlogin){
                        // $uid = $this->session->userdata('uid');
                        // $getuserdata = $this->userModel->get_user_by_id($uid);
                        // if($getuserdata->is_admin==1){
                            ?>
                            <!-- <li class="nav-item w-sm-100 text-sm-left text-left text-lg-center"><a href="<?php // base_url(ADMIN_FOLDER);?>" target="_blank" class="nav-link">Dashboard</a></li>
                            <li class="nav-item w-sm-100 text-sm-left text-left text-lg-center"><a href="<?=base_url('user/logout');?>"  class="nav-link">Logout</a></li> -->
                        <?php //} else{ ?>
                            <!-- <li class="nav-item w-sm-100 text-sm-left text-left text-lg-center"><a href="<?php //echo base_url('cdashboard');?>" target="_blank" class="nav-link">Dashboard</a></li>
                            <li class="nav-item w-sm-100 text-sm-left text-left text-lg-center"><a href="<?=base_url('user/logout');?>" target="_blank" class="nav-link">Dashboard</a></li> -->
                        <?php// } }else{?>
                        <!-- <h4 class="text-white fontsize16 bg-success p-2"><img width="20" class="img-fluid mb-2 mr-2" src="<?=base_url();?>files/frontend/images/login.svg" alt=""> Login Accounts</h4>
                        <li class="nav-item w-sm-100 text-sm-left text-left text-lg-center"><a class="nav-link" href="<?php //echo getSeoLink("cms",109);?>" >Gold Account</a></li>
                        <li class="nav-item w-sm-100 text-sm-left text-left text-lg-center"><a class="nav-link" href="<?php// echo getSeoLink("cms",109);?>" >Standard Account</a></li>
                        <li class="nav-item w-sm-100 text-sm-left text-left text-lg-center"><a class="nav-link" href="<?php //echo getSeoLink("cms",109);?>" >Student Account</a></li> -->
                    <?php //} ?>
                </ul>
            </div>
        </nav>
    </div>
</header>
<main class="main">