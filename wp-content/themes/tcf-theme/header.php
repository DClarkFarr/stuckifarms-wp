<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<title><?php wp_title(''); ?><?php if(is_front_page()) {bloginfo('name');}?></title>

		<!-- Google Tag Manager -->
		<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
		new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
		j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
		'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
		})(window,document,'script','dataLayer','GTM-W6882BN');</script>
		<!-- End Google Tag Manager -->

		<?php wp_head(); ?>
	</head>
	<body class="<?php echo join(' ', get_body_class()) . ' ' . (is_front_page() ? 'frontpage' : ''); ?>">
	
	<!-- Google Tag Manager (noscript) -->
	<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-W6882BN"
	height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
	<!-- End Google Tag Manager (noscript) -->
	
	<header class="">
		<!--
		<div class="topbar bg-theme-alt text-white">
			<div class="container">
				<div class="d-flex">
					<ul class="navbar-nav flex-row ml-md-auto hidden-lg-down">
						<?php if($facebook = get_field('facebook', 'option')){ ?>
						<li class="nav-item">
							<a class="nav-link link-white p-2" href="<?php echo $facebook; ?>" target="_blank">
								<i class="far fa-share-alt"></i> Share
							</a>
						</li>
						<?php } ?>
					</ul>
				</div>
			</div>
		</div>
		-->
		<div class="main-menu bg-theme-alt">
			<div class="container-fluid">
				<nav class="navbar navbar-expand-lg">
					<a class="navbar-brand" href="<?php echo site_url(); ?>">
						<img src="<?php echo the_field('logo', 'option'); ?>" alt="Planstin" class="img-fluid">
					</a>
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
						<i class="far fa-bars"></i>
					</button>

					<div class="collapse navbar-collapse" id="navbarSupportedContent">
						<ul class="navbar-nav ml-auto">
							<?php wp_nav_menu(array(
								'container' => false,
								'menu' => __( 'The Main Menu' ),
								'menu_class' => 'nav navbar-nav',
								'theme_location' => 'main-nav',
								'before' => '',
								'after' => '',
								'link_before' => '',
								'link_after' => '',
								'depth' => 0,
								'fallback_cb' => '',
								'walker' => new WP_Bootstrap_Navwalker()
							)); ?>
						</ul>
						
					</div>
				</nav>
			</div>
		</div>
	</header>

	
		