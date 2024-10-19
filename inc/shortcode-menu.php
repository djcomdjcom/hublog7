<?php
/*
 * WordPress3.0向け、メニュー　ショートコードで読み込み
 * shortcode-menu.php

 */

function print_menu_shortcode($atts, $content = null) {
    extract(shortcode_atts(array( 'name' => null, ), $atts));
    return wp_nav_menu( array( 'menu' => $name, 'echo' => false ) );
}
add_shortcode('menu', 'print_menu_shortcode');