<?php

namespace Elementor;

// Security Note: Blocks direct access to the plugin PHP files.
defined('ABSPATH') || die();

//Text domin: gourmar

class Carousel1 extends Widget_Base
{
  public function get_name()
  {
    return 'carousel-1';
  }

  public function get_title()
  {
    return esc_html__('Carousel 1', 'gourmar');
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
    $prefix = 'carousel_1_';
    // Content Settings
    $this->start_controls_section(
      'content_settings',
      [
        'label' => __('Configuration', 'gourmar'),
        'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
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
    $prefix = 'carousel_1_';
    $settings = $this->get_settings_for_display();
    ?>
    <div class="swiper carousel_1">
      <div class="swiper-wrapper">
        <div class="swiper-slide">
          <div class="carousel1">
            <div class="carousel1__image">
              <img src="https://via.placeholder.com/1920x1080" alt="carousel 1" loading="lazy" class="!h-full"
                decoding="async" />
            </div>
            <div class="carousel1__content">
              <div class="carousel1__content__wrapper">
                <p>Gourmar</p>
                <p>Seguridad y calidad son nuestra prioridad</p>
                <a href="">Ver más</a>
              </div>
            </div>
          </div>
        </div>
        <div class="swiper-slide">
          <div class="carousel1">
            <div class="carousel1__image">
              <img src="https://via.placeholder.com/1920x1080" alt="carousel 1" loading="lazy" class="!h-full"
                decoding="async" />
            </div>
            <div class="carousel1__content">
              <div class="carousel1__content__wrapper">
                <p>Gourmar</p>
                <p>Seguridad y calidad son nuestra prioridad</p>
                <a href="">Ver más</a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="swiper-pagination"></div>
    </div>
    <?php
  }

  protected function content_template()
  {
  }

}

Plugin::instance()->widgets_manager->register(new Carousel1());
