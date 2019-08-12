<div class="content">
    <div class="filters" style="position: fixed;">
        <?php include 'View/User/Profile_side_bar.php';?>
    </div>
    <div class="products_container" style="width:76%;margin-left:22%;">
        <div class="product_data" style="width: 90%;margin-left:5%;">
            <center style="margin-top:10px">All Orders</center><hr/>
            <div class="product_data" style="width: 100%;">
                <?php $i=0;$j=0;$price=0;if(sizeof($this->products)>0){
                foreach($this->products as $value) {
                    $j++;
                    ?>
                   <div class="cart_content" >
                       <div class="cart_image"><img src="<?php echo IMAGES."Product/".$value['Image'];?>" style="margin-left:4px;border:1px solid lightgrey;" width="100%" height="280px" /></div>
                        <div class="cart_content_details">
                        <div class="cart_detail_header">Order N0 : <?php echo $value['Order_id'];?>
                            <?php if($this->rating[$i]['id']!=$value['id']){ ?>
                            <button class="rate_btn" value="<?php echo $value['Order_id'];?>">Rate &AMP; Review</button>
                            <form class="product_rating" method="post" action="<?php echo URL;?>User/Add_review" id="rating_form_<?php echo $value['Order_id'];?>">
                                <input type="number" name="prod_id" value="<?php echo $value['id'];?>" style="display:none;" />
                                <select required="true" name="rating">
                                    <option>-select</option>
                                    <option value="1">1</option>
                                    <option vaue="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
                                <textarea cols="30"required="true"  rows="3" name="review"></textarea>
                                <input type="submit" class="rate_product" value="Rate" />
                        </form><?php }?>
                        </div>
                        <div class="product_det" style="margin-top:10px;">
                            <?php echo $value['Name'];?> &nbsp;|&nbsp; <?php echo $value['Brand'];?><br />
                            Quantity : <?php echo $value['Quantity'];?><br />
                            Total Amount :  <?php echo ($value['Price'] * $value['Quantity'])."<br />";?>
                            Ordered on : <?php echo $value['Order_date'];?><br />
                            Delivered on : <?php if($value['Status']=='Pending'){echo "Expected date : ".$value['Shipment_date'];}else{echo $value['Shipment_date'];}?><br />
                        </div>
                        </div>
                    </div> 
                <?php $i++;}}
                else{?>
                    <div class="cart_content"><center><img src="<?php echo IMAGES;?>sample.jpg" width="30%" height="280px" /></center><center>No Orders</center></div>
                    <a href="<?php echo URL;?>"><button class="cart_action_button" style="width:60%;margin-left:20%;background-color: #ff6600">CONTINUE SHOPPING</button></a>
                    <?php }?>
                </div>
        
    </div>
</div>