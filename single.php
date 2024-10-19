<?php
/**
 * single.php
 */
get_header();
?>

<?php $template_part_single = apply_filters('template_part_single', '', get_the_ID()); ?>

<?php get_template_part('loop-single', $template_part_single); ?>

<?php /* ※サイドバーが必要な場合は、loop-single 内で呼び出す */ ?>
<?php get_footer(); ?>
