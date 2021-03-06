<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package portafolio
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'case-study' ); ?>>
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	</header><!-- .entry-header -->

	<div class="summary">

		<div class="featured-image">
			<?php
			if ( has_post_thumbnail() ) :
				echo get_the_post_thumbnail( $post_id, 'full' );
			else :
				?><img src="http://placehold.it/1200x900?text=Select+A+Featured+Image"><?php
			endif;
			?>
		</div>

		<div class="project-details">
			<div class="objective">
				<?php 

					$summary = get_post_meta( get_the_ID(), 'summary', true );
					$client = get_post_meta( get_the_ID(), 'client', true );
					$tools = get_post_meta( get_the_ID(), 'tools', true );

					if( !empty( $summary ) ) : ?>
						<?php echo wpautop( $summary, true ); ?>
					<?php
					endif;

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
		</div>

	</div>

	<div class="entry-content">
		<?php
			the_content( sprintf(
				/* translators: %s: Name of current post. */
				wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'portafolio' ), array( 'span' => array( 'class' => array() ) ) ),
				the_title( '<span class="screen-reader-text">"', '"</span>', false )
			) );

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'portafolio' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php portafolio_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
