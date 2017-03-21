<?php
/**
 * Partial template for the "How It Works" page
 *
 * @package understrap
 */

?>
<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

    <div class="entry-content">

	<?php the_content(); ?>

	</div><!-- .entry-content -->

</article><!-- #post-## -->