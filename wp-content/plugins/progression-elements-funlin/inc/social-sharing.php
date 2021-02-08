<?php

function progression_studios_skrn_social_customizer( $wp_customize ) {
	


	

   /* Section - Blog - Post Options */
 	$wp_customize->add_setting( 'progression_single_sharing_twitter' ,array(
 		'default' =>  '1',
 		'sanitize_callback' => 'progression_studios_sanitize_choices',
 	) );
 	$wp_customize->add_control( 'progression_single_sharing_twitter', array(
 		'label'          => esc_html__( 'Twitter Sharing', 'progression-elements-funlin' ),
 		'section' => 'tt_font_progression-studios-shop-styles',
 		'type' => 'checkbox',
 		'priority'   => 2605,
 		)
	
 	);
	

   /* Section - Blog - Post Options */
 	$wp_customize->add_setting( 'progression_single_sharing_facebook' ,array(
 		'default' =>  '1',
 		'sanitize_callback' => 'progression_studios_sanitize_choices',
 	) );
 	$wp_customize->add_control( 'progression_single_sharing_facebook', array(
 		'label'          => esc_html__( 'Facebook Sharing', 'progression-elements-funlin' ),
 		'section' => 'tt_font_progression-studios-shop-styles',
 		'type' => 'checkbox',
 		'priority'   => 2609,
 		)
	
 	);
	
	
	
   /* Section - Blog - Post Options */
 	$wp_customize->add_setting( 'progression_single_sharing_pinterest' ,array(
 		'sanitize_callback' => 'progression_studios_sanitize_choices',
 	) );
 	$wp_customize->add_control( 'progression_single_sharing_pinterest', array(
 		'label'          => esc_html__( 'Pinterest Sharing', 'progression-elements-funlin' ),
 		'section' => 'tt_font_progression-studios-shop-styles',
 		'type' => 'checkbox',
 		'priority'   => 2615,
 		)
	
 	);
	
   /* Section - Blog - Post Options */
 	$wp_customize->add_setting( 'progression_single_sharing_vk' ,array(
 		'sanitize_callback' => 'progression_studios_sanitize_choices',
 	) );
 	$wp_customize->add_control( 'progression_single_sharing_vk', array(
 		'label'          => esc_html__( 'VK Sharing', 'progression-elements-funlin' ),
 		'section' => 'tt_font_progression-studios-shop-styles',
 		'type' => 'checkbox',
 		'priority'   => 2620,
 		)
	
 	);
	
	
	
   /* Section - Blog - Post Options */
 	$wp_customize->add_setting( 'progression_single_sharing_google' ,array(
 		'sanitize_callback' => 'progression_studios_sanitize_choices',
 	) );
 	$wp_customize->add_control( 'progression_single_sharing_google', array(
 		'label'          => esc_html__( 'Google+ Sharing', 'progression-elements-funlin' ),
 		'section' => 'tt_font_progression-studios-shop-styles',
 		'type' => 'checkbox',
 		'priority'   => 2620,
 		)
	
 	);
	
	
   /* Section - Blog - Post Options */
 	$wp_customize->add_setting( 'progression_single_sharing_reddit' ,array(
		'default' =>  '1',
 		'sanitize_callback' => 'progression_studios_sanitize_choices',
 	) );
 	$wp_customize->add_control( 'progression_single_sharing_reddit', array(
 		'label'          => esc_html__( 'Reddit Sharing', 'progression-elements-funlin' ),
 		'section' => 'tt_font_progression-studios-shop-styles',
 		'type' => 'checkbox',
 		'priority'   => 2625,
 		)
	
 	);
	
	
   /* Section - Blog - Post Options */
 	$wp_customize->add_setting( 'progression_single_sharing_linkedin' ,array(
 		'sanitize_callback' => 'progression_studios_sanitize_choices',
 	) );
 	$wp_customize->add_control( 'progression_single_sharing_linkedin', array(
 		'label'          => esc_html__( 'LinkedIn Sharing', 'progression-elements-funlin' ),
 		'section' => 'tt_font_progression-studios-shop-styles',
 		'type' => 'checkbox',
 		'priority'   => 2630,
 		)
	
 	);
	
   /* Section - Blog - Post Options */
 	$wp_customize->add_setting( 'progression_single_sharing_tumblr' ,array(
 		'sanitize_callback' => 'progression_studios_sanitize_choices',
 	) );
 	$wp_customize->add_control( 'progression_single_sharing_tumblr', array(
 		'label'          => esc_html__( 'Tumblr Sharing', 'progression-elements-funlin' ),
 		'section' => 'tt_font_progression-studios-shop-styles',
 		'type' => 'checkbox',
 		'priority'   => 2635,
 		)
	
 	);
	
   /* Section - Blog - Post Options */
 	$wp_customize->add_setting( 'progression_single_sharing_stumble' ,array(
 		'sanitize_callback' => 'progression_studios_sanitize_choices',
 	) );
 	$wp_customize->add_control( 'progression_single_sharing_stumble', array(
 		'label'          => esc_html__( 'StumbleUpon Sharing', 'progression-elements-funlin' ),
 		'section' => 'tt_font_progression-studios-shop-styles',
 		'type' => 'checkbox',
 		'priority'   => 2638,
 		)
	
 	);
	
   /* Section - Blog - Post Options */
 	$wp_customize->add_setting( 'progression_single_sharing_mail' ,array(
 		'default' =>  '1',
 		'sanitize_callback' => 'progression_studios_sanitize_choices',
 	) );
 	$wp_customize->add_control( 'progression_single_sharing_mail', array(
 		'label'          => esc_html__( 'Email Sharing', 'progression-elements-funlin' ),
 		'section' => 'tt_font_progression-studios-shop-styles',
 		'type' => 'checkbox',
 		'priority'   => 2640,
 		)
	
 	);
  
	
}
add_action( 'customize_register', 'progression_studios_skrn_social_customizer' );



