<!--trending-->    
<div id="deal_of_day">
    <div class="deal_label"><h4 style="margin-top:100px;">Trending Items</h4>
        <a href="<?php echo URL;?>Products/View_all/Best_deals?p=Offer and sold_quantity"><input type="button" value="View All" class="form_button" style="width: 60%" /></a>
    </div>
    <div class="deal_container">
        <div class="parent">
            <div class="container">
                <div class="part part_left" id="part31">
                <?php $i; for($i=0;$i<4;$i++){?>
                        <div class="sub"><a href="<?php echo URL;?>Products/List_products/<?php echo $this->trend[$i]['id'];?>">
                            <img src="<?php echo IMAGES."Product/".$this->trend[$i]['Image']?>"  width="100%" height="230px" />
                            <div class="product_content">
                                <center><?php echo $this->trend[$i]['Name']." |  ".$this->trend[$i]['Brand'];?></center>
                                <center>Price::
                                    <?php if($this->trend[$i]['Price']==$this->trend[$i]['Current_price'])
                                    {
                                        echo $this->trend[$i]['Price'];
                                    }else{
                                        echo "<strike>".$this->trend[$i]['Price']."</strike>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp".$this->trend[$i]['Current_price'];
                                    } ?></center>
                                <center><?php if(!is_null($this->trend[$i]['Rating'])){echo "Rating:: ".$this->trend[$i]['Rating'];}?></center>
                            </div></a>
                        </div>
                        <?php }?>
                </div>
                <div class="part part_right" id="part32">
                    <?php $i; for($i=4;$i<sizeof($this->trend);$i++){?>
                        <div class="sub"><a href="<?php echo URL;?>Products/List_products/<?php echo $this->trend[$i]['id'];?>">
                            <img src="<?php echo IMAGES."Product/".$this->trend[$i]['Image']?>"  width="100%" height="230px" />
                            <div class="product_content">
                                <center><?php echo $this->trend[$i]['Name']." |  ".$this->trend[$i]['Brand'];?></center>
                                <center>Price::
                                    <?php if($this->trend[$i]['Price']==$this->trend[$i]['Current_price'])
                                    {
                                        echo $this->trend[$i]['Price'];
                                    }else{
                                        echo "<strike>".$this->trend[$i]['Price']."</strike>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp".$this->trend[$i]['Current_price'];
                                    } ?></center>
                                <center><?php if(!is_null($this->trend[$i]['Rating'])){echo "Rating:: ".$this->trend[$i]['Rating'];}?></center>
                            </div></a>
                        </div>
                        <?php }?>
                </div>
                <input type="button" class="left" id="r3" value="<<" />
                <input type="button" class="right" id="l3" value=">>" />
            </div>
        </div>
    </div>
</div>