<?php
/**
 * single-voice.php
 * hublog7
 * 20240929
 */

get_header();

?>
<?php the_post(); ?>
<article id="post-<?php the_ID(); ?>" <?php post_class('hentry maxw-1200 mx-auto'); ?>>
  <header id="voice-header" class="wrapper entry-header mt-0 pt-4 mt-md-5 pb-3 py-md-4 d-sm-flex justify-content-between">
    <?php if ( post_custom('voice-photo') ) :?>
    <figure class="px-4 voice-photo w100 align-self-center">
      <?php
      $image = SCF::get( 'voice-photo' );
      echo wp_get_attachment_image( $image, 'thumbnail' );
      ?>
    </figure>
    <?php endif;?>
    <?php if(post_custom('catchcopy')) :?>
    <div class="flex-grow-1 voice-post_title">
      <h1 class="entry-title mincho my-0"> <?php echo nl2br ( post_custom('catchcopy') ); ?> </h1>
      <p class="px-3">
        <?php the_title(); ?>
      </p>
    </div>
    <?php else :?>
    <h1 class="entry-title flex-grow-1 voice-post_title mincho">
      <?php the_title(); ?>
    </h1>
    <?php endif;?>
  </header>
  <div class="entry-content wrapper py-3 py-sm-5 px-sm-4">
    <?php the_content() ;?>
  </div>
  <!-- .entry-content -->
  
  <div id="voice-content" class="mincho wrapper">
    <?php if (post_custom('voice-image-scanned')) : ?>
    <div class="voice-scanned pb-5 mb-0 mb-md-5"> <a href="<?php echo post_custom('voice-scanned-pdf'); ?>" target="_blank"> <img src="<?php echo post_custom('voice-image-scanned'); ?>" /> </a> </div>
    <!--voice-scanned-->
    <?php endif  ?>
    <?php
    // Smart Custom Fields でフィールドを取得
    $voice_fields = SCF::get( 'voice_set' ); // グループ名が 'voice_set'

    if ( !empty( $voice_fields ) ) {
      $counter = 1; // クラス名に使用するカウンター
      foreach ( $voice_fields as $voice_field ) {
        $voice_title = esc_html( $voice_field[ 'voice-title' ] ); // タイトルフィールド
        $voice_text = wp_kses_post( $voice_field[ 'voice' ] ); // テキストフィールド
        $voice_image = wp_get_attachment_image_src( $voice_field[ 'voice-image' ], 'full' ); // 画像URLを取得

        // 各フィールドが空でない場合にのみ表示
        if ( !empty( $voice_title ) && !empty( $voice_text ) && !empty( $voice_image ) ) {
          echo '<div class="row justify-content-between voice_set pb-5 mb-0 mb-md-5 voice_set' . sprintf( "%02d", $counter ) . '">';
          echo '<div class="col-sm-7 text-cell">';
          echo '<h3 class="mincho mb-4 mb-md-5">' . $voice_title . '</h3>';
          echo '<div class="voice">' . $voice_text . '</div>';
          echo '</div>';

          // 画像が存在する場合のみリンクとイメージタグを表示
          if ( !empty( $voice_image[ 0 ] ) ) {
            echo '<figure class="w100 col-sm-5 mb-4">';
            echo '<a href="' . esc_url( $voice_image[ 0 ] ) . '" rel="lightbox">';
            echo '<img src="' . esc_url( $voice_image[ 0 ] ) . '" alt="' . esc_attr( $voice_title ) . '" />';
            echo '</a>';
            echo '</figure>';
          }
          echo '</div><!-- voice_set voice' . sprintf( "%02d", $counter ) . ' -->';

          $counter++; // カウンターをインクリメント
        }
      }
    }
    ?>
  </div>
  <!--voice-content-->
  
    <?php if(get_post_meta($post->ID, 'related_post',true)):?>
  <div class="container maxw-1000 mx-auto border px-3 mb-5">
    <p class="my-3">この記事を施工事例で見る</p>
    <?php
    $cf_sample = SCF::get( 'related_post' );
    foreach ( $cf_sample as $field ) {
      ?>
    <a class="d-flex" href="<?php echo get_permalink($field); ?>">
    <figure class="w100 col-4 col-md-2"> <?php echo get_the_post_thumbnail($field); ?> </figure>
    <p class="flex-grow-1 pl-4 pl-md-5"><?php echo get_post($field)->post_title; ?></p>
    </a>
    <?php } ?>
  </div>
    <?php else: ?>
    <?php endif; ?>
  <div class="pt-5">
    <?php get_template_part('hublog-inquiry',''); //問い合わせフック ?>
  </div>
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
      <div class="in_links mb-4 pt-3">
        <?php
        $categories = get_the_category();
        if ( $categories ) {
          echo '<div class="category-list d-inline-block"><span class="ttl d-inline-block"><small>Posted in：</small></span><ul class="m-0 p-0 d-inline-block">';
          foreach ( $categories as $category ) {
            echo '<li class="d-inline-block cat_' . $category->slug . '"><a href="' . get_category_link( $category->term_id ) . '">' . $category->name . '</a></li>';
          }
          echo '</ul></div>';
        }
        ?>
        <?php
        $posttags = get_the_tags();
        if ( $posttags ) {
          echo '<div class="tag-list d-inline-block"><ul class="m-0 ">';
          foreach ( $posttags as $tag ) {
            echo '<li class="d-inline-block"><a href="' . get_tag_link( $tag->term_id ) . '">#' . $tag->name . '</a></li>';
          }
          echo '</ul></div>';
        }
        ?>
      </div>
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
get_footer();
?>
