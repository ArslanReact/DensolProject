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
                
                <div class="table-responsive">
                    <table id="datatable" class="display responsive nowrap align-middle text-truncate mb-0 table table-bordered">
                        <thead class="thead-dark">
                        <tr>
                            <th scope="col"># ID</th>
                            <th scope="col">Image</th>
                            <th scope="col">Name</th>
                            <th scope="col">Position</th>
                            <th scope="col">Content</th>
                            <th scope="col">Publish</th>
                            <th scope="col">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php
                             $sql = $this->db->query('select * from testimonial');
                            
                             //$results = $sql->result_array();
                             $results = $sql->result_array();
                             
                            
                           
                                if(isset($results)){
                                foreach($results as $cms){
                            ?>
                            <tr>
                                
                                <td>
                                     <?php echo $cms['id'];?>
                                </td>
                                 <td><img src="<?php echo base_url().$cms['image'];?>" width="200px"></td>
                                <td>
                                    <?php echo $cms['title'];?>
                                </td>
                                <td><?=$cms['position'];?></td>
                                 <td><?=$cms['content'];?></td>
                                
                                <td><?php if($cms['is_active']==1){?><label class="btn btn-all">Yes</label><? }else{?><label class="btn btn-danger">No</label><? }?></td>
                               
                                
                                <td>
                                    
                                    <a title="Edit" class="btn btn-info btn-sm"  href="<?php echo base_url().ADMIN_FOLDER.'/testi/update_testi/'.$cms['id'];?>"><i class="fa fa-pencil-square-o f-16"></i></a>
                                    <a title="Delete" class="btn btn-danger btn-sm"  href="<?php echo base_url().ADMIN_FOLDER.'/testi/delete_testi/'.$cms['id'];?>" onclick="return confirm('Are you sure you want to delete this record?');"><i class="fa fa-trash f-16"></i></a>
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
    <?php //$this->load->view(ADMIN_VIEW_FOLDER."/includes/scripts");?>
    <?php $this->load->view(ADMIN_VIEW_FOLDER."/includes/scripts-bk");?>
  </body>
</html>