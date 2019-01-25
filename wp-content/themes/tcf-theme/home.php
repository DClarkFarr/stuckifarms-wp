<?php 
$blogPage = get_page(get_option('page_for_posts', true));


page_title_block(get_the_title( $blogPage->ID ));
?>
<section class="section">
	<div class="container">
		<div class="row">
			<div class="col-md-9">

				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
						<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
							<div class="row mb-5">
								<div class="col-lg-5">
									<img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'blog-thumb'); ?>" alt="<?php the_title(); ?>" class="img-fluid rounded post-img">
								</div>
								<div class="col-lg-7 align-self-lg-stretch">
									<div class="d-flex flex-column" style="height: 100%;">
										<div>
											<h3 class="h2" ><a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>" class="psot-t"><?php the_title(); ?></a></h3>
										</div>
										<div>
											<p class="post-comments">
												<?php printf('<i class="far fa-calendar"></i> %1$s <i class="far fa-user"></i> by %2$s <i class="far fa-comments"></i> %3$s',
													/* the time the post was published */
													'<span datetime="' . get_the_time('Y-m-d') . '">' . get_the_time(get_option('date_format')) . '</span>',
													/* the author of the post */
													'<span class="by">' . get_the_author_link( get_the_author_meta( 'ID' ) ) . '</span>',
													'<span class="commentsCount">'. get_comments_number('0', '1', '') .' comments</span>'
												); ?>
											</p>
										</div>
										<div class="blog-content mb-4">
											<?php 
											$content = strip_tags(get_the_content());
											if(strlen($content) > 150){
												$content = substr($content, 0, 150) . ' ... ';
											}
											echo $content;
											?>
										</div>
										<div class="mt-auto mb-3">
											<a href="<?php the_permalink(); ?>" class="btn btn-rounded post-btn">Continue Reading</a>
										</div>
									</div>
									
									
									
								</div>
							</div>
						</div>
                        <hr class="post-hr">

					<?php endwhile; ?>

					<?php tcf_page_navi(); ?>

				<?php else : ?>
					<h1><?php _e( 'Oops, Post Not Found!' ); ?></h1>
					<p><?php _e( 'Uh Oh. Something is missing. Try double checking things.' ); ?></p>
					<p><?php _e( 'This is the error message in the custom posty type archive template.' ); ?></p>
				<?php endif; ?>

			</div>

			<?php get_sidebar(); ?>

		</div>
	</div>
</section>
