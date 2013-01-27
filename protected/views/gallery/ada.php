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
	display:none;
}
#bigImg img{
	float:left;
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
	$("#stage li img").click(function(){
		alert($(this).index());
		continue;
	})
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
								if(!oProduct.title){
									oProduct.title='爱达作品'
										}
							var item=$('<a href="index.php?r=gallery/showImg&gdid='+oProduct.gdid+'"><img title="'+oProduct.title+'" src="'+oProduct.thumb+'" border="0" ></a>').hide();
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
		
</div>
