
<?php
/**
 * icon-features.php
 * 各物件の特徴等をアイコン表示するためのパーツ
 */

$postmetas = get_post_meta($post->ID,'');
$features  = array('recommend', 'type', 'feature', 'feature_r', 'feature_s');
?>

	<ul class="icons">
    	
    	<?php
        foreach ( $features as $metakey ) :
			foreach ( (array)get_post_meta(get_the_ID(),$metakey) as $meta_value ) : 
				$icon = get_template_image('icon_' . $meta_value, 'png', 'images/'); 
				if ( $meta_value ) :
					?><li class="<?php echo $metakey; ?> <?php echo $meta_value; ?>"><img src="<?php echo $icon; ?>" alt="<?php echo $meta_value; ?>"/></li><?php
				endif;
            endforeach;
		endforeach; ?>
        
    </ul>

