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
                <div class="col-md-12">
            
            <?php if($this->session->flashdata('success') != ""){echo '<div class="alert alert-success">
                                                                          <strong>Success!</strong> Emails are send Successfully.
                                                                        </div>';} ?>
        </div>
        <!--<form action="<?=base_url();?>submit-subscribe" method="post">-->
        <!--        <input type="hidden" name="<?//php echo $this->security->get_csrf_token_name(); ?>" value="<? //php echo $this->security->get_csrf_hash();?>" />-->
        <!--        <div class="card py-lg-0 borderradius30" style="background: #ccc; margin-bottom: 20px;">-->
        <!--            <div class="row align-items-center" style="padding: 20px 10px;">-->
                        
        <!--                <div class="col-xl-8 col-lg-10 col-md-10 col-sm-12">-->
        <!--                    <div class="form-group m-0 position-relative">-->
        <!--                        <div class="row">-->
        <!--                        <div class="col-md-6 col-sm-6 col-xs-12">-->
        <!--                        <input type="email" class="form-control borderradius15" placeholder="enter your email" name="email" id="">-->
        <!--                        <input type="hidden" name="return" value="<?php echo $this->uri->uri_string();?>">-->
        <!--                        </div>-->
                                
        <!--                        <div class="col-md-4 col-sm-4 col-xs-12">-->
        <!--                       <span style="color:#000;"><?//php-->
                             //echo $num = rand(10152,1015780);
                               
                            ?>
        <!--                       </span>-->
        <!--                       <input type="hidden" name="captcha1" value="<?//=$num?>">-->
        <!--                       <input type="text" name="captcha" required>-->
        <!--                       </div>-->
                               
        <!--                       <div class="col-md-2 col-sm-2 col-xs-12">-->
        <!--                        <button type="submit" class="btn btn-subscribe"><i class="fas fa-long-arrow-alt-right"></i></button>-->
        <!--                        </div>-->
        <!--                        </div>-->
        <!--                    </div>-->
        <!--                </div>-->
                        
        <!--            </div>-->
        <!--        </div>-->
        <!--    </form>-->
                <div class="card">
                      <div class="align-items-center">
                      <!--<div class="btn-group m-b-10">-->
                      <!--    <a class="btn btn-all text-white" href="<?php //echo base_url().ADMIN_FOLDER; ?>/insert_html">Select your html</a>-->
                      <!--</div>-->
                      <!--<div class="btn-group m-b-10" style="float: right;">-->
                      <!--    <a class="btn btn-all text-white" href="<?php //echo base_url().ADMIN_FOLDER; ?>/send_email">Send all to email</a>-->
                      <!--</div>-->
                  </div>
                  <!--send email through excel file-->
                    <div class="">
                        <form id="emailForm" action="<?=base_url();?>submit-offer" method="post" enctype="multipart/form-data">
                            <label class="mb-1">Import Excel Manual Email List:</label>
                            <input type="file" accept=".csv,.xls,.xlsx" class="h-100 w-100 form-control" id= "getFile" name="getFile" required />
                            <label class="mb-1 mt-2" style="border: none !important; display: block !important;font-weight: 600 !important;font-size: 12px !important;color: #0d1e42 !important; padding:0 !important;">Order User Email Including:</label>
                            <input type="radio" id="orderemailinclude" name="orderemailinclude" value="yes" required> Yes
                            <input type="radio" id="orderemailinclude" name="orderemailinclude" value="no" required> No
                            <label class="mb-1 mt-2">Email Subject Title:</label>
                            <input type="text"  class="form-control borderradius15" name="emailsubject" required />
                            <label class="mb-1 mt-2">Email Main Area: (Note: Paste link here with the help of comma saperation and signle quote)</label>
                            <textarea  class="form-control borderradius15" value="" placeholder="Paste Link Here" name="bodyhtml" required></textarea>
                            <label>E.g => 'https://ar-instrumed.com.au/product/dental-implant-bone-mixing-bowl','https://ar-instrumed.com.au/product/dental-implant-bone-mixing-bowl'</label>
                            <label class="mb-1 mt-2">Email Main Description:</label>
                            <textarea  class="form-control borderradius15"  name="maindescription" required></textarea>
                            <div class="btn-group m-b-10" style="">
                                    <button type="submit"class="btn btn-all text-white mt-2"> Submit</button>
                            </div>
                        </form>
                    </div>
            </div>
        </div>
             <script>
     $(document).ready(function() {
    $('#emailForm').bootstrapValidator({
                feedbackIcons: {
                    valid: 'glyphicon glyphicon-ok',
                    invalid: 'glyphicon glyphicon-remove',
                    validating: 'glyphicon glyphicon-refresh'
                },
                fields: {
                    email: {
                        validators: {
                            notEmpty: {
                                message: 'Email is required and cannot be empty'
                            },
                            emailAddress: {
                                message: 'The value is not a valid email address'
                            }
                        }
                    }
                }
            });
});
</script>
    <!-- Updates Section -->
    <?php $this->load->view(ADMIN_VIEW_FOLDER."/includes/footer");?>
</div>
</div>
<!-- JavaScript files-->
<?php $this->load->view(ADMIN_VIEW_FOLDER."/includes/scripts");?>
</body>
</html>