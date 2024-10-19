<?php
/**
* home.php
* @テーマ名	hublog4
* @更新日付	2014.12.03
*
*/
get_header();
?>
<div id="container" class="hiblog4">

	<div id="content" class="home clearfix">
		
		
		<article id="home-infoarea">
			<section id="home-news">

				<?php 
				$catnews = get_category_by_slug('news'); //カテゴリースラッグ news と連動
				if ( !empty($catnews) ) :
				?>		
				
				<?php
				$catnews_id   = ( $catnews ) ? $catnews->term_id : 0;
				$catnews_name = ( $catnews ) ? $catnews->name    : 'ニュース＆トピックス';
				?>
				<h2 class="title-image"><a href="<?php echo get_category_link($catnews_id); ?>"><?php echo $catnews_name; ?></a></h2>
				<div class="posts clearfix">
					<?php query_posts('cat=' . $catnews_id . '&showposts=3'); ?>
					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					<?php get_template_part('looppart', 'headline'); ?>
					<?php endwhile; endif; ?>
				</div>
				<?php endif; //!empty $catnews ?>
				</section><!--home-news-->


			
			
			<?php 
			$catnews = get_category_by_slug('event'); //イベント情報　投稿がある場合のみ表示
			?>		
			
			<?php
			$catnews_id   = ( $catnews ) ? $catnews->term_id : 0;
			$catnews_name = ( $catnews ) ? $catnews->name    : 'イベント情報';
			?>
			<?php query_posts('cat=' . $catnews_id . '&showposts=1'); ?>
			
			<?php if (have_posts()) : ?>
			
			<section id="home-event" class="clearfix">
			
				<h2 class="title-image">
				<a href="<?php echo get_category_link($catnews_id); ?>"><?php echo $catnews_name; ?></a>
				</h2>
				
				<div class="posts clearfix">
					<?php while (have_posts()) : the_post(); ?>
					<?php get_template_part('looppart', 'event'); ?>
					<?php endwhile; ?>
				</div>
			
				<a href="<?php echo get_category_link($catnews_id); ?>"><?php echo $catnews_name; ?>一覧 </a>
				
			
			<?php endif; //!empty $catnews ?>
			
			</section><!--home-event-->
		
		</article><!--home-infoarea-->
		
		
		
		
		<section id="home-example">
			
			<?php 
			$catnews = get_category_by_slug('example'); 
			?>		
			<?php
			$catnews_id   = ( $catnews ) ? $catnews->term_id : 0;
			$catnews_name = ( $catnews ) ? $catnews->name    : '施工事例';
			?>
			<?php query_posts('cat=' . $catnews_id . '&showposts=6'); ?>
			
			<?php if (have_posts()) : ?>
			
			
			<h2 class="title">
			<?php echo $catnews_name; ?>
			</h2>
			
			<div class="posts clearfix">

				<?php while (have_posts()) : the_post(); ?>
				<?php get_template_part('looppart', 'example'); ?>
				<?php endwhile; ?>
			</div>

			<?php endif; //!empty $catnews ?>
			
			<a class="toindex" href="<?php echo get_category_link($catnews_id); ?>">
			<?php echo $catnews_name; ?>一覧
			</a>
		</section><!--home-example-->
		
		



	</div><!-- #content -->

</div><!--#container-->


<?php get_sidebar(); ?>

<?php get_footer(); ?>

