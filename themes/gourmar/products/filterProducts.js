if (document.querySelector("#product-category").length > 0) {
    jQuery(document).ready(function ($) {
      // Filter products when clicking the filter button
      jQuery("#filter-products-btn").on("click", function () {
        filterProducts();
      });

      // Filter products when hitting Enter in search input
      jQuery("#product-search").on("keypress", function (e) {
        if (e.which === 13) {
          filterProducts();
        }
      });

      // Pagination and category filtering
      jQuery(document).on("click", ".page-btn, .category-filter", function () {
        var page = jQuery(this).data("page") || 1;
        filterProducts(page);
      });

      // Function to fetch products via AJAX
      function filterProducts(page = 1) {
        var categoryId = jQuery("#product-category").val() || "";
        var searchQuery = jQuery("#product-search").val() || "";
        $.ajax({
          url: filter_products_ajax.ajax_url,
          type: "POST",
          data: {
            action: "filter_products",
            category_id: categoryId,
            search_query: searchQuery,
            page: page,
          },
          success: function (response) {
            jQuery("#product-list").html(response);
          },
          error: function (xhr, status, error) {
            console.error(xhr.responseText);
          },
        });
      }

      // Trigger the filter function on page load
      filterProducts();

      // Previous button click event
      jQuery(document).on("click", ".btn-prev", function () {
        var page = jQuery(this).data("page");
        filterProducts(page);
      });

      // Next button click event
      jQuery(document).on("click", ".btn-next", function () {
        var page = jQuery(this).data("page");
        filterProducts(page);
      });
    });
  }
