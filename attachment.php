<?php
if ( ( $meta = wp_get_attachment_metadata( get_the_ID() ) ) ) {
	$file = WP_CONTENT_DIR.'/uploads/'.$meta['file'];
	header( sprintf( 'Content-type: %s', $meta['sizes']['thumbnail']['mime-type'] ) );
	header( sprintf( 'Content-Length: %d', filesize( $file ) ) );
	readfile( $file );
} else {
	header( sprintf( 'Location: %s', get_bloginfo( 'url' ) ) );
}