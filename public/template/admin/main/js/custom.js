function changeStatus(url) {
  $.get(
    url,
    function (data) {
      var element = "a#status-" + data["id"];
      var classRemove = "publish";
      var classAdd = "unpublish";
      if (data["status"] == 1) {
        classRemove = "unpublish";
        classAdd = "publish";
      }
      $(element).attr(
        "href",
        "javascript:changeStatus('" + data["link"] + "')"
      );
      $(element + " span")
        .removeClass(classRemove)
        .addClass(classAdd);
    },
    "json"
  );
}

function changeSpecial(url) {
  $.get(
    url,
    function (data) {
      var element = "a#special-" + data["id"];
      var classRemove = "publish";
      var classAdd = "unpublish";
      if (data["special"] == 1) {
        classRemove = "unpublish";
        classAdd = "publish";
      }
      $(element).attr(
        "href",
        "javascript:changeSpecial('" + data["link"] + "')"
      );
      $(element + " span")
        .removeClass(classRemove)
        .addClass(classAdd);
    },
    "json"
  );
}

function submitForm(url) {
  $("#adminForm").attr("action", url);
  $("#adminForm").submit();
}

function sortList(column, order) {
  $("input[name=filter_column]").val(column);
  $("input[name=filter_column_dir]").val(order);
  $("#adminForm").submit();
}

function changePage(page) {
  $("input[name=filter_page]").val(page);
  $("#adminForm").submit();
}

function changeGroupACP(url) {
  $.get(
    url,
    function (data) {
      var element = "a#group-acp-" + data["id"];
      var classRemove = "publish";
      var classAdd = "unpublish";
      if (data["group_acp"] == 1) {
        classRemove = "unpublish";
        classAdd = "publish";
      }
      $(element).attr(
        "href",
        "javascript:changeGroupACP('" + data["link"] + "')"
      );
      $(element + " span")
        .removeClass(classRemove)
        .addClass(classAdd);
    },
    "json"
  );
}

$(document).ready(function () {
  $("input[name=checkall-toggle]").change(function () {
    var checkStatus = this.checked;
    $("#adminForm")
      .find(":checkbox")
      .each(function () {
        this.checked = checkStatus;
      });
  });

  $("#filter-bar button[name=submit-keyword]").click(function () {
    $("#adminForm").submit();
  });

  $("#filter-bar button[name=clear-keyword]").click(function () {
    $("#filter-bar input[name=filter_search]").val("");
    $("#adminForm").submit();
  });

  $("#filter-bar select[name=filter_state]").change(function () {
    $("#adminForm").submit();
  });

  $("#filter-bar select[name=filter_special]").change(function () {
    $("#adminForm").submit();
  });

  $("#filter-bar select[name=filter_group_acp]").change(function () {
    $("#adminForm").submit();
  });

  $("#filter-bar select[name=filter_group_id]").change(function () {
    $("#adminForm").submit();
  });

  $("#filter-bar select[name=filter_category_id]").change(function () {
    $("#adminForm").submit();
  });

  // CHANGE link-ChangeDeliveryStatus

  $('select[name="filter_check"]').on("change", function () {
    var selectedOption = $(this).val();
    var updateStatusUrl = $(this)
      .closest("td")
      .data("link-changedeliverystatus");
    var id = $(this).closest("td").data("id");
    var newUpdateStatusUrl =
      updateStatusUrl + "&deliverystatus=" + selectedOption;
    $.ajax({
      url: newUpdateStatusUrl,
      method: "POST",
      success: function (data) {
        alert(`Đã thay đổi trạng thái đơn hàng có ID = ${id} thành công`);
      },
      error: function (jqXHR, textStatus, errorThrown) {
        console.error("Lỗi khi thực hiện yêu cầu:", textStatus, errorThrown);
      },
    });
  });
});
