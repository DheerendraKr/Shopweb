<div id="deal_of_day">
    <div class="deal_label"><h4 style="margin-top:100px;">Smartphones & Smartwatches</h4>
        <a href="<?php echo URL;?>Products/View_all/Smartphones?p="><input type="button" value="View All" class="form_button" style="width: 60%" /></a>
    </div>
    <div class="deal_container">
        <div class="parent">
            <div class="container">
                <div class="part part_left" id="part71">
                    <?php $i=0;if(sizeof($this->smart)>0){ for($i=0;$i<4;$i++){?>
                        <div class="sub"><a href="<?php echo URL;?>Products/List_products/<?php echo $this->smart[$i]['id'];?>">
                            <img src="<?php echo IMAGES."Product/".$this->smart[$i]['Image']?>"  width="100%" height="230px" />
                            <div class="product_content">
                                <center><?php echo $this->smart[$i]['Name']." |  ".$this->smart[$i]['Brand'];?></center>
                                <center>Price::
                                    <?php if($this->smart[$i]['Price']==$this->smart[$i]['Current_price'])
                                    {
                                        echo $this->smart[$i]['Price'];
                                    }else{
                                        echo "<strike>".$this->smart[$i]['Price']."</strike>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp".$this->smart[$i]['Current_price'];
                                    } ?></center>
                                <center><?php if(!is_null($this->smart[$i]['Rating'])){echo "Rating:: ".$this->smart[$i]['Rating'];}?></center>
                            </div></a>
                        </div>
                    <?php }}?>
                </div>
                <?php if(sizeof($this->smart)>3){ ?>
                <div class="part part_right" id="part72">
                    <?php $i; for($i=4;$i<sizeof($this->smart);$i++){?>
                        <div class="sub"><a href="<?php echo URL;?>Product/List_products/<?php echo $this->smart[$i]['id'];?>">
                            <img src="<?php echo IMAGES."Products/".$this->smart[$i]['Image']?>"  width="100%" height="230px" />
                            <div class="product_content">
                                <center><?php echo $this->smart[$i]['Name']." |  ".$this->smart[$i]['Brand'];?></center>
                                <center>Price::
                                    <?php if($this->smart[$i]['Price']==$this->smart[$i]['Current_price'])
                                    {
                                        echo $this->smart[$i]['Price'];
                                    }else{
                                        echo "<strike>".$this->smart[$i]['Price']."</strike>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp".$this->smart[$i]['Current_price'];
                                    } ?></center>
                                <center><?php if(!is_null($this->smart[$i]['Rating'])){echo "Rating:: ".$this->smart[$i]['Rating'];}?></center>
                            </div></a>
                        </div>
                        <?php }?>
                </div>
                <input type="button" class="left" id="r7" value="<<" />
                <input type="button" class="right" id="l7" value=">>" />
                <?php }?>
            </div>
        </div>
    </div>
</div>
