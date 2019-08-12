<div class="index">
    <div class="orders_headers"><span class="header_data">Employee Detsils</span></div>
    <div class="orders_headers sort">
        <input type="text" name="search" class="search_input" id="search_email" placeholder="Search by email/mobile" /><input type="button" value="Search" id="search_employee" class="search_button" />
        <a href="<?php echo URL;?>Admin/Add_employee"><input type="button" value="Add New Member" class="new_member" /></a>
    </div>
    <table class="v_product">
        <tr class="product_details">
            <th class="header_data th1">S.No.</th>
            <th class="header_data th2">Name</th>
            <th class="header_data th3">Email_id</th>
            <th class="header_data th4">Mobile No.</th>
            <th class="header_data th5">Gender</th>
            <th class="header_data th6">DOB</th>
            <th class="header_data th7">Date of joining</th>
            <th class="header_data th8">Role</th>
            <th class="header_data th8">View_Profile</th>
        </tr>
    </table>
    <table class="v_product" id="employee_details"></table>
    <div<?php include URL.'View/Admin/footer.php';?></div>
</div>