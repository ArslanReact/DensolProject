<?php
echo validation_errors();
echo form_open('auth/submit_register');
?>
<h3>Uername</h3>
<input type="text" name="username" value="<?php echo set_value('username'); ?>">
<h3>Password</h3>
<input type="password" name="password" value="<?php echo set_value('password'); ?>">
<h3>Password Confirmation</h3>
<input type="password" name="passconf" value="<?php echo set_value('passconf'); ?>">


<h3>Name</h3>
<input type="text" name="name" value="<?php echo set_value('name'); ?>">
<h3>Email</h3>
<input type="email" name="email" value="<?php echo set_value('email'); ?>">
<h3>Address 1</h3>
<input type="text" name="address1" value="<?php echo set_value('address1'); ?>">
<h3>Address 2</h3>
<input type="text" name="address2" value="<?php echo set_value('address2'); ?>">
<h3>City</h3>
<input type="text" name="city" value="<?php echo set_value('city'); ?>">
<h3>State</h3>
<input type="text" name="state" value="<?php echo set_value('state'); ?>">
<h3>Zip Code</h3>
<input type="text" name="zip" value="<?php echo set_value('zip'); ?>">
<h3>Country</h3>
<input type="text" name="country" value="<?php echo set_value('country'); ?>">

<hr>
<button type="submit">Submit</button>
</form>