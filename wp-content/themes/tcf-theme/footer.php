<!-- Footer Wrap -->

		<footer>
			<div class="section footer-top bg-black text-light">
				<div class="container">
					<div class="row">
						<div class="col-lg-4">
							<h4>About</h4>
							<p>
								Stucki Farms is Southern Utah’s Premier Master Planned Community!  Located in beautiful Washington City, Stucki Farms is just under 600 acres.  
							</p>
							<img src="<?php echo get_assets_directory(); ?>/img/logo-ipro-realty.png" alt="iPro Realty" class="img-fluid">
						</div>
						<div class="col-lg-2">
							<h4>Live Here</h4>
							<ul class="list-unstyled">
								<li>
									<a href="<?php echo site_url(); ?>/live-here/">Available Homes</a>
								</li>
								<li>
									<a href="<?php echo site_url(); ?>/vacation-rentals/">Vacation Rentals</a>
								</li>
								<li>
									<a href="<?php echo home_url('news'); ?>/news/parade-of-homes/">Parade of Homes</a>
								</li>
								<li>
									<a href="<?php echo site_url(); ?>/buyer-tools/calculate-mortgage/">Mortgage Calculator</a>
								</li>
							</ul>
						</div>
						<div class="col-lg-2">
							<h4>Opportunities</h4>
							<ul class="list-unstyled">
								<li><a href="<?php echo site_url(); ?>/contact/">Work Here</a></li>
								<li><a href="<?php echo site_url(); ?>/vacation-here/cottages/">Cottages</a></li>
								<li><a href="<?php echo site_url(); ?>/invest-here/buy-a-villa/">Villas</a></li>
								<li><a href="<?php echo site_url(); ?>/news/">News</a></li>
							</ul>
						</div>
						<div class="col-lg-4 get-in-touch">
							<h4>About</h4>
							<div class="d-flex pb-4">
								<i class="far fa-map-marker f-14 fa-fw mr-4"></i>
								<span>
									<?php the_field('address_1', 'option'); ?>
									<?php the_field('address_2', 'option'); ?>
									<br> 
									<?php the_field('city', 'option'); ?>,
									<?php the_field('state', 'option'); ?>
									<?php the_field('zip', 'option'); ?>
								</span>
							</div>
							<div class="d-flex pb-4">
								<i class="far fa-phone f-14 fa-fw mr-4"></i>
								<span><?php the_field('phone', 'option'); ?></span>
							</div>
							<div class="d-flex pb-4">
								<i class="far fa-envelope f-14 fa-fw mr-4"></i>
								<span><?php the_field('contact_email', 'option'); ?></span>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="footer-bottom bg-black text-white text-center py-4">
				<div class="container">
					<div class="d-flex w-100 align-items-center">
						<div class="mr-4">
							<span class="d-inline-block">
								All Rights Reserved 2018 Stucki Farms Inc.
							</span>
							<span class="d-inline-block px-3 hidden-md-down">
								|
							</span>
							<span class="d-inline-block">
								Designed and developed by <a href='https://thecodeframe.com' target="_blank">The Code Frame</a>
							</span>
						</div>
						<div class="ml-auto">
							<?php 
							$facebook = get_field('facebook', 'option');
							$twitter = get_field('twitter', 'option');
							$instagram = get_field('instagram', 'option');
							$youtube = get_field('youtube', 'option');
							?>
							<ul class="list-inline">
								<?php if($facebook){ ?>
								<li>
									<a target="_blank" class="link-white" href="<?php echo $facebook; ?>">
										<i class="fab fa-fw fa-facebook"></i>
									</a>
								</li>
								<?php } ?>
								<?php if($twitter){ ?>
								<li>
									<a target="_blank" class="link-white" href="<?php echo $twitter; ?>">
										<i class="fab fa-fw fa-twitter"></i>
									</a>
								</li>
								<?php } ?>
								<?php if($instagram){ ?>
								<li>
									<a target="_blank" class="link-white" href="<?php echo $instagram; ?>">
										<i class="fab fa-fw fa-instagram"></i>
									</a>
								</li>
								<?php } ?>
								<?php if($youtube){ ?>
								<li>
									<a target="_blank" class="link-white" href="<?php echo $youtube; ?>">
										<i class="fab fa-fw fa-youtube"></i>
									</a>
								</li>
								<?php } ?>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</footer>
		<?php wp_footer(); ?>

	</body>
</html>