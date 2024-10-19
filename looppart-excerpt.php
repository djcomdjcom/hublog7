<?php
/**
 * looppart-excerpt.php
 */
?>			



			<article id="post-<?php the_ID(); ?>" class="post clearfix">

				<a href="<?php the_permalink(); ?>" title="<?php printf(__('Permanent Link to %s'), the_title_attribute('echo=0')); ?>" class="thumbnail">

					<?php	$thumbnail = get_the_post_thumbnail(get_the_ID(), 'thumbnail');
					if ( empty($thumbnail) ) :
						?><span class="noimg"></span><?php
					else :
						echo $thumbnail;
					endif; ?>
				</a>
				
				<header class="entry-header">
					<h1 class="entry-title"><span><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></span></h1>
				</header>
		
				<div class="entry-content">
					<?php the_excerpt(); ?>
					<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'twentytwelve' ), 'after' => '</div>' ) ); ?>
				</div><!-- .entry-content -->
		
				<footer class="entry-meta">
					<?php edit_post_link( __( 'Edit', 'twentytwelve' ), '<span class="edit-link">', '</span>' ); ?>
				</footer><!-- .entry-meta -->
	
			</article><!-- #post-ID -->

