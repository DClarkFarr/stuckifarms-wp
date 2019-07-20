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
		<source src="<?php echo get_assets_directory(); ?>/videos.php?video=home-video-web.mp4" type="video/mp4">
	</video>
    <div class="container h-100">
        <div class="banner-content h-100 d-flex flex-columns">
            <div class="content-block text-white p-5 mt-auto">
                <h1>STUCKI FARMS</h1>
                <h4>
                    Come visit us and see why Stucki Farms is
                    <div class="hidden-md-down"></div>
                    "A Great Place To Come Home To!"
                </h4>
                <a class="btn btn-lg btn-square btn-theme-alt mt-5" href="<?php echo site_url(); ?>/about/">
                    Learn More
                </a>
            </div>
        </div>
    </div>
    
</section>

<section class="home-search-wrap section section-sm bg-theme">
    <div class="container">
        <?php load_include('form-property-search', ['params' => ['justify_row' => 'justify-content-center', 'button_primary' => false]]); ?>
    </div>
</section>   
       
<section class="section section-lg planned-community">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <h2 class="text-theme mb-1 mb-lg-5 mr-lg-5 pr-xl-5">
                    A community
                    planned for
                    families
                </h2>
            </div>
            <div class="col-lg-8">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="icon-block pr-4 pb-lg-3 mb-4">
                            <a href="<?php echo site_url(); ?>/live-here/move-in-ready-homes/" class="btn-mask">
                                <i class="mb-4 far fa-house-flood"></i>
                                <span class="text-dark font-weight-bold">Buy a house here</span>
                                <span class="text-lighter mb-1 d-inline=-block">
                                    Come look at our current models and custom-built spec homes. 
                                </span>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="icon-block pr-4 mb-4 mb-lg-0">
                            <a href="<?php echo site_url(); ?>/buy-a-vacation-rental/" class="btn-mask">
                                <i class="mb-4 far fa-hotel"></i>
                                <span class="text-dark font-weight-bold">Buy a vacation rental</span>
                                <span class="text-lighter mb-1 d-inline=-block">
                                    Cottages, cottages court, villas for sale.
                                </span>
                            </a>
                            
                        </div>
                        
                    </div>
                    <div class="w-100"></div>
                    <div class="col-lg-6">
                        <div class="icon-block pr-4 pb-lg-3 mb-4">
                            <a class="btn-mask" href="<?php echo site_url(); ?>/vacation-rentals/">
                                <i class="mb-4 far fa-plane"></i>
                                <span class="text-dark font-weight-bold">Spend vacation here</span>
                                <span class="text-lighter mb-1 d-inline=-block">
                                    Relax and enjoy beautiful Southern Utah in one of its newest resorts
                                </span>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="icon-block pr-4 mb-4 mb-lg-0">
                            <a href="<?php echo site_url(); ?>/live-here/lots-for-sale/" class="btn-mask">
                                <i class="mb-4 far fa-truck"></i>
                                <span class="text-dark font-weight-bold">Build here</span>
                                <span class="text-lighter mb-1 d-inline=-block">
                                    Bring your plan and your builder and Build it your way.
                                </span>
                            </a>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- <section class="section">
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
</section> -->
        

<section class="section parallax" style="background-image: url(<?php bloginfo('stylesheet_directory'); ?>/assets/img/home-cottages-bg.jpg);">
    
    <div class="container">
        
        
        <div class="overlay">
            <h2 class="page-heading white center fs-50">Stucki Farms RESORT</h2>
            
            <div class="villa-types">
                <div class="row mgrt-40">
                    <div class="col-md-4">
                        <img src="<?php bloginfo('stylesheet_directory'); ?>/assets/img/SC-4-2-cir.jpg" class="rounded-circle cir-img" alt="">
                        <h3 class="cir-txt">Cottages</h3>
                        <div class="text-center"><a href="<?php echo site_url(); ?>/vacation-rentals/" class="btn btn-theme btn-book-green m-btn-book-2">Book Now</a></div>
                    </div>
                    <div class="col-md-4">
                        <img src="<?php bloginfo('stylesheet_directory'); ?>/assets/img/SC-8-2-cir2.jpg" class="rounded-circle cir-img" alt="">
                        <h3 class="cir-txt">Cottage Courts</h3>
                        <div class="text-center"><a href="<?php echo site_url(); ?>/buy-a-vacation-rental/" class="btn btn-theme btn-book-green m-btn-book-2">Buy Now</a></div>
                    </div>
                    <div class="col-md-4">
                        <img src="<?php bloginfo('stylesheet_directory'); ?>/assets/img/cir3.png" class="rounded-circle cir-img" alt="">
                        <h3 class="cir-txt">Villas</h3>
                        <div class="text-center"><a href="<?php echo site_url(); ?>/vacation-here/cottages/" class="btn btn-theme btn-book-green m-btn-book-2 mgrb-no">LEARN MORE</a></div>
                    </div>
                    
                </div>
            </div>
            
        
        </div>
        
        
    </div>
    
    
</section>

<?php load_include('testimonials-carousel'); ?>
       
<?php load_include('cta-newsletter-inline'); ?>

<!--             
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
-->
        