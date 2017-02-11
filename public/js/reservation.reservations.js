$(document).ready(function () {
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
});
$(document).ready(function () {

    var showReservationDialog = function (resourceId, reservationId) {
        console.log('resourceId >> 0' + resourceId);
        $.get('/reservation/resources/reservations/' + reservationId, function (response) {

            if (response) {
                $('#resCalendar').html(response);

                $( "#btnCancelRes").click(function() {
                    $('#resCalendar').attr("class", "modal fade");
                    $('#resCalendar').attr("aria-hidden", "true");
                    $('#resCalendar').empty();
                });


                $( "#btnResDelete" ).click(function() {
                    Res = confirm('Are you sure you want to delete the selected reservation ? ');

                    $.ajax({
                        url: '/reservation/reservations/' + reservationId,
                        type: 'DELETE',
                        success: function(delResponse) {
                            // Do something with the result
                            if (delResponse) {
                                getReservations();
                                alert('Reservation successfully delete !');
                                $('#resCalendar').attr("class", "modal fade");
                                $('#resCalendar').attr("aria-hidden", "true");
                                $('#resCalendar').empty();
                            } else {
                                alert('delete failed. Pls try again later')
                            }
                        }
                    });
                });

                $("#resSave").click(function () {
                    var reservation = {
                        resource_id: resourceId,
                        purpose: $('#iInputPurpose').val(),
                        name: $('#iInputName').val(),
                        address: $('#iInputAddress').val(),
                        nic: $('#iInputNIC').val(),
                        contact_number: $('#iInputContactNum').val(),
                        email_address: $('#iInputEmail').val(),
                        start: $('#iInputStartDate').data('timestamp'),
                        end: $('#iInputEndDate').data('timestamp')
                    };

                    // console.log(reservation);
                    $.ajax({
                        url: '/reservation/reservations/' + reservationId,
                        type: 'PUT',
                        data: reservation,
                        success: function(putResponse) {
                            // Do something with the result
                            if (putResponse) {
                                getReservations();
                                $('#resCalendar').attr("class", "modal fade");
                                $('#resCalendar').attr("aria-hidden", "true");
                                $('#resCalendar').empty();
                            } else {
                                alert('Update failed. Pls try again later')
                            }
                        }
                    });
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
                    // eventStartEditable: false,
                    select: function(start, end, allDay) {
                        // $('#iInputStartDate').val(start);
                        // $('#iInputEndDate').val(start);

                        $('#iInputStartDate').data('timestamp', new Date(start).getTime()/1000);
                        $('#iInputEndDate').data('timestamp', new Date(end).getTime()/1000);
                        /* $('#eventStart').datepicker("setDate", new Date(start));
                         $('#eventEnd').datepicker("setDate", new Date(end));
                         $('#calEventDialog') -->.dialog('open'); */
                    },
                    eventResize:function(event) {
                        $('#iInputStartDate').val(event.start);
                        $('#iInputEndDate').val(event.end);

                        $('#iInputStartDate').data('timestamp', event.start.toDate().getTime()/1000);
                        $('#iInputEndDate').data('timestamp', event.end.toDate().getTime()/1000);
                    },
                    eventDrop: function(event) {
                        $('#iInputStartDate').val(event.start);
                        $('#iInputEndDate').val(event.end);

                        $('#iInputStartDate').data('timestamp', event.start.toDate().getTime()/1000);
                        $('#iInputEndDate').data('timestamp', event.end.toDate().getTime()/1000);
                    },
                    events:'/reservation/reservation_search?resource_id='+resourceId + '&reservation_id='+reservationId
                });
            }
        });
        console.log('resourceId >> 2' + resourceId);
        //$('#resCalendar').html(calendarContent);
        $('#resCalendar').attr("class", "modal fade in");
        $('#resCalendar').attr("aria-hidden", "false");
    };

    var getReservations = function () {
        //console.log(document.forms[0].elements['category_id'].value)
        //var categoryId = document.forms[0].elements['category_id'].value;
        $.get('/reservation/index', function (response) {

            if (response) {
                destroyDataTable();
                $('#iTbodyReservations').html(response);
                initializeDataTable();
            }

            $('.btnViewReservation').click(function () {
                var resourceId = $(this).data('resource_id');
                var reservationId = $(this).data('reservation_id');
                showReservationDialog(resourceId, reservationId);
            });
        });
    };
    // var bindStoreSubmit = function () {
    //   console.log('SUBMIT EVENT');
    // 	console.log('SUBMIT EVENT>> '+ $('#iInputName').val());
    // 	$('#iListResource').submit(function (event) {
    // 		 console.log('SUBMIT EVENT IN >>');
    //     // TODO add $.blockui
    //     event.preventDefault();
    //   });
    // };

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

    getReservations();
    // bindStoreSubmit();
    initializeDataTable();




});
//# sourceMappingURL=reservation.reservations.js.map
