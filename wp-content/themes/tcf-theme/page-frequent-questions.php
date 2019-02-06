<?php 

while(have_posts()){
	the_post();

	page_title_block(get_the_title()); 
 
 ?>

<section class="section">
	<div class="container">
        <div class="big-text">
            <?php the_content(); ?>
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


<?php 
}
?>