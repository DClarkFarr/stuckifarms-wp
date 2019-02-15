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

		$info = propertyPageInfo([
			'page' => $post,
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
                  
                <div class="row">
                    <div class="col-md-6">
                        <div class="">
                             <h2 class="page-heading">Building At Stucki Farms</h2> 
                            <p class="rbto-25 text-grey-f707 line-h-27 mgrt-20">
                                                            
                                At Stucki Farms, we want your home to be built to your style. You can choose one of our floor plans or you can design your own plan, you can use one of our preferred builders or you can bring your own preferred builder. Here, you can choose from the lot where you want to build your house, to the furniture you will use to turn your new house into your new home.

                                <br><br>
                                Building and living here, you will have a 7-acre Amenity Area that is planned to be completed in 2019, featuring our Farmhouse Welcome Center, Barn Event Center and Resort Style Pool.

                            </p>
                        </div>
                      
                    </div> 
                    <div class="col-md-6 mgrt-20">
                        <h2 class="page-heading">&nbsp;</h2> 
                        <img src="<?php bloginfo('stylesheet_directory'); ?>/assets/img/Copy%20of%20SF-03.png" alt="" class="img-fluid">
                    </div>
                </div>
                
                
                <div class="row mgrb-40">
                    <div class="col-md-5">
                        <div class="row">
                            <div class="col-md-6 m-mgrt-30 mgrb-20">
                                <a href="<?php echo home_url(); ?>/live-here/lots-for-sale/" class="btn btn-arrow">LOTS AVAILABLE</a>
                            </div>
                            <div class="col-md-6 mgrb-20">
                                <a href="<?php echo home_url(); ?>/contact/" class="btn btn-arrow">SCHEDULE A VISIT</a>
                            </div>
                            <div class="col-md-6 mgrb-20">
                                <a href="<?php echo home_url(); ?>/contact/" class="btn btn-arrow">TALK TO AN AGENT</a>
                            </div>
                            <div class="col-md-6 mgrb-20">
                                <a target="_blank" href="<?php echo get_field('map_pdf', 'option'); ?>" class="btn btn-arrow">STUCKI FARMS MAP</a>
                            </div>
                            
                        </div>
                    </div>
                </div>
                

             
               
            </div>
       </section>
        
        <?php
    } 
    
}



