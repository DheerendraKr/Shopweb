<div class="index">
    <div style="width:80%;margin-left:10%;background-color:#fff;">
    <div class="orders_headers"><span class="header_data">Add New Category</span></div>
    <div class="add_cat"><center>
        <input type="text" id="add_cat_input" placeholder="category" class="form_input add_cat_input">
        <button id="new_cat" class="form_button add_cat_btn">Add</button></center>
    </div>
    <div class="orders_headers"><span class="header_data">Delete Category</span></div>
    <div class="add_cat"><center>
            <center><table id="cat_table">
                <?php foreach ($this->category as $value) {?>
                <tr id="<?php echo $value['Cat_id'];?>._tr">
                    <td><?php echo $value['Category'];?></td>
                    <td><button  class="rem_cat_btn form_button rst" value="<?php echo $value['Cat_id'];?>" style="width:100%;height:35px">Delete</button></td>
                </tr>                    
                <?php }?>                
            </table></center>         
    </div>
    </div>
</div>