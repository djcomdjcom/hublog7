<?php
/**
 * flexslider.php 
 *
 * @テーマ名	hublog
 * 全てのサイドバーに表示されるパーツ
 */
?>




<?php $slide_html = get_flex_slideshow('selector_class=flexslider&orderby=link_rating'); ?>
<?php if ( $slide_html ) : ?>

			<div id="slideshow">

				<?php echo $slide_html; ?>
			</div>

<?php endif; ?>
