$(document).ready(function () {

    var showReservationDialog = function (resourceId, reservationId) {
        console.log('resourceId >> 0' + resourceId);
        $.get('/reservation/resources/reservations/' + reservationId, function (response) {

            if (response) {
                $('#resCalendar').html(response);

                $("#resSave").click(function () {
                    // alert( "Handler for .click() called." + $('#iInputName').val());
                    var reservation = {
                        resource_id: resourceId,
                        purpose: $('#iInputPurpose').val(),
                        name: $('#iInputName').val(),
                        address: $('#iInputAddress').val(),
                        nic: $('#iInputNIC').val(),
                        contact_number: $('#iInputContactNum').val(),
                        email_address: $('#iInputEmail').val(),
                        start: $('#iInputStartDate').val(),
                        end: $('#iInputEndDate').val(),
                    };

                    // console.log(reservation);

                    // alert( "Handler for .click() called." + reservation);
                    $.post("/reservation", reservation, function (response) {
                        if (response) {
                            alert(response);
                        }
                        $('#resCalendar').attr("class", "modal fade");
                        $('#resCalendar').attr("aria-hidden", "true");
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
                    selectable: true,
                    selectOverlap: false,
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