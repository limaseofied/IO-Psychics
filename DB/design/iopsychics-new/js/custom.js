//<!-- ----------------- Bottom to Top Scroll Button Start ------------------>
// Show button when scrolled down
document.addEventListener("DOMContentLoaded", function () {
  const scrollTopBtn = document.getElementById("scrollTopBtn");
  if (!scrollTopBtn) return;

  // Ensure hidden on load
  scrollTopBtn.classList.remove("show");

  window.addEventListener("scroll", function () {
    if (window.scrollY > 300) {
      scrollTopBtn.classList.add("show");
    } else {
      scrollTopBtn.classList.remove("show");
    }
  }, { passive: true });
});

// Scroll to top
function scrollToTop() {
  window.scrollTo({ top: 0, behavior: "smooth" });
}

// ======================== Working with Logo For Header ======================
document.addEventListener('DOMContentLoaded', function () {
  const logo = document.querySelector('.website-logo');
  if (!logo) return;

  let scrollTouches = 0;
  let scrolling = false;

  window.addEventListener('scroll', function () {
    const y = window.scrollY;

    // Reset when back to top
    if (y === 0) {
      scrollTouches = 0;
      logo.classList.remove('logo-small');
      return;
    }

    // Detect scroll "gesture"
    if (!scrolling) {
      scrolling = true;
      scrollTouches++;

      if (scrollTouches === 2) {
        logo.classList.add('logo-small');
      }

      setTimeout(() => {
        scrolling = false;
      }, 200); // gesture sensitivity
    }
  }, { passive: true });
});

///* ---================-- Smooth Sticky Header Start ---================------- */
document.addEventListener('DOMContentLoaded', function () {
  const header = document.querySelector('header');

  window.addEventListener('scroll', function () {
    if (window.scrollY > 0) {
      header.classList.add('fixed-top');
    } else {
      header.classList.remove('fixed-top');
    }
  });
});

///* ----- Smooth Sticky Header End ---------- */
// ======================== Working with banner For Header ======================
document.addEventListener('DOMContentLoaded', function () {
  const banner = document.querySelector('.home-banner');

  if (!banner) return;

  window.addEventListener('scroll', function () {
    if (window.scrollY > 0) {
      banner.classList.add('scrolled-banner');
    } else {
      banner.classList.remove('scrolled-banner');
    }
  });
});
// ======================== Custom Tabs For Home Page Testimonial ======================
document.querySelectorAll(".tab-nav li").forEach(tab => {
  tab.addEventListener("click", function () {

    // Remove active from all tabs
    document.querySelectorAll(".tab-nav li").forEach(t => t.classList.remove("active"));
    document.querySelectorAll(".tab-pane").forEach(p => p.classList.remove("active"));

    // Add active to clicked tab
    this.classList.add("active");

    // Show corresponding content
    const tabId = this.getAttribute("data-tab");
    document.getElementById(tabId).classList.add("active");

  });
});
// ============================= Zodiac Sign Round Section Horoscopes Page
const hoverTabs = document.querySelectorAll('.hover-tab-btn');
const zodiacContents = document.querySelectorAll('.zodiac-tab-content');

