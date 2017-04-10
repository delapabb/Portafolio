<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package portafolio
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'portafolio' ); ?></a>

	<div class="site-padding">
	
		<div class="column row">
			<header id="masthead" class="site-header" role="banner">
				<div class="site-branding">
					<?php
					if ( is_front_page() && is_home() ) : ?>
						<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
					<?php else : ?>
						<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
					<?php
					endif;

					$description = get_bloginfo( 'description', 'display' );
					if ( $description || is_customize_preview() ) : ?>
						<div class="site-description"><?php echo wpautop( $description, true ); /* WPCS: xss ok. */ ?></div>
					<?php
					endif; ?>

					<?php
					$bio = get_theme_mod( 'portafolio_bio_text' ); 
					if ( $bio || is_customize_preview() ) : ?>
						<div class="bio">
							<?php echo wpautop( $bio, true ); ?></p>
						</div>
					<?php
					endif;  ?>

					<?php
					$linkedin_url = get_theme_mod( 'portafolio_linkedin_url');
					$angellist_url = get_theme_mod( 'portafolio_angellist_url');
					$github_url = get_theme_mod( 'portafolio_github_url');
					$twitter_url = get_theme_mod( 'portafolio_twitter_url'); ?>
					<div class="bio-drawer-footer">
						<div class= "icon toggle-bio bio-closed"></div>
						<?php if ( $linkedin_url ) : ?>
							<a href= "<?php echo $linkedin_url; ?>" target="_blank">
								<img class="icon" src="<?php bloginfo('stylesheet_directory'); ?>/images/linkedin.svg" alt="Linked In">
							</a>
						<?php endif; ?>
						<?php if ( $angellist_url ) : ?>
							<a href= "<?php echo $angellist_url; ?>" target="_blank">
								<img class="icon" src="<?php bloginfo('stylesheet_directory'); ?>/images/angellist.svg" alt="AngelList">
							</a>
						<?php endif; ?>
						<?php if ( $github_url ) : ?>
							<a href= "<?php echo $github_url; ?>" target="_blank">
								<img class="icon" src="<?php bloginfo('stylesheet_directory'); ?>/images/github.svg" alt="GitHub">
							</a>
						<?php endif; ?>
						<?php if ( $twitter_url ) : ?>
							<a href= "<?php echo $twitter_url; ?>" target="_blank">
								<img class="icon" src="<?php bloginfo('stylesheet_directory'); ?>/images/twitter.svg" alt="Twitter">
							</a>
						<?php endif; ?>
						<a class="button round" href="#">Hire Me</a>
					</div>

				</div><!-- .site-branding -->

				<!-- #site-navigation
				<nav id="site-navigation" class="main-navigation" role="navigation">
					<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'portafolio' ); ?></button>
					<?php wp_nav_menu( array( 'theme_location' => 'menu-1', 'menu_id' => 'primary-menu' ) ); ?>
				</nav>
				-->
			</header><!-- #masthead -->
		</div>
	</div>

	<div id="content" class="site-content">
		<div class="site-padding">
