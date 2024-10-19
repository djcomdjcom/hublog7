<?php
/*
Plugin name: widget looppart
*/

if ( !class_exists( 'Get_Template_Part_Widget' ) ):
  class Get_Template_Part_Widget extends WP_Widget {
    var $name; //This widg

    function __construct() {
      parent::__construct( false, $this->name = __( 'Get Template Part' ) );
    }

    function widget( $args, $instance ) {
      global $searef_admin;
      $defaults = array(
        'title' => $this->name,
        'slug' => '',
        'name' => '',
      );
      $r = wp_parse_args( $instance, $defaults );
      extract( $r, EXTR_SKIP );
      $title = apply_filters( 'widget_title', $title );

      if ( empty( $slug ) ) {
        return;
      }

      get_template_part( esc_attr( $slug ), esc_attr( $name ) );
    }

    function form( $instance ) {
      $defaults = array(
        'title' => '',
        'slug' => '',
        'name' => '',
      );
      $r = wp_parse_args( $instance, $defaults );
      extract( $r, EXTR_SKIP );

      ?>
<?php $_opt = 'title'; ?>
<label for="<?php echo $this->get_field_id($_opt); ?>">
<?php _e('Title'); ?>
:
<input class="" id="<?php echo $this->get_field_id($_opt); ?>" name="<?php echo $this->get_field_name($_opt); ?>" type="text" size="26" value="<?php echo ${$_opt}; ?>" />
<div style="">
  <?php $_opt = 'slug'; ?>
  <input class="" id="<?php echo $this->get_field_id($_opt); ?>" name="<?php echo $this->get_field_name($_opt); ?>" type="text" size="6" value="<?php echo ${$_opt}; ?>" />
  -
  <?php $_opt = 'name'; ?>
  <input class="" id="<?php echo $this->get_field_id($_opt); ?>" name="<?php echo $this->get_field_name($_opt); ?>" type="text" size="6" value="<?php echo ${$_opt}; ?>" />
  .php </div>
<?php
}

function update( $new_instance, $old_instance ) {
  $new_instance[ 'slug' ] = $this->strip_symbols( $new_instance[ 'slug' ] );
  $new_instance[ 'name' ] = $this->strip_symbols( $new_instance[ 'name' ] );
  return $new_instance;
}

function strip_symbols( $value ) {
  $v = strip_tags( $value );
  $v = stripslashes_deep( stripslashes_deep( $v ) );
  $v = preg_replace( '/[ \t\/]*/', '', $v );
  return trim( $v );
}
}
add_filter( 'widgets_init', function ( $a ) {
  return 'return register_widget("Get_Template_Part_Widget");';
} );

endif;
?>