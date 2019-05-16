<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Clean_Blog_WP
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'post-preview' ); ?>>
	<div class="entry-content">
		<?php
		if ( is_singular() ) :
			// the_title( '<h2 class="post-title">', '</h2>' );

			the_content();
		else :
			the_title( '<a href="' . esc_url( get_permalink() ) . '" rel="bookmark"><h2 class="post-title">', '</h2></a>' );
			?>

			<p class="post-meta"><?php echo the_date( 'F j, Y' ) ?></p>
			
			<?php
			
			the_excerpt();
		endif;
		?>
		<hr>
	</div><!-- .entry-content -->
</article><!-- #post-<?php the_ID(); ?> -->
