
<?php	$url=Yii::app()->request->baseUrl;?>

	<!--Head Begi-->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
<title>后台管理</title>
<link href="<?php echo $url;?>/css/admin/reset.css" rel="stylesheet" type="text/css" />
<link href="<?php echo $url;?>/css/admin/system.css" rel="stylesheet" type="text/css" />

</head>
<body scroll="no">
<div class="header">
	<div class="logo lf"><a href="" target="_blank">
		<span class="invisible">宝隆内容管理系统</span></a></div>
    <div class="rt">
    	<div class="tab_style white cut_line text-r"><a href="javascript:;" onclick="lock_screen()"> 锁屏</a><span>|</span><a href="<?php echo Yii::app()->homeUrl;?>" target="_blank">官方网站</a><span>|</span><a href="http://v9.help.phpcms.cn" target="_blank">帮助？</a>
        </div>
        <div class="style_but"></div>
    </div>
    <div class="col-auto" style="overflow: visible">
    	<div class="log white cut_line">您好  [超级管理员]<span>|</span><a href="?m=admin&c=index&a=public_logout">[退出]</a><span>|</span>
    		<a href="" target="_blank" id="site_homepage">站点首页</a><span>|</span>
    		<a href="?m=member" target="_blank">会员中心</a><span>|</span>
    		<a href="?m=search" target="_blank" id="site_search">全站搜索</a>
    	</div>
        <ul class="nav white" id="top_menu">
        <li id="_M0" class="on top_menu"><a href="javascript:void(0);" hidefocus="true" style="outline:none;">我的面板</a></li>
        <li id="_M1" class="top_menu"><a href="javascript:void(0);"  hidefocus="true" style="outline:none;">设置</a></li>
     <!--    <li id="_M2" class="top_menu"><a href="javascript:void(0);"  hidefocus="true" style="outline:none;">模块</a></li> -->
        <li id="_M2" class="top_menu"><a href="javascript:void(0);"  hidefocus="true" style="outline:none;">用户</a></li>
        <li id="_M3" class="top_menu"><a href="javascript:void(0);"  hidefocus="true" style="outline:none;">文章管理</a></li>
        <li id="_M4" class="top_menu"><a href="javascript:void(0);"  hidefocus="true" style="outline:none;">图片信息</a></li>
        <li id="_M5" class="top_menu"><a href="javascript:void(0);"  hidefocus="true" style="outline:none;">栏目管理</a>
        	<li id="_M6" class="top_menu"><a href="javascript:void(0);"  hidefocus="true" style="outline:none;">模块管理</a></li>
       <!--  <li id="_M6" class="top_menu"><a href="javascript:void(0);"  hidefocus="true" style="outline:none;">phpsso</a></li>   -->
        <!-- <li class="tab_web"><a href="javascript:;"><span>默认站点</span></a></li> -->
        </ul>
    </div>
</div>
<!--}Head End-->

