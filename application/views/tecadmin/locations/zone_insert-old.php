<!DOCTYPE html>
<html lang="en">

<head>
    <title><?php echo site_settings()->company_name." Admin Panel";?></title>
    <!-- HTML5 Shim and Respond.js IE10 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 10]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Favicon icon -->
    <link rel="icon" href="<?php echo base_url(); ?>files/assets/images/favicon.ico" type="image/x-icon">
    <link rel="shortcut icon" id="favicon" href="<?php echo base_url(); ?>files/assets/images/favicon.png">
    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,500" rel="stylesheet">
    <!-- waves.css -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>files/assets/pages/waves/css/waves.min.css" type="text/css" media="all">
    <!-- Required Fremwork -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>files/bower_components/bootstrap/css/bootstrap.min.css">
    <!-- waves.css -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>files/assets/pages/waves/css/waves.min.css" type="text/css" media="all">
    <!-- themify-icons line icon -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>files/assets/icon/themify-icons/themify-icons.css">
      <!-- ico font -->
      <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>files/assets/icon/icofont/css/icofont.css">
      <!-- font awesome -->
      <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>files/assets/icon/font-awesome/css/font-awesome.min.css">
<!-- Notification.css -->
<link rel="stylesheet" type="text/css" href="http://localhost/intercel/files/assets/pages/notification/notification.css">

    <!-- Data Table Css -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>files/bower_components/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>files/assets/pages/data-table/css/buttons.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>files/bower_components/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css">
    <!-- scrollbar.css -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>files/assets/css/jquery.mCustomScrollbar.css">
    <!-- radial chart.css -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>files/assets/pages/chart/radial/css/radial.css" type="text/css" media="all">
    
    <!-- Switch component css -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>files/bower_components/switchery/css/switchery.min.css">

    
    <!-- Style.css -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>files/assets/css/style.css">
</head>
<!-- Menu sidebar static layout -->

<body>
<!-- Pre-loader start -->
<div class="theme-loader">
    <div class="loader-track">
        <div class="preloader-wrapper">
            <div class="spinner-layer spinner-blue">
                <div class="circle-clipper left">
                    <div class="circle"></div>
                </div>
                <div class="gap-patch">
                    <div class="circle"></div>
                </div>
                <div class="circle-clipper right">
                    <div class="circle"></div>
                </div>
            </div>
            <div class="spinner-layer spinner-red">
                <div class="circle-clipper left">
                    <div class="circle"></div>
                </div>
                <div class="gap-patch">
                    <div class="circle"></div>
                </div>
                <div class="circle-clipper right">
                    <div class="circle"></div>
                </div>
            </div>

            <div class="spinner-layer spinner-yellow">
                <div class="circle-clipper left">
                    <div class="circle"></div>
                </div>
                <div class="gap-patch">
                    <div class="circle"></div>
                </div>
                <div class="circle-clipper right">
                    <div class="circle"></div>
                </div>
            </div>

            <div class="spinner-layer spinner-green">
                <div class="circle-clipper left">
                    <div class="circle"></div>
                </div>
                <div class="gap-patch">
                    <div class="circle"></div>
                </div>
                <div class="circle-clipper right">
                    <div class="circle"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Pre-loader end -->
