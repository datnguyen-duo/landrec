const $productsForm = $("#products-form");
const $productsResponse = $("#products-response");
const $projectsFilters = $productsForm.find('select, input');

function filterProjects() {
    $productsResponse.addClass("loading");

    setTimeout(function () {
        $.ajax({
            url: "/wp-admin/admin-ajax.php",
            data: $productsForm.serialize(),
            type: "GET",
            beforeSend: function (xhr) {},
            success: function (data) {
                $productsResponse.html(data);
            },
            complete: function (data) {
                $productsResponse.removeClass("loading");
            },
        });
    }, 300);
}

$projectsFilters.on('change', function() {
    filterProjects();
});