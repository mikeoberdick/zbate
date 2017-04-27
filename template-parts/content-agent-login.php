<?php
/**
 * Partial template for the contact page
 *
 * @package understrap
 */

?>
<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

    <div class="entry-content">

    <div class = "row">
		<div class = "col-sm-12">
			<img class="size-full wp-image-62 alignnone" src="http://www.zbate.dev/wp-content/uploads/2017/03/zbate_sm_logo.png" alt="" width="200" height="69" />
			<?php echo do_shortcode('[ninja_form id=4]'); ?>
		</div>
	</div>

	</div><!-- .entry-content -->

</article><!-- #post-## -->
