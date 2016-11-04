<?php

     
    add_action('admin_menu', 'rise_setup_menu');
     
    function rise_setup_menu(){
    	add_theme_page( esc_html__('Rise Theme Details', 'rise' ), esc_html__('Rise Theme Details', 'rise' ), 'edit_theme_options', 'rise-setup', 'rise_init' ); 
    }  
      
 	function rise_init(){
		
		wp_enqueue_style( 'rise-font-awesome-admin', get_template_directory_uri() . '/fonts/font-awesome.css' ); 
		wp_enqueue_style( 'rise-style-admin', get_template_directory_uri() . '/panel/css/theme-admin-style.css' ); 
		
	 	echo '<div class="grid grid-pad"><div class="col-1-1"><h1 style="text-align: center;">'; 
		printf(esc_html__('Thank you for using Rise!', 'rise' ));
        echo "</h1></div></div>";
			
		echo '<div class="grid grid-pad" style="border-bottom: 1px solid #ccc; padding-bottom: 40px; margin-bottom: 30px;" ><div class="col-1-3"><h2>'; 
		printf(esc_html__('Post Format Content', 'rise' )); 
        echo '</h2>';
		
		echo '<p>';
		printf(esc_html__('We created a quick videos to show you how you add projects and testimonials to website. Watch the video with the link below.', 'rise' )); 
		echo '</p>';
		
		echo '<a href="https://modernthemes.net/rise-documentation/rise-adding-projects-gallery-post-format/" target="_blank"><button>'; 
		printf(esc_html__('View Video', 'rise' ));  
		echo "</button></a></div>";
		
		echo '<div class="col-1-3"><h2>'; 
		printf(esc_html__('Documentation', 'rise' ));
        echo '</h2>';  
		
		echo '<p>';
		printf(esc_html__('Check out our documentation for tutorials on theme functions and how to get the most out of rise.', 'rise' ));   
		echo '</p>'; 
		
		echo '<a href="https://modernthemes.net/rise-documentation/" target="_blank"><button>';
		printf(esc_html__('Read Docs', 'rise' )); 
		echo "</button></a></div>";
		
		echo '<div class="col-1-3"><h2>'; 
		printf(esc_html__('ModernThemes', 'rise' )); 
        echo '</h2>';  
		
		echo '<p>';
		printf(esc_html__('Need some more themes? We have a large selection of both free and premium themes to add to your collection.', 'rise' ));
		echo '</p>';
		
		echo '<a href="https://modernthemes.net/" target="_blank"><button>'; 
		printf(esc_html__('Visit Us', 'rise' ));
		echo '</button></a></div></div>';
		
		
		echo '<div class="grid grid-pad senswp"><div class="col-1-1"><h1 style="padding-bottom: 30px; text-align: center;">';
		printf( esc_html__('Go Pro. Get more out of Rise.', 'rise' )); 
		echo '</h1></div>';
		
        echo '<div class="col-1-4"><i class="fa fa-cogs"></i><h4>';
		printf( esc_html__('More Content Options', 'rise' ));
		echo '</h4>';
		
        echo '<p>';
		printf( esc_html__('Rise Pro adds Services, Team Members, Skill Bars, Detail Spinner, Map area and Clients as content options for you to use.', 'rise' ));
		echo '</p></div>';
		
		echo '<div class="col-1-4"><i class="fa fa-home"></i><h4>';
        printf( esc_html__('10 Home Widget Areas', 'rise' ));
		echo '</h4>';
		
        echo '<p>';
		printf( esc_html__('Add more home page content as Rise Pro comes with 6 additional home page widget areas and the ability to set parallax background images for widget areas.', 'rise' )); 
		echo '</p></div>';
		
        echo '<div class="col-1-4"><i class="fa fa-image"></i><h4>';
        printf( esc_html__('Sliders + Video', 'rise' ));
		echo '</h4>';
		
        echo '<p>';
		printf( esc_html__('Rise Pro has 5 different home page templates with a variety of sliders or fullscreen video. The best looking websites give the best first impressions.', 'rise' ));
		echo '</p></div>'; 
		
		echo '<div class="col-1-4"><i class="fa fa-th"></i><h4>'; 
        printf( esc_html__('Footer Widget Areas', 'rise' ));
		echo '</h4>';
		
        echo '<p>';
		printf( esc_html__('Want more content for your footer? Rise Pro has footer widget areas to populate with any content you want.', 'rise' ));
		echo '</p></div>';
		
            
        echo '<div class="grid grid-pad senswp"><div class="col-1-4"><i class="fa fa-shopping-cart"></i><h4>'; 
		printf( esc_html__( 'WooCommerce', 'rise' ));
		echo '</h4>';
		
        echo '<p>';
		printf( esc_html__( 'Turn your website into a powerful eCommerce machine. rise Pro is fully compatible with WooCommerce.', 'rise' ));
		echo '</p></div>';
		
       	echo '<div class="col-1-4"><i class="fa fa-font"></i><h4>More Google Fonts</h4><p>';
		printf( esc_html__( 'Access an additional 65 Google fonts with Rise Pro right in the WordPress customizer.', 'rise' ));
		echo '</p></div>'; 
		
       	echo '<div class="col-1-4"><i class="fa fa-file-image-o"></i><h4>';
		printf( esc_html__( 'PSD Files', 'rise' ));
		echo '</h4>';
		
        echo '<p>';
		printf( esc_html__( 'Premium versions include PSD files. Preview your own content or showcase a customized version for your clients.', 'rise' ));
		echo '</p></div>';
            
        echo '<div class="col-1-4"><i class="fa fa-support"></i><h4>';
		printf( esc_html__( 'Free Support', 'rise' )); 
		echo '</h4>';
		
        echo '<p>';
		printf( esc_html__( 'Call on us to help you out. Pro themes come with free support that goes directly to our support staff.', 'rise' ));
		echo '</p></div></div>';
		
		echo '<div class="grid grid-pad" style="border-bottom: 1px solid #ccc; padding-bottom: 50px; margin-bottom: 30px;"><div class="col-1-1"><a href="https://modernthemes.net/wordpress-themes/rise-pro/" target="_blank"><button class="pro">'; 
		printf( esc_html__( 'View Pro Version', 'rise' )); 
		echo '</button></a></div></div>';
		
		
		
		echo '<div class="grid grid-pad senswp"><div class="col-1-1"><h1 style="padding-bottom: 30px; text-align: center;">';
		printf( esc_html__('Premium Membership. Premium Experience.', 'rise' )); 
		echo '</h1></div>';
		
        echo '<div class="col-1-4"><i class="fa fa-cogs"></i><h4>'; 
		printf( esc_html__('Plugin Compatibility', 'rise' ));
		echo '</h4>';
		
        echo '<p>';
		printf( esc_html__('Use our new free plugins with this theme to add functionality for things like projects, clients, team members and more. Compatible with all premium themes!', 'rise' ));
		echo '</p></div>';
		
		echo '<div class="col-1-4"><i class="fa fa-desktop"></i><h4>'; 
        printf( esc_html__('Agency Designed Themes', 'rise' ));
		echo '</h4>';
		
        echo '<p>';
		printf( esc_html__('Look as good as can be with our new premium themes. Each one is agency designed with modern styles and professional layouts.', 'rise' ));
		echo '</p></div>'; 
		
        echo '<div class="col-1-4"><i class="fa fa-users"></i><h4>';
        printf( esc_html__('Membership Options', 'rise' )); 
		echo '</h4>';
		
        echo '<p>';
		printf( esc_html__('We have options to fit every budget. Choose between a single theme, or access to all current and future themes for a year, or forever!', 'rise' ));
		echo '</p></div>'; 
		
		echo '<div class="col-1-4"><i class="fa fa-calendar"></i><h4>'; 
		printf( esc_html__( 'Access to New Themes', 'rise' )); 
		echo '</h4>';
		
        echo '<p>';
		printf( esc_html__( 'New themes added monthly! When you purchase a premium membership you get access to all premium themes, with new themes added monthly.', 'rise' ));   
		echo '</p></div>';
		
		
		echo '<div class="grid grid-pad" style="border-bottom: 1px solid #ccc; padding-bottom: 50px; margin-bottom: 30px;"><div class="col-1-1"><a href="https://modernthemes.net/premium-wordpress-themes/" target="_blank"><button class="pro">'; 
		printf( esc_html__( 'Get Premium Membership', 'rise' ));
		echo '</button></a></div></div>';
		
		
		echo '<div class="grid grid-pad"><div class="col-1-1"><h2 style="text-align: center;">';
		printf( esc_html__( 'Changelog' , 'rise' ) ); 
        echo "</h2>";
		
		echo '<p style="text-align: center;">'; 
		printf( esc_html__('1.0.17 - Update: styled the 404 and Search page templates to match theme styles', 'rise' ));  
		echo '</p>';
		
		echo '<p style="text-align: center;">'; 
		printf( esc_html__('1.0.16 - Fix: removed http from Skype social icons', 'rise' ));  
		echo '</p>';
		
		echo '<p style="text-align: center;">'; 
		printf( esc_html__('1.0.14 - Update: Tested with WordPress 4.5, Updating Font Awesome icons to 4.6, Added Snapchat and Weibo social icon options', 'rise' ));  
		echo '</p>';
		
		echo '<p style="text-align: center;">'; 
		printf( esc_html__('1.0.13 - Fix: minor mobile bug fixes', 'rise' ));
		echo '</p>'; 
		
		echo '<p style="text-align: center;">'; 
		printf( esc_html__('1.0.0 - New Theme!', 'rise' )); 
		echo '</p></div></div>';
		
    }
?>