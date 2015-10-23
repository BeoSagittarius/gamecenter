<?php
    include('includes/backend/mysqli_connect.php');
    include('includes/functions.php');
    include('includes/frontend/header.php');
?>

    <script type="text/javascript" src="js/jssor.js"></script>
    <script type="text/javascript" src="js/jssor.slider.js"></script>
    <script>

    jQuery(document).ready(function ($) {

        var nestedSliders = [];

        $.each(["sliderh1_container", "sliderh2_container", "sliderh3_container", "sliderh4_container"], function (index, value) {

            var sliderhOptions = {
                $PauseOnHover: 1, //[Optional] Whether to pause when mouse over if a slider is auto playing, 0 no pause, 1 pause for desktop, 2 pause for touch device, 3 pause for desktop and touch device, 4 freeze for desktop, 8 freeze for touch device, 12 freeze for desktop and touch device, default value is 1
                $AutoPlaySteps: 4, //[Optional] Steps to go for each navigation request (this options applys only when slideshow disabled), the default value is 1
                $SlideDuration: 300, //[Optional] Specifies default duration (swipe) for slide in milliseconds, default value is 500
                $MinDragOffsetToSlide: 20, //[Optional] Minimum drag offset to trigger slide , default value is 20
                $SlideWidth: 200, //[Optional] Width of every slide in pixels, default value is width of 'slides' container
                //$SlideHeight: 150,                                //[Optional] Height of every slide in pixels, default value is height of 'slides' container
                $SlideSpacing: 3, //[Optional] Space between each slide in pixels, default value is 0
                $DisplayPieces: 4, //[Optional] Number of pieces to display (the slideshow would be disabled if the value is set to greater than 1), the default value is 1
                $ParkingPosition: 0, //[Optional] The offset position to park slide (this options applys only when slideshow disabled), default value is 0.
                $UISearchMode: 0, //[Optional] The way (0 parellel, 1 recursive, default value is 1) to search UI components (slides container, loading screen, navigator container, arrow navigator container, thumbnail navigator container etc).

                $BulletNavigatorOptions: {//[Optional] Options to specify and enable navigator or not
                    $Class: $JssorBulletNavigator$, //[Required] Class to create navigator instance
                    $ChanceToShow: 2, //[Required] 0 Never, 1 Mouse Over, 2 Always
                    $AutoCenter: 0, //[Optional] Auto center navigator in parent container, 0 None, 1 Horizontal, 2 Vertical, 3 Both, default value is 0
                    $Steps: 1, //[Optional] Steps to go for each navigation request, default value is 1
                    $Lanes: 1, //[Optional] Specify lanes to arrange items, default value is 1
                    $SpacingX: 0, //[Optional] Horizontal space between each item in pixel, default value is 0
                    $SpacingY: 0, //[Optional] Vertical space between each item in pixel, default value is 0
                    $Orientation: 1                                 //[Optional] The orientation of the navigator, 1 horizontal, 2 vertical, default value is 1
                }
            };
            var jssor_sliderh = new $JssorSlider$(value, sliderhOptions);

            nestedSliders.push(jssor_sliderh);
        });

        var options = {
            $AutoPlay: false, //[Optional] Whether to auto play, to enable slideshow, this option must be set to true, default value is false
            $AutoPlaySteps: 1, //[Optional] Steps to go for each navigation request (this options applys only when slideshow disabled), the default value is 1
            $AutoPlayInterval: 4000, //[Optional] Interval (in milliseconds) to go for next slide since the previous stopped if the slider is auto playing, default value is 3000
            $PauseOnHover: 1, //[Optional] Whether to pause when mouse over if a slider is auto playing, 0 no pause, 1 pause for desktop, 2 pause for touch device, 3 pause for desktop and touch device, 4 freeze for desktop, 8 freeze for touch device, 12 freeze for desktop and touch device, default value is 1

            $ArrowKeyNavigation: true, //[Optional] Allows keyboard (arrow key) navigation or not, default value is false
            $SlideDuration: 300, //[Optional] Specifies default duration (swipe) for slide in milliseconds, default value is 500
            $MinDragOffsetToSlide: 80, //[Optional] Minimum drag offset to trigger slide , default value is 20
            //$SlideWidth: 600,                                 //[Optional] Width of every slide in pixels, default value is width of 'slides' container
            $SlideHeight: 150, //[Optional] Height of every slide in pixels, default value is height of 'slides' container
            $SlideSpacing: 3, //[Optional] Space between each slide in pixels, default value is 0
            $DisplayPieces: 3, //[Optional] Number of pieces to display (the slideshow would be disabled if the value is set to greater than 1), the default value is 1
            $ParkingPosition: 0, //[Optional] The offset position to park slide (this options applys only when slideshow disabled), default value is 0.
            $UISearchMode: 0, //[Optional] The way (0 parellel, 1 recursive, default value is 1) to search UI components (slides container, loading screen, navigator container, arrow navigator container, thumbnail navigator container etc).
            $PlayOrientation: 2, //[Optional] Orientation to play slide (for auto play, navigation), 1 horizental, 2 vertical, 5 horizental reverse, 6 vertical reverse, default value is 1
            $DragOrientation: 2, //[Optional] Orientation to drag slide, 0 no drag, 1 horizental, 2 vertical, 3 either, default value is 1 (Note that the $DragOrientation should be the same as $PlayOrientation when $DisplayPieces is greater than 1, or parking position is not 0),

            $BulletNavigatorOptions: {//[Optional] Options to specify and enable navigator or not
                $Class: $JssorBulletNavigator$, //[Required] Class to create navigator instance
                $ChanceToShow: 2, //[Required] 0 Never, 1 Mouse Over, 2 Always
                $AutoCenter: 2, //[Optional] Auto center navigator in parent container, 0 None, 1 Horizontal, 2 Vertical, 3 Both, default value is 0
                $SpacingY: 5, //[Optional] Vertical space between each item in pixel, default value is 0
                $Orientation: 2                                 //[Optional] The orientation of the navigator, 1 horizontal, 2 vertical, default value is 1
            }
        };
        var jssor_slider1 = new $JssorSlider$("slider1_container", options);

        //responsive code begin
        //you can remove responsive code if you don't want the slider scales while window resizes
        function ScaleSlider() {
            var parentWidth = jssor_slider1.$Elmt.parentNode.clientWidth;
            if (parentWidth) {
                var sliderWidth = parentWidth;

                //keep the slider width no more than 809
                sliderWidth = Math.min(sliderWidth, 1135);

                jssor_slider1.$ScaleWidth(sliderWidth);
            }
            else
                window.setTimeout(ScaleSlider, 30);
        }
        ScaleSlider();

        $(window).bind("load", ScaleSlider);
        $(window).bind("resize", ScaleSlider);
        $(window).bind("orientationchange", ScaleSlider);
        //responsive code end
    });
