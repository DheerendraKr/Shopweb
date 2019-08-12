<?php include 'Config/Paths.php';?>
<html>
    <head></head>
    <body>
<div id="header">
    <div id="logo"><img src="<?php echo Main_Image;?>Site_logo.jpeg" width="100%" height="80px" /></div>
    <div id="navigation_area">
        <div id="search_bar">
            <div id="home_search_text_bar"><input id="textbox1" type="text" name="home_search"  placeholder="Search Here" /></div>
            <div id="home_search_button"><img src="<?php echo Main_Image;?>search_logo.jpg" width="100%" height="40px" /></div>
            <div id="cart">Your cart</div>
        </div>
        <div id="nav_bar">
            <ul id="main_menu">
                <li class="submenu"><b>Electronics</b>
                    <div class="submenu_options"><ul>
                            <div class="submenu_option"><li class="subsubmenu"><b>Mobile</b>
                            <ul>
                                <li>Nokia</li>
                                <li>Samsung</li>
                                <li>Motorola</li>
                                <li>MI</li>
                                <li>Oppo</li>
                                <li>Vivo</li>
                                <li>Intex</li>
                            </ul>
                                </li></div>
                        <li>Mobile_Accessories</li>
                        <li>Laptops</li>
                        <li>Desktop PC</li>
                        <li>Peripherals</li>
                        <li>Camera/Accessories</li>
                    </ul></div>
                </li>
                <li class="submenu">Appliances
                    <ul>
                        <li>Television</li>
                        <li>Washing&nbsp;machine</li>
                        <li>Air&nbsp;Conditioner</li>
                        <li>Kitchen&nbsp;Appliances</li>
                        <li>Small&nbsp;Home&nbsp;Appliances</li>
                        <li>Camera/Accessories</li>
                    </ul>
                </li>
                <li class="submenu">Men
                    <ul>
                        <li>Top&nbsp;Wear</li>
                        <li>Bottom&nbsp;Wear</li>
                        <li>Sports&nbsp;Wear</li>
                        <li>Watches</li>
                        <li>Grooming</li>
                    </ul>
                </li>
                <li class="submenu">Women
                    <ul>
                        <li>Clothing</li>
                        <li>Ethic&nbsp;Wear</li>
                        <li>Sports&nbsp;Wear</li>
                        <li>Footwear</li>
                        <li>Watches</li>
                    </ul>
                </li>
                <li class="submenu">Home Decorations
                    <ul>
                        <li>Kitche&nbsp;&amp;&nbsp;Dining</li>
                        <li>Furniture</li>
                        <li>Home&nbsp;Decore</li>
                        <li>Furnishing</li>
                        <li>Lighting</li>
                    </ul>
                </li>
                <li class="submenu">Books&nbsp;&amp;&nbsp;More
                    <ul>
                        <li>Books</li>
                        <li>Gaming&nbsp;&amp;&nbsp;Accessories</li>
                        <li>Vehical&nbsp;Accessories</li>
                        <li>Fitness</li>
                        <li>Sports</li>
                    </ul>
                </li>
                <li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</li>
                <li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</li>
                <li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</li>
                
                <li>Login</li>
                <li>Register</li>
            </ul>
        </div>
    </div>    
</div>

</body>
</html>



<style type="text/css">

div
{
    float: left;
}
#header{
    width: 100%;
    height: 100px;
    background-color:#33ffd6;
    position:fixed;
    opacity:.8;
}
#logo
{
    width:20%;
    height:70px;
    margin-bottom: 10px;
    margin-top: 10px;
    margin-left: 1%;
    margin-right: 1%;
}
#navigation_area
{
    width: 78%;
    height:100px;
}
#search_bar
{
    width:100%;
    height: 50px;
}
#nav_bar
{
    width:100%;
    height:50px;
/*    background-color:blue;*/
}
#home_search_text_bar
{
    padding:0px;
    width:60%;
    height: 40px;
    margin-top: 5px;
    margin-right: 0%;
}
#textbox1
{
    width:100%;
    height: 40px;
    border: none;
    box-shadow: 1px 1px 3px grey;
    border-radius: 4px;
}
#home_search_button
{
    padding: 0px;
    width:8%;
    height: 40px;
    margin-bottom: 5px;
    margin-top: 5px;
    margin-left: 1%;
    box-shadow: 1px 1px 4px grey;
    border-radius: 4px;
}
#cart{
    width:15%;
    margin-left: 12%;
    height:40px;
    margin-bottom: 5px;
    margin-top: 5px;
    border-radius: 4px;
    margin-right: 4%;
    background-color:#00b38f;
}
#main_menu
{
    list-style: none;
    width: 94%;
    margin-left:3px;
    margin-right: 3px;
}
#main_menu li
{
    float: left;
/*    font-weight: bold;*/
    font-size: 18px;
    padding:10px;
}
/*#electronics,#men,#appliances,#women,#home,#books*/
.submenu
{
    position: relative;
}
/*#electronics:hover,#appliances:hover,#men:hover,#women:hover,#home:hover,#books:hover*/
.submenu:hover
{
    background-color:#00ffcc;
}
/*#electronics ul,#appliances ul,#men ul,#women ul,#home ul,#books ul*/
.submenu ul
{
    display: none;
    transition: height .5;
    position:absolute;
    left:0px;
    list-style: none;
/*    width:200px;*/
}
/*#electronics ul li,#appliances ul li,#men ul li,#women ul li,#home ul li,#books ul li*/
.submenu ul li
{
    float: left;
    text-align: left;
/*    width:100%;*/
/*    margin-left: -40px;*/
    color:#000;
}
/*#electronics:hover ul,#appliances:hover ul,#men:hover ul,#women:hover ul,#home:hover ul,#books:hover ul*/
.submenu:hover ul
{
    display: block;
    min-height:100px;
    background-color:#00ffcc;
   
}
/*.subsubmenu:hover
{
    background-color:#00b38f;
}
.submenu .subsubmenu ul
{
    display: none;
    transition: height .5;
    position:absolute;
    left:220px;
    top: 0px;
    list-style: none;
    min-width: 150px;
}
.subsubmenu ul li
{
    float: clear;
    text-align: left;
    width:100%;
    color:#000;
}
.submenu:hover .subsubmenu:hover ul
{
    display: block;
    min-height:100px;
    background-color:#00b38f;
   
}*/

.submenu_options
{
    min-height: 300px;
    background-color: yellow;
}

</style>