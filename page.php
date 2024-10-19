<?php
/**
 * hublog4/page.php
 */
get_header();
?>

<?php $template_part = apply_filters('hublog_template_part', 'page'); ?>


	<?php get_template_part('loop', $template_part); ?>


<?php /* ※サイドバーが必要な場合は、loop-page 内で呼び出す */ ?>
<?php get_footer(); ?>
