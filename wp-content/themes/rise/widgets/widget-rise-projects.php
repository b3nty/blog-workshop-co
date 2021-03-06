<?php



class rise_project_posts extends WP_Widget {



// constructor

    function rise_project_posts() {

		$widget_ops = array('classname' => 'rise_project_posts_widget', 'description' => esc_html__( 'Use this widget to display your Project posts.', 'rise') );

        parent::__construct(false, $name = esc_html__('MT - Rise Projects', 'rise'), $widget_ops); 

		$this->alt_option_name = 'rise_project_posts_widget';

		

		add_action( 'save_post', array($this, 'flush_widget_cache') );

		add_action( 'deleted_post', array($this, 'flush_widget_cache') );

		add_action( 'switch_theme', array($this, 'flush_widget_cache') );		

    }

	

	// widget form creation
	
	function form($instance) { 



	// Check values

		$title     		= isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';
		
		$project_excerpt  = isset( $instance['project_excerpt'] ) ? esc_textarea( $instance['project_excerpt'] ) : '';

		$category  		= isset( $instance['category'] ) ? esc_attr( $instance['category'] ) : '';
		
		$number    		= isset( $instance['number'] ) ? intval( $instance['number'] ) : 3;
		
		$columnset    	= isset( $instance['columnset'] ) ? intval( $instance['columnset'] ) : 3;
		
		$see_all   		= isset( $instance['see_all'] ) ? esc_url_raw( $instance['see_all'] ) : ''; 

		$see_all_text  	= isset( $instance['see_all_text'] ) ? esc_html( $instance['see_all_text'] ) : esc_html__( 'See All', 'rise' );		
		
		$random 		= isset( $instance['random'] ) ? (bool) $instance['random'] : false;					
	

	?>



	<p>

	<label for="<?php echo sanitize_text_field( $this->get_field_id('title')); ?>"><?php esc_html_e('Title', 'rise'); ?></label>

	<input class="widefat" id="<?php echo sanitize_text_field( $this->get_field_id('title')); ?>" name="<?php echo sanitize_text_field( $this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />

	</p>
    
    
    <p>

	<label for="<?php echo sanitize_text_field( $this->get_field_id('project_excerpt')); ?>"><?php esc_html_e('Excerpt', 'rise'); ?></label>
    
    <textarea class="widefat" id="<?php echo sanitize_text_field( $this->get_field_id('project_excerpt')); ?>" name="<?php echo sanitize_text_field( $this->get_field_name('project_excerpt')); ?>"><?php echo wp_kses_post( $project_excerpt ); ?></textarea> 

	</p>
    
    
    <p>
    
    <label for="<?php echo sanitize_text_field( $this->get_field_id( 'number' )); ?>"><?php esc_html_e( 'Number of Posts to Display', 'rise' ); ?></label>

	<input class="widefat" id="<?php echo sanitize_text_field( $this->get_field_id( 'number' )); ?>" name="<?php echo sanitize_text_field( $this->get_field_name( 'number' )); ?>" type="text" value="<?php echo intval( $number ); ?>" size="3" /> 
    
    </p>	
    
    
    <p>
    
    <label for="<?php echo sanitize_text_field( $this->get_field_id( 'columnset' )); ?>"><?php esc_html_e( 'Number of Columns', 'rise' ); ?></label>

	<input class="widefat" id="<?php echo sanitize_text_field( $this->get_field_id( 'columnset' )); ?>" name="<?php echo sanitize_text_field( $this->get_field_name( 'columnset' )); ?>" type="text" value="<?php echo intval( $columnset ); ?>" size="3" />
    
    </p> 	
    
    
    <p>
    
    <label for="<?php echo sanitize_text_field( $this->get_field_id( 'category' )); ?>"><?php esc_html_e( 'Enter the slug for your category or leave empty to show posts from all categories.', 'rise' ); ?></label>

	<input class="widefat" id="<?php echo sanitize_text_field( $this->get_field_id( 'category' )); ?>" name="<?php echo sanitize_text_field( $this->get_field_name( 'category' )); ?>" type="text" value="<?php echo esc_attr( $category ); ?>" size="3" />
    
    </p>
    
    
    <p>
    
    <label for="<?php echo sanitize_text_field( $this->get_field_id('see_all')); ?>"><?php esc_html_e( 'Enter the URL for your Projects Archive:', 'rise' ); ?></label>

	<input class="widefat custom_media_url" id="<?php echo sanitize_text_field( $this->get_field_id( 'see_all' )); ?>" name="<?php echo sanitize_text_field( $this->get_field_name( 'see_all' )); ?>" type="text" value="<?php echo esc_url_raw( $see_all ); ?>" size="3" />
    
    </p> 	


    <p>
    
    <label for="<?php echo sanitize_text_field( $this->get_field_id('see_all_text')); ?>"><?php esc_html_e('Button Text. Default is set to See All.', 'rise'); ?></label>

	<input class="widefat" id="<?php echo sanitize_text_field( $this->get_field_id( 'see_all_text' )); ?>" name="<?php echo sanitize_text_field( $this->get_field_name( 'see_all_text' )); ?>" type="text" value="<?php echo esc_html( $see_all_text ); ?>" size="3" />
    
    </p>
    
    
    <!-- random -->
     
     <p>
     
     <input class="checkbox" type="checkbox" <?php checked( $random ); ?> id="<?php echo sanitize_text_field( $this->get_field_id( 'random' )); ?>" name="<?php echo sanitize_text_field( $this->get_field_name( 'random' )); ?>" />

	<label for="<?php echo sanitize_text_field( $this->get_field_id( 'random' )); ?>"><?php esc_html_e( 'Click to show Projects in Random order', 'rise' ); ?></label> 
    
    </p>
    
    <!-- end random -->

	

	<?php

	}



