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
<div id = "interstitialRegistration">
	<div class = "row">
		<div id = "customer" class = "col-sm-6">
			<h3>Buyer/Seller</h3>
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consectetur nulla commodi temporibus officiis, officia eos velit culpa distinctio asperiores doloremque ex veritatis non neque praesentium esse corrupti, et ullam quibusdam.</p>
			<a href = "/customer-registration/" class = "btn btn-primary btn-lg text-uppercase">Buyer/Seller</a>
		</div>

		<div id = "agent" class = "col-sm-6">
			<h3>Agent</h3>
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consectetur nulla commodi temporibus officiis, officia eos velit culpa distinctio asperiores doloremque ex veritatis non neque praesentium esse corrupti, et ullam quibusdam.</p>
			<a href = "/agent-registration/" class = "btn btn-primary btn-lg text-uppercase">Agent</a>
		</div>
	</div>
</div>

</article><!-- #post-## -->
