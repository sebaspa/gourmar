<?php

namespace Elementor;

// Security Note: Blocks direct access to the plugin PHP files.
defined('ABSPATH') || die();

//Text domin: gourmar

class Carousel2 extends Widget_Base
{
  public function get_name()
  {
    return 'carousel2';
  }

  public function get_title()
  {
    return esc_html__('Carousel 2', 'gourmar');
  }

  public function get_icon()
  {
    return 'eicon-slider-album';
  }

  public function get_categories()
  {
    return ['gourmar-widgets'];
  }

  public function register_controls()
  {
    $prefix = 'carousel2_';
    // Content Settings
    $this->start_controls_section(
      'content_settings',
      [
        'label' => __('Configuration', 'gourmar'),
        'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
      ]
    );

    // Slider Repeater
    $repeater = new \Elementor\Repeater();
    $repeater->add_control(
      $prefix . 'slider_bg',
      [
        'label' => __('Background image', 'gourmar'),
        'type' => \Elementor\Controls_Manager::MEDIA,
        'default' => [
          'url' => \Elementor\Utils::get_placeholder_image_src(),
        ],
      ],
    );

    $repeater->add_control(
      $prefix . 'slider_title',
      [
        'label' => __('Title', 'gourmar'),
        'type' => \Elementor\Controls_Manager::TEXT,
        'default' => __('Example #1', 'gourmar'),
        'label_block' => true
      ]
    );

    $this->add_control(
      $prefix . 'slider',
      [
        'label' => __('Slider items', 'gourmar'),
        'type' => \Elementor\Controls_Manager::REPEATER,
        'fields' => $repeater->get_controls(),
        'title_field' => '{{{ carousel2_slider_title }}}',
      ]
    );

    $this->end_controls_section();

    //Style tab
    $this->style_tab();

  }

  private function style_tab()
  {

  }

  protected function render()
  {
    $prefix = 'carousel2_';
    $settings = $this->get_settings_for_display();
    ?>
    <div class="swiper carousel2">
      <div class="swiper-wrapper">
        <?php foreach ($settings[$prefix . 'slider'] as $slide):
          ?>
          <div class="swiper-slide">
            <div class="carousel2__container">
              <div class="carousel2__image">
                <img src="<?php esc_attr_e($slide[$prefix . 'slider_bg']['url']); ?>"
                  alt="<?php esc_attr_e($slide[$prefix . 'slider_title']); ?>" loading="lazy" decoding="async" />
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
      <div class="container max-w-7xl mx-auto">
        <div class="swiper-pagination swiper-pagination-carousel2 !relative !text-left !bottom-9"></div>
      </div>
    </div>
    <?php
  }

  protected function content_template()
  {
  }

}

Plugin::instance()->widgets_manager->register(new Carousel2());
