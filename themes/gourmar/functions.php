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
  wp_enqueue_style('gourmar-style', get_template_directory_uri() . '/dist/css/app.css', array(), VERSION);
  wp_enqueue_script('swiper', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js', array(), '11', true);
  wp_enqueue_script('gourmar-script', get_template_directory_uri() . '/dist/js/app.js', array('jquery', 'swiper'), VERSION, true);
}

add_action('wp_enqueue_scripts', 'gourmar_styles_scripts');


// FILTER PRODUCTS START //
function enqueue_filter_products_script()
{
  wp_enqueue_script('filter-products', get_template_directory_uri() . '/products/filterProducts.js', array('jquery'), null, true);
  wp_localize_script('filter-products', 'filter_products_ajax', array('ajax_url' => admin_url('admin-ajax.php')));
}

add_action('wp_enqueue_scripts', 'enqueue_filter_products_script');
add_action('wp_ajax_filter_products', 'filter_products');
add_action('wp_ajax_nopriv_filter_products', 'filter_products');

function filter_products()
{
  $category_id = isset($_POST['category_id']) ? $_POST['category_id'] : '';
  $search_query = isset($_POST['search_query']) ? sanitize_text_field($_POST['search_query']) : '';
  $items_per_page = 1; // Developer-defined items per page
  $page = isset($_POST['page']) ? intval($_POST['page']) : 1; // Default to page 1

  $args = array(
    'post_type' => 'product',
    'posts_per_page' => $items_per_page,
    'paged' => $page,
  );

  // Apply category filter if a category is selected
  if (!empty($category_id)) {
    $args['tax_query'] = array(
      array(
        'taxonomy' => 'product_cat',
        'field' => 'term_id',
        'terms' => $category_id,
      ),
    );
  }

  // Apply search query filter if a search query is entered
  if (!empty($search_query)) {
    $args['s'] = $search_query;
  }

  $products_query = new WP_Query($args);

  if ($products_query->have_posts()) {
    ?>
    <div class="grid grid-cols-[repeat(4,_1fr)] gap-4">
      <?php
      while ($products_query->have_posts()) {
        // Loop through the products
        $products_query->the_post();
        // Output the product content
        echo '<div class="my-4 p-4">';
        echo '<a href="' . esc_url(get_permalink()) . '" class="product-link">';
        // Thumbnail or image
        echo '<div class="w-full relative">';
        echo '<div class="absolute top-2 right-2 bg-yellow-500 text-primary-500 text-xs uppercase px-4 py-1 rounded-xl font-novecento">' . getCategories(get_the_ID()) . '</div>';
        if (has_post_thumbnail()) {
          the_post_thumbnail('product_thumbnail');
        } else {
          echo '<img width="100%" height="auto" src="' . wc_placeholder_img_src() . '" alt="' . get_the_title() . '" class="w-full h-auto object-cover object-center" />';
        }
        echo '</div>';
        // Category
        echo '<p class="text-xs mb-2 mt-3 text-primary-500 font-novecento uppercase">' . getCategories(get_the_ID()) . '</p>';
        // Title
        echo '<h2 class="text-xl font-semibold text-black-500 mb-1">' . get_the_title() . '</h2>';
        // Short description
        echo '<p class="text-gray-500">' . wp_trim_words(get_the_excerpt(), 20) . '</p>';
        echo '</a>';
        echo '</div>';
      }
      wp_reset_postdata();
      ?>
    </div>
    <?php
    // Pagination
    $total_pages = $products_query->max_num_pages;
    echo '<div class="paginationProducts">';
    echo '<button class="btn-prev mr-2" data-page="' . max($page - 1, 1) . '" ' . ($page <= 1 ? 'disabled' : '') . '>←</button>';
    for ($i = max($page - 2, 1); $i <= min($page + 2, $total_pages); $i++) {
      echo '<button class="page-btn' . ($i === $page ? ' active' : '') . '" data-page="' . $i . '">' . $i . '</button>';
    }
    echo '<button class="btn-next ml-2" data-page="' . min($page + 1, $total_pages) . '" ' . ($page >= $total_pages ? 'disabled' : '') . '>→</button>';
    echo '</div>';
  } else {
    echo 'No products found.';
  }

  die(); // Always end with die() to prevent extra output
}

add_image_size('product_thumbnail', 310, 350, true);

function getCategories($product_id) {
  // Get the categories
  $categories = get_the_terms($product_id, 'product_cat');
  if ($categories && !is_wp_error($categories)) {
    $category_names = array();
    foreach ($categories as $category) {
      $category_names[] = $category->name;
    }
    return implode(', ', $category_names);
  }
}


// FILTER PRODUCTS END //
