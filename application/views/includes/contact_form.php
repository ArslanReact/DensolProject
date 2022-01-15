<?php if(isset($ercolor)){ $error_color = $ercolor; }else{ $error_color = "#ff0000"; } ?>
<div class="m-b-30">
    <div class="main-head col text-center">
        <h5 class="fontsize30 blusecolortext fontwieghtbold">Write us a message</h5>
    </div>
    <div class="row m-t-60">
        <div class="col-xl-8 col-lg-8 mr-auto ml-auto">

<?php echo form_open(base_url()."contact-submit"); $font_size = "12px";?>
<?php
if($this->session->flashdata('error') !== ""){
    $error = $this->session->flashdata('error');
}else{
    $error = array();
}
?>
    <div class="row">
        <div class="col-md-12">
            <?php if($this->session->flashdata('error') != ""){echo '<h3 style="font-size:15px; color: '.$error_color.';margin-bottom:15px;">Error: please fix below errors</h3>';} ?>
            <?php if($this->session->flashdata('success') != ""){echo '<h3 style="font-size:15px; color: #00bd09;margin-bottom:15px;">Success: Form Submit Successfully.</h3>';} ?>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="exampleInputName2">Your Name (required)</label>
                <input name="name" type="text" class="m-t-10 form-control borderradius10 h-45" id="exampleInputName2" placeholder="">
                <? if(isset($error["name"])){echo $error["name"];}?>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="exampleInputEmail3">Your Email (required)</label>
                <input name="email" type="email" class="m-t-10 form-control borderradius10 h-45" id="exampleInputEmail3" placeholder="">
                <? if(isset($error["email"])){echo $error["email"];}?>
            </div>
        </div>           
    </div>
    <div class="form-group">
        <label for="exampleInputEmail4">Subject</label>
        <input name="subject" type="text" class="m-t-10 form-control borderradius10 h-45" id="exampleInputEmail4" placeholder="">
        <? if(isset($error["subject"])){echo $error["subject"];}?>
    </div>
    <div class="form-group">
        <label for="exampleInputEmail5">Your Message</label>
        <textarea name="message" type="text" class="m-t-10 form-control borderradius10 h-45" rows="5" id="exampleInputEmail5" placeholder=""></textarea>
        <? if(isset($error["message"])){echo $error["message"];}?>
    </div>
    <div class="form-group" style="position: relative;">
        <label for="exampleInputEmail6">Captcha</label>
    	<img src="<?php echo $captcha;?>" alt="Captcha" style="position: absolute;right: 0;top: 0;">
        <input name="captcha" type="text" class="m-t-10 form-control borderradius10 h-45" id="exampleInputEmail6" placeholder="">
        <? if(isset($error["captcha"])){echo $error["captcha"];}?>
    </div>
    <input type="hidden" name="contact" value="<?php echo uri_string();?>">
            <div class="col-lg-12 mb-3 text-xl-right text-lg-left">
                <button type="submit" class="btn btn-blue-fill">Send</button>
            </div>
</form>


        </div>
    </div>
</div>