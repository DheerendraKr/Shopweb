<?php include URL.'View/User_required.php';?>
 <div id="header">
     <a href="<?php echo URL;?>"><img src="<?php echo Main_Image; ?>logo.svg" id="site_logo" width="10%" height="50px"></a>
    <div class="user" id="user_name"><?php Session::init();$email=isset($_SESSION['user'])?$_SESSION['user']:null;  ?></div>
</div>

   