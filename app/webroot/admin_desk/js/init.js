    $(document).ready(function($){
	    
    var winCount = 2;
    var zIndex = 2;	
	var windows = new Array();
	
	/* DO NOT REMOVE, NOTE OUT, OR OTHERWISE HIDE THIS CREDIT, USING THIS CODE WITHOUT THE   */
	/* CREDIT ON DISPLAY IS IN BREACH OF THE ATTACHED LICENCE AGREEMENTS                     */
	//$('head').append('<meta name="generator" value="desktop.udjamaflip.com - Opensource jQuery desktop" />');
	
	//sorts out the dock
    refresh_dock();
    //turns on draggable windows
    enable_draggable();
    
	$('.time').jclock();
	
	var containerHeight = $(document).height();
	containerHeight = (containerHeight - 55);
	$('#window-container').height(containerHeight);
		
	/* deals with window behaviours */
	
	$(".window").live("click", function() {
        zIndex++;
        $(this).css('z-index',zIndex);
    });
    
    $(".window *").live("click", function() {
        zIndex++;
        $(this).css('z-index',zIndex);
    });

    $('a.toggleSize').live("click", function() {
    	
	    /*
	        var contentHeight = (rel[1] - 43);
            var contentWidth = (rel[0] - 26);
            var sideBorders = (rel[1] - 35);
            var bottomBorder = (rel[0] - 35);
	    */
    	
	    if ($(this).parents('.window').height() != $('#window-container').height()) {
		    var tmpPos = $('#window-container').position();
		    windows[$(this).attr('id')+'-height'] = $(this).parents('.window').height();
		    windows[$(this).attr('id')+'-width'] = $(this).parents('.window').width();
		    windows[$(this).attr('id')+'-left'] = tmpPos.left;
		    windows[$(this).attr('id')+'-top'] = tmpPos.top;
    		
		    $(this).parents('.window').css('left','0');
		    $(this).parents('.window').css('top','0');			
    		
		    $(this).parents('.window').css('height',$('#window-container').height());
		    $(this).parents('.window').find('.content').css('height',($('#window-container').height()-43)+'px');
		    $(this).parents('.window').css('width',$('#window-container').width()+'px');
		    $(this).parents('.window').find('.content').css('width',($('#window-container').width()-26)+'px');
		    $(this).parents('.window').find('.leftBorder').css('height',($('#window-container').height()-35)+'px');
		    $(this).parents('.window').find('.rightBorder').css('height',($('#window-container').height()-35)+'px');
		    $(this).parents('.window').find('.bottomBorder').css('width',($('#window-container').width()-35)+'px');
	    } else {
	        //alert(windows[$(this).attr('id')+'-height']);
		    $(this).parents('.window').css('height',windows[$(this).attr('id')+'-height']+'px');
		    $(this).parents('.window').find('.content').css('height',(windows[$(this).attr('id')+'-height'] - 43)+'px');
		    $(this).parents('.window').css('width',windows[$(this).attr('id')+'-width']+'px');
		    $(this).parents('.window').find('.content').css('width',(windows[$(this).attr('id')+'-width'] - 26)+'px');
		    $(this).parents('.window').find('.leftBorder').css('height',(windows[$(this).attr('id')+'-height']-35)+'px');
		    $(this).parents('.window').find('.rightBorder').css('height',(windows[$(this).attr('id')+'-height']-35)+'px');
		    $(this).parents('.window').find('.bottomBorder').css('width',(windows[$(this).attr('id')+'-width']-35)+'px');
    		
		    $(this).parents('.window').css('top',windows[$(this).attr('id')+'-top']);
		    $(this).parents('.window').css('left',windows[$(this).attr('id')+'-left']);
	    }
    	
	    zIndex++;
        $(this).css('z-index',zIndex);
    });

    $(".close").live("click", function() {
		var NewTaskManagerWindows = new Array();
		var new_twi = 0;
		if(typeof(TaskManagerWindows)!='undefined'){
			for (var twi=0;twi<TaskManagerWindows.length;twi++){
				if('win'+TaskManagerWindows[twi]['winCount'] == $(this).parents(".window").attr('id')){
					TaskManagerWindows.splice(twi, 1);
					return true;
				}else{
					NewTaskManagerWindows[new_twi] =  new Array();
					NewTaskManagerWindows[new_twi]['src'] = TaskManagerWindows[twi]['src'];
					NewTaskManagerWindows[new_twi]['winCount'] = TaskManagerWindows[twi]['winCount'];
					NewTaskManagerWindows[new_twi++]['zIndex'] = TaskManagerWindows[twi]['zIndex']; 
				}
			}
		}
        $(this).parents(".window").remove();
		TaskManagerWindows = NewTaskManagerWindows;
    });

    $(".minimise").live("click", function() {
		
		//var pid = [''];
		
        var pid = $(this).parents("[id^=win]").attr("id")
        $(this).parents(".window").css('display','none');

        var title = $(this).parents('.window').find('.title').find('span').html();
        $(".dock-container").append('<a href="#" class="maximise dock-item" id="'+pid+'"><span>'+title+'</span><img src="/admin_desk/images/icons/openWindowDefault.png" alt="'+pid+'" /></a>');
        refresh_dock();
    });
			
	/* after load */
	
	$('a.reload').live("click", function() {
	    zIndex++;
	    $("div[id^=win]").css('z-index',zIndex);
	    $("div[id^=win]").css('display','block');
	    $(this).remove();
	    refresh_dock();
	});
	
	$('a.maximise').live("click", function() {
	    var pid = $(this).attr("id")
	    $("div#"+pid).css('display', 'block');
	    $(this).remove();
	    refresh_dock();
	    zIndex++;
        $(this).css('z-index',zIndex);
	});
	
	/* opens a new window and deals with menu behaviours */
	/*
	$('li#start a').hover(
      function () {
        $(this).find('img').attr('src') = 'images/startButton-on.png';
      }, 
      function () {
        $(this).find('img').attr('src') = 'images/startButton.png';
      }
    );
	*/

	$.window.prepare({
	   dock: 'left',       // change the dock direction: 'left', 'right', 'top', 'bottom'
	   dockArea: $('#window-container'), // set the dock area
	   animationSpeed: 200,  // set animation speed
	   minWinLong: 180       // set minimized window long dimension width in pixel
	});	
	
	
	$("ul.menu a.jwindow").click(function() {
	    winCount++;
	    zIndex++;
	    
	    var title = $(this).html(); //$(this).attr('title');
	    var src = $(this).attr('href');
	    var rel = $(this).attr('rel');
	        
			
		$.window({
			icon: '/favicon.ico',
			title: title,
			url: src,
			showRoundCorner:true,
			bookmarkable:false,
			withinBrowserWindow:true,
			checkBoundary:true,
			height:500,
			width:1000,
			maxWidth: 1000
		});
	    //addWindow(winCount,zIndex,src,rel,title);
	    	    
	    return false;
	});
	
	$("a.dock-item").click(function() {
	    winCount++;
	    zIndex++;
	    
	    var title = $(this).attr('title');
	    var src = $(this).attr('href');
	    var rel = $(this).attr('rel');
	        
	    //addWindow(winCount,zIndex,src,rel,title);
		$.window({
			icon: '/favicon.ico',
			title: title,
			url: src,
			showRoundCorner:true,
			bookmarkable:false,
			withinBrowserWindow:true,
			checkBoundary:true,
			height:500,
			width:1000,
			maxWidth: 1000
		});
	    	    
	    return false;
	});
	
});


function hideAllWindow() {
   $.window.hideAll(); // hide all windows
}
function showAllWindow() {
   $.window.showAll(); // show all windows
}
function closeAllWindow() {
   $.window.closeAll(); // close all windows
}
function closeAllWindowQuiet() {
   $.window.closeAll(true); // close all windows without callback
}