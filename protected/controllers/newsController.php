<?php
class newsController extends  Controller
{
	
	
	#默认显示页面
	public function actionIndex()
	{
		$criteria =new CDbCriteria();
		$criteria->order='createTime desc';	
		$count=News::model()->count($criteria);
		$pager=new CPagination($count);
		$pager->pageSize=10;
		$pager->applyLimit($criteria);
		$news=News::model()->findAll($criteria);
		$this->render('news',array('pages'=>$pager,'news'=>$news));
	}
	#内容显示页面
	public function actionNeiRong()
	{
		if(!isset($_GET['nid']))
		{
			echo "<script type='text/javascript'>alert('文章不存在')</script>";		
			$this->redirect(Yii::app()->controller->createUrl('index'));
		}else
		{
			$neirong=News::model()->findByPk($_GET['nid']);
			
		}
		
		
		$this->render('neiRong',array('neirong'=>$neirong));
	}
	
	
	
}






?>