<?php
/**
Plugin Name: Slide Gallery
Plugin URI: 
Description: Targetable Galleryの改善版。ギャラリー、スライドショーどちらにも対応特定画像の排除機能付き
Author: KATO Yoshitaka
Author URI: http://curious-everything.com/
Version: 0.1.0
Since 2018.01.06
*/
if ( ! class_exists('Targetable_Gallery') ) :

if (!defined('TG_DIV_ID_PREFIX'))
	  define('TG_DIV_ID_PREFIX', 		'gallery-');
if (!defined('TG_TAGET_IMAGE_PREFIX'))
	  define('TG_TAGET_IMAGE_PREFIX', 	'gallery-target-');
if (!defined('TG_TAGET_CAPTION_PREFIX'))
	  define('TG_TAGET_CAPTION_PREFIX', 'gallery-caption-');
if (!defined('TG_DIV_CLASS'))
	  define('TG_DIV_CLASS', 			'targetable-gallery');

class Targetable_Gallery{
	function __construct(){
		add_filter('attachment_fields_to_edit', array($this,'hublog_gallery_exclude'), 99, 2);
		add_filter('attachment_fields_to_save', array($this,'hublog_gallery_exclude_save'), 11, 2);
//		add_filter('post_gallery', array($this, 'gallery_shortcode'), 11, 2);
	}	
	/* ギャラリーから特定画像を排除するための設定 */
	function hublog_gallery_exclude($form_fields, $post) {
		$parent_post_id = (isset($_GET['post_id'])) ? esc_attr( stripslashes($_GET['post_id'])) : '';
		if (empty($parent_post_id) && isset($_POST['post_id'])) { $parent_post_id =  esc_attr( stripslashes($_POST['post_id'])); }

		if ( $parent_post_id == $post->post_parent || empty($_GET) ){
			$new_fields = array();
	
			$post_custom = get_post_custom($post->ID);
			$checked = (isset($post_custom['exclude'])) ? "checked='checked'" : '';
			$new_fields['exclude']['label'] = __('ギャラリーから除く');
			$new_fields['exclude']['input'] = 'html';
			$new_fields['exclude']['html']  = "
				<input  id='attachments[{$post->ID}][exclude]' type='checkbox' name='attachments[{$post->ID}][exclude]' value='{$post->ID}' {$checked} />
				<label for='attachments[{$post->ID}][exclude]'>チェックを入れると、ギャラリーから除外されます</label>
				";
			$form_fields = array_merge($form_fields, $new_fields);
		}
		return $form_fields;
	}
	function hublog_gallery_exclude_save($post, $attachment) {
		if( isset($attachment['exclude']) ){
			update_post_meta($post['ID'], 'exclude', $attachment['exclude']);
		} else {
			delete_post_meta($post['ID'], 'exclude');
		}
		return $post;
	}
	
	function gallery_shortcode($n, $attr) {
		global $post;
	
		static $instance = 0;
		$instance++;
	
		// We're trusting author input, so let's at least make sure it looks like a valid orderby statement
		if ( isset( $attr['orderby'] ) ) {
			$attr['orderby'] = sanitize_sql_orderby( $attr['orderby'] );
			if ( !$attr['orderby'] )
				unset( $attr['orderby'] );
		}
	
		extract(shortcode_atts(array(
			'order'      => 'ASC',
			'orderby'    => 'menu_order ID',
			'id'         => $post->ID,
			'itemtag'    => 'li',
			'icontag'    => 'div',
			'captiontag' => 'p',
			'columns'    => 3,
			'size'       => 'thumbnail',
			'include'    => '',
			'type'    => 'flexslider',
			'exclude'    => ''
			
		), $attr));
	
		
	}

}
global $targetablegallery;
$targetablegallery = new Targetable_Gallery();


function targetable_gallery( $img_size='thumbnail', $target_img_size='medium', $onmouse_action = 'onclick', $link = false ) {
	gallery_target($target_img_size);
	gallery_collection($img_size, $target_img_size, $onmouse_action, $link);
}

function gallery_target( $img_size='medium' ) {
	global $post;

	$images = get_children( array(
								'post_parent' => $post->ID, 
								'post_type' => 'attachment',
								'post_mime_type' => 'image', 
								'orderby' => 'menu_order', 
								'order' => 'order', 
		) );
	
	if ( has_post_thumbnail($post->ID) ){
		$post_thumbanil_id = get_post_thumbnail_id();
		$image = $images[$post_thumbanil_id];
		if ( empty($image) ){ return; }
	} else {
		$image = array_pop($images);
		if ( empty($image) ){ return; }
		$post_thumbanil_id = $image->ID;
	}
	$image_img_tag = wp_get_attachment_image( $post_thumbanil_id, $img_size );
}

function gallery_collection( $img_size='thumbnail', $target_img_size='medium', $onmouse_action = 'onclick', $link = false ) {



} //end function gallery_collection



endif; //!class_exists Targetable_Gallery