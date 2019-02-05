<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package The_100
 */

?>

<div class="col-md-4">
    <?php dynamic_sidebar( 'sidebar-left' ); ?> 
</div>
<div class="col-md-8">
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>    
        
	<div class="post-content-wrap">
		<header class="entry-header">
			<figure>
                <?php if(has_post_thumbnail()){
                    echo "<div class='post-img-wrap'>";
                    the_post_thumbnail('the100-rectangle');
                    echo "</div>";
                }?>
            </figure>    
            <aside>
                <p><?php the_field('service_type'); ?></p>
                <h3><?php the_title(); ?></h3>
            </aside>
		</header><!-- .entry-header -->
            
        <div class="area-req">
            <div class="col-md-4">
                <h5>Area Req</h5>
                <a><?php the_field('area_req'); ?></a>
            </div>
            <div class="col-md-4">
                <h5>Investment Range</h5>
                <a><?php the_field('investment_range'); ?></a>
            </div>
            <div class="col-md-4">
                <h5>Franchise Outlets</h5>
                <a><?php the_field('franchise_outlets'); ?></a>
            </div>
        </div>
		        
		<div class="entry-content business-details">
            <h4 class="bs-title">Business Details</h4>
            <div class="content-inner">
                <?php the_content(); ?>          
            </div>
            
		</div><!-- .entry-content -->

<!--		<footer class="entry-footer"><?php //the100_entry_footer(); ?></footer>-->
	</div>
</article><!-- #post-## -->

</div>
