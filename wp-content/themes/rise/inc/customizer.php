<?php
/**
 * rise Theme Customizer.
 *
 * @package rise
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function rise_customize_register( $wp_customize ) {
	
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage'; 
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
	
//-------------------------------------------------------------------------------------------------------------------//
// Move and Replace
//-------------------------------------------------------------------------------------------------------------------// 
	
	//Colors
	$wp_customize->add_panel( 'rise_colors_panel', array( 
    'priority'       => 40,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => esc_html__( 'General Colors', 'rise' ),
    'description'    => esc_html__( 'Edit your general color settings.', 'rise' ),
	));
	
	//Nav
	$wp_customize->add_panel( 'rise_nav_panel', array(
    'priority'       => 11,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => esc_html__( 'Navigation', 'rise' ),
    'description'    => esc_html__( 'Edit your theme navigation settings.', 'rise' ),
	));
	
	// nav 
	$wp_customize->add_section( 'nav', array( 
	'title' => esc_html__( 'Navigation Settings', 'rise' ),
	'priority' => '10', 
	'panel' => 'rise_nav_panel'
	) );
	
	// colors
	$wp_customize->add_section( 'colors', array(
	'title' => esc_html__( 'Theme Colors', 'rise' ),   
	'priority' => '10', 
	'panel' => 'rise_colors_panel' 
	) );
	
	// Move sections up 
	$wp_customize->get_section('static_front_page')->priority = 8; 
	$wp_customize->get_section('title_tagline')->priority = 10;
	$wp_customize->remove_section('header_image'); 
	
	//premiums are better
    class rise_Info extends WP_Customize_Control { 
     
        public $label = '';
        public function render_content() {
        ?>

        <?php
        }
    }	
	

//-------------------------------------------------------------------------------------------------------------------//
// Upgrade
//-------------------------------------------------------------------------------------------------------------------//

    $wp_customize->add_section(
        'rise_theme_info',
        array(
            'title' => esc_html__('Rise Pro', 'rise'),  
            'priority' => 5, 
            'description' => esc_html__('Need more Rise? If you want to see what additional features are included in Rise Pro, visit https://modernthemes.net/wordpress-themes/rise-pro/ for a closer look.', 'rise'),
    )); 
	 
    //show them what we have to offer 
    $wp_customize->add_setting('rise_help', array(
			'sanitize_callback' => 'rise_no_sanitize',
            'type' => 'info_control',
            'capability' => 'edit_theme_options',
    ));
	
    $wp_customize->add_control( new rise_Info( $wp_customize, 'rise_help', array( 
        'section' => 'rise_theme_info', 
        'settings' => 'rise_help',  
        'priority' => 10
        ) )
    );
	
	
//-------------------------------------------------------------------------------------------------------------------//
// Logos
//-------------------------------------------------------------------------------------------------------------------//
	
	
	// Logo upload
    $wp_customize->add_section( 'rise_logo_section' , array(  
	    'title'       => esc_html__( 'Logo', 'rise' ),
	    'priority'    => 20, 
	    'description' => esc_html__( 'Upload a logo to replace the default site name and description in the header.', 'rise'),
	));

	$wp_customize->add_setting( 'rise_logo', array( 
		'sanitize_callback' => 'esc_url_raw',
	));

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'rise_logo', array( 
		'label'    => esc_html__( 'Logo', 'rise' ),
		'type'     => 'image',
		'section'  => 'rise_logo_section', 
		'settings' => 'rise_logo',
		'priority' => 10,
	))); 
	
	// Logo Width
	$wp_customize->add_setting( 'logo_size', array(
	    'sanitize_callback' => 'absint',
		'default' => '120'
	));

	$wp_customize->add_control( 'logo_size', array( 
		'label'    => esc_html__( 'Logo Size', 'rise' ), 
		'description' => esc_html__( 'Change the width of the Logo in PX. Only enter numeric value.', 'rise' ),
		'section'  => 'rise_logo_section', 
		'settings' => 'logo_size',
		'type'        => 'number',
		'priority'   => 30,
		'input_attrs' => array(
            'style' => 'margin-bottom: 15px;',  
        ), 
	));
	
	
//-------------------------------------------------------------------------------------------------------------------//
// Navigation
//-------------------------------------------------------------------------------------------------------------------//

	
	//nav font size
    $wp_customize->add_setting( 
        'rise_nav_text_size',
        array(
            'sanitize_callback' => 'absint',
            'default'           => '12',
    ));
	
    $wp_customize->add_control( 'rise_nav_text_size', array( 
        'type'        => 'number', 
        'priority'    => 30,
        'section'     => 'nav',  
        'label'       => esc_html__('Navigation Font Size', 'rise'), 
        'input_attrs' => array(
            'min'   => 10,
            'max'   => 32,
            'step'  => 1,
            'style' => 'margin-bottom: 10px;',
        ),
  	));
	
	
	//Navigation/Menu Options
	$wp_customize->add_setting( 'rise_menu_method', array( 
		'default'	        => 'option1', 
		'sanitize_callback' => 'rise_sanitize_index_content',
	));

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'rise_menu_method', array(
		'description'    => esc_html__( 'Choose between a the Icon Toggle Menu or a classic listed menu.', 'rise' ),
		'section'  => 'nav', 
		'settings' => 'rise_menu_method', 
		'type'     => 'radio',
		'choices'  => array(
			'option1' => esc_html__( 'Classic Menu', 'rise' ), 
			'option2' => esc_html__( 'Toggle Menu', 'rise' ),  
			), 
		'input_attrs' => array(
            'style' => 'margin-top: 15px;', 
        ),
	)));
	
	$wp_customize->add_setting( 'rise_menu_toggle', array(
		'default' => 'icon', 
    	'capability' => 'edit_theme_options',
    	'sanitize_callback' => 'rise_sanitize_menu_toggle_display', 
  	));

  	$wp_customize->add_control( 'rise_menu_toggle_radio', array(
    	'settings' => 'rise_menu_toggle',
    	'label'    => esc_html__( 'Menu Toggle Display', 'rise' ), 
    	'section'  => 'nav',
    	'type'     => 'radio',
    	'choices'  => array(
      		'icon' => esc_html__( 'Icon', 'rise' ),
      		'label' => esc_html__( 'Menu', 'rise' ), 
    	),
	));
	
	
//-------------------------------------------------------------------------------------------------------------------//
// Navigation Colors
//-------------------------------------------------------------------------------------------------------------------//

	// Nav Colors
    $wp_customize->add_section( 'rise_nav_colors_section' , array(  
	    'title'       => esc_html__( 'Navigation Colors', 'rise' ),
	    'priority'    => 10, 
	    'description' => esc_html__( 'Set your theme navigation colors.', 'rise'),
		'panel' => 'rise_nav_panel', 
	));
	

	$wp_customize->add_setting( 'rise_nav_link_color', array(
        'default'     => '#ffffff',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
 
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'rise_nav_link_color', array(
        'label'	   => esc_html__( 'Nav Link', 'rise' ),
        'section'  => 'rise_nav_colors_section',
        'settings' => 'rise_nav_link_color',
		'priority' => 5, 
    )));
	
	$wp_customize->add_setting( 'rise_nav_link_hover_color', array(
        'default'     => '#C4C5C5',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
 
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'rise_nav_link_hover_color', array(
        'label'	   => esc_html__( 'Nav Link Hover', 'rise' ),
        'section'  => 'rise_nav_colors_section',
        'settings' => 'rise_nav_link_hover_color', 
		'priority' => 10,
    )));
	
	$wp_customize->add_setting( 'rise_nav_drop_link_color', array( 
        'default'     => '#656565',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
 
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'rise_nav_drop_link_color', array(
        'label'	   => esc_html__( 'Nav Dropdown Link', 'rise' ),
        'section'  => 'rise_nav_colors_section',
        'settings' => 'rise_nav_drop_link_color',
		'priority' => 15,
    )));
	
	$wp_customize->add_setting( 'rise_nav_drop_link_hover_color', array( 
        'default'     => '#A7A8A8', 
        'sanitize_callback' => 'sanitize_hex_color',
    ));
 
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'rise_nav_drop_link_hover_color', array(
        'label'	   => esc_html__( 'Nav Dropdown Link Hover', 'rise' ),
        'section'  => 'rise_nav_colors_section',
        'settings' => 'rise_nav_drop_link_hover_color',
		'priority' => 20,
    )));
	
	$wp_customize->add_setting( 'rise_nav_drop_bg_color', array( 
        'default'  => '#eaebeb',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
 
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'rise_nav_drop_bg_color', array(
        'label'	   => esc_html__( 'Nav Dropdown Background', 'rise' ),
        'section'  => 'rise_nav_colors_section',
        'settings' => 'rise_nav_drop_bg_color', 
		'priority' => 25,
    ))); 
	
	
	
	$wp_customize->add_setting( 'rise_mobile_button_color', array(
        'default'     => '#ffffff',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
 
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'rise_mobile_button_color', array(
        'label'	   => esc_html__( 'Mobile Menu Button', 'rise' ),
        'section'  => 'rise_nav_colors_section',
        'settings' => 'rise_mobile_button_color', 
		'priority' => 30
    )));
	
	$wp_customize->add_setting( 'rise_mobile_button_text_color', array(
        'default'     => '#2a2a2d',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
 
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'rise_mobile_button_text_color', array(
        'label'	   => esc_html__( 'Mobile Menu Button Text', 'rise' ),
        'section'  => 'rise_nav_colors_section',
        'settings' => 'rise_mobile_button_text_color',
		'priority' => 35, 
    )));
	
	$wp_customize->add_setting( 'rise_mobile_button_hover_color', array(
        'default'     => '#3d3d41',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
 
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'rise_mobile_button_hover_color', array(
        'label'	   => esc_html__( 'Mobile Menu Button Hover', 'rise' ),
        'section'  => 'rise_nav_colors_section',
        'settings' => 'rise_mobile_button_hover_color',
		'priority' => 40, 
    )));
	
	$wp_customize->add_setting( 'rise_mobile_button_hover_text_color', array(
        'default'     => '#ffffff',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
 
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'rise_mobile_button_hover_text_color', array(
        'label'	   => esc_html__( 'Mobile Menu Button Hover Text', 'rise' ),
        'section'  => 'rise_nav_colors_section',
        'settings' => 'rise_mobile_button_hover_text_color',
		'priority' => 45, 
    )));
	

	
	$wp_customize->add_setting( 'rise_mobile_menu_bg', array(
        'default'     => '#3d3d41',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
 
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'rise_mobile_menu_bg', array(
        'label'	   => esc_html__( 'Mobile Menu Background', 'rise' ),
        'section'  => 'rise_nav_colors_section',
        'settings' => 'rise_mobile_menu_bg',
		'priority' => 50,
    )));
	
	$wp_customize->add_setting( 'rise_mobile_menu_link', array(
        'default'     => '#ffffff',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
 
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'rise_mobile_menu_link', array(
        'label'	   => esc_html__( 'Mobile Menu Link', 'rise' ),
        'section'  => 'rise_nav_colors_section',
        'settings' => 'rise_mobile_menu_link',
		'priority' => 55,
    )));
	
	$wp_customize->add_setting( 'rise_mobile_menu_hover', array(
        'default'     => '#ffffff',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
 
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'rise_mobile_menu_hover', array(
        'label'	   => esc_html__( 'Mobile Menu Link Hover', 'rise' ),
        'section'  => 'rise_nav_colors_section',
        'settings' => 'rise_mobile_menu_hover',
		'priority' => 60, 
    )));
	
	$wp_customize->add_setting( 'rise_mobile_menu_hover_bg', array(
        'default'     => '#333333',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
 
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'rise_mobile_menu_hover_bg', array(
        'label'	   => esc_html__( 'Mobile Menu Background Hover', 'rise' ),
        'section'  => 'rise_nav_colors_section', 
        'settings' => 'rise_mobile_menu_hover_bg',
		'priority' => 65,
    ))); 
	

//-------------------------------------------------------------------------------------------------------------------//
// Hero Section
//-------------------------------------------------------------------------------------------------------------------//
	
	//Home Hero Section
    $wp_customize->add_section( 'rise_home_hero_section' , array(  
	    'title'       => esc_html__( 'Home Hero Section', 'rise' ), 
	    'priority'    => 22, 
	    'description' => esc_html__( 'Edit the options for the Home Page Hero section.', 'rise'),
	));
	
	$wp_customize->add_setting( 'rise_home_bg_image', array( 
		'sanitize_callback' => 'esc_url_raw',
	));

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'rise_home_bg_image', array( 
		'label'    => esc_html__( 'Background Image', 'rise' ),
		'type'     => 'image', 
		'section'  => 'rise_home_hero_section', 
		'settings' => 'rise_home_bg_image', 
		'priority' => 10,
	)));
	
	$wp_customize->add_setting( 'rise_hero_bg_color', array(
        'default'     => '#b6b9bd',  
        'sanitize_callback' => 'sanitize_hex_color',
    ));
 
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'rise_hero_bg_color', array(
        'label'	   => esc_html__( 'Background Color', 'rise' ),
		'description' => esc_html__( 'If not using a background image, set your background color here.', 'rise' ),
        'section'  => 'rise_home_hero_section',
        'settings' => 'rise_hero_bg_color',
		'priority' => 15
    ))); 
	
	//Title
	$wp_customize->add_setting( 'rise_home_title',
	    array(
	        'sanitize_callback' => 'rise_sanitize_text',  
	));  

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'rise_home_title', array(
		'label'    => esc_html__( 'Home Hero Title', 'rise' ), 
		'section'  => 'rise_home_hero_section',  
		'settings' => 'rise_home_title',  
		'priority'   => 20
	)));
	
	//Excerpt
	$wp_customize->add_setting( 'rise_home_excerpt',
	    array(
	        'sanitize_callback' => 'rise_sanitize_text',  
	));  

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'rise_home_excerpt', array(
		'label'    => esc_html__( 'Home Hero Excerpt', 'rise' ), 
		'section'  => 'rise_home_hero_section',  
		'settings' => 'rise_home_excerpt',
		'priority'   => 25
	)));
	
	$wp_customize->add_setting( 'rise_hero_heading_color', array(
        'default'     => '#ffffff',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
 
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'rise_hero_heading_color', array(
        'label'	   => esc_html__( 'Title Color', 'rise' ),
        'section'  => 'rise_home_hero_section',
        'settings' => 'rise_hero_heading_color',
		'priority' => 30 
    )));
	
	$wp_customize->add_setting( 'rise_hero_text_color', array(
        'default'     => '#ffffff',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
 
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'rise_hero_text_color', array(
        'label'	   => esc_html__( 'Excerpt Color', 'rise' ), 
        'section'  => 'rise_home_hero_section',
        'settings' => 'rise_hero_text_color',
		'priority' => 33
    )));
	
	//Link Text
	$wp_customize->add_setting( 'rise_home_button_text',
	    array(
	        'sanitize_callback' => 'rise_sanitize_text',  
	));  

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'rise_home_button_text', array(
		'label'    => esc_html__( 'Button Text', 'rise' ), 
		'section'  => 'rise_home_hero_section',  
		'settings' => 'rise_home_button_text', 
		'priority'   => 35
	)));
	
	
	// Page Drop Downs 
	$wp_customize->add_setting('rise_home_button_url', array( 
		'capability' => 'edit_theme_options', 
        'sanitize_callback' => 'rise_sanitize_int' 
	));
	
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'rise_home_button_url', array( 
    	'label' => esc_html__( 'Hero Button URL', 'rise' ), 
    	'section' => 'rise_home_hero_section', 
		'type' => 'dropdown-pages',
    	'settings' => 'rise_home_button_url', 
		'priority'   => 40  
	)));
	
	// Page URL
	$wp_customize->add_setting( 'rise_page_url_text',
	    array(
	        'sanitize_callback' => 'rise_sanitize_text',
	));  

	$wp_customize->add_control( 'rise_page_url_text', array(
		'type'     => 'url',
		'label'    => esc_html__( 'External URL Option', 'rise' ), 
		'description' => esc_html__( 'If you use an external URL, leave the Hero Button URL above empty. Must include http:// before any URL.', 'rise' ),
		'section' => 'rise_home_hero_section', 
		'settings' => 'rise_page_url_text',
		'priority'   => 41 
	));  
	
	$wp_customize->add_setting( 'rise_hero_button_bg_color', array(
        'default'     => '#ffffff',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
 
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'rise_hero_button_bg_color', array(
        'label'	   => esc_html__( 'Button Color', 'rise' ),
        'section'  => 'rise_home_hero_section',
        'settings' => 'rise_hero_button_bg_color',
		'priority' => 45
    )));
	
	$wp_customize->add_setting( 'rise_hero_button_text_color', array(
        'default'     => '#ffffff',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
 
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'rise_hero_button_text_color', array(
        'label'	   => esc_html__( 'Button Text Color', 'rise' ),
        'section'  => 'rise_home_hero_section',
        'settings' => 'rise_hero_button_text_color',
		'priority' => 50 
    )));
	
	$wp_customize->add_setting( 'rise_hero_button_hover_color', array(
        'default'     => '#3d3d41', 
        'sanitize_callback' => 'sanitize_hex_color',
    ));
 
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'rise_hero_button_hover_color', array(
        'label'	   => esc_html__( 'Button Hover Color', 'rise' ),
        'section'  => 'rise_home_hero_section',
        'settings' => 'rise_hero_button_hover_color',
		'priority' => 60
    ))); 
	
	$wp_customize->add_setting( 'rise_hero_button_text_hover_color', array(
        'default'     => '#ffffff',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
 
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'rise_hero_button_text_hover_color', array(
        'label'	   => esc_html__( 'Button Text Hover Color', 'rise' ),
        'section'  => 'rise_home_hero_section',
        'settings' => 'rise_hero_button_text_hover_color',
		'priority' => 65 
    )));
	
	
//-------------------------------------------------------------------------------------------------------------------//
// Home Page
//-------------------------------------------------------------------------------------------------------------------//
	
	
	$wp_customize->add_panel( 'rise_home_page_panel', array(
    'priority'       => 25,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => esc_html__( 'Home Page Options', 'rise' ),
    'description'    => esc_html__( 'Edit your home page settings', 'rise' ),
	));
	
	//First Widget Area
    $wp_customize->add_section( 'rise_home_widget_section_1' , array(  
	    'title'       => esc_html__( 'Home Widget Area #1', 'rise' ),
	    'priority'    => 10, 
	    'description' => esc_html__( 'Edit the options for the first home page widget area.', 'rise'),
		'panel' 	  => 'rise_home_page_panel', 
	));
	
	
	// Number of Widget Columns 
	$wp_customize->add_setting( 'rise_widget_column_one', array(
		'default'	        => 'option1',
		'sanitize_callback' => 'rise_sanitize_widget_content', 
	));

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'rise_widget_column_one', array(
		'label'    => esc_html__( 'Number of Widget Columns', 'rise' ),
		'description'    => esc_html__( '1 Column will take up the entire widget area, while 4 columns will give space to use 4 widgets for content in one row. Recommended: Set to 1 Column if you are using ModernThemes plugin widgets.', 'rise' ),
		'section'  => 'rise_home_widget_section_1', 
		'settings' => 'rise_widget_column_one', 
		'type'     => 'radio',
		'priority'   => 5,  
		'choices'  => array(
			'option1' => esc_html__( '1 Column', 'rise' ),
			'option2' => esc_html__( '2 Columns', 'rise' ), 
			'option3' => esc_html__( '3 Columns', 'rise' ),
			'option4' => esc_html__( '4 Columns', 'rise' ),
			),
		'input_attrs' => array(
            'style' => 'margin-bottom: 10px;',
        ),
	)));
	
	
	//Hide Section 
	$wp_customize->add_setting('active_hw_1',
	    array(
	        'sanitize_callback' => 'rise_sanitize_checkbox',
	)); 
	
	$wp_customize->add_control( 'active_hw_1', array(
        'type' => 'checkbox',
        'label' => esc_html__( 'Hide Home Widget Area #1', 'rise' ),
        'section' => 'rise_home_widget_section_1', 
		'priority'   => 10
    ));
	
	$wp_customize->add_setting( 'rise_hw_area_1_bg_color', array(
        'default'     => '#f9f9f9',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
 
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'rise_hw_area_1_bg_color', array(
        'label'	   => esc_html__( 'Background Color', 'rise' ),
        'section'  => 'rise_home_widget_section_1',
        'settings' => 'rise_hw_area_1_bg_color',
		'priority' => 20 
    )));
	
	$wp_customize->add_setting( 'rise_hw_area_1_text_color', array(
        'default'     => '#656565',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
 
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'rise_hw_area_1_text_color', array(
        'label'	   => esc_html__( 'Text Color', 'rise' ),
        'section'  => 'rise_home_widget_section_1',
        'settings' => 'rise_hw_area_1_text_color',
		'priority' => 30 
    )));
	
	$wp_customize->add_setting( 'rise_hw_area_1_heading_color', array(
        'default'     => '#3d3d41',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
 
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'rise_hw_area_1_heading_color', array(
        'label'	   => esc_html__( 'Heading Color', 'rise' ),
        'section'  => 'rise_home_widget_section_1',
        'settings' => 'rise_hw_area_1_heading_color',
		'priority' => 35
    )));
	
	$wp_customize->add_setting( 'rise_hw_area_1_link_color', array(
        'default'     => '#3d3d41',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
 
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'rise_hw_area_1_link_color', array(
        'label'	   => esc_html__( 'Link Color', 'rise' ),
        'section'  => 'rise_home_widget_section_1',
        'settings' => 'rise_hw_area_1_link_color', 
		'priority' => 38
    )));
	
	$wp_customize->add_setting( 'rise_hw_area_1_link_hover_color', array(
        'default'     => '#999999',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
 
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'rise_hw_area_1_link_hover_color', array(
        'label'	   => esc_html__( 'Link Hover Color', 'rise' ),
        'section'  => 'rise_home_widget_section_1',
        'settings' => 'rise_hw_area_1_link_hover_color', 
		'priority' => 39
    )));
	
	$wp_customize->add_setting( 'rise_hw_area_1_button_color', array(
        'default'     => '#3d3d41',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
 
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'rise_hw_area_1_button_color', array(
        'label'	   => esc_html__( 'Button Color', 'rise' ),
        'section'  => 'rise_home_widget_section_1',
        'settings' => 'rise_hw_area_1_button_color',
		'priority' => 40 
    ))); 
	
	$wp_customize->add_setting( 'rise_hw_area_1_button_text_color', array(
        'default'     => '#2a2a2d',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
 
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'rise_hw_area_1_button_text_color', array(
        'label'	   => esc_html__( 'Button Text Color', 'rise' ),
        'section'  => 'rise_home_widget_section_1',
        'settings' => 'rise_hw_area_1_button_text_color',
		'priority' => 40 
    ))); 
	
	$wp_customize->add_setting( 'rise_hw_area_1_button_hover_color', array(
        'default'     => '#3d3d41', 
        'sanitize_callback' => 'sanitize_hex_color',
    ));
 
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'rise_hw_area_1_button_hover_color', array(
        'label'	   => esc_html__( 'Button Hover Color', 'rise' ),
        'section'  => 'rise_home_widget_section_1',
        'settings' => 'rise_hw_area_1_button_hover_color',
		'priority' => 50  
    ))); 
	
	$wp_customize->add_setting( 'rise_hw_area_1_button_hover_text_color', array(
        'default'     => '#ffffff', 
        'sanitize_callback' => 'sanitize_hex_color',
    ));
 
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'rise_hw_area_1_button_hover_text_color', array(
        'label'	   => esc_html__( 'Button Hover Text Color', 'rise' ),
        'section'  => 'rise_home_widget_section_1',
        'settings' => 'rise_hw_area_1_button_hover_text_color',
		'priority' => 50  
    ))); 
	
	//Second Widget Area
    $wp_customize->add_section( 'rise_home_widget_section_2' , array(  
	    'title'       => esc_html__( 'Home Widget Area #2', 'rise' ),
	    'priority'    => 20, 
	    'description' => esc_html__( 'Edit the options for the second home page widget area.', 'rise'),
		'panel' 	  => 'rise_home_page_panel',
	));
	
	// Number of Widget Columns 
	$wp_customize->add_setting( 'rise_widget_column_two', array(
		'default'	        => 'option1',
		'sanitize_callback' => 'rise_sanitize_widget_content', 
	));

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'rise_widget_column_two', array(
		'label'    => esc_html__( 'Number of Widget Columns', 'rise' ),
		'description'    => esc_html__( '1 Column will take up the entire widget area, while 4 columns will give space to use 4 widgets for content in one row. Recommended: Set to 1 Column if you are using ModernThemes plugin widgets.', 'rise' ),
		'section'  => 'rise_home_widget_section_2', 
		'settings' => 'rise_widget_column_two', 
		'type'     => 'radio',
		'priority'   => 5,  
		'choices'  => array(
			'option1' => esc_html__( '1 Column', 'rise' ),
			'option2' => esc_html__( '2 Columns', 'rise' ), 
			'option3' => esc_html__( '3 Columns', 'rise' ),
			'option4' => esc_html__( '4 Columns', 'rise' ),
			),
		'input_attrs' => array(
            'style' => 'margin-bottom: 10px;',
        ),
	)));
	
	//Hide Section 
	$wp_customize->add_setting('active_hw_2',
	    array(
	        'sanitize_callback' => 'rise_sanitize_checkbox',
	)); 
	
	$wp_customize->add_control( 'active_hw_2', array(
        'type' => 'checkbox',
        'label' => esc_html__( 'Hide Home Widget Area #2', 'rise' ),
        'section' => 'rise_home_widget_section_2', 
		'priority'   => 10
    ));
	
	$wp_customize->add_setting( 'rise_hw_area_2_bg_color', array(
        'default'     => '#f1f5f7',
        'sanitize_callback' => 'sanitize_hex_color', 
    ));
 
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'rise_hw_area_2_bg_color', array(
        'label'	   => esc_html__( 'Background Color', 'rise' ),
        'section'  => 'rise_home_widget_section_2',
        'settings' => 'rise_hw_area_2_bg_color',
		'priority' => 20
    )));
	
	$wp_customize->add_setting( 'rise_hw_area_2_text_color', array(
        'default'     => '#656565',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
 
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'rise_hw_area_2_text_color', array(
        'label'	   => esc_html__( 'Text Color', 'rise' ),
        'section'  => 'rise_home_widget_section_2',
        'settings' => 'rise_hw_area_2_text_color',
		'priority' => 30 
    )));
	
	$wp_customize->add_setting( 'rise_hw_area_2_heading_color', array(
        'default'     => '#3d3d41',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
 
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'rise_hw_area_2_heading_color', array(
        'label'	   => esc_html__( 'Heading Color', 'rise' ),
        'section'  => 'rise_home_widget_section_2',
        'settings' => 'rise_hw_area_2_heading_color',
		'priority' => 35
    )));
	
	$wp_customize->add_setting( 'rise_hw_area_2_link_color', array(
        'default'     => '#3d3d41',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
 
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'rise_hw_area_2_link_color', array(
        'label'	   => esc_html__( 'Link Color', 'rise' ),
        'section'  => 'rise_home_widget_section_2',
        'settings' => 'rise_hw_area_2_link_color', 
		'priority' => 38
    )));
	
	$wp_customize->add_setting( 'rise_hw_area_2_link_hover_color', array(
        'default'     => '#999999',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
 
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'rise_hw_area_2_link_hover_color', array(
        'label'	   => esc_html__( 'Link Hover Color', 'rise' ),
        'section'  => 'rise_home_widget_section_2',
        'settings' => 'rise_hw_area_2_link_hover_color', 
		'priority' => 39
    )));
	
	$wp_customize->add_setting( 'rise_hw_area_2_button_color', array(
        'default'     => '#3d3d41',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
 
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'rise_hw_area_2_button_color', array(
        'label'	   => esc_html__( 'Button Color', 'rise' ),
        'section'  => 'rise_home_widget_section_2',
        'settings' => 'rise_hw_area_2_button_color',
		'priority' => 40 
    ))); 
	
	$wp_customize->add_setting( 'rise_hw_area_2_button_text_color', array(
        'default'     => '#2a2a2d',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
 
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'rise_hw_area_2_button_text_color', array(
        'label'	   => esc_html__( 'Button Text Color', 'rise' ),
        'section'  => 'rise_home_widget_section_2',
        'settings' => 'rise_hw_area_2_button_text_color',
		'priority' => 40 
    ))); 
	
	$wp_customize->add_setting( 'rise_hw_area_2_button_hover_color', array(
        'default'     => '#3d3d41', 
        'sanitize_callback' => 'sanitize_hex_color',
    ));
 
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'rise_hw_area_2_button_hover_color', array(
        'label'	   => esc_html__( 'Button Hover Color', 'rise' ),
        'section'  => 'rise_home_widget_section_2',
        'settings' => 'rise_hw_area_2_button_hover_color', 
		'priority' => 50  
    ))); 
	
	$wp_customize->add_setting( 'rise_hw_area_2_button_hover_text_color', array(
        'default'     => '#ffffff', 
        'sanitize_callback' => 'sanitize_hex_color',
    ));
 
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'rise_hw_area_2_button_hover_text_color', array(
        'label'	   => esc_html__( 'Button Hover Text Color', 'rise' ),
        'section'  => 'rise_home_widget_section_2',
        'settings' => 'rise_hw_area_2_button_hover_text_color',
		'priority' => 50  
    ))); 
	
	
	//Third Widget Area
    $wp_customize->add_section( 'rise_home_widget_section_3' , array(  
	    'title'       => esc_html__( 'Home Widget Area #3', 'rise' ),
	    'priority'    => 30, 
	    'description' => esc_html__( 'Edit the options for the third home page widget area.', 'rise'),
		'panel' 	  => 'rise_home_page_panel', 
	)); 
	
	// Number of Widget Columns 
	$wp_customize->add_setting( 'rise_widget_column_three', array(
		'default'	        => 'option1',
		'sanitize_callback' => 'rise_sanitize_widget_content', 
	));

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'rise_widget_column_three', array(
		'label'    => esc_html__( 'Number of Widget Columns', 'rise' ),
		'description'    => esc_html__( '1 Column will take up the entire widget area, while 4 columns will give space to use 4 widgets for content in one row. Recommended: Set to 1 Column if you are using ModernThemes plugin widgets.', 'rise' ),
		'section'  => 'rise_home_widget_section_3', 
		'settings' => 'rise_widget_column_three', 
		'type'     => 'radio',
		'priority'   => 5,  
		'choices'  => array(
			'option1' => esc_html__( '1 Column', 'rise' ),
			'option2' => esc_html__( '2 Columns', 'rise' ), 
			'option3' => esc_html__( '3 Columns', 'rise' ),
			'option4' => esc_html__( '4 Columns', 'rise' ),
			),
		'input_attrs' => array(
            'style' => 'margin-bottom: 10px;',
        ),
	)));
	
	
	//Hide Section 
	$wp_customize->add_setting('active_hw_3',
	    array(
	        'sanitize_callback' => 'rise_sanitize_checkbox',
	)); 
	
	$wp_customize->add_control( 'active_hw_3', array(
        'type' => 'checkbox',
        'label' => esc_html__( 'Hide Home Widget Area #3', 'rise' ),
        'section' => 'rise_home_widget_section_3', 
		'priority'   => 10
    ));
	
	$wp_customize->add_setting( 'rise_hw_area_3_bg_color', array(
        'default'     => '#f9f9f9',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
 
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'rise_hw_area_3_bg_color', array(
        'label'	   => esc_html__( 'Background Color', 'rise' ),
        'section'  => 'rise_home_widget_section_3',
        'settings' => 'rise_hw_area_3_bg_color',
		'priority' => 20 
    )));
	
	$wp_customize->add_setting( 'rise_hw_area_3_text_color', array(
        'default'     => '#656565',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
 
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'rise_hw_area_3_text_color', array(
        'label'	   => esc_html__( 'Text Color', 'rise' ),
        'section'  => 'rise_home_widget_section_3',
        'settings' => 'rise_hw_area_3_text_color',
		'priority' => 30 
    )));
	
	$wp_customize->add_setting( 'rise_hw_area_3_heading_color', array(
        'default'     => '#3d3d41',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
 
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'rise_hw_area_3_heading_color', array(
        'label'	   => esc_html__( 'Heading Color', 'rise' ),
        'section'  => 'rise_home_widget_section_3',
        'settings' => 'rise_hw_area_3_heading_color',
		'priority' => 35
    )));
	
	$wp_customize->add_setting( 'rise_hw_area_3_link_color', array(
        'default'     => '#3d3d41',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
 
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'rise_hw_area_3_link_color', array(
        'label'	   => esc_html__( 'Link Color', 'rise' ),
        'section'  => 'rise_home_widget_section_3',
        'settings' => 'rise_hw_area_3_link_color', 
		'priority' => 38
    )));
	
	$wp_customize->add_setting( 'rise_hw_area_3_link_hover_color', array(
        'default'     => '#999999',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
 
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'rise_hw_area_3_link_hover_color', array(
        'label'	   => esc_html__( 'Link Hover Color', 'rise' ),
        'section'  => 'rise_home_widget_section_3',
        'settings' => 'rise_hw_area_3_link_hover_color', 
		'priority' => 39
    )));
	
	$wp_customize->add_setting( 'rise_hw_area_3_button_color', array(
        'default'     => '#3d3d41',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
 
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'rise_hw_area_3_button_color', array(
        'label'	   => esc_html__( 'Button Color', 'rise' ),
        'section'  => 'rise_home_widget_section_3',
        'settings' => 'rise_hw_area_3_button_color',
		'priority' => 40 
    ))); 
	
	$wp_customize->add_setting( 'rise_hw_area_3_button_text_color', array(
        'default'     => '#2a2a2d',
        'sanitize_callback' => 'sanitize_hex_color', 
    ));
 
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'rise_hw_area_3_button_text_color', array(
        'label'	   => esc_html__( 'Button Text Color', 'rise' ),
        'section'  => 'rise_home_widget_section_3',
        'settings' => 'rise_hw_area_3_button_text_color',
		'priority' => 40 
    ))); 
	
	$wp_customize->add_setting( 'rise_hw_area_3_button_hover_color', array(
        'default'     => '#3d3d41', 
        'sanitize_callback' => 'sanitize_hex_color',
    ));
 
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'rise_hw_area_3_button_hover_color', array(
        'label'	   => esc_html__( 'Button Hover Color', 'rise' ),
        'section'  => 'rise_home_widget_section_3',
        'settings' => 'rise_hw_area_3_button_hover_color',
		'priority' => 50  
    ))); 
	
	$wp_customize->add_setting( 'rise_hw_area_3_button_hover_text_color', array(
        'default'     => '#ffffff', 
        'sanitize_callback' => 'sanitize_hex_color',
    ));
 
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'rise_hw_area_3_button_hover_text_color', array(
        'label'	   => esc_html__( 'Button Hover Text Color', 'rise' ),
        'section'  => 'rise_home_widget_section_3',
        'settings' => 'rise_hw_area_3_button_hover_text_color',
		'priority' => 50  
    ))); 
	
	
	
	//Fourth Widget Area
    $wp_customize->add_section( 'rise_home_widget_section_4' , array(   
	    'title'       => esc_html__( 'Home Widget Area #4', 'rise' ),
	    'priority'    => 40, 
	    'description' => esc_html__( 'Edit the options for the second home page widget area.', 'rise'),
		'panel' 	  => 'rise_home_page_panel',
	));
	
	// Number of Widget Columns 
	$wp_customize->add_setting( 'rise_widget_column_four', array(
		'default'	        => 'option1',
		'sanitize_callback' => 'rise_sanitize_widget_content', 
	));

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'rise_widget_column_four', array(
		'label'    => esc_html__( 'Number of Widget Columns', 'rise' ),
		'description'    => esc_html__( '1 Column will take up the entire widget area, while 4 columns will give space to use 4 widgets for content in one row. Recommended: Set to 1 Column if you are using ModernThemes plugin widgets.', 'rise' ),
		'section'  => 'rise_home_widget_section_4', 
		'settings' => 'rise_widget_column_four', 
		'type'     => 'radio',
		'priority'   => 5,  
		'choices'  => array(
			'option1' => esc_html__( '1 Column', 'rise' ),
			'option2' => esc_html__( '2 Columns', 'rise' ), 
			'option3' => esc_html__( '3 Columns', 'rise' ),
			'option4' => esc_html__( '4 Columns', 'rise' ),
			),
		'input_attrs' => array(
            'style' => 'margin-bottom: 10px;',
        ),
	)));
	
	//Hide Section 
	$wp_customize->add_setting('active_hw_4',
	    array(
	        'sanitize_callback' => 'rise_sanitize_checkbox',
	)); 
	
	$wp_customize->add_control( 'active_hw_4', array(
        'type' => 'checkbox',
        'label' => esc_html__( 'Hide Home Widget Area #4', 'rise' ),
        'section' => 'rise_home_widget_section_4', 
		'priority'   => 10
    ));
	
	$wp_customize->add_setting( 'rise_hw_area_4_bg_color', array(
        'default'     => '#f1f5f7',
        'sanitize_callback' => 'sanitize_hex_color', 
    ));
 
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'rise_hw_area_4_bg_color', array(
        'label'	   => esc_html__( 'Background Color', 'rise' ),
        'section'  => 'rise_home_widget_section_4',
        'settings' => 'rise_hw_area_4_bg_color',
		'priority' => 20
    )));
	
	$wp_customize->add_setting( 'rise_hw_area_4_text_color', array(
        'default'     => '#656565',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
 
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'rise_hw_area_4_text_color', array(
        'label'	   => esc_html__( 'Text Color', 'rise' ),
        'section'  => 'rise_home_widget_section_4',
        'settings' => 'rise_hw_area_4_text_color',
		'priority' => 30 
    )));
	
	$wp_customize->add_setting( 'rise_hw_area_4_heading_color', array(
        'default'     => '#3d3d41',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
 
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'rise_hw_area_4_heading_color', array(
        'label'	   => esc_html__( 'Heading Color', 'rise' ),
        'section'  => 'rise_home_widget_section_4',
        'settings' => 'rise_hw_area_4_heading_color',
		'priority' => 35
    )));
	
	$wp_customize->add_setting( 'rise_hw_area_4_link_color', array(
        'default'     => '#3d3d41',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
 
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'rise_hw_area_4_link_color', array(
        'label'	   => esc_html__( 'Link Color', 'rise' ),
        'section'  => 'rise_home_widget_section_4',
        'settings' => 'rise_hw_area_4_link_color', 
		'priority' => 38 
    )));
	
	$wp_customize->add_setting( 'rise_hw_area_4_link_hover_color', array(
        'default'     => '#999999',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
 
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'rise_hw_area_4_link_hover_color', array(
        'label'	   => esc_html__( 'Link Hover Color', 'rise' ),
        'section'  => 'rise_home_widget_section_4',
        'settings' => 'rise_hw_area_4_link_hover_color', 
		'priority' => 39
    )));
	
	$wp_customize->add_setting( 'rise_hw_area_4_button_color', array(
        'default'     => '#3d3d41',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
 
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'rise_hw_area_4_button_color', array(
        'label'	   => esc_html__( 'Button Color', 'rise' ),
        'section'  => 'rise_home_widget_section_4',
        'settings' => 'rise_hw_area_4_button_color',
		'priority' => 40 
    ))); 
	
	$wp_customize->add_setting( 'rise_hw_area_4_button_text_color', array(
        'default'     => '#2a2a2d',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
 
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'rise_hw_area_4_button_text_color', array(
        'label'	   => esc_html__( 'Button Text Color', 'rise' ),
        'section'  => 'rise_home_widget_section_4',
        'settings' => 'rise_hw_area_4_button_text_color',
		'priority' => 40 
    ))); 
	
	$wp_customize->add_setting( 'rise_hw_area_4_button_hover_color', array(
        'default'     => '#3d3d41', 
        'sanitize_callback' => 'sanitize_hex_color',
    ));
 
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'rise_hw_area_4_button_hover_color', array(
        'label'	   => esc_html__( 'Button Hover Color', 'rise' ),
        'section'  => 'rise_home_widget_section_4',
        'settings' => 'rise_hw_area_4_button_hover_color', 
		'priority' => 50  
    ))); 
	
	$wp_customize->add_setting( 'rise_hw_area_4_button_hover_text_color', array(
        'default'     => '#ffffff', 
        'sanitize_callback' => 'sanitize_hex_color',
    ));
 
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'rise_hw_area_4_button_hover_text_color', array(
        'label'	   => esc_html__( 'Button Hover Text Color', 'rise' ),
        'section'  => 'rise_home_widget_section_4',
        'settings' => 'rise_hw_area_4_button_hover_text_color', 
		'priority' => 60  
    )));
	
	
//-------------------------------------------------------------------------------------------------------------------//
// Footer
//-------------------------------------------------------------------------------------------------------------------//
	 
	 
	// Add Footer Section
	$wp_customize->add_section( 'footer-custom' , array(
    	'title' => esc_html__( 'Footer', 'rise' ),
    	'priority' => 30,
    	'description' => esc_html__( 'Customize your footer area', 'rise' )
	)); 
	
	// Footer Text
	$wp_customize->add_setting( 'rise_footer_text',
	    array(
	        'sanitize_callback' => 'rise_sanitize_text',
	));
	 
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'rise_footer_text', array(
	'type'     => 'textarea',
    'label' => esc_html__( 'Footer Text', 'rise' ),
    'section' => 'footer-custom', 
    'settings' => 'rise_footer_text', 
	'priority'   => 25
	)));

	// Footer Byline Text 
	$wp_customize->add_setting( 'rise_footerid',
	    array(
	        'sanitize_callback' => 'rise_sanitize_text',
	));
	 
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'rise_footerid', array(
    'label' => esc_html__( 'Footer Byline Text', 'rise' ),
    'section' => 'footer-custom', 
    'settings' => 'rise_footerid',
	'priority'   => 30
	)));
	
	//Hide Section 
	$wp_customize->add_setting('active_byline',
	    array(
	        'sanitize_callback' => 'rise_sanitize_checkbox',
	)); 
	
	$wp_customize->add_control( 'active_byline', array(
        'type' => 'checkbox',
        'label' => esc_html__( 'Hide Footer Byline', 'rise' ),
        'section' => 'footer-custom',  
		'priority'   => 35
    ));
	
	$wp_customize->add_setting( 'rise_footer_color', array( 
        'default'     => '#f9f9f9',  
        'sanitize_callback' => 'sanitize_hex_color', 
    ));
 
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'rise_footer_color', array(
        'label'	   => esc_html__( 'Footer Background Color', 'rise'),
        'section'  => 'footer-custom',
        'settings' => 'rise_footer_color',
		'priority' => 40
    )));
	
	$wp_customize->add_setting( 'rise_footer_text_color', array( 
        'default'     => '#656565', 
        'sanitize_callback' => 'sanitize_hex_color', 
    ));
 
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'rise_footer_text_color', array(
        'label'	   => esc_html__( 'Footer Text Color', 'rise'),
        'section'  => 'footer-custom',
        'settings' => 'rise_footer_text_color', 
		'priority' => 50
    ))); 
	
	$wp_customize->add_setting( 'rise_footer_link_color', array(  
        'default'     => '#3d3d41', 
        'sanitize_callback' => 'sanitize_hex_color', 
    ));
 
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'rise_footer_link_color', array(
        'label'	   => esc_html__( 'Footer Link Color', 'rise'),  
        'section'  => 'footer-custom',
        'settings' => 'rise_footer_link_color', 
		'priority' => 60 
    )));
	
	$wp_customize->add_setting( 'rise_footer_link_hover_color', array(  
        'default'     => '#999999',  
        'sanitize_callback' => 'sanitize_hex_color', 
    ));
 
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'rise_footer_link_hover_color', array(
        'label'	   => esc_html__( 'Footer Link Hover Color', 'rise'),  
        'section'  => 'footer-custom', 
        'settings' => 'rise_footer_link_hover_color', 
		'priority' => 70
    )));
	
	
//-------------------------------------------------------------------------------------------------------------------//
// Social Icons
//-------------------------------------------------------------------------------------------------------------------//

	
	//Social Section
	$wp_customize->add_section( 'rise_settings', array(
            'title'          => esc_html__( 'Social Media Icons', 'rise' ),
			'description'    => esc_html__( 'Edit your social media icons', 'rise' ),
            'priority'       => 38,
    ) );
	
	//Hide Social Section 
	$wp_customize->add_setting('active_social',
	    array(
	        'sanitize_callback' => 'rise_sanitize_checkbox',
	)); 
	
	$wp_customize->add_control( 
    'active_social', 
    array(
        'type' => 'checkbox',
        'label' => esc_html__( 'Hide Social Media Icons', 'rise' ),
        'section' => 'rise_settings',  
		'priority'   => 10
    ));
	
	//social font size
    $wp_customize->add_setting( 
        'rise_social_text_size',
        array(
            'sanitize_callback' => 'absint',
            'default'           => '16', 
        )
    );
	
    $wp_customize->add_control( 'rise_social_text_size', array(
        'type'        => 'number', 
        'priority'    => 15,
        'section'     => 'rise_settings', 
        'label'       => esc_html__('Social Icon Size', 'rise'), 
        'input_attrs' => array(
            'min'   => 10,
            'max'   => 32, 
            'step'  => 1,
            'style' => 'margin-bottom: 10px;',
        ),
  	));
		
	//Social Icon Colors
	$wp_customize->add_setting( 'rise_social_color', array( 
        'default'     => '#656565',  
		'sanitize_callback' => 'sanitize_hex_color', 
    ));
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'rise_social_color', array(
        'label'	   => esc_html__( 'Social Icon', 'rise' ),
        'section'  => 'rise_settings',
        'settings' => 'rise_social_color', 
		'priority' => 20
    )));
	
	$wp_customize->add_setting( 'rise_social_color_hover', array( 
        'default'     => '#999999',   
		'sanitize_callback' => 'sanitize_hex_color',  
    ));
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'rise_social_color_hover', array(
        'label'	   => esc_html__( 'Social Icon Hover', 'rise' ), 
        'section'  => 'rise_settings',
        'settings' => 'rise_social_color_hover', 
		'priority' => 30
    ))); 
	

//-------------------------------------------------------------------------------------------------------------------//
// General Colors
//-------------------------------------------------------------------------------------------------------------------//

	$wp_customize->add_setting( 'rise_text_color', array(
        'default'     => '#656565',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
 
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'rise_text_color', array(
        'label'	   => esc_html__( 'Text Color', 'rise' ),
        'section'  => 'colors',
        'settings' => 'rise_text_color',
		'priority' => 10 
    ))); 
	
	$wp_customize->add_setting( 'rise_heading_color', array(
        'default'     => '#3d3d41',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
 
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'rise_heading_color', array(
        'label'	   => esc_html__( 'Heading Color', 'rise' ),
        'section'  => 'colors',
        'settings' => 'rise_heading_color', 
		'priority' => 11
    ))); 
	
    $wp_customize->add_setting( 'rise_link_color', array( 
        'default'     => '#3d3d41',   
        'sanitize_callback' => 'sanitize_hex_color',
    ));
 
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'rise_link_color', array(
        'label'	   => esc_html__( 'Link Color', 'rise'),
        'section'  => 'colors',
        'settings' => 'rise_link_color', 
		'priority' => 30
    )));
	
	$wp_customize->add_setting( 'rise_hover_color', array(
        'default'     => '#999999',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
 
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'rise_hover_color', array(
        'label'	   => esc_html__( 'Hover Color', 'rise' ), 
        'section'  => 'colors',
        'settings' => 'rise_hover_color',
		'priority' => 35 
    ))); 
	
	
	//Page Colors
    $wp_customize->add_section( 'rise_page_colors_section' , array(  
	    'title'       => esc_html__( 'Page Colors', 'rise' ),
	    'priority'    => 20, 
	    'description' => esc_html__( 'Set your page colors.', 'rise'),
		'panel' => 'rise_colors_panel', 
	));
	
	//Hide Section 
	$wp_customize->add_setting('active_header_gradient',
	    array(
	        'sanitize_callback' => 'rise_sanitize_checkbox',
	)); 
	
	$wp_customize->add_control( 'active_header_gradient', array(
        'type' => 'checkbox',
        'label' => esc_html__( 'Disable Header Gradient', 'rise' ),
        'section'  => 'rise_page_colors_section',
		'priority'   => 5
    )); 
	
	$wp_customize->add_setting( 'rise_page_header', array(
        'default'     => '#b6b9bd',  
        'sanitize_callback' => 'sanitize_hex_color',
    ));
 
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'rise_page_header', array(
        'label'	   => esc_html__( 'Page Header Background Color', 'rise' ),
        'section'  => 'rise_page_colors_section',
        'settings' => 'rise_page_header',
		'priority' => 10
    ))); 
	
	$wp_customize->add_setting( 'rise_entry', array(
        'default'     => '#ffffff', 
        'sanitize_callback' => 'sanitize_hex_color',
    ));
 
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'rise_entry', array(
        'label'	   => esc_html__( 'Entry Title Color', 'rise' ), 
        'section'  => 'rise_page_colors_section',
        'settings' => 'rise_entry',  
		'priority' => 20
    )));
	
	$wp_customize->add_setting( 'rise_content_bg', array( 
        'default'     => '#ffffff',  
		'sanitize_callback' => 'sanitize_hex_color', 
    ));
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'rise_content_bg', array(
        'label'	   => esc_html__( 'Content Background', 'rise' ), 
        'section'  => 'rise_page_colors_section',
        'settings' => 'rise_content_bg', 
		'priority' => 22
    )));
	
	$wp_customize->add_setting( 'rise_content_border', array( 
        'default'     => '#f3f3f3', 
		'sanitize_callback' => 'sanitize_hex_color', 
    )); 
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'rise_content_border', array(
        'label'	   => esc_html__( 'Content Border', 'rise' ),
        'section'  => 'rise_page_colors_section', 
        'settings' => 'rise_content_border',
		'priority' => 24 
    ))); 

	$wp_customize->add_setting( 'rise_custom_color', array(
        'default'     => '#3d3d41',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
 
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'rise_custom_color', array(
        'label'	   => esc_html__( 'Button Color', 'rise' ),
        'section'  => 'rise_page_colors_section',
        'settings' => 'rise_custom_color',
		'priority' => 40 
    ))); 
	
	$wp_customize->add_setting( 'rise_button_text_color', array(
        'default'     => '#2a2a2d',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
 
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'rise_button_text_color', array(
        'label'	   => esc_html__( 'Button Text Color', 'rise' ),
         'section'  => 'rise_page_colors_section',
        'settings' => 'rise_button_text_color',
		'priority' => 45
    ))); 
	
	$wp_customize->add_setting( 'rise_custom_color_hover', array(
        'default'     => '#3d3d41', 
        'sanitize_callback' => 'sanitize_hex_color',
    ));
 
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'rise_custom_color_hover', array(
        'label'	   => esc_html__( 'Button Hover Color', 'rise' ),
        'section'  => 'rise_page_colors_section',
        'settings' => 'rise_custom_color_hover', 
		'priority' => 50  
    )));
	
	$wp_customize->add_setting( 'rise_button_text_hover_color', array(
        'default'     => '#ffffff', 
        'sanitize_callback' => 'sanitize_hex_color',
    ));
 
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'rise_button_text_hover_color', array(
        'label'	   => esc_html__( 'Button Hover Text Color', 'rise' ),
        'section'  => 'rise_page_colors_section',
        'settings' => 'rise_button_text_hover_color',
		'priority' => 55
    )));
	
	$wp_customize->add_setting( 'rise_sidebar_bg', array(
        'default'     => '#ffffff', 
        'sanitize_callback' => 'sanitize_hex_color',
    ));
 
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'rise_sidebar_bg', array(
        'label'	   => esc_html__( 'Sidebar Background', 'rise' ),
        'section'  => 'rise_page_colors_section',
        'settings' => 'rise_sidebar_bg',
		'priority' => 60
    )));
	
	$wp_customize->add_setting( 'rise_sidebar_border', array(
        'default'     => '#f3f3f3', 
        'sanitize_callback' => 'sanitize_hex_color',
    ));
 
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'rise_sidebar_border', array(
        'label'	   => esc_html__( 'Sidebar Border', 'rise' ),
        'section'  => 'rise_page_colors_section',
        'settings' => 'rise_sidebar_border',
		'priority' => 65
    )));
	
	
//-------------------------------------------------------------------------------------------------------------------//
// Fonts
//-------------------------------------------------------------------------------------------------------------------//	
	
    $wp_customize->add_section(
        'rise_typography',
        array(
            'title' => esc_html__('Fonts', 'rise' ),   
            'priority' => 45, 
    ));
	
    $font_choices = 
        array(
			' ', 
			'Lato:400,700,400italic,700italic' => 'Lato',
			'Montserrat:400,700' => 'Montserrat',
			'Source Sans Pro:400,700,400italic,700italic' => 'Source Sans Pro',
			'Playfair Display:400,700,400italic' => 'Playfair Display',
			'Open Sans:400italic,700italic,400,700' => 'Open Sans',
			'Oswald:400,700' => 'Oswald', 
			'Raleway:400,700' => 'Raleway',
            'Droid Sans:400,700' => 'Droid Sans',
            'Arvo:400,700,400italic,700italic' => 'Arvo',
            'Lora:400,700,400italic,700italic' => 'Lora',
			'Merriweather:400,300italic,300,400italic,700,700italic' => 'Merriweather',
			'Oxygen:400,300,700' => 'Oxygen',
			'PT Serif:400,700' => 'PT Serif', 
            'PT Sans:400,700,400italic,700italic' => 'PT Sans',
            'PT Sans Narrow:400,700' => 'PT Sans Narrow',
			'Cabin:400,700,400italic' => 'Cabin',
			'Fjalla One:400' => 'Fjalla One',
			'Francois One:400' => 'Francois One',
			'Josefin Sans:400,300,600,700' => 'Josefin Sans',  
			'Libre Baskerville:400,400italic,700' => 'Libre Baskerville',
            'Arimo:400,700,400italic,700italic' => 'Arimo',
            'Ubuntu:400,700,400italic,700italic' => 'Ubuntu',
            'Bitter:400,700,400italic' => 'Bitter',
            'Droid Serif:400,700,400italic,700italic' => 'Droid Serif',
            'Roboto:400,400italic,700,700italic' => 'Roboto',
            'Open Sans Condensed:700,300italic,300' => 'Open Sans Condensed',
            'Roboto Condensed:400italic,700italic,400,700' => 'Roboto Condensed',
            'Roboto Slab:400,700' => 'Roboto Slab',
            'Yanone Kaffeesatz:400,700' => 'Yanone Kaffeesatz',
            'Rokkitt:400' => 'Rokkitt',
    );
	
	//body font size
    $wp_customize->add_setting(
        'rise_body_size',
        array(
            'sanitize_callback' => 'absint',
            'default'           => '16', 
        )
    );
	
    $wp_customize->add_control( 'rise_body_size', array(
        'type'        => 'number', 
        'priority'    => 10,
        'section'     => 'rise_typography',
        'label'       => esc_html__('Body Font Size', 'rise'), 
        'input_attrs' => array(
            'min'   => 10,
            'max'   => 28,
            'step'  => 1,
            'style' => 'margin-bottom: 10px;',
        ),
  	));
    
    $wp_customize->add_setting(
        'headings_fonts',
        array(
            'sanitize_callback' => 'rise_sanitize_fonts',
    ));
    
    $wp_customize->add_control(
        'headings_fonts',
        array(
            'type' => 'select',
			'default'           => '20', 
            'description' => esc_html__('Select your desired font for the headings. Montserrat is the default Heading font.', 'rise'),
            'section' => 'rise_typography',
            'choices' => $font_choices
    ));
    
    $wp_customize->add_setting(
        'body_fonts',
        array(
            'sanitize_callback' => 'rise_sanitize_fonts',
    ));
    
    $wp_customize->add_control(
        'body_fonts',
        array(
            'type' => 'select',
			'default'           => '30', 
            'description' => esc_html__( 'Select your desired font for the body. Lato is the default Body font.', 'rise' ), 
            'section' => 'rise_typography',   
            'choices' => $font_choices 
    ));
	

//-------------------------------------------------------------------------------------------------------------------//
// Blog Layout
//-------------------------------------------------------------------------------------------------------------------//

    $wp_customize->add_section( 'rise_layout_section' , array( 
	    'title'       => esc_html__( 'Blog', 'rise' ),
	    'priority'    => 38, 
	    'description' => 'Change how Rise displays posts',  
	));
	
	// Blog Title
	$wp_customize->add_setting( 'rise_blog_title',
	    array(
	        'sanitize_callback' => 'rise_sanitize_text', 
			'default' => esc_html__( 'Our Latest News', 'rise' ), 
	));  

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'rise_blog_title', array(
		'label'    => esc_html__( 'Posts Page Title', 'rise' ),
		'section'  => 'rise_layout_section', 
		'settings' => 'rise_blog_title',
		'priority'   => 10 
	))); 
	
	//Blog Background
	$wp_customize->add_setting( 'rise_blog_bg', array(
		'sanitize_callback' => 'esc_url_raw',
	));

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'rise_blog_bg', array( 
		'label'    => esc_html__( 'Blog Header Background Image', 'rise' ),
		'section'  => 'rise_layout_section',
		'settings' => 'rise_blog_bg',   
		'priority'   => 20
	)));
	
	//Blog Colors
	$wp_customize->add_setting( 'rise_post_nav_bg', array( 
        'default'     => '#3d3d41', 
		'sanitize_callback' => 'sanitize_hex_color', 
    )); 
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'rise_post_nav_bg', array(
        'label'	   => esc_html__( 'Post Navigation Background', 'rise' ), 
        'section'  => 'rise_layout_section',
        'settings' => 'rise_post_nav_bg',
		'priority' => 40
    ))); 
	
	//Post Content
	$wp_customize->add_setting( 'rise_post_content', array(
		'default'	        => 'option1',
		'sanitize_callback' => 'rise_sanitize_index_content',
	));

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'rise_post_content', array(
		'label'    => esc_html__( 'Post content', 'rise' ),
		'section'  => 'rise_layout_section',
		'settings' => 'rise_post_content', 
		'type'     => 'radio',
		'priority'   => 30, 
		'choices'  => array(
			'option1' => esc_html__( 'Excerpts', 'rise' ), 
			'option2' => esc_html__( 'Full content', 'rise' ), 
			),
	)));
	
	//blog on single posts
	$wp_customize->add_setting( 'rise_sidebar_blog_setting', array(
		'default'	        => 'option1',
		'sanitize_callback' => 'rise_sanitize_index_content',
	));

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'rise_sidebar_blog_setting', array(
		'label'    => esc_html__( 'Sidebar Option', 'rise' ), 
		'section'  => 'rise_layout_section',
		'settings' => 'rise_sidebar_blog_setting', 
		'type'     => 'radio', 
		'priority'   => 31, 
		'choices'  => array(
			'option1' => esc_html__( 'Sidebar On Blog Pages', 'rise' ),
			'option2' => esc_html__( 'No Sidebar', 'rise' ),
			),
	))); 
	
	//Excerpt
    $wp_customize->add_setting(
        'exc_length',
        array(
            'sanitize_callback' => 'absint',
            'default'           => '30',
    ));
	
    $wp_customize->add_control( 'exc_length', array( 
        'type'        => 'number',
        'priority'    => 2, 
        'section'     => 'rise_layout_section',
        'label'       => esc_html__( 'Excerpt length', 'rise' ),
		'priority'   => 40,
        'description' => esc_html__( 'Default: 30 words', 'rise' ),
        'input_attrs' => array(
            'min'   => 10,
            'max'   => 200,
            'step'  => 5
        ), 
	));
	
	//Excluded Terms
	$wp_customize->add_setting( 'rise_post_nav_terms',
	    array(
	        'sanitize_callback' => 'rise_sanitize_text',
	));  

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'rise_post_nav_terms', array(
		'label'    => esc_html__( 'Post Navigation Excluded Categories', 'rise' ),
		'description'    => esc_html__( 'If you would like to exclude certain categories from the navigation at the bottom of single post pages, enter in the category numbers in the field below. Separate each number with a comma. For example: 15, 17, 18', 'rise' ),
		'section'  => 'rise_layout_section',   
		'settings' => 'rise_post_nav_terms', 
		'priority'   => 50
	))); 
	
//-------------------------------------------------------------------------------------------------------------------//
// Post Format Options
//-------------------------------------------------------------------------------------------------------------------//


	$wp_customize->add_panel( 'rise_plugin_panel', array(
    'priority'       => 35, 
    'capability'     => 'edit_theme_options',
    'title'          => esc_html__( 'Rise Post Format Options', 'rise' ), 
    'description'    => esc_html__( 'If you are using any of the post format widgets or archives with rise, you can customize the features here.', 'rise' ), 
	));
	

	//Projects Posts
	$wp_customize->add_section( 'rise_plugin_projects_colors' , array(  
	    'title'       => esc_html__( 'Projects', 'rise' ), 
		'theme_supports' => 'mt_projects',  
	    'priority'    => 20, 
	    'description' => esc_html__( 'If you are using Gallery post formats, you can customize the settings here.', 'rise'), 
		'panel' => 'rise_plugin_panel', 
	));
	
	//Disable Hovers
	$wp_customize->add_setting('active_project_hovers',
	    array(
	        'sanitize_callback' => 'rise_sanitize_checkbox',
	)); 
	
	$wp_customize->add_control( 'active_project_hovers', array(
        'type' => 'checkbox',
        'label' => esc_html__( 'Disable Project Hovers', 'rise' ), 
        'section'  => 'rise_plugin_projects_colors',
		'priority'   => 5
    )); 
	
	// Hover content settings
	$wp_customize->add_setting( 'rise_hover_content', array(
		'default'	        => 'option1',
		'sanitize_callback' => 'rise_sanitize_hover_content', 
	));

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'rise_hover_content', array(
		'label' => esc_html__( 'Project Hover Content', 'rise' ),
		'description'    => esc_html__( 'Choose your Project hover content', 'rise' ),
		'section'  => 'rise_plugin_projects_colors',
		'settings' => 'rise_hover_content', 
		'type'     => 'radio',  
		'priority'   => 10, 
		'choices'  => array(
			'option1' => esc_html__( 'Post Title', 'rise' ), 
			'option2' => esc_html__( 'Post Excerpt', 'rise' ), 
			'option3' => esc_html__( 'None', 'rise' ),
			),
	))); 
	
	$wp_customize->add_setting( 'rise_plugin_project_hover_color', array( 
        'default'     => '#2a2e39',  
		'sanitize_callback' => 'sanitize_hex_color', 
    ));
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'rise_plugin_project_hover_color', array(
        'label'	   => esc_html__( 'Overlay Color', 'rise' ), 
        'section'  => 'rise_plugin_projects_colors',
        'settings' => 'rise_plugin_project_hover_color', 
		'priority' => 10 
    ))); 
	
	$wp_customize->add_setting( 'rise_plugin_project_hover_text_color', array( 
        'default'     => '#ffffff', 
		'sanitize_callback' => 'sanitize_hex_color', 
    ));
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'rise_plugin_project_hover_text_color', array(
        'label'	   => esc_html__( 'Title Text', 'rise' ), 
        'section'  => 'rise_plugin_projects_colors',
        'settings' => 'rise_plugin_project_hover_text_color', 
		'priority' => 20 
    )));


	//Testimonials Plugins 
	$wp_customize->add_section( 'rise_plugin_testimonial_colors' , array(  
	    'title'       => esc_html__( 'Testimonials', 'rise' ),
		'theme_supports' => 'mt_testimonials',  
	    'priority'    => 40, 
	    'description' => esc_html__( 'If you are using Quote post formats, you can customize the settings here.', 'rise'), 
		'panel' => 'rise_plugin_panel', 
	));
	
	$wp_customize->add_setting( 'rise_plugin_testimonial_bg', array(  
        'default'     => '#ffffff',  
		'sanitize_callback' => 'sanitize_hex_color', 
    ));
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'rise_plugin_testimonial_bg', array(
        'label'	   => esc_html__( 'Content Background', 'rise' ), 
        'section'  => 'rise_plugin_testimonial_colors',
        'settings' => 'rise_plugin_testimonial_bg', 
		'priority' => 10 
    ))); 
	
	$wp_customize->add_setting( 'rise_plugin_testimonial_text_color', array( 
        'default'     => '#656565', 
		'sanitize_callback' => 'sanitize_hex_color', 
    ));
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'rise_plugin_testimonial_text_color', array(
        'label'	   => esc_html__( 'Text Color', 'rise' ), 
        'section'  => 'rise_plugin_testimonial_colors',
        'settings' => 'rise_plugin_testimonial_text_color', 
		'priority' => 20 
    )));
	
	$wp_customize->add_setting( 'rise_plugin_testimonial_title_color', array( 
        'default'     => '#3d3d41', 
		'sanitize_callback' => 'sanitize_hex_color', 
    ));
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'rise_plugin_testimonial_title_color', array(
        'label'	   => esc_html__( 'Title Color', 'rise' ), 
        'section'  => 'rise_plugin_testimonial_colors',
        'settings' => 'rise_plugin_testimonial_title_color', 
		'priority' => 25
    )));
	
	//Font Style
	$wp_customize->add_setting( 'rise_plugin_testimonial_font_style', array(
		'default'	        => 'option1',
		'sanitize_callback' => 'rise_sanitize_index_content',
	));

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'rise_plugin_testimonial_font_style', array(
		'label'    => esc_html__( 'Font Style', 'rise' ),
		'section'  => 'rise_plugin_testimonial_colors',
		'settings' => 'rise_plugin_testimonial_font_style',
		'type'     => 'radio',
		'priority'   => 30, 
		'choices'  => array(
			'option1' => esc_html__( 'Italic', 'rise' ),
			'option2' => esc_html__( 'Normal', 'rise' ), 
			),
	))); 
	
	
	//Archive Options
	$wp_customize->add_section( 'rise_archive_options' , array(  
	    'title'       => esc_html__( 'Post Format Archive Options', 'rise' ), 
		'theme_supports' => 'mt_projects',  
	    'priority'    => 40, 
	    'description' => esc_html__( 'Edit your post format archive options here.', 'rise'), 
		'panel' => 'rise_plugin_panel',
	));
	
	
	//Projects Columns
    $wp_customize->add_setting( 
        'rise_projects_columns_number',
        array(
            'sanitize_callback' => 'absint',
            'default'           => '3', 
        )
    );
	
    $wp_customize->add_control( 'rise_projects_columns_number', array(
        'type'        => 'number', 
        'priority'    => 10,
        'section'     => 'rise_archive_options', 
        'label'       => esc_html__('Projects Page Columns Width', 'rise'),
		'description' => esc_html__('Set the width of the each Projects Column. 1 = 100% of the width, 4 = 25% of the width.', 'rise'), 
        'input_attrs' => array(
            'min'   => 1,
            'max'   => 5,  
            'step'  => 1,
            'style' => 'margin-bottom: 10px;',
        ), 
  	)); 
	
	//Testimonial Columns
    $wp_customize->add_setting( 
        'rise_testimonial_columns_number',
        array(
            'sanitize_callback' => 'absint',
            'default'           => '3', 
        )
    );
	
    $wp_customize->add_control( 'rise_testimonial_columns_number', array(
        'type'        => 'number', 
        'priority'    => 20,
        'section'     => 'rise_archive_options', 
        'label'       => esc_html__('Testimonial Page Columns Width', 'rise'),
		'description' => esc_html__('Set the width of the each Testimonial Column. 1 = 100% of the width, 4 = 25% of the width.', 'rise'), 
        'input_attrs' => array(
            'min'   => 1,
            'max'   => 5,  
            'step'  => 1,
            'style' => 'margin-bottom: 10px;',
        ), 
  	)); 
	
	
	//content placement
	$wp_customize->add_setting( 'rise_archive_content_setting', array(
		'default'	        => 'option1',
		'sanitize_callback' => 'rise_sanitize_index_content', 
	));

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'rise_archive_content_setting', array(
		'label'    => esc_html__( 'Post Format Archive Placement', 'rise' ),  
		'section'     => 'rise_archive_options',
		'settings' => 'rise_archive_content_setting', 
		'type'     => 'radio', 
		'priority'   => 30, 
		'choices'  => array(
			'option1' => esc_html__( 'Above Content', 'rise' ),
			'option2' => esc_html__( 'Below Content', 'rise' ),
			),
	))); 
	

}
add_action( 'customize_register', 'rise_customize_register' );


/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function rise_customize_preview_js() {
	wp_enqueue_script( 'rise_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'rise_customize_preview_js' );
