<?php

$labels = array(
  'name' => __('Categories', 'gourmar'),
  'singular_name' => __('Category', 'gourmar'),
  'search_items' => __('Search categories', 'gourmar'),
  'all_items' => __('All categories', 'gourmar'),
  'parent_item' => __('Parent category', 'gourmar'),
  'parent_item_colon' => __('Parent category:', 'gourmar'),
  'edit_item' => __('Edit category', 'gourmar'),
  'update_item' => __('Update category', 'gourmar'),
  'add_new_item' => __('Add new category', 'gourmar'),
  'new_item_name' => __('New category name', 'gourmar'),
  'menu_name' => __('Categories', 'gourmar'),
);

$args = array(
  // Hierarchical taxonomy (like categories)
  'hierarchical' => true,
  // This array of options controls the labels displayed in the WordPress Admin UI
  'labels' => $labels,
  // Control the slugs used for this taxonomy
  'rewrite' => array(
    'slug' => 'recipe-category', // This controls the base slug that will display before each term
  ),
  'show_ui' => true,
  'show_admin_column' => true,
  'query_var' => true,
  'show_in_rest' => false,
  'rest-base' => 'recipe-category'
);

register_taxonomy('recipe-category', array('recipe'), $args);
