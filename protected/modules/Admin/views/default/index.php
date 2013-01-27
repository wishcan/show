
   <div class="navbar">
        <div class="navbar-inner">
                <ul class="nav pull-right">
                    
                    <!-- <li><a href="#" class="hidden-phone visible-tablet visible-desktop" role="button">Settings</a></li> -->
                    <li id="fat-menu" class="dropdown">
                        <a href="#" role="button" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="icon-user"></i> <?php echo Yii::app()->user->id;?>
                            <i class="icon-caret-down"></i>
                        </a>

                        <ul class="dropdown-menu">
                           <!--  <li><a tabindex="-1" href="#">My Account</a></li> -->
                            <li class="divider"></li>
                            <li class="divider visible-phone"></li>
                            <li><a tabindex="-1" href="<?php $this->createAbsoluteUrl('user/logout');?>">退出</a></li>
                        </ul>
                    </li>
                    
                </ul>
                <a class="brand" href="<?php echo Yii::app()->createUrl('index')?>"><span class="first">宝隆</span> <span class="second">后台管理系统</span></a>
        </div>
    </div>
<<<<<<< HEAD
    <div class="col-auto" style="overflow: visible">
    	<div class="log white cut_line">您好  [超级管理员]<span>|</span><a href="?m=admin&c=index&a=public_logout">[退出]</a><span>|</span>
    		<a href="" target="_blank" id="site_homepage">站点首页</a><span>|</span>
    		<a href="?m=member" target="_blank">会员中心</a><span>|</span>
    		<a href="?m=search" target="_blank" id="site_search">全站搜索</a>
    	</div>
        <ul class="nav white" id="top_menu">
        <li id="_M0" class="on top_menu"><a href="javascript:void(0);" hidefocus="true" style="outline:none;">我的面板</a></li>
     <!--    <li id="_M2" class="top_menu"><a href="javascript:void(0);"  hidefocus="true" style="outline:none;">模块</a></li> -->
        <li id="_M1" class="top_menu"><a href="javascript:void(0);"  hidefocus="true" style="outline:none;">用户</a></li>
        <li id="_M2" class="top_menu"><a href="javascript:void(0);"  hidefocus="true" style="outline:none;">文章管理</a></li>
        <li id="_M3" class="top_menu"><a href="javascript:void(0);"  hidefocus="true" style="outline:none;">图片信息</a></li>
        <li id="_M4" class="top_menu"><a href="javascript:void(0);"  hidefocus="true" style="outline:none;">栏目管理</a>
        	<li id="_M5" class="top_menu"><a href="javascript:void(0);"  hidefocus="true" style="outline:none;">模块管理</a></li>
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
          		 <h3 class="f14"><span class="switchs cu on" title="个人信息"></span>网站信息</h3>
           		 <ul>
	     				<li><a href="<?php echo $this->createAbsoluteUrl('link/admin') ?>" hidefocus="true" target="con" style="outline:none;">友情链接</a></li>	
	                <li  class="sub_menu">
	                	<a href="" hidefocus="true" style="outline:none;">个人密码修改</a>
	                </li>
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
	<li><h6>视频</h6>
	
	<a style='width:115px' target='con' href='<?php echo $this->createAbsoluteUrl("video/create");?>'>添加视频</a>
	<a style='margin:5px 0 0 0px;width:115px' target='con'  href='<?php echo $this->createAbsoluteUrl("video/admin");?>'>视频管理</a>
	</li>

       			 </div>
       			 <div class="l_menu">
	          		 <h3 class="f14"><span class="switchs cu on" title="作品管理"></span>图片类文章</h3>
	          		 	<li><h6>发布</h6>	
	<?php
			$this->beginWidget('CTreeView',array(
				'data'=>Category::model()->getCateList(0,'gallery/create'),
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
	          		 <h3 class="f14"><span class="switchs cu on" title="栏目管理"></span>栏目管理</h3>

=======
    
>>>>>>> df5fb8b012f47d193deb10e0c4982163c2092bba


    
    <div class="sidebar-nav">
        <a href="#dashboard-menu" class="nav-header" data-toggle="collapse"><i class="icon-dashboard"></i>个人面板</a>
        <ul id="dashboard-menu" class="nav nav-list collapse in">
            <li><a href="index.html">站点信息</a></li>
            <li ><a href="users.html">友情链接</a></li>
        </ul>
         <a href="#user-menu" class="nav-header" data-toggle="collapse" ><i class="icon-comment"></i>会员管理</a>
          <ul id="user-menu" class="nav nav-list collapse">
              <li ><a href="<?php echo $this->createAbsoluteUrl("User/admin");?>" target='con'>用户管理</a></li>
              <li ><a href="<?php echo $this->createAbsoluteUrl("Role/admin");?>" target='con'>角色管理</a></li>
          </ul>


        <a href="#accounts-menu" class="nav-header" data-toggle="collapse"><i class="icon-briefcase"></i>文章管理<span class="label label-info">+3</span></a>
        <ul id="accounts-menu" class="nav nav-list collapse">
            <li> 
                <?php
                $this->beginWidget('CTreeView',array(
                  'data'=>Category::model()->getCateList(0,'news/admin'),
                  'animated'=>'slow',
                  'collapsed'=>'true',
                  'persist'=>'cookie',

                  ));
             $this->endWidget();?>

            </li>
        </ul>

<<<<<<< HEAD
	           		 <ul class="show">
		               	<li class="sub_menu">
		                <h6>广告模块</h6>
			                	<ul>
			                		<li><a href="<?php echo $this->createAbsoluteUrl('advert/admin');?>"  target='con'>广告位管理</a></li>
			                		<li><a href="<?php echo $this->createAbsoluteUrl('advert/edit')?>" target='con'>广告管理</a></li>
			                	</ul>

		                </li>
		           		<li class="sub_menu">
		               <h6>出版/杂志模块</h6>
		               			<ul>
		               				<li><a href="<?php echo $this->createAbsoluteUrl('opus/admin')?>" target="con">出版/杂志管理</a></li>
		               				<li><a href="<?php echo $this->createAbsoluteUrl('opus/admin')?>" target="con">内容管理</a></li>
		               			</ul>
		           		</li>
	           		 </ul>
       			 </div>
        </div>
        <a href="javascript:;" id="openClose" style="outline-style: none; outline-color: invert; outline-width: medium;" hideFocus="hidefocus" class="open" title="展开与关闭"><span class="hidden">展开</span></a>
    </div>
=======
        <a href="#show-menu" class="nav-header" data-toggle="collapse"><i class="icon-exclamation-sign"></i>图片信息管理 <i class="icon-chevron-up"></i></a>
        <ul id="show-menu" class="nav nav-list collapse">
              <li> 
                  <?php
                  $this->beginWidget('CTreeView',array(
                    'data'=>Category::model()->getCateList(0,'gallery/admin'),
                    'animated'=>'slow',
                    'collapsed'=>'true',
                    'persist'=>'cookie',
                    ));
               $this->endWidget();?>

            </li>
        </ul>
>>>>>>> df5fb8b012f47d193deb10e0c4982163c2092bba

        <a href="#cate-menu" class="nav-header" data-toggle="collapse"><i class="icon-legal"></i>栏目管理</a>
          <ul id="cate-menu" class="nav nav-list collapse">
                <li class="sub_menu">
                    <a href="<?php echo $this->createAbsoluteUrl("Category/create");?>" target="con" hidefocus="true" style="outline:none;">新建栏目</a></li>
                <li class="sub_menu">
                    <a href="<?php echo $this->createAbsoluteUrl("Category/admin");?>" hidefocus="true" target="con" style="outline:none;">栏目管理</a></li>
          </ul>

        <a href="#model-menu" class="nav-header" data-toggle="collapse"><i class="icon-question-sign"></i>模块管理</a>
           <ul id="model-menu" class="nav nav-list collapse">
              <li class="sub_menu">
                    <h6>广告模块</h6>
                        <ul>
                          <li><a href="<?php echo $this->createAbsoluteUrl('advert/admin');?>"  target='con'>广告位管理</a></li>
                          <li><a href="<?php echo $this->createAbsoluteUrl('advert/edit')?>" target='con'>广告管理</a></li>
                        </ul>

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
      

    
    <div class="content iframe" style='height:auto; height:660px;'>
        <iframe src="" name='con' style='width:100%;height:960px;border:none' ></iframe>
      
</div>


                    
                    <footer>
                        <hr>

                        <!-- Purchase a site license to remove this link from the footer: http://www.portnine.com/bootstrap-themes -->
                        <p class="pull-right">A <a href="http://www.portnine.com/bootstrap-themes" target="_blank">Free Bootstrap Theme</a> by <a href="http://www.portnine.com" target="_blank">Portnine</a></p>

                        <p>&copy; 2012 <a href="http://www.portnine.com" target="_blank">Portnine</a></p>
                    </footer>
                    
            </div>
        </div>
    </div>
    


    <script src="<?php echo Yii::app()->baseUrl;?>/css/lib/bootstrap/js/bootstrap.js"></script>
    <script type="text/javascript">
        $("[rel=tooltip]").tooltip();
        $(function() {
 setSize();
          $(window).resize(function(){
            setSize();
          })
          function setSize()
          {
          //$('.iframe').css('height',$(window).height()+100);
          //$('iframe').css('height',$(window).height()+100);
            // $('iframe').css('height','auto');
          }
            //$('.demo-cancel-click').click(function(){return false;});
        });
    </script>
    
  </body>
</html>


