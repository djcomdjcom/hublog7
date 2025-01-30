<?php
/**
 * footer.php
 */
wp_reset_query();
?>
<style>
<?php echo post_custom('custom_css');
?>
</style>
</main>

<!-- #main-->

<?php wp_reset_query(); ?>
<div id="wrapper" class="gnavi_set">
<?php //if ( is_user_logged_in() ) :?>
<div class="btn-gnavi"> <span></span> <span></span> <span></span>
  <div class="btn-gnavi-menu">MENU</div>
</div>
<?php //endif;?>
<nav id="global-navi" class="pt-3">
  <div class="global-navi-inner container">
    <div id="global-navi-logo" class="wrapper mb-0 mb-md-4 px-2 pb-3"> <a class="w100 maxw-300 mx-0 mx-auto" href="/">
      <?php
      $footer_logo = get_theme_mod( 'footer_logo' );
      if ( $footer_logo ): ?>
      <img src="<?php echo esc_url( $footer_logo ); ?>" alt="<?php echo get_option('profile_corporate_name'); ?> ロゴ">
      <?php else : ?>
      <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/footerlogo@2x.webp" alt="<?php echo get_option('profile_corporate_name'); ?> ロゴ">
      <?php endif; ?>
      </a> </div>
    <div class="gtn-contgact d-none">
      <div class=""> <span class="profile_inquiry_tel">
        <?php
        $profile_inquiry_tel = ( get_option( 'profile_inquiry_tel' ) ) ? get_option( 'profile_inquiry_tel' ) : get_option( 'profile_main_tel' );
        if ( !empty( $profile_inquiry_tel ) ): ?>
        &nbsp;<span class="telnum"><?php echo $profile_inquiry_tel; ?>&nbsp;</span>
        <?php
        endif;
        ?>
        </span> </div>
      <div class="inc_contact-btn">
        <ul class="btn_set row py-2 mx-auto px-0">
          <li class="to_inquiry col-12 btn"> <a class="" href="/inquiry/?title=<?php echo get_the_title();?>">お問い合わせ</a> </li>
        </ul>
      </div>
    </div>
    <?php if (get_option('profile_teikitenken')) : ?>
    <p class="btn arrow center my-5"><a class="bg-white shadow text-success" href="<?php echo get_option('profile_teikitenken'); ?>">定期点検のお申し込み</a></p>
    <?php endif ;?>
    <div class="gni-address mt-3">
      <nav id="access">
        <?php get_template_part( 'global-navi-menu' ); ?>
      </nav>
      <?php get_template_part('include', 'snslink');//SNSボタン ?>
      <div class="gtm-address">
        <?php if (get_option('profile_address')) : ?>
        <p class="profile_address"><?php echo '' . get_option('profile_postcode'); ?> <?php echo get_option('profile_address'); ?></p>
        <?php endif ;//addrss?>
        <?php if (get_option('profile_main_tel')) : ?>
        <span class="text-nowrap px-1">TEL： <?php echo get_option('profile_main_tel'); ?> </span>
        <?php endif ;?>
        <?php if (get_option('profile_fax')) : ?>
        <span class="text-nowrap px-1">FAX： <?php echo get_option('profile_fax'); ?> </span>
        <?php endif ;?>
        <?php if (get_option('profile_opening_hours')|| get_option('profile_holiday')) : ?>
        <div class="gni-time" class="m-4">
        <?php if (get_option('profile_opening_hours')) : ?>
        <span class="d-inline-block px-1">電話受付時間 <?php echo (get_option('profile_opening_hours')) ?></span>
        <?php endif ;//profile_opening_hours?>
        <?php if (get_option('profile_holiday')) : ?>
        <span class="d-block px-1">定休日　<?php echo (get_option('profile_holiday')) ?></span>
        <?php endif ;//profile_holiday?>
      </div>
      <?php endif ;//profile_opening_hours||profile_holiday?>
    </div>
    <div class="global-navi-menu global-navi_widgets row  text-left justify-content-start mx-auto px-0 mt-5 ">
      <div class=" f1 col-md-3">
        <?php
        if ( has_nav_menu( 'f1' ) ) {
          wp_nav_menu( array(
            'theme_location' => 'f1',
          ) );
        }
        ?>
      </div>
      <div class=" f2 col-md-3">
        <?php
        if ( has_nav_menu( 'f2' ) ) {
          wp_nav_menu( array(
            'theme_location' => 'f2',
          ) );
        }
        ?>
      </div>
      <div class=" f3 col-md-3">
        <?php
        if ( has_nav_menu( 'f3' ) ) {
          wp_nav_menu( array(
            'theme_location' => 'f3',
          ) );
        }
        ?>
      </div>
      <div class=" f4 col-md-3">
        <?php
        if ( has_nav_menu( 'f4' ) ) {
          wp_nav_menu( array(
            'theme_location' => 'f4',
          ) );
        }
        ?>
      </div>
      <div class=" f5 col-md-3">
        <?php
        if ( has_nav_menu( 'f5' ) ) {
          wp_nav_menu( array(
            'theme_location' => 'f5',
          ) );
        }
        ?>
      </div>
    </div>
  </div>
  </div>
