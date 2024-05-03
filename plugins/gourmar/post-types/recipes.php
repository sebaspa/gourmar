<?php

$labels = array(
  'name' => _x('Recipes', 'General name', 'gourmar'),
  'singular_name' => _x('Recipe', 'Singular name', 'gourmar'),
  'menu_name' => __('Recipes', 'gourmar'),
  'name_admin_bar' => __('Recipe', 'gourmar'),
  'archives' => __('Item Archives', 'gourmar'),
  'attributes' => __('Item Attributes', 'gourmar'),
  'parent_item_colon' => __('Parent Item:', 'gourmar'),
  'all_items' => __('All recipes', 'gourmar'),
  'add_new_item' => __('Add new recipe', 'gourmar'),
  'add_new' => __('Add new', 'gourmar'),
  'new_item' => __('new recipe', 'gourmar'),
  'edit_item' => __('Edit recipe', 'gourmar'),
  'update_item' => __('Update recipe', 'gourmar'),
  'view_item' => __('View recipe', 'gourmar'),
  'view_items' => __('View recipes', 'gourmar'),
  'search_items' => __('Search recipes', 'gourmar'),
  'not_found' => __('No recipes found', 'gourmar'),
  'not_found_in_trash' => __('No recipes found in the trash', 'gourmar'),
  'featured_image' => __('Featured image', 'gourmar'),
  'set_featured_image' => __('Add featured image', 'gourmar'),
  'remove_featured_image' => __('Remove featured image', 'gourmar'),
  'use_featured_image' => __('Use as featured image', 'gourmar'),
  'insert_into_item' => __('Insert to recipes', 'gourmar'),
  'uploaded_to_this_item' => __('Upload to recipe', 'gourmar'),
  'items_list' => __('List of recipes', 'gourmar'),
  'items_list_navigation' => __('Navigate to list of recipes', 'gourmar'),
  'filter_items_list' => __('Filter list of recipes', 'gourmar'),
);
$args = array(
  'label' => __('Recipe', 'gourmar'),
  'description' => __('Recipe description', 'gourmar'),
  'labels' => $labels,
  'supports' => array('title'),
  'taxonomies' => array('recipe-category'),
  'hierarchical' => false,
  'public' => false,
  'show_ui' => true,
  'show_in_menu' => true,
  'menu_position' => 6,
  'can_export' => true,
  'has_archive' => true,
  'exclude_from_search' => false,
  'publicly_queryable' => true,
  //'capability_type'       => 'contacts',
  'map_meta_cap' => true,
  'query_var' => true,
  'rewrite' => array('slug' => 'recipe'),
  'menu_icon' => 'dashicons-food',
  'show_in_rest' => false,
  'rest_base' => 'recipe'
);
register_post_type('recipe', $args);

/**
 * Images
 */

add_image_size('recipe', 425, 250, true);
