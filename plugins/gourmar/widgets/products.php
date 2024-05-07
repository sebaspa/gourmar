<?php

class productsWidget extends WP_Widget
{

  public function __construct()
  {
    parent::__construct(
      'productsWidget',
      __('Products widget', 'gourmar'),
      array(
        'description' => __('Products widget', 'gourmar')
      )
    );
  }

  public function widget($args, $instance)
  {
    $numberPost = $instance['numberPost'];

    // Display widget content

    if (!isset($_GET['productSearch'])) {
      $productSearch = '';
    } else {
      $productSearch = $_GET['productSearch'];
    }

    if (!isset($_GET['productCategory'])) {
      $productCategory = '';
    } else {
      $productCategory = $_GET['productCategory'];
    }

    $categories = get_terms(
      array(
        'taxonomy' => 'product_cat',
        'hide_empty' => false,
      )
    );

    function getCategories($product_id)
    {
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

    $tax_query = array(
      array(
        'taxonomy' => 'product_cat',
        'field' => 'slug',
        'terms' => array($productCategory)
      )
    );

    $products = new WP_Query(
      array(
        'paged' => get_query_var('paged', 1),
        'post_status' => 'publish',
        'posts_per_page' => $numberPost,
        'post_type' => 'product',
        'orderby' => 'date',
        'order' => 'DESC',
        's' => $productSearch,
        'tax_query' => ($productCategory != '') ? $tax_query : ''
      )
    );
    ?>
    <div class="productsWidget">
      <div class="container mx-auto py-12 max-w-5xl px-4">
        <form action="<?php echo get_permalink(); ?>" method="get">
          <div class="grid grid-cols-12 gap-4">
            <div class="col-span-12 md:col-span-5">
              <?php if (!empty($categories) && !is_wp_error($categories)): ?>
                <select name="productCategory" id="productCategory"
                  class="w-full py-3 px-4 rounded-lg border border-primary-500 text-black-500 text-base">
                  <?php foreach ($categories as $category): ?>
                    <option value="<?php echo esc_attr($category->slug); ?>" <?php echo ($category->slug == $productCategory) ? 'selected' : ''; ?>><?php echo esc_html($category->name); ?></option>
                  <?php endforeach; ?>
                </select>
              <?php else: ?>
                <p>No categories found.</p>
              <?php endif; ?>
            </div>
            <div class="col-span-12 md:col-span-4">
              <input type="text" name="productSearch" id="productSearch" value="<?php echo $productSearch; ?>"
                class="w-full py-3 px-4 rounded-lg border border-primary-500 text-black-500 text-base"
                placeholder="Buscar artículo...">
            </div>
            <div class="col-span-12 md:col-span-3">
              <button type="submit"
                class="bg-primary-500 text-white uppercase text-base rounded-full px-6 py-3 flex items-center gap-3">
                <span>Buscar</span>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 512 512" width="16" class="text-white">
                  <path fill="currentColor"
                    d="M416 208c0 45.9-14.9 88.3-40 122.7L502.6 457.4c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L330.7 376c-34.4 25.2-76.8 40-122.7 40C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208zM208 352a144 144 0 1 0 0-288 144 144 0 1 0 0 288z" />
                </svg>
              </button>
            </div>
          </div>
        </form>
      </div>
      <div class="container mx-auto max-w-7xl px-4">
        <div id="product-list"></div>
      </div>
      <div class="container mx-auto max-w-7xl px-4">
        <div class="grid grid-cols-12 gap-4">
          <?php if ($products->have_posts()): ?>
            <?php while ($products->have_posts()):
              $products->the_post(); ?>
              <?php
              $product_id = get_the_ID();
              $product = wc_get_product($product_id);
              ?>
              <div class="productCard">
                <a href="<?php the_permalink(); ?>" class="productCard__link">
                  <div class="productCard__image">
                    <div class="productCard__image--bullet"><?php echo getCategories(get_the_ID()) ?></div>
                    <?php the_post_thumbnail('product_thumbnail'); ?>
                  </div>
                </a>
                <p class="productCard__category"><?php echo getCategories(get_the_ID()); ?></p>
                <p class="productCard__title"><?php the_title(); ?></p>
                <p class="productCard__description"><?php echo $product->get_short_description(); ?></p>
              </div>
            <?php endwhile;
            wp_reset_postdata(); ?>
          <?php else: ?>
            <div class="col-span-12">
              <p class="text-center text-xl text-primary-500">No hay resultados</p>
            </div>
          <?php endif; ?>
        </div>
        <div class="pagination py-10">
          <?php
          echo paginate_links(
            array(
              'total' => $products->max_num_pages,
              'prev_text' => '←',
              'next_text' => '→',
            )
          );
          ?>
        </div>
      </div>
    </div>
    <?php
  }

  // Widget Update Method
  public function update($new_instance, $old_instance)
  {
    // Update widget options
    $instance['numberPost'] = strip_tags($new_instance['numberPost']);
    return $instance;
  }

  // Widget Settings Form
  public function form($instance)
  {
    // Retrieve widget options from $instance
    $numberPost = isset($instance['numberPost']) ? $instance['numberPost'] : 9;
    // Display widget settings form
    ?>
    <p>
      <label for="<?php echo $this->get_field_id('numberPost'); ?>"><?php _e('Number of posts'); ?>:</label>
      <input class="widefat" id="<?php echo $this->get_field_id('numberPost'); ?>"
        name="<?php echo $this->get_field_name('numberPost'); ?>" type="number" min="1" max="6"
        value="<?php echo esc_attr($numberPost); ?>" />
    </p>
    <?php
  }

}


register_widget('productsWidget');
