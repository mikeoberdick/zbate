<?php
/**
 * The template for displaying the homepage
 *
 * @package understrap
 */

get_header(); ?>

<div id="page-wrapper">
	<div class="container-fluid heroSection" id="content" tabindex="-1" style = "background-image: url('<?php the_post_thumbnail_url(); ?>')">
		<div id = "opacityLayer">
			<div class="row">
				<div id = "hpCTA" class = "col-sm-12 text-center mb-3">
					<h1>Save Money When You Buy or Sell a Home!</h1>
					<h1>Get Your "ZBATE REBATE"</h1>
				</div>

					<?php while ( have_posts() ) : the_post(); ?>

					        <div class="range-holder">
					                <span class="range range-left">$100,000</span>
					                <span class="range range-right pull-right">$1,000,000</span>
					                <div id="home_price_slider" class="dragdealer">
					                  <div class="stripe">
					                    <div class="handle">
					                      <div class="infobox text-center">
					                        <div class="innerbox-before"></div>
						                        <div class="innerbox">
									        	<h3>Home Price</h3>
									        	<span class="homePrice mb-3"></span>
						                        <h3 class = "rebateHeader">Your Zbate Rebate<span>*</span>:</h3>
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

					<div class = "col-sm-12 text-center register_button">
						<a href = "<?php echo bloginfo('url'); ?>/register" class = "btn btn-primary btn-lg hpButton text-uppercase mb-5">Register</a><p class = "disclaimer">*Amounts shown are for illustrative purposes only and actual rebate will be determined based on commission collected.</p>
					</div>
					
				
			</div><!-- .row -->
				<div id="js-heightControl" style="height: 0;">&nbsp;</div>
		</div><!-- #opacityLayer -->
	</div><!-- .container-fluid -->

</div><!-- Wrapper end -->

<?php get_footer(); ?>