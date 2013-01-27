/**
	*size为样式选择
	*setTime为循环时间
	*element 为元素节点
	*样式为2时自动生成前后按键
	*width,height分别为要滚动的值
**/
	function imgJquery(element,size,setTime,animateTime,width,height)
	{

		var set;
		var imgPlay;
		// element=element;
		if((!size) || (size=='')) size=1;
		if((!animateTime) || (animateTime=='')) animateTime=800;
		if((!setTime)||(setTime=='')) setTime=5000;


		var i=j=k=0;
		var l1=l2=l3=0
		switch(size){
			case 1:
			break;
			case 2:
				//var html='<span class="prev l"></span><span class="next r"></span>';
				//$(html).insertAfter($(element).parent());
				// $(element).parent().parent().hover(function(){
					
				// 	$(".prev,.next").show();

				// },function(){
				// 		$(".prev,.next").hide();
				// })
				//uw->UL的总宽度
				// //点击.prev 或者.next 的时候停止动画计算当前

				// var width=$(element).width();
				// var uw=parseInt($(element).length)*width;
			
				// $(".prev,.next").hover(function(){

				// 	clearInterval(set);
				// },function(){
				// 	var left=parseInt($(element).parent().css("left"));
				// 	index=-(parseInt(left/width));
				// 	imgShow(index);
				// })

				// $(".prev").click(function(){
						
				// 		 left=parseInt($(element).parent().css("left"));
				// 		if(!((left+width)>0) )
				// 		{
				// 			$(element).parent().stop(true,true).animate({'-left':left+width},animateTime);
				// 		}else{
				// 				return false;
				// 		}
				// })
				// $(".next").click(function(){

				// 	 left=parseInt($(element).parent().css("left"));

				// 	if((left-width)>(-uw))
				// 	{

				// 		$(element).parent().stop(true,true).animate({'left':left-width},animateTime);

				// 	}else{

				// 		return false;
				// 	}
				// })
		if($(".num b").length!==0)
		{

			$(".num b").live('click',function()
			{

				$(this).addClass('bon').siblings().removeClass("bon");
				 j=$(this).index();//获得当前圆点的指针
				if(j*3>$(".blzh ul li").length) return false;
				// clearInterval(set);
				imgPlay2($(".blzh ul li"),j,500,106);
				// alert(bi*3)
					
			}
			)
		}
			break;
			case 3:
			break;
			default:
			break;
		}
		
	    $(element).hover(function(){
	    	clearInterval(set)
	    	index=$(this).index();
	    },function(){
	    	imgShow(index);
	    })

	    imgShow();
	   function imgShow(index){
	    set=setInterval(
	    	function()
	    	{
		    	switch(size)
		    	{
		    		case 1:
		    			i++;
		    			l1=$(element).length;
		    			if(i==l1){
		    				i=0;
		    			}
		    		imgPlay1(element,i,animateTime);
		    		break;
		    		case 2:
		    			j++;
		    			l2=$(element).length;
		    			if((typeof(width)=='undefined')|| (width===0)) width=$(element).width();
		    			if(j==(parseInt(l2/3)+1))
		    			{
		    				j=0;
		    			}
		    			$(".bon").removeClass('bon');
		    			$(".num b").eq(j).addClass("bon");
		    		imgPlay2(element,j,animateTime,width);
		    		break;
		    		case 3:
		    			k++;
		    			l3=$(element).length;
		    			if(k==l3){
		    				k=0;
		    			}
		    			if((!height) || (height='')) height=$(element).height();
		    		imgPlay3(element,k,animateTime,height);
		    		break;
		    		default:
		    		alert("请指定样式");

		    	}


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

		$(element).eq(index).stop(true,true).fadeIn(animateTime).siblings().fadeOut(500);

	}
	function imgPlay2(element,index,animateTime,width)
	{

		$(element).css("position","relatived");
		var parent=$(element).parent();
		var len=parseInt($(element).length);
		if($(".num b").length==0){
			//$(".bon").removeClass('bon');
			
		}
		$(parent).stop(true,true).animate({"left":-width*index*3},animateTime);

		if(index==0){
			$(parent).stop(true,true).animate({"left":0},0);
		}
	}

	function imgPlay3(element,index,animateTime,height)
	{
		
		var parent=$(element).parent();
		$(parent).stop(true,true).animate({"top":-height*index},animateTime);
		if(index==0){
			$(parent).stop(true,true).animate({"top":0},0);
		}
	}