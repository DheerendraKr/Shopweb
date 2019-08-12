<?php
    class Admin Extends Controller {

    function __construct() {
        parent::__construct();
        //$file='http://localhost/Shopping/View/Admin/Session/Session_handler.php';
        include 'Controller/admin_folder/Session_handler.php';
    }
    public function user()
    {
        if(!Session_handler::init())
        {
             $this->view->Render('Admin/AdminLogin');
             exit();
        }
        else{
            $this->view->user= strtoupper(Session::get('user'));
            $this->view->log_option= '<a href="'.URL.'Login/Logout">Log Out</a>';
            $this->view->class='log_buttons';
            $this->view->cls1='user_profile';
        }
        
    }
    public function Index()
    {
        $this->user();
        $this->view->pending_order=$this->model->Select_pending_orders();
        $this->view->all_order=$this->model->Select_all_orders();
        $this->view->recent_orders=$this->model->Select_recent_orders();
        //$this->view->orders=$this->model->select_orders_index();
         $this->view->Render_admin_page('Admin/Index');        
    }
    public function View_products()
    {
        $this->user();
        $this->view->cat=$this->model->Select_cat();
        $this->view->data=$this->model->View_products();
        $this->view->Render_admin_page('Admin/View_Products');        
    }
    public function Manage_stock_products()
    {
        $this->user();
        $this->view->cat=$this->model->Select_cat();
        $this->view->data=$this->model->View_products();
        $this->view->Render_admin_page('Admin/Stock_products');
    }
    public function Manage_category()
    {
        $this->user();
        $this->view->category=$this->model->Select_cat();
        $this->view->Render_admin_page('Admin/Manage_category');        
    }
    public function Delete_cat($data)
    {
        $this->user();        
        $this->model->Delete_cat($data);
    }
    public function Add_cat($data)
    {
        $this->user(); 
        $this->model->Save_cat($data);
    }
    
    public function Manage_sub_cat($data=false)
    {
        if($data)
        {
            $this->view->sub_cat=$this->model->Select_sub_cat($data);
        }else
        {
            $this->user();
            $this->view->category=$this->model->Select_cat();
            $this->view->Render_admin_page('Admin/Manage_sub_cat'); 
        }
    }
    public function Delete_sub_cat($data)
    {
        $this->user(); 
        $this->model->Delete_sub_cat($data);
    }
    public function Save_sub_cat($data)
    {
        $this->user(); 
        $_data=array('sub_cat'=>$data,'cat_id'=>$_GET['p']);
        $this->model->Save_sub_cat($_data);
    }
    
    public function Manage_brand($data=false)
    {
        if($data){
            $this->view->brand=$this->model->Select_brand($data);
        }
        else
        {
            $this->user();
            $this->view->category=$this->model->Select_cat();            
            $this->view->Render_admin_page('Admin/Manage_brand');    
        }
    }
    public function Delete_brand($data)
    {
        $this->user();        
        $this->model->Delete_brand($data);
    }
    public function Save_brand($data)
    {
        $this->user();  
        $_data=array('brand'=>$data,'sub_cat_id'=>$_GET['p']);
        $this->model->Save_brand($_data);
    }
    
    public function Add_new_products()
    {
        $this->user();
        $this->view->category=$this->model->Select_cat();
        $this->view->Render_admin_page('Admin/New_products');        
    }
    public function Save_product()
    {
        $data=array(
            'name'=>$_POST['product'],
            'brand_id'=>$_POST['brand'],            
            'color'=>$_POST['color'],
            'price'=>$_POST['price'],
            'offer'=>$_POST['offer'],
            'quantity'=>$_POST['quantity']
        );
        $this->model->Save_product($data);
    }
    
    public function Upload_images()
    {
        $this->model->Upload_image();
    }
    
    
    public function Customer_details()
    {
        $this->user();
        $this->view->select_state=$this->model->Select_state();
        //$this->view->customer=$this->model->Customer_details();
        $this->view->Render_admin_page('Admin/Customer_details');        
    }
    public function All_orders()
    {
        $this->user();
        $this->view->all_orders=$this->model->Select_all_orders("limit 50");
        $this->view->Render_admin_page('Admin/All_orders');
    }
    public function profile()
    {
        $this->user();
        $this->view->data=$this->model->Profile(Session::get('id'));
        $this->view->Render_admin_page('Admin/Profile');        
    }
    public function Employee_details()
    {
        $this->user();
        $this->view->Render_admin_page('Admin/Employee_details');        
    }
    public function Add_employee()
    {
        $this->user();
        $this->view->Render_admin_page('Admin/Add_employee');        
    }
 
    
    
}
?>