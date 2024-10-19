<?php
/**
 * addcontent-about.php
 *
 * @テーマ名	gatten
 * @更新日付	2012.02.15
 *
 */
?>




<?php if ( current_user_can( 'administrator' ) ) :?>
<p class="edit_theme"><a target="_blank" href="/wp-admin/theme-editor.php?file=addcontent-about.php&theme=<?php echo get_stylesheet('name'); ?>" title="/wp-admin/theme-editor.php?file=addcontent-about.php&theme=<?php echo get_stylesheet('name'); ?>">
このincludeテーマを編集
</a></p>
<?php endif;?>


<article id="addcontent-about">
	<div id="about-filter">
	<ul class="flexbox about-filter">

		<li class="gaiyou w33">
			<span class="title">会社概要</span>
		 <p>資本金や従業員数、関連会社などの基本的な情報をご覧いただけます。 </p>
		<a href="/about#gaiyou">会社概要</a>
		</li>


		<li class="rinen w33">
		<span class="title">企業理念</span>
		<p class="mincho txt-lll">
		キャッチコピーなど
		</p>
		<p>
		<?php echo (get_option('profile_shop_name')) ?>の企業理念をご覧いただけます。
		</p>
		<a href="/about/rinen">企業理念</a>
		</li>

		<li class="jigyou w33">
			<span class="title">事業紹介</span>
		<p><?php echo (get_option('profile_shop_name')) ?>の事業概要、サービスと品質、取引実績についてをご覧いただけます。</p>
		<a href="/about/jigyou">事業説明</a>
		</li>

		<li class="enkaku w33">
			<span class="title">沿革</span>
		<p>事業展開、経営改革など<?php echo (get_option('profile_shop_name')) ?>の歴史をご覧いただけます。</p>
		<a href="/about/enkaku">沿革</a>
		</li>
		<li class="staff w33">
			<span class="title">スタッフ紹介</span>
		<p>弊社で働くスタッフを紹介しています。</p>
		<a href="/about/staff">スタッフ</a>
		</li>
		<li class="recruit w33">
			<span class="title">採用情報</span>
		<p>新卒者、経験者を対象とした募集要項・募集職種・応募方法などの採用情報をご覧になれます。</p>
		<a href="/about/recruit">採用情報</a>
		</li>

	</ul>
	</div>

</article>
