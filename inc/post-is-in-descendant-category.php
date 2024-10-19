<?php
/**
Plugin Name: Post is in Descendant Category
Version: 1.1.0
Plugin URI: https://gist.github.com/yorozu/4583960
Description: Tests if any of a post's assigned categories are descendants of target categories or taxonomies
Author: KATO Yoshitaka
Author URI: http://curious-everything.com/

Original: 
 * 
 * Tests if any of a post's assigned categories are descendants of target categories
 *
 * @param int|array $cats The target categories. Integer ID or array of integer IDs
 * @param int|object $_post The post. Omit to test the current post in the Loop or main query
 * @return bool True if at least 1 of the post's categories is a descendant of any of the target categories
 * @see get_term_by() You can get a category by name or slug, then pass ID to this function
 * @uses get_term_children() Passes $cats
 * @uses in_category() Passes $_post (can be empty)
 * @version 2.7
 * @link http://codex.wordpress.org/Function_Reference/in_category#Testing_if_a_post_is_in_a_descendant_category
 */

/* For categories */
if ( ! function_exists( 'post_is_in_descendant_category' ) ) :
function post_is_in_descendant_category( $cats, $_post = null ) {
	foreach ( (array) $cats as $cat ) {
		// get_term_children() accepts integer ID only
		$descendants = get_term_children( (int) $cat, 'category' );
		if ( $descendants && in_category( $descendants, $_post ) )
			return true;
	}
	return false;
}
function post_is_in_category_slug($slug){
	global $post;
	$post_id = ( isset($post->ID) ) ? $post->ID : '';
	if ( in_category( $slug, $post_id ) || post_is_in_descendant_category( get_term_by('slug',$slug,'category'), $post_id ) ){
		return true;
	} else {
		return false;
	}
}
endif; //function_exists 'post_is_in_descendant_category'


/* For taxonomies */
if ( ! function_exists( 'post_is_in_descendant_taxonomy' ) ) :
function post_is_in_descendant_taxonomy( $terms, $taxonomy, $_post = null ) {
	foreach ( (array) $terms as $term ) {
		// get_term_children() accepts integer ID only
		$descendants = get_term_children( (int) $term, $taxonomy );
		if ( $descendants && has_term( $descendants, $taxonomy, $_post ) )
			return true;
	}
	return false;
}
function post_is_in_taxonomy_slug($slug, $taxonomy){
	global $post;
	$post_id = ( isset($post->ID) ) ? $post->ID : '';
	if ( has_term( $slug, $taxonomy, $post_id ) || post_is_in_descendant_taxonomy( get_term_by('slug',$slug,$taxonomy), $taxonomy, $post_id ) ){
		return true;
	} else {
		return false;
	}
}
endif; //function_exists 'post_is_in_descendant_taxonomy'

?>