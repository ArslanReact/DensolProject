<?php
if($this->session->flashdata('register_error') !== ""){

    $error = $this->session->flashdata('register_error');

    $error_color = "#ff0000";

}else{

    $error = array();

    $error_color = "#ff0000";

}

if($this->session->flashdata('register_success') !== ""){

    $success_color = "#00d30a";

}

$registersesstionname = "register_captcha";

$registercaptchaurl = getCaptcha("#010101",$registersesstionname);

?>


<div class="tecregisterform">

    <?php echo form_open('user/submit-register'); ?>

        <fieldset class="scheduler-border">

            <legend class="scheduler-border">Register</legend>

            <?php if($this->session->flashdata('register_error') != ""){echo '<h5 style="color: '.$error_color.';">Error:</h3><p style="color: '.$error_color.';">Please fix below errors</p>';} ?>

            <?php if($this->session->flashdata('register_success') != ""){echo '<h5 style="color: '.$success_color.';">Success:</h3><p style="color: '.$success_color.';">Registration completed Successfully.<br> please check your email and activate your account</p>';} ?>

            <div class="row">

                <div class="col-md-6">

                    <div class="form-group">

                        <label for="name">Full Name <span class="rq">*</span></label>

                        <input type="text" name="name" class="form-control"/>

                        <? if(isset($error["name"])){echo $error["name"];}?>

                    </div>

                </div>

                <div class="col-md-6">

                    <div class="form-group">

                        <label for="register_email">Email <span class="rq">*</span></label>

                        <input type="email" name="register_email" class="form-control"/>

                        <? if(isset($error["register_email"])){echo $error["register_email"];}?>

                    </div>

                </div>

            </div>

            <div class="row">

                <div class="col-md-12">

                    <div class="form-group">

                        <label for="register_username">Username <span class="rq">*</span></label>

                        <input type="text" name="register_username" class="form-control"/>

                        <? if(isset($error["register_username"])){echo $error["register_username"];}?>

                    </div>

                </div>

            </div>

            <div class="row">

                <div class="col-md-6">

                    <div class="form-group">

                        <label for="register_password">Password <span class="rq">*</span></label>

                        <input type="password" name="register_password" class="form-control"/>

                        <? if(isset($error["register_password"])){echo $error["register_password"];}?>

                    </div>

                </div>

                <div class="col-md-6">

                    <div class="form-group">

                        <label for="passconf">Retype Password <span class="rq">*</span></label>

                        <input type="password" name="passconf" class="form-control"/>

                        <? if(isset($error["passconf"])){echo $error["passconf"];}?>

                    </div>

                </div>

            </div>

            <div class="row">

                <div class="col-md-12">

                    <div class="form-group">

                        <label for="company">Company Name (Optional)</label>

                        <input type="text" name="company" class="form-control"/>

                        <? if(isset($error["company"])){echo $error["company"];}?>

                    </div>

                </div>

            </div>

            <div class="row">

                <div class="col-md-12">

                    <div class="form-group">

                        <label for="country">Country <span class="rq">*</span></label>

                        <select name="country" class="form-control">

                            <option value="Australia">Australia</option>
                            <option value="New Zealand">New Zealand</option>
                            <option value="United Kingdom (UK)">United Kingdom (UK)</option>


                        </select>

                        <? if(isset($error["country"])){echo $error["country"];}?>

                    </div>

                </div>

            </div>

            <div class="row">

                <div class="col-md-12">

                    <div class="form-group">

                        <label for="address1">Street Address <span class="rq">*</span></label>

                        <input type="text" name="address1" class="form-control"/>

                        <? if(isset($error["address1"])){echo $error["address1"];}?>

                    </div>

                    <div class="form-group">

                        <input type="text" name="address2" class="form-control"/>

                        <? if(isset($error["address2"])){echo $error["address2"];}?>

                    </div>

                </div>

            </div>

            <div class="row">

                <div class="col-md-12">

                    <div class="form-group">

                        <label for="city">City <span class="rq">*</span></label>

                        <input type="text" name="city" class="form-control"/>

                        <? if(isset($error["city"])){echo $error["city"];}?>

                    </div>

                </div>

            </div>

            <div class="row">

                <div class="col-md-12">

                    <div class="form-group">

                        <label for="state">State <span class="rq">*</span></label>

                        <input type="text" name="state" class="form-control"/>

                        <? if(isset($error["state"])){echo $error["state"];}?>

                    </div>

                </div>

            </div>

            <div class="row">

                <div class="col-md-12">

                    <div class="form-group">

                        <label for="zip">Postal Code <span class="rq">*</span></label>

                        <input type="text" name="zip" class="form-control"/>

                        <? if(isset($error["zip"])){echo $error["zip"];}?>

                    </div>

                </div>

            </div>

            <div class="row">

                <div class="col-md-12">

                    <div class="form-group">

                        <label for="phone">Phone <span class="rq">*</span></label>

                        <input type="text" name="phone" class="form-control"/>

                        <? if(isset($error["phone"])){echo $error["phone"];}?>                      

                    </div>

                </div>

            </div>

            <div class="row">

                <div class="col-md-12">

                    <div class="form-group">

                        <label for="register_captcha">Captcha <span class="rq">*</span></label>

                        <div class="posrel">

                        <img src="<?php echo $registercaptchaurl;?>" class="registercaptchaimg" alt="register captcha">

                        <input type="text" name="register_captcha" class="form-control"/>

                        </div>

                        <? if(isset($error["register_captcha"])){echo $error["register_captcha"];}?>                      

                    </div>

                </div>

            </div>

            <div class="row">

                <div class="col-md-12">

                    <input type="hidden" name="captcha_s_name" value="<?php echo $registersesstionname;?>">

                    <input type="hidden" name="return_page" value="<?php echo $return_page;?>">

                    <button class="btn btn-primary" type="submit">Submit</button>

                </div>

            </div>

        </fieldset>

    </form>

</div>