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
	<link rel="stylesheet" type="text/css" href="<?php echo base_url("files/backend/"); ?>css/util.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url("files/backend/"); ?>css/main.css">
<!--===============================================================================================-->
</head>
<body>
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
                <?php
                $attributes = array('class' => 'login100-form validate-form');
                echo form_open(ADMIN_FOLDER.'/submit_forgot',$attributes);
                ?>
					<span class="logo"><img class="img-fluid" src="<?php echo base_url("files/backend/"); ?>images/logo-black.png"></span>
					<span class="login100-form-title p-b-43" style="font-size: 30px;">Recover password</span>
					
					<label for="email" class="m-b-5">Your Email Address</label>
					<div class="wrap-input100 validate-input">
						<input class="input100" placeholder="Email" type="email" id="email" name="email" required="" autocomplete="" autocorrect="off" browserautofilled="false">
						<span class="focus-input100"></span>
					</div>
					<div class="flex-sb-m w-full p-t-3 p-b-32">
						<div class="contact100-form-checkbox">
                        <button type="submit" class="login100-form-btn">Recover</button>
						</div>
						<a href="<?php echo base_url(ADMIN_FOLDER."/login/")?>" class="txt1">Back to Login</a>
					</div>
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