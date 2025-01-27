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

<script>
document.addEventListener('DOMContentLoaded', function () {
    // モーダルの生成
    const modal = document.createElement('div');
    modal.classList.add('modal');
    modal.innerHTML = `
        <div class="modal-content">
            <button class="modal-close close"><span aria-hidden="true">×</span></button>            
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
        if (mediaQuery.matches) {
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

    // 画面サイズ変更時の動作を確認
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
    var triggerPoint = viewportHeight * 0.5; // 画面の50%位置

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

// ページ内リンクのポジションを left_nav に反映
document.addEventListener('DOMContentLoaded', function () {
    // 初期読み込み時にクラスを更新
    updateCurrentClass();

    // スクロールイベントを監視
    window.addEventListener('scroll', function () {
        updateCurrentClass();
    });

    // アンカーリンクのクリック時にクラスを更新
    var links = document.querySelectorAll('.left_nav ul.menu > li a');
    links.forEach(function (link) {
        link.addEventListener('click', function (event) {
            setTimeout(updateCurrentClass, 100);
        });
    });
});

	
document.addEventListener('DOMContentLoaded', function () {
    // 初期読み込み時にクラスを更新
    updateCurrentClass();

    // スクロールイベントを監視
    window.addEventListener('scroll', function () {
        updateCurrentClass(); // スクロールごとにクラスを更新
    });

    // アンカーリンクのクリック時にクラスを更新
    const links = document.querySelectorAll('.left_nav ul.menu > li a');
    links.forEach(function (link) {
        link.addEventListener('click', function () {
            setTimeout(updateCurrentClass, 100); // ページ遷移後にクラスを更新
        });
    });
});

// 現在のスクロール位置に基づいて .current クラスを付加
function updateCurrentClass() {
    const links = document.querySelectorAll('.left_nav ul.menu > li a');
    const buffer = 20; // スクロール位置の微調整用

    // すべてのリンクから current/not-current クラスを削除
    links.forEach(function (link) {
        link.parentElement.classList.remove('current', 'not-current');
    });

    let foundCurrent = false;

    // 現在のスクロール位置に基づいてクラスを付加
    links.forEach(function (link) {
        const linkHref = link.getAttribute('href');
        if (linkHref.includes('#')) {
            const targetId = linkHref.split('#')[1];
            const targetElement = document.getElementById(targetId);


            if (targetElement) {
                const targetPosition =
                    targetElement.getBoundingClientRect().top +
                    window.scrollY -
                    buffer;

                // 現在のスクロール位置がターゲット範囲内にある場合
                if (
                    window.scrollY >= targetPosition &&
                    window.scrollY < targetPosition + targetElement.offsetHeight
                ) {
                    link.parentElement.classList.add('current');
                    foundCurrent = true;

                    // 子メニューの兄弟要素に .not-current を付加
                    const siblings = Array.from(
                        link.parentElement.parentElement.children
                    ).filter((sibling) => sibling !== link.parentElement);

                    siblings.forEach((sibling) => {
                        sibling.classList.add('not-current');
                    });

                    // 親メニューに .has-current クラスを付加
                    const parentMenu = link.closest('.menu-item-has-children');
                    if (parentMenu) {
                        parentMenu.classList.add('has-current');
                        parentMenu.classList.remove('not-current');
                    }
                }
            }
        }
    });

    // 他の親メニューに .not-current を付加
    if (!foundCurrent) {
        const parentMenus = document.querySelectorAll(
            '.menu-item-has-children'
        );
        parentMenus.forEach(function (menu) {
            menu.classList.remove('has-current');
            menu.classList.add('not-current');
        });
    }
}
</script>

<?php get_footer(); ?>
