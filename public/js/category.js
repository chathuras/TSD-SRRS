$(document).ready(function(){$.ajaxSetup({headers:{"X-CSRF-TOKEN":$('meta[name="csrf-token"]').attr("content")}})}),$(document).ready(function(){var t=function(){$.get("/category",function(t){$("#iTbodyCategories").html(t),$(".data-table").dataTable({bJQueryUI:!0,sPaginationType:"full_numbers",sDom:'<""l>t<"F"fp>'})})};t(),$("#iFormCategory").submit(function(e){e.preventDefault();var a={name:$("#iInputName").val(),description:$("#iTextDescription").val()};$.post("/category",a,function(e){t()})})});