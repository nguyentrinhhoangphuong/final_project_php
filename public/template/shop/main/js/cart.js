$(document).ready(function () {
  $(".addToCartButton").click(function () {
    // Lấy thông tin sản phẩm từ nút
    var infoBook = $(this).data("info-book");
    var quantity = $(this).closest(".pt-2").find(".selectQuantity").val();

    // kiểm tra xem đầu vào của infobook là object hay json
    if (quantity >= 1 && typeof infoBook === "object" && infoBook !== null) {
      infoBook.quantity = quantity;
      infoBook = JSON.stringify(infoBook);
    }

    // Lấy URL từ thuộc tính data
    var addToCartUrl = $(this).data("link-cart");
    // Gửi yêu cầu Ajax để thêm vào giỏ hàng
    $.ajax({
      method: "POST",
      contentType: "application/json",
      url: addToCartUrl,
      data: JSON.stringify({ infoBook }),
      success: function (response) {
        console.log(response);
        var data = JSON.parse(response);
        var numberOfBooks = data.numberOfBooks;
        var total = data.total;
        $("#numberOfBooks").text(numberOfBooks);
        $("#total").html("<small>Giỏ hàng</small>" + total + " đ");
        var successToast = new bootstrap.Toast(
          document.querySelector(".toast")
        );
        successToast.show();
      },
      error: function () {
        console.log("Đã xảy ra lỗi khi thêm vào giỏ hàng");
      },
    });
  });

  $(".updateCart").click(function () {
    var updates = [];
    var updateCartUrl = $(this).data("link-update-cart");
    $(".quantity-input").each(function () {
      var bookId = $(this).attr("id");
      var quantity = $(this).val();
      updates.push({ bookId: bookId, quantity: quantity });
    });

    $.ajax({
      method: "POST",
      contentType: "application/json",
      url: updateCartUrl,
      data: JSON.stringify({ updates }),
      success: function (response) {
        window.location.reload();
      },
      error: function () {
        console.log("Đã xảy ra lỗi khi cập nhật giỏ hàng");
      },
    });
  });

  $(".deleteItem").click(function () {
    var deleteItem = $(this).data("delete-item");
    var deleteItemUrl = $(this).data("link-delete-item");
    $.ajax({
      url: deleteItemUrl,
      method: "POST",
      data: JSON.stringify({ id: deleteItem }),
      success: function (data) {
        window.location.reload();
      },
      error: function (jqXHR, textStatus, errorThrown) {
        console.error("Lỗi khi thực hiện yêu cầu:", textStatus, errorThrown);
      },
    });
  });
});
