<?php
    class Cart_Model extends Model {

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
    public function Cart_data($data)
    {
        
            $sql="select * from cart where Email=:Email";
            $_data=array(':Email'=>$data);
            $r_data=$this->db->Select($sql,$_data);
            //print_r($r_data);
            return sizeof($r_data);
        
    }
    
    public function Add_to_cart($data)
    {
        
        $sql="select * from cart where Product_id=:Product_id and Email=:Email";
        $_data=$this->db->Select($sql,array('Product_id'=>$data['id'],':Email'=>$data['email']));
        if(sizeof($_data)>0)
        {
            echo json_encode(array('msg'=>"Product_already_added",'cond'=>false));
        }
        else
        {
            $i_data=array(
                'Product_id'=>$data['id'],
                'Email'=>$data['email'],
                'Quantity'=>$data['quantity']
            );
            $this->db->Insert('cart',$i_data);
            echo json_encode(array('msg'=>"one item added to your cart",'cond'=>true));
        }
    }
    public function All_contents()
    {
        Session::init();
        $sql="select cart.id,product.Name,product.Price,product.Offer,product.Rating,cart.Quantity,images.Main_image from product,cart,images where cart.Email=:Email and cart.Product_id=product.Product_id and product.Product_id=images.Product_id";
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
    
    public function Remove_from_cart($data)
    {
        $where="id=".$data;
        $this->db->Delete('cart',$where);
        echo json_encode("Removed");
    }
    public function Add_more($data)
    {
//        $_data=array(
//            'Quantity'=>'Qunatity+1'
//        );
//        $where="id=".$data;
        $sql="update cart set Quantity=Quantity+1 where id=".$data;
        $sth=$this->db->prepare($sql);
        $sth->execute();
        //$this->db->Update('cart',$_data,$where);
        echo json_encode("saved");
    }
    
}
?>