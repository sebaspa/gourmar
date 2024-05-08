<?php

add_action('cmb2_admin_init', 'gourmar_fields_recipe');

function gourmar_fields_recipe()
{
  $prefix = 'gourmar_fields_recipe_';

  $cmb = new_cmb2_box(
    array(
      'id' => $prefix . 'recipe',
      'title' => esc_html__('Recipes', 'gourmar'),
      'object_types' => array('recipe'),
      'context' => 'normal',
      'priority' => 'high',
      'show_names' => true,
    )
  );

  $cmb->add_field(
    array(
      'id' => $prefix . 'image',
      'name' => esc_html__('Image', 'gourmar'),
      'desc' => esc_html__('Add an image.', 'gourmar'),
      'type' => 'file',
      'attributes' => array(
        'required' => 'required',
        'accept' => 'image/*',
      ),
      'text' => array(
        'add_upload_file_text' => esc_html__('Add Recipe Image', 'gourmar'),
      ),
      'options' => array(
        'url' => false, // Hide the text input for the url
      ),
      'query_args' => array(
        'type' => 'image',
      ),
      'preview_size' => 'medium',
    )
  );

  $cmb->add_field(
    array(
      'id' => $prefix . 'category',
      'name' => esc_html__('Category', 'gourmar'),
      'desc' => esc_html__('Select a category.', 'gourmar'),
      'taxonomy' => 'recipe-category',
      'type' => 'taxonomy_select',
      'remove_default' => 'true', // Removes the default metabox provided by WP core.
      // Optionally override the args sent to the WordPress get_terms function.
      'query_args' => array(
        'orderby' => 'slug',
        'hide_empty' => false,
      ),
      'attributes' => array(
        'required' => 'required',
      ),
    )
  );

  $cmb->add_field(
    array(
      'id' => $prefix . 'shortDescription',
      'name' => esc_html__('Short Description', 'gourmar'),
      'desc' => esc_html__('Write a short description.', 'gourmar'),
      'default' => '',
      'sanitization_cb' => true,
      'type' => 'text',
      'attributes' => array(
        'required' => 'required',
      ),

    )
  );

  $cmb->add_field(
    array(
      'id' => $prefix . 'recipeDescription',
      'name' => esc_html__('Description', 'gourmar'),
      'desc' => esc_html__('Write a recipe.', 'gourmar'),
      'default' => '',
      'sanitization_cb' => false,
      'type' => 'wysiwyg',
      'attributes' => array(
        'required' => 'required',
      ),
      'options' => array(
        'wpautop' => true,
        'media_buttons' => false,
        'textarea_rows' => get_option('default_post_edit_rows', 10),
        'teeny' => false,
        'dfw' => false,
        'quicktags' => true,
        'default_editor' => 'tinymce',
        'tinymce' => true,
      )
    )
  );

}
