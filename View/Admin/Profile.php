<div class="index">
    <div class="orders_headers"><span class="header_data">Your profile: Mr.<?php echo Session::get('user');?></span></div>
    <div class="left_bar">
        <div class="images">
            <img src="<?php echo IMAGES;?>Admin/<?php echo $this->data[0]['Image'];?>" width="100%" height="400px" id="profile_image" />
            <div class="update_image"><input type="button" class="upload_button" value="Upload Image" /></div>
        </div>
    </div>
    <div class="right_bar">
        <div class="orders_headers" style="background-color: #b3d9ff;color:#000"><span class="header_data" >Your profile Details</span></div>
        <form action="<?php echo URL;?>Login/Update_admin_profile" method="post" id="profile_page">
        <table class="v_product">
            <tr>
                <td class="prfoile_td">Id</td>
                <td class="prfoile_td"><?php echo $this->data[0]['Admin_id'];?></td>
            </tr>
            <tr>
                <td class="prfoile_td">Name</td>
                <td class="prfoile_td name"><?php echo $this->data[0]['Name'];?></td>
            </tr>
            <tr>
                <td class="prfoile_td">Email</td>
                <td class="prfoile_td email"><?php echo $this->data[0]['Email'];?></td>
            </tr>
            <tr>
                <td class="prfoile_td">Mobile</td>
                <td class="prfoile_td mobile"><?php echo $this->data[0]['Mobile'];?></td>
            </tr>
            <tr>
                <td class="prfoile_td">Authorization</td>
                <td class="prfoile_td"><?php echo $this->data[0]['Role'];?></td>
            </tr>
            <tr>
                <td class="prfoile_td">Gender</td>
                <td class="prfoile_td gender"><?php echo $this->data[0]['Gender'];?></td>
            </tr>
            <tr>
                <td class="prfoile_td">Address</td>
                <td class="prfoile_td address"><?php echo $this->data[0]['Address'];?></td>
            </tr>
            <tr>
                <td class="prfoile_td">Date Of Birth</td>
                <td class="prfoile_td dob"><?php echo $this->data[0]['DOB'];?></td>
            </tr>
            <tr>
                <td class="prfoile_td">Date Joined</td>
                <td class="prfoile_td"><?php echo $this->data[0]['Date_joined'];?></td>
            </tr>
            <tr id="psw"></tr>
            <tr>
                <td colspan="3" class="update_select" ><input type="submit" value="Update Profile" class="form_button" style="background-color:#009900" /></td>
            </tr>
        </table>
        
        </form>
    </div>
    <div<?php include URL.'View/Admin/footer.php';?></div>
</div>