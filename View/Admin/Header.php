<html>
    <head>
        <title>EKart Admin</title>
        <link href="<?php echo URL;?>public/StyleSheets/Main_Style.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo URL;?>public/StyleSheets/Admin/Header_Style.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo URL;?>public/StyleSheets/Admin/Home_pages.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo URL;?>public/StyleSheets/Admin/Form_Style.css" rel="stylesheet" type="text/css" />
        <script type="text/javascript" src="<?php echo JS;?>jquery/jquery-3.2.1.js" ></script>
        <script type="text/javascript" src="<?php echo JS;?>jquery/jquery.form.js" ></script>
        <script type="text/javascript" src="<?php echo JS;?>Admin/Admin.js" ></script>
        <script type="text/javascript" src="<?php echo JS;?>Admin/Form.js" ></script>
        <script type="text/javascript" src="<?php echo JS;?>Admin/Sort.js" ></script>
        
    </head>
    <body bgcolor="lightgrey" >
        <div id="header">
            <div id="logo"><a href="<?php echo URL;?>" ><img src="<?php echo Main_Image;?>logo.svg" width="100%" height="80px" /></a></div>
            <div id="navigation_area">
                 <ul id="main_menu">
                     <a href="<?php echo URL;?>Admin"><li class="submenu">Home_page</li></a>
                     <a href="<?php echo URL;?>admin/view_products"><li class="submenu">View Products</li></a>
                    <li class="submenu">Manage Products
                        <ul>
                            <a href="<?php echo URL;?>Admin/Manage_stock_products"><li class="subsubmenu">Manage Stock Products</li></a>
                            <a href="<?php echo URL;?>Admin/Add_new_products"><li class="subsubmenu">Add New Products</li></a>
                        </ul>
                    </li>
                    <li class="submenu">Manage_Categories
                        <ul>
                            <a href="<?php echo URL;?>Admin/Manage_category"><li class="subsubmenu">Manage_category</li></a>
                            <a href="<?php echo URL;?>Admin/Manage_sub_cat"><li class="subsubmenu">Manage_Sub_category</li></a>
                            <a href="<?php echo URL;?>Admin/Manage_brand"><li class="subsubmenu">Manage_Brand</li></a>
                        </ul>
                    </li>
                    <a href="<?php echo URL;?>Admin/All_orders"><li class="submenu">Orders_Details</li></a>
                    <a href="<?php echo URL;?>Admin/Customer_details"><li class="submenu">Customer Details</li></a>
                    <?php if(Session::get('role')=='Owner'){echo '<a href='.URL.'Admin/Employee_details><li class="submenu">Employee Details</li></a>';}?>
                    <li style="float: right;"  id="register" class="<?php echo $this->class;?>"><?php echo $this->log_option;?></li>
                    <li style="float: right" class="<?php echo $this->class.' '.$this->cls1;?>"  id="login"  ><a href="<?php echo URL;?>Admin/Profile"><?php echo $this->user;echo "</a>";if(isset($this->user_options)){echo $this->user_options;}?></li>
                </ul>
            </div>
        </div>

    