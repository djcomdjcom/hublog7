<?php
/**
 * sidebar-sell.php 
 *
 */
?>

<div id="sidebar" class="sidebar sidebar-sell">

<?php if ( is_active_sidebar( 'bukken-widget-area-1' ) ) : ?>
    
        <div id="primary" class="widget-area" role="complementary">
            <ul class="xoxo">
                <?php dynamic_sidebar( 'bukken-widget-area-1' ); ?>
            </ul>
        </div><!-- #primary .widget-area -->
        
<?php endif; // bukken-widget-area-1 ?>



<?php if ( is_active_sidebar( 'bukken-widget-area-2' ) ) : ?>
    
        <div id="third" class="widget-area" role="complementary">
            <ul class="xoxo">
                <?php dynamic_sidebar( 'bukken-widget-area-2' ); ?>
            </ul>
        </div><!-- #secondary .widget-area -->
        
<?php endif; // sidebar-widget-area-2 ?>
    
    
<?php get_template_part('global-side'); ?>

<?php get_template_part('global-side2'); ?>

</div><!-- #sidebar -->