</nav>
</div>
<?php if ( get_option( 'blog_public') ): ?>
<?php else: ?>
<?php if ( is_user_logged_in() ) :?>
<div class="wrapper" style="clear:both; border: 2px solid red; color:red; background:#fff; text-align:center; margin-top:1em;margin-bottom:1em; padding:0.5em 0;"> ※検索エンジンのインデックスを許可していません。<br />
  <a href="/wp-admin/options-reading.php">許可する</a> </div>
<?php endif;?>
<?php endif; ?>
<?php if ( is_user_logged_in() ) : ?>
<p class="aligncenter"> <a href="/hublog_setting">→hublog設定</a></p>
<?php endif; ?>
<footer class="" id="footer">
  <div id="footer_inbox">
    <div class="wrapper pt-5 pb-5">
		
      <div class="footer-navi-menu text-left my-4 row justify-content-between ">
        <div class=" f1 col-sm-6 col-md-3">
          <?php
          if ( has_nav_menu( 'f1' ) ) {
            wp_nav_menu( array(
              'theme_location' => 'f1',
            ) );
          }
          ?>
        </div>
        <div class=" f2 col-sm-6 col-md-3">
          <?php
          if ( has_nav_menu( 'f2' ) ) {
            wp_nav_menu( array(
              'theme_location' => 'f2',
            ) );
          }
          ?>
        </div>
        <div class=" f3 col-sm-6 col-md-3">
          <?php
          if ( has_nav_menu( 'f3' ) ) {
            wp_nav_menu( array(
              'theme_location' => 'f3',
            ) );
          }
          ?>
        </div>
        <div class=" f4 col-sm-6 col-md-3">
          <?php
          if ( has_nav_menu( 'f4' ) ) {
            wp_nav_menu( array(
              'theme_location' => 'f4',
            ) );
          }
          ?>
        </div>
        <div class=" f5">
          <?php
          if ( has_nav_menu( 'f5' ) ) {
            wp_nav_menu( array(
              'theme_location' => 'f5',
            ) );
          }
          ?>
        </div>
      </div>
      <div id="foot-offer" class="">
        <ul class="flexbox ml-auto">
          <?php get_template_part( 'links-offer' ); ?>
        </ul>
      </div>
      <!--FOOT_OFFER-->
      
      <?php get_template_part('inc', 'footer_bnrs'); ?>
      <div class="footer-contact mt-4 mb-2 container-fluid">
        <div class="row mb-5 mt-5 px-5 px-lg-0">
          <div class="footer-contact-inner1 col-md-4 mb-4"> <a href="/" class="w100 maxw-200 mx-auto">
            <?php
            $footer_logo = get_theme_mod( 'footer_logo' );
            if ( $footer_logo ): ?>
            <img src="<?php echo esc_url( $footer_logo ); ?>" alt="<?php echo get_option('profile_corporate_name'); ?> ロゴ">
            <?php else : ?>
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/footerlogo@2x.webp" alt="<?php echo get_option('profile_corporate_name'); ?> ロゴ">
            <?php endif; ?>
            </a> </div>
          <div class=" col-md-5  mb-4">
            <div class=""> <span class=" contact-tel profile_inquiry_tel d-block">
              <?php
              $profile_inquiry_tel = ( get_option( 'profile_inquiry_tel' ) ) ? get_option( 'profile_inquiry_tel' ) : get_option( 'profile_main_tel' );
              if ( !empty( $profile_inquiry_tel ) ): ?>
              &nbsp;<span class="telnum"><?php echo $profile_inquiry_tel; ?>&nbsp;</span>
              <?php
              endif;
              ?>
              </span> <span class=" px-1 d-block">電話受付時間 <?php echo (get_option('profile_opening_hours')) ?></span> <span class=" px-1 d-block">定休日　<?php echo (get_option('profile_holiday')) ?></span> </div>
            <!--contact-tel--> 
          </div>
        </div>
      </div>
      <div class="cr"> Copyright&copy; <?php echo get_option('profile_corporate_name'); ?> All Rights Reserved. </div>
    </div>
  </div>
