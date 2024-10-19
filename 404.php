<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 * hublog6
 * 20230202
 */

get_header();
?>
<article id="post-0" class="post error404 no-results not-found">
  <header class="entry-header">
    <h1 class="entry-title"><span>Not Found</span></h1>
  </header>
  <div class="entry-content">
    <p>申し訳ございません。</p>
    <p> お探しのページは削除または、アドレスが変更となりました。<br />
      恐れ入りますが、<br />
      <a href="/">トップページ</a><br />
      よりご希望のメニューをお選びください。 </p>
    <hr style="margin-left:0;" />
    <p> ページの検索はこちらから<br />
      <?php get_search_form(); ?>
    </p>
  </div>
  <!-- .entry-content --> 
  
</article>
<!-- #post-0 -->

<?php //get_sidebar(); ?>
<?php get_footer(); ?>
