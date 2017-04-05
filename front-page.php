<?php
/**
 * The front page template file
 *
 * The template for the front page
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package portafolio
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php
		$the_query = new WP_Query( 
			array(
				'post_type' => 'case_study'
			)
		);

		if ( $the_query->have_posts() ) : ?>

			<header>
				<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
			</header>

			<div class="card-grid">
				<div class="row small-up-1 medium-up-2 large-up-3" data-equalizer data-equalize-on="medium">

					<?php

					/* Start the Loop */
					while ( $the_query->have_posts() ) : $the_query->the_post();

						?><div class="column column-block"><?php

							/*
							 * Include the Post-Format-specific template for the content.
							 * If you want to override this in a child theme, then include a file
							 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
							 */
							get_template_part( 'template-parts/content', 'card' );

						?></div><?php

					endwhile;

					the_posts_navigation();

					wp_reset_postdata();

		else :

					?><div class="small-12 column"><?php
						get_template_part( 'template-parts/content', 'none' );
					?></div><?php

				?></div><!-- .row -->
			</div><!-- .card-grid -->
		<?php
		endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
/* get_sidebar(); */
get_footer();
