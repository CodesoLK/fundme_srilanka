<?php
defined( 'ABSPATH' ) || exit;
global $post;
if ( ! $post->post_excerpt ) {
    return;
}
?>
<div style="clear: both"></div>