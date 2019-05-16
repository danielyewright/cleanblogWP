<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Clean_Blog_WP
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="entry-content">
		<?php
		the_content( sprintf(
			wp_kses(
				/* translators: %s: Name of current post. Only visible to screen readers */
				__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'cleanblog' ),
				array(
					'span' => array(
						'class' => array(),
					),
				)
			),
			get_the_title()
		) );

		wp_link_pages( array(
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'cleanblog' ),
			'after'  => '</div>',
		) );
		?>

		<div class="entry-footer">
			<?php cleanblog_entry_footer(); ?>
		</div><!-- .entry-footer -->
	</div><!-- .entry-content -->
</article><!-- #post-<?php the_ID(); ?> -->
