<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	<?php page_title_block(get_the_title()); ?>

	<section class="section" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<div class="container">

			<div class="row mb-5">
				<div class="col-lg-6">
					<img src="<?php echo get_img_directory(); ?>/cottages.jpg" class="img-fluid">
				</div>
				<div class="col-lg-6">
					<h2 class="text-black font-weight-bold">
						Cottages
					</h2>
					<p class="mb-5">
						Inspired by the Bungalow Courts built along the West Coast in the early 1900s, these quaint homes were grouped around common courtyards.  Several areas in Stucki Farms present unique opportunities to cr eate clusters of these Bungalows and Casitas gathered around a series of landscaped common areas where there is always the opportunity to stop and visit or simply say “hello”.
					</p>
					<div class="pt-5"></div>
					<div class="d-flex justify-content-between">
						<a href="<?php echo home_url('vacation-rentals/'); ?>" class="btn btn-theme-light btn-wide">BOOK NOW</a>
						<a href="<?php echo home_url('invest-here/buy-a-cottage/'); ?>" class="btn btn-theme-light btn-wide">BUY NOW</a>
					</div>
				</div>
			</div>

			<br>

			<div class="row mb-5">
				<div class="col-lg-6">
					<img src="<?php echo get_img_directory(); ?>/cottages-court.jpg" class="img-fluid">
				</div>
				<div class="col-lg-6">
					<h2 class="text-black font-weight-bold">
						Cottages Court
					</h2>
					<p class="mb-5">
						The Cottages sit on over 19 acres with views of the surrounding red rock.  The village is inspired by courtyard style living that brings people together.  The quaint Bungalows and Casitas consist of single and two-story individual homes.  The 7 acre Amenity Area has plans to include a Farmhouse Welcome Center, Resort Style Pool, Barn Event Center, and walking trails surrounded by open space to enjoy all kinds of activities!
					</p>
					<div class="pt-5"></div>
					<div class="d-flex justify-content-between">
						<a href="<?php echo home_url('vacation-rentals/'); ?>" class="btn btn-theme-light btn-wide">BOOK NOW</a>
						<a href="<?php echo home_url('invest-here/buy-a-cottage/'); ?>" class="btn btn-theme-light btn-wide">BUY NOW</a>
					</div>
				</div>
			</div>

			<br>

			<div class="row mb-5">
				<div class="col-lg-6">
					<img src="<?php echo get_img_directory(); ?>/the-villas-at-the-cottages.jpg" class="img-fluid">
				</div>
				<div class="col-lg-6">
					<h2 class="text-black font-weight-bold">
						The Villas at the Cottages
					</h2>
					<p class="mb-5">
						Stucki Farms Resort invites you into our charming vacation rental built to perfection! Tailored for large groups and available for nightly rentals, this space is ideal for family reunions, vacation getaways, company retreats, and weddings. With amenities such as an ATV garage, outdoor pizza oven and BBQ, separate casita, themed rooms, space to sleep over 30, Anderson folding glass walls overlooking the pool and lazy river, this space will not leave you wanting. Come pamper yourself with the finest vacation rental in Southern Utah!
					</p>
					<div class="pt-1"></div>
					<div class="d-flex justify-content-between">
						<a href="<?php echo home_url('vacation-rentals/'); ?>" class="btn btn-theme-light btn-wide">BOOK NOW</a>
						<a href="<?php echo home_url('invest-here/buy-a-villa/'); ?>" class="btn btn-theme-light btn-wide">BUY NOW</a>
					</div>
				</div>
			</div>
			
		</div>
	</section>

<?php endwhile; endif; ?>