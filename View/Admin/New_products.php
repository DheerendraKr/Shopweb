<div class="index">
    <div class="orders_headers"><span class="header_data">Products Data</span></div>
    <table class="v_product">
        
            <tr class="product_details">
                <th>S.No.</th>
                <th class="td_name">Product Name</th>
                <th class="data">Category</th>
                <th class="data">Sub_Category</th>
                <th class="data">Brand</th>
                <th class="data">Quantity</th>
                <th class="data">Price</th>
                <th class="data">Color</th>
                <th class="data">Offer</th>
                <th class="data">Action</th>
                <th class="data"></th>
            </tr>
        
            <form method="post" action="<?php echo URL;?>Admin/Save_product" enctype="multipart/form-data" id="save_product">
            <tr>
                <td>1</td>
                <td><input type="Text" class="form_input" name="product" placeholder="Product_Name" /></td>
                <td class="data">
                    <select id="load_sub_cat2" class="select_cat" style="text-align: center;width: 30%;height:25px;">
                    <option>---select---</option>
                    <?php foreach ($this->category as $value) {?>
                    <option value="<?php echo $value['Cat_id']?>"><?php echo $value['Category'];?></option>
                    <?php }?>
                    </select>
                </td>
                <td class="data">
                    <select id="sub_cat_drop2" class="select_cat" style="text-align: center;"></select>
                </td>
                <td>
                    <select class="select_cat select_brand" id="brand_drop" name="brand"></select>
                </td>
                <td class="data"><input type="number" name="quantity" class="form_input" name="quantity" /></td>
                <td class="data"><input type="number" name="price" class="form_input" placeholder="Price"></td>
                <td class="data"><input type="text" name="color" class="form_input" placeholder="Color"></td>
                <td class="data"><input type="number" name="offer" class="form_input" placeholder="Offer"></td>
                <td class="data">
                    <input type="submit" class="form_button" id="save_item" value="Save">
                </td>
                <td>                    
                    <input type="reset" class="form_button rst" id="reset_form" value="Reset">
                </td>
                
            </tr>
        </form>
    </table>
    <div class="v_product" >
        <form method="post" style="display:none" id="product_image_upload" action="<?php echo URL;?>Admin/Upload_images" enctype="multipart/form-data">
            <div style="display: none"><input type="number" name="product_id" id="product_id" /></div>
            <div class="form_label">Main_image</div><input class="img_input" type="file" name="main_image" /><br/>
            <div class="form_label">Image2</div><input class="img_input" type="file" name="image2" /><br/>
            <div class="form_label">Image3</div><input class="img_input" type="file" name="image3" /><br/>
            <div class="form_label">Image4</div><input class="img_input" type="file" name="image4" /><br />
            <input type="submit" value="Upload" class="upload_image" />
        </form>
    </div>
    
    <div<?php include URL.'View/Admin/footer.php';?></div>
</div>