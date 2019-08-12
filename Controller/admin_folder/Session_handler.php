<?php
    class Session_handler {

        static function init() {
        Session::init();
        //$user=is_null(Session::get('user_name'))?Session::get('user_name'):null;
        $user=isset($_SESSION['user'])?$_SESSION['user']:null;
        $role=isset($_SESSION['role'])?$_SESSION['role']:null;
        if(is_null($user) || is_null($role))
        { 
            Session::destroy();
            return false;
        }
        else
        {
            return true;
        }
    }

}
?>