<?php
/*
Plugin Name: the_post_image
Description: 投稿記事から画像を呼び出して任意の場所に表示するためのプラグインです。
Version: 0.3.0
*/

// Post Attachment image function. Direct link to file. 

if ( ! function_exists('get_the_post_image') ) :
function the_post_image($size = 'medium', $target_name = '') {
	$output = get_the_post_image($size, $target_name);
	if ( $output ) {
		echo $output;
		return true;
	} else {
		return false;
	}
}
function get_the_post_image($size = 'medium', $target_name = '') {
	$id = get_the_ID();
	if ( empty($id) ) return false;

	if ( has_post_thumbnail($id) ){
		$output = wp_get_attachment_image(get_post_thumbnail_id(), $size);
	} else {
		$images = get_children(array(
			'numberposts' => 1,
			'post_parent' => $id,
			'post_type' => 'attachment',
			'post_mime_type' => 'image',
			'order'      => 'ASC',
			'orderby' => 'menu_order ID',
		));
		if ( empty($images) ) {
			// Post has no attached images
			return false;
		}
		$image = array_pop($images);
		$output = wp_get_attachment_image($image->ID, $size);
	}
	if ( empty($output) ) {
		return false;
	}
	return $output;
}
endif; //function_exists 'get_the_post_image'


if ( ! function_exists('get_template_image') ):
/**
 * Load a template part into a template
 *
 * 本体の get_template_part を改造しました。
 * 画像用です。
 *
 * @since 3.0.0
 * @uses do_action() Calls 'get_template_image{$slug}' action.
 * @param string $slug The slug name for the generic template.
 * @param string $name The name of the extension of image. (Default = png)
 */
function get_template_image( $slug, $ext = 'png', $dir = 'images' ) {
	$permit_ext = array('png','gif','jpg');
	$ext = trim($ext);
	$ext = trim($ext, '/');
	if ( ! preg_match('/'.join('|',$permit_ext).'/', $ext) ){
		return false;
	}
	$dir = trim($dir);
	$dir = trim($dir, '/');
	
	$templates = array();
	if ( isset($name) )
		$templates[] = "{$dir}/{$slug}.{$ext}";
	$templates[] = "{$dir}/{$slug}.png";
	$filename = locate_template($templates, false, false);
	
	if ( !empty($filename) ){
		$stylesheetpath = '#' . get_stylesheet_directory() . '#';
		$templatepath   = '#' . get_template_directory()   . '#';
		if ( preg_match($stylesheetpath, $filename) ){
			$output = preg_replace($stylesheetpath, get_stylesheet_directory_uri(), $filename);
		} elseif ( preg_match($templatepath, $filename) ){
			$output = preg_replace($templatepath, get_template_directory_uri(), $filename);
		} else {
			$output = '';
		}
		return $output;
	} else {
		return false;
	}
}
endif; // get_template_image