hoverTabs.forEach(tab => {

  tab.addEventListener('mouseenter', () => {

    // Hide ALL contents first
    zodiacContents.forEach(content => {
      content.classList.remove('zodiac-hover-show');
      content.style.display = "none";
    });

    const target = document.getElementById(tab.dataset.tab);

    if (!tab.classList.contains('active')) {
      target.classList.add('zodiac-hover-show');
      target.style.display = "block";
    }
  });

  tab.addEventListener('mouseleave', () => {

    // Remove hover class
    zodiacContents.forEach(content => {
      content.classList.remove('zodiac-hover-show');
      content.style.display = "none";
    });

    // Restore ONLY zodiac-active
    const activeContent = document.querySelector('.zodiac-tab-content.zodiac-active');
    if (activeContent) {
      activeContent.style.display = "block";
    }
  });

});
// ============== Custom Accordian for FAQ ===================
document.querySelectorAll('.accordion-header').forEach(button => {
  button.addEventListener('click', () => {
    const accordionItem = button.parentElement;
    const content = accordionItem.querySelector('.accordion-content');
    const isActive = accordionItem.classList.contains('active');

    // Close all items
    document.querySelectorAll('.accordion-item').forEach(item => {
      item.classList.remove('active');
      const c = item.querySelector('.accordion-content');
      c.style.maxHeight = null;
    });

    // Open clicked item
    if (!isActive) {
      accordionItem.classList.add('active');

      // First reset to get correct height
      content.style.maxHeight = "0px";

      // Force reflow (important for smoothness)
      content.offsetHeight;

      // Then set to actual content height
      content.style.maxHeight = content.scrollHeight + "px";
    }
  });
});
// ====================== Owl Coarousel for Community Section in About Pages
$(document).ready(function () {
  $('.owl-community').owlCarousel({
    loop: true,
    margin: 40,
    nav: true,
    dots: false,
    autoplay: true,
    autoplayHoverPause: true,
    animateIn: '',
    autoplayTimeout: 5000,
    autoplaySpeed: 3000,
    autoHeight: false,
    navText: ["<img src='./images/leftarrowwhite.webp' alt=''>", "<img src='./images/rightarrowwhite.webp' alt=''>"],
    responsive: {
      0: {
        items: 1
      },
      680: {
        items: 2
      },
      1025: {
        items: 3
      },
      1025: {
        items: 4
      }
    }
  });
});
$(document).ready(function () {
  $('.owl-categories-slider').owlCarousel({
    loop: true,
    margin: 40,
    nav: true,
    dots: false,
    autoplay: true,
    autoplayHoverPause: true,
    animateIn: '',
    autoplayTimeout: 5000,
    autoplaySpeed: 3000,
    autoHeight: false,
    navText: ["<img src='./images/leftarrow.webp' alt=''>", "<img src='./images/rightarrow.webp' alt=''>"],
    responsive: {
      0: {
        items: 1
      },
      680: {
        items: 2
      },
      1025: {
        items: 3
      },
      1025: {
        items: 4
      }
    }
  });
});
// ======================== Mega Menu Plugin Definition ======================================
!(function ($, window, document, undefined) {
  $.navigation = function (element, options) {
    var defaults = {
      responsive: true,
      mobileBreakpoint: 991,
      showDuration: 200,
      hideDuration: 200,
      showDelayDuration: 0,
      hideDelayDuration: 0,
      submenuTrigger: "hover",
      effect: "fadeIn",
      submenuIndicator: true,
      submenuIndicatorTrigger: false,
      hideSubWhenGoOut: true,
      visibleSubmenusOnMobile: false,
      fixed: false,
      overlay: true,
      overlayColor: "rgba(0, 0, 0, 0.5)",
      hidden: false,
      hiddenOnMobile: false,
      offCanvasSide: "left",
      offCanvasCloseButton: true,
      animationOnShow: "",
      animationOnHide: "",
      onInit: function () { },
      onLandscape: function () { },
      onPortrait: function () { },
      onShowOffCanvas: function () { },
      onHideOffCanvas: function () { }
    };

    var plugin = this,
      breakpointPrev = Number.MAX_VALUE,
      breakpointCurrent = 1,
      clickEvents = "click.nav touchstart.nav",
      enterEvents = "mouseenter focusin",
      leaveEvents = "mouseleave focusout";

    plugin.settings = $.extend({}, defaults, options);
    plugin.el = $(element);

    if (plugin.el.find(".nav-search").length > 0) {
      plugin.el.find(".nav-search form").prepend(
        "<span class='nav-search-close-button' tabindex='0'>&#10005;</span>"
      );
    }

    plugin.init = function () {
      if (plugin.settings.offCanvasCloseButton) {
        plugin.el.find(".nav-menus-wrapper").prepend(
          "<span class='nav-menus-wrapper-close-button'>&#10005;</span>"
        );
      }

      if (plugin.settings.offCanvasSide === "right") {
        plugin.el.find(".nav-menus-wrapper").addClass("nav-menus-wrapper-right");
      }

      if (plugin.settings.hidden) {
        plugin.el.addClass("navigation-hidden");
        plugin.settings.mobileBreakpoint = 99999;
      }

      setupStructure();
      if (plugin.settings.fixed) plugin.el.addClass("navigation-fixed");

      plugin.el.find(".nav-toggle").on("click touchstart", function (e) {
        e.stopPropagation();
        e.preventDefault();
        plugin.showOffcanvas();
        plugin.callback("onShowOffCanvas");
      });

      plugin.el.find(".nav-menus-wrapper-close-button").on("click touchstart", function () {
        plugin.hideOffcanvas();
        plugin.callback("onHideOffCanvas");
      });

      plugin.el
        .find(".nav-search-button, .nav-search-close-button")
        .on("click touchstart keydown", function (e) {
          e.stopPropagation();
          e.preventDefault();
          var key = e.keyCode || e.which;
          if (e.type === "click" || e.type === "touchstart" || (e.type === "keydown" && key === 13)) {
            plugin.toggleSearch();
          } else if (key === 9) {
            $(e.target).blur();
          }
        });

      $(window).resize(function () {
        plugin.initNavigationMode(getWindowWidth());
        handleOverflow();
        if (plugin.settings.hiddenOnMobile) toggleHiddenOnMobile();
      });

      plugin.initNavigationMode(getWindowWidth());
      if (plugin.settings.hiddenOnMobile) toggleHiddenOnMobile();
      plugin.callback("onInit");
    };

    // Utility functions
    function getWindowWidth() {
      return window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth;
    }

    function toggleHiddenOnMobile() {
      if (plugin.el.hasClass("navigation-portrait")) {
        plugin.el.addClass("navigation-hidden");
      } else {
        plugin.el.removeClass("navigation-hidden");
      }
    }

    function setupStructure() {
      plugin.el.find("li").each(function () {
        if ($(this).children(".nav-dropdown,.megamenu-panel").length > 0) {
          $(this).children(".nav-dropdown,.megamenu-panel").addClass("nav-submenu");
        }
      });
    }

    plugin.showSubmenu = function (el, effect) {
      if (getWindowWidth() > plugin.settings.mobileBreakpoint) {
        plugin.el.find(".nav-search form").fadeOut();
      }

      if (effect === "fade") {
        $(el)
          .children(".nav-submenu")
          .stop(true, true)
          .delay(plugin.settings.showDelayDuration)
          .fadeIn(plugin.settings.showDuration)
          .removeClass(plugin.settings.animationOnHide)
          .addClass(plugin.settings.animationOnShow);
      } else {
        $(el)
          .children(".nav-submenu")
          .stop(true, true)
          .delay(plugin.settings.showDelayDuration)
          .slideDown(plugin.settings.showDuration)
          .removeClass(plugin.settings.animationOnHide)
          .addClass(plugin.settings.animationOnShow);
      }

      $(el).addClass("focus");
    };

    plugin.hideSubmenu = function (el, effect) {
      if (effect === "fade") {
        $(el)
          .find(".nav-submenu")
          .stop(true, true)
          .delay(plugin.settings.hideDelayDuration)
          .fadeOut(plugin.settings.hideDuration)
          .removeClass(plugin.settings.animationOnShow)
          .addClass(plugin.settings.animationOnHide);
      } else {
        $(el)
          .find(".nav-submenu")
          .stop(true, true)
          .delay(plugin.settings.hideDelayDuration)
          .slideUp(plugin.settings.hideDuration)
          .removeClass(plugin.settings.animationOnShow)
          .addClass(plugin.settings.animationOnHide);
      }

      $(el).removeClass("focus").find(".focus").removeClass("focus");
    };

    plugin.showOffcanvas = function () {
      $("body").addClass("no-scroll");

      if (plugin.settings.overlay) {
        plugin.el.append("<div class='nav-overlay-panel'></div>");
        plugin.el.find(".nav-overlay-panel")
          .css("background-color", plugin.settings.overlayColor)
          .fadeIn(300)
          .on("click touchstart", function () {
            plugin.hideOffcanvas();
          });
      }

      var $wrapper = plugin.el.find(".nav-menus-wrapper");
      if (plugin.settings.offCanvasSide === "left") {
        $wrapper.css("transition-property", "left").addClass("nav-menus-wrapper-open");
      } else {
        $wrapper.css("transition-property", "right").addClass("nav-menus-wrapper-open");
      }
    };

    plugin.hideOffcanvas = function () {
      var $wrapper = plugin.el.find(".nav-menus-wrapper");
      $wrapper.removeClass("nav-menus-wrapper-open").on("transitionend", function () {
        $wrapper.css("transition-property", "none").off();
      });

      $("body").removeClass("no-scroll");
      plugin.el.find(".nav-overlay-panel").fadeOut(400, function () {
        $(this).remove();
      });
    };

    plugin.toggleSearch = function () {
      var $searchForm = plugin.el.find(".nav-search form");
      var $input = $searchForm.find("input");

      if ($searchForm.css("display") === "none") {
        $searchForm.fadeIn(200);
        $input.focus();
      } else {
        $searchForm.fadeOut(200);
        $input.blur();
      }
    };

    plugin.initNavigationMode = function (w) {
      if (plugin.settings.responsive) {
        if (w <= plugin.settings.mobileBreakpoint && breakpointPrev > plugin.settings.mobileBreakpoint) {
          plugin.el.addClass("navigation-portrait").removeClass("navigation-landscape");
          activateMobileEvents();
          plugin.callback("onPortrait");
        }

        if (w > plugin.settings.mobileBreakpoint && breakpointCurrent <= plugin.settings.mobileBreakpoint) {
          plugin.el.addClass("navigation-landscape").removeClass("navigation-portrait");
          activateDesktopEvents();
          plugin.hideOffcanvas();
          plugin.callback("onLandscape");
        }

        breakpointPrev = w;
        breakpointCurrent = w;
      } else {
        plugin.el.addClass("navigation-landscape");
        activateDesktopEvents();
        plugin.callback("onLandscape");
      }
    };

    function activateMobileEvents() {
      plugin.el.find(".nav-submenu").hide(0);
    }

    function activateDesktopEvents() {
      plugin.el.find(".nav-menu li").off(clickEvents + " " + enterEvents + " " + leaveEvents);
      plugin.el.find(".nav-menu li").on("mouseenter", function () {
        plugin.showSubmenu(this, plugin.settings.effect);
      }).on("mouseleave", function () {
        plugin.hideSubmenu(this, plugin.settings.effect);
      });
    }

    plugin.callback = function (name) {
      if (typeof plugin.settings[name] === "function") {
        plugin.settings[name].call(element);
      }
    };

    plugin.init();
  };

  $.fn.navigation = function (options) {
    return this.each(function () {
      if (!$.data(this, "navigation")) {
        $.data(this, "navigation", new $.navigation(this, options));
      }
    });
  };
})(jQuery, window, document);

