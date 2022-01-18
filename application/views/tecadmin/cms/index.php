<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo site_settings()->company_name." Admin Panel";?></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
      <link rel="icon" type="image/png" href="<?=base_url();?>files/backend/images/favicon.ico"/>
      <link rel="stylesheet" href="<?=base_url();?>files/backend/css/all.css">
      <link rel="stylesheet" type="text/css" href="<?=base_url();?>files/backend/css/theme_bootstrap.min.css">
      <link rel="stylesheet" type="text/css" href="<?=base_url();?>files/backend/css/theme-style.css">
      <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
      <style>
          .nlink{
              padding: 2px 10px 3px !important;
          }
      </style>
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
                <h5 class="display h4">All cms Pages <a href="<?php echo base_url().ADMIN_FOLDER."/cms/add/".$page_parent;?>" class="btn btn-all float-right" style="color:#fff;font-size: 13px;padding: 5px 10px;">Add New Page</a></h5>
                <p>A list of all cms pages includes sub pages</p>
                <div class="table-responsive">
                    <table id="datatable" class="display responsive nowrap align-middle text-truncate mb-0 table table-bordered">
                        <thead class="thead-dark">
                        <tr>
                            <th scope="col"># ID</th>
                            <th scope="col">Title</th>
                            <th scope="col">Helper Name</th>
                            <th scope="col">Slug</th>
                            <th scope="col">Parent</th>
                            <th scope="col">Publish</th>
                            <th scope="col">Sort</th>
                            <th scope="col">Last Updated</th>
                            <th scope="col">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php
                                if(isset($cmss)){
                                foreach($cmss as $cms){
                            ?>
                            <tr>
                                <td>
                                    
                                    <div class="checkbox-container"><label class="checkbox-label">
                                            <div class="checkbox">
                                            <input type="checkbox" form="myform" name="check[]" id="<?php echo $cms->id;?>" value="<?php echo $cms->id;?>">
                                            <div class="checkbox-visible"></div>
                                            </div>
                                        </label>
                                    </div>
                                    <?php //echo $cms->id;?>
                                </td>
                                <td>
                                    <?php if(is_parent("cms",$cms->id)==1){?>
                                        <a class="nlink" href="<?php echo base_url().ADMIN_FOLDER.'/cms/'.$cms->id;?>"><?php echo $cms->title;?></a>
                                    <?php }else{?>
                                        <?php echo $cms->title;?>
                                    <?php }?>
                                </td>
                                <td>
                                    <?php echo $cms->helper_name;?>
                                </td>
                                <td>
                                    <?php echo $cms->full_slug;?>
                                </td>
                                <td>
                                    <?php echo getParentwithlink("cms","/cms/",$cms->id);?>
                                </td>
                                <td><?php if($cms->is_active==1){?> <label class="btn btn-all">Yes</label> <?php }else{ ?> <label class="btn btn-danger">No</label> <?php }?></td>
                                <td><input type="number" name="<?php echo $cms->id;?>"  form="myform" class="form-control" value="<?php echo $cms->sort;?>" style="max-width:50px;"></td>
                                <td><?php echo timesincenew($cms->created)." ago";?></td>
                                <td>
                                    <a title="Copy" class="btn btn-success btn-sm"  href="<?php echo base_url().ADMIN_FOLDER.'/cms/copy-data/'.$cms->id;?>"><i class="fa fa-copy f-16"></i></a>
                                    <a title="Edit" class="btn btn-info btn-sm"  href="<?php echo base_url().ADMIN_FOLDER.'/cms/edit/'.$cms->id;?>"><i class="fa fa-pencil-square-o f-16"></i></a>
                                    <a title="Delete" class="btn btn-danger btn-sm"  href="<?php echo base_url().ADMIN_FOLDER.'/cms/delete/'.$cms->id;?>" onclick="return confirm('Are you sure you want to delete this record?');"><i class="fa fa-trash f-16"></i></a>
                                </td>
                            </tr>
                            <?php } ?>
                        
                           <?php } ?>
                        </tbody>
                    </table>
                  </div>  
                    <div style="margin-top: 35px;">
                        <div class="checkbox-container">
                            <label class="checkbox-label">
                                <div class="checkbox">
                                <input type="checkbox" id="select-all">
                                    <div class="checkbox-visible"></div>
                                </div>
                            </label>
                        </div>
                        Select All
                    </div>
                    <?php
                    $attributes2 = array('id' => 'myform','name'=>'myform','style'=>'display:inline-block');
                    echo form_open(ADMIN_FOLDER.'/cms/multi-data',$attributes2);
                    ?>
                    <button type="submit" name="multi_sort" value="1" class="btn btn-all" style="color:#fff;font-size: 13px;padding: 5px 10px;">Sort Selected</button>
                    <button type="submit" name="multi_del" value="1" class="btn btn-all" onclick="return confirm('Are you sure you want to delete selected records?');" style="color:#fff;font-size: 13px;padding: 5px 10px;">Delete Selected</button>
                    </form>
              
              </div>
                </div>
            </div>

      <!-- Updates Section -->
      <?php $this->load->view(ADMIN_VIEW_FOLDER."/includes/footer");?>
    </div>
    </div>
    <!-- JavaScript files-->
    <?php //$this->load->view(ADMIN_VIEW_FOLDER."/includes/scripts");?>
    <?php $this->load->view(ADMIN_VIEW_FOLDER."/includes/scripts-bk");?>
  </body>
</html>