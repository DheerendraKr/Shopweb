$(document).ready(function(){
    $("#login_form").submit(function(){
        
        var url=$(this).attr("action");
        var data=$(this).serialize();
        var res = $(location).attr('pathname').split("/"); 
         var ur="http://localhost/Shopping/Cart/Cart_content/"+$("#login_email").val();
                var sdata=$("#login_email").val();
                $.post(ur,sdata,function(ret){
                    $("#cart_items_no").html(ret['item']);
                },'json');
        $.post(url,data,function(ret){
           if((ret[1]).match(true)){
//            $("#login_panel").fadeOut("fast");
//            $("#main_body,#header").css("filter","blur(0px)");
//            $("#login").addClass('user_profile');
//            $("#login").html(ret[0]+'<ul class="user_options"><a href="http://localhost/Shopping/User/Profile"><li>Profile</li></a><a href="#"><li>Orders</li></a><a href="#"><li>Track Order</li></a><a href="#"><li>Cancel Orders</li></a></ul>');
//            $("#login").css("color","#000");
//            $("#login").removeClass("nav_button");
//            $("#login").addClass("log_buttons");
//            $("#register").html('<a href="http://localhost/Shopping/Login/Logout">Logout</a>');
//            $("#register").removeClass("nav_button");
//            $("#register").addClass("log_buttons");
//            $(".user_profile").live('click',function(){
//            $(".user_options").css('display','block');
//            });
              location.reload();
        }
        else
        {
            alert(ret[0]);
        }
        },'json');
        
        return false;
    });
    
    
    
    $("#register_form").submit(function(){
        var url=$(this).attr("action");
        var data=$(this).serialize();
        $.post(url,data,function(o){
            if(o[1].match(true))
            {
                alert("welcome "+o[0]);
//                $("#register_panel").fadeOut("fast");
//                $("#main_body,#header").css("filter","blur(0px)");
//                $("#login").html(o[0]);
//                $("#login").removeClass("nav_button");
//                $("#login").addClass("log_buttons");
//                $("#login").html(ret[0]+'<ul class="user_options"><li>Profile</li><li>Orders</li><li>Track Order</li><li>Cancel Orders</li></ul>');
//                $("#register").html('<a href="http://localhost/Shopping/Login/Logout">Logout</a>');
//                $("#register").removeClass("nav_button");
//                $("#register").addClass("log_buttons");
//                $("#register").css("color","#fff");
                  location.reload();
            }
            else
            {
                alert(o[0]);
            }
        },'json');
        return false;
    });
    
    
    $("#forgot_check_email").submit(function(){
        var url=$(this).attr("action");
        var data=$(this).serialize();
        $("#msg").text("");
        $.post(url,data,function(ret){
            if(ret["cond"])
            {
                var page="<center>Link to reset your password has been sent to your registered email_id</center><br />\n\
                          <center><a style='color:blue;margin-top:10px;' href='http://"+ret["email"]+"' target='blank'>Check Email</a></center><br /><br />";
                $(".forgot_panel").html(page);
            }
            else
            {
                $("#msg").text("This email does not belongs to any account");
            }
        },'json');
        return false;
    });
    
    
});