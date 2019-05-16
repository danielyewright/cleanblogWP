<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Clean_Blog_WP
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
	<a class="sr-only" href="#content"><?php esc_html_e( 'Skip to content', 'cleanblog' ); ?></a>

	<nav id="mainNav" class="navbar navbar-expand-lg navbar-light fixed-top" role="navigation">
		<div class="container">
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
			?>
			<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
				Menu
				<i class="fas fa-bars"></i>
			</button>

			<?php
			wp_nav_menu( array(
				'theme_location'    => 'menu-1',
				'menu_id'			=> 'primary-menu',
				'depth'             => 2,
				'container'         => 'div',
				'container_class'   => 'collapse navbar-collapse',
				'container_id'      => 'navbarResponsive',
				'menu_class'        => 'navbar-nav ml-auto',
				'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
				'walker'            => new WP_Bootstrap_Navwalker(),
			) );
			?>
		</div>
	</nav>

	<?php
	if ( ! is_single() ) : 
		?>
		<header class="masthead" style="background-image: url('<?php header_image(); ?>')">
			<div class="overlay"></div>
			<div class="container">
				<div class="row">
					<div class="col-lg-8 col-md-10 mx-auto">
						<div class="site-heading">
							<h1><?php bloginfo( 'name' ); ?></h1>
							<span class="subheading"><?php bloginfo( 'description' ); ?></span>
						</div>
					</div>
				</div>
			</div>
		</header>
		<?php
	endif;
	?>
	
	<?php
	if ( is_single() ) :
		global $post;
		$src = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), array(), false, '' );
		$author_id = get_the_author_meta( 'ID' );
		?>
		<header class="masthead" style="background-image: url('<?php echo $src[0]; ?>')">
			<div class="overlay"></div>
			<div class="container">
				<div class="row">
					<div class="col-lg-8 col-md-10 mx-auto">
						<div class="post-heading">
							<h1><?php the_title(); ?></h1>
							<div class="meta">
								Posted by <a href="<?php echo esc_url( get_author_posts_url( $post->post_author ) ); ?>"><?php the_author_meta( 'display_name', $post->post_author ); ?></a>
								on <?php echo get_the_date( 'F j, Y', $post->ID ); ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</header>
		<?php 
	endif; 
	?>


	<div id="content" class="site-content container">
		<div class="row">
			<div class="col-lg-8 col-md-10 mx-auto">
