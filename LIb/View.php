<?php
class View 
{
    function __construct() 
    {
        
    }
    public function Render_Home_Page($name)
    {
        include 'View/Header.php';        
        include 'View/'.$name.'.php';
        include 'View/Home/Deal_of_day.php';
        include 'View/Home/Offer_for_you.php';
        include 'View/Home/Trending.php';
        include 'View/Home/Footwear.php';
        include'View/Home/Home_furnishing.php';
        include 'View/Home/Kitchen_appliances.php';
        include 'View/Home/Smartphones_watches.php';
        include 'View/Home/Recently_view.php';
        include 'View/Footer.php';
    }
    public function Render_forgotpassword_Page($name)
    {
        include 'View/Header.php';        
        include 'View/'.$name.'.php';
        include 'View/Footer.php';   
    }


    public function Render_Error_Page($name)
    {
        include 'view/'.$name.'.php';
    }
     public function Render_admin_page($name)
    {
        include 'view/Admin/header.php';
        include 'view/'.$name.'.php';
       // include 'view/Admin/footer.php';
        //echo $name;
    }
    public function Render($name)
    {
        
        include 'View/'.$name.'.php';
        //echo $name;
    }
    public function Render_products_list($name)
    {
        include 'View/Header.php';
        include 'View/'.$name.'.php';
        include 'View/Products/Similar_products.php';
        include 'View/Footer.php';
        //echo $name;
    }
    public function Render_products($name)
    {
        include 'View/Header.php';
        include 'View/'.$name.'.php';
        include 'View/Footer.php';
        //echo $name;
    }
    public function Render_user($name)
    {
        include 'View/User/User_header.php';
        include 'View/'.$name.'.php';
        include 'View/User/User_footer.php';
    }
    
}
?>