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

                <h4 class="display h4">All Request</h4>

                <p>A list of All Pending Student Request</p>

                <div class="table-responsive">
                    <table class="display responsive nowrap align-middle text-truncate mb-0 table table-bordered">
                        <thead class="thead-dark">

                            <tr>

                                <th scope="col"># ID</th>
                                <th scope="col">First Name</th>
                                <th scope="col">Last Name</th>
                                <th scope="col">Institute</th>
                                <th scope="col">Std. ID </th>
                                <th scope="col">Area Of Study</th>
                                <th scope="col">Study Year</th>
                                <th scope="col">Contact</th>
                                <th scope="col">Email</th>
                                <th scope="col">Address</th>
                                <th scope="col">Login</th>
                                <th scope="col">Action</th>

                            </tr>

                        </thead>

                        <tbody>

                            <?php

                                if(isset($requests)){

                                foreach($requests as $user){

                            ?>

                            <tr id="<?php echo $user->form_id; ?>">

                                <td>
                                    <?php echo $user->form_id;?>
                                </td>
                                <td>
                                    <?php echo $user->fname;?>
                                </td>
                                <td>
                                    <?php echo $user->lname;?>
                                </td>
                                <td>
                                    <?php echo $user->institute;?>
                                </td>
                                <td>
                                    <?php echo  $user->id_number; ?>
                                </td>
                                <td>
                                    <?php echo  $user->area_of_study; ?>
                                </td>
                                <td>
                                    <?php echo  $user->study_year; ?>
                                </td>
                                <td>
                                    <?php echo  $user->contact; ?>
                                </td> 
                                <td>
                                    <?php echo  $user->email; ?>
                                </td>                                 
                                <td>
                                    <?php echo  $user->address; ?>
                                </td> 
                                <td>
                                    <a title="Generate Login" class="btn btn-all generate_login" href="#!"><i class="fa fa-check f-16"></i>Generate Login</a>
                                </td>
                                <td>
                                    <a title="Delete" class="btn btn-all" href="<?php echo base_url().ADMIN_FOLDER.'/users/delete_student_req/'.$user->form_id;?>" onclick="return confirm('Are you sure you want to delete this record?');"><i class="fa fa-trash f-16"></i></a>
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

    <?php $this->load->view(ADMIN_VIEW_FOLDER."/includes/scripts-bk");?>

  </body>
<!-- Modal -->
<div id="studenLogin" class="modal fade student-modal" role="dialog">
  <div class="modal-dialog modal-sm">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">     
        <h4 class="modal-title">Student Login Form</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>

      </div>
      <div class="modal-body">
        <?php $attributes = array('method' => 'post');
             echo form_open_multipart(ADMIN_FOLDER.'/users/generate_student_login',$attributes);
        ?>
          <label for="fname">Discount:</label>
          <input type="hidden" name="form_id" id="form_id">
          <input type="number" id="discount" name="discount" class="form-control" placeholder="Enter Discount" required>
          <label for="lname">Password:</label>
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
<script>
    $('.generate_login').click(function(){
        var id = $(this).parents("tr").attr("id");
        $('#form_id').val(id);
        $('#studenLogin').modal('show');
    });
</script>
</html>