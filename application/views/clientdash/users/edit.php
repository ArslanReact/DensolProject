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
    <style>
        .field-icon {
  float: right;
  margin-left: -25px;
  margin-top: -25px;
  position: relative;
  z-index: 2;
}
    </style>
 </head>
  <body>

    <!-- Side Navbar -->

    <?php $this->load->view("clientdash/includes/leftbar");?>

    <div class="col-xl-10 col-lg-9">
        <!-- dashboard content -->
        <div class="content-page-admin">

      <!-- navbar-->

      <?php $this->load->view("clientdash/includes/header");?>

      <!-- Header Section-->

      <section class="dashboard-header section-padding">

        <div class="container-fluid">

          <div class="row d-flex align-items-md-stretch">

            <h4 class="col-md-12 title-heading my-4"><?php echo $page_heading;?></h4>

          </div>

          <div class="row d-flex align-items-md-stretch">

            <!-- Line Chart -->

            <div class="col-lg-12 col-md-12 flex-lg-last flex-md-first align-self-baseline">
                <div id="alertbox">
                    <?php
                    if ($this->session->flashdata('emsg') != null) {
                        echo '<div class="alert '.$this->session->flashdata('etype').'">'.$this->session->flashdata('emsg').'</div>';
                    }elseif ($this->session->flashdata('infoerror') != null) {
                        foreach($this->session->flashdata('infoerror') as $error){
                            echo '<div class="alert alert-error">'.$error.'</div>';
                        }
                    }elseif($this->session->flashdata('iii') != null){
                        foreach($this->session->flashdata('iii') as $key => $value){
                            if($key=="infosucc"){
                                foreach($value as $vv){
                                    echo '<div class="alert alert-success">'.$vv.'</div>';
                                }
                            }else{
                                foreach($value as $vv){
                                    echo '<div class="alert alert-error">'.$vv.'</div>';
                                }
                            }
                        }
                    }elseif(!empty($message)){
                        echo $message;
                    }
                    ?>
                </div>
              <div class="card sales-report mt-10px">

                <h2 class="display h4">Edit User</h2>

                <p>Edit user by Entring required detail.</p>

                <?php

                $attributes = array('class' => 'form-material card-block');

                echo form_open_multipart('users/update',$attributes);

                ?>

                    <div class="form-row">

                        <div class="col-md-3">

                            <div class="form-group">

                                <label class="mb-2">Name</label>

                                <input type="text" name="name" class="form-control" required="" value="<?php echo $user->name;?>">

                            </div>

                        </div>

                        <div class="col-md-3">

                            <div class="form-group">

                                <label class="mb-2">Username (Required)</label>

                                <input type="text" name="username" class="form-control" required="" value="<?php echo $user->username;?>">

                            </div>

                        </div>

                        <div class="col-md-3">

                            <div class="form-group">

                                <label class="mb-2">Email (Required)</label>

                                <input type="text" name="email" class="form-control" required="" value="<?php echo $user->email;?>">

                            </div>

                        </div>

                        <div class="col-md-3">

                            <div class="form-group">

                                <label class="mb-2">Password (Required)</label>

                                <input type="password" name="password" class="form-control" required="" value="nopassword">
                                <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>

                            </div>

                        </div>

       <div class="col-md-3">

                            <div class="form-group">

                                <label class="mb-2">User Disc</label>

                                <input type="number" name="discount" class="form-control"  readonly value="<?php echo $user->discount;?>">

                            </div>

                        </div>

                        <div class="col-md-3">

                            <div class="form-group">

                                <label class="mb-2">Company</label>

                                <input type="text" name="company" class="form-control" value="<?php echo $user->company;?>">

                            </div>

                        </div>

                        <div class="col-md-3">

                            <div class="form-group">

                                <label class="mb-2">Street Address 1</label>

                                <input type="text" name="address1" class="form-control" value="<?php echo $user->address1;?>">

                            </div>

                        </div>

                        <div class="col-md-3">

                            <div class="form-group">

                                <label class="mb-2">Street Address 2</label>

                                <input type="text" name="address2" class="form-control" value="<?php echo $user->address2;?>">

                            </div>

                        </div>

                        <div class="col-md-3">

                            <div class="form-group">

                                <label class="mb-2">City</label>

                                <input type="text" name="city" class="form-control" value="<?php echo $user->city;?>">

                            </div>

                        </div>



                        <div class="col-md-3">

                            <div class="form-group">

                                <label class="mb-2">State</label>

                                <input type="text" name="state" class="form-control" value="<?php echo $user->state;?>">

                            </div>

                        </div>

                        <div class="col-md-3">

                            <div class="form-group">

                                <label class="mb-2">Zip</label>

                                <input type="text" name="zip" class="form-control" value="<?php echo $user->zip;?>">

                            </div>

                        </div>

                        <div class="col-md-3">

                            <div class="form-group">

                                <label class="mb-2">Country</label>

                                <select name="country" id="" class="form-control js-selectbox">

                                    <?php echo countryOptions($user->country);?>

                                </select>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="mb-2">Phone</label>
                                <input type="text" name="phone" class="form-control" value="<?php echo $user->phone;?>">
                            </div>
                        </div>

                  </div>

                        <div class="clearfix"></div>

                    </div>

                    <div class="btn-group mt-3 float-right">

                            <input type="hidden" name="page_id" value="<?php echo $user->id;?>">
                            <button type="submit" class="btn btn-all">Submit</button>

                        </div>

                </form>

              </div>

            </div>

          </div>

        </div>

      </section>

      <!-- Updates Section -->

      <?php $this->load->view("clientdash/includes/footer");?>

     </div>
    </div>

    <!-- JavaScript files-->

    <?php $this->load->view("clientdash/includes/scripts");?>
    <script>
    $(document).ready(function(){
        // $('#selectgroupid').on('change', function() {
        // if ( this.value == '0'){$(".prodpriceshas").show('fast');}else{$(".prodpriceshas").hide('fast');}
        // });

        $('#selectgroupid').on('change', function() {
            if (this.value == '0'){
                $(".prodpriceshas").show('fast');
                $(".tradecredithas").hide('fast');
            }else if(this.value == '2'){
                $(".tradecredithas").show('fast');
                $(".prodpriceshas").hide('fast');
            }else{
                $(".tradecredithas").hide('fast');
                $(".prodpriceshas").hide('fast');
            }
        });

    });
    $(".toggle-password").click(function() {

  $(this).toggleClass("fa-eye fa-eye-slash");
  var input = $($(this).attr("toggle"));
  if (input.attr("type") == "password") {
    input.attr("type", "text");
  } else {
    input.attr("type", "password");
  }
});
    </script>

  </body>

</html>