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
}
.zhezao{
	position: absolute;
	background:#ddd;
	filter:alpha(opacity=50);  /* ie 有效*/
	-moz-opacity:0.5; /* Firefox  有效*/
	opacity: 0.5; /* 通用，其他浏览器  有效*/
 	top:0px;
 	left:0px;
 	display: none;
}
#bigImg{
	position: absolute;
	z-index:10;
	left:0px;
	padding:5px;
	border:solid 1px #fff;
	border-radius:5px;
	background:#fff;
	box-shadow : 0 0 10px 0 #f4f4f4;
}
#bigImg img{
	float:left
}
#bigImg .prev,#bigImg .next{
	display: block;
	width:45px;
	height:100px;
	position:relative;
	display:none;
}
.close{
	display:block;
	width:32px;
	height:32px;
	background:url(/show/images/close_h.png);
	float:right;
	cursor:pointer;

}
.close:hover{
background:url(/show/images/delete_2.png);
}
.prev{
	background:url(/show/images/arrow_left.gif);
	float:left;
}
.next{
	background:url(/show/images/arrow_right.gif);
	float:right;
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
				'/show/index.php?r=gallery/getMoreImg&gid='+gid,
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
//		$(".prev").css({'top':h/2.5,'right':10});
	//	$(".next").css({'top':h/2.5,'left':10});
		
	$("#bigImg").css({"left":($(window).width()-parseInt($("#bigImg img").width()))/2,'top':($(window).height()-h)/2+$(window).scrollTop()})
	$(".zhezao").css({'width':$(document).width(),'height':$(document).height()});
	}
	$("#stage li img").live('click',function(){
			$(".close").show();
			$(".zhezao").width($(document).width()).show();
			$(".zhezao").height($(document).height())
			var clone=$(this).clone();
			var index=$(this).parent().index();
			$(clone).addClass('isshow');
			$(clone).attr('index',index);
			$(".prev,.next").show();
			$("#bigImg").append(clone).fadeIn(500);
			setSize(clone,$(this));
	})
	$(window).resize(function(){
			setSize($("#bigImg img",$("#bigImg img")));
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

})


</script>
<input type='hidden' value='<?php echo $gid;?>' />
<div class="center">
<div class='row'>
<ul id='stage'>
	<li></li>
	<li></li>
	<li></li>
	<li></li>	
</ul>
<!--遮罩-->
<div class='zhezao'>
</div>
<div id='bigImg'>
<i class='close'></i>

</div>	
		
</div>
