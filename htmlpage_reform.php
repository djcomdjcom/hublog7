<?php
/**
template name: ★リフォーム
 * @テーマ名	hublog7
 * @更新日付	2024.10.04
 *
 */
get_header();
?>
<?php the_post(); ?>
<article id="post-<?php the_ID(); ?>" <?php post_class('hentry'); ?>>
  <header class="wrapper">
    <h1 class="entry-title"><span>
      <?php the_title(); ?>
      </span></h1>
  </header>
  <article class="entry-content wrapper">
	  

<div class="pagetab pagetab-main">
  <?php wp_nav_menu(array('theme_location'=>'reform-nav', 'fallback_cb'=>'nothing_to_do')); ?>
</div>
	  
	  
    <?php the_content(); ?>
    <?php if ( current_user_can( 'administrator' ) ) :?>
    <p class="edit_theme"><a target="_blank" href="/wp-admin/theme-editor.php?file=html%2F<?php echo $slug_name = $post->post_name; ?>.php&theme=<?php echo get_stylesheet('name'); ?>" title="/wp-admin/theme-editor.php?file=html%2F<?php echo $slug_name = $post->post_name; ?>.php&theme=<?php echo get_stylesheet('name'); ?>"> このincludeテーマを編集 </a></p>
    <?php endif;?>
    <?php //インクルードセクション
    $the_page = get_page( get_the_ID() );
    $include_html_dir = STYLESHEETPATH . '/html/';
    $include_html_file = $include_html_dir . $the_page->post_name;
    if ( file_exists( $include_html_file . '.php' ) ) {
      include $include_html_file . '.php';
    } elseif ( file_exists( $include_html_file . '.html' ) ) {
      include $include_html_file . '.html';
    }
    ?>
    <?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'twentyten' ), 'after' => '</div>' ) ); ?>
  </article>
  <!-- .entry-content -->
  

  <?php get_template_part('releated-posts');// posts_in_page ?>
  
  <!--商品ページ共通-->
  <?php
  $gettemplate01 = ( post_custom( 'gettempale01' ) );
  ?>
  <?php get_template_part($gettemplate01); ?>
  <?php get_template_part('hublog-inquiry',''); //問い合わせフック ?>
  <footer class="entry-utility page wrapper">
    <div class="entry-meta updated author"> <span class="date updated">
      <?php the_time('Y/n/j') ?>
      </span> <span class="author vcard">投稿者：<span class="fn">
      <?php the_author(); ?>
      </span></span> </div>
    <!--entry-meta-->
    <?php edit_post_link( __( 'Edit', 'twentytwelve' ), '<span class="edit-link">', '</span>' ); ?>
  </footer>
  <!-- .entry-utility --> 
</article>
<!--.hentry-->
<script>
document.addEventListener('scroll', function() {
    var pagetab = document.querySelector('.pagetab.pagetab-main');
    var scrollY = window.scrollY || window.pageYOffset;
    
    if (scrollY >= 62) {
        pagetab.classList.add('fixed');
    } else {
        pagetab.classList.remove('fixed');
    }
});
</script>
<?php get_footer(); ?>
