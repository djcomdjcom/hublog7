<?php
/**
 * looppart-bukken-list.php
 */
?>			


			<article id="post-<?php the_ID(); ?>" class="post clearfix style-bukkenlist">
				<?php if ( is_new( WHATSNEW_TTL ) ) : ?>
				<span class="tmb-icon new">新着</span>
				<?php endif; ?>

                <span class="date"><?php the_time('Y/n/j') ?></span>
                <h2 class="title">

                <a href="<?php the_permalink() ?>" rel="bookmark" title="<?php printf(__('Permanent Link to %s'), the_title_attribute('echo=0')); ?>">

                <?php the_title(); ?></a>

                </h2>

	
			</article><!-- #post -->

