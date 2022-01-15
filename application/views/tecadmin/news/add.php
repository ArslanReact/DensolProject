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
                <h2 class="display h4">Create News</h2>
                <p>Add News by Entring required detail.</p>
                <?php
                $attributes = array('class' => 'form-material card-block');
                echo form_open_multipart(ADMIN_FOLDER.'/news/add_submit',$attributes);
                ?>
                    <div class="form-row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>News Title</label>
                                <input type="text" name="title" class="form-control" required="">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>News Slug (Optional)</label>
                                <input type="text" name="slug" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Icon Code (Optional)</label>
                                <input type="text" name="icon_code" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Select Category</label>
                                <div class="menubuilder">
                                    <?php echo buildMenu($categories);?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Short Detail</label>
                                <textarea class="form-control" name="short_detail" rows="3"></textarea>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>News Content</label>
                                <textarea class="form-control editor" name="content" rows="3"></textarea>
                            </div>
                        </div>
                        <div class="col-md-4 m-t-10">
                            <div class="form-group">
                                <label>News Icon (Optional)</label>
                                <div class="custom-file">
                                    <input type="file" name="icon" class="custom-file-input" id="customFile">
                                    <label class="custom-file-label" for="Choose files To Upload">Choose files To Upload</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 m-t-10">
                            <div class="form-group">
                                <label>News Thumbnail (Optional)</label>
                                <div class="custom-file">
                                    <input type="file" name="thumbnail" class="custom-file-input" id="customFile">
                                    <label class="custom-file-label" for="Choose files To Upload">Choose files To Upload</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 m-t-10">
                            <div class="form-group">
                                <label>News Banner (Optional)</label>
                                <div class="custom-file">
                                    <input type="file" name="banner" class="custom-file-input" id="customFile">
                                    <label class="custom-file-label" for="Choose files To Upload">Choose files To Upload</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 m-t-10">
                            <h6>SEO Information</h6>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Seo Title</label>
                                <input class="form-control" name="meta_title">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Seo Description</label>
                                <textarea class="form-control" name="meta_desc" rows="3"></textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Seo Keyword</label>
                                <textarea class="form-control" name="meta_key" rows="3"></textarea>
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
                            <a href="<?php echo base_url(ADMIN_FOLDER."/news/");?>" class="btn btn-custopm">Cancel</a>
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
  </body>
</html>