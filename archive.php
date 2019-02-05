<?php
/**
 * The template for displaying archive pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package The_100
 */

get_header(); ?>

<div class="ed-container">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
            <div class="col-md-4">
                <?php dynamic_sidebar( 'sidebar-left' ); ?>
            </div>

            <div class="col-md-8">
<!--
               <?php //$post_id= get_the_ID( $atts ); ?>
                <h4><?php //echo $post_id; ?></h4> 
-->
                       
                <?php
                if ( have_posts() ) : ?>

                <?php
                /* Start the Loop */
                while ( have_posts() ) : the_post();
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

                    endif; ?>
				
                </div>

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
