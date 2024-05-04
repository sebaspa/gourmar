jQuery(document).ready(function ($) {
  // Filter products when clicking the filter button
  $("#filter-products-btn").on("click", function () {
    filterProducts();
  });

  // Filter products when hitting Enter in search input
  $("#product-search").on("keypress", function (e) {
    if (e.which === 13) {
      filterProducts();
    }
  });

  // Pagination and category filtering
  $(document).on("click", ".page-btn, .category-filter", function () {
    var page = $(this).data("page") || 1;
    filterProducts(page);
  });

  // Function to fetch products via AJAX
  function filterProducts(page = 1) {
    var categoryId = $("#product-category").val() || "";
    var searchQuery = $("#product-search").val() || "";
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
        $("#product-list").html(response);
      },
      error: function (xhr, status, error) {
        console.error(xhr.responseText);
      },
    });
  }

  // Trigger the filter function on page load
  filterProducts();

  // Previous button click event
  $(document).on("click", ".btn-prev", function () {
    var page = $(this).data("page");
    filterProducts(page);
  });

  // Next button click event
  $(document).on("click", ".btn-next", function () {
    var page = $(this).data("page");
    filterProducts(page);
  });
});
