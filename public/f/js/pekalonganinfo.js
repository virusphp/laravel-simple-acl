$(document).ready(function() {
  $(".btn-search").click(function() {
    $(".form-search").fadeIn("slow");
    $(".header-logo").hide();
    $(".btn-close").fadeIn("slow");
  });
  $(".btn-close").click(function() {
    $(".form-search").hide();
    $(".header-logo").fadeIn("slow");
    $(".btn-close").hide();
  });

});
$(function() {
  var header = $(".nav-menu");
  $(window).scroll(function() {
    var scroll = $(window).scrollTop();
    if (scroll >= 100) {
      header.addClass("animated fadeInDown sticky-top sticky-top-nav navbar navbar-light bg-light");

    } else {
      header.removeClass("animated fadeInDown sticky-top navbar sticky-top-nav navbar-light bg-light");

    }
  });
});
$(document).ready(function() {
  $('[id^=detail-]').hide();
  $('.toggle').click(function() {
    $input = $(this);
    $target = $('#' + $input.attr('data-toggle'));
    $target.slideToggle();
  });
});
$(function() {
  $(".icon-lo").on("click", function() {
    $(".fa-chevron-right").addClass("fa-chevron-down");
    $(".fa-chevron-right").removeClass("fa-chevron-right");
  });
});
$(function() {
  var header = $(".iklan-kanan");
  $(window).scroll(function() {
    var scroll = $(window).scrollTop();
    if (scroll >= 100) {
      header.addClass("animated fadeInDown sticky-top");
    } else {
      header.removeClass("animated fadeInDown sticky-top");

    }
  });
});
