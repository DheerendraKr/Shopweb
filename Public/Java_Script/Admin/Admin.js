$(document).ready(function(){
    $("#save_product").submit(function(){
        var url=$(this).attr('action');
        var data=$(this).serialize();
        $.post(url,data,function(ret){
            alert(ret["msg"]);
            alert(ret["id"]);;
            $("#product_id").val(ret["id"]);
            
        },'json');
        $("#save_item").attr("disabled",true);
        $("#reset_form").attr("disabled",true);
        $("#product_image_upload").css("display","block");
        return false;
    });
    
    $("#product_image_upload").submit(function(e){
        e.preventDefault();
        $.ajax({
        url: $(this).attr('action'),
        type: "POST",
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData: false,
        success: function(data){
        alert(data);
        location.reload();
        },
        error: function(){}
        });
        return false;
    });
    
    
    
    
    
    $("#new_cat").click(function(){
        var url="http://localhost/Shopping/Admin/Add_cat/"+$("#add_cat_input").val();
        var data=$("#add_cat_input").val();
        $.post(url,data,function(ret){
            var tr="<tr><td>"+data+"</td><td><button class='rst rem_cat_btn form_button ' value='"+ret+"'  style='width:100%'>Delete</button>"
            $("#cat_table").append(tr);
            $("#add_cat_input").val("");
            $(".rem_cat_btn").click(function(){
            var ok=confirm("Are you sure !!");
            if(ok)
            {
               var url="http://localhost/Shopping/Admin/Delete_cat/"+$(this).val();
               var data=$(this).val();
               $.post(url,data,function(ret){
                   alert(ret);
               },'json');
               $(this).parent().parent().remove();
            }
        });
            
        },'json');
    });
    
    $(".rem_cat_btn").click(function(){
        var ok=confirm("Are you sure !!");
        if(ok)
        {
           var url="http://localhost/Shopping/Admin/Delete_cat/"+$(this).val();
           var data=$(this).val();
           $.post(url,data,function(ret){
              // alert(ret);
           },'json');
           $(this).parent().parent().remove();
        }
    });
    
    $("#add_subcat_btn").click(function(){
        var url="http://localhost/Shopping/Admin/Save_sub_cat/"+$("#add_subcat_input").val()+"?p="+$("#select_cat_add").prop("value");
        var data=$("#add_subcat_input").val();
        $.post(url,data,function(ret){
            alert(ret)
            $("#add_subcat_input").val("");
        });
    });
     $("#load_sub_cat").change(function(){
        var url="http://localhost/Shopping/Admin/Manage_sub_cat/"+$("#load_sub_cat").prop("value");
        var data=$(this).val();
        var row="";
        var row1="<option>--select sub-category--</option>";
        $.post(url,data,function(ret){
            for(var val in ret)
            {
                row1=row1+"<option value='"+ret[val]["Sub_cat_id"]+"'>"+ret[val]["Sub_cat"]+"</option>"
                row=row+"<tr><td>"+ret[val]["Sub_cat"]+"</td><td><button class='delete_cat form_button rst' value='"+ret[val]["Sub_cat_id"]+"'>Delete</button></td></tr>"
            }
            $("#sub_cat_list").html(row);
            $("#sub_cat_drop").html(row1);
            $(".delete_cat").click(function(){
                var ok=confirm("are you sure !!");
                if(ok)
                {
                    var ur="http://localhost/Shopping/Admin/Delete_sub_cat/"+$(this).prop("value");
                    var da=$(this).prop("value");
                    $.post(ur,da,function(ret){
                        alert(ret);
                    },'json');
                    
                    $(this).parent().parent().remove();
                }
            });
        },'json');
    });
    
    $("#load_sub_cat2").change(function(){
        var url="http://localhost/Shopping/Admin/Manage_sub_cat/"+$(this).prop("value");
        var data=$(this).val();
        var row1="<option>--select sub-category--</option>";
        $.post(url,data,function(ret){
            for(var val in ret)
            {
                row1=row1+"<option value='"+ret[val]["Sub_cat_id"]+"'>"+ret[val]["Sub_cat"]+"</option>";
            }
            $("#sub_cat_drop2").html(row1);
        },'json');
    });
    
    $("#add_brand_btn").click(function(){
        var url="http://localhost/Shopping/Admin/Save_brand/"+$("#add_brand_input").val()+"?p="+$("#sub_cat_drop").prop("value");
        var data=$("#add_subcat_input").val();
        $.post(url,data,function(ret){
            alert(ret)
            $("#add_brand_input").val("");
        },'json');
    });
    
    
    
   $("#sub_cat_drop2").change(function(){
        var url="http://localhost/Shopping/Admin/Manage_brand/"+$("#sub_cat_drop2").prop("value");
        var data=$(this).val();
        var row="";
        var row1="<option>--select sub-category--</option>";
        $.post(url,data,function(ret){
            for(var val in ret)
            {
                row1=row1+"<option value='"+ret[val]["brand_id"]+"'>"+ret[val]["Brand"]+"</option>"
                row=row+"<tr><td>"+ret[val]["Brand"]+"</td><td><button class='delete_cat form_button rst' value='"+ret[val]["brand_id"]+"'>Delete</button></td></tr>"
            }
            $("#brand_list").html(row);
            $("#brand_drop").html(row1);
            $(".delete_cat").click(function(){
                var ok=confirm("are you sure !!");
                if(ok)
                {
                    var ur="http://localhost/Shopping/Admin/Delete_brand/"+$(this).prop("value");
                    var da=$(this).prop("value");
                    $.post(ur,da,function(ret){
                        //alert(ret);
                    },'json');
                    
                    $(this).parent().parent().remove();
                }
            });
        },'json');
    }); 
    
});