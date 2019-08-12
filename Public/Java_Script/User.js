$(document).ready(function(){
    $(".update_rating").click(function(){
        var id="update_rating_form_"+$(this).val();
        var prod_id=$(this).val();
        if($("#"+id).css("display")=="none")
        {
            $("#"+id).css("display","block");
            $("#"+id).animate({width:"100%"},100);
            $("#"+id).submit(function(){
                var url=$(this).attr("action");
                var data=$("#"+id).serialize();
                $.post(url,data,function(ret){
                    alert(ret);
                });
                $("#"+id).attr("disabled",true);
                $("#"+id).css("display","none");
                $("#"+id).css("width","0%");
                $("#feed_"+prod_id).text($("#feed_data_"+prod_id).val());
                $("#rating_"+prod_id).text($("#rating_data_"+prod_id).val());
                return false;
            });
            
        }
        else
        {
            $("#"+id).css("display","none");
            $("#"+id).css("width","0%");
        }
    });
    $(".delete_rating").click(function(){
        var url="http://localhost/Shopping/User/Delete_review?p="+$(this).val();
        var data=null;
        var prod_id=$(this).val();
        var ok=confirm("do you want to delete");
        if(ok){
            $.post(url,data,function(ret){
                alert(ret);
                $(this).parent().parent().parent().remove();
                $("#cart_content_"+prod_id).html("This review has been deleted");
            });
        }
    });
     $(".cancel_order").click(function(){
        var url="http://localhost/Shopping/User/Cancel_order?p="+$(this).val();
        var data=null;
        var prod_id=$(this).val();
        var ok=confirm("Cancel your Order");
        if(ok){
            $.post(url,data,function(ret){
                alert(ret);
                $("#this").parent().parent().parent().remove();
                $("#cart_content_"+prod_id).html("<div class='cart_content'><center><img src='http://localhost/Shopping/Public/Images/sample.jpg' width='30%' height='280px' /></center><center>No Orders</center></div>\n\
                    <a href='http://localhost/Shopping'><button class='cart_action_button' style='width:60%;margin-left:20%;background-color: #ff6600'>CONTINUE SHOPPING</button></a>");
            });
        }
    });
    
    
    
    $("#price_low").click(function(){
        var temp=window.location.href;
        var a=temp.split("=");
        var b=temp.split("/");
        var c=b[6].split("?");
        switch(c[0])
        {
            case "Product_by_cat":
                var url="http://localhost/Shopping/Products/Sort/"+c[0]+"?p="+a[1]+"&q=price asc";
                var data=null;
                $.post(url,data,function(products){
                    var values="";
                    for(var i in products)
                    {
                        values=values+"<a href='http://localhost/Shopping/Products/List_products/"+products[i]['id']+"'>\n\
                                <div class='product_container'>\
                                <img src='http://localhost/Shopping/Public/Images/Product/"+products[i]["Image"]+"' width='100%' height='230px' />\n\
                                <div class='product_det' style='ma'>\n\
                                <center>"+products[i]['Name']+" | "+products[i]['Brand']+"</center>\n\
                                <center>Price::";
                        if(parseInt(products[i]['Price'])===parseInt(products[i]['Current_price'])){ values=values+products[i]['Price'];}
                        else{values=values+ "<strike>"+products[i]['Price']+"</strike>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp"+products[i]['Current_price']}
                        values=values+"</center><center>";
                        if((products[i]['Rating']).length>0){values=values+"Rating:: "+products[i]['Rating'];}
                        values=values+"</center></div></a></div>";
                    }
                    $("#product_list_container").html(values+"</div>");
                },'json');
                break;
            case "Product_by_subcat":
                var url="http://localhost/Shopping/Products/Sort/"+c[0]+"?p="+a[1]+"&q=price asc";
                var data=null;
                $.post(url,data,function(products){
                    var values="";
                    for(var i in products)
                    {
                        values=values+"<a href='http://localhost/Shopping/Products/List_products/"+products[i]['id']+"'>\n\
                                <div class='product_container'>\
                                <img src='http://localhost/Shopping/Public/Images/Product/"+products[i]["Image"]+"' width='100%' height='230px' />\n\
                                <div class='product_det' style='ma'>\n\
                                <center>"+products[i]['Name']+" | "+products[i]['Brand']+"</center>\n\
                                <center>Price::";
                        if(parseInt(products[i]['Price'])===parseInt(products[i]['Current_price'])){ values=values+products[i]['Price'];}
                        else{values=values+ "<strike>"+products[i]['Price']+"</strike>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp"+products[i]['Current_price']}
                        values=values+"</center><center>";
                        if((products[i]['Rating']).length>0){values=values+"Rating:: "+products[i]['Rating'];}
                        values=values+"</center></div></a></div>";
                    }
                    $("#product_list_container").html(values+"</div>");
                },'json');
                break;
            case "Product_by_brand":
                var url="http://localhost/Shopping/Products/Sort/"+c[0]+"?p="+a[1]+"&q=price asc";
                var data=null;
                $.post(url,data,function(products){
                    var values="";
                    for(var i in products)
                    {
                        values=values+"<a href='http://localhost/Shopping/Products/List_products/"+products[i]['id']+"'>\n\
                                <div class='product_container'>\
                                <img src='http://localhost/Shopping/Public/Images/Product/"+products[i]["Image"]+"' width='100%' height='230px' />\n\
                                <div class='product_det' style='ma'>\n\
                                <center>"+products[i]['Name']+" | "+products[i]['Brand']+"</center>\n\
                                <center>Price::";
                        if(parseInt(products[i]['Price'])===parseInt(products[i]['Current_price'])){ values=values+products[i]['Price'];}
                        else{values=values+ "<strike>"+products[i]['Price']+"</strike>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp"+products[i]['Current_price']}
                        values=values+"</center><center>";
                        if((products[i]['Rating']).length>0){values=values+"Rating:: "+products[i]['Rating'];}
                        values=values+"</center></div></a></div>";
                    }
                    $("#product_list_container").html(values+"</div>");
                },'json');
                break;
        }
        
    });
    
    $("#price_high").click(function(){
        var temp=window.location.href;
        var a=temp.split("=");
        var b=temp.split("/");
        var c=b[6].split("?");
        switch(c[0])
        {
            case "Product_by_cat":
                var url="http://localhost/Shopping/Products/Sort/"+c[0]+"?p="+a[1]+"&q=price desc";
                var data=null;
                $.post(url,data,function(products){
                    var values="";
                    for(var i in products)
                    {
                        values=values+"<a href='http://localhost/Shopping/Products/List_products/"+products[i]['id']+"'>\n\
                                <div class='product_container'>\
                                <img src='http://localhost/Shopping/Public/Images/Product/"+products[i]["Image"]+"'  width='100%' height='230px' />\n\
                                <div class='product_det' style='ma'>\n\
                                <center>"+products[i]['Name']+" | "+products[i]['Brand']+"</center>\n\
                                <center>Price::";
                        if(parseInt(products[i]['Price'])===parseInt(products[i]['Current_price'])){ values=values+products[i]['Price'];}
                        else{values=values+ "<strike>"+products[i]['Price']+"</strike>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp"+products[i]['Current_price']}
                        values=values+"</center><center>";
                        if((products[i]['Rating']).length>0){values=values+"Rating:: "+products[i]['Rating'];}
                        values=values+"</center></div></a></div>";
                    }
                    $("#product_list_container").html(values+"</div>");
                },'json');
                break;
            case "Product_by_subcat":
                var url="http://localhost/Shopping/Products/Sort/"+c[0]+"?p="+a[1]+"&q=price desc";
                var data=null;
                $.post(url,data,function(products){
                    var values="";
                    for(var i in products)
                    {
                        values=values+"<a href='http://localhost/Shopping/Products/List_products/"+products[i]['id']+"'>\n\
                                <div class='product_container'>\
                                <img src='http://localhost/Shopping/Public/Images/Product/"+products[i]["Image"]+"' width='100%' height='230px' />\n\
                                <div class='product_det' style='ma'>\n\
                                <center>"+products[i]['Name']+" | "+products[i]['Brand']+"</center>\n\
                                <center>Price::";
                        if(parseInt(products[i]['Price'])===parseInt(products[i]['Current_price'])){ values=values+products[i]['Price'];}
                        else{values=values+ "<strike>"+products[i]['Price']+"</strike>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp"+products[i]['Current_price']}
                        values=values+"</center><center>";
                        if((products[i]['Rating']).length>0){values=values+"Rating:: "+products[i]['Rating'];}
                        values=values+"</center></div></a></div>";
                    }
                    $("#product_list_container").html(values+"</div>");
                },'json');
                break;
            case "Product_by_brand":
                var url="http://localhost/Shopping/Products/Sort/"+c[0]+"?p="+a[1]+"&q=price desc";
                var data=null;
                $.post(url,data,function(products){
                    var values="";
                    for(var i in products)
                    {
                        values=values+"<a href='http://localhost/Shopping/Products/List_products/"+products[i]['id']+"'>\n\
                                <div class='product_container'>\
                                <img src='http://localhost/Shopping/Public/Images/Product/"+products[i]["Image"]+"' width='100%' height='230px' />\n\
                                <div class='product_det' style='ma'>\n\
                                <center>"+products[i]['Name']+" | "+products[i]['Brand']+"</center>\n\
                                <center>Price::";
                        if(parseInt(products[i]['Price'])===parseInt(products[i]['Current_price'])){ values=values+products[i]['Price'];}
                        else{values=values+ "<strike>"+products[i]['Price']+"</strike>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp"+products[i]['Current_price']}
                        values=values+"</center><center>";
                        if((products[i]['Rating']).length>0){values=values+"Rating:: "+products[i]['Rating'];}
                        values=values+"</center></div></a></div>";
                    }
                    $("#product_list_container").html(values+"</div>");
                },'json');
                break;
        }
    });
    
    
    $("#by_popularity").click(function(){
        var temp=window.location.href;
        var a=temp.split("=");
        var b=temp.split("/");
        var c=b[6].split("?");
        switch(c[0])
        {
            case "Product_by_cat":
                var url="http://localhost/Shopping/Products/Sort/"+c[0]+"?p="+a[1]+"&q=Rating desc";
                var data=null;
                $.post(url,data,function(products){
                    var values="";
                    for(var i in products)
                    {
                        values=values+"<a href='http://localhost/Shopping/Products/List_products/"+products[i]['id']+"'>\n\
                                <div class='product_container'>\
                                <img src='http://localhost/Shopping/Public/Images/Product/"+products[i]["Image"]+"'  width='100%' height='230px' />\n\
                                <div class='product_det' style='ma'>\n\
                                <center>"+products[i]['Name']+" | "+products[i]['Brand']+"</center>\n\
                                <center>Price::";
                        if(parseInt(products[i]['Price'])===parseInt(products[i]['Current_price'])){ values=values+products[i]['Price'];}
                        else{values=values+ "<strike>"+products[i]['Price']+"</strike>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp"+products[i]['Current_price']}
                        values=values+"</center><center>";
                        if((products[i]['Rating']).length>0){values=values+"Rating:: "+products[i]['Rating'];}
                        values=values+"</center></div></a></div>";
                    }
                    $("#product_list_container").html(values+"</div>");
                },'json');
                break;
            case "Product_by_subcat":
                var url="http://localhost/Shopping/Products/Sort/"+c[0]+"?p="+a[1]+"&q=Rating desc";
                var data=null;
                $.post(url,data,function(products){
                    var values="";
                    for(var i in products)
                    {
                        values=values+"<a href='http://localhost/Shopping/Products/List_products/"+products[i]['id']+"'>\n\
                                <div class='product_container'>\
                                <img src='http://localhost/Shopping/Public/Images/Product/"+products[i]["Image"]+"' width='100%' height='230px' />\n\
                                <div class='product_det' style='ma'>\n\
                                <center>"+products[i]['Name']+" | "+products[i]['Brand']+"</center>\n\
                                <center>Price::";
                        if(parseInt(products[i]['Price'])===parseInt(products[i]['Current_price'])){ values=values+products[i]['Price'];}
                        else{values=values+ "<strike>"+products[i]['Price']+"</strike>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp"+products[i]['Current_price']}
                        values=values+"</center><center>";
                        if((products[i]['Rating']).length>0){values=values+"Rating:: "+products[i]['Rating'];}
                        values=values+"</center></div></a></div>";
                    }
                    $("#product_list_container").html(values+"</div>");
                },'json');
                break;
            case "Product_by_brand":
                var url="http://localhost/Shopping/Products/Sort/"+c[0]+"?p="+a[1]+"&q=Rating desc";
                var data=null;
                $.post(url,data,function(products){
                    var values="";
                    for(var i in products)
                    {
                        values=values+"<a href='http://localhost/Shopping/Products/List_products/"+products[i]['id']+"'>\n\
                                <div class='product_container'>\
                                <img src='http://localhost/Shopping/Public/Images/Product/"+products[i]["Image"]+"' width='100%' height='230px' />\n\
                                <div class='product_det' style='ma'>\n\
                                <center>"+products[i]['Name']+" | "+products[i]['Brand']+"</center>\n\
                                <center>Price::";
                        if(parseInt(products[i]['Price'])===parseInt(products[i]['Current_price'])){ values=values+products[i]['Price'];}
                        else{values=values+ "<strike>"+products[i]['Price']+"</strike>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp"+products[i]['Current_price']}
                        values=values+"</center><center>";
                        if((products[i]['Rating']).length>0){values=values+"Rating:: "+products[i]['Rating'];}
                        values=values+"</center></div></a></div>";
                    }
                    $("#product_list_container").html(values+"</div>");
                },'json');
                break;
        }
    });
    
    
    
});