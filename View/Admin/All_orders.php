<div class="index">
    <div class="orders_headers"><span class="header_data">All Orders</span></div>
    <table class="v_product">
        <tr class="product_details">
            <th class="header_data th1">Ord. No.</th>
            <th class="header_data th2">Product_details</th>
            <th class="header_data th3">Customer_Email</th>
            <th class="header_data th4">Mobile No.</th>
            <th class="header_data th5">Address</th>
            <th class="header_data th6">Quantity</th>
            <th class="header_data th7">Payment Type</th>
            <th class="header_data th8">Date Purchase</th>
            <th class="header_data th8">Expected Date of Shipment</th>
            <th class="header_data th8">Status</th>
        </tr>
        <?php foreach ($this->all_orders as $value) {?>
            <tr>
                <td  class="th1"><?php echo $value['Order_no'];?></td>
                <td class="product_image th2"><img src="<?php echo IMAGES."Product/".$value['Image'];?>" width="60%"height="80px" id="p_img" /><br />
                <?php echo $value['Name']." | ".$value['Brand'];?>
                </td>
                <td class="th3"><?php echo $value['Email'];?></td>
                <td class="th4"><?php echo $value['Mobile'];?></td>
                <td class="th5"><?php echo $value['Address'];?></td>
                <td class="th6"><?php echo $value['Quantity'];?></td>
                <td class="th7"><?php echo $value['Payment'];?></td>
                <td class="th8"><?php echo $value['Order'];?></td>
                <td class="th8"><?php echo $value['Shipment'];?></td>
                <td class="th8"><?php echo $value['Status'];?></td>
            </tr>
            <?php }?>
    </table>
    <div<?php include URL.'View/Admin/footer.php';?></div>
</div>