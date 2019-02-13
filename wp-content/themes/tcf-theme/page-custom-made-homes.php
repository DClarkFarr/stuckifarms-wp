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

		$info = propertyPageInfo([
			'page' => $post,
			'slug' => 'live-here',
			'autoselect' => true,
		]);

		load_include('breadcrumbs-pages', [
			'active' => $info['active'],
			'pages' => $info['pages'],
		]);

		?>
        <section class="section">
            <div class="container">
                <h1 class="heading-alt">
                    <?php the_field('page_subheading'); ?>
                </h1>               
               
               <div class="row mgrt-40">
                   <div class="col-md-6">
                       <img src="<?php bloginfo('stylesheet_directory'); ?>/assets/img/custom-homes.jpg" alt="" class="img-fluid">
                   </div>
                   <div class="col-md-6">
                       <p class="custom-home-p m-mgrt-20">
                           Stucki Farms is a custom build development, we allow and encourage homes to be built differently while following the guild lines of each village.   We have a wide variety of floor plans to choose from (and all can be modified).  We will also allow you to bring your own plans.  All plans do get reviewed by a site committee to ensure the overall feel of the homes matches the village.    If you like Craftsman style homes, then the Homesteads is for you.  If you want a more modern or southern style home then the Crossroads will be a great landing spot.

                       </p>
                   </div>
               </div>
               
                <div class="property-buttons mgrt-40">
                    <a href="<?php echo home_url(); ?>/submit-plan/" class="btn btn-link btn-arrow">SUBMIT A PLAN</a>
                    <a href="<?php echo home_url(); ?>/submit-plan/?builder=true" class="btn btn-link btn-arrow">BRING A BUILDER</a>
                    <a href="<?php echo home_url(); ?>/contact/" class="btn btn-link btn-arrow">TALK TO AN AGENT</a>
                    <a href="<?php echo home_url(); ?>/live-here/lots-for-sale/" class="btn btn-link btn-arrow">BUY A LOT</a>
                    <a href="<?php echo home_url(); ?>/contact/" class="btn btn-link btn-arrow">SCHEDULE A TOUR</a>
                </div>
            </div>
        </section>
        <?php
    } 
    
}
