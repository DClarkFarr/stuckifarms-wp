<?php
/*
 Template Name: Live Here Template
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

// $terms = get_terms(array(
//     'taxonomy' => 'property_movein_cat',
//     'hide_empty' => false,
// ));

if(!empty($_GET['new_search'])){
	$get = array_filter($_GET);
	if(empty($get['category']) || empty(array_filter($get['category'])) ){
		unset($get['category']);
	}
	unset($get['new_search']);
	header('Location: ?' . http_build_query($get));
	die();
}


if (have_posts()){
	while (have_posts()){
		the_post();

		page_title_block(get_the_title());
		
		$info = propertyPageInfo([
			'page' => get_page(get_page_by_path('live-here')),
		]);

		load_include('breadcrumbs-pages', [
			'active' => false,
			'pages' => $info['pages'],
		]);

		$posts_per_page = 6;
		$posts_per_row = 3;

		$meta_args = array(
			'relation'	=> 'AND',			
		);

		$minMaxParams = ['price', 'beds', 'baths'];

		foreach($minMaxParams as $get_key){
			$min = $get_key . '_min';
			$max = $get_key . '_max';

			$min_value = $_GET[$min];
			$max_value = $_GET[$max];
			if($get_key == 'price'){
				$min_value = floor($min_value * 1000);
				$max_value = ceil($max_value * 1000);
			}
			if( isset($_GET[$min]) ){
				$meta_args[] = array(
					'key'	  	=>  $get_key,
					'value'	  	=> $min_value,
					'compare' 	=> '>=',
				);
			}
			if( isset($_GET[$max]) ){
				$meta_args[] = array(
					'key'	  	=>  $get_key,
					'value'	  	=> $max_value,
					'compare' 	=> '<=',
				);
			}			
		}

		$boolParams = ['has_rvgarage', 'has_casita'];
		
		foreach($boolParams as $get_key){
			if(isset($_GET['feature']) && in_array($get_key, $_GET['feature'])){
				$meta_args[] = array(
					'key'	  	=>  $get_key,
					'value'	  	=> 1,
					'compare' 	=> '==',
				);
			}
		}


		$valueParams = ['number_of_floors', 'builder_id'];
		foreach($valueParams as $get_key){
			if(isset($_GET[$get_key])){
				$meta_args[] = array(
					'key'	  	=>  $get_key,
					'value'	  	=> $_GET[$get_key],
					'compare' 	=> '==',
				);
			}
		}
		$args = [
			'post_type' => 'property',
			'posts_per_page' => $posts_per_page, 
			'paged' => get_query_var('paged'),
			'meta_query' => $meta_args,
		];
		if( isset($_GET['category']) ){
			$args['tax_query'] = array(
				'relation' => 'AND',
				array(
					'taxonomy' => 'property_cat',
					'field' => 'id',
					'terms' => $_GET['category'],
					'operator' => 'IN'
				)
			);
		}

		$the_query = new WP_Query($args);

		?>
		<section class="section">
			<div class="container">
				<form action="" method="GET">
					<div class="row justify-content-center">
						<div class="col-lg-8"><h2>Property Search Form</h2></div>
						<div class="w-100"></div>
						<div class="col-lg-4">
							<div class="form-group">
								<label class="mb-0 text-bold">Property Type</label>
								<div class="pl-3">
									<?php 
									$terms = get_terms(array(
										'taxonomy' => 'property_cat',
										'hide_empty' => false,
										'orderBy' => 'count',
										'order' => 'DESC',
									));
									foreach($terms as $term){
										?>
										<div class="form-check">
											<label class="form-check-label">
												<input class="form-check-input" type="checkbox" name="category[]" value="<?php echo $term->term_id; ?>" <?php echo isset($_GET['category']) && in_array($term->term_id, $_GET['category']) ? 'checked' : ''; ?>>
												<?php echo $term->name; ?>
											</label>
										</div>
										<?php
									}
									?>
								</div>
								<label class="mb-0 text-bold">Has Feature:</label>
								<div class="pl-3">
									<div class="form-check">
										<label class="form-check-label">
											<input class="form-check-input" type="checkbox" name="feature[]" value="has_rvgarage" <?php echo isset($_GET['feature']) && in_array('has_rvgarage', $_GET['feature']) ? 'checked' : ''; ?>>
											RV Garage
										</label>
									</div>
									<div class="form-check">
										<label class="form-check-label">
											<input class="form-check-input" type="checkbox" name="feature[]" value="has_casita" <?php echo isset($_GET['feature']) && in_array('has_casita', $_GET['feature']) ? 'checked' : ''; ?>>
											Casita
										</label>
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="row">
									<div class="col-lg-6">
										<label class="mb-0 text-bold"># Floors</label>
										<select name="number_of_floors" class="form-control">
											<option value="">Any</option>
											<option value="1" <?php echo (isset($_GET['number_of_floors']) && $_GET['number_of_floors'] == 1 ? 'selected' : ''); ?>>1 Floor</option>
											<option value="2" <?php echo (isset($_GET['number_of_floors']) && $_GET['number_of_floors'] == 2 ? 'selected' : ''); ?>>2 Floors</option>
										</select>
									</div>
									<div class="col-lg-6">
										<label class="mb-0 text-bold">Builder</label>
										<select name="builder_id" class="form-control">
											<option value="">Any</option>
											<?php 
											$builders = new WP_Query([
												'post_type' => 'builder',
												'limit' => -1,
												'orderBy' => 'title',
												'order' => 'ASC',
												'limit' => -1,
											]);
											while($builders->have_posts()){
												$builders->the_post();
												echo "<option value='". get_the_ID() ."' ". (!empty($_GET['builder_id']) && $_GET['builder_id'] == get_the_ID() ? 'selected' : '') .">". get_the_title() ."</option>";
											}

											wp_reset_postdata();
											?>
										</select>
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-4">
							<div class="form-group">
								<label class="mb-0 text-bold">Price Range</label>
								<div class="row">
									<div class="col-lg-6">
										<label>Min (In Thousands)</label>
										<input type="text" class="form-control" name="price_min" value="<?php echo isset($_GET['price_min']) ? $_GET['price_min'] : ''; ?>" placeholder="Any">
									</div>
									<div class="col-lg-6">
										<label>Max (In Thousands)</label>
										<input type="text" class="form-control" name="price_max" value="<?php echo isset($_GET['price_max']) ? $_GET['price_max'] : ''; ?>" placeholder="Any">
									</div>
								</div>
							</div>
							<div class="form-group">
								<label class="mb-0 text-bold">Bedrooms</label>
								<div class="row">
									<div class="col-lg-6">
										<label>Min</label>
										<input type="text" class="form-control" name="beds_min" value="<?php echo isset($_GET['beds_min']) ? $_GET['beds_min'] : ''; ?>" placeholder="Any">
									</div>
									<div class="col-lg-6">
										<label>Max</label>
										<input type="text" class="form-control" name="beds_max" value="<?php echo isset($_GET['beds_max']) ? $_GET['beds_max'] : ''; ?>" placeholder="Any">
									</div>
								</div>
							</div>
							<div class="form-group">
								<label class="mb-0 text-bold">Bathrooms</label>
								<div class="row">
									<div class="col-lg-6">
										<label>Min</label>
										<input type="text" class="form-control" name="baths_min" value="<?php echo isset($_GET['baths_min']) ? $_GET['baths_min'] : ''; ?>" placeholder="Any">
									</div>
									<div class="col-lg-6">
										<label>Max</label>
										<input type="text" class="form-control" name="baths_max" value="<?php echo isset($_GET['baths_max']) ? $_GET['baths_max'] : ''; ?>" placeholder="Any">
									</div>
								</div>
							</div>
						</div>
						<div class="w-100"></div>
						<div class="col-lg-8">
							<hr>
							<div class="form-group text-right">
								<button class="btn btn-theme">Search Properties</button>
							</div>
						</div>
					</div> <!-- end main row -->
					<input type="hidden" name="new_search" value="1">
 				</form>
			</div>
		</section>
		<section class="section">
			<div class="container">
				<h2>Here's What we found:</h2>
				<?php 
				if ( $the_query->have_posts() ) {
					echo "<div class='card-deck columns-3'>";
					while ( $the_query->have_posts() ) {
						$the_query->the_post();
						
						load_include('property-thumb', ['property' => $post]);
					}
					echo "</div>";

					if($the_query->found_posts > $posts_per_page){
						tcf_page_navi($the_query);
					}
				}else{
					echo "<div class='alert alert-danger'>Sorry, nothing matched your criteria. Please try a different search or select a category above</div>";
				}
				wp_reset_postdata();
				?>
			</div>
		</section>
		<?php 
	}
}
