<?php
//When a post is deleted, the attachments should be deleted too.
add_action( 'before_delete_post', 'wps_remove_attachment_with_post', 10 );
function wps_remove_attachment_with_post($post_id)
{
	$post = get_post($post_id);
	$attachments = get_attached_media( '', $post);
	if ( 'post' === $post->post_type ) {
		
		foreach ($attachments as $attachment) {
			wp_delete_attachment( $attachment->ID, 'true' );
		}
		
	}

}
?>