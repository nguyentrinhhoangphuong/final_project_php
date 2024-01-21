$(document).ready(function () {
  $(".processShipping").click(function () {
    var fullName = $("input[name='fullname']").val();
    var email = $("input[name='email']").val();
    var phone = $("input[name='phone']").val();
    var address = $("input[name='address']").val();
    var linkSaveInfoOrder = $(this).data("link-process-shipping");
    var linkReviewOrder = $(this).data("link-review-order");
    $.post(
      linkSaveInfoOrder,
      {
        fullname: fullName,
        email: email,
        phone: phone,
        address: address,
      },
      function () {
        window.location.replace(linkReviewOrder);
      }
    );
  });
});
