	<!-- 广告位1 -->
	<?php $url=Yii::app()->baseUrl;?>
	<link rel="stylesheet" type="text/css" href="<?php echo $url?>/css/shouye.css"/>
	<script type="text/javascript" src='/show/js/imgJquery.js'></script>
	<script type="text/javascript" src='/show/js/web.js'></script>
	<div class='gg1 gg'>
	<?php echo $gg1;?>
	</div>
	<!-- 本月活动栏 -->
	<div id='byhd'>
		<ul id='byhd_h'>
			<li class='lf'><span class='riqi'>1月13日</span><a href='#'>宝隆艺园拍卖会</a></li>
			<li><span class='riqi'>1月13日</span><a href='#'>宝隆艺园拍卖会</a></li>
			<li><span class='riqi'>1月13日</span><a href='#'>宝隆艺园拍卖会</a></li>
			<li><span class='riqi'>1月13日</span><a href='#'>宝隆艺园拍卖会</a></li><br/>
			<!-- 输出数据的时候取7条 -->
			<li class='lf'><span class='riqi'>1月13日</span><a href='#'>宝隆艺园拍卖会</a></li>
			<li><span class='riqi'>1月13日</span><a href='#'>宝隆艺园拍卖会</a></li>
			<li><span class='riqi'>1月13日</span><a href='#'>宝隆艺园拍卖会</a></li>
			<li><a href='' class='aon'>更多活动  >>></a></li>
		</ul>
	
	</div>
	<!-- 幻灯片 && 最新新闻 && 商家-->
	<!-- 幻灯片 -->
	<div class='c'>	</div>
<div id='hzs'>	
	<div class='hdp l'>
		<ul>
			<li><a href=''><img src='/show/images/zanwei/zw2.jpg'/></a></li>
			<li><a href=''><img src='/show/images/zanwei/zw2.jpg'/></a></li>
			<li><a href=''><img src='/show/images/zanwei/zw2.jpg'/></a></li>
			<li><a href=''><img src='/show/images/zanwei/zw2.jpg'/></a></li>
		</ul>
		<script type="text/javascript">
			imgJquery($(".hdp ul li"));	

		</script>
	</div>
	
	<!-- 最新新闻 -->
	<div class='zxxw l'>
		<h3 class='hzs_head'>最新新闻</h3>

		<p><span>[新闻]</span><a href=''>《贺伟国诗书画选》首发式</a></p>
		<p><span>[新闻]</span><a href=''>《贺伟国诗书画选》首发式</a></p>
		<p><span>[新闻]</span><a href=''>《贺伟国诗书画选》首发式</a></p>
		<p><span>[新闻]</span><a href=''>《贺伟国诗书画选》首发式</a></p>
		<p><span>[新闻]</span><a href=''>《贺伟国诗书画选》首发式布首</a></p>
		<p><span>[新闻]</span><a href=''>《贺伟国诗书画选》首发式</a></p>
		<p><span>[新闻]</span><a href=''>《贺伟国诗书画选》首发式</a></p>
	</div>
	<!-- 宝隆住户 -->
	<div class='blzh l'>
	<h3 class='hzs_head'>园内艺术家</h3>
		<ul>
			<li>
				<a href=''><img src='/show/images/zanwei/zw3.jpg'/></a>
					<p>贺伟国工作室</p>
			</li>
			<li>
				<a href=''><img src='/show/images/zanwei/zw3.jpg'/></a>
					<p>贺伟国工作室</p>	
			</li>
			<li>
				<a href=''><img src='/show/images/zanwei/zw3.jpg'/></a>
					<p>贺伟国工作室</p>
			</li>
						<li>
				<a href=''><img src='/show/images/zanwei/zw3.jpg'/></a>
					<p>贺伟国工作室</p>
			</li>
						<li>
				<a href=''><img src='/show/images/zanwei/zw3.jpg'/></a>
					<p>贺伟国工作室</p>
			</li>			<li>
				<a href=''><img src='/show/images/zanwei/zw3.jpg'/></a>
					<p>贺伟国工作室</p>
			</li>
			<li>
				<a href=''><img src='/show/images/zanwei/zw3.jpg'/></a>
					<p>贺伟国工作室</p>	
			</li>
			<li>
				<a href=''><img src='/show/images/zanwei/zw3.jpg'/></a>
					<p>贺伟国工作室</p>
			</li>
						<li>
				<a href=''><img src='/show/images/zanwei/zw3.jpg'/></a>
					<p>贺伟国工作室</p>
			</li>
						<li>
				<a href=''><img src='/show/images/zanwei/zw3.jpg'/></a>
					<p>贺伟国工作室</p>
			</li>
		</ul>

		<div class='num'>
		</div>

		<script type="text/javascript">
	$(function(){	var nums=parseInt(($(".blzh ul li").length)/3);
		for(var s=0;s<nums+1;s++){
			$(".num").append('<b>●</b>');
		}
		$(".num b").eq(0).addClass('bon');
		imgJquery($(".blzh ul li"),2,3000,800,106);
		
})
		</script>

	</div>

