<?php
class Home_Model extends Model
{
    function __construct() 
    {
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
    public function Deal_ofday()
    {
        $sql="select product.Product_id,product.Name,brand.Brand,product.Price,product.Offer,product.Rating,images.Main_image from product,brand,images where product.Brand_id=brand.brand_id and product.Product_id=images.Product_id order by Sold_quantity desc limit 8";
        $data=array();
        $_data=$this->db->Select($sql,$data);
        $s_data=array();
        if(!is_null($_data)){        
            $s_data=$this->Arrange($_data);
        }
        return ($s_data);
    }
    
    public function Best_offers()
    {
        $sql="select product.Product_id,product.Name,brand.Brand,product.Price,product.Offer,product.Rating,images.Main_image from product,brand,images where product.Brand_id=brand.brand_id and product.Product_id=images.Product_id order by Offer desc limit 8";
        $data=array();
        $_data=$this->db->Select($sql,$data);
        $s_data=array();
        if(!is_null($_data)){        
            $s_data=$this->Arrange($_data);
        }
        return ($s_data);
    }
    
    public function Trending()
    {
        $sql="select product.Product_id,product.Name,brand.Brand,product.Price,product.Offer,product.Rating,images.Main_image from product,brand,images where product.Brand_id=brand.brand_id and product.Product_id=images.Product_id order by Offer,Sold_quantity desc limit 8";
        $data=array();
        $_data=$this->db->Select($sql,$data);
        $s_data=array();
        if(!is_null($_data)){        
            $s_data=$this->Arrange($_data);
        }
        return ($s_data);
    }
    
    
    public function Footwear()
    {
        $sq="select Sub_cat_id from sub_cat where Sub_cat =:sub_cat";
        $sub_cat= $this->db->Select($sq, array(':sub_cat'=>'Footwear'));
        $id="";
        foreach ($sub_cat as $value) {
            $id = $id.$value["Sub_cat_id"].',';
        }
        $id= rtrim($id, ',');
        $sql="select product.Product_id,product.Name,brand.Brand,product.Price,product.Offer,product.Rating,"
                . "images.Main_image from product,brand,images where brand.Sub_cat_id in (".$id.") and product.Product_id=images.Product_id and product.Brand_id=brand.brand_id limit 8";
        
        $_data=$this->db->Select($sql,array());
        $s_data=array();
        if(!is_null($_data)){        
            $s_data=$this->Arrange($_data);
        }
        return ($s_data);
    }
    public function Kitchen()
    {
        $sq="select Sub_cat_id from sub_cat where Sub_cat =:sub_cat";
        $sub_cat= $this->db->Select($sq, array(':sub_cat'=>'Kitchen Appliances'));
        $id="";
        foreach ($sub_cat as $value) {
            $id = $id.$value["Sub_cat_id"].',';
        }
        $id= rtrim($id, ',');
        $sql="select product.Product_id,product.Name,brand.Brand,product.Price,product.Offer,product.Rating,"
                . "images.Main_image from product,brand,images where brand.Sub_cat_id in (".$id.") and product.Product_id=images.Product_id and product.Brand_id=brand.brand_id limit 8";
        
        $_data=$this->db->Select($sql,array());
        $s_data=array();
        if(!is_null($_data)){        
            $s_data=$this->Arrange($_data);
        }
        return ($s_data);
    }
    public function Furnishing()
    {
        $sq="select Sub_cat_id from sub_cat where Sub_cat in ('Furniture','Furnishing')";
        $sub_cat= $this->db->Select($sq, array());
        $id="";
        foreach ($sub_cat as $value) {
            $id = $id.$value["Sub_cat_id"].',';
        }
        $id= rtrim($id, ',');
        $sql="select product.Product_id,product.Name,brand.Brand,product.Price,product.Offer,product.Rating,"
                . "images.Main_image from product,brand,images where brand.Sub_cat_id in (".$id.") and product.Product_id=images.Product_id and product.Brand_id=brand.brand_id limit 8";
        
        $_data=$this->db->Select($sql,array());
        $s_data=array();
        if(!is_null($_data)){        
            $s_data=$this->Arrange($_data);
        }
        return ($s_data);
    }
    public function Smart()
    {
        $sq="select Sub_cat_id from sub_cat where Sub_cat=:sub_cat";
        $sub_cat= $this->db->Select($sq, array(':sub_cat'=>'Mobiles'));
        $id="";
        foreach ($sub_cat as $value) {
            $id = $id.$value["Sub_cat_id"].',';
        }
        $id= rtrim($id, ',');
        $sql="select product.Product_id,product.Name,brand.Brand,product.Price,product.Offer,product.Rating,"
                . "images.Main_image from product,brand,images where brand.Sub_cat_id in (".$id.") and product.Product_id=images.Product_id and product.Brand_id=brand.brand_id limit 8";
        
        $_data=$this->db->Select($sql,array());
        if(!is_null($_data)){        
            $s_data=$this->Arrange($_data);
        }
        return ($s_data);
    }
    public function Recent_view()
    {
        $sql="select product.Product_id,product.Name,brand.Brand,product.Price,product.Offer,product.Rating,images.Main_image from product,brand,images where product.Brand_id=brand.brand_id and product.Product_id=images.Product_id and Email=:Email limit 8";
        $data=array(':Email'=>'Email');
        $_data=$this->db->Select($sql,$data);
        $s_data=array();
        if(!is_null($_data)){
            $s_data=$this->Arrange($_data);
        }
        return ($s_data);
    }
    public function Arrange($_data)
    {
        $i=0;
        foreach($_data as $value) {
           $s_data[$i]= array(
               'id'=>$value['Product_id'],
               'Name'=>$value['Name'],
               'Brand'=>$value['Brand'],
               'Price'=>$value['Price'],
               'Current_price'=>intval($value['Price']-(($value['Offer']*$value['Price'])/100)),
               'Rating'=>$value['Rating'],
               'Image'=>$value['Main_image']
            );
           $i++;
        }
        return $s_data;
    }
    public function Cart()
    {
        Session::init();
        $email=Session::get('email');
        if(isset($email)){
            $sql="select * from cart where Email=:Email";
            $_data=array(':Email'=>$email);
            $r_data=$this->db->Select($sql,$_data);
            //print_r($r_data);
            return sizeof($r_data);
        }
        else
        {
            return 0;
        }
    }
    public function Suggestion($data)
    {
        $sql="select Name from product where Name like '$data%' limit 4";
        $_data=$this->db->Select($sql,array());
        echo json_encode($_data);
    }
}
?>