$(document).ready(function () {
  var getResources = function () {
    $.get('/resource', function (response) {

      if (response) {
        destroyDataTable();
        $('#iTbodyResources').html(response);
        initializeDataTable();
      }

      $('.cBtnEdit').click(function () {
        var id = $(this).data('id');

        $.get('/resource/' + id + '/edit', function (response) {
          $('#iDivResourceForm').html(response);
          bindUpdateSubmit(id);
          bindCategorySelect();
        });
      });

      $('.cBtnDelete').click(function () {
          var id = $(this).data('id');
          bootbox.confirm('Are you sure?', function (result) {
          if (result) {
            $.get('/resource/' + id + '/delete', function (response) {
                if (response) {
                    $('#iDivSuccess').show('fast');
                    setTimeout(function () {
                        $('#iDivSuccess').hide('slow');
                    }, 2000);
                    getResources();
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
          }});
      });

    });
  };

  var bindStoreSubmit = function () {
    $('#iFormResource').submit(function (event) {
      // TODO add $.blockui
      event.preventDefault();
      if ($('#iFormResource').valid()) {
        var resource = {
            name: $('#iInputName').val(),
            category_id: $('#iInputCategoryId').val(),
            location: $('#iInputLocation').val(),
            description: $('#iInputDescription').val()
        };

        $.post("/resource", resource, function (response) {

            if (response) {
                $('#iDivSuccess').show('fast');
                setTimeout(function () {
                    $('#iDivSuccess').hide('slow');
                }, 2000);
                getResources();
                $('#iFormResource')[0].reset();
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

  var bindUpdateSubmit = function (id) {
    $('#iFormResource').submit(function (event) {
      // TODO add $.blockui
      event.preventDefault();

      if ($('#iFormResource').valid()) {
          var resource = {
              id: id,
              name: $('#iInputName').val(),
              category_id: $('#iInputCategoryId').val(),
              location: $('#iInputLocation').val(),
              description: $('#iInputDescription').val()
          };
          $.ajax({
              url: '/resource/' + id, type: 'PUT', data: resource, success: function (response) {

                  if (response) {
                      $('#iDivSuccess').show('fast');
                      setTimeout(function () {
                          $('#iDivSuccess').hide('slow');
                      }, 2000);
                      getResources();
                      $('#iFormCategory')[0].reset();
                  } else {
                      $('#iDivError').show('fast');
                      setTimeout(function () {
                          $('#iDivError').hide('slow');
                      }, 2000);
                  }

              }
          }).fail(function () {
              $('#iDivError').show('fast');
              setTimeout(function () {
                  $('#iDivError').hide('slow');
              }, 2000);
          });

      }
      console.log(resource);


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