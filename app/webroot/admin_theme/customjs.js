$(document).ready(function(){
	
	//Sidebar Accordion Menu:
		
		$("#main-nav li ul").hide(); // Hide all sub menus
		$("#main-nav li a.current").parent().find("ul").slideToggle("slow"); // Slide down the current menu item's sub menu
		
		$("#main-nav li a.nav-top-item").click( // When a top menu item is clicked...
			function () {
				$(this).parent().siblings().find("ul").slideUp("normal"); // Slide up all sub menus except the one clicked
				$(this).next().slideToggle("normal"); // Slide down the clicked sub menu
				return false;
			}
		);
		
		$("#main-nav li a.no-submenu").click( // When a menu item with no sub menu is clicked...
			function () {
				window.location.href=(this.href); // Just open the link instead of a sub menu
				return false;
			}
		); 

    // Sidebar Accordion Menu Hover Effect:
		
		$("#main-nav li .nav-top-item").hover(
			function () {
				$(this).stop().animate({ paddingRight: "25px" }, 200);
			}, 
			function () {
				$(this).stop().animate({ paddingRight: "15px" });
			}
		);

    //Minimize Content Box
		
		$(".content-box-header h3").css({ "cursor":"s-resize" }); // Give the h3 in Content Box Header a different cursor
		$(".closed-box .content-box-content").hide(); // Hide the content of the header if it has the class "closed"
		$(".closed-box .content-box-tabs").hide(); // Hide the tabs in the header if it has the class "closed"
		
		$(".content-box-header h3").click( // When the h3 is clicked...
			function () {
			  $(this).parent().next().toggle(); // Toggle the Content Box
			  $(this).parent().parent().toggleClass("closed-box"); // Toggle the class "closed-box" on the content box
			  $(this).parent().find(".content-box-tabs").toggle(); // Toggle the tabs
			}
		);

    // Content box tabs:
		
		$('.content-box .content-box-content div.tab-content').hide(); // Hide the content divs
		$('ul.content-box-tabs li a.default-tab').addClass('current'); // Add the class "current" to the default tab
		$('.content-box-content div.default-tab').show(); // Show the div with class "default-tab"
		
		$('.content-box ul.content-box-tabs li a').click( // When a tab is clicked...
			function() { 
				$(this).parent().siblings().find("a").removeClass('current'); // Remove "current" class from all tabs
				$(this).addClass('current'); // Add class "current" to clicked tab
				var currentTab = $(this).attr('href'); // Set variable "currentTab" to the value of href of clicked tab
				$(currentTab).siblings().hide(); // Hide all content divs
				$(currentTab).show(); // Show the content div with the id equal to the id of clicked tab
				return false; 
			}
		);

		
/* 		function tabClick(ele_id){
			$(ele_id).parent().siblings().find("a").removeClass('current');
			$(ele_id).addClass('current');
			var currentTab = $(ele_id).attr('href'); // Set variable "currentTab" to the value of href of clicked tab
			$(currentTab).siblings().hide(); // Hide all content divs
			$(currentTab).show(); // Show the content div with the id equal to the id of clicked tab
		} */
		
    //Close button:
		
		$(".close").click(
			function () {
				$(this).parent().fadeTo(400, 0, function () { // Links with the class "close" will close parent
					$(this).slideUp(400);
				});
				return false;
			}
		);

    // Alternating table rows:
		
		$('tbody tr:even').addClass("alt-row"); // Add class "alt-row" to even table rows

    // Check all checkboxes when the one in a table head is checked:
		
		$('.check-all').click(
			function(){
				$(this).parent().parent().parent().parent().find("input[type='checkbox']").attr('checked', $(this).is(':checked'));   
			}
		);

    // Initialise Facebox Modal window:
		
		//$('a[rel*=modal]').facebox(); // Applies modal window to any link with attribute rel="modal"

    // Initialise jQuery WYSIWYG:
		
	//	$(".wysiwyg").wysiwyg(); // Applies WYSIWYG editor to any textarea with the class "wysiwyg"
	
	

	$( "#datepicker" ).datepicker();
		
		
	/* $('#datepicker').DatePicker({
		format:'Y/m/d',
		date: $('#datepicker').val(),
		current: $('#datepicker').val(),
		starts: 1,
		position: 'r',
		onBeforeShow: function(){
			$('#datepicker').DatePickerSetDate($('#datepicker').val(), true);
		},
		onChange: function(formated, dates){
			$('#datepicker').val(formated);
			//if ($('#closeOnSelect input').attr('checked')) {
			//	$('#datepicker').DatePickerHide();
			//}
		}
	}); */
});
  
function reActivateTabs(){
	$('.content-box ul.content-box-tabs li a').click( // When a tab is clicked...
		function() { 
			$(this).parent().siblings().find("a").removeClass('current'); // Remove "current" class from all tabs
			$(this).addClass('current'); // Add class "current" to clicked tab
			var currentTab = $(this).attr('href'); // Set variable "currentTab" to the value of href of clicked tab
			$(currentTab).siblings().hide(); // Hide all content divs
			$(currentTab).show(); // Show the content div with the id equal to the id of clicked tab
			return false; 
		}
	);
}
 		
