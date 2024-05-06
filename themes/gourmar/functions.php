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

  add_theme_support('customize-selective-refresh-widgets');

  add_theme_support(
    'custom-logo',
    array(
      'width' => 127,
      'height' => 80,
      'flex-width' => true,
      'flex-height' => true,
    )
  );

  add_image_size('product_thumbnail', 310, 350, true);

}

add_action('after_setup_theme', 'gourmar_setup');

function gourmar_widgets_init()
{
  register_sidebar(
    array(
      'name' => esc_html__('Sidebar', 'gourmar'),
      'id' => 'sidebar-1',
      'description' => esc_html__('Add widgets here.', 'gourmar'),
      'before_widget' => '<section id="%1$s" class="widget %2$s">',
      'after_widget' => '</section>',
      'before_title' => '<h2 class="widget-title">',
      'after_title' => '</h2>',
    )
  );
}
add_action('widgets_init', 'gourmar_widgets_init');


function gourmar_styles_scripts()
{
  wp_enqueue_style('leaflet-styles', 'https://unpkg.com/leaflet/dist/leaflet.css', array(), '1.0.0', 'all');
  wp_enqueue_script('leaflet-js', 'https://unpkg.com/leaflet/dist/leaflet.js', array(), '1.0.0', true);
  wp_enqueue_style('gourmar-style', get_template_directory_uri() . '/dist/css/app.css', array(), VERSION);
  wp_enqueue_script('swiper-js', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js', array(), '11', true);
  wp_enqueue_script('gourmar-script', get_template_directory_uri() . '/dist/js/app.js', array('jquery', 'swiper-js', 'leaflet-js'), VERSION, true);
}

add_action('wp_enqueue_scripts', 'gourmar_styles_scripts');
