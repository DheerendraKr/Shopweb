<div class="content">
    <div class="main_content">
        <?php if(sizeof($this->product)>0){foreach ($this->product  as $value) {?>
        <a href="<?php echo URL;?>Products/List_products/<?php echo $value['id'];?>"><div class="product_area">
                <div class="products_image"><img src="<?php echo IMAGES."Product/".$value['Image'];?>" width="100%" height="180px" /></div>
                <div class="product_details">
                    <?php
                        echo $value['Name']." | ".$value['Brand']."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
                        if($value['Price']==$value['Current_price'])
                        {
                            echo 'Price : '.$value['Price'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
                        }
                        else{
                            echo 'Price : <strike>'.$value['Price'].'</strike>&nbsp;&nbsp;&nbsp;<span style="color:#00cc44">Offer Price : '.$value['Current_price'].'</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
                        }
                        echo 'Rating : '.$value['Rating'];
                    ?>
                </div>
        </div>
        <?php }}else
        {?>
            <div class="products_image"><img src="<?php echo IMAGES."Product/".$value['Image'];?>" width="100%" height="180px" /></div>
            <div class="product_details">No Product Found</div>
        <?php }?>
    </div>
</div>