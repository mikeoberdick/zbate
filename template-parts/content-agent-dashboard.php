<?php
/**
 * Partial template for the Agent page
 *
 * @package understrap
 */

?>
<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

    <div class="entry-content">

    <div class = "row">
		<div class = "col-md-8">

		<?php echo do_shortcode('[ninja_form id=5]'); ?>

		</div>
		<div class = "col-md-4">
			<div>
				<h5>Marketing Materials</h5>
				<hr class = "mt-0">
				<a class = "d-block" href ="<?php echo bloginfo('url'); ?>/wp-content/uploads/2017/04/Open-House-Flyer.pdf">Open House Flyer</a>
				<a class = "d-block" href = "<?php echo bloginfo('url'); ?>/wp-content/uploads/2017/04/Open-House-Sign-In-Sheet.pdf">Open House Sign In Sheet</a>
				<a class = "d-block" href ="<?php echo bloginfo('url'); ?>/wp-content/uploads/2017/04/Instructions-for-Setting-Up-Open-House.pdf">Instructions for Setting Up Open House</a>

				<h5 class = "mt-2">Forms</h5>
				<hr class = "mt-0">
				<a class = "d-block" href = "<?php echo bloginfo('url'); ?>/wp-content/uploads/2017/04/Zbate-Rebate-Referral-Form.pdf">Zbate Referral Form</a>
				<a class = "d-block" href = "<?php echo bloginfo('url'); ?>/wp-content/uploads/2017/04/Zbate-Rebate-Closing-Form.pdf">Closing Form</a>
				<a class = "d-block" href ="<?php echo bloginfo('url'); ?>/wp-content/uploads/2017/04/Instructions-for-Creating-and-Using-Presentation-Checks.pdf">Instructions for Creating/Using Presentation Checks</a>
				<a class = "d-block" href = "<?php echo bloginfo('url'); ?>/wp-content/uploads/2017/04/Zbate-Check-Medium.pdf">Medium Check</a>
				<a class = "d-block" href ="<?php echo bloginfo('url'); ?>/wp-content/uploads/2017/04/Zbate-Check-Large.pdf">Large Check</a>
			</div>
		</div>
	</div>
	
	</div><!-- .entry-content -->

</article><!-- #post-## -->