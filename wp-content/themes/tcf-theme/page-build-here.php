<?php 

/*
 Template Name: Build here
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
                  
                <div class="row">
                    <div class="col-md-6">
                       <h2 class="page-heading">Building here nice title</h2> 
                        <p class="rbto-25 text-grey-f707 line-h-27 mgrt-20">
                            We will put together a detailed and specific style guide that covers. Most of our clients use our Data Analysis service to inform their strategic decision making and their targets for the immediate, mid-term and long-term future. The data sources that we use for this type of analysis include customer enquiry data, sales figures, costs, market data and customer feedback. We work with clients big and small across a range of sectors.

                        </p>
                    </div> 
                    <div class="col-md-6 mgrt-20">
                        <img src="<?php bloginfo('stylesheet_directory'); ?>/assets/img/Copy%20of%20SF-03.png" alt="" class="img-fluid">
                    </div>
                </div>
                
                
                <div class="row mgrb-40">
                    <div class="col-md-5">
                        <div class="row">
                            <div class="col-md-6 m-mgrt-30 mgrb-20">
                                <a href="" class="btn btn-arrow">LOTS AVAILABLE</a>
                            </div>
                            <div class="col-md-6 mgrb-20">
                                <a href="" class="btn btn-arrow">SCHEDULE A VISIT</a>
                            </div>
                            <div class="col-md-6 mgrb-20">
                                <a href="" class="btn btn-arrow">TALK TO AN AGENT</a>
                            </div>
                            <div class="col-md-6 mgrb-20">
                                <a href="" class="btn btn-arrow">STUCKI FARMS MAP</a>
                            </div>
                            
                        </div>
                    </div>
                </div>
                

             
               
            </div>
       </section>
        
        <?php
    } 
    
}



