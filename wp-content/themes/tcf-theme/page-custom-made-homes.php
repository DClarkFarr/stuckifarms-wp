<?php
/*
 Template Name: Custom Made Homess
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
        page_title_block('Live at Stucki Farms');

		load_include('property-breadcrumb', ['page' => $post]);

		?>
        <section class="section">
            <div class="container">
                <h1 class="heading-alt">
                    <?php the_field('page_subheading'); ?>
                </h1>
                

               <h2 class="page-heading">Build your dream house at Stucki Farms</h2>
               
               
               <div class="row mgrt-40">
                   <div class="col-md-6">
                       <img src="<?php bloginfo('stylesheet_directory'); ?>/assets/img/custom-homes.jpg" alt="" class="img-fluid">
                   </div>
                   <div class="col-md-6">
                       <p class="custom-home-p m-mgrt-20">
                           At Stucki Farms you can choose the plan you want, either is an existing one we have or have our designers to create your especial plan. We have a wide variety of plans for you to choose, houses of all sizes and shapes. You can always bring your own perfect plan or the imperfect one for us to perfect it for you, no matter how, we will get you the home that you have been dreaming about.

                       </p>
                   </div>
               </div>
               
                <div class="property-buttons mgrt-40">
                    <a href="" class="btn btn-link btn-arrow">SUBMIT A PLAN</a>
                    <a href="" class="btn btn-link btn-arrow">CHOOSE A PLAN</a>
                    <a href="" class="btn btn-link btn-arrow">BRING A BUILDER</a>
                    <a href="" class="btn btn-link btn-arrow">TALK TO AN AGENT</a>
                    <a href="" class="btn btn-link btn-arrow">BUY A LOT</a>
                    <a href="" class="btn btn-link btn-arrow">PHOTO GALLERY</a>
                    <a href="" class="btn btn-link btn-arrow">READ OUR NEWS</a>
                    <a href="" class="btn btn-link btn-arrow">NEWSLETTER</a>
                    <a href="" class="btn btn-link btn-arrow">SCHEDULE A TOUR</a>
                    <a href="" class="btn btn-link btn-arrow">MORTGAGE CALCULATOR</a>
                </div>
            </div>
        </section>
        <?php
    } 
    
}
