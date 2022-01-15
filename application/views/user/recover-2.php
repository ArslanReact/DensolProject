<style>
.tecloginform fieldset.scheduler-border {
    border: 1px groove #ddd !important;
    padding: 0 1.4em 1.4em 1.4em !important;
    margin: 0 0 1.5em 0 !important;
    -webkit-box-shadow:  0px 0px 0px 0px #000;
    box-shadow:  0px 0px 0px 0px #000;
    border-radius:5px;
}
.tecloginform legend.scheduler-border {
    font-size: 1.2em !important;
    font-weight: bold !important;
    text-align: left !important;
    width:auto;
    padding:0 10px;
    border-bottom:none;
}
.tecloginform .rq{
    color:red;
}
</style>
<div class="tecloginform">
    <?php echo form_open('auth/submit_recover'); ?>
        <fieldset class="scheduler-border">
            <legend class="scheduler-border">Change Password</legend>
            <h5>Success:</h5>
            <p>Your message goes here</p>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="password">Password <span class="rq">*</span></label>                    
                        <input type="text" name="password" class="form-control"/>                    
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="passconf">Retype Password <span class="rq">*</span></label>                    
                        <input type="text" name="passconf" class="form-control"/>                    
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <input type="hidden" name="recover_key" value="<? //echo $recover_key?>">
                    <button class="btn btn-primary" type="submit">Update Password</button>
                </div>
            </div>
        </fieldset>
    </form>
</div>