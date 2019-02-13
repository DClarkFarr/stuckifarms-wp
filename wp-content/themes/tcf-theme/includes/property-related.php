<?php 

$cats = wp_get_post_terms( $property->ID, 'property_cat' ); 
if(empty($cats)){
    return '';
}
$cat_ids = array();  
foreach( $cats as $cat ) {
    $cat_ids[] = $cat->term_id; 
}

$posts_per_page = 3;
$args = array(
    'post_type' => 'property',
    'post_status' => 'publish',
    'posts_per_page' => 3,
);

if ( !empty( $cat_ids ) ) {
    $args['tax_query'] = [
        array (
            'taxonomy' => 'property_cat',
            'terms' => $cat_ids,
            'field' => 'id',
            'operator' => 'IN',
            'include_children' => false,
        )
    ];
}

$the_query = new WP_Query( $args );

$posts = $the_query->posts;

wp_reset_postdata();

if ( empty($posts) ) {
    return '';
}
?>
<section class="section section">
    <div class="container">
        <h4 class="subheading bottom-bar bottom-bar-blue">Related Properties</h4>

        <?php
        echo "<div class='card-deck columns-3'>";
        foreach ( $posts as $post ) {                
            load_include('property-thumb', ['property' => $post]);
        }
        echo "</div>";
        ?>

    </div>
</section>