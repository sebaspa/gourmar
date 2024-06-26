<!doctype html>
<html <?php language_attributes(); ?>>

<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php wp_head(); ?>
  <script>
    var gourmar = {
      ajaxurl: '<?php echo admin_url('admin-ajax.php'); ?>',
      homeurl: '<?php echo esc_url(home_url('/')); ?>',
      nonce: '<?php echo wp_create_nonce('wp_rest'); ?>',
      lang: '<?php echo get_locale(); ?>',
      apiurl: '<?php echo esc_url(home_url('/wp-json/gourmar-api/v1')); ?>',
    }
  </script>
</head>

<body <?php body_class(); ?>>
  <?php wp_body_open(); ?>

  <header class="bg-primary-500 py-2 w-full header relative">
    <div class="container max-w-7xl flex items-center justify-between">
      <div class="order-1">
        <?php the_custom_logo(); ?>
      </div>
      <div class="order-3 md:order-2">
        <button id="btnMainMenu" class="md:hidden">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="w-8 h-8 text-white">
            <path fill="currentColor"
              d="M0 96C0 78.3 14.3 64 32 64H416c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 128 0 113.7 0 96zM0 256c0-17.7 14.3-32 32-32H416c17.7 0 32 14.3 32 32s-14.3 32-32 32H32c-17.7 0-32-14.3-32-32zM448 416c0 17.7-14.3 32-32 32H32c-17.7 0-32-14.3-32-32s14.3-32 32-32H416c17.7 0 32 14.3 32 32z" />
          </svg>
        </button>
        <div class="main-menu hidden md:block" id="mainMenu">
          <?php
          wp_nav_menu(
            array(
              'theme_location' => 'menu-1',
              'menu_id' => 'primary-menu',
            )
          );
          ?>
        </div>
      </div>
      <a href="<?php echo esc_url(home_url('/contact')); ?>"
        class="text-white py-2 px-4 md:py-3 md:px-8 border-2 border-white rounded-full order-2 md:order-3 uppercase md:hidden lg:block text-xs md:text-base font-novecento">
        <?php _e('Contact', 'gourmar'); ?>
      </a>
    </div>
  </header>