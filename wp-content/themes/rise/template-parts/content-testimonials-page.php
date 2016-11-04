<?php
/**
 * Template part for displaying Testimonials page content
 * 
 *
 * @package rise
 */

?>


	<?php 
	// the query
	$rise_testimonial_page_query = new WP_Query( array(  
	
		'posts_per_page' => -1,
		
		'tax_query' => 	
						
				array(
				
					array(
      				'taxonomy' => 'post_format',
      				'field' => 'slug',
      				'terms' => 'post-format-quote',
 				
		)))); 
		
	?>
		
	<?php if ( $rise_testimonial_page_query->have_posts() ) : ?> 
	<!-- pagination here -->
		
        <div class="grid grid-pad page-testimonial"> 
        <div class="home-testimonial">
                	
		<!-- the loop -->
		<?php while ( $rise_testimonial_page_query->have_posts() ) : $rise_testimonial_page_query->the_post(); ?>
                    
        		
			<?php if ( has_post_format( 'quote' )) : ?>
                        
                <?php $rise_testimonials_columns_number = esc_html( get_theme_mod( 'rise_testimonial_columns_number', '3' )); ?>
                        
				<div class="col-1-<?php echo esc_html( $rise_testimonials_columns_number ); ?> mt-column-clear">  
                	<div class="testimonial"> 
            								
						<?php the_content( '<p>', '</p>' ); ?>
                                            
						<?php if ( has_post_thumbnail( get_the_id() ) ): ?>
                			<?php the_post_thumbnail( 'thumbnail', array( 'class' => 'rise-testimonial-img' ) ); ?> 
                        <?php endif; ?>
                							
						<?php the_title( '<h3>', '</h3>' ); ?>
                							
                	</div>
				</div> 
                                   
                            
         	<?php endif; ?> 
                        
		<?php endwhile; ?>
		<!-- end of the loop --> 
        
                    
        </div> 
        </div> 
        
					
   	<?php else : ?> 
                
                
		<p><?php esc_html__( 'Sorry, no Testimonials have been added yet!', 'rise' ); ?></p>
                    
                    
	<?php endif; 
	
	// Reset the global $the_post as this query will have stomped on it  

		wp_reset_postdata();   ?>
                                    
                                    
                                    