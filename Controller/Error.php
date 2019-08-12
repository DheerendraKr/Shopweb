<?php
class Error_Controller extends Controller
{

    function __construct()
    {
        parent::__construct();
        $this->view->js=array('header_js.js','login.js');
    }
    function index($args)
    {
        $this->view->user='Login';
        $this->view->log_option= 'Register';
        $this->view->class='nav_button';
        $this->view->msg="this page  does not exist   index method".$args;
        $this->view->Render_Error_page('Error/index');
    }

}
?>