<?php
/**
 * The template for displaying the homepage
 *
 * @package understrap
 */

get_header(); ?>

<div id="page-wrapper">
	<div class="container-fluid heroSection" id="content" tabindex="-1">
		<div id = "opacityLayer">
			<div class="row">
				<div id = "hpCTA" class = "col-sm-12 text-center mb-3">
					<h1>Save Money When You Buy or Sell a Home!</h1>
					<h1>Get Your "ZBATE REBATE"</h1>
				</div>

					<?php while ( have_posts() ) : the_post(); ?>

					        <div class="range-holder">
					                <span class="range range-left">$100,000</span>
					                <span class="range range-right pull-right">$2,000,000</span>
					                <div id="home_price_slider" class="dragdealer">
					                  <div class="stripe">
					                    <div class="handle">
					                      <div class="infobox text-center">
					                        <div class="innerbox-before"></div>
						                        <div class="innerbox">
									        	<h3>Home Price</h3>
									        	<span class="homePrice"></span>
						                        <h3>Your Zbate Reward:</h3>
						                        <span class="rebateAmount"></span>
						                      </div>
						                    <div class="innerbox-after""></div>
						                  </div>
					                      <div class="square"></div>
					                  </div>
					                </div>
					            </div><!-- .dragdealer -->
					        </div> <!-- .range-holder -->
					<?php endwhile; // end of the loop ?>

					<div class = "col-sm-6 text-center"><a href = "/choose-an-account/" class = "btn btn-primary btn-lg hpButton text-uppercase">Register</a></div>
					<div class = "col-sm-6 text-center"><a href = "/how-it-works/" class = "btn btn-primary btn-lg hpButton text-uppercase">How It Works</a></div>
			</div><!-- .row -->
		</div><!-- #opacityLayer -->
	</div><!-- .container-fluid -->
</div><!-- Wrapper end -->

<?php get_footer(); ?>