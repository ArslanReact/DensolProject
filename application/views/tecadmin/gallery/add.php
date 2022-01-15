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
                <h2 class="display h4">Add New Gallery</h2>
                <p>Add new gallery by Entring required detail.</p>
                <?php
                $attributes = array('class' => 'form-material card-block');
                echo form_open_multipart(ADMIN_FOLDER.'/gallery/add_submit',$attributes);
                ?>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Gallery Title</label>
                                <input type="text" name="title" class="form-control" required="">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Gallery Type</label>
                                <select name="type" id="typeselector" class="form-control js-selectbox">
                                    <option value="file">File/Image</option>
                                    <option value="video">Video</option>
                                </select>
                            </div>
                        </div>
<!--                        <div class="col-md-12">-->
<!--                            <div class="form-group">-->
<!--                                <label>Select Category</label>-->
<!--                                <div class="menubuilder">-->
<!--                                    --><?php //echo buildMenu($categories);?>
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
                        <div class="col-md-6 m-t-10">
                            <div class="form-group">
                                <label>Gallery Thumbnail (Optional)</label>
                                <div class="custom-file">
                                    <input type="file" name="thumbnail" id="customFile2">
                                    <label for="customFile2">Choose files To Upload</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 m-t-10">
                            <div class="form-group">
                                <div id="file" class="types">
                                    <label>Gallery File</label>
                                    <div class="custom-file">
                                        <input type="file" name="file" id="customFile">
                                        <label for="customFile">Choose files To Upload</label>
                                    </div>
                                </div>
                                <div id="video" class="types" style="display:none;">
                                    <label>Gallery Video</label>
                                    <textarea class="form-control" name="video" placeholder="Enter Video Embed Code"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <ul class="list-unstyled mb-0">
                                    <li class="d-inline-block mr-2">
                                    <fieldset>
                                        <label for="customRadio">Publish</label>
                                        <div class="custom-control custom-radio">
                                        <input type="radio" class="custom-control-input" name="is_active" value="1" id="customRadio3" checked="">
                                        <label class="custom-control-label" for="customRadio3">Yes</label>
                                        </div>
                                    </fieldset>
                                    </li>
                                    <li class="d-inline-block mr-2">
                                    <fieldset>
                                        <div class="custom-control custom-radio">
                                        <input type="radio" class="custom-control-input" name="is_active" value="0" id="customRadio4">
                                        <label class="custom-control-label" for="customRadio4">No</label>
                                        </div>
                                    </fieldset>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Sort</label>
                                <input class="form-control" name="sort" value="1" required="">
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="row">
                        <div class="btn-group mt-30px col">
                            <div class="col-md-2">
                            <a href="<?php echo base_url(ADMIN_FOLDER."/gallery/");?>" class="btn btn-all">Cancel</a>
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
    $(function() {
        $('#typeselector').change(function(){
            $('.types').hide();
            $('#' + $(this).val()).show();
        });
    });
    </script>
  </body>
</html>