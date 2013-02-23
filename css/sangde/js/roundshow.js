$(function(){
	// set();


/***********添加节点************/
			function imgCreate(element,options)
			{
				var dh;
				var dw;
				var pw;
				var ph;
				defaults={
					bigWidth:'850px',
			 		bigHeight:'488px',
			 		style:'1',
			 		dtId:'big',
			 		parentNode:'body',
			 		bigImgid:'bigImg',
			 		zheBground:'#8a8a8a',
			 		bigBground:'#b74545',
			 		opacity:'0.5',
			 		prevId:'m_prev',
			 		nextId:'m_next',
			 		close:'close',
 				};

		 	if(typeof(options)!=='object') options=defaults;
		 	 imgID="."+options.bigImgid;
		 	 $("body").append('<div id="clickShow"></div>');
		 	 $("#clickShow").hide()
		 	$("#clickShow").append("<div class='zezhao'></div><div class='"+options.bigImgid+"'></div>");
			$(imgID).css({
							'width':options.bigWidth,
							'height':options.bigHeight,
							'position':'absolute',
							'z-index':501,
							'background':options.bigBground,
							'padding':5
	
				})  
				 $(".zezhao").css({
						'background':options.zheBground,
 						'position':'absolute',
						'top':0,
 						'left':0,
 						'z-index':500,
 						'opacity':options.opacity,
 						});
		if(options.closeUrl=='')
		{ 		
			$(imgID).append('<span class="close">x</span>');
	 	}else{
	 		$(imgID).append('<span class="close"></span>');
	 	}
	 	if(options.prevUrl=='' || options.nextUrl=='' )
	 	{
			$(imgID).append('<a href="javascript:prev()">上一张</a>');
			$(imgID).append('<a href="javascript:next()">下一张</a>');
	 	}else{
	 		$("#clickShow").append('<span id="'+options.prevId+'"></span>');
	 		$("#clickShow").append('<span id="'+options.nextId+'"></span>');
	 	}
	 		prevId="#"+options.prevId;
	 		nextId="#"+options.nextId;
	 		big='.'+options.dtId
	 		var addImg="<div class='over'></div>";
	 		if($(big)=='undefind')
	 		{
		 		var cl=$(element).parent().parent().clone();
		 		var css=cl.attr('class')
		 		cl.removeClass(css);
	 		}else{
	 			var cl=$(big).clone();
	 			var css=cl.attr('class')
		 		cl.removeClass(css);
	 		}

		 	cl.addClass('allImg');
	 		$(imgID).append($(addImg));
	 			 		$('.over').append(cl);

	 		$(".close").css({
	 						"float":'right',
	 						'position':'relative',
	 						'left':40,
	 						'top':-55,
	 						'height':66,

	 					})

	 		$('.over').css({
	 			"position":'relative',
	 			'top':-66
	 		})
	 		$(prevId).css({
	 				"float":'left',
	 				'z-index':502,
	 				// 'background':'red',
	 				'left':150
	 			})
	 		$(nextId).css({
	 				"float":'right',
	 				'left':100,
	 				'z-index':502,
	 			})
			setSize();
	 		/*点击效果触发*/
				$(element).live('click',function(){
							setSize();
					$("#clickShow").show();
					$(".zezhao").show()
					len=$(".allImg img").length;
					for(var j=0;j<len-1;j++){
						if($(".allImg img").eq(j).attr('thumb')==$(this).attr('thumb'))
						{
							 $(".allImg img").eq(j).addClass("imgon");
							 $(".allImg").animate({"left":(-j)*bw},0);
								index=j;
							
						}
					}	

				}) 

	}
/******************************设置尺寸***********************************/
	$("#clickShow").hide()
				 function setSize()
				 {
						 dw=parseInt($(document).width());
						 dh=parseInt($(document).height());
						 ww=parseInt($(window).width());
						 wh=parseInt($(window).height());
						 pw=parseInt($(prevId).width());
						 ph=parseInt($(prevId).height());
						 bw=parseInt($(imgID).width());
						 bh=parseInt($(imgID).height());
						 sh=parseInt($(window).scrollTop());
						$('.zezhao').css({
										"width":dw,
										'height':dh,
										
						})
						 $(imgID).css({
					 			"top":(wh-bh)/2+sh,
								"left":(ww-bw)/2,

						});
						$(".addimg").css({
								'width':bw,
								'height':bh,

						})

						var pt=parseInt($(imgID).css("top"))+((bh-ph)/2);
						var p1=parseInt($(imgID).css("left"))-40-pw;
						var p2=parseInt($(imgID).css("left"))+bw+40;
						$(prevId).css({
							'top':pt,
							'left':p1
						})
						$(nextId).css({
							'top':pt,
							'left':p2
						})
						$(".over").css({
							'width':bw,
							'height':bh,
							'overflow':'hidden',
							'position':'relative',
						})

						$(".allImg").css({
								'width':$('.allImg img').length*bw,
								'height':bh,
								'position':'relative',
								'left':0
						})
						$(".allImg img").css({
							"float":'left',
							'width':bw,
							'height':bh,

						})
				 al=parseInt($(".allImg").css('left'));
				 aw=parseInt($(".allImg").width());

			}
			
			

				
			$("#m_next").live('click',function(){
				// var index=$(".imgon").index();
				$(".imgon").removeClass("imgon");
					
				$(".allImg img").eq(index+1).addClass("imgon");
					index++;
					if(index==len) index=0;	
					$(".allImg").animate({"left":(-index)*bw},100-index);
					addimgfocus(index);
				})

			$("#m_prev").live('click',function(){
				al=parseInt($(".allImg").css('left'));
				if(al>=0)return false;
				$(".imgon").removeClass("imgon");
				$(".allImg img").eq(index-1).addClass("imgon");
					index--;
				$(".allImg").animate({"left":(-index)*bw},100-index);
				addimgfocus(index);
				})


			$(".close").live('click',function(){
				$("#clickShow").hide();
				$(".zezhao").hide();
			})
	/*创建遮罩*/
		imgCreate($(".round li img"));		
			$(window).resize(function(){
				setSize()
			})
			function addimgfocus(index)
			{
				$(".img_focus").removeClass("img_focus");
				$(".li b").eq(index).addClass("img_focus")
			}


})
