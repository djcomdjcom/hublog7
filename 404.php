<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 * hublog7
 * 20250110
 */

get_header();
?>
<article id="post-0" class="post error404 no-results not-found wrapper">
  <header class="entry-header">
    <h1 class="entry-title"><span>Not Found</span></h1>
  </header>
  <div class="entry-content text-center">
	  <div style="opacity: .5;">
    <p style="font-size: clamp(5rem, -1.923rem + 19.23vw, 12.5rem);" >404</p>
    <p>ページを表示できません。</p>
    <p>お探しのページは削除または、アドレスが変更となりました。<br />
      恐れ入りますが、<a href="/">トップページ</a>より<br>
      ご希望のメニューをお選びください。 </p>
	  </div>
	  
    <hr class="my-5" />
    <div class="mb-5 txt-s">ページの検索はこちらから<br />
      <?php get_search_form(); ?>
    </div>
  </div>
  <!-- .entry-content --> 
  
</article>
<!-- #post-0 -->

<?php //get_sidebar(); ?>
<?php get_footer(); ?>
