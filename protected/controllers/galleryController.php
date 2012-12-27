<?php
class galleryController extends Controller
{
	public function actionIndex()
	{
		
		$db=Yii::app()->db;
		$sql='select * from bl_gallery_data order by gdid desc limit 0,20';
		$command=$db->createCommand($sql);
		$row=$command->queryAll();
		$this->render('index',array("row"=>$row));	
	}
	/*
	 * 点击图片的显示单张图片
	 * */
	public function actionShowImg()
	{
		$this->layout='//';
		if(!isset($_GET['gdid'])){
			return false;
		}
		$gdid=$_GET['gdid'];
		$db=Yii::app()->db;
		$sql='select * from bl_gallery_data where gdid=:gdid';
		$command=$db->createCommand($sql);
		$command->bindParam(":gdid",$gdid);
		$datu=$command->queryAll();
		$gid=$datu[0]['gid'];
		$xiaotu=self::GetOuter($gid);
		$this->render('showImg',array("datu"=>$datu,"xiaotu"=>$xiaotu,'title'=>$datu[0]['title']));
	}
	/**
	 * 显示一个系列的所有图片按照时间顺序来排
	 */
	public function actionShow()
	{
		$this->layout='//';
		if(!isset($_GET['cid']))
		{
			return false;
			//throw new CHttpException(404,'此页面不存在');exit;
		}else{
			$cid=$_GET['cid'];
			$model=Gallery::model()->findAll("cid=:cid",array(":cid"=>$cid));
			if(empty($model)) exit('请求的结果不存在');
		
			$gid=$model[0]->gid;
			$xiaotu=self::GetOuter($gid);
			$this->render('showImg',array('xiaotu'=>$xiaotu,'title'=>$model[0]->title));
		}
	}
	public static function getOuter($gid)
	{
		if(!isset($gid))
		{
			return false;
		}
		
		$db=Yii::app()->db;
		$sql='select * from bl_gallery_data where gid=:gid order by gdid';
		$command=$db->createCommand($sql);
		$command->bindParam(':gid',$gid);
		$model=$command->queryAll();
		return $model;
	}
	public function actionGetMoreImg()
	{
		if(!isset($_GET['start']))
		{
			return false;
		}
		$start=$_GET['start'];
		$db=Yii::app()->db;
		$sql='select * from bl_gallery_data order by gdid limit :start,20';
		$command=$db->createCommand($sql);
		$command->bindParam(":start",$start);
		$row=$command->queryAll();
		if(!empty($row))
		{
			echo json_encode($row);
		}else{
			echo '没有了';
		}
	}
	
	
	
}