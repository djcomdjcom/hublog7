<?php
/**
 * addcontent_after-example.php
 *
 * @テーマ名	gatten
 * @更新日付	2012.02.15
 *
 */
?>

		<section id="inc-example" class="clearfix inc_posts">
			<?php 
			$catnews = get_category_by_slug('example'); 
			?>		
			<?php
			$catnews_id   = ( $catnews ) ? $catnews->term_id : 0;
			$catnews_name = ( $catnews ) ? $catnews->name    : '施工事例';
			?>
			<?php query_posts('cat=' . $catnews_id . '&showposts=5'); ?>
			
			<?php if (have_posts()) : ?>

			<h2 class="title">
			<?php echo get_option('profile_shop_name'); ?>の施工事例
			</h2>
			

			<div class="posts clearfix">

				<?php while (have_posts()) : the_post(); ?>
				<?php get_template_part('looppart', 'inc_example'); ?>
				<?php endwhile; ?>
			</div>

			<?php endif; //!empty $catnews ?>
			
			<span class="toindex"><a href="<?php echo get_category_link($catnews_id); ?>">
			<?php echo $catnews_name; ?>一覧へ
			</a></span>
			
		</section><!--inc-example-->

            
