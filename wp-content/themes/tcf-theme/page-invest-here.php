<?php 

/*
 Template Name: Invest here
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

if (have_posts()){
    while (have_posts()){
        the_post();
        page_title_block('INVEST AT STUCKI FARMS');

		load_include('property-breadcrumb', ['page' => $post]);

		?>
        <section class="section">
            <div class="container">
                <h1 class="heading-alt">
                    <?php the_field('page_subheading'); ?>
                </h1>
                

               <h2 class="page-heading">How to invest in Stucki Farms</h2>
               
               <p class="rbto-30 text-grey-f70 mgrt-20">Give us any chance well take it. Give us any rule we'll break it. We're gonna make our dreams come true. The mate was a mighty sailin' man the Skipper brave and sure. Five passengers set sail that day for a three hour tour a three hour tour. Now the world don't move to the beat of just one drum. <span class="text-red-f500">This paragraph will be about buying cottages, villas and building as investment.</span></p>
               
               <div class="row mgrt-45">
                   <div class="col-md-8">
                       <img src="<?php bloginfo('stylesheet_directory'); ?>/assets/img/SC-8-2%20(1).jpg" class="img-fluid" alt="">
                   </div>
                    <div class="col-md-4 invest-arrow m-mgrt-20">
                       <div class="mb-4">
                            <a href="" class="btn btn-arrow">COTTAGES</a>
                        </div> 
                        <div class="mb-4">
                            <a href="" class="btn btn-arrow">VILLAS</a>
                        </div>
                        <div class="w-100"></div>
                        <div class="mb-4">
                            <a href="" class="btn btn-arrow">LOTS AVAILABLE</a>
                        </div>
                        <div class="mb-4">
                            <a href="" class="btn btn-arrow">SCHEDULE A VISIT</a>
                        </div>
                        <div class="mb-4">
                            <a href="" class="btn btn-arrow">TALK TO AN AGENT</a>
                        </div>
                   </div>
               </div>
               
               
               <p class="rbto-30 text-grey-f77 mgrt-45">Give us any chance well take it. Give us any rule we'll break it. We're gonna make our dreams come true. The mate was a mighty sailin' man the Skipper brave and sure. Five passengers set sail that day for a three hour tour a three hour tour. Now the world don't move to the beat of just one drum. <span class="text-red-f500">This paragraph will be about buying cottages, villas and building as investment.</span></p>
               
                
            </div>
        </section>
        <?php
    } 
    
}



