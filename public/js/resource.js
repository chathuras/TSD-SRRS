$(document).ready(function () {
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
});
$(document).ready(function () {
  var getResources = function () {
    $.get('/resource', function (response) {

      if (response) {
        destroyDataTable();
        $('#iTbodyResources').html(response);
        initializeDataTable();
      }

      $('.cTrResource').click(function () {
        var id = $(this).data('id');

        $.get('/resource/' + id + '/edit', function (response) {
          $('#iDivResourceForm').html(response);
          bindUpdateSubmit(id);
          bindCategorySelect();
        });
      });
    });
  };

  var bindStoreSubmit = function () {
    $('#iFormResource').submit(function (event) {
      // TODO add $.blockui
      event.preventDefault();
      var resource = {
        name: $('#iInputName').val(),
        category_id: $('#iInputCategoryId').val(),
        location: $('#iInputLocation').val(),
        description: $('#iInputDescription').val()
      };

      $.post("/resource", resource, function (response) {
        getResources();
      });
    });
  };

  var bindUpdateSubmit = function (id) {
    $('#iFormResource').submit(function (event) {
      // TODO add $.blockui
      event.preventDefault();
      var resource = {
        _method: 'PUT', id: id, name: $('#iInputName').val(), category_id: $('#iInputCategoryId').val(),
        location: $('#iInputLocation').val(),
        description: $('#iInputDescription').val()
      };

      console.log(resource);

      $.ajax({
        url: '/resource/' + id, type: 'PUT', data: resource, success: function (response) {
          getResources();
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

  var bindCategorySelect = function () {
    $('#iSelectCategory').change(function () {
      var categoryId = $(this).find('option:selected').val();
      $('#iInputCategoryId').val(categoryId);
    });
  };

  getResources();
  bindStoreSubmit();
  bindCategorySelect();
  initializeDataTable();
});
//# sourceMappingURL=resource.js.map
