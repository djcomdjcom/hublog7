<?php
// 繰り返しグループのデータを取得
$timeline_set = SCF::get('business_set'); 

if (!empty($timeline_set)) : ?>
    <ul class="business_set pl-0">
        <?php foreach ($timeline_set as $timeline_item) : ?>
            <li>
                <span class="business_ttl ttl"><?php echo esc_html($timeline_item['business_ttl']); ?></span>
                <span class="business_description"><?php echo esc_html($timeline_item['business_description']); ?></span>
            </li>
        <?php endforeach; ?>
    </ul>
<?php else : ?>
<?php endif; ?>