// ======================== Mega Menu Initialization ======================================
(function ($) {
  "use strict";

  $(document).ready(function () {
    // Initialize ALL navigation elements with class 'navigation'
    $(".navigation").each(function () {
      var $this = $(this);
      var isHidden = $this.hasClass("navigation-hidden-init");

      $this.navigation({
        hidden: isHidden
      });
    });

    // ✅ Handle submenu indicator toggle (mobile)
    $(document).on("click", ".navigation .submenu-indicator", function (e) {
      e.preventDefault();
      e.stopPropagation();

      const $li = $(this).closest("li");
      const $submenu = $li.children(".nav-submenu");

      if ($submenu.is(":visible")) {
        $submenu.slideUp(200);
        $li.removeClass("focus");
      } else {
        $(".navigation .nav-submenu").slideUp(200);
        $(".navigation li").removeClass("focus");
        $submenu.slideDown(200);
        $li.addClass("focus");
      }
    });

    // ✅ Click outside to close dropdowns
    $(document).on("click touchstart", function (e) {
      if ($(e.target).closest(".navigation").length === 0) {
        $(".navigation .nav-submenu").slideUp(200);
        $(".navigation li").removeClass("focus");
      }
    });
  });

  // ✅ Optional: Hide preloader
  $(window).on("load", function () {
    $("#preloader").fadeOut("slow", function () {
      $(this).remove();
    });
  });
})(jQuery);

