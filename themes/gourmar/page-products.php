<?php
/**
 * Template Name: Products
 */

    get_header();
 ?>

 <div class="container mx-auto py-12 max-w-7xl">
    <div class="flex items-center justify-center mb-4">
        <div class="w-1/2">
            <?php
            $categories = get_terms(array(
                'taxonomy'   => 'product_cat',
                'hide_empty' => false,
            ));
            
            if (!empty($categories) && !is_wp_error($categories)) :
                ?>
                <select id="product-category" class="w-full py-3 px-4 rounded-lg border border-primary-500 text-black-500 text-base">
                    <option value="">Seleccione una categoría</option>
                    <?php foreach ($categories as $category) : ?>
                        <option value="<?php echo esc_attr($category->term_id); ?>"><?php echo esc_html($category->name); ?></option>
                        <?php endforeach; ?>
                    </select>
                    <?php else : ?>
                        <p>No categories found.</p>
                        <?php endif; ?>
                    </div>
                    <div class="w-1/2 mr-4">
                        <input type="text" id="product-search" class="w-full py-3 px-4 rounded-lg border border-primary-500 text-black-500 text-base" placeholder="Buscar artículo...">
                    </div>
                    <div class="col-span-12 md:col-span-3">
                        <button id="filter-products-btn" class="bg-primary-500 flex items-center gap-3 text-white rounded-full px-2 py-4">
                        <span >Buscar</span>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 512 512" width="16" class="text-white">
                            <path fill="currentColor"
                                d="M416 208c0 45.9-14.9 88.3-40 122.7L502.6 457.4c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L330.7 376c-34.4 25.2-76.8 40-122.7 40C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208zM208 352a144 144 0 1 0 0-288 144 144 0 1 0 0 288z" />
                        </svg>
                    </button>
                    </div>
    </div>

    <div id="product-list" class="flex flex-col"></div>
</div>

<?php
get_footer();
?>