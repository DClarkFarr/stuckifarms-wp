<?php
/*
 Template Name: Invest here Property Archive
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

if (have_posts()){
	while (have_posts()){
		the_post();

		page_title_block('Invest at Stucki Farms');
		
		$info = propertyPageInfo([
			'page' => $post,
			'slug' => 'invest-here',
			'autoselect' => true,
		]);

		load_include('breadcrumbs-pages', [
			'active' => $info['active'],
			'pages' => $info['pages'],
		]);

		load_include('archive-property', ['page' => $info['active']]);
	}
}