<div id="pcoded" class="pcoded">
    <div class="pcoded-overlay-box"></div>
    <div class="pcoded-container navbar-wrapper">
        <?php $this->load->view(ADMIN_VIEW_FOLDER."/includes/topbar");?>
        <div class="pcoded-main-container">
            <div class="pcoded-wrapper">
                <?php $this->load->view(ADMIN_VIEW_FOLDER."/includes/leftbar");?>
                <div class="pcoded-content">
                    <!-- Page-header start -->
                    <?php $this->load->view(ADMIN_VIEW_FOLDER."/includes/header");?>
                    <!-- Page-header end -->
                        <div class="pcoded-inner-content">
                            <!-- Main-body start -->
                            <div class="main-body">
                                <div class="page-wrapper">

                                    <div class="page-body">
                                        <div class="row">

                                            

                                            <!-- order start -->
                                            <div class="col-md-12">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <h5>Insert New Location Zone</h5>
                                                        <a href="<?php echo base_url().ADMIN_FOLDER."/products/add";?>" class="btn btn-success pull-right" style="color:#fff;font-size: 13px;padding: 5px 10px;">Add New Product</a>
                                                    </div>
                                                    <div class="card-block">
                                                        <div class="table-responsive dt-responsive">
                                                        <p><a href="<?php echo base_url().ADMIN_FOLDER; ?>/zones">Manage Zones</a></p>
                                                        <?php echo form_open(current_url());?>
                                                        <table class="table table-striped table-bordered nowrap">
                                                            <thead>
                                                                <tr>
                                                                    <th class="info_req tooltip_trigger"
                                                                        title="<strong>Field Required</strong><br/>The name of the zone.">
                                                                        Name
                                                                    </th>
                                                                    <th class="tooltip_trigger"
                                                                        title="A brief description of the purpose of the zone and the regions covered.">
                                                                        Description
                                                                    </th>
                                                                    <th class="spacer_75 align_ctr tooltip_trigger" 
                                                                        title="If checked, the zone will be set as 'active'.">
                                                                        Status
                                                                    </th>
                                                                    <th class="spacer_125 align_ctr tooltip_trigger" 
                                                                        title="Copy or remove a specific row and its data.">
                                                                        Copy / Remove
                                                                    </th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                            <?php 
                                                                for($i = 0; ($i == 0 || (isset($validation_row_ids[$i]))); $i++) { 
                                                                    $row_id = (isset($validation_row_ids[$i])) ? $validation_row_ids[$i] : $i;
                                                            ?>
                                                                <tr>
                                                                    <td>
                                                                        <input type="text" name="insert[<?php echo $row_id; ?>][name]" value="<?php echo set_value('insert['.$row_id.'][name]');?>" class="form-control"/>
                                                                    </td>
                                                                    <td>
                                                                        <textarea name="insert[<?php echo $row_id; ?>][description]" class="form-control"><?php echo set_value('insert['.$row_id.'][description]');?></textarea>
                                                                    </td>
                                                                    <td class="align_ctr">
                                                                        <input type="hidden" name="insert[<?php echo $row_id; ?>][status]" value="0"/>
                                                                        <input type="checkbox" name="insert[<?php echo $row_id; ?>][status]" value="1" <?php echo set_checkbox('insert['.$row_id.'][status]', '1', TRUE); ?>/>
                                                                    </td>
                                                                    <td class="align_ctr">
                                                                        <input type="button" value="+" class="copy_row link_button"/>
                                                                        <input type="button" value="x" <?php echo ($i == 0) ? 'disabled="disabled"' : NULL;?> class="remove_row link_button"/>
                                                                    </td>
                                                                </tr>
                                                            <?php } ?>
                                                            </tbody>
                                                            <tfoot>
                                                                <tr>
                                                                    <td colspan="4">
                                                                        <input type="submit" name="insert_zone" value="Insert New Location Zones" class="link_button large"/>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                        <?php echo form_close();?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- order end -->

                                           

                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php $this->load->view(ADMIN_VIEW_FOLDER."/includes/footer");?>
    <!-- Warning Section Starts -->
    <!-- Older IE warning message -->
<!--[if lt IE 10]>
<div class="ie-warning">
    <h1>Warning!!</h1>
    <p>You are using an outdated version of Internet Explorer, please upgrade <br/>to any of the following web browsers to access this website.</p>
    <div class="iew-container">
        <ul class="iew-download">
            <li>
                <a href="http://www.google.com/chrome/">
                    <img src="../files/assets/images/browser/chrome.png" alt="Chrome">
                    <div>Chrome</div>
                </a>
            </li>
            <li>
                <a href="https://www.mozilla.org/en-US/firefox/new/">
                    <img src="../files/assets/images/browser/firefox.png" alt="Firefox">
                    <div>Firefox</div>
                </a>
            </li>
            <li>
                <a href="http://www.opera.com">
                    <img src="../files/assets/images/browser/opera.png" alt="Opera">
                    <div>Opera</div>
                </a>
            </li>
            <li>
                <a href="https://www.apple.com/safari/">
                    <img src="../files/assets/images/browser/safari.png" alt="Safari">
                    <div>Safari</div>
                </a>
            </li>
            <li>
                <a href="http://windows.microsoft.com/en-us/internet-explorer/download-ie">
                    <img src="../files/assets/images/browser/ie.png" alt="">
                    <div>IE (9 & above)</div>
                </a>
            </li>
        </ul>
    </div>
    <p>Sorry for the inconvenience!</p>
