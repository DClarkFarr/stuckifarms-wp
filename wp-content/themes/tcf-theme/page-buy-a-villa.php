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
               
                <h2 class="page-heading">The Villas at the Cottages</h2>
                
                <div class="book-img no-shadow">
                    <img src="<?php bloginfo('stylesheet_directory'); ?>/assets/img/main-villa-thumb.jpg?v=2" class="img-fluid" alt="">
                    <div class="buttons text-right">
                        <a href="<?php the_permalink( get_field('vila_property_page', 'option') ); ?>" class="btn btn-theme btn-book">Details</a>
                        <a href="<?php echo home_url('/contact/'); ?>" class="btn btn-book btn-theme m-btn-book mgrr-10">Buy a Villa</a>
                    </div>
                </div>
                <p class="rbto-25 text-grey-f707 mt-5">
                    The Villa at the Cottages is a 6320 square foot 9 bedroom, 11 bathroom Nightly Rental .  It has been beautifully designed with it’s 9 themed bedrooms, all with their own spacious master bathrooms, Wrap around patio, 2 garages with parking for 4 cars, and an ATV garage.  As you walk into this functional and spacious home, it features a grand kitchen with seating for over 20 people, which boasts  a sub-zero style refrigerator, gas range, two dishwashers, double oven, microwave, ice maker and two separate islands.  Across from this open concept kitchen, there is a lovely gathering room which features a floor-to-ceiling gas fireplace, comfortable seating, and organic décor.  The kitchen and great room both have 20-foot accordion doors which open up to a breathtaking view of Southern Utah at it’s best.  Adjoining the kitchen is the recreation room, perfect for watching a movie or the “Big Game”  It features a comfy sofa which seats 10-12, work space and kitchenette, complete with microwave and mini-fridge.  The main level features 5 different rooms, all thoughtfully designed with St. George’s stunning desert landscape in mind. The second level features an additional 4 bedrooms with a completely separate Casita over the 2nd garage. The back yard features a 8 person spa, a pizza oven, BBQ,  pergola, an outdoor patio set that seats 10, and comfy lounge furniture.  The Villa sits 50 feet from the resort pool, lazy river and farmhouse welcome center and restaurant.
                </p>
            </div>
        </section>
        
        
        
        
        <?php
    } 
    
}



