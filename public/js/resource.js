$(document).ready(function(){$.ajaxSetup({headers:{"X-CSRF-TOKEN":$('meta[name="csrf-token"]').attr("content")}})}),$(document).ready(function(){var i=function(){$.get("/resource",function(e){e&&(r(),$("#iTbodyResources").html(e),n()),$(".cBtnEdit").click(function(){var i=$(this).data("id");$.get("/resource/"+i+"/edit",function(e){$("#iDivResourceForm").html(e),t(i),s()})}),$(".cBtnDelete").click(function(){var e=$(this).data("id");bootbox.confirm("Are you sure?",function(t){t&&$.get("/resource/"+e+"/delete",function(e){e?($("#iDivSuccess").show("fast"),setTimeout(function(){$("#iDivSuccess").hide("slow")},2e3),i(),$("#iFormCategory")[0].reset()):($("#iDivError").show("fast"),setTimeout(function(){$("#iDivError").hide("slow")},2e3))}).fail(function(){$("#iDivError").show("fast"),setTimeout(function(){$("#iDivError").hide("slow")},2e3)})})})})},e=function(){$("#iFormResource").submit(function(e){if(e.preventDefault(),$("#iFormResource").valid()){var t={name:$("#iInputName").val(),category_id:$("#iInputCategoryId").val(),location:$("#iInputLocation").val(),description:$("#iInputDescription").val()};$.post("/resource",t,function(e){e?($("#iDivSuccess").show("fast"),setTimeout(function(){$("#iDivSuccess").hide("slow")},2e3),i(),$("#iFormResource")[0].reset()):($("#iDivError").show("fast"),setTimeout(function(){$("#iDivError").hide("slow")},2e3))}).fail(function(){$("#iDivError").show("fast"),setTimeout(function(){$("#iDivError").hide("slow")},2e3)})}})},t=function(e){$("#iFormResource").submit(function(t){if(t.preventDefault(),$("#iFormResource").valid()){var o={id:e,name:$("#iInputName").val(),category_id:$("#iInputCategoryId").val(),location:$("#iInputLocation").val(),description:$("#iInputDescription").val()};$.ajax({url:"/resource/"+e,type:"PUT",data:o,success:function(e){e?($("#iDivSuccess").show("fast"),setTimeout(function(){$("#iDivSuccess").hide("slow")},2e3),i(),$("#iFormCategory")[0].reset()):($("#iDivError").show("fast"),setTimeout(function(){$("#iDivError").hide("slow")},2e3))}}).fail(function(){$("#iDivError").show("fast"),setTimeout(function(){$("#iDivError").hide("slow")},2e3)})}})},o=$(".data-table"),n=function(){o.dataTable({bJQueryUI:!0,sPaginationType:"full_numbers",sDom:'<""l>t<"F"fp>'})},r=function(){o.dataTable().fnDestroy()},s=function(){$("#iSelectCategory").change(function(){var i=$(this).find("option:selected").val();$("#iInputCategoryId").val(i)})};i(),e(),s(),n()});