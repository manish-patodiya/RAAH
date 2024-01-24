$(function () {
  $(".client-owl").owlCarousel({
    loop: true,
    margin: 20,
    nav: true,
    responsive: {
      0: {
        items: 1,
      },
      600: {
        items: 2,
      },
      1000: {
        items: 2,
      },
    },
  });

  $(".partners-owl").owlCarousel({
    loop: true,
    margin: 20,
    nav: false,
    items: 5,

    responsive: {
      0: {
        items: 3,
      },
      600: {
        items: 5,
      },
      1000: {
        items: 5,
      },
    },
  });

  $(".owl-blog").owlCarousel({
    loop: true,
    margin: 20,
    nav: false,
    items: 5,

    responsive: {
      0: {
        items: 1,
      },
    },
  });

  $("#main-slider")
    .show()
    .revolution({
      sliderType: "standard",
      sliderLayout: "fullscreen",
      scrollbarDrag: "true",
      dottedOverlay: "none",
      navigation: {
        keyboardNavigation: "off",
        keyboard_direction: "horizontal",
        mouseScrollNavigation: "off",
        bullets: {
          style: "",
          enable: true,
          rtl: false,
          hide_onmobile: false,
          hide_onleave: false,
          hide_under: 767,
          hide_over: 9999,
          tmp: "",
          direction: "vertical",
          space: 10,
          h_align: "right",
          v_align: "center",
          h_offset: 40,
          v_offset: 0,
        },
        arrows: {
          enable: false,
          hide_onmobile: true,
          hide_onleave: false,
          hide_under: 767,
          left: {
            h_align: "left",
            v_align: "center",
            h_offset: 20,
            v_offset: 30,
          },
          right: {
            h_align: "right",
            v_align: "center",
            h_offset: 20,
            v_offset: 30,
          },
        },
        touch: {
          touchenabled: "on",
          swipe_threshold: 75,
          swipe_min_touches: 1,
          swipe_direction: "horizontal",
          drag_block_vertical: false,
        },
      },
      viewPort: {
        enable: true,
        outof: "pause",
        visible_area: "90%",
      },
      responsiveLevels: [4096, 1024, 778, 480],
      gridwidth: [1140, 1024, 750, 480],
      gridheight: [600, 500, 500, 350],
      lazyType: "none",
      parallax: {
        type: "mouse",
        origo: "slidercenter",
        speed: 9000,
        levels: [2, 3, 4, 5, 6, 7, 12, 16, 10, 50],
      },
      shadow: 0,
      spinner: "off",
      stopLoop: "off",
      stopAfterLoops: -1,
      stopAtSlide: -1,
      shuffle: "off",
      autoHeight: "off",
      hideThumbsOnMobile: "off",
      hideSliderAtLimit: 0,
      hideCaptionAtLimit: 0,
      hideAllCaptionAtLilmit: 0,
      debugMode: false,
      fallbacks: {
        simplifyAll: "off",
        nextSlideOnWindowFocus: "off",
        disableFocusListener: false,
      },
    });

  $("#btn-send-newslater").click(function () {
    let btn = $(this);
    let btn_htm = btn.html();
    let frm_data = $("#frm-newslater").serialize();
    $.ajax({
      type: "post",
      url: base_url("/frontend/subscribe_newslater"),
      beforeSend: function () {
        btn.html('<i class="fa fa-spin fa-spinner"></i>');
        $("#err-newslater").css("visibility", "hidden");
      },
      data: frm_data,
      dataType: "json",
      success: function (res) {
        if (res.status == 1) {
          //show_toaster("",res.msg, "success");
          $("#err-newslater").html(res.msg);
          $("#err-newslater")
            .css("visibility", "visible")
            .removeClass("text-danger")
            .addClass("text-success");
          $("#inpt-email").val("");
        } else {
          //show_toaster("",res.msg, "error");
          $("#err-newslater").html(res.msg);
          $("#err-newslater")
            .css("visibility", "visible")
            .removeClass("text-success")
            .addClass("text-danger");
        }
      },
      complete: function () {
        btn.html(btn_htm);
      },
    });
  });

  ("use strict");

  $(window).scroll(startCounter);

  function startCounter() {
    var hT = $(".countnm-bx").offset().top,
      hH = $(".countnm-bx").outerHeight(),
      wH = $(window).height();
    if ($(window).scrollTop() > hT + hH - wH) {
      $(window).off("scroll", startCounter);
      $(".countnm").each(function () {
        var $this = $(this);
        $({
          Counter: 0,
        }).animate(
          {
            Counter: $this.text(),
          },
          {
            duration: 2000,
            easing: "swing",
            step: function () {
              $this.text(Math.ceil(this.Counter) + "");
            },
          }
        );
      });
    }
  }
}); // End of use strict