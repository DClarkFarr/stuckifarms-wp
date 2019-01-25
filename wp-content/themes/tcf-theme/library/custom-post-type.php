<?php
/* Bones Custom Post Type Example
This page walks you through creating 
a custom post type and taxonomies. You
can edit this one or copy the following code 
to create another one. 

I put this in a separate file so as to 
keep it organized. I find it easier to edit
and change things if they are concentrated
in their own file.

Developed by: Eddie Machado
URL: http://themble.com/bones/
*/

// Flush rewrite rules for custom post types
add_action( 'after_switch_theme', 'bones_flush_rewrite_rules' );

// flush_rewrite_rules();

// Flush your rewrite rules
function bones_flush_rewrite_rules() {
	flush_rewrite_rules();
}

// let's create the function for the custom type
function custom_post_example() { 
	// creating (registering) the custom type 
	register_post_type( 'custom_type', /* (http://codex.wordpress.org/Function_Reference/register_post_type) */
		// let's now add all the options for this post type
		array( 'labels' => array(
			'name' => __( 'Testing' ), /* This is the Title of the Group */
			'singular_name' => __( 'Custom Post' ), /* This is the individual type */
			'all_items' => __( 'All Custom Posts' ), /* the all items menu item */
			'add_new' => __( 'Add New' ), /* The add new menu item */
			'add_new_item' => __( 'Add New Custom Type' ), /* Add New Display Title */
			'edit' => __( 'Edit' ), /* Edit Dialog */
			'edit_item' => __( 'Edit Post Types' ), /* Edit Display Title */
			'new_item' => __( 'New Post Type' ), /* New Display Title */
			'view_item' => __( 'View Post Type' ), /* View Display Title */
			'search_items' => __( 'Search Post Type' ), /* Search Custom Type Title */ 
			'not_found' =>  __( 'Nothing found in the Database.' ), /* This displays if there are no entries yet */ 
			'not_found_in_trash' => __( 'Nothing found in Trash' ), /* This displays if there is nothing in the trash */
			'parent_item_colon' => ''
			), /* end of arrays */
			'description' => __( 'This is the example custom post type' ), /* Custom Type Description */
			'public' => true,
			'publicly_queryable' => true,
			'exclude_from_search' => false,
			'show_ui' => true,
			'query_var' => true,
			'menu_position' => 8, /* this is what order you want it to appear in on the left hand side menu */ 
			'menu_icon' => 'dashicons-admin-site', /* the icon for the custom post type menu */
			'rewrite'	=> array( 'slug' => 'custom_type', 'with_front' => false, 'feed' => true ), /* you can specify its url slug */
			'has_archive' => 'custom_type', /* you can rename the slug here */
			'capability_type' => 'post',
			'hierarchical' => false,
			/* the next one is important, it tells what's enabled in the post editor */
			'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'trackbacks', 'custom-fields', 'comments', 'revisions', 'sticky')
		) /* end of options */
	); /* end of register post type */
	

	// now let's add custom categories (these act like categories)
	register_taxonomy( 'custom_cat', 
		array('custom_type'), /* if you change the name of register_post_type( 'custom_type', then you have to change this */
		array('hierarchical' => true,     /* if this is true, it acts like categories */
			'labels' => array(
				'name' => __( 'Custom Categories' ), /* name of the custom taxonomy */
				'singular_name' => __( 'Custom Category' ), /* single taxonomy name */
				'search_items' =>  __( 'Search Custom Categories' ), /* search title for taxomony */
				'all_items' => __( 'All Custom Categories' ), /* all title for taxonomies */
				'parent_item' => __( 'Parent Custom Category' ), /* parent title for taxonomy */
				'parent_item_colon' => __( 'Parent Custom Category:' ), /* parent taxonomy title */
				'edit_item' => __( 'Edit Custom Category' ), /* edit custom taxonomy title */
				'update_item' => __( 'Update Custom Category' ), /* update title for taxonomy */
				'add_new_item' => __( 'Add New Custom Category' ), /* add new title for taxonomy */
				'new_item_name' => __( 'New Custom Category Name' ) /* name title for taxonomy */
			),
			'show_admin_column' => true, 
			'show_ui' => true,
			'query_var' => true,
			'rewrite' => array( 'slug' => 'custom-slug' ),
		)
	);
	
	// now let's add custom tags (these act like categories)
	register_taxonomy( 'custom_tag', 
		array('custom_type'), /* if you change the name of register_post_type( 'custom_type', then you have to change this */
		array('hierarchical' => false,    /* if this is false, it acts like tags */
			'labels' => array(
				'name' => __( 'Custom Tags' ), /* name of the custom taxonomy */
				'singular_name' => __( 'Custom Tag' ), /* single taxonomy name */
				'search_items' =>  __( 'Search Custom Tags' ), /* search title for taxomony */
				'all_items' => __( 'All Custom Tags' ), /* all title for taxonomies */
				'parent_item' => __( 'Parent Custom Tag' ), /* parent title for taxonomy */
				'parent_item_colon' => __( 'Parent Custom Tag:' ), /* parent taxonomy title */
				'edit_item' => __( 'Edit Custom Tag' ), /* edit custom taxonomy title */
				'update_item' => __( 'Update Custom Tag' ), /* update title for taxonomy */
				'add_new_item' => __( 'Add New Custom Tag' ), /* add new title for taxonomy */
				'new_item_name' => __( 'New Custom Tag Name' ) /* name title for taxonomy */
			),
			'show_admin_column' => true,
			'show_ui' => true,
			'query_var' => true,
		)
	);


	/* this adds your post categories to your custom post type */
	register_taxonomy_for_object_type( 'category', 'custom_type' );
	/* this adds your post tags to your custom post type */
	register_taxonomy_for_object_type( 'post_tag', 'custom_type' );
	
}

