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
	<video autoplay muted loop id="myVideo">
		<source src="<?php echo get_img_directory(); ?>/home-video-web.mp4" type="video/mp4">
	</video>
</section>

<div class="home-search-wrap">
    <?php load_include('form-property-search'); ?>
</div>   
       

<section class="section">
    <div class="container">
        <div class="carousel-wrap">
            <div class="owl-carousel builder-carousel">
                <div class="bg-white item">
                    <div class="head-slide">PREFFERED BUILDERS</div>
                    <div class="sub-slide-w">
                        <div class="sub-slide">We work with the best</div>
                        <div class="sub-slide">Builders in the area!</div>
                    </div>
                    <div>
                        <a href="#" class="btn btn-square btn-lg btn-theme-alt">See Builders</a>
                    </div>
                </div>
                <div class="bg-white item">
                    <div class="head-slide">BRING YOUR BUILDER</div>
                    <div class="sub-slide-w">
                        <div class="sub-slide">Bring your favorite builder</div>
                        <div class="sub-slide">for Stucki Farms approval</div>
                    </div>
                    <div>
                        <a href="#" class="btn btn-square btn-lg btn-theme-alt">Learn More</a>
                    </div>
                </div>
                <div class="bg-white item">
                    <div class="head-slide">BRING YOUR PLAN</div>
                    <div class="sub-slide-w">
                        <div class="sub-slide">Build your dream house</div>
                        <div class="sub-slide">in one of our villages</div>
                    </div>
                    <div>
                        <a href="#" class="btn btn-square btn-lg btn-theme-alt">Learn More</a>
                    </div>
                </div>
            </div>
        </div>
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
                        <div class="text-center"><a href="" class="btn btn-theme btn-book-green m-btn-book-2">Book Now</a></div>
                    </div>
                    <div class="col-md-4">
                        <img src="<?php bloginfo('stylesheet_directory'); ?>/assets/img/SC-8-2-cir2.jpg" class="rounded-circle cir-img" alt="">
                        <h3 class="cir-txt">Cottage Courts</h3>
                        <div class="text-center"><a href="" class="btn btn-theme btn-book-green m-btn-book-2">Buy Now</a></div>
                    </div>
                    <div class="col-md-4">
                        <img src="<?php bloginfo('stylesheet_directory'); ?>/assets/img/cir3.png" class="rounded-circle cir-img" alt="">
                        <h3 class="cir-txt">Villas</h3>
                        <div class="text-center"><a href="" class="btn btn-theme btn-book-green m-btn-book-2 mgrb-no">LEARN MORE</a></div>
                    </div>
                    
                </div>
            </div>
            
        
        </div>
        
        
    </div>
    
    
</section>
       
<?php load_include('cta-newsletter'); ?>
               
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
        