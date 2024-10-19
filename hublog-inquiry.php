<?php
/**
 * hublog-inquiry-page.php
 *
 * @テーマ名	hublog4
 *
 */
$form_inquiry = get_option( 'profile_form_inquiry' ); //一般
$form_event = get_option( 'profile_form_event' ); //イベント
$form_modelhouse = get_option( 'profile_form_modelhouse' ); //モデルハウス
$form_shiryou = get_option( 'profile_form_shiryou' ); //資料請求
$form_recruit = get_option( 'profile_form_recruit' ); //求人
$form_recruit_shain = get_option( 'profile_form_recruit_shain' ); //求人（社員）
$form_recruit_part = get_option( 'profile_form_recruit_part' ); //求人（パート）


$profile_inquiry_tel = ( get_option( 'profile_inquiry_tel' ) ) ? get_option( 'profile_inquiry_tel' ) : get_option( 'profile_main_tel' );


?>
<?php wp_reset_query(); ?>
<?php if (post_custom('unique-form') || post_custom('unique-form-ttl')) : ?>
<div class="entry-content">
  <?php
  echo apply_filters( 'the_content', get_post_meta( $post->ID, 'unique-form-ttl', true ) );
  ?>
  <?php echo do_shortcode(post_custom ('unique-form')) ;?> </div>
<?php endif ;?>
<?php if (post_custom('disappear-form')) : ?>
<?php else :?>
<?php if ( is_page(array('inquiry')) ) : //お問合せページ ?>
<div id="form" class="hublog-inquiry wrapper mx-auto anchor">
  <div class="beforeform"> <span class="ttl">お問合せ</span>
    <div class="message"> <span class="title">お電話でのお問合わせも承ります。</span>
      <p>※電話に出たスタッフにご用件をお伝えください。</p>
    </div>
    <!--message-->
    <div class="hublog-inquiry-tel"> <span class="profile_inquiry_tel"> 電話：
      <?php
      $profile_inquiry_tel = ( get_option( 'profile_inquiry_tel' ) ) ? get_option( 'profile_inquiry_tel' ) : get_option( 'profile_main_tel' );
      if ( !empty( $profile_inquiry_tel ) ): ?>
      <span class="telnum"><?php echo $profile_inquiry_tel; ?></span>
      <?php endif; ?>
      </span>
      <div class="opning-hour-day"> <span class="profile_opening_hours"><span class="title">営業時間：</span><?php echo (get_option('profile_opening_hours')) ?></span>
        <?php if (get_option('profile_holiday')) : ?>
        <span class="profile_holiday"><span class="title">定休日：</span><?php echo (get_option('profile_holiday')) ?></span>
        <?php endif; ?>
      </div>
      <!--opning-houry-day--> 
    </div>
    <!--hublog-inquiry-tel--> 
  </div>
  <!--brforeform-->
  <div class="form_wrappwe mx-fit">
    <?php
    echo do_shortcode( "[contact-form-7 id=\"$form_inquiry\" title=\"お問い合わせ\"]" );
    ?>
  </div>
</div>
<!--hublog-inquiry-->

<?php elseif ( in_category(array('event','event-recent')) ) : //イベント申込 ?>
<div id="form" class="hublog-inquiry wrapper mx-auto anchor">
  <div class="beforeform"> <span class="ttl">イベントのお申込み</span>
    <div class="message"></div>
    <div class="hublog-inquiry-tel ">
      <div class="profile_inquiry_info"> <span class="profile_inquiry_tel"> <span class="title">お電話でのお申込みも承ります。</span>
        <?php	if (!empty($profile_inquiry_tel)) : ?>
        <span class="telnum"><?php echo $profile_inquiry_tel; ?></span>
        <?php endif; ?>
        </span>
        <div class="opning-hour-day"> <span class="profile_opening_hours"><span class="title">営業時間：</span><?php echo (get_option('profile_opening_hours')) ?></span>
          <?php if (get_option('profile_holiday')) : ?>
          <span class="profile_holiday"><span class="title">定休日：</span><?php echo (get_option('profile_holiday')) ?></span>
          <?php endif; ?>
        </div>
        <!--opning-hour-day--> 
      </div>
      <!--profile_inquiry_info--> 
    </div>
    <!--hublog-inquiry-tel--> 
    
  </div>
  <!--beforeform-->
  
  <div class="form_wrappwe mx-fit">
    <?php
    echo do_shortcode( "[contact-form-7 id=\"$form_event\" title=\"イベント申し込み\"]" );
    ?>
  </div>
</div>
<!--hublog-inquiry-->

