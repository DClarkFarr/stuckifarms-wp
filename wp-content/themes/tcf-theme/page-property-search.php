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

		$getParams = ['price' => 'price', 'bedrooms' => 'beds', 'bathrooms' => 'baths'];

		foreach($getParams as $get_key => $acf_key){
			if(empty($_GET[$get_key])){
				continue;
			}
			$value = $_GET[$get_key];

			if(strpos($value, '-') !== false){
				list($min, $max) = explode('-', $value);
				if($min){
					$meta_args[] = array(
						'key'	  	=>  $acf_key,
						'value'	  	=> $min,
						'compare' 	=> '>=',
					);
				}
				if($max){
					$meta_args[] = array(
						'key'	  	=>  $acf_key,
						'value'	  	=> $max,
						'compare' 	=> '<=',
					);
				}
			}else{
				$meta_args[] = array(
					'key'	  	=>  $acf_key,
					'value'	  	=> $value,
					'compare' 	=> '=',
				);
			}
			
			
		}

		$the_query = new WP_Query([
			'post_type' => 'property',
			'posts_per_page' => $posts_per_page, 
			'paged' => get_query_var('paged'),
			'meta_query' => $meta_args,
		]);

		?>
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
