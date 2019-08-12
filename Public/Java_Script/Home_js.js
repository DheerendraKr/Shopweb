$(document).ready(function(){
    $("#l1").click(function(){
            //alert($("#part1").css('top'));

            if($("#part11").css('left')=="0px")
            {
                $("#part11").fadeOut(500);
                $("#part12").animate({left:"0px"},500);
                return false;
            }
    });
    $("#r1").click(function(){
            if($("#part12").css('left')=="0px")
            {
                $("#part11").fadeIn(500);
                $("#part12").animate({left:"1368px"},500)
                return false;
            }	
    });
	
    $("#l2").click(function(){
       //alert($("#part1").css('top'));

       if($("#part21").css('left')=="0px")
       {
           $("#part21").fadeOut(500);
           $("#part22").animate({left:"0px"},500);
           return false;
       }
    });
    $("#r2").click(function(){
            if($("#part22").css('left')=="0px")
            {
                $("#part21").fadeIn(500);
                $("#part22").animate({left:"1368px"},500)
                return false;
            }	
    });
    $("#l3").click(function(){
       //alert($("#part1").css('top'));

       if($("#part31").css('left')=="0px")
       {
           $("#part31").fadeOut(500);
           $("#part32").animate({left:"0px"},500);
           return false;
       }
    });
    $("#r3").click(function(){
            if($("#part32").css('left')=="0px")
            {
                $("#part31").fadeIn(500);
                $("#part32").animate({left:"1368px"},500)
                return false;
            }	
    });
    
    $("#l4").click(function(){
       //alert($("#part1").css('top'));

       if($("#part41").css('left')=="0px")
       {
           $("#part41").fadeOut(500);
           $("#part42").animate({left:"0px"},500);
           return false;
       }
    });
    $("#r4").click(function(){
            if($("#part42").css('left')=="0px")
            {
                $("#part41").fadeIn(500);
                $("#part42").animate({left:"1368px"},500)
                return false;
            }	
    });
    
    $("#l5").click(function(){
       //alert($("#part1").css('top'));

       if($("#part51").css('left')=="0px")
       {
           $("#part51").fadeOut(500);
           $("#part52").animate({left:"0px"},500);
           return false;
       }
    });
    $("#r5").click(function(){
            if($("#part52").css('left')=="0px")
            {
                $("#part51").fadeIn(500);
                $("#part52").animate({left:"1368px"},500)
                return false;
            }	
    });
    
    $("#l6").click(function(){
       //alert($("#part1").css('top'));

       if($("#part61").css('left')=="0px")
       {
           $("#part61").fadeOut(500);
           $("#part62").animate({left:"0px"},500);
           return false;
       }
    });
    $("#r6").click(function(){
            if($("#part62").css('left')=="0px")
            {
                $("#part61").fadeIn(500);
                $("#part62").animate({left:"1368px"},500)
                return false;
            }	
    });
        
    $("#l7").click(function(){
       //alert($("#part1").css('top'));

       if($("#part71").css('left')=="0px")
       {
           $("#part71").fadeOut(500);
           $("#part72").animate({left:"0px"},500);
           return false;
       }
    });
    $("#r7").click(function(){
            if($("#part72").css('left')=="0px")
            {
                $("#part71").fadeIn(500);
                $("#part72").animate({left:"1368px"},500)
                return false;
            }	
    });
    
    $("#l8").click(function(){
       //alert($("#part1").css('top'));

       if($("#part81").css('left')=="0px")
       {
           $("#part81").fadeOut(500);
           $("#part82").animate({left:"0px"},500);
           return false;
       }
    });
    $("#r8").click(function(){
            if($("#part82").css('left')=="0px")
            {
                $("#part81").fadeIn(500);
                $("#part82").animate({left:"1368px"},500)
                return false;
            }	
    });
    
});