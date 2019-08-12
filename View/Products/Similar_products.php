<div class="similar_products">
    <div class="parent">
        <div class="container">
            <div class="part part_left" id="part81">
                <?php $j=0;if(sizeof($this->similar)>0){ for($i=0;$i<4 && $i<sizeof($this->similar);$i++){
                    if(($this->similar[$i]['id']) != ($this->product[0]['id'])){
                    ?>
                    <div class="sub"><a href="<?php echo URL;?>Products/List_products/<?php echo $this->similar[$i]['id'];?>">
                            <img src="<?php echo IMAGES."Product/".$this->similar[$i]['Image'];?>"  width="100%" height="230px" />
                        <div class="product_content">
                            <center><?php echo $this->similar[$i]['Name']." |  ".$this->similar[$i]['Brand'];?></center>
                            <center>Price::
                                <?php if($this->similar[$i]['Price']==$this->similar[$i]['Current_price'])
                                {
                                    echo $this->similar[$i]['Price'];
                                }else{
                                    echo "<strike>".$this->similar[$i]['Price']."</strike>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp".$this->similar[$i]['Current_price'];
                                } ?></center>
                            <center><?php if(!is_null($this->similar[$i]['Rating'])){echo "Rating:: ".$this->similar[$i]['Rating'];}?></center>
                        </div></a>
                    </div>
                <?php $j++; }}}
                if($j==0){
                    echo "<center><b>NO PRODUCTS FOUND</b></center>";
                }
                ?>
            </div>
            <?php if(isset($this->similar[$j])){ ?>
            <div class="part part_right" id="part82">
                <?php $i; for($i=4;$i<sizeof($this->similar);$i++){
                    if(($this->similar[$i]['id']) != ($this->product[0]['id'])){
                    ?>
                    <div class="sub"><a href="<?php echo URL;?>Products/List_products/<?php echo $this->similar[$i]['id'];?>">
                            <img src="<?php echo IMAGES."Product/".$this->similar[$i]['Image'];?>"  width="100%" height="230px" />
                        <div class="product_content">
                            <center><?php echo $this->similar[$i]['Name']." |  ".$this->similar[$i]['Brand'];?></center>
                            <center>Price::
                                <?php if($this->similar[$i]['Price']==$this->similar[$i]['Current_price'])
                                {
                                    echo $this->similar[$i]['Price'];
                                }else{
                                    echo "<strike>".$this->similar[$i]['Price']."</strike>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp".$this->recent[$i]['Current_price'];
                                } ?></center>
                            <center><?php if(!is_null($this->similar[$i]['Rating'])){echo "Rating:: ".$this->similar[$i]['Rating'];}?></center>
                        </div></a>
                    </div>
                <?php }}?>
            </div>
            <input type="button" class="left" id="l8" value="<<" />
            <input type="button" class="right" id="r8" value=">>" />
            <?php }?>
        </div>
    </div>
</div>