<?php	

/**
 * check to see if Home News is active
 */
function rise_news_support() {
	
    if( is_active_widget( '', '', 'rise_home_news') ) {  
		
        add_theme_support('mt_news');
  
	}
	
}
add_action('after_setup_theme', 'rise_news_support'); 

 
/**
 * check to see if Projects is active 
 */
function rise_projects_support() {
	
    if( is_active_widget( '', '', 'rise_project_posts') ||  has_post_format( 'gallery' ) ) {   
		
        add_theme_support('mt_projects');
  
	}
	
}
add_action('after_setup_theme', 'rise_projects_support');


/**
 * check to see if Projects is active 
 */
function rise_testimonials_support() {
	
    if( is_active_widget( '', '', 'rise_testimonial_posts') ||  has_post_format( 'quote' ) ) {  
		
        add_theme_support('mt_testimonials');
  
	}
	
}
add_action('after_setup_theme', 'rise_testimonials_support'); 