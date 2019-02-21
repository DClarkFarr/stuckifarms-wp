<?php
/*
 Template Name: Contact Page
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

	page_title_block('Contact Stucki Farms'); 
 
 ?>

<section class="section">
	<div class="container">
		<h1 class="heading-alt mb-5 text-center">
			Contact Us
		</h1>

		<div class="row mb-5">
			<div class="col-lg-6">
				<h4>We're ready to help</h4>
				<p>
					Send us a message and we'll get back to you as soon as possible.
				</p>
				<?php echo do_shortcode('[contact-form-7 id="105" title="Contact form 1"]'); ?>
			</div>
			<div class="col-lg-6">
				<h4>Our Location</h4>
				<iframe style="border: 0;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d477.2631537771194!2d-113.49079865807371!3d37.06680473497855!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x80ca50a54a3272ef%3A0x44d270a85055bac1!2s5015+S+Cattail+Way%2C+Washington%2C+UT+84780!5e0!3m2!1sen!2sus!4v1550725481030" width="600" height="520" frameborder="0" allowfullscreen="allowfullscreen"></iframe>	
			</div>
		</div>

		<div class="row text-center contact-info-boxes">
			<div class="col-lg-3">
				<h4>Phone</h4>
				<p>
					<?php the_field('phone', 'option'); ?>
				</p>
			</div>
			<div class="col-lg-3">
				<h4>Address</h4>
				<p>
					<?php the_field('address_1', 'option'); ?>
					<?php the_field('address_2', 'option'); ?>
					<br> 
					<?php the_field('city', 'option'); ?>,
					<?php the_field('state', 'option'); ?>
					<?php the_field('zip', 'option'); ?>
				</p>
			</div>
			<div class="col-lg-3">
				<h4>Email</h4>
				<?php the_field('contact_email', 'option'); ?>
			</div>
			<div class="col-lg-3">
				<h4>Open Time</h4>
				<p>
					<?php echo nl2br(get_field('business_hours', 'option')); ?>
				</p>
			</div>
		</div>
		
	</div>
</section>

<?php 
}
?>