function creatTab(link_id, rec_id, href, title, inner_content){
	var loadingGif = '<img src="/img/loading.gif" alt="Loading" />';
	if($('#htab_'+rec_id).length > 0){
		/* $('#htab_'+rec_id).click(); */
 		$.ajax({
			beforeSend:function (XMLHttpRequest) {
				$('#'+link_id).html(loadingGif);
			}, 
			complete:function (XMLHttpRequest, textStatus) {
				$('#htab_'+rec_id).html(title);
				$('#htab_'+rec_id).click();
				$('#'+link_id).html(inner_content);
			}, 
			dataType:"html", 
			evalScripts:true, 
			success:function (data, textStatus) {
				$("#tabc_"+rec_id).html(data);
				messageCloseReactivate();
			}, 
			url:href
		}); 
	}else{
		$('<li><a id="htab_'+rec_id+'" href="#tabc_'+rec_id+'" class="">'+loadingGif+'</a></li>').appendTo('ul.content-box-tabs');
		$('<div style="display: none;" class="tab-content" id="tabc_'+rec_id+'"></div>').appendTo('div.content-box-content');
		reActivateTabs();
		$.ajax({
			beforeSend:function (XMLHttpRequest) {
				$('#'+link_id).html(loadingGif);
			}, 
			complete:function (XMLHttpRequest, textStatus) {
				$('#htab_'+rec_id).html(title);
				$('#htab_'+rec_id).click();
				$('#'+link_id).html(inner_content);
			}, 
			dataType:"html", 
			evalScripts:true, 
			success:function (data, textStatus) {
				$("#tabc_"+rec_id).html(data);
				messageCloseReactivate();
			}, 
			url:href
		});
	}
	return false;
}


function closeTab(eleid){
	var prevLink = $("#htab_"+eleid).parent().prev().find('a');
	var nextLink = $("#htab_"+eleid).parent().next().find('a');
	$('#htab_'+eleid).remove();
	$("#tabc_"+eleid).remove();	
	//reActivateTabs();
	if(nextLink.length>0){
		$('#'+nextLink[0].id).addClass('current'); // Add class "current" to clicked tab
		var currentTab = $('#'+nextLink[0].id).attr('href'); // Set variable "currentTab" to the value of href of clicked tab
		$(currentTab).show(); // Show the content div with the id equal to the id of clicked tab	
	}else if(prevLink.length>0){
		$('#'+prevLink[0].id).addClass('current'); // Add class "current" to clicked tab
		var currentTab = $('#'+prevLink[0].id).attr('href'); // Set variable "currentTab" to the value of href of clicked tab
		$(currentTab).show(); // Show the content div with the id equal to the id of clicked tab
	}else{
		$('#mainlisth').addClass('current'); // Add class "current" to clicked tab
		var currentTab = $('#mainlisth').attr('href'); // Set variable "currentTab" to the value of href of clicked tab
		$(currentTab).show(); // Show the content div with the id equal to the id of clicked tab	
	}

}

function updateMainList(url,title){
	$.ajax({
		beforeSend:function (XMLHttpRequest) {
			$('#mainlisth').html('<img src="/img/loading.gif" alt="Loading" />');
		}, 
		complete:function (XMLHttpRequest, textStatus) {
			$('#mainlisth').html(title);
		}, 
		dataType:"html", 
		evalScripts:true, 
		success:function (data, textStatus) {
			$("#mainlist").html(data);
			messageCloseReactivate(null);
		}, 
		url:url+'/list'
	});

}


function updateUrl(url,title){
	$.ajax({
		beforeSend:function (XMLHttpRequest) {
			$('#mainlisth').html('<img src="/img/loading.gif" alt="Loading" />');
		}, 
		complete:function (XMLHttpRequest, textStatus) {
			$('#mainlisth').html(title);
		}, 
		dataType:"html", 
		evalScripts:true, 
		success:function (data, textStatus) {
			$("#mainlist").html(data);
			PaginationRefresh();
		}, 
		url:url
	});

}

function updatePageLimitUrl(url,title){
	url = url + $('#PageLimit').val();
	$.ajax({
		beforeSend:function (XMLHttpRequest) {
			$('#mainlisth').html('<img src="/img/loading.gif" alt="Loading" />');
		}, 
		complete:function (XMLHttpRequest, textStatus) {
			$('#mainlisth').html(title);
		}, 
		dataType:"html", 
		evalScripts:true, 
		success:function (data, textStatus) {
			$("#mainlist").html(data);
			PaginationRefresh();
		}, 
		url:url
	});

}

function messageCloseReactivate(url,title){
	if(url!=null)
		updateMainList(url,title);
	$(".close").click(
		function () {
			$(this).parent().fadeTo(400, 0, function () { // Links with the class "close" will close parent
				$(this).slideUp(400);
			});
			return false;
		}
	);
}
		
