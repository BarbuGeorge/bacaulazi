<?php
// Load Fonts
function diwp_include_font_awesome_styles()
{
	wp_enqueue_style('font-awesome-style', get_template_directory_uri() . '/assets/fontawesome-free-6.1.1-web/css/all.css');
}

add_action('wp_enqueue_scripts', 'diwp_include_font_awesome_styles');


function centroroastery_enqueue_scripts()
{
	// all scripts
	wp_enqueue_script('bootstrap', get_template_directory_uri() . '/assets/bootstrap-5.3/dist/js/bootstrap.min.js', array());
}
add_action('wp_enqueue_scripts', 'centroroastery_enqueue_scripts');



// Menus
function wpb_custom_new_menu()
{
	register_nav_menu('my-custom-menu', __('My Custom Menu'));
}
add_action('init', 'wpb_custom_new_menu');

register_nav_menus(
	array(
		'top-menu' => 'Top Menu Location',
		'top-menu-mobile' => 'Top Menu Mobile',
		'footer-menu' => 'Footer Menu Location',
	)
);


add_theme_support('menus');
add_theme_support(
	'custom-logo',
	array(
		'flex-height'          => true,
		'flex-width'           => true,
		'unlink-homepage-logo' => true,
	)
);



// Add Thumbnails
add_theme_support('post-thumbnails');



// CPT Textnode
function custom_post_type()
{

	// Set UI labels for Custom Post Type
	$labels = array(
		'name'                => _x('Text Nodes', 'Post Type General Name', 'UvtTheme'),
		'singular_name'       => _x('Text Node', 'Post Type Singular Name', 'UvtTheme'),
		'menu_name'           => __('Text Nodes', 'UvtTheme'),
		'parent_item_colon'   => __('Parent TextNode', 'UvtTheme'),
		'all_items'           => __('All Text Nodes', 'UvtTheme'),
		'view_item'           => __('View Text Node', 'UvtTheme'),
		'add_new_item'        => __('Add New Text Node', 'UvtTheme'),
		'add_new'             => __('Add New', 'UvtTheme'),
		'edit_item'           => __('Edit Text Node', 'UvtTheme'),
		'update_item'         => __('Update Text Node', 'UvtTheme'),
		'search_items'        => __('Search Text Node', 'UvtTheme'),
		'not_found'           => __('Not Found', 'UvtTheme'),
		'not_found_in_trash'  => __('Not found in Trash', 'UvtTheme'),
	);

	// Set other options for Custom Post Type

	$args = array(
		'label'               => __('TextNodes', 'UvtTheme'),
		'description'         => __('TextNode', 'UvtTheme'),
		'labels'              => $labels,

		'supports'            => array('title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields',),

		'taxonomies'          => array('textnode-category'),

		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 5,
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'post',
		'show_in_rest' => true,

	);

	// Registering your Custom Post Type
	register_post_type('textnode', $args);
}

// Shortcode textnodes
function textnode($post_name)
{
	$query = new WP_Query(array(
		'post_type' => 'textnode',
		'post_status' => 'publish',
		'name' => $post_name
	));

	if (!$query->have_posts()) {
		return null;
	}

	$query->the_post();

	$content = get_the_content();

	wp_reset_postdata();

	return $content;
}

/* Hook into the 'init' action so that the function
    * Containing our post type registration is not
    * unnecessarily executed.
    */

add_action('init', 'custom_post_type', 0);



// Change "Posts" to "Articles"
function change_post_menu_label()
{
	global $menu;
	global $submenu;
	$menu[5][0] = 'Articles';
	$submenu['edit.php'][5][0] = 'All Articles';
	$submenu['edit.php'][10][0] = 'Add News Article';
	$submenu['edit.php'][16][0] = 'Tags';
	echo '';
}
add_action('admin_menu', 'change_post_menu_label');
function change_post_object_label()
{
	global $wp_post_types;
	$labels = &$wp_post_types['post']->labels;
	$labels->name = 'Articles';
	$labels->singular_name = 'Article';
	$labels->add_new = 'Add New Article';
	$labels->add_new_item = 'Add New Article';
	$labels->edit_item = 'Edit Article';
	$labels->new_item = 'New Article';
	$labels->view_item = 'View Article';
	$labels->search_items = 'Search Articles';
	$labels->not_found = 'No Articles found';
	$labels->not_found_in_trash = 'No Articles found in Trash';
}
add_action('init', 'change_post_object_label');

// Add cart Icon
add_shortcode ('woocommerce_cart_icon', 'woo_cart_icon' );
function woo_cart_icon() {
    ob_start();

        $cart_count = WC()->cart->cart_contents_count; // Set variable for cart item count
        $cart_url = wc_get_cart_url();  // Set variable for Cart URL

        echo '<a class="menu-item cart-contents" href="'.$cart_url.'" title="Cart">';

        if ( $cart_count > 0 ) {

            echo '<span class="cart-contents-count">'.$cart_count.'</span>';

        }

        echo '</a>';


    return ob_get_clean();

}
add_filter( 'woocommerce_add_to_cart_fragments', 'woo_cart_icon_count' );
function woo_cart_icon_count( $fragments ) {

    ob_start();

    $cart_count = WC()->cart->cart_contents_count;
    $cart_url = wc_get_cart_url();


    echo '<a class="cart-contents menu-item" href="'.$cart_url.'" title="View Cart">';

    if ( $cart_count > 0 ) {

        echo '<span class="cart-contents-count">'.$cart_count.'</span>';

    }
    echo '</a>';

    $fragments['a.cart-contents'] = ob_get_clean();

    return $fragments;
}


// Back Button
add_action('back_button', 'wpse221640_back_button');
function wpse221640_back_button()
{
	if (wp_get_referer()) {
		$back_text = __('<i class="fa-solid fa-arrow-left pe-2"></i> Inapoi');
		$button    = "\n<button id='my-back-button' class='btn btn-back single-page-post-back-btn btn-md bg-transparent text-uppercase fw-bold mt-5 p-0 button my-back-button' onclick='javascript:history.back()'>$back_text</button>";
		echo ($button);
	}
}

// Year

function currentYear(){
	return date('Y');
}

// Get rid of smthing in wp7
add_filter('wpcf7_form_elements', function($content) {
    $content = preg_replace('/<(span).*?class="\s*(?:.*\s)?wpcf7-form-control-wrap(?:\s[^"]+)?\s*"[^\>]*>(.*)<\/\1>/i', '\2', $content);

    return $content;
});

