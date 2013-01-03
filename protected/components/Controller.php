<?php
/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class Controller extends CController
{

	public $layout='//layouts/column1';

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

}