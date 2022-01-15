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

                <div class="col-12 m-b-20 m-t-20"><h4 class="tite-admin"><?php echo $page_heading;?></h4></div>
                <div class="row m-b-20">
                    <div class="col-xl-12">
                        <div class="card">
                <h5 class="display h4">Edit Variation Option</h5>
                <p>Edit Variation Option by Entring required detail.</p>
                <?php
                $attributes = array('class' => 'form-material card-block');
                echo form_open_multipart(ADMIN_FOLDER.'/variation/update',$attributes);
                ?>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Option Title</label>
                                <input type="text" name="title" value="<?php echo $variation->title;?>" class="form-control" required="">
                            </div>
                        </div>
                        <!-- <div class="col-md-3">
                            <div class="form-group">
                                <label>Option Sku (Optional)</label>
                                <input type="text" name="sku" value="<?php //echo $variation->sku;?>" class="form-control">
                            </div>
                        </div> -->
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label>Price (Optional)</label>
                                        <input type="text" name="price" value="<?php echo $variation->price;?>" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Price Adjustment (Optional)</label>
                                        <select name="price_option" class="form-control">
                                            <option <?php if($variation->price_option=="+"){echo "selected";}?> value="+">+ Plus</option>
                                            <option <?php if($variation->price_option=="-"){echo "selected";}?> value="-">- Minus</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Detail (Optional)</label>
                                <input type="text" name="detail" value="<?php echo $variation->detail;?>" class="form-control">
                            </div>
                        </div>
                        <!-- <div class="col-md-3">
                            <div class="form-group">
                                <label>Qty (Optional)</label>
                                <input type="text" name="qty" value="<?php //echo $variation->qty;?>" class="form-control">
                            </div>
                        </div> -->
                        <?php if($group->is_color==1){?>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Option Color (Optional)</label>
                                <input type="color" name="color" value="<?php echo $variation->color;?>" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Option Image (Optional)</label>
                                <div class="custom-file">
                                    <input type="file" name="image" class="custom-file-input" id="customFile">
                                    <label class="custom-file-label" for="Choose files To Upload">Choose files To Upload</label>
                                    <?php if($variation->image != ""){?>
                                    <img src="<?php echo base_url()."uploads/variation/small/".$variation->image;?>" style="max-height: 80px; margin-bottom: 15px;">
                                    <div class="checkbox-container">
                                        <label class="checkbox-label">
                                            <input type="checkbox" name="del_image" value="1">
                                            <span class="checkbox-custom rectangular"></span>
                                        </label>
                                        Delete
                                    </div>
                                    <?php }?>
                                </div>
                            </div>
                        </div>
                        <?php }?>
                        <div class="col-md-2">
                            <div class="form-group">
                                <ul class="list-unstyled mb-0">
                                    <li class="d-inline-block mr-2">
                                    <fieldset>
                                        <label for="customRadio">Publish</label>
                                        <div class="custom-control custom-radio">
                                        <input type="radio" class="custom-control-input" name="is_active" value="1" id="customRadio3" <?php if($variation->is_active==1){?>checked="checked"<? }?>>
                                        <label class="custom-control-label" for="customRadio3">Yes</label>
                                        </div>
                                    </fieldset>
                                    </li>
                                    <li class="d-inline-block mr-2">
                                    <fieldset>
                                        <div class="custom-control custom-radio">
                                        <input type="radio" class="custom-control-input" name="is_active" value="0" id="customRadio4" <?php if($variation->is_active==0){?>checked="checked"<? }?>>
                                        <label class="custom-control-label" for="customRadio4">No</label>
                                        </div>
                                    </fieldset>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label>Sort</label>
                                <input class="form-control" name="sort" value="<?php echo $variation->sort;?>" required="">
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="row">
                        <div class="col-md-2">
                        <div class="btn-group mt-30px col">
                            <input type="hidden" name="page_id" value="<?php echo $variation->id;?>">
                            <a href="<?php echo base_url(ADMIN_FOLDER."/variation/".$group->id);?>" class="btn btn-all m-r-10">Cancel</a>
                            <button type="submit" class="btn btn-all bg-green float-right">Submit</button>
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
  </body>
</html>