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

		<div id = "interstitialRegistration">
			<div class = "row">
				<div id = "customer" class = "col-lg-6">
					<div class = "registerCard">
						<h3>Buyer/Seller</h3>
						<p>If you are buying or selling a home you qualify for a 20% commission rebate from participating real estate agents.  It’s simple, It’s easy.. and It’s free.  Simply click on the “Registration” Tab below and you will be enrolled in our program.  If you are already working with an agent tell them about Zbate and get your “Zbate Rebate”.</p>
						<a href = "<?php echo bloginfo('url'); ?>/buyer-seller/buyer-seller-registration/" class = "btn btn-primary btn-lg text-uppercase btn-block">Buyer/Seller Registration</a>
					</div>
				</div>

				<div id = "agent" class = "col-lg-6">
					<div class = "registerCard">
						<h3>Agent</h3>
						<p>Begin building your business with Zbate by simply register below.  Once registered you will have access to marketing materials and open house materials that will promote you and your partnership with Zbate and allow you to offer a “Zbate Rebate” to your customers and clients.  Register now, grow your business and start making your clients raving fans.  Zbate welcomes all agents from all agencies.</p>
						<a href = "<?php echo bloginfo('url'); ?>/agent/agent-registration/" class = "btn btn-primary btn-lg text-uppercase btn-block">Agent Registration</a>
					</div>
				</div>
			</div>
		</div>
	</div><!-- .entry-content -->
</article><!-- #post-## -->
