<?php
echo validation_errors();
if(isset($msg)){
echo $msg;
}
echo form_open('auth/submit_recover');
?>
<h3>Password</h3>
<input type="password" name="password">
<h3>Retype Password</h3>
<input type="password" name="passconf">
<input type="hidden" name="recover_key" value="<?=$recover_key?>">
<hr>
<button type="submit">Submit</button>
</form>