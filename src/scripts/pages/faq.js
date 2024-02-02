document.addEventListener("DOMContentLoaded", function () {
  var accordion = document.querySelectorAll(".accordion__item");

  accordion.forEach(function (item) {
    item.addEventListener("click", function () {
      item.classList.toggle("active");
    });
  });
});
