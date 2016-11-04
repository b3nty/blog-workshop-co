				
                
                
                <div class="navigation-container push-right">
                    <nav id="site-navigation" class="main-navigation" role="navigation">
                        <button class="toggle-menu menu-right push-body" aria-controls="primary-menu" aria-expanded="false">
                        
							 <?php $rise_menu_toggle_option = rise_sanitize_menu_toggle_display( get_theme_mod( 'rise_menu_toggle', 'icon' )); 
    
                        		$rise_menu_display = '';
    
                        			if ( $rise_menu_toggle_option == 'icon' ) {
                    
                            	$rise_menu_display = sprintf( '<i class="fa fa-bars"></i>' );
                
                        			} else if ( $rise_menu_toggle_option == 'label' ) {
                    
                           	 	$rise_menu_display = esc_html__( 'Menu', 'rise' );  
                
                        			} 
    
                        		echo wp_kses_post( $rise_menu_display ); ?>
                                
                        </button> 
                        <?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
                    </nav><!-- #site-navigation -->
                </div>
                
          	</div>
     	</div>
	</header><!-- #masthead -->
    
    <nav class="cbp-spmenu cbp-spmenu-vertical cbp-spmenu-right">
        <?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
    </nav> 