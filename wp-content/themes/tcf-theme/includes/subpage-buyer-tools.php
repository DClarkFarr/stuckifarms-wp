<?php 

page_title_block($parent->post_title);

load_include('buyer-tools-breadcrumbs', ['page' => $post]);

load_include('page-by-slug', ['page' => $post]);