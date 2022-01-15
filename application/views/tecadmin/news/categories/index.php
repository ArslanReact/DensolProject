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
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css">
    <link rel="stylesheet" href="<?php echo base_url("files/backend/css/main.css");?>">
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
                <h2 class="display h4">All News Categories <a href="<?php echo base_url().ADMIN_FOLDER."/news/categories/add/".$page_parent;?>" class="btn btn-success float-right" style="color:#fff;font-size: 13px;padding: 5px 10px;">Add News Categories</a></h2>
                <p>A list of all News Categories</p>
                <div class="table-responsive">
                    <table id="datatable" class="display responsive nowrap align-middle text-truncate mb-0 table table-bordered table-hover table-striped" style="width:100%;">
                        <thead>
                            <tr>
                                <th class="all" width="50"># ID</th>
                                <th class="all">Title</th>
                                <th>Parent</th>
                                <th width="50">Publish</th>
                                <th width="50">Sort</th>
                                <th width="100">Last Updated</th>
                                <th width="100">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                if(isset($newscategories)){
                                foreach($newscategories as $newscategory){
                            ?>
                            <tr>
                                <td>
                                    <div class="checkbox-container"><label class="checkbox-label"><input type="checkbox" form="myform" name="check[]" id="<?php echo $newscategory->id;?>" value="<?php echo $newscategory->id;?>"><span class="checkbox-custom rectangular"></span></label></div>
                                    <?php echo $newscategory->id;?>
                                </td>
                                <td>
                                    <?php if(checkParentif("news_categories",$newscategory->id)==1){?>
                                        <a class="nlink" href="<?php echo base_url().ADMIN_FOLDER.'/news/categories/'.$newscategory->id;?>"><?php echo $newscategory->title;?></a>
                                    <? }else{?>
                                        <?php echo $newscategory->title;?>
                                    <? }?>
                                </td>
                                <td>
                                    <?php echo getParentwithlink("news_categories","/news/categories/",$newscategory->id);?>
                                    
                                </td>
                                <td><?php if($newscategory->is_active==1){?><label class="badge badge-success">Yes</label><? }else{?><label class="badge badge-danger">No</label><? }?></td>
                                <td><input type="number" name="<?php echo $newscategory->id;?>"  form="myform" value="<?php echo $newscategory->sort;?>" style="max-width:50px;"></td>
                                <td><?php echo timesincenew($newscategory->created)." ago";?></td>
                                <td>
                                    <a title="Copy" class="btn btn-success" href="<?php echo base_url().ADMIN_FOLDER.'/news/categories/copy-data/'.$newscategory->id;?>"><i class="fa fa-copy f-16"></i></a>
                                    <a title="Edit" class="btn btn-info" href="<?php echo base_url().ADMIN_FOLDER.'/news/categories/edit/'.$newscategory->id;?>"><i class="fa fa-pencil-square-o f-16"></i></a>
                                    <a title="Delete" class="btn btn-danger" href="<?php echo base_url().ADMIN_FOLDER.'/news/categories/delete/'.$newscategory->id;?>" onclick="return confirm('Are you sure you want to delete this record?');"><i class="fa fa-trash f-16"></i></a>
                                </td>
                            </tr>
                            <? }}?>
                        </tbody>
                    </table>
                    <div style="display:inline-block;">
                        <div class="checkbox-container"><label class="checkbox-label"><input type="checkbox" id="select-all"><span class="checkbox-custom rectangular"></span></label></div>
                        Select All
                    </div>
                    <?php
                    $attributes2 = array('id' => 'myform','name'=>'myform','style'=>'display:inline-block');
                    echo form_open(ADMIN_FOLDER.'/news/categories/multi-data',$attributes2);
                    ?>
                    <button type="submit" name="multi_sort" value="1" class="btn btn-success" style="color:#fff;font-size: 13px;padding: 5px 10px;">Sort Selected</button>
                    <button type="submit" name="multi_del" value="1" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete selected records?');" style="color:#fff;font-size: 13px;padding: 5px 10px;">Delete Selected</button>
                    </form>
                </div>
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