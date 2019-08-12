<div class="content">
    <form id="guest_place_order" action="<?php echo URL;?>Guest/Place_order" method="post">
    <input type="text" style="display:none" name="product_id" id="product_id" value="<?php $url=$_GET['url'];$url= explode('/',$url);echo $url[2]?>" />
    <input type="text" style="display:none" id="guest_email" value="" name="email" />
    <div class="product_container" style="">
        <div class="image"><img src="<?php echo IMAGES.'Product/'.$this->products['Image'];?>" width="100%" height="100px" /></div>
        <div class="details">
           <center>
            <?php echo $this->products['Name']." |  ".$this->products['Brand'];?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            Price: <?php echo $this->products['Price'];?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            Quantity : 1</center>
        </div>
    </div>
    <div class="product_container" id="guest_details" style="padding:10px;">
        <h3 style="margin-left:20px;">Enter Details</h3>
        
    </div>        
    <div class="product_container" style="">
        <h3 style="margin-left:20px;">Your Address</h3>
        <div style="margin-bottom:20px;" id="new_address_aded"></div>
    </div>
    <center><button class="add_addr" style="width:200px;background-color: #00cc7a;" id="new_address">Add New Address</button></center>
    
    <div class="product_container" style="padding-bottom: 20px;">
        <h3 style="margin-left:20px;">Select Payment_Mode</h3>
        <?php foreach ($this->payment as $value) {?>
        <input type="radio" class="addres_radio" name="payment" value="<?php echo $value['id'];?>"><?php echo $value['Type']?><br />
        <?php }?>
        <center><input type="submit" class="add_addr" id="place_order" style="width:200px;background-color: #002db3;" value="Place Order"/></center>
    </div><br/>
    </form>
    <div style="margin-bottom:20px;width:40%" >
        <form id="guest_details_form" method="post" action="<?php echo URL;?>Guest/Details">
            <div class="form_label">Name</div><input type="text" class="form_input" required="true" name="name" id="street" class="name"><br/><br/>
            <div class="form_label">Mobile </div><input type="number" required="true" name="mobile" id="mobile" class="form_input"><br/><br/>
            <div class="form_label">Email</div><input type="email" required="true" name="email" id="email" class="form_input"><br/><br/>
            <input type="submit" class="add_addr" style="width:100px;background-color: #00b2b3; margin-left:6.5%" value="Save" />
        </form>
<!--            <a href="#"><div class="form_label">Login_now</div></a>-->
    </div>
    <div class="guest_address_form address_form">
        <button id="cross">X</button>
        <center><h3>Enter Your Address</h3></center>
        <form id="guest_address_form" method="post" action="<?php echo URL;?>Guest/Add_address">
            <div class="form_label">Street</div><input type="text" required="true" name="street" id="street" class="form_input"><br/><br/>
            <div class="form_label">Pincode</div><input type="number" required="true" name="pincode" id="pincode" class="form_input"><br/><br/>
            <div class="form_label">City</div><input type="text" required="true" name="city" id="city" class="form_input"><br/><br/>
            <div class="form_label">State</div><input type="text" required="true" name="state" id="state" class="form_input"><br/><br/>
            <input id="save_guest_details" type="submit" class="add_addr" style="width:100px;background-color: #00b2b3; margin-left:29%" value="Save" />
        </form>
        
    </div>
</div>