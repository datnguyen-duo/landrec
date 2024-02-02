import $ from "jquery/src/jquery";
import "../src/styles/style.scss";
import "./scripts/modules/select";
import "./scripts/modules/woocommerce/woocomerce-custom-side-cart";
import "./scripts/modules/nav";
import "./scripts/modules/search";
import "./scripts/modules/cards-swiper";
import "./scripts/modules/hero-swiper";
import "./scripts/pages/contact";
import "./scripts/pages/projects";
import "./scripts/pages/single-projects";
import "./scripts/pages/blog";
import "./scripts/pages/products";
import "./scripts/pages/faq";

import "./scripts/pages/woocommerce/single-product";
import "./scripts/pages/woocommerce/woocomerce-checkout";
import "./scripts/pages/woocommerce/archive-products";
import "./scripts/modules/posts-filters";

import ScrollTrigger from "gsap/ScrollTrigger";
import gsap from "gsap";
gsap.registerPlugin(ScrollTrigger);

const anchorItems = document.querySelectorAll("a");
for (let i = 0; i < anchorItems.length; i++) {
  anchorItems[i].addEventListener("click", function (event) {
    let scrollTarget = anchorItems[i].getAttribute("href");

    if (scrollTarget.includes("#")) {
      let hashPosition = scrollTarget.search("#");
      let anchor = scrollTarget.substring(hashPosition, scrollTarget.length);
      console.log(hashPosition);
      console.log(anchor);
      if (document.querySelector(anchor)) {
        event.preventDefault();
        $("html, body").animate({ scrollTop: $(anchor).offset().top }, 1000);
      }
    }
  });
}

const fadeInElements = gsap.utils.toArray(".slide-up-element");
fadeInElements.forEach((item, index) => {
  gsap.from(item, {
    scrollTrigger: {
      trigger: item,
      // toggleActions: 'restart none none none',
      start: "top 80%",
      // end: 'bottom top',
      // markers: true,
      // scrub: true,
    },
    yPercent: 30,
    opacity: 0,
  });
});

document.addEventListener("DOMContentLoaded", function () {
  var acceptance = document.querySelectorAll(".wpcf7-acceptance input");
  acceptance.forEach(function (item) {
    setTimeout(() => {
      item.checked = true;
    }, 1000);
  });
});
