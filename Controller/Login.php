<?php
    class Login extends Controller {

    function __construct() {
        parent::__construct();
    }
    public function Admin_login()
    {
        $data=array(
            'id'=>$_POST['admin_id'],
            'password'=>$_POST['password']            
        );
        $this->model->Admin_Login($data);
    }
    
    public function Save_employee()
    {
        $data=array();
        $data['name']=$_POST['name'];
        $data['email']=$_POST['email'];
        $data['mobile']=$_POST['mobile'];
        $data['password']=$_POST['password'];
        $data['gender']=$_POST['gender'];
        $data['dob']=$_POST['dob'];
        $data['role']=$_POST['role'];
                
        $this->model->Save_employee($data);
    }
    
    public function Update_admin_profile()
    {
        $data=array(
            'name'=>$_POST['uname'],
            'email'=>$_POST['email'],
            'mobile'=>$_POST['mobile'],
            'gender'=>$_POST['gender'],
            'city'=>$_POST['city'],
            'state'=>$_POST['state'],
            'pincode'=>$_POST['pincode'],
            'dob'=>$_POST['dob'],
           // 'password'=>$_POST['password']
        );
        $this->model->Update_admin_profile($data);
    }
    
    public function User_login()
    {
        $data=array(
            'email'=>$_POST['email'],
            'password'=>$_POST['password']
        );
        $this->model->User_login($data);
    }
    
    public function New_user()
    {
        $data=array(
            'name'=>$_POST['uname'],
            'email'=>$_POST['email'],
            'mobile'=>$_POST['mobile'],
            'password'=>$_POST['password']
        );
        $this->model->New_user($data);
    }
    
    public function Logout()
    {
        Session::init();
        session_unset();
        Session::destroy();
        $this->view->user='Login';
        $this->view->log_option= 'Register';
        $this->view->class='nav_buttons';
        $this->view->link='';
        header('location: http://localhost/Shopping/Home');
    }
    public function Check_email()
    {
        $this->model->Check_email();
    }
    
}
?>