<div id="main_body">
    <div style="width: 100%;margin-bottom: 5px"><?php include 'view/Sliders/Slider.php';?></div>

<!--deals of day  -->
<div id="deal_of_day">
    <div class="deal_label"><h4 style="margin-top:100px;">Deals Of The Day</h4>
        <a href="<?php echo URL;?>Products/View_all/Best_deals?p=sold_quantity"><input type="button" value="View All" class="form_button" style="width: 60%" /></a>
    </div>
    <div class="deal_container">
        <div class="parent">
            <div class="container">
                    <div class="part part_left" id="part11">
                        <?php $i; for($i=0;$i<4;$i++){?>
                        <div class="sub"><a href="<?php echo URL;?>Products/List_products/<?php echo $this->deal[$i]['id'];?>">
                                <img src="<?php echo IMAGES."Product/".$this->deal[$i]['Image'];?>"  width="100%" height="230px" />
                            <div class="product_content">
                                <center><?php echo $this->deal[$i]['Name']." |  ".$this->deal[$i]['Brand'];?></center>
                                <center>Price::
                                    <?php if($this->deal[$i]['Price']==$this->deal[$i]['Current_price'])
                                    {
                                        echo intval($this->deal[$i]['Price']);
                                    }else{
                                        echo "<strike>".intval($this->deal[$i]['Price'])."</strike>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp".intval($this->deal[$i]['Current_price']);
                                    } ?></center>
                                <center><?php if(!is_null($this->deal[$i]['Rating'])){echo "Rating:: ".$this->deal[$i]['Rating'];}?></center>
                            </div></a>
                        </div>
                        <?php }?>
                    </div>
                    <div class="part part_right" id="part12">
                        <?php $i; for($i=4;$i<sizeof($this->deal);$i++){?>
                        <div class="sub"><a href="<?php echo URL;?>Products/List_products/<?php echo $this->deal[$i]['id'];?>">
                            <img src="<?php echo IMAGES."Product/".$this->deal[$i]['Image'];?>"  width="100%" height="230px" />
                            <div class="product_content">
                                <center><?php echo $this->deal[$i]['Name']." |  ".$this->deal[$i]['Brand'];?></center>
                                <center>Price::
                                    <?php if($this->deal[$i]['Price']==$this->deal[$i]['Current_price'])
                                    {
                                        echo intval($this->deal[$i]['Price']);
                                    }else{
                                        echo "<strike>".intval($this->deal[$i]['Price'])."</strike>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp".intval($this->deal[$i]['Current_price']);
                                    } ?></center>
                                <center><?php if(!is_null($this->offer[$i]['Rating'])){echo "Rating:: ".$this->offer[$i]['Rating'];}?></center>
                            </div></a>
                        </div>
                        <?php }?>
                    </div>
                <input type="button" class="left" id="r1" value="<<" />
                <input type="button" class="right" id="l1" value=">>" />
            </div>
        </div>

    </div>
</div>