</div>	
<div class='c'></div>
	<div class='gg'>
		<?php echo $gg2;?>
		<?php echo $gg3;?>
	</div>
	
	<!-- 新闻 -->
<div id='xinwen' class='xinxi l'>
	<h3 class='head2'>新闻</h3>
	<ul class='l'>
		<h4>综合</h4>
			<li><a href=''>建立艺术品评估体系</a><span>2013-01-19</span>
			
				<div>
					<img class='l' src='/show/images/zanwei/zw17.jpg' />
					<b>简介简介简介</b>
				</div>
				<div class='c'></div>
			</li>
		<li><a href=''>建立艺术品评估体系</a><span>2013-01-19</span></li>
		<li><a href=''>建立艺术品评估体系 </a><span>2013-01-19</span></li>
		<li><a href=''>建立艺术品评估体系 </a><span>2013-01-19</span></li>
		<li><a href=''>建立艺术品评估体系</a><span>2013-01-19</span></li>
	</ul>
	<ul class='l'>
			<h4>收藏/展览</h4>
			<li><a href=''>建立艺术品评估体系</a><span>2013-01-19</span>
			
				<div>
					<img class='l' src='/show/images/zanwei/zw17.jpg' />
					<b>简介简介简介</b>
				</div>
				<div class='c'></div>
			</li>
		<li><a href=''>建立艺术品评估体系</a><span>2013-01-19</span></li>
		<li><a href=''>建立艺术品评估体系 </a><span>2013-01-19</span></li>
		<li><a href=''>建立艺术品评估体系 </a><span>2013-01-19</span></li>
		<li><a href=''>建立艺术品评估体系</a><span>2013-01-19</span></li>
	</ul>
	<ul class='l'>
		<h4>教育/出版</h4>
		<li><a href=''>建立艺术品评估体系</a><span>2013-01-19</span>
			<div>
				
			</div>
		</li>
		<li><a href=''>建立艺术品评估体系</a><span>2013-01-19</span></li>
		<li><a href=''>建立艺术品评估体系 </a><span>2013-01-19</span></li>
		<li><a href=''>建立艺术品评估体系 </a><span>2013-01-19</span></li>
		<li><a href=''>建立艺术品评估体系</a><span>2013-01-19</span></li>

	</ul>
	<ul class='l'>
			<h4>市场</h4>
		<li><a href=''>建立艺术品评估体系</a><span>2013-01-19</span>
			<div>
				
			</div>

		</li>
		<li><a href=''>建立艺术品评估体系</a><span>2013-01-19</span></li>
		<li><a href=''>建立艺术品评估体系 </a><span>2013-01-19</span></li>
		<li><a href=''>建立艺术品评估体系 </a><span>2013-01-19</span></li>
		<li><a href=''>建立艺术品评估体系</a><span>2013-01-19</span></li>

	</ul>
	
</div>


<!-- <div class='c'></div> -->
<div class='paihang r'> 
	<h3 class='paimai'></h3>
	<p class='ph_h2'><b class='ph_b1'>拍品</b><b class='ph_b2'>成交价</b></p>
	<ul>
		<li><span class='s1'>翡翠冰种手镯</span><span class='ph_s2'>1500</span></li>
		<li><span class='s1'>翡翠冰种手镯</span><span class='ph_s2'>1500</span></li>
		<li><span class='s1'>翡翠冰种手镯</span><span class='ph_s2'>1500</span></li>		
		<li><span class='s1'>翡翠冰种手镯</span><span class='ph_s2'>1500</span></li>
		<li><span class='s1'>翡翠冰种手镯</span><span class='ph_s2'>1500</span></li>
		<li><span class='s1'>翡翠冰种手镯</span><span class='ph_s2'>1500</span></li>
		<li><span class='s1'>翡翠冰种手镯</span><span class='ph_s2'>1500</span></li>
		<li><span class='s1'>翡翠冰种手镯</span><span class='ph_s2'>1500</span></li>
		<li><span class='s1'>翡翠冰种手镯</span><span class='ph_s2'>1500</span></li>
		<li><span class='s1'>翡翠冰种手镯</span><span class='ph_s2'>1500</span></li>
				<li><span class='s1'>翡翠冰种手镯</span><span class='ph_s2'>1500</span></li>
		<li><span class='s1'>翡翠冰种手镯</span><span class='ph_s2'>1500</span></li>
	</ul>
