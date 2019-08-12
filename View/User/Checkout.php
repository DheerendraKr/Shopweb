<div class="content">
    <form action="<?php echo URL;?>User/Place_order" method="post" id="place_order">
    <div class="product_container" style="">
        <input type="text" class="hide_button" name="product_id" value="<?php echo $this->products['id'];?>" />
        <div class="image"><img src="<?php echo IMAGES.'Product/'.$this->products['Image'];?>" width="100%" height="100px" /></div>
        <div class="details">
           <center>
            <?php echo $this->products['Name']." |  ".$this->products['Brand'];?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            Price: <?php echo $this->products['Price'];?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            Quantity : 1</center>
        </div>
    </div>
    <div class="product_container" style="">
        <div style="margin:20px;" >
            Total amount : <?php echo $this->products['Price'];?><br />
            Delivery charge : 0<br />
            Total Payable amount : <?php echo $this->products['Price'];?><br />
        </div>
    </div>
    <div class="product_container" style="">
        <h3 style="margin-left:20px;">Select Address</h3>
        <?php foreach ($this->address as $value) {?>
        <div style="margin-bottom:20px;" >
            <input type="radio"  class="addres_radio" name="address" value="<?php echo $value['Id'];?>" />
            <span>Location : <?php echo $value['Street'];?></span><br />
            <span class="add_data">Pincode : <?php echo $value['Pincode'];?></span><br />
            <span class="add_data">City : <?php echo $value['City'];?></span><br />
            <span class="add_data">State : <?php echo $value['State'];?></span><br />
            <button class="add_btn"  style="margin-left: 39px;" value="<?php echo $value['Id'];?>">Delete</button>
        </div>
        <?php }?>
        <div style="margin-bottom:20px;" id="new_address_aded"></div>
    </div>
        <center><input type="button" class="add_addr" style="width:200px;background-color: #00cc7a;" id="new_address" value="Add New Address"/></center>
    
    <div class="product_container" style="padding-bottom: 20px">
        <h3 style="margin-left:20px;">Select Payment_Mode</h3>
        <?php foreach ($this->payment as $value) {?>
        <input type="radio" class="addres_radio" name="payment" value="<?php echo $value['id'];?>"><?php echo $value['Type']?><br />
        <?php }?>
        
    </div><br/>
    <center><input type="submit" class="add_addr" style="width:200px;background-color: #002db3;" value="Place Order"/></center>
    </form>
    <div class="address_form">
        <button id="cross">X</button>
        <center><h3>New Address</h3></center>
        <form id="add_address_form" method="post" action="<?php echo URL;?>User/New_address">
            <div class="form_label">Street</div><input type="text" required="true" name="street" id="street" class="form_input"><br/><br/>
            <div class="form_label">Pincode</div><input type="number" required="true" name="pincode" id="pincode" class="form_input"><br/><br/>
            <div class="form_label">City</div><input type="text" required="true" name="city" id="city" class="form_input"><br/><br/>
            <div class="form_label">State</div><input type="text" required="true" name="state" id="state" class="form_input"><br/><br/>
            <input type="submit" class="add_addr" style="width:100px;background-color: #00b2b3; margin-left:29%" value="Save" />
        </form>
        
    </div>
</div>