// post.js

jQuery(document).ready(function($){
	baseid = '#bukken-details-meta ';
	speed = 1;

	checked = $('#select-bukken-type select.tpl-custom option:selected');
	
	if ( checked.length > 0 ) {
		if ( checked[0].value == 'なし' ){
			change_custom_field('なし');
		} else {
			change_custom_field(checked[0].value);
		}
	} else {
		change_custom_field('なし');
	}
	
	$('#select-bukken-type select.tpl-custom').change(function(){
		//$(baseid).fadeOut(speed);
		change_custom_field(this.value);
		//$(baseid).fadeIn(speed);
		
		//位置調整
		m_pos = jQuery(baseid).parents('#fudo_editor_box').position();
		jQuery(window).scrollTop(m_pos.top);
	});
	
});

function change_custom_field(value){
	if ( value == 'なし' || value == '' ){
		jQuery(baseid + " .postbox").hide(speed);
	} else {
		//共通
		jQuery(baseid + "#postbox-summary").show(speed);
		jQuery(baseid + "#postbox-kakaku").show(speed);
		jQuery(baseid + "#postbox-address").show(speed);
		jQuery(baseid + "#postbox-spec_setsubi").show(speed);
		jQuery(baseid + "#postbox-spec_torihiki").show(speed);
		jQuery(baseid + "#postbox-spec_area").show(speed);
		jQuery(baseid + "#postbox-spec_note").show(speed);
		jQuery(baseid + "#postbox-spec_other").show(speed);
		jQuery(baseid + "#postbox-images").show(speed);




		//価格入力欄
		switch (value){
			case '賃貸':
			case '賃貸マンション・アパート':
			case '賃貸マンション':
			case '賃貸アパート':
			case '賃貸戸建':
				jQuery(baseid + "#postbox-kakaku").hide(speed);
				jQuery(baseid + "#postbox-chinryo").show(speed);
				jQuery(baseid + "#postbox-cost_condo").hide(speed);
				jQuery(baseid + "#postbox-cost_rent").show(speed);
				jQuery(baseid + "#postbox-kakaku-condo").hide(speed);
				jQuery(baseid + "#postbox-spec_law").hide(speed);
				jQuery(baseid + "#postbox-spec-loan").hide(speed);
				jQuery(baseid + "#postbox-feature_s").hide(speed);
				jQuery(baseid + "#postbox-feature_r").show(speed);
				jQuery(baseid + "#postbox-spec_torihiki_r").show(speed);
				break;
			default:
				jQuery(baseid + "#postbox-kakaku").show(speed);
				jQuery(baseid + "#postbox-chinryo").hide(speed);
				jQuery(baseid + "#postbox-cost_condo").show(speed);
				jQuery(baseid + "#postbox-cost_rent").hide(speed);
				jQuery(baseid + "#postbox-spec_law").show(speed);
				jQuery(baseid + "#postbox-spec-loan").show(speed);
				jQuery(baseid + "#postbox-feature_s").show(speed);
				jQuery(baseid + "#postbox-feature_r").hide(speed);

			jQuery(baseid + "#postbox-spec_torihiki_s").show(speed);


		}
		
		//建物関連
		switch (value){
			case '売買マンション':
			case '事業投資用':
			case '賃貸':
				jQuery(baseid + "#postbox-spec_tatemono").show(speed);
				jQuery(baseid + "#postbox-spec_tatemono_condo").show(speed);
				break;
			case '売買戸建':
				jQuery(baseid + "#postbox-kakaku-condo").hide(speed);
				jQuery(baseid + "#postbox-spec_tatemono").show(speed);
				jQuery(baseid + "#postbox-spec_tatemono_condo").hide(speed);
				jQuery(baseid + "#postbox-cost_condo").hide(speed);
				break;
			default:
				jQuery(baseid + "#postbox-kakaku-condo").hide(speed);
				jQuery(baseid + "#postbox-spec_tatemono").hide(speed);
				jQuery(baseid + "#postbox-spec_tatemono_condo").hide(speed);
				jQuery(baseid + "#postbox-cost_condo").hide(speed);
		}

		//土地関連
		switch (value){
			case '売買戸建':
			case '売地':
			case '土地':
			case '事業投資用':
				jQuery(baseid + "#postbox-kakaku-tochi").show(speed);
				jQuery(baseid + "#postbox-spec_tochi").show(speed);
				break;
			default:
				jQuery(baseid + "#postbox-kakaku-tochi").hide(speed);
				jQuery(baseid + "#postbox-spec_tochi").hide(speed);
		}
		
		//位置調整
		m_pos = jQuery(baseid).parents('#fudo_editor_box').position();
		jQuery(window).scrollTop(m_pos.top);
	}
}

function heibei2tsubo(h,t){
	v = jQuery(h).val();
	if ( v > 0 ){
	    jQuery(t).val( Math.round(v*30.25)/100 );
	}
}
