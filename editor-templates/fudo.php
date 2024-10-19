<?php 
/**
 * Editor Template
 */
?>

<div id="bukken-details-meta">
	<div id="select-bukken-type">
		<?php
		$args = array(
			'label'    => '物件種別',
			'meta_key' => 'bukken-type',
			'type'     => 'select',
			'items'    => array('',
							'売買戸建', 
							'売買マンション', 
							'売地',
							'賃貸',
							),
		);
		tpl_custom( $args );
		?>
		<span>&nbsp;の物件情報を入力する</span>
	</div>
	
	<div id="customfield-bukken" style="margin-top:10px;">
	
		<?php hublog_cftemplate(); ?>
	
	</div>	
	
</div>



