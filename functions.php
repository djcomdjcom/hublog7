<?php
/**
 * hublog7/functions.php
 */

class Theme_Settings {
  var $r;

  function __construct( $args = '' ) {
    $defaults = array();
    $r = wp_parse_args( $args, $defaults );
    $this->r = $r;

    add_action( 'after_setup_theme', array( $this, 'setup_theme_supports' ) );
    add_action( 'after_setup_theme', array( $this, 'setup_nav_menu' ) );
    add_action( 'widgets_init', array( $this, 'hublog_widgets_init_sidebar' ), 5 );
    add_action( 'widgets_init', array( $this, 'hublog_widgets_init_footer' ), 9 );
    add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_scripts_styles' ) );

    if ( is_admin() ) {
      //			add_action('admin_head', array($this, 'wp_admin_favicon') );
    } else {
      add_action( 'get_header', array( $this, 'set_template_env' ) );
      add_action( 'body_class', array( $this, 'body_class_add_parent_term' ), 10, 2 );
    }
  }

  function set_template_env() {
    add_filter( 'looppart', array( & $this, 'get_post_is_in' ), 5 );
  }

  function get_post_is_in( $partname ) {

    global $post;
    if ( is_a( $post, 'WP_Post' ) ) {

		
      if ( empty( $output ) ) {
        return $partname;
      } else {
        return $output;
      }
    }
  }

  function get_page_type() {
    if ( is_home() ) {
      $output = 'home';
    } elseif ( is_front_page() ) {
      $output = 'home';
    } elseif ( is_category() ) {
      $output = 'category';
    } elseif ( is_tag() ) {
      $output = 'tag';
    } elseif ( is_archive() ) {
      $output = 'archive';
    } else {
      $output = get_post_type();
    }
    return $output;
  }


