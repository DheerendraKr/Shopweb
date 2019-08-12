<div class="content">
<!--    <div class="filters">
        <?php // include URL."View/Products/Filters/".($this->filter[0]['Category'])."_filters.php";?>
    </div>-->
<div class="products_container" style="margin-left:10%">
        <div class="sort_by"><?php include URL."View/Products/Filters/Sort_by.php";?></div>
        <div style="width:100%" id="product_list_container">
        <?php $i;if(sizeof($this->products,1)>0){ for($i=0;$i<(sizeof($this->products));$i++){?>
        <div class="product_container">
            <a href="<?php echo URL;?>Products/List_products/<?php echo $this->products[$i]['id'];?>">
                <img src="<?php echo IMAGES."Product/".$this->products[$i]['Image'];?>"  width="100%" height="230px" />
            <div class="product_det" style="ma">
                <center><?php echo $this->products[$i]['Name']." |  ".$this->products[$i]['Brand'];?></center>
                <center>Price::
                    <?php if($this->products[$i]['Price']==$this->products[$i]['Current_price'])
                    {
                        echo $this->products[$i]['Price'];
                    }else{
                        echo "<strike>".$this->products[$i]['Price']."</strike>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp".$this->products[$i]['Current_price'];
                    } ?></center>
                <center><?php if(!is_null($this->products[$i]['Rating'])){echo "Rating:: ".$this->products[$i]['Rating'];}?></center>
            </div></a>
            </div>
        <?php }}else{?><div class="product_container" style="width:98%;text-align: center;">Sorry! Nothing found</div><?php }?>
    </div>
    </div>
<?php if(sizeof($this->products)>6){    echo '<input type="button" id="load_more" class="form_button" value="Load More" style="margin-left:31.5%" />';}
        else{    echo '<a href="'.URL.'"><input type="button" id="load_more" class="form_button" value="Back" style="margin-left:31.5%" /></a>';}
?>
</div>

