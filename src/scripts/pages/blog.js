const $postsForm = $("#posts-form");
const $postsResponse = $("#posts-response");
const $postsPageInput = $("#posts-page-input");
const $postsFilters = $postsForm.find('select, input');

function filterPosts() {
    $postsResponse.addClass("loading");

    setTimeout(function () {
        $.ajax({
            url: "/wp-admin/admin-ajax.php",
            data: $postsForm.serialize(),
            type: "GET",
            beforeSend: function (xhr) {},
            success: function (data) {
                document.getElementById("posts-response").innerHTML = data;

                $('html, body').animate({
                    scrollTop: $("#posts-response").offset().top
                }, 500);
            },
            complete: function (data) {
                $postsResponse.removeClass("loading");
            },
        });
    }, 300);
}

$postsResponse.on("click", ".pagination-page", function () {
    $postsPageInput.val($(this).data("page"));
    filterPosts();
});

$postsFilters.on('change', function() {
    $postsPageInput.val(1);
    filterPosts();
})

