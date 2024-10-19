<?php
// 投稿に割り当てられたカテゴリーを取得します。
$terms = get_the_terms( get_the_ID(), 'ex_cat' );
if ( !empty( $terms ) && !is_wp_error( $terms ) ) {
    foreach ( $terms as $term ) {
        echo '<span class="icon icon-' . esc_attr( $term->slug ) . '">' . esc_html( $term->name ) . '</span>';
    }
}
?>
