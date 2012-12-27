/**
	 *size为样式选择
	 *setTime为循环时间
	 *element 为元素节点*/
	function imgJquery(element,size,setTime,animateTime)
	{
		var set;
		var imgPlay;
		// element=element;
		if((!size) || (size=='')) size=1;
		if((!animateTime) || (animateTime=='')) animateTime=500;
		if((!setTime)||(setTime=='')) setTime=5000;
		index=0;
	    var len=$(element).length;
	    set=set+size;
	    set=setInterval(
	    	function()
	    	{
		    	switch(size)
		    	{
		    		case 1:
		    		imgPlay1(element,index,animateTime);
		    		break;
		    		case 2:
		    		imgPlay2(element,index,animateTime);
		    		break;
		    		case 3:
		    		imgPlay3(element,index,animateTime);
		    		break;
		    		default:
		    		alert("请指定样式");

		    	}
		    	index++;
		    	if(index==len) index=0;

		    },setTime);

	}
	/**
	 * 1为渐渐隐藏渐渐显示
	 * 2 从左到右滚动
	 * 3 从下到上滚动
		
	*/
	function imgPlay1(element,index,animateTime)
	{
		$(element).eq(index).fadeIn(animateTime).siblings().hide();
	}
	function imgPlay2(element,index,animateTime)
	{
		$(element).css("float","left");
		var width=$(element).width();
		var parent=$(element).parent();
		$(parent).stop(true,true).animate({"margin-left":-width*index},animateTime);

	}

	function imgPlay3(element,index,animateTime)
	{
		
		var height=$(element).height();
		var parent=$(element).parent();
		$(parent).stop(true,true).animate({"margin-top":-height*index},animateTime);

	}