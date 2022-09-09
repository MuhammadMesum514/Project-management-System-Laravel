$(document).ready(function(){var e=$(".main-wrapper"),t=$(".page-wrapper"),a=$(".slimscroll");if($("#sidebar-menu a").on("click",function(e){$(this).parent().hasClass("submenu")&&e.preventDefault(),$(this).hasClass("subdrop")?$(this).hasClass("subdrop")&&($(this).removeClass("subdrop"),$(this).next("ul").slideUp(350)):($("ul",$(this).parents("ul:first")).slideUp(350),$("a",$(this).parents("ul:first")).removeClass("subdrop"),$(this).next("ul").slideDown(350),$(this).addClass("subdrop"))}),$("#sidebar-menu ul li.submenu a.active").parents("li:last").children("a:first").addClass("active").trigger("click"),$("body").append('<div class="sidebar-overlay"></div>'),$(document).on("click","#mobile_btn",function(){return e.toggleClass("slide-nav"),$(".sidebar-overlay").toggleClass("opened"),$("html").addClass("menu-opened"),$("#task_window").removeClass("opened"),!1}),$(".sidebar-overlay").on("click",function(){$("html").removeClass("menu-opened"),$(this).removeClass("opened"),e.removeClass("slide-nav"),$(".sidebar-overlay").removeClass("opened"),$("#task_window").removeClass("opened")}),$(document).on("click","#task_chat",function(){return $(".sidebar-overlay").toggleClass("opened"),$("#task_window").addClass("opened"),!1}),$(".select").length>0&&$(".select").select2({minimumResultsForSearch:-1,width:"100%"}),$(".modal").length>0){$(".modal").on("show.bs.modal",function(e){var t=$(this),a=$(".modal:visible").not($(this));if(a.length)return a.modal("hide"),a.one("hidden.bs.modal",function(e){t.modal("show")}),!1})}if($(".floating").length>0&&$(".floating").on("focus blur",function(e){$(this).parents(".form-focus").toggleClass("focused","focus"===e.type||this.value.length>0)}).trigger("blur"),a.length>0){a.slimScroll({height:"auto",width:"100%",position:"right",size:"7px",color:"#ccc",wheelStep:10,touchScrollStep:100});var l=$(window).height()-60;a.height(l),$(".sidebar .slimScrollDiv").height(l),$(window).resize(function(){var e=$(window).height()-60;a.height(e),$(".sidebar .slimScrollDiv").height(e)})}var n=$(window).height();t.css("min-height",n),$(window).resize(function(){var e=$(window).height();t.css("min-height",e)}),$(".datetimepicker").length>0&&$(".datetimepicker").datetimepicker({format:"DD/MM/YYYY",icons:{up:"fa fa-angle-up",down:"fa fa-angle-down",next:"fa fa-angle-right",previous:"fa fa-angle-left"}}),$(".datatable").length>0&&$(".datatable").DataTable({bFilter:!1}),$('[data-toggle="tooltip"]').length>0&&$('[data-toggle="tooltip"]').tooltip(),$(".clickable-row").length>0&&$(".clickable-row").click(function(){window.location=$(this).data("href")}),$(document).on("click","#check_all",function(){return $(".checkmail").click(),!1}),$(".checkmail").length>0&&$(".checkmail").each(function(){$(this).on("click",function(){$(this).closest("tr").hasClass("checked")?$(this).closest("tr").removeClass("checked"):$(this).closest("tr").addClass("checked")})}),$(document).on("click",".mail-important",function(){$(this).find("i.fa").toggleClass("fa-star").toggleClass("fa-star-o")}),$(".summernote").length>0&&$(".summernote").summernote({height:200,minHeight:null,maxHeight:null,focus:!1}),$(document).on("click","#task_complete",function(){return $(this).toggleClass("task-completed"),!1}),$("#customleave_select").length>0&&$("#customleave_select").multiselect(),$("#edit_customleave_select").length>0&&$("#edit_customleave_select").multiselect(),$(document).on("click",".leave-edit-btn",function(){return $(this).removeClass("leave-edit-btn").addClass("btn btn-white leave-cancel-btn").text("Cancel"),$(this).closest("div.leave-right").append('<button class="btn btn-primary leave-save-btn" type="submit">Save</button>'),$(this).parent().parent().find("input").prop("disabled",!1),!1}),$(document).on("click",".leave-cancel-btn",function(){return $(this).removeClass("btn btn-white leave-cancel-btn").addClass("leave-edit-btn").text("Edit"),$(this).closest("div.leave-right").find(".leave-save-btn").remove(),$(this).parent().parent().find("input").prop("disabled",!0),!1}),$(document).on("change",".leave-box .onoffswitch-checkbox",function(){var e=$(this).attr("id").split("_")[1];1==$(this).prop("checked")?($("#leave_"+e+" .leave-edit-btn").prop("disabled",!1),$("#leave_"+e+" .leave-action .btn").prop("disabled",!1)):($("#leave_"+e+" .leave-action .btn").prop("disabled",!0),$("#leave_"+e+" .leave-cancel-btn").parent().parent().find("input").prop("disabled",!0),$("#leave_"+e+" .leave-cancel-btn").closest("div.leave-right").find(".leave-save-btn").remove(),$("#leave_"+e+" .leave-cancel-btn").removeClass("btn btn-white leave-cancel-btn").addClass("leave-edit-btn").text("Edit"),$("#leave_"+e+" .leave-edit-btn").prop("disabled",!0))}),$(".leave-box .onoffswitch-checkbox").each(function(){var e=$(this).attr("id").split("_")[1];1==$(this).prop("checked")?($("#leave_"+e+" .leave-edit-btn").prop("disabled",!1),$("#leave_"+e+" .leave-action .btn").prop("disabled",!1)):($("#leave_"+e+" .leave-action .btn").prop("disabled",!0),$("#leave_"+e+" .leave-cancel-btn").parent().parent().find("input").prop("disabled",!0),$("#leave_"+e+" .leave-cancel-btn").closest("div.leave-right").find(".leave-save-btn").remove(),$("#leave_"+e+" .leave-cancel-btn").removeClass("btn btn-white leave-cancel-btn").addClass("leave-edit-btn").text("Edit"),$("#leave_"+e+" .leave-edit-btn").prop("disabled",!0))}),$(".otp-input, .zipcode-input input, .noborder-input input").length>0&&$(".otp-input, .zipcode-input input, .noborder-input input").focus(function(){$(this).data("placeholder",$(this).attr("placeholder")).attr("placeholder","")}).blur(function(){$(this).attr("placeholder",$(this).data("placeholder"))}),$(".otp-input").length>0&&$(".otp-input").keyup(function(e){e.which>=48&&e.which<=57||e.which>=96&&e.which<=105?$(e.target).next(".otp-input").focus():8==e.which&&$(e.target).prev(".otp-input").focus()}),$(document).on("click","#toggle_btn",function(){return $("body").hasClass("mini-sidebar")?($("body").removeClass("mini-sidebar"),$(".subdrop + ul").slideDown()):($("body").addClass("mini-sidebar"),$(".subdrop + ul").slideUp()),!1}),$(document).on("mouseover",function(e){if(e.stopPropagation(),$("body").hasClass("mini-sidebar")&&$("#toggle_btn").is(":visible"))return $(e.target).closest(".sidebar").length?($("body").addClass("expand-menu"),$(".subdrop + ul").slideDown()):($("body").removeClass("expand-menu"),$(".subdrop + ul").slideUp()),!1}),$(document).on("click",".top-nav-search .responsive-search",function(){$(".top-nav-search").toggleClass("active")}),$(document).on("click","#file_sidebar_toggle",function(){$(".file-wrap").toggleClass("file-sidebar-toggle")}),$(document).on("click",".file-side-close",function(){$(".file-wrap").removeClass("file-sidebar-toggle")}),$(".kanban-wrap").length>0&&$(".kanban-wrap").sortable({connectWith:".kanban-wrap",handle:".kanban-box",placeholder:"drag-placeholder"})}),$(window).on("load",function(){$("#loader").delay(100).fadeOut("slow"),$("#loader-wrapper").delay(500).fadeOut("slow")});