// adding the function to the Wordpress init
//add_action( 'init', 'custom_post_example');


function property_cpt() { 
	// creating (registering) the custom type 
	register_post_type( 'property', /* (http://codex.wordpress.org/Function_Reference/register_post_type) */
		// let's now add all the options for this post type
		array( 
			'labels' => array(
				'name' => __( 'Properties' ), /* This is the Title of the Group */
				'singular_name' => __( 'Property' ), /* This is the individual type */
				'all_items' => __( 'All Properties' ), /* the all items menu item */
				'add_new' => __( 'Add New' ), /* The add new menu item */
				'add_new_item' => __( 'Add New Property' ), /* Add New Display Title */
				'edit' => __( 'Edit' ), /* Edit Dialog */
				'edit_item' => __( 'Edit Properties' ), /* Edit Display Title */
				'new_item' => __( 'New Property' ), /* New Display Title */
				'view_item' => __( 'View Property' ), /* View Display Title */
				'search_items' => __( 'Search Property' ), /* Search Custom Type Title */ 
				'not_found' =>  __( 'Nothing found in the Database.' ), /* This displays if there are no entries yet */ 
				'not_found_in_trash' => __( 'Nothing found in Trash' ), /* This displays if there is nothing in the trash */
				'parent_item_colon' => ''
			), /* end of arrays */
			'description' => __( 'This is the example property' ), /* Custom Type Description */
			'public' => true,
			'publicly_queryable' => true,
			'exclude_from_search' => true,
			'show_ui' => true,
			'query_var' => true,
			'menu_position' => 50, /* this is what order you want it to appear in on the left hand side menu */ 
			'menu_icon' => get_img_directory() . '/dashboard-fa-suitcase.png', /* the icon for the custom post type menu */
			'rewrite'	=> array( 'slug' => 'property', 'with_front' => false, 'feed' => true ), /* you can specify its url slug */
			'has_archive' => false, //'custom_type', /* you can rename the slug here */
			'capability_type' => 'post',
			'hierarchical' => false,
			/* the next one is important, it tells what's enabled in the post editor */
			'supports' => array( 'title', 'editor', 'thumbnail' )
		) /* end of options */
	); /* end of register post type */
	

	// now let's add custom categories (these act like categories)
	register_taxonomy( 'property_cat', 
		array('property'), /* if you change the name of register_post_type( 'custom_type', then you have to change this */
		array('hierarchical' => true,     /* if this is true, it acts like categories */
			'labels' => array(
				'name' => __( 'Categories' ), /* name of the custom taxonomy */
				'singular_name' => __( 'Category' ), /* single taxonomy name */
				'search_items' =>  __( 'Search Categories' ), /* search title for taxomony */
				'all_items' => __( 'All Categories' ), /* all title for taxonomies */
				'parent_item' => __( 'Parent Category' ), /* parent title for taxonomy */
				'parent_item_colon' => __( 'Parent Category:' ), /* parent taxonomy title */
				'edit_item' => __( 'Edit Category' ), /* edit custom taxonomy title */
				'update_item' => __( 'Update Category' ), /* update title for taxonomy */
				'add_new_item' => __( 'Add New Category' ), /* add new title for taxonomy */
				'new_item_name' => __( 'New Category Name' ) /* name title for taxonomy */
			),
			'show_admin_column' => true, 
			'show_ui' => true,
			'query_var' => true,
			//'rewrite' => array( 'slug' => 'properties' ),
		)
	);

	/* this adds your post categories to your custom post type */
	register_taxonomy_for_object_type( 'property_cat', 'property' );


	acf_add_local_field_group(array(
		'key' => 'group_5c358c8a428be',
		'title' => 'Property Pages',
		'fields' => array(
			array(
				'key' => 'field_5c3a212c565b7',
				'label' => 'Page Subheading',
				'name' => 'page_subheading',
				'type' => 'text',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'maxlength' => '',
			),
			array(
				'key' => 'field_5c358c9f52b40',
				'label' => 'Page Category',
				'name' => 'page_category',
				'type' => 'taxonomy',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'taxonomy' => 'property_cat',
				'field_type' => 'select',
				'allow_null' => 0,
				'add_term' => 1,
				'save_terms' => 0,
				'load_terms' => 0,
				'return_format' => 'object',
				'multiple' => 0,
			),
		),
		'location' => array(
			array(
				array(
					'param' => 'page_parent',
					'operator' => '==',
					'value' => '7',
				),
			),
			array(
				array(
					'param' => 'page_parent',
					'operator' => '==',
					'value' => '11',
				),
			),
		),
		'menu_order' => 0,
		'position' => 'normal',
		'style' => 'default',
		'label_placement' => 'top',
		'instruction_placement' => 'label',
		'hide_on_screen' => '',
		'active' => 1,
		'description' => '',
	));

	acf_add_local_field_group(array(
		'key' => 'group_5c35878249238',
		'title' => 'Property Info',
		'fields' => array(
			array(
				'key' => 'field_5c36c8eb40c4c',
				'label' => 'Property Type (internal)',
				'name' => 'property_type',
				'type' => 'select',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'choices' => array(
					'movein' => 'Move In',
					'lot' => 'Lot',
					'plan' => 'Plan',
				),
				'default_value' => array(
				),
				'allow_null' => 0,
				'multiple' => 0,
				'ui' => 0,
				'return_format' => 'value',
				'ajax' => 0,
				'placeholder' => '',
			),
			/*
			array(
				'key' => 'field_5c35879e31438',
				'label' => 'Location',
				'name' => 'location',
				'type' => 'text',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'maxlength' => '',
			),
			*/
			array(
				'key' => 'field_5c3587bb31439',
				'label' => 'Price',
				'name' => 'price',
				'type' => 'text',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'maxlength' => '',
			),
			array(
				'key' => 'field_5c3587c53143a',
				'label' => 'Type',
				'name' => 'type',
				'type' => 'text',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'maxlength' => '',
			),
			array(
				'key' => 'field_5c3587ec3143b',
				'label' => 'Status',
				'name' => 'status',
				'type' => 'text',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'maxlength' => '',
			),
			array(
				'key' => 'field_5c3587f73143c',
				'label' => 'Size',
				'name' => 'size',
				'type' => 'text',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'maxlength' => '',
			),
			array(
				'key' => 'field_5c3588043143d',
				'label' => 'Beds',
				'name' => 'beds',
				'type' => 'text',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'maxlength' => '',
			),
			array(
				'key' => 'field_5c35880e3143e',
				'label' => 'Baths',
				'name' => 'baths',
				'type' => 'text',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'maxlength' => '',
			),
			array(
				'key' => 'field_5c3588123143f',
				'label' => 'Garages',
				'name' => 'garages',
				'type' => 'text',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'maxlength' => '',
			),
			array(
				'key' => 'field_5c35885231441',
				'label' => 'Download Plan',
				'name' => 'download_plan',
				'type' => 'file',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'return_format' => 'url',
				'library' => 'all',
				'min_size' => '',
				'max_size' => '',
				'mime_types' => '',
			),
			array(
				'key' => 'field_5c36cf7051787',
				'label' => 'Village',
				'name' => 'village',
				'type' => 'text',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'maxlength' => '',
			),
			array(
				'key' => 'field_5c36cf9251788',
				'label' => 'Plan',
				'name' => 'plan',
				'type' => 'text',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'maxlength' => '',
				'conditional_logic' => array(
					array(
						array(
							'field' => 'field_5c36c8eb40c4c',
							'operator' => '==',
							'value' => 'plan',
						),
					),
				),
			),
			array(
				'key' => 'field_5c36ce696f80f',
				'label' => 'Lot Size',
				'name' => 'lot_size',
				'type' => 'text',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'maxlength' => '',
				'conditional_logic' => array(
					array(
						array(
							'field' => 'field_5c36c8eb40c4c',
							'operator' => '==',
							'value' => 'lot',
						),
					),
					array(
						array(
							'field' => 'field_5c36c8eb40c4c',
							'operator' => '==',
							'value' => 'plan',
						),
					),
				),
			),
			array(
				'key' => 'field_5c35882231440',
				'label' => 'Gallery',
				'name' => 'gallery',
				'type' => 'gallery',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'min' => '',
				'max' => '',
				'insert' => 'append',
				'library' => 'all',
				'min_width' => '',
				'min_height' => '',
				'min_size' => '',
				'max_width' => '',
				'max_height' => '',
				'max_size' => '',
				'mime_types' => '',
				'conditional_logic' => array(
					array(
						array(
							'field' => 'field_5c36c8eb40c4c',
							'operator' => '==',
							'value' => 'movein',
						),
					),
				),
			),
			
			/*
			array(
				'key' => 'field_5c35888931442',
				'label' => 'Buy Now Link',
				'name' => 'buy_now_link',
				'type' => 'url',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'default_value' => '',
				'placeholder' => '',
			),
			array(
				'key' => 'field_5c3588b131443',
				'label' => 'Calculate Mortgage Link',
				'name' => 'calculate_mortgage_link',
				'type' => 'url',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'default_value' => '',
				'placeholder' => '',
			),
			array(
				'key' => 'field_5c3588c231444',
				'label' => 'Talk to Agent Link',
				'name' => 'talk_to_agent_link',
				'type' => 'url',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'default_value' => '',
				'placeholder' => '',
			),
			array(
				'key' => 'field_5c3588e331445',
				'label' => 'Schedule Visit Link',
				'name' => 'schedule_visit_link',
				'type' => 'url',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'default_value' => '',
				'placeholder' => '',
			),
			*/
		),

		'location' => array(
			array(
				array(
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'property',
				),
			),
		),
		'menu_order' => 0,
		'position' => 'normal',
		'style' => 'default',
		'label_placement' => 'top',
		'instruction_placement' => 'label',
		'hide_on_screen' => '',
		'active' => 1,
		'description' => '',
	));

	
}
add_action( 'init', 'property_cpt');

/*
acf_add_local_field_group(array(
	'key' => 'group_5c36c8e3e2bba',
	'title' => 'Test Fields',
	'fields' => array(
		
		array(
			'key' => 'field_5c36c97640c4d',
			'label' => 'Other Field',
			'name' => 'other_field',
			'type' => 'text',
			'instructions' => '',
			'required' => 1,
			'conditional_logic' => array(
				array(
					array(
						'field' => 'field_5c36c8eb40c4c',
						'operator' => '==',
						'value' => 'lot',
					),
					array(
						'field' => 'field_5c36c8eb40c4c',
						'operator' => '==',
						'value' => 'movein',
					),
				),
				array(
					array(
						'field' => 'field_5c36c8eb40c4c',
						'operator' => '==',
						'value' => 'plan',
					),
				),
			),
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
		),
	),
	'location' => array(
		array(
			array(
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'post',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'normal',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
	'active' => 1,
	'description' => '',
));
*/


/*
	looking for custom meta boxes?
	check out this fantastic tool:
	https://github.com/jaredatch/Custom-Metaboxes-and-Fields-for-WordPress
*/


