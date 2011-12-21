function enable_draggable()
{
    $('.window').draggable({
		containment: '#window-container',
		handle: $('.title'),
		//opacity: 0.8,
		
        stop: function(e, ui) {
            $('.window').find('.screen').remove();
        }
	});
	
	
	$('.window')
	.bind('dragstart',function( event ){
        $('.window').append('<div id="screen'+$('.window').attr('id')+'" class="screen"></div>');
        $('.window').find('.screen').css('width',$('.window').find('.content').width());
        $('.window').find('.screen').css('height',$('.window').find('.content').height());
        $('.window').find('.screen').css('position','absolute');
        $('.window').find('.screen').css('top','21px');
        $('.window').find('.screen').css('left','4px');
        $('.window').find('.screen').css('background-color','Transparent');
        $('.window').find('.screen').css('z-index','9999');
    });
}

function enable_resizeable()
{
    $(".window").resizable({
		containment: '#window-container'
	});
	
	$('.window').bind('resize', function(event, ui) {
	    var height = $(this).height();
	    var width = $(this).width();
        var contentHeight = (height - 43);
        var contentWidth = (width - 26);
        /*var contentHeight = (height - 73);
        var contentWidth = (width - 56);*/
        var rightBorder = (height - 36);
        var leftBorder = (height - 35);
        var bottomBorder = (width - 35);
        
        /*jQuery(this).children('div.leftBorder').height(leftBorder);
        jQuery(this).children('div.rightBorder').height(rightBorder);
        jQuery(this).children('div.bottomBorder').width(bottomBorder);
        jQuery(this).children('div.contentWrapper').width((jQuery(this).width()-18));*/
        $(this).children('.content').css('height', contentHeight + 'px');
        $(this).children('.content').css('width', contentWidth + 'px');
        $(this).children('.leftBorder').css('height', leftBorder + 'px');
        $(this).children('.rightBorder').css('height', rightBorder + 'px');
        $(this).children('.bottomBorder').css('width', bottomBorder + 'px');
    });
}

function addWindow(winCount,zIndex,src,rel,title)
{
	if(typeof(TaskManagerWindows)!='undefined'){
		for (var twi=0;twi<TaskManagerWindows.length;twi++){
			if(TaskManagerWindows[twi]['src'] == src){
				$('#win'+TaskManagerWindows[twi]['winCount']).css('zIndex',zIndex);
				$('#win'+TaskManagerWindows[twi]['winCount']).css('display','block');
				$('a#win'+TaskManagerWindows[twi]['winCount']).remove();
				refresh_dock();
				return true;
			}
		}
	}
	
	if(typeof(TaskManagerWindows)=='undefined'){
		TaskManagerWindows =  new Array();
		TaskManagerWindows[0] =  new Array();
		TaskManagerWindows[0]['src'] = src;
		TaskManagerWindows[0]['winCount'] = winCount;
		TaskManagerWindows[0]['zIndex'] = zIndex;
	}else{
		var TaskManagerWindowsLength = TaskManagerWindows.length;
		TaskManagerWindows[TaskManagerWindowsLength] =  new Array();
		TaskManagerWindows[TaskManagerWindowsLength]['src'] = src;
		TaskManagerWindows[TaskManagerWindowsLength]['winCount'] = winCount;
		TaskManagerWindows[TaskManagerWindowsLength]['zIndex'] = zIndex;
	}

	
		
	
    rel = rel.split('-');
    var height = rel[1];
	var width = rel[0];
    if (rel[2] && rel[2] != 0)
    {
        var coordX = rel[2];
        var coordY = rel[3];
    }
    else
    {
        var coordX = 50;
        var coordY = 50;
    }
    var contentHeight = (rel[1] - 43);
    var contentWidth = (rel[0] - 26);
    var rightBorder = (rel[1] - 36);
    var leftBorder = (rel[1] - 35);
    var bottomBorder = (rel[0] - 35);

    $("#window-container").append('<div id="win' + winCount + '" class="window" style="z-index:' + zIndex + '; height:' + height + 'px; width:' + width + 'px; top:' + coordY + '; left:' + coordX + ';"><div class="leftBorder" style="height:' + leftBorder + 'px;"></div><div class="rightBorder" style="height:' + rightBorder + 'px;"></div><img class="bottomLeftCorner" alt="" src="/admin_desk/images/window/bottomLeftCorner.png" /><img class="bottomRightCorner" alt="" src="/admin_desk/images/window/bottomRightCorner.png" /><div class="bottomBorder" style="width:' + bottomBorder + 'px;"></div><div class="contentWrapper"><div class="title"><img src="/admin_desk/images/window/miniLogo.png" alt="" /> <span>' + title + '</span><div class="icons"><a href="#" class="minimise"><img src="/admin_desk/images/minimise.png" alt="[-]" /></a><a href="#" class="toggleSize"><img src="/admin_desk/images/maximise.png" alt="[O]" /></a><a href="#" class="close"><img src="/admin_desk/images/close.png" alt="[X]" /></a></div></div><iframe class="content" style="height:' + contentHeight + 'px; width:' + contentWidth + 'px;" src="' + src + '"></iframe></div><img class="topLeftCorner" alt="" src="/admin_desk/images/window/topLeftCorner.png" /><img class="topRightCorner" alt="" src="/admin_desk/images/window/topRightCorner.png" /></div>');
    
    //document.location.href = document.location.href +'#?url='+ src;
    enable_draggable();
    //enable resizeable
    enable_resizeable();
}

function refresh_dock()
{
    $('#dock').Fisheye(
    {
		maxWidth: 40,
		items: 'a',
		itemsText: 'span',
		container: '.dock-container',
		itemWidth: 30,
		proximity: 50,
		alignment : 'left',
		valign: 'bottom',
		halign : 'center'
	});
}