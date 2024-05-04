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

    $repeater->add_control(
      $prefix . 'slider_description',
      [
        'label' => __('Description', 'gourmar'),
        'type' => \Elementor\Controls_Manager::TEXTAREA,
        'default' => __('Description example', 'gourmar'),
        'label_block' => true
      ]
    );

    $repeater->add_control(
      $prefix . 'slider_button_text',
      [
        'label' => __('Button text', 'gourmar'),
        'type' => \Elementor\Controls_Manager::TEXT,
        'default' => __('Read more', 'gourmar'),
        'label_block' => true
      ]
    );

    $repeater->add_control(
      $prefix . 'slider_button_link',
      [
        'label' => __('Button link', 'gourmar'),
        'type' => \Elementor\Controls_Manager::URL,
        'placeholder' => __('https://your-link.com', 'gourmar'),
        'show_external' => true,
        'default' => [
          'url' => '',
          'is_external' => true,
          'nofollow' => true,
          'class' => 'caousel1__button-link',
        ]
      ]
    );

    $this->add_control(
      $prefix . 'slider',
      [
        'label' => __('Slider items', 'gourmar'),
        'type' => \Elementor\Controls_Manager::REPEATER,
        'fields' => $repeater->get_controls(),
        'title_field' => '{{{ carousel_1_slider_title }}}',
      ]
    );



    $this->end_controls_section();

    //Style tab
    $this->style_tab();

  }

  private function style_tab()
  {
    /**
     * Style for title item 
     */

    $this->start_controls_section(
      'item_style_title',
      [
        'label' => __('Title', 'gourmar'),
        'tab' => \Elementor\Controls_Manager::TAB_STYLE,
      ]
    );

    $this->add_control(
      'style_title_color',
      [
        'label' => __('Color', 'gourmar'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
          '{{WRAPPER}} .carousel1__title' => 'color: {{VALUE}}',
        ]
      ]
    );

    $this->add_control(
      'style_title_tipography',
      [
        'label' => __('Tipography', 'gourmar'),
        'type' => \Elementor\Controls_Manager::FONT,
        'selectors' => [
          '{{WRAPPER}} .carousel1__title' => 'font-family: {{VALUE}}',
        ]
      ]
    );

    $this->add_control(
      'style_title_size',
      [
        'label' => __('Size', 'gourmar'),
        'type' => \Elementor\Controls_Manager::SLIDER,
        'range' => [
          'px' => [
            'min' => 0,
            'max' => 100,
          ]
        ],
        'default' => [
          'unit' => 'px',
          'size' => 16,
        ],
        'selectors' => [
          '{{WRAPPER}} .carousel1__title' => 'font-size: {{SIZE}}{{UNIT}}'
        ],
        'responsive' => [
          'desktop' => [
            'label' => 'Desktop',
            'selector' => '{{WRAPPER}} .carousel1__title',
          ],
          'tablet' => [
            'label' => 'Tablet',
            'selector' => '{{WRAPPER}} .carousel1__title',
          ],
          'mobile' => [
            'label' => 'Mobile',
            'selector' => '{{WRAPPER}} .carousel1__title',
          ]
        ]
      ]
    );

    $this->end_controls_section();

    /**
     * Style for description item 
     */

    $this->start_controls_section(
      'item_style_description',
      [
        'label' => __('Description', 'gourmar'),
        'tab' => \Elementor\Controls_Manager::TAB_STYLE,
      ]
    );

    $this->add_control(
      'style_tdescriptioncolor',
      [
        'label' => __('Color', 'gourmar'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
          '{{WRAPPER}} .carousel1__description' => 'color: {{VALUE}}',
        ]
      ]
    );

    $this->add_control(
      'style_description_tipography',
      [
        'label' => __('Tipography', 'gourmar'),
        'type' => \Elementor\Controls_Manager::FONT,
        'selectors' => [
          '{{WRAPPER}} .carousel1__description' => 'font-family: {{VALUE}}',
        ]
      ]
    );

    $this->add_control(
      'style_description_size',
      [
        'label' => __('Size', 'gourmar'),
        'type' => \Elementor\Controls_Manager::SLIDER,
        'range' => [
          'px' => [
            'min' => 0,
            'max' => 100,
          ]
        ],
        'default' => [
          'unit' => 'px',
          'size' => 16,
        ],
        'selectors' => [
          '{{WRAPPER}} .carousel1__description' => 'font-size: {{SIZE}}{{UNIT}}'
        ],
        'responsive' => [
          'desktop' => [
            'label' => 'Desktop',
            'selector' => '{{WRAPPER}} .carousel1__description',
          ],
          'tablet' => [
            'label' => 'Tablet',
            'selector' => '{{WRAPPER}} .carousel1__description',
          ],
          'mobile' => [
            'label' => 'Mobile',
            'selector' => '{{WRAPPER}} .carousel1__description',
          ]
        ]
      ]
    );

    $this->add_control(
      'style_description_width',
      [
        'label' => __('Width', 'gourmar'),
        'type' => \Elementor\Controls_Manager::SLIDER,
        'range' => [
          'px' => [
            'min' => 0,
            'max' => 1920,
          ],
          '%' => [
            'min' => 0,
            'max' => 100,
          ],

        ],
        'size_units' => ['px', '%', 'em'],
        'default' => [
          'unit' => 'px',
        ],
        'selectors' => [
          '{{WRAPPER}} .carousel1__description' => 'width: {{SIZE}}{{UNIT}};'
        ],
        'responsive' => [
          'desktop' => [
            'label' => 'Desktop',
            'selector' => '{{WRAPPER}} .carousel1__description',
          ],
          'tablet' => [
            'label' => 'Tablet',
            'selector' => '{{WRAPPER}} .carousel1__description',
          ],
          'mobile' => [
            'label' => 'Mobile',
            'selector' => '{{WRAPPER}} .carousel1__description--mobile',
          ]
        ]
      ]
    );

    $this->add_control(
      'style_description_margin',
      [
        'label' => __('Margin', 'gourmar'),
        'type' => \Elementor\Controls_Manager::DIMENSIONS,
        'size_units' => ['px', '%', 'em'],
        'selectors' => [
          '{{WRAPPER}} .carousel1__description' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ],
        'responsive' => [
          'desktop' => [
            'label' => 'Desktop',
            'selector' => '{{WRAPPER}} .carousel1__description',
          ],
          'tablet' => [
            'label' => 'Tablet',
            'selector' => '{{WRAPPER}} .carousel1__description',
          ],
          'mobile' => [
            'label' => 'Mobile',
            'selector' => '{{WRAPPER}} .carousel1__description',
          ]
        ]
      ]
    );

    $this->end_controls_section();
  }

  protected function render()
  {
    $prefix = 'carousel_1_';
    $settings = $this->get_settings_for_display();
    ?>
    <div class="swiper carousel_1">
      <div class="swiper-wrapper">
        <?php foreach ($settings[$prefix . 'slider'] as $slide):
          // Button
          $button_target = $slide[$prefix . 'slider_button_link']['is_external'] ? ' target="_blank"' : '';
          $button_nofollow = $slide[$prefix . 'slider_button_link']['nofollow'] ? ' rel="nofollow"' : '';
          ?>
          <div class="swiper-slide">
            <div class="carousel1">
              <div class="carousel1__image">
                <img src="<?php esc_attr_e($slide[$prefix . 'slider_bg']['url']); ?>" class="carousel1__image-img"
                  alt="<?php esc_attr_e($slide[$prefix . 'slider_description']); ?>" loading="lazy" class="!h-full"
                  decoding="async" />
              </div>
              <div class="carousel1__content">
                <div class="carousel1__content__wrapper">
                  <p class="carousel1__title"><?php esc_attr_e($slide[$prefix . 'slider_title']); ?></p>
                  <p class="carousel1__description carousel1__description--mobile font-adelica-brush">
                    <?php esc_attr_e($slide[$prefix . 'slider_description']); ?>
                  </p>
                  <a href="<?php esc_attr_e($slide[$prefix . 'slider_button_link']['url']); ?>" class="caousel1__buttonlink"
                    <?php echo $button_target; ?>       <?php echo $button_nofollow; ?>>
                    <?php esc_attr_e($slide[$prefix . 'slider_button_text']); ?>
                  </a>
                </div>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
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
