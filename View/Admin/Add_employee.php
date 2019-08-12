<div class="index">
    <div class="orders_headers"><span class="header_data">Add Member</span></div>
    <table class="v_product">
        <tr class="product_details">
            <th class="header_data th1">S.No.</th>
            <th class="header_data th2">Profile</th>
            <th class="header_data th3">Name</th>
            <th class="header_data th4">Email</th>
            <th class="header_data th5">Mobile No</th>
            <th class="header_data th5">password</th>
            <th class="header_data th6">Privilage</th>
            <th class="header_data th7">Gender</th>
            <th class="header_data th8">DOB</th>
            <th class="header_data th8">Action</th>
        </tr>
        <form action="<?php echo URL;?>Login/Save_employee" id="save_employee" method="post" enctype="multipart/form-data">
        <tr>
            <td class="th1">1</td>
            <td class="product_image th2">
                <img src="" width="60%"height="80px" id="p_img" />
                <input type="file" name="image" class="form_button" />
            </td>
            <td class="th3">
                <input type="text" name="name" class="form_input add_meme" placeholder="name">
            </td>
            <td class="th4">
                <input type="email" name="email" class="form_input add_meme" placeholder="email">
            </td>
            <td class="th5">
                <input type="number" name="mobile" class="form_input add_meme" placeholder="mobile">
            </td>
            <td class="th5">
                <input type="password" name="password" class="form_input add_meme" placeholder="Password">
            </td>
            <td class="th6">
                <select class="select_cat" name="role" id="select_cat">
                    <option value="0">--select--</option>
                    <option value="Admin">Admin</option>                      
                    </select>
            </td>
            <td class="th7">
                <select class="select_cat" name="gender" id="select_cat">
                    <option value="0">--select--</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </select>
            </td>
            <td class="th8"><input name="dob" type="date" class="form_input add_meme" /></td>
            <td class="th8">
                <input type="submit" class="form_button" value="Save">
                <input type="Reset" class="form_button rst" value="Reset">
            </td>
        </tr>
        </form>
    </table>
    <table id="added_employee"></table>
    <div<?php include URL.'View/Admin/footer.php';?></div>
</div>