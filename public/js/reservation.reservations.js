$(document).ready(function () {
	var getReservations = function () {
		//console.log(document.forms[0].elements['category_id'].value)
		//var categoryId = document.forms[0].elements['category_id'].value;
		$.get('/reservation/index', function (response) {

			if (response) {
				destroyDataTable();
				$('#iTbodyReservations').html(response);
				initializeDataTable();
			}

			$('.cTrReservation').click(function () {
				var id = $(this).data('id');
				showReservationDialog(id);
			});
		});
	};
  var bindStoreSubmit = function () {
    console.log('SUBMIT EVENT');
		//$('#iFormReservation').submit(function (event) {
		//document.iFormReservation.iInputNIC
		//var Nic = document.getElementById("iFormReservation").iInputNIC;
		console.log('SUBMIT EVENT>> '+ $('#iInputName').val());
		$('#iListResource').submit(function (event) {
			 console.log('SUBMIT EVENT IN >>');
      // TODO add $.blockui
      event.preventDefault();
     /*  var resource = {
        name: $('#iInputName').val(),
        category_id: $('#iInputCategoryId').val(),
        location: $('#iInputLocation').val(),
        description: $('#iInputDescription').val()
      }; */

    //  $.post("/reservation", resource, function (response) {
    //    getResources();
    //  });
    });
  };

  var bindUpdateSubmit = function (id) {
		console.log('UPDATE SUBMIT EVENT');
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
        url: '/reservation/' + id, type: 'PUT', data: resource, success: function (response) {
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

  getReservations();
  bindStoreSubmit();
  bindCategorySelect();
  initializeDataTable();
});