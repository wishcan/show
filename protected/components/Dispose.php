<?php

	class Dispose
	{
		/**
		 *广告处理	
		 *参数1传入广告地址
		 *参数2要求地址如果没有就没连接
		 *参数3传入想要修改的属性样式
		 *
		*/
		private $class='default';
		private $htmlOptions='style=""';
		public static function advert($advert,$link='',$css=array())
		{
			$data='';
			isset($css['class'])? $class=$css['class']:$class='default';
			isset($css['htmlOptions'])?$htmlOptions=$css['htmlOptions']:$htmlOptions='style=""';							
			$info=pathinfo($advert);
			if(!isset($info['extension'])) return $data='这不是一个文件';
			$type=$info['extension'];
			switch ($type) {
				case 'swf':
					$data='
					<object type="application/x-shockwave-flash"  width="960" height="100" class="'.$class.'" '.$htmlOptions.'">
      <param name="movie" value="'.$advert.'" />
      <param name="quality" value="high" />
      <param name="wmode" value="opaque" />
      <param name="swfversion" value="9.0.45.0" />
      <!-- 此 param 标签提示使用 Flash Player 6.0 r65 和更高版本的用户下载最新版本的 Flash Player。如果您不想让用户看到该提示，请将其删除。 -->
      <param name="expressinstall" value="Scripts/expressInstall.swf" />
      <!-- 下一个对象标签用于非 IE 浏览器。所以使用 IECC 将其从 IE 隐藏。 -->
      <!--[if !IE]>-->
      <object type="application/x-shockwave-flash" data="'.$advert.' " width="960" height="100" class="'.$class.'" '.$htmlOptions.'">
        <!--<![endif]-->
        <param name="quality" value="high" />
        <param name="wmode" value="opaque" />
        <param name="swfversion" value="9.0.45.0" />
        <param name="expressinstall" value="Scripts/expressInstall.swf" />
        <!-- 浏览器将以下替代内容显示给使用 Flash Player 6.0 和更低版本的用户。 -->
        <div>
          <h4>此页面上的内容需要较新版本的 Adobe Flash Player。</h4>
          <p><a href="http://www.adobe.com/go/getflashplayer"><img src="http://www.adobe.com/images/shared/download_buttons/get_flash_player.gif" alt="获取 Adobe Flash Player" width="112" height="33" /></a></p>
        </div>
        <!--[if !IE]>-->
      </object>
      <!--<![endif]-->
    </object>
';
		
		

				break;
				default:
					$data = '<img src="'.$advert.'" width="965" class="'.$class.'"  '.$htmlOptions.' "/>';
					break;
			}

			if(!$link==''){

					$data='<a href="'.$link.'">'.$data.'</a>';
			}

			return $data;
		}

	}




?>