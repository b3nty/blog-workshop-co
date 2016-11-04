<?php
/**
 * Template part for displaying Projects page content
 * 
 *
 * @package rise
 */

?>


	<?php 
	// the query
	$rise_project_page_query = new WP_Query( array(  
	
		'posts_per_page' => -1,
		
		'tax_query' => 	
						
				array(
				
					array(
      				'taxonomy' => 'post_format',
      				'field' => 'slug',
      				'terms' => 'post-format-gallery',
 				
		)))); 
		
	?>
		
	<?php if ( $rise_project_page_query->have_posts() ) : ?> 
	<!-- pagination here -->
		
    	<div class="grid grid-pad">   
    		<div class="rise-iso-grid"> 
                
					
		<!-- the loop -->
		<?php while ( $rise_project_page_query->have_posts() ) : $rise_project_page_query->the_post(); ?>
                    
        		
			<?php if ( has_post_format( 'gallery' )) : ?>
                        
                <?php $rise_projects_columns_number = esc_html( get_theme_mod( 'rise_projects_columns_number', '3' )); ?>
                        
				<div class="col-1-<?php echo esc_html( $rise_projects_columns_number ); ?> mt-column-clear rise-project-container"> 
                	<div class="rise-view rise-effect">   
  						<a href="<?php the_permalink(); ?>">
                                            
                        	<?php if ( has_post_thumbnail() ): 
                                                
                            	$rise_project_src = wp_get_attachment_image_src( get_post_thumbnail_id(), 'rise-home-project' ); ?>    
                                                
                                 <img src="<?php echo esc_url( $rise_project_src[0] ); ?>" class="rise_item_image">    
                                                    
                            <?php endif;
                            
                            
                            if ( get_theme_mod('active_hover_effect') == '' ) :  
											
							$rise_hover_content = get_theme_mod( 'rise_hover_content', 'option1' ); 
    													
        					switch ( $rise_hover_content ) { 
													 
            				case 'option1': 
                									
                            	the_title( '<h2 class="rise_item_title">', '</h2>' );
                								
							break;
												
            				case 'option2': 
                                                    
                                the_excerpt( '<p class="rise_item_title">', '</p>' ); 
                           	
                	
                			break; 
												
            				case 'option3': 
												
													
                                                
							}
    											
							endif; ?>
                            
                            
                                                 
                        </a>
  						<div class="rise-mask"></div> 
                    </div>
				</div> 
                                   
                            
         	<?php endif; ?> 
                        
		<?php endwhile; ?>
		<!-- end of the loop --> 
                    
                    
        	</div>
        </div>  
                    
					
   	<?php else : ?> 
                
                
		<p><?php esc_html__( 'Sorry, no Projects have been added yet!', 'rise' ); ?></p>
                    
                    
	<?php endif; 
	
	// Reset the global $the_post as this query will have stomped on it  

		wp_reset_postdata();   ?>
                                    
                                    
                                    