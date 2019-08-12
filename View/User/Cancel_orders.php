<div class="content">
    <div class="filters" style="position: fixed;">
        <?php include 'View/User/Profile_side_bar.php';?>
    </div>
    <div class="products_container" style="width:76%;margin-left:22%;">
        <div class="product_data" style="width: 90%;margin-left:5%;">
            <center style="margin-top:10px">Your Pending Orders</center><hr/>
            <div class="product_data" style="width: 100%;">
                <?php $j=0;$price=0;if(sizeof($this->products)>0){
                foreach($this->products as $value) {
                    $j++;
                    ?>
                <div class="cart_content" id="cart_content_<?php echo $value['id'];?>" >
                       <div class="cart_image"><img src="<?php echo IMAGES."Product/".$value['Image'];?>" style="margin-left:4px;border:1px solid lightgrey;" width="100%" height="280px" /></div>
                        <div class="cart_content_details">
                            <div class="cart_detail_header">Order N0 : <?php echo $value['Order_id'];?><a href="#"><img src='<?php echo IMAGES;?>location.png' width="10%" height="40px;" class="cart_detail_header_image" /></a></div>
                            <div class="product_det" style="margin-top:10px;">
                            <?php echo $value['Name'];?> &nbsp;|&nbsp; <?php echo $value['Brand'];?><br />
                            Quantity : <?php echo $value['Quantity'];?><br />
                            Total Amount :  <?php echo ($value['Price'] * $value['Quantity'])."<br />";?>
                            Ordered on : <?php echo $value['Order_date'];?><br />
                            Delivered on : <?php if($value['Status']=='Pending'){echo "Expected date : ".$value['Shipment_date'];}else{echo $value['Shipment_date'];}?><br />
                            <button class="delete_rating cancel_order" style="background-color:#f00;" value="<?php echo $value['id'] ?>">Cancel</button>
                        </div>
                        </div>
                    </div> 
                <?php }}
                else{?>
                    <div class="cart_content"><center><img src="<?php echo IMAGES;?>sample.jpg" width="30%" height="280px" /></center><center>No Orders</center></div>
                    <a href="<?php echo URL;?>"><button class="cart_action_button" style="width:60%;margin-left:20%;background-color: #ff6600">CONTINUE SHOPPING</button></a>
                    <?php }?>
                </div>
        
    </div>
</div>