</script>

<!-- sliderh style begin -->
<style>

    .jssorb03 {
        position: absolute;
    }
    .jssorb03 div, .jssorb03 div:hover, .jssorb03 .av {
        position: absolute;
        /* size of bullet elment */
        width: 21px;
        height: 21px;
        text-align: center;
        line-height: 21px;
        color: white;
        font-size: 12px;
        background: url(/images/web/b03.png) no-repeat;
        overflow: hidden;
        cursor: pointer;
    }
    .jssorb03 div { background-position: -5px -4px; }
    .jssorb03 div:hover, .jssorb03 .av:hover { background-position: -35px -4px; }
    .jssorb03 .av { background-position: -65px -4px; }
    .jssorb03 .dn, .jssorb03 .dn:hover { background-position: -95px -4px; }
</style>
<!-- slider style end -->

<!--content-->
<div class="container" style="padding-bottom: 70px">
    <h2 style=" font-size: 3em;    font-family: 'Montserrat Alternates', sans-serif;    color: #2d2d2d;    text-align: center;    padding: 1.3em 0;"> Gallery</h2>
    <div id="slider1_container" style="position: relative; top: 0px; left: 0px; width: 809px; height: 456px; overflow: hidden; ">
        <!-- Slides Container -->
        <div u="slides" style="cursor: move; position: absolute; left: 0px; top: 0px; width: 809px; height: 456px;
             overflow: hidden;">
            <div>
                <div id="sliderh1_container" style="position: relative; top: 0px; left: 0px; width: 809px;
                     height: 150px;">

                    <!-- Slides Container -->
                    <div u="slides" style="cursor: move; position: absolute; left: 0px; top: 0px; width: 809px; height: 150px;
                         overflow: hidden;">
                        <?php    
                            $result = get_image_by_type_id(9);
                            if(mysqli_num_rows($result) > 0){
                                while($gallery = mysqli_fetch_array($result, MYSQLI_ASSOC)){			
                        ?>
                            <div>
                                <a href="slideshow.php?tid=9" ><img u="image" title="<?= $gallery['type_name']?>" src="images/gallery/<?= $gallery['image']?>" /></a>
                            </div>
                        <?php 
                                }
                            }
                        ?>
                    </div>

                    <div u="navigator" class="jssorb03" style="bottom: 10px; right: 10px;">
                        <div u="prototype"><div u="numbertemplate"></div></div>
                    </div>
                </div>
            </div>
            
            <div>
                <div id="sliderh2_container" style="position: relative; top: 0px; left: 0px; width: 809px;
                     height: 150px;">

                    <!-- Slides Container -->
                    <div u="slides" style="cursor: move; position: absolute; left: 0px; top: 0px; width: 809px; height: 150px;
                         overflow: hidden;">
                        <?php    
                            $result = get_image_by_type_id(10);
                            if(mysqli_num_rows($result) > 0){
                                while($gallery = mysqli_fetch_array($result, MYSQLI_ASSOC)){			
                        ?>
                            <div>
                                <a href="slideshow.php?tid=10" ><img u="image" title="<?= $gallery['type_name']?>" src="images/gallery/<?= $gallery['image']?>" /></a>
                            </div>
                        <?php 
                                }
                            }
                        ?>
                    </div>
                  
                    <div u="navigator" class="jssorb03" style="bottom: 10px; right: 10px;">
                        <!-- bullet navigator item prototype -->
                        <div u="prototype"><div u="numbertemplate"></div></div>
                    </div>
 
                </div>
            </div>
            <div>
                <div id="sliderh3_container" style="position: relative; top: 0px; left: 0px; width: 809px;
                     height: 150px;">

                    <!-- Slides Container -->
                    <div u="slides" style="cursor: move; position: absolute; left: 0px; top: 0px; width: 809px; height: 150px;
                         overflow: hidden;">
                        <?php    
                            $result = get_image_by_type_id(11);
                            if(mysqli_num_rows($result) > 0){
                                while($gallery = mysqli_fetch_array($result, MYSQLI_ASSOC)){			
                        ?>
                            <div>
                                <a href="slideshow.php?tid=11" ><img u="image" title="<?= $gallery['type_name']?>" src="images/gallery/<?= $gallery['image']?>" /></a>
                            </div>
                        <?php 
                                }
                            }
                        ?>
                    </div>
                    
                    <div u="navigator" class="jssorb03" style="bottom: 10px; right: 10px;">
                        <!-- bullet navigator item prototype -->
                        <div u="prototype"><div u="numbertemplate"></div></div>
                    </div>
                    
                </div>
            </div>
            <div>
                <div id="sliderh4_container" style="position: relative; top: 0px; left: 0px; width: 809px;
                     height: 150px;">

                    <!-- Slides Container -->
                    <div u="slides" style="cursor: move; position: absolute; left: 0px; top: 0px; width: 809px; height: 150px;
                         overflow: hidden;">
                        <?php    
                            $result = get_image_by_type_id(19);
                            if(mysqli_num_rows($result) > 0){
                                while($gallery = mysqli_fetch_array($result, MYSQLI_ASSOC)){			
                        ?>
                            <div>
                                <a href="slideshow.php?tid=19" ><img u="image" title="<?= $gallery['type_name']?>" src="images/gallery/<?= $gallery['image']?>" /></a>
                            </div>
                        <?php 
                                }
                            }
                        ?>
                    </div>                    

                    <div u="navigator" class="jssorb03" style="bottom: 10px; right: 10px;">
                        <!-- bullet navigator item prototype -->
                        <div u="prototype"><div u="numbertemplate"></div></div>
                    </div>
                    
                </div>
            </div>
        </div>

        <!--#region Bullet Navigator Skin Begin -->
        <!-- Help: http://www.jssor.com/development/slider-with-bullet-navigator-jquery.html -->
        <style>
            /* jssor slider bullet navigator skin 02 css */
            /*
            .jssorb02 div           (normal)
            .jssorb02 div:hover     (normal mouseover)
            .jssorb02 .av           (active)
            .jssorb02 .av:hover     (active mouseover)
            .jssorb02 .dn           (mousedown)
            */
            .jssorb02 {
                position: absolute;
            }
            .jssorb02 div, .jssorb02 div:hover, .jssorb02 .av {
                position: absolute;
                /* size of bullet elment */
                width: 21px;
                height: 21px;
                text-align: center;
                line-height: 21px;
                color: white;
                font-size: 12px;
                background: url(images/web/b02.png) no-repeat;
                overflow: hidden;
                cursor: pointer;
            }
            .jssorb02 div { background-position: -5px -5px; }
            .jssorb02 div:hover, .jssorb02 .av:hover { background-position: -35px -5px; }
            .jssorb02 .av { background-position: -65px -5px; }
            .jssorb02 .dn, .jssorb02 .dn:hover { background-position: -95px -5px; }
        </style>
        <!-- bullet navigator container -->
        <div u="navigator" class="jssorb02" style="bottom: 16px; left: 6px;">
            <!-- bullet navigator item prototype -->
            <div u="prototype"><div u="numbertemplate"></div></div>
        </div>
        <!--#endregion Bullet Navigator Skin End -->
        <a style="display: none" href="http://www.jssor.com">Bootstrap Slider</a>
    </div>

</div>
<!-- goi file chua header -->
<?php include('includes/frontend/footer.php'); ?>