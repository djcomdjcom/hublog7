<?php
/**
 * addcontent-voice.php
 *
 * @テーマ名	gatten
 * @更新日付	2012.02.15
 *
 */
?>
<div id="voice-content" class="clearfix cleartype">
  <?php if (post_custom('voice-image-scanned')) : ?>
  <div class="voice-scanned voice-set rel_lb break clearfix"> <a href="<?php echo post_custom('voice-scanned-pdf'); ?>" target="_blank"> <img src="<?php echo post_custom('voice-image-scanned'); ?>" /> </a> </div>
  <!--voice-scanned-->
  <?php endif  ?>
	

	<?php
// Smart Custom Fields でフィールドを取得
$voice_fields = SCF::get( 'voice_set' ); // グループ名を適宜変更してください

if ( !empty( $voice_fields ) ) {
    $counter = 1; // クラス名に使用するカウンター
    foreach ( $voice_fields as $voice_field ) {
        $voice_title = esc_html( $voice_field['voice-title'] );
        $voice_text = wp_kses_post( $voice_field['voice'] );
        
        // 各フィールドが空でない場合にのみ表示
        if ( !empty( $voice_title ) && !empty( $voice_text ) ) {
            echo '<div class="voice-set voice' . sprintf( "%02d", $counter ) . '">';
            echo '<h3>' . $voice_title . '</h3>';
            echo '<div class="voice">' . $voice_text . '</div>';
            echo '</div>';
            
            $counter++; // カウンターをインクリメント
        }
    }
}
?>

	
</div>
<!--voice-content--> 