function deleteRec(url,rowid,msg){
	var answer = confirm(msg);
	if (answer){
		$.ajax({
			beforeSend:function (XMLHttpRequest) {
				$('#deleteLink_'+rowid).html('<img src="/img/loading.gif" alt="Loading" />');
			},
			dataType:"html", 
			evalScripts:true, 
			success:function (data, textStatus) {
				$('#row-'+rowid).remove();
				if($('#htab_'+rowid).length>0){
					$('#htab_'+rowid).remove();
					$("#tabc_"+rowid).remove();
				}
			}, 
			url:url
		});
	}
}
  
  
  
function PaginationRefresh(){
	//Minimize Content Box
		
		$(".content-box-header h3").css({ "cursor":"s-resize" }); // Give the h3 in Content Box Header a different cursor
		$(".closed-box .content-box-content").hide(); // Hide the content of the header if it has the class "closed"
		$(".closed-box .content-box-tabs").hide(); // Hide the tabs in the header if it has the class "closed"
		
		$(".content-box-header h3").click( // When the h3 is clicked...
			function () {
			  $(this).parent().next().toggle(); // Toggle the Content Box
			  $(this).parent().parent().toggleClass("closed-box"); // Toggle the class "closed-box" on the content box
			  $(this).parent().find(".content-box-tabs").toggle(); // Toggle the tabs
			}
		);

    // Content box tabs:
		
		$('.content-box .content-box-content div.tab-content').hide(); // Hide the content divs
		$('ul.content-box-tabs li a.default-tab').addClass('current'); // Add the class "current" to the default tab
		$('.content-box-content div.default-tab').show(); // Show the div with class "default-tab"
		
		$('.content-box ul.content-box-tabs li a').click( // When a tab is clicked...
			function() { 
				$(this).parent().siblings().find("a").removeClass('current'); // Remove "current" class from all tabs
				$(this).addClass('current'); // Add class "current" to clicked tab
				var currentTab = $(this).attr('href'); // Set variable "currentTab" to the value of href of clicked tab
				$(currentTab).siblings().hide(); // Hide all content divs
				$(currentTab).show(); // Show the content div with the id equal to the id of clicked tab
				return false; 
			}
		);

		
/* 		function tabClick(ele_id){
			$(ele_id).parent().siblings().find("a").removeClass('current');
			$(ele_id).addClass('current');
			var currentTab = $(ele_id).attr('href'); // Set variable "currentTab" to the value of href of clicked tab
			$(currentTab).siblings().hide(); // Hide all content divs
			$(currentTab).show(); // Show the content div with the id equal to the id of clicked tab
		} */
		
    //Close button:
		
		$(".close").click(
			function () {
				$(this).parent().fadeTo(400, 0, function () { // Links with the class "close" will close parent
					$(this).slideUp(400);
				});
				return false;
			}
		);

    // Alternating table rows:
		
		$('tbody tr:even').addClass("alt-row"); // Add class "alt-row" to even table rows

    // Check all checkboxes when the one in a table head is checked:
		
/* 		$('.check-all').click(
			function(){
				$(this).parent().parent().parent().parent().find("input[type='checkbox']").attr('checked', $(this).is(':checked'));   
			}
		); */

	$("#datepicker" ).datepicker();
	/* 	$('#datepicker').DatePicker({
			format:'Y/m/d',
			date: $('#datepicker').val(),
			current: $('#datepicker').val(),
			starts: 1,
			position: 'r',
			onBeforeShow: function(){
				$('#datepicker').DatePickerSetDate($('#datepicker').val(), true);
			},
			onChange: function(formated, dates){
				$('#datepicker').val(formated);
				//if ($('#closeOnSelect input').attr('checked')) {
				//	$('#datepicker').DatePickerHide();
				//}
			}
		}); */

}


function ajaxSelect(target_ele, url, ModelName){
	$("select#" + target_ele).attr("disabled", true);
	$.getJSON(url,null, function(j){
		var options = '';
		for (var i = 0; i < j.length; i++) {
			
			options += '<option value="' + j[i][ModelName].id + '">' + j[i][ModelName].name + '</option>';
		}
		$("select#" + target_ele).removeAttr("disabled"); 
		$("select#" + target_ele).html(options);
	});
}


function ToggleSideBar(){
	$('#sidebar-wrapper').toggle();
	if($('#sidebar-wrapper').is(":visible")){
		$('#body-wrapper').css('background', 'none');
		$('#sb_splitter').css('marginLeft', '219px');		
		$('#main-content').css('marginLeft', '260px');		
		$('#bodyele').css('background', 'url("/admin_theme/images/bg-body.gif") repeat-y scroll left top #F0F0F0');
	}else{
		$('#body-wrapper').css('background', 'url("/admin_theme/images/bg-radial-gradient.gif") no-repeat fixed 0px top transparent');
		$('#sb_splitter').css('marginLeft', '-11px');
		$('#main-content').css('marginLeft', '30px');	
		$('#bodyele').css('background', 'url("/admin_theme/images/bg-body.gif") repeat-y scroll  -230px top #F0F0F0');
	}
}