<div class="index">
    <div class="orders_headers"><span class="header_data">Products Data</span></div>
   <div class="orders_headers sort">
    <span class="header_data pr">Select_Category</span>
    <select class="select_cat load_cat" name="category">
        <option value="">--select--</option>
        <?php foreach ($this->cat as $value) {?>
            <option value="<?php echo $value['Cat_id'];?>"><?php echo $value['Category'];?></option>
         <?php }?>
    </select>
    <?php include URL.'View/Admin/Sort.php';?></div>
    <table class="v_product">
        <tr class="product_details">
            <th class="header_data th1">S. No.</th>
            <th class="header_data th2">Image</th>
            <th class="header_data th3">Product Name</th>
            <th class="header_data th4">Ratings</th>
            <th class="header_data th5">Original Price</th>
            <th class="header_data th6">Current price</th>
            <th class="header_data th7">Quantity Left</th>
        </tr>
    </table>
    <table class="v_product" id="view_product_table"></table>
    <?php include URL.'View/Admin/footer.php';?>
</div>