<?php

if($this->session->flashdata('login_error') != ""){

    $error_color = "#ff0000";

    $loginerror = $this->session->flashdata('login_error');

    if(isset($loginerror['errormsg'])){

        $errorrmsg = '<p style="color:'.$error_color.'">'.$loginerror['errormsg'].'</p>';

    }else{

        $errorrmsg = '<p style="color:'.$error_color.'">Please fix below errors</p>';

    }    

}else{

    $loginerror = array();

    $error_color = "#ff0000";

}

if($this->session->flashdata('login_success') != ""){

    $success_color = "#00d30a";

    $successs = $this->session->flashdata('login_success');

    if(isset($successs['successmsg'])){

        $successmsg = '<p style="color:'.$success_color.'">'.$successs['successmsg'].'</p>';

    }else{

        $successmsg = '';

    }

}

if($this->session->flashdata('forgot_error') != ""){

    $error_color = "#ff0000";

    $error = $this->session->flashdata('forgot_error');

    if(isset($error['errormsg'])){

        $errorrmsg = '<p style="color:'.$error_color.'">'.$error['errormsg'].'</p>';

    }else{

        $errorrmsg = '<p style="color:'.$error_color.'">Please fix below errors</p>';

    }

}else{

    $error = array();

    $error_color = "#ff0000";

}

if($this->session->flashdata('forgot_success') != ""){

    $success_color = "#00d30a";

    $successs = $this->session->flashdata('forgot_success');

    if(isset($successs['successmsg'])){

        $successmsg = '<p style="color:'.$success_color.'">'.$successs['successmsg'].'</p>';

    }else{

        $successmsg = '';

    }

}



$loginsesstionname = "login_captcha";

$forgotsesstionname = "forgot_captcha";

$logincaptchaurl = getCaptcha("#010101",$loginsesstionname);

$forgotcaptchaurl = getCaptcha("#010101",$forgotsesstionname);

?>


<?php

if($this->session->flashdata('forgot_error') != ""){

?><style>#loginbx{display:none;}</style><?php

}elseif($this->session->flashdata('forgot_success') != ""){

?><style>#loginbx{display:none;}</style><?php

}else{

?><style>#forgotbx{display:none;}</style><?php

}

?>

<div class="tecloginform card" id="loginbx">

    <?php echo form_open('user/submit-login'); ?>

        <fieldset class="scheduler-border">

            <legend class="scheduler-border">Login</legend>

            <?php if($this->session->flashdata('login_error') != ""){echo '<h5 style="color: '.$error_color.';">Error:</h3>'.$errorrmsg;} ?>

            <?php if($this->session->flashdata('login_success') != ""){echo '<h5 style="color: '.$success_color.';">Success:</h3>'.$successmsg;} ?>

            <div class="row">

                <div class="col-md-12">

                    <div class="form-group">

                        <label for="username">Username <span class="rq">*</span></label>                   

                        <input type="text" name="username" class="form-control"/>

                        <? if(isset($loginerror["username"])){echo $loginerror["username"];}?>                  

                    </div>

                </div>

            </div>

            <div class="row">

                <div class="col-md-12">

                    <div class="form-group">

                        <label for="password">Password <span class="rq">*</span></label>                    

                        <input type="password" name="password" class="form-control"/>

                        <? if(isset($loginerror["password"])){echo $loginerror["password"];}?>                

                    </div>

                </div>

            </div>

            <div class="row">

                <div class="col-md-12">

                    <div class="form-group">

                        <label for="login_captcha">Captcha <span class="rq">*</span></label>

                        <div class="posrel">

                        <img src="<?php echo $logincaptchaurl;?>" class="logincaptchaimg" alt="login captcha">

                        <input type="text" name="login_captcha" class="form-control"/>

                        </div>

                        <? if(isset($loginerror["login_captcha"])){echo $loginerror["login_captcha"];}?>                      

                    </div>

                </div>

            </div>

            <div class="row">

                <div class="col-md-6">

                    <input type="hidden" name="captcha_s_name" value="<?php echo $loginsesstionname;?>">

                    <input type="hidden" name="return_page" value="<?php echo $return_page;?>">

                    <button class="btn btn-blue-fill borderradius50" type="submit">Login</button>

                </div>

                <div class="col-md-6 text-right">

                    <!-- <input type="checkbox" name="remember_me"> Remember me<br> -->

                    <a id="forgotbtn" href="#!">Forgot Passwod?</a>

                </div>

            </div>

        </fieldset>

    </form>

</div>

<div class="tecloginform card" id="forgotbx">

    <?php echo form_open('user/submit-forgot'); ?>

        <fieldset class="scheduler-border">

            <legend class="scheduler-border">Recovery</legend>

            <?php if($this->session->flashdata('forgot_error') != ""){echo '<h5 style="color: '.$error_color.';">Error:</h3>'.$errorrmsg;} ?>

            <?php if($this->session->flashdata('forgot_success') != ""){echo '<h5 style="color: '.$success_color.';">Success:</h3>'.$successmsg;} ?>

            <div class="row">

                <div class="col-md-12">

                    <div class="form-group">

                        <label for="email">Email <span class="rq">*</span></label>                   

                        <input type="text" name="email" class="form-control"/>

                        <? if(isset($error["email"])){echo $error["email"];}?>                  

                    </div>

                </div>

            </div>

            <div class="row">

                <div class="col-md-12">

                    <div class="form-group">
                        <label for="forgot_captcha">Captcha <span class="rq">*</span></label>

                        <div class="posrel">

                        <img src="<?php echo $forgotcaptchaurl;?>" class="logincaptchaimg" alt="forgot captcha">

                        <input type="text" name="forgot_captcha" class="form-control"/>

                        </div>

                        <? if(isset($error["forgot_captcha"])){echo $error["forgot_captcha"];}?>                      

                    </div>

                </div>

            </div>

            <div class="row">

                <div class="col-md-6">

                    <input type="hidden" name="captcha_s_name" value="<?php echo $forgotsesstionname;?>">

                    <input type="hidden" name="return_page" value="<?php echo $return_page;?>">

                    <button class="btn btn-blue-fill borderradius50" type="submit">Submit</button>

                </div>

                <div class="col-md-6 text-right">

                    <a id="loginbtn" href="#!">Back to Login</a>

                </div>

            </div>

        </fieldset>

    </form>

</div>

<script>

document.getElementById("forgotbtn").addEventListener("click", showForgot);

document.getElementById("loginbtn").addEventListener("click", showLogin);

function showForgot() {

    document.getElementById("loginbx").style.display="none";

    document.getElementById("forgotbx").style.display="block";

}

function showLogin() {

    document.getElementById("forgotbx").style.display="none";

    document.getElementById("loginbx").style.display="block";

}

</script>