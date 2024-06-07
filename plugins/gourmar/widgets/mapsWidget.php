<?php
class customMapsWidget extends WP_Widget
{

  public function __construct()
  {
    parent::__construct(
      'customMapsWidget',
      __('Custom Maps Widget', 'gourmar'),
      array(
        'description' => __('Maps', 'gourmar')
      )
    );
  }

  public function widget($args, $instance)
  {
    $countries = new WP_Query(
      array(
        'post_status' => 'publish',
        'post_type' => 'country',
        'orderby' => 'date',
        'order' => 'DESC',
      )
    );
    ?>
    <style>
      #findusMap {
        position: relative;
        z-index: 1;
      }

      #findUsSearch {
        position: relative;
        z-index: 2;
      }

      #country-select {
        position: relative;
        display: inline-block;
        background-color: #fff;
      }

      .select-selected {
        padding: 0px;
        cursor: pointer;
        background-color: #fff;
      }

      .select-items {
        display: none;
        position: absolute;
        background-color: #fff;
        max-height: 200px;
        width: calc(100% + 2px);
        margin-left: -17px;
        overflow-y: auto;
        border: 1px solid #001489;
        border-top: none;
        border-radius: 0 0 0px 10px;
        z-index: 1;
        scrollbar-width: thin;
      }

      .country-option {
        padding: 10px;
        display: flex;
        flex-direction: row;
        gap: 10px;
        cursor: pointer;
        background-color: #fff;
      }

      .show {
        display: block;
      }
    </style>
    <div class="container mx-auto py-12 max-w-5xl px-4" id="findUsSearch">
      <div class="grid grid-cols-12 gap-4">
        <div class="col-span-12 md:col-span-5">
          <div id="country-select" class="w-full py-3 px-4 rounded-lg border border-primary-500 text-black-500 text-base">
            <div value="" class="select-selected">Selecciona</div>
            <div class="select-items">
              <?php
              while ($countries->have_posts()):
                $countries->the_post();
                ?>
                <div value="<?php echo get_the_title(); ?>"
                  coordinates="<?php echo get_post_meta(get_the_ID(), 'gourmar_fields_country_coordinates', true); ?>"
                  class="country-option">
                  <img width="24" height="auto"
                    src="<?php echo get_post_meta(get_the_ID(), 'gourmar_fields_country_flag', true); ?>"
                    alt="<?php echo get_the_title(); ?>">
                  <?php echo get_the_title(); ?>
                </div>
                <?php
              endwhile;
              wp_reset_postdata();
              ?>
            </div>
          </div>
        </div>
        <!-- Button  -->
        <div class="col-span-12 md:col-span-2">
          <button id="filter-products-btn"
            class="bg-primary-500 text-white uppercase text-base rounded-full px-6 py-3 flex items-center gap-3">
            <span>Buscar</span>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 512 512" width="16" class="text-white">
              <path fill="currentColor"
                d="M416 208c0 45.9-14.9 88.3-40 122.7L502.6 457.4c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L330.7 376c-34.4 25.2-76.8 40-122.7 40C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208zM208 352a144 144 0 1 0 0-288 144 144 0 1 0 0 288z" />
            </svg>
          </button>
        </div>
      </div>
    </div>
    <main class="container mx-auto max-w-7xl px-4" id="findusMap">
      <div id="map" class="w-full h-[400px]"></div>
    </main>
    <?php
  }

  public function form($instance)
  {
  }

  public function update($new_instance, $old_instance)
  {
  }
}

register_widget('customMapsWidget');
?>