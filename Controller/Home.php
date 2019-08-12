<?php
class Home extends Controller
{

    function __construct() 
    {
        parent::__construct();
        $this->view->js=array('header_js.js','login.js','cart.js');
    }
    public function index()
    {
//        session_start();
        Session::init();
        //$user=is_null(Session::get('user_name'))?Session::get('user_name'):null;
        $user=isset($_SESSION['user'])?$_SESSION['user']:null;
        if(is_null($user))
        { 
            $this->Not_loggedin();
        }
        else
        {
            $this->Loggedin();
        }
        $this->view->cat=$this->model->Fetch_cat();
        $this->view->sub_cat=$this->model->Fetch_sub_cat();
        $this->view->brand=$this->model->Fetch_brand();
        $this->view->cart=$this->model->Cart();
        $this->view->deal=$this->model->Deal_ofday();
        $this->view->offer=$this->model->Best_offers();
        $this->view->trend=$this->model->Trending();
        $this->view->foot=$this->model->Footwear();
        $this->view->kitchen=$this->model->Kitchen();
        $this->view->furnish=$this->model->Furnishing();
        $this->view->smart=$this->model->Smart();
        $this->view->recent=$this->model->Recent_view();
        $this->view->Render_Home_Page('Home/index');
    }
    public function Loggedin()
    {
        $this->view->user_options='<ul class="user_options">'
                . '<a href="'.URL.'User/Profile"><li>Profile</li></a>'
                . '<a href="'.URL.'User/Orders"><li>Orders</li></a>'
                . '<a href="'.URL.'User/Track_orders"><li>Track Order</li></a>'
                . '<a href="'.URL.'User/Cancel_orders"><li>Cancel Orders</li></a></ul>';
        $this->view->user= strtoupper(Session::get('user'));
        $this->view->log_option= '<a href="'.URL.'Login/Logout">Log Out';
        $this->view->class='log_buttons';
        $this->view->cls1='user_profile';
    }
    public function Not_loggedin()
    {
        Session::init();
        Session::destroy();
        $this->view->user='Login';
        $this->view->log_option= 'Register';
        $this->view->class='nav_button';
    }

    public function Suggestions($data)
    {
        $this->model->Suggestion($data);
    }
    public function Forgot_password()
    {
        $this->Not_loggedin();
        $this->view->cat=$this->model->Fetch_cat();
        $this->view->sub_cat=$this->model->Fetch_sub_cat();
        $this->view->brand=$this->model->Fetch_brand();
        $this->view->cart=$this->model->Cart();
        $this->view->Render_forgotpassword_Page("Forms/Forgot_password");
    }
    
}
?>