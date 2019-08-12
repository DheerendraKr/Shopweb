<div class="index">
    <div style="width:80%;margin-left:10%;background-color:#fff;">
    <div class="orders_headers"><span class="header_data">Add New Sub_Category</span></div>
    <div class="add_cat"><center>
            <select class="select_cat" id="select_cat_add" style="text-align: center;width: 30%;height:35px;">
                <option>---select---</option>
                <?php  foreach ($this->category as $value) {?>
                <option value="<?php echo $value['Cat_id']?>"><?php echo $value['Category'];?></option>
                <?php }?>
            </select>
        <input type="text" id="add_subcat_input"  class="form_input add_cat_input">
        <button id="add_subcat_btn" class="form_button add_cat_btn">Add</button></center>
    </div>
    <div class="orders_headers"><span class="header_data">Delete Sub_Category</span></div>
            <div class="add_cat" ><center>Select Category
                    <select id="load_sub_cat" class="select_cat" style="text-align: center;width: 30%;height:35px;">
                <option>---select---</option>
                <?php foreach ($this->category as $value) {?>
                <option value="<?php echo $value['Cat_id']?>"><?php echo $value['Category'];?></option>
                <?php }?>
            </select>
        </center>
        <center><table id="sub_cat_list"></table></center> 
    </div>
    </div>
</div>