  function setup_theme_supports() {
    add_editor_style( 'style-editor' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'custom-background' );
    add_theme_support( 'post-formats' , array('post') );



    //カスタムフッターロゴ
    function my_custom_footer_logo_setup() {
      add_theme_support( 'custom-footer-logo', array(
        'default-image' => get_stylesheet_directory_uri() . '/images/footerlogo@2x.webp',
        'width' => 300,
        'height' => 100,
        'flex-height' => true,
        'header-text' => false,
      ) );
    }
    add_action( 'after_setup_theme', 'my_custom_footer_logo_setup' );

    function my_customizer_footer_logo( $wp_customize ) {
      // セクションの追加
      $wp_customize->add_section( 'footer_logo_section', array(
        'title' => __( 'Footer Logo', 'mytheme' ),
        'priority' => 30,
      ) );

      // フッターロゴの設定
      $wp_customize->add_setting( 'footer_logo', array(
        'default' => get_stylesheet_directory_uri() . '/images/footerlogo@2x.webp',
        'transport' => 'refresh',
      ) );

      // コントロールの追加（ロゴ画像）
      $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'footer_logo', array(
        'label' => __( 'Upload Footer Logo', 'mytheme' ),
        'section' => 'footer_logo_section',
        'settings' => 'footer_logo',
      ) ) );
    }
    add_action( 'customize_register', 'my_customizer_footer_logo' );

  }


  function enqueue_scripts_styles() {
    global $wp_styles;

    $child_theme = wp_get_theme(); // 子テーマ
    $parent_theme = wp_get_theme( get_template() ); // 親テーマ

    wp_enqueue_style( 'style-common', get_template_directory_uri() . '/common.css?' . $parent_theme->get( 'Version' ) );
    wp_enqueue_style( 'style', get_stylesheet_directory_uri() . '/style.min.css?' . $child_theme->get( 'Version' ) );

    wp_enqueue_style( 'for-ie', get_template_directory_uri() . '/css/ie.css', array( 'hublog-style' ) );
    $wp_styles->add_data( 'for-ie', 'conditional', 'lt IE 9' );

    $print_css = '/print.css';
    if ( file_exists( get_stylesheet_directory() . $print_css ) ) {
      wp_enqueue_style( 'hublog-style-print', get_stylesheet_directory_uri() . $print_css, array( 'hublog-style' ), false, 'print' );
    }

    //  jQuery を確実に読み込む
    wp_enqueue_script( 'jquery' );

    // jQuery に依存するスクリプトを追加（例）
    //    wp_enqueue_script('custom-script', get_template_directory_uri() . '/js/custom.js', array('jquery'), null, true);
  }


  function setup_nav_menu() {
    register_nav_menu( 'primary', __( 'Global nav' ) );
    register_nav_menu( 'contact-link', __( 'Contact-Link' ) );
    register_nav_menu( 'mobile-nav', __( 'mobile-nav' ) );
  }

  function hublog_widgets_init_sidebar() {
    //サイドバー用
    $this->register_sidebar( array(
      'name' => __( 'Sidebar' ),
      'id' => 'sidebar-widget-area-1',
    ) );
    foreach ( ( array )apply_filters( 'additional_sidebars', '' ) as $sidebar_slug ) {
      switch ( esc_attr( $sidebar_slug ) ) {
//        case 'rent':
//          $this->register_sidebar( array(
//            'name' => __( 'Sidebar' ) . ':' . __( '賃貸' ),
//            'id' => 'sidebar-widget-area-' . $sidebar_slug,
//          ) );
//          break;
//        case 'sell':
//          $this->register_sidebar( array(
//            'name' => __( 'Sidebar' ) . ':' . __( '売買' ),
//            'id' => 'sidebar-widget-area-' . $sidebar_slug,
//          ) );
//          break;
//        case 'blog':
//          $this->register_sidebar( array(
//            'name' => __( 'Sidebar' ) . ':' . __( 'ブログ用' ),
//            'id' => 'sidebar-widget-area-' . $sidebar_slug,
//          ) );
//          break;
      }
    }
  }

  function hublog_widgets_init_footer() {
    //フッター部用
    $this->register_sidebar( array(
      'name' => __( 'Footer 1' ),
      'id' => 'footer-widget-area-1',
      'description' => __( 'Three columons.' ),
    ) );
    $this->register_sidebar( array(
      'name' => __( 'Footer 2' ),
      'id' => 'footer-widget-area-2',
      'description' => __( 'Bottom of page.' ),
    ) );
  }

  function register_sidebar( $args = '' ) {
    $defaults = array(
      'id' => '',
      'name' => '',
      'description' => '',
      'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
      'after_widget' => '</li>',
      'before_title' => '<span class="widget-title">',
      'after_title' => '</span>',
    );
    $r = wp_parse_args( $args, $defaults );
    register_sidebar( $r );
  }

  function body_class_add_parent_term( $classes, $class ) {
    if ( is_category() ) {
      global $cat;
      $current_cat = get_category( $cat );
      if ( $current_cat->category_parent > 0 ) {
        $p_cat = get_category( $current_cat->category_parent );
        $classes[] = 'category-parent-' . sanitize_html_class( $p_cat->slug, $p_cat->term_id );
        $classes[] = 'category-parent-' . $p_cat->term_id;
      }
    } elseif ( is_tax() ) {
      global $wp_query;
      $term = $wp_query->get_queried_object();
      if ( $term->parent > 0 ) {
        $current_term = get_term_by( 'id', $term->parent, $term->taxonomy );
        $classes[] = 'term-parent-' . sanitize_html_class( $current_term->slug, $current_term->term_id );
        $classes[] = 'term-parent-' . $current_term->term_id;
      }
    }
    return array_unique( $classes );
  }

} // end Class Theme_Settings
$hublog6 = new Theme_Settings();

/* テーマ組み込みプラグインの読み込み */
$inc_dirs = array();
if ( get_stylesheet_directory() != get_template_directory() ) {
  $inc_dirs[] = get_stylesheet_directory() . '/inc';
}
$inc_dirs[] = get_template_directory() . '/inc';
foreach ( $inc_dirs as $modules_dir ) {
  if ( is_dir( $modules_dir ) && $dh = opendir( $modules_dir ) ) {
    while ( ( $module = readdir( $dh ) ) !== false ) {
      if ( substr( $module, -4 ) == '.php' && $module[ 0 ] != '_' ) {
        include_once $modules_dir . '/' . $module;
      }
    }
  }
}

