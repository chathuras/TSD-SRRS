$(document).ready(function () {
  var getCategories = function() {
    $.get('/category', function (response) {
      $('#iTbodyCategories').html(response);
    });
  };

  console.log('test');
  getCategories();
  $('#iFormCategory').submit(function (event) {
    // TODO add $.blockui
    event.preventDefault();
    var category = {name: $('#iInputName').val(), description: $('#iTextDescription').val()};
    console.log(category);

    $.post("/category", category, function (response) {
      // TODO : update the list
      getCategories();
    });

  });


});