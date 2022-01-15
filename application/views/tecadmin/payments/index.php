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
  <style>

      .accordion .card{
          padding: 0;
          border-bottom: 1px solid #26282a;
      }
      .card{ border-radius: 0px;}
      .accordion .card .card-header{
          padding:0;
      }
      .accordion .card .card-header h2{

      }
      .accordion .card .card-header h2 button{
          display: block;
          width: 100%;
          text-align: left;
          padding: 20px;
          color: black;
          font-weight: 600;
      }
      .accordion .card .card-header h2 button:hover{
          color: #fff;
          text-decoration: none;
          background:#26282a;
          border-radius: 0;
      }

      .accordion .card .card-header h2 button[aria-expanded=true] {
          color: #fff;
          background-color: #26282a;
          text-decoration: none;
      }

  </style>
  <body>
    <!-- Side Navbar -->
    <?php $this->load->view(ADMIN_VIEW_FOLDER."/includes/leftbar");?>

    <div class="col-xl-10 col-lg-9">
        <!-- dashboard content -->
        <div class="content-page-admin">
      <!-- navbar-->
      <?php $this->load->view(ADMIN_VIEW_FOLDER."/includes/header");?>
      <!-- Header Section-->
            <div class="col-12 m-b-20 m-t-20"><h4 class="tite-admin"><?php echo $page_heading;?></h4></div>

          <div class="row d-flex align-items-md-stretch">
            <!-- Line Chart -->
            <div class="col-lg-12 col-md-12 flex-lg-last flex-md-first align-self-baseline">
              <div class="card sales-report mt-10px">
                <h5 class="m-b-10">Manage Payments</h5>
                <p>Manage and activate payment you want and update settings</p>
                <div class="table-responsive">
                <div class="accordion" id="accordionExample" style="margin-bottom:30px;">
                <?php echo form_open(current_url());?>
                    <?php
                    if(!empty($payments)){
                    foreach($payments as $payment){
                    ?>
                    <?php if($payment->id==1){?>
                    <div class="card">
                      <div class="card-header" id="heading<?php echo $payment->id;?>">
                        <h2 class="mb-0">
                          <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse<?php echo $payment->id;?>" aria-expanded="false" aria-controls="collapse<?php echo $payment->id;?>">
                          <i class="fa fa-university"></i> <?php echo $payment->title;?> <i class="fa fa-angle-down"></i>
                          </button>
                        </h2>
                      </div>

                      <div id="collapse<?php echo $payment->id;?>" class="collapse" aria-labelledby="heading<?php echo $payment->id;?>" data-parent="#accordionExample">
                        <div class="card-body">
                          <div class="row">
                            <div class="col-md-4">
                              <div class="form-group">
                                <label for="ida">Active</label>
                                <select id="ida" name="payments[<?php echo $payment->id;?>][is_active]" class="form-control">
                                  <option value="0" <?php if($payment->is_active==0){echo "selected";}?>>No</option>
                                  <option value="1" <?php if($payment->is_active==1){echo "selected";}?>>Yes</option>
                                </select>
                              </div>
                            </div>
                            <div class="col-md-4">
                              <div class="form-group">
                                <label for="ida">Title</label>
                                <input type="text" id="ida" name="payments[<?php echo $payment->id;?>][title]" value="<?php echo $payment->title;?>" class="form-control">
                              </div>
                            </div>
                                <input type="hidden" name="payments[<?php echo $payment->id;?>][is_live]" value="<?php echo $payment->is_live;?>">
                                <input type="hidden" name="payments[<?php echo $payment->id;?>][email]" value="<?php echo $payment->email;?>">
                                <input type="hidden" name="payments[<?php echo $payment->id;?>][api_password]" value="<?php echo $payment->api_password;?>">
                                <input type="hidden" name="payments[<?php echo $payment->id;?>][api_key]" value="<?php echo $payment->api_key;?>">
                                <input type="hidden" name="payments[<?php echo $payment->id;?>][api_secret]" value="<?php echo $payment->api_secret;?>">
                            <div class="col-md-4">
                              <div class="form-group">
                                <label for="ida">Sort</label>
                                <input type="text" id="ida" name="payments[<?php echo $payment->id;?>][sort]" class="form-control" value="<?php echo $payment->sort;?>">
                              </div>
                            </div>
                            <div class="col-md-12">
                              <div class="form-group">
                                <label for="ida">Notes (Basket/Checkout)</label>
                                <textarea id="ida" rows="5" name="payments[<?php echo $payment->id;?>][notes_basket]" class="form-control"><?php echo $payment->notes_basket;?></textarea>
                              </div>
                            </div>
                            <div class="col-md-12">
                              <div class="form-group">
                                <label for="ida">Notes (After Checkout page)</label>
                                <textarea id="ida" name="payments[<?php echo $payment->id;?>][notes_order]" class="editor form-control"><?php echo $payment->notes_order;?></textarea>
                              </div>
                            </div>
                            
                          </div>
                        </div>
                      </div>
                    </div>
                    <?php }elseif($payment->id==2){?>
                    <div class="card">
                      <div class="card-header" id="heading<?php echo $payment->id;?>">
                        <h2 class="mb-0">
                          <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse<?php echo $payment->id;?>" aria-expanded="false" aria-controls="collapse<?php echo $payment->id;?>">
                          <i class="fa fa-paypal"></i> <?php echo $payment->title;?> <i class="fa fa-angle-down"></i>
                          </button>
                        </h2>
                      </div>

                      <div id="collapse<?php echo $payment->id;?>" class="collapse" aria-labelledby="heading<?php echo $payment->id;?>" data-parent="#accordionExample">
                        <div class="card-body">

                          <div class="row">
                            <div class="col-md-4">
                              <div class="form-group">
                                <label for="ida">Active</label>
                                <select id="ida" name="payments[<?php echo $payment->id;?>][is_active]" class="form-control">
                                  <option value="0" <?php if($payment->is_active==0){echo "selected";}?>>No</option>
                                  <option value="1" <?php if($payment->is_active==1){echo "selected";}?>>Yes</option>
                                </select>
                              </div>
                            </div>
                            <div class="col-md-4">
                              <div class="form-group">
                                <label for="ida">Payment Use for</label>
                                <select id="ida" name="payments[<?php echo $payment->id;?>][is_live]" class="form-control">
                                  <option value="0" <?php if($payment->is_live==0){echo "selected";}?>>Test Server</option>
                                  <option value="1"<?php if($payment->is_live==1){echo "selected";}?>>Live Server</option>
                                </select>
                              </div>
                            </div>
                            <div class="col-md-4">
                              <div class="form-group">
                                <label for="ida">Title</label>
                                <input type="text" id="ida" name="payments[<?php echo $payment->id;?>][title]" value="<?php echo $payment->title;?>" class="form-control">
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                <label for="ida">Business Email</label>
                                <input type="text" id="ida" name="payments[<?php echo $payment->id;?>][email]" value="<?php echo $payment->email;?>" class="form-control">
                              </div>
                            </div>
                            <input type="hidden" name="payments[<?php echo $payment->id;?>][api_password]" value="<?php echo $payment->api_password;?>">
                            <input type="hidden" name="payments[<?php echo $payment->id;?>][api_key]" value="<?php echo $payment->api_key;?>">
                            <input type="hidden" name="payments[<?php echo $payment->id;?>][api_secret]" value="<?php echo $payment->api_secret;?>">
                            <div class="col-md-6">
                              <div class="form-group">
                                <label for="ida">Sort</label>
                                <input type="text" id="ida" name="payments[<?php echo $payment->id;?>][sort]" class="form-control" value="<?php echo $payment->sort;?>">
                              </div>
                            </div>
                            <div class="col-md-12">
                              <div class="form-group">
                                <label for="ida">Notes (Basket/Checkout)</label>
                                <textarea id="ida" rows="5" name="payments[<?php echo $payment->id;?>][notes_basket]" class="form-control"><?php echo $payment->notes_basket;?></textarea>
                              </div>
                            </div>
                            <div class="col-md-12">
                              <div class="form-group">
                                <label for="ida">Notes (After Checkout page)</label>
                                <textarea id="ida" name="payments[<?php echo $payment->id;?>][notes_order]" class="editor form-control"><?php echo $payment->notes_order;?></textarea>
                              </div>
                            </div>
                            
                          </div>
                        </div>
                      </div>
                    </div>
                    <?php }elseif($payment->id==3){?>
                    <div class="card">
                      <div class="card-header" id="heading<?php echo $payment->id;?>">
                        <h2 class="mb-0">
                          <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse<?php echo $payment->id;?>" aria-expanded="false" aria-controls="collapse<?php echo $payment->id;?>">
                          <i class="fa fa-credit-card"></i> <?php echo $payment->title;?> <i class="fa fa-angle-down"></i>
                          </button>
                        </h2>
                      </div>

                      <div id="collapse<?php echo $payment->id;?>" class="collapse" aria-labelledby="heading<?php echo $payment->id;?>" data-parent="#accordionExample">
                        <div class="card-body">
                          <div class="row">
                            <div class="col-md-3">
                              <div class="form-group">
                                <label for="ida">Active</label>
                                <select id="ida" name="payments[<?php echo $payment->id;?>][is_active]" class="form-control">
                                  <option value="0"<?php if($payment->is_active==0){echo "selected";}?>>No</option>
                                  <option value="1"<?php if($payment->is_active==1){echo "selected";}?>>Yes</option>
                                </select>
                              </div>
                            </div>
                            <div class="col-md-3">
                              <div class="form-group">
                                <label for="ida">Payment Use for</label>
                                <select id="ida" name="payments[<?php echo $payment->id;?>][is_live]" class="form-control">
                                  <option value="0"<?php if($payment->is_live==0){echo "selected";}?>>Test Server</option>
                                  <option value="1"<?php if($payment->is_live==1){echo "selected";}?>>Live Server</option>
                                </select>
                              </div>
                            </div>
                            <input type="hidden" name="payments[<?php echo $payment->id;?>][email]" value="<?php echo $payment->email;?>" >
                            <input type="hidden" name="payments[<?php echo $payment->id;?>][api_password]" value="<?php echo $payment->api_password;?>">
                            <div class="col-md-3">
                              <div class="form-group">
                                <label for="ida">Title</label>
                                <input type="text" id="ida" name="payments[<?php echo $payment->id;?>][title]" value="<?php echo $payment->title;?>" class="form-control">
                              </div>
                            </div>
                            <div class="col-md-3">
                              <div class="form-group">
                                <label for="ida">Sort</label>
                                <input type="text" id="ida" name="payments[<?php echo $payment->id;?>][sort]" class="form-control" value="<?php echo $payment->sort;?>">
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                <label for="ida">API Key</label>
                                <textarea id="ida" name="payments[<?php echo $payment->id;?>][api_key]" class="form-control"><?php echo $payment->api_key;?></textarea>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                <label for="ida">API Secret Key</label>
                                <textarea id="ida" name="payments[<?php echo $payment->id;?>][api_secret]" class="form-control"><?php echo $payment->api_secret;?></textarea>
                              </div>
                            </div>                              
                            <div class="col-md-12">
                              <div class="form-group">
                                <label for="ida">Notes (Basket/Checkout)</label>
                                <textarea id="ida" rows="5" name="payments[<?php echo $payment->id;?>][notes_basket]" class="form-control"><?php echo $payment->notes_basket;?></textarea>
                              </div>
                            </div>
                            <div class="col-md-12">
                              <div class="form-group">
                                <label for="ida">Notes (After Checkout page)</label>
                                <textarea id="ida" name="payments[<?php echo $payment->id;?>][notes_order]" class="editor form-control"><?php echo $payment->notes_order;?></textarea>
                              </div>
                            </div>
                            
                          </div>
                        </div>
                      </div>
                    </div>
                    <?php }elseif($payment->id==4){?>
                    <div class="card">
                      <div class="card-header" id="heading<?php echo $payment->id;?>">
                        <h2 class="mb-0">
                          <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse<?php echo $payment->id;?>" aria-expanded="false" aria-controls="collapse<?php echo $payment->id;?>">
                          <i class="fa fa-credit-card"></i> <?php echo $payment->title;?> <i class="fa fa-angle-down"></i>
                          </button>
                        </h2>
                      </div>

                      <div id="collapse<?php echo $payment->id;?>" class="collapse" aria-labelledby="heading<?php echo $payment->id;?>" data-parent="#accordionExample">
                        <div class="card-body">

                          <div class="row">
                            <div class="col-md-3">
                              <div class="form-group">
                                <label for="ida">Active</label>
                                <select id="ida" name="payments[<?php echo $payment->id;?>][is_active]" class="form-control">
                                  <option value="0"<?php if($payment->is_active==0){echo "selected";}?>>No</option>
                                  <option value="1"<?php if($payment->is_active==1){echo "selected";}?>>Yes</option>
                                </select>
                              </div>
                            </div>
                            <div class="col-md-3">
                              <div class="form-group">
                                <label for="ida">Payment Use for</label>
                                <select id="ida" name="payments[<?php echo $payment->id;?>][is_live]" class="form-control">
                                  <option value="0"<?php if($payment->is_live==0){echo "selected";}?>>Test Server</option>
                                  <option value="1"<?php if($payment->is_live==1){echo "selected";}?>>Live Server</option>
                                </select>
                              </div>
                            </div>

                            <input type="hidden" name="payments[<?php echo $payment->id;?>][email]" value="<?php echo $payment->email;?>">
                            <input type="hidden" name="payments[<?php echo $payment->id;?>][api_secret]" value="<?php echo $payment->api_secret;?>">

                            <div class="col-md-3">
                              <div class="form-group">
                                <label for="ida">Title</label>
                                <input type="text" id="ida" name="payments[<?php echo $payment->id;?>][title]" value="<?php echo $payment->title;?>" class="form-control">
                              </div>
                            </div>
                            <div class="col-md-3">
                              <div class="form-group">
                                <label for="ida">Sort</label>
                                <input type="text" id="ida" name="payments[<?php echo $payment->id;?>][sort]" class="form-control" value="<?php echo $payment->sort;?>">
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                <label for="ida">API Key</label>
                                <textarea id="ida" name="payments[<?php echo $payment->id;?>][api_key]" class="form-control"><?php echo $payment->api_key;?></textarea>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                <label for="ida">API Password</label>
                                <textarea id="ida" name="payments[<?php echo $payment->id;?>][api_password]" class="form-control"><?php echo $payment->api_password;?></textarea>
                              </div>
                            </div>                              
                            <div class="col-md-12">
                              <div class="form-group">
                                <label for="ida">Notes (Basket/Checkout)</label>
                                <textarea id="ida" rows="5" name="payments[<?php echo $payment->id;?>][notes_basket]" class="form-control"><?php echo $payment->notes_basket;?></textarea>
                              </div>
                            </div>
                            <div class="col-md-12">
                              <div class="form-group">
                                <label for="ida">Notes (After Checkout page)</label>
                                <textarea id="ida" name="payments[<?php echo $payment->id;?>][notes_order]" class="editor form-control"><?php echo $payment->notes_order;?></textarea>
                              </div>
                            </div>
                            
                          </div>
                        </div>
                      </div>
                    </div>
                    <?php }?>
                    <input type="hidden" name="payments[<?php echo $payment->id;?>][id]" value="<?php echo $payment->id;?>">
                    <?php }}?>
                    </div>
                    <fieldset>
                        <!--<h2>Update Payment Setting</h2>-->
                        <small>Before submit please check your information carefully and then hit update button.</small>
                        <ul>
                            <li>
                                <input type="submit" name="update_payments" value="Update Payment Setting" class="btn btn-all"/>
                            </li>
                        </ul>
                    </fieldset>
                <?php echo form_close();?>
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