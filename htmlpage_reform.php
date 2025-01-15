<?php
/**
template name: ★リフォーム
 * @テーマ名	hublog7
 * @更新日付	2024.11.11
 *
 */
get_header();
?>
<style>
#breadcrumb{
text-indent: -110%;
height: 0;
padding: 0;
overflow: hidden;
}
#breadcrumb *{
display: inline;
}
</style>
<?php the_post(); ?>
<article id="post-<?php the_ID(); ?>" <?php post_class('hentry builder_content reform '); ?>>
<header class="wrapper builder_content_ttl mx-fit">
<h1 class="entry-title"><?php the_title(); ?></h1>
</header>
<article class="left_nav_wrapper anchor wrapper pb-5">
  <div class="left_nav pagetab pb-md-4 pt-md-5">
    <?php wp_nav_menu(array('theme_location'=>'reform-nav', 'fallback_cb'=>'nothing_to_do')); ?>
  </div>
  <div class="entry-content">
    <?php the_content(); ?>
    <?php if ( current_user_can( 'administrator' ) ) :?>
    <p class="edit_theme"><a target="_blank" href="/wp-admin/theme-editor.php?file=html%2F<?php echo $slug_name = $post->post_name; ?>.php&theme=<?php echo get_stylesheet('name'); ?>" title="/wp-admin/theme-editor.php?file=html%2F<?php echo $slug_name = $post->post_name; ?>.php&theme=<?php echo get_stylesheet('name'); ?>"> このincludeテーマを編集 </a></p>
    <?php endif;?>
    <?php //インクルードセクション
    $the_page = get_page( get_the_ID() );
    $include_html_dir = STYLESHEETPATH . '/html/';
    $include_html_file = $include_html_dir . $the_page->post_name;
    if ( file_exists( $include_html_file . '.php' ) ) {
      include $include_html_file . '.php';
    } elseif ( file_exists( $include_html_file . '.html' ) ) {
      include $include_html_file . '.html';
    }
    ?>
    <?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'twentyten' ), 'after' => '</div>' ) ); ?>
  </div>
  <!--.entry-content --> 
  
</article>
<!-- .left_nav_wrapper-->

<?php get_template_part('releated-posts');// posts_in_page ?>

<!--商品ページ共通-->
<?php
$gettemplate01 = ( post_custom( 'gettempale01' ) );
?>
<?php get_template_part($gettemplate01); ?>
<?php get_template_part('hublog-inquiry',''); //問い合わせフック ?>
<footer class="entry-utility page wrapper">
  <div class="entry-meta updated author"> <span class="date updated">
    <?php the_time('Y/n/j') ?>
    </span> <span class="author vcard">投稿者：<span class="fn">
    <?php the_author(); ?>
    </span></span> </div>
  <!--entry-meta-->
  <?php edit_post_link( __( 'Edit', 'twentytwelve' ), '<span class="edit-link">', '</span>' ); ?>
</footer>
<!-- .entry-utility -->
</article>
<!--.hentry-->


<style>
.modal {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.5);
    justify-content: center;
    align-items: center;
    z-index: 1000;
}

.modal-content {
    background: #fff;
    padding: 20px;
    border-radius: 8px;
    width: 90%;
    max-width: 500px;
    overflow-y: auto;
}

.modal.active {
    display: flex;
}
</style>
<script>
document.addEventListener('DOMContentLoaded', function () {
    // モーダルの生成
    const modal = document.createElement('div');
    modal.classList.add('modal');
    modal.innerHTML = `
        <div class="modal-content">
            <button class="modal-close" style="float:right;">閉じる</button>
            ${document.querySelector('.left_nav').innerHTML}
        </div>
    `;
    document.body.appendChild(modal);

    const trigger = document.querySelector('.left_nav >div > ul.menu > li > a');
    const closeButton = modal.querySelector('.modal-close');

    // メディアクエリ条件
    const mediaQuery = window.matchMedia('(max-width: 767.98px)');

    // モーダル表示用のクリックイベント
    const showModal = function (e) {
        if (mediaQuery.matches) { // 画面幅が767.98px以下の場合
            e.preventDefault();
            modal.classList.add('active');
        }
    };

    // モーダル非表示用のクリックイベント
    const hideModal = function () {
        modal.classList.remove('active');
    };

    // トリガーとモーダルのイベントリスナー設定
    trigger.addEventListener('click', showModal);
    closeButton.addEventListener('click', hideModal);

    // モーダル外クリックで閉じる
    modal.addEventListener('click', function (e) {
        if (e.target === modal) {
            hideModal();
        }
    });

    // 画面サイズ変更時の動作を確認（オプション: 再設定のため）
    mediaQuery.addEventListener('change', function () {
        if (!mediaQuery.matches) {
            modal.classList.remove('active');
        }
    });
});

	document.addEventListener('scroll', function () {
    var leftNav = document.querySelector('.left_nav');
    var entryContent = document.querySelector('.entry-content');

    if (!leftNav || !entryContent) return;

    var scrollY = window.scrollY || window.pageYOffset;
    var entryContentBottom = entryContent.getBoundingClientRect().bottom;
    var viewportHeight = window.innerHeight;
    var triggerPoint = viewportHeight * 0.8; // 画面の80%位置

    // 200pxスクロール時点で .fixed を付与
    if (scrollY >= 200) {
        leftNav.classList.add('fixed');
    } else {
        leftNav.classList.remove('fixed');
    }

    // entry-content の最下部が画面の40%位置に到達したら .fixed_bottom を追加
    if (entryContentBottom <= triggerPoint) {
        leftNav.classList.add('fixed_bottom');
    } else {
        leftNav.classList.remove('fixed_bottom');
    }
});


// ページ内リンクのポジションを　left_navに反映	
	document.addEventListener('DOMContentLoaded', function() {
    // 初期読み込み時にクラスを更新
    updateCurrentClass();

    // スクロールイベントを監視
    window.addEventListener('scroll', function() {
        updateCurrentClass(); // スクロールごとにクラスを更新
    });

    // アンカーリンクのクリック時にクラスを更新
    var links = document.querySelectorAll('.left_nav ul.menu > li a');
    links.forEach(function(link) {
        link.addEventListener('click', function(event) {
            setTimeout(updateCurrentClass, 100); // ページがスクロールしてから更新
        });
    });
});

// 現在のスクロール位置に基づいて .current クラスを付加
function updateCurrentClass() {
    var currentPath = window.location.pathname;
    var links = document.querySelectorAll('.left_nav ul.menu > li a');
    var buffer = 10; // スクロール位置の微調整用

    links.forEach(function(link) {
        var linkHref = link.getAttribute('href');
        // ハッシュがある場合のみチェック
        if (linkHref.includes('#')) {
            var targetId = linkHref.split('#')[1];
            var targetElement = document.getElementById(targetId);

            if (targetElement) {
                var targetPosition = targetElement.getBoundingClientRect().top + window.scrollY - buffer;

                // 現在のスクロール位置がターゲットの位置にある場合に current クラスを付加
                if (window.scrollY >= targetPosition && window.scrollY < targetPosition + targetElement.offsetHeight) {
                    link.parentElement.classList.add('current');
                } else {
                    link.parentElement.classList.remove('current');
                }
            }
        }
    });
}
		
</script>
<?php get_footer(); ?>
