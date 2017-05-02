<?php
/**
 * Partial template for the contact page
 *
 * @package understrap
 */

?>
<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

    <div class="entry-content">

		<?php the_content(); ?>

	</div><!-- .entry-content -->

	<div class = "row">
		<div class = "col-md-8 mb-2">
		<h1>Contact Zbate</h1>
			<?php echo do_shortcode('[ninja_form id=7]'); ?>
		</div>

		<div class = "col-md-4">
			<div class = "contactSection">
				<img class = "mb-2" src="<?php echo bloginfo('url'); ?>/wp-content/uploads/2017/03/zbate_sm_logo.png" alt="" width="200" height="69" />
				<p><i class="fa fa-envelope" aria-hidden="true"></i><a href = "mailto:<?php the_field('company_e-mail'); ?>"><?php the_field('company_e-mail'); ?></a></p>
				<p><i class="fa fa-map-marker" aria-hidden="true"></i><?php the_field('company_address'); ?></p>
				<p><i class="fa fa-phone" aria-hidden="true"></i><a href="tel:<?php the_field('company_phone'); ?>"><?php the_field('company_phone'); ?></a></p>
			</div>
		</div>
	</div>

</article><!-- #post-## -->