</div>

<div class='c'></div>
<!--视频-->
<div id='shipin' class='xinxi l'>
	<h3 class='head2'>视频</h3>
	<p class='fenlei'><a href=''>综合</a><a href=''>节目</a><a href=''>拍卖</a></p>
	<ul>

		<li class='l'><a href=''><img src='/show/images/zanwei/zw16.jpg'/><span>画家牟成</span></a></li>
		<li class='l'><a href=''><img src='/show/images/zanwei/zw16.jpg'/><span>画家牟成</span></a></li>	
		<li class='l'><a href=''><img src='/show/images/zanwei/zw16.jpg'/><span>画家牟成</span></a></li>	
		<li class='l'><a href=''><img src='/show/images/zanwei/zw16.jpg'/><span>画家牟成</span></a></li>	
		<li class='l'><a href=''><img src='/show/images/zanwei/zw16.jpg'/><span>画家牟成</span></a></li>	
		<li class='l'><a href=''><img src='/show/images/zanwei/zw16.jpg'/><span>画家牟成</span></a></li>	
		<li class='l'><a href=''><img src='/show/images/zanwei/zw16.jpg'/><span>画家牟成</span></a></li>	
		<li class='l'><a href=''><img src='/show/images/zanwei/zw16.jpg'/><span>画家牟成</span></a></li>

	</ul>
</div>
<!--广告位4-->
<div class='gg4 r'>
	<img src='/show/images/zanwei/zw10.jpg' />
</div>
<!--宝隆历届拍卖入口-->
<div class='gg4 r'>
	<img src='/show/images/zanwei/zw10.jpg' />
</div>
<div class='c'></div>
<!--专题-->
<div id='zhuanti' class='xinxi l'>
	<h3 class='head2'>专题</h3>
	<ul class='l'>
		<li>
			
			<img src='/show/images/zanwei/zw19.jpg' />
			<p>画展....</p>
			<p>展出的地方</p>
		</li>
				<li>
			
			<img src='/show/images/zanwei/zw19.jpg' />
			<p>画展....</p>
			<p>展出的地方</p>
		</li>

		<li>
			
			<img src='/show/images/zanwei/zw19.jpg' />
			<p>画展....</p>
			<p>展出的地方</p>
		</li>

		<li>
			
			<img src='/show/images/zanwei/zw19.jpg' />
			<p>画展....</p>
			<p>展出的地方</p>
		</li>
				<li>
			
			<img src='/show/images/zanwei/zw19.jpg' />
			<p>画展....</p>
			<p>展出的地方地方地方地方</p>
		</li>
	</ul>
</div>
<!--评论-->
<div id='pinlun' class='xinxi l'>
	<h3 class='head2'>评论</h3>
	<ul  class='l'>
		<h4>综合</h4>
			<li><a href=''>建立艺术品评估体系</a><span>2013-01-19</span>
			
				<div>
					<img class='l' src='/show/images/zanwei/zw17.jpg' />
					<b>简介简介简介</b>
				</div>
				<div class='c'></div>
				</li>
			<li><a href=''>建立艺术品评估体系 </a><span>2013-01-19</span></li>
			<li><a href=''>建立艺术品评估体系 </a><span>2013-01-19</span></li>
			<li><a href=''>建立艺术品评估体系</a><span>2013-01-19</span></li>


	</ul>
	<ul  class='l'>
		<h4>展览</h4>
			<li><a href=''>建立艺术品评估体系</a><span>2013-01-19</span>
			
				<div>
					<img class='l' src='/show/images/zanwei/zw17.jpg' />
					<b>简介简介简介</b>
				</div>
				<div class='c'></div>
			</li>
			<li><a href=''>建立艺术品评估体系 </a><span>2013-01-19</span></li>
			<li><a href=''>建立艺术品评估体系 </a><span>2013-01-19</span></li>
			<li><a href=''>建立艺术品评估体系</a><span>2013-01-19</span></li>

	</ul>
	<ul  class='l'>
		<h4>作品</h4>
			<li><a href=''>建立艺术品评估体系</a><span>2013-01-19</span>
			
				<div>
					<img class='l' src='/show/images/zanwei/zw17.jpg' />
					<b>简介简介简介</b>
				</div>
				<div class='c'></div>
			</li>
			<li><a href=''>建立艺术品评估体系 </a><span>2013-01-19</span></li>
			<li><a href=''>建立艺术品评估体系 </a><span>2013-01-19</span></li>
			<li><a href=''>建立艺术品评估体系</a><span>2013-01-19</span></li>


	</ul>
	<ul class='l'>
		<h4>市场</h4>
			<li><a href=''>建立艺术品评估体系</a><span>2013-01-19</span>
			
				<div>
					<img class='l' src='/show/images/zanwei/zw17.jpg' />
					<b>简介简介简介</b>
				</div>
				<div class='c'></div>
			</li>
			<li><a href=''>建立艺术品评估体系 </a><span>2013-01-19</span></li>
			<li><a href=''>建立艺术品评估体系 </a><span>2013-01-19</span></li>
			<li><a href=''>建立艺术品评估体系</a><span>2013-01-19</span></li>
	</ul>
