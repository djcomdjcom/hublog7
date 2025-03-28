
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
	
	

<?php if ( (get_option('profile_main_tel_hide')) || ( get_option('profile_inquiry_tel_hide')) ) : ?>
	
<?php else:?>
<tr class="profile_main_tel">
<th>電話番号</th>
<td>
<?php if (get_option('profile_inquiry_tel')) : ?>
<span class="d-inline-block mr-3">問い合わせ窓口：<?php echo (get_option('profile_inquiry_tel')) ; ?></span>
<?php endif;?>
<?php if (get_option('profile_main_tel')): ?>
<span class="d-inline-block">代表：<?php echo get_option('profile_main_tel'); ?></span>
<?php endif;?>
</td>
</tr>

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
