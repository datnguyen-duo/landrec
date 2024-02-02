const $productsForm = $("#products-form");
const $productsResponse = $("#products-response");
const $productsFilters = $('.products-filters select');

function filterProducts() {
    $productsResponse.addClass("loading");

    setTimeout(function () {
        $.ajax({
            url: "/wp-admin/admin-ajax.php",
            data: $productsForm.serialize(),
            type: "GET",
            beforeSend: function (xhr) {},
            success: function (data) {
                document.getElementById("products-response").innerHTML = data;
            },
            complete: function (data) {
                $productsResponse.removeClass("loading");
            },
        });
    }, 300);
}

$productsFilters.on('change', function() {
    filterProducts();
});