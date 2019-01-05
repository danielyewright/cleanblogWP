<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Bootstrap_WP
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="sr-only" href="#content"><?php esc_html_e( 'Skip to content', 'bootstrapwp' ); ?></a>

	<header id="masthead" class="site-header">
		<nav class="navbar navbar-expand-md navbar-dark bg-dark py-3" role="navigation">
			<div class="container">
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-controls="bs-example-navbar-collapse-1" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>

				<?php
				the_custom_logo();
				if ( is_front_page() && is_home() ) :
					?>
					<a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
					<?php
				else :
					?>
					<a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
					<?php
				endif;
				$bootstrapwp_description = get_bloginfo( 'description', 'display' );
				if ( $bootstrapwp_description || is_customize_preview() ) :
					?>
					<span class="site-description navbar-text"><?php echo $bootstrapwp_description; /* WPCS: xss ok. */ ?></span>
				<?php endif;

				wp_nav_menu( array(
					'theme_location'    => 'menu-1',
					'menu_id'			=> 'primary-menu',
					'depth'             => 2,
					'container'         => 'div',
					'container_class'   => 'collapse navbar-collapse',
					'container_id'      => 'bs-example-navbar-collapse-1',
					'menu_class'        => 'navbar-nav ml-auto',
					'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
					'walker'            => new WP_Bootstrap_Navwalker(),
				) );
				?>
			</div>
		</nav>
	</header>

	<div id="content" class="site-content container py-5">
