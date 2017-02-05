$(document).ready(function () {
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
});
$(document).ready(function () {
  var getResources = function () {
    //console.log(document.forms[0].elements['category_id'].value)
    //var categoryId = document.forms[0].elements['category_id'].value;
    $.get('/reservation/resources/category_id/' + document.forms[0].elements['category_id'].value, function (response) {

      if (response) {
        destroyDataTable();
        $('#iTbodyResources').html(response);
        initializeDataTable();
      }

      $('.cTrResource').click(function () {
        var id = $(this).data('id');
        console.log('RES ID ' + id);
        showReservationDialog(id);
      });
    });
  };
  var bindStoreSubmit = function () {
    console.log('SUBMIT EVENT');
    //$('#iFormReservation').submit(function (event) {
    //document.iFormReservation.iInputNIC
    //var Nic = document.getElementById("iFormReservation").iInputNIC;
    console.log('SUBMIT EVENT>> ' + $('#iInputName').val());
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

  getResources();
  bindStoreSubmit();
  bindCategorySelect();
  initializeDataTable();

  var showReservationDialog = function (resourceId) {
    console.log('resourceId >> 0' + resourceId);
      $.get('/reservation/resources/calendar/'+ resourceId, function (response) {

          if (response) {
            alert(response);
              $('#resCalendar').html(response);

              $( "#resSave" ).click(function() {
                  alert( "Handler for .click() called." + $('#iInputName').val());
                  var reservation = {
                      resource_id: resourceId,
                      name: $('#iInputName').val(),
                      address: $('#iInputAddress').val(),
                      nic: $('#iInputNIC').val(),
                      contact_number: $('#iInputContactNum').val(),
                      email_address: $('#iInputEmail').val(),
                      start:$('#iInputStartDate').val(),
                      end:$('#iInputEndDate').val(),
                  };

                  console.log(reservation);

                  // alert( "Handler for .click() called." + reservation);
                  $.post("/reservation", reservation, function (response) {
                      if (response) {
                        alert(response);
                      }
                  });
                  event.preventDefault();
              });


              $('#iInputStartDate').datepicker();
              $('#iInputEndDate').datepicker();

              var date = new Date();
              var d = date.getDate();
              var m = date.getMonth();
              var y = date.getFullYear();

              $('#calendar').fullCalendar({
                  header: {
                      left: 'prev,next',
                      center: 'title',
                      right: 'month,basicWeek,basicDay'
                  },
                  editable: true,
                  events: [
                      {
                          title: 'All day event',
                          start: new Date(y, m, 1)
                      },
                      {
                          title: 'Long event',
                          start: new Date(y, m, 5),
                          end: new Date(y, m, 8)
                      },
                      {
                          id: 999,
                          title: 'Repeating event',
                          start: new Date(y, m, 2, 16, 0),
                          end: new Date(y, m, 3, 18, 0),
                          allDay: false
                      },
                      {
                          id: 999,
                          title: 'Repeating event',
                          start: new Date(y, m, 9, 16, 0),
                          end: new Date(y, m, 10, 18, 0),
                          allDay: false
                      },
                      {
                          title: 'Lunch',
                          start: new Date(y, m, 14, 12, 0),
                          end: new Date(y, m, 15, 14, 0),
                          allDay: false
                      },
                      {
                          title: 'Birthday PARTY',
                          start: new Date(y, m, 18),
                          end: new Date(y, m, 20),
                          allDay: false
                      },
                      {
                          title: 'Click for Google',
                          start: new Date(y, m, 27),
                          end: new Date(y, m, 29),
                          url: 'http://www.google.com'
                      }
                  ]
              });
          }
      });
    /*var dialogContent = '';
    console.log('resourceId >> 1' + resourceId);
    dialogContent += '<div class="modal-dialog" role="document">';
    dialogContent += '<div class="modal-content">';
    dialogContent += '<div class="modal-header">'
    dialogContent += '<button type="button" class="close" data-dismiss="modal" aria-label="Close">'
    dialogContent += '<span aria-hidden="true">&times;</span>';
    dialogContent += '</button>'
    dialogContent += '<h4 class="modal-title" id="myModalLabel">Modal title</h4>';
    dialogContent += '</div>';
    dialogContent += '<div class="modal-body">';
    dialogContent += '<div class="row-fluid">';
    dialogContent += '<div class="span4">';
    dialogContent += '<div class="widget-box">';
    dialogContent += '<div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>';
    dialogContent += '<h5>Personal-info</h5>';
    dialogContent += '</div>';
    dialogContent += '<div class="widget-content nopadding">';
    dialogContent += '<form action="#" method="get" class="form-horizontal" id="iFormReservation">';
    dialogContent += '<input type="hidden" name="resource_id" value="' + resourceId + '">';
    dialogContent += '<label class="control-label">Name :</label>';
    dialogContent += '<div class="controls">';
    dialogContent += '<input type="text" class="span11" placeholder="Name" id="iInputName" />';
    dialogContent += '</div>';
    dialogContent += '<label class="control-label">Address</label>';
    dialogContent += '<div class="controls">';
    dialogContent += '<textarea class="span11" ></textarea>';
    dialogContent += '</div>';
    dialogContent += '<label class="control-label">NIC number :</label>';
    dialogContent += '<div class="controls">';
    dialogContent += '<input type="text" class="span11" placeholder="NIC number" id="iInputNIC" />';
    dialogContent += '</div>';
    dialogContent += '<label class="control-label">Contact number :</label>';
    dialogContent += '<div class="controls">';
    dialogContent += '<input type="text" class="span11" placeholder="Contact number"  id="iInputContactNum" />';
    dialogContent += '</div>';
    dialogContent += '<label class="control-label">Email address :</label>';
    dialogContent += '<div class="controls">';
    dialogContent += '<input type="text" class="span11" placeholder="Email address"  id="iInputEmail" />';
    dialogContent += '</div>';
    dialogContent += '<label class="control-label">Reservation Start Date :</label>';
    dialogContent += '<div class="controls">';
    dialogContent += '<div class="input-append date datepicker">';
    dialogContent += '<input type="text" data-date-format="mm-dd-yyyy" class="span9" id="iInputStartDate" >';
    dialogContent += '<span class="add-on"><i class="icon-th"></i></span> </div>';
    dialogContent += '</div>';
    dialogContent += '<label class="control-label">Reservation End Date :</label>';
    dialogContent += '<div class="controls">';
    dialogContent += '<div class="input-append date datepicker">';
    dialogContent += '<input type="text" data-date-format="mm-dd-yyyy" class="span9" id="iInputEndDate" >';
    dialogContent += '<span class="add-on"><i class="icon-th"></i></span> </div>';
    dialogContent += '</div>';
    dialogContent += '<div class="form-actions">';
    dialogContent += '<button type="button" class="btn btn-success" id="resSave">Save</button>';
    dialogContent += '<button type="reset" class="btn btn-success">Cancel</button>';
    dialogContent += '</div>';
    dialogContent += '</form>';
    dialogContent += '</div>';
    dialogContent += '</div>';
    dialogContent += '</div>';
    dialogContent += '<div class="span8">';
    dialogContent += '<div class="widget-box widget-calendar">';
    dialogContent += '<div class="widget-title"> <span class="icon"><i class="icon-calendar"></i></span>';
    dialogContent += '<h5>Calendar</h5>';
    dialogContent += '</div>';
    dialogContent += '<div class="widget-content">';
    dialogContent += '<div id="calendar"></div>';
    dialogContent += '</div>';
    dialogContent += '</div>';*/
    /*dialogContent += '</div>';
    dialogContent += '</div>';
    dialogContent += '</div>';
    dialogContent += '</div>';
    dialogContent += '</div>';*/
    console.log('resourceId >> 2' + resourceId);
    //$('#resCalendar').html(calendarContent);
    $('#resCalendar').attr("class", "modal fade in");
    $('#resCalendar').attr("aria-hidden", "false");



  };
});

//# sourceMappingURL=reservation.js.map
