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
		<div class="row">
			<div class="small-12 medium-6 medium-push-6 large-5 large-push-7 columns panel">
				<div class="featured-image">
					<?php
					if ( has_post_thumbnail() ) :
						echo get_the_post_thumbnail( $post_id, 'full' );
					else :
						?><img src="http://placehold.it/1200x900?text=Select+A+Featured+Image"><?php
					endif;
					?>
				</div>
			</div>
			<div class="small-12 medium-6 medium-pull-6 large-7 large-pull-5 columns panel">
				<div class="project-details">
					<div class="objective">
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi sit amet nisi enim. Vivamus eget cursus eros. Vestibulum vehicula quam in libero dignissim, at porttitor mauris varius. Suspendisse eget massa sodales, lacinia mauris ut, lobortis tellus. Maecenas eget scelerisque erat. In tincidunt sodales augue non suscipit.</p>
						<?php 
							$client = get_post_meta( get_the_ID(), 'client', true );
							if( !empty( $client ) ) : ?>
								<p class="label">Client</p>
								<p><?php echo $client ?></p>
							<?php
							endif; ?>
						<p class="label">What I Executed</p>
						<p class="tools">Entreprenuership, web development, photography, branding, product development</p>
					</div>
				</div>
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
