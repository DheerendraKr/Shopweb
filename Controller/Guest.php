<?php 
    class Guest extends Controller {

        function __construct() {
            parent::__construct();
    }
    public function Index()
    {
        header("location:".URL);
    }
   
    public function Checkout($data)
    {    
        $this->view->products=$this->model->Select_product($data); 
        $this->view->payment=$this->model->Select_mode();
        $this->view->Render_user("User/Guest/Checkout");
    }
    public function Details()
    {
        $this->model->Details();
    }
    public function Add_address($data)
    {
        $this->model->Add_address($data);
    }
    public function Place_order()
    {
        $this->model->Place_order();
    }
    
}
?>