<!--offers for you -->
<div id="deal_of_day">
    <div class="deal_label"><h4 style="margin-top:100px;">Offer For You</h4>
        <a href="<?php echo URL;?>Products/View_all/Best_deals?p=Offer"><input type="button" value="View All" class="form_button" style="width: 60%" /></a>
    </div>
    <div class="deal_container">
        <div class="parent">
            <div class="container">
                <div class="part part_left" id="part21">
                    <?php $i; for($i=0;$i<4;$i++){?>
                        <div class="sub"><a href="<?php echo URL;?>Products/List_products/<?php echo $this->offer[$i]['id'];?>">
                            <img src="<?php echo IMAGES."Product/".$this->offer[$i]['Image']?>"  width="100%" height="230px" />
                            <div class="product_content">
                                <center><?php echo $this->offer[$i]['Name']." |  ".$this->offer[$i]['Brand'];?></center>
                                <center>Price::
                                    <?php if($this->offer[$i]['Price']==$this->offer[$i]['Current_price'])
                                    {
                                        echo $this->offer[$i]['Price'];
                                    }else{
                                        echo "<strike>".$this->offer[$i]['Price']."</strike>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp".$this->offer[$i]['Current_price'];
                                    } ?></center>
                                <center><?php if(!is_null($this->offer[$i]['Rating'])){echo "Rating:: ".$this->offer[$i]['Rating'];}?></center>
                            </div></a>
                        </div>
                        <?php }?>
                </div>
                <div class="part part_right" id="part22">
                    <?php $i; for($i=4;$i<sizeof($this->offer);$i++){?>
                        <div class="sub"><a href="<?php echo URL;?>Products/List_products/<?php echo $this->offer[$i]['id'];?>">
                            <img src="<?php echo IMAGES."Product/".$this->offer[$i]['Image']?>"  width="100%" height="230px" />
                            <div class="product_content">
                                <center><?php echo $this->offer[$i]['Name']." |  ".$this->offer[$i]['Brand'];?></center>
                                <center>Price::
                                    <?php if($this->offer[$i]['Price']==$this->offer[$i]['Current_price'])
                                    {
                                        echo $this->offer[$i]['Price'];
                                    }else{
                                        echo "<strike>".$this->offer[$i]['Price']."</strike>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp".$this->offer[$i]['Current_price'];
                                    } ?></center>
                                <center><?php if(!is_null($this->offer[$i]['Rating'])){echo "Rating:: ".$this->offer[$i]['Rating'];}?></center>
                            </div></a>
                        </div>
                        <?php }?>
                </div>
                <input type="button" class="left" id="r2" value="<<" />
                <input type="button" class="right" id="l2" value=">>" />
            </div>
        </div>
    </div>
</div>