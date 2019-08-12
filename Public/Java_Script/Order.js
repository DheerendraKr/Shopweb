$(document).ready(function(){
    var email=null;
    var addr=null;
    $("#new_address").click(function(){
        
        $(".address_form").css("display","block");
        //$(".content").css("filter","blur(4px)");
        $("#header").css("filter","blur(4px)");
        $("#footer").css("filter","blur(4px)");
        $("#new_address,.add_btn").attr("disabled",true);   
    });
    $("#cross").click(function(){
        $(".address_form").css("display","none");
        $(".content").css("filter","blur(0px)");
        $("#header").css("filter","blur(0px)");
        $("#footer").css("filter","blur(0px)");  
        $("#new_address,.add_btn").attr("disabled",false);
    });
    
    $("#pincode").blur(function(){
        //alert("pincode is correct");
    });
	
    $(".add_btn").click(function(){
        var ok=confirm("Delete this Address");
        if(ok)
        {
            var url="http://localhost/Shopping/User/Delete_address/"+$(this).val();
            var data=null;
            $.post(url,data,function(ret){
            });
            $(this).parent().remove();
            }
	});	

    
    $("#add_address_form").submit(function(){
        var url=($(this).attr("action"));
        var data=$(this).serialize();
        var row;
        $.post(url,data,function(ret){
            row="<div style='margin-bottom:20px;' >\n\
            <input type='radio' class='addres_radio' name='address' value="+ret["id"]+
            "<span>Location : "+$("#street").val()+" </span><br />\n\
            <span class='add_data'>Pincode : "+$("#pincode").val()+"</span><br />\n\
            <span class='add_data'>City : "+$("#city").val()+"</span><br />\n\
            <span class='add_data'>State : "+$("#state").val()+"</span><br />\n\
            <button class='add_btn' style='margin-left: 39px;' value='"+ret['id']+"'>Delete</button></div>";
            $(".content").css("filter","blur(0px)");
            $("#header").css("filter","blur(0px)");
            $("#footer").css("filter","blur(0px)");
            $(".address_form").css("display","none");
            $("#new_address_aded").html(row);
            $("#new_address").attr("disabled",true);
                       
            $(".add_btn").click(function(){
                var ok=confirm("Delete this Address");
                if(ok)
                {
                    var url="http://localhost/Shopping/User/Delete_address/"+$(this).val();
                    var data=null;
                    $.post(url,data,function(ret){
                    });
                    $(this).parent().remove();
                }
            });
            
        },'json');
        
        return false;
    });
    
    $("#guest_details_form").submit(function(){
        var url=($(this).attr("action"));
        var data=$(this).serialize();
        email=$("#email").val();
        $.post(url,data,function(ret){
            $("#guest_details_form").css("display","none");
            $("#guest_email").val(ret["email"]);
            var details="<h4>Your Details</h4>Name : "+ret["name"]+"<br />Email : "+ret["email"]+"<br />Mobile No. : "+ret["mob"];
            //alert("details");
            $("#guest_details").html(details);
            
        },'json');        
        return false;
    });
    
    $("#guest_address_form").submit(function(){
        var url=($(this).attr("action"))+"/"+email;
        var data=$(this).serialize();
        var row;
        if($("#guest_email").val()==="")
        {
            alert("Please Fill Your details first ..");
            return false;
        }
        var loc=$("#street").val();
        $.post(url,data,function(ret){
            row="<div style='margin-bottom:20px;' >\n\
            <input type='radio' class='addres_radio' name='address' value='"+ret["id"]+"'/>\n\
            <span>Location : "+loc+" </span><br />\n\
            <span class='add_data'>Pincode : "+$("#pincode").val()+"</span><br />\n\
            <span class='add_data'>City : "+$("#city").val()+"</span><br />\n\
            <span class='add_data'>State : "+$("#state").val()+"</span><br />";
            $(".guest_address_form").css("display","none");
            $("#new_address_aded").html(row);
            $("#new_address").css("display","none");
            addr=ret["id"];
        },'json');
        $(".content").css("filter","blur(0px)");
        $("#header").css("filter","blur(0px)");
        $("#footer").css("filter","blur(0px)"); 
        return false;
    });
    
    
    $("#place_order").submit(function(){
        var url=$(this).attr("action");
        var data=$(this).serialize();
        $.post(url,data,function(ret){
            
            if(ret["cond"])
            {
                var msg="<div class='order_complete'><center><img src='http://localhost/Shopping/Public/Images/sample' width='50%' height='200' /></center>\n\
                        <center><span id='msg'>Order Placed ... Thanks For Your Purchase</span></center></div>";
                $(".content").html(msg);
            }
            else
            {
                var msg="<div class='order_complete'><center><img src='http://localhost/Shopping/Public/Images/sample.jpg' width='50%' height='200' /></center>\n\
                        <center><span id='msg'>Some Error occured!  Please try again later</span></center></div>";
                $(".content").html(msg);
            }
        },'json');
        return false;
    });
    $("#guest_place_order").submit(function(){
        var url=$(this).attr("action");
        var data=$(this).serialize();  
         $.post(url,data,function(ret){
            if(ret["cond"])
            {
                var msg="<div class='order_complete'><center><img src='http://localhost/Shopping/Public/Images/sample.jpg' width='50%' height='200' /></center>\n\
                        <center><span id='msg'>Order Placed ... Thanks For Your Purchase</span></center></div>";
                 $(".content").html(msg);
            }
            else
            {
                 var msg="<div class='order_complete'><center><img src='http://localhost/Shopping/Public/Images/sample.png' width='50%' height='200' /></center>\n\
                        <center><span id='msg'>Some Error occured!  Please try again later</span></center></div>";
                $(".content").html(msg);
            }
         },'json');
         return false;
     });
 });