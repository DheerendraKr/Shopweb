<?php
    class Products extends Controller {

        function __construct() 
        {
            parent::__construct();
            $this->view->js=array('header_js.js','login.js');
            Session::init();
            $user=isset($_SESSION['user'])?$_SESSION['user']:null;
            if(is_null($user))
            { 
                Session::destroy();
                $this->view->user='Login';
                $this->view->log_option= 'Register';
                $this->view->class='nav_button';
            }
            else
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
        }
        public function Index()
        {
            $this->view->cat=$this->model->Fetch_cat();
            $this->view->sub_cat=$this->model->Fetch_sub_cat();
            $this->view->brand=$this->model->Fetch_brand();
        }
        public function View_all($data=false)
        {
            if($data==true)
            {
                $this->view->products=$this->model->{$data}($_GET['p']);
                $this->view->cart=$this->model->Cart();
                $this->Index();                
                $this->view->Render_products('Products/Index');
            }
            else
            {
                echo "error";
            }
        }
        
        public function List_products($data)
        {
            $this->view->product=$this->model->List_details($data);
            $this->view->cart=$this->model->Cart();
            $this->Index();
            $this->view->img=$this->model->Select_all_images($data);
            $this->view->rating=$this->model->Select_ratings($data);
            $this->view->similar=$this->model->Similar_products($data);
            $this->view->Render_products_list('Products/Product_details');
        }
        public function Sort($data)
        {
            $str="Sort_".$data;
            $this->model->{$str}($_GET['p'],$_GET['q']);
        }
        public function Search($data)
        {
            $this->view->cart=$this->model->Cart();
            $this->Index();
            $this->view->product=$this->model->Product_by_name($data);
            $this->view->Render_products("Products/Search");
        }
        
}
?>