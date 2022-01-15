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
    <?php echo form_open('auth/submit_forgot'); ?>
        <fieldset class="scheduler-border">
            <legend class="scheduler-border">Recovery</legend>
            <h5>Success:</h5>
            <p>Your message goes here</p>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="email">Email <span class="rq">*</span></label>                   
                        <input type="text" name="email" class="form-control"/>                    
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <button class="btn btn-primary" type="submit">Submit</button>
                </div>
            </div>
        </fieldset>
    </form>
</div>