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

	#获取上传文件的目录所在
	public static function getImgDir($fileName)
	{
		$dir=substr($fileName,0,4);
		$dir=Yii::app()->getBaseUrl().'/upload/'.$dir.'/';
		return $dir;
	}
	#链接数据库
	public static function dbLink($sql)
	{
		$db=Yii::app()->db;
		$command=$db->createCommand($sql);
		return $command;
	}
	/**
	 *修改配置文件
	 *需要参数为 1 配置文件键名 2修改的键值	
	*/
	public function cC($key,$value)
	{

		$file=file_get_contents('C:/wamp/www/show/protected/config/main.php');
		$reg='/[\'\"]'.$key.'[\'\"]\=\>[\'\"](.*)[\'\"]/isU';
		$str="'".$key."'".'=>'."'".$value."'";
		var_dump(preg_match($reg, $file));
		$config=preg_replace($reg, $str, $file);
		file_put_contents('C:/wamp/www/show/protected/config/main.php', $config); 
	}



}