</div>
<![endif]-->
<!-- Warning Section Ends -->
<!-- Required Jquery -->
<script type="text/javascript" src="<?php echo base_url(); ?>files/bower_components/jquery/js/jquery.min.js "></script>
<script type="text/javascript" src="<?php echo base_url(); ?>files/bower_components/jquery-ui/js/jquery-ui.min.js "></script>
<script type="text/javascript" src="<?php echo base_url(); ?>files/bower_components/popper.js/js/popper.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>files/bower_components/bootstrap/js/bootstrap.min.js "></script>
<script type="text/javascript" src="<?php echo base_url(); ?>files/assets/pages/widget/excanvas.js "></script>
<!-- jquery slimscroll js -->
<script type="text/javascript" src="<?php echo base_url(); ?>files/bower_components/jquery-slimscroll/js/jquery.slimscroll.js "></script>
<!-- waves js -->
<script src="<?php echo base_url(); ?>files/assets/pages/waves/js/waves.min.js"></script>
<!-- modernizr js -->
<script type="text/javascript" src="<?php echo base_url(); ?>files/bower_components/modernizr/js/modernizr.js "></script>
<!-- slimscroll js -->
<script type="text/javascript" src="<?php echo base_url(); ?>files/assets/js/SmoothScroll.js"></script>
<script src="<?php echo base_url(); ?>files/assets/js/jquery.mCustomScrollbar.concat.min.js "></script>

<!-- data-table js -->
<script src="<?php echo base_url(); ?>files/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>files/bower_components/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?php echo base_url(); ?>files/assets/pages/data-table/js/jszip.min.js"></script>
<script src="<?php echo base_url(); ?>files/assets/pages/data-table/js/pdfmake.min.js"></script>
<script src="<?php echo base_url(); ?>files/assets/pages/data-table/js/vfs_fonts.js"></script>
<script src="<?php echo base_url(); ?>files/bower_components/datatables.net-buttons/js/buttons.print.min.js"></script>
<script src="<?php echo base_url(); ?>files/bower_components/datatables.net-buttons/js/buttons.html5.min.js"></script>
<script src="<?php echo base_url(); ?>files/bower_components/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo base_url(); ?>files/bower_components/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?php echo base_url(); ?>files/bower_components/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>
<script src="<?php echo base_url(); ?>files/assets/pages/data-table/js/data-table-custom.js"></script>

<!-- Switch component js -->
<script type="text/javascript" src="<?php echo base_url(); ?>files/bower_components/switchery/js/switchery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>files/assets/pages/advance-elements/swithces.js"></script>

<!-- menu js -->
<script src="<?php echo base_url(); ?>files/assets/js/pcoded.min.js"></script>
<script src="<?php echo base_url(); ?>files/assets/js/vertical/vertical-layout.min.js "></script>

<!-- notification js -->
<script type="text/javascript" src="<?php echo base_url(); ?>files/assets/js/bootstrap-growl.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>files/assets/pages/notification/notification.js"></script>
<script>
$(document).ready(function() {

$('#select-all').click(function(event) {   
    if(this.checked) {
        // Iterate each checkbox
        $(':checkbox').each(function() {
            this.checked = true;                        
        });
    } else {
        $(':checkbox').each(function() {
            this.checked = false;                       
        });
    }
});

<?php
if ($this->session->flashdata('emsg') != null) {?>
    //echo "<pe>".$error."</pe>";
    notify("top", "right", "fa fa-check", "<?php echo $this->session->flashdata('etype');?>", "animated flipInX", "animated flipOutX"," ",'<?php echo $this->session->flashdata('emsg');?>');
    <?
} elseif ($this->session->flashdata('infoerror') != null) {
    foreach($this->session->flashdata('infoerror') as $error){?>
        //echo "<pe>".$error."</pe>";
        notify("top", "right", "fa fa-check", "danger", "animated flipInX", "animated flipOutX"," ",'<?php echo $error;?>');
<? 
}
}elseif($this->session->flashdata('iii') != null){
    foreach($this->session->flashdata('iii') as $key => $value){
        if($key=="infosucc"){
            foreach($value as $vv){
                ?> notify("top", "right", "fa fa-check", "success", "animated flipInX", "animated flipOutX"," ",'<?php echo $vv;?>'); <?
            }
        }else{
            foreach($value as $vv){
                ?> notify("top", "right", "fa fa-check", "danger", "animated flipInX", "animated flipOutX"," ",'<?php echo $vv;?>'); <?
            }
        }
    }
}
?>
});
</script>


<!-- custom js -->
<script type="text/javascript" src="<?php echo base_url(); ?>files/assets/js/script.js "></script>
</body>

</html>
