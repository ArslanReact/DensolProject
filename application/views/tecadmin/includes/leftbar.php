<!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.9.0/css/bulma.min.css" />-->
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bulma.min.css" />
<div class="full-height">
    <div class="main-page-admin">
        <div class="row h-100">
            <div class="col-xl-2 col-lg-3">
                <!-- left navbar -->
                <div class="left-side-menu-admin">
                    <div class="navbar-expand-lg p-0">
                        <a class="navbar-brand logo text-center d-block m-b-30" href="<?php echo base_url(ADMIN_FOLDER);?>">
                            <img class="img-fluid" src="<?= base_url(); ?>files/backend/images/logo.svg" alt=""></a>
                        <div class="scrollabel">
                            <div id="accordionExample">
                                <ul id="side-main-menu" class="side-navbar side-menu list-unstyled">
                                    <li>
                                        <a href="<?php echo base_url(ADMIN_FOLDER);?>" class="<?php if($this->uri->segment(2)=="" || $this->uri->segment(2)=="dashboard"){echo "active";}?>">
                                            <span class="img-icon">
                                                <img class="img-fluid icon-bike" src="<?= base_url(); ?>files/backend/images/left-bar-icon-1.svg">
                                            </span>
                                            <span class="text-hidee">Dashboard</span>
                                        </a>
                                    </li>
                                    <li id="tab-collapse1" class="<?php if($this->uri->segment(2)=="cms"){echo "active";}?>">
                                        <a class="card-left" href="#tab1" aria-expanded="false" data-toggle="collapse" data-target="#tab1">
                                            <span class="img-icon" title="">
                                                <img class="img-fluid icon-bike" src="<?= base_url(); ?>files/backend/images/left-bar-icon-2.svg">
                                            </span>
                                            <span class="text-hidee">CMS Pages </span>
                                            <i class="fas fa-angle-down"></i>
                                        </a>
                                        <ul id="tab1" class="align-items-center collapse list-unstyled <?php if($this->uri->segment(2)=="cms"){echo "show";}?>" aria-labelledby="tab-collapse1" data-parent="#accordionExample">
                                            <li class="<?php if($this->uri->segment(2)=="cms" && $this->uri->segment(3)==""){echo "active";}?>"><a href="<?php echo base_url(ADMIN_FOLDER.'/cms');?>">All Pages</a></li>
                                            <li class="<?php if($this->uri->segment(2)=="cms" && $this->uri->segment(3)=="add"){echo "active";}?>"><a href="<?php echo base_url(ADMIN_FOLDER.'/cms/add');?>">Add New</a></li>
                                        </ul>
                                    </li>
                                    <li id="tab-collapse1">
                                        <a class="card-left" href="#exampledropdown12" aria-expanded="false" data-toggle="collapse" data-target="#exampledropdown12">
                                            <span class="img-icon" title="">
                                                <img class="img-fluid icon-bike" src="<?= base_url(); ?>files/backend/images/left-bar-icon-3.svg">
                                            </span>
                                            <span class="text-hidee">Posts </span>
                                            <i class="fas fa-angle-down"></i>
                                        </a>
                                        <ul id="exampledropdown12" class="collapse list-unstyled <?php if($this->uri->segment(2)=="blog"){echo "show";}?>">
                <li class="<?php if($this->uri->segment(2)=="blog" && $this->uri->segment(3)=="categories" && $this->uri->segment(4)==""){echo "active";}?>"><a href="<?php echo base_url(ADMIN_FOLDER.'/blog/categories');?>">View Categories</a></li>
                <li class="<?php if($this->uri->segment(2)=="blog" && $this->uri->segment(3)=="categories" && $this->uri->segment(4)=="add"){echo "active";}?>"><a href="<?php echo base_url(ADMIN_FOLDER.'/blog/categories/add');?>">Add Category</a></li>
                <li class="<?php if($this->uri->segment(2)=="blog" && $this->uri->segment(3)==""){echo "active";}?>"><a href="<?php echo base_url(ADMIN_FOLDER.'/blog');?>">View Blogs</a></li>
                <li class="<?php if($this->uri->segment(2)=="blog" && $this->uri->segment(3)=="add"){echo "active";}?>"><a href="<?php echo base_url(ADMIN_FOLDER.'/blog/add');?>">Add Blog</a></li>
            </ul>
                                    </li>
                                    <li id="tab-collapse1" class="<?php if($this->uri->segment(2)=="users" || $this->uri->segment(2)=="users-group"){echo "active";}?>">
                                        <a class="card-left" href="#tab3" aria-expanded="false" data-toggle="collapse" data-target="#tab3">
                                            <span class="img-icon" title="">
                                                <img class="img-fluid icon-bike" src="<?= base_url(); ?>files/backend/images/left-bar-icon-4.svg">
                                            </span>
                                            <span class="text-hidee">Users </span>
                                            <i class="fas fa-angle-down"></i>
                                        </a>
                                        <ul id="tab3" class="align-items-center collapse list-unstyled <?php if($this->uri->segment(2)=="users" || $this->uri->segment(2)=="users-group"){echo "show";}?>" aria-labelledby="tab-collapse1" data-parent="#accordionExample">
                                            <li class="<?php if($this->uri->segment(2)=="users-group" && $this->uri->segment(3)==""){echo "active";}?>"><a href="<?php echo base_url(ADMIN_FOLDER.'/users-group');?>">View User Groups</a></li>
                                            <li class="<?php if($this->uri->segment(2)=="users-group" && $this->uri->segment(3)=="add"){echo "active";}?>"><a href="<?php echo base_url(ADMIN_FOLDER.'/users-group/add');?>">Add New User Group</a></li>
                                            <li class="<?php if($this->uri->segment(2)=="users" && $this->uri->segment(3)=="credit_account_request"){echo "active";}?>"><a href="<?php echo base_url(ADMIN_FOLDER.'/users/credit_account_request');?>">Credit Account Requests</a></li>
                                            <li class="<?php if($this->uri->segment(2)=="users" && $this->uri->segment(3)=="student_requests"){echo "active";}?>"><a href="<?php echo base_url(ADMIN_FOLDER.'/users/student_requests');?>">Student Requests</a></li>
                                            <li class="<?php if($this->uri->segment(2)=="users" && $this->uri->segment(3)==""){echo "active";}?>"><a href="<?php echo base_url(ADMIN_FOLDER.'/users');?>">View Users</a></li>
                                            <!--<li class="<?php if($this->uri->segment(2)=="users" && $this->uri->segment(3)=="add"){echo "active";}?>"><a href="<?php echo base_url(ADMIN_FOLDER.'/users/add');?>">Add New User</a></li>-->
                                        </ul>
                                    </li>
                                    <li id="tab-collapse1" class="<?php if($this->uri->segment(2)=="gallery"){echo "active";}?>">
                                        <a class="card-left" href="#tab4" aria-expanded="false" data-toggle="collapse" data-target="#tab4">
                                            <span class="img-icon" title="">
                                                <img class="img-fluid icon-bike" src="<?= base_url(); ?>files/backend/images/left-bar-icon-5.svg">
                                            </span>
                                            <span class="text-hidee">Gallery </span>
                                            <i class="fas fa-angle-down"></i>
                                        </a>
                                        <ul id="tab4" class="align-items-center collapse list-unstyled <?php if($this->uri->segment(2)=="gallery"){echo "show";}?>" aria-labelledby="tab-collapse1" data-parent="#accordionExample">
                                            <li class="<?php if($this->uri->segment(2)=="gallery" && $this->uri->segment(3)=="categories" && $this->uri->segment(4)==""){echo "active";}?>"><a href="<?php echo base_url(ADMIN_FOLDER.'/gallery/categories');?>">View Categories</a></li>
                                            <li class="<?php if($this->uri->segment(2)=="gallery" && $this->uri->segment(3)=="categories" && $this->uri->segment(4)=="add"){echo "active";}?>"><a href="<?php echo base_url(ADMIN_FOLDER.'/gallery/categories/add');?>">Add Categories</a></li>
                                            <li class="<?php if($this->uri->segment(2)=="gallery" && $this->uri->segment(3)==""){echo "active";}?>"><a href="<?php echo base_url(ADMIN_FOLDER.'/gallery');?>">View Gallery</a></li>
                                            <li class="<?php if($this->uri->segment(2)=="gallery" && $this->uri->segment(3)=="add"){echo "active";}?>"><a href="<?php echo base_url(ADMIN_FOLDER.'/gallery/add');?>">Add Gallery</a></li>
                                        </ul>
                                    </li>
                                    <li id="tab-collapse1" class="<?php if($this->uri->segment(2)=="products" || $this->uri->segment(2)=="moreviews"){echo "active";}?>">
                                        <a class="card-left" href="#tab5" aria-expanded="false" data-toggle="collapse" data-target="#tab5">
                                            <span class="img-icon" title="">
                                                <img class="img-fluid icon-bike" src="<?= base_url(); ?>files/backend/images/left-bar-icon-6.svg"></span>
                                            <span class="text-hidee">Products </span>
                                            <i class="fas fa-angle-down"></i>
                                        </a>
                                        <ul id="tab5" class="align-items-center collapse list-unstyled <?php if($this->uri->segment(2)=="products" || $this->uri->segment(2)=="moreviews"){echo "show";}?>" aria-labelledby="tab-collapse1" data-parent="#accordionExample">
                                            <li class="<?php if($this->uri->segment(2)=="products" && $this->uri->segment(3)==""){echo "active";}?>"><a href="<?php echo base_url(ADMIN_FOLDER.'/products');?>">All Products</a></li>
                                            <li class="<?php if($this->uri->segment(2)=="products" && $this->uri->segment(3)=="add"){echo "active";}?>"><a href="<?php echo base_url(ADMIN_FOLDER.'/products/add');?>">Add New</a></li>
                                            <li class="<?php if($this->uri->segment(2)=="products" && $this->uri->segment(3)=="categories" && $this->uri->segment(4)==""){echo "active";}?>"><a href="<?php echo base_url(ADMIN_FOLDER.'/products/categories');?>">View Categories</a></li>
