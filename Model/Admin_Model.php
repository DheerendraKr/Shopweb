<?php
    class Admin_Model extends Model {

        function __construct() {
        parent::__construct();
    }
    public function Select_pending_orders()
    {
        $sql="select *  from orders where Status=:Status limit 10"; 
        $data=$this->db->Select($sql,array(':Status'=>'Pending'));
        $_data=$this->Arrange_order($data);
        return $_data;
    }
    public function Select_all_orders($r_data=false)
    {
        if($r_data)
        {
            $sql="select *  from orders order by Order_date desc ".$r_data; 
            $data=$this->db->Select($sql,array());
            $_data=$this->Arrange_order($data);
            return $_data;
        }
        else{
            $sql="select *  from orders order by Order_date desc limit 10"; 
            $data=$this->db->Select($sql,array());
            $_data=$this->Arrange_order($data);
            return $_data;
        }
    }
    public function Arrange_order($data)
    {
        $i=0;
        $_data=array();
        foreach ($data as $value) {
            $addr=$this->db->Select("Select * from address where Id=:id",array(':id'=>$value['Add_id']));
            $product=$this->db->Select("Select * from Product where Product_id=:id",array(':id'=>$value['Product_id']));
            $user=$this->db->Select('select * from user where Email=:email',array(':email'=>$value['Email']));
            $image=$this->db->Select("select Main_image from images where Product_id=:id",array(':id'=>$value['Product_id']));
            $pay=$this->db->Select("select * from payment where id=:id",array(':id'=>$value['Payment_id']));
            $brand=$this->db->Select("select Brand from brand where brand_id=:id",array(':id'=>$product[0]['Brand_id']));
            $_data[$i]['Image']=$image[0]['Main_image'];
            $_data[$i]['Name']=$product[0]['Name'];
            $_data[$i]['Brand']=$brand[0]['Brand'];
            $_data[$i]['Email']=$user[0]['Email'];
            $_data[$i]['Mobile']=$user[0]['Mobile'];
            $_data[$i]['Address']=$addr[0]['Street']."|".$addr[0]['Pincode']."|".$addr[0]['City']."|".$addr[0]['State'];
            $_data[$i]['Quantity']=$value['Quantity'];
            $_data[$i]['Payment']=$pay[0]['Type'];
            $_data[$i]['Order']=$value['Order_date'];
            $_data[$i]['Order_no']=$value['Order_id'];
            $_data[$i]['Shipment']=$value['Shipment_day'];
            $_data[$i]['Status']=$value['Status'];            
            $i++;
        }
        return($_data);
    }
    
    public function Profile($data)
    {
        $sql="select * from admin where Admin_id=:id";
        $_data=array(
            ':id'=>$data
        );
        $r_data=$this->db->Select($sql,$_data);
        return $r_data;
    }
    
    public function View_products($cat=false)
    {
        $sql="select * from product where Category=:Category";
        if($cat!=false){
        $data=array(
            ':Category'=>$cat
        );
        }
        else
        {
            $data=array(
                ':Category'=>'Electronics'
            );
        }
        $r_data=$this->db->Select($sql,$data);
        return ($r_data);
    }
    
    public function Save_product($data)
    {
        $_data=array(
            'Name'=>$data['name'],
            'Brand_id'=>$data['brand_id'],
            'Color'=>$data['color'],
            'Price'=>$data['price'],
            'Offer'=>$data['offer'],
            'Quantity'=>$data['quantity']
        );
        if($this->db->Insert('product',$_data))
        {
            $id=$this->Get_product_id($_data);
            echo json_encode(array("msg"=>'product Added Successfully',"id"=>$id));
        }
        else
        {
            echo json_encode(array('msg'=>'product not Added'));
        }
        
    }
    public function Get_product_id($data)
    {
        $sql="Select Product_id from product where Name=:Name and Brand_id=:Brand_id and Color=:Color";
        $_data=array(
            ':Name'=>$data['Name'],
            ':Brand_id'=>$data['Brand_id'],
            ':Color'=>$data['Color']
        );
        $r_data=$this->db->Select($sql,$_data);
        return $r_data[0]['Product_id'];
    }
    
    public function Upload_image()
    {
        $dir1= $_SERVER['DOCUMENT_ROOT']."/Shopping/Public/Images/Product/";
        $file1=$dir1.$_FILES["main_image"]["name"];
        move_uploaded_file($_FILES["main_image"]["tmp_name"], $file1);
        $dir2=$_SERVER['DOCUMENT_ROOT']."/Shopping/Public/Images/Product/";
        $file2=$dir2.$_FILES["image2"]["name"];
        move_uploaded_file($_FILES["image2"]["tmp_name"], $file2);
        $dir3=$_SERVER['DOCUMENT_ROOT']."/Shopping/Public/Images/Product/";
        $file3=$dir3.$_FILES["image3"]["name"];
        move_uploaded_file($_FILES["image3"]["tmp_name"], $file3);
        $dir4=$_SERVER['DOCUMENT_ROOT']."/Shopping/Public/Images/Product/";
        $file4=$dir4.$_FILES["image4"]["name"];
        move_uploaded_file($_FILES["image4"]["tmp_name"], $file4);
        $data=array(
            "Product_id"=>$_POST['product_id'],
            "Main_image"=>$_FILES["main_image"]["name"],
            "Image2"=>$_FILES["image2"]["name"],
            "Image3"=>$_FILES["image3"]["name"],
            "Image4"=>$_FILES["image4"]["name"]
        );
        if($this->db->Insert("images",$data))
        {
            echo json_encode("Uploaded Successfully");
        }
        else
        {
            echo json_encode("Failed to upload Image");
        }
    }
    






    public function Customer_details()
    {
        $sql="select * from user where State";
    }
    public function Select_state()
    {
        $sql="select distinct State from state";
        $sth=$this->db->prepare($sql);
        $sth->setFetchMode(PDO::FETCH_ASSOC);
        $sth->execute();
        $data=$sth->fetchAll();
        return $data;
    }
    public function Select_cat($data=false)
    {
        if($data==false){
            $sql="select * from category";
            $sth=$this->db->prepare($sql);
            $sth->setFetchMode(PDO::FETCH_ASSOC);
            $sth->execute();
            $data=$sth->fetchAll();
            return $data;
        }
        else
        {
            $sql="select Cat_id from category where Category=:Category";
            $_data=array(':Category'=>$data);
            $r_data=$this->db->Select($sql,$_data);
            return $r_data;
        }
    }
    public function Select_sub_cat($data=false)
    {
        if($data==false){
            $sql="select Sub_cat_id,Sub_cat from sub_cat";
            $sth=$this->db->prepare($sql);
            $sth->setFetchMode(PDO::FETCH_ASSOC);
            $sth->execute();
            $data=$sth->fetchAll();
            return $data;
        }
        else
        {
            $sql="select Sub_cat_id,Sub_cat from sub_cat where Cat_id=:Cat_id";
            $_data=array(':Cat_id'=>$data);
            $r_data=$this->db->Select($sql,$_data);
            //print_r($r_data);
            echo json_encode($r_data);
        }
    }
    public function Select_brand($data)
    {
        $sql="select brand_id,Brand from brand where Sub_cat_id='$data'";
        $sth=$this->db->prepare($sql);
        $sth->setFetchMode(PDO::FETCH_ASSOC);
        $sth->execute();
        $_data=$sth->fetchAll();
        echo json_encode($_data);
    }
    public function Delete_cat($data)
    {
        $sql="delete from category where Cat_id='$data'";
        $sth=$this->db->prepare($sql);
        $sth->execute();
    }
    public function Delete_sub_cat($data)
    {
        $this->db->Delete('sub_cat',"Sub_cat_id='$data'");
        $this->db->Delete('brand',"Sub_cat_id='$data'");
    }
    public function Delete_brand($data)
    {
        $sql="delete from brand where brand_id='$data'";
        $sth=$this->db->prepare($sql);
        $sth->execute();
        echo json_encode("deleted");
    }
    public function Save_cat($data)
    {
        $_data=array('Category'=>$data);
        $this->db->Insert('Category',$_data);
        $id=$this->Select_cat($data);
        echo json_encode($id[0]['Cat_id']);
        
    }
    public function Save_sub_cat($data)
    {
        $_data=array('Sub_cat'=>$data['sub_cat'],
                'Cat_id'=>$data['cat_id']
            );
        $this->db->Insert('sub_cat',$_data);
        echo json_encode("added successfully");
    }
    public function Save_brand($data)
    {
        $_data=array('Brand'=>$data['brand'],
                'Sub_cat_id'=>$data['sub_cat_id']
            );
        $this->db->Insert('brand',$_data);
    }
    
    public function Select_recent_orders()
    {
        $sql="select * from orders order by Order_date where 1";        
    }
    
}


?>