$(document).ready(function(){
    $(".form_button").click(function(){
        $(".update_select").html("<input type='submit' class='form_button' value='Save' />");
        $(".name").html("<input type='text' name='uname' class='form_input' value='"+$(".name").html()+"' />")
        $(".email").html("<input type='email' name='email' class='form_input' value='"+$(".email").html()+"' />")
        $(".mobile").html("<input type='number' name='mobile' class='form_input' value='"+$(".mobile").html()+"' />")
        $(".gender").html("<select name='gender' class='select_cat_profile'><option value='Male'>Male</option><option value='Female'>Female</option></select>");
        $(".address").html("<input type='text' name='state' class='form_input' placeholder='state' /><input type='text' name='city' class='form_input' placeholder='city' /><input type='number' name='pincode' class='form_input pincode' placeholder='Pincode' />");
        $(".dob").html("<input type='date' name='dob' class='form_input' value='"+$(".dob").html()+"' />");
        $("#psw").html("<td>Password</td><td><input required='true' type='password' name='password' class='form_input' disabled='true'id='ch_psw' placeholder='Click to change Password' /></td>");
    });
    $("#ch_psw").click(function(){
        alert("hello");
    });
    
    
    $("#profile_page").submit(function(){
        var url=$(this).attr('action');
        var data=$(this).serialize();
        $.post(url,data,function(ret){
            alert(ret['succ']);
            $("#login").html("<a href='http://localhost/Shopping/Admin/Profile'>"+ret['name']+"</a>");
            $(".name").html(ret['name']);
            $(".email").html(ret['email']);
            $(".mobile").html(ret['mobile']);
            $(".gender").html(ret['gender']);
            $(".address").html(ret['addr']);
            $("#psw").html("");
            $(".dob").html(ret['dob']);
            $("#profile_page").attr('disabled','true');
        },'json');
        return false;
    });
    
    $("#save_employee").submit(function(){
        var url=$(this).prop('action')
        var data=$(this).serialize();
        //alert(data);
        $.post(url,data,function(ret){
            alert(ret);
        })
        return false;
    });
});
