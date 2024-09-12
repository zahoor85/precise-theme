<?php
if (function_exists('add_theme_support')) {
    add_theme_support('post-thumbnails');
    add_image_size('precise_portfolio_thumb', 263, 263, true);
    add_image_size('precise_portfolio_main', 650, 650, true);
}
/*******************************************************************
 * Register Post Type
 ********************************************************************/
function precise_portfolio_post_type()
{
    $labels = array(
        'name'               => _x('Portfolio', 'post type general name', 'precisecodes'),
        'singular_name'      => _x('Portfolio', 'post type singular name', 'precisecodes'),
        'menu_name'          => _x('Portfolio', 'admin menu', 'precisecodes'),
        'name_admin_bar'     => _x('Portfolio', 'add new on admin bar', 'precisecodes'),
        'add_new'            => _x('Add New', 'portfolio', 'precisecodes'),
        'add_new_item'       => __('Add New Portfolio', 'precisecodes'),
        'new_item'           => __('New Portfolio', 'precisecodes'),
        'edit_item'          => __('Edit Portfolio', 'precisecodes'),
        'view_item'          => __('View Portfolio', 'precisecodes'),
        'all_items'          => __('All Portfolio', 'precisecodes'),
        'search_items'       => __('Search Portfolio', 'precisecodes'),
        'parent_item_colon'  => __('Parent Portfolio:', 'precisecodes'),
        'not_found'          => __('No portfolio found.', 'precisecodes'),
        'not_found_in_trash' => __('No portfolio found in Trash.', 'precisecodes')
    );

    $args = array(
        'labels'              => $labels,
        'public'              => false,
        'exclude_from_search' => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'query_var'           => true,
        'rewrite'             => array('slug' => 'portfolio', "with_front" => true),
        'capability_type'     => 'post',
        'has_archive'         => false,
        'hierarchical'        => false,
        'menu_position'       => null,
        'supports'            => array('title', 'excerpt', 'editor', 'thumbnail', 'page-attributes')
    );

    register_post_type('portfolio', $args);

        $labels = array(
            'name'              => _x('Categories', 'taxonomy general name', 'precisecodes'),
            'singular_name'     => _x('Category', 'taxonomy singular name', 'precisecodes'),
            'search_items'      => __('Search Categories', 'precisecodes'),
            'all_items'         => __('All Categories', 'precisecodes'),
            'parent_item'       => __('Parent Category', 'precisecodes'),
            'parent_item_colon' => __('Parent Category:', 'precisecodes'),
            'edit_item'         => __('Edit Category', 'precisecodes'),
            'update_item'       => __('Update Category', 'precisecodes'),
            'add_new_item'      => __('Add New Category', 'precisecodes'),
            'new_item_name'     => __('New Category Name', 'precisecodes'),
            'menu_name'         => __('Categories', 'precisecodes'),
        );

        $args = array(
            'public'            => false,
            'hierarchical'      => true,
            'labels'            => $labels,
            'show_ui'           => true,
            'show_admin_column' => true,
            'show_in_nav_menus' => false,
            'query_var'         => false,
            'rewrite'           => array('slug' => 'portfolio-category'),
        );

        register_taxonomy('portfolio_category', array('portfolio'), $args);


}

add_action('init', 'precise_portfolio_post_type');

/*******************************************************************
 * Manage Columns
 ********************************************************************/
function precise_portfolio_edit_columns($columns)
{
    $newcolumns = array(
        'cb'          => '<input type="checkbox" />',
        'title'       => 'Title',
        'portfolio-thumb'   => esc_html__('Thumbnail', 'rove'),
        'description' => esc_html__('Description', 'rove')
    );

    $columns = array_merge($newcolumns, $columns);

    return $columns;
}

add_filter('manage_edit-portfolio_columns', 'precise_portfolio_edit_columns');

function precise_portfolio_custom_columns($column)
{
    global /** @var WP_Post $post */
    $post;

    switch ($column) {
        case 'portfolio-thumb':
            if (has_post_thumbnail()) {
                the_post_thumbnail('thumbnail', array('style' => 'width:75px; height:75px;'));
            } else {
                echo '<span aria-hidden="true">&#8212;</span>';
            }
            break;
        case 'description':
            $description = $post->post_content;
            if (!empty($description)) {
                echo '<span>' . esc_attr($description) . '</span>';
            } else {
                echo '<span aria-hidden="true">&#8212;</span>';
            }
            break;
    }
}

add_action('manage_posts_custom_column', 'precise_portfolio_custom_columns', 10, 2);


/*******************************************************************
 * Register Meta Box
 ********************************************************************/
function precise_portfolio_metaboxes(array $meta_boxes)
{

    // Start with an underscore to hide fields from custom fields list
    $prefix = '_portfolio_';

    $meta_boxes[] = array(
        'id'         => 'portfolio_metabox',
        'title'      => 'Portfolio Attributes',
        'pages'      => array('portfolio'), // Post type
        'context'    => 'normal',
        'priority'   => 'default',
        'show_names' => true, // Show field names on the left
        'fields'     => array(
            array(
                'name' => esc_html__('Link', 'precisecodes'),
                'desc' => '',
                'id'   => $prefix . 'link',
                'type' => 'text_medium',
            ),
            array(
                'name' => esc_html__('Client', 'precisecodes'),
                'desc' => '',
                'id'   => $prefix . 'client',
                'type' => 'text_medium',
            ),
        ),
    );

    return $meta_boxes;
}
add_filter('cmb_meta_boxes', 'precise_portfolio_metaboxes');
