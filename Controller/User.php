<?php 
class User extends Controller {
    function __construct() {
        parent::__construct();
    }
    public function Index()
    {
        Session::init();
        $user=isset($_SESSION['user'])?$_SESSION['user']:null;
        $email=isset($_SESSION['user'])?$_SESSION['email']:null;
        if(is_null($user))
        {
            Session::destroy();
            header("location:".URL);
        }
        else
        {
            $this->view->user_options='<ul class="user_options">'
                    . '<a href="'.URL.'User/Profile"><li>Profile</li></a>'
                    . '<a href="'.URL.'User/Orders"><li>Orders</li></a>'
                    . '<a href="'.URL.'User/Track_orders"><li>Track Order</li></a>'
                    . '<a href="'.URL.'User/Cancel_orders"><li>Cancel Orders</li></a></ul>';
            $this->view->user= strtoupper(Session::get('user'));
            $cart= $this->model->cart($email);
            $this->view->cart=$cart['size'];
            $this->view->log_option= '<a href="'.URL.'Login/Logout">Log Out';
            $this->view->class='log_buttons';
            $this->view->cls1='user_profile';
        }
        $this->view->cat=$this->model->Fetch_cat();
        $this->view->sub_cat=$this->model->Fetch_sub_cat();
        $this->view->brand=$this->model->Fetch_brand();
    }
    
    public function profile()
    {
        $this->Index();
        $email=isset($_SESSION['user'])?$_SESSION['email']:null;
        $this->view->user_details=$this->model->Select_user($email);
        $this->view->Render_products('User/Profile');
    }
    public function Orders()
    {
        Session::init();
        $email=Session::get('email');
        $this->Index();
        
        $product=$this->model->Orders($email);
        $id=array();
        foreach ($product as $value) {
            $id[]=$value['Product_id'];
        }
        $this->view->rating=$this->model->Check_ratings($id,$email);
        $this->view->products=$this->model->Select_product($id,$product);
        //print_r($this->view->products);
        $this->view->render_products('User/Orders');
    }
    public function Track_orders()
    {
        Session::init();
        $email=Session::get('email');
        $this->Index();
        
        $product=$this->model->Orders($email,'Pending');
        $id=array();
        foreach ($product as $value) {
            $id[]=$value['Product_id'];
        }
        $this->view->rating=$this->model->Check_ratings($id,$email);
        $this->view->products=$this->model->Select_product($id,$product);
        $this->view->render_products('User/Track_orders');
    }
    public function Cancel_orders()
    {
        Session::init();
        $email=Session::get('email');
        $this->Index();
        
        $product=$this->model->Orders($email,'Pending');
        $id=array();
        foreach ($product as $value) {
            $id[]=$value['Product_id'];
        }
        $this->view->products=$this->model->Select_product($id,$product);
        $this->view->render_products('User/Cancel_orders');
    }
    public function Review_ratings()
    {
        Session::init();
        $email=Session::get('email');
        $this->Index();
        
        $rating=$this->model->Ratings($email);
        $id=array();
        if(sizeof($rating)>0){
        foreach ($rating as $value) {
            $id[]=$value['Product_id'];
        }
        $this->view->products=$this->model->Select_product_rating($id,$rating);
        $this->view->render_products('User/Review_ratings');
        }
        else{
            $this->view->products=array();
            $this->view->render_products('User/Review_ratings');
        }
    }
    public function Add_review()
    {
        $this->Index();
        $this->model->Add_review();
    }
    public function Update_review()
    {
        $this->Index();
        $this->model->Update_review();
    }
    public function Delete_review()
    {
        $this->Index();
        $data=$_GET['p'];
        $this->model->Delete_review($data);
    }
    public function Cancel_order()
    {
        $this->Index();
        $data=$_GET['p'];
        $this->model->Cancel_order($data);
    }
    
    
    public function Checkout($data)
    {
        Session::init();
        $email=Session::get('email');        
        $this->view->products=$this->model->Select_product($data);  
        $this->view->address= $this->model->Select_address($email);
        $this->view->payment=$this->model->Select_mode();
        $this->view->Render_user("User/Checkout");
    }
    public function New_address()
    {
        Session::init();
        $email=Session::get('email');
        $data=array(
            'email'=>$email,
            'street'=>$_POST['street'],
            'pincode'=>$_POST['pincode'],
            'city'=>$_POST['city'],
            'state'=>$_POST['state']
        );
        $this->model->New_address($data);
    }
    public function Delete_address($data)
    {
        $this->model->Delete_address($data);
    }
     public function Cart_checkout()
    {
        Session::init();
        $email=Session::get('email');
        $this->view->products=$this->model->All_contents();  
        $this->view->address= $this->model->Select_address($email);
        $this->view->payment=$this->model->Select_mode();
        $this->view->Render_user("User/Cart_checkout");
    }
    public function Place_order()
    {
        Session::init();
        $email=Session::get('email');
        $this->model->Place_order($email);
    }

}
?>