//メディア追加の際、「この投稿へのアップロード」をデフォルトに設定する
function media_uploader_default_view() {
  echo '<script type="text/javascript">jQuery(function( $ ){ ';
  echo 'wp.media.view.Modal.prototype.on( \'ready\', function( ){ $( \'select.attachment-filters\' ).find( \'[value="uploaded"]\').attr( \'selected\', true ).parent().trigger(\'change\'); });';
  echo '});</script>' . "\n";
}
add_action( 'admin_footer-post-new.php', 'media_uploader_default_view' );
add_action( 'admin_footer-post.php', 'media_uploader_default_view' );


// bodyタグにページスラッグを追加 
function pagename_class( $classes = '' ) {
  if ( is_page() ) {
    $page = get_post( get_the_ID() );
    $classes[] = 'page-' . $page->post_name;
    if ( $page->post_parent ) {
      $classes[] = 'page-' . get_page_uri( $page->post_parent ) . '-child';
    }
  }
  return $classes;
}
add_filter( 'body_class', 'pagename_class' );


// 管理画面にフィールドを出力
function create_add_css() {
  $keyname = 'custom_css';
  global $post;
  $get_value = get_post_meta( $post->ID, $keyname, true );
  wp_nonce_field( 'action_' . $keyname, 'nonce_' . $keyname );
  echo '<textarea name="' . $keyname . '" cols="100" rows="4" style="width:100%">' . $get_value . '</textarea>';
}

// カスタムフィールドの保存
add_action( 'save_post', 'save_custom_css' );

function save_custom_css( $post_id ) {
  $keyname = 'custom_css';
  if ( isset( $_POST[ 'nonce_' . $keyname ] ) ) {
    if ( check_admin_referer( 'action_' . $keyname, 'nonce_' . $keyname ) ) {
      if ( isset( $_POST[ $keyname ] ) ) {
        update_post_meta( $post_id, $keyname, $_POST[ $keyname ] );
      } else {
        delete_post_meta( $post_id, $keyname, get_post_meta( $post_id, $keyname, true ) );
      }
    }
  }
}


//ADMIN CSS追加
function admin_files() {
  echo '
<link rel="stylesheet" href="' . get_bloginfo( 'template_directory' ) . '/wp-admin.css">
<link rel="stylesheet" href="' . get_bloginfo( 'stylesheet_directory' ) . '/wp-admin.css">';
}
//contactform7トラッキング
add_action( 'wp_footer', 'mycustom_wp_footer' );

function mycustom_wp_footer() {
  ?>
<script type="text/javascript">
document.addEventListener( 'wpcf7mailsent', function( event ) {
    ga( 'send', 'event', 'Contact Form', 'submit' );
}, false );
</script>
<?php
}
add_action( 'admin_head', 'admin_files' );


// 呼び出しの指定
add_shortcode( 'qrcode', 'get_qrcode_tag' );

//Analyticsリンク追加
function analytics_in_admin_bar() {
  global $wp_admin_bar;
  $wp_admin_bar->add_menu( array(
    'id' => 'dashboard_menu-hublog_setting',
    'title' => __( 'hublog_setting' ),
    'href' => home_url( '/hublog_setting/' ),
    'meta' => array(
      'target' => '_blank'
    ),
  ) );
}

function my_editor_style_setup() {
  add_theme_support( 'editor-styles' );
  add_editor_style( 'admin_editor_style.css' );
}
add_action( 'after_setup_theme', 'my_editor_style_setup' );


add_action( 'wp_before_admin_bar_render', 'analytics_in_admin_bar' );
add_theme_support( 'post-thumbnails' );
//本体ギャラリーCSS停止
//add_filter( 'use_default_gallery_style', '__return_false' );

//yarppのCSSを読み込まない

add_action( 'wp_print_styles', 'lm_dequeue_header_styles' );

function lm_dequeue_header_styles() {
  wp_dequeue_style( 'yarppWidgetCss' );
}

add_action( 'get_footer', 'lm_dequeue_footer_styles' );

function lm_dequeue_footer_styles() {
  wp_dequeue_style( 'yarppRelatedCss' );
}
?>
