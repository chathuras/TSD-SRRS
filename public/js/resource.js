$(document).ready(function(){$.ajaxSetup({headers:{"X-CSRF-TOKEN":$('meta[name="csrf-token"]').attr("content")}})}),$(document).ready(function(){var t=function(){$.get("/resource",function(t){t&&(i(),$("#iTbodyResources").html(t),a()),$(".cTrResource").click(function(){var t=$(this).data("id");$.get("/resource/"+t+"/edit",function(e){$("#iDivResourceForm").html(e),n(t),c()})})})},e=function(){$("#iFormResource").submit(function(e){e.preventDefault();var n={name:$("#iInputName").val(),category_id:$("#iInputCategoryId").val(),location:$("#iInputLocation").val(),description:$("#iInputDescription").val()};$.post("/resource",n,function(e){t()})})},n=function(e){$("#iFormResource").submit(function(n){n.preventDefault();var o={_method:"PUT",id:e,name:$("#iInputName").val(),category_id:$("#iInputCategoryId").val(),location:$("#iInputLocation").val(),description:$("#iInputDescription").val()};$.ajax({url:"/resource/"+e,type:"PUT",data:o,success:function(e){t()}})})},o=$(".data-table"),a=function(){o.dataTable({bJQueryUI:!0,sPaginationType:"full_numbers",sDom:'<""l>t<"F"fp>'})},i=function(){o.dataTable().fnDestroy()},c=function(){$("#iSelectCategory").change(function(){var t=$(this).find("option:selected").val();$("#iInputCategoryId").val(t)})};t(),e(),c(),a()});