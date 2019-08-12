<?php @session_start(); if(isset($_SESSION['email'])){
    if(sizeof($this->recent)>0){?>
<div id="deal_of_day">
    <div class="deal_label"><h4 style="margin-top:100px;">Recently Viewed</h4>
        
    </div>
    <div class="deal_container">
        <div class="parent">
            <div class="container">
                <div class="part part_left" id="part81">
                    <?php $i=0;if(sizeof($this->recent)>0){ for($i=0;$i<4;$i++){?>
                        <div class="sub"><a href="<?php echo URL;?>Products/List_products/<?php echo $this->recent[$i]['id'];?>?p=">
                            <img src="<?php echo IMAGES."Product/".$this->recent[$i]['Image']?>"  width="100%" height="230px" />
                            <div class="product_content">
                                <center><?php echo $this->recent[$i]['Name']." |  ".$this->recent[$i]['Brand'];?></center>
                                <center>Price::
                                    <?php if($this->recent[$i]['Price']==$this->recent[$i]['Current_price'])
                                    {
                                        echo $this->recent[$i]['Price'];
                                    }else{
                                        echo "<strike>".$this->recent[$i]['Price']."</strike>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp".$this->recent[$i]['Current_price'];
                                    } ?></center>
                                <center><?php if(!is_null($this->recent[$i]['Rating'])){echo "Rating:: ".$this->recent[$i]['Rating'];}?></center>
                            </div></a>
                        </div>
                    <?php }}?>
                </div>
                <?php if(sizeof($this->recent)>3){ ?>
                <div class="part part_right" id="part82">
                    <?php for($i=4;$i<sizeof($this->recent);$i++){?>
                        <div class="sub"><a href="<?php echo URL;?>Product/List_products/<?php echo $this->recent[$i]['id'];?>">
                            <img src="<?php echo IMAGES."Products/".$this->recent[$i]['Image']?>"  width="100%" height="230px" />
                            <div class="product_content">
                                <center><?php echo $this->recent[$i]['Name']." |  ".$this->recent[$i]['Brand'];?></center>
                                <center>Price::
                                    <?php if($this->recent[$i]['Price']==$this->recent[$i]['Current_price'])
                                    {
                                        echo $this->recent[$i]['Price'];
                                    }else{
                                        echo "<strike>".$this->recent[$i]['Price']."</strike>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp".$this->recent[$i]['Current_price'];
                                    } ?></center>
                                <center><?php if(!is_null($this->recent[$i]['Rating'])){echo "Rating:: ".$this->recent[$i]['Rating'];}?></center>
                            </div></a>
                        </div>
                        <?php }?>
                </div>
                <input type="button" class="left" id="r8" value="<<" />
                <input type="button" class="right" id="l8" value=">>" />
                <?php }?>
            </div>
        </div>
    </div>
</div>
<?php }}?>
