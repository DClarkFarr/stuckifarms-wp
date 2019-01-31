<?php 
$map = [
    'cottages' => 'rentals-cottages',
    'villas' => 'rentals-villas',
];

$slug = isset($map[$post->post_name]) ? $map[$post->post_name] : 'page-' . $post->post_name; 

if(has_include($slug)){
    load_include($slug);
}else{
    ?>
    <section class="section">
        <div class="container">
            <?php the_content($post->ID); ?>
        </div>
    </section>
    <?php 
}
