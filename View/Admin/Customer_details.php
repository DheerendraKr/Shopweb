<div class="index">
    <div class="orders_headers"><span class="header_data">Customer Details</span></div>
    <div class="orders_headers sort">
     <?php include 'View/Admin/Customer_sort.php';?>
    </div>
    <table class="v_product">
        <tr class="product_details">
            <th class="header_data th1">S.No.</th>
            <th class="header_data th2">Name</th>
            <th class="header_data th3">Email</th>
            <th class="header_data th8">Mobile No.</th>
            <th class="header_data th8">State</th>
            <th class="header_data th8">City</th>
            <th class="header_data th8">Pincode</th>
            <th class="header_data th8">Purchased Items</th>
            <th class="header_data th8">Cart</th>
        </tr>
    </table>
    <table class="v_product" id="customer_details"></table>
    <div<?php include URL.'View/Admin/footer.php';?></div>
</div>