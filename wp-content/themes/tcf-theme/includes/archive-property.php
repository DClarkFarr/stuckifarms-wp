<section class="section">
    <div class="container">
        <?php 
        $category = get_field('page_category', $page->ID);
        $posts_per_page = 9;
        $posts_per_row = 3;

        $the_query = new WP_Query([
            'post_type' => 'property',
            'posts_per_page' => $posts_per_page, 
            'paged' => get_query_var('paged'),
            'orderby' => 'menu_order', 
            'order' => 'ASC', 
            'tax_query' => array(                     //(array) - use taxonomy parameters (available with Version 3.1).
                'relation' => 'AND',                      //(string) - Possible values are 'AND' or 'OR' and is the equivalent of running a JOIN for each taxonomy
                array(
                    'taxonomy' => 'property_cat',                //(string) - Taxonomy.
                    'field' => 'id',                    //(string) - Select taxonomy term by ('id' or 'slug')
                    'terms' => array( !empty($category->term_id) ? $category->term_id : -1 ),    //(int/string/array) - Taxonomy term(s).
                    'include_children' => true,           //(bool) - Whether or not to include children for hierarchical taxonomies. Defaults to true.
                    'operator' => 'IN'                    //(string) - Operator to test. Possible values are 'IN', 'NOT IN', 'AND'.
                ),    
            ),
        ]);

        if ( $the_query->have_posts() ) {
            echo "<h2 class='heading-alt'>". (get_field('page_subheading', $page->ID) ?: 'Find the perfect home') . "</h2>";
            echo "<div class='card-deck columns-3'>";
            while ( $the_query->have_posts() ) {
                $the_query->the_post();
                
                load_include('property-thumb', ['property' => $post, 'page' => $page]);
            }
            echo "</div>";

            if($the_query->found_posts > $posts_per_page){
               tcf_page_navi($the_query);
            }
        }else{
            load_include('coming-soon');
        }
        wp_reset_postdata();
        ?>
    </div>
</section>