</div>
<!--当代艺术-->
<div id='yishu' class='r'>
	<h4>当代艺术 <a class='more' href='#'>更多>>></a></h4>
	<li><img src='/show/images/zanwei/zw11.jpg' /><p>著名画家黎增辉</p></li>
	<li><img src='/show/images/zanwei/zw11.jpg' /><p>著名画家黎增辉</p></li>
	<li><img src='/show/images/zanwei/zw11.jpg' /><p>著名画家黎增辉</p></li>
	<!-- <li><img src='/show/images/zanwei/zw11.jpg' /><p>著名画家黎增辉</p></li> -->
<!-- 	<li><img src='/show/images/zanwei/zw11.jpg' /><p>著名画家黎增辉</p></li>
	<li><img src='/show/images/zanwei/zw11.jpg' /><p>著名画家黎增辉</p></li> -->
</div>
<!--艺术展览-->
<div class='c'></div>
<div class='gg5'>
	<img src='/show/images/zanwei/zw23.jpg' />
</div>
<div id='zaixian' class='l'>
<h3>在线展厅</h3>
	<div class='bigImg l'>
		<img class='zuida' src='/show/images/zanwei/zw20.jpg' />
	</div>
	<div class='smallImg l'>
		<ul>
			<li><img src='/show/images/zanwei/zw21.jpg' /><p class='p1'></p><p class='p2'><b>作品名</b></p></li>
			<li><img src='/show/images/zanwei/zw21.jpg' /><p class='p1'></p><p class='p2'><b>作品名</b></p></li>
			<li><img src='/show/images/zanwei/zw21.jpg' /><p class='p1'></p><p class='p2'><b>作品名</b></p></li>
			<li><img src='/show/images/zanwei/zw21.jpg' /><p class='p1'></p><p class='p2'><b>作品名</b></p></li>
			<li><img src='/show/images/zanwei/zw21.jpg' /><p class='p1'></p><p class='p2'><b>作品名</b></p></li>
			<li><img src='/show/images/zanwei/zw21.jpg' /><p class='p1'></p><p class='p2'><b>作品名</b></p></li>
			<li><img src='/show/images/zanwei/zw21.jpg' /><p class='p1'></p><p class='p2'><b>作品名</b></p></li>
			<li><img src='/show/images/zanwei/zw21.jpg' /><p class='p1'></p><p class='p2'><b>作品名</b></p></li>
		</ul>
	</div>
