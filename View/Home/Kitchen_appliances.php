<!--Kitchen appliances-->
<?php $i;if(sizeof($this->kitchen)>0){?>
<div id="deal_of_day">
    <div class="deal_label"><h4 style="margin-top:100px;">Kitchen Appliances</h4>
        <a href="<?php echo URL;?>Products/View_all/Kitchen_appliances?p="><input type="button" value="View All" class="form_button" style="width: 60%" /></a>
    </div>
    <div class="deal_container">
        <div class="parent">
            <div class="container">
                <div class="part part_left" id="part51">
                    <?php $i;if(sizeof($this->kitchen)>0){ for($i=0;$i<4;$i++){?>
                        <div class="sub"><a href="<?php echo URL;?>Products/List_products/<?php echo $this->kitchen[$i]['id'];?>">
                            <img src="<?php echo IMAGES."Product/".$this->kitchen[$i]['Image']?>"  width="100%" height="230px" />
                            <div class="product_content">
                                <center><?php echo $this->kitchen[$i]['Name']." |  ".$this->kitchen[$i]['Brand'];?></center>
                                <center>Price::
                                    <?php if($this->kitchen[$i]['Price']==$this->kitchen[$i]['Current_price'])
                                    {
                                        echo intval($this->kitchen[$i]['Price']);
                                    }else{
                                        echo "<strike>".intval($this->kitchen[$i]['Price'])."</strike>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp".intval($this->kitchen[$i]['Current_price']);
                                    } ?></center>
                                <center><?php if(!is_null($this->kitchen[$i]['Rating'])){echo "Rating:: ".$this->kitchen[$i]['Rating'];}?></center>
                            </div></a>
                        </div>
                    <?php }}?>
                </div>
                    <?php if(sizeof($this->kitchen)>3){ ?>
                <div class="part part_right" id="part52">
                    <?php $i; for($i=4;$i<sizeof($this->kitchen);$i++){?>
                        <div class="sub"><a href="<?php echo URL;?>Product/List_products/<?php echo $this->kitchen[$i]['id'];?>">
                            <img src="<?php echo IMAGES."Products/".$this->kitchen[$i]['Image']?>"  width="100%" height="230px" />
                            <div class="product_content">
                                <center><?php echo $this->kitchen[$i]['Name']." |  ".$this->kitchen[$i]['Brand'];?></center>
                                <center>Price::
                                    <?php if($this->kitchen[$i]['Price']==$this->kitchen[$i]['Current_price'])
                                    {
                                        echo intval($this->kitchen[$i]['Price']);
                                    }else{
                                        echo "<strike>".intval($this->kitchen[$i]['Price'])."</strike>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp".intval($this->kitchen[$i]['Current_price']);
                                    } ?></center>
                                <center><?php if(!is_null($this->kitchen[$i]['Rating'])){echo "Rating:: ".$this->kitchen[$i]['Rating'];}?></center>
                            </div></a>
                        </div>
                        <?php }?>
                </div>
            <input type="button" class="left" id="r5" value="<<" />
            <input type="button" class="right" id="l5" value=">>" />
            <?php }?>
            </div>
        </div>
    </div>
</div>
<?php }?>