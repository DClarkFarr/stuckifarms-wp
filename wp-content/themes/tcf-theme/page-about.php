<?php
/*
 Template Name: About Page
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

while(have_posts()){
	the_post();

	page_title_block(get_the_title()); 
 
 ?>

<section class="section">
	<div class="container">
		
		<div class="row align-items-center">
			<div class="col-lg-5 offset-lg-1 order-lg-2">
				<div class="mx-lg-5">
					<div class="w-50 w-lg-100 mx-auto">
						<img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'tcf-property-portrait'); ?>" alt="<?php the_title(); ?>" class="img-fluid">

					</div>
				</div>
			</div>
			<div class="col-lg-6">
				<h1 class="heading-alt">
					Welcome to Stucki Farms
				</h1>
				<div class="big-text">
					<?php the_content(); ?>
				</div>
			</div>

		</div>
	</div>
</section>
<div style="height: 5px;" class="bg-theme"></div>
<section class="section">
	<div class="container">
		<h2 class="heading-alt mb-4">Our Dream</h2>

		<iframe width="100%" height="600px" src="<?php echo get_field('our_dream_video', 'option'); ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

	</div>
</section>

<?php load_include('cta-dream-home'); ?>

<?php 
}
?>