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
        <main class="w-full" id="findusMap">
            <div class="w-full">
                <input type="text" id="provider-search" placeholder="Search for provider">
                <select id="country-select">
                    <option value="panama" selected>Panamá</option>
                    <option value="nicaragua">Nicaragua</option>
                    <option value="costarica">Costa Rica</option>
                    <!-- Add more options as needed -->
                </select>
            </div>
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