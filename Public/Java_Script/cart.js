$(document).ready(function(){
    $("#add_to_cart").click(function(){
        var path=$(this).val();
        //alert(path);
        var url="http://localhost/Shopping/Cart/Add_to_cart/"+path;
        var data=$(this).val();
        $.post(url,data,function(ret){
            if(ret["cond"])
            {
                var qt=parseInt($("#cart_items_no").text());
                var num=parseInt(qt)+1;               
                $("#cart_items_no").text(num);
                alert(ret["msg"]);
                $(this).attr("disabled",true);
            }
            else
            {
                alert(ret["msg"]);
            }
        },'json');
    });
    
    $("#add").click(function(){
        $("#quantity_input").val(parseInt($("#quantity_input").val())+1);
        $("#remove").attr("disabled",false);
        var url="http://localhost/Shopping/Cart/Add_more/"+$(this).val();
        var data=null;
        $.post(url,data,function(ret){
            alert(ret);
            location.reload();
        });
    });
    $(".remove_from_cart").click(function(){
        var url="http://localhost/Shopping/Cart/Remove_from_cart/"+$(this).val();
        var data=null;
        $.post(url,data,function(ret){
            alert(ret);
            location.reload();
        });
    });
    
});