// ====================== Custom Calender ====================
$(document).ready(function () {
  $(".datepicker").datepicker({
    showOn: "both",       // show calendar icon + on input click
    minDate: 0,           // disable past dates
    dateFormat: "yy-mm-dd" // optional: format date
  });
});

// ======================= Read More and Read Less in Testimonial Section ===============

$(document).ready(function () {
  // Configure/customize these variables.
  var showChar2 = 260;  // How many characters are shown by default
  var ellipsestext = "";
  var moretext = "Read More";
  var lesstext = "Read Less";


  $('.more p').each(function () {
    var content = $(this).html();

    if (content.length > showChar2) {

      var c = content.substr(0, showChar2);
      var h = content.substr(showChar2, content.length - showChar2);

      var html = c + '<span class="moreellipses">' + ellipsestext + '&nbsp;</span><span class="morecontent"><span>' + h + '</span>&nbsp;&nbsp;<a href="" class="morelink">' + moretext + '</a></span>';

      $(this).html(html);
    }

  });

  $(".morelink").click(function () {
    if ($(this).hasClass("less")) {
      $(this).removeClass("less");
      $(this).html(moretext);
    } else {
      $(this).addClass("less");
      $(this).html(lesstext);
    }
    $(this).parent().prev().toggle();
    $(this).prev().toggle();
    return false;
  });
});
// ======================== For Filter Drop Down
document.querySelectorAll(".filter-header").forEach(header => {
  header.addEventListener("click", function (e) {
    e.stopPropagation(); // prevent document click
    const box = this.closest(".filter-box");
    const body = box.querySelector(".filterBody");

    body.classList.toggle("active");
    this.classList.toggle("active");
  });
});

