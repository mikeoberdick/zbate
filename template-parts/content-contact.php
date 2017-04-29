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
		<div class = "col-sm-12 contactSection">
			<p><i class="fa fa-envelope" aria-hidden="true"></i><a href = "mailto:<?php the_field('company_e-mail'); ?>"><?php the_field('company_e-mail'); ?></a></p>
			<p><i class="fa fa-map-marker" aria-hidden="true"></i><?php the_field('company_address'); ?></p>
			<p><i class="fa fa-phone" aria-hidden="true"></i><a href="tel:<?php the_field('company_phone'); ?>"><?php the_field('company_phone'); ?></a></p>
		</div>
	</div>

</article><!-- #post-## -->
