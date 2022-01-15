<link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bulma.min.css" />
<div class="full-height">
    <div class="main-page-admin">
        <div class="row h-100 m-0">
            <div class="col-xl-2 col-lg-3 px-0 px-lg-3">
                <!-- left navbar -->
                <div class="left-side-menu-admin mb-md-0 mb-4 vh-100 h-md-100">
                    <div class="navbar-expand-lg navbar-light p-0 d-flex justify-content-between">
                        <a class="navbar-brand logo text-center w-100 d-block mb-lg-4 m-0" href="<?php echo base_url('cdashboard');?>"><img class="img-fluid" src="<?= base_url(); ?>files/backend/images/logo.svg" alt=""></a>
                    </div>
                    <div class="scrollabel d-lg-block d-none">
                        <div id="accordionExample">
                            <ul id="side-main-menu" class="side-navbar side-menu list-unstyled">
                                <li>
                                    <a href="<?php echo base_url('cdashboard');?>" class="<?php if($this->uri->segment(1)=="cdashboard"){echo "active";}?>">
                                        <span class="img-icon">
                                            <img class="img-fluid icon-bike" src="<?= base_url(); ?>files/backend/images/left-bar-icon-1.svg">
                                        </span>
                                        <span class="text-hidee">Dashboard</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url('cprofile').'/'.$this->session->userdata('uid');?>" class="<?php if( $this->uri->segment(1)=="cprofile"){echo "active";}?>">
                                        <span class="img-icon">
                                            <img class="img-fluid icon-bike" src="<?= base_url(); ?>files/backend/images/left-bar-icon-1.svg">
                                        </span>
                                        <span class="text-hidee">My Profile</span>
                                    </a>
                                </li>                                    
                                <li id="tab-collapse1" class="<?php if($this->uri->segment(2)=="clientorder"){echo "active";}?>">
                                    <a class="card-left" href="#tab1" aria-expanded="false" data-toggle="collapse" data-target="#tab1">
                                        <span class="img-icon" title="">
                                            <img class="img-fluid icon-bike" src="<?= base_url(); ?>files/backend/images/left-bar-icon-2.svg">
                                        </span>
                                        <span class="text-hidee">My Orders </span>
                                        <i class="fas fa-angle-down"></i>
                                    </a>
                                    <ul id="tab1" class="align-items-center collapse list-unstyled <?php if($this->uri->segment(2)=="myallorder"){echo "show";}?>" aria-labelledby="tab-collapse1" data-parent="#accordionExample">
                                        <li class="<?php if($this->uri->segment(2)=="clientallorder" && $this->uri->segment(3)==""){echo "active";}?>"><a href="<?php echo base_url('clientallorder');?>">All Order</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!--for mobile toggle area-->
                    <div class="navbar-collapse offcanvas-collapse">
                        <button class="navbar-toggler navbar-toggler-left d-block d-lg-none" type="button" id="navToggle"><span class="fas fa-bars"></span></button>
                        <div id="accordionExample">
                            <ul id="side-main-menu" class="pt-4 side-navbar side-menu list-unstyle navbar-nav">
                                <li>
                                    <a href="<?php echo base_url('cdashboard');?>" class="<?php if($this->uri->segment(1)=="cdashboard"){echo "active";}?>">
                                        <span class="img-icon">
                                            <img class="img-fluid icon-bike" src="<?= base_url(); ?>files/backend/images/left-bar-icon-1.svg">
                                        </span>
                                        <span class="text-hidee">Dashboard</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url('cprofile').'/'.$this->session->userdata('uid');?>" class="<?php if( $this->uri->segment(1)=="cprofile"){echo "active";}?>">
                                        <span class="img-icon">
                                            <img class="img-fluid icon-bike" src="<?= base_url(); ?>files/backend/images/left-bar-icon-1.svg">
                                        </span>
                                        <span class="text-hidee">My Profile</span>
                                    </a>
                                </li>                                    
                                <li id="tab-collapse1" class="<?php if($this->uri->segment(2)=="clientorder"){echo "active";}?>">
                                    <a class="card-left" href="#tab1" aria-expanded="false" data-toggle="collapse" data-target="#tab1">
                                        <span class="img-icon" title="">
                                            <img class="img-fluid icon-bike" src="<?= base_url(); ?>files/backend/images/left-bar-icon-2.svg">
                                        </span>
                                        <span class="text-hidee">My Orders </span>
                                        <i class="fas fa-angle-down"></i>
                                    </a>
                                    <ul id="tab1" class="align-items-center collapse list-unstyled <?php if($this->uri->segment(2)=="myallorder"){echo "show";}?>" aria-labelledby="tab-collapse1" data-parent="#accordionExample">
                                        <li class="<?php if($this->uri->segment(2)=="clientallorder" && $this->uri->segment(3)==""){echo "active";}?>"><a href="<?php echo base_url('clientallorder');?>">All Order</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="navbar-collapse offright-collapse">
                        <button class="navbar-toggler navbar-toggler-right d-block d-lg-none" type="button" id="navTogglee"><span class="fas fa-bars"></span></button>
                        <ul class="side-navbar side-menu pt-4 list-unstyle navbar-nav">
                            <li><a href="<?php echo base_url("users/edit/".$this->session->userdata("uid"));?>" class="item-link d-block p-2">Edit Profile</a></li>
                            <li><a href="<?=base_url('user/logout');?>" class="item-link d-block p-2">Logout</a></li>
                        </ul>
                    </div>
                </div>
            </div>