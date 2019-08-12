$(document).ready(function(){
    
    
    //sort by category
    $(".load_cat").change(function(){
        var url="http://localhost/Shopping/Sort/Select_sub_cat/"+$(this).prop("value");
        var data=$(this).prop('value');
        $(".select_sub_cat").html("<option value=''>--select--</option>");
        //alert(data);
        $.post(url,data,function(ret){
            //alert("hello");
            var app="<option value=''>--select--</option>";
            var row="",row1="";
            var i=1;
            for(var sub in ret['sub_cat'])
            {
                app=app+"<option value='"+ret['sub_cat'][sub]["Sub_cat_id"]+"'>"+ret['sub_cat'][sub]["Sub_cat"]+"</option>";
            }
            $("#product_table_sort").html("");
            $("#view_product_table").html("");
            for(var ind in ret['product'])
            {
                row=row+"<tr><td  class='th1'>"+i+"</td>\n\
                        <td  class='th2'><img src='http://localhost/Shopping/Public/Images/sample.jpg' /></td>\n\
                        <td  class='th3'>"+ret['product'][ind]['Name']+"</td>\n\
                        <td  class='th4'>"+ret['product'][ind]['Rating']+"</td>\n\
                        <td  class='th5'>"+ret['product'][ind]['Price']+"</td>\n\
                        <td  class='th6'>"+(ret['product'][ind]['Price']-((ret['product'][ind]['Offer']*100)/ret['product'][ind]['Price']))+"<input type='button' class='form_button ch_pr' value='Change price'></td>\n\
                        <td  class='th7'>"+ret['product'][ind]['Quantity']+"<input type='button' class='form_button' value='Remove Items'><input type='button' class='form_button' value='Add more Items'> </td>\n\
                        <td  class='th8'><input type='button' class='form_button rst' value='Remove From Stock'></td></tr>";
                        
                row1=row1+"<tr><td  class='th1'>"+i+"</td>\n\
                        <td  class='th2'><img src='http://localhost/Shopping/Public/Images/sample.jpg' /></td>\n\
                        <td  class='th3'>"+ret['product'][ind]['Name']+"</td>\n\
                        <td  class='th4'>"+ret['product'][ind]['Rating']+"</td>\n\
                        <td  class='th5'>"+ret['product'][ind]['Price']+"</td>\n\
                        <td  class='th6'>"+(ret['product'][ind]['Price']-((ret['product'][ind]['Offer']*100)/ret['product'][ind]['Price']))+"</td>\n\
                        <td  class='th8'>"+(ret['product'][ind]['Quantity'])+"</td></tr>";
                
                i++;
            }
            $(".select_sub_cat").html(app);
            $("#product_table_sort").html(row);
            $("#view_product_table").html(row1);
            
        },'json');
    });
    
    
    //sort by sub_category
    
    $(".select_sub_cat").change(function(){
        var url="http://localhost/Shopping/Sort/Select_brand/"+$(this).prop('value');
        var data=$(this).serialize();
        //alert(data);
        
        $.post(url,data,function(ret){
            var app="<option value=''>--select--</option>";
            var row="",row1="";
            var i=1;
            for(var sub in ret['bd'])
            {
                app=app+"<option value='"+ret['bd'][sub]['brand_id']+"'>"+ret['bd'][sub]['Brand']+"</option>";
            }
            $("#view_product_table").html("");
            $("#product_table_sort").html("");
            for(var ind in ret['product'])
            {
                row=row+"<tr><td  class='th1'>"+i+"</td>\n\
                        <td  class='th2'><img src='http://localhost/Shopping/Public/Images/sample.jpg' /></td>\n\
                        <td  class='th3'>"+ret['product'][ind]['Name']+"</td>\n\
                        <td  class='th4'>"+ret['product'][ind]['Rating']+"</td>\n\
                        <td  class='th5'>"+ret['product'][ind]['Price']+"</td>\n\
                        <td  class='th6'>"+(ret['product'][ind]['Price']-((ret['product'][ind]['Offer']*100)/ret['product'][ind]['Price']))+"<input type='button' class='form_button ch_pr' value='Change price'></td>\n\
                        <td  class='th7'>"+ret['product'][ind]['Quantity']+"<input type='button' class='form_button' value='Remove Items'><input type='button' class='form_button' value='Add more Items'> </td>\n\
                        <td  class='th8'><input type='button' class='form_button rst' value='Remove From Stock'></td>";
                
                row1=row1+"<tr><td  class='th1'>"+i+"</td>\n\
                        <td  class='th2'><img src='http://localhost/Shopping/Public/Images/sample.jpg' /></td>\n\
                        <td  class='th3'>"+ret['product'][ind]['Name']+"</td>\n\
                        <td  class='th4'>"+ret['product'][ind]['Rating']+"</td>\n\
                        <td  class='th5'>"+ret['product'][ind]['Price']+"</td>\n\
                        <td  class='th6'>"+(ret['product'][ind]['Price']-((ret['product'][ind]['Offer']*100)/ret['product'][ind]['Price']))+"</td>\n\
                        <td  class='th8'>"+(ret['product'][ind]['Quantity'])+"</td></tr>";
                
                i++;
            }
            $(".select_brand").html(app);
            $("#product_table_sort").html(row);
            $("#view_product_table").html(row1);
        },'json');
    });
    
    
    //sort by brand
     $(".select_brand").change(function(){
        var url="http://localhost/Shopping/Sort/Select_product_bybrand/"+$(this).prop('value');
        var data=$(this).serialize();
        //alert(data);
        $("#product_table_sort").html("");
        $.post(url,data,function(ret){
            var row="",row1="";
            var i=1
            $("#view_product_table").html("");
            for(var ind in ret)
            {
                row=row+"<tr><td  class='th1'>"+i+"</td>\n\
                        <td  class='th2'><img src='http://localhost/Shopping/Public/Images/sample.jpg' /></td>\n\
                        <td  class='th3'>"+ret[ind]['Name']+"</td>\n\
                        <td  class='th4'>"+ret[ind]['Rating']+"</td>\n\
                        <td  class='th5'>"+ret[ind]['Price']+"</td>\n\
                        <td  class='th6'>"+(ret[ind]['Price']-((ret[ind]['Offer']*100)/ret[ind]['Price']))+"<input type='button' class='form_button ch_pr' value='Change price'></td>\n\
                        <td  class='th7'>"+ret[ind]['Quantity']+"<input type='button' class='form_button' value='Remove Items'><input type='button' class='form_button' value='Add more Items'> </td>\n\
                        <td  class='th8'><input type='button' class='form_button rst' value='Remove From Stock'></td>";
                
                row1=row1+"<tr><td  class='th1'>"+i+"</td>\n\
                        <td  class='th2'><img src='http://localhost/Shopping/Public/Images/sample.jpg' /></td>\n\
                        <td  class='th3'>"+ret[ind]['Name']+"</td>\n\
                        <td  class='th4'>"+ret[ind]['Rating']+"</td>\n\
                        <td  class='th5'>"+ret[ind]['Price']+"</td>\n\
                        <td  class='th6'>"+(ret[ind]['Price']-((ret[ind]['Offer']*100)/ret[ind]['Price']))+"</td>\n\
                        <td  class='th8'>"+(ret[ind]['Quantity'])+"</td>";
                
                i++;
            }
            $("#product_table_sort").html(row);
            $("#view_product_table").html(row1);
        },'json');
    });
    
    
    
    
    $("#select_state").change(function(){
        var data=$(this).prop('value');
        var url="http://localhost/Shopping/Sort/Select_city?p="+data;
        $.post(url,data,function(ret){
            var app="<option value=''>--select</option>";
            for(var city in ret)
            {
                app=app+"<option value='"+ret[city]["City"]+"'>"+ret[city]["City"]+"</option>";
            }
            $("#select_city").html(app);
        },'json');
    });
    
    $("#pincode").blur(function(){
        var data=$(this).val();
        var url="http://localhost/Shopping/Sort/Sort_pincode?p="+data;
        $.post(url,data,function(ret){
            var row="";
            var i=1;
            for(var ind in ret)
            {
               row=row+"<tr><td  class='th1'>"+i+"</td>\n\
                        <td  class='th2'>"+ret[ind]['Name']+"</td>\n\
                        <td  class='th3'>"+ret[ind]['Email']+"</td>\n\
                        <td  class='th8'>"+ret[ind]['Mobile']+"</td>\n\
                        <td  class='th8'>"+ret[ind]['State']+"</td>\n\
                        <td  class='th8'>"+ret[ind]['City']+"</td>\n\
                        <td  class='th8'>"+ret[ind]['Pincode']+"</td>\n\
                        <td  class='th8'><a href='localhost/Shopping/Admin/Customer_details'><input type='submit' class='form_button' value='View'></a></td>\n\
                        <td  class='th8'><a href='localhost/Shopping/Admin/Customer_details'><input type='submit' class='form_button' value='View'></a></td></tr>";
               i=i+1;
            }
           $("#customer_details").html(row);
        },'json');
    });
    $("#customer_search").click(function(){
        var url="http://localhost/Shopping/Sort/Search_email_mobile?p="+$("#email_mobile").val();
        var data=$("#email_mobile").val();
        $.post(url,data,function(ret){
           var row="";
           var i=1;
           for(var ind in ret)
           {
               row=row+"<tr><td  class='th1'>"+i+"</td>\n\
                        <td  class='th2'>"+ret[ind]['Name']+"</td>\n\
                        <td  class='th3'>"+ret[ind]['Email']+"</td>\n\
                        <td  class='th8'>"+ret[ind]['Mobile']+"</td>\n\
                        <td  class='th8'>"+ret[ind]['State']+"</td>\n\
                        <td  class='th8'>"+ret[ind]['City']+"</td>\n\
                        <td  class='th8'>"+ret[ind]['Pincode']+"</td>\n\
                        <td  class='th8'><a href='localhost/Shopping/Admin/Customer_details'><input type='submit' class='form_button' value='View'></a></td>\n\
                        <td  class='th8'><a href='localhost/Shopping/Admin/Customer_details'><input type='submit' class='form_button' value='View'></a></td></tr>";
               i=i+1;
           }
           $("#customer_details").html(row);
        },'json');
    });
    
    $("#select_city").change(function(){
        var data=$(this).prop('value');
        var url="http://localhost/Shopping/Sort/Select_customer_bycity?p="+data;
        //alert(url);
        $.post(url,data,function(ret){
            var row="";
            var i=1;
            for(var ind in ret)
            {
                row=row+"<tr><td  class='th1'>"+i+"</td>\n\
                    <td  class='th2'>"+ret[ind]['Name']+"</td>\n\
                    <td  class='th3'>"+ret[ind]['Email']+"</td>\n\
                    <td  class='th8'>"+ret[ind]['Mobile']+"</td>\n\
                    <td  class='th8'>"+ret[ind]['State']+"</td>\n\
                    <td  class='th8'>"+ret[ind]['City']+"</td>\n\
                    <td  class='th8'>"+ret[ind]['Pincode']+"</td>\n\
                    <td  class='th8'><a href='localhost/Shopping/Admin/Customer_details'><input type='submit' class='form_button' value='View'></a></td>\n\
                    <td  class='th8'><a href='localhost/Shopping/Admin/Customer_details'><input type='submit' class='form_button' value='View'></a></td></tr>";
               i=i+1;
            }
            
            $("#customer_details").html(row);
        },'json');
    });
    $("#search_employee").click(function(){
        var data=$("#search_email").prop('value');
        var url="http://localhost/Shopping/Sort/Search_employee?p="+data;
        $.post(url,data,function(ret){
            var row="";
            var i=1;
            for(var ind in ret)
            {
                row=row+"<tr><td  class='th1'>"+i+"</td>\n\
                    <td  class='th2'>"+ret[ind]['Name']+"</td>\n\
                    <td  class='th3'>"+ret[ind]['Email']+"</td>\n\
                    <td  class='th4'>"+ret[ind]['Mobile']+"</td>\n\
                    <td  class='th5'>"+ret[ind]['Gender']+"</td>\n\
                    <td  class='th6'>"+ret[ind]['DOB']+"</td>\n\
                    <td  class='th7'>"+ret[ind]['Date_joined']+"</td>\n\
                    <td  class='th8'>"+ret[ind]['Role']+"</td>\n\
                    <td  class='th8'><a href='#'><input type='Button' class='form_button' value='View' /></a></td></tr>";
               i=i+1;
            }
            
            $("#employee_details").html(row);
        },'json');
    });
    
});
