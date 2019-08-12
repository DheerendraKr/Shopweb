<div class="content">
    <div class="product_data" style="width: 90%;margin-left:5%;">
         <center>My Cart</center><hr/>
    <?php 
    Session::init();
    $email=isset($_SESSION['email'])?$_SESSION['email']:null;
    if(!is_null($email)){ ?>
    <div class="product_data" style="width: 70%;margin-left:.7%;">
    <?php $j=0;$price=0;if(sizeof($this->products)>0){
    foreach($this->products as $value) {
        $j++;
        ?>
       <div class="cart_content" id="<?php echo $value['id']."_cart"; ?>">
           <div class="cart_image"><img src="<?php echo IMAGES."Product/".$value['Image'];?>" style="border:1px solid lightgrey;" width="100%" height="280px" /></div>
            <div class="cart_content_details">
                <div class="product_det">
                <?php echo $value['Name'];?><br />
                Price::
                    <?php if($value['Price']==$value['Current_price'])
                    {
                        echo $value['Price'];
                        $price=$price+$value['Price'] *$value['Quantity'];
                    }else{
                        echo "<strike>".$value['Price']."</strike>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp<span style='color:#00f'>".$value['Current_price']."</span>";
                        $price=$price+($value['Current_price'] * $value['Quantity']);
                    } ?><br />
                <?php if(!is_null($value['Rating'])){echo "Rating:: ".$value['Rating'];}?><br /><br />
                <button value="<?php echo $value['id'];?>" class="cart_button" id="remove" disabled="<?php if($value['Quantity']==1){echo 'true';}else { echo 'false';} ?>" > - </button>
                <input disabled="true" style="border:1px solid black" type="number" id="quantity_input" value="<?php echo $value['Quantity']; ?>" />
                <button value="<?php echo $value['id'];?>" class="cart_button" id="add"> + </button>
                <button class="cart_button remove remove_from_cart" value="<?php echo $value['id'];?>">Remove From Cart</button>
            </div>
            </div>
        </div> 
    <?php }?>
        <a href="<?php echo URL;?>"><button class="cart_action_button" style="width:38%;margin-left:10%;background-color: #ff6600">CONTINUE SHOPPING</button></a>
        <a href="<?php echo URL;?>User/Cart_checkout"><button class="cart_action_button" style="width:38%;margin-left:1%;background-color: #e6e600">PLACE ORDER</button></a>
        <?php }else{?>
        <div class="cart_content"><center><img src="<?php echo IMAGES;?>sample.jpg" width="30%" height="280px" /></center><center>Your Cart is Empty</center></div>
        <a href="<?php echo URL;?>"><button class="cart_action_button" style="width:60%;margin-left:20%;background-color: #ff6600">CONTINUE SHOPPING</button></a>
        <?php }?>
    </div>
         <div class="pricing_details">
             <span style="margin-left:15px;">Price ( <?php echo $j;?> Item ):</span><span style="margin-left:30px;"><?php echo intval($price); ?></span><br /><br />
             <span style="margin-left:15px;">Delivery Charge : Rs  0</span><br /> <br />
             <hr style="border-top:1px dotted grey;">
             <span style="margin-left:15px;">Total Amount Payable: </span><span style="margin-left:30px;"><?php echo intval($price+0); ?></span>
         </div>
    <?php }else{ ?>
        <div class="cart_content"><center><img src="<?php echo IMAGES;?>sample.jpg" width="30%" height="280px" /></center><center>Please Login To See Your Cart</center></div>
        <center><a href="<?php echo URL;?>"><input type="button" class="cart_action_button " style="background-color: #ffcc00" value="CONTINUE SHOPPING" /></a></center>
    <?php } ?>
    </div>
</div>