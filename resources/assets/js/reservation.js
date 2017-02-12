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
        $('.btnViewResource').click(function () {
            var id = $(this).data('id');
            console.log('RES ID ' + id);
            showResourceDialog(id);
        });
        $('.btnReserveResource').click(function () {
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

  var showResourceDialog = function (resourceId) {
      console.log('view resourceId >> ' + resourceId);
      $.get('/reservation/resources/resource/'+ resourceId, function (response) {
          // alert(response);
          $('#resCalendar').html(response);

          $('#resCalendar').attr("class", "modal fade in");
          $('#resCalendar').attr("aria-hidden", "false");

          $( '.btnReserveResourceDialog' ).click(function() {
              var id = $(this).data('id');
              $('#resCalendar').attr("class", "modal fade");
              $('#resCalendar').attr("aria-hidden", "true");
              showReservationDialog(id);
          });

          $( '.btnCancelResourceDialog' ).click(function() {
              $('#resCalendar').attr("class", "modal fade");
              $('#resCalendar').attr("aria-hidden", "true");
              $('#resCalendar').empty();
          });
          event.preventDefault();
      });
  }

  var showReservationDialog = function (resourceId) {
    console.log('resourceId >> 0' + resourceId);
      $.get('/reservation/resources/calendar/'+ resourceId, function (response) {

          if (response) {
              $('#resCalendar').html(response);

              $( "#btnCancelRes" ).click(function() {
                  $('#resCalendar').attr("class", "modal fade");
                  $('#resCalendar').attr("aria-hidden", "true");
                  $('#resCalendar').empty();
              });

              $( "#resSave" ).click(function() {
                  // alert( "Handler for .click() called." + $('#iInputName').val());

                  // console.log($('#iInputStartDate').data('timestamp'));
                  // console.log($('#iInputEndDate').data('timestamp'));
                  if ($('#iFormReservation').valid()) {
                      var reservation = {
                          resource_id: resourceId,
                          purpose: $('#iInputPurpose').val(),
                          name: $('#iInputName').val(),
                          address: $('#iInputAddress').val(),
                          nic: $('#iInputNIC').val(),
                          contact_number: $('#iInputContactNum').val(),
                          email_address: $('#iInputEmail').val(),
                          start: $('#iInputStartDate').data('timestamp'),
                          end: $('#iInputEndDate').data('timestamp'),
                      };

                      // console.log(reservation);

                      // alert( "Handler for .click() called." + reservation);
                      $.post("/reservation", reservation, function (response) {
                          if (response) {
                            alert('Reservation successfully created !');
                          }
                          if (response) {
                              $('#iDivSuccess').show('fast');
                              setTimeout(function () {
                                  $('#iDivSuccess').hide('slow');
                              }, 1000);
                          } else {
                              $('#iDivError').show('fast');
                              setTimeout(function () {
                                  $('#iDivError').hide('slow');
                              }, 2000);
                          }
                          $('#resCalendar').attr("class", "modal fade");
                          $('#resCalendar').attr("aria-hidden", "true");
                          $('#resCalendar').empty();
                      }).fail(function () {
                          $('#iDivError').show('fast');
                          setTimeout(function () {
                              $('#iDivError').hide('slow');
                          }, 2000);
                      });
                  }
                  event.preventDefault();
              });


              // $('#iInputStartDate').datepicker();
              // $('#iInputEndDate').datepicker();

              var date = new Date();
              var d = date.getDate();
              var m = date.getMonth();
              var y = date.getFullYear();

              $('#calendar').fullCalendar({
                  header: {
                      left: 'prev,next today',
                      center: 'title',
                      right: 'month,agendaWeek,agendaDay,listWeek'
                  },
                  editable: true,
                  selectable: true,
                  selectOverlap: false,
                  select: function(start, end, allDay) {

                    var selectionStart = moment(start); var today = moment(); // passing moment nothing defaults to today
                    if (selectionStart < today) { $('#calendar').fullCalendar('unselect'); } else {
                      $('#iInputStartDate').val(start);
                      $('#iInputEndDate').val(end);

                      // console.log(new Date(start).getTime());
                      // console.log(new Date(end).getTime());

                      $('#iInputStartDate').data('timestamp', new Date(start).getTime() / 1000);
                      $('#iInputEndDate').data('timestamp', new Date(end).getTime() / 1000);
                      // alert('START >> ' + new Date(start));
                      /* $('#eventStart').datepicker("setDate", new Date(start));
                       $('#eventEnd').datepicker("setDate", new Date(end));
                       $('#calEventDialog') -->.dialog('open'); */
                    }
                  },
                  events:'/reservation/reservation_search?resource_id='+resourceId
              });
          }
      });
    //$('#resCalendar').html(calendarContent);
    $('#resCalendar').attr("class", "modal fade in");
    $('#resCalendar').attr("aria-hidden", "false");
  };
});
