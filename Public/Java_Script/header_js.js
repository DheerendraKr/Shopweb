$(document).ready(function(){
   
    
    $(".nav_button").click(function(){
        //alert("hello");
        switch($(this).html())
        {
            case "Login":
                if($("#login_panel").css("display")==="none")
                {
                    $("#login_panel").css("display","block");
                    $("#login_panel").parent().css("display","block");
                    $("#login_panel").css("position","fixed");
                    $("#login_panel").css("z-index","2");
                    $("#login_panel").animate({top:"170px"},500);
                    $("#header,#main_body,.content").css("filter","blur(4px)");
                    $("#login").css("color","red");
                    return;
                }
            break;
            case "Register":
                if($("#register_panel").css("display")==="none")
                {
                    $("#register_panel").css("display","block");
                    $("#register_panel").parent().css("display","block");
                    $("#register_panel").css("position","fixed");
                    $("#register_panel").animate({top:"80px"},500);
                    $("#header,#main_body,.content").css("filter","blur(4px)");
                    $("#register_panel").css("filter","blur(0px)");
                    $("#register").css("color","red");
                    return;
                }
                break;
        }
    });
    
    $("#cross_login").click(function(){
        $("#login_panel").fadeOut(100);
        $("#login_panel").animate({top:"0px"},200);
        $("#login_panel").parent().css("display","none");
        $("#header,#main_body,.content").css("filter","blur(0px)");
        $("#header").css("position","fixed");
        $("#login").css("color","#000");
        return;
    });
    $("#cross_register").click(function(){
        $("#register_panel").fadeOut(500);
        $("#register_panel").animate({top:"0px"},500);
        $("#header,#main_body,.content").css("filter","blur(0px)");
        $("#header").css("position","fixed");
        $("#register_panel").parent().css("display","none");
        $("#register").css("color","#000");
        return;
    });
    
    
    $(".rate_btn").click(function(){
        var id="rating_form_"+$(this).val();
        var prod_id=$(this).val();
        var i=$(this);
        if($("#"+id).css("display")==="none")
        {
            $("#"+id).css("display","block");
            $("#"+id).animate({width:"100%"},100);
            $("#"+id).submit(function(){
                var url=$(this).attr("action");
                var data=$("#"+id).serialize();
                $.post(url,data,function(ret){
                    alert(ret);
                    i.css("display","none");
                });
                $("#"+id).css("display","none");
                $("#"+id).css("width","0%");
                return false;
            });
            
        }
        else
        {
            $("#"+id).css("display","none");
            $("#"+id).css("width","0%");
            return;
        }
        
        return false;
    });
    
    $("#textbox1").keyup(function(){
        var url="http://localhost/Shopping/Home/Suggestions/"+$(this).val();
        var data=null;
        var row="";
        $.post(url,data,function(ret){
            for(var val in ret)
            {
                row=row+"<li class='sugg_list'>"+ret[val]['Name']+"</li>";
            }
            $("#search_suggestions").css("display","block");
            $("#suggestion").html(row);
            
            $(".sugg_list").click(function(){
                var value=$(this).html();
                $("#textbox1").val(value);
                $("#search_suggestions").css("display","none");                 
                
                $("#textbox1").blur(function(){
                    $("#search_suggestions").css("display","none");
                });
            }); 
                                    
        },'json');
        
    });
    
    $("#home_search_button").click(function(){
        if($("#textbox1").val()!=="")
        {
            var url="http://localhost/Shopping/Products/Search/"+$("#textbox1").val();
            location.href=url;
        }
    });
    
    
    
});


