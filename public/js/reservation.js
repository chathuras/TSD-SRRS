$(document).ready(function(){$.ajaxSetup({headers:{"X-CSRF-TOKEN":$('meta[name="csrf-token"]').attr("content")}})}),$(document).ready(function(){var e=function(){$.get("/reservation/resources/category_id/"+document.forms[0].elements.category_id.value,function(e){e&&(r(),$("#iTbodyResources").html(e),n()),$("#btnViewResource").click(function(){var e=$(this).data("id");l(e)}),$("#btnReserveResource").click(function(){var e=$(this).data("id");s(e)})})},t=function(){$("#iListResource").submit(function(e){e.preventDefault()})},a=$(".data-table"),n=function(){a.dataTable({bJQueryUI:!0,sPaginationType:"full_numbers",sDom:'<""l>t<"F"fp>'})},r=function(){a.dataTable().fnDestroy()},i=function(){$("#iSelectCategory").change(function(){var e=$(this).find("option:selected").val();$("#iInputCategoryId").val(e)})};e(),t(),i(),n();var l=function(e){$.get("/reservation/resources/resource/"+e,function(e){$("#resCalendar").html(e),$("#resCalendar").attr("class","modal fade in"),$("#resCalendar").attr("aria-hidden","false"),$("#btnReserveResourceDialog").click(function(){var e=$(this).data("id");alert("Handler for btnReserveResource .click() called. ID >> "+e),$("#resCalendar").attr("class","modal fade"),$("#resCalendar").attr("aria-hidden","true"),s(e)}),event.preventDefault()})},s=function(e){$.get("/reservation/resources/calendar/"+e,function(t){if(t){$("#resCalendar").html(t),$("#resSave").click(function(){var t={resource_id:e,purpose:$("#iInputPurpose").val(),name:$("#iInputName").val(),address:$("#iInputAddress").val(),nic:$("#iInputNIC").val(),contact_number:$("#iInputContactNum").val(),email_address:$("#iInputEmail").val(),start:$("#iInputStartDate").val(),end:$("#iInputEndDate").val()};$.post("/reservation",t,function(e){e&&alert(e),$("#resCalendar").attr("class","modal fade"),$("#resCalendar").attr("aria-hidden","true")}),event.preventDefault()}),$("#iInputStartDate").datepicker(),$("#iInputEndDate").datepicker();var a=new Date,n=(a.getDate(),a.getMonth()),r=a.getFullYear();$("#calendar").fullCalendar({header:{left:"prev,next",center:"title",right:"month,basicWeek,basicDay"},editable:!0,selectable:!0,selectOverlap:!1,events:[{title:"All day event",start:new Date(r,n,1)},{title:"Long event",start:new Date(r,n,5),end:new Date(r,n,8)},{id:999,title:"Repeating event",start:new Date(r,n,2,16,0),end:new Date(r,n,3,18,0),allDay:!1},{id:999,title:"Repeating event",start:new Date(r,n,9,16,0),end:new Date(r,n,10,18,0),allDay:!1},{title:"Lunch",start:new Date(r,n,14,12,0),end:new Date(r,n,15,14,0),allDay:!1},{title:"Birthday PARTY",start:new Date(r,n,18),end:new Date(r,n,20),allDay:!1},{title:"Click for Google",start:new Date(r,n,27),end:new Date(r,n,29),url:"http://www.google.com"}]})}}),$("#resCalendar").attr("class","modal fade in"),$("#resCalendar").attr("aria-hidden","false")}});