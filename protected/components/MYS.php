<?php



/**
 *此类为个人所有的处理方法
 *
 *
 *
 * 
 *
*/

class MYS {


	//处理IMG 文件的显示
	public static function getDir($img)
	{


		$UploadFile=new UploadFile;
		
		$dir=$UploadFile->getDir($img);
		return $dir;


	} 

	//打印数据
	public static function p($value)
	{
		if(!$value) die('打印的数据不能为空');
		echo "<pre>";
		print_r($value);
		echo "</pre>";
	}
	//链接数据库
	public static function dbLink($sql)
	{
		$db=Yii::app()->db;
		$command=$db->createCommand($sql);
		return $command;
	}


}








?>