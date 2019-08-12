<span class="header_data pr">Select_State</span>
<select class="select_cat" id="select_state">
    <option value="">--select--</option>
    <?php foreach ($this->select_state as $value) {
        ?><option value="<?php echo $value['State'];?>"><?php echo $value['State'];?></option><?php }
    ?>
    
</select>
<span class="header_data pr">Select_City</span>
<select class="select_cat" id="select_city"></select>
<span class="header_data pr">Pincode</span>
<input type="number" class="pincode_input" id="pincode" />
<input type="text" id="email_mobile" name="search" class="search_input" placeholder="Search by email/mobile" /><input type="button" value="Search" id="customer_search" class="search_button" />