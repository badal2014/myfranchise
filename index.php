<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package The_100
 */

get_header();
if ( is_home() && ! is_front_page() ) :
	?>
	<header class="page-header">
		<div class="ed-container">
			<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
			<h1 class="page-title"><?php single_post_title(); ?></h1>
		</div>
	</header>
	<?php
endif;
?>
<div class="ed-container">
	<?php 
	$the100_sidebar = get_theme_mod('the100_archive_sidebar_layout', 'right-sidebar');
	if(empty($the100_sidebar)){$the100_sidebar='right-sidebar';}
	if($the100_sidebar=='left-sidebar'){
		get_sidebar('left');
	}
	?>
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<?php
			if ( have_posts() ) :
				/* Start the Loop */
				while ( have_posts() ) : 
					the_post();
					/*
					 * Include the Post-Format-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
					 */
					get_template_part( 'template-parts/content', get_post_format() );
				endwhile;
				the_posts_navigation();
			else :
				get_template_part( 'template-parts/content', 'none' );
			endif;
			?>
		</main><!-- #main -->
	</div><!-- #primary -->
	<?php 
	if($the100_sidebar=='right-sidebar' ){
		get_sidebar();
	}
	?>
</div>
<?php
get_footer();