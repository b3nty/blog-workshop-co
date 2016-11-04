<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package rise
 */

get_header(); ?>

	<?php if ( get_theme_mod( 'rise_blog_bg' ) ) : ?>
		<header class="entry-header parallax-window" data-parallax="scroll" data-image-src="<?php echo esc_url( get_theme_mod( 'rise_blog_bg' )); ?>" data-z-index="-1">
    <?php else : ?>
    
    	<header class="entry-header"> 
        
    <?php endif; ?> 
     
    	<div class="grid grid-pad">
            <div class="col-1-1">
				<h1 class="entry-title"><?php echo esc_html( get_theme_mod( 'rise_blog_title', esc_html__( 'Blog', 'rise' ) )) ?></h1> 
           	</div>
      	</div>
	</header><!-- .entry-header -->

<section id="page-container" class="page-wrap"> 
    <div class="grid grid-pad">
    
    
    	<?php if ( 'option1' == rise_sanitize_index_content( get_theme_mod( 'rise_sidebar_blog_setting' ) ) ) : ?>
    
       		<div class="col-8-12">
        
    	<?php else : ?>
    
			<div class="col-1-1">
            
		<?php endif; ?>
        
        
            <div id="primary" class="content-area shortcodes">
                <main id="main" class="site-main" role="main">
        
                <?php
                if ( have_posts() ) :
        
                    if ( is_home() && ! is_front_page() ) : ?>
                        <header>
                            <h1 class="page-title screen-reader-text">
								<?php single_post_title(); ?>
                            </h1>
                        </header>
        
                    <?php
                    endif;
        
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
        
                </main><!-- #main -->
            </div><!-- #primary -->
        </div>
    
    
    	<?php if ( 'option1' == rise_sanitize_index_content( get_theme_mod( 'rise_sidebar_blog_setting' ) ) ) : ?> 
  
        	<?php get_sidebar(); ?> 
        
    	<?php else : ?>
    
			
            
		<?php endif; ?>  
    
    
    </div>
</section>

<?php get_footer(); ?>

