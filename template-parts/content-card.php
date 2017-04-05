<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package portafolio
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'card' ); ?> data-equalizer-watch>
	<header class="entry-header">
		<?php

		if ( has_post_thumbnail() ) :
			echo get_the_post_thumbnail( $post_id, 'full' );
		else :
			?><img src="http://placehold.it/1200x900?text=Select+A+Featured+Image"><?php
		endif;

		the_title( '<h2>', '</h2>' );
		?>
	</header><!-- .entry-header -->
	<a class="button" href="<?php echo get_permalink(); ?>">See This Project</a>
</article><!-- #post-## -->
