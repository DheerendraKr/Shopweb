<?php
    class Cart extends Controller {

        function __construct() {
        parent::__construct();
    }
    public function index()
    {
        Session::init();
        $user=isset($_SESSION['user'])?$_SESSION['user']:null;
        $email=isset($_SESSION['user'])?$_SESSION['email']:null;
        if(is_null($user))
        { 
            Session::destroy();
            $this->view->cart=0;
            $this->view->user='Login';
            $this->view->log_option= 'Register';
            $this->view->class='nav_button';
        }
        else
        {            
            $this->view->cart=$this->model->Cart_data($email);
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
        $this->view->cat=$this->model->Fetch_cat();
        $this->view->sub_cat=$this->model->Fetch_sub_cat();
        $this->view->brand=$this->model->Fetch_brand();
        
    }
    public function Add_to_cart($data)
    {
        Session::init();
        $_data=array(
            'id'=>$data,
            'email'=>Session::get('email'),
            'quantity'=>1
        );
        $this->model->Add_to_cart($_data);
    }
    public function All_contents()
    {
        $this->index();
        $this->view->products=$this->model->All_contents();
        $this->view->Render_products("Cart/Index");
    }
    public function Cart_content($data)
    {
        $val=$this->model->Cart_data($data);
        echo json_encode(array('item'=>$val));
    }
    public function remove_from_cart($data)
    {
        $this->model->Remove_from_cart($data);
    }
    public function Add_more($data)
    {
        $this->model->Add_more($data);
    }
}
?>