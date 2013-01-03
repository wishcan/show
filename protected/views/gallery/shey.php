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
#stage li div img{
	width:220px;
}
</style>
<script type='text/javascript'>
$(function(){
	
	loadMore();
	$(window).scroll(function(){
	if($(document).height() - $(this).height() - $(this).scrollTop()<150 && load==1) loadMore();
		})
	function loadMore()
	{
		
		var start=$(".row img").length;
		var end=30;
		var gid=$("input[type='hidden']").val();
		$.post(
				'/show/index.php?r=gallery/getMoreImg&gid='+gid,
				{start:start,end:end},
				function(data)
				{
					load=0;
					var i=0;
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
							var item=$('<div><img src="'+oProduct.thumb+'" border="0" ></div>').hide();
							row.append(item);
							item.fadeIn(500);		
						}
	load=1;
					},'json'
				);
	}
})


</script>
<input type='hidden' value='<?php echo $gid;?>' />
<div class="center">
<div class='row'>
<ul id='stage'>
	<li>

	</li>
		<li>

	</li>
		<li>

	</li>
		<li>

	</li>

</ul>



</div>
