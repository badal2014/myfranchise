<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package The_100
 */

?>


<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
   
    
   
    <?php
    if ( is_single() ) :
?>
          <?php if(has_post_thumbnail()){
                echo "<div class='post-img-wrap'>";
                the_post_thumbnail('the100-rectangle');
                echo "</div>";
            }?>
               <div class="post-content-wrap">
                <header class="entry-header">
                    <?php
                    if ( is_single() ) :
                        the_title( '<h1 class="entry-title">', '</h1>' );
                    else :
                        the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
                    endif;

                    if ( 'post' === get_post_type() ) : ?>
                    <div class="entry-meta">
                        <?php the100_posted_on(); ?>
                    </div><!-- .entry-meta -->
                    <?php
                    endif; ?>
                </header><!-- .entry-header -->

                <div class="entry-content">
                    <?php
                    if ( is_single() ) :
                        the_content( sprintf(
                            /* translators: %s: Name of current post. */
                            wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'the100' ), array( 'span' => array( 'class' => array() ) ) ),
                            the_title( '<span class="screen-reader-text">"', '"</span>', false )
                        ) );
                        wp_link_pages( array(
                            'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'the100' ),
                            'after'  => '</div>',
                        ) );
                    else :
                        the_excerpt();
                    endif;
                    ?>
                </div><!-- .entry-content -->

                <footer class="entry-footer"><?php the100_entry_footer(); ?></footer><!-- .entry-footer -->
            </div>
       <?php
        
    else :
    ?>       
          <div class="category-page">
            <div class="post-content-wrap">
               
                <header class="entry-header"> 
                    <p><?php the_field('service_type'); ?></p>
                    <a href="<?php echo get_permalink(); ?>"><?php the_title(); ?> </a>	
                </header>
                
                <div class="col-md-8 border-right">
                    <div class="entry-content">
                        <?php the_excerpt(); ?>
                        <a href="<?php echo get_permalink(); ?>" class="know-more-btn">Free Know More</a>
                    </div>
                </div>
                
                <div class="col-md-4 text-center">
                    <figure class="thumbnail-img">
                        <?php the_post_thumbnail(); ?>
                    </figure>
                </div>

            </div> 
            </div>          
        
        <?php
    endif;

?>
	
	
</article><!-- #post-## -->
