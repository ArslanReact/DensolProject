<?php
echo validation_errors();
if(isset($msg)){
echo $msg;
}
echo form_open('auth/submit_forgot');
?>
<h3>email address</h3>
<input type="email" name="email">
<hr>
<button type="submit">Submit</button>
</form>