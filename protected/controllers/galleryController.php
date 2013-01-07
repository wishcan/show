<?php
class galleryController extends Controller
{
	#作品欣赏
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
	 * 
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
		$xiaotu=Gallery::model()->getData($gid);
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

	/*
	 * 异步获取图片
	 * 
	 */
	public function actionGetMoreImg()
	{
		if(isset($_GET['gid']))
		{
			$gid=$_GET['gid'];
		}else
		{
			$gid=Gallery::model()->getGallery(25);
			$gid='';
			foreach($model as $v){
				$gid.=','.$v->gid;
			}
		}
		$start=0;
		isset($_POST['start'])? $start=$_POST['start']:$start=0;
		isset($_POST['end'])? $end=$_POST['end']:$end=30;
		$row=Gallery::model()->getData($gid,$start,$end);
		foreach ($row as $k=>$v){
			$row[$k]['thumb']=parent::getImgDir($v['thumb']).$v['thumb'];
		}
		echo json_encode($row);
	}
	#摄影作品
	public function actionShey()
	{

		$gid=Gallery::model()->getGallery(25);
		$this->render('shey',array('gid'=>$gid));
	}
	public function actionPhoto()//显示单个类别的照片
	{
		$gid=$_GET['gid'];
		$this->render('shey',array('gid'=>$gid));	
	}

	/*
	 * 获得指定栏目的图片文章ID
	 */
	public function actionAda()
	{
		$gid=Gallery::model()->getGallery('56');
		$model=Gallery::getData($gid);
		$this->render('ada',array('model'=>$model,'gid'=>$gid));
	}
	
	
	
}