<?php elseif ( is_page(array('shiryou','offer')) ) : //資料請求ページ ?>
<div id="form" class="hublog-inquiry wrapper mx-auto anchor">
  <div class="beforeform"> <span class="ttl">資料請求フォーム</span>
    <div class="message"> <span class="title">お電話での資料請求も承ります。</span>
      <p>※電話に出たスタッフに<br />
        <strong>「
        <?php if(get_option('profile_shop_name')) echo (get_option('profile_shop_name')) ;else echo(get_option('profile_corporate_name')); ?>
        の資料がほしい」</strong>とお伝えください。</p>
    </div>
    
    <!--message-->
    <div class="hublog-inquiry-tel"> <span class="profile_inquiry_tel"> 電話：
      <?php
      $profile_inquiry_tel = ( get_option( 'profile_inquiry_tel' ) ) ? get_option( 'profile_inquiry_tel' ) : get_option( 'profile_main_tel' );
      if ( !empty( $profile_inquiry_tel ) ): ?>
      <span class="telnum"><?php echo $profile_inquiry_tel; ?></span>
      <?php endif; ?>
      </span>
      <div class="opning-hour-day"> <span class="profile_opening_hours"><span class="title">営業時間：</span><?php echo (get_option('profile_opening_hours')) ?></span>
        <?php if (get_option('profile_holiday')) : ?>
        <span class="profile_holiday"><span class="title">定休日：</span><?php echo (get_option('profile_holiday')) ?></span>
        <?php endif; ?>
      </div>
      <!--opning-houry-day--> 
    </div>
    <!--hublog-inquiry-tel--> 
  </div>
  <!--brforeform-->
  <div class="form_wrappwe mx-fit">
    <?php
    echo do_shortcode( "[contact-form-7 id=\"$form_shiryou\" title=\"資料請求\"]" );
    ?>
  </div>
  <!--inbox--> 
</div>
<!--hubloginqury page -->

<?php elseif ( is_page(array('modelhouse')) ) : //モデルハウス ?>
<div id="form" class="hublog-inquiry wrapper mx-auto anchor">
  <div class="beforeform"> <span class="ttl">モデルハウス見学申込フォーム</span>
    <div class="message"> <span class="title">お電話でのお申込も承ります</span>
      <p>※電話に出たスタッフに<br />
        <strong>「モデルハウスの見学希望」</strong>とお伝えください。</p>
    </div>
    <!--message-->
    <div class="hublog-inquiry-tel"> <span class="profile_inquiry_tel"> 電話：
      <?php
      $profile_inquiry_tel = ( get_option( 'profile_inquiry_tel' ) ) ? get_option( 'profile_inquiry_tel' ) : get_option( 'profile_main_tel' );
      if ( !empty( $profile_inquiry_tel ) ): ?>
      <span class="telnum"><?php echo $profile_inquiry_tel; ?></span>
      <?php endif; ?>
      </span>
      <div class="opning-hour-day"> <span class="profile_opening_hours"><span class="title">営業時間：</span><?php echo (get_option('profile_opening_hours')) ?></span>
        <?php if (get_option('profile_holiday')) : ?>
        <span class="profile_holiday"><span class="title">定休日：</span><?php echo (get_option('profile_holiday')) ?></span>
        <?php endif; ?>
      </div>
      <!--opning-houry-day--> 
    </div>
    <!--hublog-inquiry-tel--> 
  </div>
  <!--brforeform-->
  <div class="form_wrappwe mx-fit">
    <?php
    echo do_shortcode( "[contact-form-7 id=\"$form_modelhouse\" title=\"モデルハウス見学\"]" );
    ?>
  </div>
  <!--inbox--> 
</div>
<!--hubloginqury page -->

<?php elseif ( is_page(array('recruit','recruit-shain','recruit-part')) ) : //求人 ?>
<div id="form" class="hublog-inquiry wrapper mx-auto anchor">
  <div class="beforeform"> <span class="ttl">求人申込みフォーム</span>
    <div class="message"> <span class="title">お電話でのお問い合わせ</span>
      <p>※電話に出たスタッフに<br />
        <strong>「求人についてのお問い合わせ」</strong>とお伝えください。</p>
    </div>
    <!--message-->
    <div class="hublog-inquiry-tel"> <span class="profile_inquiry_tel"> 電話：
      <?php
      $profile_inquiry_tel = ( get_option( 'profile_inquiry_tel' ) ) ? get_option( 'profile_inquiry_tel' ) : get_option( 'profile_main_tel' );
      if ( !empty( $profile_inquiry_tel ) ): ?>
      <span class="telnum"><?php echo $profile_inquiry_tel; ?></span>
      <?php endif; ?>
      </span>
      <div class="opning-hour-day"> <span class="profile_opening_hours"><span class="title">営業時間：</span><?php echo (get_option('profile_opening_hours')) ?></span>
        <?php if (get_option('profile_holiday')) : ?>
        <span class="profile_holiday"><span class="title">定休日：</span><?php echo (get_option('profile_holiday')) ?></span>
        <?php endif; ?>
      </div>
      <!--opning-houry-day--> 
    </div>
    <!--hublog-inquiry-tel--> 
  </div>
  <!--brforeform-->
  <div class="form_wrappwe mx-fit">
    <?php if ( is_page(array('recruit-shain',)) ) : //求人 ?>
    <?php
    echo do_shortcode( "[contact-form-7 id=\"$form_recruit_shain\" title=\"求人お問い合わせ（正社員）\"]" );
    ?>
    <?php elseif ( is_page(array('recruit-part',)) ) : //求人 ?>
    <?php
    echo do_shortcode( "[contact-form-7 id=\"$form_recruit_part\" title=\"求人お問い合わせ（パート）\"]" );
    ?>
    <?php else: ?>
    <?php
    echo do_shortcode( "[contact-form-7 id=\"$form_recruit\" title=\"求人お問い合わせ（パート）\"]" );
    ?>
    <?php endif ; ?>
  </div>
  <!--inbox--> 
</div>
<!--hubloginqury page -->

<?php elseif ( in_category(array('staff')) ) : //フック無し ?>
<?php else: ?>
<?php get_template_part('include', 'contact'); ?>
<?php get_template_part('include', 'zeh'); ?>
<!--hublog-inquiry-->
<?php endif; ?>
<?php endif; //disappear-form?>
