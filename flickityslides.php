<?php
/**
 * flexslider.php 
 *
 * @テーマ名	hublog
 * 全てのサイドバーに表示されるパーツ
 */
?>
<link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/js/flickity/flickity.css">
<script src="<?php bloginfo('stylesheet_directory'); ?>/js/flickity/flickity.pkgd.min.js"></script>

<section id="slideshow" class="flickity clearfix">
<div class="slides posts clearfix js-flickity carousel" data-flickity='{ "wrapAround": true,"autoPlay": true}'>


<?php query_posts('category_name=slide_top&showposts=9&order=DESC'); //スライドTOP　?>

<?php if (have_posts()) :?>

<?php while (have_posts()) : the_post(); ?>
<?php get_template_part('looppart', 'home-slider'); ?>
<?php endwhile;?>
<?php endif; ?>
<?php wp_reset_query(); ?>



<?php //スライドショー
     global $post;
     $my_posts= get_posts(array(
			'post_type' => ('slideimage'),
			'event_type' => 'scheduled_event',
			'showposts' => 99,

			'orderby' => date,
			'order' => ASC
     ));
     foreach($my_posts as $post):setup_postdata($post);
?>
<?php get_template_part('looppart', 'home-slider'); ?>
<?php endforeach; ?>
<?php wp_reset_query(); ?>


<?php query_posts('category_name=slide_end&showposts=9&order=DESC'); //スライドエンド　?>
<?php if (have_posts()) :?>

<?php while (have_posts()) : the_post(); ?>
<?php get_template_part('looppart', 'home-slider'); ?>
<?php endwhile;?>
<?php endif; ?>
<?php wp_reset_query(); ?>



</div>
</section><!--home-bnrs-->