<?php 
$blogPage = get_page(get_option('page_for_posts', true));


page_title_block(get_the_title( $blogPage->ID ));
?>

<section class="section post">
	<div class="container">
		<div class="row">
			<div class="col-md-9">
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				
              	<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<?php 
					$src = get_the_post_thumbnail_url(get_the_ID(), 'tcf-property-slide');
					if($src){
						echo "<div class='blog-img'>";
							echo "<img class='img-fluid' src='". $src ."' alt='". get_the_title() ."'>";
						echo "</div>";
					}
					?>
                  	<h1><?php the_title(); ?></h1>

                 	<p class="post-comments">
						<?php printf('<i class="far fa-calendar"></i> %1$s <i class="far fa-user"></i> by %2$s <i class="far fa-comments"></i> %3$s',
							/* the time the post was published */
							'<span datetime="' . get_the_time('Y-m-d') . '">' . get_the_time(get_option('date_format')) . '</span>',
							/* the author of the post */
							'<span class="by">' . get_the_author_link( get_the_author_meta( 'ID' ) ) . '</span>',
							'<span class="commentsCount">'. get_comments_number('0', '1', '') .'</span>'
						); ?>
					</p>

                  	<?php the_content(); ?>

                  	<?php 
					$cats = explode('||', get_the_category_list('||'));
					$cats = array_filter($cats, function($cat){
						return stripos($cat, 'uncategorized') === false;
					});

					if($cats){
					  printf( __( '<i class="far fa-tags"></i> Categories' ).': %1$s', implode(', ', $cats) ); 
					}

					?>

                  	<?php the_tags( '<p class="tags"><span class="tags-title">' . __( 'Tags:' ) . '</span> ', ', ', '</p>' ); ?>

					<?php comments_template(); ?>

	            </div>


				<?php endwhile; ?>

				<?php else : ?>
					<h1><?php _e( 'Oops, Post Not Found!' ); ?></h1>
					<p><?php _e( 'Uh Oh. Something is missing. Try double checking things.' ); ?></p>
					<p><?php _e( 'This is the error message in the single.php template.' ); ?></p>
				<?php endif; ?>

			</div>

			<?php get_sidebar(); ?>

		</div>
	</div>
</section>
