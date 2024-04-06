document.addEventListener("DOMContentLoaded", function () {
  document.body.classList.add("js");

  var toggle = document.querySelector("#toggle-navigation");
  var menu = document.querySelector("#menu");

  toggle.addEventListener("click", function () {
    if (menu.classList.contains("is-active")) {
      this.setAttribute("aria-expanded", "false");
      menu.classList.remove("is-active");
    } else {
      menu.classList.add("is-active");
      this.setAttribute("aria-expanded", "true");
    }
  });

  if (document.getElementById("article-content")) {
    tinymce.init({
      menubar: false,
      selector: "#article-content",
      toolbar: "bold italic link",
      plugins: "link",
      target_list: false,
      link_title: false,
    });
  }
});
