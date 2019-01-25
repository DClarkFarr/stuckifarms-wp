<?php
/*
 Template Name: front page
 *
 * This is your custom page template. You can create as many of these as you need.
 * Simply name is "page-whatever.php" and in add the "Template Name" title at the
 * top, the same way it is here.
 *
 * When you create your page, you can just select the template and viola, you have
 * a custom page template to call your very own. Your mother would be so proud.
 *
 * For more info: http://codex.wordpress.org/Page_Templates
*/
?>


<section class="video-banner first-block">
	<div class="bg bg-theme-transparent"></div>
	<video autoplay muted loop id="myVideo">
		<source src="<?php echo get_img_directory(); ?>/home-video.mp4" type="video/mp4">
	</video>
	<section class="section">
		
	</section>
</section>
 <!--     slider           -->

            <script src="<?php bloginfo('stylesheet_directory'); ?>/assets/js/jssor.slider-27.5.0.min.js" type="text/javascript"></script>
            <script type="text/javascript">
                jssor_1_slider_init = function() {

                    var jssor_1_SlideshowTransitions = [
                      {$Duration:800,$Opacity:2}
                    ];

                    var jssor_1_SlideoTransitions = [
                      [{b:0,d:600,x:-1047,y:2,e:{x:27}}],
                      [{b:300,d:500,x:-1045,y:4,e:{x:8}}],
                      [{b:500,d:440,x:-1060,y:27}],
                      [{b:0,d:600,x:-1047,y:2,e:{x:27}}],
                      [{b:300,d:500,x:-1047,y:4,e:{x:8}}],
                      [{b:500,d:440,x:-1060,y:27}],
                      [{b:0,d:600,x:-1047,y:2,e:{x:27}}],
                      [{b:300,d:500,x:-1047,y:4,e:{x:8}}],
                      [{b:500,d:440,x:-1060,y:27}]
                    ];

                    var jssor_1_options = {
                      $AutoPlay: 1,
                      $Idle: 2000,
                      $SlideshowOptions: {
                        $Class: $JssorSlideshowRunner$,
                        $Transitions: jssor_1_SlideshowTransitions,
                        $TransitionsOrder: 1
                      },
                      $CaptionSliderOptions: {
                        $Class: $JssorCaptionSlideo$,
                        $Transitions: jssor_1_SlideoTransitions
                      },
                      $ArrowNavigatorOptions: {
                        $Class: $JssorArrowNavigator$
                      }
                    };

                    var jssor_1_slider = new $JssorSlider$("jssor_1", jssor_1_options);

                    /*#region responsive code begin*/

                    var MAX_WIDTH = 1200;

                    function ScaleSlider() {
                        var containerElement = jssor_1_slider.$Elmt.parentNode;
                        var containerWidth = containerElement.clientWidth;

                        if (containerWidth) {

                            var expectedWidth = Math.min(MAX_WIDTH || containerWidth, containerWidth);

                            jssor_1_slider.$ScaleWidth(expectedWidth);
                        }
                        else {
                            window.setTimeout(ScaleSlider, 30);
                        }
                    }

                    ScaleSlider();

                    $Jssor$.$AddEvent(window, "load", ScaleSlider);
                    $Jssor$.$AddEvent(window, "resize", ScaleSlider);
                    $Jssor$.$AddEvent(window, "orientationchange", ScaleSlider);
                    /*#endregion responsive code end*/
                };
            </script>
            <link href="//fonts.googleapis.com/css?family=Roboto:100,100italic,300,300italic,regular,italic,500,500italic,700,700italic,900,900italic&subset=latin-ext,greek-ext,cyrillic-ext,greek,vietnamese,latin,cyrillic" rel="stylesheet" type="text/css" />
            <style>
                /*jssor slider loading skin spin css*/
                .jssorl-009-spin img {
                    animation-name: jssorl-009-spin;
                    animation-duration: 1.6s;
                    animation-iteration-count: infinite;
                    animation-timing-function: linear;
                }

                @keyframes jssorl-009-spin {
                    from { transform: rotate(0deg); }
                    to { transform: rotate(360deg); }
                }

                /*jssor slider arrow skin 054 css*/
                .jssora054 {display:block;position:absolute;cursor:pointer;}
                .jssora054 .a {fill:none;stroke:#000;stroke-width:640;stroke-miterlimit:10;}
                .jssora054:hover {opacity:.8;}
                .jssora054.jssora054dn {opacity:.5;}
                .jssora054.jssora054ds {opacity:.3;pointer-events:none;}
            </style>
            <div id="jssor_1" style="position:relative;margin:0 auto;top:0px;left:0px;width:1200px;height:520px;overflow:hidden;visibility:hidden;">
                <!-- Loading Screen -->
                <div data-u="loading" class="jssorl-009-spin" style="position:absolute;top:0px;left:0px;width:100%;height:100%;text-align:center;background-color:rgba(0,0,0,0.7);">
                    <img style="margin-top:-19px;position:relative;top:50%;width:38px;height:38px;" src="<?php bloginfo('stylesheet_directory'); ?>/assets/img/spin.svg" />
                </div>
                <div data-u="slides" style="cursor:default;position:relative;top:0px;left:0px;width:1200px;height:520px;overflow:hidden;">
                    <div style="background-color:#ffffff;">
                        <div class="head-slid" data-t="0" style="position:absolute;top:83px;left:1205px;width:660px;height:70px;font-family:Roboto,sans-serif;font-size:64px;font-weight:500;color:#868686;line-height:1.2;text-align:left;">PREFFERED BUILDERS</div>
                        <div class="sub-slide-w" data-t="1" style="position:absolute;top:179px;left:1207px;width:384px;height:111px;font-family:Roboto,sans-serif;font-size:36px;font-weight:400;color:#868686;line-height:1.2;text-align:left;">
                            <div class="sub-slide">We work with the best</div>
                            <div class="sub-slide">Builders in the area!</div>
                        </div>
                        <div data-t="2" style="position:absolute;top:323px;left:1206px;width:261px;height:40px;font-family:Roboto,sans-serif;font-size:32px;color:#000000;line-height:1.2;text-align:center;">
                            <a href="#" class="btn slidetn" style="background:#541B00;color:#fff;font-size:24px;padding-left: 40px;padding-right:40px;padding-top:10px;padding-bottom:10px;">See Builders</a>
                        </div>
                    </div>
                    <div style="background-color:#ffffff;">
                        <div class="head-slid" data-t="3" style="position:absolute;top:83px;left:1205px;width:660px;height:70px;font-family:Roboto,sans-serif;font-size:64px;font-weight:500;color:#868686;line-height:1.2;text-align:left;">BRING YOUR BUILDER</div>
                        <div class="sub-slide-w" data-t="4" style="position:absolute;top:179px;left:1207px;width:465px;height:111px;font-family:Roboto,sans-serif;font-size:36px;font-weight:400;color:#868686;line-height:1.2;text-align:left;">
                            <div class="sub-slide">Bring your favorite builder&nbsp;</div>
                            <div class="sub-slide">for Stucki Farms approval</div>
                        </div>
                        <div data-t="5" style="position:absolute;top:323px;left:1206px;width:261px;height:40px;font-family:Roboto,sans-serif;font-size:32px;color:#000000;line-height:1.2;text-align:center;">
                            <a href="#" class="btn slidetn" style="background:#541B00;color:#fff;font-size:24px;padding-left: 40px;padding-right:40px;padding-top:10px;padding-bottom:10px;">Learn More...</a>
                        </div>
                    </div>
                    <div style="background-color:#ffffff;">
                        <div class="head-slid" data-t="6" style="position:absolute;top:83px;left:1205px;width:660px;height:70px;font-family:Roboto,sans-serif;font-size:64px;font-weight:500;color:#868686;line-height:1.2;text-align:left;">BRING YOUR PLAN</div>
                        <div class="sub-slide-w" data-t="7" style="position:absolute;top:179px;left:1207px;width:465px;height:111px;font-family:Roboto,sans-serif;font-size:36px;font-weight:400;color:#868686;line-height:1.2;text-align:left;">
                            <div class="sub-slide">Build your dream house&nbsp;</div>
                            <div class="sub-slide">in one of our villages</div>
                        </div>
                        <div data-t="8" style="position:absolute;top:323px;left:1206px;width:261px;height:40px;font-family:Roboto,sans-serif;font-size:32px;color:#000000;line-height:1.2;text-align:center;">
                            <a href="#" class="btn slidetn" style="background:#541B00;color:#fff;font-size:24px;padding-left: 40px;padding-right:40px;padding-top:10px;padding-bottom:10px;">Learn More...</a>
                        </div>
                    </div>
                </div>
                <!-- Arrow Navigator -->
                <div data-u="arrowleft" class="jssora054" style="width:55px;height:55px;top:0px;left:10px;" data-autocenter="2" data-scale="0.75" data-scale-left="0.75">
                    <img src="<?php bloginfo('stylesheet_directory'); ?>/assets/img/left.png" alt="" class="left-arrow-slider">
                </div>
                <div data-u="arrowright" class="jssora054" style="width:55px;height:55px;top:0px;right:10px;" data-autocenter="2" data-scale="0.75" data-scale-right="0.75">
                    <img src="<?php bloginfo('stylesheet_directory'); ?>/assets/img/right.png" alt="" class="right-arrow-slider">
                </div>
            </div> 
            <script type="text/javascript">jssor_1_slider_init();</script>
            <!-- #endregion Slider End -->



            </div>
        </section>
        
       
       
       <section class="section parallax" style="background-image: url(<?php bloginfo('stylesheet_directory'); ?>/assets/img/SC-8-2.jpg);">
        
        <div class="container">
            
            
            <div class="overlay">
                <h2 class="page-heading white center fs-50">The  COTTAGES At The Village</h2>
                
                <div class="villa-types">
                    <div class="row mgrt-40">
                        <div class="col-md-4">
                           <img src="<?php bloginfo('stylesheet_directory'); ?>/assets/img/SC-4-2-cir.jpg" class="rounded-circle cir-img" alt="">
                           <h3 class="cir-txt">Cottages</h3>
                           <center><a href="" class="btn btn-book-green m-btn-book-2">Book Now</a></center>
                        </div>
                        <div class="col-md-4">
                           <img src="<?php bloginfo('stylesheet_directory'); ?>/assets/img/SC-8-2-cir2.jpg" class="rounded-circle cir-img" alt="">
                           <h3 class="cir-txt">Cottage Courts</h3>
                           <center><a href="" class="btn btn-book-green m-btn-book-2">Buy Now</a></center>
                        </div>
                        <div class="col-md-4">
                           <img src="<?php bloginfo('stylesheet_directory'); ?>/assets/img/cir3.png" class="rounded-circle cir-img" alt="">
                           <h3 class="cir-txt">Villas</h3>
                           <center><a href="" class="btn btn-book-green m-btn-book-2 mgrb-no">LEARN MORE</a></center>
                        </div>
                        
                    </div>
                </div>
                
            
            </div>
            
            
        </div>
       
        
       </section>    
       
    
        <?php require get_template_directory() . '/includes/cta-newsletter.php'; ?>
        
        
        
        <section class="section home-wagon" style="background-image: url(<?php bloginfo('stylesheet_directory'); ?>/assets/img/StuckiFarms-home-wagon.jpg);">
            <div class="container">
                <div class="row mgrt-400 mgrb-80">
                    <div class="col-md-3 col-6">
                        <a href="#" class="btn btn-green btn-green-2 btn-bdr">LIVE HERE</a>
                    </div>
                     <div class="col-md-3 col-6">
                        <a href="#" class="btn btn-green btn-green-2 btn-bdr">VACATION HERE</a>
                    </div>
                    <div class="col-md-3 col-6">
                        <a href="#" class="btn btn-green btn-green-2 btn-bdr">INVEST HERE</a>
                    </div>
                    <div class="col-md-3 col-6">
                        <a href="#" class="btn btn-green btn-green-2 btn-bdr">WORK HERE</a>
                    </div> 
                    
                </div>
            </div>
        </section>
        

