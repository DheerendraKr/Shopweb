<?php $i;if(sizeof($this->furnish)>0){ ?>
<div id="deal_of_day">
    <div class="deal_label"><h4 style="margin-top:100px;">Home & Furnishing</h4>
        <a href="<?php echo URL;?>Products/View_all/Home_furnishing?p="><input type="button" value="View All" class="form_button" style="width: 60%" /></a>
    </div>
    <div class="deal_container">
        <div class="parent">
            <div class="container">
                <div class="part part_left" id="part61">
                    <?php $i;if(sizeof($this->furnish)>0){ for($i=0;$i<4;$i++){?>
                        <div class="sub"><a href="<?php echo URL;?>Products/List_products/<?php echo $this->furnish[$i]['id'];?>">
                            <img src="<?php echo IMAGES."Product/".$this->furnish[$i]['Image']?>"  width="100%" height="230px" />
                            <div class="product_content">
                                <center><?php echo $this->furnish[$i]['Name']." |  ".$this->furnish[$i]['Brand'];?></center>
                                <center>Price::
                                    <?php if($this->furnish[$i]['Price']==$this->furnish[$i]['Current_price'])
                                    {
                                        echo intval($this->furnish[$i]['Price']);
                                    }else{
                                        echo "<strike>".intval($this->furnish[$i]['Price'])."</strike>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp".intval($this->furnish[$i]['Current_price']);
                                    } ?></center>
                                <center><?php if(!is_null($this->furnish[$i]['Rating'])){echo "Rating:: ".$this->furnish[$i]['Rating'];}?></center>
                            </div></a>
                        </div>
                    <?php }}?>
                </div>
                <?php if(sizeof($this->furnish)>3){ ?>
                <div class="part part_right" id="part62">
                    <?php $i; for($i=4;$i<sizeof($this->furnish);$i++){?>
                        <div class="sub"><a href="<?php echo URL;?>Products/List_products/<?php echo $this->furnish[$i]['id'];?>">
                            <img src="<?php echo IMAGES."Product/".$this->furnish[$i]['Image']?>"  width="100%" height="230px" />
                            <div class="product_content">
                                <center><?php echo $this->furnish[$i]['Name']." |  ".$this->furnish[$i]['Brand'];?></center>
                                <center>Price::
                                    <?php if($this->furnish[$i]['Price']==$this->furnish[$i]['Current_price'])
                                    {
                                        echo intval($this->furnish[$i]['Price']);
                                    }else{
                                        echo "<strike>".intval($this->furnish[$i]['Price'])."</strike>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp".intval($this->furnish[$i]['Current_price']);
                                    } ?></center>
                                <center><?php if(!is_null($this->furnish[$i]['Rating'])){echo "Rating:: ".$this->furnish[$i]['Rating'];}?></center>
                            </div></a>
                        </div>
                        <?php }?>
                </div>
            <input type="button" class="left" id="r6" value="<<" />
            <input type="button" class="right" id="l6" value=">>" />
            <?php }?>
            </div>
        </div>
    </div>
</div><?php }?>
