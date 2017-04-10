<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package portafolio
 */

?>

<a href="<?php echo get_permalink(); ?>">

	<article id="post-<?php the_ID(); ?>" <?php post_class( 'card' ); ?> data-equalizer-watch>
		<header class="entry-header">

			<?php the_title( '<h2 class="screen-reader-text">', '</h2>' ); ?>

		</header>

		<?php
			if ( has_post_thumbnail() ) :
				echo get_the_post_thumbnail( $post_id, 'full' ); else : ?>
				<img src="http://placehold.it/1200x900?text=Select+A+Featured+Image">
			<?php
			endif; ?>

		<div class="project-details">

			<?php

			the_title( '<p class="title">', '</p>' );

			$client = get_post_meta( get_the_ID(), 'client', true );
			$tools = get_post_meta( get_the_ID(), 'tools', true );

			if( !empty( $client ) ) : ?>
				<p class="label">Client</p>
				<p><?php echo $client ?></p>
			<?php
			endif;

			if( !empty( $tools ) ) : ?>
				<p class="label">What I Executed</p>
				<p class="tools"><?php echo $tools ?></p>
			<?php
			endif; ?>

		</div>

		<span class="button">See This Project</span>

	</article><!-- #post-## -->

</a>
