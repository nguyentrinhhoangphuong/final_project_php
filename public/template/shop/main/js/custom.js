function changeSorting() {
  var sortingOrder = document.getElementById("sorting").value;
  // Retrieve the base URL from the data attribute
  var baseUrl = document.getElementById("base-url").dataset.url;
  // Construct the new URL with the sorting_order parameter
  var newUrl = baseUrl + "&sorting_order=" + sortingOrder;
  // Redirect to the new URL
  window.location.href = newUrl;
}

$(document).ready(function () {
  $("#searchBook").on("keydown", function (event) {
    // Kiểm tra xem phím đã được nhấn là phím Enter hay không
    if (event.which == 13) {
      event.preventDefault();
      var text = $("#searchBook").val();
      var baseUrl = $("#search-book-url").data("url");
      var newUrl = baseUrl + "&search_term=" + text;
      window.location.href = newUrl;
    }
  });
});
