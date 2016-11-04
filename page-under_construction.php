<?php
/**
 * Template Name: Under Construction
 *
 * The template for displaying a temporary page with the OMED logo.
 * 
 * Useful to display while we prepare a big change on the site.
 *
 * @package omed2016
 */
?>

<?php
while ( have_posts() ) : the_post();

  the_content();

endwhile; // End of the loop.
?>
