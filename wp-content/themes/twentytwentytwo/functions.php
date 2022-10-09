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

/***************************Add the field to the checkout and Order Test******************/
/**
 * Add the field to the checkout
 */
add_action( 'woocommerce_after_order_notes', 'satyendra_custom_checkout_field' );

function satyendra_custom_checkout_field( $checkout ) {

    echo '<div id="satyendra_custom_checkout_field"><h2>' . __('Satyendra _Order Notes') . '</h2>';

    woocommerce_form_field( 'my_field_name', array(
        'type'          => 'text',
        'class'         => array('my-field-class form-row-wide'),
        'label'         => __('Fill in this field'),
        'placeholder'   => __('Enter something'),
        ), $checkout->get_value( 'my_field_name' ));

    echo '</div>';

}

/**
 * Process the checkout
 */
add_action('woocommerce_checkout_process', 'satyendra_custom_checkout_field_process');

function satyendra_custom_checkout_field_process() {
    // Check if set, if its not set add an error.
    if ( ! $_POST['my_field_name'] )
        wc_add_notice( __( 'Please enter something into this new shiny field.' ), 'error' );
}



/**
 * Update the order meta with field value
 */
add_action( 'woocommerce_checkout_update_order_meta', 'satyendra_custom_checkout_field_update_order_meta' );

function satyendra_custom_checkout_field_update_order_meta( $order_id ) {
    if ( ! empty( $_POST['my_field_name'] ) ) {
        update_post_meta( $order_id, 'Satyendra _Order Notes', sanitize_text_field( $_POST['my_field_name'] ) );
    }
}

/**
 * Display field value on the order edit page
 */
add_action( 'woocommerce_admin_order_data_after_billing_address', 'satyendra_custom_checkout_field_display_admin_order_meta', 10, 1 );

function satyendra_custom_checkout_field_display_admin_order_meta($order){
    echo '<p><strong>'.__('Satyendra _Order Notes').':</strong> ' . get_post_meta( $order->id, 'Satyendra _Order Notes', true ) . '</p>';
}















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
		
		
 //  Adding Custom CSS file in theme woo-custom-style.css
 
		wp_enqueue_style( 'woo-custom-style', get_template_directory_uri() . '/assets/css/woo-custom-style.css', array(), '1.1', 'all');

	}

endif;


add_action( 'wp_enqueue_scripts', 'twentytwentytwo_styles' );

// Add block patterns
require get_template_directory() . '/inc/block-patterns.php';
