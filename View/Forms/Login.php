<button class="cross" id="cross_login"> X </button>
<form action="<?php echo URL;?>Login/User_login" method="post" id="login_form" >
    <center><b style="font-size:22px">Login</b></center><br /><br />
    <label class="form_label">Email</label><br />
    <center><input type="email" required="true" id="login_email" name="email" class="form_input" /></center><br />
    <label class="form_label">Password</label><br />
    <center><input type="password" required="true" name="password" class="form_input" /></center><br />
    <input type="submit" value="Login" class="form_button" /><br /><br />
    <center><b><label><a href="<?php echo URL;?>Home/Forgot_password">Trouble Logging in</a></label></center>
</form>