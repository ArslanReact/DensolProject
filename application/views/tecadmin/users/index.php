<!DOCTYPE html>

<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo site_settings()->company_name." Admin Panel";?></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <link rel="icon" type="image/png" href="<?=base_url();?>files/backend/images/favicon.ico"/>
    <link rel="stylesheet" href="<?=base_url();?>files/backend/css/all.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url();?>files/backend/css/theme_bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url();?>files/backend/css/theme-style.css">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

  <body>

    <!-- Side Navbar -->

    <?php $this->load->view(ADMIN_VIEW_FOLDER."/includes/leftbar");?>

    <div class="col-xl-10 col-lg-9">
        <!-- dashboard content -->
        <div class="content-page-admin">

      <!-- navbar-->

      <?php $this->load->view(ADMIN_VIEW_FOLDER."/includes/header");?>



        <div class="col-12 m-b-20 m-t-20"><h4 class="tite-admin"><?php echo $page_heading;?></h4></div>
        <div class="row m-b-20">
            <div class="col-xl-12">
                <div class="card">

                <h4 class="display h4">All Users <a href="<?php echo base_url().ADMIN_FOLDER."/users/add";?>" class="btn btn-all float-right" style="color:#fff;font-size: 13px;padding: 5px 10px;">Add New User</a></h4>

                <p>A list of all Users</p>

                <div class="table-responsive">
                    <table class="display responsive nowrap align-middle text-truncate mb-0 table table-bordered">
                        <thead class="thead-dark">

                            <tr>

                                <th scope="col"># ID</th>

                                <th scope="col">Name</th>
                                <th scope="col">Company Name</th>

                                <th scope="col">Username</th>

                                <th scope="col">Email</th>
                                <th scope="col">User Order Details</th>
                                <th scope="col">Ac/Type</th>
                                <th scope="col">%dics</th>
                                <th scope="col">Type</th>
                                

                                <th scope="col">Group</th>

                                <th scope="col">Active</th>

                                <!--<th width="100">Last Login</th>-->

                                <th scope="col">Last Updated</th>

                                <th scope="col">Action</th>

                            </tr>

                        </thead>

                        <tbody>

                            <?php

                                if(isset($users)){

                                foreach($users as $user){

                            ?>

                            <tr>

                                <td>

<!--                                    <div class="checkbox-container">-->
<!--                                        <label class="checkbox-label">-->
<!--                                            <input type="checkbox" form="myform" name="check[]" id="--><?php //echo $user->id;?><!--" value="--><?php //echo $user->id;?><!--">-->
<!--                                            <span class="checkbox-custom rectangular"></span>-->
<!--                                        </label>-->
<!--                                    </div>-->

                                    <?php echo $user->id;?>

                                </td>

                                <td>

                                    <?php echo $user->name;?>

                                </td>
                                <td>

                                    <?php if($user->company){ echo $user->company; } else{ echo "N/A"; } ?>

                                </td>

                                <td>

                                    <?php echo $user->username;?>

                                </td>

                                <td>

                                    <?php echo $user->email;?>

                                </td>
                                <td>
                                    <a href="<?php echo base_url().ADMIN_FOLDER.'/userallorder/'.$user->id; ?>" target="_blank"><button class="btn btn-all">User All Orders View</button></a>
                                </td>                                
                                <td>

                                    <?php echo $user->acc_type;?>

                                </td>
                                <td>

                                    <?php echo $user->discount;?>%

                                </td>

                                <td>
                                    <?php 
                                    $dd = $user->is_admin;
                                    if($dd==1){echo "Admin";}else{echo "user";}
                                    ?>
                                </td>

                                <td>
                                    <?php
                                    if($user->user_group==0){
                                    echo "Customizes User";
                                    }else{
                                    $usergroup = getuserGroup($user->user_group);
                                    echo $usergroup->title;
                                    }
                                    ?>
                                </td>

                                <td><?php if($user->is_active==1){?><label class="btn btn-all">Yes</label><? }else{?><label class="btn btn-all">No</label><? }?></td>
                                
                                <!--<td><?php //echo timesincenew($user->last_login)." ago";?></td>-->
                                <td><?php echo $user->created;?></td>
                                <td>

                                <a title="Edit" class="btn btn-all" href="<?php echo base_url().ADMIN_FOLDER.'/users/edit/'.$user->id;?>"><i class="fa fa-pencil-square-o f-16"></i></a>

                                <a title="Delete" class="btn btn-all" href="<?php echo base_url().ADMIN_FOLDER.'/users/delete/'.$user->id;?>" onclick="return confirm('Are you sure you want to delete this record?');"><i class="fa fa-trash f-16"></i></a>

                                </td>

                            </tr>

                            <? }}?>

                        </tbody>

                    </table>



                </div>

              </div>

            </div>
        </div>

      <!-- Updates Section -->

      <?php $this->load->view(ADMIN_VIEW_FOLDER."/includes/footer");?>

    </div>
    </div>

    <!-- JavaScript files-->

    <?php $this->load->view(ADMIN_VIEW_FOLDER."/includes/scripts");?>

  </body>

</html>