<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package rise
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'rise' ); ?></a>

	<header id="masthead" class="site-header gradient" role="banner">
    	<div class="grid grid-pad">
        	<div class="col-1-1">
            
                <div class="site-branding">
                        
                	<?php if ( get_theme_mod( 'rise_logo' ) ) : ?> 
              
    					<div class="site-logo site-title"> 
                
       						<a href='<?php echo esc_url( home_url( '/' ) ); ?>' title='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>' rel='home'>
                    
                    			<img 
                        			src='<?php echo esc_url( get_theme_mod( 'rise_logo' ) ); ?>'
                            
									
                            		width="<?php echo esc_attr( get_theme_mod( 'logo_size', '120' )); ?>"
                            		
                            
                            		alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>"
                                >
                    
                    		</a> 
                    
    					</div><!-- site-logo -->
                
					<?php else : ?>
            
    					<hgroup>
       						<h1 class='site-title'>
                    
                    			<a href='<?php echo esc_url( home_url( '/' ) ); ?>' title='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>' rel='home'>
                        
									<?php bloginfo( 'name' ); ?>
                            
                    			</a>
                        
                    		</h1>
    					</hgroup>
                
					<?php endif; ?> 
                        
                        
                </div><!-- .site-branding -->
                
        		<?php if ( 'option1' == rise_sanitize_index_content( get_theme_mod( 'rise_menu_method' ) ) ) : ?>
                
					<?php get_template_part( 'template-parts/content', 'nav-traditional' ); ?>
                
                <?php else : ?>
                
                	<?php get_template_part( 'template-parts/content', 'nav-button' ); ?>
                
                <?php endif; ?>
                
                

	<div id="content" class="site-content"> 
