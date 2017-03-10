<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package understrap
 */

get_header();

$container   = get_theme_mod( 'understrap_container_type' );
$sidebar_pos = get_theme_mod( 'understrap_sidebar_position' );

?>

<div class="wrapper" id="page-wrapper">

	<div class="<?php echo esc_html( $container ); ?>" id="content" tabindex="-1">

		<div class="row">

			<!-- Do the left sidebar check -->
			<?php get_template_part( 'global-templates/left-sidebar-check', 'none' ); ?>

			<main class="site-main" id="main">

				<?php while ( have_posts() ) : the_post(); ?>

					<?php

					if( is_page( 'contact-us' ) ) {
      					get_template_part( 'template-parts/content', 'contact' );
    				}

    				else if( is_page( 'how-it-works' ) ) {
      					get_template_part( 'template-parts/content', 'how-it-works' );
    				}

    				else if( is_page( 'choose-an-account' ) ) {
      					get_template_part( 'template-parts/content', 'interstitial-registration' );
    				}

    				else if( is_page( 'faq' ) ) {
      					get_template_part( 'template-parts/content', 'faq' );
    				}

					else {
					   get_template_part( 'loop-templates/content', 'page' );
					}
					
					?>

					<?php
					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;
					?>

				<?php endwhile; // end of the loop. ?>

			</main><!-- #main -->

		</div><!-- #primary -->

		<!-- Do the right sidebar check -->
		<?php if ( 'right' === $sidebar_pos || 'both' === $sidebar_pos ) : ?>

			<?php get_sidebar( 'right' ); ?>

		<?php endif; ?>

</div><!-- .row -->

</div><!-- Container end -->

</div><!-- Wrapper end -->

<div id="js-heightControl" style="height: 0;">&nbsp;</div>

<?php get_footer(); ?>
