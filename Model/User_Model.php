<?php
    class User_Model extends Model {

        function __construct() {
            parent::__construct();
    }
    public function Fetch_cat()
    {
       $cat=$this->db->Select("select * from category",array());
       return ($cat);
       
    }
    public function Fetch_sub_cat()
    {
       $sub_cat=$this->db->Select("select * from sub_cat",array());
       return($sub_cat);
    }
    public function Fetch_brand()
    {
       $cat=$this->db->Select("select * from brand",array());
       return($cat);
    }
    public function Cart($data)
    {        
        $sql="select * from cart where Email=:Email";
        $_data=array(':Email'=>$data);
        $r_data=$this->db->Select($sql,$_data);
        return array('size'=> sizeof($r_data),'data'=>$r_data);
    }
    public function Orders($email,$data=false)
    {
        if($data)
        {
            $sql="select * from orders where Email=:Email and Status=:Status";
            $_data=array(':Email'=>$email,':Status'=>$data);
            $r_data=$this->db->Select($sql,$_data);
            return($r_data);
        }
        else
        {
            $sql=" select * from orders where Email = :Email ";
            $_data=array(':Email'=>$email);
            $r_data=$this->db->Select($sql,$_data);
            return ($r_data);
        }
    }
    public function Select_product($data,$product=false)
    {
        if($product){
            $s_data=array();
            $i=0;
            foreach ($data as $value) {
                $sql="select product.Product_id,product.Name,product.Price,product.Offer,brand.Brand,images.Main_image from product,brand,images where product.Product_id=:Product_id and product.Brand_id=brand.brand_id and product.Product_id=images.Product_id";
                $_data=array(':Product_id'=>$value);
                $r_data=$this->db->Select($sql,$_data);
                $s_data[$i]['id']=$r_data['0']['Product_id'];
                $s_data[$i]['Name']=$r_data[0]['Name'];
                $s_data[$i]['Brand']=$r_data[0]['Brand'];
                $s_data[$i]['Price']= intval($r_data[0]['Price']-(($r_data[0]['Offer'] * $r_data[0]['Price'])/100));
                $s_data[$i]['Quantity']=$product[$i]['Quantity'];
                $s_data[$i]['Order_id']=$product[$i]['Order_id'];
                $s_data[$i]['Order_date']=$product[$i]['Order_date'];
                $s_data[$i]['Shipment_date']=$product[$i]['Shipment_day'];
                $s_data[$i]['Status']=$product[$i]['Status'];
                $s_data[$i]['Image']=$r_data[0]['Main_image'];
                $i++;
            }
            return ($s_data);
        }
        else
        {
            $sql="select product.Product_id,product.Name,product.Price,product.Offer,brand.Brand,images.Main_image "
                    . "from product,brand,images where product.Brand_id=brand.brand_id and product.Product_id=images.Product_id "
                    . "and product.Product_id=:Product_id";
            $r_data=$this->db->Select($sql,array(':Product_id'=>$data));
            $s_data['id']=$r_data['0']['Product_id'];
            $s_data['Name']=$r_data[0]['Name'];
            $s_data['Brand']=$r_data[0]['Brand'];
            $s_data['Price']= intval($r_data[0]['Price']-(($r_data[0]['Offer'] * $r_data[0]['Price'])/100));
            $s_data['Image']=$r_data[0]['Main_image'];
            return($s_data);
        }
    }
    
    public function Select_product_rating($email,$rating)
    {
        $s_data=array();
        $i=0;
        foreach ($email as $value) {
            $sql="select product.Product_id,product.Name,brand.Brand,images.Main_image from product,brand,images where product.Brand_id=brand.brand_id and product.Product_id=images.Product_id and product.Product_id=:Product_id";
            $_data=array(':Product_id'=>$value);
            $r_data=$this->db->Select($sql,$_data);
            $s_data[$i]['id']=$r_data['0']['Product_id'];
            $s_data[$i]['Name']=$r_data[0]['Name'];
            $s_data[$i]['Brand']=$r_data[0]['Brand'];
            $s_data[$i]['Rating']=$rating[$i]['Rating'];
            $s_data[$i]['Feed']=$rating[$i]['Feed'];
            $s_data[$i]['Image']=$r_data[0]['Main_image'];
            $i++;
        }
        return ($s_data);
    }

    public function Select_user($data)
    {
        $sql="select Name,Email,Mobile from user where Email=:Email";
        $_data=array(':Email'=>$data);
        $r_data=$this->db->Select($sql,$_data);
        return $r_data;
    }
    public function Check_ratings($id,$email)
    {
        $s_data=array();
        $i=0;
        //print_r($id);
        foreach ($id as $value) {
            $sql="select * from rating where Product_id=:Product_id and Email=:Email";
            $_data=array(':Product_id'=>$value,':Email'=>$email);
            $r_data=$this->db->Select($sql,$_data);
            $s_data[$i]['id']=$r_data['0']['Product_id'];            
            $i++;
        }
        return($s_data);
    }
    
    
    public function Add_review()
    {
        Session::init();
        $email=Session::get('email');
        $_data=array(
            'Product_id'=>$_POST['prod_id'],
            'Email'=>$email,
            'Feed'=>$_POST['review'],
            'Rating'=>$_POST['rating']
        );
        //print_r($_data);
        $this->db->Insert('rating',$_data);
        echo "saved";
    }
    public function Update_review()
    {
        Session::init();
        $email=Session::get('email');
        $_data=array(
            'Feed'=>$_POST['review'],
            'Rating'=>$_POST['rating']
        );
        //print_r($_data);
        $where="Email='".$email."' and Product_id='".$_POST['prod_id']."'";
        $this->db->Update('rating',$_data,$where);
        echo "Updated";
    }
    public function Delete_review($data)
    {
        Session::init();
        $email=Session::get('email');
       
        //print_r($_data);
        $where="Email='".$email."' and Product_id='".$data."'";
        $this->db->Delete('rating',$where);
        echo "Deleted";
    }
    public function Ratings($email)
    {
        $sql=" select * from rating where Email = :Email ";
        $_data=array(':Email'=>$email);
        $r_data=$this->db->Select($sql,$_data);
        return ($r_data);
    }
    public function Cancel_order($data)
    {
        Session::init();
        $email=Session::get('email');
       
        //print_r($_data);
        $where="Email='".$email."' and Product_id='".$data."'";
        $this->db->Delete('orders',$where);
        echo "Canceled,Visit Again........";
    }
    
    public function Select_address($email)
    {
        $sql="select * from address where Email=:Email";
        $_data=$this->db->Select($sql,array(':Email'=>$email));
        return ($_data);
    }
    public function New_address($data)
    {
        $s_data=array(
            'Email'=>$data['email'],
            'Street'=>$data['street'],
            'Pincode'=>$data['pincode'],
            'City'=>$data['city'],
            'State'=>$data['state']
        );
        $this->db->Insert("address",$s_data);
        $id=$this->Get_add_id($data['email'],$data['pincode']);
        echo json_encode(array('msg'=>"Saved Successfully",'id'=>$id));
    }
    public function Get_add_id($email,$pincode)
    {
        $sql="select Id from address where Email=:Email and Pincode=:Pincode";
        $data=array(':Email'=>$email,':Pincode'=>$pincode);
        $id=$this->db->Select($sql,$data);
        return $id[0]['Id'];
    }
    public function Delete_address($data)
    {
        $this->db->Delete("address","Id='$data'");
        echo json_encode("deleted");
    }
    
    public function Select_mode()
    {
        $data=$this->db->Select("select * from payment ",array() );
        return $data;
    }
    public function All_contents()
    {
        Session::init();
        $sql="select cart.id,product.Name,product.Price,product.Offer,product.Rating,cart.Quantity,images.Main_image from product,cart,images "
                . "where cart.Email=:Email and cart.Product_id=product.Product_id and product.Product_id=images.Product_id";
        $_data=array(':Email'=>Session::get('email'));
        $r_data=$this->db->Select($sql,$_data);
        $i=0;
        $s_data=array();
        if(!is_null($r_data)){
        foreach($r_data as $value) {
           $s_data[$i]= array(
               'id'=>$value['id'],
               'Name'=>$value['Name'],
               'Price'=>$value['Price'],
               'Current_price'=>$value['Price']-(($value['Offer']*$value['Price'])/100),
               'Rating'=>$value['Rating'],
               'Quantity'=>$value['Quantity'],
               'Image'=>$value['Main_image']
            );
           $i++;
        }}
        return ($s_data);
    }
    public function Place_order($email)
    {
        $shipment=date("y-m-d");
        $shipment= explode('-', $shipment);
        
        $data=array(
            'Email'=>$email,
            'Product_id'=>$_POST['product_id'],
            'Order_date'=> date("y-m-d"),
            'Shipment_day'=>$shipment[0].'-'.$shipment[1].'-'.($shipment[2]+5),
            'Payment_id'=>$_POST['payment'],
            'Add_id'=>$_POST['address'],
            'Quantity'=>1
        );
        if($this->db->Insert('orders',$data))
        {
            echo json_encode(array('cond'=>true));
        }
    }
}
?>