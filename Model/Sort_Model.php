<?php
    class Sort_Model extends Model {

        function __construct() {
        parent::__construct();
    }
    public function Select_city($data)
    {
        $sql="select distinct City from state where State=:State";
        $_data=array(
            ':State'=>$data
        );
        $r_data=$this->db->Select($sql,$_data);
        echo json_encode($r_data);
    }

    public function Sort_pincode($data)
    {
        $sql="select user.Name,user.Email,user.Mobile,address.State,address.City,address.Pincode from user,address where address.Pincode=".$data." and user.Email=address.Email";
        $_data=array();
        $r_data=$this->db->Select($sql,$_data);
        echo json_encode($r_data);
    }
    public function Search_email_mobile($data)
    {
        $sql="select user.Name,user.Email,user.Mobile,address.State,address.City,address.Pincode from user,address where USER.Email='".$data."' or user.Mobile='".$data."' and USER.Email=address.Email ";
        $_data=array();
        $r_data=$this->db->Select($sql,$_data);
        echo json_encode($r_data);
    }
    
    public function Select_customer_bycity($data)
    {
        $sql="select user.Name,user.Email,user.Mobile,address.State,address.City,address.Pincode from user,address where address.City='".$data."' and USER.Email=address.Email ";
        $_data=array();
        $r_data=$this->db->Select($sql,$_data);
        echo json_encode($r_data);
    }
    public function Search_employee($data)
    {
        $sql="select Admin_id,Name,Email,Mobile,Gender,Date_joined,Role,DOB from admin where Email=:Email or Mobile=:Mobile";
        $_data=array(
            ':Email'=>$data,
            'Mobile'=>$data
        );
        $r_data=$this->db->Select($sql,$_data);
        if(!is_null($r_data)){
            echo json_encode($r_data);
        }
        else{
            echo json_encode(array(0=>array("Name"=>"No data found")));
        }
    }
    
    public function Select_sub_cat($data)
    {
        $sql="select  Sub_cat,Sub_cat_id from sub_cat where Cat_id=:Cat_id";
        $_data=array(':Cat_id'=>$data);
        $r1_data=$this->db->Select($sql,$_data);
        $id="";
        foreach ($r1_data as $value)
        {
            $id=$id.$value['Sub_cat_id'].",";
        }
        $id= rtrim($id,' , ');
        $sql1="select brand_id from brand where Sub_cat_id in (".$id.")";
        //echo $sql1;
        $sth=$this->db->prepare($sql1);
        $sth->setFetchMode(PDO::FETCH_ASSOC);
        $sth->execute();
        $dt=$sth->fetchall();
        //print_r($dt);
        $id1="";
        foreach ($dt as $value)
        {
            $id1=$id1.$value['brand_id'].",";
        }
        $id1= rtrim($id1, ' , ');
        $sql2="select product.Name,product.Rating,product.Price,product.Offer,product.Quantity from product where Brand_id in (".$id1.")";
        $sth=$this->db->prepare($sql2);
        $sth->setFetchMode(PDO::FETCH_ASSOC);
        $sth->execute();
        $r2_data=$sth->fetchall();
        //print_r($r2_data);
        $s_data=array(
            'sub_cat'=>$r1_data,
            'product'=>$r2_data
        );
        echo json_encode($s_data);
    }

    public function Select_brand($data)
    {
        $sql="select  brand_id,Brand from brand where Sub_cat_id=:Category";
        $_data=array(':Category'=>$data);
        $r1_data=$this->db->Select($sql,$_data);
        //print_r($r1_data);
        $id="";
        foreach($r1_data as $value){
            $id=$id.$value['brand_id'].",";
        }
        $id=rtrim($id,' , ');
        $sql2="select Name,Rating,Price,Offer,Quantity from product where Brand_id in (:id)";
        $_data2=array(
            ':id'=>$id
        );
        $r2_data=$this->db->Select($sql2,$_data2);
        //print_r($r2_data);
        $s_data=array(
            'bd'=>$r1_data,
            'product'=>$r2_data
        );
        echo json_encode($s_data);
    }
    
     public function Select_product_bybrand($data)
    {
        $sql="select Name,Rating,Price,Offer,Quantity from product where Brand_id=:Brand";
        $_data=array(
            ':Brand'=>$data
        );
        $r_data=$this->db->Select($sql,$_data);
        //print_r($r_data);
        echo json_encode($r_data);
    }
    
}
?>