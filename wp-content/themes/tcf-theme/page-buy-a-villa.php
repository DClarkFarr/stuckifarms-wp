<?php 

/*
 Template Name: Buy a villa page
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
        page_title_block('VACATION AT STUCKI FARMS');

		load_include('property-breadcrumb', ['page' => $post]);

		?>
      

        <section class="section">
            <div class="container">
               
                <h1 class="heading-alt">
                    <?php the_field('page_subheading'); ?>
                </h1>
               
                <h2 class="page-heading">The Villas at the Cottages</h2>
                
                <div class="book-img no-shadow">
                    <img src="<?php bloginfo('stylesheet_directory'); ?>/assets/img/Villa%20Rendering.jpg" class="img-fluid" alt="">
                    <a href="" class="btn btn-book m-btn-book mgrr-10 btn-position">Details</a>
                     <a href="" class="btn btn-book m-btn-book mgrr-10">Buy a Villa Now</a>
                </div>
                <p class="rbto-25 text-grey-f707 mgrt-80">We will put together a detailed and specific style guide that covers. Most of our clients use our Data Analysis service to inform their strategic decision making and their targets for the immediate, mid-term and long-term future. The data sources that we use for this type of analysis include customer enquiry data, sales figures, costs, market data and customer feedback. We work with clients big and small across a range of sectors.</p>
            </div>
        </section>
        
        
        
        
        <?php
    } 
    
}