// Close dropdown when clicking outside
document.addEventListener("click", function (e) {
  document.querySelectorAll(".filter-box").forEach(box => {
    if (!box.contains(e.target)) {
      box.querySelector(".filterBody").classList.remove("active");
      box.querySelector(".filter-header").classList.remove("active");
    }
  });
});
// =================== Form Label of input fieled click in Form pages ====
document.querySelectorAll('.floating-input').forEach(input => {

  const label = input.closest('.primary-form-col').querySelector('.floating-label');

  // On Focus
  input.addEventListener('focus', () => {
    label.classList.add('active');
  });

  // On Blur
  input.addEventListener('blur', () => {
    if (input.value === '') {
      label.classList.remove('active');
    }
  });

  // If already has value (page reload case)
  if (input.value !== '') {
    label.classList.add('active');
  }

});
// ================= For Password Visible in Password Input field in Form pages =====
document.querySelectorAll('.toggle-password').forEach(toggle => {

  toggle.addEventListener('click', function () {

    const input = this.closest('.primary-form-col')
      .querySelector('.password-input');

    const icon = this.querySelector('i');

    if (input.type === 'password') {
      // Show password
      input.type = 'text';

      icon.classList.remove('fa-eye-slash');
      icon.classList.add('fa-eye');

      icon.classList.remove('eye-close');
      icon.classList.add('eye-open');

    } else {
      // Hide password
      input.type = 'password';

      icon.classList.remove('fa-eye');
      icon.classList.add('fa-eye-slash');

      icon.classList.remove('eye-open');
      icon.classList.add('eye-close');
    }

  });

});
