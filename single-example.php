<?php
/**
 * single-example.php
 * hublog7
 * 20260220
 */

get_header();

?>
<?php the_post(); ?>
<article id="post-<?php the_ID(); ?>" <?php post_class('hentry'); ?>>
    <header class="wrapper mx-auto entry-header">
        <h1 class="entry-title mt-0 pt-4 pb-3 py-md-5"><span>
            <?php the_title(); ?>
            </span></h1>
        <span class="icons">
        <?php
        // 投稿に割り当てられたカテゴリーを取得します。必要に応じて 'category' を他のタクソノミーに置き換えてください。
        $terms = get_the_terms( get_the_ID(), 'ex_cat' );

        if ( !empty( $terms ) && !is_wp_error( $terms ) ) {
            foreach ( $terms as $term ) {
                echo '<span class="icon icon-' . esc_attr( $term->slug ) . '">' . esc_html( $term->name ) . '</span>';
            }
        }
        ?>
        </span> </header>
    <div class="entry-content wrapper mb-5">
        <?php  get_template_part('addcontent', 'example'); ?>
        <?php wp_reset_query(); ?>
        <?php
        $post_id = get_the_ID();

        /**
         * SCF 両対応取得
         */
        $voice_fields = SCF::get( 'example_inc_voice', $post_id );

        if ( empty( $voice_fields ) ) {
            $voice_fields = SCF::get( 'example-inc_voice', $post_id );
        }

        if ( !empty( $voice_fields ) ):
            ?>
        <div class="row justify-content-end pt-5">
            <div class="col-md-8 border mx-3 mx-md-0">
                <p class="my-3">この事例のお客様の声</p>
                <?php foreach ($voice_fields as $field) : ?>
                <?php if ($field) : ?>
                <a class="d-flex" href="<?php echo esc_url(get_permalink($field)); ?>">
                <figure class="w100 col-4 col-md-2"> <?php echo get_the_post_thumbnail($field, 'thumbnail'); ?> </figure>
                <p class="flex-grow-1 pl-4 pl-md-5"> <?php echo esc_html(get_the_title($field)); ?> </p>
                </a>
                <?php endif; ?>
                <?php endforeach; ?>
            </div>
        </div>
        <?php endif; ?>
    </div>
    <!-- .entry-content -->
    
    <?php get_template_part('include', 'example');//施工事例集 ?>
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
