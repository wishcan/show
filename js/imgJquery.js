/**
	*size为样式选择
	*setTime为循环时间
	*element 为元素节点
	*样式为2时自动生成前后按键
	*
**/
	function imgJquery(element,size,setTime,animateTime)
	{
		
		var set;
		var imgPlay;
		// element=element;
		if((!size) || (size=='')) size=1;
		if((!animateTime) || (animateTime=='')) animateTime=800;
		if((!setTime)||(setTime=='')) setTime=5000;
		index=0;
		switch(size){
			case 1:
			break;
			case 2:
				var html='<span class="prev l"></span><span class="next r"></span>';
				
				$(html).insertAfter($(element).parent());
				$(element).parent().parent().hover(function(){
					
					$(".prev,.next").show();

				},function(){
						$(".prev,.next").hide();
				})
				//uw->UL的总宽度
				//当
				var width=$(element).width();
				var uw=parseInt($(element).length)*width;
			
				$(".prev,.next").hover(function(){

					clearInterval(set);
				},function(){
					var left=parseInt($(element).parent().css("margin-left"));
					index=-(parseInt(left/width));
					imgShow(index);
				})

				$(".prev").click(function(){
						
						 left=parseInt($(element).parent().css("margin-left"));
						if(!((left+width)>0) )
						{
							$(element).parent().stop(true,true).animate({'margin-left':left+width},animateTime);
						}else{
								return false;
						}
				})
				$(".next").click(function(){
					 left=parseInt($(element).parent().css("margin-left"));
					if((left-width)<uw)
					{
						$(element).parent().stop(true,true).animate({'margin-left':left-width},animateTime);

					}else{
						return false;
					}
				})
			break;
			case 3:
			break;
			default:
			break;
		}
	    var len=$(element).length;

	    $(element).hover(function(){
	    	clearInterval(set)
	    	index=$(this).index();
	    },function(){
	    	imgShow(index);
	    })

	    imgShow();
	   function imgShow(){
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
		var len=parseInt($(element).length);
		var pw=width*len;
		$(parent).css('width',pw);
		$(parent).stop(true,true).animate({"margin-left":-width*index},animateTime);

	}

	function imgPlay3(element,index,animateTime)
	{
		
		var height=$(element).height();
		var parent=$(element).parent();
		$(parent).stop(true,true).animate({"margin-top":-height*index},animateTime);

	}