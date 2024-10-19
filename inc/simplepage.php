<?php
/*
plugin name: Simple Page
*/

if ( !defined('SIMPLEPAGE_QUERY_VER') ):
define('SIMPLEPAGE_QUERY_VER', 'simple');
class SimplePage{
	private $simplepage = false;
		
	function __construct(){
		if ( !is_admin() ){
			add_action('parse_request'      , array(&$this,'add_query_var'), 10 );
			add_action('parse_request'      , array(&$this,'parse_request'), 11 );
			add_action('template_redirect'  , array(&$this,'template_redirect'), 10 );
		}
	}

	function add_query_var($wp_query){
		$wp_query->add_query_var(SIMPLEPAGE_QUERY_VER);
	}
	
	function parse_request($wp_query){
		if ( !isset($_GET[SIMPLEPAGE_QUERY_VER]) ) { return; }
		$simplepage = (int)$_GET[SIMPLEPAGE_QUERY_VER];
		if ( $simplepage > 0 ){
			$this->simplepage = true;
		}
	}
	
	function template_redirect(){
		if ( !is_page() ){ return; }
		if ( $this->simplepage ){ 

?><html <?php language_attributes(); ?>>
<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<?php $simple_css = (file_exists(get_stylesheet_directory() . '/simple.css')) ? get_stylesheet_directory_uri() . '/simple.css' : get_template_directory_uri() . '/simple.css';?>
<link rel="stylesheet" href="<?php echo $simple_css; ?>" type="text/css" media="all" />


<title></title>
<meta name='robots' content='noindex' />
</head>
<body <?php body_class('simple-page'); ?>>
<?php the_post(); ?>
<?php the_content(); ?>
</body>
</html>
<?php
			exit;
		}//endif
	}
}
new SimplePage;
endif;

?>