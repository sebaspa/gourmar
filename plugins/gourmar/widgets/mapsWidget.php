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
        ?>
        <div class="container mx-auto py-12 max-w-5xl px-4">
            <div class="grid grid-cols-12 gap-4">
                <div class="col-span-12 md:col-span-5">
                    <select id="country-select" class="w-full py-3 px-4 rounded-lg border border-primary-500 text-black-500 text-base">
                        <option value="panama" selected>Panamá</option>
                        <option value="nicaragua">Nicaragua</option>
                        <option value="costarica">Costa Rica</option>
                        <!-- Add more options as needed -->
                    </select>
                    </div>
                    <div class="col-span-12 md:col-span-4">
                        <input type="text" id="provider-search" placeholder="Buscar distribuidor..." class="w-full py-3 px-4 rounded-lg border border-primary-500 text-black-500 text-base">
                    </div>
                    <!-- Button  -->
                    <div class="col-span-12 md:col-span-3">
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