	// update widget

	function update($new_instance, $old_instance) {

		$instance = $old_instance;

		$instance['title'] 			= esc_attr($new_instance['title']); 
		
		$instance['project_excerpt']  =  wp_kses_post($new_instance['project_excerpt']); 

		$instance['category'] 		= esc_attr($new_instance['category']);
		
		$instance['number'] 		= intval($new_instance['number']); 
		
		$instance['columnset'] 		= intval($new_instance['columnset']);
		
		$instance['see_all'] 		= esc_url_raw( $new_instance['see_all'] );

		$instance['see_all_text'] 	= esc_html($new_instance['see_all_text']);	
		
		$instance['random'] 		= isset( $new_instance['random'] ) ? (bool) $new_instance['random'] : false;			

		$this->flush_widget_cache();



		$alloptions = wp_cache_get( 'alloptions', 'options' );

		if ( isset($alloptions['rise_project_posts']) )

			delete_option('rise_project_posts');	  

		  

		return $instance;

	}

	

	function flush_widget_cache() {

		wp_cache_delete('rise_project_posts', 'widget');

	}

	

	// display widget

	function widget($args, $instance) {

		$cache = array();

		if ( ! $this->is_preview() ) {

			$cache = wp_cache_get( 'rise_project_posts', 'widget' );

		}



		if ( ! is_array( $cache ) ) {

			$cache = array();

		}



		if ( ! isset( $args['widget_id'] ) ) { 

			$args['widget_id'] = $this->id;

		}



		if ( isset( $cache[ $args['widget_id'] ] ) ) {

			echo wp_kses_post( $cache[ $args['widget_id'] ] ); 

			return;

		}



		ob_start();

		extract($args);



		/** This filter is documented in wp-includes/default-widgets.php */

		$title = isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : ''; 
		
		$project_excerpt  = isset( $instance['project_excerpt'] ) ? wp_kses_post( $instance['project_excerpt'] ) : '';
		
		$see_all_text = isset( $instance['see_all_text'] ) ? esc_html($instance['see_all_text']) : esc_html__( 'See All', 'rise' );
		
		$see_all 		= isset( $instance['see_all'] ) ? esc_url($instance['see_all']) : '';	

		$category = isset( $instance['category'] ) ? esc_attr($instance['category']) : '';
		
		$number = ( ! empty( $instance['number'] ) ) ? intval( $instance['number'] ) : 3;

		if ( ! $number )

			$number = 3;
			
		$columnset 		= ( ! empty( $instance['columnset'] ) ) ? intval( $instance['columnset'] ) : 3;
		
		if ( ! $columnset ) 

			$columnset = 3; 
			
		$random 		= isset( $instance['random'] ) ? (bool) $instance['random'] : false;

		if ( $random ) {

			$random = 'rand';	

		} else {

			$random = 'date';

		}
		



		/**
		 *

		 * @see WP_Query::get_posts()

		 *

		 * @param array $args An array of arguments used to retrieve the recent posts.

		 */

		$mt = new WP_Query( apply_filters( 'widget_posts_args', array(
		
			'post_type' 		  => 'post', 

			'post_status'         => 'publish',

			'posts_per_page'	  => $number,

			'category_name'		  => $category,
			
			'orderby'        	  => $random,
			
			'tax_query' => 	
						
				array(
				
					array(
      				'taxonomy' => 'post_format',
      				'field' => 'slug',
      				'terms' => 'post-format-gallery',
 				
			 ))))); 



		if ($mt->have_posts()) :


		
		echo $args['before_widget']; ?>
        

		<div class="home-projects">
        
        
        	<?php if ( $title ) : ?>
        
        		<div class="grid grid-pad">
            		<div class="col-1-1"> 
                    	
						<?php if ( $title ) : ?> 
                        	
                           	<h2 class="home-title">
								<?php echo wp_kses_post( $title ) ?>
                        	</h2>
						   
						<?php endif; ?>
                        
						<?php if ( $project_excerpt ) : ?> 
                        
							<p class="home-excerpt">
								<?php echo wp_kses_post( $project_excerpt ) ?> 
                            </p>
                            
						<?php endif; ?>
                       
                	</div><!-- col-1-1 -->   
            	</div><!-- grid -->
            
        	<?php endif; ?>
            
            
        
        	<div class="grid grid-pad"> 
            
            
                    
				<?php if ( $mt->have_posts() ) : ?>
                
                
                	<div class="rise-iso-grid"> 
                
					
					<!-- the loop -->
					<?php while ( $mt->have_posts() ) : $mt->the_post(); ?>
                    
        		
						<?php if ( has_post_format( 'gallery' )) : ?>
                        
                        
							<div class="col-1-<?php echo esc_html( $columnset ); ?> mt-column-clear rise-project-container"> 
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
												
            							case 'option2': ?> 
                                                    
                                			<div class="rise-project-excerpt"><?php the_excerpt(); ?></div>  
                           	
                						<?php break;
												
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
                    
					
            	<?php else : ?> 
                
                
					<p><?php esc_html__( 'Sorry, no Projects have been added yet!', 'rise' ); ?></p> 
                    
                    
				<?php endif; ?>
                
                    
            </div><!-- grid -->
            
  						
                
                <?php if ($see_all != '') : ?>
                

					<a href="<?php echo esc_url($see_all); ?>" class="rise-widget-button">  

						<?php if ($see_all_text) : ?>

							<button><?php echo esc_html( $see_all_text ); ?></button>

						<?php else : ?>

							<button><?php echo esc_html__('See All', 'rise'); ?></button> 

						<?php endif; ?>

					</a>
                    

				<?php endif; ?>	
                
                
                
        </div><!-- home-projects -->
        

	

	<?php


		echo $args['after_widget']; 


		// Reset the global $the_post as this query will have stomped on it  

		wp_reset_postdata();



		endif;



		if ( ! $this->is_preview() ) {

			$cache[ $args['widget_id'] ] = ob_get_flush();

			wp_cache_set( 'rise_project_posts', $cache, 'widget' );

		} else {

			ob_end_flush(); 

		}

	}


	

}