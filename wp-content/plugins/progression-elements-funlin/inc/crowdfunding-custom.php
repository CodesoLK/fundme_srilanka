<?php


/* Redirect at Login */
function funlin_progression_login_redirect( $redirect, $user ) {
$redirect_page_id = url_to_postid( $redirect );
$checkout_page_id = wc_get_page_id( 'checkout' );

if( $redirect_page_id == $checkout_page_id ) {
return $redirect;
}

return wc_get_page_permalink( 'shop' );
}

add_filter( 'woocommerce_login_redirect', 'funlin_progression_login_redirect', 10, 2 );










