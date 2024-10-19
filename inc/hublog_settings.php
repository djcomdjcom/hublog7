<?php
/**
 * Hublog 管理ページ用ファイル
 */

if ( ! class_exists('HublogAdminPage') ) :
class HublogAdminPage{
	/* Define relative functions */
	var $valid_names = array();
	var $page_title;
	var $menu_title;
	var $access_level;
	var $option_key = 'hublog_settings';
	var $nonce_action = 'hublog_settings';
	
	function __construct($page_title, $menu_title, $access_level){
		$this->setvars($page_title, $menu_title, $access_level);
		add_action('admin_menu', array($this, 'my_plugin_menu'));
	}
	function setvars($page_title, $menu_title, $access_level){
		$this->page_title   = ($page_title)   ? esc_attr($page_title)   : 'ページタイトル';
		$this->menu_title   = ($menu_title)   ? esc_attr($menu_title)   : 'メニュータイトル';
		$this->access_level = ($access_level) ? esc_attr($access_level) : 'edit_themes';
	}
	function set_valid_names($args){
		//$v[name] = array(name, regexp)//
		$output = array();
		foreach ( $args as $value ){
			if ( is_array($value) ){
				$regexp = preg_match('#^/.*/$#',$value[1]) ? $value[1] : '';
				$vnames[esc_attr($value[0])] = array('name' => esc_attr($value[0]));
				$vnames[esc_attr($value[0])] = array('regexp' => $regexp);
			} else {
				$vnames[esc_attr($value)] = array('name' => esc_attr($value));
			}
		}
		$this->valid_names = $vnames;
		return $vnames;
	}
	function my_plugin_menu() {
		add_theme_page($this->page_title, $this->menu_title, $this->access_level, basename(__FILE__), array($this, 'my_plugin_options'));
	}
	
	function my_plugin_options(){
		//must check that the user has the required capability 
		if (!current_user_can($this->access_level)){
		  wp_die( __('You do not have sufficient permissions to access this page.') );
		}
		// variables for the field and option names 
		$this->set_valid_names(array(
							'blogname',
							'blogdescription',
							array('hublog_wpcf7_estate','/^\[.*\]$/'),
						));
		$data_field_name = 'hublog_wpcf7_estate';
		$opt_name = $data_field_name;



		?>
	
        <div class="wrap">
            <div class="icon32" id="icon-options-general"><br></div>
            <h2><?php echo $this->page_title; ?></h2>
			
			<?php //Save Section
                if ( isset($_REQUEST['_wpnonce']) && wp_verify_nonce($_REQUEST['_wpnonce'],$this->nonce_action) ){
					$c = 0;
					foreach ( $this->valid_names as $key => $value ){
						if ( isset($_POST[$key]) ){
							$opt_name = $key;
							$opt_val  = stripslashes_deep($_POST[$key]);
							if ( isset($value['regexp']) ){
								$valid = preg_match($value['regexp'], $opt_val) ? true : false;
							} else { 
								$valid = true;
							}
						}
						if ( $valid ){
							update_option( $opt_name, $opt_val );
							$c++;
						}
					}
					if ($c > 0) {
						?><div class="updated"><p><strong><?php _e('settings saved.'); ?></strong></p></div><?php
					}
                }
			?>
            
			<form name="form1" method="post" action="">
            	
                <div class="options-general" style="border:#ECECEC solid 1px; padding:0 1em 1em; margin:2em;">
                	<div class="icon32" id="icon-options-general"><br></div>
                    <h3>一般設定</h3>
                    <table>
                        <tbody>
                            <?php echo $this->input_tag("title=サイトのタイトル&name=blogname"); ?>
                            <?php echo $this->input_tag("title=キャッチフレーズ&name=blogdescription&size=75"); ?>
                        </tbody>
                    </table>
                </div>
                
                <div class="options-hublog" style="border:#ECECEC solid 1px; padding:0 1em 1em; margin:2em;">
                	<div class="icon32" id="icon-options-general"><br></div>
                    <h3>Hublog 独自設定</h3>
                        <table>
                            <tbody>
                                <?php echo $this->input_tag("title=物件問合せ用CF7&name=hublog_wpcf7_estate&comment=(ショートコード)"); ?>
                            </tbody>
                        </table>
                </div>
                
				<input type="hidden" name="action" value="update" />
            	<?php wp_nonce_field($this->nonce_action); ?>
				<p class="submit">
				<input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />
				</p>
            </form>
            
        </div>
        
	<?php
    } //endFunction my_plugin_options
	
	
	function input_tag($args=''){
		$defaults = array(
			'title' => '',
			'wrap_tag_before' => '<tr>',
			'wrap_tag_after' => '</tr>',
			'title_tag_before' => '<th nowrap="nowrap">',
			'title_tag_after' => '</th>',
			'content_tag_before' => '<td nowrap="nowrap">',
			'content_tag_after' => '</td>',
			'type' => 'text',
			'name' => '',
			'value' => '',
			'size' => '',
			'comment' => ''
		);
		$r = wp_parse_args( $args, $defaults );
		if ( empty($r['title']) ) { return; }
		
		$title = $r['title_tag_before'] . esc_attr($r['title']) . $r['title_tag_after'];
		$name = esc_attr($r['name']);
		$value = ( $r['value'] ) ? esc_attr($r['value']) : esc_attr(get_option($name));
		$size  = ( ctype_digit($r['size']) ) ? (int)$r['size'] : 55;
		
		if ( $r['type'] == 'text' ){
			$input_tag[0] = '<input type="text" ';
			$input_tag[1] = 'name="' . $name . '"';
			$input_tag[2] = 'value="' . $value . '"';
			$input_tag[8] = 'size="' . $size . '"';
			$input_tag[9] = '/>';
		} else {
			return;
		}
		$comment = '<br />' . $r['content_tag_before'] . join(' ',$input_tag) . esc_attr($r['comment']) . $r['content_tag_after'];
		
		$output = array();
		$output[] = $r['wrap_tag_before'];
		//$output[] =  $title_tag[0] . $title . '<br />(' . $name . ')' . $title_tag[9];
		$output[] =  $title;
		$output[] =  $comment;
		$output[] = $r['wrap_tag_after'];
		return join('', $output);
	}

}//end Class
global $sethublog;
$sethublog = new HublogAdminPage('Hublog 設定','Hublog 設定','edit_themes');
endif;
?>