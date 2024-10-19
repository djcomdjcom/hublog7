<?php
/**
 * The Footer widget areas.
 */
?>


			<div id="footer-widget-area" role="complementary" class="clearfix">
				<ul id="foot_widget-first" class="clearfix">
<?php if ( ! dynamic_sidebar( 'footer-widget-area-1' ) ) : ?>
					<li class="widget-container widget_categories">
						<ul>

							<?php
								$args = array(
										'hide_empty' => 0,
										'depth' => 0,
										'title_li' => '',
										'orderby' => (function_exists('mycategoryorder') ? 'order' : 'name'),
									);
								wp_list_categories( $args );
							?>

						</ul>
					</li><!-- #sidebar-navi-category -->
				
					<li class="widget-container widget_pages">
						<ul>
						
							<?php wp_list_pages('depth=1&hide_empty=0&orderby=order&title_li='); ?>
							
						</ul>
					</li><!-- #sidebar-navi-inquury -->
<?php endif; // end sidebar widget area 1 ?>
				</ul>



<?php if ( is_active_sidebar( 'footer-widget-area-2' ) ) : ?>
				<div id="foot_widget-second" class="widget-area">
					<ul class="xoxo">
						<?php dynamic_sidebar( 'footer-widget-area-2' ); ?>
					</ul>
				</div><!-- #second .widget-area -->
<?php endif; ?>

			</div><!-- #footer-widget-area -->
