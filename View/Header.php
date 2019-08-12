
<?php include 'Head_file.php';?>
<body bgcolor="#f0f5f5" >
<div id="header">
    <div id="logo"><a href="<?php echo URL;?>"><img src="<?php echo Main_Image;?>logo.svg" width="100%" height="80px" /></a></div>
    <div id="navigation_area">
        <div id="search_bar">
            <div id="home_search_text_bar"><input id="textbox1" type="text" name="home_search" value=""  placeholder="Search Here" /></div>
            <div id="search_suggestions"><ul id="suggestion"><li>hello</li></ul></div>
            <div id="home_search_button"><img src="<?php echo Main_Image;?>search_logo.jpg" width="100%" height="40px" /></div>
            <a href="<?php echo URL;?>Cart/All_Contents"><div id="cart"><img src="<?php echo IMAGES?>cart.png" style="margin-left: 10%" width="50%" height="40px"  /><span id="cart_items_no"><?php echo $this->cart;?></span></div></a>
        </div>
        <div id="nav_bar">
            <ul id="main_menu">
               <?php foreach ($this->cat as $value) {?>
                <li class="submenu"><a href="<?php echo URL;?>Products/View_all/Product_by_cat?p=<?php echo $value['Cat_id'];?>"><?php echo $value['Category'];?></a>
                    <?php echo "<ul>"; foreach ($this->sub_cat as $sub) {
                        if($sub['Cat_id']==$value['Cat_id']){?>
                            <li class="subsubmenu"><a href="<?php echo URL;?>Products/View_all/Product_by_subcat?p=<?php echo $sub['Sub_cat_id'];?>"><?php echo $sub['Sub_cat'];?></a>
                            <?php  echo "<ul>"; foreach ($this->brand as $brand) {
                            if($brand['Sub_cat_id']==$sub['Sub_cat_id']){?>
                                <a href="<?php echo URL;?>Products/View_all/Product_by_brand?p=<?php echo $brand['brand_id'];?>"><li><?php echo $brand['Brand'];?></li></a>
                            <?php }}echo "</ul>";?>
                        </li>
                    <?php }}echo"</ul>";?>
                </li>
                <?php }?>
                <li style="float: right;"   class="<?php echo $this->class;?> register"><?php echo $this->log_option;?></li>
                 
                <li style="float: right" class="<?php echo $this->class.' ';if(isset($this->cls1)){echo $this->cls1;}?> login"   ><?php echo $this->user;if(isset($this->user_options)){echo $this->user_options;}?></li>
                
                
            </ul>
        </div>
    </div>    
</div>
    <div class="panel"><div id="register_panel"><?php include 'View/Forms/Register.php';?></div></div>
    <div class="panel"><div id="login_panel"><?php include 'View/Forms/Login.php';?></div></div>
