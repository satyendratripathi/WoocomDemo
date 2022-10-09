<?php
/**
 * Twenty Twenty-Two functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_Two
 * @since Twenty Twenty-Two 1.0
 */


	/**
	 * Customshortcode for assignment
	 *
	 *
	 */
	/**************** Start OF CUSTOM SHORTCODE for Image**********/
	 function add_custom_image($atts, $content = null) {
    $default = array(
        'link' => '#',
	
    );
    $a = shortcode_atts($default, $atts);
    $content = do_shortcode($content);
	extract(shortcode_atts(array("src" => ''
	
	), $atts));
	return '
	<div>
	<a href="'.($a['link']).'" style="color: blue">'.$content.'<img src="' . $src . '" alt="'. do_shortcode($content) .'"  />

<p>' . $content . '</p>
</a>
</div>

	';
    
}
add_shortcode('add_custom_image', 'add_custom_image');
/**************** END OF CUSTOME SHORTCODE**********/

/************************** Start OF Rename Add to cart Button**********/


add_filter('woocommerce_product_single_add_to_cart_text','saty_customize_add_to_cart_button_woocommerce');
function saty_customize_add_to_cart_button_woocommerce(){
return __('Add to Basket', 'woocommerce');
}

add_filter( 'woocommerce_product_add_to_cart_text', 'woocommerce_shop_page_add_to_cart_callback' );  
function woocommerce_shop_page_add_to_cart_callback() {
    return __( 'Add to Basket', 'text-domain' );
}

/************************** END OF Rename Add to cart Button**********/





if ( ! function_exists( 'twentytwentytwo_support' ) ) :

	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * @since Twenty Twenty-Two 1.0
	 *
	 * @return void
	 */
	function twentytwentytwo_support() {

		// Add support for block styles.
		add_theme_support( 'wp-block-styles' );

		// Enqueue editor styles.
		add_editor_style( 'style.css' );

	}

endif;





add_action( 'after_setup_theme', 'twentytwentytwo_support' );

if ( ! function_exists( 'twentytwentytwo_styles' ) ) :

	/**
	 * Enqueue styles.
	 *
	 * @since Twenty Twenty-Two 1.0
	 *
	 * @return void
	 */
	function twentytwentytwo_styles() {
		// Register theme stylesheet.
		$theme_version = wp_get_theme()->get( 'Version' );

		$version_string = is_string( $theme_version ) ? $theme_version : false;
		wp_register_style(
			'twentytwentytwo-style',
			get_template_directory_uri() . '/style.css',
			array(),
			$version_string
		);

		// Enqueue theme stylesheet.
		wp_enqueue_style( 'twentytwentytwo-style' );

	}

endif;


add_action( 'wp_enqueue_scripts', 'twentytwentytwo_styles' );

// Add block patterns
require get_template_directory() . '/inc/block-patterns.php';
