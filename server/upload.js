$(".input-file").on("change", function () {
    const target = $(this).attr("id")
    $(".js-" + target).text($(this).val())
  })