<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package cactuskiev
 */

?>
<!doctype html>
<html lang="ru-RU" prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb#">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="icon" type="image/svg+xml" href="/images/logo.svg">

	
<link rel="stylesheet" href="https://use.fontawesome.com/784fb1ed3f.css">


	<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>

<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'cactuskiev' ); ?></a>

	<header id="masthead">
		<div class="top">

			<div class="top-menu">
				<div class="social-links">
					<ul>
						<li>
							<a href="https://www.facebook.com/cactuskiev/"><i class="fa fa-facebook-square"></i></a>
						</li>
						<li>
							<a href="https://twitter.com/cactuskiev"><i class="fa fa-twitter-square"></i></a>
						</li>
						<li>
							<a href="https://plus.google.com/u/1/b/102416554935624379000/102416554935624379000"><i class="fa fa-google-plus-square"></i></a>
						</li>
						<li>
							<a href="https://www.youtube.com/channel/UC4Rbsf00LoHotQiVJ1YLjkg"><i class="fa fa-youtube-square"></i></a>
						</li>
						<li>
							<a href="#"><i class="fa fa-instagram"></i></a>
						</li>
					</ul>
				</div>
				<div class="top-links">
					<div class="login-form">
						<!-- Trigger/Open The Modal -->
						<?php if ( !is_user_logged_in()) {?>
						<a id="myBtn" href="#"> Логин</a>
					<?php }else{
					dynamic_sidebar( 'top' );
				 }?>

						<!-- The Modal -->
						<div id="Modal" class="modal">
							<div class="modal-content">
								<?php dynamic_sidebar( 'top' ); ?>
							</div>
						</div>
					</div>

					<div class="menu-links">
					<?php
						wp_nav_menu( array(
							'theme_location' => 'menu-2',
							'menu_id'        => 'top-menu',
						) );
					?>
				</div>

				</div>
			</div>

		</div>
		<div class="site-header">
		<div class="site-branding">
			<div class="site-logo">
				<a href="/" class="custom-logo-link" rel="home" itemprop="url"><img src="/images/logo.svg" class="custom-logo" alt="Кактус Киев" itemprop="logo"></a>
				<a href="/" class="custom-logo-link" rel="home" itemprop="url">
				<img src="/images/logo-title.svg" class="custom-logo" alt="Кактус Киев" itemprop="logo"></a>
				<span><h3>Украинский сайт о кактусах и кактусоводах</h3></span>
			</div>
		</div><!-- .site-branding -->

		<nav id="site-navigation" class="main-navigation">
			<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><i class="fa fa-bars" aria-hidden="true"></i>
</button>
			<?php
				wp_nav_menu( array(
					'theme_location' => 'menu-1',
					'menu_id'        => 'primary-menu',
				) );
			?>
		</nav><!-- #site-navigation -->
	</div>
	</header><!-- #masthead -->

	<div id="content" class="site-content">
