


<div id="addcontent-gallery" class="gallery clearfix">

		<div id="gallery-set" class="clearfix">
			<?php targetable_gallery('thumbnail', array(650,450), 'onmouseover', true); ?>
		</div>

</div><!--addcontent-gallery-->		


<article id="example-slider" class="clearfix">
	<section id="galleryslider" class="clearfix">
	<?php //echo (do_shortcode('[gallery link="none" title="false" caption="true" description="true" size="large"  type="flexslider"]')); ?>
	</section><!--　-->
</article><!--example-slider-->

<?php if (post_custom ('example-C') || post_custom ('example-Q') || post_custom ('example-UA') || post_custom ('example-menseki'))  :?>
<div class="clearfix example-meta spec">
	<?php if (post_custom('example-C')) :?>
	<span class="example-c"> <span class="title">C値：</span><span class="number"><?php echo post_custom('example-C'); ?></span> </span>
	<?php endif ;?>
	<?php if (post_custom('example-Q')) :?>
	<span class="example-q"> <span class="title">Q値：</span><span class="number"><?php echo post_custom('example-Q'); ?></span> </span>
	<?php endif ;?>
	<?php if (post_custom('example-UA')) :?>
	<span class="example-ua"> <span class="title">UA値：</span><span class="number"><?php echo post_custom('example-UA'); ?></span> </span>
	<?php endif ;?>
	<?php if (post_custom('example-menseki')) :?>
	<span class="example-menseki"> <span class="title">建築面積：</span><span class="number"><?php echo post_custom('example-menseki'); ?></span> </span>
	<?php endif ;?>
</div>
<?php endif ;?>



            
				<?php if (post_custom('01example-image')) : ?>
                <div class="example01 example-set clearfix">
                    <div class="example-image rel_lb">
					<?php if ( post_custom('01example-image') ) : ?>
					<?php echo wp_get_attachment_link(get_field('01example'),array(500, 500));?>
					<?php endif; ?>
                       
                    </div><!--voive-image-->
                    <div class="example">
                    </div><!--example-->
                </div><!--example01-->
				<?php endif //01 ?>
             
    
				<?php if (post_custom('02example-image')) : ?>
                <div class="example02 example-set clearfix">
    
    
                    <div class="example-image rel_lb">
                        <?php if (post_custom('02example-image')) :
            
                        $imgtag = post_custom('02example-image'); ?>
    
                        <?php if ( class_exists('ShadowboxFrontend') ) {
                        $shadowbox = new ShadowboxFrontend;
                        echo $shadowbox->add_attr_to_link($imgtag);
                        } else  {
                        echo $imgtag;
                        } ?>
                        <?php endif //02 ?>
                    </div><!--voive-image-->
                    <div class="example">
                    	<h3><?php echo wpautop(post_custom('02example-title')); ?></h3>
                        <?php echo wpautop(post_custom('02example-subject')); ?>
                    </div><!--example-->
                </div><!--example02-->
				<?php endif //02 ?>
    

				<?php if (post_custom('03example-image')) : ?>
                <div class="example03 example-set clearfix">
    
                    <div class="example-image rel_lb">
                        <?php if (post_custom('03example-image')) :
            
                        $imgtag = post_custom('03example-image'); ?>
    
                        <?php if ( class_exists('ShadowboxFrontend') ) {
                        $shadowbox = new ShadowboxFrontend;
                        echo $shadowbox->add_attr_to_link($imgtag);
                        } else  {
                        echo $imgtag;
                        } ?>
                        <?php endif //03 ?>
                    </div><!--voive-image-->
                    
                    <div class="example">
                    	<h3><?php echo wpautop(post_custom('03example-title')); ?></h3>
                        <?php echo wpautop(post_custom('03example-subject')); ?>
                    </div><!--example-->
                </div><!--example03-->
				<?php endif //03 ?>
        
    

    				<?php if (post_custom('04example-image')) : ?>
                <div class="example04 example-set clearfix">
    
                    <div class="example-image rel_lb">
                        <?php if (post_custom('04example-image')) :
            
                        $imgtag = post_custom('04example-image'); ?>
    
                        <?php if ( class_exists('ShadowboxFrontend') ) {
                        $shadowbox = new ShadowboxFrontend;
                        echo $shadowbox->add_attr_to_link($imgtag);
                        } else  {
                        echo $imgtag;
                        } ?>
                        <?php endif //04 ?>
                    </div><!--voive-image-->
                    
                    <div class="example">
                    	<h3><?php echo wpautop(post_custom('04example-title')); ?></h3>
                        <?php echo wpautop(post_custom('04example-subject')); ?>
                    </div><!--example-->
                </div><!--example04-->
				<?php endif //04 ?>
        
				<?php if (post_custom('05example-image')) : ?>
                <div class="example05 example-set clearfix">
    
                    <div class="example-image rel_lb">
                        <?php if (post_custom('05example-image')) :
            
                        $imgtag = post_custom('05example-image'); ?>
    
                        <?php if ( class_exists('ShadowboxFrontend') ) {
                        $shadowbox = new ShadowboxFrontend;
                        echo $shadowbox->add_attr_to_link($imgtag);
                        } else  {
                        echo $imgtag;
                        } ?>
                        <?php endif //05 ?>
                    </div><!--voive-image-->
                    
                    <div class="example">
                    	<h3><?php echo wpautop(post_custom('05example-title')); ?></h3>
                        <?php echo wpautop(post_custom('05example-subject')); ?>
                    </div><!--example-->
                </div><!--example05-->
				<?php endif //05 ?>
        
