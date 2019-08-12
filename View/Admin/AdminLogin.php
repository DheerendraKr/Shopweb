<link href="<?php echo URL;?>public/StyleSheets/Form.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="<?php echo JS;?>jquery/jquery-3.2.1.js" ></script>
<div class="admin_login">
<form action="<?php echo URL;?>Login/Admin_login" method="post" id="login_form" >
    <center><b style="font-size:22px">Login</b></center><br /><br />
    <label class="form_label">Your Id</label><br />
    <center><input type="number" required="true" name="admin_id" class="form_input" /></center><br />
    <label class="form_label">Password</label><br />
    <center><input type="password" required="true" name="password" class="form_input" /></center><br />
    <input type="submit" value="Login" class="form_button" /><br /><br />
    <center><b><label><a href="#">Trouble Logging in</a></label></b></center>
</form>
</div>
<script type="text/javascript">
    $(document).ready(function(){
        $("#login_form").submit(function(){
            var url=$(this).attr("action");
            var data=$(this).serialize();
            $.post(url,data,function(ret){
            if(ret[1].match(true))
            {
                 window.location.href = "http://localhost/Shopping/Admin";

            }
            else
            {
                alert(ret[1]);
                return false;
            }
        },'json');
            return false;
        });
    });
</script>