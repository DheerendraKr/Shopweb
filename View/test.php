<div class="index">
    <div class="orders_headers"><span class="header_data">Products Data</span></div>
    <form action="<?php echo URL;?>Admin/Save_product" method="post" enctype="multipart/form-data" id="save_product">
    <table class="v_product" style="width:60%;margin:auto; align-text:left">
        <tr>
            <td class="prfoile_td">S.No.</td>
            <td class="prfoile_td">1</td>
        </tr>
        <tr>
            <td class="prfoile_td">Image</td>
            <td class="prfoile_td"><img><input type="file"  name="image_upload" /></td>
        </tr>
        <tr>
            <td class="prfoile_td">Product Name</td>
            <td class="prfoile_td"><input type="Text" class="form_input" name="Product" /></td>
        </tr>
        <tr>
            <td class="prfoile_td">Select_category</td>
            <td class="prfoile_td">
            <select class="select_cat" name='category'>
                <option value="">--select--</option>
                <option value="Electronics">Electronics</option>
                <option value="Appliances">Appliances</option>
                <option value="Men">Men</option>
                <option value="Female">Female</option>
                <option value="Books & more">Books & More</option>
            </select>
            </td>
        </tr>
        <tr>
            <td class="prfoile_td">Select_sub Category</td>
            <td class="prfoile_td"name='sub_cat' > <select class="select_cat select_sub_cat"></select></td>
        </tr>
        <tr>
            <td class="prfoile_td">Select Brand</td>
            <td class="prfoile_td">
            <select class="select_cat select_brand" name='brand'></select>
            </td>
        </tr>
        <tr>
            <td class="prfoile_td">Quantity</td>
            <td class="prfoile_td address"><input type="number" name='quantity' class="form_input" name="quantity" /></td>
        </tr>
        <tr>
            <td class="prfoile_td">Price</td>
            <td class="prfoile_td dob"><input type="text" name='price' class="form_input" placeholder="Price"></td>
        </tr>
        <tr>
            <td class="prfoile_td">Color</td>
            <td class="prfoile_td"><input type="text" name="color" class="form_input" placeholder="color"></td>
        </tr>
        <tr>
            <td class="prfoile_td">Offer</td>
            <td class="prfoile_td"><input type="number" name="offer" class="form_input" placeholder="color"></td>
        </tr>
        <tr>
            <td></td>
            <td  class="update_select" ><input type="submit" value="Save" class="form_button" style="background-color:#009900" /></td>
        </tr>
    </table>
    </form>
    <div<?php include URL.'View/Admin/footer.php';?></div>
</div>