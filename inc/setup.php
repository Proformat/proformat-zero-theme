<?php
add_action( 'admin_notices', 'warn_if_breakdance_is_disabled' );
function warn_if_breakdance_is_disabled() {
	if (defined('__BREAKDANCE_DIR__')){
		return;
	}
?>
<div class="notice notice-error is-dismissible">
	<p>You're using Proformat Theme but Breakdance is not enabled. This isn't supported.</p>
</div>
<?php
}

//THEME SUPPORTS
add_theme_support( 'title-tag' );
add_theme_support( 'post-thumbnails' );

//Enqueue styles
function declare_styles() {
	wp_enqueue_style('reet-styles', get_template_directory_uri() . '/assets/css/reset.css', array(), false);
}

add_action('wp_enqueue_scripts', 'declare_styles', 0);


//Remove Gutenberg and let ACF disable editor supports
add_filter('use_block_editor_for_post', '__return_false', 10);

//Customize WYSYWIG Editor
function remove_headings($args) {
	$args['block_formats'] = 'Paragraph=p;Heading 2=h2';
	return $args;
}
add_filter('tiny_mce_before_init', 'remove_headings' );

