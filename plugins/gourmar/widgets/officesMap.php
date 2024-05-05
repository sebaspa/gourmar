<?
class OfficesMap extends WP_Widget
{
    public function __construct()
    {
        parent::__construct(
            'officesMap',
            __('Offices Map', 'gourmar'),
            array(
                'description' => __('Offices Map', 'gourmar')
            )
        );
    }

    public function widget($args, $instance)
    {
        ?>
        <main class="container mx-auto max-w-7xl px-4">
            <div id="mapOffices" class="w-full h-[400px]"></div>
        </main>
        <?
    }

    public function form($instance)
    {
    }

    public function update($new_instance, $old_instance)
    {
    }
}

register_widget('OfficesMap');
?>