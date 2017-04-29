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
		<div class = "col-sm-8 offset-sm-2 loginForm">
			<img src="<?php echo bloginfo('url'); ?>/wp-content/uploads/2017/03/zbate_sm_logo.png" alt="" width="200" height="69" />
			<?php echo do_shortcode('[ninja_form id=4]'); ?>
		</div>
	</div>

	</div><!-- .entry-content -->

</article><!-- #post-## -->
