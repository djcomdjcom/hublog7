<?php
// 繰り返しグループのデータを取得
$timeline_set = SCF::get('timeline_set'); // timeline_setは繰り返しグループ名

if (!empty($timeline_set)) : ?>
    <ul class="timeline_set pl-0">
        <?php foreach ($timeline_set as $timeline_item) : ?>
            <li>
                <span class="timeline_date ttl"><?php echo esc_html($timeline_item['timeline_date']); ?></span>
                <span class="timeline_content"><?php echo esc_html($timeline_item['timeline_content']); ?></span>
            </li>
        <?php endforeach; ?>
    </ul>
<?php else : ?>
<?php endif; ?>
