<?php 
/*
Plugin Name: Advanced Branch
Version: 0.2.0
Description: 標準でない条件分岐用テンプレートタグを追加します。
Plugin URI: http://www.djcom.jp/
Author: KATO Yoshitaka
Author URI: 

Update: 
 0.0.2 : 2010.07.01 : is_new 追加
 0.1.0 : 2016.05.14 : is_duringの仕様を変更。戻り値1=期間中、0=期限終了、マイナス値=期限前の秒数
 0.2.0 : 2016.05.20 : is_duringを元に戻して最適化。0.1.0で追加したものは「is_during3」に変更。
 */

if (!defined('WHATSNEW_TTL'))
	  define('WHATSNEW_TTL', 60*60*24*14 ); 

/*
 * is_during( 開始日時, 終了日時 )
 *  開始日時から終了日時の間だけ、Trueを返す。 
 */
if (!function_exists('is_during')) :
function is_during( $open = 0, $close = '2038-01-19 03:14:07' ) {
	$now = current_time('timestamp');
	$open_time  = strtotime( esc_attr($open) );
	$close_time = strtotime( esc_attr($close) );

	if ( $open_time <= $now && $now < $close_time ) {
		return true;
	} else {
		return false;
	}
}
endif; //!function_exists('is_during')

/*
 * is_during3( 開始日時, 終了日時 )
 *  開始日時前 = マイナス値(<0)
 *  期間中　　 = 0
 *  終了日時後 = プラス値(>0)
*/
if (!function_exists('is_during3')) :
function is_during3( $open = 0, $close = '2038-01-19 03:14:07' ) {
	$now = current_time('timestamp');
	$open_time  = strtotime( esc_attr($open) );
	$close_time = strtotime( esc_attr($close) );

	if ( $open_time <= $now ) {
		if ( $now < $close_time ) {
			return 0;
		} else {
			return $now - $close_time;
		}
	} else {
		return $now - $open_time;
	}
}
endif; //!function_exists('is_during')

if ( !function_exists('is_new') ) :
function is_new( $ttl = WHATSNEW_TTL ){
	global $post;
	$ttl = (int)$ttl;
	$now = current_time('timestamp');

	$the_post_date = get_the_time('U');

	if ( $now < ($the_post_date + $ttl) ) {
		return true;
	} else {
		return false;
	}
}
endif; //!function_exists('is_new')
