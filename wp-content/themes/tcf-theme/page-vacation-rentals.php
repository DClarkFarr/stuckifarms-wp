<?php 
get_header(); 

if (have_posts()){
    while (have_posts()){
        the_post();
        page_title_block('VACATION AT STUCKI FARMS');

		?>
        <section class="section">
            <div class="container">
                <?php the_content(); ?>
            </div>
        </section>
        <?php
    } 
    
}
get_footer();


