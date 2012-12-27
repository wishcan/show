<?php
/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class Controller extends CController
{

	/**
	 * @var string the default layout for the controller view. Defaults to '//layouts/column1',
	 * meaning using a single column layout. See 'protected/views/layouts/column1.php'.
	 */
	public $layout='//layouts/column_web';
	/**
	 * @var array context menu items. This property will be assigned to {@link CMenu::items}.
	 */


	public $menu=array();

	public $breadcrumbs=array();

	public function p($val)
	{
		if(isset($val)&&!is_null($val)&&!empty($val))
		{
			echo "<pre>";
			print_r($val);
			echo "</pre>";
		}
	}
	#获取上传文件的目录所在
	public static function getImgDir($fileName)
	{
		$dir=substr($fileName,0,4);
		$dir=Yii::app()->getBaseUrl().'/upload/'.$dir.'/';
		return $dir;
	}
	public static function error($msg='系统出了点问题3秒后返回上一页')
	{
// 		$message=$msg;
		
	}

}