<?php
/**
 * Partial template for the contact page
 *
 * @package understrap
 */

?>
<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

	<header class="entry-header mb-3">

		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

	</header><!-- .entry-header -->

	<div class="entry-content">

		<?php the_content(); ?>

	</div><!-- .entry-content -->

	<div class = "row">
		<h5 class = "col-sm-1 mb-3">E-Mail:</h5><div class = "col-sm-11"><a href = "mailto:<?php the_field('company_e-mail'); ?>"><?php the_field('company_e-mail'); ?></a></div>
		<h5 class = "col-sm-1 mb-3">Address:</h5><div class = "col-sm-11"><?php the_field('company_address'); ?></div>
		<h5 class = "col-sm-1 mb-3">Phone:</h5><div class = "col-sm-11"><?php the_field('company_phone'); ?></div>
		<p>
	</div>

</article><!-- #post-## -->