</div>	
<!--艺术人生-->
<div class='c'></div>
<div id='rens' class='l'>
	<div class='ren_menu '>
		<h3 class='l'>艺术人生 </h3>
		<div class='l fenlei'>		
			<a href='' class='l' >国画</a>
			<a href='' class='l'  >国画</a>
			<a href='' class='l' >国画</a>
			<a href='' class='l' >国画</a>
			<a href='' class='l' >国画</a>
		</div>
	</div>
		<ul class='c'>
			<li class='l'>
				<img src='/show/images/zanwei/zw22.jpg' />
				<p>何家英</p>
			</li>
			<div class='jieshao l'>
					某某人是干嘛干嘛的某某人是干嘛干嘛的某某人是干嘛干嘛的某某人是干嘛干嘛的某某人是干嘛干嘛的
				</div>
			<li class='l'>
				<img src='/show/images/zanwei/zw22.jpg' />
				<p>何家英</p>
			</li>
			<div class='jieshao l'>
					某某人是干嘛干嘛的某某人是干嘛干嘛的某某人是干嘛干嘛的某某人是干嘛干嘛的某某人是干嘛干嘛的
				</div>				
			<li class='l'>
				<img src='/show/images/zanwei/zw22.jpg' />
				<p>何家英</p>
			</li>
			<div class='jieshao l'>
					某某人是干嘛干嘛的某某人是干嘛干嘛的某某人是干嘛干嘛的某某人是干嘛干嘛的某某人是干嘛干嘛的
				</div>				
			<li class='l'>
				<img src='/show/images/zanwei/zw22.jpg' />
				<p>何家英</p>
			</li>	
			<div class='jieshao l'>
					某某人是干嘛干嘛的某某人是干嘛干嘛的某某人是干嘛干嘛的某某人是干嘛干嘛的某某人是干嘛干嘛的
				</div>				
			<li class='l'>
				<img src='/show/images/zanwei/zw22.jpg' />
				<p>何家英</p>
			</li>
			<div class='jieshao l'>
					某某人是干嘛干嘛的某某人是干嘛干嘛的某某人是干嘛干嘛的某某人是干嘛干嘛的某某人是干嘛干嘛的
				</div>			
			<li class='l'>
				<img src='/show/images/zanwei/zw22.jpg' />
				<p>何家英</p>
			</li>	
		</ul>

</div>
	
<div class='c'></div>
<!--展览推荐-->
<div id='zanlan' class='l'>
	<h3>展览/拍卖</h3>

	<div class='zl l'>
		<h3>展览推荐</h3>
		<ul>
			<li><a href='#'><span>1</span>"限制·自由"冷军油画作品展</a><span class='shijian'>1月21日——2月30日</span></li>
			<li><a href='#'><span>1</span>"限制·自由"冷军油画作品展</a><span class='shijian'>1月21日——2月30日</span></li>
			<li><a href='#'><span>1</span>"限制·自由"冷军油画作品展</a><span class='shijian'>1月21日——2月30日</span></li>
			<li><a href='#'><span>1</span>"限制·自由"冷军油画作品展</a><span class='shijian'>1月21日——2月30日</span></li>
			<li><a href='#'><span>1</span>"限制·自由"冷军油画作品展</a><span class='shijian'>1月21日——2月30日</span></li>
			<li><a href='#'><span>1</span>"限制·自由"冷军油画作品展</a><span class='shijian'>1月21日——2月30日</span></li>
			<li><a href='#'><span>1</span>"限制·自由"冷军油画作品展</a><span class='shijian'>1月21日——2月30日</span></li>
			<li><a href='#'><span>1</span>"限制·自由"冷军油画作品展</a><span class='shijian'>1月21日——2月30日</span></li>
			<li><a href='#'><span>1</span>"限制·自由"冷军油画作品展</a><span class='shijian'>1月21日——2月30日</span></li>
			<li><a href='#'><span>1</span>"限制·自由"冷军油画作品展</a><span class='shijian'>1月21日——2月30日</span></li>
		</ul>
		<a href='' class='more'>更多>>></a>
	</div>
	<div class='pm l'>
		<h3>拍卖点击排行</h3>
				<ul>
			<li><a href='#'>"限制·自由"冷军油画作品展</a><span class='shijian'>1</span></li>
			<li><a href='#'>"限制·自由"冷军油画作品展</a><span class='shijian'>1</span></li>
			<li><a href='#'>"限制·自由"冷军油画作品展</a><span class='shijian'>1</span></li>
			<li><a href='#'>"限制·自由"冷军油画作品展</a><span class='shijian'>1</span></li>
			<li><a href='#'>"限制·自由"冷军油画作品展</a><span class='shijian'>1</span></li>
			<li><a href='#'>"限制·自由"冷军油画作品展</a><span class='shijian'>1</span></li>
			<li><a href='#'>"限制·自由"冷军油画作品展</a><span class='shijian'>1</span></li>
			<li><a href='#'>"限制·自由"冷军油画作品展</a><span class='shijian'>1</span></li>
			<li><a href='#'>"限制·自由"冷军油画作品展</a><span class='shijian'>1</span></li>
			<li><a href='#'>"限制·自由"冷军油画作品展</a><span class='shijian'>1</span></li>
		</ul>
		<a href='' class='more'>更多>>></a>
	</div>
</div>	
	
	
	