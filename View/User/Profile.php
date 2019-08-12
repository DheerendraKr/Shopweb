<div class="content">
    <div class="filters">
        <center style="margin-top: 15px"><b>MY ACCOUNT</b></center><hr />
        <div class="profile_list"><ul>
            <a href="http://localhost/Shopping/Cart/All_Contents"><li>Cart</li></a>
            <a href="http://localhost/Shopping/User/Track_orders"><li>Track Orders</li></a>
            <a href="http://localhost/Shopping/User/Cancel_orders"><li>Cancel Order</li></a>
            <a href="http://localhost/Shopping/User/Orders"><li>My Orders</li></a>
            <li>Update Personel Info</li>
            <li>Update Mobile No.</li>
            <li>Update Password</li>
            <a href="http://localhost/Shopping/User/Review_ratings"><li>My Reviews and Ratings</li></a>
        </ul></div>
    </div>
    <div class="products_container">
        <span style="font-size: 20px;margin-left:110px;margin-top: 10px;"><b>Account Info</b></span><hr />
        <table class="profile_table">
            <tr style="margin-bottom:5px;">
                <td class="td2"><?php echo $this->user_details[0]['Name'];?></td>
                <td class="td3"><input type="button" value="Update" class="profile_button"></td>
            </tr>
            <tr>
                <td class="td2"><?php echo $this->user_details[0]['Email'];?></td>
                <td class="td3"><input type="button" value="Update" class="profile_button"></td>
            </tr>
            <tr>
                <td class="td2"><?php echo $this->user_details[0]['Mobile'];?></td>
                <td class="td3"><input type="button" value="Update" class="profile_button"></td>
            </tr>
        </table>
    </div>
</div>