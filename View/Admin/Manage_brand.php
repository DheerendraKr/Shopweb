<div class="index">
    <div style="width:80%;margin-left:10%;background-color:#fff;">
    <div class="orders_headers"><span class="header_data">Add New Product Brand</span></div>
    <div class="add_cat"><center>
            <select class="select_cat" id="load_sub_cat" style="text-align: center;width: 20%;height:35px;">
                <option>---select category---</option>
                <?php  foreach ($this->category as $value) {?>
                <option value="<?php echo $value['Cat_id']?>"><?php echo $value['Category'];?></option>
                <?php }?>
            </select>
            <select id="sub_cat_drop" class="select_cat" style="text-align: center;width: 20%;height:35px;"></select>
        <input type="text" id="add_brand_input"  class="form_input add_cat_input" />
        <button id="add_brand_btn" style="width:10%" class="form_button add_cat_btn">Add</button></center>
    </div>
    <div class="orders_headers"><span class="header_data">Delete Brands</span></div>
    <div class="add_cat"><center>
            <select class="select_cat" id="load_sub_cat2" style="text-align: center;width: 30%;height:35px;">
                <option>---select category---</option>
                <?php  foreach ($this->category as $value) {?>
                <option value="<?php echo $value['Cat_id']?>"><?php echo $value['Category'];?></option>
                <?php }?>
            </select>
            <select id="sub_cat_drop2" class="select_cat" style="text-align: center;width: 30%;height:35px;"></select>
            <center><table id="brand_list"></table></center></center>
    </div>
    </div>
</div>