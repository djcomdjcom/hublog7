<?php 
/*
   Plugin Name: Custom Fields ShortCode
   Plugin URI: http://plugin.php-web.net/wp/kasutamu-firudo-no-deta-hyouji
   Description: 
   Author: Fumito MIZUNO
   Version: 1
   Author URI: http://php-web.net/
 */
 
if ( !function_exists('sc_post_custom_func') ) {
	function sc_post_custom_func( $atts, $content = null ) {
		extract( shortcode_atts( array(
						'key' => '',
						'separator' => ', ',
						), $atts ));
		if ( "" != $key ) {
			if ( is_array(post_custom($key)) ) {
			return implode($separator,post_custom($key));
			} else {
			return post_custom($key);
			}
		}
	}
	add_shortcode( 'sc_post_custom', 'sc_post_custom_func' );
	
} // End of if function_exists('sc_post_custom_func')


function post_custom_array( $metakey ) {
	
	$this_meta = (array) post_custom( $metakey );
	if ( empty($this_meta) ) { return; }
	
	foreach ( $this_meta as $key => $value ) {
		$output[] = '<span class="' . $metakey . '">' . $value . '</span>';
	}
	return join("", $output);
}


