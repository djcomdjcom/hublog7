<?php 
/**
Plugin Name: the_profile
Description: プロフィール表示用に、アバター、氏名、自己紹介(経歴)を表示する。
Version: 0.0.3
Author: Yoshitaka KATO
Author URI: http://www.djcom.jp/
since: 2009-05-20
 */


class UserProfile{
		var $userdata = array();
		var $extended_profile_list = array();
		
		function __construct(){
			$this->set_userdata();
			$this->set_profile_details();
			add_filter('user_contactmethods',	array($this,'set_user_contactmethods') );
			//add_filter('show_password_fields',	array($this,'pre_password_fields') );//開発途中
			add_shortcode('sc_the_profile', 	array($this,'sc_the_profile_func') );
		}
		
		function sc_the_profile_func( $atts, $content = null ) {
			extract( shortcode_atts( array(
							'user_login' => '',
							'separator' => ', ',
							), $atts ));
			if ( $user_login != "" && function_exists('the_profile') ) {
				return the_profile("user_login=$user_login");
			}
		}
		
		function set_userdata(){
			$this->userdata = get_userdata(get_query_var('author'));
		}
		
		function get_userphoto($user, $before = '', $after = '', $attributes = array(), $default_src = ''){
			if(is_numeric($user)) {
				$userid = intval($user);
			} elseif(is_object($user) && @$user->ID) {
				$userid = $user->ID;
			} elseif(is_string($user)) {
				$user = get_userdatabylogin($user);
				if(!$user) { return; }
				$userid = $user->ID;
			} else {
				return;
			}
			return userphoto__get_userphoto($userid, USERPHOTO_FULL_SIZE, $before, $after, $attributes, $default_src);
		}
		
		/**
		 * 連絡先の追加
		 */
		function set_profile_details(){
			$this->extended_profile_list = array(
				'credential'	=> '資格',
				'from' 		=> '出身地',
				'family' 	=> '家族',
				'favor' 	=> '趣味・特技',
			);
		}
		function set_user_contactmethods($user_contactmethods) {
			$add_contactmethods_before = array(
				'kana' 		=> 'ふりがな',
				'romaji' 		=> 'ローマ字',
				'post'		=> '役職',
				'division' 	=> '担当・部門',
//				'twitter' => __('Twitter'),
			);
			$user_contactmethods = array();
			$add_contactmethods_after = $this->extended_profile_list;
			$user_contactmethods = array_merge($add_contactmethods_before, $user_contactmethods, $add_contactmethods_after);
			return $user_contactmethods;
		}
		
		function pre_password_fields($true = true, $profileuser = ''){
			/** //開発途中//
			 *「プロフィール情報」と「新しいパスワード」の間にプロフィール項目を追加する。
			 */ 
			$add_profile_details = $this->extended_profile_list;
			foreach ($add_profile_details as $name => $desc) : ?>
            
<tr>
	<th><label for="<?php echo $name; ?>"><?php echo apply_filters('user_'.$name.'_label', $desc); ?></label></th>
	<td><input type="text" name="<?php echo $name; ?>" id="<?php echo $name; ?>" value="<?php echo esc_attr($profileuser->$name) ?>" class="regular-text" /></td>
</tr>
<?php		endforeach; 
			
			return $profileuser;
		}
}

global $userprofile;
$userprofile = new UserProfile();


function the_profile($args = '') {
	global $userprofile;

	$defaults = array(
		'user_login' => '',
		'echo' => true,
		'class' => 'profile',
	);
	$r = wp_parse_args( $args, $defaults );
	extract($r, EXTR_SKIP);

	if ($user_login) {
		$author = get_userdatabylogin($user_login);
		$author_id = $author->ID;
	} else {
		$author = get_userdata(get_query_var('author'));
		$author_id = $author->ID;
	}
	if ( empty($author_id) ) return false;
	
	if ( $userprofile->extended_profile_list ) {
		foreach ( $userprofile->extended_profile_list as $key => $value ) {
			$extended_profile = $author->$key;
			if ( !empty($extended_profile) ){
				$eup .= sprintf("	<tr><th>%s</th><td>%s</td></tr>\n", $value, $extended_profile);
			}
		}
	}
	if ( function_exists('userphoto__get_userphoto') && userphoto_exists($author_id) ){
		$userphoto = userphoto__get_userphoto($author_id,1,'','','','');;
	} else {
		$userphoto = get_avatar($author_id);
	}
	
	$post_count = get_usernumposts($author_id);
	if ( $post_count && !is_author() ) {
		$bloglink = sprintf("	<a target=\"_blank\" class=\"%s\" href=\"%s\">%s の記事</a><br />\n", $author->user_nicename, get_author_posts_url($author_id), $author->last_name);
	} else {
		$bloglink = '';
	}
	$last_name = $author->last_name;
	$first_name = $author->first_name;
	$kana = ($author->kana) ? '&nbsp;<span class="kana">' . $author->kana . '</span>' . "\n" : '';
	$description = wpautop($author->user_description);

	$post = ($author->post) ? '<span class="user_post">' . $author->post . '</span>' . "　" : '';
	$division = ($author->division) ? '<span class="user_division">' . $author->division . '</span>' . "　" : '';

	$class = $author->user_login;

//出力コード：ここから
$output = <<<EOF
 	<div class="user-thumbnail">
	{$userphoto}
	<span class="fullname cleartype">{$last_name}&nbsp;{$first_name}</span><span class="kana">{$kana}</span>
	<a href="#box-{$class}" class="popup_btn">
	<span class="hoverbox clearfix">
	<span class="fullname">{$last_name}&nbsp;{$first_name}</span>
	<span class="to_prof">プロフィール<span>
	</span>
	</a>
	</div>
	<div id="box-{$class}" class="{$class} clearfix userbox popup">



	<div class="user_info clearfix popup_inner">
	{$userphoto}

		<div class="metabox">
				<div class="inbox">
					
					<div class="user_name">	
						<div class="inner">
							<span class="post_division">
							{$post}{$division}
							</span>
							<em class="fullname cleartype">{$last_name}&nbsp;{$first_name}</em>{$kana}
						</div><!--inbox-->
					</div><!--user_name-->
					
					<div class="extended_profile">
					<table>
					<tbody>
						{$eup}
					</tbody>
					</table>
				</div><!--extended_profile-->

			<div class="user_description">
				{$description}
			</div><!--user_description-->
				{$bloglink}

			</div><!--inbox-->
		</div><!--metabox-->
<a href="#close_btn" class="close_btn">閉じる</a>
	</div><!--user_info-->
</div><!--userbox-->

EOF;
//出力コード：ここまで

	if ($echo) {
		echo $output;
	} else {
		return  $output;
	}
}
?>
