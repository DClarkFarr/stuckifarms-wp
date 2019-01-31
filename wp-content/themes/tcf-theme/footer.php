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
						</div>
						<div class="col-lg-2">
							<h4>Cool Title</h4>
							<ul class="list-unstyled">
								<li>
									<a href="">Available Homes</a>
								</li>
								<li>
									<a href="">Vacation Rentals</a>
								</li>
								<li>
									<a href="">Parade of Homes</a>
								</li>
								<li>
									<a href="">Builders</a>
								</li>
							</ul>
						</div>
						<div class="col-lg-2">
							<h4>Cool Title</h4>
							<ul class="list-unstyled">
								<li><a href="">Work Here</a></li>
								<li><a href="">Invest Here</a></li>
								<li><a href="">Schedule a tour</a></li>
								<li><a href="">Interactive Map</a></li>
							</ul>
						</div>
						<div class="col-lg-4 get-in-touch">
							<h4>About</h4>
							<div class="d-flex pb-4">
								<i class="far fa-map-marker f-14 fa-fw mr-4"></i>
								<span>
									57 Leonard Igorevich St, New York<br>
									NY 10013, USA
								</span>
							</div>
							<div class="d-flex pb-4">
								<i class="far fa-phone f-14 fa-fw mr-4"></i>
								<span>+1 212-431-2100</span>
							</div>
							<div class="d-flex pb-4">
								<i class="far fa-envelope f-14 fa-fw mr-4"></i>
								<span>realestate@info.com</span>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="footer-bottom bg-black text-white text-center py-4">
				<div class="container">
					<div class="d-flex w-100 align-items-center">
						<div class="mr-4">
							All Rights Reserved 2018 Stucki Farms Inc.
						</div>
						<div class="mr-4">
							Designed and developed by <a href='https://thecodeframe.com' target="_blank">The Code Frame</a>
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