<?php
/**
 * hublog7/page-about.php
 *
 * hublog7
 * 20230202
 */


get_header();
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('hentry'); ?>>
  <header class="entry-header wrapper">
    <?php
    if ( has_post_thumbnail() ):
      $args = array(
        'alt' => get_the_title(),
        'title' => get_the_title(),
      );
    $image = get_the_post_thumbnail( $page->ID, 'header-title', $args );
    ?>
    <h1 class="entry-title-image"><?php echo $image; ?></h1>
    <?php else: ?>
    <h1 class="entry-title"><span>
      <?php the_title(); ?>
      </span></h1>
    <?php endif; ?>
  </header>
  <?php get_template_part('addcontent','about'); ?>
  <div class="entry-content wrapper">
    <?php if (have_posts()) : the_post(); ?>
    <?php the_content(); ?>
    <?php endif; ?>
    <section id="gaiyou" class="gaiyou">
      <h2>会社概要</h2>
      <div class="slide-table">
        <table class="gaiyou">
          <?php if (get_option('profile_corporate_name')) : ?>
          <tr class="profile_corporate_name">
            <th>商号</th>
            <td><?php echo get_option('profile_corporate_name'); ?></td>
          </tr>
          <?php endif; ?>
          <?php if (get_option('profile_president')) : ?>
          <tr class="profile_president">
            <th>代表取締役</th>
            <td><?php echo get_option('profile_president'); ?></td>
          </tr>
          <?php endif; ?>
          <?php if (get_option('profile_address')) : ?>
          <tr class="profile_address">
            <th>所在地/住所</th>
            <td><?php if (get_option('profile_postcode')) : ?>
              <span>〒<?php echo get_option('profile_postcode'); ?>&nbsp;</span>
              <?php endif; ?>
              <?php echo get_option('profile_address'); ?></td>
          </tr>
          <?php endif; ?>
          <?php if (get_option('profile_main_tel')) : ?>
          <?php if (get_option('profile_main_tel_hide')) : ?>
          <?php else : ?>
          <tr class="profile_main_tel">
            <th>電話番号（代表）</th>
            <td><?php echo get_option('profile_main_tel'); ?></td>
          </tr>
          <?php endif; ?>
          <?php endif; ?>
          <?php if (get_option('profile_inquiry_tel')) : ?>
          <?php if (get_option('profile_inquiry_tel_hide')) : ?>
          <?php else : ?>
          <tr class="profile_inquiry_tel">
            <th>電話番号（問い合わせ窓口）</th>
            <td><?php echo get_option('profile_inquiry_tel'); ?></td>
          </tr>
          <?php endif; ?>
          <?php endif; ?>
          <?php if (get_option('profile_fax')) : ?>
          <tr class="profile_fax">
            <th>FAX番号</th>
            <td><?php echo get_option('profile_fax'); ?></td>
          </tr>
          <?php endif; ?>
          <?php if (get_option('profile_branch')) : ?>
          <tr class="profile_branch">
            <th>営業所</th>
            <td><?php echo wpautop(get_option('profile_branch')); ?></td>
          </tr>
          <?php endif; ?>
          <?php if (get_option('profile_cooperative')) : ?>
          <tr class="profile_cooperative">
            <th>関連会社</th>
            <td><?php echo wpautop(get_option('profile_group')); ?></td>
          </tr>
          <?php endif; ?>
          <?php if (get_option('profile_industry')) : ?>
          <tr class="profile_industry">
            <th>業種</th>
            <td><?php echo wpautop(get_option('profile_industry')); ?></td>
          </tr>
          <?php endif; ?>
          <?php if (get_option('profile_business_content')) : ?>
          <tr class="profile_business_content">
            <th>業務内容</th>
            <td><?php echo wpautop(get_option('profile_business_content')); ?></td>
          </tr>
          <?php endif; ?>
          <?php if (get_option('profile_employeenumber')) : ?>
          <tr class="profile_employeenumber">
            <th>従業員数</th>
            <td><?php echo wpautop(get_option('profile_employeenumber')); ?></td>
          </tr>
          <?php endif; ?>
          <?php if (get_option('profile_qualifications')) : ?>
          <tr class="profile_qualifications">
            <th>資格</th>
            <td><?php echo wpautop(get_option('profile_qualifications')); ?></td>
          </tr>
          <?php endif; ?>
          <?php if (get_option('profile_licentiate')) : ?>
          <tr class="profile_licentiate">
            <th>免許番号</th>
            <td><?php echo wpautop(get_option('profile_licentiate')); ?></td>
          </tr>
          <?php endif; ?>
          <?php if (get_option('profile_foundation_date')) : ?>
          <tr class="profile_foundation_date">
            <th>創立年月日</th>
            <td><?php echo get_option('profile_foundation_date'); ?></td>
          </tr>
          <?php endif; ?>
          <?php if (get_option('profile_establishment_date')) : ?>
          <tr class="profile_establishment_date">
            <th>設立年月日</th>
            <td><?php echo get_option('profile_establishment_date'); ?></td>
          </tr>
          <?php endif; ?>
          <?php if (get_option('profile_capital_amount')) : ?>
          <tr class="profile_capital_amount">
            <th>資本金</th>
            <td><?php echo get_option('profile_capital_amount'); ?></td>
          </tr>
          <?php endif; ?>
          <?php if (get_option('profile_photo')) : ?>
          <tr class="profile_photo">
            <th>写真</th>
            <td><?php echo get_option('profile_photo'); ?></td>
          </tr>
          <?php endif; ?>
          <?php if (get_option('profile_cooperative')) : ?>
          <tr class="profile_cooperative">
            <th>協力会社</th>
            <td><?php echo wpautop(get_option('profile_cooperative')); ?></td>
          </tr>
          <?php endif; ?>
          <?php if (get_option('profile_technic')) : ?>
          <tr class="profile_technic">
            <th>技術導入</th>
            <td><?php echo wpautop(get_option('profile_technic')); ?></td>
          </tr>
          <?php endif; ?>
          <?php if (get_option('profile_warranty')) : ?>
          <tr class="profile_warranty">
            <th>瑕疵保証</th>
            <td><?php echo wpautop(get_option('profile_warranty')); ?></td>
          </tr>
          <?php endif; ?>
          <?php if (get_option('profile_organization')) : ?>
          <tr class="profile_organization">
            <th>所属団体</th>
            <td><?php echo wpautop(get_option('profile_organization')); ?></td>
          </tr>
          <?php endif; ?>
          <?php if (get_option('profile_guaranty_society')) : ?>
          <tr class="profile_guaranty_society">
            <th>保証協会/保険協会</th>
            <td><?php echo get_option('profile_guaranty_society'); ?></td>
          </tr>
          <?php endif; ?>
          <?php if (get_option('profile_main_client')) : ?>
          <tr class="profile_main_client">
            <th>主要取引先</th>
            <td><?php echo wpautop(get_option('profile_main_client')); ?></td>
          </tr>
          <?php endif; ?>
          <?php if (get_option('profile_bank_of_account')) : ?>
          <tr class="profile_bank_of_account">
            <th>主要取引銀行</th>
            <td><?php echo wpautop(get_option('profile_bank_of_account')); ?></td>
          </tr>
          <?php endif; ?>
          <?php if (get_option('profile_opening_hours')) : ?>
          <tr class="profile_opening_hours">
            <th>営業時間</th>
            <td><?php echo get_option('profile_opening_hours'); ?></td>
          </tr>
          <?php endif; ?>
          <?php if (get_option('profile_holiday')) : ?>
          <tr class="profile_holiday">
            <th>定休日</th>
            <td><?php echo get_option('profile_holiday'); ?> <?php echo ('<br>'), (get_option('profile_holiday_hosoku') ) ;?></td>
          </tr>
          <?php endif; ?>
        </table>
      </div>
    </section>
    <!--gaiyou-->
    
    <?php if( post_custom('about-enkaku')) :?>
    <h2>沿革</h2>
    <section id="enkaku">
      <div class="slide-table"> <?php echo wpautop( post_custom ('about-enkaku')) ;?> </div>
    </section>
    <!--enkaku-->
    <?php endif;?>
    <section class="gaiyou anchor" id="map">
      <h2>アクセスマップ</h2>
      <div class="profile_googlemap-access"> <?php echo wpautop(get_option('profile_googlemap-access')); ?> </div>
      <?php if (get_option('profile_googlemap')) : ?>
      <div class="profile_googlemap movie-wrap"> <?php echo get_option('profile_googlemap') ; ?> </div>
      <?php else: ?>
      <div class="profile_googlemap movie-wrap">
        <iframe width="100%" height="360" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.co.jp/maps?q=<?php echo get_option('profile_address'); ?>&amp;z=17&output=embed&iwloc=B"></iframe>
      </div>
      <?php endif; ?>
      <?php if (get_option('profile_googlemap02')) : ?>
      <div class="profile_googlemap-access02" style="margin-top:2em;"> <?php echo wpautop(get_option('profile_googlemap-access02')); ?> </div>
      <div class="profile_googlemap movie-wrap"> <?php echo get_option('profile_googlemap2') ; ?> </div>
      <?php endif; ?>
    </section>
    <!--map--> 
    
  </div>
  <!-- .entry-content -->
  <?php wp_nav_menu( array('theme_location'=>'about-nav', 'fallback_cb'=>'nothing_to_do') ); ?>
  <?php get_template_part('hublog-inquiry',''); //問い合わせフック ?>
  <?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'twentytwelve' ), 'after' => '</div>' ) ); ?>
  <footer class="entry-utility page">
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
<!-- #post -->

<?php get_footer(); ?>
