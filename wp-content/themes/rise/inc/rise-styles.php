<?php
/**
 * rise Theme Customizer
 *
 * @package rise
 */


/**
 * Add CSS in <head> for styles handled by the theme customizer
 *
 * @since 1.5
 */
function rise_add_customizer_css() {
	
?>
	
<!-- rise customizer CSS -->  

	<style> 
		
		<?php if ( get_theme_mod( 'rise_nav_link_color' ) ) : ?>
		.site-header .main-navigation a { color: <?php echo esc_attr( get_theme_mod( 'rise_nav_link_color', '#ffffff' )) ?>; }
		<?php endif; ?> 
		
		<?php if ( get_theme_mod( 'rise_nav_link_hover_color' ) ) : ?>
		.site-header .main-navigation a:hover { color: <?php echo esc_attr( get_theme_mod( 'rise_nav_link_hover_color', '#C4C5C5' )) ?>; }
		<?php endif; ?> 
		
		<?php if ( get_theme_mod( 'rise_nav_drop_link_color' ) ) : ?>
		.site-header .main-navigation ul ul a { color: <?php echo esc_attr( get_theme_mod( 'rise_nav_drop_link_color', '#656565' )) ?>; } 
		<?php endif; ?>
		
		<?php if ( get_theme_mod( 'rise_nav_drop_link_hover_color' ) ) : ?>
		.site-header .main-navigation ul ul a:hover { color: <?php echo esc_attr( get_theme_mod( 'ma_nav_drop_link_hover_color', '#A7A8A8' )) ?>; } 
		<?php endif; ?>
		
		<?php if ( get_theme_mod( 'rise_nav_drop_bg_color' ) ) : ?>
		.site-header .main-navigation ul ul { background-color: <?php echo esc_attr( get_theme_mod( 'rise_nav_drop_bg_color', '#eaebeb' )) ?>; } 
		<?php endif; ?> 
		
		<?php if ( get_theme_mod( 'rise_nav_text_size' ) ) : ?>
		.cbp-spmenu ul ul a, .main-navigation a, .cbp-spmenu a  { font-size: <?php echo esc_attr( get_theme_mod( 'rise_nav_text_size', '12' )) ?>px; } 
		<?php endif; ?>
		
		
		<?php if ( get_theme_mod( 'rise_mobile_button_color' ) ) : ?>
		button.toggle-menu { background-color: <?php echo esc_attr( get_theme_mod( 'rise_mobile_button_color', '#ffffff' )) ?>; }
		<?php endif; ?> 
		
		<?php if ( get_theme_mod( 'rise_mobile_button_color' ) ) : ?>
		button.toggle-menu { border-color: <?php echo esc_attr( get_theme_mod( 'rise_mobile_button_color', '#ffffff' )) ?>; }
		<?php endif; ?>
		
		<?php if ( get_theme_mod( 'rise_mobile_button_text_color' ) ) : ?>
		button.toggle-menu { color: <?php echo esc_attr( get_theme_mod( 'rise_mobile_button_text_color', '#2a2a2d' )) ?>; }
		<?php endif; ?> 
		
		<?php if ( get_theme_mod( 'rise_mobile_button_hover_color' ) ) : ?>
		button.toggle-menu:hover { background-color: <?php echo esc_attr( get_theme_mod( 'rise_mobile_button_hover_color', '#3d3d41' )) ?>; }
		<?php endif; ?> 
		
		<?php if ( get_theme_mod( 'rise_mobile_button_hover_color' ) ) : ?>
		button.toggle-menu:hover { border-color: <?php echo esc_attr( get_theme_mod( 'rise_mobile_button_hover_color', '#3d3d41' )) ?>; }
		<?php endif; ?>  
		
		<?php if ( get_theme_mod( 'rise_mobile_button_hover_text_color' ) ) : ?>
		button.toggle-menu:hover { color: <?php echo esc_attr( get_theme_mod( 'rise_mobile_button_hover_text_color', '#ffffff' )) ?>; } 
		<?php endif; ?> 
		
		
		<?php if ( get_theme_mod( 'rise_mobile_menu_bg' ) ) : ?>
		.cbp-spmenu { background-color: <?php echo esc_attr( get_theme_mod( 'rise_mobile_menu_bg', '#3d3d41' )) ?>; }  
		<?php endif; ?>
		
		<?php if ( get_theme_mod( 'rise_mobile_menu_link' ) ) : ?>
		.cbp-spmenu a { color: <?php echo esc_attr( get_theme_mod( 'rise_mobile_menu_link', '#ffffff' )) ?>; }  
		<?php endif; ?>
		
		<?php if ( get_theme_mod( 'rise_mobile_menu_hover' ) ) : ?>
		.cbp-spmenu a:hover { color: <?php echo esc_attr( get_theme_mod( 'rise_mobile_menu_hover', '#ffffff' )) ?>; }  
		<?php endif; ?>
		
		<?php if ( get_theme_mod( 'rise_mobile_menu_hover_bg' ) ) : ?>
		.cbp-spmenu a:hover { background-color: <?php echo esc_attr( get_theme_mod( 'rise_mobile_menu_hover_bg', '#333333' )) ?>; }  
		<?php endif; ?>
			
		
	
		<?php if ( get_theme_mod( 'rise_hero_bg_color' ) ) : ?>
		#home-hero { background-color: <?php echo esc_attr( get_theme_mod( 'rise_hero_bg_color', '#b6b9bd' )) ?>; } 
		<?php endif; ?>
		
		<?php if ( get_theme_mod( 'rise_hero_heading_color' ) ) : ?>
		.hero-title { color: <?php echo esc_attr( get_theme_mod( 'rise_hero_heading_color', '#ffffff' )) ?>; } 
		<?php endif; ?> 
		
		<?php if ( get_theme_mod( 'rise_hero_text_color' ) ) : ?>
		.hero-excerpt { color: <?php echo esc_attr( get_theme_mod( 'rise_hero_text_color', '#ffffff' )) ?>; } 
		<?php endif; ?> 
		
		<?php if ( get_theme_mod( 'rise_hero_button_text_color' ) ) : ?> 
		.hero-content a.button { color: <?php echo esc_attr( get_theme_mod( 'rise_hero_button_text_color', '#ffffff' )) ?>; } 
		<?php endif; ?> 
		
		<?php if ( get_theme_mod( 'rise_hero_button_bg_color' ) ) : ?> 
		.hero-content a.button { border-color: <?php echo esc_attr( get_theme_mod( 'rise_hero_button_bg_color', '#ffffff' )) ?>; }
		<?php endif; ?>
		
		<?php if ( get_theme_mod( 'rise_hero_button_hover_color' ) ) : ?>  
		.hero-content a.button:hover { border-color: <?php echo esc_attr( get_theme_mod( 'rise_hero_button_hover_color', '#3d3d41' )) ?>; } 
		<?php endif; ?> 
		
		<?php if ( get_theme_mod( 'rise_hero_button_hover_color' ) ) : ?> 
		.hero-content a.button:hover { background-color: <?php echo esc_attr( get_theme_mod( 'rise_hero_button_hover_color', '#3d3d41' )) ?>; }
		<?php endif; ?>
		
		<?php if ( get_theme_mod( 'rise_hero_button_text_hover_color' ) ) : ?>
		.hero-content a.button:hover { color: <?php echo esc_attr( get_theme_mod( 'rise_hero_button_text_hover_color', '#ffffff' )) ?>; }  
		<?php endif; ?> 
		
		
		
		<?php if ( get_theme_mod( 'rise_text_color' ) ) : ?> 
		body, textarea, p { color: <?php echo esc_attr( get_theme_mod( 'rise_text_color', '#656565' )) ?>; }
		<?php endif; ?>
		
		<?php if ( get_theme_mod( 'rise_heading_color' ) ) : ?> 
		h1, h2, h3, h4, h5, h6, .comment-form-comment { color: <?php echo esc_attr( get_theme_mod( 'rise_heading_color', '#3d3d41' )) ?>; }
		<?php endif; ?>
		
		<?php if ( get_theme_mod( 'rise_link_color' ) ) : ?> 
		a { color: <?php echo esc_attr( get_theme_mod( 'rise_link_color', '#3d3d41' )) ?>; } 
		<?php endif; ?>
		
		<?php if ( get_theme_mod( 'rise_hover_color' ) ) : ?>
		a:hover { color: <?php echo esc_attr( get_theme_mod( 'rise_hover_color', '#999999' )) ?>; }
		<?php endif; ?> 
		
		<?php if ( get_theme_mod( 'rise_entry' ) ) : ?>
		.entry-title { color: <?php echo esc_attr( get_theme_mod( 'rise_entry', '#ffffff' )) ?>; }
		<?php endif; ?>
		
		<?php if ( get_theme_mod( 'rise_page_header' ) ) : ?>
		.entry-header, .entry-header.parallax-window { background-color: <?php echo esc_attr( get_theme_mod( 'rise_page_header', '#b6b9bd' )) ?>; }
		<?php endif; ?>
		
		<?php if ( get_theme_mod( 'rise_body_size' ) ) : ?>
		body, p { font-size: <?php echo esc_attr( get_theme_mod( 'rise_body_size', '16' )) ?>px; } 
		<?php endif; ?>
		
		
		
		<?php if ( get_theme_mod( 'rise_content_bg' ) ) : ?> 
		.content-area article { background: <?php echo esc_attr( get_theme_mod( 'rise_content_bg', '#ffffff' )) ?>; }   
		<?php endif; ?>  
		
		<?php if ( get_theme_mod( 'rise_content_border' ) ) : ?> 
		.content-area article { border-color: <?php echo esc_attr( get_theme_mod( 'rise_content_border', '#f3f3f3' )) ?>; }   
		<?php endif; ?> 
		
		<?php if ( get_theme_mod( 'rise_sidebar_bg' ) ) : ?>
		.widget-area section { background-color: <?php echo esc_attr( get_theme_mod( 'rise_sidebar_bg', '#ffffff' )) ?>; } 
		<?php endif; ?>
		
		<?php if ( get_theme_mod( 'rise_sidebar_border' ) ) : ?>
		.widget-area section { border-color: <?php echo esc_attr( get_theme_mod( 'rise_sidebar_border', '#f3f3f3' )) ?>; } 
		<?php endif; ?>
		
		
		
		<?php if ( get_theme_mod( 'rise_hw_area_1_bg_color' ) ) : ?> 
		.home-section-1 { background: <?php echo esc_attr( get_theme_mod( 'rise_hw_area_1_bg_color', '#f9f9f9' )) ?>; } 
		<?php endif; ?>
		
		<?php if ( get_theme_mod( 'rise_hw_area_1_heading_color' ) ) : ?>
		.home-section-1 h1, .home-section-1 h2, .home-section-1 h3, .home-section-1 h4, .home-section-1 h5, .home-section-1 h6 { color: <?php echo esc_attr( get_theme_mod( 'rise_hw_area_1_heading_color', '#3d3d41' )) ?>; } 
		<?php endif; ?>
		
		<?php if ( get_theme_mod( 'rise_hw_area_1_text_color' ) ) : ?> 
		.home-section-1, .home-section-1 p { color: <?php echo esc_attr( get_theme_mod( 'rise_hw_area_1_text_color', '#656565' )) ?>; } 
		<?php endif; ?>
		
		<?php if ( get_theme_mod( 'rise_hw_area_1_link_color' ) ) : ?>
		.home-section-1 a { color: <?php echo esc_attr( get_theme_mod( 'rise_hw_area_1_link_color', '#3d3d41' )) ?>; } 
		<?php endif; ?>
		
		<?php if ( get_theme_mod( 'rise_hw_area_1_link_hover_color' ) ) : ?>
		.home-section-1 a:hover { color: <?php echo esc_attr( get_theme_mod( 'rise_hw_area_1_link_hover_color', '#999999' )) ?>; } 
		<?php endif; ?> 
		
		<?php if ( get_theme_mod( 'rise_hw_area_1_button_color' ) ) : ?> 
		.home-section-1 button { border-color: <?php echo esc_attr( get_theme_mod( 'rise_hw_area_1_button_color', '#3d3d41' )) ?>; }   
		<?php endif; ?> 
		
		<?php if ( get_theme_mod( 'rise_hw_area_1_button_text_color' ) ) : ?> 
		.home-section-1 button { color: <?php echo esc_attr( get_theme_mod( 'rise_hw_area_1_button_text_color', '#2a2a2d' )) ?>; }   
		<?php endif; ?> 
		
		<?php if ( get_theme_mod( 'rise_hw_area_1_button_hover_color' ) ) : ?>
		.home-section-1 button:hover { background: <?php echo esc_attr( get_theme_mod( 'rise_hw_area_1_button_hover_color', '#3d3d41' )) ?>; } 
		<?php endif; ?>
		
		<?php if ( get_theme_mod( 'rise_hw_area_1_button_hover_color' ) ) : ?>
		.home-section-1 button:hover { border-color: <?php echo esc_attr( get_theme_mod( 'rise_hw_area_1_button_hover_color', '#3d3d41' )) ?>; } 
		<?php endif; ?>
		
		<?php if ( get_theme_mod( 'rise_hw_area_1_button_hover_text_color' ) ) : ?>
		.home-section-1 button:hover { color: <?php echo esc_attr( get_theme_mod( 'rise_hw_area_1_button_hover_text_color', '#ffffff' )) ?>; } 
		<?php endif; ?> 
		
		
		
		<?php if ( get_theme_mod( 'rise_hw_area_2_bg_color' ) ) : ?> 
		.home-section-2 { background: <?php echo esc_attr( get_theme_mod( 'rise_hw_area_2_bg_color', '#f1f5f7' )) ?>; } 
		<?php endif; ?>
		
		<?php if ( get_theme_mod( 'rise_hw_area_2_heading_color' ) ) : ?>
		.home-section-2 h1, .home-section-2 h2, .home-section-2 h3, .home-section-2 h4, .home-section-2 h5, .home-section-2 h6 { color: <?php echo esc_attr( get_theme_mod( 'rise_hw_area_2_heading_color', '#3d3d41' )) ?>; }  
		<?php endif; ?>
		
		<?php if ( get_theme_mod( 'rise_hw_area_2_text_color' ) ) : ?> 
		.home-section-2, .home-section-2 p { color: <?php echo esc_attr( get_theme_mod( 'rise_hw_area_2_text_color', '#656565' )) ?>; } 
		<?php endif; ?>
		
		<?php if ( get_theme_mod( 'rise_hw_area_2_link_color' ) ) : ?>
		.home-section-2 a { color: <?php echo esc_attr( get_theme_mod( 'rise_hw_area_2_link_color', '#3d3d41' )) ?>; } 
		<?php endif; ?>
		
		<?php if ( get_theme_mod( 'rise_hw_area_2_link_hover_color' ) ) : ?>
		.home-section-2 a:hover { color: <?php echo esc_attr( get_theme_mod( 'rise_hw_area_2_link_hover_color', '#999999' )) ?>; } 
		<?php endif; ?> 
		
		<?php if ( get_theme_mod( 'rise_hw_area_2_button_color' ) ) : ?> 
		.home-section-2 button { border-color: <?php echo esc_attr( get_theme_mod( 'rise_hw_area_2_button_color', '#3d3d41' )) ?>; }   
		<?php endif; ?> 
		
		<?php if ( get_theme_mod( 'rise_hw_area_2_button_text_color' ) ) : ?> 
		.home-section-2 button { color: <?php echo esc_attr( get_theme_mod( 'rise_hw_area_2_button_text_color', '#2a2a2d' )) ?>; }   
		<?php endif; ?> 
		
		<?php if ( get_theme_mod( 'rise_hw_area_2_button_hover_color' ) ) : ?> 
		.home-section-2 button:hover { background: <?php echo esc_attr( get_theme_mod( 'rise_hw_area_2_button_hover_color', '#3d3d41' )) ?>; } 
		<?php endif; ?>
		
		<?php if ( get_theme_mod( 'rise_hw_area_2_button_hover_color' ) ) : ?>
		.home-section-2 button:hover { border-color: <?php echo esc_attr( get_theme_mod( 'rise_hw_area_2_button_hover_color', '#3d3d41' )) ?>; } 
		<?php endif; ?>
		
		<?php if ( get_theme_mod( 'rise_hw_area_2_button_hover_text_color' ) ) : ?> 
		.home-section-2 button:hover { color: <?php echo esc_attr( get_theme_mod( 'rise_hw_area_2_button_hover_text_color', '#ffffff' )) ?>; } 
		<?php endif; ?>
		
		
		
		<?php if ( get_theme_mod( 'rise_hw_area_3_bg_color' ) ) : ?> 
		.home-section-3 { background: <?php echo esc_attr( get_theme_mod( 'rise_hw_area_3_bg_color', '#f9f9f9' )) ?>; } 
		<?php endif; ?>
		
		<?php if ( get_theme_mod( 'rise_hw_area_3_heading_color' ) ) : ?>
		.home-section-3 h1, .home-section-3 h2, .home-section-3 h3, .home-section-3 h4, .home-section-3 h5, .home-section-3 h6 { color: <?php echo esc_attr( get_theme_mod( 'rise_hw_area_3_heading_color', '#3d3d41' )) ?>; } 
		<?php endif; ?>
		
		<?php if ( get_theme_mod( 'rise_hw_area_3_text_color' ) ) : ?> 
		.home-section-3, .home-section-3 p { color: <?php echo esc_attr( get_theme_mod( 'rise_hw_area_3_text_color', '#656565' )) ?>; } 
		<?php endif; ?>
		
		<?php if ( get_theme_mod( 'rise_hw_area_3_link_color' ) ) : ?>
		.home-section-3 a { color: <?php echo esc_attr( get_theme_mod( 'rise_hw_area_3_link_color', '#3d3d41' )) ?>; } 
		<?php endif; ?>
		
		<?php if ( get_theme_mod( 'rise_hw_area_3_link_hover_color' ) ) : ?>
		.home-section-3 a:hover { color: <?php echo esc_attr( get_theme_mod( 'rise_hw_area_3_link_hover_color', '#999999' )) ?>; } 
		<?php endif; ?> 
		
		<?php if ( get_theme_mod( 'rise_hw_area_3_button_color' ) ) : ?> 
		.home-section-3 button { border-color: <?php echo esc_attr( get_theme_mod( 'rise_hw_area_3_button_color', '#3d3d41' )) ?>; }   
		<?php endif; ?> 
		
		<?php if ( get_theme_mod( 'rise_hw_area_3_button_text_color' ) ) : ?> 
		.home-section-3 button { color: <?php echo esc_attr( get_theme_mod( 'rise_hw_area_3_button_text_color', '#2a2a2d' )) ?>; }   
		<?php endif; ?> 
		
		<?php if ( get_theme_mod( 'rise_hw_area_3_button_hover_color' ) ) : ?>
		.home-section-3 button:hover { background: <?php echo esc_attr( get_theme_mod( 'rise_hw_area_3_button_hover_color', '#3d3d41' )) ?>; } 
		<?php endif; ?>
		
		<?php if ( get_theme_mod( 'rise_hw_area_3_button_hover_color' ) ) : ?>
		.home-section-3 button:hover { border-color: <?php echo esc_attr( get_theme_mod( 'rise_hw_area_3_button_hover_color', '#3d3d41' )) ?>; } 
		<?php endif; ?>
		
		<?php if ( get_theme_mod( 'rise_hw_area_3_button_hover_text_color' ) ) : ?>
		.home-section-3 button:hover { color: <?php echo esc_attr( get_theme_mod( 'rise_hw_area_3_button_hover_text_color', '#ffffff' )) ?>; } 
		<?php endif; ?> 
		
		
		
		<?php if ( get_theme_mod( 'rise_hw_area_4_bg_color' ) ) : ?> 
		.home-section-4 { background: <?php echo esc_attr( get_theme_mod( 'rise_hw_area_4_bg_color', '#f1f5f7' )) ?>; } 
		<?php endif; ?>
		
		<?php if ( get_theme_mod( 'rise_hw_area_4_heading_color' ) ) : ?>
		.home-section-4 h1, .home-section-4 h2, .home-section-4 h3, .home-section-4 h4, .home-section-4 h5, .home-section-4 h6 { color: <?php echo esc_attr( get_theme_mod( 'rise_hw_area_4_heading_color', '#3d3d41' )) ?>; }  
		<?php endif; ?>
		
		<?php if ( get_theme_mod( 'rise_hw_area_4_text_color' ) ) : ?> 
		.home-section-4, .home-section-4 p { color: <?php echo esc_attr( get_theme_mod( 'rise_hw_area_4_text_color', '#656565' )) ?>; } 
		<?php endif; ?>
		
		<?php if ( get_theme_mod( 'rise_hw_area_4_link_color' ) ) : ?>
		.home-section-4 a { color: <?php echo esc_attr( get_theme_mod( 'rise_hw_area_4_link_color', '#3d3d41' )) ?>; } 
		<?php endif; ?>
		
		<?php if ( get_theme_mod( 'rise_hw_area_4_link_hover_color' ) ) : ?>
		.home-section-4 a:hover { color: <?php echo esc_attr( get_theme_mod( 'rise_hw_area_4_link_hover_color', '#999999' )) ?>; } 
		<?php endif; ?> 
		
		<?php if ( get_theme_mod( 'rise_hw_area_4_button_color' ) ) : ?> 
		.home-section-4 button { border-color: <?php echo esc_attr( get_theme_mod( 'rise_hw_area_4_button_color', '#3d3d41' )) ?>; }   
		<?php endif; ?> 
		
		<?php if ( get_theme_mod( 'rise_hw_area_4_button_text_color' ) ) : ?> 
		.home-section-4 button { color: <?php echo esc_attr( get_theme_mod( 'rise_hw_area_4_button_text_color', '#2a2a2d' )) ?>; }   
		<?php endif; ?> 
		
		<?php if ( get_theme_mod( 'rise_hw_area_4_button_hover_color' ) ) : ?> 
		.home-section-4 button:hover { background: <?php echo esc_attr( get_theme_mod( 'rise_hw_area_4_button_hover_color', '#3d3d41' )) ?>; } 
		<?php endif; ?>
		
		<?php if ( get_theme_mod( 'rise_hw_area_4_button_hover_color' ) ) : ?>
		.home-section-4 button:hover { border-color: <?php echo esc_attr( get_theme_mod( 'rise_hw_area_4_button_hover_color', '#3d3d41' )) ?>; } 
		<?php endif; ?>
		
		<?php if ( get_theme_mod( 'rise_hw_area_4_button_hover_text_color' ) ) : ?> 
		.home-section-4 button:hover { color: <?php echo esc_attr( get_theme_mod( 'rise_hw_area_4_button_hover_text_color', '#ffffff' )) ?>; } 
		<?php endif; ?> 
		
		
		<?php if ( get_theme_mod( 'rise_footer_color' ) ) : ?> 
		.site-footer { background: <?php echo esc_attr( get_theme_mod( 'rise_footer_color', '#f9f9f9' )) ?>; }  
		<?php endif; ?> 
		
		<?php if ( get_theme_mod( 'rise_footer_text_color' ) ) : ?>
		.site-footer, .site-footer p { color: <?php echo esc_attr( get_theme_mod( 'rise_footer_text_color', '#656565' )) ?>; }
		<?php endif; ?>
		
		<?php if ( get_theme_mod( 'rise_footer_link_color' ) ) : ?>
		.site-footer a { color: <?php echo esc_attr( get_theme_mod( 'rise_footer_link_color', '#3d3d41' )) ?>; } 
		<?php endif; ?>
		
		<?php if ( get_theme_mod( 'rise_footer_link_hover_color' ) ) : ?>
		.site-footer a:hover { color: <?php echo esc_attr( get_theme_mod( 'rise_footer_link_hover_color', '#999999' )) ?>; } 
		<?php endif; ?>
		
		
		
		<?php if ( get_theme_mod( 'rise_social_color' ) ) : ?>
		.social-media-icons li .fa, #menu-social li a::before { color: <?php echo esc_attr( get_theme_mod( 'rise_social_color', '#656565' )) ?>;  } 
		<?php endif; ?>
		
		<?php if ( get_theme_mod( 'rise_social_color_hover' ) ) : ?>
		.social-media-icons li .fa:hover, #menu-social li a:hover::before, #menu-social li a:focus::before { color: <?php echo esc_attr( get_theme_mod( 'rise_social_color_hover', '#999999' )) ?>; }
		<?php endif; ?>
		
		<?php if ( get_theme_mod( 'rise_social_text_size' ) ) : ?> 
		.social-media-icons li .fa, #menu-social li a::before { font-size: <?php echo esc_attr( get_theme_mod( 'rise_social_text_size', '16' )) ?>px; }
		<?php endif; ?> 
		
		
		
		<?php if ( get_theme_mod( 'rise_custom_color' ) ) : ?> 
		button, input[type="button"], input[type="reset"], input[type="submit"] { border-color: <?php echo esc_attr( get_theme_mod( 'rise_custom_color', '#3d3d41' )) ?>; }   
		<?php endif; ?>
		
		<?php if ( get_theme_mod( 'rise_button_text_color' ) ) : ?> 
		button, input[type="button"], input[type="reset"], input[type="submit"] { color: <?php echo esc_attr( get_theme_mod( 'rise_button_text_color', '#2a2a2d' )) ?>; }   
		<?php endif; ?>
		
		<?php if ( get_theme_mod( 'rise_custom_color_hover' ) ) : ?>
		button:hover, input[type="button"]:hover, input[type="reset"]:hover, input[type="submit"]:hover { background: <?php echo esc_attr( get_theme_mod( 'rise_custom_color_hover', '#3d3d41' )) ?>; } 
		<?php endif; ?>
		
		<?php if ( get_theme_mod( 'rise_custom_color_hover' ) ) : ?>
		button:hover, input[type="button"]:hover, input[type="reset"]:hover, input[type="submit"]:hover { border-color: <?php echo esc_attr( get_theme_mod( 'rise_custom_color_hover', '#3d3d41' )) ?>; }   
		<?php endif; ?>
		
		<?php if ( get_theme_mod( 'rise_button_text_hover_color' ) ) : ?>
		button:hover, input[type="button"]:hover, input[type="reset"]:hover, input[type="submit"]:hover { color: <?php echo esc_attr( get_theme_mod( 'rise_button_text_hover_color', '#ffffff' )) ?>; } 
		<?php endif; ?>
		
		
		<?php if ( get_theme_mod( 'rise_post_nav_bg' ) ) : ?>  
		.comment-navigation .nav-previous a, .posts-navigation .nav-previous a, .post-navigation .nav-previous a, .comment-navigation .nav-next a, .posts-navigation .nav-next a, .post-navigation .nav-next a { background-color: <?php echo esc_attr( get_theme_mod( 'rise_post_nav_bg', '#3d3d41' )) ?>; }
		<?php endif; ?>
		
		
		<?php if ( get_theme_mod( 'rise_plugin_project_hover_color' ) ) : ?> 
		.rise-effect .rise-mask { background-color: <?php echo esc_attr( get_theme_mod( 'rise_plugin_project_hover_color', '#2a2e39' )) ?>; }  
		<?php endif; ?> 
		
		<?php if ( get_theme_mod( 'rise_plugin_project_hover_text_color' ) ) : ?>
		h2.rise_item_title, .rise-project-excerpt p { color: <?php echo esc_attr( get_theme_mod( 'rise_plugin_project_hover_text_color', '#ffffff' )) ?>; }   
		<?php endif; ?> 
		
		
		<?php if ( get_theme_mod( 'rise_plugin_testimonial_bg' ) ) : ?>
		 .home-testimonial .testimonial p { background: <?php echo esc_attr( get_theme_mod( 'rise_plugin_testimonial_bg', '#ffffff' )) ?>; }   
		<?php endif; ?>
		
		<?php if ( get_theme_mod( 'rise_plugin_testimonial_text_color' ) ) : ?> 
		 .home-testimonial .testimonial p  { color: <?php echo esc_attr( get_theme_mod( 'rise_plugin_testimonial_text_color', '#656565' )) ?>; }
		<?php endif; ?>
		
		<?php if ( get_theme_mod( 'rise_plugin_testimonial_title_color' ) ) : ?>
		 .home-testimonial .testimonial h3 { color: <?php echo esc_attr( get_theme_mod( 'rise_plugin_testimonial_title_color', '#3d3d41' )) ?>; }
		<?php endif; ?>
		
		<?php if ( 'option1' == rise_sanitize_index_content( get_theme_mod( 'rise_plugin_testimonial_font_style' ) ) ) : ?>
		.home-testimonial .testimonial p  { font-style: italic; } 
		<?php else : ?>
		.home-testimonial .testimonial p  { font-style: normal; }
		<?php endif; ?>
		
		  
	</style>
    
<?php }


add_action( 'wp_head', 'rise_add_customizer_css' );

