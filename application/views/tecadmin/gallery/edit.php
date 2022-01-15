<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo site_settings()->company_name." Admin Panel";?></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <link rel="stylesheet" href="<?php echo base_url("files/backend/css/bootstrap.min.css");?>">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="<?php echo base_url("files/backend/css/bootstrap-tagsinput.css");?>">
    <link rel="stylesheet" href="<?php echo base_url("files/backend/css/main.css");?>">
    <link rel="stylesheet" href="<?php echo base_url("files/backend/css/util.css");?>">
    <link rel="stylesheet" href="<?php echo base_url("files/backend/css/select2.min.css");?>">
    <link rel="icon" href="<?php echo base_url("files/assets/images/favicon.ico");?>" type="image/x-icon">
    <link rel="shortcut icon" id="favicon" href="<?php echo base_url("files/assets/images/favicon.png");?>">
  </head>
  <body>
    <!-- Side Navbar -->
    <?php $this->load->view(ADMIN_VIEW_FOLDER."/includes/leftbar");?>
    <div class="page">
      <!-- navbar-->
      <?php $this->load->view(ADMIN_VIEW_FOLDER."/includes/header");?>
      <!-- Header Section-->
      <section class="dashboard-header section-padding">
        <div class="container-fluid">
          <div class="row d-flex align-items-md-stretch">
            <h4 class="col-md-12 title-heading"><?php echo $page_heading;?></h4>
          </div>
          <div class="row d-flex align-items-md-stretch">
            <!-- Line Chart -->
            <div class="col-lg-12 col-md-12 flex-lg-last flex-md-first align-self-baseline">
              <div class="card sales-report mt-10px">
                <h2 class="display h4">Edit Gallery</h2>
                <p>Edit gallery by Entring required detail.</p>
                <?php
                $attributes = array('class' => 'form-material card-block');
                echo form_open_multipart(ADMIN_FOLDER.'/gallery/update',$attributes);
                ?>
                    <div class="form-row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Gallery Title</label>
                                <input type="text" name="title" value="<?php echo $gallery->title;?>" class="form-control" required="">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Gallery Type</label>
                                <select name="type" id="typeselector" class="form-control js-selectbox">
                                    <option <?php if($gallery->type=="file"){echo "selected";}?> value="file">File/Image</option>
                                    <option <?php if($gallery->type=="video"){echo "selected";}?> value="video">Video</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Select Category</label>
                                <div class="menubuilder">
                                    <?php echo buildMenu($categories,$sel_cat);?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 m-t-10">
                            <div class="form-group">
                                <label>Gallery Thumbnail (Optional)</label>
                                <div class="custom-file">
                                    <input type="file" name="thumbnail" class="custom-file-input" id="customFile">
                                    <label class="custom-file-label" for="Choose files To Upload">Choose files To Upload</label>
                                    <?php if($gallery->thumbnail != ""){?>
                                    <img src="<?php echo base_url()."uploads/gallery/".$gallery->thumbnail;?>" style="max-height: 80px; margin-bottom: 15px;">
                                    <div class="checkbox-container">
                                        <label class="checkbox-label">
                                            <input type="checkbox" name="del_thumbnail" value="1">
                                            <span class="checkbox-custom rectangular"></span>
                                        </label>
                                        Delete
                                    </div>
                                    <?php }?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 m-t-10">
                            <div class="form-group">
                                <div id="file" class="types" <?php if($gallery->type=="video"){echo 'style="display:none"';}?>>
                                    <label>Gallery File</label>
                                    <div class="custom-file">
                                        <input type="file" name="file" class="custom-file-input" id="customFile">
                                        <label class="custom-file-label" for="Choose files To Upload">Choose files To Upload</label>
                                        <?php if($gallery->file != ""){?>
                                        <a target="_blank" href="<?php echo base_url()."uploads/gallery/".$gallery->file;?>">
                                        <?php if($gallery->file_ext=="jpg" || $gallery->file_ext=="png" || $gallery->file_ext=="gif"){?>
                                            <img src="<?php echo base_url()."uploads/gallery/".$gallery->file;?>" style="max-height: 50px; margin-bottom: 15px;">
                                        <?php }else{?>
                                            <img src="<?php echo getFileType($gallery->file_ext,$gallery->type);?>" style="max-height: 50px; margin-bottom: 15px;">
                                        <?php }?>
                                        </a>
                                        <div class="checkbox-container">
                                            <label class="checkbox-label">
                                                <input type="checkbox" name="del_file" value="1">
                                                <span class="checkbox-custom rectangular"></span>
                                            </label>
                                            Delete
                                        </div>
                                        <?php }?>
                                    </div>
                                </div>
                                <div id="video" class="types" <?php if($gallery->type=="file"){echo 'style="display:none"';}?>>
                                    <label>Gallery Video</label>
                                    <textarea class="form-control" name="video" placeholder="Enter Video Embed Code"><?php echo cleanOut($gallery->video);?></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 m-t-20">
                            <div class="form-group">
                                <ul class="list-unstyled mb-0">
                                    <li class="d-inline-block mr-2">
                                    <fieldset>
                                        <label for="customRadio">Publish</label>
                                        <div class="custom-control custom-radio">
                                        <input type="radio" class="custom-control-input" name="is_active" value="1" id="customRadio3" <?php if($gallery->is_active==1){?>checked="checked"<? }?>>
                                        <label class="custom-control-label" for="customRadio3">Yes</label>
                                        </div>
                                    </fieldset>
                                    </li>
                                    <li class="d-inline-block mr-2">
                                    <fieldset>
                                        <div class="custom-control custom-radio">
                                        <input type="radio" class="custom-control-input" name="is_active" value="0" id="customRadio4" <?php if($gallery->is_active==0){?>checked="checked"<? }?>>
                                        <label class="custom-control-label" for="customRadio4">No</label>
                                        </div>
                                    </fieldset>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-6 m-t-20">
                            <div class="form-group">
                                <label>Sort</label>
                                <input class="form-control" name="sort" value="<?php echo $gallery->sort;?>" required="">
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="row">
                        <div class="btn-group mt-30px col">
                            <input type="hidden" name="page_id" value="<?php echo $gallery->id;?>">
                            <a href="<?php echo base_url(ADMIN_FOLDER."/gallery/");?>" class="btn btn-custopm">Cancel</a>
                            <button type="submit" class="btn btn-custopm bg-green float-right">Submit</button>
                        </div>
                    </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- Updates Section -->
      <?php $this->load->view(ADMIN_VIEW_FOLDER."/includes/footer");?>
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