</footer>
<div id="pageTop"> <a href="#header">ページトップへ戻る</a> </div>
<?php get_template_part('inc','foot_functions'); ?>
<script>
jQuery(function($){
$("#global-navi a").on("click", function() {
//$("#global-navi").slideToggle();
$(".btn-gnavi").removeClass("open");
});
	$(".btn-gnavi").on("click", function(){
//                var rightVal = 0;
			if($(this).hasClass("open")) {
//                        rightVal = -10000;
					$(this).removeClass("open");
			} else {
					$(this).addClass("open");
			}

//                $("#global-navi").stop().animate({
//                       right: rightVal
//                }, 200);
	});
    var headH = $("header").outerHeight();
    var animeSpeed = 500;
    var urlHash = location.hash; //URLのハッシュタグを取得
    if (urlHash) { //ハッシュタグが有る場合
        $("body,html").scrollTop(0);
        setTimeout(function () { //無くてもいいが有ると動作が安定する
            var target = $(urlHash);
            var position = target.offset().top - headH;
            $("body,html").stop().animate({
                scrollTop: position
            }, animeSpeed);
        }, 0);
    }
	$(window).scroll(function () {
	  if($(window).scrollTop() > 100) {
		$('#pageTop').addClass('fixed');
	  } else {
		$('#pageTop').removeClass('fixed');
	  }
	});
	$('.rel_lb a[href$=".jpg"],.rel_lb a[href$=".jpeg"],.rel_lb a[href$=".JPG"],.rel_lb a[href$=".JPEG"],.rel_lb a[href$=".png"],.rel_lb a[href$=".PNG"],.rel_lb a[href$=".webp"],.rel_lb a[href$=".WEBP"],.rel_lb a[href$=".gif"],.rel_lb a[href$=".GIF"]').attr('rel' ,'lightbox');

var ua = navigator.userAgent;
if(ua.indexOf('iPhone') > 0 || ua.indexOf('Android') > 0){
$('.telnum').each(function(){
var str = $(this).text();
$(this).html($('<a>').attr('href', 'tel:' + str.replace(/-/g, '')).append(str + '</a>'));
});
	
$('.call').each(function(){
var str = $(this).text();
$(this).html($('<a>').attr('href', 'tel:' + str.replace(/-/g, '')).append(str + '</a>'));
});
	
}
});
	
document.addEventListener('DOMContentLoaded', function() {
const iframes = document.querySelectorAll('iframe[src*="youtube.com"]');

iframes.forEach(function(iframe) {
  const container = document.createElement('div');
  container.classList.add('responsive-iframe-container');
  iframe.parentNode.insertBefore(container, iframe);
  container.appendChild(iframe);
});
});
	
</script>
<?php if ( is_user_logged_in() ) :?>
<style>
	.content{
		display: none;
	}
	.toggle:checked + .title + .content {
		display: block;
	}
</style>
<div onClick="accordion" style="left: 0;bottom: 0;z-index: 9999;background:  rgba(255,255,255,0.79);font-size: 12px;" class="position-fixed px-2">
  <div class="option">
    <input type="checkbox" id="hint001" class="toggle">
    <label class="title" for="hint001">画角ヒント</label>
    <div class="content">
      <p class="my-0"><span class="d-inline-block d-sm-none">●</span>sm未満：-575.98px</p>
      <p class="my-0"><span class="d-sm-inline-block d-none d-md-none">●</span>sm：576px-767.98px</p>
      <p class="my-0"><span class="d-md-inline-block d-none d-lg-none">●</span>md：768px-991.98px</p>
      <p class="my-0"><span class="d-lg-inline-block d-none d-xl-none">●</span>lg：992px-1199.98px</p>
      <p class="my-0"><span class="d-xl-inline-block d-none d-xxl-none">●</span>xl：1200px-</p>
    </div>
  </div>
</div>
<?php endif;?>
<?php wp_footer(); ?>
</body>
<?php if ( is_user_logged_in() ) : ?>
<div class="to_dashboard">
  <?php edit_post_link(__('Edit'), '', ''); ?>
  <a href="<?php echo admin_url();?>">管理画面</a> </div>
<!--inbox-->
<?php endif; ?>
</html>