<button class="cross" id="cross_register"> X </button>
<form action="<?php echo URL;?>Login/New_user" id="register_form" method="post" >
    <center><b style="font-size:22px">Register_Here</b></center><br /><br />
    <label class="form_label">Name</label><br />
    <center><input type="text" id="uname" required="true" name="uname" class="form_input" /></center><br />
    <label class="form_label">Email</label><br />
    <center><input type="email" required="true" name="email" class="form_input" /></center><br /><span id="email_error" class="error"></span>
    <label class="form_label">Mobile No.</label><br />
    <center><input type="number" required="true" name="mobile" class="form_input" /></center><br /><span id="mobile_error" class="error"></span>
    <label class="form_label">Password</label><br />
    <center><input type="password" required="true" name="password" class="form_input" /></center><br /><span id="password_error" class="error"></span>
    <label class="form_label">Confirm Password</label><br />
    <center><input type="password" name="confirm_password" required="true" class="form_input" /></center><br /><span id="cpassword_error" class="error"></span>
    <input type="submit" value="Register" id="register_button" class="form_button" /><br /><br /><span id="sp" style="color:blue"></span>
</form>