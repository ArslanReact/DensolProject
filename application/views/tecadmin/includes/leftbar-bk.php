<nav class="side-navbar">
    <div class="side-navbar-wrapper">
    <div class="sidenav-header d-flex align-items-center justify-content-center">
        <div class="sidenav-header-inner text-left"><img src="<?php echo base_url("files/backend/images/logo2.png");?>" alt="person" class="img-fluid"></div>
        <div class="sidenav-header-logo"><a href="index.html" class="brand-small text-center"><img src="<?php echo base_url("files/backend/images/logo-small.png");?>" alt="person" class="img-fluid"></a></div>
    </div>
    <div class="main-menu">
        <h5 class="sidenav-heading">Navigation</h5>
        <ul id="side-main-menu" class="side-menu list-unstyled">                  
        <li class="<?php if($this->uri->segment(2)=="" || $this->uri->segment(2)=="dashboard"){echo "active";}?>">
            <a href="<?php echo base_url(ADMIN_FOLDER);?>" title="Dashboard"> <span class="img-icon"><img class="img-fluid" src="<?php echo base_url("files/backend/images/icn-1.png");?>"></span> <span class="text-hidee">Dashboard</span></a>
        </li>
        <li class="<?php if($this->uri->segment(2)=="cms"){echo "active";}?>"><a href="#exampledropdown13" aria-expanded="false" data-toggle="collapse"> <span class="img-icon" title="CMS Pages"><img class="img-fluid" src="<?php echo base_url("files/backend/images/icn-13.png");?>"></span> <span class="text-hidee">CMS Pages </span></a>
            <ul id="exampledropdown13" class="collapse list-unstyled <?php if($this->uri->segment(2)=="cms"){echo "show";}?>">
                <li class="<?php if($this->uri->segment(2)=="cms" && $this->uri->segment(3)==""){echo "active";}?>"><a href="<?php echo base_url(ADMIN_FOLDER.'/cms');?>">View Pages</a></li>
                <li class="<?php if($this->uri->segment(2)=="cms" && $this->uri->segment(3)=="add"){echo "active";}?>"><a href="<?php echo base_url(ADMIN_FOLDER.'/cms/add');?>">Add New</a></li>
            </ul>
        </li>
        <li class="<?php if($this->uri->segment(2)=="blog"){echo "active";}?>"><a href="#exampledropdown12" aria-expanded="false" data-toggle="collapse" title="Blogs"> <span class="img-icon"><img class="img-fluid" src="<?php echo base_url("files/backend/images/icn-14.png");?>"></span> <span class="text-hidee">Blogs </span></a>
            <ul id="exampledropdown12" class="collapse list-unstyled <?php if($this->uri->segment(2)=="blog"){echo "show";}?>">
                <li class="<?php if($this->uri->segment(2)=="blog" && $this->uri->segment(3)=="categories" && $this->uri->segment(4)==""){echo "active";}?>"><a href="<?php echo base_url(ADMIN_FOLDER.'/blog/categories');?>">View Categories</a></li>
                <li class="<?php if($this->uri->segment(2)=="blog" && $this->uri->segment(3)=="categories" && $this->uri->segment(4)=="add"){echo "active";}?>"><a href="<?php echo base_url(ADMIN_FOLDER.'/blog/categories/add');?>">Add Category</a></li>
                <li class="<?php if($this->uri->segment(2)=="blog" && $this->uri->segment(3)==""){echo "active";}?>"><a href="<?php echo base_url(ADMIN_FOLDER.'/blog');?>">View Blogs</a></li>
                <li class="<?php if($this->uri->segment(2)=="blog" && $this->uri->segment(3)=="add"){echo "active";}?>"><a href="<?php echo base_url(ADMIN_FOLDER.'/blog/add');?>">Add Blog</a></li>
            </ul>
        </li>
        <li class="<?php if($this->uri->segment(2)=="news"){echo "active";}?>"><a href="#exampledropdown11" aria-expanded="false" data-toggle="collapse"> <span class="img-icon" title="News & Events"><img class="img-fluid" src="<?php echo base_url("files/backend/images/icn-15.png");?>"></span> <span class="text-hidee">News & Events </span></a>
            <ul id="exampledropdown11" class="collapse list-unstyled <?php if($this->uri->segment(2)=="news"){echo "show";}?>">
                <li class="<?php if($this->uri->segment(2)=="news" && $this->uri->segment(3)=="categories" && $this->uri->segment(4)==""){echo "active";}?>"><a href="<?php echo base_url(ADMIN_FOLDER.'/news/categories');?>">View Categories</a></li>
                <li class="<?php if($this->uri->segment(2)=="news" && $this->uri->segment(3)=="categories" && $this->uri->segment(4)=="add"){echo "active";}?>"><a href="<?php echo base_url(ADMIN_FOLDER.'/news/categories/add');?>">Add Category</a></li>
                <li class="<?php if($this->uri->segment(2)=="news" && $this->uri->segment(3)==""){echo "active";}?>"><a href="<?php echo base_url(ADMIN_FOLDER.'/news');?>">View News</a></li>
                <li class="<?php if($this->uri->segment(2)=="news" && $this->uri->segment(3)=="add"){echo "active";}?>"><a href="<?php echo base_url(ADMIN_FOLDER.'/news/add');?>">Add News</a></li>
            </ul>
        </li>
        <li class="<?php if($this->uri->segment(2)=="users" || $this->uri->segment(2)=="users-group"){echo "active";}?>"><a href="#exampledropdown1" aria-expanded="false" data-toggle="collapse" title="Users"> <span class="img-icon"><img class="img-fluid" src="<?php echo base_url("files/backend/images/icn-2.png");?>"></span> <span class="text-hidee">Users </span></a>
            <ul id="exampledropdown1" class="collapse list-unstyled <?php if($this->uri->segment(2)=="users" || $this->uri->segment(2)=="users-group"){echo "show";}?>">
                <li class="<?php if($this->uri->segment(2)=="users-group" && $this->uri->segment(3)==""){echo "active";}?>"><a href="<?php echo base_url(ADMIN_FOLDER.'/users-group');?>">View User Groups</a></li>
                <li class="<?php if($this->uri->segment(2)=="users-group" && $this->uri->segment(3)=="add"){echo "active";}?>"><a href="<?php echo base_url(ADMIN_FOLDER.'/users-group/add');?>">Add New User Group</a></li>
                <li class="<?php if($this->uri->segment(2)=="users" && $this->uri->segment(3)==""){echo "active";}?>"><a href="<?php echo base_url(ADMIN_FOLDER.'/users');?>">View Users</a></li>
                <li class="<?php if($this->uri->segment(2)=="users" && $this->uri->segment(3)=="add"){echo "active";}?>"><a href="<?php echo base_url(ADMIN_FOLDER.'/users/add');?>">Add New User</a></li>
            </ul>
        </li>
        <div class="line"></div>
        <h5 class="sidenav-heading">Media</h5>
        <li class="<?php if($this->uri->segment(2)=="gallery"){echo "active";}?>"><a href="#exampledropdown15" aria-expanded="false" data-toggle="collapse" title="Gallery"> <span class="img-icon"><img class="img-fluid" src="<?php echo base_url("files/backend/images/icn-3.png");?>"></span> <span class="text-hidee">Gallery</span> </a>
            <ul id="exampledropdown15" class="collapse list-unstyled <?php if($this->uri->segment(2)=="gallery"){echo "show";}?>">
                <li class="<?php if($this->uri->segment(2)=="gallery" && $this->uri->segment(3)=="categories" && $this->uri->segment(4)==""){echo "active";}?>"><a href="<?php echo base_url(ADMIN_FOLDER.'/gallery/categories');?>">View Categories</a></li>
                <li class="<?php if($this->uri->segment(2)=="gallery" && $this->uri->segment(3)=="categories" && $this->uri->segment(4)=="add"){echo "active";}?>"><a href="<?php echo base_url(ADMIN_FOLDER.'/gallery/categories/add');?>">Add Categories</a></li>
                <li class="<?php if($this->uri->segment(2)=="gallery" && $this->uri->segment(3)==""){echo "active";}?>"><a href="<?php echo base_url(ADMIN_FOLDER.'/gallery');?>">View Gallery</a></li>
                <li class="<?php if($this->uri->segment(2)=="gallery" && $this->uri->segment(3)=="add"){echo "active";}?>"><a href="<?php echo base_url(ADMIN_FOLDER.'/gallery/add');?>">Add Gallery</a></li>
            </ul>
        </li>
        <li class="<?php if($this->uri->segment(2)=="banner"){echo "active";}?>"><a href="#exampledropdown16" aria-expanded="false" data-toggle="collapse" title="Banners"> <span class="img-icon"><img class="img-fluid" src="<?php echo base_url("files/backend/images/icn-4.png");?>"></span><span class="text-hidee">Banners</span> </a>
            <ul id="exampledropdown16" class="collapse list-unstyled <?php if($this->uri->segment(2)=="banner"){echo "show";}?>">
                <li class="<?php if($this->uri->segment(2)=="banner" && $this->uri->segment(3)=="categories" && $this->uri->segment(4)==""){echo "active";}?>"><a href="<?php echo base_url(ADMIN_FOLDER.'/banner/categories');?>">View Categories</a></li>
                <li class="<?php if($this->uri->segment(2)=="banner" && $this->uri->segment(3)=="categories" && $this->uri->segment(4)=="add"){echo "active";}?>"><a href="<?php echo base_url(ADMIN_FOLDER.'/banner/categories/add');?>">Add Categories</a></li>
                <li class="<?php if($this->uri->segment(2)=="banner" && $this->uri->segment(3)==""){echo "active";}?>"><a href="<?php echo base_url(ADMIN_FOLDER.'/banner');?>">View Banners</a></li>
                <li class="<?php if($this->uri->segment(2)=="banner" && $this->uri->segment(3)=="add"){echo "active";}?>"><a href="<?php echo base_url(ADMIN_FOLDER.'/banner/add');?>">Add Banner</a></li>
            </ul>
        </li>
        <div class="line"></div>
        <h5 class="sidenav-heading">Catalog</h5>
        <li class="<?php if($this->uri->segment(2)=="products" || $this->uri->segment(2)=="moreviews"){echo "active";}?>"><a href="#exampledropdown2" aria-expanded="false" data-toggle="collapse" title="Products"> <span class="img-icon"><img class="img-fluid" src="<?php echo base_url("files/backend/images/icn-3.png");?>"></span> <span class="text-hidee">Products</span> </a>
            <ul id="exampledropdown2" class="collapse list-unstyled <?php if($this->uri->segment(2)=="products" || $this->uri->segment(2)=="moreviews"){echo "show";}?>">
                <li class="<?php if($this->uri->segment(2)=="products" && $this->uri->segment(3)=="categories" && $this->uri->segment(4)==""){echo "active";}?>"><a href="<?php echo base_url(ADMIN_FOLDER.'/products/categories');?>">View Categories</a></li>
                <li class="<?php if($this->uri->segment(2)=="products" && $this->uri->segment(3)=="categories" && $this->uri->segment(4)=="add"){echo "active";}?>"><a href="<?php echo base_url(ADMIN_FOLDER.'/products/categories/add');?>">Add Category</a></li>
                <li class="<?php if($this->uri->segment(2)=="products" && $this->uri->segment(3)==""){echo "active";}?>"><a href="<?php echo base_url(ADMIN_FOLDER.'/products');?>">View Products</a></li>
                <li class="<?php if($this->uri->segment(2)=="products" && $this->uri->segment(3)=="add"){echo "active";}?>"><a href="<?php echo base_url(ADMIN_FOLDER.'/products/add');?>">Add Product</a></li>
            </ul>
        </li>
        <li class="<?php if($this->uri->segment(2)=="variation"){echo "active";}?>"><a href="#exampledropdown3" aria-expanded="false" data-toggle="collapse" title="Variation"> <span class="img-icon"><img class="img-fluid" src="<?php echo base_url("files/backend/images/icn-4.png");?>"></span><span class="text-hidee">Variation</span> </a>
            <ul id="exampledropdown3" class="collapse list-unstyled <?php if($this->uri->segment(2)=="variation"){echo "show";}?>">
                <li class="<?php if($this->uri->segment(2)=="variation" && $this->uri->segment(3)=="group" && $this->uri->segment(4)==""){echo "active";}?>"><a href="<?php echo base_url(ADMIN_FOLDER.'/variation/group');?>">View Variation Group</a></li>
                <li class="<?php if($this->uri->segment(2)=="variation" && $this->uri->segment(3)=="group" && $this->uri->segment(4)=="add"){echo "active";}?>"><a href="<?php echo base_url(ADMIN_FOLDER.'/variation/group/add');?>">Add Variation Group</a></li>
            </ul>
        </li>
        <div class="line"></div>
        <h5 class="sidenav-heading">Misc</h5>
        <li class="<?php if($this->uri->segment(2)=="orders" || $this->uri->segment(2)=="order_details" || $this->uri->segment(2)=="update_order_details"){echo "active";}?>">
            <a href="<?php echo base_url(ADMIN_FOLDER.'/orders');?>" title="Orders"> <span class="img-icon"><img class="img-fluid" src="<?php echo base_url("files/backend/images/icn-5.png");?>"></span><span class="text-hidee">Orders</span></a>
        </li>
        <div class="line"></div>
        <h5 class="sidenav-heading">Settings</h5>
        <li class="<?php if($this->uri->segment(2)=="location_types" || $this->uri->segment(2)=="insert_location_type" || $this->uri->segment(2)=="zones" || $this->uri->segment(2)=="insert_zone"){echo "active";}?>"><a href="#exampledropdown4" aria-expanded="false" data-toggle="collapse" title="Locations & Zones"> <span class="img-icon"><img class="img-fluid" src="<?php echo base_url("files/backend/images/icn-6.png");?>"></span><span class="text-hidee">Locations & Zones</span> </a>
            <ul id="exampledropdown4" class="collapse list-unstyled <?php if($this->uri->segment(2)=="location_types" || $this->uri->segment(2)=="insert_location_type" || $this->uri->segment(2)=="zones" || $this->uri->segment(2)=="insert_zone"){echo "show";}?>">
                <li class="<?php if($this->uri->segment(2)=="location_types"){echo "active";}?>"><a href="<?php echo base_url(ADMIN_FOLDER.'/location_types');?>">Manage Locations</a></li>
                <li class="<?php if($this->uri->segment(2)=="insert_location_type"){echo "active";}?>"><a href="<?php echo base_url(ADMIN_FOLDER.'/insert_location_type');?>">Add Location Types</a></li>
                <li class="<?php if($this->uri->segment(2)=="zones"){echo "active";}?>"><a href="<?php echo base_url(ADMIN_FOLDER.'/zones');?>">Manage Zones</a></li>
                <li class="<?php if($this->uri->segment(2)=="insert_zone"){echo "active";}?>"><a href="<?php echo base_url(ADMIN_FOLDER.'/insert_zone');?>">Add Zone</a></li>
            </ul>
        </li>
        <li class="<?php if($this->uri->segment(2)=="payment"){echo "active";}?>"><a href="#exampledropdown65" aria-expanded="false" data-toggle="collapse" title="Payment"> <span class="img-icon"><img class="img-fluid" src="<?php echo base_url("files/backend/images/icn-16.png");?>"></span><span class="text-hidee">Payment</span> </a>
            <ul id="exampledropdown65" class="collapse list-unstyled <?php if($this->uri->segment(2)=="payment"){echo "show";}?>">
                <li class="<?php if($this->uri->segment(2)=="payment"){echo "active";}?>"><a href="<?php echo base_url(ADMIN_FOLDER.'/payment');?>">Manage Payment Options</a></li>
            </ul>
        </li>
        <li class="<?php if($this->uri->segment(2)=="shipping" || $this->uri->segment(2)=="insert-shipping"){echo "active";}?>"><a href="#exampledropdown5" aria-expanded="false" data-toggle="collapse" title="Shipping"> <span class="img-icon"><img class="img-fluid" src="<?php echo base_url("files/backend/images/icn-7.png");?>"></span><span class="text-hidee">Shipping</span> </a>
            <ul id="exampledropdown5" class="collapse list-unstyled <?php if($this->uri->segment(2)=="shipping" || $this->uri->segment(2)=="insert-shipping"){echo "show";}?>">
                <li class="<?php if($this->uri->segment(2)=="shipping"){echo "active";}?>"><a href="<?php echo base_url(ADMIN_FOLDER.'/shipping');?>">Manage Shipping Options</a></li>
                <li class="<?php if($this->uri->segment(2)=="insert-shipping"){echo "active";}?>"><a href="<?php echo base_url(ADMIN_FOLDER.'/insert-shipping');?>">Add New Shipping Option</a></li>
            </ul>
        </li>
        <li class="<?php if($this->uri->segment(2)=="tax" || $this->uri->segment(2)=="insert_tax"){echo "active";}?>"><a href="#exampledropdown6" aria-expanded="false" data-toggle="collapse" title="Taxes"> <span class="img-icon"><img class="img-fluid" src="<?php echo base_url("files/backend/images/icn-8.png");?>"></span><span class="text-hidee">Taxes</span> </a>
            <ul id="exampledropdown6" class="collapse list-unstyled <?php if($this->uri->segment(2)=="tax" || $this->uri->segment(2)=="insert_tax"){echo "show";}?>">
                <li class="<?php if($this->uri->segment(2)=="tax"){echo "active";}?>"><a href="<?php echo base_url(ADMIN_FOLDER.'/tax');?>">Manage Tax</a></li>
                <li class="<?php if($this->uri->segment(2)=="insert_tax"){echo "active";}?>"><a href="<?php echo base_url(ADMIN_FOLDER.'/insert_tax');?>">Add New Tax</a></li>
            </ul>
        </li>
        <li class="<?php if($this->uri->segment(2)=="item_discounts" || $this->uri->segment(2)=="sammary_discounts" || $this->uri->segment(2)=="insert_discount" || $this->uri->segment(2)=="discount_groups" || $this->uri->segment(2)=="insert_discount_group"){echo "active";}?>"><a href="#exampledropdown7" aria-expanded="false" data-toggle="collapse" title="Discounts"> <span class="img-icon"><img class="img-fluid" src="<?php echo base_url("files/backend/images/icn-9.png");?>"></span><span class="text-hidee">Discounts</span> </a>
            <ul id="exampledropdown7" class="collapse list-unstyled <?php if($this->uri->segment(2)=="item_discounts" || $this->uri->segment(2)=="sammary_discounts" || $this->uri->segment(2)=="insert_discount" || $this->uri->segment(2)=="discount_groups" || $this->uri->segment(2)=="insert_discount_group"){echo "show";}?>">
                <li class="<?php if($this->uri->segment(2)=="item_discounts"){echo "active";}?>"><a href="<?php echo base_url(ADMIN_FOLDER.'/item_discounts');?>">Product Discounts</a></li>
                <li class="<?php if($this->uri->segment(2)=="sammary_discounts"){echo "active";}?>"><a href="<?php echo base_url(ADMIN_FOLDER.'/summary_discounts');?>">Sammary Discounts</a></li>
                <li class="<?php if($this->uri->segment(2)=="insert_discount"){echo "active";}?>"><a href="<?php echo base_url(ADMIN_FOLDER.'/insert_discount');?>">Add New Discount</a></li>
                <li class="<?php if($this->uri->segment(2)=="discount_groups"){echo "active";}?>"><a href="<?php echo base_url(ADMIN_FOLDER.'/discount_groups');?>">Discount Group</a></li>
                <li class="<?php if($this->uri->segment(2)=="insert_discount_group"){echo "active";}?>"><a href="<?php echo base_url(ADMIN_FOLDER.'/insert_discount_group');?>">Add New Discount Group</a></li>
            </ul>
        </li>
        <li class="<?php if($this->uri->segment(2)=="currency" || $this->uri->segment(2)=="insert_currency"){echo "active";}?>"><a href="#exampledropdown8" aria-expanded="false" data-toggle="collapse" title="Currencies"> <span class="img-icon"><img class="img-fluid" src="<?php echo base_url("files/backend/images/icn-10.png");?>"></span><span class="text-hidee">Currencies</span> </a>
            <ul id="exampledropdown8" class="collapse list-unstyled <?php if($this->uri->segment(2)=="currency" || $this->uri->segment(2)=="insert_currency"){echo "show";}?>">
                <li class="<?php if($this->uri->segment(2)=="currency"){echo "active";}?>"><a href="<?php echo base_url(ADMIN_FOLDER.'/currency');?>">Manage Currencies</a></li>
                <li class="<?php if($this->uri->segment(2)=="insert_currency"){echo "active";}?>"><a href="<?php echo base_url(ADMIN_FOLDER.'/insert_currency');?>">Add New Currency</a></li>
            </ul>
        </li>
        <li class="<?php if($this->uri->segment(2)=="order_status" || $this->uri->segment(2)=="insert_order_status"){echo "active";}?>"><a href="#exampledropdown9" aria-expanded="false" data-toggle="collapse" title="Orders Statuses"> <span class="img-icon"><img class="img-fluid" src="<?php echo base_url("files/backend/images/icn-11.png");?>"></span><span class="text-hidee">Orders Statuses</span> </a>
            <ul id="exampledropdown9" class="collapse list-unstyled <?php if($this->uri->segment(2)=="order_status" || $this->uri->segment(2)=="insert_order_status"){echo "show";}?>">
                <li class="<?php if($this->uri->segment(2)=="order_status"){echo "active";}?>"><a href="<?php echo base_url(ADMIN_FOLDER.'/order_status');?>">Manage Order Status</a></li>
                <li class="<?php if($this->uri->segment(2)=="insert_order_status"){echo "active";}?>"><a href="<?php echo base_url(ADMIN_FOLDER.'/insert_order_status');?>">Add New Status</a></li>
            </ul>
        </li>

        <li class="<?php if($this->uri->segment(2)=="shopping_config" || $this->uri->segment(2)=="shopping_defaults"){echo "active";}?>"><a href="#exampledropdown10" aria-expanded="false" data-toggle="collapse" title="Shopping Config"> <span class="img-icon"><img class="img-fluid" src="<?php echo base_url("files/backend/images/icn-12.png");?>"></span><span class="text-hidee">Shopping Config</span> </a>
            <ul id="exampledropdown10" class="collapse list-unstyled <?php if($this->uri->segment(2)=="shopping_config" || $this->uri->segment(2)=="shopping_defaults"){echo "show";}?>">
                <li class="<?php if($this->uri->segment(2)=="shopping_config"){echo "active";}?>"><a href="<?php echo base_url(ADMIN_FOLDER.'/shopping_config');?>">Manage Configuration</a></li>
                <li class="<?php if($this->uri->segment(2)=="shopping_defaults"){echo "active";}?>"><a href="<?php echo base_url(ADMIN_FOLDER.'/shopping_defaults');?>">Set Dafault Setting</a></li>
                
            </ul>
        </li>
           
 <li class="<?php if($this->uri->segment(2)=="" || $this->uri->segment(2)=="email_list"){echo "active";}?>">
                <a href="<?php echo base_url(ADMIN_FOLDER);?>/email_list" title="E-mails Subscription List"> <span class="img-icon"><img class="img-fluid" src="<?php echo base_url("files/backend/images/icn-17.png");?>"></span> <span class="text-hidee">E-mails Subscription List</span></a>
            </li>        
        </ul>
    </div>
    </div>
</nav>