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

      <!-- Header Section-->

            <div class="col-12 m-b-20 m-t-20"><h4 class="tite-admin"><?=$page_heading;?></h4></div>

            <div class="row m-b-20">
                <div class="col-xl-12">
                    <div class="card">

                <h2 class="display h4">Add New User</h2>

                <p>Add new user by Entring required detail.</p>

                <?php

                $attributes = array('class' => 'form-material card-block');

                echo form_open_multipart(ADMIN_FOLDER.'/users/add_submit',$attributes);

                ?>

                    <div class="row">

                        <div class="col-md-3">

                            <div class="form-group">

                                <label>Name</label>

                                <input type="text" name="name" class="form-control" required="">

                            </div>

                        </div>

                        <div class="col-md-3">

                            <div class="form-group">

                                <label>Username (Required)</label>

                                <input type="text" name="username" class="form-control" required="">

                            </div>

                        </div>

                        <div class="col-md-3">

                            <div class="form-group">

                                <label>Email (Required)</label>

                                <input type="text" name="email" class="form-control" required="">

                            </div>

                        </div>

                        <div class="col-md-3">

                            <div class="form-group">

                                <label>Password (Required)</label>

                                <input type="password" name="password" class="form-control" required="">

                            </div>

                        </div>



                        <div class="col-md-3">

                            <div class="form-group">

                                <label>Company</label>

                                <input type="text" name="company" class="form-control">

                            </div>

                        </div>

                        <div class="col-md-3">

                            <div class="form-group">

                                <label>Street Address 1</label>

                                <input type="text" name="address1" class="form-control">

                            </div>

                        </div>

                        <div class="col-md-3">

                            <div class="form-group">

                                <label>Street Address 2</label>

                                <input type="text" name="address2" class="form-control">

                            </div>

                        </div>

                        <div class="col-md-3">

                            <div class="form-group">

                                <label>City</label>

                                <input type="text" name="city" class="form-control">

                            </div>

                        </div>



                        <div class="col-md-3">

                            <div class="form-group">

                                <label>State</label>

                                <input type="text" name="state" class="form-control">

                            </div>

                        </div>

                        <div class="col-md-3">

                            <div class="form-group">

                                <label>Zip</label>

                                <input type="text" name="zip" class="form-control">

                            </div>

                        </div>

                        <div class="col-md-3">

                            <div class="form-group">

                                <label>Country</label>

                                <select name="country" id="" class="form-control js-selectbox">

                                    <?php echo countryOptions();?>

                                </select>

                            </div>

                        </div>

                        <div class="col-md-3">

                            <div class="form-group">

                                <label>Phone</label>

                                <input type="text" name="phone" class="form-control">

                            </div>

                        </div>
                        <div class="col-md-3">

                            <div class="form-group">

                                <label>Is Active</label>

                                <select name="is_active" id="" class="form-control js-selectbox">

                                    <option value="1">Yes</option>

                                    <option value="0">No</option>

                                </select>

                            </div>

                        </div>
                        <div class="col-md-3">

                            <div class="form-group">

                                <label>Is Admin?</label>

                                <select name="is_admin" id="" class="form-control js-selectbox">

                                    <option value="0">No</option>

                                    <option value="1">Yes</option>

                                </select>

                            </div>

                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>User Group</label>
                                <select name="user_group" id="selectgroupid" class="form-control js-selectbox">
                                    <?php
                                    if(!empty($user_groups)){
                                    foreach($user_groups as $user_group){
                                    ?>
                                    <option <?php if($user_group->id == 3){echo "selected";}?> value="<?php echo $user_group->id;?>"><?php echo $user_group->title;?></option>
                                    <?php }}?>
                                    <option value="0">Customized User</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3 tradecredithas">
                            <div class="form-group">
                                <label>Credit Type</label>
                                <select name="credit_type" id="selectgroupid" class="form-control js-selectbox">
                                    <option value="0">By Cash</option>
                                    <option value="30">30 Days</option>
                                    <option value="45">45 Days</option>
                                    <option value="60">60 Days</option>
                                </select>
                            </div>
                        </div>
                        <div class="prodpriceshas" style="width:100%; display:none;">
                        <?php
                        $products = getAllProds();
                        if(!empty($products)){
                        ?>
                        <div class="col-md-12 m-t-10">
                            <h6>Customized User Product Prices</h6>
                        </div>
                        <div class="col-md-12 prdvar">
                            <div id="accordion" role="tablist" aria-multiselectable="true" style="margin-bottom:15px;">
                                <?php
                                foreach($products as $product){
                                ?>
                                <div class="accordion-panel" style="border: 1px solid #ddd;margin-bottom:10px;">
                                    <div class="accordion-heading" role="tab" id="grouppriceextra<?php echo $product->id;?>">
                                        <h3 class="card-title accordion-title" style="margin-bottom:0;">
                                            <a class="accordion-msg waves-effect waves-dark" data-toggle="collapse"
                                            data-parent="#accordion" href="#grouppriceextrain<?php echo $product->id;?>"
                                            aria-expanded="true" aria-controls="grouppriceextrain<?php echo $product->id;?>" style="padding: 14px 10px;display:block;color:#ffb901;">
                                            <img width="100" src="<?php echo base_url("uploads/products/small/".$product->image);?>"><?php echo $product->title.' Price';?>
                                            </a>
                                        </h3>
                                    </div>
                                    <div id="grouppriceextrain<?php echo $product->id;?>" class="panel-collapse collapse in show" role="tabpanel" aria-labelledby="grouppriceextra<?php echo $product->id;?>">
                                        <div class="accordion-content accordion-desc menubuilder" style="padding: 0 10px 10px 10px;">
                                            <div class="row">
                                                <div class="col-md-4 m-b-15">
                                                    <div class="checkbox">
                                                            <input type="checkbox" name="customprice[<?php echo $product->id;?>][is_active]" value="1">
                                                            <div class="checkbox-visible"></div>
                                                    </div>
                                                    Enable for Buying
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label>Price</label>
                                                        <input type="hidden" name="customprice[<?php echo $product->id;?>][id]" value="<?php echo $product->id;?>">
                                                        <input type="text" class="form-control" name="customprice[<?php echo $product->id;?>][price]" value="0.00">
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label>Sale Price</label>
                                                        <input type="text" class="form-control" name="customprice[<?php echo $product->id;?>][sale_price]" value="0.00">
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label>Start Sale</label>
                                                        <input type="date" class="form-control" name="customprice[<?php echo $product->id;?>][sale_start]">
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label>End Sale</label>
                                                        <input type="date" class="form-control" name="customprice[<?php echo $product->id;?>][sale_end]">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php }?>
                            </div>
                        </div>
                        <?php }?>
                        </div>
                        <div class="clearfix"></div>

                    </div>

                    <div class="row">
                        <div class="btn-group mt-30px col">
                          <div class="col-md-2">
                            <a href="<?php echo base_url(ADMIN_FOLDER."/users/");?>" class="btn btn-all">Cancel</a>
                            <button type="submit" class="btn btn-all">Submit</button>
                          </div>
                        </div>

                    </div>

                </form>

              </div>

                </div>
            </div>

      <!-- Updates Section -->

      <?php $this->load->view(ADMIN_VIEW_FOLDER."/includes/footer");?>

    </div>
    </div>

    <!-- JavaScript files-->

    <?php $this->load->view(ADMIN_VIEW_FOLDER."/includes/scripts");?>
    <script>
    $(document).ready(function(){
        // tradecredithas
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
    </script>
  </body>

</html>