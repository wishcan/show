<style type='text/css'>
.row{
	width:960px;
}
h3{
	border-bottom:solid 3px #84AB26;

}
#stage{ margin:0 auto; padding:0; width:960px; }
#stage li{ margin:0; padding:0; list-style:none;float:left; width:240px;}
#stage li div{ font-size:12px; padding:10px; color:#999999; text-align:left; }
#stage li img{
	width:220px;
	padding:5px;
	cursor:pointer;
}
.zhezao{
	position: absolute;
	background:#ddd;
	filter:alpha(opacity=80);  /* ie 有效*/
	-moz-opacity0.8; /* Firefox  有效*/
	opacity: 0.8; /* 通用，其他浏览器  有效*/
 	top:0px;
 	left:0px;
 	display: none;
 	z-index:14;
}
#bigImg{
	position: absolute;
	z-index:15;
	left:0px;
	padding:5px;
	padding-left:25px;
	*padding-left:5px;
	*padding-right:25px;
	float:left;
	display:none;
	background-color: #333;

}
#bigImg img{
/*	float:right;*/
	display:block;
	float:left;
	-moz-border:solid 1px #ddd;
	border:solid 1px #fff;
}
#bigImg .left,#bigImg .right{
	display: block;
	width:101px;
	height:206px;
	position:relative;
	display:none;
	cursor:pointer;
}
.close{
	display:block;
	width:32px;
	height:32px;
	background:url(/show/images/close_h.png);
	float: right;
	*float:left;
	cursor:pointer;
	position:relative;

}
.close:hover{
background:url(/show/images/delete_2.png);
}
.left{
	background:url(/show/images/prev_2.png);
	float:left;
}
.right{
	background:url(/show/images/next_2.png);
	float:left;

}
</style>
<script type='text/javascript'>
$(function(){

	loadMore();
	load=1;
	$(window).scroll(function(){
	if ($(document).height() - $(this).scrollTop() - $(this).height()<150 && load==1){
		load=0;
		loadMore();
		}
	})
	/*异步加载图片并作瀑布流处理
	*/
	function loadMore()
	{
		
		var start=$(".row img").length;
		var end=20;
		var gid=$("input[type='hidden']").val();
		$.post(
				'/show/index.php/gallery/getMoreImg'+'?gid='+gid,
				{start:start,end:end},
				function(data)
				{
					
					var i=0;
					setTimeout(function(){
						for(i;i<data.length;i++)
						{

							oProduct=data[i];
								iHeight=-1;
								$("#stage li").each(function()
									{
										var lHeight=$(this).height();
										if(iHeight == -1 || iHeight > lHeight)
											{
												iHeight=lHeight;
												row=$(this);
											}
									
									});

							var item=$('<img src="'+oProduct.thumb+'" border="0" >').hide();
							row.append(item)
							item.fadeIn(500);		
						}

		load=1;
	},200)
					},'json'
				);
	}
	/*
	 *图片异步加载结束
	*/
	/*
	 *点击效果开始
	*/
	function setSize(element,element2)
	{
		var w=setWH($(element2).width());
		var h=setWH($(element2).height());
		$(element).css({'width':w,'height':h});
		$(".left").css({'top':h/2.5});
		$(".right").css({'top':h/2.5});
	$("#bigImg").css({"left":($(window).width()-parseInt($("#bigImg").width()))/2,'top':($(window).height()-h)/2+$(window).scrollTop()})
	$(".zhezao").css({'width':$(document).width(),'height':$(document).height()});
	}
	$("#stage li img").live('click',function(){
		var pi=$(this).parent().index();
		var i=$(this).index();
			$(".close").show();
			$(".zhezao").width($(document).width()).show();
			$(".zhezao").height($(document).height())
			var clone=$(this).clone();
			$(clone).addClass('isshow');
			$(clone).attr('pi',pi);
			$(clone).attr('i',i);
			$(".left,.right").show();
			$(clone).insertAfter('.left')
			$("#bigImg").fadeIn(500);
			setSize(clone,$(this));
	})
	$(window).resize(function(){
			$("#bigImg").css({"left":($(window).width()-parseInt($("#bigImg").width()))/2,'top':($(window).height()-parseInt($("#bigImg").height()))/2+$(window).scrollTop()})
			$(".zhezao").width($(document).width()).show();
			$(".zhezao").height($(document).height())
			// setSize($("#bigImg img"),$("#bigImg img"));
		})
	$(".close").click(function(){
		$(".zhezao").hide();
		$("#bigImg img").remove();
		$("#bigImg").hide();
	
		})
	/*设置宽高*/
function setWH(wh)
{
	return wh*3;
}
	var liLen=3;
	/*点击获取下一张图片*/
	$('.right').click(function()
	{
		var i=parseInt($(this).prev("img").attr('i'));
		var pi=$(this).prev("img").attr('pi');
		if(pi<liLen)
		{
			pi=parseInt(pi)+1;
			var li=$("#stage li").eq(pi);
			var smallImg=li.find("img");
			var src = $(smallImg).eq(i).attr('src');
			if(!src){
				return false;
			}
			$(this).prev("img").fadeOut(500).remove();
			var newImg="<img src='"+src+"' pi='"+(pi)+"' i='"+i+"' width='"+660+"' />";
			$(newImg).insertAfter('.left').fadeIn(500);
			
		}else if(pi==liLen)
		{
			
				var src=$("#stage li").eq(0).find("img").eq(i+1).attr("src");
				if(!src){
					return false;
				}	
				$(this).prev("img").fadeOut(500).remove();
				var newImg="<img src='"+src+"' pi='"+0+"' i='"+(i+1)+"' width='"+660+"'/>";
				$(newImg).insertAfter('.left').fadeIn(500);
		}


	})
	/*点击查看上一张图片*/
	$(".left").click(function(){
		var i=parseInt($(this).next("img").attr('i'));
		var pi=$(this).next("img").attr('pi');
		if(pi>0)
		{
			pi=parseInt(pi)-1;
			var li=$("#stage li").eq(pi);
			var smallImg=li.find("img");
			var src = $(smallImg).eq(i).attr('src');
			if(!src){
				return false;
			}
			$(this).next("img").fadeOut(500);
			$(this).next("img").remove()
			var newImg="<img src='"+src+"' pi='"+(pi)+"' i='"+i+"' width='"+660+"' />";
			$(newImg).insertAfter('.left').fadeIn(1000);
		}else if(pi==0)
		{

				if(i==0){
					return false;

				}
				var src=$("#stage li").eq(liLen).find("img").eq(i-1).attr("src");
				if(!src){
					return false;
				}	
				$(this).next("img").fadeOut(500).remove();
				var newImg="<img src='"+src+"' pi='"+liLen+"' i='"+(i-1)+"' width='"+660+"'/>";
				$(newImg).insertAfter('.left').fadeIn(500);
		}		
	})


})


</script>
<input type='hidden' value='<?php echo $gid;?>' />
<div class="center">
<div class='row'>
<ul id='stage'>
	<li index='0'></li>
	<li index='1'></li>
	<li index='2'></li>
	<li index='3'></li>	
</ul>
<!--遮罩-->
<div class='zhezao'>
</div>

<div id='bigImg'>
<i class='close'></i>
<span class='left'></span>
<span class='right'></span>
</div>	

</div>
