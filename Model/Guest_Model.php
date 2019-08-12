<?php
    class Guest_Model extends Model {

        function __construct() {
        parent::__construct();
    }
    public function Select_product($data,$product=false)
    {
        if($product){
            $s_data=array();
            $i=0;
            foreach ($data as $value) {
                $sql="select product.Product_id,product.Name,product.Price,product.Offer,brand.Brand,images.Main_image from product,brand,images"
                    . " where product.Brand_id=brand.brand_idand images.Product_id=product.Product_id "
                    . "and product.Product_id=:Product_id";
                $_data=array(':Product_id'=>$value);
                $r_data=$this->db->Select($sql,$_data);
                $s_data[$i]['id']=$r_data['0']['Product_id'];
                $s_data[$i]['Name']=$r_data[0]['Name'];
                $s_data[$i]['Image']=$r_data[0]['Main_image'];
                $s_data[$i]['Brand']=$r_data[0]['Brand'];
                $s_data[$i]['Price']= intval($r_data[0]['Price']-(($r_data[0]['Offer'] * $r_data[0]['Price'])/100));
                $s_data[$i]['Quantity']=$product[$i]['Quantity'];
                $s_data[$i]['Order_id']=$product[$i]['Order_id'];
                $s_data[$i]['Order_date']=$product[$i]['Order_date'];
                $s_data[$i]['Shipment_date']=$product[$i]['Shipment_day'];
                $s_data[$i]['Status']=$product[$i]['Status'];
                $i++;
            }
            return ($s_data);
        }
        else
        {
            $sql="select product.Product_id,product.Name,product.Price,product.Offer,brand.Brand,images.Main_image"
                . " from product,brand,images where product.Brand_id=brand.brand_id and "
                . "product.Product_id=images.Product_id and product.Product_id=:Product_id";
            $r_data=$this->db->Select($sql,array(':Product_id'=>$data));
            $s_data['id']=$r_data['0']['Product_id'];
            $s_data['Name']=$r_data[0]['Name'];
            $s_data['Image']=$r_data[0]['Main_image'];
            $s_data['Brand']=$r_data[0]['Brand'];
            $s_data['Price']= intval($r_data[0]['Price']-(($r_data[0]['Offer'] * $r_data[0]['Price'])/100));
            return ($s_data);
        }
    }
    public function Select_mode()
    {
        $data=$this->db->Select("select * from payment ",array() );
        return $data;
    }
    public function Details()
    {
        Session::init();
        $data=array(
            'Name'=>$_POST['name'],
            'Email'=>$_POST['email'],
            'Mobile'=>$_POST['mobile']
        );
        $this->db->Insert("guest",$data);
        echo json_encode(array('name'=>$_POST['name'],'mob'=>$_POST['mobile'],'email'=>$_POST['email']));
    }
    public function Add_address($data){
        $_data=array(
            'Email'=>$data,
            'Street'=>$_POST['street'],
            'Pincode'=>$_POST['pincode'],
            'City'=>$_POST['city'],
            'State'=>$_POST['state']
        );
        $this->db->Insert("address",$_data);
        $id=$this->Get_add_id($data,$_POST['pincode']);
        echo json_encode(array('msg'=>"Saved Successfully",'id'=>$id));
    }
    public function Get_add_id($email,$pincode)
    {
        $sql="select Id from address where Email=:Email and Pincode=:Pincode";
        $data=array(':Email'=>$email,':Pincode'=>$pincode);
        $id=$this->db->Select($sql,$data);
        return $id[0]['Id'];
    }
    public function Place_order()
    {
        $shipment=date("y-m-d");
        $shipment= explode('-', $shipment);
        
        $data=array(
            'Email'=>$_POST['email'],
            'Product_id'=>$_POST['product_id'],
            'Order_date'=> date("y-m-d"),
            'Shipment_day'=>$shipment[0].'-'.$shipment[1].'-'.($shipment[2]+5),
            'Payment_id'=>$_POST['payment'],
            'Add_id'=>$_POST['address'],
            'Quantity'=>1
        );
        //print_r($data);
        if($this->db->Insert('orders',$data))
        {
            echo json_encode(array('cond'=>true));
        }
    }

}
?>