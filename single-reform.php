<?php
/*
 * single-reform.php
 * hublog6
 * 20230202
 */

get_header();

?>
<?php the_post(); ?>
<article id="post-<?php the_ID(); ?>" <?php post_class('hentry'); ?>>
  <header class="wrapper mx-fit entry-header">
    <h1 class="entry-title mt-0 pt-4 pb-3 py-md-5"><span>
      <?php the_title(); ?>
      </span></h1>
    <?php if (post_custom('feature')) : ?>
    <span class="icons">
    <?php get_template_part('icon-features'); ?>
    </span>
    <?php endif ?>
  </header>
  <div class="entry-content wrapper">
    <?php get_template_part('addcontent_before', apply_filters('hublog_addcontent_before','') ); ?>
    <?php get_template_part('addcontent', 'beforeafter'); ?>
    <?php the_content(); ?>
    <?php wp_reset_query(); ?>
  </div>
  <!-- .entry-content -->
  
  <?php get_template_part('hublog-inquiry',''); //問い合わせフック ?>
  <footer>
    <div class="entry-utility wrapper">
      <?php edit_post_link( __( 'Edit', 'hublog' ), '<span class="edit-link">', '</span>' ); ?>
      <?php
      wp_link_pages( array(
        'before' => '<div class="page-link">' . __( 'Pages:' ),
        'after' => '</div>',
        'link_before' => '<span>',
        'link_after' => '</span>',
      ) );
      ?>
      <div class="entry-meta">
        <?php

        $terms = get_the_terms( $post->ID, 'reform_cat' );
        print( '<p>Posted in：' );

        if ( empty( $terms ) ) {
          echo '<a href=/reform">リフォーム事例一覧</a>';
        } else {
          foreach ( $terms as $term ) {
            echo '<a href="' . get_term_link( $term->slug, 'reform_cat' ) . '">' . $term->name . '</a>';
          }

        };
        print( '</p>' );
        ?>
      </div>
      <!-- .entry-meta -->
      
      <div class="entry-meta updated author"> <span class="date updated">
        <?php the_time('Y/n/j') ?>
        </span> <span class="author vcard">投稿者：<span class="fn">
        <?php the_author(); ?>
        </span></span> </div>
      <!-- .entry-meta --> 
      
    </div>
    <!-- .entry-utility --> 
    
  </footer>
</article>
<!-- #post-## -->

<?php
/**
 */
get_footer();
?>
