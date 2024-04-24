<?php

if (!defined('VERSION')) {
  define('VERSION', '1.0.0');
}

function gourmar_setup()
{
  load_theme_textdomain('gourmar', get_template_directory() . '/languages');
  add_theme_support('title-tag');
  add_theme_support('post-thumbnails');
  add_theme_support(
    'html5',
    array(
      //'search-form',
      //'comment-form',
      //'comment-list',
      //'gallery',
      //'caption',
      //'style',
      //'script',
    )
  );

  register_nav_menus(
    array(
      'menu-1' => esc_html__('Primary', 'gourmar'),
    )
  );

  add_theme_support(
    'custom-logo',
    array(
      'width' => 127,
      'height' => 80,
      'flex-width' => true,
      'flex-height' => true,
    )
  );

}

add_action('after_setup_theme', 'gourmar_setup');


function gourmar_styles_scripts()
{
  wp_enqueue_style('gourmar-style', get_template_directory_uri() . '/dist/css/app.css', array(), VERSION);
  wp_enqueue_script('gourmar-script', get_template_directory_uri() . '/dist/js/app.js', array('jquery'), VERSION, true);
}

add_action('wp_enqueue_scripts', 'gourmar_styles_scripts');
