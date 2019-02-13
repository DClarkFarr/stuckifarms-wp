<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	<?php page_title_block(get_the_title()); ?>

	<section class="section" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<?php the_content(); ?>
                    <br><br>
                    <?php echo do_shortcode('[contact-form-7 id="387" title="Submit Plan Form"]'); ?>
				</div>
			</div>
			
		</div>
	</section>

<?php endwhile; endif; ?>

