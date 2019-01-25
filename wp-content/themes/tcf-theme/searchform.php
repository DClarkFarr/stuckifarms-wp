
<form action="<?php echo get_permalink( get_option( 'page_for_posts' ) ); ?>" method="get" class="form-inline">
    <fieldset class="w-100">
			<div class="form-group has-feedback">
				<input type="text" name="s" id="search" placeholder="<?php _e("Search News"); ?>" value="<?php the_search_query(); ?>" class="form-control" />
				<span class="form-control-feedback">
					<button type="submit" class="btn"><i class="far fa-search"></i></button>
				</span>
			</div>
		</fieldset>
</form>