//no-HTML text
function progression_studios_skrn_sanitize_elements_choices( $input ) {
	return wp_filter_nohtml_kses( $input );
}




if ( ! function_exists( 'progression_studios_elements_social_sharing' ) ) {

function progression_studios_elements_social_sharing() {
?>
	<?php if (get_theme_mod( 'progression_studios_blog_post_sharing', 'on') == 'on') : ?>
			<ul id="blog-single-social-sharing" class="noselect">
				
				<?php if (get_theme_mod( 'progression_single_sharing_facebook', '1')) : ?><li><a href="http://www.facebook.com/sharer.php?u=<?php echo urlencode(the_permalink()); ?>&t=<?php echo htmlspecialchars(urlencode(html_entity_decode(get_the_title(), ENT_COMPAT, 'UTF-8')), ENT_COMPAT, 'UTF-8'); ?>" title="<?php esc_html_e( 'Share on Facebook', 'progression-elements-funlin' ); ?>" class="facebook-share" target="_blank"><i class="fab fa-facebook-square"></i><span class="blog-single-sharing-text"><?php echo esc_html__( 'Share on Facebook', 'progression-elements-funlin' ); ?></span></a></li>
				<?php endif; ?>
				
				<?php if (get_theme_mod( 'progression_single_sharing_twitter', '1')) : ?><li><a href="https://twitter.com/share?text=<?php echo htmlspecialchars(urlencode(html_entity_decode(get_the_title(), ENT_COMPAT, 'UTF-8')), ENT_COMPAT, 'UTF-8'); ?>&url=<?php echo urlencode(the_permalink()); ?>" title="<?php esc_html_e( 'Twitter', 'progression-elements-funlin' ); ?>" class="twitter-share" target="_blank"><i class="fab fa-twitter"></i><span class="blog-single-sharing-text"><?php echo esc_html__( 'Share on Twitter', 'progression-elements-funlin' ); ?></span></a></li>
				<?php endif; ?>
			
	
			
				<?php if (get_theme_mod( 'progression_single_sharing_pinterest')) : ?><li><a href="javascript:void((function()%7Bvar%20e=document.createElement(&apos;script&apos;);e.setAttribute(&apos;type&apos;,&apos;text/javascript&apos;);e.setAttribute(&apos;charset&apos;,&apos;UTF-8&apos;);e.setAttribute(&apos;src&apos;,&apos;//assets.pinterest.com/js/pinmarklet.js?r=&apos;+Math.random()*99999999);document.body.appendChild(e)%7D)());" title="<?php esc_html_e( 'Share on Pinterest', 'progression-elements-funlin' ); ?>" class="pinterest-share"><i class="fab fa-pinterest"></i><span class="blog-single-sharing-text"><?php echo esc_html__( 'Share on Pinterest', 'progression-elements-funlin' ); ?></span></a></li>
				<?php endif; ?>
	
				<?php if (get_theme_mod( 'progression_single_sharing_vk')) : ?><li><a href="http://vkontakte.ru/share.php?url=<?php echo urlencode(the_permalink()); ?>" title="<?php esc_html_e( 'Share on VK', 'progression-elements-funlin' ); ?>" class="vk-share" target="_blank"><i class="fab fa-vk"></i><span class="blog-single-sharing-text"><?php echo esc_html__( 'Share on VK', 'progression-elements-funlin' ); ?></span></a></li>
				<?php endif; ?>
	
				<?php if (get_theme_mod( 'progression_single_sharing_google')) : ?><li><a href="https://plus.google.com/share?url=<?php echo urlencode(the_permalink()); ?>" title="<?php esc_html_e( 'Share on Google+', 'progression-elements-funlin' ); ?>" class="google-share" target="_blank"><i class="fab fa-google-plus-g"></i><span class="blog-single-sharing-text"><?php echo esc_html__( 'Share on Google+', 'progression-elements-funlin' ); ?></span></a></li>
				<?php endif; ?>

				<?php if (get_theme_mod( 'progression_single_sharing_reddit', '1')) : ?><li><a href="http://reddit.com/submit?url=<?php echo urlencode(the_permalink()); ?>&amp;title=<?php echo htmlspecialchars(urlencode(html_entity_decode(get_the_title(), ENT_COMPAT, 'UTF-8')), ENT_COMPAT, 'UTF-8'); ?>" title="<?php esc_html_e( 'Share on Reddit', 'progression-elements-funlin' ); ?>" class="reddit-share" target="_blank"><i class="fab fa-reddit"></i><span class="blog-single-sharing-text"><?php echo esc_html__( 'Share on Reddit', 'progression-elements-funlin' ); ?></span></a></li>
				<?php endif; ?>
	
				<?php if (get_theme_mod( 'progression_single_sharing_linkedin')) : ?><li><a href="http://www.linkedin.com/shareArticle?mini=true&amp;url=<?php echo urlencode(the_permalink()); ?>" title="<?php esc_html_e( 'Share on LinkedIn', 'progression-elements-funlin' ); ?>" class="linkedin-share" target="_blank"><i class="fab fa-linkedin"></i><span class="blog-single-sharing-text"><?php echo esc_html__( 'Share on LinkedIn', 'progression-elements-funlin' ); ?></span></a></li>
				<?php endif; ?>
	
				<?php if (get_theme_mod( 'progression_single_sharing_tumblr')) : ?><li><a href="http://www.tumblr.com/share/link?url=<?php echo urlencode(the_permalink()); ?>&amp;title=<?php echo htmlspecialchars(urlencode(html_entity_decode(get_the_title(), ENT_COMPAT, 'UTF-8')), ENT_COMPAT, 'UTF-8'); ?>" title="<?php esc_html_e( 'Share on Tumblr', 'progression-elements-funlin' ); ?>" class="tumblr-share" target="_blank"><i class="fab fa-tumblr"></i><span class="blog-single-sharing-text"><?php echo esc_html__( 'Share on Tumblr', 'progression-elements-funlin' ); ?></span></a></li>
				<?php endif; ?>

				<?php if (get_theme_mod( 'progression_single_sharing_stumble')) : ?><li><a href="http://www.stumbleupon.com/submit?url=<?php echo urlencode(the_permalink()); ?>&amp;title=<?php echo htmlspecialchars(urlencode(html_entity_decode(get_the_title(), ENT_COMPAT, 'UTF-8')), ENT_COMPAT, 'UTF-8'); ?>" title="<?php esc_html_e( 'Share on StumbleUpon', 'progression-elements-funlin' ); ?>" class="stumble-share" target="_blank"><i class="fab fa-stumbleupon-circle"></i><span class="blog-single-sharing-text"><?php echo esc_html__( 'Share on StumbleUpon', 'progression-elements-funlin' ); ?></span></a></li>
				<?php endif; ?>
	
				<?php if (get_theme_mod( 'progression_single_sharing_mail', '1')) : ?><li><a href="mailto:?subject=<?php echo htmlspecialchars(urlencode(html_entity_decode(get_the_title(), ENT_COMPAT, 'UTF-8')), ENT_COMPAT, 'UTF-8'); ?>&amp;body=<?php echo urlencode(the_permalink()); ?>" title="<?php esc_html_e( 'Share on E-mail', 'progression-elements-funlin' ); ?>" class="mail-share"><i class="fas fa-envelope"></i><span class="blog-single-sharing-text"><?php echo esc_html__( 'Email', 'progression-elements-funlin' ); ?></span></a></li>
				<?php endif; ?>
	
			</ul>
		<div class="clearfix-pro"></div>
	<?php endif; ?>
<?php
}
  
}