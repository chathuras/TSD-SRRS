$(document).ready(function () {
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
});
$(document).ready(function () {
  var getCategories = function () {
    $.get('/category', function (response) {

      if (response) {
        destroyDataTable();
        $('#iTbodyCategories').html(response);
        initializeDataTable();
      }

      $('.cTrCategory').click(function () {
        var id = $(this).data('id');

        $.get('/category/' + id + '/edit', function (response) {
          $('#iDivCategoryForm').html(response);
          bindUpdateFormSubmit(id);
        });
      });
    });
  };

  var bindStoreSubmit = function () {
    $('#iFormCategory').submit(function (event) {
      // TODO add $.blockui
      event.preventDefault();
      var category = {name: $('#iInputName').val(), description: $('#iTextDescription').val()};

      $.post("/category", category, function (response) {
        getCategories();
      });
    });
  };

  var bindUpdateFormSubmit = function (id) {
    $('#iFormCategory').submit(function (event) {
      // TODO add $.blockui
      event.preventDefault();
      var category = {_method: 'PUT', id: id, name: $('#iInputName').val(), description: $('#iTextDescription').val()};

      $.ajax({
        url: '/category/' + id, type: 'PUT', data: category, success: function (response) {
          getCategories();
        }
      });
    });
  };

  var dataTable = $('.data-table');

  var initializeDataTable = function () {
    dataTable.dataTable({
      "bJQueryUI": true,
      "sPaginationType": "full_numbers",
      "sDom": '<""l>t<"F"fp>'
    });
  };

  var destroyDataTable = function () {
    dataTable.dataTable().fnDestroy();
  };

  getCategories();
  bindStoreSubmit();
  initializeDataTable();
});
//# sourceMappingURL=category.js.map
