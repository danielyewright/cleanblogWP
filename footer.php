<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Clean_Blog_WP
 */

?>

			</div>
		</div>
	</div><!-- #content -->

	<hr>

	<footer id="colophon" class="site-footer">
		<div class="site-info container">
			<div class="row">
				<div class="col-lg-8 col-md-10 mx-auto">
					<ul class="list-inline text-center">
						<?php if ( get_theme_mod( 'social_options_twitter' ) ) : ?>
						<li class="list-inline-item">
							<a href="<?php echo esc_attr( get_theme_mod( 'social_options_twitter', '#' ) ); ?>" target="new">
								<span class="fa-stack fa-lg">
									<i class="fas fa-circle fa-stack-2x"></i>
									<i class="fab fa-twitter fa-stack-1x fa-inverse"></i>
								</span>
							</a>
						</li>
						<?php endif; ?>
						<?php if ( get_theme_mod( 'social_options_facebook' ) ) : ?>
						<li class="list-inline-item">
							<a href="<?php echo esc_attr( get_theme_mod( 'social_options_facebook', '#' ) ); ?>" target="new">
								<span class="fa-stack fa-lg">
									<i class="fas fa-circle fa-stack-2x"></i>
									<i class="fab fa-facebook-f fa-stack-1x fa-inverse"></i>
								</span>
							</a>
						</li>
						<?php endif; ?>
						<?php if ( get_theme_mod( 'social_options_github' ) ) : ?>
						<li class="list-inline-item">
							<a href="<?php echo esc_attr( get_theme_mod( 'social_options_github', '#' ) ); ?>" target="new">
								<span class="fa-stack fa-lg">
									<i class="fas fa-circle fa-stack-2x"></i>
									<i class="fab fa-github fa-stack-1x fa-inverse"></i>
								</span>
							</a>
						</li>
						<?php endif; ?>
					</ul>
          			<p class="copyright text-muted">
						<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'cleanblog' ) ); ?>">
							<?php
							/* translators: %s: CMS name, i.e. WordPress. */
							printf( esc_html__( 'Proudly powered by %s', 'cleanblog' ), 'WordPress' );
							?>
						</a>
						<span class="sep"> | </span>
						<?php
						/* translators: 1: Theme name, 2: Theme author. */
						printf( esc_html__( 'Theme: %1$s by %2$s.', 'cleanblog' ), 'cleanblog', '<a href="https://danielywright.me">Daniely Wright</a>' );
						?>
					</p>
        		</div>
			</div>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
