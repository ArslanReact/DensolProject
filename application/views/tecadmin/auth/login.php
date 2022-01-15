<!DOCTYPE html>
<html lang="en">
    <head>
        <title><?php echo site_settings()->company_name." Admin Panel";?></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->	
        <link rel="icon" href="<?php echo base_url("files/backend/"); ?>images/favicon.ico" type="image/x-icon">
        <link rel="shortcut icon" id="favicon" href="<?php echo base_url("files/backend/"); ?>images/favicon.png">
        <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url("files/backend/"); ?>css-bk/util.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url("files/backend/"); ?>css-bk/main.css">
    <!--===============================================================================================-->
    </head>
    <body>
        <div class="limiter">
            <div class="container-login100">
                <div class="wrap-login100">
                    <?php
                    $attributes = array('class' => 'login100-form validate-form');
                    if($attampt != false){
                    echo form_open('',$attributes);
                    }else{
                    echo form_open(ADMIN_FOLDER.'/submit_login',$attributes);
                    }
                    ?>
                        <span class="logo"><img class="img-fluid" src="<?php echo base_url("files/backend/"); ?>images/logo-black.png"></span>
                        <?php if($attampt != false){?>
                        <span class="login100-form-title p-b-43" style="color:red;"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Alert!</span>
                        <p class="text-muted p-b-5">Too many login attamts.<br><span style="color:#ff0000;">Your information stored for further investigation.</span><br>Please wait <?php if($attampt > 1){ echo $attampt." minutes"; }else{echo $attampt." minute"; }?> for next login.</p>
                        <?php }else{?>
                        <span class="login100-form-title p-b-43">Sign In</span>
                        <?php }?>
                        
                        <?php if(!$attampt != false){?>
                        <label for="username" class="m-b-5">Username</label>
                        <div class="wrap-input100 validate-input">
                            <input class="input100" placeholder="Username" type="text" id="username" name="username" required="" autocomplete="" autocorrect="off" browserautofilled="false">
                            <span class="focus-input100"></span>
                        </div>
                        <label for="password" class="m-b-5 p-t-15">Password</label>
                        <div class="wrap-input100 validate-input" data-validate="Password is required">
                            <input class="input100" type="password" id="password" placeholder="********" name="password" required="" autocomplete="" autocorrect="off" browserautofilled="false">
                            <span class="focus-input100"></span>
                        </div>
                        <div class="flex-sb-m w-full p-t-3 p-b-32">
                            <div class="contact100-form-checkbox">
                                <input class="input-checkbox100" id="ckb1" type="checkbox" name="remember_me">
                                <label class="label-checkbox100" for="ckb1">Remember me</label>
                            </div>
                            <a href="<?php echo base_url(ADMIN_FOLDER."/forgot/")?>" class="txt1">Forgot your password?</a>
                        </div>
                        <div class="container-login100-form-btn"><button type="submit" class="login100-form-btn">Sign In</button></div>
                        <?php }?>
                    </form>
                    <div class="login100-more" style="background-image: url('<?php echo base_url("files/backend/"); ?>images/bg-01.jpg');">
                        <div class="tecmyer-logo"><span class="logo"><img class="img-fluid" src="<?php echo base_url("files/backend/"); ?>images/logo.png"></span></div>
                    </div>
                </div>
            </div>
        </div>
        <div id="alertbox">
            <?php
            if ($this->session->flashdata('emsg') != null) {
                echo '<div class="alert '.$this->session->flashdata('etype').'">'.$this->session->flashdata('emsg').'</div>';
            }elseif ($this->session->flashdata('infoerror') != null) {
                foreach($this->session->flashdata('infoerror') as $error){
                    echo '<div class="alert alert-error">'.$error.'</div>';
                }
            }
            ?>
        </div>
        <script src="<?php echo base_url("files/backend/"); ?>js/jquery-3.4.1.min.js"></script>
        <script>
            $('#alertbox').delay(3000).fadeOut('slow');
        </script>
    </body>
</html>