<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package understrap
 */

$the_theme = wp_get_theme();
$container = get_theme_mod( 'understrap_container_type' );
?>

<?php if ( is_active_sidebar( 'footer_1') || is_active_sidebar( 'footer_2') || is_active_sidebar( 'footer_3') || is_active_sidebar( 'footer_4') ) { ?>

<div class="wrapper" id="wrapper-footer">

	<div class="<?php echo esc_html( $container ); ?>">

	<div id = "footerWidgets" class = "row">

		<div class = "col-lg-3 col-sm-12">
			<?php dynamic_sidebar('footer_1'); ?>
		</div>
		
		<div class = "col-lg-3 col-sm-12">
			<?php dynamic_sidebar('footer_2'); ?>
		</div>
		
		<div class = "col-lg-3 col-sm-12">
			<?php dynamic_sidebar('footer_3'); ?>
		</div>
		
		<div class = "col-lg-3 col-sm-12">
			<?php dynamic_sidebar('footer_4'); ?>
		</div>

	</div><!-- #footerWidgets -->

	</div><!-- .container -->

	<?php } ?>

<div id = "bottomFooter" class = "container-fluid">
	<footer class="site-footer" id="colophon">
		<div class="site-info">
			<div class="row justify-content-center">
				<div class = "col-sm-5">
					<span class = "footerLink">&copy; <?php echo date('Y'); ?> <?php bloginfo( 'name' ); ?></span>
				</div>
				
				<div class = "col-sm-5">
					<span class = "footerLink pull-right"><a href = "terms-and-conditions">Terms & Conditions</a> | <a href = "privacy-policy">Privacy Policy</a></span>
				</div>
			</div><!-- row end -->
		</div><!-- .site-info -->
	</footer><!-- #colophon -->

</div><!-- .container-fluid -->

</div><!-- wrapper end -->

</div><!-- #page-wrapper -->

<?php wp_footer(); ?>

<script>
jQuery('button').on('click', function(){
  jQuery('body').toggleClass('open');
});
</script>

</body>

</html>
