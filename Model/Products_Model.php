<?php
    class Products_Model extends Model {
    
    public $product=array();
        
    function __construct() {
            parent::__construct();
    }
    public function Fetch_cat($data=false)
    {
       if($data!=false){
            $sub_cat=$this->db->Select("select * from category where Cat_id=:Cat_id",array(':Cat_id'=>$data));
            return($sub_cat);            
        }
        else
        {
            $cat=$this->db->Select("select * from category ",array());
            return($cat);
        }
       
    }
    public function Fetch_sub_cat($data=false)
    {
        if($data){
            $sub_cat=$this->db->Select("select * from sub_cat where Cat_id=:id",array(':id'=>$data));
            return ($sub_cat);
        }
        else
        {
            $sub_cat=$this->db->Select("select * from sub_cat",array());
            return($sub_cat);
        }
    }
    public function Fetch_brand($data=false)
    {
        if($data!=false)
        {
            $cat=$this->db->Select("select * from brand where Sub_cat_id in ($data)",array());
            return($cat); 
        }
        else{
            $cat=$this->db->Select("select * from brand",array());
            return($cat);
        }
       
    }
    public function Select_product($data,$order_by=false)
    {
        if($order_by)
        {
            $sql="select product.Product_id,product.Name,brand.Brand,brand.brand_id,product.Price,product.Offer,product.Rating,images.Main_image from product,brand,images where brand.brand_id in ($data) and product.Product_id=images.Product_id and product.Brand_id=brand.brand_id  order by ".$order_by;
            $_data=$this->db->Select($sql,array());
            return $_data;
        }
        else
        {
            $sql="select product.Product_id,product.Name,brand.Brand,brand.brand_id,product.Price,product.Offer,product.Rating,images.Main_image from product,brand,images where product.Brand_id=brand.brand_id and product.Product_id=images.Product_id and brand.brand_id=:id limit 8";
            $_data=$this->db->Select($sql,array(':id'=>$data));
            return $_data;
        }
    }
    public function product($brand,$order=false)
    {
        if($order)
        {
            $_data=$this->Select_product($brand,$order);
            if(!is_null($_data)){
                $this->Arrange($_data);
            }
            return;
        }
        else
        {
            foreach ($brand as $id)
            {      
                $_data=$this->Select_product($id['brand_id']);
                if(!is_null($_data)){
                    $this->Arrange($_data);
                }
            } 
            return;
        }
        
    }
    public function Arrange($_data)
    {
        foreach($_data as $temp)
        {
           $this->product[]= array(
               'id'=>$temp['Product_id'],
               'Name'=>$temp['Name'],
               'Brand'=>$temp['Brand'],
               'Price'=>$temp['Price'],
               'Current_price'=> intval($temp['Price']-(($temp['Offer']*$temp['Price'])/100)),
               'Rating'=>$temp['Rating'],
               'Image'=>$temp['Main_image']
            );
        }
        return;
    }
    public function Product_by_cat($data){
        $sub=$this->Fetch_sub_cat($data);
         $id="";
            foreach ($sub as $value) {
                $id=$id.$value['Sub_cat_id'].",";
            }
            $id= rtrim($id, ",");
            $brand=$this->Fetch_brand($id);
            if(!empty($brand)){
                $this->product($brand);
            }
        return $this->product;
    }
    
    public function Product_by_subcat($data){
        $brand=$this->Fetch_brand($data);
        if(!empty($brand)){
            $this->product($brand);
        }
        return $this->product;
    }
    
    public function Product_by_brand($data){
        $this->product(array(array('brand_id'=>$data)));  
        return $this->product;
    }
    
    public function Best_deals($data)
    {
        $sql="select product.Product_id,product.Name,brand.Brand,product.Price,product.Offer,product.Rating,images.Main_image from product,brand,images where product.Brand_id=brand.brand_id and product.Product_id=images.Product_id order by '".$data."' desc limit 40";
        $_data=$this->db->Select($sql,array());
        if(!is_null($_data)){
            $this->Arrange($_data);
        }
        return ($this->product);
    }
    public function Best_offers()
    {
        $sql="select product.Product_id,product.Name,product.Brand,product.Price,product.Offer,product.Rating,images.Main_image from product,images where product.Product_id=images.Product_id order by Offer desc limit 40";
        $data=array();
        $_data=$this->db->Select($sql,$data);
        if(!is_null($_data)){
            $this->Arrange($_data);
        }
        return ($this->product);        
    }
    public function Trending_items()
    {
        $sql="select product.Product_id,product.Name,product.Brand,product.Price,product.Offer,product.Rating,images.Main_image from product,images where product.Product_id=images.Product_id order by Offer and Sold_quantity desc limit 40";
        $data=array();
        $_data=$this->db->Select($sql,$data);
        if(!is_null($_data)){
            $this->Arrange($_data);
        }
        return ($this->product);
    }
    public function Footwears()
    {
        $sq="select Sub_cat_id from sub_cat where Sub_cat =:sub_cat";
        $sub_cat= $this->db->Select($sq, array(':sub_cat'=>'Footwear'));
        $id="";
        foreach ($sub_cat as $value) {
            $id = $id.$value["Sub_cat_id"].',';
        }
        $id= rtrim($id, ',');
        $sql="select product.Product_id,product.Name,brand.Brand,product.Price,product.Offer,product.Rating,"
                . "images.Main_image from product,brand,images where brand.Sub_cat_id in (".$id.") and product.Product_id=images.Product_id "
                . "and product.Brand_id=brand.brand_id limit 40";
        
        $_data=$this->db->Select($sql,array());
        if(!is_null($_data)){
            $this->Arrange($_data);
        }
        return ($this->product);
    }
    public function Kitchen_appliances()
    {
        $sq="select Sub_cat_id from sub_cat where Sub_cat =:sub_cat";
        $sub_cat= $this->db->Select($sq, array(':sub_cat'=>'Kitchen Appliances'));
        $id="";
        foreach ($sub_cat as $value) {
            $id = $id.$value["Sub_cat_id"].',';
        }
        $id= rtrim($id, ',');
        $sql="select product.Product_id,product.Name,brand.Brand,product.Price,product.Offer,product.Rating,"
                . "images.Main_image from product,brand,images where brand.Sub_cat_id in (".$id.") and product.Product_id=images.Product_id "
                . "and product.Brand_id=brand.brand_id limit 40";
        
        $_data=$this->db->Select($sql,array());
        if(!is_null($_data)){
            $this->Arrange($_data);
        }
        return ($this->product);
    }
    public function Home_furnishing()
    {
        $sq="select Sub_cat_id from sub_cat where Sub_cat in ('Furniture','Furnishing')";
        $sub_cat= $this->db->Select($sq, array());
        $id="";
        foreach ($sub_cat as $value) {
            $id = $id.$value["Sub_cat_id"].',';
        }
        $id= rtrim($id, ',');
        $sql="select product.Product_id,product.Name,brand.Brand,product.Price,product.Offer,product.Rating,"
                . "images.Main_image from product,brand,images where brand.Sub_cat_id in (".$id.") and product.Product_id=images.Product_id "
                . "and product.Brand_id=brand.brand_id limit 40";
        
        $_data=$this->db->Select($sql,array());
        if(!is_null($_data)){
            $this->Arrange($_data);
        }
        return ($this->product);
    }
    public function Smartphones()
    {
        $sq="select Sub_cat_id from sub_cat where Sub_cat =:sub_cat";
        $sub_cat= $this->db->Select($sq, array(':sub_cat'=>'Mobiles'));
        $id="";
        foreach ($sub_cat as $value) {
            $id = $id.$value["Sub_cat_id"].',';
        }
        $id= rtrim($id, ',');
        $sql="select product.Product_id,product.Name,brand.Brand,product.Price,product.Offer,product.Rating,"
                . "images.Main_image from product,brand,images where brand.Sub_cat_id in (".$id.") and product.Product_id=images.Product_id "
                . "and product.Brand_id=brand.brand_id limit 40";
        
        $_data=$this->db->Select($sql,array());
        if(!is_null($_data)){
            $this->Arrange($_data);
        }
        return ($this->product);
    }
    
    public function List_details($data)
    {
        $sql="select product.Product_id,product.Name,brand.Brand,product.Price,product.Offer,product.Rating,images.Main_image from product,brand,images where product.Product_id=:Product_id and product.Brand_id=brand.Brand_id and product.Product_id=images.Product_id";
        $_data=array(':Product_id'=>$data);
        $r_data=$this->db->Select($sql,$_data);
        if(!is_null($r_data)){
            $this->Arrange($r_data);
        }
        return ($this->product);
    }
    public function Select_all_images($data)
    {
        $sql="Select * from images where Product_id=:id";
        $img=$this->db->Select($sql,array(':id'=>$data));
        return $img;
    }
    public function Select_ratings($data)
    {
        $sql="select Email,Rating,Feed from rating where Product_id=:Product_id";
        $_data=array(':Product_id'=>$data);
        $r_data=$this->db->Select($sql,$_data);
        $i=0;
        $s_data=array();
        if(!is_null($r_data)){
        foreach($r_data as $value) {
            $_name=$this->db->Select("select Name from user where Email=:Email",array(':Email'=>$value['Email']));
           $s_data[$i]= array(
               'Email'=>$_name[0]['Name'],
               'Feed'=>$value['Feed'],
               'Rating'=>$value['Rating'],
            );
           $i++;
        }}
    return ($s_data);
    }
    public function Similar_products($data)
    {
        $sq="select Brand_id from product where Product_id=:Product_id";
        $d=array(':Product_id'=>$data);
        $ret=$this->db->Select($sq,$d);
        $sql="select product.Product_id,product.Name,brand.Brand,product.Price,product.Offer,product.Rating,images.Main_image from product,brand,images where product.Brand_id=brand.brand_id and product.Product_id=images.Product_id and brand.brand_id=:Brand";
        $_data=array(':Brand'=>$ret[0]['Brand_id']);
        $r_data=$this->db->Select($sql,$_data);
        if(!is_null($r_data)){
            $this->Arrange($r_data);
        }
        return ($this->product);
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
    
    
   public function Sort_Product_by_cat($cat,$order)
   {
        $sub=$this->Fetch_sub_cat($cat);
        if(!empty($sub)){
            $id="";
            foreach ($sub as $value) {
                $id=$id.$value['Sub_cat_id'].",";
            }
            $id= rtrim($id, ",");
            $brand=$this->Fetch_brand($id);
            $id1="";
            foreach ($brand as $sub) {
                $id1=$id1.$sub['brand_id'].",";
            }
            $id1= rtrim($id1, ",");
            if(!empty($brand)){
                $this->product($id1,$order);
            }
        }
        echo json_encode($this->product);
   }
   public function Sort_Product_by_subcat($cat,$order)
   {
        $brand=$this->Fetch_brand($cat);
        $id1="";              
        foreach ($brand as $sub) {
            $id1=$id1.$sub['brand_id'].",";
        }
        $id1= rtrim($id1, ",");
        if(!empty($brand)){
            $this->product($id1,$order);
        }
        echo json_encode($this->product);
   }
   public function Sort_Product_by_brand($cat,$order)
   {
        $this->product($cat,$order);
        echo json_encode($this->product);
   }
   public function Product_by_name($data)
   {
       $sql="select product.Product_id,product.Name,product.Price,product.Offer,product.Rating,images.Main_image,brand.Brand from product,images,brand "
               . "where product.Product_id=images.Product_id and product.Brand_id=brand.brand_id and Product.Name like '$data%'";
       $_data=$this->db->Select($sql,array());
       if(sizeof($_data)>0){
            $this->Arrange($_data);
            return($this->product);
       }
       else
       {
            return ("No Product Found");
       }
       
   }

}
?>