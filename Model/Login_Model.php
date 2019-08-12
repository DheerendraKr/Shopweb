<?php

    class Login_model extends Model {

        function __construct() {
        parent::__construct();
    }
    public function Admin_login($r_data)
    {
        $sql="select Admin_id,Email,Name,Role from admin where Admin_id=:id and Password=:password";
        $_data=array(
            ':id'=>$r_data['id'],
            ':password'=>Hash::Create('sha256', $r_data['password'], HASH_KEY_PASSWORD),
        );
        //print_r($this->db->Select($sql,$data));
        $data=$this->db->Select($sql,$_data);
        if(isset($data))
        {
            Session::init();
            Session::set('id',$data[0]["Admin_id"]);           
            Session::set('email',$data[0]["Email"]);           
            Session::set('user',$data[0]["Name"]);
            Session::set('role',$data[0]["Role"]);
            $s_data = array(0 => strtoUpper(Session::get('user')),1 => 'true');
            echo json_encode($s_data);
        }
        else
        {
            $s_data = array(0 => 'invalid credentials',1 => 'false');
            echo json_encode($s_data);
        }
     
    }
    
     public function Save_employee($data)
    {
        //print_r($data);
        $values=array(
            'Name'=>$data['name'],
            'Email'=>$data['email'],
            'Mobile'=>$data['mobile'],
            'Password'=>Hash::Create('sha256', $data['password'], HASH_KEY_PASSWORD),
            'Gender'=>$data['gender'],
            'Role'=>$data['role'],
            'DOB'=>$data['dob'],
            'Date_joined'=> date("y-m-d")
        );
        $this->db->Insert('admin',$values);
        echo("Added Successfully");
        
    }
    
    
    public function User_login($data)
    {
        $_data=array(
            'Email'=>$data['email'],
            'Password'=>Hash::Create('sha256', $data['password'], HASH_KEY_PASSWORD),
        );
        $sql="select Email,Name from user where Email=:Email and Password=:Password";
        $r_data=$this->db->Select($sql,$_data);
        if(!is_null($r_data))
        {
            Session::init();
            Session::set('email',$r_data[0]["Email"]);           
            Session::set('user',$r_data[0]["Name"]);
            $s_data = array(0 => strtoUpper(Session::get('user')),1 => 'true');
            echo json_encode($s_data);
        }
        else
        {
            $s_data = array(0 => 'invalid credentials',1 => 'false');
            echo json_encode($s_data);
        }
    }
    
    public function New_user($data)
    {
        
        
        $_data=array(
            'Email'=>$data['email'],
            'Password'=>Hash::Create('sha256', $data['password'], HASH_KEY_PASSWORD),
        );
        $sql="select * from user where email=:Email and Passwor=:Password";
        $r_data=$this->db->Select($sql,$_data);
        if(!is_null($r_data)){
            $s_data = array(0 => 'email or mobile already registered',1 => 'false');            
            echo json_encode($s_data);
        }
        else
        {
            $i_data=array(
                'Name'=>$data['name'],
                'Email'=>$data['email'],
                'Mobile'=>$data['mobile'],
                'Password'=>Hash::Create('sha256', $data['password'], HASH_KEY_PASSWORD),
            );
            $this->db->Insert('user',$i_data);
            Session::init();
            Session::set('user',$data['name']);
            Session::set('email',$data["email"]);
            Session::set('logged','true');
            $s_data = array(0 => strtoUpper(Session::get('user')),1 => 'true');
            echo json_encode($s_data);
                        
        }
    }
    
    public function Update_admin_profile($data)
    {
        $addr=$data['state']." ".$data['city']." ".$data['pincode'];
        $_data=array(
            'Name'=>$data['name'],
            'Email'=>$data['email'],
            'Mobile'=>$data['mobile'],
            'DOB'=>$data['dob'],
            'Gender'=>$data['gender'],
            'Address'=>$addr,
            //'Password'=>Hash::Create('sha256', $data['password'], HASH_KEY_PASSWORD)
        );
        $id=Session::get('id');
        $this->db->Update('admin',$_data,$id);
        Session::set('email',$_data['Email']);
        Session::set('user',$_data['Name']);
        $s_data=array(
            'name'=>Session::get('user'),
            'email'=>Session::get('email'),
            'mobile'=>$_data['Mobile'],
            'address'=>$addr,
            'gender'=>$_data['Gender'],
            'dob'=>$_data['DOB'],
            'succ'=>"Successfully Updated"
        );
        echo json_encode($s_data);
    }

    public function Check_email()
    {
        $sql="select * from user where Email=:Email";
        $_data=$this->db->Select($sql,array(':Email'=>$_POST['email']));
        if(sizeof($_data)>0)
        {
//            $to=$_POST['email'];
//            $sub="Reset your Ekart password";
//            $msg="Click Here To Reset Your Password\n\n<a href='". URL. "Home/Reset_password?p=".$_POST['email']."'></a>\n\n";
//            $headers  = 'MIME-Version: 1.0' . "\r\n";
//            $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
//            mail($to, $sub, $msg,$headers);     
            $email=$_POST['email'];
            $email= explode('@', $email);
            echo json_encode(array('cond'=>true,'email'=>$email[1]));
        }
        else
            echo json_encode(array('cond'=>false));
    }
}?>