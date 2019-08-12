<!--footwear-->
<?php $i;if(sizeof($this->foot)>0){?>
<div id="deal_of_day">
    <div class="deal_label"><h4 style="margin-top:100px;">Footwears</h4>
        <a href="<?php echo URL;?>Products/View_all/Footwears?p="><input type="button" value="View All" class="form_button" style="width: 60%" /></a>
    </div>
    <div class="deal_container">
        <div class="parent">
            <div class="container">
                <div class="part part_left" id="part41">
                    <?php $i;if(sizeof($this->foot)>0){ for($i=0;$i<sizeof($this->foot);$i++){?>
                        <div class="sub"><a href="<?php echo URL;?>Products/List_products/<?php echo $this->foot[$i]['id'];?>">
                                <img src="<?php echo IMAGES."Product/".$this->foot[$i]['Image']?>"  width="100%" height="230px" />
                            <div class="product_content">
                                <center><?php echo $this->foot[$i]['Name']." |  ".$this->foot[$i]['Brand'];?></center>
                                <center>Price::
                                    <?php if($this->foot[$i]['Price']==$this->foot[$i]['Current_price'])
                                    {
                                        echo intval($this->foot[$i]['Price']);
                                    }else{
                                        echo "<strike>".intval($this->foot[$i]['Price'])."</strike>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp".intval($this->foot[$i]['Current_price']);
                                    } ?></center>
                                <center><?php if(!is_null($this->foot[$i]['Rating'])){echo "Rating:: ".$this->foot[$i]['Rating'];}?></center>
                            </div></a>
                        </div>
                    <?php }}?>
                    </div>
                    <?php if(sizeof($this->foot)>3){ ?>
                    <div class="part part_right" id="part42">
                        <?php $i; for($i=4;$i<sizeof($this->foot);$i++){?>
                        <div class="sub"><a href="<?php echo URL;?>Products/List_products/<?php echo $this->foot[$i]['id'];?>">
                            <img src="<?php echo IMAGES."Product/".$this->foot[$i]['Image']?>"  width="100%" height="230px" />
                            <div class="product_content">
                                <center><?php echo $this->foot[$i]['Name']." |  ".$this->foot[$i]['Brand'];?></center>
                                <center>Price::
                                    <?php if($this->foot[$i]['Price']==$this->foot[$i]['Current_price'])
                                    {
                                        echo intval($this->foot[$i]['Price']);
                                    }else{
                                        echo "<strike>".intval($this->foot[$i]['Price'])."</strike>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp".intval($this->foot[$i]['Current_price']);
                                    } ?></center>
                                <center><?php if(!is_null($this->foot[$i]['Rating'])){echo "Rating:: ".$this->foot[$i]['Rating'];}?></center>
                            </div></a>
                        </div>
                        <?php }?>
                    </div>
                    <input type="button" class="left" id="r4" value="<<" />
                    <input type="button" class="right" id="l4" value=">>" />
                    <?php }?>
                </div>
            </div>
        </div>
</div><?php }?>
