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

		if ( 'post' === get_post_type() ) : ?>

		<!--
		<div class="entry-meta">
			<?php portafolio_posted_on(); ?>
		</div>
		.entry-meta -->

		<?php
		endif; ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php
			the_content( sprintf(
				/* translators: %s: Name of current post. */
				wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'portafolio' ), array( 'span' => array( 'class' => array() ) ) ),
				the_title( '<span class="screen-reader-text">"', '"</span>', false )
			) );

		?>

		<a class="button" href="<?php echo get_permalink(); ?>">See This Project</a>
		
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php // portafolio_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
