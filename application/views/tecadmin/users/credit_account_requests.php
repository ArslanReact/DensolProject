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

                <h4 class="display h4">All Request <a href="<?php echo base_url().ADMIN_FOLDER."/users/add";?>" class="btn btn-all float-right" style="color:#fff;font-size: 13px;padding: 5px 10px;">Add New User</a></h4>

                <p>A list of all Request</p>

                <div class="table-responsive">
                    <table class="display responsive nowrap align-middle text-truncate mb-0 table table-bordered">
                        <thead class="thead-dark">

                            <tr>

                                <th scope="col"># ID</th>

                                <th scope="col">Business Name</th>

                                <th scope="col">Trading Name</th>

                                <th scope="col">Email</th>

                                <th scope="col">Type</th>

                                <th scope="col">Group</th>

                                <th scope="col">Active</th>

                                <!--<th width="100">Last Login</th>-->

                                <th scope="col">Last Updated</th>
                                <th scope="col">Login</th>
                                <th scope="col">Action</th>

                            </tr>

                        </thead>

                        <tbody>

                            <?php

                                if(isset($requests)){

                                foreach($requests as $user){

                            ?>

                            <tr id="<?php echo $user->request_id;?>">

                                <td>
                                    <?php echo $user->request_no;?>
                                </td>

                                <td>

                                    <?php echo $user->business_name;?>

                                </td>

                                <td>

                                    <?php echo $user->trading_name;?>

                                </td>

                                <td>

                                    <?php echo $user->email;?>

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
                                    <a title="Generate Login" class="btn btn-all generate_login" href="#!"><i class="fa fa-check f-16"></i>Generate Login</a>
                                    
                                </td>                                
                                <td>

                                <a title="View Details" class="btn btn-all viewdetails" href="#!"><i class="fa fa-eye f-16"></i> View Details</a>
                                <a href="<?php echo base_url(ADMIN_FOLDER.'/users/creditsaveinpdf').'/'.$user->request_id; ?>"><button type="button" class="btn btn-all" data-dismiss="modal"><i class="fa fa-cloud-download f-16"></i> Save In Pdf</button></a>
                                <a title="Delete" class="btn btn-all" href="<?php echo base_url().ADMIN_FOLDER.'/users/delete_credit_account_req/'.$user->request_id;?>" onclick="return confirm('Are you sure you want to delete this record?');"><i class="fa fa-trash f-16"></i></a>

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
<!-- Modal -->
<div id="AccLogin" class="modal fade student-modal" role="dialog">
  <div class="modal-dialog modal-sm">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">     
        <h4 class="modal-title">Login Generation Form</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>

      </div>
      <div class="modal-body">
        <?php $attributes = array('method' => 'post');
             echo form_open_multipart(ADMIN_FOLDER.'/users/generate_credit_login',$attributes);
        ?>
          <label for="fname">Account Type:</label>
          <input type="hidden" name="form_id" id="form_id">
          <select name="acctype" class="form-control">
              <option value="Gold Account">Gold Account</option>
              <option value="Standard Account">Standard Account</option>
          </select>
          <label for="uname">Username:</label>
          <input type="text" id="username" class="form-control" name="username" required>
          <label for="fname">First Name:</label>
          <input type="text" id="fname" class="form-control" name="fname" required>
          <label for="lname">Last Name:</label>
          <input type="text" id="lname" class="form-control" name="lname" required>
          <label for="password">Password:</label>
          <input type="password" id="password" class="form-control" name="password" required>          
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-all">Generate Now!</button>
        <button type="button" class="btn btn-all" data-dismiss="modal">Close</button>
        </form>
      </div>
    </div>

  </div>
</div>  



<!-- The Modal -->
  <div class="modal fade" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">All Details</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body detailsfromdb">

        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-all" data-dismiss="modal">Close</button>
        </div>
        
      </div>
    </div>
  </div>
  
</div>
<script>
    $('.generate_login').click(function(){
        var id = $(this).parents("tr").attr("id");
        $('#form_id').val(id);
        $('#AccLogin').modal('show');
    });
</script>
<script>
    $('.viewdetails').click(function(){
        var id = $(this).parents("tr").attr("id");
        $.ajax({
          type: "POST",
          url: "<?php echo base_url(ADMIN_FOLDER.'/users/showcredit_requestdetails'); ?>",
          data: {"formid":id},
          success: function(data){
             $(".detailsfromdb").html('');
             $(".detailsfromdb").append(data);
          }
        });        
        $('#myModal').modal('show');
    });
</script>
</html>