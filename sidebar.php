<?php
/**
 * sidebar.php 
 */
?>


<?php
wp_reset_query();

$queried_object = get_queried_object();
$bukken_taxonomy = 'bukken';
if ( taxonomy_exists( $bukken_taxonomy ) ) {
	$term_rent_id = (int)get_term_by('slug','rent',$bukken_taxonomy)->term_id;
	$terms_rent = get_term_children( $term_rent_id, $bukken_taxonomy );
	if ( $term_rent_id > 0 ){
		if ( is_array($terms_rent) ){
			$terms_rent[] = $term_rent_id;
		} else {
			$terms_rent = array($terms_rent);
		}
	}
	
	$term_sell_id = (int)get_term_by('slug','sell',$bukken_taxonomy)->term_id;
	$terms_sell = get_term_children( $term_sell_id, $bukken_taxonomy );
	if ( $term_sell_id > 0 ){
		if ( is_array($terms_sell) ){
			$terms_sell[] = $term_sell_id;
		} else {
			$terms_sell = array($term_sell_id);
		}
	}
}

if ( !empty($queried_object->term_id) && !(is_home()||is_front_page()) ) {
	if ( in_array($queried_object->term_id,(array)$terms_rent) ){
		$widget_name = 'sidebar-widget-area-rent';
	} elseif ( in_array($queried_object->term_id,(array)$terms_sell)  ){
		$widget_name = 'sidebar-widget-area-sell';
	} else {
		$widget_name = 'sidebar-widget-area-' . $queried_object->slug;
	}
} else {
	$widget_name = NULL;
}
if ( empty($widget_name) || !is_active_sidebar($widget_name) ) {
	$widget_name = esc_attr( apply_filters('sidebar-widget-area-1','sidebar-widget-area-1') );
}

$sidebar_class = array_map( create_function('$v','return "sidebar-".$v;'), get_body_class() );
?>


<div id="sidebar" class="sidebar <?php echo join(' ',$sidebar_class); ?>">

	<?php do_action('above-sidebar-widget'); ?>

    <div class="widget-area" role="complementary">
        <ul class="xoxo">

			<?php 
			if ( ! dynamic_sidebar( $widget_name ) ) :
				global $hublog_fudousan;
				if ( is_a($hublog_fudousan,'Hublog_Fudousan') ) : ?>

					<?php if ( count($terms_sell) > 0 ) : //売買サイドバー
					?><li class="widget-container widget_nav_menu">
						<?php wp_nav_menu( array('menu'=>'menu-sell') ); ?>
					</li><?php
					endif; ?>

					<?php if ( count($terms_rent) > 0 ) : //賃貸サイドバー
					?><li class="widget-container widget_nav_menu">
						<?php wp_nav_menu( array('menu'=>'menu-rent') ); ?>
					</li><?php
					endif; ?>

				<?php else : ?>
					<li class="widget-container widget_nav_menu">
						<div class="menu-menu-sell-container">
							<ul class="menu" id="menu-menu-sell">
								<?php
								$args = array(
										'hide_empty' => 0,
										'depth' => 1,
										'title_li' => '',
										'orderby' => (function_exists('mycategoryorder') ? 'order' : 'name'),
								);
								wp_list_categories( $args );
								?>
							</ul>
						</div>
					</li><!-- #sidebar-navi-category -->
					
					<li id="sidebar-navi-page" class="sidebar-navi cat-item">
						<ul>
							<?php
							$args = array(
									'hide_empty' => 0,
									'depth' => 1,
									'title_li' => '',
									'orderby' => (function_exists('mycategoryorder') ? 'order' : 'name'),
							);
							wp_list_pages( $args );
							?>
						</ul>
					</li><!-- #sidebar-navi-category -->
				<?php endif; ?>

				<?php
				//会社概要表示
				get_template_part('side-shopinfo');
			endif; // end sidebar widget area 1
			?>
        </ul>
    </div><!-- .widget-area -->

	<?php do_action('below-sidebar-widget'); ?>

</div><!-- #sidebar -->

