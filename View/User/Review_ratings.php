<div class="content">
    <div class="filters"style="position:fixed">
        <?php include 'View/User/Profile_side_bar.php';?>
    </div>
    <div class="products_container" style="width:77%;margin-left:22%;">
        <div class="product_data" style="width: 90%;margin-left:5%;">
            <center style="margin-top:10px">Rate and Reviews</center><hr/>
            <div class="product_data" style="width: 100%;">
                <?php $i=0;$j=0;$price=0;if(sizeof($this->products)>0){
                foreach($this->products as $value) {
                    $j++;
                    ?>
                   <div class="cart_content" id="cart_content_<?php echo $value['id'];?>" >
                       <div class="cart_image"><img src="<?php echo IMAGES."Product/".$value['Image'];?>" style="margin-left:4px;border:1px solid lightgrey;" width="100%" height="280px" /></div>
                       <div class="cart_content_details" >
                        <div class="cart_detail_header"><?php echo $value['Name'];?> &nbsp;|&nbsp; <?php echo $value['Brand'];?>
                            <form class="product_rating" method="post" action="<?php echo URL;?>User/Update_review" id="update_rating_form_<?php echo $value['id'];?>">
                                <input type="number" name="prod_id" value="<?php echo $value['id'];?>" style="display:none;" />
                                <select name="rating" required="true" id="rating_data_<?php echo $value['id'];?>">
                                    <option>-select</option>
                                    <option value="1">1</option>
                                    <option vaue="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
                                <textarea cols="30" rows="3" required="true" id="feed_data_<?php echo $value['id'];?>" name="review"></textarea>
                                <input type="submit" class="rate_product" value="Update" />
                            </form>
                        </div>
                        <div class="product_det" style="margin-top:10px;">
                            Rating : <span id="rating_<?php echo $value['id'];?>"><?php echo $value['Rating'];?></span><br/>
                            Review : <span id="feed_<?php echo $value['id'];?>"><?php echo $value['Feed'];?></span><br/>
                            <button class="update_rating"id="update_rating" value="<?php echo $value['id'];?>" >Update</button>
                            <button class="delete_rating" id="delete_rating" style="background-color:#f00;" value="<?php echo $value['id'];?>" >Delete</button>
                        </div>
                        </div>
                    </div> 
                <?php $i++;}}
                else{?>
                    <div class="cart_content"><center><img src="<?php echo IMAGES;?>sample.jpg" width="30%" height="280px" /></center><center>No Reviews</center></div>
                    <a href="<?php echo URL;?>"><button class="cart_action_button" style="width:60%;margin-left:20%;background-color: #ff6600">CONTINUE SHOPPING</button></a>
                    <?php }?>
                </div>
        </div>
    </div>
</div>