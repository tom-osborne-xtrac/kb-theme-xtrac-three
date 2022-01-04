<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package xtrac-three
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	
	<link rel="icon" type="image/x-icon" href="http://172.20.20.135/wp-content/uploads/favicon.ico" />

	<script src="https://kit.fontawesome.com/ab1d9e87ee.js" crossorigin="anonymous"></script>

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'xtrac-three' ); ?></a>

	<header id="masthead" class="site-header">
		<div class="site-header__global-nav">
			<div class="global-nav__logo">
				<a href="http://172.20.20.135/" rel="home">
					<img src="http://172.20.20.135/wp-content/themes/xtrac-three/images/XTRAC logo white.svg" alt="Xtrac Logo">
				</a>
			</div><!-- site-logo -->
			<div class="global-nav__icons">
				<div class="site-search">
					<a href="#" title="Search">
						<i class="fas fa-search fa-2x"></i>
					</a>
				</div>
				<div class="site-user">
					<a href="#" title="User Login">
						<i class="fas fa-user-circle fa-2x"></i>
					</a>
				</div>
				<div class="site-faq">
					<a href="#" title="FAQ">
					<i class="fas fa-question-circle fa-2x"></i>
					</a>
				</div>
			</div>
		</div>

		<div class="site-header__nav">
			<div class="site-branding">
				<?php
				the_custom_logo();
				if ( is_front_page() && is_home() ) :
					?>
					<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
					<?php
				else :
					?>
					<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
					<?php
				endif;
				$xtrac_three_description = get_bloginfo( 'description', 'display' );
				if ( $xtrac_three_description || is_customize_preview() ) :
					?>
					<p class="site-description"><?php echo $xtrac_three_description; /* WPCS: xss ok. */ ?></p>
				<?php endif; ?>
			</div><!-- .site-branding -->

			<nav id="site-navigation" class="main-navigation">
				<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'xtrac-three' ); ?></button>
				<?php
				wp_nav_menu( array(
					'theme_location' => 'menu-1',
					'menu_id'        => 'primary-menu',
				) );
				?>
			</nav><!-- #site-navigation -->
			
		</div><!-- site-header__nav -->
	</header><!-- #masthead -->

	<div id="content" class="site-content">
