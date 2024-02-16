import $ from "jquery/dist/jquery";

let $formsFilterButtons = $(".forms-filter button");

$formsFilterButtons.on("click", function () {
  $formsFilterButtons.removeClass("active");
  $(this).addClass("active");
  let target = "#" + $(this).data("target");
  $(".forms .form-holder").removeClass("active");
  $(target).addClass("active");
});

let urlHash = window.location.hash;
if (urlHash == "#custom-projects") {
  $(".form-holder").removeClass("active");
  $(".filters button").removeClass("active");
  $('button[data-target="contact-form-2"]').addClass("active");
  $("#contact-form-2").addClass("active");
}
