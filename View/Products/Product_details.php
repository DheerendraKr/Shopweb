<div class="content">
    <div class="product_data">
        <div class="product_images">
            <div class="side_image">
                <div class="side_image_part"><img class="side_images" src="<?php echo IMAGES."Product/".$this->img[0]['Main_image'];?>" width="100%" height="80px" /></div>
                <div class="side_image_part"><img class="side_images" src="<?php echo IMAGES."Product/".$this->img[0]['Image2'];?>" width="100%" height="80px" /></div>
                <div class="side_image_part"><img class="side_images" src="<?php echo IMAGES."Product/".$this->img[0]['Image3'];?>" width="100%" height="80px" /></div>
                <div class="side_image_part"><img class="side_images" src="<?php echo IMAGES."Product/".$this->img[0]['Image4'];?>" width="100%" height="80px" /></div>
            </div>
            <div class="product_main_image">
                <img id="product_main_image" src="<?php echo IMAGES."Product/".$this->product[0]['Image'];?>" width="100%" height="400px" alt=""/>
            </div>
            <?php $user=isset($_SESSION['user'])?$_SESSION['user']:null; if(!is_null($user)){ ?>
            
            <button id="add_to_cart" class="product_action_button" style="background-color: #ff6600" value="<?php echo $this->product[0]['id']?>">Add To Cart</button>
            <a href="<?php echo URL;?>User/Checkout/<?php echo $this->product[0]['id'];?>"><input type="button" class="product_action_button" style="background-color: #ffcc00" value="Buy Now" /></a>
            <?php }else{ ?>
            <a href="<?php echo URL;?>Guest/Checkout/<?php echo $this->product[0]['id'];?>"><button class="product_action_button" style="background-color: #ffcc00;width:100%;margin: 0%;" value="<?php echo $this->product[0]['id']?>" >Buy Now</button></a>
            <?php }?>
        </div>
        <div class="product_specifcation">
            <span style="font-size: 20px"><b><?php echo $this->product[0]['Name']." | ".$this->product[0]['Brand'];?></b></span><br />
            <span style="font-size: 16px;color:orangered;">Rating: <?php echo $this->product[0]['Rating']?></span><br /><br />
            <span style="font-size: 18px;color:#003311"><b>Price : 
                <?php if($this->product[0]['Price']!=$this->product[0]['Current_price']){?><strike><?php echo "MRP ".$this->product[0]['Price']."  </strike> &nbsp;&nbsp;&nbsp;&nbsp; <span style='color:#074'>Offer Price:  ".$this->product[0]['Current_price']."</span>";}
                else{ echo $this->product[0]['Price'];}
                ?></b></span><br/><br />
            <span style="font-size: 18px">Delivery</span><input type="number" class="input_pincode" placeholder="pincode"><span style="cursor: pointer;font-size: 18px;color:#00f">Check</span><br /><br />
            <span style="font-size: 18px">Features</span><br /><br />
            <span style="font-size: 18px"><input type="button" id="see_specifications" class="product_action_button" style="background-color: #fff;width:98%;color:#000;" value="See full specifiction" /></span>
        </div>
    </div>
    <div id="specifications"><center><b>Full Specifications</b></center><hr /></div>
    <div class="product_ratings">
        <div class="rating_heading" style="margin-left: 5px;"><h2>Reviews</h2><hr/></div>
        <?php if(sizeof($this->rating)>0){for($i=0;$i < sizeof($this->rating);$i++){?>
        <div class="rating_content">
            <div class="rating_by"><span class="author"><?php echo $this->rating[$i]['Email']?></span ><span class="rating_value"><?php echo $this->rating[$i]['Rating']?>.0 Stars</span><hr /></div>
            <div style="margin-left:5px;"><?php echo $this->rating[$i]['Feed']?></div>
        </div> <?php }}else{echo "<center><h3>No Reviews Yet</h3></center>";}?>
    </div>
    
</div>
