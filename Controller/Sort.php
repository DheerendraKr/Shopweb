<?php
    class Sort extends Controller {

        function __construct() {
        parent::__construct();
    }
    public function Select_city()
    {
        $data=$_GET["p"];
        $this->model->Select_city($data);
    }
    
    public function Sort_pincode()
    {
        $data=$_GET["p"];
        $this->model->Sort_pincode($data);
    }
    public function Search_email_mobile()
    {
        $data=$_GET["p"];
        $this->model->Search_email_mobile($data);
    }
    public function Select_customer_bycity()
    {
        $data=$_GET['p'];
        $this->model->Select_customer_bycity($data);
    }
    
    public function Search_employee()
    {
        $data=$_GET['p'];
        $this->model->Search_employee($data);
    }
    public function Select_sub_cat($data)
    {
        $this->model->Select_sub_cat($data);
    }
    
    public function Select_brand($data){
        $this->model->Select_brand($data);
    }
    
    public function Select_product_bybrand($data)
    {
        $this->model->Select_product_bybrand($data);
    }
    
}
?>