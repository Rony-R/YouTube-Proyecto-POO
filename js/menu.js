$("#btn-menu").click(function() {
  if ($("#barraNav").hasClass("d-block")) {
    $("#barraNav").removeClass("d-block");
  } else {
    $("#barraNav").addClass("d-block");
  }

  if ($("#yt-body").hasClass("col-md-10")) {
    $("#yt-body").removeClass("col-md-10");
    $("#yt-body").addClass("col-md-12");
  } else {
    $("#yt-body").addClass("col-md-10");
    $("#yt-body").removeClass("col-md-12");
  }
  $("#barraNav").toggle();
});

$(window).resize(function() {
  if ($(window).width() <= 1235) {
    $("#barraNav").removeClass("d-block");
    $("#barraNav").addClass("d-none");
    $("#yt-body").removeClass("col-md-10");
    $("#yt-body").addClass("col-md-12");
  } else {
    if ($("#barraNav").hasClass("d-none")) {
      $("#barraNav").addClass("d-block");
      $("#barraNav").removeClass("d-none");
      $("#yt-body").addClass("col-md-10");
      $("#yt-body").removeClass("col-md-12");
    }
  }
});
