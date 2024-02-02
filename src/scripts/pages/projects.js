const $projectsForm = $("#projects-form");
const $projectsResponse = $("#projects-response");
const $projectsFilters = $projectsForm.find('select, input');

function filterProjects() {
    $projectsResponse.addClass("loading");

    setTimeout(function () {
        $.ajax({
            url: "/wp-admin/admin-ajax.php",
            data: $projectsForm.serialize(),
            type: "GET",
            beforeSend: function (xhr) {},
            success: function (data) {
                document.getElementById("projects-response").innerHTML = data;
            },
            complete: function (data) {
                $projectsResponse.removeClass("loading");
            },
        });
    }, 300);
}

$projectsFilters.on('change', function() {
    filterProjects();
});