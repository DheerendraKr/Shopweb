<div class="forgot_panel">
<center><b style="font-size:22px">Forgot_Password</b></center><br />
<div id="forgot_panel" style="width: 100%;">
<form action="<?php echo URL;?>Login/Check_email" method="post" id="forgot_check_email" >    
    <label class="form_label">Your Email</label><br />
    <center><input type="email" required="true" id="login_email" name="email" class="form_input" /></center>
    <span id="msg" style="margin-left:15%;color:#f00;margin-top:5px;"></span><br/><br/>
    <input type="submit" value="Submit" class="form_button" /><br /><br />
</form>
</div>
</div>