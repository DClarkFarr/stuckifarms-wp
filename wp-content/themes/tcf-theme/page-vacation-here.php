<?php 

/*
 Template Name: Vacation Here
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
                

               <h2 class="page-heading">The Cottages at The Village</h2>
               
               <p class="rbto-30 text-grey-f707">Inspired by the Bungalow Courts built along the West Coast in the early 1900s, these quaint homes were grouped around common courtyards.  Several areas in Stucki Farms present unique opportunities to create clusters of these Bungalows and Casitas gathered around a series of landscaped common areas where there is always the opportunity to stop and visit or simply say “hello”.</p>
               
              <div class="row mgrt-100">
                  <div class="col-md-6">
                      <div class="book-img">
                          <img src="<?php bloginfo('stylesheet_directory'); ?>/assets/img/SC-4-2.jpg" class="img-fluid" alt="">
                          <a href="" class="btn btn-book">Book Now</a>
                      </div>
                  </div>
                  <div class="col-md-6">
                      <p class="rbto-25 text-grey-f707 mgrl-15 m-mgrt-20 no-mgrl">The Cottages at The Village at Stucki Farms is a unique courtyard community located within Stucki Farms.  Surrounded by beautiful red buttes, Residents and Guests will enjoy a stunning view of Pine Valley Mountain.  Minutes away from the off road trails in Warner Valley, the sand dunes and beaches at Sand Hollow State Park, the red rocks of Snow Canyon State Park, Broadway talent of Tuachan Outdoor Amphitheater, slopes of Brian Head Ski Resort, and the breathtaking beauty of Zion National Park.  Residents and Guests can enjoy numerous recreational activities such as mountain biking, golf, art, theater & music performances around all of the Southern Utah area!</p>
                  </div>
                </div>
                 <div class="row mgrt-20 m-mgrt-40">
                     
                     
                <div class="col-md-6 mob">
                      <div class="book-img">
                          <img src="<?php bloginfo('stylesheet_directory'); ?>/assets/img/sc_1_2.jpg" class="img-fluid" alt="">
                          <a href="" class="btn btn-book">Book Now</a>
                      </div>
                  </div>
                     
                 <div class="col-md-6">
                      <p class="rbto-25 text-grey-f707 mgrt-60 m-mgrt-20">The Cottages sit on over 19 acres with views of the surrounding red rock.  The village is inspired by courtyard style living that brings people together.  The quaint Bungalows and Casitas consist of single and two-story individual homes.  The 7 acre Amenity Area has plans to include a Farmhouse Welcome Center, Resort Style Pool, Barn Event Center, and walking trails surrounded by open space to enjoy all kinds of activities!</p>
                  </div>
                  <div class="col-md-6 desk">
                      <div class="book-img">
                          <img src="<?php bloginfo('stylesheet_directory'); ?>/assets/img/sc_1_2.jpg" class="img-fluid" alt="">
                          <a href="" class="btn btn-book">Book Now</a>
                      </div>
                  </div>
                  
               </div>
               
               <p class="rbto-25 text-grey-f707 mgrt-30">Home sizes range from a one bedroom (529 square feet) to 3 bedrooms (1283 square feet).  The unique design offers a wide variety of options for vacation rentals, family reunions, corporate retreats, second home buyers, and single family residences.
               <br>
               <br>

                A desirable benefit of The Cottages at The Village at Stucki Farms is the nightly rental zoning, which allows for vacation rentals.  This is a great option for second Home Owners and Investors who want to have a vacation home in Southern Utah and also provide the opportunity for others to experience Southern Utah’s serene beauty.
                </p>
                
            </div>
        </section>
        
        <hr class="bdr-green">
        
        <section class="section">
            <div class="container">
                <h2 class="page-heading">The Villas at the Cottages</h2>
                
                <div class="book-img no-shadow">
                    <img src="<?php bloginfo('stylesheet_directory'); ?>/assets/img/Villa%20Rendering.jpg" class="img-fluid" alt="">
                     <a href="" class="btn btn-book m-btn-book mgrr-10">Book Now</a>
                </div>
                <p class="rbto-25 text-grey-f707 mgrt-80">We will put together a detailed and specific style guide that covers. Most of our clients use our Data Analysis service to inform their strategic decision making and their targets for the immediate, mid-term and long-term future. The data sources that we use for this type of analysis include customer enquiry data, sales figures, costs, market data and customer feedback. We work with clients big and small across a range of sectors.</p>
            </div>
        </section>
        
        
        <hr class="bdr-green">
        
        <?php require get_template_directory() . '/includes/cta-newsletter.php'; ?>
        
        
        <?php
    } 
    
}



