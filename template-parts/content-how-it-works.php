<?php
/**
 * Partial template for the "How It Works" page
 *
 * @package understrap
 */

?>
<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

    <div class="entry-content">
    
<div id = "howItWorks">
	<div class = "row">
		<div id = "CTA" class = "col-sm-12 jumbotron jumbotron-fluid mb-3 text-center rounded">
			Simple: You send ZBATE a referral fee and we process that fee and send a check to your customer/client
		</div>
	</div>
</div>

	<?php the_content(); ?>

	</div><!-- .entry-content -->

</article><!-- #post-## -->