<!--Content Begin -->
<div id="content">
	<!--LeftMenu Begin-->
	<div class="col-left left_menu">
    	<div id="leftMain">
	          <div class="l_menu">
          		 <h3 class="f14"><span class="switchs cu on" title="个人信息"></span>个人信息</h3>
           		 <ul>
	               	<li  class="sub_menu">
	                	<a href="" hidefocus="true" style="outline:none;">个人信息修改</a></li>
	                <li  class="sub_menu">
	                	<a href="" hidefocus="true" style="outline:none;">密码修改</a></li>
           		 </ul>
       			 </div>
				<div class="l_menu">
						<h3 class="f14"><span class="switchs cu on" title="相关设置"></span>相关设置</h3>
			            <ul>
			                <li class="sub_menu">
			                	<a href="" hidefocus="true" style="outline:none;">站点设置</a></li>
			                <li class="sub_menu">
			                	<a href=<?php ?> hidefocus="true" style="outline:none;">基本设置</a></li>
			                <li  class="sub_menu">
			                	<a href="" hidefocus="true" style="outline:none;">安全设置</a></li>
			                <li  class="sub_menu">
			                	<a href="" hidefocus="true" style="outline:none;">邮箱配置</a></li>
			            </ul>
			        </div>
			        <div class="l_menu">
			            <h3 class="f14"><span class="switchs cu on" title="相关设置"></span>管理员设置</h3>
			            <ul>
			                <li  class="sub_menu">
			                	<a href="<?php echo $this->createAbsoluteUrl("User/admin");?>"target="con" hidefocus="true" style="outline:none;">用户管理</a>
			               
			                </li>

			                <li  class="sub_menu">
			                	<a href="<?php echo $this->createAbsoluteUrl("Role/admin");?>"target="con" hidefocus="true" style="outline:none;">角色管理</a>
			                </li>
			            </ul>
				</div>
				 <div class="l_menu">
	          		 <h3 class="f14"><span class="switchs cu on" title="文章管理"></span>文章管理</h3>
	<ul>
	<li><h6>发布</h6>	
	<?php
			$this->beginWidget('CTreeView',array(
				'data'=>Category::model()->getCateList(0,'news/create'),
				'animated'=>'slow',
				'collapsed'=>'true',
				'persist'=>'cookie',

				));

 $this->endWidget();?>
       	
	</li>
	<li><h6>管理</h6>
			<?php
			$this->beginWidget('CTreeView',array(
				'data'=>Category::model()->getCateList(0,'news/admin'),
				'animated'=>'slow',
				'collapsed'=>'true',
				'persist'=>'cookie',

				));

 $this->endWidget();?>

	</li>

       			 </div>
       			 <div class="l_menu">
	          		 <h3 class="f14"><span class="switchs cu on" title="作品管理"></span>图片类文章</h3>
	          		 	<h6>发布</h6>
		          		 	<ul>
		          		 	<?php 
		          		 	$model=Category::model()->getTypeCate(2);

		          		 		foreach($model as $k=> $v)
		          		 	{
		          		 		
		          		 		
		          		 	 echo "<li class='sub_menu'><a href=".$this->createAbsoluteUrl('gallery/create',array('cid'=>$k))." target='con'>".$v."添加</a></li>";
		          		 	}
		          		 	

		          				?>
		          			</ul>
	          		 	<h6>管理</h6>
	          		 		<ul>
		          		 	<?php 
		          		 	$model=Category::model()->getTypeCate(2);

		          		 		foreach($model as $k=> $v)
		          		 	{
		          		 		
		          		 		
		          		 	 echo "<li class='sub_menu'><a href=".$this->createAbsoluteUrl('gallery/admin',array('cid'=>$k))." target='con'>".$v."管理</a></li>";
		          		 	}
		          		 	

		          				?>
		          			</ul>
       			 </div>

       			  <div class="l_menu">
	          		 <h3 class="f14"><span class="switchs cu on" title="栏目管理"></span>栏目管理</h3>


	           		 <ul class="show">
		               	<li class="sub_menu">
		                	<a href="<?php echo $this->createAbsoluteUrl("Category/create");?>" target="con" hidefocus="true" style="outline:none;">新建栏目</a></li>
		                <li class="sub_menu">
		                	<a href="<?php echo $this->createAbsoluteUrl("Category/admin");?>" hidefocus="true" target="con" style="outline:none;">栏目管理</a></li>
	           		 </ul>
       			 </div>
       			        			  <div class="l_menu">
	          		 <h3 class="f14"><span class="switchs cu on" title="栏目管理"></span>模块管理</h3>


	           		 <ul class="show">
		               	<li class="sub_menu">
		                <h6>广告模块</h6>


<<<<<<< HEAD
		                	<ul>
		                	<li><a href="<?php echo $this->createAbsoluteUrl('advert/admin');?>"  target='con'>广告位管理</a></li>
		                	<li><a href="<?php echo $this->createAbsoluteUrl('advert/edit')?>" target='con'>广告管理</a></li>
		                	<!-- <li><a href="">二级页面幻灯片管理</a></li> -->
		                	
		                	</ul>

=======
			                	<ul>
			                		<li><a href="<?php echo $this->createAbsoluteUrl('advert/admin');?>"  target='con'>广告位管理</a></li>
			                		<li><a href="<?php echo $this->createAbsoluteUrl('advert/edit')?>" target='con'>广告管理</a></li>
			                	</ul>
<<<<<<< HEAD