<!--                                            <li class="--><?php //if($this->uri->segment(2)=="products" && $this->uri->segment(3)=="categories" && $this->uri->segment(4)=="add"){echo "active";}?><!--"><a href="--><?php //echo base_url(ADMIN_FOLDER.'/products/categories/add');?><!--">Add Category</a></li>-->
                                        </ul>
                                    </li>
                                    <!--<li id="tab-collapse1">-->
                                    <!--    <a class="card-left" href="#tab7" aria-expanded="false" data-toggle="collapse" data-target="#tab77">-->
                                    <!--        <span class="img-icon" title="">-->
                                    <!--            <img class="img-fluid icon-bike" src="<?= base_url(); ?>files/backend/images/left-bar-icon-8.svg">-->
                                    <!--        </span>-->
                                    <!--        <span class="text-hidee">Appearance </span>-->
                                    <!--        <i class="fas fa-angle-down"></i>-->
                                    <!--    </a>-->
                                    <!--    <ul id="tab77" class="align-items-center collapse list-unstyled" aria-labelledby="tab-collapse1" data-parent="#accordionExample">-->
                                    <!--        <li><a href="appearance-menu.html" class=""> Menus</a></li>-->
                                    <!--        <li><a href="appearance-widgets.html" class=""> Widgets</a></li>-->
                                    <!--    </ul>-->
                                    <!--</li>-->
                                    <li id="tab-collapse1" class="<?php if($this->uri->segment(2)=="variation"){echo "active";}?>">
                                        <a class="card-left" href="#tab7" aria-expanded="false" data-toggle="collapse" data-target="#tab7">
                                            <span class="img-icon" title="">
                                                <img class="img-fluid icon-bike" src="<?= base_url(); ?>files/backend/images/left-bar-icon-8.svg">
                                            </span>
                                            <span class="text-hidee">Variations </span>
                                            <i class="fas fa-angle-down"></i>
                                        </a>
                                        <ul id="tab7" class="align-items-center collapse list-unstyled <?php if($this->uri->segment(2)=="variation"){echo "show";}?>" aria-labelledby="tab-collapse1" data-parent="#accordionExample">
                                            <li class="<?php if($this->uri->segment(2)=="variation" && $this->uri->segment(3)=="group" && $this->uri->segment(4)==""){echo "active";}?>"><a href="<?php echo base_url(ADMIN_FOLDER.'/variation/group');?>">View Variation Group</a></li>
                                            <li class="<?php if($this->uri->segment(2)=="variation" && $this->uri->segment(3)=="group" && $this->uri->segment(4)=="add"){echo "active";}?>"><a href="<?php echo base_url(ADMIN_FOLDER.'/variation/group/add');?>">Add Variation Group</a></li>
                                        </ul>
                                    </li>
                                    <li class="<?php if($this->uri->segment(2)=="orders" || $this->uri->segment(2)=="order_details" || $this->uri->segment(2)=="update_order_details"){echo "active";}?>">
                                        <a href="<?=base_url(ADMIN_FOLDER.'/orders');?>" class="">
                                            <span class="img-icon">
                                                <img class="img-fluid icon-bike" src="<?= base_url(); ?>files/backend/images/left-bar-icon-9.svg">
                                            </span>
                                            <span class="text-hidee">Orders </span>
                                        </a>
                                    </li>
                                    <li id="tab-collapse1" class="<?php if($this->uri->segment(2)=="location_types" || $this->uri->segment(2)=="insert_location_type" || $this->uri->segment(2)=="zones" || $this->uri->segment(2)=="insert_zone"){echo "active";}?>">
                                        <a class="card-left" href="#tab9" aria-expanded="false"  data-toggle="collapse" data-target="#tab9">
                                            <span class="img-icon" title="">
                                                <img class="img-fluid icon-bike" src="<?= base_url(); ?>files/backend/images/left-bar-icon-10.svg">
                                            </span>
                                            <span class="text-hidee">Location & Zone</span>
                                            <i class="fas fa-angle-down"></i>
                                        </a>
                                        <ul id="tab9" class="align-items-center collapse list-unstyled <?php if($this->uri->segment(2)=="location_types" || $this->uri->segment(2)=="insert_location_type" || $this->uri->segment(2)=="zones" || $this->uri->segment(2)=="insert_zone"){echo "show";}?>" aria-labelledby="tab-collapse1" data-parent="#accordionExample">
                                            <li class="<?php if($this->uri->segment(2)=="location_types"){echo "active";}?>"><a href="<?php echo base_url(ADMIN_FOLDER.'/location_types');?>">Manage Locations</a></li>
                                            <li class="<?php if($this->uri->segment(2)=="insert_location_type"){echo "active";}?>"><a href="<?php echo base_url(ADMIN_FOLDER.'/insert_location_type');?>">Add Location Types</a></li>
                                            <li class="<?php if($this->uri->segment(2)=="zones"){echo "active";}?>"><a href="<?php echo base_url(ADMIN_FOLDER.'/zones');?>">Manage Zones</a></li>
                                            <li class="<?php if($this->uri->segment(2)=="insert_zone"){echo "active";}?>"><a href="<?php echo base_url(ADMIN_FOLDER.'/insert_zone');?>">Add Zone</a></li>
                                        </ul>
                                    </li>
                                    <li id="tab-collapse1" class="<?php if($this->uri->segment(2)=="payment"){echo "active";}?>">
                                        <a class="card-left" href="#tab10" aria-expanded="false" data-toggle="collapse" data-target="#tab10">
                                            <span class="img-icon" title="">
                                                <img class="img-fluid icon-bike" src="<?= base_url(); ?>files/backend/images/left-bar-icon-11.svg">
                                            </span>
                                            <span class="text-hidee">Manage Payment </span>
                                            <i class="fas fa-angle-down"></i>
                                        </a>
                                        <ul id="tab10" class="align-items-center collapse list-unstyled <?php if($this->uri->segment(2)=="payment"){echo "show";}?>" aria-labelledby="tab-collapse1" data-parent="#accordionExample">
                                            <li class="<?php if($this->uri->segment(2)=="payment"){echo "active";}?>"><a href="<?php echo base_url(ADMIN_FOLDER.'/payment');?>">Manage Payment Options</a></li>
                                            </li>
                                        </ul>
                                    </li>
                                    <li id="tab-collapse1" class="<?php if($this->uri->segment(2)=="shipping" || $this->uri->segment(2)=="insert-shipping"){echo "active";}?>">
                                        <a class="card-left" href="#tab11" aria-expanded="false" data-toggle="collapse" data-target="#tab11">
                                            <span class="img-icon" title="">
                                                <img class="img-fluid icon-bike" src="<?= base_url(); ?>files/backend/images/left-bar-icon-12.svg">
                                            </span>
                                            <span class="text-hidee">Shipping </span>
                                            <i class="fas fa-angle-down"></i>
                                        </a>
                                        <ul id="tab11" class="align-items-center collapse list-unstyled <?php if($this->uri->segment(2)=="shipping" || $this->uri->segment(2)=="insert-shipping"){echo "show";}?>" aria-labelledby="tab-collapse1" data-parent="#accordionExample">
                                            <li class="<?php if($this->uri->segment(2)=="shipping"){echo "active";}?>"><a href="<?php echo base_url(ADMIN_FOLDER.'/shipping');?>">Manage Shipping Options</a></li>
                                            <li class="<?php if($this->uri->segment(2)=="insert-shipping"){echo "active";}?>"><a href="<?php echo base_url(ADMIN_FOLDER.'/insert-shipping');?>">Add New Shipping Option</a></li>
                                        </ul>
                                    </li>
                                    <li id="tab-collapse1" class="<?php if($this->uri->segment(2)=="tax" || $this->uri->segment(2)=="insert_tax"){echo "active";}?>">
                                        <a class="card-left" href="#tab12" aria-expanded="false" data-toggle="collapse" data-target="#tab12">
                                            <span class="img-icon" title="">
                                                <img class="img-fluid icon-bike" src="<?= base_url(); ?>files/backend/images/left-bar-icon-13.svg">
                                            </span>
                                            <span class="text-hidee">Taxes </span>
                                            <i class="fas fa-angle-down"></i>
                                        </a>
                                        <ul id="tab12" class="align-items-center collapse list-unstyled <?php if($this->uri->segment(2)=="tax" || $this->uri->segment(2)=="insert_tax"){echo "show";}?>" aria-labelledby="tab-collapse1" data-parent="#accordionExample">
                                            <li class="<?php if($this->uri->segment(2)=="tax"){echo "active";}?>"><a href="<?php echo base_url(ADMIN_FOLDER.'/tax');?>">Manage Tax</a></li>
                                            <li class="<?php if($this->uri->segment(2)=="insert_tax"){echo "active";}?>"><a href="<?php echo base_url(ADMIN_FOLDER.'/insert_tax');?>">Add New Tax</a></li>
                                        </ul>
                                    </li>
                                    <li id="tab-collapse1" class="<?php if($this->uri->segment(2)=="item_discounts" || $this->uri->segment(2)=="sammary_discounts" || $this->uri->segment(2)=="insert_discount" || $this->uri->segment(2)=="discount_groups" || $this->uri->segment(2)=="insert_discount_group"){echo "active";}?>">
                                        <a class="card-left" href="#tab13" aria-expanded="false" data-toggle="collapse" data-target="#tab13">
                                            <span class="img-icon" title="">
                                                <img class="img-fluid icon-bike" src="<?= base_url(); ?>files/backend/images/left-bar-icon-14.svg">
                                            </span>
                                            <span class="text-hidee">Discounts </span>
                                            <i class="fas fa-angle-down"></i>
                                        </a>
                                        <ul id="tab13" class="align-items-center collapse list-unstyled <?php if($this->uri->segment(2)=="item_discounts" || $this->uri->segment(2)=="sammary_discounts" || $this->uri->segment(2)=="insert_discount" || $this->uri->segment(2)=="discount_groups" || $this->uri->segment(2)=="insert_discount_group"){echo "show";}?>" aria-labelledby="tab-collapse1" data-parent="#accordionExample">
                                            <li class="<?php if($this->uri->segment(2)=="item_discounts"){echo "active";}?>"><a href="<?php echo base_url(ADMIN_FOLDER.'/item_discounts');?>">Product Discounts</a></li>
                                            <li class="<?php if($this->uri->segment(2)=="sammary_discounts"){echo "active";}?>"><a href="<?php echo base_url(ADMIN_FOLDER.'/summary_discounts');?>">Sammary Discounts</a></li>
                                            <li class="<?php if($this->uri->segment(2)=="insert_discount"){echo "active";}?>"><a href="<?php echo base_url(ADMIN_FOLDER.'/insert_discount');?>">Add New Discount</a></li>
                                            <li class="<?php if($this->uri->segment(2)=="discount_groups"){echo "active";}?>"><a href="<?php echo base_url(ADMIN_FOLDER.'/discount_groups');?>">Discount Group</a></li>
                                            <li class="<?php if($this->uri->segment(2)=="insert_discount_group"){echo "active";}?>"><a href="<?php echo base_url(ADMIN_FOLDER.'/insert_discount_group');?>">Add New Discount Group</a></li>
                                        </ul>
                                    </li>
                                    <li id="tab-collapse1" class="<?php if($this->uri->segment(2)=="currency" || $this->uri->segment(2)=="insert_currency"){echo "active";}?>">
                                        <a class="card-left" href="#tab14" aria-expanded="false" data-toggle="collapse" data-target="#tab14">
                                            <span class="img-icon" title="">
                                                <img class="img-fluid icon-bike"  src="<?= base_url(); ?>files/backend/images/left-bar-icon-15.svg">
                                            </span>
                                            <span class="text-hidee">Currencies </span>
                                            <i class="fas fa-angle-down"></i>
                                        </a>
                                        <ul id="tab14" class="align-items-center collapse list-unstyled <?php if($this->uri->segment(2)=="currency" || $this->uri->segment(2)=="insert_currency"){echo "show";}?>" aria-labelledby="tab-collapse1" data-parent="#accordionExample">
                                            <li class="<?php if($this->uri->segment(2)=="currency"){echo "active";}?>"><a href="<?php echo base_url(ADMIN_FOLDER.'/currency');?>">Manage Currencies</a></li>
                                            <li class="<?php if($this->uri->segment(2)=="insert_currency"){echo "active";}?>"><a href="<?php echo base_url(ADMIN_FOLDER.'/insert_currency');?>">Add New Currency</a></li>
                                        </ul>
                                    </li>
                                    <li id="tab-collapse1" class="<?php if($this->uri->segment(2)=="order_status" || $this->uri->segment(2)=="insert_order_status"){echo "active";}?>">
                                        <a class="card-left" href="#tab15" aria-expanded="false" data-toggle="collapse" data-target="#tab15">
                                            <span class="img-icon" title="">
                                                <img class="img-fluid icon-bike" src="<?= base_url(); ?>files/backend/images/left-bar-icon-16.svg">
                                            </span>
                                            <span class="text-hidee">Ourder Status </span>
                                            <i class="fas fa-angle-down"></i>
                                        </a>
                                        <ul id="tab15" class="align-items-center collapse list-unstyled <?php if($this->uri->segment(2)=="order_status" || $this->uri->segment(2)=="insert_order_status"){echo "show";}?>" aria-labelledby="tab-collapse1" data-parent="#accordionExample">
                                            <li class="<?php if($this->uri->segment(2)=="order_status"){echo "active";}?>"><a href="<?php echo base_url(ADMIN_FOLDER.'/order_status');?>">Manage Order Status</a></li>
                                            <li class="<?php if($this->uri->segment(2)=="insert_order_status"){echo "active";}?>"><a href="<?php echo base_url(ADMIN_FOLDER.'/insert_order_status');?>">Add New Status</a></li>
                                        </ul>
                                    </li>
                                    <li id="tab-collapse1" class="<?php if($this->uri->segment(2)=="shopping_config" || $this->uri->segment(2)=="shopping_defaults"){echo "active";}?>">
                                        <a class="card-left" href="#tab16" aria-expanded="false" data-toggle="collapse" data-target="#tab16">
                                            <span class="img-icon" title="">
                                                <img class="img-fluid icon-bike" src="<?= base_url(); ?>files/backend/images/left-bar-icon-17.svg">
                                            </span>
                                            <span class="text-hidee">Shopping Info </span>
                                            <i class="fas fa-angle-down"></i>
                                        </a>
                                        <ul id="tab16" class="align-items-center collapse list-unstyled <?php if($this->uri->segment(2)=="shopping_config" || $this->uri->segment(2)=="shopping_defaults"){echo "show";}?>" aria-labelledby="tab-collapse1" data-parent="#accordionExample">
                                            <li class="<?php if($this->uri->segment(2)=="shopping_config"){echo "active";}?>"><a href="<?php echo base_url(ADMIN_FOLDER.'/shopping_config');?>">Manage Configuration</a></li>
                                            <li class="<?php if($this->uri->segment(2)=="shopping_defaults"){echo "active";}?>"><a href="<?php echo base_url(ADMIN_FOLDER.'/shopping_defaults');?>">Set Dafault Setting</a></li>
                                        </ul>
                                    </li>


                                    <li id="tab-collapse1" class="<?php if($this->uri->segment(2)=="banner"){echo "active";}?>">
                                        <a class="card-left" href="#tab16" aria-expanded="false" data-toggle="collapse" data-target="#tab17">
                                            <span class="img-icon" title="">
                                                <img class="img-fluid icon-bike" src="<?= base_url(); ?>files/backend/images/left-bar-icon-17.svg">
                                            </span>
                                            <span class="text-hidee">Sliders </span>
                                            <i class="fas fa-angle-down"></i>
                                        </a>
                                        <ul id="tab17" class="align-items-center collapse list-unstyled <?php if($this->uri->segment(2)=="banner"){echo "show";}?>" aria-labelledby="tab-collapse1" data-parent="#accordionExample">
                                            <li class="<?php if($this->uri->segment(2)=="banner" && $this->uri->segment(3)=="categories" && $this->uri->segment(4)==""){echo "active";}?>"><a href="<?php echo base_url(ADMIN_FOLDER.'/banner/categories');?>">View Categories</a></li>
                                            <li class="<?php if($this->uri->segment(2)=="banner" && $this->uri->segment(3)=="categories" && $this->uri->segment(4)=="add"){echo "active";}?>"><a href="<?php echo base_url(ADMIN_FOLDER.'/banner/categories/add');?>">Add Categories</a></li>
                                            <li class="<?php if($this->uri->segment(2)=="banner" && $this->uri->segment(3)==""){echo "active";}?>"><a href="<?php echo base_url(ADMIN_FOLDER.'/banner');?>">View Banners</a></li>
                                            <li class="<?php if($this->uri->segment(2)=="banner" && $this->uri->segment(3)=="add"){echo "active";}?>"><a href="<?php echo base_url(ADMIN_FOLDER.'/banner/add');?>">Add Banner</a></li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url(ADMIN_FOLDER); ?>/email_list" class="<?php if ($this->uri->segment(2) == "" || $this->uri->segment(2) == "email_list") {
                                            echo "active";  } ?>">
                                            <span class="img-icon">
                                                <img class="img-fluid icon-bike" src="<?= base_url(); ?>files/backend/images/left-bar-icon-1.svg">
                                            </span>
                                            <span class="text-hidee">E-mails Subscription List </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url(ADMIN_FOLDER); ?>/testimonial" class="<?php if ($this->uri->segment(2) == "" || $this->uri->segment(2) == "testimonial") {
                                            echo "active";  } ?>">
                                            <span class="img-icon">
                                                <img class="img-fluid icon-bike" src="<?= base_url(); ?>files/backend/images/left-bar-icon-1.svg">
                                            </span>
                                            <span class="text-hidee">Testimonials </span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>