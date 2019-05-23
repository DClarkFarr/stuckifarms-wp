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

			$min_value = !empty($_GET[$min]) ? $_GET[$min] : false;
			$max_value = !empty($_GET[$max]) ? $_GET[$max] : false;
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
		<?php /*
		<section class="pt-3 pb-2 bg-black">
			<div class="container">
				<?php load_include('form-property-search', ['params' => ['button_primary' => false]]); ?>
			</div>	
		</section>
		*/ ?>

		<section class="bg-white">
			<div class="container">
				<?php load_include('form-property-advanced-search'); ?>
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
