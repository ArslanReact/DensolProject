<header class="header">
    <div class="content-page-admin">
        <div class="navbar top-navbar navbar-expand-md navbar-light">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="navbar-collapse collapse" id="navbarSupportedContent">
                <ul class="navbar-nav float-left mr-auto">
                    <li class="form-group m-0">
                        <input type="text" name="" placeholder="Type in to Seach..." class="form-control">
                        <button type="button" class="btn btn-default btn-search"><i class="fas fa-search"></i></button>
                    </li>
                </ul>
                <ul class="navbar-nav float-right">
                    <li class="notification mr-md-4">
                        <a href="" class=""><span class="bell-circle">4</span> <img class="img-fluid" src="<?=base_url();?>files/backend/images/bell-icn.svg" alt=""></a>
                    </li>
                    <li class="dropdown nav-item toggle-none dropdown-down">
                        <a href="" class="dropdown-toggle text-white" id="dropdownMenu2" data-toggle="dropdown"><img class="img-fluid mr-2" src="<?=base_url();?>files/backend/images/profile-img.png" alt=""> <?php echo $sessions['user_name'];?> <i class="ml-2 fas fa-angle-down"></i></a>
                        <div class="dropdown-menu p-0" aria-labelledby="dropdownMenu2">
                            <ul>
                                <li><a href="<?php echo base_url(ADMIN_FOLDER."/users/edit/".$this->session->userdata("uid"));?>" class="item-link d-block p-2">Edit Profile</a></li>
                                <li><a href="<?=base_url(ADMIN_FOLDER.'/logout');?>" class="item-link d-block p-2">Logout</a></li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</header>