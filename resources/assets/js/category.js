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
      event.preventDefault();
      // TODO add $.blockui
      if ($('#iFormCategory').valid()) {
        var category = {
          name: $('#iInputName').val(),
          description: $('#iTextDescription').val(),
          icon: $('#iInputIcon').val(),
          color: $('#iInputColor').val()
        };

        $.post("/category", category, function (response) {
          if (response) {
            $('#iDivSuccess').show('fast');
            setTimeout(function () {
              $('#iDivSuccess').hide('slow');
            }, 1000);
            getCategories();
            $('#iFormCategory')[0].reset();
          } else {
            $('#iDivError').show('fast');
            setTimeout(function () {
              $('#iDivError').hide('slow');
            }, 2000);
          }
        }).fail(function () {
          $('#iDivError').show('fast');
          setTimeout(function () {
            $('#iDivError').hide('slow');
          }, 2000);
        });
      }
    });
  };

  var bindBtnIconUpload = function () {
    $('#iBtnUpload').click(function () {
      $('#iInputIconFile').click();
    });
  };

  var bindColorInput = function () {
    $("#iInputColor").colorpicker();
  };

  var bindUpdateFormSubmit = function (id) {
    $('#iFormCategory').submit(function (event) {
      // TODO add $.blockui
      event.preventDefault();

      var category = {
        _method: 'PUT',
        id: id,
        name: $('#iInputName').val(),
        description: $('#iTextDescription').val()
      };

      $.ajax({
        url: '/category/' + id, type: 'PUT', data: category, success: function () {
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

  var bindInputIconFile = function () {
    $('#iInputIconFile').on('change', function () {
      $.ajax({
        url: "/category/upload",
        data: new FormData($('#iFormCategory')[0]),
        dataType: 'json',
        async: true,
        type: 'POST',
        processData: false,
        contentType: false,
        success: function (response) {
          $('#iInputIconFileName').val($('#iInputIconFile')[0].files[0].name);
          $('#iInputIcon').val(response);
          $('#imgIcon').attr('src', '/storage/category/' + response);
        }
      });
    });
  };

  getCategories();
  bindStoreSubmit();
  bindColorInput();
  bindBtnIconUpload();
  bindInputIconFile();
  initializeDataTable();
});