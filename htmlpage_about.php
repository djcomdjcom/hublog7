<?php
/**
template name: ☆ABOUT子ページ 1カラム（htmlinclude）
 */
get_header();
?>
    <?php the_post(); ?>
    <article class="entry-content wrapper">
      <?php if ( post_custom('headerimg') ) : ?>
      <h1 class="entry-title title-image"> <span>
        <?php the_title(); ?>
        </span> <?php echo post_custom('headerimg') ; ?> </h1>
      <?php else : ?>
      <h1 class="entry-title"><span>
        <?php the_title(); ?>
        </span></h1>
      <?php endif; ?>
      <?php the_content(); ?>
      <?php if( post_custom('about-enkaku')) :?>
      <h2>沿革</h2>
      <section id="enkaku">
        <div class="slide-table"> <?php echo wpautop( post_custom ('about-enkaku')) ;?> </div>
      </section>
      <!--enkaku-->
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
    <?php wp_nav_menu( array('theme_location'=>'about-nav', 'fallback_cb'=>'nothing_to_do') ); ?>
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
    

<?php get_footer(); ?>
