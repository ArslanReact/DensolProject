<?php
if (isset($infomsg)) {
    echo $infomsg.'<br>';
} elseif (isset($infoerror)) {
    echo $infoerror.'<br>';
}

echo form_open('auth/submit_login');
?>
<h3>Uername</h3>
<input type="text" name="username">
<h3>Password</h3>
<input type="password" name="password">
<hr>
<input type="checkbox" name="remember_me"> Remember me
<hr>
<a href="<?php echo base_url("auth/forgot")?>">Forgot Password?</a><br><br>
<button type="submit">Submit</button>
</form>