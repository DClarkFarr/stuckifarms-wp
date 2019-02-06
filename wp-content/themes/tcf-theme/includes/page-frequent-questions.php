<section class="section">
	<div class="container">
		<h1 class="text-darker"><?php echo get_the_title($post->ID); ?></h1>
		<hr>
        <div class="big-text mb-5">
            <?php the_content($post->ID); ?>
        </div>
	</div>
	<div class="container">
		<ul class="list-unstyled">
			<?php 
			$faqs = new WP_Query([
				'post_type' => 'faq',
				'limit' => -1,
			]);
			$int = 0;
			while($faqs->have_posts()){
				$int++;
				$faqs->the_post();
				?>
				<li class="media mb-5">
					<span class="text-bold mx-5 pull-left text-theme" style="font-size: 5rem;line-height: 1"><?php echo $int; ?></span>
					<div class="media-body">
						<h4 class="mb-3 text-darker"><?php the_title(); ?></h4>
						<div class="pr-5">
							<?php the_content(); ?>
						</div>
					</div>
				</li>
				<?php
			}
			wp_reset_postdata();
			?>
		</ul>
	</div>
</section>