<?php
/**
 * Partial template for the Buyer-Seller page
 *
 * @package understrap
 */

?>
<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
	<div id = "buyer-seller" class="entry-content">  
		<div class = "row">
			<div class = "col-sm-12">
   				<h1 class = "mb-3">Save Money When You Buy or Sell a Home!</h1>
   			</div>
   		</div>
	
		<div class = "row">
			<div class = "col-sm-4">
				<img src = "<?php echo bloginfo('url'); ?>/wp-content/uploads/2017/04/Fotolia_91431339_XS.jpg">
			</div>

			<div class = "col-sm-8">
				<p>It's simple, just register and we will match you with a participating real estate agent, or you can choose your own.  Participating agents send a portion of their commission to ZBATE.  It's that easy!</p>

				<p>After the closing on your home, your agent will send us a referral fee and we will process your "ZBATE REBATE".</p>

				<p>Closing costs are soaring...don't you deserve a break today!</p>

				<p class = "disclaimer">***Rebate amounts are determined based on actual commission collected.</p>
			</div>
		</div>

		<div class = "row mt-5">
			<div id = "cta" class = "col-sm-12">
			<h1 class = "mb-3">Get Your ZBATE REBATE Today!</h1>
				<a class="btn btn-primary btn-lg text-uppercase" href="<?php echo bloginfo('url'); ?>/buyer-seller-registration">Register Now</a>
			</div>
		</div>
	</div><!-- .entry-content -->

</article><!-- #post-## -->