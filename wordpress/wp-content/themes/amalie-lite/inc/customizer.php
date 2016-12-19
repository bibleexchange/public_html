<?php
/**
 * Amalie Customizer functionality
 *
 * @package Amalie
 * @since Amalie 1.0
 */

/**
 * Add postMessage support for site title and description for the Customizer.
 *
 * @since Amalie 1.0
 *
 * @param WP_Customize_Manager $wp_customize Customizer object.
 */
function amalie_customize_register( $wp_customize ) {

	$wp_customize->get_setting( 'blogname' )->transport        = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';
	
	$wp_customize->add_section( 'amalie_theme_options', array(
		'title'    => __( 'Front Page Featured Page', 'amalie' ),
		'priority' => 131,
	) );
     
	/* Front Page: Featured Page One */
	$wp_customize->add_setting( 'amalie_featured_page_one_front_page_first_block', array(
		'default'           => '',
		'sanitize_callback' => 'amalie_sanitize_dropdown_pages',
	) );
	$wp_customize->add_control( 'amalie_featured_page_one_front_page_first_block', array(
		'label'             => __( 'Featured Page', 'amalie' ),
		'section'           => 'amalie_theme_options',
		'priority'          => 8,
		'type'              => 'dropdown-pages',
	) );	


	// Add an additional description to the header image section.
	$wp_customize->get_section( 'header_image' )->description = __( 'Applied to the header on small screens and the sidebar on wide screens.', 'amalie' );
	
  /**
   * Adds the individual sections for custom logo
   */
   $wp_customize->add_section( 'amalie_logo_section' , array(
    'title'       => __( 'Logo', 'amalie' ),
    'priority'    => 30,
    'description' => __( 'Upload a logo to replace the default site name and description in the header', 'amalie' )
   ) );
   $wp_customize->add_setting( 'amalie_logo', array(
	 'sanitize_callback' => 'esc_url_raw',
   ) );
   $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'amalie_logo', array(
	 'label'    => __( 'Logo', 'amalie' ),
	 'section'  => 'amalie_logo_section',
	 'settings' => 'amalie_logo',
   ) ) );

	/***** Register Custom Controls *****/

	class Amalie_Upgrade extends WP_Customize_Control {
		public function render_content() {  ?>
			<p class="didi-upgrade-thumb">
				<img src="<?php echo get_template_directory_uri(); ?>/screenshot.png" />
			</p>
			<p class="customize-control-title didi-upgrade-title">
				<?php esc_html_e('Amalie Pro', 'amalie'); ?>
			</p>
			<p class="textfield didi-upgrade-text">
				<?php esc_html_e('Full version of this theme includes additional features; additional page templates, WooCommerce support, color options & premium theme support.', 'amalie'); ?>
			</p>
			<p class="customize-control-title didi-upgrade-title">
				<?php esc_html_e('Additional Features:', 'amalie'); ?>
			</p>
			<ul class="didi-upgrade-features">
				<li class="didi-upgrade-feature-item">
					<?php esc_html_e('Additional Page Templates', 'amalie'); ?>
				</li>
				<li class="didi-upgrade-feature-item">
					<?php esc_html_e('WooCommerce Support', 'amalie'); ?>
				</li>
				<li class="didi-upgrade-feature-item">
					<?php esc_html_e('Color Options', 'amalie'); ?>
				</li>
				<li class="didi-upgrade-feature-item">
					<?php esc_html_e('Premium Theme Support', 'amalie'); ?>
				</li>
			</ul>
			<p class="didi-upgrade-button">
				<a href="http://www.anarieldesign.com/themes/personal-blog-wordpress-theme/" target="_blank" class="button button-secondary">
					<?php esc_html_e('Read more about Amalie', 'amalie'); ?>
				</a>
			</p><?php
		}
	}

	/***** Add Sections *****/

	$wp_customize->add_section('amalie_upgrade', array(
		'title' => esc_html__('Pro Features', 'amalie'),
		'priority' => 300
	) );

	/***** Add Settings *****/

	$wp_customize->add_setting('amalie_options[premium_version_upgrade]', array(
		'default' => '',
		'type' => 'option',
		'sanitize_callback' => 'esc_attr'
	) );

	/***** Add Controls *****/

	$wp_customize->add_control(new Amalie_Upgrade($wp_customize, 'premium_version_upgrade', array(
		'section' => 'amalie_upgrade',
		'settings' => 'amalie_options[premium_version_upgrade]',
		'priority' => 1
	) ) );
}
add_action( 'customize_register', 'amalie_customize_register', 11 );

/**
 * Sanitization
 */
//Checkboxes
function amalie_sanitize_checkbox( $input ) {
	if ( $input == 1 ) {
		return 1;
	} else {
		return '';
	}
}

//Integers
function amalie_sanitize_int( $input ) {
    if( is_numeric( $input ) ) {
        return intval( $input );
    }
}

//Text
function amalie_sanitize_text( $input ) {
    return wp_kses_post( force_balance_tags( $input ) );
}

//No sanitize - empty function for options that do not require sanitization -> to bypass the Theme Check plugin
function amalie_no_sanitize( $input ) {
}

/**
 * Sanitize the dropdown pages.
 *
 * @param interger $input.
 * @return interger.
 */
function amalie_sanitize_dropdown_pages( $input ) {
	if ( is_numeric( $input ) ) {
		return intval( $input );
	}
}

/**
 * Binds JS handlers to make the Customizer preview reload changes asynchronously.
 *
 * @since Amalie 1.0
 */
function amalie_customize_preview_js() {
	wp_enqueue_script( 'amalie-customize-preview', get_template_directory_uri() . '/js/customize-preview.js', array( 'customize-preview' ), '20141216', true );
}
add_action( 'customize_preview_init', 'amalie_customize_preview_js' );
/***** Enqueue Customizer CSS *****/

function amalie_customizer_base_css() {
	wp_enqueue_style('amalie-customizer', get_template_directory_uri() . '/admin/customizer.css', array());
}
add_action('customize_controls_print_styles', 'amalie_customizer_base_css');
/***** Enqueue Customizer JS *****/

function amalie_customizer_js() {
	wp_enqueue_script('amalie-customizer', get_template_directory_uri() . '/js/amalie-customizer.js', array(), '1.0.0', true);
	wp_localize_script('amalie-customizer', 'amalie_links', array(
		'upgradeURL' => esc_url('http://www.anarieldesign.com/themes/personal-blog-wordpress-theme/'),
		'upgradeLabel' => esc_html__('Upgrade to Amalie Pro', 'amalie'),
		'title'	=> esc_html__('Theme Related Links:', 'amalie'),
		'themeURL' => esc_url('http://www.anarieldesign.com/themes/personal-blog-wordpress-theme/'),
		'themeLabel' => esc_html__('Theme Info Page', 'amalie'),
		'docsURL' => esc_url('http://www.anarieldesign.com/documentation/amalielite/'),
		'docsLabel'	=> esc_html__('Theme Documentation', 'amalie'),
		'rateURL' => esc_url('https://wordpress.org/support/view/theme-reviews/amalie-lite?filter=5'),
		'rateLabel'	=> esc_html__('Rate this theme', 'amalie'),
	));
}
add_action('customize_controls_enqueue_scripts', 'amalie_customizer_js');