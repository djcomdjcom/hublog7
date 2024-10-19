<?php
/**
 * page.php
 * hublog6
 * 20230202
 */
get_header();
?>
<?php the_post(); ?>
<article id="post-<?php the_ID(); ?>" <?php post_class('hentry'); ?>>
  <header class="entry-header wrapper">
    <?php
    if ( has_post_thumbnail() ):
      $args = array(
        'alt' => get_the_title(),
        'title' => get_the_title(),
      );
    $image = get_the_post_thumbnail( $page->ID, 'header-title', $args );
    ?>
    <h1 class="entry-title-image"><?php echo $image; ?></h1>
    <?php else: ?>
    <h1 class="entry-title"><span>
      <?php the_title(); ?>
      </span></h1>
    <?php endif; ?>
  </header>
  <div class="entry-content wrapper">
    <div class="clearfix flexbox" id="staff-inbox">
      <?php include('loop-authors.php'); ?>
      <?php //the_content(); ?>
    </div>
    <?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'twentytwelve' ), 'after' => '</div>' ) ); ?>
  </div>
  <!-- .entry-content -->
  
  <?php get_template_part('releated-posts'); ?>
  <footer class="entry-meta">
    <?php edit_post_link( __( 'Edit', 'twentytwelve' ), '<span class="edit-link">', '</span>' ); ?>
  </footer>
  <!-- .entry-meta --> 
</article>
<!-- #post -->

<?php //get_sidebar(); ?>
<?php /* ※サイドバーが必要な場合は、loop-page 内で呼び出す */ ?>
<?php get_footer(); ?>
<?php if ( current_user_can( 'administrator' ) ) :?>
<p class="edit_theme"><a target="_blank" href="/wp-admin/theme-editor.php?file=loop-authors.php&theme＝<?php echo get_stylesheet('name'); ?>" title="/wp-admin/theme-editor.php?file=loop-authors.php&theme=<?php echo get_stylesheet('name'); ?>"> スタッフ紹介を編集 </a></p>
<?php endif;?>
