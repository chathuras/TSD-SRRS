$(document).ready(function(){var t=function(){$.get("/reservation/index",function(t){t&&(a(),$("#iTbodyReservations").html(t),i()),$(".cTrReservation").click(function(){var t=$(this).data("id");showReservationDialog(t)})})},n=function(){$("#iListResource").submit(function(t){t.preventDefault()})},e=$(".data-table"),i=function(){e.dataTable({bJQueryUI:!0,sPaginationType:"full_numbers",sDom:'<""l>t<"F"fp>'})},a=function(){e.dataTable().fnDestroy()},o=function(){$("#iSelectCategory").change(function(){var t=$(this).find("option:selected").val();$("#iInputCategoryId").val(t)})};t(),n(),o(),i()});