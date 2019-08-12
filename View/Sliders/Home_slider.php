<div class="slider">
    <div class="home_slider_image"><img id="image" src="<?php echo Slider_Image;?>nokia.jpg" width="100%" height="400px" /></div>
    <input type="button" value="<<" id="left_arrow"  class="arrow" />
    <input type="button" value=">>" id="right_arrow" class="arrow" />
</div>
<script>
    var num=1;
    $(".arrow").click(function()
    {
        switch($(this).val())
        {
            case ">>":
                num=num+1;
                if(num>6)
                    num=1;
                $("#image").prop("src","<?php echo Slider_Image;?>"+num+".jpg");			
                break;
            case "<<":
                num=num-1;
                if(num<1)
                    num=6;
                $("#image").prop("src","<?php echo Slider_Image;?>"+num+".jpg");
                break;
            }
        });
</script>