=======
>>>>>>> d2041ed7319d8f4f7e55e31f9c5531c3639b135c
>>>>>>> 24b899a2e28958e73fec5698b6637546e09a1665
		                </li>
		                <li class="sub_menu">
		               <h6>艺术家模块</h6>
		               			<ul>
		               				<li><a href="<?php echo $this->createAbsoluteUrl('artersCategory/admin')?>" target="con">艺术家栏目管理</a></li>
		               				<li><a href="<?php echo $this->createAbsoluteUrl('arters/admin')?>" target="con">艺术家信息管理</a></li>
		               			</ul>
		           </li>
	           		 </ul>
       			 </div>
        </div>
        <a href="javascript:;" id="openClose" style="outline-style: none; outline-color: invert; outline-width: medium;" hideFocus="hidefocus" class="open" title="展开与关闭"><span class="hidden">展开</span></a>
    </div>

	<div class="col-1 lf cat-menu" id="display_center_id" style="display:none" height="100%">
		<div class="content">
        	<iframe name="center_frame" id="center_frame" src="" frameborder="false" scrolling="auto" style="border:none" width="100%" height="auto" allowtransparency="true"></iframe>
        </div>
    </div>

    <div class="col-auto mr8">
        <div class="crumbs">
            <div class="shortcut cu-span">
                <a href="?m=admin&c=cache_all&a=init" target="right"><span>更新缓存</span></a>
                <a href="#"><span>后台地图</span></a></div>
        	当前位置：<span id="current_pos"></span></div>
            <div class="col-1">
                <div class="content" style="position:relative; overflow:hidden">
                    <iframe name="con" id="rightMain" src="" frameborder="false" scrolling="auto" style="overflow-x:hidden;border:none; margin-bottom:30px" width="100%" height="auto" allowtransparency="true"></iframe>
                    <div class="fav-nav">
                        <div id="panellist"></div>
                        <div id="paneladd"><a class="panel-add" href="javascript:add_panel();"><em>添加</em></a></div>
                    </div>
                </div>
            </div>
        </div>
</div>
<!--}Content End-->
<script type="text/javascript">
//clientHeight-0; 空白值 iframe自适应高度
function windowW(){
	if($(window).width()<980){
			$('.header').css('width',980+'px');
			$('#content').css('width',980+'px');
			$('body').attr('scroll','');
			$('body').css('overflow','');
	}
}
windowW();
$(window).resize(function(){
	if($(window).width()<980){
		windowW();
	}else{
		$('.header').css('width','auto');
		$('#content').css('width','auto');
		$('body').attr('scroll','no');
		$('body').css('overflow','hidden');

	}
});
window.onresize = function(){
	var heights = document.documentElement.clientHeight-150;document.getElementById('rightMain').height = heights;
	var openClose = $("#rightMain").height()+39;
	$('#center_frame').height(openClose+9);
	$("#openClose").height(openClose+30);
}
window.onresize();
//站点下拉菜单
$(function(){
	//默认载入左侧菜单

})

//左侧开关
$("#openClose").click(function(){
	if($(this).data('clicknum')==1) {
		$("html").removeClass("on");
		$(".left_menu").removeClass("left_menu_on");
		$(this).removeClass("close");
		$(this).data('clicknum', 0);
	} else {
		$(".left_menu").addClass("left_menu_on");
		$(this).addClass("close");
		$("html").addClass("on");
		$(this).data('clicknum', 1);
	}
	return false;
});



function _M(menuid,targetUrl) {
	$('.top_menu').removeClass("on");
	$('#_M'+menuid).addClass("on");
	//当点击顶部菜单后，隐藏中间的框架
	$('#display_center_id').css('display','none');
	//显示左侧菜单，当点击顶部时，展开左侧
	$(".left_menu").removeClass("left_menu_on");
	$("#openClose").removeClass("close");
	$("html").removeClass("on");
	$(".l_menu").eq(menuid).show().siblings().hide();
//	$("#openClose").data('clicknum', 0);
//	$("#current_pos").data('clicknum', 1);
}
$(".top_menu").click(function()
{
	var index=$(this).index();
	_M(index,'#');
})
$(".sub_menu").click(function()
{	$(".sub_menu").removeClass("ob fb blue ");
	$(this).addClass("ob fb blue");
	$("#current_pos").data('clicknum', 1);

})

$(".left_menu ul li a").click(function()
{
		$(".aon").removeClass('aon');
		$(this).addClass('aon');
		
	
})
$(".left_menu ul li a").hover(function()
{	
	$(this).animate({"margin-left":3},500);
},function()
{
	$(this).animate({"margin-left":0},200)
})

$(".l_menu .cate_menu").click(function()
{
	$(".cate_on").removeClass("cate_on");
	$(this).addClass("cate_on");
	$(this).next("ul").slideToggle();
})

</script>
</body>
</html>
